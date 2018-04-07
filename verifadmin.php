<?php
	session_start();
?>


<?php
require ('model.php');
$login=$_POST['username'];
$mdp=$_POST['pass'];  
$connexion = get_connect();
$getadmin = get_Admin(' where Nom='.$login.' and Pass='.$mdp.'', $connexion);
if(sizeof($getadmin)==1){
	header ("Location: index.php?erreur=1");
	echo $login;
	echo $mdp;
}
else{
	header ("Location: tables.php");
}
?>