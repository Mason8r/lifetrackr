 <!-- Fixed navbar - INCLUDED IN HEADER PHP -->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">LifeTrackr
            </a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

            <!--Logged in links-->
              <?php $logincheck = new Login; 

              if($logincheck->loggedin()) : ?>
             <li class="active"><a href="index.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="divider"></li>
              <p class="navbar-text">Sign in as <?php echo $_SESSION['firstname'].' '.$_SESSION['surname']?></p>
              <li><a href="logout.php">Logout</a></li>
              <?php else :  ?>
              <li><a href="index.php">Login</a></li>
            <?php endif; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>