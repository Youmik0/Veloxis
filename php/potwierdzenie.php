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
$dostawa=$Values['dostawa'];
$typ_konta=$_SESSION['typ_konta'];
$id_oferty=$Values['id_oferty'];

if($dostawa==1){
	$dost="Odbiór w punkcie";
	$koszt_przesylki=10;
}else if($dostawa==2){
	$dost="Kurier";
	$koszt_przesylki=13;
}else if($dostawa==3){
	$dost="Odbiór w punkcie za pobraniem";
	$koszt_przesylki=12;
}else if($dostawa==4){
	$dost="Kurier za pobraniem";
	$koszt_przesylki=15;
}else{
	$dost="Odbiór osobisty";
	$koszt_przesylki=0;
}
if($typ_konta==2){
	$koszt_przesylki=0;
}

		if(isset($_POST['potwierdzam'])){
			$nazwa2=$_POST['nazwa'];
			$cena2=$_POST['cena'];
			$sprzedawca2=$_POST['sprzedawca'];
			$dostawa2=$_POST['dostawa'];
			$cena_dostawy2=$_POST['cena_dostawy'];
			$cena_koncowa2=$_POST['cena_koncowa'];
			$kupujacy2=$_POST['kupujacy'];
			$nr_bankowy2=$_POST['nr_bankowy'];
			$id_oferty2=$_POST['id_oferty'];
			$sql="INSERT INTO transakcje( nazwa, cena, sprzedawca, dostawa, cena_dostawy, cena_koncowa, kupujacy, nr_bankowy_k, id_oferty) VALUES ('$nazwa2','$cena2','$sprzedawca2','$dostawa2','$cena_dostawy2','$cena_koncowa2','$kupujacy2','$nr_bankowy2','$id_oferty2')";
			mysqli_query($db,$sql);
			header('Location: veloxis.php');
		}
		
		
		
$cena_koncowa=$koszt_przesylki+$cena;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logowanie</title>
  <link rel="stylesheet" href="../css/logow.css">
</head>
<body>
  <div id="logowanie">
	
	<div id="logo">Veloxis</div>
	&nbsp;Czy aby jesteś pewnien że chcesz kupić przemiot o nazwie:<br><br><strong>"<?php echo $nazwa;  ?>"</strong><br><br>
	Kosztuje: <strong><?php echo $cena; ?> zł.</strong><br><br>
	Od sprzedawcy: <strong><?php echo $sprzedawca; ?></strong><br><br>
	Opcja dostawy: <strong><?php echo $dost; ?></strong><br><br>
	Koszt tej przesyłki: <strong><?php echo $koszt_przesylki; ?> zł</strong><br><br>
	Twój Nr.Bankowy: <strong><?php echo 'Nr banku'; ?></strong><br><br>
	Twój Adres: <strong><?php echo 'Adres'; ?></strong><br><br>
	Nr. Bankowy sprzedającego : <strong><?php echo 'Nr.bankowy sprzedającego'; ?></strong><br><br>
	Adres Sprzedzającego: <strong><?php echo 'Adres sprzedającego'; ?></strong><br><br>
	Koszt ostateczny: <strong><?php echo $cena_koncowa; ?> zł</strong><br><br>
	<form method="post" action="potwierdzenie.php">
	<input type="hidden" name="nazwa" value="<?php echo $nazwa; ?>">
	<input type="hidden" name="cena" value="<?php echo $cena; ?>">
	<input type="hidden" name="sprzedawca" value="<?php echo $sprzedawca; ?>">
	<input type="hidden" name="cena_koncowa" value="<?php echo $cena_koncowa; ?>">
	<input type="hidden" name="dostawa" value="<?php echo $dost; ?>">
	<input type="hidden" name="cena_dostawy" value="<?php echo $koszt_przesylki; ?>">
	<input type="hidden" name="kupujacy" value="<?php echo $nazwa_uzytkownika; ?>">
	<input type="hidden" name="nr_bankowy" value="<?php echo '666'; ?>">
	<input type="hidden" name="id_oferty" value="<?php echo $id_oferty; ?>">
    <button type="submit" class="btn" name="potwierdzam">Potwierdzam zakup!</button>
    </form>
	<br><br>
	<a href="../php/veloxis.php">To nie jest przedmiot który wybrałeś? Wciśnij tutaj by wrócić na stronę główną<a>
	<br><br><h6>Potwierdzając zakup zgadzasz się na nasz <a href="./regulamin.php">regulamin</a></h6>
  </div>
  <script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>
</html>