<?php
session_start();
if($_POST['envoyer']){
	session_destroy();
}
header('Location:../menu_mega.php');
?>