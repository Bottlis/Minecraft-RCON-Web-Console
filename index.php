<?php
/*
This file is part of Minecraft-RCON-Console.

Minecraft-RCON-Console is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Minecraft-RCON-Console is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Minecraft-RCON-Console.  If not, see <http://www.gnu.org/licenses/>.
*/

require 'config.php';
?>

<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Minecraft RCON Console</title>

	<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
	<!--<script src="//code.jquery.com/jquery-migrate-3.0.1.min.js"></script> -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Latest darkly bootstrap theme CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css" integrity="sha384-w+8Gqjk9Cuo6XH9HKHG5t5I1VR4YBNdPt/29vwgfZR485eoEJZ8rJRbm3TR32P6k" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/JavaScript" src="script.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
	<!-- Stack the columns on mobile by making one full-width and the other half-width -->
	<div class="container-fluid content" style="padding-top: 15px;">
		<div class="alert alert-info text-center" id="alertMessenge">Welcome to Minecraft RCON Console.</div>
		<div class="alert alert-info text-center"><?php echo $serverName; ?></div>
		<div class="row">
			<div class="col-md-8 col-lg-8 console">
				<div class="card mb-3">
					<div class="card-header bg-info">
						<h3>Console</h3>
					</div>
					<div class="card-body bg-white">
						<ul class="list-group" id="groupConsole">
							<li class="list-group-item list-group-item-info">Welcome to Minecraft RCON Console.</li>
							<li class="list-group-item list-group-item-info">View all command at <a href="http://minecraft.gamepedia.com/Commands" target="_blank">http://minecraft.gamepedia.com/Commands</a></li>
							<li class="list-group-item list-group-item-info">View item name and id at <a href="http://www.minecraftinfo.com/idlist.htm" target="_blank">http://www.minecraftinfo.com/idlist.htm</a></li>
						</ul>

					</div>
				</div>

				<div class="checkbox card card-body bg-white mb-3">
					<div class="row align-items-center">
						<div class="col-6">
							<label class="text-dark btn mb-0">
								<input type="checkbox" id="chkAutoScroll" checked="true"> Auto scroll
							</label>
						</div>
						<div class="col-6">
							<button type="button" class="btn btn-primary" tabindex="0" id="btnClearLog" style="float:right;"><span class="glyphicon glyphicon-remove-sign"></span> Clear Console</button>
						</div>
					</div>
				</div>

				<div class="input-group">
					<input type="text" class="form-control" id="txtCommand">
					<div class="input-group-append">
						<button type="button" class="btn btn-primary" tabindex="-1" id="btnSend"><span class="glyphicon glyphicon-arrow-right"></span> Send</button>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-4 status">
				<div class="card mb-3 h-100">
					<div class="card-header bg-info">
						<h3>Server Status & Info</h3>
					</div>
					<div class="card-body bg-white">
						<iframe src="query/status.php" width="100%" frameBorder="0" class="h-100">Browser not compatible.</iframe>
					</div>
					<div class="card-footer bg-info">
						<p class="mb-0">Minecraft RCON Console 2.2 | Created by ekaomk. Maintained by Megastary.</p>
					</div>
				</div>

			</div>

		</div>
	</div>

</body>

<footer id = "footer">
	<div class="container-fluid">

	</div>
</footer>

</html>