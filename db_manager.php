<?php
$servername = "localhost";
$dbusername = "root";
$dbname = "controlventas";
$password = "";

function sqlSelect($sql)
{
	$conn = dbConnect();
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	return ($result);
}

function sqlInsert($usuario, $cliente, $empresa, $concepto, $monto, $fecha)
{
	$conn = dbConnect();
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
	$sql = "INSERT INTO sale (id_user, client_name, company_name, sale_concept, sale_amount, sale_date) VALUES (" . $rows[0]['id_user'] . ", '" . $cliente . "', '" . $empresa . "', '" . $concepto . "', '" . $monto . "', '" . date("Y-m-d", strtotime($fecha)) . "')";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function getAllSales($ini_date, $fini_date)
{
	$conn = dbConnect();
	if (empty($ini_date) or empty($fini_date)) {
		$sql = "SELECT client_name,company_name, sale_concept, sale_amount, sale_date FROM sale";
	} else	$sql = "SELECT client_name,company_name, sale_concept, sale_amount, sale_date FROM sale WHERE sale_date BETWEEN '" . $ini_date . "' and '" . $fini_date . "'";
	$result = (sqlSelect($sql));
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}
	mysqli_close($conn);
	return $rows;
}

function deleteUser($usuario)
{
	$conn = dbConnect();
	$sql = 'SELECT id_user FROM sale where client_name=' . "'$usuario'" . ' limit 1';
	$result = (sqlSelect($sql));
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}
	if (count($rows) > 0) {
		$res = $rows;
	} else {
		$res = 0;
	}
	$id_user =  $res[0]['id_user'];
	$sql = 'DELETE FROM sale WHERE id_user=' . $id_user;
	$result = (sqlSelect($sql));
	return $res;
	mysqli_close($conn);
}

function validateUser($usuario, $pass)
{
	$conn = dbConnect();
	$sql = "SELECT * FROM user WHERE username = '" . $usuario . "' AND password ='" . $pass . "'";
	$result = (sqlSelect($sql));
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}
	if (count($rows) > 0) {
		$res = $rows[0]['id_user'];
		$_SESSION['username'] = $usuario;
	} else {
		$res = 0;
	}
	mysqli_close($conn);
	return ($res);
}

function dbConnect()
{
	global $servername, $dbusername, $password, $dbname;
	$conn = mysqli_connect($servername, $dbusername, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}
