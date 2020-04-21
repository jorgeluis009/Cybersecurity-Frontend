<?php


session_start();
$varsession = $_SESSION['username'];
if (empty($varsession)) {
  header("Location: login.php");
  echo 'No tiene autorización';
}

?>

<center>
  <div class="align-items-center bg-dark">
    <h1 style="color:lightgray;padding:13px;">
      Bievenido, <?php echo $_SESSION['username'] ?>
    </h1>
    <b style="color:white;">En este panel podrá controlar sus ventas</b>
  </div>
</center>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class=" nav-item">
      <a class="nav-link" href="ini-vend.php">Inicio</a>
    </li>
    <li class=" nav-item">
      <a class="nav-link" href="ventas.php">Crear venta</a>
    </li>
    <li class=" nav-item">
      <a class="nav-link" href="logout.php">Cerrar sesión</a>
    </li>
  </ul>
</nav>