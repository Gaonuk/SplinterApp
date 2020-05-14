<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT lugar_periodo.nombre
    FROM
    (SELECT lugares.nombre, COUNT(DISTINCT obras.periodo) AS cantidad_periodo 
    FROM lugares, obras, obras_en
    WHERE obras.oid = obras_en.oid and lugares.lid = obras_en.lid 
    GROUP BY lugares.nombre) AS lugar_periodo,
    (SELECT COUNT(DISTINCT periodo) AS total_periodo FROM obras) AS total
    WHERE total.total_periodo = lugar_periodo.cantidad_periodo;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $result = $result -> fetchAll();

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
                    <th class="cell100 column1">Nombre Lugar</th>
                  </tr>
                </thead>
              </table>
            </div>
  
            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <?php
                    foreach ($result as $r){
                        echo "<tr class'row100 body'><td class='cell100 column1'>$r[0]</td></tr>";
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
  