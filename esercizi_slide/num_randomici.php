<h2>Somma di numeri randomici: </h2>
<br>

<?php
$somma = 0;
echo "<table border='1'>"; 
while ($somma < 90) {  
    $NumeroCasuale = rand(1, 6);
    echo "<td>" . $NumeroCasuale . "</td>";  
    $somma += $NumeroCasuale;
}
echo "</table>";
echo "<br><br>Somma risultante: $somma";
?>
<br><br><br>
<form method="POST">
    <input type="submit" value="Aggiorna i numeri">
</form>


<br><br><a href="../esercizi_a_parte.html"><button>Torna indietro</button></a>