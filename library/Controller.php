<?php 


Class Controller {

	public $db_host = 'localhost';
	public $db_user = 'root';
	public $db_password = 'password';
	public $db_name = 'lifetrackr';
	
	public function dbConnect()
	{
		return new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
	}
}


?>