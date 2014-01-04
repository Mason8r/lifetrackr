<?php 
session_start();
if($_SESSION['auth']) {
	header('location: home.php');
}

	include('library/Login.php');

	$now = date('d/m/Y H:i:s', strtotime('now')); 

	if(isset($_POST)) {
		$auth = new Login;
		if($auth->attempt($_POST))
		{
			header('location: home.php');
		}

	} 

?>
<?php include('header.php'); ?>
<div class="container">
    <div class="page-header">
        <h1 class="text-center logo">LifeTrackr</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
			<div class="login text-center">
				<form method="post" action="index.php">
					<input type="text" name="username" />
					<input type="password" name="password" />
					<input type="submit" value="Submit" />
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>