<?php
	include "../usuario/session.php";
	include('../templates/main_header.html') ?>
<?php
    $desired = $_POST['desired'];
    $required = $_POST['required'];
    $forbidden = $_POST['forbidden'];
    $udi = $_POST['uid'];
    $url = 'https://gorgeous-wind-cave-51826.herokuapp.com/text_search';
    $data = array(
        'desired' => explode(';', $desired),
        'required' => explode(';', $required),
        'forbidden' => explode(';', $forbidden),
        'uid' => $uid
    );
    $options = array(
        'http' => array(
          'method'  => 'GET',
          'content' => json_encode( $data ),
          'header'=>  "Content-Type: application/json\r\n" .
                      "Accept: application/json\r\n"
          )
      );
      $context  = stream_context_create( $options );
      $result = file_get_contents( $url, false, $context );
      $response = json_decode( $result );
      print_r $response
?>

