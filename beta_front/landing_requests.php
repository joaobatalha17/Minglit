<?php

$q = $_GET["q"]; //let's us know what the user is hovering and hence what information to grab

switch($q){
	case "Thomas":
		echo "David Thomas is a Senior at MIT, addicted to web programming. He brings intellectual power and coding knowledge to the team along with strong leadership.";
		break;
		
	case "Batalha":
		echo "Joao Batalha is a Junior at MIT. He worked for a startup tech company this summer and he was awarded a prize given to computer science students from top American universities who have shown potential to succeed in the Tech startup scene. He brings coding expertise to the team.";
		break;
		
	case "Fischer":
		echo "Diego Fischer is an MBA student at MIT Sloan, experienced in business strategy and business. He brings business knowledge and quantitative techniques to the team.";
		break;
		
	case "Xavier":
		echo "Diego Xavier is an MBA student at MIT Sloan, experienced in group buying and private banking. He brings expertise in understanding customer's demands and in matching suppliers to customers.";
		break;
		
	case "Email":
		echo "team@minglit.com";
		break;
		
	case "UI_Designer":
		echo "User Interface Ninja. Experience in designing awesome web pages from wireframe to completion. Skills: Adobe Creative Suite, HTML, CSS and Javascript. Apply by sending your resume to team@minglit.com.";
		break;

	case "Web_Developer":
		echo "Will play an essential role in the life cycle of planning, requirement definition, design, development and testing. Someone with experience in designing scalable web applications with PHP. Apply by sending your resume to team@minglit.com.";
		break;
}

?>