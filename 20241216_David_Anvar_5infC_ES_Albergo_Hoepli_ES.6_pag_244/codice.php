<?php
include 'gestione.php';
$hostname = "localhost";
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";
$dbname = "20241216_5infc_anvar_albergo_hoepli";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $codice = $_POST['codice'];

    if($codice == '12345'){
        echo "accesso consentito! <br><br>
        <a href='area_riservata.php'><button>accedi!</button></a>
        <br><br><br>
        <a href='login.php'><button><h3>Torna indietro</h3></button></a>";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

il codice è (12345) <br><br>
    <form action="codice.php" method="POST">
<label for="codice">Inserisci il codice per accedere all'area riservata:</label>
<input type="password" name="codice">

<input type="submit" value="invia">
</form>
<br><br><br>
<a href="login.php"><button><h3>Torna indietro</h3></button></a>
</body>
</html>