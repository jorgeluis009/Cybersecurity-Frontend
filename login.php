<?php
session_start();
include("func_properties.php");
include("db_connection.php");
if ($_POST) {
    $post_usuario = $_POST['usuario'];
    $post_pass = $_POST['password'];

    $id_usuario = validarUsuario($post_usuario, $post_pass);
    if ($id_usuario <> 0) {
        $tipo_usuario = getTipoUsuario($id_usuario);
        $_SESSION['username'] = $post_usuario;
        if ($tipo_usuario == "manager") {
            header("Location:ini-ger.php");
        } else {
            header("Location:ini-vend.php");
        }
    } else {
        $label = "Usuario o contraseñas incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang=en>

<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#17A2B8;">
    <?php
    include('nav-ini.php')
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <div class="container">
        <div class="align-items-md-center" style="min-height: 100%; display: grid;">
            <div class="col-6 shadow rounded p-3 mb-5 mx-auto px-auto" style=" background-color: lightgray; margin-top: 3rem !important;">
                <form method="post" action="login.php">
                    <h3 class="text-center text-info">Iniciar sesión</h3>
                    <div class="form-group">
                        <label for="username" class="text-info">Usuario:</label><br>
                        <input type="text" name="usuario" id="usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <label for="remember-me" class="text-info"><span>Recordarme</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <button type="submit" name="entrar" class="btn btn-primary" placeholder="Iniciar sesion" required="required"> Iniciar sesion</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>