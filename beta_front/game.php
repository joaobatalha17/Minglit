<html>
<head>
	<title> Minglit </title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	<script language=JavaScript src="jQuery.js"></script>
	<script src="http://staging.tokbox.com/v0.91/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
	<?php
	    require_once 'SDK/API_Config.php';
	    require_once 'SDK/OpenTokSDK.php';
	    require_once 'SDK/SessionPropertyConstants.php';

	    $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
	    $session = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
	    $sessionId = $session->getSessionId();
	?>
	<script src="game.js" type="text/javascript" charset="utf-8"></script>
</head>

<body style="background-color:lightgray;">
	<div id="game_wrapper">
		<div id="main">
			<div id="question_container">
					<h1> Who in this room skinny dipped last summer? </h1>
			</div>
			<div id="video_container">
				<div id="vid1" class="video"></div>
				<div id="vid2" class="video"></div>
				<div id="vid3" class="video"></div>
				<div id="vid4" class="video"></div>
			</div>
			<div id="label_container">
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp A &nbsp &nbsp &nbsp</a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp B &nbsp &nbsp &nbsp</a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp C &nbsp &nbsp &nbsp</a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp D &nbsp &nbsp &nbsp</a> </div>
			</div>                                                                   
		</div>
		
	</div>
</body>
</html>