<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandi Github</title>
    <link rel="stylesheet" href="../main.css">
</head>
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

    <h1>COMANDI UTILI DI GITHUB</h1>
    <a href="../teoria.html" class="link-button"><button>Torna indietro</button></a><br><br>

    <a href='siti_utili_github.html'><button>teoria github</button></a>
    <br><br><br>


    <form action="download_db.php" method="post">
    <button type="submit" name="scarica">Scarica Backup Database</button>
</form>



    <p>Nome database: github_Anvar</p>
    
        <br><br>
        <p>Ho creato un database contenenti comandi di github e qui aggiungo tutti i comandi di github conosciuti al momento in base alle esperienze dello stage Tech7 ed esperienze scolastiche <br><br>
        <hr>
        <br>

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

if (isset($_POST['delete'])) {
    // Ottieni l'ID dell'utente da eliminare
    $id = $_POST['ID_comando'];

    // Crea la query di eliminazione
    $sqlDelete = "DELETE FROM comandi_di_github WHERE ID_comando = $id";

    // Esegui la query
    if ($conn->query($sqlDelete) === TRUE) {
    }
}


$sql = "SELECT * FROM comandi_di_github"; // Query per selezionare tutti i dati dalla tabella 'users'
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>NOME DEL COMANDO</th>
                <th>DESCRIZIONE</th>
                <th>ELIMINA</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["ID_comando"] . "</td>
                <td>" . $row["nome_comando"] . "</td>
                <td>" . $row["descrizione_comando"] . "</td>
                <td>
                <form method='POST' action=''>
                    <input type='hidden' name='ID_comando' value='" . $row['ID_comando'] . "'>
                    <input type='submit' name='delete' value='Elimina'>
                </form>
                </td>
            </tr>";
        }
    echo "</table>";
    echo "<br><a href='add_comando.php'><button>Aggiungi un comando</button></a>";
} else {
    echo "0 risultati trovati";
    echo "<br><a href='add_comando.php'><button>Aggiungi un comando</button></a>";
}
?>

<br><br><br><a href="../teoria.html" class="link-button"><button>Torna indietro</button></a><br><br><br><br>
</div>
    <script src="../script.js"></script>
<br><br>
</body>
</html>