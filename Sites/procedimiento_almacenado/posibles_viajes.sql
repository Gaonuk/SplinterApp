CREATE OR REPLACE FUNCTION posibles_viajes()
RETURNS TABLE (corigen int, cdestino int, counter int, esc1 int, esc2 int, did text) AS $$
BEGIN
    DROP TABLE IF EXISTS todos_viajes;
	CREATE TEMP TABLE IF NOT EXISTS todos_viajes AS
        (WITH RECURSIVE alcanzo(ciudadorigen, ciudaddestino, counter, escala1, escala2, did) AS
			(
				SELECT destinos.ciudadorigen, destinos.ciudaddestino, 1, 0, 0, TEXT(destinos.did) FROM destinos

				UNION

				SELECT D.ciudadorigen, A.ciudaddestino, A.counter + 1, 
						CASE WHEN A.counter = 1 THEN A.escala1 + D.ciudaddestino ELSE A.escala1 END, 
						CASE WHEN A.counter = 2 THEN A.escala2 + D.ciudaddestino ELSE A.escala2 END,
						CONCAT(A.did, '/', D.did)
				FROM destinos D, alcanzo A
				WHERE D.ciudaddestino = A.ciudadorigen AND A.counter <= 2
			)
		SELECT * FROM alcanzo);
    
	RETURN QUERY SELECT * FROM (SELECT * FROM todos_viajes) AS al 
	WHERE al.ciudaddestino != al.escala1 AND al.ciudaddestino != al.escala2 AND al.ciudaddestino != al.ciudadorigen;
RETURN;
END;
$$ language plpgsql;