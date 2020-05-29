CREATE OR REPLACE FUNCTION id_viajes(nombres_artistas varchar, origen varchar)
RETURNS TABLE (v1 text, v2 text, v3 text) AS $$
BEGIN
	--Obtiene el id de la ciudad de origen
    DROP TABLE IF EXISTS origen_id;
	CREATE TEMP TABLE IF NOT EXISTS origen_id AS
		(SELECT DISTINCT cid FROM ciudades WHERE nombreciudad = origen);

    RETURN QUERY SELECT DISTINCT split_part(did, '/', 3) as v1, split_part(did, '/', 2) as v2, split_part(did, '/', 1) as v3  FROM 
	(SELECT * FROM
		(SELECT corigen, cdestino, counter, esc1, esc2, did FROM posibles_viajes(), (SELECT * FROM ciudad_artistas(nombres_artistas)) AS ca WHERE cdestino = ca.cid) AS p1,
	(SELECT * FROM ciudad_artistas(nombres_artistas)) AS ca
	WHERE p1.esc1 = ca.cid OR p1.esc1 = 0) AS p2,
	(SELECT * FROM ciudad_artistas(nombres_artistas)) AS ca,
	origen_id
WHERE p2.esc2 = ca.cid oR p2.esc2 = 0 AND corigen = origen_id.cid;


RETURN;
END;
$$ language plpgsql;
