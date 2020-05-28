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
  <link rel="stylesheet" href="../css/gl.css">
</head>
<body>

	<div id="topbar"><div id="logo">Veloxis</div>
	<div id="wyszukaj">Moje oferty</div>
	<div id="user">
	
	<?php
		if(isset($_SESSION['nazwa_uzytkownika'])): ?>
		
		<div class="w1">
		</div>
		<div class="w1">
		<div class="dropd">
		<button onclick="myFunction()" class="drop"><?php echo $_SESSION['nazwa_uzytkownika'] ." [#". $_SESSION['id'] ."]"; echo "<img src='profilowe/". $_SESSION["profilowe"] ."' width='65px' height='65px' style='float:right'>";?></button>
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

			window.onclick = function(event) {
			if (!event.target.matches('.drop')) {
				var dropdowns = document.getElementsByClassName("dropd-cont");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
						}
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
	<div id="cont">
	<div id="kategorie"><a href="dodawanie.php">Dodanie oferty</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
	<div id="losoferty"><?php
		
		$raz=1;
		$raz2=1;
		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else{
			
			$search_value=$_SESSION['id'];
			$sql="select * from oferty where id_uzytkownika like '%$search_value%'";
			$res=$con->query($sql);
			if (mysqli_num_rows($res)==0)
			{
				echo '<br>Brak ofert<br><br><br><br><br><br><br><br><br><br><br><br>';
			}
			else{
			while($row=$res->fetch_assoc()){
				$id=$row["id"];
				$nazwa=$row["nazwa_oferty"];
				$base="./show.php";
				$data = array(
				'id' => $id
				);
				
				$url = $base . '?' . http_build_query($data);
				//echo "<img src='oferty/". $row["nazwa_zdjecia"] ."'>"; //Wyswietla zdjecie
				if($row["premium"]==1){
					echo '<a href='.$url.'><div class="ofertapromowana"><div class="pic"><img height="116" width="133" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="crpromowane"><div class="tit">'.$row["nazwa_oferty"].'</div><div class="pric">'.$row["cena"].'</div></div></div></a>';
				}else{
					echo '<a href='.$url.'><div class="oferta"><div class="pic"><img height="116" width="133" src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="cr"><div class="tit">'.$row["nazwa_oferty"].'</div><div class="pric">'.$row["cena"].'</div></div></div></a>';
				};
				echo '<form method="post" action="../php/moje_oferty.php" ENCTYPE="multipart/form-data"><input type="file" name="zdjecie"><button type="submit" name="dodaj" value='.$id.'>Dodaj zdjęcie</button></form>';
				echo '<form method="post" action="../php/moje_oferty.php"><button type="submit" name="usun" value='.$id.'>Usuń ofertę</button></form>';
				
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
				
				}
		}
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