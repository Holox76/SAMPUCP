<?php
session_start();
?>
<div id='header'><a href='index.php'></a></div> 
 
	<div id='conteneur'>
	<div id='left'>
	<div class='menu_fond'>
	<ul><li class='categmenu'><?php echo $nom_serveur; ?> UCP</li>
	<li><a href='index'>Accueil</a></li>
	<?php
	if(!isset($_SESSION['login']))
	{
		?>
	<li><a href='inscription'>Créer un compte</a></li>
	<li><a href='login'>Se connecter à l'UCP</a></li>
	<?php
	}
	else
	{
	?>
		<li><a href="membre">Espace Membre</a></li>
		<li><a href="changer">Modification</a></li>
		<li><a href="deconnexion">Déconnexion</a></li>
	<?php
	}
	?>
		<li><a href='<?php echo $url_forum; ?>'>Forum</a></li></ul>
		</div><font size=1.5><b>Nous sommes le</b><br>25-09-2012 13:21:53<br><br>
	<?php $inscrits = mysql_query("SELECT id FROM `srp_players_stats` order by id ") or die(mysql_error());
		  $inscrits1 = mysql_num_rows($inscrits);
	?>
	<p>Déjà <?php echo $inscrits1; ?> inscrits !</p></font></div><div id='right'>
		<div align="center"> 
</div>
<div class='news'><span>UCP de <?php echo $nom_serveur; ?></span>
</div>
