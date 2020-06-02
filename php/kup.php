<?php
session_start();
$db = mysqli_connect('localhost','root','','veloxis');
$db->set_charset("utf8");

if(!isset($_SESSION['nazwa_uzytkownika'])){  //Jeżeli nie jestes zalogowany nie masz dostępu do tej strony
	header('location: veloxis.php');
}

$Values= unserialize(urldecode($_GET['vals']));
$nazwa=$Values['nazwa'];
$cena=$Values['cena'];
$nazwa_uzytkownika=$_SESSION['nazwa_uzytkownika'];
$sprzedawca=$Values['sprzedawca'];
$id_oferty=$Values['id_oferty'];
				
		if(isset($_POST['kup'])){
			$dostawa=$_POST['wysylka'];
			$nazwa2=$_POST['nazwa'];
			$cena2=$_POST['cena'];
			$sprzedawca2=$_POST['sprzedawca'];
			$id_oferty2=$_POST['id_oferty'];
			$array2 = array(
			'nazwa'=>$nazwa2,
			'cena'=>$cena2,
			'sprzedawca'=>$sprzedawca2,
			'dostawa'=>$dostawa,
			'id_oferty'=>$id_oferty2,
		);
			header('Location: potwierdzenie.php?vals='.urlencode(serialize($array2)).' ');
		}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logowanie</title>
  <link rel="stylesheet"  href="../css/kup.css">
</head>
<body>
  <div id="logowanie">
	
	<div id="logo">Veloxis</div>
	&nbsp;Kupujesz przedmiot o nazwie:<br><br><strong>"<?php echo $nazwa;  ?>"</strong><br><br>
	Kosztuje: <strong><?php echo $cena; ?> zł.</strong><br><br>
	Od sprzedawcy: <strong><?php echo $sprzedawca; ?></strong><br><br>
	Opcja dostawy: <form method="post" action="kup.php"><select name="wysylka">
	<option value="1">Kurier - 13zł</option>
	<option value="2">Kurier za pobraniem - 15zł</option>
	<option value="3">Przesyłka priorytetowa za pobraniem - 10zł</option>
	<option value="4">Przesyłka priorytetowa - 8zł</option>
	<option value="5">Odbiór osobisty - 0zł</option>
	</select>
	<input type="hidden" name="nazwa" value="<?php echo $nazwa; ?>">
	<input type="hidden" name="cena" value="<?php echo $cena; ?>">
	<input type="hidden" name="sprzedawca" value="<?php echo $sprzedawca; ?>">
	<input type="hidden" name="id_oferty" value="<?php echo $id_oferty; ?>">
       <button type="submit" class="btn" name="kup">Kup Teraz!</button>
    </form>
	<br>
	<a href="../php/veloxis.php">To nie jest przedmiot który wybrałeś? Wciśnij tutaj by wrócić na stronę główną<a>
  </div>
  <script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>
</html>
