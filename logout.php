<?php
session_start();

	include('library/Login.php');

		$logout = new Login;
		$logout->logout();

?>
<?php include('header.php'); ?>
<div class="container">
    <div class="page-header">
        <h1 class="text-center logo">LifeTrackr</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
			<div class="login text-center">
				<p>See you soon babe.</p>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>