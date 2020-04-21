<?php

include("func_properties.php");
include("db_connection.php");

$ini_date = $_POST['ini-date'];
$fini_date = $_POST['fini-date'];

$sales = getAllVentas($ini_date, $fini_date);
?>

<head>
  <title>Panel: Gerente</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#17A2B8;">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <?php
  include('nav-ger.php');

  ?>

  <div class="container">
    <center>
      <div class="align-items-center">
        <br>
        <h1 style="color:#fff;">Gerencia</h1>
      </div>
    </center>
  </div>
  </center>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
</body>

</html>