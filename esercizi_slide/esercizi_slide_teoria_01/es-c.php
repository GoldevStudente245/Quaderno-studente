<a href="ES_c_01.html"><button>Torna indietro</button></a>
<br><br>
<?php
$star = $_POST['star'];

//TRIANGOLO a
echo "TRIANGOLO A" . "<br>";
for ($i = 0; $i < $star; $i++) {
    for ($j = 0; $j <= $i; $j++){
        echo "*";
    }
    echo "<br>";
}
echo "<br>";


//TRIANGOLO b
echo "TRIANGOLO B" . "<br>";
for ($i = $star; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++){
        echo "*";
    }
    echo "<br>";
}

echo "<br>";



//TRIANGOLO C
echo "TRIANGOLO C". "<br>";
for ($i = $star; $i >= 1; $i--) {
    for ($j = 1; $j <= $star - $i; $j++) {
        echo '&nbsp';   
        echo '&nbsp';
    }
    for ($j = 1; $j <= $i; $j++) {
        echo '*';
    }
    echo '<br>';
}
echo "<br>";


//TRIANGOLO D
echo "TRIANGOLO D". "<br>";
for ($i = 1; $i <= $star; $i++) {
    for ($j = 1; $j <= $star - $i; $j++){
        echo '&nbsp';
        echo '&nbsp';
    }

    for($j = 1; $j<=$i; $j++){
        echo "*";
    }
    echo "<br>";
}
?>