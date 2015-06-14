<?php
include("classes/event.class.php");


$GetZoneName = $_GET['n_beacon'];
$ZoneName = urldecode($GetZoneName);

$event = new Event();
$arrayDetails = $event->getBeaconEvent($ZoneName);

while($row = mysqli_fetch_array($arrayDetails))
{
		$EventTitle = $row["n_title"];
		$EventLink = $row["n_link"];
		$EventDate = $row["n_date"];
}
		$arr = array( 	"EventTitle" => $EventTitle,
						"EventLink" => $EventLink, 
						"EventDate" => $EventDate 
					);
		header("content-type: application/json");
		$json_arr = JSON_encode($arr);
		echo $json_arr;
?>