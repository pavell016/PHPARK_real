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
    <title>Inicio de Sesión</title>
</head>
<body>
<h2>Inicio de Sesión</h2>

<form method="post" action="">
    Usuario: <input type="text" name="usuario"><br><br>
    Contraseña: <input type="password" name="clave"><br><br>
    <input type="submit" name="login" value="Entrar">
</form>

<?php
if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if ($usuario === $usuario_valido && $clave === $clave_valida) {
        $_SESSION['user_id'] = $user_id_fijo;
        echo "<p style='color:green'>Bienvenido, $usuario!</p>";
        echo "<a href='logout.php'>Cerrar sesión</a>";
    } else {
        echo "<p style='color:red'>Usuario o contraseña incorrectos.</p>";
    }
}
?>
</body>
</html>
