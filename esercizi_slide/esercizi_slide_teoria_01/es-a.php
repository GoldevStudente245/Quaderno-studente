<?php
$riga = $_POST['riga'];
$colonna = $_POST['colonna'];


if ($riga > 0 && $colonna > 0){ //Controllo del inserimento dell'utente

echo "<table border='1' cellpadding='10'>";
for ($i = 1; $i <= $riga; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $colonna; $j++) {
        echo "<td>" . ($i * $j) . "</td>";//calcolo della riga e colonna
    }
    echo "</tr>";
}
echo "</table>";
}else if(($riga < 0 || $colonna < 0) || (($riga != 0 || $colonna != 0))){
    echo "Pretendi che ci sia una tabella inserendo questi valori? STUPIDO!!";
}
?>
<br><br>
<a href="ES_a_01.html"><button>Torna indietro</button></a>