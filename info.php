<?php
//Connect to the database
session_start();

	$errmsg='';
	$msg='';
	$category='';

$conn = mysql_connect('localhost','root','');
	if(!$conn){
		die("Not able to Connect to Database!".mysql_error());
	}
	else{
			//echo "Successful Connection to Database!";
	// Selects database
			$dbselect = mysql_select_db('quiz');
			if(!$dbselect){
				die('Not able to select to Database'.mysql_error());
			}
			else{
				//echo "Database has been selected";
			}
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Area</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="./font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="mainstyle2.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <style type="text/css">
  	.container{
  		padding: 20px;
  		margin-top: 30px;
  		font-family: cursive;

  	}
  		.linko a i{
  		font-size: 1.5em;
  		padding: 10px;

  	}
  </style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	      	<div class="navbar-header">
	   
	      		<a href="vote.php" class="navbar-brand">CACA Tutorial CBT Center</a>
				       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger-navigation">
				           <span class="sr-only">Navigation toggle</span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
			         </button>
	      	</div>
	      	<div class="collapse navbar-collapse" id="hamburger-navigation">
		         <div class="navbar-text navbar-right">
		           <a class="navbar-link" href="URL here">
		             Follow us!
		           </a>
		         </div>
		         <ul class="nav navbar-nav" role="menu">
		           <li><a href="#" class="active">Current Page</a><span class="sr-only">current</span></li>
		           <li><a href="./Admin/login.php">Admin Login</a></li>
		           <li class="dropdown">
		             <a class="dropdown-toggle" role="button" data-toggle="dropdown">Dropdown<span class="caret" /></a>
		             <ul class="dropdown-menu">
		               <li><a href="#">Option one</a></li>
		               <li><a href="#">Option two</a></li>
		             </ul>
		           </li>
		         </ul>
       		</div>

	        
	      </div>
    </nav>


	<div class="container">
		<h2>Hello <?php echo strtoupper($_SESSION['surname']).",  "; ?>Please Read through thoroughly before taking this test</h2>
	<div class=" jumbotron">
		<section>This test is a <strong>40 minutes</strong> test on the following subjects: 
			<?php

			 if(isset($_GET['pid'])){
    				$category = $_GET['pid'];
				}

			if($category==1){
				echo "<strong>English, Mathematics, Physics, Chemistry</strong> ";
			}else if($category==2){
				echo "<strong>English, Biology, Physics, Chemistry</strong>";
			}else if($category==3){
				echo "<strong>English,Economics,Commerce,Account</strong>";
			}else if($category==4){
				echo "<strong>English,Mathematics,Economics,Commerce</strong>";
			}else if($category==5){
				echo "<strong>English,Government,Literature,CRS</strong>";
			}else if($category==6){
				echo "<strong>English,Government, Literature,Economics</strong>";
			}else if($category==7){
				echo "<strong>English,Government,Economics,Mathematics</strong>";
			}

     			
			  ?>
			  You should pay attention to the following:
			  <ol>
			  	<li>Subject area: where the subject taken is located.</li>
			  	<li>The Time (duration) for the examination</li>
			  	<li>The remaining time you have for the examination.</li>
			  	<li>We advice all candidates sitting for the examination, to ALWAYS check the time lapse and time remaining to be able to complete the exams on time, been aware of the remaining time, will surely help you answer questions faster.</li>
			  	<li>Instruction area: This is a place, where candidates can go and check the instructions pertaining the exams.</li>
			  </ol>
			    
		<div class="text-center">	<h3>Basic Uses of the Mouse When Writing</h3><img src="img/mouseUsage1.png"/></section>
					<ol>
						<li>You should make sure, that you put the heel of your hand on the table in front of the mouse. Then Hold the mouse between thumb and the ring fingers.</li>
						<li> You should also ensure that you put your index finger on the left mouse button.</li>
					<li> Please, make sure, that you move the tip of the arrow onto the underlined two. The arrow will become a pointing finger on the computer screen.</li>
					 <li>Take note that the arrow automatically becomes a pointing finger, to answer the questions, simply hold the mouse still and lightly click the left mouse button with your index finger or any finger that makes it easier for you!</li>
					 </ol>

			Our goal, is to get you, to use the mouse easily and very fast to rightfully answer all questions.

			To successfully answer CBT questions, you’re required to slide the computer mouse to the running mouse. Slide the mouse sideways.
			Do not turn it..
			Then, click on the running mouse.

			Radio Buttons – What Are Radio Buttons?
			The circles below are radio buttons, which is always used in computer examinations, also implemented in JAMB CBT questions. Do use the below radio buttons as examples. The below buttons will be use as illustrated in the exams panel above, to select the correct answer.
		
				 <a  class="btn btn-primary col-md-offset-5 col-md-2" href="smart.php?pid=<?php if(isset($_GET['pid'])){
				 		$category = $_GET['pid'];
				 		echo $category;
				 } ?>"> START TEST</a>
			</div>
		</div>
		
	</div>
		
	
	
	

		
			  	
			  
			   
					
				
				
	

		

	

</body>
</html>