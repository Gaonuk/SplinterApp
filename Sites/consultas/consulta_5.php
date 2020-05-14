<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $ciudad = $_POST["ciudad"];
    $apertura = $_POST["apertura"];
    $cierre = $_POST["cierre"];

    #Se construye la consulta como un string
    $query = "SELECT DISTINCT lugar_ciudad.nombre, frescos_lugar.nombre FROM (SELECT lid FROM iglesias WHERE horario_in >= '$apertura' OR horario_fin <= '$cierre') AS iglesiash, (SELECT lugares.lid, lugares.nombre FROM lugares, ciudades, ubica_en WHERE LOWER(ciudades.nombre) LIKE LOWER('%$ciudad%') AND ciudades.cid = ubica_en.cid AND lugares.lid = ubica_en.lid) AS lugar_ciudad, (SELECT obras_en.lid, obras.nombre FROM obras, frescos, obras_en WHERE obras.oid = frescos.oid AND obras_en.oid = obras.oid) AS frescos_lugar WHERE iglesiash.lid = lugar_ciudad.lid AND iglesiash.lid = frescos_lugar.lid;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db_par -> prepare($query);
    $result -> execute();
    $tuplas = $result -> fetchAll();

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
                    <th class="cell100 column1">Nombre Iglesia</th>
                    <th class="cell100 column2">Nombre Fresco</th>
                  </tr>
                </thead>
              </table>
            </div>
  
            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <?php
                    foreach ($tuplas as $t){
                        echo "<tr class'row100 body'><td class='cell100 column1'>$t[0]</td> <td class='cell100 column2'>$t[1]</td></tr>";
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
  