<?php
session_start();
if(isset($_GET['logout'])) //Wylogowanie
{
	session_destroy();
	unset($_SESSION['nazwa_uzytkownika']);
	header("location: veloxis.php");
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
		<button onclick="myFunction()" class="drop"><?php echo $_SESSION['nazwa_uzytkownika'] ." [#". $_SESSION['id'] ."]"; ?></button>
		<div id="mDropd" class="dropd-cont">
		<a href="dodawanie.php">Dodaj ofertę</a>
		<a href="ustawienia.php">Ustawienia</a>
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
	<div id="kategorie"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
	<div id="losoferty"><?php
		

		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else{
			if(array_key_exists('bt1', $_POST)) {
			$search_value=$_POST["search"];
			$sql="select * from oferty where nazwa_oferty like '%$search_value%'";
			$res=$con->query($sql);
	
			while($row=$res->fetch_assoc()){
				$id=$row["id"];
				$base="./show.php";
				$data = array(
				'id' => $id
				);
				
				$url = $base . '?' . http_build_query($data);
				echo '<a href='.$url.'><div class="oferta"><div class="pic"><img src=oferty/'. $row["nazwa_zdjecia"] .'></div><div class="cr"><div class="tit">'.$row["nazwa_oferty"].'</div><div class="pric">'.$row["cena"].'</div></div></div></a>';
			} 
			}else{echo "xd";}
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
