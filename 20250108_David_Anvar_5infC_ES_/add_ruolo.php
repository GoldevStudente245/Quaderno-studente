<?php
$servername = "localhost";
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";
$nameDB = "20250108_5infc_anvar_societa_calcistica";

$conn = new mysqli($servername, $username, $password, $nameDB);

if($conn->connect_error){
    echo "Connessione non riuscita!" . $conn->connect_error;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome_ruolo = $_POST['nome_ruolo'];
    $Descrizione = $_POST['Descrizione'];

    $sql = "SELECT * FROM ruolo WHERE nome_ruolo='$nome_ruolo'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Questa ruolo esiste già! <br><br>
            <a href='compito_20250108.html'><button>HOME</button></a>";
        exit;
    } else {
        
        // Inserisci i dati nel database
        $sql = "INSERT INTO ruolo (nome_ruolo, Descrizione) 
        VALUES ('$nome_ruolo', '$Descrizione')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Aggiunta con successo! <br><br>";
            header("Location: accesso.php?success=true");
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
    <title>Aggiungi ruolo</title>
</head>
<body>

<h1>Aggiungi il tuo Ruolo!</h1>

<form action="" method="POST">
<label for="nome_ruolo">Inserisci il nome del ruolo:</label>
<input type="text" name="nome_ruolo" required> <br><br>

<label for="Descrizione">Inserisci la descrizione del ruolo:</label>
<input type="text" name="Descrizione" required> <br><br>

<input type="submit" value="Aggiungi!"> <br><br>
</form>

<a href="accesso.php"><button>Torna indietro</button></a>
</body>
</html>