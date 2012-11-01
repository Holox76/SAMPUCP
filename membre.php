<?php include('includes/config.php');
session_start();
if(!isset($_SESSION['login']))
{
	header('Location: login.php');
	exit;
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
?><h2 style="text-align: center;">Identité</h2><br><br>
<img src="images/skins/<?php echo $info1['Chara']; ?>.jpg">
<?php if($info1['connected'] > 0)
{
	?><img src="images/ico_success.png" title="Connecté !">
	<?php
}
else
{
	?><img src="images/ico_error.png" title="Non Connecté !">
	<?php
}
?>
<br />
<br />
<p>Nom : <b><?php echo $info1['Name']; ?></p></b>
<br><br>
<p>Email : <b><?php echo $info1['Email']; ?></p></b>
<br><br>
<p>Dernière IP connectée : <b><?php echo $info1['Ip']; ?></b> </p>
<br><br>
<p>En poche : <b><?php echo $info1['Money']; ?></p></b>
<br><br>
<p>À la banque : <b><?php echo $info1['Bank']; ?></p></b>
<?php if($info1['Jailed'] > 0)
{
	$jail = "Il vous reste ".$info1['JailTime']." secondes";
}
else
{
	$jail = "Vous n'êtes pas en jail !";
}
?>
<br><br><p>En jail : <b><?php echo $jail; ?></p></b>
<br><br>
Banni : <?php if($info1['Locked'] == "1")
				{
					?><div style="color: red;">Banni !</div>
				<?php
			}
				else
				{
					?><div style="color: green;">Non Banni !</div>
					<?php
				}
?>
<br><br>
<p>Numéro de téléphone : <b><?php if($info1['PhoneNr'] != "0")
								{
									echo $info1['PhoneNr'];
								}
								else
								{
									echo "Aucun téléphone portable.";
								}
								?></b>
								<br><br>
								<h2 style="text-align: center;">Accessoires</h2>
								<br><br>
								<p>Tabac : <b><?php echo $info1['Cigarettes']; ?></b> cigarettes.</p>
								<br><br>
								<p>Pied de biche : <b><?php echo $info1['PiedBiche']; ?></b> Pied de biche.</p>
								<br><br>
								<p>Lunettes : <?php echo $info1['Glasses']; ?> paires.</p>
								<?php /*
								?>
								<br />
								<br />
								<h2 style="text-align: center;">Véhicules</h2>
								<br />
								<br />
								<?php
								$veh = mysql_query("SELECT model,owner FROM `srp_players_cars` WHERE `owner` = '".$_SESSION['login']."'") or die(mysql_error());
								$veh1 = mysql_fetch_assoc($veh);
								$veh2 = mysql_fetch_array($veh);
								if($veh1 < 1)
								{
									echo "Aucun véhicule !";
								}
								else
								{
										while($veh2['owner'] == $_SESSION['login'])
										{
											?><img src="http://gtaonline.fr/modules/vehicules/images/tout/Vehicle_<?php echo $veh2['model']; ?>.jpg">
											<?php
										}
								} */
								?>
								</div></div>
<?php include('includes/footer.php'); ?>
</body>
</html>
