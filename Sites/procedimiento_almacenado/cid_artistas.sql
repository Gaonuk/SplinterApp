CREATE OR REPLACE FUNCTION cid_artistas(lista_artistas VARCHAR)
RETURNS TABLE (cid INT, artista VARCHAR) AS $$
BEGIN
RETURN QUERY EXECUTE 'SELECT DISTINCT ubica_en.cid, artistas.nombre
    FROM artistas, ciudades, obras, obras_en, realizo, ubica_en
    WHERE artistas.aid = realizo.aid AND obras.oid = realizo.oid AND obras.oid = obras_en.oid AND ubica_en.lid = obras_en.lid
    AND artistas.nombre IN $1'
        USING lista_artistas;
    RETURN;
END;
$$ language plpgsql;