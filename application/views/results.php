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
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./../">
                    <img src="./../static/img/kineo.png" alt="Logo" height="40">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./../">Home</a>
                    </li>
                    <li>
                        <a href="./results">Results</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container <?php echo $kineo_intention . ' ' . $kineo_candidate; ?>">
        <div class="row">
            <div class="col-lg-12">
                <h1>Your selected state is:</h1>
                <p><?php echo $state_fullname ?></p>
                <small>
                	Wrong state? <a href="./selection">Go back to selection</a>
                </small>
                <br>
                <small>
                    Want to vote again, guys? <a href="./clear_cookies">Clear cookies!</a>
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
								    <a <?php echo ($kineo_intention ? 'disabled' : '') ?> href="voting?state=<?php echo $kineo_state ?>&vote=TRUE" class="btn btn-success option-true">YES!</a>
								    <a <?php echo ($kineo_intention ? 'disabled' : '') ?> href="voting?state=<?php echo $kineo_state ?>&vote=FALSE" class="btn btn-danger option-false">NO</a>
								</div>
								<?php echo $voting_results ?>
							</div>
						</div>
					</fieldset>
				</form>
            </div>
        </div>

        <div class="row candidate">
            <div class="col-lg-12">
                <h1>3. Who are you going to vote for?</h1>

                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group yes-no-buttons">
                            <div class="col-lg-10">
                                <div class="image-container">
                                    <img alt="trump" src="./../static/img/trump.gif"><img alt="hillary" src="./../static/img/hillary.gif">
                                </div>
                                <div class="btn-group btn-group-justified">
                                    <a <?php echo ($kineo_candidate ? 'disabled' : '') ?> href="voting?state=<?php echo $kineo_state ?>&vote=TRUE&candidate=TRUMP" class="btn btn-info option-trump">TRUMP</a>
                                    <a <?php echo ($kineo_candidate ? 'disabled' : '') ?> href="voting?state=<?php echo $kineo_state ?>&vote=TRUE&candidate=HILLARY" class="btn btn-info option-hillary">HILLARY</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php echo $result_buttons ?>
            </div>
        </div>
    </div>
</body>
</html>