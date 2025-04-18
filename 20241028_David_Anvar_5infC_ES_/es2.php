<!DOCTYPE html>
<head>
<title>esercizio isset() e unset()</title>
</head>
<body>
<div>
<h2>SPIEGAZIONE: isset() e unset() in PHP</h2>
<a href='compito_20241028.html'><button>Torna indietro</button></a>

<a href='../teoria_form_e_php.html'><button>Spiegazione form</button></a>
<div>
<h3>1. La funzione isset()</h3>
<p><strong>isset()</strong> e' una funzione in PHP che verifica se una variabile e' stata inizializzata e se il suo valore non e' <strong>null</strong>.</p>
<p>La sintassi di <strong>isset()</strong> e':</p>
<div>
<code>
isset(\$variabile)
</code>
</div>
<p>Restituisce <strong>true</strong> se la variabile e' definita e ha un valore diverso da <strong>null</strong>, altrimenti restituisce <strong>false</strong>.</p>
</div>

<div>
<h3>2. La funzione unset()</h3>
<p><strong>unset()</strong> e' una funzione in PHP che distrugge (rimuove) una variabile, eliminandola dalla memoria.</p>
<p>La sintassi di <strong>unset()</strong> e':</p>
<div>
<code>
unset(\$variabile)
</code>
</div>
<p>Dopo aver utilizzato <strong>unset()</strong>, la variabile non esiste piu' e non puo' essere usata nel programma.</p>
<p><strong>Risultato:</strong> Prima di chiamare <strong>unset()</strong>, la variabile <span>\$name</span> e' definita. Dopo l'uso di <strong>unset()</strong>, la variabile e' eliminata dalla memoria e non esiste piu'.</p>

Quindi se ho un server con tante variabili il server viene appesantito e siccome <br> bisogna dimensionare le risorse ed essere efficienti e quindi non c'è bisogno ad es.:999 <br>variabili, che sono tante, ma ne basta una. <br><br><br>


<!-- CODICE!!! -->
<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    $fname = $_POST['email'];
    $lname = $_POST['password'];
}
    echo "<p><strong> Stampa PHP:</strong></p>";

    if (isset($fname) && isset($lname)) { //Verifico se la variabile $name è definita prima di usare unset()
        echo "Prima di unset: La variabile 'fname' e' definita e ha il valore: $fname <br>";
        echo "Prima di unset: La variabile 'lname' e' definita e ha il valore: $lname <br>";
    }

    if (isset($_POST['remove'])) {
        // Se il bottone 'remove' è stato cliccato, rimuovo la variabile
        unset($fname);// Rimuovo la variabile
        echo "Ho assassinato la variabile 'fname' "; 

        unset($lname);
        echo "e la variabile 'lname'<br>";
    }

    if (isset($fname)) { //Verifico se la variabile $fname e $lname sono ancora definite dopo unset()
        echo "Dopo unset: La variabile 'fname' e' definita. <br>";
        echo "Dopo unset: La variabile 'lname' e' definita.";
    } else {
        echo "Dopo unset: La variabile 'fname' non e' definita.<br>";
        echo "Dopo unset: La variabile 'lname' non e' definita.";
    }
?>
<br><br><br>
<form action="es2.php" method="POST">
    <button type="submit" name="remove">Rimuovi variabile 'fname' e 'lname'</button>
</form>
<br><br><br>
</div>
</div>
</body>
</html>