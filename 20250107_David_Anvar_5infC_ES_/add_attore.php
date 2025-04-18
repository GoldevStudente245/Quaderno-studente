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
 
    
        $nome = $_POST['nome'];
        $nazionalita = $_POST['nazionalita'];
        //$tipo_di_attore = $_POST['tipo_di_attore'];

        // Inserisci i dati nel database
        $sql = "INSERT INTO Attore (nome, nazionalita) 
        VALUES ('$nome', '$nazionalita')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Hai aggiunto un Attore! <br> <br>
            <a href='compito_20250107.html'><button>Torna indietro</button></a>";
            exit;

        } else {
                // Se non ci sono risultati, mostra il messaggio di errore e il pulsante
                echo "Nessun Attore trovato!<br>";
                echo "<a href='add_attore.php'><button>Inserisci un nuovo attore!</button></a>";
                echo "<br><a href='index.php'><button>Torna indietro</button></a>";
                exit;
            }
        }  

?>
<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi attore</title>
</head>

<body>
    <h2>Inserisci un nuovo attore!</h2>
    <form action="add_attore.php" method="POST">

        <label for="nome">Inserisci nome dell'attore:</label>
        <input type="text" name="nome" required><br><br>

        <label for="nazionalita">Inserisci la nazionalita' dell'attore:</label>
        <input type="text" name="nazionalita" required><br><br>

        <br><br>
        <input type="submit" value="Aggiungi!">
    </form>
<br>
    <a href="compito_20250107.html"><button>HOME</button></a>
</body>
</html>