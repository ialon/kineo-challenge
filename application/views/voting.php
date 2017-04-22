<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Coding Challenge - Kineo US">
    <meta name="author" content="Josemaría Bolaños">
	<title>Welcome to Elections 2016</title>

	<link rel="stylesheet" type="text/css" href="./../static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./../static/css/lumen.min.css">
	<link rel="stylesheet" type="text/css" href="./../static/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./../static/css/custom.css">

	<script src="./../static/js/jquery-3.2.1.min.js"></script>
	<script src="./../static/js/bootstrap.min.js"></script>
	<script src="./../static/js/voting.js"></script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->
                <a class="navbar-brand" href="./../">
                    <img src="./../static/img/kineo.png" alt="Logo" height="40">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Your selected state is:</h1>
                <p><?php echo $state ?></p>
                <small>
                	Wrong state? <a href="./selection">Go back to selection</a>
                </small>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1>2. Are you going to vote?</h1>

	            <form class="form-horizontal">
					<fieldset>
						<div class="form-group yes-no-buttons">
							<div class="col-lg-10">
								<div class="btn-group btn-group-justified">
								  <button class="btn btn-success">YES!</button>
								  <button class="btn btn-danger">NO</button>
								</div>
								<?php echo $voting_results ?>
							</div>
						</div>

						<?php echo $voting_buttons ?>
						<?php echo get_cookie('kineo_state') ?>

					</fieldset>
				</form>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12">
                <h1>3. Who are you going to vote for?</h1>

	            <form class="form-horizontal">
					<fieldset>
						<div class="form-group">
							<div class="col-lg-10">
								<div class="btn-group btn-group-justified yes-no-buttons">
								  <button class="btn btn-success">TRUMP</button>
								  <button class="btn btn-danger">HILLARY</button>
								</div>					
								<div class="progress">
									<div class="progress-bar progress-bar-danger" style="width: 80%"></div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="reset" class="btn btn-default">Reset</button>
								<button type="submit" class="btn btn-primary">Submit my vote!</button>
							</div>
						</div>
					</fieldset>
				</form>
            </div>
        </div> -->
    </div>
</body>
</html>