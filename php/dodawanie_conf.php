<?php
session_start();
//header("Content-type: image/jpg;"); Potrzebne do wyświetlania zdj
//Zmienne
$errors = array();
$nazwa_uzytkownika = $_SESSION['nazwa_uzytkownika'];
$nazwa="";
$opis="";
$kategoria="";
$id_uzytkownika=$_SESSION['id'];
$cena="";
//
//Łączenie z bazą
$db = mysqli_connect('localhost','root','','veloxis');
$db->set_charset("utf8");
//

if(isset($_POST['dodawanie_oferty'])){
	$nazwa=$_POST['nazwa'];
	$opis=$_POST['opis'];
	$kategoria=$_POST['kategoria'];
	$cena=$_POST['cena'];
	$stan=$_POST['stan'];
	$marka=$_POST['marka'];
	if(empty($nazwa)){array_push($errors,"Nazwa aukcji jest wymagana.");}
	if(empty($opis)){$opis=NULL;}
	if(empty($kategoria)){array_push($errors,"Musisz wybrać kategorię produktu.");}
	if(empty($cena)){array_push($errors,"Proszę podać cenę produktu.");}
	if(empty($stan)){array_push($errors,"Proszę podać stan produktu.");}
	if(empty($marka)){array_push($errors,"Proszę podać markę produktu.");}
	if(count($errors)==0){	
	mysqli_query($db,"INSERT INTO oferty(nazwa_oferty,opis,cena,id_kategorii,marka,stan,id_uzytkownika) VALUES('$nazwa','$opis','$cena','$kategoria','$marka','$stan','$id_uzytkownika')");
	
	$sql = "SELECT id FROM oferty WHERE nazwa_oferty='$nazwa' AND opis='$opis' AND cena='$cena' AND id_kategorii='$kategoria' AND id_uzytkownika='$id_uzytkownika'";
	$result = mysqli_query($db,$sql);
	$row=mysqli_fetch_row($result);
	//echo ($row[0]);
	
		if($_FILES['zdjecie']['size'] > 0)
{
	$img=rand(1000,100000)."-".$_FILES['zdjecie']['name'];
	$insert="INSERT INTO oferty_zdj VALUES ('NULL','$img','$row[0]')";
	//$update="UPDATE profilowe SET nazwa='$img' WHERE id_uzytkownika='$id'";
	$array = array(
	'nazwa'=>$nazwa,
	'opis'=>$opis,
	'cena'=>$cena,
	'id_uzytkownika'=>$id_uzytkownika,
	'id_zdjecia'=>$row[0],
	'kategoria'=>$kategoria,
	'nazwa_zdjecia'=>$img,
	);
	if(mysqli_query($db,$insert))
	{
		move_uploaded_file($_FILES['zdjecie']['tmp_name'],"oferty/$img");
		//$updateoferty="UPDATE oferty SET id_zdjecia='$row[0]' WHERE nazwa_oferty='$nazwa' AND opis='$opis' AND cena='$cena' AND id_kategorii='$kategoria' AND id_uzytkownika='$id_uzytkownika'";
		//mysqli_query($db,$updateoferty);
		echo "<script>alert('Zdjęcie zostało dodane do folderu')</script>";
		header('Location: zrob.php?vals=' . urlencode(serialize($array)));
	}
	else{
		echo "<script>alert('Zdjęcie nie zostało dodane do folderu')</script>";
	}
}else
{
	$insert2="INSERT INTO oferty_zdj VALUES ('NULL','puste.jpg','$row[0]')";
	$img='puste.jpg';
	$array = array(
	'nazwa'=>$nazwa,
	'opis'=>$opis,
	'cena'=>$cena,
	'id_uzytkownika'=>$id_uzytkownika,
	'id_zdjecia'=>$row[0],
	'kategoria'=>$kategoria,
	'nazwa_zdjecia'=>$img,
	);
	mysqli_query($db,$insert2);
	header('Location: zrob.php?vals=' . urlencode(serialize($array)));
}
	
	
	}
	
	//$result = mysqli_query($db,"SELECT zdjecie FROM oferty WHERE id=25");
	//if (mysqli_num_rows($result) != 0) { $row = mysqli_fetch_assoc($result); echo base64_decode($row['zdjecie']); }  Wyświetlanie zdj
	
}





















?>
