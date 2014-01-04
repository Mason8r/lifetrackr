<?php 

Class Login {
	
	public function attempt($details) 
	{
		$conn = new mysqli('localhost','root','password','lifetrackr');
		$result = $conn->query("select * from users where email='".$details['username']."' and password='".sha1($details['password'])."'");
		if($result->num_rows==1) {
			$user = $result->fetch_assoc();
			unset($user['password']);
			foreach ($user as $key => $value) {
				$_SESSION[$key] = $value;
			}
			$_SESSION['auth'] = true;
			//update the database to NOW for the successful login
			$update = $conn->query("UPDATE users SET updated_at=".date('d/m/Y H:i:s',strtotime('now'))." where email=".$details['username']);
			return true;
		} else {
			return false;
		}
	}

	public function loggedin()
	{
		if(isset($_SESSION['auth'])) {
			return true;
		} else {
			return false;
		}
	}

	public function logout()
	{
		session_destroy();
		return true;
	}

}

?>