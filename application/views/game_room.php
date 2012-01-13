<html>
<head>
	<title> Minglit: Game </title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css" media="screen">
	<script language=JavaScript src="<?php echo base_url();?>/javascript/jQuery.js"></script>
	<script src="http://staging.tokbox.com/v0.91/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
	<?php
	    require_once base_url().'/tokbox_SDK/API_Config.php';
	    require_once base_url().'/tokbox_SDK/OpenTokSDK.php';
	    require_once base_url().'/tokbox_SDK/SessionPropertyConstants.php';

	    $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
	    $session = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
	    $sessionId = $session->getSessionId();
	?>
	<script src="<?php echo base_url();?>/javascript/game_video.js" type="text/javascript" charset="utf-8"></script>
	<script>
		//--------------------------------------
		//  Game Code
		//--------------------------------------
		
			/*
			** Enforces that only one button A,B,C,D may be selected (blue) at a time.
			*/	
			
			var previous_selected ='';	
			
			function playerSelected (player){
				if (previous_selected == ''){	
						$("#"+player).removeClass("mingleButton");
						$("#"+player).addClass("mingleButton_active");
						previous_selected = player;
				}
				else{
					$("#"+previous_selected).removeClass("mingleButton_active");
					$("#"+previous_selected).addClass("mingleButton");
					$("#"+player).removeClass("mingleButton");
					$("#"+player).addClass("mingleButton_active");
					previous_selected = player;
				}
			}
			
			/*
			** Game Timer
			*/	
			
			var secs
			var timerID = null;
			var timerRunning = false;
			var delay = 1000;

			function InitializeTimer()
			{
			    // Set the length of the timer, in seconds
			    secs = 45
			    StopTheClock()
			    StartTheTimer()
			}

			function StopTheClock()
			{
			    if(timerRunning)
			        clearTimeout(timerID)
			    timerRunning = false
			}

			function StartTheTimer()
			{
			    if (secs==0)
			    {
			        StopTheClock()
			        // Timer complete
			        alert("You have just completed one game.")
			    }
			    else
			    {
			        self.status = secs
			        secs = secs - 1
					$("#timer").text("Time: "+secs.toString()+" seconds")
			        timerRunning = true
			        timerID = self.setTimeout("StartTheTimer()", delay)
			    }
			}
			//need to start once there are 4 streams in the session
			InitializeTimer();
	</script>
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
				<div id="label_button_wrapper"><a href="#" class="mingleButton" id="A" onclick="playerSelected('A')"> A </a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton" id="B" onclick="playerSelected('B')"> B </a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton" id="C" onclick="playerSelected('C')"> C </a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton" id="D" onclick="playerSelected('D')"> D </a> </div>
			</div>
			<div id="timer" style="font-size:24;">
			</div>                                                                   
		</div>
		
	</div>
</body>
</html>