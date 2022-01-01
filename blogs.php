   


<!DOCTYPE html>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Mocha Avenue</title>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/login.css">


<div class="wrapper">

<?php include('header.php')?>
  
  <div class="main_content">  
    
  <?php include('navbutton.php')?>




  

  <?php 
session_start();
if(isset($_SESSION['username'])){
  header("Location:blogs_home.php");
} 
include 'assets/server/dbcon.php';

if(isset($_POST['signup'])) {

$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$repassword = mysqli_real_escape_string($con, $_POST['repassword']);
$email = mysqli_real_escape_string($con, $_POST['email']);


$emailquery = "select * from registration where email= '$email'";
$query = mysqli_query($con, $emailquery);


$emailcount = mysqli_num_rows($query);
if ($emailcount>0) {
echo "<center><h5>E-Mail Already Exist</center></h5>";
}
else{
if ($password === $repassword) {


$insertquery = "insert into registration( username,
password, repassword,email) values('$username','$password','$repassword','$email')";
$iquery = mysqli_query($con,$insertquery);

if($iquery) {
	?>
    <script>
    alert( "Acount Successfully Created ! Now You can log-in with CityCrate Acount" ) ;
	location.replace("blogs.php");
    </script>
    
    <?php
    }else{	
    ?>
    
    <script>
    alert( "NOT Inserted " ) ;
    </script>
    <?php
    }

}else{

	?>
    
    <script>
    alert( " Password not matching " ) ;
    </script>
    <?php


}




}

}

if(isset($_POST['signin'])) {
$email=$_POST['email'];
$password=$_POST['password'];


$email_search =" select * from registration where email='$email' ";

$query = mysqli_query($con, $email_search);

$email_count = mysqli_num_rows($query) ;

if($email_count) {

$email_pass = mysqli_fetch_assoc($query);

$db_pass = $email_pass['password'];

$_SESSION['username'] = $email_pass['username'];

if($db_pass == $password) {
	
	?>
	<script>
    location.replace("index_home.php");
    </script>
    <?php
}else
	
	?>
    <script>
    alert( " Password not matching " ) ;
    </script>
    <?php

}
else echo "<center><h5>E-Mail Does not Exist</center></h5>";


}
?>








<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
				<div class="group">
					<label for="user" class="label">E-mail</label>
					<input id="user" name="email" type="email" class="input" reguired>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="password" type="password" class="input" data-type="password" required>
				</div>
				
				<div class="group" >
					<input type="submit" class="button" name="signin" value="Sign In" >
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
				</form>
			</div>
			<div class="sign-up-htm">
            <form method="POST" action="">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="username" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="password" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" name="repassword" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" name="email" type="email" class="input" required>
				</div>
				<div class="group">
					<input type="submit" style="color:#fff;" class="button" name="signup" value="Sign Up">
				</div>

                </form>
                <label for="tab-1" style="color:#aaa; text-align: margin-left:20px; cursor: pointer; float: right;">Already Member?</a>
				<div class="hr"></div>
				
				<div class="foot-lnk">
					
				</div>
			</div>
		</div>
	</div>
</div>



  </div>






























