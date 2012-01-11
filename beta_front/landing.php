<html>
<head>
	<title> Minglit </title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	<script language=JavaScript src="jQuery.js"></script>
	<script src="http://staging.tokbox.com/v0.91/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
	
	<script>
		$(document).ready( 
			function() {
				$("#option_content").hide();
				
				$(".landing_option").mouseenter(
					function() {
						$("#option_content").show();
						//$("#option_content").css("background-color","white");
					}
				);
				
				$("#team_option").mouseenter(
					function() {
						$(this).css("color","#92B3FF");
						$("#option_content").html("<ul> <li id='Thomas'>David Thomas</li><li id='Fischer'>Diego Fischer</li><li id='Xavier'>Diego Xavier</li><li id='Batalha'>Joao Batalha</li></ul>");	
						$("#Thomas").mouseenter(
							function () {
								$(this).text("David Thomas > a Senior at MIT, addicted to web programming. He adds intellectual power and coding knowledge to the team, besides his strong leadership.");
								$(this).css("color","92B3FF");
							}
						);	
						$("#Thomas").mouseleave(
							function () {
								$(this).text("David Thomas");
								$(this).css("color","lightgray");
							}
						);
						$("#Batalha").mouseenter(
							function () {
								$(this).text("Joao Batalha > a Junior at MIT. He worked this summer for a startup tech company and he was awarded a prize that is given to computer science students from top American universities who have shown potential to succeed in the Tech startup scene. He adds coding expertise to the team.");
								$(this).css("color","92B3FF");
							}
						);	
						$("#Batalha").mouseleave(
							function () {
								$(this).text("Joao Batalha");
								$(this).css("color","lightgray");
							}
						);
						$("#Fischer").mouseenter(
							function () {
								$(this).text("Diego Fischer > an MBA student at MIT Sloan, experienced in strategy and business development. He adds business knowledge and quantitative techniques to the team.");
								$(this).css("color","92B3FF");
							}
						);	
						$("#Fischer").mouseleave(
							function () {
								$(this).text("Diego Fischer");
								$(this).css("color","lightgray");
							}
						);
						$("#Xavier").mouseenter(
							function () {
								$(this).text("Diego Xavier > an MBA student at MIT Sloan, experienced in group buying and private banking. He adds experience in understanding customer's demands and in matching  suppliers to customers.");
								$(this).css("color","92B3FF");
							}
						);	
						$("#Xavier").mouseleave(
							function () {
								$(this).text("Diego Xavier");
								$(this).css("color","lightgray");
							}
						);
					}
				);
				
				$("#team_option").mouseleave(
					function() {
						$(this).css("color","lightgray");			
					}
				);
				
				$("#contact_option").mouseenter(
					function() {
						$(this).css("color","#92B3FF");
						$("#option_content").html("team@minglit.com");			
					}
				);
				
				$("#contact_option").mouseleave(
					function() {
						$(this).css("color","lightgray");			
					}
				);
				
				$("#job_option").mouseenter(
					function() {
						$(this).css("color","#92B3FF");
						$("#option_content").html("<ul><li id='job_sd'>Software Developer</li> <li id='job_uid'>UI Designer</li> </ul>");
						$("#job_sd").mouseenter(
							function () {
								$(this).text("Software Developer > Description.");
								$(this).css("color","92B3FF");
							}
						);	
						$("#job_sd").mouseleave(
							function () {
								$(this).text("Software Developer");
								$(this).css("color","lightgray");
							}
						);
						$("#job_uid").mouseenter(
							function () {
								$(this).text("UI Designer > Description.");
								$(this).css("color","92B3FF");
							}
						);	
						$("#job_uid").mouseleave(
							function () {
								$(this).text("UI Designer");
								$(this).css("color","lightgray");
							}
						);		
					}
				);
				
				$("#job_option").mouseleave(
					function() {
						$(this).css("color","lightgray");			
					}
				);
				
				
				/*$(".landing_option").mouseleave(
					function () {
						$("#option_content").css("background-color", "blue");
					}
				);*/
			}
		);
	</script>
</head>
<body>
	
	<div id="landing_wrapper">
		<div id="main">
			<div id="login_logo">
				<img src="logo.png">
			</div>
			<div id="landing_bar">
				<div class="landing_option" id="team_option"> team </div> 
				<div class="landing_option" id="contact_option"> contact us </div>
				<!div class="landing_option" id="press_option">  <!/div> 
				<div class="landing_option" id="job_option"> jobs </div> 
			</div>  
			<div id="option_content">
			</div>
		</div>
	</div>

</body>
</html>