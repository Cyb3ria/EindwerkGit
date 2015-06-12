<?php
	session_start();
	include("classes/beacon.class.php");
  
	if(!isset($_SESSION['loggedin']))
	{
  		header('location: login.php');
	}

	$majorIDget = $_GET['major'];
	$minorIDget =  $_GET['minor'];


    $beacon = new Beacon();

    $beaconZoneVar = $beacon->beaconZone($majorIDget, $minorIDget);
   
    while($row = mysqli_fetch_array($beaconZoneVar))
    {
    $eventPage = urlencode($row['n_beacon']);
	}

	header('location:event.php?n_beacon='.$eventPage.'');
?>
