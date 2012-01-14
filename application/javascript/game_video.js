//--------------------------------------
//  Video Code
//--------------------------------------


//requires php
var apiKey = '8179062'; //<?php print API_Config::API_KEY?>;
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


function connect() {
	//Connect to session
	session.connect(apiKey, token);
}

// For user to start publishing to the session
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
	//eventually will end game if a stream is terminated
}

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