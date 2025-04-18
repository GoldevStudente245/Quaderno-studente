<?php
$utente = $_POST['utente'];
$today = new DateTime("now", new DateTimeZone('Europe/rome'));
$ora = $today->format('H');
$saluto = array("Buongiorno", "Buon pomeriggio", "Buonasera", "Buonanotte");
if ($ora >= 8 && $ora < 12) {
    echo $saluto[0];
} elseif ($ora >= 12 && $ora < 17) { //plus
    echo $saluto[1];
} elseif($ora >= 17 && $ora < 19) {
    echo $saluto[2];
}elseif($ora >= 20 && $ora < 8){
    echo $saluto[3];
}

echo " ". $utente . ", sono le: " . $today->format('h:i:s') . "<br>". "<br>";


echo "Stai usando il browser: " . $_SERVER['HTTP_USER_AGENT'];
?>

<br> <br><a href="ES_b_01.html"><button>Torna indietro</button></a>


