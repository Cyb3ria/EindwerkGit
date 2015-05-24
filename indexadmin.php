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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js"type="text/javascript"></script>
</html>