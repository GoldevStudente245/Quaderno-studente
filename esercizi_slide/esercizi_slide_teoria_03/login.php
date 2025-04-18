<?php

//ESERCIZIO b
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Visto che ci sono tante variabili, per non usare il "metodo della nonna", creo un'array per tutte le variabili. Per ogni variabile la chiamo tramite il $_POST
    
    $dati = array(
        "username" => trim(($_POST['username'])),
        "surname" => trim(($_POST['surname'])),
        "DDN" => trim(($_POST['DDN'])),
        "CF" => trim(($_POST['CF'])),
        "email" => trim(($_POST['email'])),
        "cellulare" => trim(($_POST['cellulare'])),
        "cap" => trim(($_POST['cap'])),
        "comune" => trim(($_POST['comune'])),
        "provincia" => trim(($_POST['provincia'])),
        "nickname" => trim(($_POST['nickname'])),
        "password" => trim(($_POST['password'])),
    );

    $valori = array_values($dati);//Restituisce i valori dell'array tramite -> array_values

    // Controlla se il nickname è uguale al nome o al cognome
    if ($dati['nickname'] == $dati['username'] || $dati['nickname'] == $dati['surname']){

        echo "Impossibile assegnare il nickname come nome o cognome, riprova!" . "<br>";//messaggio di errore 
    }else{
        //Stampa dei dati che ha scritto l'utente 
        echo "Hai inserito i seguenti dati: <br>";
        $valori = array_values($dati);

        // Ciclo for per stampare tutti i valori
        for($i = 0; $i < count($valori); $i++) {
        echo "Nel " . $i . " Elemento hai inserito: " . $valori[$i] . "<br>";
        }
    }

    if (!filter_var($dati['email'], FILTER_VALIDATE_EMAIL)) {//CONTROLLO EMAIL
        echo "L'email inserita non è valida, riprova!" . "<br>";//messaggio di errore

        //bottone per tornare indietro e per riscrivere l'email correttamente
        echo "<button type='button'><a href='122024_David_Anvar_5iC_ES_a.html'>torna in dietro</a></button>";
    }
}
?>

<br><br>
<a href="ES_a_03.html"><button>Torna indietro</button></a>