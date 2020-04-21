<?php

//include database properties
include("db_manager.php");
//exclude warnings messages
error_reporting(E_ERROR | E_PARSE);

//if vars are undefined, set them
if (!isset($ini_date))    $ini_date = $_POST['ini-date'];
if (!isset($fini_date))   $ini_date = $_POST['fini-date'];

//get all sales from db
$sales = getAllSales($ini_date, $fini_date);
?>

<head>
  <title>Vendedor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#17A2B8;">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <?php
  include('nav-vend.php');

  ?>

  <div class="container">
    <center>
      <div class="align-items-center">
        <br>
        <h1 style="color:#fff;">Ventas</h1>
      </div>
      <form class="align-items-md-center" style="min-height: 100%; display: grid;" action="ini-vend.php" method="POST">
        <div class="col-md-7 shadow rounded p-3 mx-auto" style=" background-color: lightgray; margin-bottom:9rem;">
          <div class="container">
            <div class="grid">
              <br>
              <br>
              <div class="col-md-12 row">
                <input placeholder="Fecha inicio" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="ini-date" name="ini-date">
                <br>
                <br>
                <br>
                <br>
                <input placeholder="Fecha fin" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="fini-date" name="fini-date">
              </div>
            </div>
          </div>
          <br>
          <br>
          <div class=" row justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary">Filtrar</button>
          </div>
          <br>
        </div>
      </form>
      <div class="row my-4 pb-4">
        <table class="table" id="tabla">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Empresa</th>
              <th>Concepto</th>
              <th>Monto</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($sales as $row) {
              echo '<tr>';
              echo '<td>' . $row['client_name'] . '</td>';
              echo '<td>' . $row['company_name'] . '</td>';
              echo '<td>' . $row['sale_concept'] . '</td>';
              echo '<td>$' . $row['sale_amount'] . '</td>';
              echo '<td>' . date("Y-m-d", strtotime($row['sale_date'])) . '</td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  </center>
  </div>
</body>

</html>