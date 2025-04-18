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
    $nome = $_POST['nome'];
    $eta_minima = $_POST['eta_minima'];
    $eta_massima = $_POST['eta_massima'];

    $sql = "SELECT * FROM categoria";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Questa categoria esiste già! <br><br>
            <a href='compito_20250108.html'><button>HOME</button></a>";
        exit;
    } else {
        
        // Inserisci i dati nel database
        $sql = "INSERT INTO categoria (nome, eta_minima, eta_massima) 
        VALUES ('$nome', '$eta_minima', '$eta_massima')";
        
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
    <title>Aggiungi categoria</title>
</head>
<body>

<h1>Aggiungi una categoria!</h1>

<form action="add_categoria.php" method="POST">
<label for="nome">Inserisci il nome della categoria:</label>
<input type="text" name="nome" required> <br><br>

<label for="eta_minima">Inserisci l'eta minima richiesta:</label>
<input type="text" name="eta_minima" required> <br><br>

<label for="eta_massima">Inserisci l'eta massima richiesta:</label>
<input type="tel" name="eta_massima" required> <br><br>

<input type="submit" value="Aggiungi!"> <br><br>
</form>

<a href="compito_20250108.html"><button>Torna indietro</button></a>
</body>
</html>