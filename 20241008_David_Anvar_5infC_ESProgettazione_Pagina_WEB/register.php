<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $variabili = array(
        "Username" => $_POST['Username'],
        "Surname" => $_POST['Surname'],
        "Email" => $_POST['Email'],
        "Password" => $_POST['Password'],
        "Codice_Fiscale" => $_POST['Codice_Fiscale'],
        "Sesso" => $_POST['Sesso'],
        "Anno_di_corso" => $_POST['Anno_di_corso'],
        "Sezione" => $_POST['Sezione'],
        "Tipo_di_partecipante" => $_POST['Tipo_di_partecipante'] ?? ''
    );

    foreach ($variabili as $key => $value) {
        echo "<strong>$key: </strong> $value <br>";
    }
}

echo "<br><br><a href='compito_20241008.html'><button>torna indietro</button></a>"
?>