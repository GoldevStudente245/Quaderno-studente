<?php
$email = $_POST["email"];
$password = $_POST["password"];

/*
if (isset($email) == 'david') {
    echo 'giusto';
    }else{
        echo 'sbagliato';
    }
    
if (isset($password) == 123) {
    echo 'giusto';
    }else{
        echo 'sbagliato';
    }
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Gestione dei Dati del Form</title>
</head>
<body>

<div>
<h1>SPIEGAZIONE: Gestione dei Dati del Form</h1>
<a href='compito_20241029.html'><button>Torna indietro</button></a>

<h2>TRACCIA:</h2>

Si richiede di creare un progetto web in HTML e PHP che richieda dei dati all'utente attraveso i form spiegati in classe. <br>Tali dati verranno gestiti da una pagina in PHP che ne gestira i calcoli e ne resituirà i risultati. <br>Si chiede di utilizzare tutto il codice citato nelle slide caricate nel materiale dalle slide 01... e 02... <br>

<hr>
<div>
<p>Questo codice PHP si occupa di raccogliere i dati inviati tramite il metodo <strong>POST</strong> da un modulo HTML. I dati vengono quindi processati e verificati all'interno del codice per determinare se l'utente ha inserito credenziali corrette o meno. </p>

<p>Quando l'utente invia il modulo, il server riceve i dati tramite le superglobali come <strong>\$_POST</strong>, che sono utilizzate per raccogliere i dati inviati con una richiesta <strong>POST</strong>. In questo caso, le variabili come <strong>\$email</strong> e <strong>\$password</strong> vengono memorizzate e poi verificate dal server.</p>

</div>

<div>
<h3>Verifica dei Dati Inseriti</h3>
<p>Il codice effettua una verifica per vedere se i dati inseriti dall'utente corrispondono a quelli previsti (ad esempio, se l'email è 'david' o se la password è '12345'). Se una delle due condizioni è vera, l'accesso è consentito; altrimenti, viene mostrato un messaggio di errore.</p>";
</div>

<div>
<h3>Come Funziona la Condizione di Controllo</h3>
<p>La condizione <code>if (\$email == \"david\" || \$password == \"12345\")</code> viene eseguita per verificare se almeno una delle due condizioni è vera:</p>

<div>
<code>
echo "\$email == \"david\" || \$password == \"12345\"<br>";
</code>
</div>

<p>Se almeno una delle due condizioni è soddisfatta, il codice stampa <span>ACCESSO CONSENTITO</span>. Altrimenti, viene visualizzato <span>ERRORE, ACCESSO NEGATO</span>.</p>
</div>

<div>
<h3>Spiegazione Completa del Funzionamento</h3>
<p>In breve, il codice raccoglie i dati inseriti dall'utente in un modulo HTML, li verifica contro valori predefiniti (come nel nostro esempio) e fornisce l'accesso se i dati corrispondono. È una struttura di base per l'autenticazione dell'utente. Questa tecnica è utile in scenari in cui è necessario verificare l'identità dell'utente e fornire accesso solo se le credenziali sono corrette.</p>

<p><h3>STAMPA:</h3>
<?php
        echo "<strong>email: </strong>" . $email . "<br>" . "<strong>password: </strong>" . $password;
        if ($email == "david" || $password == "12345") {
            echo "<br> Accesso consensito!!";
        }else{
            echo "<br> Errore, accesso negato!!";
        }
        echo "</p>";
        ?>
</div>
</div>
</body>
</html>