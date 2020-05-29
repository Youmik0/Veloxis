
<?php include('ustawienia_uz.php') ?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <title>Veloxis</title>
  <link rel="stylesheet" href="../css/ustawienia.css">
</head>
<body>

	<div id="topbar"><div id="logo">Veloxis</div>
	<div id="wyszukaj"><form method="get" action="search.php"><input name="search" type="text" id="te" value="<?php if(isset($_POST['search'])) echo $_POST['search'];  ?>" placeholder="Czego szukasz?"><button name="bt1" class="bt" >&#x2315;</button>	<input name="kategoria" value='0' type='hidden'><input type="hidden" name="stan" value="0"><input type="hidden" name="marka" value=""><input type="hidden" name="od" value=""><input type="hidden" name="do" value="">
	</div>
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
		if($typ_konta==1): ?>
		<a href="admin.php">Admin tools</a>
		<?php endif; ?>
		<a href="veloxis.php?logout='1'">Wyloguj</a>
		</div>
		</div>
		</div>
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
		<?php else:?>
		<div id="rej">Zarejestruj</div>
		<div id="log">Zaloguj</div>
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
	<div id="cont" style="margin-top:20px;">
	<?php
		

		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else {
		?>
			<div id="csd">
					
					<div class="zmiana_hasla">
					<p>Zmiana hasla:</p>
					<div class="f1"><form method="post" action="../php/ustawienia.php">
					<input type="text" name="haslo_nowe1" placeholder="Podaj nowe hasło: "></br></br>
					<input type="text" name="haslo_nowe2" placeholder="Powtórz nowe hasło: "></div>
					<button style="margin-left:35px;" type="submit" class="btn" name="change_pass">Zmień hasło</button>
					</form>
					</div>
					
					<div class="zmiana_ava">
					<p>Zmień avatar:</p>
					<div class="f1"><form method="post" action="../php/ustawienia.php" ENCTYPE="multipart/form-data">
					<input type="file" name="zdjecie">
					<button type="submit"  class="btn" name="zmiana_profilowego">Zmień zdjecie profilowe</button>
					</form>
					
					</div></div>
					
					
					<div class="zmiana_danych">
					<p>Zmień swoje dane zamieszkania:</p>
					<input type="text" name="miejscowosc" placeholder="Podaj nową miejscowosc: "></br></br>
					<input type="text" name="ulica" placeholder="Podaj nową ulice: "></br></br>
					<input type="text" name="nr_domu" placeholder="Podaj nowy nr. domu: "></br></br>
					<input type="text" name="kod" placeholder="Podaj nowy kod pocztowy "></br>
					<button type="submit" style="margin-left:35px;" class="btn" name="zmiana_danych">Zmień dane</button>
					</form>
					</div>
					<div class="zmiana_telefonu">
					<p>Zmień nr. telefonu</p>
					<input type="number" name="nr_tel" placeholder="Podaj nowy nr. telefonu "></br>
					
					<button type="submit" style="margin-left:35px;" class="btn" name="zmiana_nr">Zmień numer</button>
					</form>
					
					</div>
					<div class="zmiana_konta">
					<p>Zmień nr. konta bankowego</p>
					<input type="number" name="nr_konta" placeholder="Podaj nowy nr. konta bankowego "></br>
					
					<button type="submit" style="margin-left:35px;" class="btn" name="zmiana_nr_konta">Zmień numer</button>
					</form>
					
					</div>

				</div>	
				
				
			
			
				
			
		<?php	}
?>


		
 <?php    echo '</div>';
?></div>

	</div>
	<script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>

</html>
