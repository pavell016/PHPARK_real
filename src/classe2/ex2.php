<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$url="https://gracia.sallenet.org/login/index.php";
echo substr($url, -9)."<br>";
echo explode("/", $url)[4]."<br>";
?>
</body>
</html>
