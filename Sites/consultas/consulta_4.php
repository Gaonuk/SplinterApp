<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Se construye la consulta como un string
    $query = "SELECT artistas.nombre, COUNT(obras.nombre) AS cantidad_obras
    FROM artistas, obras, realizo 
    WHERE realizo.oid = obras.oid AND artistas.aid = realizo.aid GROUP BY artistas.nombre;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $artistas = $result -> fetchAll();

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
                    <th class="cell100 column1">Numero de obras</th>
                  </tr>
                </thead>
              </table>
            </div>
  
            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <?php
                    foreach ($artistas as $a){
                        echo "<tr class'row100 body'><td class='cell100 column1'>$a[0]</td> <td class='cell100 column2'>$a[1]</td></tr>";
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
  