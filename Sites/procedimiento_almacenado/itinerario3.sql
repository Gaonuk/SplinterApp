CREATE OR REPLACE FUNCTION f_itinerario(fecha date, origen varchar, nombre_artistas varchar)

RETURNS Table (c1 varchar, c2 varchar, hora_salida1 TIMESTAMP, medio1 varchar,
				c3 varchar, c4 varchar, hora_salida2 TIMESTAMP, medio2 varchar,
				c5 varchar, c6 varchar, hora_salida3 TIMESTAMP, medio3 varchar, total INT) as $$
DECLARE
viajes RECORD;
prow RECORD;
tiene_escala1 INT;
tiene_escala2 INT;
trow RECORD;
viaje1 INT;
viaje2 INT;
viaje3 INT;
vrow RECORD;
hora_llegada TIMESTAMP;
BEGIN

    --Crea la planificacion de los viajes segun id
    DROP TABLE IF EXISTS planificacion;
    CREATE TEMP TABLE IF NOT EXISTS planificacion as
        SELECT * FROM id_viajes(nombre_artistas, origen);

    --Crea tabla para poblar los itinerarios
	DROP TABLE IF EXISTS itinerario;
	CREATE TEMP TABLE IF NOT EXISTS itinerario(tid SERIAL, c1 varchar, c2 varchar, hora_salida1 TIMESTAMP, duracion1 INT, medio1 varchar, precio1 INT,
														c3 varchar, c4 varchar, hora_salida2 TIMESTAMP, duracion2 int, medio2 varchar, precio2 int,
														c5 varchar, c6 varchar, hora_salida3 TIMESTAMP, duracion3 int, medio3 varchar, precio3 int, total INT);
	
	--Poblar tabla de itinerario

	FOR prow IN
			SELECT * FROM planificacion
		LOOP

			--Caso que ocupe tres viajes
			IF prow.v1 != '' THEN
				viaje1 := CAST(prow.v1 AS INTEGER);
				viaje2 := CAST(prow.v2 AS INTEGER);
				viaje3 := CAST(prow.v3 AS INTEGER);

				DROP TABLE IF EXISTS v1;
				CREATE TEMP TABLE IF NOT EXISTS v1 AS
				SELECT * FROM destinos WHERE did = viaje1;
				DROP TABLE IF EXISTS v2;
				CREATE TEMP TABLE IF NOT EXISTS v2 AS
				SELECT * FROM destinos WHERE did = viaje2;
				DROP TABLE IF EXISTS v3;
				CREATE TEMP TABLE IF NOT EXISTS v3 AS
				SELECT * FROM destinos WHERE did = viaje3;

				INSERT INTO itinerario (c1, c2, hora_salida1, duracion1, medio1, precio1, c3, c4, hora_salida2, duracion2, medio2, precio2, c5, c6, hora_salida3, duracion3, medio3, precio3, total)
					SELECT  c1.nombreciudad, c2.nombreciudad, fecha + v1.horasalida, v1.duracion, v1.medio, v1.precio,
								c3.nombreciudad, c4.nombreciudad, fecha + v2.horasalida, v2.duracion, v2.medio, v2.precio,
								c5.nombreciudad, c6.nombreciudad, fecha + v3.horasalida, v3.duracion, v3.medio, v3.precio, v1.precio + v2.precio + v3.precio
					FROM v1, v2, v3, ciudades AS c1, ciudades AS c2, ciudades AS c3, ciudades AS c4, ciudades AS c5, ciudades AS c6
					WHERE c1.cid = v1.ciudadorigen AND c2.cid = v1.ciudaddestino AND
						c3.cid = v2.ciudadorigen AND c4.cid = v2.ciudaddestino AND
						c5.cid = v3.ciudadorigen AND c6.cid = v3.ciudaddestino;

			--Caso que ocupe dos viajes
			ELSEIF prow.v2 != '' THEN
                viaje1 := CAST(prow.v2 AS INTEGER);
				viaje2 := CAST(prow.v3 AS INTEGER);
				CREATE TEMP TABLE IF NOT EXISTS v1 AS
				SELECT * FROM destinos WHERE did = viaje1;
				DROP TABLE IF EXISTS v2;
				CREATE TEMP TABLE IF NOT EXISTS v2 AS
				SELECT * FROM destinos WHERE did = viaje2;

			INSERT INTO itinerario (c1, c2, hora_salida1, duracion1, medio1, precio1, c3, c4, hora_salida2, duracion2, medio2, precio2, total)
					SELECT  c1.nombreciudad, c2.nombreciudad, fecha + v1.horasalida, v1.duracion, v1.medio, v1.precio,
								c3.nombreciudad, c4.nombreciudad, fecha + v2.horasalida, v2.duracion, v2.medio, v2.precio, v1.precio + v2.precio

					FROM v1, v2, ciudades AS c1, ciudades AS c2, ciudades AS c3, ciudades AS c4
					WHERE c1.cid = v1.ciudadorigen AND c2.cid = v1.ciudaddestino AND
						c3.cid = v2.ciudadorigen AND c4.cid = v2.ciudaddestino;

			--Caso que ocupe un viaje
			ELSE
				viaje1 := CAST(prow.v3 AS INTEGER);
				CREATE TEMP TABLE IF NOT EXISTS v1 AS
				SELECT * FROM destinos WHERE did = viaje1;

			INSERT INTO itinerario (c1, c2, hora_salida1, duracion1, medio1, precio1, total)
					SELECT  c1.nombreciudad, c2.nombreciudad, fecha + v1.horasalida, v1.duracion, v1.medio, v1.precio, v1.precio

					FROM v1, ciudades AS c1, ciudades AS c2
					WHERE c1.cid = v1.ciudadorigen AND c2.cid = v1.ciudaddestino;
			END IF;

		END LOOP;

	FOR prow IN
		SELECT * FROM itinerario
	LOOP
		IF prow.c3 IS NOT NULL THEN
			hora_llegada := prow.hora_salida1 + interval '1' HOUR * prow.duracion1;
			LOOP
				IF hora_llegada < prow.hora_salida2 THEN
					EXIT;
				END IF;
				prow.hora_salida2 := prow.hora_salida2 + interval '1' day;
			END LOOP;
			UPDATE itinerario SET hora_salida2= prow.hora_salida2 WHERE itinerario.tid = prow.tid;

			IF prow.c5 IS NOT NULL THEN
				hora_llegada := prow.hora_salida2 + interval '1' HOUR * prow.duracion2;
				LOOP
				IF hora_llegada < prow.hora_salida3 THEN
					EXIT;
				END IF;
				prow.hora_salida3 := prow.hora_salida3 + interval '1' day;
			END LOOP;
			UPDATE itinerario SET hora_salida3= prow.hora_salida3 WHERE itinerario.tid = prow.tid;
			END IF;
		END IF;
	
	END LOOP;


	RETURN QUERY SELECT DISTINCT i.c1, i.c2, i.hora_salida1, i.medio1, i.c3, i.c4, i.hora_salida2, i.medio2 , i.c5, i.c6, i.hora_salida3, i.medio3, i.total  FROM itinerario as i ORDER BY total;
RETURN;
END;
$$ language plpgsql;