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

        // Gestione dell'eliminazione degli attori
        if (isset($_POST['delete_attore'])) {
            $idToDelete = $_POST['id'];
            $sqlDelete = "DELETE FROM Attore WHERE id_attore = $idToDelete";
            if ($conn->query($sqlDelete) === TRUE) {
            }
        }

        // Gestione dell'eliminazione delle proiezioni
        if (isset($_POST['delete_proiezione'])) {
            $idToDelete = $_POST['id'];
            $sqlDelete = "DELETE FROM Proiezione WHERE id_proiezione = $idToDelete";
            if ($conn->query($sqlDelete) === TRUE) {
            }
        }

        // Gestione dell'eliminazione dei film
        if (isset($_POST['delete_film'])) {
            $idToDelete = $_POST['id'];
            $sqlDelete = "DELETE FROM Film WHERE id_film = $idToDelete";
            if ($conn->query($sqlDelete) === TRUE) {
            }
        }

     $sql = "SELECT * FROM Attore";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Visualizza la tabella HTML per gli attori
        echo "<h2>Dati della Tabella Attori</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Codice attore</th>
                    <th>Nome</th>
                    <th>Nazionalità</th>
                    <th>Elimina attore</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_attore"] . "</td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["nazionalita"] . "</td>
                    <td>
                        <form method='POST' action=''>
                            <input type='hidden' name='id' value='" . $row['id_attore'] . "'>
                            <input type='submit' name='delete_attore' value='Elimina'>
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 risultati trovati per gli attori.";
    }

    // Selezione dei dati dalla tabella Proiezione
    $sql = "SELECT * FROM Proiezione";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Visualizza la tabella HTML per le proiezioni
        echo "<br><br><h2>Dati della Tabella Proiezione</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Codice proiezione</th>
                    <th>Città della proiezione</th>
                    <th>Sala dove viene proiettata</th>
                    <th>Data della proiezione</th>
                    <th>Ora della proiezione</th>
                    <th>Numero di spettatori totali</th>
                    <th>Elimina proiezione</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_proiezione"] . "</td>
                    <td>" . $row["citta"] . "</td>
                    <td>" . $row["sala"] . "</td>
                    <td>" . $row["data"] . "</td>
                    <td>" . $row["ora"] . "</td>
                    <td>" . $row["num_di_spettatori"] . "</td>
                    <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id' value='" . $row['id_proiezione'] . "'>
                        <input type='submit' name='delete_proiezione' value='Elimina'>
                    </form>
                </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<br><br>0 risultati trovati per le proiezioni.";
    }

    // Selezione dei dati dalla tabella Film
    $sql = "SELECT * FROM Film";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Visualizza la tabella HTML per i film
        echo "<br><br><h2>Dati della Tabella Film</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Codice film</th>
                    <th>Titolo</th>
                    <th>Anno di produzione</th>
                    <th>Nome regista</th>
                    <th>Elimina film</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_film"] . "</td>
                    <td>" . $row["titolo"] . "</td>
                    <td>" . $row["anno_di_produzione"] . "</td>
                    <td>" . $row["nome_regista"] . "</td>
                    <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id' value='" . $row['id_film'] . "'>
                        <input type='submit' name='delete_film' value='Elimina'>
                    </form>
                </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<br><br>0 risultati trovati per i film.";
    }

?>


<br><br><br><a href='add_film.php'><button>Aggiungi film</button></a>
<a href='add_proiezione.php'><button>Aggiungi proiezione</button></a>
<a href='add_attore.php'><button>Aggiungi attore</button></a>

<br><br><br>
<a href='compito_20250107.html'><button>torna indietro</button></a>