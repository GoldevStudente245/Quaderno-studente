<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca_anvar";
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codice = $_POST['codice'];
    $inserimento_codice = "1234";

    // Verifica se il codice inserito è corretto
    if ($codice == $inserimento_codice) {
        echo "Accesso alla tabella dei libri consentito! <br><br>";
        echo "<a href='view_tab.php'>Accedi alla libreria</a>";

        echo "<br><br><br><a href='Login.html'><button>HOME</button></a>";
        exit; // Termina l'esecuzione dopo il link
    } else {
        if (!isset($_SESSION['email']) || $_SESSION['tipo_di_cliente'] !== 'amministratore') {
            // Se l'utente non è loggato o non è amministratore, reindirizza alla pagina di login
            echo "Accesso negato. Devi essere loggato come amministratore.";
            echo "<a href='Register.php'><button>torna indietro</button></a>";
        echo "<br><br><br><a href='Login.html'><button>HOME</button></a>";
            exit;
        }
    }
}
?>