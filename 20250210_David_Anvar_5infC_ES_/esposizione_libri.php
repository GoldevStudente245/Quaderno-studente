<?php
session_start();

$host = "localhost";
$username = "root";         
$password = "";            
$dbname = "biblioteca_anvar";
    
// Creazione della connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    echo "Connessione fallita: " . $conn->connect_error . "</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $sql = "SELECT * FROM libro";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {

        // Visualizzazione della tabella libri solo se l'utente ha cliccato su "Visualizza lista libri"
        if (isset($_POST['view_libri'])) {
            $result = $conn->query("SELECT * FROM libro");

            // Se ci sono risultati, visualizza la tabella dei libri
            echo "<table border='1'>
            <tr>
                <th>ID_libro</th>
                <th>Titolo</th>
                <th>Data di Pubblicazione</th>
                <th>Prezzo</th>
                <th>Descrizione</th>
                <th>Volume</th>
                <th>Luogo di Pubblicazione</th>
                <th>Nome Autore</th>
            </tr>";
        
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['ID_libro'] . "</td>
                        <td>" . $row['titolo'] . "</td>
                        <td>" . $row['data_di_pubblicazione'] . "</td>
                        <td>" . $row['prezzo'] . "</td>
                        <td>" . $row['descrizione'] . "</td>
                        <td>" . $row['volume'] . "</td>
                        <td>" . $row['luogo_di_pubblicazione'] . "</td>
                        <td>" . $row['nome_autore'] . "</td>
                    </tr>";
            }
            echo "</table><br>";
        }
        echo "Vuoi prenotare un libro? <br>
        <a href='prenotazione.php'><button>Prenota</button></a><br><br><br><br>";
    }
}
?>
