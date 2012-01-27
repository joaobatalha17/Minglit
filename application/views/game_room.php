<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<title> Minglit: Game </title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen">
	<script src="http://staging.tokbox.com/v0.91/js/TB.min.js"></script>
	<?php
	    require_once('application/tokbox_SDK/API_Config.php');
	    require_once('application/tokbox_SDK/OpenTokSDK.php');
	    require_once('application/tokbox_SDK/SessionPropertyConstants.php');

	    $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
	    $session = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
	    //$sessionId = $session->getSessionId();
	    $sessionId= $tokboxID;
	    

	?>
	<script>
	    /*
	    ** Tokbox + Video Code
	    */
	
	    //requires php
        var apiKey = <?php print API_Config::API_KEY?>;
        var sessionId = '<?php print $sessionId; ?>';
        var token = '<?php print $apiObj->generate_token($sessionId, null, null, (string)$user_id); ?>'; // generate_token(session_id, null, null, metadata)

        var session;
        var publisher;
        var subscribers = {};

				var stream_count = 0;

		        if (TB.checkSystemRequirements() != TB.HAS_REQUIREMENTS) {
		        	alert("You don't have the minimum requirements to run this application."
		        		  + "Please upgrade to the latest version of Flash.");
		        } else {
		        	session = TB.initSession(sessionId);	// Initialize session

		        	// Add event listeners to the session
		        	session.addEventListener('sessionConnected', sessionConnectedHandler);
		        	session.addEventListener('streamCreated', streamCreatedHandler);
		        	session.addEventListener('streamDestroyed', streamDestroyedHandler);

		        	connect();
		        }


		        function connect() {
		        	//Connect to session
		        	session.connect(apiKey, token);
		        }

		        // For user to start publishing to the session
		        function startPublishing() {
		        	if (!publisher) {
		        		var parentDiv = document.getElementById("<?php echo 'position_' . (string)$user_position; ?>");
		        		var publisherDiv = document.createElement('div'); // Create a div for the publisher to replace
		        		var publisherProps = {width: 299, height: 224, subscribeToAudio: true};
		        		publisherDiv.setAttribute('id', 'flash_video');
		        		parentDiv.appendChild(publisherDiv);
		        		publisher = session.publish(publisherDiv.id,publisherProps); // Pass the replacement div id to the publish method
		        	}
		        }


		        function sessionConnectedHandler(event) {
		        	startPublishing();
		        	// Subscribe to all streams currently in the Session
		        	for (var i = 0; i < event.streams.length; i++) {
		        		addStream(event.streams[i]);
		        	}
		        }

		        function streamCreatedHandler(event) {
		        	// Subscribe to the newly created streams
		        	for (var i = 0; i < event.streams.length; i++) {
		        		addStream(event.streams[i]);
		        	}
		        }

		        function streamDestroyedHandler(event){
		        	stream_count -= 1;
		        }

		        function addStream(stream){
            stream_count += 1;
            if(stream_count === 2){
              $.get("<?php echo base_url() . 'index.php/game/get_question'; ?>", function(data){
              document.getElementById("question_header").innerHTML=data;
              });
              
            }

						startRound();

					//$("#question_container").text(stream_count.toString());
		        	// Check if this is the stream that I am publishing, and if so do not publish.
		        	if (stream.connection.connectionId == session.connection.connectionId) {
		        		return;
		        	}
		        /*	var divArray = new Array('vid2','vid3','vid4');
		        	var count = 0;
		        	while (document.getElementById(divArray[count]).hasChildNodes()){
		        		count += 1;
		        	}*/
		        	get_position(stream);
		        	/*var subscriberDiv = document.createElement('div'); // Create a div for the subscriber to replace
		        	var parent = "position_"+get_position(stream.connection.data);//divArray[count];
		        	alert(parent);
		        	var subscriberProps = {width: 299, height: 224, subscribeToAudio: true};
		        	subscriberDiv.setAttribute('id', stream.streamId); // Give the replacement div the id of the stream as its id.
		        	document.getElementById(parent).appendChild(subscriberDiv);		
		        	subscribers[parent] = session.subscribe(stream, subscriberDiv.id, subscriberProps);*/

		        }
		        

            function get_position(stream){
              $.post("<?php echo base_url() . 'index.php/game/get_user_position'; ?>", {other_user_id: stream.connection.data},
                 function(data) {
                   var subscriberDiv = document.createElement('div'); // Create a div for the subscriber to replace
     		        	var parent = "position_"+data.toString();//divArray[count];
     		        	var subscriberProps = {width: 299, height: 224, subscribeToAudio: true};
     		        	subscriberDiv.setAttribute('id', stream.streamId); // Give the replacement div the id of the stream as its id.
     		        	document.getElementById(parent).appendChild(subscriberDiv);		
     		        	subscribers[parent] = session.subscribe(stream, subscriberDiv.id, subscriberProps);
                 });
            }

				//--------------------------------------
				//  Game Code
				//--------------------------------------

					/*
					** Initiate Question and Timer once 4 active streams are in session
					*/
					function startRound(){
						InitializeTimer();
						//getQuestion();
					}

					/* gets question and prints it on screen */
				/*	function getQuestion(){
						$.ajax({
							url:"<?php echo base_url() . 'index.php/login/give_question'; ?>",
							success:function(data){
								alert(data);
							}
						});
					}*/
		

					/* gets answer to question and prints it on screen */
					/*function getAnswer(){
						$.post("<?php echo base_url() . 'login/give_question' ;?>",

						);
					}
					*/


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
					    secs = 30
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
							$("#question_container").append("<h2 style='color:#4548FF'> The correct answer is David <h2>");
					        //getAnswer()
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
			</script>
		</head>

		<body style="background-color:lightgray;">
			<div id="game_wrapper">
				<div id="main">
					<div id="question_container">
							<h1 id="question_header"> Who in this room travelled to Egypt last summer? </h1>
					</div>
					<div id="video_container">
						<div id="position_0" class="video"></div>
						<div id="position_1" class="video"></div>
						<div id="position_2" class="video"></div>
						<div id="position_3" class="video"></div>
					</div>
					<div id="label_container">
						<div id="label_button_wrapper"><a href="#" class="mingleButton" id="A" onclick="playerSelected('A')"> Joao </a> </div>
						<div id="label_button_wrapper"><a href="#" class="mingleButton" id="B" onclick="playerSelected('B')"> David </a> </div>
						<div id="label_button_wrapper"><a href="#" class="mingleButton" id="C" onclick="playerSelected('C')"> Anna </a> </div>
						<div id="label_button_wrapper"><a href="#" class="mingleButton" id="D" onclick="playerSelected('D')"> Jenifer </a> </div>
					</div>
					<div id="timer" style="font-size:24;">
					</div>                                                                   
				</div>

			</div>
			<center><img src="<?php echo base_url() . 'img/minglit_logo_MIT.png';?>" /></center> <!delete this after meeting>
		</body>
		</html>