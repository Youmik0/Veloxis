<?php include('konto.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/re.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="topbar"><div id="logo">Veloxis</div></div>
<div id="cont">

  <div id="rejestracja">
	<h1>Rejestracja</h1>
    <form method="post" action="../php/rejestracja.php">
	   <input type="text" name="nazwa_uzytkownika" placeholder="Nazwa użytkownika: ">
	   <?php if(!empty($_us_error)) echo $_us_error; if(!empty($_usc_error)) echo $_usc_error; ?>
       <input type="text" name="imie" placeholder="Imie: ">
	   <?php if(!empty($_name_error)) echo $_name_error; ?>
       <input type="text" name="nazwisko" placeholder="Nazwisko: ">
	   <?php if(!empty($_lastn_error)) echo $_lastn_error; ?>
	   <input type="text" name="miejscowosc" placeholder="Miejscowosc: ">
	   <?php if(!empty($_m_error)) echo $_m_error; ?>
	   <input type="text" name="ulica" placeholder="Ulica: ">
	   <?php if(!empty($_u_error)) echo $_u_error; ?>
	   <input type="text" name="nr_domu" placeholder="Nr. domu/mieszkania: ">
	   <?php if(!empty($_n_error)) echo $_n_error; ?>
	   <input type="text" name="kod_po" pattern="[0-9]{2}\-[0-9]{3}" title="Kod pocztowy wymagany w następującym formacie NP: 12-345" placeholder="Kod pocztowy: ">
	   <?php if(!empty($_k_error)) echo $_k_error; ?>
	   <input type="text" name="numer_bank" pattern="[0-9]{26}" title="Potrzebne jest 26 cyfr" placeholder="Numer konta bankowego: ">
	   <?php if(!empty($_b_error)) echo $_b_error; ?>
	   <input type="tel" name="telefon" placeholder="Telefon: " pattern="[0-9]{9}" title="Potrzebne jest 9 cyfr" required>
	   <?php if(!empty($_phone_error)) echo $_phone_error; ?>
       <input type="email" name="email" placeholder="Email: ">
	   <?php if(!empty($_mail_error)) echo $_mail_error; if(!empty($_mail2_error)) echo $_mail2_error;?>
       <input type="password" name="haslo1" pattern=".{8,}" title="8 lub więcej znaków" placeholder="Hasło: ">
	   <?php if(!empty($_pas_error)) echo $_pas_error; ?>
	   <input type="password" name="haslo2" pattern=".{8,}" title="8 lub więcej znaków" placeholder="Powtórz hasło: ">
	   <?php if(!empty($_pass2_error)) echo $_pass2_error; ?>
	   <div class="s1">
	   <input type="checkbox" name="reg" id="reg">
	   <label for="reg">Oświadczam, że znam i akceptuję postanowienia <a href="url">Regulaminu Veloxis.</a></label>
	   <?php if(!empty($_reg_error)) echo $_reg_error; ?>
	   </div><div class="s1">
	   <input type="checkbox" name="pozw" id="pozw">
	   <label for="pozw">  Wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych i otrzymywanie informacji handlowych od Veloxis z wykorzystaniem telekomunikacyjnych urządzeń końcowych (m.in. telefon) oraz środków komunikacji elektronicznej (m.in. SMS, e-mail). 
       </label>
	   <?php if(!empty($_pozw_error)) echo $_pozw_error; ?>
	   </div>
       <button type="submit" class="btn" name="reg_user">Zarejestruj</button>
    </form>
	<br>
	<a href="../php/logowanie.php">Masz już konto? Przejdź do logowania.<a>
  </div>
</div>
<script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>

</html>

