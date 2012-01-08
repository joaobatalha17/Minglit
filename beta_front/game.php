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

	   /* if($_REQUEST['sessionId']) {
	        $sessionId = $_REQUEST['sessionId'];
	    } else {*/
	        $session = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
	        $sessionId = $session->getSessionId();
	    //}
	?>
	<script type="text/javascript" charset="utf-8">
		var apiKey = <?php print API_Config::API_KEY?>;
		var sessionId = '153975e9d3ecce1d11baddd2c9d8d3c9d147df18';//'<?php print $sessionId; ?>';
		var token = 'devtoken';//'<?php print $apiObj->generate_token($sessionId); ?>';

		var session;
		var publisher;
		var subscribers = {};

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

		//--------------------------------------
		//  Connection and Publishingz HANDLERS
		//--------------------------------------

		/*
		If testing the app from the desktop, be sure to check the Flash Player Global Security setting
		to allow the page from communicating with SWF content loaded from the web. For more information,
		see http://www.tokbox.com/opentok/build/tutorials/helloworld.html#localTest
		*/
		function connect() {
			session.connect(apiKey, token);
		}

		// Called when user wants to start publishing to the session
		function startPublishing() {
			if (!publisher) {
				var parentDiv = document.getElementById("vid1");
				var publisherDiv = document.createElement('div'); // Create a div for the publisher to replace
				var publisherProps = {width: 299, height: 224, subscribeToAudio: true};
				publisherDiv.setAttribute('id', 'flash_video');
				parentDiv.appendChild(publisherDiv);
				publisher = session.publish(publisherDiv.id,publisherProps); // Pass the replacement div id to the publish method
			}
		}


		//--------------------------------------
		//  OPENTOK EVENT HANDLERS
		//--------------------------------------

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

		function streamDestroyedHandler(event) {
			// This signals that a stream was destroyed. Any Subscribers will automatically be removed.
			// This default behaviour can be prevented using event.preventDefault()
		}


		//--------------------------------------
		//  HELPER METHODS
		//--------------------------------------

		function addStream(stream) {
			// Check if this is the stream that I am publishing, and if so do not publish.
			if (stream.connection.connectionId == session.connection.connectionId) {
				return;
			}
			var divArray = new Array('vid2','vid3','vid4');
			var count = 0;
			while (document.getElementById(divArray[count]).hasChildNodes()){
				count += 1;
			}
			var subscriberDiv = document.createElement('div'); // Create a div for the subscriber to replace
			var parent = divArray[count];
			var subscriberProps = {width: 299, height: 224, subscribeToAudio: true};
			subscriberDiv.setAttribute('id', stream.streamId); // Give the replacement div the id of the stream as its id.
			document.getElementById(parent).appendChild(subscriberDiv);		
			subscribers[parent] = session.subscribe(stream, subscriberDiv.id, subscriberProps);

		}


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
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp A &nbsp &nbsp &nbsp</a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp B &nbsp &nbsp &nbsp</a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp C &nbsp &nbsp &nbsp</a> </div>
				<div id="label_button_wrapper"><a href="#" class="mingleButton">&nbsp &nbsp &nbsp D &nbsp &nbsp &nbsp</a> </div>
			</div>                                                                   
		</div>
		
	</div>
</body>
</html>