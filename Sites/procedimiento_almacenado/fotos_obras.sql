CREATE OR REPLACE FUNCTION fotos_obras()
RETURNS void AS $$
BEGIN
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/4/4d/Andrea_Mantegna_089.jpg' WHERE oid=1;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Anunciaci%C3%B3n_(Leonardo,_Uffizi)#/media/Archivo:Annunciation_(Leonardo).jpg' WHERE oid=2;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Bautismo_de_Cristo_(Verrocchio)#/media/Archivo:The_Baptism_of_Christ_(Verrocchio_&_Leonardo).jpg' WHERE oid=3;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Estatua_de_San_Pedro_(bas%C3%ADlica_de_San_Pedro)#/media/Archivo:Rome_basilica_st_peter_011c.jpg' WHERE oid=4;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Santo_Entierro_(Caravaggio)#/media/Archivo:Michelangelo_Caravaggio_052.jpg' WHERE oid=5;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Tondo_Taddei#/media/Archivo:Taddei_Tondo.JPG' WHERE oid=6;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Crucifixi%C3%B3n_de_San_Pedro_(Caravaggio)#/media/Archivo:Martirio_di_San_Pietro_September_2015-1a.jpg' WHERE oid=7;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_Anunciaci%C3%B3n_(Caravaggio)#/media/Archivo:Caravaggio_-_The_Annunciation.JPG' WHERE oid=8;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_cabeza_de_Medusa#/media/Archivo:Medusa_by_Caravaggio.jpg' WHERE oid=9;
    UPDATE obras SET foto_url= 'https://en.wikipedia.org/wiki/Penitent_Magdalene_(Donatello)#/media/File:Donatello,_maria_maddalena_02.JPG' WHERE oid=10;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_Libertad_guiando_al_pueblo#/media/Archivo:Eug%C3%A8ne_Delacroix_-_Le_28_Juillet._La_Libert%C3%A9_guidant_le_peuple.jpg' WHERE oid=11;
    UPDATE obras SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Giorgio_Vasari_-_The_Last_Judgment_-_WGA24313.jpg' WHERE oid=12;
    UPDATE obras SET foto_url= '' WHERE oid=13;
    UPDATE obras SET foto_url= '' WHERE oid=14;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Fuente_de_Neptuno_(Plaza_Navona,_Roma)#/media/Archivo:Fountain_of_Neptune,_Rome.jpg' WHERE oid=15;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Fuente_de_los_Cuatro_R%C3%ADos#/media/Archivo:Lazio_Roma_Navona2_tango7174.jpg' WHERE oid=16;
    UPDATE obras SET foto_url= '' WHERE oid=17;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/%C3%89xtasis_de_Santa_Teresa#/media/Archivo:Ecstasy_St_Theresa_SM_della_Vittoria.jpg' WHERE oid=18;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Obelisco_de_la_Piazza_della_Minerva#/media/Archivo:Minerveo_obelisk_in_front_of_Santa_Maria_sopra_Minerva.jpg' WHERE oid=19;
    UPDATE obras SET foto_url= 'https://c8.alamy.com/compes/mf5rmy/la-columnata-de-gian-lorenzo-bernini-en-la-plaza-de-san-pedro-y-carlo-maderno-fachada-del-renacimiento-italiano-papale-basilica-maggiore-di-san-pietro-en-vatic-mf5rmy.jpg' WHERE oid=20;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Apolo_y_Dafne_(Bernini)#/media/Archivo:Apollo_and_Daphne_(Bernini).jpg' WHERE oid=21;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Maest%C3%A0_di_Ognissanti#/media/Archivo:Giotto_di_Bondone_090.jpg' WHERE oid=22;
    UPDATE obras SET foto_url= '' WHERE oid=23;
    UPDATE obras SET foto_url= 'https://it.wikipedia.org/wiki/Polittico_di_Badia#/media/File:Giotto._The_Badia_Polyptych._c._1300._91x340cm._Uffizi,_Florence..jpg' WHERE oid=24;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_consagraci%C3%B3n_de_Napole%C3%B3n#/media/Archivo:Jacques-Louis_David_-_The_Coronation_of_Napoleon_(1805-1807).jpg' WHERE oid=25;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Manneken_Pis#/media/Archivo:Bruxelles_Manneken_Pis.jpg' WHERE oid=26;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_%C3%BAltima_cena_(Leonardo_da_Vinci)#/media/Archivo:The_Last_Supper_-_Leonardo_Da_Vinci_-_High_Resolution_32x16.jpg' WHERE oid=27;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_Gioconda#/media/Archivo:Leonardo_da_Vinci_-_Mona_Lisa_(Louvre,_Paris).jpg' WHERE oid=28;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Piedad_del_Vaticano#/media/Archivo:Michelangelo\'s_Pieta_5450_cropncleaned.jpg' WHERE oid=29;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Archivo:Miguel_%C3%81ngel,_por_Daniele_da_Volterra_(detalle).jpg' WHERE oid=31;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_creaci%C3%B3n_de_Ad%C3%A1n#/media/Archivo:Michelangelo_-_Creation_of_Adam_(cropped).jpg' WHERE oid=32;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/El_Juicio_Final_(Capilla_Sixtina)#/media/Archivo:Last_Judgement_(Michelangelo).jpg' WHERE oid=33;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Estancias_de_Rafael#/media/Archivo:1_Estancia_del_Sello_(Vista_general_I).jpg' WHERE oid=34;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_transfiguraci%C3%B3n_(Rafael)#/media/Archivo:Transfiguration_Raphael.jpg' WHERE oid=35;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Madonna_Sixtina_(Rafael)#/media/Archivo:RAFAEL_-_Madonna_Sixtina_(Gem%C3%A4ldegalerie_Alter_Meister,_Dresden,_1513-14._%C3%93leo_sobre_lienzo,_265_x_196_cm).jpg' WHERE oid=36;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/Las_Gracias_(Rafael)#/media/Archivo:Rapha%C3%ABl_-_Les_Trois_Gr%C3%A2ces_-_Google_Art_Project_2.jpg' WHERE oid=37;
    UPDATE obras SET foto_url= 'https://es.wikipedia.org/wiki/La_primavera_(Botticelli)#/media/Archivo:Sandro_Botticelli_-_La_Primavera_-_Google_Art_Project.jpg' WHERE oid=38;
    UPDATE obras SET foto_url= "https://es.wikipedia.org/wiki/El_nacimiento_de_Venus_(Botticelli)#/media/Archivo:Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg" WHERE oid=39;
END
$$ language plpgsql
