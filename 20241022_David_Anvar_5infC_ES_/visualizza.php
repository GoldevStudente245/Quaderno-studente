<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Visualizza Dati</title>
</head>
<body>

<br><a href="compito_20241022.html"><button>torna indietro</button></a><br><br>
        <?php
        // Recupera i dati dalla query string
        $nome = $_GET['nome'];
        $cognome = $_GET['cognome'];
        $email = $_GET['email'];

        echo "
            <h1>Dati Registrati</h1>
            <p><strong>Nome: </strong> $nome</p>
            <p><strong>Cognome: </strong>$cognome</p>
            <p><strong>Email: </strong> $email</p>

            <h3>FRASE:</h3>";
            // Impostare il fuso orario, preferibilmente in Italia
            date_default_timezone_set('Europe/Rome');

            // Ottieni l'ora corrente in formato 24 ore
            $oraCorrente = date("H");

            // Controlla l'ora per determinare il saluto appropriato
            if ($oraCorrente >= 6 && $oraCorrente < 12) {
                echo "Buongiorno!, Signor " . $nome . " " . $cognome . ", la tua email e': " . $email;

            } elseif ($oraCorrente >= 12 && $oraCorrente < 18) {
                echo "Buon pomeriggio!, Signor " . $nome . " " . $cognome . ", la tua email e': " . $email;
            } else {
                echo "Buona sera!, Signor " . $nome . " " . $cognome . ", la tua email e': " . $email;
            }
?>
<br><hr><br>


<h1>SPIEGAZIONE</h1>
<br>
<h2>TRACCIA</h2>
Creare un nuovo form HTML che raccoglie i dati anagrafici di una persona. <br>Quando l'utente compila il modulo e lo invia, i dati vengono inviati tramite il metodo POST a una pagina PHP. <br>In questa pagina PHP, i dati vengono ricevuti, elaborati e poi visualizzati su un'altra pagina HTML. <br><br>

Se il codice PHP è lungo o complesso, invece di scrivere tutto nello stesso file, posso separarlo. <br>Utilizzo l'attributo action del form per chiamare un file PHP separato, che riceve i dati dal form. <br>Questo file PHP elabora i dati e poi li invia (ad esempio, tramite redirect o altro) a una pagina HTML o PHP che mostrerà i risultati. <br><br>

AGGIUNTA: prendo le variabili che passo dentro nel POST, le do in un altro file php e scrivo una frase con quei valori. <br><br>

<hr>
<br><br><br>
      <br>  
<h2>APPUNTI:</h2>

Per visualizzare il codice all'interno di un progetto trasformo l'URL di GitHub.com in GitHub.dev che è l'interfaccia di Visual studio Code. <br>E soltanto cambiando l'URL dal .com al .dev, mi propone la cartella di progetto già leggibile <br>come l'ambiente di sviluppo ma se lo ranno non funziona perché mi serve una macchina su cui farlo partire, <br>perché se io avessi il .com dovrei prendere il file e modificarlo a mano: ed è molto scomodo!. 
<br><br>
Ma se lo voglio far partire il programma? <br><br>

(C'è code spaces e ed è un invenzione per la programmazione di comunità es: Minecraft e GitHub e <br>ci si preoccupava di fornire una piattaforma su cui condividere il file, ma lavorava all'inizio sul cvs come le cose che fa adesso google documenti e che cosa fa il cvs?: <br>Se io vado su Google documenti trovo il documento che sta su drive e trovo tutte le modifiche che mi sono salvato e quindi posso tornare <br>alla versione precedente (sistema di controllo versione). <br>Ma se devo lavorare con dei colleghi devo controllare tutte le modifiche dei file. <br>GitHub dice hai modificato tutti questo gruppo di file? <br>vuoi spingere tutte le tue modifiche e aggiornarmi dell'intero progetto? <br>lo spingo e i programmatori vedono le stesse cose che ho fatto senza scaricare programmi.) <br><br>

Code spaces fa la stessa cosa che si fa con GitHub.dev. e fa vedere che sono uno studente, <br>ho una macchina virtuale per me cioè faccio il run del codice senza aver bisogno di installare programmi su pc. <br><br>


<p><strong>CODICE DELLA FRASE:</strong></p>

<code>
if ($oraCorrente >= 6 && $oraCorrente < 12) {<br>
                echo "Buongiorno!, Signor " . $nome . " " . $cognome . ", la tua email e': " . $email;<br><br>

            } elseif ($oraCorrente >= 12 && $oraCorrente < 18) {<br>
                echo "Buon pomeriggio!, Signor " . $nome . " " . $cognome . ", la tua email e': " . $email;<br>
            } else {<br>
                echo "Buona sera!, Signor " . $nome . " " . $cognome . ", la tua email e': " . $email;<br>
            } <br>
</code>


<p><strong>SPIEGAZIONE DELLA FRASE:</strong></p>
<br>
date_default_timezone_set('Europe/Rome');: Imposta il fuso orario su quello dell'Italia, che considera automaticamente l'ora legale (quando è in vigore). <br><br>

date("H"): Ottieni l'ora corrente in formato 24 ore (ad esempio, 14 per le 2 PM). <br><br>

La logica del saluto si basa sull'ora: <br><br>

Buongiorno: dalle 6:00 alle 11:59. <br><br>

Buon pomeriggio: dalle 12:00 alle 17:59. <br> <br>

Buona sera: dalle 18:00 alle 5:59. <br><br>

Ora legale: <br>
PHP gestisce automaticamente l'ora legale se hai impostato il fuso orario in <br> modo corretto. <br>Quindi, quando c'è l'ora legale, PHP utilizzerà automaticamente l'ora legale per determinare l'ora corrente.
<br><br><br><a href='compito_20241022.html'><button>Torna indetro</button></a><br><br>

