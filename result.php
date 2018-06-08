<?php
session_start();


?>


<?php 
  
   $conn = mysql_connect('localhost','root','');
      if(!$conn){
        die('Error in Db Connection').mysql_error();
      }
      else{
          $dbconnect = mysql_select_db('quiz');
          if(!$dbconnect){
              die('Error in Db Selection').mysql_error();
          }
          else{
            //echo "Database has been selected";
          }
          
      }
      
      
if(!empty($_SESSION['surname'])){
  
      
    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0;
    $keys='';
    $output = array();
    if(empty($_POST)){
      echo "POST VARIABLE IS EMPTY";
    }
    if(isset($_GET['order'])){
      $length = sizeof($_GET['order']);
      echo $length.$_GET['order'];

      for($i=0; $i< $length; $i++){
        parse_str($_GET['order'][$i],$output);
         $keys.=array_keys($output);

      }
         
        $order=join(",",$keys);
    }
/*
      if(isset($_POST[$result['Id']]) && !empty($_POST[$result['Id']]) && empty($_POST)){
          $_POST =$_POST[$result['Id']];
            print_r($_POST);
          echo $_POST[$result['Id']];
      }*/
    
      else if(!empty($_POST)){
        $keys=array_keys($_POST);
        $order=join(",",$keys);
      }  
        
        

   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;

   $response=mysql_query("SELECT Id,answer 
                          FROM questions 
                          WHERE Id IN($order)
                          ORDER BY FIELD(Id,$order) ")   
                          or die(mysql_error());

   while($result=mysql_fetch_array($response)){
    if(isset($_POST[$result['Id']])){
       if($result['answer']==$_POST[$result['Id']]){
               $right_answer++;
           }else if($_POST[$result['Id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
   }
}
   $name=$_SESSION['surname'];  
   mysql_query("UPDATE users SET Score='$right_answer' WHERE Username='$name'");
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CACA Quiz Result Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="./font-awesome/css/font-awesome.css">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../assets/js/html5shiv.js"></script>
        <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
          .container {
              margin-top: 20px;
            }
      .linko a i{
      font-size: 1.5em;
      padding: 15px;
      color: white;
    }

    footer {
    position: fixed;
    height: 90px;
    bottom: -50px;
    width: 100%;
    background-color: black;
    padding-top: 40px;
    border: 2px solid blue;



}
.navbar-link:hover{
  text-decoration: none;
}
        </style>
    </head>
    <body>
        <header>
            
        </header>
         <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="index.html" class="navbar-brand">CACA CBT Result Page</a>
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger-navigation">
                   <span class="sr-only">Navigation toggle</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
          </div>
          <div class="collapse navbar-collapse" id="hamburger-navigation">
             <div class="navbar-text navbar-right">
               <a class="navbar-link" href="index.php?msg= Thanks for taking this test.We hope to see you do great things">
                 Logout
               </a>
             </div>
             <ul class="nav navbar-nav" role="menu">
               <li><a href="#" class="active">Current Page</a><span class="sr-only">current</span></li>
               <li><a href="#">Link</a></li>
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

          <div class="row align-items-center">
                <h1 class="text-center">Hello 
                                 <?php 
                                if(!empty($_SESSION['surname'])){
                                    echo strtoupper($_SESSION['surname']).$result['answer'];
                                }?>

                          
             </h1>
          </div>  
             

            <div class="row align-items-center"> 
                    <div class='col-lg-offset-5 col-sm-offset-4 col-xs-6 col-xs-offset-3 result-logos'>
                            
                            <img src="img/result.png" class="img-responsive"/>
                    </div>    
           </div>  
           <hr>   
           
            <div class="row align-items-center"> 
              
                 <div class="col-xs-6 col-xs-offset-3 col-sm-3 col-sm-offset-4 col-lg-offset-5 col-lg-4 "> 
                    
                       <div>
                        <p>Total no. of right answers : <span class="answer"><?php echo $right_answer;?></span></p>
                        <p>Total no. of wrong answers : <span class="answer"><?php echo $wrong_answer;?></span></p>
                        <p>Total no. of Unanswered Questions : <span class="answer"><?php echo $unanswered;?></span></p>
                        <p> Total Score : <span class="answer"><?php $res = $_SESSION['questionTotal'];
                        echo "<strong style='font-size:1.4em;font-family:cursive;'>".round(($right_answer/$res) *400).'/400'."</strong>";
                          
                        ?></span></p>                   
                       </div> 

                   </div>

           </div>      
            
        </div>
        <!--Footer-->
      <footer class="navbar fixed-bottom navbar-inverse bg-faded">
        
        
          <div class="container">
                  <!--Grid row-->
                  <div class="row py-4 d-flex align-items-center">
      
                      <!--Grid column-->
                      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                          <h5 style="font-weight: bold;color: white; margin-top: -5%; " class="mb-0 white-text">Get connected with us on social networks!</h5>
                      </div>
                      <!--Grid column-->
      
                      <!--Grid column-->
                      <div class="col-md-6 col-lg-7 text-center text-md-right linko" style="margin-top:-3%; " >
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

                 <!--Footer Links-->
          <div class="container mt-5 mb-4 text-center text-md-left">
              <div class="row mt-3" style="color: black;margin-top:3%;">
      
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
          <!--/.Footer Links-->
      
          <!-- Copyright-->
          <div class="footer-copyright py-3 text-center">
              <div class="container-fluid">
                  &copy;2018 Copyright: <a href="#"><strong> cacatutorials.com</strong></a>
              </div>
          </div>
          
        </div>
    </footer>
                        
      <!--/.Footer-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/jquery.validate.min.js"></script>

    </body>
</html>


 