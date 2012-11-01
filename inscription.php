<?php 
session_start();
include('includes/config.php');
if(isset($_SESSION['login']))
{	
	header('Location: membre.php');
}
if(isset($_POST['nom']) && isset($_POST['mdp']) && isset($_POST['email']))
{
	if(stripos($_POST['nom'],'_') == FALSE)
	{
		?>
		<script>alert('Le nom est incorrect !');</script>
		<?php
	}
	elseif(htmlspecialchars(htmlentities($_POST['mdp'])) != htmlspecialchars(htmlentities($_POST['repeter'])))
	{
		?>
		<script>alert('Les deux mots de passe sont différents !');</script>
		<?php
	}
	elseif(stripos($_POST['email'],'@') == FALSE)
	{
		?>
		<script>alert('L\'adresse mail est incorrect !'); </script>
		<?php
	}
	else
	{
		mysql_query("INSERT INTO `srp_players_stats` (Name,Password,PlayerLevel,AdminLevel,StatusRp,Registered,Sex,Origin,Muted,Respect,Money,Bank,Phonebook,SuspendedTime,Job,Paycheck,Jailed,JailTime,Materials,Drugs,Member,Rank,Chara,pHealth,Inte,TimeTatoo,Model,PhoneNr,House,House2,House3,Spawn,Car,Bizz,Pos_x,Pos_y,Pos_z,CarLic,FlyLic,BoatLic,FishLic,GunLic,Gun1,Gun2,Gun3,Gun4,Ammo1,Ammo2,Ammo3,Ammo4,CarTime,PayDay,Tutorial,Warnings,Married,MarriedTo,Locked,Aspiration,Heroine,IsAtHotel,Sick,SickDoseTaken,SickDoseTakenTime,SickDose,SickDoseNumber,RpNoteRp,PlayedTime,JobTime,Car2,Car3,Mask,LicencePoint,RankAdvancement,AncienBizz,BizzVenteAuto,Glasses,Bandana,PiedBiche,Roop,Baillon,Jerrican,Confiserie,Adrenaline,Cigarettes,Feuilles,Tabac,FoodProduct,Connected,Talkie,CarKeyOffer,OfferTime,Wanted,LastLog,Ip,CombatStyle,AntiRadar,Bombe,Journal,Parrain,Email,Cheque,De,Swat,TrainingTime,vote,vote_date) VALUES('".mysql_real_escape_string(htmlspecialchars(htmlentities($_POST['nom'])))."','".mysql_real_escape_string(htmlspecialchars(htmlentities($_POST['mdp'])))."','1','0','0','1','1','2','0','0','500','7000','0','0','0','0','0','0','0','0','0','0','0','100.00000','0','0','228','0','25555','25555','25555','0','9999','25555','1742.42236','-1860.94104','14.00000','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','Personne','0','0','0','0','0','0','0','0','0','0','0','0','9999','9999','0','0','0','255','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','9999','-1','0','0','".$_SERVER['REMOTE_ADDR']."','3','0','0','0','-1','".mysql_real_escape_string(htmlspecialchars(htmlentities($_POST['email'])))."','0','0','0','0','0','00:00:00')") or die(mysql_error());
		header('Location: membre.php');
	}	
}
?>

<!DOCTYPE html> 
<head>
<title><?php echo $nom_serveur; ?> : Inscription</title>
<link rel='shortcut icon' href='http://www.cmlv-rp.com/favicon.jpg' />
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link href='style.css'	title='Défaut' rel='stylesheet' type='text/css' media='screen' />
<link rel='shortcut icon' type='image/x-icon' href='favicon.jpg' />
</head>


<body> 
<?php include('includes/header.php'); ?>
		<div class='panel'><span>Inscription sur <?php echo $nom_serveur; ?></span>
		<br />
		<br />
		<p>Pour vous inscrire sur <?php echo $nom_serveur; ?>, il faut vous inscrire : Soit sur cette page, ou soit directement sur le serveur.
		<br><br>
		<form action="" method="post">
		<input type="text" name="nom" placeholder="Nom IG : Prénom_Nom"></p>
		<br>
		<br>
		<input type="password" name="mdp" placeholder="Mot de passe">
		<br>
		<br>
		<input type="password" name="repeter" placeholder="Répetez le mot de passe">
		<br>
		<br>
		<input type="mail" name="email" placeholder="Adresse Email">
		<br>
		<br>
		<input type="text" name="parain" placeholder="Parain (laissez vide si non)">
		<br>
		<br>
		<input type="reset">
		<input type="submit">
		</form>
		</div></div>
		<?php include('includes/footer.php'); ?>
</body>
</html>
