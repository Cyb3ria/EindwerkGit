<?php
	session_start();
	include("classes/event.class.php");
  
	if(!isset($_SESSION['loggedin']))
	{
  		header('location: login.php');
	}

	$BcZ = $_GET['n_beacon'];
	$ZoneName = urldecode($BcZ);

	$event = new event();
	$informationArray = $event->getBeaconEvent($ZoneName);
	while($row = mysqli_fetch_array($informationArray))
	{
		$EventID = $row["n_id"];
		$EventTitle = $row["n_title"];
		$EventTeaser = $row["n_teaser"];
		$EventLink = $row["n_link"];
		$EventZone = $row["n_beacon"];
		$EventDate = $row["n_date"];
	}

    <?php include_once("userHeader.include.php"); ?>
	echo($EventTitle);
	echo($EventTeaser);
	echo($EventLink);
	echo($EventZone);
	echo($EventDate);
?>