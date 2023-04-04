<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
	include "../config.php";

	if(isset($_REQUEST['uid']) AND ($_REQUEST['uid'] != $_SESSION['logged'])){
		$userid = $_REQUEST['uid'];
		$qUser = mysqli_query($db_conn,"DELETE FROM un_user WHERE UID='$userid'");
		
		echo '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>';
		header('Location: admin.php');
	} else {
		header('Location: admin.php');
	}
} else {
	header('Location: ./login.php');
}
?>