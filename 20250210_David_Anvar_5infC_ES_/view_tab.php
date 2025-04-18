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
    die("Connessione fallita: " . $conn->connect_error);
}
?>

<form action="view_tab.php" method="post">
        <input type="submit" name="view_clienti" value="Visualizza clienti">
        <input type="submit" name="view_prenotazioni" value="Visualizza prenotazioni">
        <input type="submit" name="view_libri" value="Visualizza lista libri">
    </form>

   

<?php
    if (isset($_POST['view_clienti'])) {
        $result = $conn->query("SELECT * FROM cliente");
        echo "<h2>clienti iscritti:</h2>
        <table border='1'>
        <tr>
            <th>Codice cliente</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Data di nascita</th>
            <th>Codice Fiscale</th>
            <th>email</th>
            <th>password</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['ID_cliente'] . "</td>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['cognome'] . "</td>
                <td>" . $row['data_di_nascita'] . "</td>
                <td>" . $row['CF'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['password'] . "</td>
                </tr>";
        }
        echo "</table>";

    } elseif (isset($_POST['view_prenotazioni'])) {
        $result = $conn->query("SELECT * FROM cliente_prenotazione");
        echo "<h2>prenotazioni effettuate dai clienti:</h2>
        <table border='1'>
        <tr>
            <th>Codice Prenotazione</th>
            <th>data di prenotazione</th>
            <th>ora di prenotazione</th>
            <th>data_di_scadenza</th>
            <th>metodo di pagamento</th>
            <th>email dell'utente</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['ID_prenotazione'] . "</td>
                <td>" . $row['data_di_prenotazione'] . "</td>
                <td>" . $row['ora_di_prenotazione'] . "</td>
                <td>" . $row['data_di_scadenza'] . "</td>
                <td>" . $row['metodo_di_pagamento'] . "</td>
                <td>" . $row['email'] . "</td>
                </tr>";
        }
        echo "</table>";

    } elseif (isset($_POST['view_libri'])) {
        $result = $conn->query("SELECT * FROM libro");
       // Se ci sono risultati, visualizza la tabella dei libri
    echo "<table border='1'>
    <tr>
        <th>ID_libro</th>
        <th>Titolo</th>
        <th>Data di Pubblicazione</th>
        <th>Prezzo</th>
        <th>Descrizione</th>
        <th>Volume</th>
        <th>Luogo di Pubblicazione</th>
        <th>Nome Autore</th>
        <th>Elimina</th>
    </tr>";

while($row = $result->fetch_assoc()) {
echo "<tr>
        <td>" . $row['ID_libro'] . "</td>
        <td>" . $row['titolo'] . "</td>
        <td>" . $row['data_di_pubblicazione'] . "</td>
        <td>" . $row['prezzo'] . "</td>
        <td>" . $row['descrizione'] . "</td>
        <td>" . $row['volume'] . "</td>
        <td>" . $row['luogo_di_pubblicazione'] . "</td>
        <td>" . $row['nome_autore'] . "</td>
        <td>
            <form method='POST' action=''>
                <input type='hidden' name='id_libro' value='" . $row['ID_libro'] . "'>
                <input type='submit' name='delete' value='Elimina'>
            </form>
        </td>
    </tr>";
}
    echo "</table>";
    echo "<br><a href='add_libro.php'><button>Aggiungi</button></a>";
    }

    echo "<br><br>Torna alla pagina principale: <br><a href='Login.html'><button>HOME</button></a>";
    ?>