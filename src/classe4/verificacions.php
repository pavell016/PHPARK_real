<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $anio = $_POST['anio'];
    $paginas = $_POST['paginas'];

    if (empty($titulo) || empty($autor) || empty($anio) || empty($paginas)) {
        echo "<p style='color:red'>Todos los campos son obligatorios.</p>";
    } elseif (!is_numeric($paginas)) {
        echo "<p style='color:red'>El número de páginas debe ser numérico.</p>";
    } else {
        // Conexión a la base de datos
        include 'serversettings.php';
        try {
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insertar el libro en la base de datos
            $stmt = $pdo->prepare("INSERT INTO libros (titulo, autor, anio_publicacion, num_paginas) VALUES
            (:titulo, :autor, :anio, :paginas)");
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':autor', $autor);
            $stmt->bindParam(':anio', $anio);
            $stmt->bindParam(':paginas', $paginas);
            $stmt->execute();

            echo "<h3>Libro registrado con éxito:</h3>";
            echo "Título: $titulo<br>Autor: $autor<br>Año: $anio<br>Páginas: $paginas";
        } catch (PDOException $e) {
            echo "<p style='color:red'>Error al conectar con la base de datos: " . $e->getMessage() . "</p>";
        }
    }
}
