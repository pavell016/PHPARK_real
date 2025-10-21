<?php
session_start();
$usuario_valido = "admin";
$clave_valida = "12345";
$user_id_fijo = 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

<form method="post" action="">
    User: <input type="text" name="usuario"><br><br>
    Passwd: <input type="password" name="passwd"><br><br>
    <input type="submit" name="login" value="Entrar">
</form>

<?php
if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['passwd'];

    if ($usuario === $usuario_valido && $clave === $clave_valida) {
        $_SESSION['user_id'] = $user_id_fijo;
        echo "<p style='color:green'>Bienvenido, $usuario!</p>";
        echo "<a href=''>Cerrar sesión</a>";
    } else {
        echo "<p style='color:red'>Usuario o contraseña incorrectos.</p>";
    }
}
?>
</body>
</html>
