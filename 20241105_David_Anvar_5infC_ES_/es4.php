<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Array php</title>
</head>

<body>
<div>
<h2>SPIEGAZIONE: Array in PHP</h2>
<a href='compito_20241105.html'><button>Torna indietro</button></a>
<div>
<p><strong>$_POST</strong> è una superglobale in PHP utilizzata per raccogliere i dati inviati tramite il metodo <strong>POST</strong> da un modulo HTML. In questo caso, il codice raccoglie i dati dai campi <strong>username</strong> e <strong>password</strong> inviati tramite il modulo.
 Ad esempio, il valore inserito nel campo <strong>username</strong> sarà memorizzato nella variabile <code>$username</code>, mentre il valore del campo <strong>password</strong> sarà memorizzato in <code>$password</code></p>
</div>

<div>
<h3>1. Creazione dell'Array $var</h3>
<p>In questa parte del codice, viene creato un array chiamato $variabili che contiene i valori delle variabili <code>$username</code> e <code>$password</code>:</p>
<p>L'array risultante conterrà i valori che l'utente ha inserito nel modulo. Quindi l'utente ha inserito come username: <code>$username</code>, mentre nella password ha inserito: <code>$password</code>, e quindi l'array sarà:</p>
<div>
<code>
$variabili = array( <br>
  "username" => $_POST['username'], <br>
  "password" => $_POST['password'] <br>
); <br>
</code>
</div>
</div>

<div>
<h3>2. Iterazione sull'Array con foreach</h3>
<p>Il ciclo <strong>foreach</strong> viene utilizzato per iterare su ogni elemento dell'array <code>$var</code>. Ad ogni iterazione, il valore dell'elemento corrente viene assegnato alla variabile <code>$valori</code> e viene stampato a schermo:</p>
<div>
<code>
foreach ($var as $valori) {<br>
    echo "$valori"; <br>
}<br>
</code>
</div>
<p>Ad esempio, se l'array contiene <code>$username</code> e <code>$password</code>, il ciclo <strong>foreach</strong> stamperà:</p>
<div>
<code>
foreach ($variabili as $valori) {<br>
  echo "$valori"; <br>
}
</code>
</div>
</div>

<p>Il codice PHP raccoglie i dati da un modulo HTML, li memorizza in un array, e utilizza un ciclo <code>foreach</code> per stampare i valori contenuti nell'array. È una tecnica utile per trattare i dati inviati dagli utenti tramite moduli HTML.</p>
<br><br>
<hr>

Per esempio, supponiamo che tu abbia un array associativo di elementi con <br> caratteristiche come "id" e "nome", e voglia stamparli usando un ciclo for. <br><br>

Esempio con un array di dati: <br>
Immagina che l'array dati sia così: <br><br>

$dati = [<br>
    ['id' => 1, 'nome' => 'Marco'], <br>
    ['id' => 2, 'nome' => 'Luca'],<br>
    ['id' => 3, 'nome' => 'Giulia']<br>
];<br><br>
Per stampare questi dati, puoi usare un ciclo for per iterare sull'array e<br> accedere ai suoi elementi.<br><br>

Codice con il ciclo for:<br>

$dati = [ <br>
    ['id' => 1, 'nome' => 'Marco'], <br>
    ['id' => 2, 'nome' => 'Luca'], <br>
    ['id' => 3, 'nome' => 'Giulia'] <br>
]; <br><br>

// Ciclo for per stampare i dati<br>
for ($i = 0; $i < count($dati); $i++) { <br>
    echo "ID: " . $dati[$i]['id'] . " - Nome: " . $dati[$i]['nome']; <br>
}<br><br>
<br>
Come funziona:<br>
$dati è un array che contiene più elementi (ogni elemento è un array<br> associativo con "id" e "nome").<br>
Usiamo un ciclo for per scorrere ogni elemento nell'array.<br>
count($dati) restituisce il numero di elementi nell'array.<br>
Per ogni ciclo, stampiamo l'ID e il nome corrispondente all'elemento corrente<br> usando $dati[$i]['id'] e $dati[$i]['nome']<br><br>
<hr>



<h2>OUTPUT</h2>
<?php
$variabili = array(//indice 0 e 1
  "username" => $_POST['username'],
  "password" => $_POST['password']
);

// Ciclo foreach per stampare tutte le variabili
foreach ($variabili as $valore) {
    echo $valore . "<br>";
}
?>
<br><br><br>
<hr>


<h2>SINTASSI esercizio Array:</h2>

$variabili = array( <br>
  "username" => $_POST['username'], <br>
  "password" => $_POST['password'] <br>
); <br><br>
<br>
// Ciclo foreach per stampare tutte le variabili <br>
foreach ($variabili as $valore) {<br>
    echo $valore;<br>
}<br><br>
</div>
<br><br><a href='compito_20241105.html'><button>Torna indietro</button></a><br><br><br><br>
</body>
</html>