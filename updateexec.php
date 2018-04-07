<?php
require ('model.php');
$id=$_GET['id']; 
$prix=$_POST['prix'];
update_produitByid('Prix' , $prix, $id);
	header ("Location: tables.php");
?>