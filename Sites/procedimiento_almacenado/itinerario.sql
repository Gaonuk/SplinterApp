CREATE OR REPLACE FUNCTION itinerario(fecha date, origen varchar, nombre_artistas varchar)
RETURNS Table (ciudadaorigen int, ciudaddestino int, counter int) as $$
DECLARE viajes RECORD;
BEGIN
    DROP TABLE origen_id;
	CREATE TEMP TABLE IF NOT EXISTS origen_id AS
		(SELECT DISTINCT cid FROM ciudades WHERE nombreciudad = origen);

    DROP TABLE ciudades_id;
	CREATE TEMP TABLE IF NOT EXISTS ciudades_id AS
        (SELECT DISTINCT cid_artistas.cid FROM 
		(SELECT artistas_cid.cid, artistas_cid.nombre
		FROM dblink('dbname=grupo84e3 user=grupo84 password=grupo84', '
		SELECT DISTINCT ubica_en.cid AS cid, artistas.nombre AS nombre
		FROM artistas, ciudades, obras, obras_en, realizo, ubica_en
		WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid AND obras.oid = obras_en.oid AND ubica_en.lid = obras_en.lid'
		) AS artistas_cid(cid int, nombre varchar(50)),
		string_to_array(nombre_artistas, ',') AS nombre_array(nombre)
		WHERE artistas_cid.nombre =ANY(nombre_array.nombre)) AS cid_artistas);

    DROP TABLE viajes;
	CREATE TEMP TABLE IF NOT EXISTS viajes AS
		(WITH RECURSIVE alcanzo(ciudadorigen, ciudaddestino, counter) AS
			(
				SELECT destinos.ciudadorigen, destinos.ciudaddestino, 1 FROM destinos

				UNION

				SELECT D.ciudadorigen, A.ciudaddestino, A.counter + 1
				FROM destinos D, alcanzo A
				WHERE D.ciudaddestino = A.ciudadorigen AND A.counter <= 2
			)
		SELECT * FROM alcanzo);

	RETURN QUERY SELECT V.ciudadorigen, V.ciudaddestino, V.counter FROM (SELECT * FROM viajes) AS V, ciudades_id, origen_id 
		WHERE V.ciudaddestino = ciudades_id.cid AND V.ciudadorigen = origen_id.cid AND
		V.ciudaddestino != origen_id.cid;
RETURN;
END;
$$ language plpgsql;