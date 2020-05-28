CREATE OR REPLACE FUNCTION tipos_lugares()
RETURNS void AS $$
BEGIN
    UPDATE lugares SET tipo= 'museo' WHERE lid=1;
    UPDATE lugares SET tipo= 'museo' WHERE lid=2;
    UPDATE lugares SET tipo= 'iglesia' WHERE lid=3;
    UPDATE lugares SET tipo= 'museo' WHERE lid=4;
    UPDATE lugares SET tipo= 'museo' WHERE lid=5;
    UPDATE lugares SET tipo= 'iglesia' WHERE lid=6;
    UPDATE lugares SET tipo= 'museo' WHERE lid=7;
    UPDATE lugares SET tipo= 'museo' WHERE lid=8;
    UPDATE lugares SET tipo= 'iglesia' WHERE lid=9;
    UPDATE lugares SET tipo= 'plaza' WHERE lid=10;
    UPDATE lugares SET tipo= 'plaza' WHERE lid=11;
    UPDATE lugares SET tipo= 'iglesia' WHERE lid=12;
    UPDATE lugares SET tipo= 'plaza' WHERE lid=13;
    UPDATE lugares SET tipo= 'plaza' WHERE lid=14;
    UPDATE lugares SET tipo= 'museo' WHERE lid=15;
    UPDATE lugares SET tipo= 'museo' WHERE lid=16;
    UPDATE lugares SET tipo= 'iglesia' WHERE lid=17;
    UPDATE lugares SET tipo= 'museo' WHERE lid=18;
    UPDATE lugares SET tipo= 'iglesia' WHERE lid=19;
    UPDATE lugares SET tipo= 'iglesia' WHERE lid=20;
    UPDATE lugares SET tipo= 'museo' WHERE lid=21;
    UPDATE lugares SET tipo= 'museo' WHERE lid=22;
END
$$ language plpgsql
