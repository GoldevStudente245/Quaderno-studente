
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area riservata</title>
    <style>
        th, td{
            padding: 10px;
        }

        table {
            border-radius: 15px;
    border: 3px solid #000000;
    border-collapse: separate;
    border-spacing: 0;
    overflow: hidden; 
    font-family: Arial, sans-serif;
    font-size: 14px;
}
    </style>
</head>
<body>
<h1>Benvenuto nell'area riservata!</h1>
<a href="login.php"><button><h3>Torna indietro</h3></button></a><br><br>
</body>
</html>

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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if (isset($_POST['delete'])) {

        if (isset($_POST['num_di_camera'])) {
            $id = $_POST['num_di_camera'];
            $sql = "DELETE FROM camera WHERE num_di_camera = $id";
        } elseif (isset($_POST['id_cliente'])) {
            $id = $_POST['id_cliente'];
            $sql = "DELETE FROM cliente WHERE id_cliente = $id";
        } elseif (isset($_POST['id_documento'])) {
            $id = $_POST['id_documento'];
            $sql = "DELETE FROM documento WHERE id_documento = $id";
        }elseif (isset($_POST['id_prenotazione'])) {
            $id = $_POST['id_prenotazione'];
            $sql = "DELETE FROM prenotazione WHERE id_prenotazione = $id";
        }
    
        if (isset($sql)) {
            $conn->query($sql);
        }
    }

     // Array con tabelle e colonne corrispondenti per l'AUTO_INCREMENT
     $tabelle = [
        "camera" => "num_di_camera",
        "cliente" => "id_cliente",
        "documento" => "id_documento",
        "prenotazione" => "id_prenotazione"
    ];

    // Cicla su tutte le tabelle per aggiornare AUTO_INCREMENT
    foreach ($tabelle as $tabella => $colonna) {
        $sql = "SELECT MAX($colonna) AS max_id FROM $tabella";
        $result = $conn->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            $next_id = $row['max_id'] + 1;
            if ($next_id < 1) $next_id = 1;
            $conn->query("ALTER TABLE $tabella AUTO_INCREMENT = $next_id");
        }
    }
}
?>
<form action="area_riservata.php" method="POST">
        <input type="submit" name="tabella_clienti" value="Visualizza clienti">
        <input type="submit" name="tabella_camere" value="Visualizza camere">
        <input type="submit" name="tabella_Documenti" value="Visualizza Documenti degli utenti">
        <input type="submit" name="tabella_prenotazioni" value="Visualizza le prenotazioni degli utenti">
    </form>
    <br><br>
<?php

if (isset($_POST['tabella_clienti'])) {
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Visualizza la tabella HTML
        echo "<table border='1'>
                <tr>
                    <th>Codice cliente</th>
                    <th>Nome</th>
                    <th>cognome</th>
                    <th>Via di casa</th>
                    <th>Città</th>
                    <th>Numero civico</th>
                    <th>Numero di telefono</th>
                </tr>";
            
    
        // Estrai i dati riga per riga
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_cliente"] . "</td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["cognome"] . "</td>
                    <td>" . $row["via"] . "</td>
                    <td>" . $row["citta"] . "</td>
                    <td>" . $row["numero_civico"] . "</td>
                    <td>" . $row["telefono"] . "</td>
                    <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id_cliente' value='" . $row['id_cliente'] . "'>
                        <input type='submit' name='delete' value='Elimina cliente'>
                    </form>
                    </td>
                </tr>";
            }
        echo "</table>";
     } else {
        echo "Nessuna camera disponibile!";
    }
    }



if (isset($_POST['tabella_camere'])) {
$sql = "SELECT * FROM camera";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
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
                <td>
                <form method='POST' action=''>
                    <input type='hidden' name='num_di_camera' value='" . $row['num_di_camera'] . "'>
                    <input type='submit' name='delete' value='Elimina camera'>
                </form>
                </td>
            </tr>";
        }
    echo "</table>";
 } else {
    echo "Nessuna camera disponibile!";
}
}



if (isset($_POST['tabella_Documenti'])) {
    $sql = "SELECT * FROM documento";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Visualizza la tabella HTML
        echo "<table border='1'>
                <tr>
                    <th>Codice Documento</th>
                    <th>Codice fiscale</th>
                    <th>data di nascita</th>
                    <th>luogo di nascita</th>
                    <th>tipo di documento</th>
                </tr>";
            
    
        // Estrai i dati riga per riga
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_documento"] . "</td>
                    <td>" . $row["CF"] . "</td>
                    <td>" . $row["data_di_nascita"] . "</td>
                    <td>" . $row["luogo_di_nascita"] . "</td>
                    <td>" . $row["tipo_documento"] . "</td>
                    <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id_documento' value='" . $row['id_documento'] . "'>
                        <input type='submit' name='delete' value='Elimina documento'>
                    </form>
                    </td>
                </tr>";
            }
        echo "</table>";
     } else {
        echo "Nessuna documento disponibile!";
    }
    }


    if (isset($_POST['tabella_prenotazioni'])) {
        $sql = "SELECT * FROM prenotazione";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Visualizza la tabella HTML
            echo "<table border='1'>
                    <tr>
                        <th>Codice prenotazione</th>
                        <th>Data di partenza</th>
                        <th>Data di arrivo</th>
                    </tr>";
                
        
            // Estrai i dati riga per riga
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id_prenotazione"] . "</td>
                        <td>" . $row["Data_di_partenza"] . "</td>
                        <td>" . $row["Data_di_arrivo"] . "</td>
                        <td>
                        <form method='POST' action=''>
                            <input type='hidden' name='id_prenotazione' value='" . $row['id_prenotazione'] . "'>
                            <input type='submit' name='delete' value='Elimina prenotazione'>
                        </form>
                        </td>
                    </tr>";
                }
            echo "</table>";
         } else {
            echo "Nessuna documento disponibile!";
        }
        }
?>

<br><br><br>
<a href="add_camera.php"><button>Aggiungi una camera</button></a>