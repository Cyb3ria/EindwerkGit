<?php
	include_once("classes/db.class.php");

	class user
	{
		 private $m_sStudentennummer;
		 private $m_sPassword;
         private $m_sStatus;



		 public function __get($p_sProperty)
		 {
		 	switch ($p_sProperty) 
		 	{
		 		case 'Studentennummer':
		 			return $this->m_sStudentennummer;
		 			break;

		 		case 'Password':
		 			return $this->m_sPassword;
		 			break;
                
                case 'Status':
		 			return $this->m_sStatus;
		 			break;

		 	}
		 }

		 public function __set($p_sProperty, $p_vValue)
		 {
		 	switch ($p_sProperty) 
		 	{
		 		case 'Studentennummer':
		 			$this->m_sStudentennummer = $p_vValue;
		 			break;

		 		case 'Password':
		 			$this->m_sPassword = $p_vValue;
		 			break;
                
                case 'Status':
		 			$this->m_sStatus = $p_vValue;
		 			break;
			 		
		 	}
		 }

		 public function userCheck($p_sInput)
		 {
		 	$db = new db();

		 	$sql = "SELECT * FROM users WHERE u_id = '". $p_sInput . "'";

		 	$result = $db->conn->query($sql);

		 	if ($result->num_rows == 0) 
		 	{
		 		return "true";
		 	}
		 	else
		 	{
		 		return "false";
		 	}
		 }

		 public function login($p_sStudentennummer, $p_sPassword)
		 {
		 	$db = new db();

		 	$sql = "SELECT * FROM users WHERE u_nr = '".$db->conn->real_escape_string($p_sStudentennummer)."' AND u_pass = '".$db->conn->real_escape_string($p_sPassword)."';";

		 	$result = $db->conn->query($sql);

		 	$rows = $result->fetch_assoc();
             
             $status = "SELECT * FROM users WHERE u_nr = '".$db->conn->real_escape_string($p_sStudentennummer)."' AND u_pass = '".$db->conn->real_escape_string($p_sPassword)."' AND u_group = 'student'";
             
             $statusRes = $db->conn->query($status);
                        
		 	if ($result->num_rows == 1)
		 	{
                if ($statusRes->num_rows == 1)
                {
		 		$_SESSION['u_id'] = $rows['u_id'];
				$_SESSION['loggedin'] = 1;
				header('Location: index.php');
                }
                else
                {		 
                $_SESSION['u_id'] = $rows['u_id'];
				$_SESSION['loggedin'] = 1;
				header('Location: my_events.php');
                }
			}
            else
			{
				throw new Exception("Username and/or password are invalid.");
			}
		 }
	}
?>