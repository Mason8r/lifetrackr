<?php 

class Things extends Controller {
	
	public function getThings()
	{

		$conn = $this->dbConnect();

		$result = $conn->query("select * from things where user_id='".$_SESSION['id']."' order by date DESC, time DESC");

		$things = array();
		while ($row = $result->fetch_assoc() ) {
			$things[] = $row;
		}

		return $things;
	}

	public function addNew($data)
	{

		$conn = $this->dbConnect();

		$result = $conn->query('insert into things (date, time, thing, description, mood, user_id) VALUES 
		("'.$data['date'].'","'.$data['time'].'","'.$data['thing'].'","'.$data['description'].'","'.$data['mood'].'","'.$_SESSION['id'].'")');

		return true;

	}

	public function delete($data)
	{

		$conn = $this->dbConnect();

		$result = $conn->query('delete from things where things.id='.$data);

		return true;

	}	
}