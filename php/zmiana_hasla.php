<?php include('konto.php') ?>
<?php
session_start();
if(!isset($_SESSION['nazwa_uzytkownika'])){  //Jeżeli nie jestes zalogowany nie masz dostępu do tej strony
	$_SESSION['msg']="Musisz się najpierw zalogować";
	header('location: logowanie.php');
}
if(isset($_GET['logout'])) //Wylogowanie
{
	session_destroy();
	unset($_SESSION['nazwa_uzytkownika']);
	header("location: veloxis.php");
}

?>
<html>
<head>
<meta charset="UTF-8">
<title>Veloxis-Zmiana hasła</title>
</head>

<body>

<form method="post" action="../php/zmiana_hasla.php">
	
	<input type="text" name="haslo1" placeholder="Hasło:" ">
	<input type="text" name="haslo2" placeholder="Powtórz hasło:" ">
	<button type="submit" class="btn" name="change_pass">Zmień hasło</button>
</form>

</body>
</html>