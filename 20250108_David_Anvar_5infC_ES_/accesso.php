<?php 
$servername = "localhost";
$username = "Anvar";
$password = "dslkfjewrt20985u0gj";
$nameDB = "20250108_5infc_anvar_societa_calcistica";

$conn = new mysqli($servername, $username, $password, $nameDB);

if($conn -> connect_error){
echo "connessione non riuscita!" . $conn -> connect_error;
}

if(isset($nome['POST'], $CF['POST'])){


    $nome = $_POST['nome'];
    $CF = $_POST['CF'];

    $sql = "SELECT * FROM Giocatore 
    WHERE nome = '$nome' AND CF = '$CF'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login riuscito
        echo "Login effettuato con successo!"; 
    } else {
        // Reindirizza alla pagina di registrazione
        echo "Errore le credenziali per accedere al DB sono errate! <br><br>";
        echo "<a href='registrazione.php'><button>Inserisci i tuoi dati!</button></a><br><br>
        <a href='compito_20250108.html'><button>HOME</button></a>";
        exit;
    }
}
$sql = "SELECT * FROM Categoria";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    echo "<h2>Ecco le categorie disponibili!</h2>";
    echo "<table border='1'>
            <tr>
                <th>Codice categoria</th>
                <th>nome</th>
                <th>eta minima</th>
                <th>eta massima</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_categoria"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["eta_minima"] . "</td>
                <td>" . $row["eta_massima"] . "</td>
            </tr>";
        }
    echo "</table>";
} else {
    echo "<br><br>Nessuna categoria!";
}





$sql = "SELECT * FROM ruolo";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Visualizza la tabella HTML
    echo "<br><br><h2>Ecco i Corrispettivi ruoli per ogni giocatore!</h2>";
    echo "<table border='1'>
            <tr>
                <th>Codice ruolo</th>
                <th>Nome ruolo</th>
                <th>Descrizione ruolo</th>
            </tr>";

    // Estrai i dati riga per riga
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_ruolo"] . "</td>
                <td>" . $row["nome_ruolo"] . "</td>
                <td>" . $row["Descrizione"] . "</td>
            </tr>";
        }
    echo "</table>";
} else {
    echo "<br><br><br><h3>Se sei giocatore aggiungi il tuo ruolo!</h3>
    <br>Nessun ruolo!<br><br>";
}

echo "<br><br><a href='add_categoria.php'><button>Aggiungi categoria!</button></a>

<br><br><a href='add_ruolo.php'><button>Aggiungi ruolo!</button></a>";

?>
<br><br><a href='compito_20250108.html'><button>torna indietro</button></a>