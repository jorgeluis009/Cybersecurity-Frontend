<?php

include("db_manager.php");

session_start();
error_reporting(E_ERROR | E_PARSE);

$username = $_SESSION['username'];

if ($_POST) {
  $post_client = $_POST['client'];
  $post_company = $_POST['company'];
  $post_concept = $_POST['concept'];
  $post_amount = $_POST['amount'];
  $post_date = $_POST['date'];
  sqlInsert($username, $post_client, $post_company, $post_concept, $post_amount, $post_date);
}

?>
<html>

<head>
  <title>Vendedor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#17A2B8;">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/daterangepicker.css" />
  <?php
  include('nav-vend.php')
  ?>

  <div class="container">
    <center>
      <div class="align-items-center">
        <br>
        <h1>Crear venta</h1>
      </div>
      <div class="align-items-md-center" style="min-height: 100%; display: grid;">
        <div class="col-6 shadow rounded p-3 mx-auto" style=" background-color: lightgray; margin-bottom:9rem;">
          <form action="ventas.php" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="client" id="client" placeholder="Ingrese nombre del cliente" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="company" id="company" placeholder="Ingrese nombre de empresa" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="concept" id="concept" placeholder="Ingrese concepto de venta" required>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" name="amount" id="amount" placeholder="Ingrese monto de venta" required>
            </div>
            <div class="form-group">
              <input placeholder="Ingrese fecha de venta" class="form-control" name="date" id="date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Crear</button>
        </div>
        </form>
      </div>
    </center>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>