      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/home.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
<?php
include_once '../classes/Validator.php';
include_once '../classes/applicationuser.php';
$appUser = new ApplicationUser();
$var = new Validator(); // included in application user which is extended
if(isset($_POST['login'])){
 $userName = $var->secureData($_POST['username']);
 $password = $var->secureData($var->hashData($_POST['password']));

  $appUser->login($userName, $password);

 if(strlen($userName) < 5 || empty($userName)){ ?>
   <style>
  .alert{width:500px;margin: 10px auto; margin-top: 50px; position: absolute; margin-left: 400px; z-index: 99; color:red;}
 </style>
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Login Fail!</strong> Check username must be more than 5 charcaters.
</div>
<?php } ?>
<?php
 if(strlen($password) < 5 || empty($password)){ ?>
   <style>
  .alert{width:500px;margin: 10px auto; margin-top:50px; position: absolute; margin-left: 400px; z-index: 999; color:red;}
 </style>
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Login Fail!</strong> Check <strong>password</strong> must be more than 5 charcaters.
</div>

<?php } ?>
<?php

   
}
//check data and redirect
?>
      <script type="text/javascript" href="js/bootstrap.min.js"></script>
      <script type="text/javascript" href="js/jquery-1.12.1.min.js"></script>