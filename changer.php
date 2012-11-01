<?php
session_start(); 
include('includes/config.php');
if(!isset($_SESSION['login']))
{
	header('Location: login.php');
	exit;
}
elseif(isset($_POST['newmail']) && isset($_POST['repeatpass']) && isset($_POST['newpassword']))
{
	if($_POST['newpassword'] != $_POST['repeatpass'])
	{
		?><script>alert('Les mots de passe ne correspondent pas !');</script>
		<?php
		
	}
	elseif(stripos($_POST['newmail'], '@' == FALSE))
	{
		?><script>alert("L\'adresse mail n\'est pas valide !");</script><?php
	}
	else
	{	
		mysql_query("UPDATE `srp_players_stats` set `Email` = '".htmlspecialchars(htmlentities($_POST['newmail']))."' WHERE `Name` = '".$_SESSION['login']."'") or die(mysql_error());
		mysql_query("UPDATE `srp_players_stats` set `Password` = '".htmlspecialchars(htmlentities($_POST['repeatpass']))."' WHERE `Name` = '".$_SESSION['login']."'") or die(mysql_error());
	}
}
?>

<!DOCTYPE html>
<head>
<title><?php echo $nom_serveur; ?> : Membre</title>
<link rel='shortcut icon' href='http://www.cmlv-rp.com/favicon.jpg' />
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link href='style.css'	title='Défaut' rel='stylesheet' type='text/css' media='screen' />
<link rel='shortcut icon' type='image/x-icon' href='favicon.jpg' />
</head>
<body>
<?php include('includes/header.php'); ?>
		<div class='panel'><span>Espace membre de <?php echo $nom_serveur; ?></span>
<br />
<br />
<?php
$info = mysql_query("SELECT * FROM `srp_players_stats` WHERE `Name` = '".$_SESSION['login']."'") or die(mysql_error());
$info1 = mysql_fetch_array($info);
?><h2 style="text-align: center;">Changer ses coordonnées</h2>
<br><br>
<form action="" method="post">
<p>Changer son adresse mail : <input type="mail" name="newmail" placeholder="<?php echo $info1['Email']; ?>">
<br>
<br>
<p>Changer son mot de passe : <input type="password" name="newpassword" placeholder="<?php echo $info1['Password']; ?>"></p>
<br>
<br>
<p>Répetez votre mot de passe : <input type="password" name="repeatpass"></p>
<br>
<br>
<input type="reset">&nbsp;<input type="submit">
</form>
								</div></div>
<?php include('includes/footer.php'); ?>
</body>
</html>