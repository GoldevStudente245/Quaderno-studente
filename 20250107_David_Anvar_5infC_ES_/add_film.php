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
 
    
        $titolo = $_POST['titolo'];
        $anno_di_produzione = $_POST['anno_di_produzione'];
        $nome_regista = $_POST['nome_regista'];
        
        // Inserisci i dati nel database
        $sql = "INSERT INTO Film (titolo, anno_di_produzione, nome_regista) 
        VALUES ('$titolo', '$anno_di_produzione', '$nome_regista')";
        
        
        if ($conn->query($sql) === TRUE) {
            echo "Hai aggiunto un film! <br> <br>
            <a href='compito_20250107.html'><button>Torna indietro</button></a>";
            exit;

        } else {
                // Se non ci sono risultati, mostra il messaggio di errore e il pulsante
                echo "Nessun film trovato!<br>";
                echo "<a href='add_film.php'><button>Inserisci un nuovo film!</button></a>";
                echo "<br><a href='compito_20250107.html'><button>Torna indietro</button></a>";
                exit;
            }
        }  

?>
<!DOCTYPE html>
<html>
<head>
    <title>Aggiungi film</title>
</head>
<body>
    <h2>Aggiungi un nuovo film!</h2>
    <form action="add_film.php" method="POST">

        <label for="titolo">Inserisci titolo film:</label>
        <input type="text" name="titolo" required><br><br>

        <label for="anno_di_produzione">Inserisci la data in cui è stato prodotto il film:</label>
        <input type="date" name="anno_di_produzione" required><br><br>

        <label for="nome_regista">Inserisci il nome del registra del film:</label>
        <input type="text" name="nome_regista" required><br><br>

        <input type="submit" value="Aggiungi!">
    </form>
<br>
    <a href="index.php"><button>Torna indietro</button></a>
</body>
</html>