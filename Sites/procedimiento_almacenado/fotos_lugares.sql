CREATE OR REPLACE FUNCTION fotos_lugares()
RETURNS void AS $$
BEGIN
    UPDATE lugares SET foto_url= 'https://visitavirtual.info/wp-content/uploads/2017/08/piramide-museo-del-louvre.jpg' WHERE oid=1;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Florence%2C_Italy_Uffizi_Museum_-_panoramio_%285%29.jpg/275px-Florence%2C_Italy_Uffizi_Museum_-_panoramio_%285%29.jpg' WHERE oid=2;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Basilica_di_San_Pietro_in_Vaticano_September_2015-1a.jpg/270px-Basilica_di_San_Pietro_in_Vaticano_September_2015-1a.jpg' WHERE oid=3;
    UPDATE lugares SET foto_url= 'https://turismo.org/wp-content/uploads/2013/04/Museos-Vaticanos-760x500.jpg' WHERE oid=4;
    UPDATE lugares SET foto_url= 'https://www.inexhibit.com/wp-content/uploads/2014/06/Royal-Academy-of-Arts-London-facade.jpg' WHERE oid=5;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Church_St_Maria_del_popolo_1.jpg/250px-Church_St_Maria_del_popolo_1.jpg' WHERE oid=6;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Nancy_Musee_des_Beaux-Arts_BW_2015-07-18_13-55-20.jpg/275px-Nancy_Musee_des_Beaux-Arts_BW_2015-07-18_13-55-20.jpg' WHERE oid=7;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Nuovo_museo_dell%27opera_del_duomo%2C_facciatone_arnolfiano_di_santa_maria_del_fiore%2C_000.jpg/200px-Nuovo_museo_dell%27opera_del_duomo%2C_facciatone_arnolfiano_di_santa_maria_del_fiore%2C_000.jpg' WHERE oid=8;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/View_of_Santa_Maria_del_Fiore_in_Florence.jpg/300px-View_of_Santa_Maria_del_Fiore_in_Florence.jpg' WHERE oid=9;
    UPDATE lugares SET foto_url= 'https://cdn.civitatis.com/italia/roma/galeria/thumbs/campo-dei-fiori.jpg' WHERE oid=10;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Caspar_van_Wittel_-_Piazza_Navona%2C_Rome_-_Google_Art_Project.jpg/400px-Caspar_van_Wittel_-_Piazza_Navona%2C_Rome_-_Google_Art_Project.jpg' WHERE oid=11;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Santa_Maria_della_Vittoria_in_Rome_-_Front.jpg/250px-Santa_Maria_della_Vittoria_in_Rome_-_Front.jpg' WHERE oid=12;
    UPDATE lugares SET foto_url= 'https://sobreitalia.com/wp-content/uploads/2009/04/plaza-minerva-en-roma.jpg' WHERE oid=13;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/St_Peter%27s_Square%2C_Vatican_City_-_April_2007.jpg/300px-St_Peter%27s_Square%2C_Vatican_City_-_April_2007.jpg' WHERE oid=14;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Galleria_borghese_facade.jpg/275px-Galleria_borghese_facade.jpg' WHERE oid=15;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Broodhuis_Bruxelles.jpg/300px-Broodhuis_Bruxelles.jpg' WHERE oid=16;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/3048_-_Milano_-_S._Maria_delle_Grazie_-_Facciata_-_Foto_Giovanni_Dall%27Orto_-_6-Mar-2008.jpg/250px-3048_-_Milano_-_S._Maria_delle_Grazie_-_Facciata_-_Foto_Giovanni_Dall%27Orto_-_6-Mar-2008.jpg' WHERE oid=17;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Galleria_dell%27accademia%2C_firenze.JPG/275px-Galleria_dell%27accademia%2C_firenze.JPG' WHERE oid=18;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/San_pietro_in_vincoli%2C_esterno.JPG/1024px-San_pietro_in_vincoli%2C_esterno.JPG' WHERE oid=19;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Sistina-interno.jpg/270px-Sistina-interno.jpg' WHERE oid=20;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Dresden-Zwinger-Courtyard.11.JPG/275px-Dresden-Zwinger-Courtyard.11.JPG' WHERE oid=21;
    UPDATE lugares SET foto_url= 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Chateau_de_Chantilly_garden.jpg/275px-Chateau_de_Chantilly_garden.jpg' WHERE oid=22;
END
$$ language plpgsql
