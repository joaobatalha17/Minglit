<html>
<head>
	<title> Minglit </title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	<script language=JavaScript src="jQuery.js"></script>
	<script src="http://staging.tokbox.com/v0.91/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
	
	<script>
	function getContent(source){
		$.get('landing_requests.php?q='+source, function(data) {
		  $("#selector_info").text(data);
		});
	}
	
	$(document).ready( 
		function() {
			
			$("#team_option").mouseenter(
				function() {
					$("#landing_bar").css("border-bottom","2px solid lightgray");
					$(".landing_option").css("color","lightgray");
					$(this).css("color","#92B3FF");
					$("#selector").html("<ul> <li id='Thomas'>David Thomas</li><li id='Fischer'>Diego Fischer</li><li id='Xavier'>Diego Xavier</li><li id='Batalha'>Joao Batalha</li></ul>");	
					$("#selector_info").text("");
					$("#Thomas").mouseenter(
						function () {
							getContent("Thomas");
							$(this).css("color","92B3FF");
						}
					);	
					$("#Thomas").mouseleave(
						function () {
							//$("#selector_info").text("");
							$(this).css("color","lightgray");
						}
					);
					$("#Batalha").mouseenter(
						function () {
							getContent("Batalha");
							$(this).css("color","92B3FF");
						}
					);	
					$("#Batalha").mouseleave(
						function () {
							//$("#selector_info").text("");
							$(this).css("color","lightgray");
						}
					);
					$("#Fischer").mouseenter(
						function () {
							getContent("Fischer");
							$(this).css("color","92B3FF");
						}
					);	
					$("#Fischer").mouseleave(
						function () {
							//$("#selector_info").text("");
							$(this).css("color","lightgray");
						}
					);
					$("#Xavier").mouseenter(
						function () {
							getContent("Xavier");
							$(this).css("color","92B3FF");
						}
					);	
					$("#Xavier").mouseleave(
						function () {
							//$("#selector_info").text("");
							$(this).css("color","lightgray");
						}
					);
				}
			);
			
			$("#team_option").mouseleave(
				function() {
					/*$("#selector_info").text("");*/
					/*$(this).css("color","lightgray");	*/		
				}
			);
			
			$("#contact_option").mouseenter(
				function() {
					$("#landing_bar").css("border-bottom","2px solid lightgray");
					$(".landing_option").css("color","lightgray");
					$(this).css("color","#92B3FF");	
					$("#selector").html("<ul><li id='team_email'>Email</li></ul>");
					$("#selector_info").text("");
					getContent("Email");
					$("#team_email").mouseenter(
						function(){
							$(this).css("color","#92B3FF");
						}	
					);
					$("#team_email").mouseleave(
						function(){
							$(this).css("color","lightgray");
							/*$("#selector_info").text("");*/
						}	
					);
				}
			);
			
			$("#contact_option").mouseleave(
				function() {
					/*$("#selector_info").text("");
					$(this).css("color","lightgray");	*/		
				}
			);
			
			$("#job_option").mouseenter(
				function() {
					$("#landing_bar").css("border-bottom","2px solid lightgray");
					$(".landing_option").css("color","lightgray");
					$(this).css("color","#92B3FF");
					$("#selector").html("<ul><li id='job_sd'>Web Developer</li> <li id='job_uid'>UI Designer</li> </ul>");
					$("#selector_info").text("");
					$("#job_sd").mouseenter(
						function () {
							getContent("Web_Developer")
							$(this).css("color","92B3FF");
						}
					);	
					$("#job_sd").mouseleave(
						function () {
							//$("#selector_info").text("");
							$(this).css("color","lightgray");
						}
					);
					$("#job_uid").mouseenter(
						function () {
							getContent("UI_Designer");
							$(this).css("color","92B3FF");
						}
					);	
					$("#job_uid").mouseleave(
						function () {
							//$("#selector_info").text("");
							$(this).css("color","lightgray");
						}
					);		
				}
			);
			
			$("#job_option").mouseleave(
				function() {				
				}
			);
		
			
			$("#interactive_wrapper").mouseleave(
				function() {
					$(".landing_option").css("color","lightgray");
					$("#selector").html("");
					$("#selector_info").text("");
					$("#landing_bar").css("border-bottom","0px solid lightgray");
				}		
			);
		}
	);
	</script>
	
	<script>
		function follow_button_clicked (){
			$.post("test_insert.php", {email: $("#follow_email").val() });
			$("#follow").remove();
			$("#follow_bar").text("Thank you for your support!");
		}
	</script>
</head>
<body>
	
	<div id="landing_wrapper">
		<div id="main">
			<div id="login_logo">
				<img src="logo.png">
			</div>
			<div id="follow_bar">
				<form id="follow">
					<input id="follow_email" class="question_input" type="text" name="follow_email" value="Email"> <a href="#" class="mingleButton" onclick="follow_button_clicked()">Follow Us</a>
				</form>
			</div>
			<div id="interactive_wrapper"> 
				<div id="landing_bar">
					<div class="landing_option" id="team_option"> team </div> 
					<div class="landing_option" id="job_option"> jobs </div> 
					<div class="landing_option" id="contact_option"> contact </div>
				</div>  
				<div id="option_content">
					<div id="selector">
					</div>
					<div id="selector_info">
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>