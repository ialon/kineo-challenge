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
	<link rel="stylesheet" type="text/css" href="./../static/css/chartist.min.css">
	<link rel="stylesheet" type="text/css" href="./../static/css/custom.css">

	<script src="./../static/js/jquery-3.2.1.min.js"></script>
    <script src="./../static/js/bootstrap.min.js"></script>
    <script src="./../static/js/chartist.min.js"></script>
	<script src="./../static/js/results.js"></script>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Nationwide results:</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h3>Intention to vote:</h3>
                <br>
                <div class="chart">
                    <div class="nationwide-intention ct-golden-section" voting="<?php echo $voting ?>" notvoting="<?php echo $notvoting ?>">
                    </div>
                </div>
                <div class="chart-labels">
                    <div class="label voting">Voting</div>
                    <div class="label not-voting">Not voting</div>
                </div>
            </div>
            <div class="col-sm-6">
                <h3>Preferred candidate:</h3>
                <br>
                <div class="chart">
                    <div class="nationwide-candidate ct-golden-section" trump="<?php echo $trump ?>" hillary="<?php echo $hillary ?>">
                    </div>
                </div>
                <div class="chart-labels">
                    <div class="label trump">Trump</div>
                    <div class="label hillary">Hillary</div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <h1>Results by state:</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>State</th>
                            <th>Voting/Not voting</th>
                            <th>Trump (%)</th>
                            <th>Hillary (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $num = 1;
                            foreach ($states as $state) {
                                $row = '<tr>' .
                                    '<td>' . $num . '</td>' .
                                    '<td>' . $state->abbreviation . '</td>' .
                                    '<td>' . $state->name . '</td>' .
                                    '<td>' . $state->voting . '</td>' .
                                    '<td>' . $state->trump . '</td>' .
                                    '<td>' . $state->hillary . '</td>' .
                                '</tr>';

                                echo $row;

                                $num = $num + 1;
                            }
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</body>
</html>