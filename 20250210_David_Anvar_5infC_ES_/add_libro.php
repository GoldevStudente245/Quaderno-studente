<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca_anvar";
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        if (isset($_POST['titolo'])) {
            $titolo = $_POST['titolo'];
            $data_di_pubblicazione = $_POST['data_di_pubblicazione'];
            $prezzo = $_POST['prezzo'];
            $descrizione = $_POST['descrizione'];
            $volume = $_POST['volume'];
            $luogo_di_pubblicazione = $_POST['luogo_di_pubblicazione'];
            $nome_autore = $_POST['nome_autore'];

            // Query SQL per inserire i dati nella tabella
            $sql = "INSERT INTO libro (titolo, data_di_pubblicazione, prezzo, descrizione, volume, luogo_di_pubblicazione, nome_autore)
                    VALUES ('$titolo', '$data_di_pubblicazione', '$prezzo', '$descrizione', '$volume', '$luogo_di_pubblicazione', '$nome_autore')";

            if ($conn->query($sql) === TRUE) {
                echo "Nuovo libro aggiunto con successo!<br><br>";
                echo "<a href='view_tab.php'><button>Vai alla libreria</button></a>";
                echo "<br><a href='Login.html'><button>HOME</button></a>";
                // Query per selezionare i libri con i criteri forniti
    } else {
        // Se non ci sono risultati, mostra il messaggio di errore e il pulsante
        echo "Nessun libro trovato!<br>";
        echo "<a href='add_libro.php'><button>Inserisci un nuovo libro</button></a>";
        echo "<br><a href='Login.html'><button>HOME</button></a>";
    }
                exit;
            } else {
                echo "Errore nell'aggiunta del libro: " . $conn->error;
                echo "<br><a href='Login.html'><button>HOME</button></a>";
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aggiungi Libro</title>
</head>
<body>
    <h1>Aggiungi un nuovo libro</h1>
        <form action="add_libro.php" method="POST">
            <label for="titolo">Titolo:</label>
            <input type="text" name="titolo" required><br><br>

            <label for="data_di_pubblicazione">Data di pubblicazione:</label>
            <input type="date" name="data_di_pubblicazione" required><br><br>

            <label for="prezzo">Prezzo:</label>
            <input type="text" name="prezzo" required><br><br>

            <label for="descrizione">Descrizione:</label>
            <input type="text" name="descrizione" required><br><br>

            <label for="volume">Volume:</label>
            <input type="text" name="volume"><br><br>

            <label for="luogo_di_pubblicazione">Luogo di pubblicazione:</label>
            <input type="text" name="luogo_di_pubblicazione" required><br><br>

            <label for="nome_autore">Nome dell'autore:</label>
            <input type="text" name="nome_autore" required><br><br>

            <input type="submit" value="Aggiungi libro">
        </form> 
</body>
</html>