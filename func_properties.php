<?php

function validarUsuario($usuario, $password)
{
	$sql = "SELECT * FROM user WHERE username = '" . $usuario . "' AND password ='" . $password . "'";
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
	return ($res);
}

function getTipoUsuario($idUsuario)
{
	$sql = "SELECT access FROM user WHERE id_user = '" . $idUsuario . "'";
	$result = (sqlSelect($sql));
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}
	if (count($rows) > 0) {
		$res = $rows[0]['access'];
	} else {
		$res = 0;
	}
	return ($res);
}
