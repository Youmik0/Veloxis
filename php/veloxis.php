<?php
session_start();
//if(!isset($_SESSION['nazwa_uzytkownika'])){  //Jeżeli nie jestes zalogowany nie masz dostępu do tej strony
//	$_SESSION['msg']="Musisz się najpierw zalogować";
//	header('location: logowanie.php');
//}
if(isset($_GET['logout'])) //Wylogowanie
{
	session_destroy();
	unset($_SESSION['nazwa_uzytkownika']);
	header("location: veloxis.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Veloxis</title>
  <link rel="stylesheet" href="../css/gl.css">
</head>
<body>

	<div id="topbar"><div id="logo"><a href="../php/veloxis.php">Veloxis</a></div>
	<div id="wyszukaj"><form><input type="text" id="te" placeholder="Czego szukasz?"><input type="submit" id="sButton"  placeholder="\f002"></form></div>
	<div id="user">
	
	<?php
		if(isset($_SESSION['nazwa_uzytkownika'])): ?>
		<p>Zalogowano jako: <strong><?php echo $_SESSION['nazwa_uzytkownika']; ?></strong></p>
		<p><a href="zmiana_hasla.php">Zmień hasło</a></p>
		<p><a href="veloxis.php?logout='1'" style="color: red;">Wyloguj</a></p>
		<?php else:?>
		<a href="../php/rejestracja.php">Rejestracja</a><br><a href="../php/logowanie.php">Logowanie</a>
		<?php endif; ?>
	</div></div>
	<div id="cont">
	<div id="kategorie">a<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
	<div id="losoferty"><center><img src="../img/027.jpeg"></center></div>
	<div id="adv"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
	</div>
</body>

</html>