CREATE OR REPLACE FUNCTION
cid_artistas(lista_artistas VARCHAR)
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


CREATE OR REPLACE FUNCTION
vuelos_directos (c_origen varchar)
RETURNS TABLE (ciudad_destino varchar(50), horas integer) AS $$
BEGIN
RETURN QUERY EXECUTE 'SELECT ciudad_destino, horas
        FROM VUELO
        WHERE ciudad_origen = ($1)'
    USING c_origen;
RETURN;
END;
$$ language plpgsql;
