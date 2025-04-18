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
        echo "Connessione fallita" . $conn->connect_error . "</p>";
    } 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['nome'];
        $surname = $_POST['cognome'];
        $data_di_nascita = $_POST['data_di_nascita'];
        $codice_fiscale = $_POST['CF'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $tipo_di_cliente = $_POST['tipo_di_cliente'];

        // Verifica se l'utente esiste già
        $sql = "SELECT * FROM cliente WHERE 
        nome = '$name' AND
        cognome = '$surname' AND
        data_di_nascita = '$data_di_nascita' AND
        CF = '$codice_fiscale' AND
        email = '$email' AND
        password = '$pass' AND 
        tipo_di_cliente = '$tipo_di_cliente'";

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "Questo username è già in uso!
                <br><a href='Login.html'><button>HOME</button></a>";
            exit;
        } else {
            // Inserisci i dati nel database
            $sql = "INSERT INTO cliente (nome, cognome, data_di_nascita, CF, email, password, tipo_di_cliente) 
            VALUES ('$name', '$surname', '$data_di_nascita', '$codice_fiscale', '$email', '$pass', '$tipo_di_cliente')";
            
            if ($conn->query($sql) === TRUE) {
                
                if (!isset($_SESSION['email']) && $_SESSION['tipo_di_cliente'] == 'cliente') 
                if ($tipo_di_cliente == 'cliente'){
                    echo "Registrazione effettuata con successo!";
                    echo "<a href='Login.html'><button>HOME</button></a>";
                    exit;
                }
                if($tipo_di_cliente == 'amministratore'){
                    echo "<a href='verifica_codice.html'>Inserisci il codice</a>";

                    echo "<a href='Login.html'><button>HOME</button></a>";
                    exit;
                }
            } else {
                echo "Errore: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrazione</title>
</head>
<body>
    <h1>REGISTRAZIONE:</h1>
    <br>
    <form action="Register.php" method="POST">
        <label for="nome">Inserisci il tuo nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="cognome">Inserisci il tuo cognome:</label>
        <input type="text" name="cognome" required><br><br>

        <label for="data_di_nascita">Inserisci la tua data di nascita:</label>
        <input type="date" name="data_di_nascita" required><br><br>

        <label for="CF">Inserisci il tuo codice fiscale:</label>
        <input type="text" name="CF" required><br><br>

        <label for="email">Inserisci la tua email:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Inserisci la tua password:</label>
        <input type="password" name="password" required><br><br>

        <label for="tipo_di_cliente">Tipo di utente:</label><br>
        <input type="radio" name="tipo_di_cliente" value="cliente" checked>
        <label for="cliente">Cliente</label><br>
        <input type="radio" name="tipo_di_cliente" value="amministratore">
        <label for="amministratore">Amministratore</label><br><br>

        <input type="submit" value="Registrati">
    </form>
</body>
</html>