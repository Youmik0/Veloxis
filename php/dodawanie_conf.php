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
$db = mysqli_connect('localhost','root','','Veloxis');
$db->set_charset("utf8");
//

if(isset($_POST['dodawanie_oferty'])){
	try{
	$fhandle = fopen($_FILES['zdjecie']['tmp_name'], "r"); 
	if(!$fhandle){
		$content=NULL;
	}
	else{
	$content = base64_encode(fread($fhandle, $_FILES['zdjecie']['size']));
	fclose($fhandle);
	}
	}catch (Exception $e){
		
	}
	$nazwa=$_POST['nazwa'];
	$opis=$_POST['opis'];
	$kategoria=$_POST['kategoria'];
	$cena=$_POST['cena'];
	if(empty($nazwa)){array_push($errors,"Nazwa aukcji jest wymagana.");}
	if(empty($opis)){$opis=NULL;}
	if(empty($kategoria)){array_push($errors,"Musisz wybrać kategorię produktu.");}
	if(empty($cena)){array_push($errors,"Proszę podać cenę produktu.");}
	if(count($errors)==0){
	mysqli_query($db,"INSERT INTO oferty(nazwa_oferty,opis,id_kategorii,id_uzytkownika,zdjecie) VALUES('$nazwa','$opis','$kategoria','$id_uzytkownika',\"".$content."\")");
	}
	
	//$result = mysqli_query($db,"SELECT zdjecie FROM oferty WHERE id=25");
	//if (mysqli_num_rows($result) != 0) { $row = mysqli_fetch_assoc($result); echo base64_decode($row['zdjecie']); }  Wyświetlanie zdj
	
}




















?>
