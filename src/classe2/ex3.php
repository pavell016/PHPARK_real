<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$dictionary=[
["Ciudad", "País","Continente"],
["Tokyo", "Japan", "Asia"],
["Mexico City", "Mexico", "North America"],
["New York City", "USA", "North America"],
["Mumbai", "India", "Asia"],
["Seoul", "South Korea", "Asia"],
["Shanghai", "China", "Asia"],
["Lagos", "Nigeria", "Africa"],
["Buenos Aires", "Argentina", "South America"],
["Cairo", "Egypt", "Africa"],
["London", "UK", "Europe"]
];
$usa=0;
$NA=0;
for($i=0; $i < count($dictionary); $i++) {
    if($dictionary[$i][1]=="USA"){
        $usa++;
    }
    if($dictionary[$i][2]=="North America"){
        $NA++;
    }
}
echo "Ciudades en USA: $usa <br>";
echo "Ciudades en Norte América: $NA";
?>
</body>
</html>
