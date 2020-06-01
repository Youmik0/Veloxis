<?php include('dodawanie_conf.php') ?>

<?php if(!isset($_SESSION['nazwa_uzytkownika'])){  //Jeżeli nie jestes zalogowany nie masz dostępu do tej strony
	header('location: veloxis.php');
} ?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Veloxis - dodaj ofertę</title>
  <link rel="stylesheet" href="../css/of.css">
</head>
<body>

	
	<div id="topbar"><div id="logo">Veloxis</div>
	<div id="wyszukaj"><form method="get" action="search.php"><input name="search" type="text" id="te" value="<?php if(isset($_POST['search'])) echo $_POST['search'];  ?>" placeholder="Czego szukasz?"><button name="bt1" class="bt" >&#x2315;</button>	<input name="kategoria" value='0' type='hidden'><input type="hidden" name="stan" value="0"><input type="hidden" name="marka" value=""><input type="hidden" name="od" value=""><input type="hidden" name="do" value="">

	</form></div>
	<div id="user">
	
	<?php
		if(isset($_SESSION['nazwa_uzytkownika'])): ?>
		
		<div class="w1">
		</div>
		<div class="w1">
		<div class="dropd">
		<div onclick="myFunction()" class="drop">
		<?php 
		echo $_SESSION['nazwa_uzytkownika'];
		echo '<img class="xd2"  src="profilowe/'. $_SESSION["profilowe"] .'" width="65px" height="65px">';
		?>
		</div>
		<div id="mDropd" class="dropd-cont">
		<a href="dodawanie.php">Dodaj ofertę</a>
		<a href="moje_oferty.php">Moje oferty</a>
		<a href="ustawienia.php">Ustawienia</a>
		<?php
		$typ_konta=$_SESSION['typ_konta'];
		if($typ_konta==3): ?>
		<a href ="premium.php">Kup premium</a>
		<?php endif; ?>
		<?php
		$typ_konta=$_SESSION['typ_konta'];
		if($typ_konta==1): ?>
		<a href="admin.php">Admin tools</a>
		<?php endif; ?>
		<a href="veloxis.php?logout='1'">Wyloguj</a>
		</div>
		</div>
		</div></div>
		<script>

		function myFunction() {
		document.getElementById("mDropd").classList.toggle("show");
			}

		
			
			document.getElementsByClassName(".drop").addEventListener("click", xx);
			document.getElementsByClassName(".xd2").addEventListener("click", xx);
			function xx(){
			
				var dropdowns = document.getElementsByClassName("dropd-cont");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
						}
					}
			}
		</script>	
	
		<script>
		document.getElementById("rej").addEventListener("click", zRej);

		function zRej() {
		window.location.href="../php/rejestracja.php";
		}

		document.getElementById("log").addEventListener("click", zLog);

		function zLog() {
		window.location.href="../php/logowanie.php";
		}
		</script>
		<?php endif; ?>
		
		
	</div></div>
	<div id="main">
	<div id="addo">
	<h1>Dodawanie Oferty</h1>
	<form method="post" action="../php/dodawanie.php" ENCTYPE="multipart/form-data">
       <input type="text" name="nazwa" placeholder="Nazwa aukcji"/>
	   <?php if(!empty($_nz_error)) echo $_nz_error; ?>
       <input type="text" name="opis" placeholder="Opis aukcji"/>
	   <input type="number" name="cena" placeholder="Cena"/>
	   <?php if(!empty($_cn_error)) echo $_cn_error; ?>
	   	<div class="kt">
		Wybierz kategorie produktu:
	<select name="kategoria" >
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
	<?php if(!empty($_kt_error)) echo $_kt_error; ?>
	</div>
	<div class="st">
	Wybierz stan produktu:
	<select name='stan' >
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
	<?php if(!empty($_st_error)) echo $_st_error; ?>
	</div>

	<input type="text" name="marka" placeholder="Nazwa marki"/>
	<?php if(!empty($_mkr_error)) echo $_mkr_error; ?>
	 <div class="zdje">Dodaj zdjęcie główne (pozostałe zdjęcia należy umieścić w ustawieniach):
	<input type="file" name="zdjecie">
     <button type="submit" class="btn" name="dodawanie_oferty">Dodaj ofertę</button>
    </form> </div>
	</div>
	</div>
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
