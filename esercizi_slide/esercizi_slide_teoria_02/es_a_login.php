<?php
$username = $_POST["username"];
$password = $_POST["password"];

if($username == "admin" && $password == "pw"){
    echo "Benvenuto " . $username . " nell'area riservata del sito!";
}else{
    echo "Pretendi di accedere al sito così facilmente?, STUPID";
}
?>
<br><br>
<a href="ES_a_02.html"><button>Torna indietro</button></a>