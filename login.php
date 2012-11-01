<?php include('includes/config.php');
session_start();
if(isset($_SESSION['login']))
{
	header('Location: membre.php');
	exit;
}

if(isset($_POST['pseudo']) && isset($_POST['password']))
{
	$compte = mysql_query("SELECT Name,Password FROM `srp_players_stats` WHERE `Name` = '".mysql_real_escape_string(htmlspecialchars(htmlentities($_POST['pseudo'])))."' && `Password` = '".mysql_real_escape_string(htmlspecialchars(htmlentities($_POST['password'])))."'") or die(mysql_error());
	$compte1 = mysql_fetch_assoc($compte);
	if($compte1 > 0)
	{
		$_SESSION['login'] = $_POST['pseudo'];
		header('Location: membre.php');
	}
	else
	{
		?><script>alert('Identifiant incorrect !');</script>
		<?php
	}
}
?>

<!DOCTYPE html>
<head>
<title><?php echo $nom_serveur; ?> : Connexion</title>
<link rel='shortcut icon' href='http://www.cmlv-rp.com/favicon.jpg' />
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link href='style.css'	title='Défaut' rel='stylesheet' type='text/css' media='screen' />
<link rel='shortcut icon' type='image/x-icon' href='favicon.jpg' />
</head>
<body>
<?php include('includes/header.php'); ?>
		<div class='panel'><span>Connexion sur <?php echo $nom_serveur; ?></span>
		<br><br>
		<form action="" method="post">
		<input type="text" name="pseudo" placeholder="Votre nom IG">
		<br><br>
		<input type="password" name="password" placeholder="Votre mot de passe">
		<br><br>
		<input type="submit">
		<input type="reset">
		</form>
		</div></div>
<?php include('includes/footer.php'); ?>
</body>
</html>
