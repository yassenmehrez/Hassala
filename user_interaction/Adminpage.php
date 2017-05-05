<?php
session_start();
if(isset($_SESSION['Admin'])){

include_once 'includes/header.inc.php';
include_once 'includes/AdminNavbar.inc.php';
include_once 'includes/Admin.php';
include_once 'includes/footer.inc.php';

} else { 
	header('Location: Admin.php');
	exit();
}
?>

