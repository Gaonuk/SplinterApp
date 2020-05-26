CREATE OR REPLACE FUNCTION itinerario(fecha date, origen varchar, nombre_artistas varchar)
RETURNS Table (cid int, nombre varchar(50)) as $$
BEGIN
RETURN QUERY SELECT *
    FROM dblink('dbname=grupo84e3 user=grupo84 password=grupo84', '
    SELECT DISTINCT ubica_en.cid AS cid, artistas.nombre AS nombre
    FROM artistas, ciudades, obras, obras_en, realizo, ubica_en
    WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid AND obras.oid = obras_en.oid AND ubica_en.lid = obras_en.lid
    AND artistas.nombre IN ($1)'
    ) AS artistas(cid int, nombre varchar(50))
    USING nombre_artistas;
RETURN;
END;
$$ language plpgsql;
