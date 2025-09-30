<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function elimina($arr, $el){
    $resultado = array();
    foreach($arr as $item){
        if($item !== $el){
            $resultado[] = $item;
        }
    }
    return $resultado;
}
$miArray = array(1, 2, 3, 4, 5, 3);
$elementoAEliminar = 3;
$nuevoArray = elimina($miArray, $elementoAEliminar);
print_r($nuevoArray);
?>
</body>
</html>
