<?php

if (isset($_POST['tab'])) {
    // Ottieni il numero scelto dall'utente (già un intero)
    $tab = (int)$_POST['tab'];

    // Stampa il titolo della tabella
    echo "<h1>Tabella dei Quadrati e dei Cubi</h1>";

    // Inizia la tabella
    echo "Tabella dei quadrati e dei cubi per i numeri da 1 a " . $tab;
    echo "<p>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>";
    echo "<th>Numero</th>";
    echo "<th>Quadrato</th>";
    echo "<th>Cubo</th>";
    echo "</tr>";

    for ($i = 1; $i <= $tab; $i++) {      
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>" . ($i * $i) . "</td>";  // Quadrato
        echo "<td>" . ($i * $i * $i) . "</td>";  // Cubo
        echo "</tr>";
    }

    // Chiudi la tabella
    echo "</table>";
} else {
    echo "Per favore seleziona un numero.";
}

?>
<br><br>
<a href="ES_c_02.html"><button>Torna indietro</button></a>