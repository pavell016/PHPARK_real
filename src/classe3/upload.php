<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida de Archivos</title>
</head>
<body>
<h2>Subir Imagen</h2>

<form method="post" enctype="multipart/form-data" action="">
    Selecciona una imagen (jpg, png, gif):
    <input type="file" name="archivo"><br><br>
    <input type="submit" name="subir" value="Subir">
</form>

<?php
if (isset($_POST['subir'])) {
    $archivo = $_FILES['archivo'];
    $dir = "uploads/";

    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }

    $nombreArchivo = basename($archivo['name']);
    $ruta = $dir . $nombreArchivo;
    $tipo = strtolower(pathinfo($ruta, PATHINFO_EXTENSION));

    if ($archivo['size'] > 2 * 1024 * 1024) {
        echo "<p style='color:red'>El archivo supera los 2MB.</p>";
    } elseif (!in_array($tipo, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<p style='color:red'>Solo se permiten imágenes jpg, png o gif.</p>";
    } elseif (move_uploaded_file($archivo['tmp_name'], $ruta)) {
        echo "<p style='color:green'>Archivo subido correctamente.</p>";
        echo "<img src='$ruta' width='200'>";
    } else {
        echo "<p style='color:red'>Error al subir el archivo.</p>";
    }
}
?>
</body>
</html>
