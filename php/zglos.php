<?php
session_start();
$db = mysqli_connect('localhost','root','','veloxis');
$db->set_charset("utf8");
$id_oferty=$_GET['id_oferty'];
$sql="SELECT * FROM oferty WHERE id='$id_oferty'";
$res=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($res);
$nazwa_oferty=$row['nazwa_oferty'];
$id_zgloszonego=$row['id_uzytkownika'];

$sql="SELECT * FROM oferty WHERE id='$id_oferty'";

if(isset($_POST['zglos'])){
$opis_zgloszenia=$_POST['opis'];
$id=$_POST['id_oferty'];
$nazwa=$_POST['nazwa_oferty'];
$id_zglo=$_POST['id_zgloszonego'];
$sql2="INSERT INTO `zgloszenia`(`opis`, `nazwa_oferty`, `id_oferty`, `id_zgloszonego`) VALUES ('$opis_zgloszenia','$nazwa','$id','$id_zglo')";
mysqli_query($db,"SET FOREIGN_KEY_CHECKS=0;");
	if(mysqli_query($db,$sql2)){
		mysqli_query($db,"SET FOREIGN_KEY_CHECKS=1;");
		echo "<script>alert('Oferta została zgłoszona')</script>";
		header('Location: veloxis.php');
	}
mysqli_query($db,"SET FOREIGN_KEY_CHECKS=1;");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Report</title>
  <link rel="stylesheet" href="../css/logow.css">
</head>
<body>
  <div id="logowanie">
	
	<div id="logo">Veloxis</div>
	<div id="pod">&nbsp;Zgłoszenie oferty o nazwie:<br> "<?php echo $nazwa_oferty;  ?>"</div>
    <form method="post" action="zglos.php">
		<input type="hidden" name="id_oferty" value="<?php if(isset($_GET['id_oferty'])) echo $_GET['id_oferty']; ?>">
		<input type="hidden" name="nazwa_oferty" value="<?php echo $nazwa_oferty; ?>">
		<input type="hidden" name="id_zgloszonego" value="<?php echo $id_zgloszonego; ?>">
       <br><br>Podaj przyczynę zgłoszenia:<br><input type="text" name="opis" placeholder="Opis"/>
       <button type="submit" class="btn" name="zglos">Zgłoś</button>
    </form>
	<br>
  </div>
  <script>
	document.getElementById("logo").addEventListener("click", toM);

	function toM() {
	window.location.href="../php/veloxis.php";
	}
	</script>
</body>
</html>