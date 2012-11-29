<?php
session_start();
$_SESSION["dir"] = $_POST["dir"];
?>
<html>
	<head>
		<title>windowsMedias(music)</title>
		<meta http-equiv="content-type:text/html ; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="assets/style.css"/>
		<link rel="stylesheet" type="text/css" href="assets/colorify.css"/>
		<link rel="stylesheet" type="text/css" href="assets/fontfy.css"/>
		<script type="text/javascript" src="assets/jquery.min.js"></script>
		<script type="text/javascript" src="assets/script.scan.php"></script>
	</head>
	<body>
		<div class="main">
			<div class="title">
				<div class="gray-white">.</div>
				<div class="green-flower">windows</div>
				<div class="purple">Medias</div>
				<div class="gray-white">(</div>
				<div class="pink-red">music</div>
				<div class="gray-white">)</div>
			</div>
			<div class="playlist">
				<div class="menu">
					<ul>
						<li>
							<div class="pink-red">Sort&nbsp;</div>
							<div class="gray-white">(&nbsp;</div>
						</li>
						<li>
							<div class="purple">artist</div>
							<div class="gray-white">,</div>
						</li>
						<li>
							<div class="purple active">music</div>
							<div class="gray-white">,</div>
						</li>
						<li>
							<div class="purple">album</div>
						</li>
						<li>
							<div class="gray-white">&nbsp;)</div>
						</li>
					</ul>
				</div>
				<div class="content flexscroll">
					<div class="blue-high">playlist&nbsp;</div>
					<div class="gray-white">{&nbsp;</div>
					<div id="playlist-content">
						<ul>
							<li>
								<div class="purple" id="scan">Analizando</div><br/>
							</li>
							<li>
								<div><img src="assets/img/ajax-loader.gif"/></div>
							</li>
						</ul>
					</div>
					<div class="gray-white">
						}
					</div>
				</div>
				<div class="player">
					<audio controls="controls" autoplay>
						<source src="" type="audio/mp3">
						<source src="" type="audio/ogg">
						Your browser does not support this audio format.
					</audio>
				</div>
			</div>
		</div>
	</body>
</html>