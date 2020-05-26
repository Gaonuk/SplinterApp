CREATE OR REPLACE FUNCTION itinerario(fecha date, origen varchar, nombre_artistas varchar)
DECLARE array_nombres 
RETURNS Table (cid int, nombre varchar(50)) as $$
BEGIN
RETURN QUERY SELECT *
    FROM dblink('dbname=grupo84e3 user=grupo84 password=grupo84', '
    SELECT DISTINCT ubica_en.cid AS cid, artistas.nombre AS nombre
    FROM artistas, ciudades, obras, obras_en, realizo, ubica_en
    WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid AND obras.oid = obras_en.oid AND ubica_en.lid = obras_en.lid'
    ) AS artistas_cid(cid int, nombre varchar(50)) WHERE artistas_cid.nombre IN string_to_array(nombre_artistas, ',');
RETURN;
END;
$$ language plpgsql;
