CREATE OR REPLACE FUNCTION fotos_obras()
RETURNS void AS $$
BEGIN
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/4/4d/Andrea_Mantegna_089.jpg' WHERE oid=1;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Annunciation_%28Leonardo%29.jpg/450px-Annunciation_%28Leonardo%29.jpg' WHERE oid=2;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/The_Baptism_of_Christ_%28Verrocchio_%26_Leonardo%29.jpg/800px-The_Baptism_of_Christ_%28Verrocchio_%26_Leonardo%29.jpg' WHERE oid=3;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Rome_basilica_st_peter_011c.jpg' WHERE oid=4;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Michelangelo_Caravaggio_052.jpg/800px-Michelangelo_Caravaggio_052.jpg' WHERE oid=5;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Taddei_Tondo.JPG/1024px-Taddei_Tondo.JPG' WHERE oid=6;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Martirio_di_San_Pietro_September_2015-1a.jpg/368px-Martirio_di_San_Pietro_September_2015-1a.jpg' WHERE oid=7;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/6/6c/Caravaggio_-_The_Annunciation.JPG' WHERE oid=8;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/0/00/Medusa_by_Caravaggio.jpg' WHERE oid=9;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Donatello%2C_maria_maddalena_02.JPG/420px-Donatello%2C_maria_maddalena_02.JPG' WHERE oid=10;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Eug%C3%A8ne_Delacroix_-_Le_28_Juillet._La_Libert%C3%A9_guidant_le_peuple.jpg/450px-Eug%C3%A8ne_Delacroix_-_Le_28_Juillet._La_Libert%C3%A9_guidant_le_peuple.jpg' WHERE oid=11;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Giorgio_Vasari_-_The_Last_Judgment_-_WGA24313.jpg' WHERE oid=12;
    UPDATE obras SET foto_url= ' ' WHERE oid=13;
    UPDATE obras SET foto_url= ' ' WHERE oid=14;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Fountain_of_Neptune%2C_Rome.jpg/450px-Fountain_of_Neptune%2C_Rome.jpg' WHERE oid=15;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/7/76/Lazio_Roma_Navona2_tango7174.jpg' WHERE oid=16;
    UPDATE obras SET foto_url= ' ' WHERE oid=17;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Ecstasy_St_Theresa_SM_della_Vittoria.jpg/800px-Ecstasy_St_Theresa_SM_della_Vittoria.jpg' WHERE oid=18;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Minerveo_obelisk_in_front_of_Santa_Maria_sopra_Minerva.jpg/800px-Minerveo_obelisk_in_front_of_Santa_Maria_sopra_Minerva.jpg' WHERE oid=19;
    UPDATE obras SET foto_url= 'https://c8.alamy.com/compes/mf5rmy/la-columnata-de-gian-lorenzo-bernini-en-la-plaza-de-san-pedro-y-carlo-maderno-fachada-del-renacimiento-italiano-papale-basilica-maggiore-di-san-pietro-en-vatic-mf5rmy.jpg' WHERE oid=20;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Apollo_and_Daphne_%28Bernini%29.jpg/450px-Apollo_and_Daphne_%28Bernini%29.jpg' WHERE oid=21;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Giotto_di_Bondone_090.jpg/800px-Giotto_di_Bondone_090.jpg' WHERE oid=22;
    UPDATE obras SET foto_url= ' ' WHERE oid=23;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Giotto._The_Badia_Polyptych._c._1300._91x340cm._Uffizi%2C_Florence..jpg/1920px-Giotto._The_Badia_Polyptych._c._1300._91x340cm._Uffizi%2C_Florence..jpg' WHERE oid=24;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Jacques-Louis_David_-_The_Coronation_of_Napoleon_%281805-1807%29.jpg/450px-Jacques-Louis_David_-_The_Coronation_of_Napoleon_%281805-1807%29.jpg' WHERE oid=25;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Bruxelles_Manneken_Pis.jpg/800px-Bruxelles_Manneken_Pis.jpg' WHERE oid=26;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/The_Last_Supper_-_Leonardo_Da_Vinci_-_High_Resolution_32x16.jpg/1920px-The_Last_Supper_-_Leonardo_Da_Vinci_-_High_Resolution_32x16.jpg' WHERE oid=27;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Leonardo_da_Vinci_-_Mona_Lisa_%28Louvre%2C_Paris%29.jpg/800px-Leonardo_da_Vinci_-_Mona_Lisa_%28Louvre%2C_Paris%29.jpg' WHERE oid=28;
    UPDATE obras SET foto_url= 'https://cdn.culturagenial.com/es/imagenes/michelangelo-s-pieta-5450-cut-out-black-cke.jpg' WHERE oid=29;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Miguel_%C3%81ngel%2C_por_Daniele_da_Volterra_%28detalle%29.jpg/777px-Miguel_%C3%81ngel%2C_por_Daniele_da_Volterra_%28detalle%29.jpg' WHERE oid=31;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Michelangelo_-_Creation_of_Adam_%28cropped%29.jpg/1920px-Michelangelo_-_Creation_of_Adam_%28cropped%29.jpg' WHERE oid=32;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Last_Judgement_%28Michelangelo%29.jpg/800px-Last_Judgement_%28Michelangelo%29.jpg' WHERE oid=33;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/1_Estancia_del_Sello_%28Vista_general_I%29.jpg/1280px-1_Estancia_del_Sello_%28Vista_general_I%29.jpg' WHERE oid=34;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Transfiguration_Raphael.jpg/800px-Transfiguration_Raphael.jpg' WHERE oid=35;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/RAFAEL_-_Madonna_Sixtina_%28Gem%C3%A4ldegalerie_Alter_Meister%2C_Dresden%2C_1513-14._%C3%93leo_sobre_lienzo%2C_265_x_196_cm%29.jpg/800px-RAFAEL_-_Madonna_Sixtina_%28Gem%C3%A4ldegalerie_Alter_Meister%2C_Dresden%2C_1513-14._%C3%93leo_sobre_lienzo%2C_265_x_196_cm%29.jpg' WHERE oid=36;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Rapha%C3%ABl_-_Les_Trois_Gr%C3%A2ces_-_Google_Art_Project_2.jpg/1024px-Rapha%C3%ABl_-_Les_Trois_Gr%C3%A2ces_-_Google_Art_Project_2.jpg' WHERE oid=37;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Sandro_Botticelli_-_La_Primavera_-_Google_Art_Project.jpg/1280px-Sandro_Botticelli_-_La_Primavera_-_Google_Art_Project.jpg' WHERE oid=38;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg/1920px-Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg' WHERE oid=39;
END
$$ language plpgsql
