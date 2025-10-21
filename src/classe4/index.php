<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Registrar Libro</h1>

<form method="post" action="">
    Título: <input type="text" name="titulo"><br><br>
    Autor: <input type="text" name="autor"><br><br>
    Año de publicación: <input type="date" name="anio"><br><br>
    Número de páginas: <input type="text" name="paginas"><br><br>
    <input type="submit" name="guardar" value="Guardar">
<?php include 'verificacions.php'; ?>
</form>
</body>
</html>
