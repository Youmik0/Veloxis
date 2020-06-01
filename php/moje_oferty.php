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
	header("location: veloxis.php");
}
if(empty($_SESSION['profilowe']))
{
	$_SESSION['profilowe']="puste.jpg";
}
if(!isset($_SESSION['nazwa_uzytkownika'])){  //Jeżeli nie jestes zalogowany nie masz dostępu do tej strony
	header('location: veloxis.php');
}
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <title>Veloxis</title>
  <link rel="stylesheet" href="../css/mo.css">
</head>
<body>

	<div id="topbar"><div id="logo">Veloxis</div>
	<div id="wyszukaj"><form method="get" action="search.php"><input name="search" type="text" id="te" value="<?php if(isset($_POST['search'])) echo $_POST['search'];  ?>" placeholder="Czego szukasz?"><button name="bt1" class="bt" >&#x2315;</button>	<input name="kategoria" value='0' type='hidden'><input type="hidden" name="stan" value="0"><input type="hidden" name="marka" value=""><input type="hidden" name="od" value=""><input type="hidden" name="do" value=""></form>
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
		echo '<form method="get" action="moje_oferty.php"><button name="mo" class="c" >Aktywne oferty</button><button name="zk" class="t" >Zakończone oferty</button></form>';

		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else {
			
			if(!isset($_GET['zk'])){	
		
			$raz=1;
		$raz2=1;
			$search_value=$_SESSION['id'];
			$sql="select * from oferty where id_uzytkownika like '%$search_value%' and aktywna=1";
			echo '</br></br><h1>Moje Aktywne Oferty:</h1>';
			$res=$con->query($sql);
			if(mysqli_num_rows($res)!=0){
			while($row=$res->fetch_assoc()){
				$id=$row["id"];
				$base="./show.php";
				$data = array(
				'id' => $id
				);
				echo '<div class="cc">';
				$url = $base . '?' . http_build_query($data);
				if($row["premium"]==1){
					echo '<a href='.$url.'><div class="ofertapromowana"><div class="pic"><img height="133" width="180" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="crpromowane"><div class="tit"><b>'.$row["nazwa_oferty"].'</b></div><div class="stan1"><b>Stan:</b> '.$row["stan"].'</div><div class="marka1"><b>Marka:</b> '.$row["marka"].'</div><div class="pric"><b>Cena:</b> '.$row["cena"].' zł</div></div></div></a>';
				}else{
					echo '<a href='.$url.'><div class="oferta" ><div class="pic"><img height="133" width="180" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="cr"><div class="tit"><b>'.$row["nazwa_oferty"].'</b></div><div class="stan1"><b>Stan:</b> '.$row["stan"].'</div><div class="marka1"><b>Marka:</b> '.$row["marka"].'</div><div class="pric"><b>Cena:</b> '.$row["cena"].' zł</div></div></div></a>';
				};
				echo '<div class="aa"><form method="post" action="../php/moje_oferty.php" ENCTYPE="multipart/form-data"><input type="file" name="zdjecie"><button type="submit" name="dodaj" value='.$id.'>Dodaj zdjęcie</button></form></div>';
				echo '<div class="bb"><form method="post" action="../php/moje_oferty.php"><button type="submit" class="usun"  name="usun" value='.$id.'>Usuń ofertę</button></form></div>';
				echo '</div>';
				if($raz==1){
				if(isset($_POST['dodaj'])){
					$raz=0;
					if($_FILES['zdjecie']['size'] > 0)
				{
					$img=rand(1000,100000)."-".$_FILES['zdjecie']['name'];
					$imgimg="$img";
					//move_uploaded_file($_FILES['zdjecie']['tmp_name'],"oferty/$img");
				}
					
					$id2=$_POST['dodaj'];
					$nazwazdj=$img;
					$insert="INSERT INTO oferty_zdj VALUES ('NULL','$img','$id2')";
					if(mysqli_query($con,$insert))
					{
					move_uploaded_file($_FILES['zdjecie']['tmp_name'],"oferty/$img");
					header('Location: ./veloxis.php');
					}
					$array = array(
					'id'=>$id2,
					'nazwa_zdj'=>$imgimg,
					);
					//header('Location: dod_zdj.php?vals=' . urlencode(serialize($array)));
					}
				
				
				
			}
			
			if($raz2==1){
				if(isset($_POST['usun'])){
					$id3=$_POST['usun'];
					mysqli_query($con,"SET foreign_key_checks = 0");
					$sql6="DELETE FROM oferty WHERE id='$id3'";
					$sql7="DELETE FROM oferty_zdj WHERE id_oferty='$id3'";
					mysqli_query($con,$sql7);
					mysqli_query($con,$sql6);
					mysqli_query($con,"SET foreign_key_checks = 1");
					header('Location: veloxis.php');
				}
			}
			
			}
				
			} else{echo  '<h1 style="text-align:center;">Brak takich ofert</h1>';}
			}else{
			
			//$search_value=$_SESSION['nazwa_uzytkownika'];
			//$sql='select * from transakcje where sprzedawca = "'.$search_value.'"';
			echo '</br></br><h1 style="margin-left:260px;">Moje Zakończone Oferty:</h1>';
			$sv=$_SESSION['nazwa_uzytkownika'];
			$sq='select * from transakcje where sprzedawca = "'.$sv.'"';
			$re=$con->query($sq);
			if(mysqli_num_rows($re)!=0){
			while($ro=$re->fetch_assoc()){
			$search_value=$ro['id_oferty'];
			$sql='select * from oferty where id = "'.$search_value.'"';
			$res=$con->query($sql);
			if(mysqli_num_rows($res)!=0){
			while($row=$res->fetch_assoc()){
				$id=$row["id"];
				$base="./show.php";
				$data = array(
				'id' => $id
				);
				echo '<div class="cc">';
				$url = $base . '?' . http_build_query($data);
				if($row["premium"]==1){
					echo '<a href='.$url.'><div class="ofertapromowana" ><div class="pic"><img height="133" width="180" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="crpromowane"><div class="tit"><b>'.$row["nazwa_oferty"].'</b></div><div class="stan1"><b>Stan:</b> '.$row["stan"].'</div><div class="marka1"><b>Marka:</b> '.$row["marka"].'</div><div class="pric"><b>Cena:</b> '.$row["cena"].' zł</div></div></div></a>';
					echo '<div class="kupujacy"><h2>Kupił:'.$ro['imie_nazwisko_k'].'</h2> (Nazwa użytkownika: '. $ro['kupujacy'] .')<br> z dostawą: '.$ro['dostawa'].' do '.$ro['adres_k'].'</div>';
				}else{
					echo '<div class="assd"><a href='.$url.'><div class="oferta" ><div class="pic"><img height="133" width="180" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="cr"><div class="tit"><b>'.$row["nazwa_oferty"].'</b></div><div class="stan1"><b>Stan:</b> '.$row["stan"].'</div><div class="marka1"><b>Marka:</b> '.$row["marka"].'</div><div class="pric"><b>Cena:</b> '.$row["cena"].' zł</div></div></div></a></div>';
						echo '<div class="kupujacy" ><h2>Kupił:'.$ro['imie_nazwisko_k'].'</h2> (Nazwa użytkownika: '. $ro['kupujacy'] .')<br> z dostawą: '.$ro['dostawa'].' do '.$ro['adres_k'].'</div>';
				}
			
			echo "</div>";
			}
			
			}
		
			}
			
			
			}
			}
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

	</div>
	<script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>

</html>
