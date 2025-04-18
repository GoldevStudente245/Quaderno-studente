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

?>

<h1>Prenota un libro: </h1>
<form action="prenotazione.php" method="POST">
    <label for="data_di_prenotazione">Inserisci la data di prenotazione:</label>
    <input type="date" name="data_di_prenotazione"><br><br>

    <label for="ora_di_prenotazione">Inserisci l'ora della prenotazione:</label>
    <input type="time" name="ora_di_prenotazione"><br><br>

    <label for="data_di_scadenza">Inserisci la data di scadenza:</label>
    <input type="date" name="data_di_scadenza"><br><br>

    <label for="metodo_di_pagamento">Inserisci il metodo di pagamento:</label>
    <select name="metodo_di_pagamento">
        <option value="cartaCredito">Carta di credito</option>
        <option value="paypal">PayPal</option>
        <option value="bonifico">Bonifico bancario</option>
        <option value="contante">Contante</option>
    </select><br><br>

    <input type="submit" name="view_libri" value="scegli il libro">

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prendi i dati dal form
    $data_di_prenotazione = $_POST['data_di_prenotazione'];
    $ora_di_prenotazione = $_POST['ora_di_prenotazione'];
    $data_di_scadenza = $_POST['data_di_scadenza'];
    $metodo_di_pagamento = $_POST['metodo_di_pagamento'];
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        if (isset($_POST['view_libri'])) {
            // Esegui la query per selezionare i libri dalla tabella 'libro'
            $result = $conn->query("SELECT * FROM libro");

            // Stampa la tabella con l'email dell'utente nella colonna finale
            echo "<form action='' method='POST'>
            <table border='1'>
            <tr>
                <th>ID_libro</th>
                <th>Titolo</th>
                <th>Data di Pubblicazione</th>
                <th>Prezzo</th>
                <th>Descrizione</th>
                <th>Volume</th>
                <th>Luogo di Pubblicazione</th>
                <th>Nome Autore</th>
                <th>Seleziona</th>
            </tr>";

            while($row = $result->fetch_assoc()) {
                // Aggiungi un checkbox per permettere la selezione del libro
                echo "<tr>
                    <td>" . $row['ID_libro'] . "</td>
                    <td>" . $row['titolo'] . "</td>
                    <td>" . $row['data_di_pubblicazione'] . "</td>
                    <td>" . $row['prezzo'] . "</td>
                    <td>" . $row['descrizione'] . "</td>
                    <td>" . $row['volume'] . "</td>
                    <td>" . $row['luogo_di_pubblicazione'] . "</td>
                    <td>" . $row['nome_autore'] . "</td>
                    <td><input type='checkbox' name='libri_selezionati[]' value='" . $row['ID_libro'] . "'></td>
                </tr>";
            }
            echo "</table><br>";
        }

    ?>
</form>


    <form action="view_prenotazione.php" method="POST">
        <input type='submit' name='invia_prenotazione' value='Invia prenotazione'>
    </form>
    <?php
        // Se l'utente ha selezionato un libro, inserisci la prenotazione nel database
        if (isset($_POST['invia_prenotazione']) && isset($_POST['libri_selezionati'])) {
            $libri_selezionati = $_POST['libri_selezionati'];

            // Verifica se l'utente ha selezionato almeno un libro
            if (count($libri_selezionati) > 0) {
                // Recupera i dettagli dei libri selezionati
                foreach ($libri_selezionati as $ID_libro) {
                    // Prepara e inserisce la prenotazione
                    $sql = "INSERT INTO cliente_prenotazione (data_di_prenotazione, ora_di_prenotazione, data_di_scadenza, metodo_di_pagamento, email, ID_libro)
                                         VALUES ('$data_di_prenotazione', '$ora_di_prenotazione', '$data_di_scadenza', '$metodo_di_pagamento', '$email', '$ID_libro')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Prenotazione per il libro con ID $ID_libro effettuata con successo!";
                    } else {
                        echo "Errore nella prenotazione: " . $conn->error;
                    }
                }

                // Reindirizza l'utente alla pagina view_prenotazione.php per visualizzare la prenotazione
                header("Location: view_prenotazione.php");
                exit; // Assicurati che il codice non continui dopo il reindirizzamento
            } else {
                echo "Non hai selezionato nessun libro!";
            }
        }

    } else {
        // Se l'utente non è loggato, avvisa
        echo "Devi essere loggato per prenotare un libro.";
        exit;
    }
}
?>
