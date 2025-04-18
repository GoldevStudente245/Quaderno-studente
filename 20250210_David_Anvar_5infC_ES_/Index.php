<?php
session_start();

$host = "localhost";
$username = "root";         
$password = "";            
$dbname = "biblioteca_anvar";
    
// Creazione della connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    echo "Connessione fallita: " . $conn->connect_error . "</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    // Verifica se l'utente esiste nel DB
    $sql = "SELECT * FROM cliente WHERE email = '$email' AND password = '$pass'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Login riuscito
        $_SESSION['email'] = $email; // Salva l'email nella sessione
        echo "Login effettuato con successo!<br><br>";
        echo "<h4>Ecco i nostri libri:</h4>";
        
        // Form per visualizzare la lista dei libri
        echo "<form action='esposizione_libri.php' method='POST'>
            <input type='submit' name='view_libri' value='Visualizza lista libri'>
            </form>";

        echo "Se sei un amministratore clicca qui: <br>";
        echo "<a href='verifica_codice.html'>Inserisci codice</a>";
        echo "<br><br><br><a href='Login.html'><button>HOME</button></a>";
    } else {
        // Reindirizza alla pagina di registrazione
        echo "Errore, le credenziali non sono corrette o non esistono! Se non ti ricordi le credenziali clicca qui!" . "<br>";
        echo "<a href='Register.php'>Inserisci i tuoi dati</a>";

        echo "<br><br><br><a href='Login.html'><button>HOME</button></a>";
        exit;
    }
}
?>
