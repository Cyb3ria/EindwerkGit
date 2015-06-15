<?php
	include_once("classes/db.class.php");

	class Event
	{

		private $m_sTitle;
		private $m_sTeaser;
		private $m_sLink;
		private $m_sBeacon;
		private $m_sEndDate;
		private $m_sType;

		public function __set($p_sProperty, $p_vValue)
			{
				switch($p_sProperty){
					case 'Title':
						$this->m_sTitle =$p_vValue;
						break;
					case 'Type':
						$this->m_sType =$p_vValue;
						break;		
					case 'Teaser':
						$this->m_sTeaser =$p_vValue;
						break;
					case 'Link':
						$this->m_sLink =$p_vValue;
						break;
					case 'Beacon':
						$this->m_sBeacon =$p_vValue;
						break;
					case 'Foto':
						$this->m_sFoto =$p_vValue;
						break;
					case 'EndDate':
						$this->m_sEndDate = $p_vValue;
				}
			}

		public function __get($p_sProperty)
			{
				switch($p_sProperty)
				{
					case 'Title':
						return $this->m_sTitle;
						break;
					case 'Type':
						$this->m_sType =$p_vValue;
						break;	
					case 'Teaser':
						return $this->m_sTeaser;
						break;
					case 'Link':
						return $this->m_sLink;
						break;
					case 'Beacon':
						return $this->m_sBeacon;
						break;
					case 'EndDate':
						return $this->m_sEndDate;

				}
			}
        
        public function getAll()
			{
		 	    $db = new db();
				$sql="SELECT * from notifications";
		     	$result = $db->conn->query($sql);
				return $result;
			}
		public function getAllWithID($NoteId)
			{
		 	    $db = new db();
				$sql="SELECT * from notifications WHERE n_id ='".$NoteId."'";
		     	$result = $db->conn->query($sql);
				return $result;
			}
		public function getMine()
			{
				$uid = $_SESSION['u_id'];
		     	$db = new db();
				$sql= "SELECT * FROM notifications WHERE u_id ='".$uid."'";
		     	$result = $db->conn->query($sql);
				return $result;
			}

		public function getFavo()
			{
				$uid = $_SESSION['u_id'];
		     	$db = new db();

				$sql= "SELECT *
					  FROM notifications JOIN favorites 
					  ON notifications.n_id = favorites.n_id
					  WHERE favorites.u_id ='".$uid."'";

		     	$result = $db->conn->query($sql);
				return $result;
			}

		public function getNonFavo()
			{
				$uid = $_SESSION['u_id'];
		     	$db = new db();
				$sql= "SELECT *
					  FROM notifications
					  WHERE n_id NOT IN
					  (				  
					  SELECT n_id
					  FROM favorites
					  WHERE u_id ='".$uid."'
					  )";

		     	$result = $db->conn->query($sql);
				return $result;
			}

		public function getBeaconEvent($ZoneName)
			{
				$db = new db();
				$sql = "SELECT * FROM notifications WHERE n_beacon ='".$ZoneName."' AND n_broadcast='1'";
				$result = $db->conn->query($sql);
				return $result;
			}

		public function remove($removable)
			{
		 	    $db = new db();
				$sql= "DELETE FROM notifications WHERE n_id ='".$removable."'";
				$result = $db->conn->query($sql);
				return $result;
			}

		public function broadcast()
			{
				$db = new db();
				$sql = "UPDATE notifications SET n_broadcast ='0' WHERE n_beacon ='".$this->m_sBeacon."' AND n_broadcast='1'";
				$result = $db->conn->query($sql);
				return $result;
			}

		public function favorite($uid, $EventID)
			{
				$db = new db();
				$sql = "INSERT INTO favorites (u_id, n_id) VALUES
				('".$db->conn->real_escape_string($uid)."',
				'".$db->conn->real_escape_string($EventID)."')";
				$result = $db->conn->query($sql);
				return $result;
			}

		public function Checkfavorite($uid, $EventID)
			{
				$db = new db();
				$sql = "SELECT * FROM favorites WHERE u_id ='".$uid."' AND n_id ='".$EventID."'";	
				$result = $db->conn->query($sql);
				return $result;
			}	


		public function save($uid)
			{
            
		 	    $db = new db();
                $sql = "INSERT into notifications (n_title, n_type, n_teaser, n_link, n_beacon, n_date, u_id) VALUES
				('".$db->conn->real_escape_string($this->m_sTitle) ."' ,
				'". $db->conn->real_escape_string($this->m_sType) ."' ,
				'". $db->conn->real_escape_string($this->m_sTeaser) ."' ,
				'". $db->conn->real_escape_string($this->m_sLink) ."' ,
				'". $db->conn->real_escape_string($this->m_sBeacon) ."',
				'". $db->conn->real_escape_string($this->m_sEndDate) ."',
				'". $db->conn->real_escape_string($uid) ."')";
		 	    $result = $db->conn->query($sql);
				return $result;

			}
	}
?>