WITH RECURSIVE itinerario(ciudadorigen, ciudaddestino, fecha) AS
(
    SELECT * FROM destinos

    UNION

    SELECT V.origen, I.destino
    FROM destinos D, itinerario I
    WHERE D.ciudaddestino = I.ciudadorigen
)
SELECT * FROM Alcanzo