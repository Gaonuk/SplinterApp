<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $ciudad = $_POST["ciudad"];
    $apertura = $_POST["apertura"];
    $cierre = $_POST["cierre"];

    #Se construye la consulta como un string
    $query = "SELECT DISTINCT igs_en.nombre, frescos_all.nombre from (select igls.lid, igls.nombre from 
        (select lugares.lid, lugares.nombre from iglesias, lugares where lugares.lid = iglesias.lid 
        and iglesias.horario_in >= '%$apertura%' or iglesias.horario_fin <= '%$cierre%') as igls, ubica_en, ciudades 
        where LOWER(ciudades.nombre) like LOWER('%$ciudad%') and ciudades.cid = ubica_en.cid 
        and igls.lid = ubica_en.lid) as igs_en, (select obras.oid, obras.nombre from obras, frescos 
        where obras.oid = frescos.oid) as frescos_all, obras_en where igs_en.lid = obras_en.lid 
        and obras_en.oid = frescos_all.oid;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db -> prepare($query);
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
  