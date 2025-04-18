<?php
// Connessione al database
$servername = "localhost";
$username = "Anvar"; // Il tuo username per il DB
$password = "dslkfjewrt20985u0gj"; // La tua password per il DB
$dbname = "20250107_5infC_Anvar_cinema_virtuale"; // Il nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    
        $citta = $_POST['citta'];
        $sala = $_POST['sala'];
        $data = $_POST['data'];
        $ora = $_POST['ora'];
        $num_di_spettatori = $_POST['num_di_spettatori'];

        // Inserisci i dati nel database
        $sql = "INSERT INTO Proiezione (citta, sala, data, ora, num_di_spettatori) 
        VALUES ('$citta', '$sala', '$data', '$ora', '$num_di_spettatori')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Hai aggiunto una nuova proiezione! <br> <br>
            <a href='compito_20250107.html'><button>Torna indietro</button></a>";
            exit;

        } else {
                // Se non ci sono risultati, mostra il messaggio di errore e il pulsante
                echo "Nessuna proiezione trovata!<br>";
                echo "<a href='add_proiezione.php'><button>Inserisci una nuova proiezione!</button></a>";
                echo "<br><a href='index.php'><button>Torna indietro</button></a>";
                exit;
            }
        }  

?>
<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi proiezione</title>
</head>

<body>
    <h2>Aggiungi una nuova proiezione!</h2>
    <form action="add_proiezione.php" method="POST">

        <label for="citta">Inserisci la citta' della proiezione:</label>
        <input type="text" name="citta" required><br><br>

        <label for="sala">Inserisci il numero della sala in cui è stata proiettato:</label>
        <input type="number" name="sala" required><br><br>

        <label for="data">Inserisci la data della proiezione:</label>
        <input type="date" name="data" required><br><br>

        <label for="ora">Inserisci la durata della proiezione:</label>
        <input type="time" name="ora" required><br><br>

        <label for="num_di_spettatori">Inserisci il numero di spettatori contenti nella sala:</label>
        <input type="number" name="num_di_spettatori" required><br><br>
        <br><br>
        <input type="submit" value="Aggiungi!">
    </form>
<br>
    <a href="index.php"><button>Torna indietro</button></a>
</body>
</html>