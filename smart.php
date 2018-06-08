
<?php 

session_start();

if(!isset($_SESSION['surname'])){
    header('location:login.php?errmsg=YOu must be logged in before you take the test');
}




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
   

$category='';
$imgUrl='';
      if(isset($_GET['pid'])){
    $category = $_GET['pid'];
}

if(!isset($_SESSION['uniqueVariable'])){
  $_SESSION['uniqueVariable']='uni';
   
   } 
 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Responsive Quiz Application Using PHP, MySQL, jQuery, Ajax and Twitter Bootstrap</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="./font-awesome/css/font-awesome.css">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.container {
				margin-top: -20px;
        width: 100%;
			}
      body{
        font-family: cursive,Helvetica,Times;
       }
     
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}

			.hide{display: none;}
      
      .jumbotron{
        color: black;
        word-spacing: 0.6em;
        width: 70%;
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
.jumbotron strong{
  font-size: 1.4em;
}

		</style>
	</head>
	<body>
	    <header>
            
        </header>

        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="index.html" class="navbar-brand">CACA Tutorial CBT Center</a>
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger-navigation">
                   <span class="sr-only">Navigation toggle</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
          </div>
          <div class="collapse navbar-collapse" id="hamburger-navigation">
             <div class="navbar-text navbar-right">
               <a class="navbar-link" href="index.php?msg= Your session has not yet expired">
                 Logout!
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


		<div class="container question">
      <div class="row">
        <h3 style="color:#000000;font-size: 1.6em;" align="center" class="col-md-offset-7">
            Time Left : <span id='timer'></span>
         </h3>
      </div>
      <div class="row"> 
			<div class="col-xs-12 col-sm-8 col-md-10 col-xs-offset-4 col-sm-offset-3 col-md-offset-2">
				<p>
					  <h1>  Welcome <?php echo strtoupper($_SESSION['surname']); ?> to this JAMB UTME CBT Test Preparation</h1>
				</p>
				<hr>
       
				<form name="quiz" class="form-horizontal" role="form" id='login' method="post" action="result.php">
					<?php 
					$res = mysql_query("SELECT * FROM questions WHERE cat_id='$category' ORDER BY Subject,RAND()") or die(mysql_error());
                    $rows = mysql_num_rows($res);
                    $_SESSION['questionTotal'] = $rows;
                   
					$i=1;  echo "<strong style='font-size:1.4em;'>Total Questions:". $rows."</strong>";
                while($result=mysql_fetch_array($res)){?>
                         
                    <?php if($i==1){
                     ?>  

                    <div id='question<?php echo $i;?>' class='cont'>
                      <h4><?php echo $result['Subject']; ?></h4>
                      <?php if($result['imgUrl'] != null){
                                $imgUrl=  $result['imgUrl'];
                                echo "<img src='img/$imgUrl' height='200px' width='620px'/>";
                    } ?>
                    <p class='questions' id="qname<?php echo $i;?>"><div class="jumbotron"><strong>Ques No<?php echo " ". $i?></strong>:<?php echo $result['question_name'];?></div></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(A) <?php echo $result['answer1'];?></span>
                   <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(B) <?php echo $result['answer2'];?></span>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(C) <?php echo $result['answer3'];?></span>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(D) <?php echo $result['answer4'];?></span>
                    <br/>
                    
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/>                                                                      
                    <br/>
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
                    </div>     

                     <?php }else if($i<1 || $i<$rows){?>

                       <div id='question<?php echo $i;?>' class='cont'>
                        <h4><?php echo $result['Subject']; ?></h4>
                         <?php if($result['imgUrl'] != null){
                                $imgUrl=  $result['imgUrl'];
                                echo "<img src='img/$imgUrl' height='200px' width='620px'/>";
                    }
                        
                     ?>
                    <p class='questions' id="qname<?php echo $i;?>"><div class="jumbotron"><strong>Ques No<?php echo " ". $i?></strong>:<?php echo $result['question_name'];?></div></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(A) <?php echo $result['answer1'];?></span>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(B) <?php echo $result['answer2'];?></span>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(C) <?php echo $result['answer3'];?></span>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(D) <?php echo $result['answer4'];?></span>
                    <br/>

                   
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/>                                                                      
                    <br/>
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
                    </div>

                   <?php }else if($i==$rows){?>

                    <div id='question<?php echo $i;?>' class='cont'>
                      <h4><?php echo $result['Subject']; ?></h4>
                       <?php if($result['imgUrl'] != null){
                                $imgUrl=  $result['imgUrl'];
                                echo "<img src='img/$imgUrl' height='200px' width='620px'/>";
                    } ?>
                    <p class='questions' id="qname<?php echo $i;?>"><div class="jumbotron"><strong>Ques No<?php echo " ".$i?></strong>:<?php echo $result['question_name'];?></div></p>
                     <input type="radio" value="1" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(A) <?php echo $result['answer1'];?></span>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(B) <?php echo $result['answer2'];?></span>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(C) <?php echo $result['answer3'];?></span>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/><span>(D) <?php echo $result['answer4'];?></span>
                    <br/>
                    
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['Id'];?>' name='<?php echo $result['Id'];?>'/>                                                                      
                    <br/>

                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <input id='next<?php echo $i;?>' class='next btn btn-success  final' type='submit'>                    </div>
					<?php } $i++;} ?>

				</form>
        </div>
			</div>
		</div>
      
      
        
      
        
        
        
                        

  <?php

if(isset($_POST[1])){ 
   $keys=array_keys($_POST);
   $order=join(",",$keys);

   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;

   $response=mysql_query('SELECT Id,answer FROM questions WHERE Id IN("$order") ORDER BY FIELD(Id,"$order")')   or die(mysql_error());
   $right_answer=0;
   $wrong_answer=0;
   $unanswered=0;
   while($result=mysql_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['Id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }

   }

   echo "right_answer : ". $right_answer."<br>";
   echo "wrong_answer : ". $wrong_answer."<br>";
   echo "unanswered : ". $unanswered."<br>";
}
?>



		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>

		<script type="text/javaScript">
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

     /*$('#question'+1).click(function(){
            var val1 = $(this).val();
            localStorage.setItem('<?php// echo $_SESSION['surname']; ?>value1',val1);
     });
     $(window).on('load',function(){
        var retrieved = localStorage.getItem('<?php// echo $_SESSION['surname']; ?>value1');
        if(retrieved!== null){
          $('input[value="'+retrieved+'"]').click()
      }
      else{
        alert('Retrieved is null');
      }

      });*/
      
    

		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
		     last = parseInt(element.replace(/[^0-9]/g,''));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');

         });

      $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.replace(/[^0-9]/g,''));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });

/*
          $('#question'+nex).click(function(){
            var val1 = $(this).val();
            localStorage.setItem('<?php// echo $_SESSION['surname']; ?>value'+nex,val1);
     });
     $(window).on('load',function(){
        var retrieved = localStorage.getItem('<?php //echo $_SESSION['surname']; ?>value'+nex);
        if(retrieved!== null){
          $('input[value="'+retrieved+'"]').click()
      }
      else{
        alert('Retrieved is null');
      }

      });*/
		 

		
    //Timer Script 
   
    function checkTime(i){
      if(i<10){
        i = "0"+i;
      }
      return i;
    }
    function startTime(){
       var cTime = new Date();
       var h = cTime.getHours();
       var m = cTime.getMinutes();
       var s = cTime.getSeconds();
       // Adds 0 in front of nos less than 10
       m = checkTime(m);
       s = checkTime(s);
       $('#currentTime').html(h+':'+m+':'+s);
       t = setTimeout(startTime,500);
    }
    startTime();

    

    
     

//define your time in second
  var c = localStorage.getItem("<?php echo $_SESSION['surname']; ?>");
    if(c == null){
        c = 2400;
    }

    var t;
    timedCount();

    function timedCount(){

        var hours = parseInt( c / 3600 ) % 24;
        var minutes = parseInt( c / 60 ) % 60;
        var seconds = c % 60;

        var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);


        $('#timer').html(result);
        if(c == 0 || c < 0 )
        {

            window.setTimeout(function(){
              document.forms['quiz'].submit();
            },1000);
          
           /* $("#next<?php echo $i;?>").trigger('submit');
                var formData = $(':input').serialize();
                
                $.ajax({
                      type:'post',
                      url:'result.php',
                      data: formData,
                      success:function(response){
                          alert(response);
                          location.href='result.php?order='+formData;
                      }
                });*/
            
           
            
        }
        c = c - 1;
        localStorage.setItem("<?php echo $_SESSION['surname']; ?>", c);
        t = setTimeout(function()
        {
            timedCount()
        },1000);


    }
//another timer

/*  var start = document.getElementById("start");
var dis = document.getElementById("display");
var finishTime;
var timerLength = 20;
var timeoutID;
$('#timer').html("Time Left: " + timerLength);

if(localStorage.getItem('<?php echo $_SESSION['surname']; ?>')){
    Update();
}
window.onload = function () {
    localStorage.setItem('<?php echo $_SESSION['surname']; ?>', ((new Date()).getTime() + timerLength * 1000));
    if (timeoutID != undefined) window.clearTimeout(timeoutID);
    Update();
}

function Update() {
    finishTime = localStorage.getItem('<?php echo $_SESSION['surname']; ?>');
    var timeLeft = (finishTime - new Date());
    $('#timer').html("Time Left: " + Math.max(timeLeft/1000,0));
  
    if(timeLeft==0 || timeLeft<0){
              var formData = $(':input').serialize();
                $.ajax({
                      type:'post',
                      url:'result.php',
                      data: formData,
                      datatype:html,
                      success:function(response){
                          alert(response);
                          
                      }
                });
    }
    timeoutID = window.setTimeout(Update, 100);
}
*/


		</script>
	</body>
</html>

