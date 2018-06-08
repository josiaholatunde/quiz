<?php
//Connect to the database
session_start();

	$errmsg='';
	$msg='';

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


	if(isset($_POST['login'])){
		if(!empty($_POST['username']) && !empty($_POST['category'])){
			$surname= $_POST['username'];
			$cat = $_POST['category'];

			$_SESSION['surname'] = $surname;
			header("location:info.php?pid=$cat");
		}else{
			$msg = "Empty Surname Field or Subject Combination...kindly fill the required field"; 
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
  		margin-top: 50px;
  		padding: 10px;
  	}
  	body{
  		background: url('img/students2.jpg') no-repeat;
  		background-size: cover;
  	}
  	.jumbotron{
        opacity: 0.6;
      }
  	.form-group label{
  		color: white;
  		font-family: sans-serif;
  		font-size: 1.5em;
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
	   
	      		<a href="index.php" class="navbar-brand">CACA Tutorial CBT Center</a>
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
	<div class=" jumbotron"><h1 >Welcome to CACA JAMB UTME Computer Based Test Center</h1>
			<marquee behavior="alternate">academic excellence is our watchword...</marquee>
	</div>
	
	

		<form method="post" class="form-horizontal" action="index.php">
				<?php if(isset($_GET['errmsg'])){echo "<div class='alert alert-danger uni col-md-3'style='text-align: center;padding: 10px;'>".$_GET['errmsg']."</div>";} ?>
				<?php if(isset($_GET['msg'])){echo "<div class='alert alert-success uni'style='text-align: center;padding: 10px;'>".$_GET['msg']."</div>";} ?>
				
			  <div class="form-group">
			    <label for="username" class="control-label col-md-3">Surname:</label>
			    <div class="col-md-6">
			      <div class="input-group">
			        <div class="input-group-addon">
			          <span class="glyphicon glyphicon-user"></span>
			        </div>
			        <input type="text" class="form-control" name="username" id="username" value="" />
			      </div>
			    </div>
			  </div>


			  	<div class="form-group">
			  		<label for="Select2" class="control-label col-md-3">Subject Combination:</label>
			  		<div class="col-md-6">
			  		<select name="category" id="Select2" class=" form-control col-md-6">
					<option selected value="null">Subject Category</option>
				    <option value="1">English,Mathematics,Physics,Chemistry</option>
				    <option value="2">English,Biology,Physics,Chemistry</option>
				     <option value="3">English,Economics,Commerce,Account</option>
				     <option value="4">English,Mathematics,Economics,Commerce</option>
				     <option value="5">English,Government,Literature,CRS</option>
				     <option value="6">English,Government, Literature,Economics</option>
				     <option value="7">English,Government,Economics,Mathematics</option>

					  </select>
			  		</div>
					
				</div>
			  	
			  
			  <div class="form-group">
			    <input type="submit" name="login" value="LOGIN" class="btn btn-primary col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-md-2"/>
			  </div>
		</form>
	</div>
					
				
				
 <!--Footer-->
      <footer class="page-footer font-small blue-grey lighten-9 pt-0">
      
          <div style="background-color: black;opacity: 0.5;">
              <div class="container">
                  <!--Grid row-->
                  <div class="row py-4 d-flex align-items-center">
      
                      <!--Grid column-->
                      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                          <h5 style="font-weight: bold;color: white;" class="mb-0 white-text">Get connected with us on social networks!</h5>
                      </div>
                      <!--Grid column-->
      
                      <!--Grid column-->
                      <div class="col-md-6 col-lg-7 text-center text-md-right linko" >
                          <!--Facebook-->
                          <a class="fb-ic ml-0"><i class="fa fa-facebook white-text mr-lg-4"> </i></a>
                          <!--Twitter-->
                          <a class="tw-ic"><i class="fa fa-twitter white-text mr-lg-4"> </i></a>
                          <!--Google +-->
                          <a class="gplus-ic"><i class="fa fa-google-plus white-text mr-lg-4"> </i></a>
                          <!--Linkedin-->
                          <a class="li-ic"><i class="fa fa-linkedin white-text mr-lg-4"> </i></a>
                          <!--Instagram-->
                          <a class="ins-ic"><i class="fa fa-instagram white-text mr-lg-4"> </i></a>
                      </div>
                      <!--Grid column-->
      
                  </div>
                  <!--Grid row-->
              </div>
          </div>
      
          <!--Footer Links-->
          <div class="container mt-5 mb-4 text-center text-md-left">
              <div class="row mt-3" style="color: white">
      
                  <!--First column-->
                  <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                      <h6 class="text-uppercase font-weight-bold"><strong>CACA CBT Tutorial Days</strong></h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p>  Mondays: 5pm-7pm<br/> Wednesdays:5pm-7pm <br/>Fridays: 5pm-7pm</p>
                  </div>
                  <!--/.First column-->
      
                  <!--Second column-->
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                      <h6 class="text-uppercase font-weight-bold"><strong>Our Services</strong></h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p><a href="#!">Compter Based Test Training</a></p>
                      <p><a href="#!">Tutorial Days</a></p>
                      <p><a href="#!">Why You should enroll</a></p>
                      <p><a href="#!">Value Added Services</a></p>
                  </div>
                  <!--/.Second column-->
      
                  <!--Third column-->
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                      <h6 class="text-uppercase font-weight-bold"><strong>Useful links</strong></h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p><a href="#!">Your Account</a></p>
                      <p><a href="#!">Become an Affiliate</a></p>
                      <p><a href="#!">Shipping Rates</a></p>
                      <p><a href="#!">Help</a></p>
                  </div>
                  <!--/.Third column-->
      
                  <!--Fourth column-->
                  <div class="col-md-4 col-lg-3 col-xl-3">
                      <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
                      <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                      <p><i class="fa fa-home mr-3"></i> Adebayo Road, Ado Ekiti, Nigeria</p>
                      <p><i class="fa fa-envelope mr-3"></i> cacatutorials@gmail.com</p>
                      <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                      <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
                  </div>
                  <!--/.Fourth column-->
      
              </div>
          </div>
          <!--/.Footer Links-->
      
          <!-- Copyright-->
          <div class="footer-copyright py-3 text-center">
              <div class="container-fluid">
                  © 2018 Copyright: <a href="#"><strong> cacatutorials.com</strong></a>
              </div>
          </div>
          <!--/.Copyright -->
      
      </footer>
      <!--/.Footer-->
                      	

		

	

</body>
</html>