<?php include('../templates/header.html')?>

  <main id="main">

  <?php
    # Llama a conexion, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php")

    #Se obtiene el valor del input del usuario
    $pais = $_POST["pais"];

    #Se construye la consulta como un string
    $query = "SELECT nombre FROM obras_en, obras,
        (SELECT ubica_en.lid FROM ubica_en,
        (SELECT cid FROM ciudades WHERE LOWER(ciudades.pais) LIKE LOWER('%$pais%')) AS cpais,
        (SELECT museos.lid FROM museos, lugares WHERE museos.lid = lugares.lid) AS museosl
        WHERE cpais.cid = ubica_en.cid AND museosl.lid = ubica_en.lid) AS museospais
        WHERE obras_en.oid = obras.oid AND obras.periodo = 'Renacimiento' AND museospais.lid = obras_en.lid";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados 
    $result = $db -> prepare($query);
    $result -> execute();
    $iglesias = $result -> fetchAll();

?>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" data-aos="fade-up">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Consultas</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Consultas</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

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
  