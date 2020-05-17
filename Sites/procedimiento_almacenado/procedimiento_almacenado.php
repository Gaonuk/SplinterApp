<?php include('../templates/header.html')?>

  <main id="main">

<?php
    $ciudad_origen = $_POST["ciudad_origen"];
    $fecha = $_POST["fecha"];

?>

<?php
    echo "<p>La fecha es ' . $fecha . ' y la ciudad ' . $ciudad_origen . '</p>";

?>
