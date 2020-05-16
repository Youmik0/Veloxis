<?php include('dodawanie_conf.php') ?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Veloxis - dodaj ofertę</title>
  <link rel="stylesheet" href="../css/of.css">
</head>
<body>

	<div id="topbar"><div id="logo"><a href="../php/veloxis.php">Veloxis</a></div>
    
	</div>
	<div id="main">
	<div id="menu">
	<div class="op" id="i1">Dane</div>
	<div class="op" id="i2">Moje oferty</div>
	<div class="op" id="i3">Dodaj oferty</div>
	<div class="op" id="i4">JD</div>
	</div>
	<div id="addo">
	<h1>Dodaj Ofertę<h1>
	<form method="post" action="../php/dodawanie.php" ENCTYPE="multipart/form-data">
	<?php include('errors.php'); ?>
       <input type="text" name="nazwa" placeholder="Nazwa aukcji"/>
       <input type="text" name="opis" placeholder="Opis aukcji"/>
	<select name="kategoria">
	<option>Wybierz kategorie</option>
	<option value="1">Elektronika</option>
	<option value="2">Moda</option>
	<option value="3">Dom i ogród</option>
	<option value="4">Kultura i rozrywka</option>
	<option value="5">Motoryzacja</option>
	</select>
	<INPUT type="file" name="zdjecie">
       <button type="submit" class="btn" name="dodawanie_oferty">Dodaj ofertę</button>
    </form>
	</div>
	</div>
	
<script>
document.getElementById("i1").addEventListener("click", myFunction);

function myFunction() {
  window.location.href='http://www.google.com/';
}

document.getElementById("i2").addEventListener("click", myFunction);

function myFunction() {
  window.location.href='http://www.google.com/';
}


document.getElementById("i3").addEventListener("click", myFunction);

function myFunction() {
  window.location.href='http://www.google.com/';
}

document.getElementById("i4").addEventListener("click", myFunction);

function myFunction() {
  window.location.href='http://www.google.com/';
}

document.getElementById("logo").addEventListener("click", myFunction);

function myFunction() {
  window.location.href='http://www.google.com/';
}
</script>
</body>

</html>