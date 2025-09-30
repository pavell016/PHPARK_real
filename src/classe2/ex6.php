<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function sumaDigitos($num){
    $suma=0;
    while($num > 0){
        $digito = $num % 10;
        $suma += $digito;
        $num = (int)($num / 10);
    }
    return $suma;
}
echo sumaDigitos(12345);
?>
</body>
</html>
