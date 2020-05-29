CREATE OR REPLACE FUNCTION ciudad_artistas(nombre_artistas varchar)
RETURNS TABLE (cid INT, cid_artistas.nombre varchar) AS $$

BEGIN
    RETURN QUERY SELECT DISTINCT cid_artistas.cid, cid_artistas.nombre FROM
		(SELECT artistas_cid.cid, artistas_cid.nombre
		FROM dblink('dbname=grupo84e3 user=grupo84 password=grupo84', '
		SELECT ubica_en.cid, artista_lugar.nombre
		FROM ubica_en,
			(SELECT obras_artista.aid, obras_en.oid, obras_en.lid, obras_artista.nombre
					FROM obras_en,
						(SELECT oid, artistas.aid, nombre FROM artistas, realizo
							WHERE artistas.aid = realizo.aid) AS obras_artista
					WHERE obras_en.oid = obras_artista.oid) AS artista_lugar
		WHERE ubica_en.lid = artista_lugar.lid'
		) AS artistas_cid(cid int, nombre varchar(50)),
		string_to_array(nombre_artistas, ',') AS nombre_array(nombre)
		WHERE artistas_cid.nombre =ANY(nombre_array.nombre)) AS cid_artistas;

RETURN;
END;
$$ language plpgsql;