<?php
session_start();
include('library/Login.php');
include('library/Things.php');

if(isset($_GET['delete'])) {
	$delete = new Things;
		if($delete->delete($_GET['delete'])) {
			header('location: home.php');
		} else {
			header('location: home.php');			
		}
}


if(isset($_POST['description'])) {
	$thing = new Things;
	if($thing->addNew($_POST)) {
		header('location: home.php');
	} else {
		header('location: home.php');			
	}
} 

?>