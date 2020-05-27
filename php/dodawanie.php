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
	   <input type="text" name="cena" placeholder="Cena"/>
	<select name="kategoria">
	<option>Wybierz kategorie</option>
	<?php
		$db = mysqli_connect('localhost','root','','veloxis');
	$db->set_charset("utf8");
	$res=mysqli_query($db,"SELECT * FROM kategoria");
	while($row=mysqli_fetch_array($res)){
	?>
	<option value="<?php echo $row["id"]; ?>"><?php echo $row["nazwa"]; ?></option>
	<?php
	}
	?>
	</select>
	
	<select name='stan'>
	<option value="">Wybierz stan</option>
	<?php
	$db = mysqli_connect('localhost','root','','veloxis');
	$db->set_charset("utf8");
	$res=mysqli_query($db,"SELECT * FROM stan");
	while($row=mysqli_fetch_array($res)){
	?>
	<option><?php echo $row["nazwa"]; ?></option>
	<?php 
	}
	?>
	</select>
	<input type="text" name="marka" placeholder="Nazwa marki"/>
	<input type="file" name="zdjecie">
       <button type="submit" class="btn" name="dodawanie_oferty">Dodaj ofertę</button>
    </form>
	</div>
	</div>
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
