<?php
include 'login.php';

$browser = get_browser(null, true);
$browserType = $browser['browser'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
      <title>HSALAH</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/home.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</head>
<body>

                    <!--********************** start nav bar ****************-->
<nav class="navbar  navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <div class="navbar-header">
                  <a class="navbar-brand" href="#" dir='rtl' lang='ar'>حَصَّالَة</a>
                  <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Front Page</a></li>
                  </ul>
                  </div>
                  <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" class="btn btn-info btn-lg"></span> Signup<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="redirectories/InstSignup.php">Instructor</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal" >Student</a></li>
          </ul>
        </li>
                  <li id="logIn"><a href="#"><span class="glyphicon glyphicon-log-in" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1"> Login </span></a></li>
                  </ul>
                  </div>
  </div>
</nav>

                  <!--********************** end nav bar ****************-->

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal" data-toggle="validator" role="form">
       <div class="modal-content">
         <script>
    

          </script>
                <div class="modal-header">
              <h4 class="modal-title"><span id="signupspan">Login</span> Form</h4>
              </div>

        <div class="modal-body">
          
                   <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <input id="text1" type="text"  class="form-control" name="username" placeholder="user name....." required value="<?php if(isset($userName)) echo $userName;?>">
                   </div>
                    
                
        <br>

                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="password" type="password" class="form-control" name="password"   placeholder="Password" required value="<?php if(isset($password)) echo $password;?>">
                  </div>

        </div>
          
        <div class="modal-footer"> <?php if ($browserType == 'Firefox') {echo '
          <a style="color:red;" href="redirectories/index.php">Forget Password</a>
          ';}else {echo 'Forget password feature only allowed on Mozila browser';}?> 
          <button type="submit" class="btn btn-success" name="login">Login</button>   
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
          
      </div>  
            </form>
    </div>
  </div>  
    <!--********************** end login form*****************-->
    
    
    
    
    <!--**********************start student signup form***************-->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <form action="<?php if ($browserType == 'Firefox') echo 'API/QrScanner/index.php';?>"  id="myform" method="post" class="form-horizontal">
      
               <div class="modal-content">
               <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Student's <span>signup</span> Form</h4>
               </div>
               <div class="modal-body">
               <div class="form-group">
               <label class="col-md-6 control-label" for="QR">To Scan QrCode Click -></label>
               <div class="col-md-6"><?php
               if($browserType == 'Firefox'){
               echo '<button id="submitbutton" name="scan" type="submit" class="btn btn-success">Scan Qr Code</button>';
            }else{
              echo 'sorry! you should use a comopatable browser with QrCode scanner i.e(Mozila Firefox)';
              } ?>
               </div>
                </div>
               </div>  
        </form>
    </div>
    </div>  
    <!--********************** end student sign up********************-->
    
    
    
    
    <!--***********start instructor signup******************-->
    </div>
    <!--**********************end signup form***************-->
    
    

    
    <!--********************** start slider******************-->
    <div class="slider2" class="container-fluid">
      <div class="row">
         <div class="row-sn-12">
            <div id="myslider" class="carousel slide" data-ride="carousel">
              
                <ol class="carousel-indicators">
                  <li data-target="#myslider" data-slide-to="0" class="active"></li>
                  <li data-target="#myslider" data-slide-to="1"></li>
                  <li data-target="#myslider" data-slide-to="2"></li>
                </ol>
                
                
                <div id="texttt"class="carousel-inner" role="listbox">
                   <div class="item active">
                       <img src="images/books.jpg" alt="BOOKS"/>
                       <div class="carousel-caption">
                       <h1 style="color:#191d23"> 7sala support way for doing Quizzes and generate results </h1>
                       </div>
                    </div>
                    
                      <div class="item">
                       <img width="100%" src="images/p2.jpg" alt="Professors"/>
                       <div class="carousel-caption">
                       <h1 style="color:#2b4872"> Easy communcation betwwen Instructors and Students</h1>
                       </div>
                    </div>
                    
                    <div class="item">
                       <img width="100%" src="images/p3.jpg" alt="online judge"/>
                       <div class="carousel-caption">
                       <h1 style="color:#77d8d8"> built in online judge to write your code and compete  with your mates, competetions between computer scientsts,contests nevertheless, Doctors can assign problems ;)</h1>
                       </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myslider" roel="button" data-slide="prev">
                 <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                
                
                <a class="right carousel-control" href="#myslider" roel="button" data-slide="next">
                 <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                  
             </div>
          </div> 
        </div>
    </div>
    
    <!--********************** end lsider********************-->
    
    
    
    <!--*****EYAD************** start footer*****************-->
    <section class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h3 class="logo"><a href="#">حَصَّالَة</a></h3>
              <br>
              <ul class="list-unstyled social-list">
                <li><a href="#"><img class="socialMedia" src="icons/1489085056_social-facebook-circle.png"></a></li>
                <li><a href="#"><img class="socialMedia" src="icons/1489085120_twitter.png"></a></li>
                <li><a href="#"><img class="socialMedia" src="icons/1489085185_youtube.png"></a></li>
                <li><a href="#"><img class="socialMedia" src="icons/1489085390_google_circle.png"></a></li>
                <li><a href="#"></a></li>
              </ul>
              <br>
              <a href="#">Home</a> . <a href="#">FAQ</a> . <a href="#">Contact Us</a>
            </div>  
            <div class="col-md-4">
            <h3 class="sitemap">Sitemap</h3>
              <ul class="list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Quizzes</a></li>
                <li><a href="#">Our Judge</a></li>
                <li><a href="#">Regster New Course</a></li>
                <li><a href="#">National compitation</a></li>
              </ul>
              <br><br><br>
              <center><p class="copyrights">All rights not received <span class="copyleft">&copy;</span></p></center>

            </div>
              
            
            <div class="col-md-4">
              <h3 class="visitus">Visit us</h3>
              <br>
              <ul class="list-unstyled visit">
                <li><img class="locationPic" src="icons/maps-placeholder-outlined-tool.png"><span class="title">Helwan Univirsity,<br>Helwan</span></li>
                <li><img class="mailPic" src="icons/mail.png"><a class="mail" href="#"><u>hassalafcih@gmail.com</u></a></li>
                <li><img class="phonePic" src="icons/telephone.png">+201154713529</li> <!-- Da rakamy haah :D -->
              </ul>
            </div>              
          </div>
        </div>
      </section>
      <script type="text/javascript" href="js/bootstrap.min.js"></script>
      <script type="text/javascript" href="js/jquery-1.12.1.min.js"></script>
          <!--*****EYAD**************end footer********************-->