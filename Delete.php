<?php
require ('model.php');
$id=$_GET['id']; 
delete_produitByid($id);
	header ("Location: tables.php");
?>