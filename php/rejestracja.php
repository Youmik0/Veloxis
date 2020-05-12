<?php include('konto.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/re.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="cont">

  <div id="rejestracja">
	<h1><a href="../php/veloxis.php">Veloxis</a></h1>
    <form method="post" action="../php/rejestracja.php">
	<?php include('errors.php'); ?>
	   <input type="text" name="nazwa_uzytkownika" placeholder="Nazwa użytkownika:" ">
       <input type="text" name="imie" placeholder="Imie:" ">
       <input type="text" name="nazwisko" placeholder="Nazwisko:" ">
	   <input type="text" name="telefon" placeholder="Telefon:" ">
       <input type="text" name="email" placeholder="Email:" ">
       <input type="text" name="haslo1" placeholder="Hasło:" ">
	   <input type="text" name="haslo2" placeholder="Powtórz hasło:" ">
	   <div class="s1">
	   <input type="checkbox" id="reg">
	   <label for="reg">Oświadczam, że znam i akceptuję postanowienia <a href="url">Regulaminu Veloxis.</a></label>
	   </div><div class="s1">
	   <input type="checkbox" id="pozw">
	   <label for="pozw">  Wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych i otrzymywanie informacji handlowych od Veloxis z wykorzystaniem telekomunikacyjnych urządzeń końcowych (m.in. telefon) oraz środków komunikacji elektronicznej (m.in. SMS, e-mail). 
       </label>
	   </div>
       <button type="submit" class="btn" name="reg_user">Rejestruj</button>
    </form>
	<br>
	<a href="../php/logowanie.php">Masz już konto? Przejdź do logowania.<a>
  </div>
</div>
</body>

</html>

