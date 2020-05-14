<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Se obtiene el valor del input del usuario
    $pais = $_POST["pais"];

    #Se construye la consulta como un string
    $query = "SELECT distinct museos_en.nombre from (select ms.lid, ms.nombre from (select cid from ciudades where lower(ciudades.pais) like LOWER('%$pais%')) as cpais, ubica_en, (select lugares.lid, lugares.nombre from lugares,museos where museos.lid = lugares.lid) as ms where cpais.cid = ubica_en.cid and ms.lid = ubica_en.lid) as museos_en, obras_en, obras where obras.oid = obras_en.oid and museos_en.lid = obras_en.lid and obras.periodo='Renacimiento';";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db_impar -> prepare($query);
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
  