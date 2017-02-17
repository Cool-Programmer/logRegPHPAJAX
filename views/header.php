<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Retweet!</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/application.css">
	</head>
	<body>
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="index.php">Retweet!</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="?page=yourtimeline">Your timeline <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?page=yourtweets">Your tweets</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?page=publicprofiles">Public profiles</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<!-- Button trigger modal -->
						<?php if (isset($_SESSION['id'])): ?>
							<a href="actions.php?action=logout" class="btn btn-success">
							  Logout
							</a>
						<?php else : ?>
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginSignupModal">
							  Login/Signup
							</button>
						<?php endif ?>
					</li>
				</ul>
			</div>
		</nav>