<?php
// Verifica se il modulo è stato inviato (metodo POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Controlla se il pulsante di submit è stato premuto
    if (isset($_POST['submit'])) {
        $scritta = $_POST['scritta'] ?? ''; // Otteniamo il valore del campo password

        // Verifica delle credenziali
        if ($scritta == "Torsello") {
            echo "<h2>Benvenuto, $scritta!</h2>";
        } else {
            echo "Credenziali errate, riprova!";
        }
    }
}

// Mostra il modulo di login (anche in caso di errore)
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['submit'])) {
    
echo"
    <h2>Login</h2>
    <form method='POST'>";
    }
        if (!empty($scritta)) {
            echo "<p style='color:red;'>$scritta</p>";
        }
        echo"
        <input type='text' id='scritta' name='scritta' required>
        <br><br>
        <button type='submit' name='submit'>Accedi</button>
    </form>
    ";
?>
<br><br><br>
<a href="ES_b_02.html"><button>Torna indietro</button></a>