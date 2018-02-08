<?php
session_start();
unset($_SESSION['access_token']);
//echo "aba";
header('location: login_card.php');
?>