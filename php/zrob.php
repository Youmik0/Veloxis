<?php
$db = mysqli_connect('localhost','root','','veloxis');
$db->set_charset("utf8");

$Values= unserialize(urldecode($_GET['vals']));
echo "<h2>Your Input:</h2>";
echo "nazwa:" .$Values['nazwa'];
echo "<br>";
echo "opis:" .$Values['opis'];
echo '<br>';
echo "cena:" .$Values['cena'];
echo '<br>';
echo "kategoria:" .$Values['kategoria'];
echo '<br>';
echo "id_uzytkownika:" .$Values['id_uzytkownika'];
echo '<br>';
echo "id_zdjecia:" .$Values['id_zdjecia'];
echo '<br>';
$nazwa=$Values['nazwa'];
$opis=$Values['opis'];
$cena=$Values['cena'];
$kategoria=$Values['kategoria'];
$id_uzytkownika=$Values['id_uzytkownika'];
$id_zdjecia=$Values['id_zdjecia'];
$nazwa_zdjecia=$Values['nazwa_zdjecia'];
$premium=$Values['premium'];
mysqli_query($db,"SET FOREIGN_KEY_CHECKS=0;");
$updateoferty="UPDATE oferty SET id_zdjecia='$id_zdjecia', nazwa_zdjecia='$nazwa_zdjecia' WHERE nazwa_oferty='$nazwa' AND opis='$opis' AND cena='$cena' AND id_kategorii='$kategoria' AND id_uzytkownika='$id_uzytkownika' AND premium='$premium'";
if(mysqli_query($db,$updateoferty)){
mysqli_query($db,"SET FOREIGN_KEY_CHECKS=1;");
header('Location: veloxis.php');
}
mysqli_query($db,"SET FOREIGN_KEY_CHECKS=1;");
?>
