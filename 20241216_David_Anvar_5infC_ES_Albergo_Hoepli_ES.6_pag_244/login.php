<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albergo</title>

    <style>

        td, th{
            padding: 9px;
        }
    </style>
</head>
<body>


<?php
include 'gestione.php';
session_start();
$hostname = "localhost";
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";
$dbname = "20241216_5infc_anvar_albergo_hoepli";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Se i campi sono presenti, assegna i valori alle variabili
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
   
    // Verifica se l'utente esiste nel DB
    $sql = "SELECT * FROM cliente WHERE nome = '$nome' AND cognome = '$cognome'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id_cliente'] = $row['id_cliente'];
        header("Location: prenotazione.php");
        exit;
    } else {
        echo "Credenziali errate
        <a href='registrazione.php'><button>registrati!</button></a>";
        exit;

    }

    // if ($result->num_rows > 0) {

    //     // Login riuscito
    //     echo "Login effettuato con successo!"; 
    // } else {
    //     // Reindirizza alla pagina di registrazione
    //     echo "Errore le credenziali per accedere al DB sono errate! <br>";
    //     echo "<a href='registrazione.php'><button>inserisci i tuoi dati</button></a><br><br>
    //     <a href='accessoDB.html'><button>Torna indietro</button></a>";
    //     exit;
    // }


if (isset($_POST['delete'])) {
    // Ottieni l'ID dell'utente da eliminare
    $idToDelete = $_POST['id'];

    // Crea la query di eliminazione
    $sqlDelete = "DELETE FROM users WHERE id = $idToDelete";

    // Esegui la query
    if ($conn->query($sqlDelete) === TRUE) {
    }
}
}

$sql = "SELECT * FROM camera"; // Query per selezionare tutti i dati dalla tabella 'users'
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    echo "<h1>Benvenuto nell'Albergo!</h1>
        <h2>Camere disponibili!</h2>";
    echo "<table border='1'>
            <tr>
                <th>numero della camera</th>
                <th>esposizione</th>
                <th>piano</th>
                <th>dimensione della camera in metri quadrati</th>
                <th>Tipo della camera</th>
            </tr>";
        

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["num_di_camera"] . "</td>
                <td>" . $row["esposizione"] . "</td>
                <td>" . $row["piano"] . "</td>
                <td>" . $row["dimensione_camera"] . "</td>
                <td>" . $row["tipologia_di_camera"] . "</td>
            </tr>";
        }
    echo "</table>";
 } else {
    echo "Nessuna camera disponibile!";
}
?>



<br><br><br>
<a href="prenotazione.php"><button><h3>Prenota!</h3></button></a>
<br><br><br>
Se sei il gestore dell'albergo accedi alla pagina personale!
<a href="codice.php"><button><h3>accedi!</h3></button></a>
<br><br><br>
<a href="accessoDB.html"><button><h3>Torna alla home</h3></button></a>
</body>
</html>