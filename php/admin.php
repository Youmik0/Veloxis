<?php
session_start();
$db = mysqli_connect('localhost','root','','veloxis');
$db->set_charset("utf8");
$typ_konta=$_SESSION['typ_konta'];
$errors = array();
if(!isset($_SESSION['nazwa_uzytkownika'])){  //Jeżeli nie jestes zalogowany nie masz dostępu do tej strony
	header('location: veloxis.php');
}
if($typ_konta!=1) //Jeżeli nie jesteś adminem nie masz dostępu.
	{
	echo "<script>alert('Nie masz dostępu do tej strony')</script>";
	header('location: veloxis.php');
	}
	
	
	if(isset($_POST['usuwanie_wszystkich_ofert'])){
		$nazwa_uzytkownika=$_POST['aukcja'];
		if(empty($id_aukcji)){array_push($errors,"Użytkownik którego aukcję chemy usunąć jest wymagany.");}
		
		$sql="SELECT * FROM users WHERE nazwa_uzytkownika='$nazwa_uzytkownika'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_assoc($result);
		$id_uz=$row["id"];
		$sql3="SELECT * FROM oferty WHERE id_uzytkownika=$id_uz";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);


			echo $id_uz;
			mysqli_query($db,"SET foreign_key_checks = 0");
			echo '<br><br><br><br><br><br><br><br><br>';
			$sql="DELETE FROM oferty WHERE id_uzytkownika='$id_uz'";
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		
		
	}
	
		if(isset($_POST['usuwanie_oferty'])){
		$id_aukcji=$_POST['aukcja'];
		if(empty($id_aukcji)){array_push($errors,"Id aukcji jest wymagane.");}
		$sql3="SELECT * FROM oferty WHERE id=$id_aukcji";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);
		if(!$result3 || mysqli_num_rows($result3)==0)
		{
			array_push($errors,"Nie ma aukcji o takim Id.");
		}
		if(count($errors)==0){
			mysqli_query($db,"SET foreign_key_checks = 0");
			$sql="DELETE FROM oferty WHERE id='$id_aukcji'";
			$sql2="DELETE FROM oferty_zdj WHERE id_oferty='$id_aukcji'";
			mysqli_query($db,$sql2);
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		}
		
	}
	
	if(isset($_POST['usuwanie_uzytkownika'])){
		$uzytkownik=$_POST['uzytkownik'];
		if(empty($uzytkownik)){array_push($errors,"nazwa uzytkownika jest wymagane.");}
		$sql3="SELECT * FROM users WHERE nazwa_uzytkownika='$uzytkownik'";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);
		//if(!$result3 || mysqli_num_rows($result3)==0)
		//{
		//	array_push($errors,"Nie ma aukcji o takim Id.");
		//}
		if(count($errors)==0){
			mysqli_query($db,"SET foreign_key_checks = 0");
			$sql="DELETE FROM users WHERE nazwa_uzytkownika='$uzytkownik'";
			$sql2="DELETE FROM profilowe WHERE id_uzytkownika='$uzytkownik'";
			mysqli_query($db,$sql2);
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		}
		
	}
	
		if(isset($_POST['zobacz_zgloszenia'])){
		$zgloszenia=$_POST['zgloszenia'];
		if(!empty($zgloszenia)){
			$sql="SELECT * from zgloszenia where id_zgloszonego like '$zgloszenia'";
		}
		else {
			$sql="SELECT * from zgloszenia";
		}
		$res=$db->query($sql);
		while($row=$res->fetch_assoc()){
			echo '<div class="ofertapromowana"><div class="crpromowane"><div class="tit">Id oferty='.$row["id_oferty"].', Nazwa Oferty:'. $row["nazwa_oferty"] .' <br>[Opis:'. $row["opis"] .']</div><div class="pric">Id zgloszonego: '. $row["id_zgloszonego"] .'</div></div></div>';
		}
		
	}
	
	
	if(isset($_POST['promowanie_uzytkownika'])){
		$uzytkownik=$_POST['promocja'];
		$sql3="SELECT * FROM users WHERE nazwa_uzytkownika='$uzytkownik'";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);
		//if(!$result3 || mysqli_num_rows($result3)==0)
		//{
		//	array_push($errors,"Nie ma aukcji o takim Id.");
		//}
		if(count($errors)==0){
			mysqli_query($db,"SET foreign_key_checks = 0");
			$sql="UPDATE users SET typ_konta='1' WHERE nazwa_uzytkownika='$uzytkownik'";
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		}
		
	}
	
	if(isset($_POST['degradowanie_uzytkownika'])){
		$admin=$_POST['degradacja'];
		if(empty($admin)){array_push($errors,"Id admina jest wymagane.");}
		$sql3="SELECT * FROM users WHERE nazwa_uzytkownika='$admin'";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);
		//if(!$result3 || mysqli_num_rows($result3)==0)
		//{
		//	array_push($errors,"Nie ma aukcji o takim Id.");
		//}
		if(count($errors)==0){
			mysqli_query($db,"SET foreign_key_checks = 0");
			$sql="UPDATE users SET typ_konta='3' WHERE nazwa_uzytkownika='$admin'";
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		}
		
	}
?>
<html>
<head>
<title>Admin</title>
  <link rel="stylesheet" href="../css/gl.css">
</head>
<body>

	<div id="topbar"><div id="logo">Veloxis</div>
	<div id="wyszukaj"><form method="post" action="admin.php"><input name="search" type="text" id="te" value="<?php if(isset($_POST['search'])) echo $_POST['search'];  ?>" placeholder="Czego szukasz?"><button name="bt1" class="bt" >&#x2315;</button>	<input name="kategoria" value='0' type='hidden'><input type="hidden" name="stan" value="0"><input type="hidden" name="marka" value=""><input type="hidden" name="od" value=""><input type="hidden" name="do" value="">

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
	<div id="cont">
	<?php
		

		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		$search_value="";
		if(array_key_exists('bt1', $_POST)) {
			$search_value=$_POST["search"];
		}
		
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else {
			
			echo '<div id="kategorie"><h2>Admin Tools:</h2>';
			?>
			
			<table>
			<form method="post" action="../php/admin.php">
<tr>
<td>Usuń wszystkie aukcje użytkownika: <input type="text" name="aukcja" placeholder="Nazwa użytkownika"/></td><td><button type="submit" class="btn" name="usuwanie_wszystkich_ofert">Wykonaj - Usuń wszystkie aukcję o N.Uż</button></td>
<tr>
<td>Usuń aukcje o numerze id: <input type="text" name="aukcja" placeholder="Nr aukcji"/></td><td><button type="submit" class="btn" name="usuwanie_oferty">Wykonaj - Usuń aukcję po ID</button></td>
</tr>
<td>Usuń użytkownika: <input type="text" name="uzytkownik" placeholder="Nazwa użytkownika"/></td><td><button type="submit" class="btn" name="usuwanie_uzytkownika">Wykonaj - Usuń użytkownika</button></td>
</tr>
<tr>
<td>Zobacz zgłoszenia użytkownika o nazwie: <input type="text" name="zgloszenia" placeholder="nazwa użytkownika"/></td><td><button type="submit" class="btn" name="zobacz_zgloszenia">Wykonaj - Pokaż zgłoszenia użytkownika</button></td>
</tr>
<tr>
<td>Promuj użytkownika o nazwie uż do statusu admina: <input type="text" name="promocja" placeholder="nazwa użytkownika"/></td><td><button type="submit" class="btn" name="promowanie_uzytkownika">Wykonaj - Awansuj użytkownika do statusu admina</button></td>
</tr>
<tr>
<td>Degraduj admina o nazwie uż do statusu użytkownika: <input type="text" name="degradacja" placeholder="nazwa admina"/></td><td><button type="submit" class="btn" name="degradowanie_uzytkownika">Wykonaj - Degraduj admina do statusu użytkownik</button></td>
</tr>
			</form>
</table>
			
			<?php
			echo '</div>';
			echo '<div id="losoferty" style="background-color:grey;">';
			$sql="select * from users where nazwa_uzytkownika like '%$search_value%'";

			$res=$con->query($sql);
			if(mysqli_num_rows($res)!=0){
			while($row=$res->fetch_assoc()){
				$id_uzytkownika=$row["id"];
				$sql2="SELECT nazwa from profilowe where id_uzytkownika='$id_uzytkownika'";
				$res2=mysqli_query($con,$sql2);
				$row2=mysqli_fetch_array($res2);
				if(!empty($row2[0])){
					$img=$row2[0];
				}else{$img="puste.jpg";}
				$id=$row["id"];
				$base="./show.php";
				$data = array(
				'id' => $id
				);
				$url = $base . '?' . http_build_query($data);
				if($row["typ_konta"]==1){
					$typ_kk="Admin";
				}
				if($row["typ_konta"]==2){
					$typ_kk="Użytkownik Premium";
				}
				if($row["typ_konta"]==3){
					$typ_kk="Użytkownik";
				}
				if(!empty($row["id_premium"])){
					echo '<div class="ofertapromowana"><div class="pic"><img height="116" width="133" src=profilowe/'. $img .'></div><div class="crpromowane"><div class="tit">'.$row["nazwa_uzytkownika"].' [#'. $row["id"] .']</div><div class="pric">Typ konta: '. $typ_kk .'</div></div></div>';
				}else{
					echo '<div class="oferta"><div class="pic"><img height="116" width="133" src=profilowe/'. $img .'></div><div class="cr"><div class="tit">'.$row["nazwa_uzytkownika"].'  [#'. $row["id"] .']</div><div class="pric">Typ konta: '.$typ_kk.'</div></div></div>';
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
