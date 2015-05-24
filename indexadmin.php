<?php
session_start();
include("config.php");

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}  
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	
<p> Index Kek </p>
    
    <a href="add_event.php">Add Event</a>
    <a href="my_events.php">My events</a>
    <br />
    <a href="logout.php">Logout</a>
</body>
</html>