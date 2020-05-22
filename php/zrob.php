<?php
$db = mysqli_connect('localhost','root','','veloxis');
$db->set_charset("utf8");

$Values= unserialize(urldecode($_GET['vals']));
echo "<h2>Your Input:</h2>";
echo "nazwa:" .$Values['nazwa']; //Here what needs to be written after . and before ; to use the values passed from the other file
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
$nazwa =$Values['nazwa'];
$opis =$Values['opis'];
$cena=$Values['cena'];
$kategoria=$Values['kategoria'];
$id_uzytkownika=$Values['id_uzytkownika'];
$id_zdjecia=$Values['id_zdjecia'];
$nazwa_zdjecia=$Values['nazwa_zdjecia'];

$updateoferty="UPDATE oferty SET id_zdjecia='$id_zdjecia', nazwa_zdjecia='$nazwa_zdjecia' WHERE nazwa_oferty='$nazwa' AND opis='$opis' AND cena='$cena' AND id_kategorii='$kategoria' AND id_uzytkownika='$id_uzytkownika'";
if(mysqli_query($db,$updateoferty))
{
	header('Location: veloxis.php');
}
?>
