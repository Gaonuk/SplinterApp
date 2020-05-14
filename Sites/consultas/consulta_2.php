<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT nombre FROM lugares, plazas, 
    (SELECT lid FROM obras_en,
    (SELECT oid FROM realizo ,
    (SELECT aid FROM artistas WHERE nombre LIKE 'Gian Lorenzo Bernini') AS gid
    WHERE realizo.aid = gid.aid) AS ogid
    WHERE ogid.oid = obras_en.oid) AS logid
    WHERE plazas.lid = lugares.lid AND logid.lid = lugares.lid;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $plazas = $result -> fetchAll();

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
                    foreach ($plazas as $p){
                        echo "<tr class'row100 body'><td class='cell100 column1'>$p[0]</td></tr>";
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
  