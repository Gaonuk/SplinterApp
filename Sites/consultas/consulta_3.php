<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Se obtiene el valor del input del usuario
    $pais = $_POST["pais"];

    #Se construye la consulta como un string
    $query = "SELECT museospais.nombre FROM obras_en, obras,
        (SELECT ubica_en.lid, museosl.nombre FROM ubica_en,
        (SELECT cid FROM ciudades WHERE LOWER(ciudades.pais) LIKE LOWER('%$pais%')) AS cpais,
        (SELECT museos.lid, museos.nombre FROM museos, lugares WHERE museos.lid = lugares.lid) AS museosl
        WHERE cpais.cid = ubica_en.cid AND museosl.lid = ubica_en.lid) AS museospais
        WHERE obras_en.oid = obras.oid AND obras.periodo = 'Renacimiento' AND museospais.lid = obras_en.lid";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db -> prepare($query);
    $result -> execute();
    $iglesias = $result -> fetchAll();

?>

<?php include("../templates/breadcrumbs.html")?>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up" data-aos-delay="100">
      <div class="container">

        <div class="portfolio-details-container">
          <div class="table100 ver2 m-b-110">
            <div class="table100-head">
              <table>
                <thead>
                  <tr class="row100 head">
                    <th class="cell100 column1">Nombre</th>
                  </tr>
                </thead>
              </table>
            </div>
  
            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <?php
                    foreach ($iglesias as $i){
                        echo "<tr class'row100 body'><td class='cell100 column1'>$i[0]</td></tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include('../templates/footer.html')?>
  