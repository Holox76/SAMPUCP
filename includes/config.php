<?php
$nom_serveur = 'New Dream Roleplay'; // NOM DU SERVEUR
$fondateur = 'Cjeje84'; // NOM DU FONDATEUR
$url_forum = 'http://ndrp.fr/ndrpsamp/'; // LIEN DU FORUM
$ip_serveur = '188.165.204.140:7777'; // IP DU SERVEUR

/*
 
 CONNEXION A LA BASE DE DONNEE
 SI ÇA ÉCHOUE, REDIRECTION VERS LE MAINTENANCE.PHP
 
 */
$connnexion = mysql_connect('127.0.0.1', 'root', '') or die(mysql_error()); // LOGS SQL DE LA BDD
mysql_select_db('cjeje') or die(header('Location: maintenance.php')); // NOM DE LA BASE DE DONNEE
?>
