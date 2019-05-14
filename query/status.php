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
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Minecraft RCON Console</title>

	<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Latest darkly bootstrap theme CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css" integrity="sha384-w+8Gqjk9Cuo6XH9HKHG5t5I1VR4YBNdPt/29vwgfZR485eoEJZ8rJRbm3TR32P6k" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript" src="../script.js"></script>

	<meta http-equiv="refresh" content="30">

</head>


<body class="bg-white" style="overflow-y: hidden">
	<div class="container-fluid p-0">
		<div class="list-group-item list-group-item-info">

			<?php
			if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
			    $url_protocol  = "https";
			} else {
			    $url_protocol  = "http";
			}
			$url = $url_protocol . '://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/api.php';
			$params= 'case=getinfo';

			$ch = curl_init( $url );
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

			$purejson = curl_exec( $ch );
			if($purejson != null) {
				echo "Server status: Online<br>";
			}
			else
			{
				echo "Server status: Offline<br>";
				return;
			}

			$json = json_decode($purejson);
			
			echo format("Host Port : {0}{1}", $json->hostport, "<br>");
			echo format("Host IP : {0}{1}", $json->hostip, "<br>");
			echo format("Description : {0}{1}", $json->description, "<br>");
			echo format("Game Type : {0}{1}", $json->gametype, "<br>");
			echo format("Version : {0}{1}", $json->version, "<br>");
			echo format("Plugins : {0}{1}", $json->plugins, "<br>");
			echo format("Map Name : {0}{1}", $json->map, "<br>");
			$division = $json->numplayers / $json->maxplayers;
			$percent = $division * 100;
			echo format("Online : {0} / {1} ({2}%){3}", $json->numplayers, $json->maxplayers, $percent, "<p>");
			$progressClass = "progress-bar";
			if($percent > 80) $progressClass = "progress-bar progress-bar-danger";

			echo format("<div class='progress progress-striped'>
				<div class='{0}' role='progressbar' aria-valuenow='{1}' aria-valuemin='0' aria-valuemax='{2}' style='width: {3}%;'>
				<span class='sr-only'>{3}% Complete</span>
				</div>
				</div>", $progressClass, $json->numplayers, $json->maxplayers, $percent);


			//echo format("Software : {0}{1}", $json->Software, "<br>");



			function format($format) {
				$args = func_get_args();
				$format = array_shift($args);

				preg_match_all('/(?=\{)\{(\d+)\}(?!\})/', $format, $matches, PREG_OFFSET_CAPTURE);
				$offset = 0;
				foreach ($matches[1] as $data) {
					$i = $data[0];
					$format = substr_replace($format, @$args[$i], $offset + $data[1] - 1, 2 + strlen($i));
					$offset += strlen(@$args[$i]) - 2 - strlen($i);
				}

				return $format;
			}

			//////////////////////////////////////////////////////
			echo "<br>";

			echo "Name of current players online : ";
			if(empty($json->players)){
				echo "No players online";
			}
			foreach ($json->players as $key => $value) {
				echo $value;
				if($key != count($json->players) - 1) echo ', ';
			}

			?>
	</div>

</body>

</html>