<?php
include 'gestione.php';
$hostname = "localhost";
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";
$dbname = "20241216_5infc_anvar_albergo_hoepli";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $via = $_POST['via'];
    $citta = $_POST['citta'];
    $numero_civico = $_POST['numero_civico'];
    $telefono = $_POST['telefono'];
    
    
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
            // Inserisci i dati nel database
            $sql = "INSERT INTO cliente (nome, cognome, via, citta, numero_civico, telefono) 
            VALUES ('$nome', '$cognome', '$via', '$citta', '$numero_civico', '$telefono')";
    
            if ($conn->query($sql) === TRUE) {
                echo "Registrazione effettuata con successo! <br><br>
                <a href='accessoDB.html'><button>torna indietro</button></a>";
                exit;
            } else {
                echo "Errore: " . $sql . "<br>" . $conn->error;
            }
    } else {
        echo "Questo cliente esiste già! <br><br>
        <a href='accessoDB.html'><button>torna indietro</button></a>";
    exit;
        
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
    <h2>Registrati per accedere al sito!</h2>
    <form action="registrazione.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" required><br><br>

        <label for="via">Via di casa:</label>
        <input type="text" name="via" required><br><br>

        <label for="citta">citta in cui vivi:</label>
        <input type="text" name="citta" required><br><br>

        <label for="numero_civico">numero civico di casa:</label>
        <input type="text" name="numero_civico" required><br><br>
        
        <label for="telefono">numero di telefono:</label>
        <input type="text" name="telefono" required><br><br>

        <input type="submit" value="Registrati">
    </form>
    
<br>
    <a href="accessoDB.html"><button>Torna indietro</button></a>
</body>
</html>