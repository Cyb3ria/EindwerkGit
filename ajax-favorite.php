<?php
include("classes/event.class.php");

$EventID = $_GET['n_id'];
$uid = $_GET['uid'];

$event = new Event;

if(isset($EventID));
{
	$event->favorite($uid, $EventID);
}