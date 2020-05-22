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
		if(empty($uzytkownik)){array_push($errors,"Id uzytkownika jest wymagane.");}
		$sql3="SELECT * FROM users WHERE id='$uzytkownik'";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);
		//if(!$result3 || mysqli_num_rows($result3)==0)
		//{
		//	array_push($errors,"Nie ma aukcji o takim Id.");
		//}
		if(count($errors)==0){
			mysqli_query($db,"SET foreign_key_checks = 0");
			$sql="DELETE FROM users WHERE id='$uzytkownik'";
			$sql2="DELETE FROM profilowe WHERE id_uzytkownika='$uzytkownik'";
			mysqli_query($db,$sql2);
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		}
		
	}
	
	if(isset($_POST['promowanie_uzytkownika'])){
		$uzytkownik=$_POST['promocja'];
		if(empty($uzytkownik)){array_push($errors,"Id uzytkownika jest wymagane.");}
		$sql3="SELECT * FROM users WHERE id='$uzytkownik'";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);
		//if(!$result3 || mysqli_num_rows($result3)==0)
		//{
		//	array_push($errors,"Nie ma aukcji o takim Id.");
		//}
		if(count($errors)==0){
			mysqli_query($db,"SET foreign_key_checks = 0");
			$sql="UPDATE users SET typ_konta='1' WHERE id='$uzytkownik'";
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		}
		
	}
	
	if(isset($_POST['degradowanie_uzytkownika'])){
		$admin=$_POST['degradacja'];
		if(empty($admin)){array_push($errors,"Id admina jest wymagane.");}
		$sql3="SELECT * FROM users WHERE id='$admin'";
		$result3 = mysqli_query($db,$sql3);
		$row3=mysqli_fetch_row($result3);
		//if(!$result3 || mysqli_num_rows($result3)==0)
		//{
		//	array_push($errors,"Nie ma aukcji o takim Id.");
		//}
		if(count($errors)==0){
			mysqli_query($db,"SET foreign_key_checks = 0");
			$sql="UPDATE users SET typ_konta='3' WHERE id='$admin'";
			mysqli_query($db,$sql);
			mysqli_query($db,"SET foreign_key_checks = 1");
		}
		
	}
?>
<html>
<head>
<title>Admin</title>
</head>
<body>
<a href="../php/veloxis.php">Veloxis</a>
<p>Siema admin:<strong><?php echo $_SESSION['nazwa_uzytkownika'];   ?></strong></p>
<form method="post" action="../php/admin.php">
<?php include('errors.php'); ?>
<table>
<tr>
<td>Usuń aukcje o numerze id: <input type="text" name="aukcja" placeholder="Nr aukcji"/></td><td><button type="submit" class="btn" name="usuwanie_oferty">Wykonaj - Usuń aukcję</button></td>
<tr>
</tr>
<td>Usuń użytkownika o numerze id: <input type="text" name="uzytkownik" placeholder="id użytkownika"/></td><td><button type="submit" class="btn" name="usuwanie_uzytkownika">Wykonaj - Usuń użytkownika</button></td>
</tr>
<tr>
<td>Zobacz zgłoszenia użytkownika o numerze id: <input type="text" name="zgloszenia" placeholder="id użytkownika"/></td><td><button type="submit" class="btn" name="usuwanie_uzytkownika">Wykonaj - Pokaż zgłoszenia użytkownika</button></td>
</tr>
<tr>
<td>Promuj użytkownika o id do statusu admina: <input type="text" name="promocja" placeholder="id użytkownika"/></td><td><button type="submit" class="btn" name="promowanie_uzytkownika">Wykonaj - Awansuj użytkownika do statusu admina</button></td>
</tr>
<tr>
<td>Degraduj admina o id do statusu użytkownika: <input type="text" name="degradacja" placeholder="id admina"/></td><td><button type="submit" class="btn" name="degradowanie_uzytkownika">Wykonaj - Degraduj admina do statusu użytkownik</button></td>
</tr>
</table>
</form>
</body>
</html>