<?php
// Connessione al database
$servername = "localhost";
$username = "Anvar"; // Il tuo username per il DB
$password = "dslkfjewrt20985u0gj"; // La tua password per il DB
$dbname = "20250303_5infC_Anvar_join_db"; // Il nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo"Connessione al DB effettuata con successo! <br><br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username_utente']) && isset($_POST['password'])) {
        // Se i campi sono presenti, assegna i valori alle variabili
        $username_utente = $_POST['username_utente'];
        $password = $_POST['password'];
   
    // Verifica se l'utente esiste nel DB
    $sql = "SELECT * FROM users WHERE username_utente = '$username_utente' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Login riuscito
        echo "Login effettuato con successo!"; 
    } else {
        // Reindirizza alla pagina di registrazione
        echo "Errore le credenziali per accedere al DB sono errate!" . "<br>";
        echo "<a href='register.php'>inserisci i tuoi dati</a><br><br>
        <a href='compito_20250204.html'><button>HOME</button></a>";
        exit;
    }
}

}

$sql = "SELECT * FROM users"; // Query per selezionare tutti i dati dalla tabella 'users'
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    
    echo "<h2>Dati della Tabella Users</h2>";
    echo "<table border='1'>
            <tr>
                <th>Codice utente</th>
                <th>Username</th>
                <th>Cognome</th>
                <th>Password</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_cliente"] . "</td>
                <td>" . $row["username_utente"] . "</td>
                <td>" . $row["cognome"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id_cliente'] . "'>
                    <input type='submit' name='delete' value='Elimina utente'>
                </form>
                </td>
            </tr>";
        }
    echo "</table><br><br><br>";
} else {
    echo "Nessun utente trovato!";
}


    $sql = "SELECT * FROM prenotazione"; 
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    echo "<h2>Le tue prenotazioni!</h2>";
    echo "<table border='1'>
            <tr>
                <th>Codice prenotazione</th>
                <th>Data di prenotazione</th>
                <th>Data di scadenza</th>
                <th>Metodo di pagamento</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_prenotazione"] . "</td>
                <td>" . $row["data_prenotazione"] . "</td>
                <td>" . $row["data_scadenza"] . "</td>
                <td>" . $row["metodo_pagamento"] . "</td>
                <td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id_prenotazione'] . "'>
                    <input type='submit' name='delete' value='Elimina prenotazione'>
                </form>
                </td>
            </tr>";
        }
    echo "</table>";
} else {
    echo "<br><br>Non ci sono prenotazioni!";
}

echo "<br><br><a href='add_prenotazione.php'><button>Prenota!</button></a>";
?>

<br><br><br><br><a href='compito_20250303.html'><button>Torna indietro</button></a>