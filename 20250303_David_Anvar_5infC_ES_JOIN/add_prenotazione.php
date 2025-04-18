<?php
// Connessione al database
$servername = "localhost";
$username = "Anvar"; // Il tuo username per il DB
$password = "dslkfjewrt20985u0gj"; // La tua password per il DB
$dbname = "20250303_5infC_Anvar_join_db"; // Il nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['data_prenotazione'], $_POST['data_scadenza'], $_POST['metodo_pagamento'])) {
    $data_prenotazione = $_POST['data_prenotazione'];
    $data_scadenza = $_POST['data_scadenza'];
    $metodo_pagamento = $_POST['metodo_pagamento'];
    
    // Verifica se l'utente esiste già
    $sql = "SELECT * FROM prenotazione";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
// Inserisci i dati nel database
        $sql = "INSERT INTO prenotazione (data_prenotazione, data_scadenza, metodo_pagamento) VALUES ('$data_prenotazione', '$data_scadenza', '$metodo_pagamento')";
                
        if ($conn->query($sql) === TRUE) {
            echo "Prenotazione effettuata con successo!<br><br>
            <a href='JOIN_DB.php'><button>Torna indietro</button></a>";
            exit;

            } else {
                echo "Errore: " . $sql . "<br>" . $conn->error;
            }   
    } else {
        echo "Prenotazione già effettuata! <br><br>
            <a href='JOIN_DB.php'><button>Torna indietro</button></a>";
        exit;
    }
}
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>prenotazione</title>
</head>
<body>
    <h2>Prenota!</h2>
    <form action="add_prenotazione.php" method="POST">

        <label for="data_prenotazione">inserisci la data di prenotazione:</label>
        <input type="date" name="data_prenotazione" required><br><br>

        <label for="data_scadenza">inserisci la data di scadenza</label>
        <input type="date" name="data_scadenza" required><br><br>

        <label for="metodo_pagamento">Inserisci metodo di pagamento che vuoi effettuare: </label>
        <input type="text" name="metodo_pagamento" required><br><br>

        <input type="submit" value="Prenota">
    </form>
<br>
    <a href="JOIN_DB.php"><button>Torna indietro</button></a>
</body>
</html>