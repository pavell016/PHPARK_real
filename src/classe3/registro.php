<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
</head>
<body>
<h2>Formulario de Registro</h2>

<form method="post" action="">
    Nombre: <input type="text" name="nombre"><br><br>
    Apellido: <input type="text" name="apellido"><br><br>
    Correo electrónico: <input type="email" name="email"><br><br>
    Fecha de nacimiento: <input type="date" name="fecha_nac"><br><br>
    <input type="submit" name="enviar" value="Registrar">
</form>

<?php
if (isset($_POST['enviar'])) {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $fecha_nac = $_POST['fecha_nac'];

    // Validaciones
    if (empty($nombre) || empty($apellido) || empty($email) || empty($fecha_nac)) {
        echo "<p style='color:red'>Todos los campos son obligatorios.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red'>El correo no tiene un formato válido.</p>";
    } else {
        $fechaNacimiento = new DateTime($fecha_nac);
        $hoy = new DateTime();
        $edad = $hoy->diff($fechaNacimiento)->y;

        if ($edad < 18) {
            echo "<p style='color:red'>Debes tener al menos 18 años.</p>";
        } else {
            echo "<h3>Registro exitoso</h3>";
            echo "Nombre: $nombre $apellido<br>";
            echo "Correo: $email<br>";
            echo "Fecha de nacimiento: $fecha_nac<br>";
            echo "Edad: $edad años<br>";
        }
    }
}
?>
</body>
</html>
