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
	$search_value=$_GET['search'];
	$kategoria=$_GET['kategoria'];
	$stan=$_GET['stan'];
	$od=$_GET['od'];
	$do=$_GET['do'];
	$marka=$_GET['marka'];
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
	<div id="wyszukaj"><form method="get" action="search.php"><input name="search" type="text" id="te" value="<?php if(isset($_GET['search'])) echo $_GET['search'];  ?>" placeholder="Czego szukasz?"><button name="bt1" class="bt" >&#x2315;</button>
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
			
			echo '<div id="kategorie"><h2>Filtry:</h2>';
			?>
			Kategoria:
			<select name="kategoria">
			<option value='0'>Wszystkie kategorie</option>
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
			</select><br><br>
			
			<?php
			echo '<br>Stan:<select name="stan">
			<option value=0>Dowolny stan</option>';
			?>
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
			<?php

			echo '</select><br><br>';
			
			?>
			
			<?php
			echo '<br>Marka:<select name="marka">
			<option value=0>Dowolna marka</option>';
			?>
			<?php
			$db = mysqli_connect('localhost','root','','veloxis');
			$db->set_charset("utf8");
			$res=mysqli_query($db,"SELECT DISTINCT marka FROM oferty");
			while($row=mysqli_fetch_array($res)){
			?>
			<option><?php echo $row["marka"]; ?></option>
			<?php 
			}
			?>
			
			<?php
			echo '</select><br><br>';
			echo 'Cena: <br>Od:<input type="text" name="od" placeholder="0.00zł"/><br>Do:<input type="text" name="do" placeholder="0.00zł"/><br><br><center><button name="bt1">Wyszukaj</button></center></form><br><br></div>';
			echo '<div id="losoferty">';
			$sql="select * from oferty where nazwa_oferty like '%$search_value%' AND aktywna='1'";
			if($kategoria!=0){
				$sql .= " AND id_kategorii='$kategoria'";
			}
			if(!empty($stan)){
				$sql .= " AND stan='$stan'";
			}
			if(!empty($od) OR $od!=0){
				$sql .= " AND cena >= '$od'";
			}
			if(!empty($do) OR $do!=0){
				$sql .= " AND cena <= '$do'";
			}
			if(!empty($marka)){
				$sql .= " AND marka LIKE '$marka'";
			}
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
			}
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
	<div id="adv"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
	</div>
	<script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>

</html>
