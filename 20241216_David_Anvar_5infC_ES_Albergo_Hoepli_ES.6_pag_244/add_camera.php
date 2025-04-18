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

    $esposizione = $_POST['esposizione'];
    $piano = $_POST['piano'];
    $dimensione_camera = $_POST['dimensione_camera'];
    $tipologia_di_camera = $_POST['tipologia_di_camera'];
    
    $sql = "SELECT * FROM documento";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {

            // Inserisci i dati nel database
            $sql = "INSERT INTO camera (esposizione, piano, dimensione_camera, tipologia_di_camera) 
            VALUES ('$esposizione', '$piano', '$dimensione_camera', '$tipologia_di_camera')";
    
            if ($conn->query($sql) === TRUE) {
                echo "aggiunta effettuata con successo! <br><br>
                <a href='area_riservata.php'><button>torna indietro</button></a>";
                exit;
            } else {
                echo "Errore: " . $sql . "<br>" . $conn->error;
            }
    } else {
        echo "Questa camera esiste già!<br><br>
        <a href='area_riservata.php'><button>torna indietro</button></a>";
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
    <h2>Aggiungi una camera:</h2>

    <form action="add_camera.php" method="POST">
        <label for="esposizione">Inserisci l'esposizione:</label>
        <select name="esposizione">
            <option value="nord">nord</option>
            <option value="sud">sud</option>
            <option value="est">est</option>
            <option value="ovest">ovest</option>
        </select><br><br>

        <label for="piano">Inserisci il piano:</label>
        <input type="number" name="piano" required><br><br>

        <label for="dimensione_camera">Inserisci la dimensione della camera:</label>
        <input type="number" name="dimensione_camera" required><br><br>

        <label for="tipologia_di_camera">Inserisci il tipo della camera:</label>
        <input type="text" name="tipologia_di_camera" required><br><br>

        <input type="submit" value="Aggiugi!">
    </form>
<br>
    <a href="area_riservata.php"><button>torna indietro</button></a>
</body>
</html>