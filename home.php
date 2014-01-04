<?php
session_start();
include('library/Login.php');
include('library/Things.php');

if(!$_SESSION['auth']) {
	header('location: index.php');
}

?>

<?php include('header.php'); ?>
<div class="container">
	  <div class="row">
        <div class="col-md-2">
        	<div class="sidenav">
  	     		<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addNew">
  	     			Add New
  	     		</button>
			</div>
		</div>
		<div class="col-md-10">
			<p>
				<?php

				$list = new Things;
				$dats = array();
				foreach ($list->getThings() as $thing) {
					$dates[] = $thing['date'];
				}

				$dates = array_unique($dates);

				foreach ($dates as $key => $value) {
					echo '<h3>'.$value.'</h3>';
					foreach ($list->getThings() as $thing) {
						if($thing['date']==$value) {
							echo '<strong>Thing:</strong> '.$thing['thing'];
							echo '<br /><strong> Hour: </strong>'.number_format($thing['time'],2).'<br />';
							echo $thing['description'];
							echo '<br /><strong>Mood:</strong> ';

							if($thing['mood']==0) {

								echo '<i class="fa fa-thumbs-o-down"></i>';

							} else {

								for ($i=0; $i != $thing['mood']; $i++) { 
									echo '<i class="fa fa-thumbs-o-up"></i>';
								}

							}
							echo '<br /><a href="addnew.php?delete='.$thing['id'].'" style="color:red;" class="pull-right"><i class="fa fa-times"></i></a>';
							echo '<br />~<br />';
							
						}
					}
					echo '<hr />';
				}
				?></p>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add New Thing</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="addnew.php" />
        <p>Date</p>
        <input type="text" name="date" class="form-control" value="<?php echo date('Y/m/d',strtotime('now')); ?>" id="datepicker">
        <p>Time<p>
        <input type="text" name="time" class="form-control" value="<?php echo date('H.s',strtotime('now')); ?>" >
        <p>What did you do?</p>
        <input type="text" name="thing" class="form-control" placeholder="ate dinner or summink">
        <p>Tell me more about it...</p>
        <textarea class="form-control" name="description" rows="3"></textarea>
        <p>How did it make you feel? (0 mega crap - 5 totes sauce)</p>
        <select class="form-control" name="mood">
        	<option>0</option>
  			<option>1</option>
  			<option>2</option>
  			<option>3</option>
  			<option>4</option>
  			<option>5</option>
		</select>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" value="Save Thing" class="btn btn-primary" />
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include('footer.php'); ?>
