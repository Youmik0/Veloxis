<?php include('ustawienia_uz.php') ?>
<html>
<head>
<title>Ustawienia użytkownika</title>
</head>
<body>
<h1><a href="veloxis.php">Veloxis</a></h1>
<h2>Zalogowany jako: <?php echo $_SESSION['nazwa_uzytkownika'] ." [#". $_SESSION['id'] ."]"; ?></h2>
<a href="zmiana_hasla.php">Zmień hasło</a>
<form method="post" action="../php/ustawienia.php" ENCTYPE="multipart/form-data">
<input type="file" name="zdjecie">
<button type="submit" class="btn" name="zmiana_profilowego">Zmień zdjecie profilowe</button>
</form>
<img src="./profilowe/<?php echo htmlspecialchars($_SESSION['profilowe']); ?>">
<?php echo $_SESSION['profilowe']; ?>
<br>
<?php
if($_SESSION['typ_konta']==3){

echo '<form method="post" action="../php/ustawienia.php" ENCTYPE="multipart/form-data">';
echo '<button type="submit" class="btn" name="premium">Uzyskaj premium</button>';
echo '</form>';
};
?>
</body>
</html>
