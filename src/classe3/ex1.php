<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
<h1>Registro</h1>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<labelfor="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required><br><br>
<label for="apellidos">Apellidos:</label>
<input type="text" id="apellidos" name="apellidos" required><br><br>
<label for="email">Email:</label>
<input type="email" id="email" name="email" required><br><br>
<label for="nacimiento">Fecha de nacimiento:</label>
<input type="date" id="nacimiento" name="nacimiento" required><br><br>
</form>
</main>
</body>
</html>
