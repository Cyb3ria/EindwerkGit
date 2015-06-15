<?php
	include_once("classes/db.class.php");

	class Beacon
	{
        private $m_sName;
        private $m_iMajor;
        private $m_iMinor;
        
		public function __set($p_sProperty, $p_vValue)
			{
				switch($p_sProperty){
					case 'Name':
						$this->m_sName =$p_vValue;
						break;
					case 'Major':
						$this->m_iMajor =$p_vValue;
						break;
					case 'Minor':
						$this->m_iMinor =$p_vValue;
				}
        }
            
		public function __get($p_sProperty)
			{
				switch($p_sProperty)
				{
					case 'Name':
						return $this->m_sName;
						break;
					case 'Major':
						return $this->m_iMajor;
						break;
					case 'Minor':
						return $this->m_iMinor;

				}
			}
            
		public function remove($removable)
			{
		 	    $db = new db();
				$sql= "DELETE FROM beacons WHERE b_id ='".$removable."'";
				$result = $db->conn->query($sql);
				return $result;
			}

		public function getAll()
			{
		 	    $db = new db();
				$sql="SELECT * from beacons ORDER BY n_beacon";
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
            
        public function save()
			{
            
		 	    $db = new db();
                $sql = "INSERT into beacons (n_beacon, b_major, b_minor) VALUES
				('".$db->conn->real_escape_string($this->m_sName) ."' ,
				'". $db->conn->real_escape_string($this->m_iMajor) ."' ,
				'". $db->conn->real_escape_string($this->m_iMinor) ."')";
                
		 	    $result = $db->conn->query($sql);
				return $result;
			}

		public function delete($BeaconID)
			{
				$db = new db();
				$sql = "DELETE FROM beacons WHERE b_id = '".$BeaconID."'";
				$result = $db->conn->query($sql);
				return $result;
			}
	}