<?php
session_start();
$db = mysqli_connect('localhost','root','','veloxis');
$db->set_charset("utf8");
//Inicjalizacja zmiennych
$nazwa_uzytkownika = "";
$imie = "";
$nazwisko = "";
$telefon = "";
$email = "";
$haslo1 = "";
$haslo2 = "";
$errors = array();


//Połączenie z bazą danych
$db = mysqli_connect('localhost','root','','Veloxis');

$db->set_charset("utf8");

//Rejestracja użytkownika
if(isset($_POST['reg_user'])){
	//Pozyskanie danych z formularza
	$nazwa_uzytkownika = mysqli_real_escape_string($db,$_POST['nazwa_uzytkownika']);
	$imie = mysqli_real_escape_string($db,$_POST['imie']);
	$nazwisko = mysqli_real_escape_string($db,$_POST['nazwisko']);
	$telefon = mysqli_real_escape_string($db,$_POST['telefon']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$haslo1= mysqli_real_escape_string($db,$_POST['haslo1']);
	$haslo2= mysqli_real_escape_string($db,$_POST['haslo2']);
	
	//Sprawdzanie czy formulaż został wypełniony poprawnie
	if(empty($nazwa_uzytkownika)){array_push($errors,"Nazwa użytkownika jest wymagana.");}
	if(empty($imie)){array_push($errors,"Imie jest wymagane.");}
	if(empty($nazwisko)){array_push($errors,"Nazwisko jest wymagane.");}
	if(empty($telefon)){array_push($errors,"Telefon jest wymagany.");}
	if(empty($email)){array_push($errors,"Email jest wymagany.");}
	if(empty($haslo1)){array_push($errors,"Hasło jest wymagane.");}
	if($haslo1 != $haslo2){
		array_push($errors,"Dwa hasła się niezgadzają.");
	}
	

	//Sprawdzenie czy w bazie danych nie istnieje już taki użytkownik
	$uzytkownik_check_query = "SELECT * FROM users WHERE nazwa_uzytkownika='$nazwa_uzytkownika' OR email='$email' LIMIT 1";
	$wynik = mysqli_query($db,$uzytkownik_check_query);
	$uzytkownik = mysqli_fetch_assoc($wynik);
	
	if($uzytkownik){ //jeżeli użytkownik istnieje
		if($uzytkownik['nazwa_uzytkownika'] === $nazwa_uzytkownika){
			array_push($errors,"Taki użytkownik już istnieje");
		}
		if($uzytkownik['email'] === $email){
			array_push($errors,"Email już istnieje");
		}
	}
	
	//Jeżeli nie ma żadnych błędów w formularzu, zarejestruj użytkownika
	if(count($errors)==0){
		$haslo = md5($haslo1);//Szyfrowanie hasla przed zapisaniem do bazy
		
		$query = "INSERT INTO users (nazwa_uzytkownika, imie, nazwisko, telefon, email, haslo)
				  VALUES('$nazwa_uzytkownika', '$imie', '$nazwisko', '$telefon', '$email', '$haslo')";
		mysqli_query($db,$query);
		$_SESSION['nazwa_uzytkownika']=$nazwa_uzytkownika;
		$_SESSION['haslo']=$haslo;
		$_SESSION['email']=$email;
		$_SESSION['typ_konta']=3;
		$sql = "SELECT id FROM users WHERE nazwa_uzytkownika = '$nazwa_uzytkownika'";
		$result = mysqli_query($db,$sql);
		while($row = mysqli_fetch_array($result)){
			$_SESSION['id']=$row['id'];
		}
		$_SESSION['succes']= "Jesteś teraz zalogowany";
		header('location: veloxis.php');
		
	}
	
	}
	
//Logowanie
$_user_error;
$_password_error;
if(array_key_exists('login_user', $_POST)) {
if(isset($_POST['login_user'])){//Pozyskanie danych z okienka do logowania
	$nazwa_uzytkownika = mysqli_real_escape_string($db,$_POST['nazwa_uzytkownika']);
	$haslokodowane = mysqli_real_escape_string($db,$_POST['haslo']);
}

if(empty($nazwa_uzytkownika)){//Sprawdzenie czy nie pusty user
	$_user_error='<p class="err">Podaj nazwe użytkownika</p>';
	array_push($errors,"Wymagana jest Nazwa użytkownika");
}
if(empty($haslokodowane)){//Sprawdzenie czy nie puste haslo
	$_password_error='<p class="err">Podaj hasło</p>';
	array_push($errors,'<p class="err">Invalid user id or password Please try again</p>');
}




if(count($errors)==0){//Jeżeli wszystko poszło dobrze:
	$haslo=md5($haslokodowane);//Odszyfrowanie hasła
	$query = "SELECT * FROM users WHERE nazwa_uzytkownika='$nazwa_uzytkownika' AND haslo='$haslo'";
	$results = mysqli_query($db,$query);
	if(mysqli_num_rows($results)==1){//Jeżeli wszystko się zgadza zaloguj
		$_SESSION['nazwa_uzytkownika']=$nazwa_uzytkownika;
		$_SESSION['haslo']=$haslo;
		$_SESSION['email']=$email;
		
		$sql2="SELECT typ_konta FROM users WHERE nazwa_uzytkownika='$nazwa_uzytkownika'";
		$result2 = mysqli_query($db,$sql2);
		$row2=mysqli_fetch_row($result2);
		$_SESSION['typ_konta']=$row2[0];
		
		$sql = "SELECT id FROM users WHERE nazwa_uzytkownika = '$nazwa_uzytkownika'";
		$result = mysqli_query($db,$sql);
		while($row = mysqli_fetch_array($result)){
			$_SESSION['id']=$row['id'];
			$id=$_SESSION['id'];
			
		}
		$sql3="SELECT nazwa FROM profilowe WHERE id_uzytkownika='$id'";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_array($result3);
		$_SESSION['profilowe']=$row3[0];
		
		
		$_SESSION['succes']="Jesteś teraz zalogowany";
		header('location: veloxis.php');
	}else{//W innym wypadku error
		array_push($errors,"Zła kombinacja nazwy użytkownika/hasła");
		$_password_error='<p class="err">Zła kombinacja nazwy użytkownika/hasła</p>';
	}
}
}
?>
