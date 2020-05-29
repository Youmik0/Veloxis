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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Veloxis</title>
  <link rel="stylesheet" href="../css/show.css">
</head>
<body>

	<div id="topbar"><div id="logo">Veloxis</div>
	<div id="wyszukaj"><form method="get" action="search.php"><input name="search" type="text" id="te" placeholder="Czego szukasz?"><button name="bt1" class="bt" >&#x2315;</button></div>
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
		
		
	</div>
	</div>
	<div id="cont">

<input name="kategoria" value='0' type='hidden'><input type="hidden" name="stan" value="0"><input type="hidden" name="marka" value=""><input type="hidden" name="od" value=""><input type="hidden" name="do" value="">
</form>
	<div id="showof">
	
	<div class="slider">
	<div class="w3-content w3-display-container">
	<?php
		

		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else{
			if(array_key_exists('id', $_GET)) {
			$search_value=$_GET['id'];
			$id=$_GET['id'];
			$sql='select * from oferty where id="'.$search_value.'"';
			$res=$con->query($sql);
			
			while($row=$res->fetch_assoc()){
				echo '<img height="300" class="mySlides" src="oferty/'.$row["nazwa_zdjecia"].'" style="width:100%">';
			}
			}
		}
?>

	<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
	<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
	</div>

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
    </div>
	<div class="right">
	<?php
		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else{
			if(array_key_exists('id', $_GET)) {
			$search_value=$_GET['id'];
			$sql='select * from oferty where id="'.$search_value.'"';
			$res=$con->query($sql);
			
			while($row=$res->fetch_assoc()){
				$search_value=$row["id_uzytkownika"];
				echo '<form method="get" action="zglos.php"><button class=button2 name="zglos">Zgłoś</button><input type="hidden" name="id_oferty" value="'. $id .'"></form><div class="title">'.$row["nazwa_oferty"].'</div>';
				$nazwa_oferty=$row["nazwa_oferty"];
			} 
	
			$sql='select * from users where id="'.$search_value.'"';
			$res=$con->query($sql);
			$row3=$res->fetch_assoc();
			while($row=$res->fetch_assoc()){
				
				echo '<div class="seller">od sprzedawcy '.$row["nazwa_uzytkownika"].'</div>';
			} 
			
			
			$search_value=$_GET['id'];
			$sql='select * from oferty where id="'.$search_value.'"';
			$res=$con->query($sql);
			
			
			
			
	
			while($row=$res->fetch_assoc()){
			$array = array(
			'nazwa'=>$row["nazwa_oferty"],
			'cena'=>$row["cena"],
			'sprzedawca'=>$row3["nazwa_uzytkownika"],
			'id_oferty'=>$id,
			);
				
				echo '<div class="price">'.$row["cena"].'zł</div><div class="deli">Dostawa:</div><div class="quantity">Liczba sztuk <br/><input type="number" min="1" max="9" step="1" value="1"><br/> &nbsp; ze </div><div class="buy"><a href="kup.php?vals='. urlencode(serialize($array)) .'">Kup teraz</a></div>';
			} 
			}
		}
		
		
		
?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });</script>
	</div>
	

	
	<div class="parameters"><h1>Parametry:</h1>	<?php
		

		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else{
			
			echo $_GET['id'];
	
		}
		
?></div>

	<div class="description">
	<h1>Opis:</h1>
	<?php
		

		$con = mysqli_connect('localhost','root','','Veloxis');

		$con->set_charset("utf8");
		if($con->connect_error){
			echo 'Connection Faild: '.$con->connect_error;
		}else{
			if(array_key_exists('id', $_GET)) {
			$search_value=$_GET['id'];
			$sql='select * from oferty where id="'.$search_value.'"';
			$res=$con->query($sql);
			
			while($row=$res->fetch_assoc()){
				echo $row["opis"];
			}
			}
		}
?>
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
<?php
if(isset($_POST['zglos'])){
	$array = array(
	'id'=>$_GET['id'],
	'nazwa'=>$nazwa_oferty,
	);
	header('Location: zglos.php?vals=' . urlencode(serialize($array)));
}
?>
</html>
