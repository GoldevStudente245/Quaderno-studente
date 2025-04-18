<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Account phpMyAdmin</title>
</head>
<body>
<form method="POST">
        <button type="submit" name="create_user">Crea Account</button>
</form>

<?php
if (isset($_POST['create_user'])) {
    // Parametri di connessione al database
    $hostname = "localhost";
    $username = "Anvar";  // L'utente MySQL che ha i privilegi per creare utenti
    $password = "dslkfjewrt20985u0gj";  // La password per l'utente MySQL
    $dbname = "20241216_5infc_anvar_albergo_hoepli";  // Il database da usare per la connessione iniziale
    
    // Connessione al database
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Verifica se l'utente 'Pippo' esiste già
    $sql_check_user = "SELECT User FROM mysql.user WHERE User = 'Anvar'";
    $result = $conn->query($sql_check_user);

    if ($result->num_rows > 0) {
        echo "L'utente 'Anvar' esiste già.<br>";

        // Concessione dei privilegi
        $sql_grant_privileges = "GRANT ALL PRIVILEGES ON *.* TO 'Anvar'@'%' WITH GRANT OPTION";
        if ($conn->query($sql_grant_privileges) === TRUE) {
            echo "Privilegi concessi a 'Anvar' con successo.<br>";
        } else {
            echo "Errore durante la concessione dei privilegi: " . $conn->error . "<br>";
        }

        // Ricarica i privilegi
        $sql_flush_privileges = "FLUSH PRIVILEGES";
        if ($conn->query($sql_flush_privileges) === TRUE) {
            echo "Privilegi ricaricati con successo.<br>";
        } else {
            echo "Errore durante il ricaricamento dei privilegi: " . $conn->error . "<br>";
        }

    } else {
        // Se l'utente non esiste, lo creiamo
        $sql_create_user = "CREATE USER 'Anvar'@'%' IDENTIFIED BY 'dslkfjewrt20985u0gj'";
        if ($conn->query($sql_create_user) === TRUE) {
            echo "Utente 'Anvar' creato con successo.<br>";

            // Concessione dei privilegi
            $sql_grant_privileges = "GRANT ALL PRIVILEGES ON *.* TO 'Anvar'@'%' WITH GRANT OPTION";
            if ($conn->query($sql_grant_privileges) === TRUE) {
                echo "Privilegi concessi a 'Anvar' con successo.<br>";
            } else {
                echo "Errore durante la concessione dei privilegi: " . $conn->error . "<br>";
            }

            // Ricarica i privilegi
            $sql_flush_privileges = "FLUSH PRIVILEGES";
            if ($conn->query($sql_flush_privileges) === TRUE) {
                echo "Privilegi ricaricati con successo.<br>";
            } else {
                echo "Errore durante il ricaricamento dei privilegi: " . $conn->error . "<br>";
            }
        } else {
            echo "Errore durante la creazione dell'utente: " . $conn->error . "<br>";
        }
    }
}
?>
<br><br>
<a href="Index.html"><button><h3>Torna indietro</h3></button></a>
</body>
</html>