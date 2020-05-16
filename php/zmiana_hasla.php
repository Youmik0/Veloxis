<?php include('zmiana_hasla_conf.php') ?>
<html>
<head>
<meta charset="UTF-8">
<title>Veloxis-Zmiana hasła</title>
  <link rel="stylesheet" href="../css/re.css">
</head>

<body>
<p style="color:white";>Zalogowany jako :<strong><?php echo $_SESSION['nazwa_uzytkownika'];?></strong></p>
<p style="color:white">Zmiana hasła:</p>
<form method="post" action="../php/zmiana_hasla.php">
	<?php include('errors.php'); ?>
	<input type="text" name="haslo_nowe1" placeholder="Podaj nowe hasło:" ">
	<input type="text" name="haslo_nowe2" placeholder="Powtórz nowe hasło:" ">
	<button type="submit" class="btn" name="change_pass">Zmień hasło</button>
</form>

</body>
</html>