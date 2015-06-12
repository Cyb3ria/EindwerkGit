<?php  

session_start();
include_once("class/event.class.php");



$_SESSION['n_title']=$_POST['title'];
$_SESSION['n_beacon']=$_POST['beacon'];
$_SESSION['n_teaser']=$_POST['teaser'];
$_SESSION['n_link']=$_POST['link'];
$_SESSION['n_date']=$_POST['date'];

header('Location: ../specificEvent.php');


?>