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

	<link rel="stylesheet" type="text/css" href="./static/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./static/css/lumen.min.css">
	<link rel="stylesheet" type="text/css" href="./static/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./static/css/custom.css">

	<script src="./static/js/jquery-3.2.1.min.js"></script>
	<script src="./static/js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="./">
                    <img src="./static/img/kineo.png" alt="Logo" height="40">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a href="./index.php/results">Results</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Welcome to Elections 2016</h1>
                <p>Follow 4 simple steps to submit your vote</p>
                <ol>
	                <li>Select your state</li>
	                <li>Answer if you are going to vote or not</li>
	                <li>If you are, who are going to vote for</li>
	                <li>View results!</li>
                </ol>

				<a class="btn btn-primary" href="./index.php/selection">Get started!</a>
            </div>
        </div>
    </div>
</body>
</html>