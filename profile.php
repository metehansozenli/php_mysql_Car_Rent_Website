<?php
session_start();
if(!isset($_SESSION['userEmail'])){
header("Location: login.php");
exit();
}
require_once "navbarLogged.html"; 
?> 

