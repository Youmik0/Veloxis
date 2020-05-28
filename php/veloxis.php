<?php
session_start();
if(isset($_GET['logout'])) //Wylogowanie
{
	session_destroy();
	unset($_SESSION['nazwa_uzytkownika']);
	unset($_SESSION['haslo']);
	unset($_SESSION['email']);
	unset($_SESSION['profilowe']);
	unset($_SESSION['id']);
	unset($_SESSION['typ_konta']);
	header("location: veloxis.php");
}
if(empty($_SESSION['profilowe']))
{
	$_SESSION['profilowe']="puste.jpg";
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

	<div id="topbar"><div id="logo">Veloxis</div>
	<div id="wyszukaj"><form method="post" action="veloxis.php"><input name="search" type="text" id="te" placeholder="Czego szukasz?"><button name="bt1" class="bt" >&#x2315;</button></form></div>
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

	<?php
		
		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else {
			
			if(array_key_exists('bt1', $_POST)) {
				echo '<div id="cont" style="margin-top:20px;"><div id="kategorie"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>';
			echo '<div id="losoferty" >';
			$search_value=$_POST["search"];
			$sql="select * from oferty where nazwa_oferty like '%$search_value%'";
			$res=$con->query($sql);
			if(mysqli_num_rows($res)!=0){
			while($row=$res->fetch_assoc()){
				$id=$row["id"];
				$base="./show.php";
				$data = array(
				'id' => $id
				);
				$url = $base . '?' . http_build_query($data);
				if($row["premium"]==1){
					echo '<a href='.$url.'><div class="ofertapromowana"><div class="pic"><img height="133" width="180" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="crpromowane"><div class="tit"><b>'.$row["nazwa_oferty"].'</b></div><div class="stan1"><b>Stan:</b> '.$row["stan"].'</div><div class="marka1"><b>Marka:</b> '.$row["marka"].'</div><div class="pric"><b>Cena:</b> '.$row["cena"].' zł</div></div></div></a>';
				}else{
					echo '<a href='.$url.'><div class="oferta" ><div class="pic"><img height="133" width="180" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="cr"><div class="tit"><b>'.$row["nazwa_oferty"].'</b></div><div class="stan1"><b>Stan:</b> '.$row["stan"].'</div><div class="marka1"><b>Marka:</b> '.$row["marka"].'</div><div class="pric"><b>Cena:</b> '.$row["cena"].' zł</div></div></div></a>';
				};
				
				
			} 
			}else{echo "Brak takich ofert";}
			}else{
				echo '<div id="cont"><div id="losoferty" style="width:80%;">';
				echo '<div class="slider">';
				echo '<h1>Proponowane ofery:</h1>';
				echo '<div class="w3-content w3-display-container">';

		
			
			$sql='select * from oferty where premium="1"';
			$res=$con->query($sql);
			
			while($row=$res->fetch_assoc()){
				echo '<div class="mySlides"><div class="imgg"><img height="452" src="oferty/'.$row["nazwa_zdjecia"].'" style="width:100%"></div><div class="dsc"><div class="title">'.$row["nazwa_oferty"].'</div><div class="stan">Stan: '.$row["stan"].'</div><div class="marka">Marka: '.$row["marka"].'</div><div class="price">Cena: '.$row["cena"].'zł</div><div class="buy">Kup teraz</div></div></div>';
			}
			
		


	echo '<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>';
	echo '<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>';
	echo '</div>';
		}}
?>
		<script>

		window.onload = function(){
			var button = document.getElementsByClassName('w3-button w3-black w3-display-right')[0];
			setInterval(function(){button.click();},5000); };

		</script>
		<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		showDivs(slideIndex += n);
		}

		function showDivs(n) {
		let i;
		let x = document.getElementsByClassName("mySlides");
		if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length}
		for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
		}
		x[slideIndex-1].style.display = "block";  
		}
		</script>
 <?php    echo '</div>';
?></div>
	<div id="adv"></div>
	</div>
	<script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>

</html>
