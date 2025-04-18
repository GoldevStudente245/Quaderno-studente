<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menu personale</title>
</head>
<body>
    <h1>ECCO IL TUO MENU':</h1>

<?php
$primi_piatti = $_POST['primi'];
$secondi_piatti = $_POST['secondi'];
$contorno = $_POST['contorno'];
$dolce = $_POST['dolce'];

echo"<h3>Come primo piatto hai scelto:</h3>";
echo $primi_piatti . "<br>". "<br>". "<br>";

echo"<h3>Come secondo piatto hai scelto:</h3>";
echo $secondi_piatti . "<br>". "<br>". "<br>";

echo"<h3>Come contorno hai scelto:</h3>";
echo $contorno . "<br>". "<br>". "<br>";

echo"<h3>Come dolce hai scelto:</h3>";
echo $dolce;
?>

</body>
</html>