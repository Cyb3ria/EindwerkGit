<?php
	include_once("classes/db.class.php");

	class Beacon
	{

		public function getAll()
			{
		 	    $db = new db();
				$sql="SELECT * from beacons";
		     	$result = $db->conn->query($sql);
				return $result;
			}

		public function beaconZone($majorIDget, $minorIDget)
			{
				$db = new db();
				$sql= "SELECT n_beacon FROM beacons WHERE b_major = '".$majorIDget."' 	AND b_minor = '".$minorIDget."'";
				$result = $db->conn->query($sql);
				return $result;
			}
	}