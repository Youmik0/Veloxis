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
  <link rel="stylesheet" href="../css/premium.css">
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
		
			$search_value=$_SESSION['id'];
			$sql="select * from users where id like '%$search_value%'";
			
			$res=$con->query($sql);
			
			while($row=$res->fetch_assoc()){
				
				
				if($row['typ_konta']!=3){
				echo'<div id="premium">
	
					<div id="logoo">Veloxis</div>
					<div id="pod">Premium</div>
					<div class="oh"><p style="font-size:20px;">Po zakupie w ramach premium otrzymujemy przez miesiąc:</p>&#8226;Darmowe dostawy </br></br>&#8226;Promowanie wystawionych produktów</br></br> za jedyne <b>35zł</b></div>
	
					<form method="post" action="logowanie.php">
	
					<button type="submit" class="btn" name="login_user">Kup teraz</button>
					</form>

				</div>';
				
				}else{
					echo'<div id="premium">
	
					<div id="logoo">Veloxis</div>
					<div id="pod">&nbsp;Premium</div>
					<div class="oh"><p style="font-size:20px;">Po zakupie w ramach premium otrzymujemy przez miesiąc:</p>&#8226;Darmowe dostawy </br></br>&#8226;Promowanie wystawionych produktów</br></br> za jedyne <b>35zł</b></div>
	
					<form method="post" action="logowanie.php">
	
					<button type="submit" class="btn" name="login_user">Przedłuż subskrybcje</button>
					</form>

				</div>';
					
					
				}
				
				
				
				
			
			}
				
			
			}
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