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
    die("Connessione fallita: " . $conn->connect_error);
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Query per selezionare l'ultima prenotazione dell'utente loggato
    $sql = "SELECT p.ID_prenotazione, p.email_cliente, l.titolo AS titolo_libro, 
                   p.data_di_prenotazione, p.ora_di_prenotazione, p.data_di_scadenza, p.metodo_di_pagamento
            FROM cliente_prenotazione p
            JOIN libro l ON p.ID_libro = l.ID_libro
            WHERE p.email_cliente = '$email'
            ORDER BY p.ID_prenotazione DESC LIMIT 1"; // Limita la query all'ultima prenotazione

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Stampa l'ultima prenotazione
        $row = $result->fetch_assoc();
        echo "<h2>La tua Ultima Prenotazione:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Codice Prenotazione</th>
                    <th>Titolo Libro selezionato</th>
                    <th>Data Prenotazione</th>
                    <th>Ora Prenotazione</th>
                    <th>Data Scadenza</th>
                    <th>Metodo di Pagamento</th>
                </tr>
                <tr>
                    <td>" . $row['ID_prenotazione'] . "</td>
                    <td>" . $row['titolo_libro'] . "</td>
                    <td>" . $row['data_di_prenotazione'] . "</td>
                    <td>" . $row['ora_di_prenotazione'] . "</td>
                    <td>" . $row['data_di_scadenza'] . "</td>
                    <td>" . $row['metodo_di_pagamento'] . "</td>
                </tr>
              </table>";
    } else {
        // Se non ci sono prenotazioni
        echo "Non hai effettuato alcuna prenotazione.";
        echo "<br><br><a href='prenotazione.php'><button>prenota!</button></a>";
    }
} else {
    echo "Devi essere loggato per visualizzare le prenotazioni.";
}

echo "<br><br><a href='Login.html'><button>HOME</button></a>";
?>
