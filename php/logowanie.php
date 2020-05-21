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
	
	<div id="logo">Veloxis</div>
	<div id="pod">&nbsp;logowanie</div>
	
    <form method="post" action="logowanie.php">
	
       <input type="text" name="nazwa_uzytkownika" placeholder="Nazwa użytkownika:"/>
	   <?php if(!empty($_user_error)) echo $_user_error; ?>
       <input type="password" name="haslo" placeholder="Hasło:"/>
	   <?php if(!empty($_password_error)) echo $_password_error; ?>
	   <div class="s1">
	   <a href="url">Zapomniałeś hasła?</a>
	   </div>
       <button type="submit" class="btn" name="login_user">Zaloguj</button>
    </form>
	<br>
	<a href="../php/rejestracja.php">Nie masz jeszcze konta? Przejdź do Rejestracji.<a>
  </div>
  <script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>
</html>
