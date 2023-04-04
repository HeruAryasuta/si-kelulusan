<?php
session_start();
session_destroy();
echo "Berhasil Logout";
header('location:login.php');
?>