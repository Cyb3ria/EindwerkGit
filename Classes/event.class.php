<?php
	include_once("Classes/db.class.php");

	class Event
	{

		private $m_sTitle;
		private $m_sTeaser;
		private $m_sLink;
		private $m_sBeacon;
		private $m_sFoto;

		public function __set($p_sProperty, $p_vValue)
			{
				switch($p_sProperty){
					case 'Title':
						$this->m_sTitle =$p_vValue;
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
				}
			}

		public function __get($p_sProperty)
			{
				switch($p_sProperty)
				{
					case 'Title':
						return $this->m_sTitle;
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
					case 'Foto':
						return $this->$m_sFoto;
						break;

				}
			}
        
        		public function getAll()
			{
				$conn = new mysqli("localhost", "root", "azerty", "eindwerk_db");	
				$sql="select * from notifications";
				$result = $conn->query($sql);
				
				return $result;

			}
			
		public function save()
			{
            
                $conn = new mysqli("localhost", "root", "azerty", "eindwerk_db");
                $sql = "insert into notifications (n_title, n_teaser, n_link, n_foto, n_beacon ) VALUES
				('". $conn->real_escape_string($this->m_sTitle) ."' ,
				'". $conn->real_escape_string($this->m_sTeaser) ."' ,
				'". $conn->real_escape_string($this->m_sLink) ."' ,
				'". $conn->real_escape_string($this->m_sFoto) ."' ,
				 '". $conn->real_escape_string($this->m_sBeacon) ."')";
				$conn->query($sql);

			}


	}
?>