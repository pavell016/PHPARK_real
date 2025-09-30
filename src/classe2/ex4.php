<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function eliminaun($arr, $el){
    unset($arr[array_search($el, $arr)]);
    return $arr;
}
$miArray = array(1, 2, 3, 4, 5, 3);
$elementoAEliminar = 1;
$nuevoArray = eliminaun($miArray, $elementoAEliminar);
print_r($nuevoArray);
?>
</body>
</html>
