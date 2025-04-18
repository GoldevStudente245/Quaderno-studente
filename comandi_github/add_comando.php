<?php
// Connessione al database
$servername = "localhost";
$username = "Anvar"; // Il tuo username per il DB
$password = "dslkfjewrt20985u0gj"; // La tua password per il DB
$dbname = "github_Anvar"; // Il nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_comando = $_POST['nome_comando'];
    $descrizione_comando = $_POST['descrizione_comando'];
    
    // Verifica se il comando esiste già
    $sql = "SELECT * FROM comandi_di_github WHERE nome_comando = '$nome_comando'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "Questo comando esiste già! <br><br>
            <a href='comandi_github.php'><button>torna indietro</button></a>";
        exit;
    } else {
        
        // Inserisci i dati nel database
        $sql = "INSERT INTO comandi_di_github (nome_comando, descrizione_comando) VALUES ('$nome_comando', '$descrizione_comando')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Aggiunta del comando effettuato con successo! <br> <br>
            <a href='comandi_github.php'><button>Torna indietro</button></a>";
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
    <title>Aggiungi un comando</title>
</head>
<link rel="stylesheet" href="../main.css">
<body>

<div id="sidebar" onmouseenter="expandSidebar()" onmouseleave="collapseSidebar()">
        <div class="menu"><h3>INDICE</h3></div>
        <a href="../index.html">HOME</a>
        <a href="../esercizi.html">ESERCIZI</a>
        <a href="../esercizi_a_parte.html">ESERCIZI A PARTE</a>
        <a href="../teoria.html">TEORIA</a>
        <a href="../appunti.html">APPUNTI</a>
    </div>
    <div id="main">
    <h2>Aggiungi un comando!</h2>
    <form action="add_comando.php" method="POST">

        <label for="nome_comando">Nome del comando:</label>
        <input type="text" name="nome_comando" style="width: 400px;" required><br><br>

        <label for="descrizione_comando">Inserisci una spiegazione di quello che fa questo comando:</label>
        
        <textarea style="width: 500px; height: 200px;" name="descrizione_comando" required></textarea>
        <input type="submit" value="Aggiungi">
    </form>
<br><br>
<br><br><br><a href="comandi_github.php" class="link-button"><button>Torna indietro</button></a><br><br><br><br>
</div>
    <script src="../script.js"></script>
</body>
</html>