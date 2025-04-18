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
    $username_utente = $_POST['username_utente'];
    $cognome = $_POST['cognome'];
    $password = $_POST['password'];
    
    // Verifica se l'utente esiste già
    $sql = "SELECT * FROM users WHERE username_utente = '$username_utente'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "Questo username è già in uso! <br><br>
            <a href='compito_20250303.html'><button>HOME</button></a>";
        exit;
    } else {
        
        // Inserisci i dati nel database
        $sql = "INSERT INTO users (username_utente, cognome, password) VALUES ('$username_utente', '$cognome', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registrazione effettuata con successo!<br><br>
            <a href='compito_20250303.html'><button>HOME</button></a>";
            exit;

        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>
<body>
    <h2>Registrati</h2>
    <form action="register.php" method="POST">

        <label for="username_utente">Nome:</label>
        <input type="text" name="username_utente" required><br><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Registrati">
    </form>
<br>
    <a href="compito_20250303.html"><button>HOME</button></a>
</body>
</html>