CREATE OR REPLACE FUNCTION tipos_obras()
    RETURNS void AS $$
BEGIN
    UPDATE obras SET tipo= 'pintura' WHERE oid=1;
    UPDATE obras SET tipo= 'pintura' WHERE oid=2;
    UPDATE obras SET tipo= 'pintura' WHERE oid=3;
    UPDATE obras SET tipo= 'escultura' WHERE oid=4;
    UPDATE obras SET tipo= 'pintura' WHERE oid=5;
    UPDATE obras SET tipo= 'escultura' WHERE oid=6;
    UPDATE obras SET tipo= 'pintura' WHERE oid=7;
    UPDATE obras SET tipo= 'pintura' WHERE oid=8;
    UPDATE obras SET tipo= 'pintura' WHERE oid=9;
    UPDATE obras SET tipo= 'escultura' WHERE oid=10;
    UPDATE obras SET tipo= 'pintura' WHERE oid=11;
    UPDATE obras SET tipo= 'fresco' WHERE oid=12;
    UPDATE obras SET tipo= 'escultura' WHERE oid=13;
    UPDATE obras SET tipo= 'fresco' WHERE oid=14;
    UPDATE obras SET tipo= 'escultura' WHERE oid=15;
    UPDATE obras SET tipo= 'escultura' WHERE oid=16;
    UPDATE obras SET tipo= 'fresco' WHERE oid=17;
    UPDATE obras SET tipo= 'escultura' WHERE oid=18;
    UPDATE obras SET tipo= 'escultura' WHERE oid=19;
    UPDATE obras SET tipo= 'escultura' WHERE oid=20;
    UPDATE obras SET tipo= 'escultura' WHERE oid=21;
    UPDATE obras SET tipo= 'pintura' WHERE oid=22;
    UPDATE obras SET tipo= 'fresco' WHERE oid=23;
    UPDATE obras SET tipo= 'pintura' WHERE oid=24;
    UPDATE obras SET tipo= 'pintura' WHERE oid=25;
    UPDATE obras SET tipo= 'escultura' WHERE oid=26;
    UPDATE obras SET tipo= 'fresco' WHERE oid=27;
    UPDATE obras SET tipo= 'pintura' WHERE oid=28;
    UPDATE obras SET tipo= 'escultura' WHERE oid=29;
    UPDATE obras SET tipo= 'escultura' WHERE oid=30;
    UPDATE obras SET tipo= 'escultura' WHERE oid=31;
    UPDATE obras SET tipo= 'fresco' WHERE oid=32;
    UPDATE obras SET tipo= 'fresco' WHERE oid=33;
    UPDATE obras SET tipo= 'fresco' WHERE oid=34;
    UPDATE obras SET tipo= 'pintura' WHERE oid=35;
    UPDATE obras SET tipo= 'pintura' WHERE oid=36;
    UPDATE obras SET tipo= 'pintura' WHERE oid=37;
    UPDATE obras SET tipo= 'pintura' WHERE oid=38;
    UPDATE obras SET tipo= 'pintura' WHERE oid=39;
END
$$ language plpgsql
