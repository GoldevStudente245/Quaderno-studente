<?php
include 'gestione.php';
session_start();
$hostname = "localhost";
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";
$dbname = "20241216_5infc_anvar_albergo_hoepli";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['id_cliente'])) {
        echo "Devi prima effettuare il login.
        <a href='accessoDB.html'><button><h3>Torna indietro</h3></button></a>";
        exit;
    }

    $id_cliente = $_SESSION['id_cliente'];
    $Data_di_partenza = $_POST['Data_di_partenza'];
    $Data_di_arrivo = $_POST['Data_di_arrivo'];
    
    $sql = "SELECT * FROM prenotazione";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {

            // Inserisci i dati nel database
            $sql = "INSERT INTO prenotazione (id_cliente, Data_di_partenza, Data_di_arrivo) 
            VALUES ('$id_cliente', '$Data_di_partenza', '$Data_di_arrivo')";
    
            if ($conn->query($sql) === TRUE) {
                echo "Prenotazione effettuata con successo! <br><br>
                <a href='login.php'><button>torna indietro</button></a>";
                exit;
            } else {
                echo "Errore: " . $sql . "<br>" . $conn->error;
            }
    } else {
        echo "Questa prenotazione esiste già!<br><br>
        <a href='login.php'><button>torna indietro</button></a>";
    exit;
        
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>
<body>
    <h2>Prenota un viaggio!</h2>
    <form action="prenotazione.php" method="POST">
        <label for="Data_di_partenza">Inserisci la data di partenza:</label>
        <input type="date" name="Data_di_partenza" required><br><br>

        <label for="Data_di_arrivo">Inserisci la data di arrivo:</label>
        <input type="date" name="Data_di_arrivo" required><br><br>

        <input type="submit" value="Prenota!">
    </form>
<br>
    <a href="login.php"><button>torna indietro</button></a>
</body>
</html>