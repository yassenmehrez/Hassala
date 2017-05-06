<?php
session_start();
if(isset($_SESSION['Admin'])){

include_once 'includes'.DIRECTORY_SEPARATOR.'header.inc.php';
include_once 'includes'.DIRECTORY_SEPARATOR.'AdminNavbar.inc.php';
include_once 'includes'.DIRECTORY_SEPARATOR.'Admin.php';
include_once 'includes'.DIRECTORY_SEPARATOR.'footer.inc.php';

} else { 
	header('Location: Admin.php');
	exit();
}
?>

