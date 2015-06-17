<?php
	class db
	{
		/*private $m_sHost = "taiwan";
		private $m_sUserlogin = "jappdemo";
		private $m_sPassword = "7UTNwXP78y2YMTnr";
		private $m_sDatabase = "jappdemo";*/

		private $m_sHost = "localhost";
		private $m_sUserlogin = "root";
		private $m_sPassword = "azerty";
		private $m_sDatabase = "eindwerk_db";
		
		public $conn;

		public function __construct()
		{
				$this->conn = new mysqli($this->m_sHost, $this->m_sUserlogin, $this->m_sPassword, $this->m_sDatabase);
		}
	}
?>