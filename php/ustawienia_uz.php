<?php
//Połączenie z bazą danych
session_start();
$db = mysqli_connect('localhost','root','','veloxis');

$db->set_charset("utf8");
$errors = array();
$nazwa_uzytkownika=$_SESSION['nazwa_uzytkownika'];


$haslo1="";
$haslo_nowe1="";
$haslo_nowe2="";
$haslo_zakodowane="";
$zdj="";
$id=$_SESSION['id'];

if(isset($_POST['change_pass'])){//Pozyskanie danych z okienka do logowania
	
	$haslo1 = mysqli_real_escape_string($db,$_POST['haslo1']);
	$haslo_nowe1 = mysqli_real_escape_string($db,$_POST['haslo_nowe1']);
	$haslo_nowe2 = mysqli_real_escape_string($db,$_POST['haslo_nowe2']);
	

	if(empty($haslo_nowe1)){//Sprawdzenie czy nie puste haslo
	array_push($errors,"Wymagane jest hasło");
}
	if(empty($haslo_nowe2)){//Sprawdzenie czy nie puste haslo
	array_push($errors,"Wymagane jest potwierdzenie hasła");
}	
	if($haslo_nowe1 != $haslo_nowe2){
		array_push($errors,"Dwa hasła się niezgadzają.");
	}
	if(count($errors)==0){
	$haslo_zakodowane= md5($haslo_nowe1);
	$query=mysqli_query($db,"UPDATE users SET haslo='$haslo_zakodowane' WHERE nazwa_uzytkownika='$nazwa_uzytkownika'");
	$_SESSION['msg1']="Hasło zmienione";
	
	//header('location: veloxis.php');
	}
}

if(isset($_POST['zmiana_profilowego'])){
	if($_FILES['zdjecie']['size'] > 0)
{
	$img=rand(1000,100000)."-".$_FILES['zdjecie']['name'];
	$insert="INSERT INTO profilowe VALUES ('NULL','$img','$id')";
	$update="UPDATE profilowe SET nazwa='$img' WHERE id_uzytkownika='$id'";
	if(mysqli_query($db,$insert))
	{
		move_uploaded_file($_FILES['zdjecie']['tmp_name'],"profilowe/$img");
		echo "<script>alert('Zdjęcie zostało dodane do folderu')</script>";
		$_SESSION['profilowe']=$img;
	}
	else{
		mysqli_query($db,$update);
		move_uploaded_file($_FILES['zdjecie']['tmp_name'],"profilowe/$img");
		echo "<script>alert('Zdjęcie zostało dodane do folderu')</script>";
		$_SESSION['profilowe']=$img;
	}
}
}

//$sql="SELECT nazwa FROM profilowe WHERE id_uzytkownika='$id'";
//$result=mysqli_query($db,$sql);
//$row=mysqli_fetch_row($result);

?>