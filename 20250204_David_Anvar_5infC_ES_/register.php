<?php
// Connessione al database
$servername = "localhost";
$username = "Anvar"; // Il tuo username per il DB
$password = "dslkfjewrt20985u0gj"; // La tua password per il DB
$dbname = "20250204_5infc_Anvar_update1.3"; // Il nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    
    // Verifica se l'utente esiste già
    $sql = "SELECT * 
            FROM users 
            WHERE username = '$user'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "Questo username è già in uso! <br><br>
            <a href='compito_20250204.html'><button>HOME</button></a>";
        exit;
    } else {
        
        // Inserisci i dati nel database
        $sql = "INSERT INTO users (username, password, name, surname) 
        VALUES ('$user', '$pass', '$name', '$surname')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registrazione effettuata con successo! <br><br>
            <a href='compito_20250204.html'><button>HOME</button></a>";
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
        <label for="name">Nome:</label>
        <input type="text" name="name" required><br><br>
        <label for="surname">Cognome:</label>
        <input type="text" name="surname" required><br><br>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Registrati">
    </form>
<br>
    <a href="compito_20250204.html"><button>HOME</button></a>
</body>
</html>