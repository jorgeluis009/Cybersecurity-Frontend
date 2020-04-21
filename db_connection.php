<?php
$servername = "localhost";
$dbusername = "root";
$dbname = "controlventas";
$password = "";

function sqlSelect($sql)
{
	global $servername, $dbusername, $password, $dbname;
	$conn = mysqli_connect($servername, $dbusername, $password, $dbname);
	if (!$conn) {

		die("Connection failed: " . mysqli_connect_error());
	}

	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);
	return ($result);
}

function sqlInsert($usuario, $cliente, $empresa, $concepto, $monto, $fecha, $validada, $comission)
{
	global $servername, $dbusername, $password, $dbname;
	$conn = mysqli_connect($servername, $dbusername, $password, $dbname);
	if (!$conn) {
		die("Fallo la conexion: " . mysqli_connect_error());
	}
	$_SESSION['username'] = $usuario;
	$sql = "SELECT * FROM user WHERE username = '" . $usuario . "' ";
	$result = (sqlSelect($sql));
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}
	if (count($rows) > 0) {
		$res = $rows[0]['id_user'];
		$_SESSION['id_user'] = $usuario;
	}
	echo $rows[0]['id_user'];

	$sql = "INSERT INTO sale (id_seller, client_name, company_name, sale_concept, sale_amount, sale_date, validate) VALUES (" . $rows[0]['id_user'] . ", '" . $cliente . "', '" . $empresa . "', '" . $concepto . "', '" . $monto . "', '" . date("Y-m-d", strtotime($fecha)) . "', '" . $validada . "', '" . $comission . "')";

	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);
}

function getAllVentas($ini_date, $fini_date)
{
	global $servername, $dbusername, $password, $dbname;
	$conn = mysqli_connect($servername, $dbusername, $password, $dbname);
	if (!$conn) {
		die("Fallo la conexion: " . mysqli_connect_error());
	}

	if (empty($ini_date) or empty($fini_date)) {
		$sql = "SELECT client_name,company_name, sale_concept, sale_amount, sale_date, validate, comission FROM sale";
	} else	$sql = "SELECT client_name,company_name, sale_concept, sale_amount, sale_date, validate, comission FROM sale WHERE sale_date BETWEEN '" . $ini_date . "' and '" . $fini_date . "'";
	//$sql = "SELECT client_name,company_name, sale_concept, sale_amount, sale_date, validate, comission FROM sale";
	$result = (sqlSelect($sql));
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}

	return $rows;
}
