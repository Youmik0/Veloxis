<?php include('konto.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logowanie</title>
  <link rel="stylesheet" href="../css/logow.css">
</head>
<body>
  <div id="logowanie">
	
	<div id="logo"><a href="../php/veloxis.php">Veloxis</a></div>
	<div id="pod">&nbsp;logowanie</div>
	
    <form method="post" action="logowanie.php">
	<?php include('errors.php'); ?>
       <input type="text" name="nazwa_uzytkownika" placeholder="Nazwa użytkownika:"/>
       <input type="password" name="haslo" placeholder="Hasło:"/>
	   <div class="s1">
	   <a href="url">Zapomniałeś hasła?</a>
	   </div>
       <button type="submit" class="btn" name="login_user">Logowanie</button>
    </form>
	<br>
	<a href="../php/rejestracja.php">Nie masz jeszcze konta? Przejdź do Rejestracji.<a>
  </div>
</body>
</html>