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
    if (isset($_POST['name']) && isset($_POST['sunrname'])) {
        // Se i campi sono presenti, assegna i valori alle variabili
        $user = $_POST['name'];
        $pass = $_POST['surname'];
   
    // Verifica se l'utente esiste nel DB
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
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

//EXTRA: STAMPA DEL DATABASE
$sql = "SELECT * FROM users"; // Query per selezionare tutti i dati dalla tabella 'users'
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    echo "<h2>Dati della Tabella Users</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>elimina utente sulla faccia della terra</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["surname"] . "</td>
                <td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='submit' name='delete' value='Elimina'>
                </form>
                </td>
            </tr>";
        }
    echo "</table>";
    echo "<br><a href='compito_20250204.html'><button>HOME</button></a>";
} else {
    echo "0 risultati trovati";
    echo "<br><br><a href='compito_20250204.html'><button>Torna indietro</button></a>";
}
?>