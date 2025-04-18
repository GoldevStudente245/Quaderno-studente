<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {// Verifica che i dati siano stati inviati tramite il metodo POST
    // Prendi i dati inviati dal form
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];

    // Reindirizza alla pagina di visualizzazione dei dati
    header("Location: visualizza.php?nome=$nome&cognome=$cognome&email=$email");
    exit();
} else {
    echo "Errore: i dati non sono stati inviati correttamente.";
}
?>