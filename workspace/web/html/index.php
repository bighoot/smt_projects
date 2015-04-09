<?php 
/* Short and sweet */
define('WP_USE_THEMES', false);
require('./blog/wp-blog-header.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Strongside Volleyball Leagues</title>
	<meta name="description" content="">
	<meta name="author" content="Chris Roberton">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/responsivemobilemenu.css">
	<link rel="stylesheet" href="stylesheets/flexslider.css">
	<link rel="stylesheet" href="stylesheets/prettyPhoto.css">
	<link rel="stylesheet" href="javascripts/jqueryui/jquery-ui.css">
	<link rel="stylesheet" href="javascripts/jqueryui/jquery-ui.structure.css">
	<link rel="stylesheet" href="javascripts/jqueryui/jquery-ui.theme.css">
	
	<!-- JS
  ================================================== -->
	
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="javascripts/responsivemobilemenu.js"></script>
	<script type="text/javascript" src="javascripts/jquery.flexslider.js"></script>	
	<script type="text/javascript" src="javascripts/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="javascripts/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="javascripts/jquery.quicksand.js"></script> 
	<script type="text/javascript" src="javascripts/script.js"></script>
	<script type="text/javascript" src="javascripts/jqueryui/jquery-ui.js"></script> 
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	
	<!-- SMOOTH SCROLLING -->
	<script type="text/javascript" src="javascripts/smoothscroll.js"></script>
	
	<!-- Tables -->
	<script type="text/javascript" src="javascripts/jquery.dataTables.js"></script>
	
	<link rel="stylesheet" href="stylesheets/jquery.dataTables.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/logos/ssvb_primary_logo.png">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	<script type="text/javascript">
		$(document).ready(function() {
		
			
			
			$("#tablepress-1").DataTable( {
				"columns": [
					{ "width": "13%" },
					{ "width": "17%" },
					{ "width": "14%" },
					{ "width": "14%" },
					{ "width": "9%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "13%" }
				],
				"pageLength": 8,
				"autoWidth": false,  					
    			"aaSorting": []
			}); 
				
			$(".schedule_table").DataTable(
				{
					"pageLength": 12,
  					"autoWidth": false,
  					/* Disable initial sort */
        			"aaSorting": [],
        			"lengthChange": false,
        			"bSort" : false,
  					"stripeClasses": [ 'strip1', 'strip2'],
  					"paging":false,
  					"searching":false,
  					"info":false
				}); 
				
			$("#schedule_accordion").accordion(
				{
					"heightStyle": "content",
				}
			);	
				
				
			$("#contact_form_send").click(function() {
				console.debug("Contact form send button clicked.");
				
				var contact_name = encodeURIComponent($('#name').val());
				var contact_email = encodeURIComponent($('#email').val());
				var contact_phone = encodeURIComponent($('#phone').val());
				var contact_message = encodeURIComponent($('#message').val());
				var contact_purpose = encodeURIComponent($("input:radio[name=purpose]").val());
				
				//console.debug(contact_name);
				//console.debug(contact_email);
				//console.debug(contact_phone);
				//console.debug(contact_message);
				//console.debug(contact_purpose);
				 
				var query_string = '?name=' + contact_name + '&email=' + contact_email + '&phone=' + contact_phone + '&message=' + contact_message + '&purpose=' + contact_purpose;
				
				//console.debug(query_string);
				
				$.get('./php/comment_sender.php' + query_string, function( data ) {
  					$("#results").html(data);
  					console.debug("Message sent to server.");	
  					console.debug(data);		
				});
			});
		}); 		
      
	</script>
	


</head>
<body>
<!-- Primary Page Layout
================================================== -->
<div class="top">
    <a href="#home"><img id="rotate" src="images/top.png" width="70" height="70" alt="top" /></a>
</div>

<header>
	<div class="container nav" id="home">
		<div class="one columns logo center">
			<img src="./images/logos/ssvb_primary_logo_alternate.png" height="120px" alt="logo">
		</div>
		<div class="sixteen columns navigation">
			<nav>
				<div class='rmm' data-menu-style = "minimal">
					<ul>
						<li><a href='#slider'>HOME</a></li>
						<li><a href='#leagues'>LEAGUES</a></li>
						<li><a href='#schedules'>SCHEDULES</a></li>
						<li><a href='#tourneys'>TOURNEYS</a></li>
						<li><a href='#clinics'>CLINICS</a></li>
						<li><a href='#locations'>LOCATIONS</a></li>
						<li><a href='#registration'>REGISTER</a></li> 
						<li><a href='#contact'>CONTACT</a></li> 
					</ul>
			</div>
			</nav>
		</div>
	</div>     
</header>

<div class="outer main" id="main">
	<div class="inner">
		<div class="flexslider">
			<ul class="slides">
				<li style="height:100%;">
					<div class="sixteen columns slide1">
						<span class="black">
							<span style="font-style:italic;font-size:70px;">S</span><span style="font-size: 50px;">TRONG</span>
							<span style="font-style:italic;font-size:70px;">S</span><span style="font-size: 50px;">IDE</span>
							<span style="font-style:italic;font-size:70px;">V</span><span style="font-size: 50px;">OLLEYBALL</span>
						</span>						
						<p class="black center">Denver, Colorado
						<br/>Elev 5280 ft</p>
						<hr>
						<p class="center"><img src="images/logos/ssvb_primary_logo.png" height="250px" alt="logo big"></p>
					</div>
				</li>				
				<li>
					<div class="sixteen columns slide2 slidesWithBorder">
						<p class="center"><img src="images/photos/11009142_1589467167966452_663408066738161182_n.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide3 slidesWithBorder">
						<p class="center"><img src="images/photos/11081145_1589467364633099_8832557589917620133_n.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide4 slidesWithBorder">
						<p class="center"><img src="images/photos/20150219_114758.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide4 slidesWithBorder">
						<p class="center"><img src="images/photos/10999751_1589467387966430_8612254248560784745_o.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide4 slidesWithBorder">
						<p class="center"><img src="images/photos/1518040_1589470484632787_5085974208756801430_n.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide4 slidesWithBorder">
						<p class="center"><img src="images/photos/10150597_1589100204669815_1924849633645716432_n.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide4 slidesWithBorder">
						<p class="center"><img src="images/photos/10155233_1589466554633180_567753888611222918_n.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide4 slidesWithBorder">
						<p class="center"><img src="images/photos/11069909_1589467441299758_2804336521414738746_n.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
				<li>
					<div class="sixteen columns slide4 slidesWithBorder">
						<p class="center"><img src="images/photos/20150219_113839.jpg" height="400px" alt="logo big"></p>
					</div>
				</li>
			</ul>
	     </div>
	</div>
</div>

<div class="outer leagues" id="leagues">
    <div class="inner">
        <div class="intro">
			<p class="black center" style="font-weight:400;"><img src="images/logos/ssvb_skyline_logo.png" height="75px" alt="logo small" style="position: relative; top: 10px;">&nbsp;&nbsp;&nbsp;
				<span style="font-style:italic;font-size:70px;">C</span><span style="font-size: 50px;">URRENT</span>
				<span style="font-style:italic;font-size:70px;">V</span><span style="font-size: 50px;">OLLEYBALL</span>
				<span style="font-style:italic;font-size:70px;">L</span><span style="font-size: 50px;">EAGUES</span>
			</p>
			<hr>
			<p class="black center">Details on all SSVB Leagues are below.  Check back frequently as more leagues are added periodically.</p>         
		</div>
		<div class="content">
			<?php tablepress_print_table( 'id=1&use_datatables=true&print_name=false' ); ?>		
		</div>		        
    </div>
</div>

<div class="outer schedules" id="schedules">
	<div class="inner" style="margin-bottom:25px;">
		<div class="intro">
			<p class="black center" style="font-weight:400;"><img src="images/logos/ssvb_secondary_logo.png" height="75px" alt="logo small" style="position: relative; top: 10px;">&nbsp;&nbsp;&nbsp;
				<span style="font-style:italic;font-size:70px;">L</span><span style="font-size: 50px;">EAGUE</span>
				<span style="font-style:italic;font-size:70px;">S</span><span style="font-size: 50px;">CHEDULES</span>				
			</p>
			<hr>
			<div id="schedule_accordion">			
				<h3 class="accordion_section_header">Tuesday Coed Fours</h3>
				<?php tablepress_print_table( 'id=2&use_datatables=true&print_name=false' ); ?>
				<h3 class="accordion_section_header">Tuesday Coed Sixes</h3>
				<?php tablepress_print_table( 'id=3&use_datatables=true&print_name=false' ); ?>
				<h3 class="accordion_section_header">Wednesday Coed Fours</h3>
				<?php tablepress_print_table( 'id=4&use_datatables=true&print_name=false' ); ?>
				<h3 class="accordion_section_header">Wednesday Coed Sixes</h3>
				<?php tablepress_print_table( 'id=5&use_datatables=true&print_name=false' ); ?>
				<h3 class="accordion_section_header">Thursday Coed Fours</h3>
				<?php tablepress_print_table( 'id=6&use_datatables=true&print_name=false' ); ?>
				<h3 class="accordion_section_header">Thursday Coed Sixes</h3>
				<?php tablepress_print_table( 'id=7&use_datatables=true&print_name=false' ); ?>
				<h3 class="accordion_section_header">Sunday Mens Doubles</h3>
				<?php tablepress_print_table( 'id=8&use_datatables=true&print_name=false' ); ?>
				<h3 class="accordion_section_header">Sunday Womens Doubles</h3>
				<?php tablepress_print_table( 'id=9&use_datatables=true&print_name=false' ); ?>
			</div>
		</div>         	
	</div>	
</div>

<div class="outer tourneys" id="tourneys">
	<div class="inner" style="margin-bottom:25px;">
		<div class="intro">
			<p class="black center" style="font-weight:400;"><img src="images/logos/ssvb_skyline_logo.png" height="75px" alt="logo small" style="position: relative; top: 10px;">&nbsp;&nbsp;&nbsp;
				<span style="font-style:italic;font-size:70px;">T</span><span style="font-size: 50px;">OURNAMENTS</span>
			</p>
			<hr>
			<h3 class="black center">Monday Nights</h3>
			<p class="black center">Rotating pairs tournament 6pm-10pm, round-robin, $10/person, weather permitting</p>
		</div>         	
	</div>
</div>

<div class="outer clinics" id="clinics">
	<div class="inner" style="margin-bottom:25px;">
		<div class="intro">
			<p class="black center" style="font-weight:400;"><img src="images/logos/ssvb_secondary_logo.png" height="75px" alt="logo small" style="position: relative; top: 10px;">&nbsp;&nbsp;&nbsp;
				<span style="font-style:italic;font-size:70px;">C</span><span style="font-size: 50px;">LINICS</span>
			</p>
			<hr>
			<h3 class="black center">Friday Nights</h3>
			<p class="black center">Open Drop-In Clinics, $5/person, from 630 until close, weather permitting</p>
			<h3 class="black center">Saturdays</h3>
			<p class="black center">Individual Clinics, $30/person for 1.5 hours of one-on-one instruction</p>
			<p class="black center">Team Clinics, $50/team for 1.5 hours of team-format instruction</p>
			<p class="black center">By Appointment Only (See Contact Form below)</p>
		</div>         	
	</div>
</div>

<!-- GOOGLE MAP -->
<div class="outer locations" id="locations">
	<div class="inner" style="margin-bottom:25px;">
		<div class="intro">
			<p class="black center" style="font-weight:400;"><img src="images/logos/ssvb_skyline_logo.png" height="75px" alt="logo small" style="position: relative; top: 10px;">&nbsp;&nbsp;&nbsp;
				<span style="font-style:italic;font-size:70px;">O</span><span style="font-size: 50px;">UR</span>
				<span style="font-style:italic;font-size:70px;">L</span><span style="font-size: 50px;">OCATIONS</span>				
			</p>
			<hr>
			<p class="black center">Come join us for games, drinks, and fun.</p>
		</div>         	
	</div>
	<div class="inner secondary" style="margin-bottom:25px;">
		<div id="map-canvas" style="width:100%;height:450px;">		
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3069.4461111650844!2d-104.934394!3d39.707156!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7c2b751ebadd%3A0x486dc886f8aae848!2s4500+E+Virginia+Ave%2C+Denver%2C+CO+80246!5e0!3m2!1sen!2sus!4v1424651474218" style="border:0; width:100%; height:450px;"></iframe>	
		</div>
	</div>	
</div>
<!-- GOOGLE MAP END -->

<div class="outer registration" id="registration">
	<div class="inner" style="margin-bottom:25px;">
		<div class="intro">
			<p class="black center" style="font-weight:400;"><img src="images/logos/ssvb_secondary_logo.png" height="75px" alt="logo small" style="position: relative; top: 10px;">&nbsp;&nbsp;&nbsp;
				<span style="font-style:italic;font-size:70px;">R</span><span style="font-size: 50px;">EGISTRATION</span>
			</p>
			<hr>
			<p class="black center">This is a placeholder for a league registration form.</p>
		</div>         	
	</div>
</div>

<div class="outer contact" id="contact">
	<div class="inner">
		<div class="intro">
			<p class="black center" style="font-weight:400;"><img src="images/logos/ssvb_skyline_logo.png" height="75px" alt="logo small" style="position: relative; top: 10px;">&nbsp;&nbsp;&nbsp;
				<span style="font-style:italic;font-size:70px;">G</span><span style="font-size: 50px;">ET IN</span>				
				<span style="font-style:italic;font-size:70px;">T</span><span style="font-size: 50px;">OUCH</span>
			</p>
			<hr>
			<p class="black center">For further information regarding open leagues or any of our other programs, please fill out the questionnaire below.</p>
		</div>
        <div class="container">
			<div class="two-thirds column form">
				<form action="#" id="commentForm" method="post" name="commentForm">
					<fieldset class="black center" style="font-weight:400;text-align:left;">
    					<legend>Purpose</legend>
						<input type="radio" name="purpose" value="general" checked style="height:15px;postition:relative;vertical-align:middle;margin-top: -1px;"/><span style="font-size:14px;">I need general information</span><br/>
						<input type="radio" name="purpose" value="appointment" style="height:15px;postition:relative;vertical-align:middle;margin-top: -1px;"/><span style="font-size:14px;">I would like to request an appointment for a clinic</span><br/>
						<input type="radio" name="purpose" value="imafreeagent" style="height:15px;postition:relative;vertical-align:middle;margin-top: -1px;"/><span style="font-size:14px;">I'm a free agent looking for a team</span><br/>
						<input type="radio" name="purpose" value="needafreeagent" style="height:15px;postition:relative;vertical-align:middle;margin-top: -1px;"/><span style="font-size:14px;">My team needs a free agent</span><br/>
					</fieldset>
					<input class="required name" id="name" name="name" type="text" value="Name*" onFocus="if(this.value=='Name*') this.value=''" onblur="if(this.value=='') this.value='Name*'"/>
					<input class="required email" id="email" name="email" type="text" value="Email*" onFocus="if(this.value=='Email*') this.value=''" onblur="if(this.value=='') this.value='Email*'"/>
					<input class="phone" id="phone" name="phone" type="text" value="Phone" onFocus="if(this.value=='Phone') this.value=''" onblur="if(this.value=='') this.value='Phone'"/>										
					<textarea class="required message" id="message" name="message" onFocus="if(this.value=='Message*') this.value=''" onblur="if(this.value=='') this.value='Message*'">Message*</textarea>
					<div id="contact_form_send" class="btn" style="float:left;">SEND</div>
					<div class="content black" style="float:right;">Required fields are marked *</div>
				</form>
			</div>
			<div class="one-third column omega coninfo">
				<h4 class="left black">Our Contact Information:</h4>
				<p class="black">Strong Side Volleyball is owned and managed by Brian Coleman</p>
				<ul class="content">					
					<li>720.935.9839</li>
					<li><a href="mailto:">strongside32@gmail.com</a></li>
				</ul>
				<br/><br/><p id="results" class="black center" style="font-weight:400;text-align:left;"></p>				
			</div>
		</div>
   </div>
</div>

<footer>
	<div>
		<div class="sixteen columns copyright center">         
			<p class="white center light">Copyright 2015 <a href="http://www.state-machine.technology">State Machine Technology</a> all rights reserved</p>
		</div>
	</div>
</footer>

         


	

<!-- End Document
================================================== -->

<script type="text/javascript">
  $(window).load(function() {
     $('.flexslider').flexslider({
        animation: "slide"
      });
});
</script>



<!-- pretty photo 
	<script>
		$(document).ready(function(){
			$("a[class^='prettyPhoto']").prettyPhoto({
				social_tools: false,
				theme: 'light_square'
			});
		});
	</script>
	-->
	
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto({
				social_tools: false,
				theme: 'light_square'
			});
		});
	</script>

</body>
</html>