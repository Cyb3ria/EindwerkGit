<?php
include("classes/beacon.class.php");

$BeaconID = $_POST['b_id'];

$b = new Beacon();

if(isset($BeaconID));
{
	$b->delete($BeaconID);
}


?>