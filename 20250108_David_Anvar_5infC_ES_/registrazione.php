<?php
session_start();
$servername = "localhost";
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";
$nameDB = "20250108_5infc_anvar_societa_calcistica";

$conn = new mysqli($servername, $username, $password, $nameDB);

if($conn->connect_error){
    echo "Connessione non riuscita!" . $conn->connect_error;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $telefono = $_POST['telefono'];
    $via = $_POST['via'];
    $cap = $_POST['cap'];
    $n_civico = $_POST['n_civico'];
    $citta = $_POST['citta'];
    $eta = $_POST['eta'];
    $CF = $_POST['CF'];

    $sql = "SELECT * FROM giocatore WHERE CF = '$CF'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Questo username è già in uso! <br><br>
            <a href='compito_20250108.html'><button>HOME</button></a>";
        exit;
    } else {
        
        // Inserisci i dati nel database
        $sql = "INSERT INTO giocatore (nome, cognome, telefono, via, cap, n_civico, citta, eta, CF) 
        VALUES ('$nome', '$cognome', '$telefono', '$via', '$cap', '$n_civico', '$citta', '$eta', '$CF')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registrazione effettuata con successo! <br><br>
            <a href='compito_20250108.html'><button>HOME</button></a>";
            exit;

        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati!</title>
</head>
<body>

<h1>Registrati per accedere al sito!</h1>

<form action="registrazione.php" method="POST">
<label for="nome">Inserisci il tuo nome:</label>
<input type="text" name="nome" required> <br><br>

<label for="cognome">Inserisci il tuo cognome:</label>
<input type="text" name="cognome" required> <br><br>

<label for="telefono">Inserisci il tuo numero di telefono:</label>
<input type="tel" name="telefono" required> <br><br>

<label for="via">Inserisci la tua via di casa:</label>
<input type="text" name="via" required> <br><br>

<label for="cap">Inserisci il CAP (es: 20121)</label>
<input type="number" name="cap" required> <br><br>

<label for="n_civico">Inserisci il numero civico di casa:</label>
<input type="number" name="n_civico" required> <br><br>

<label for="citta">Inserisci la tua citta:</label>
<input type="text" name="citta" required> <br><br>

<label for="eta">Inserisci la tua età</label>
<input type="number" name="eta" required> <br><br>

<label for="CF">Inserisci il tuo codice fiscale:</label>
<input type="text" name="CF" required> <br><br>

<input type="submit" value="Registrati!"> <br><br>
</form>

<a href="compito_20250108.html"><button>Torna indietro</button></a>
</body>
</html>