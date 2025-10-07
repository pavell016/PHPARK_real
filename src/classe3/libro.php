<?php
class Libro {
    private $titulo;
    private $autor;
    private $anio;
    private $paginas;

    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setAutor($autor) { $this->autor = $autor; }
    public function setAnio($anio) { $this->anio = $anio; }
    public function setPaginas($paginas) { $this->paginas = $paginas; }

    public function getResumen() {
        return "Título: {$this->titulo}<br>
                Autor: {$this->autor}<br>
                Año: {$this->anio}<br>
                Páginas: {$this->paginas}";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Libros</title>
</head>
<body>
<h2>Registrar Libro</h2>

<form method="post" action="">
    Título: <input type="text" name="titulo"><br><br>
    Autor: <input type="text" name="autor"><br><br>
    Año de publicación: <input type="text" name="anio"><br><br>
    Número de páginas: <input type="text" name="paginas"><br><br>
    <input type="submit" name="guardar" value="Guardar">
</form>

<?php
if (isset($_POST['guardar'])) {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $anio = $_POST['anio'];
    $paginas = $_POST['paginas'];

    if (empty($titulo) || empty($autor) || empty($anio) || empty($paginas)) {
        echo "<p style='color:red'>Todos los campos son obligatorios.</p>";
    } elseif (!is_numeric($anio) || !is_numeric($paginas)) {
        echo "<p style='color:red'>El año y las páginas deben ser numéricos.</p>";
    } else {
        $libro = new Libro();
        $libro->setTitulo($titulo);
        $libro->setAutor($autor);
        $libro->setAnio($anio);
        $libro->setPaginas($paginas);

        echo "<h3>Libro registrado:</h3>";
        echo $libro->getResumen();
    }
}
?>
</body>
</html>
