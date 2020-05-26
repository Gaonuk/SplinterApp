CREATE OR REPLACE FUNCTION itinerario(fecha date, origen varchar, nombre_artistas varchar)
RETURNS Table (cid int, nombre varchar(50)) as $$
BEGIN
RETURN QUERY 
    SELECT artistas_cid.cid, artistas_cid.nombre
    FROM dblink('dbname=grupo84e3 user=grupo84 password=grupo84', '
    SELECT DISTINCT ubica_en.cid AS cid, artistas.nombre AS nombre
    FROM artistas, ciudades, obras, obras_en, realizo, ubica_en
    WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid AND obras.oid = obras_en.oid AND ubica_en.lid = obras_en.lid'
    ) AS artistas_cid(cid int, nombre varchar(50)),
    string_to_array(nombre_artistas, ',') AS nombre_array(nombre)
    WHERE artistas_cid.nombre =ANY(nombre_array.nombre) AS cid_artistas(cid int, nombre varchar(50));

    SELECT * FROM cid_artistas; 
RETURN;
END;
$$ language plpgsql;
