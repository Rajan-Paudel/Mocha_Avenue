<!DOCTYPE html>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Mocha Avenue</title>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="assets/css/style.css">







<style>

textarea:focus, input:focus{
    outline: none;
}

input[type=text], select {
    width:100%; padding:20px;
    background-color:rgba(256,256,256,0.15);
    backdrop-filter: blur(20px);
    color:#fff;
    border:0px;
  margin: 10px 0;
  display: inline-block;

  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #A9333A;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #555;
}
textarea{
    width:100%; padding:20px;
    background-color:rgba(256,256,256,0.15);
    backdrop-filter: blur(20px);
    min-height:300px;
    color:#fff;
    border:0px;
}

  </style>











<div class="wrapper">

<?php include('header_home.php')?>
  
  <div class="main_content">  
    
  <?php include('navbutton.php')?>


  <div class="fullcontainer">
          <div style= "width:90%; max-width:800px; padding:20px; margin:100px auto; background-color: rgba(0,0,0,0.5); border-radius:10px; overflow:hidden; backdrop-filter:blur(15px)">
              


          <?php 
session_start();
if(!isset($_SESSION['username'])){
  header("Location:blogs.php"); 
}
include 'assets/server/dbcon.php';
$currentDate = date("l") ." ". date("Y-m-d");
if(isset($_POST['addblog'])) {

$blogtitle = mysqli_real_escape_string($con, $_POST['blogtitle']);
$blogdescription = mysqli_real_escape_string($con, $_POST['blogdescription']);
$bloggerName = $_SESSION['username'];

$insertquery = "insert into blogs(bloggerName,blogtitle,blogdata,blogdate) values('$bloggerName','$blogtitle','$blogdescription','$currentDate')";

$iquery = mysqli_query($con,$insertquery);

if($iquery) {
	?>
    <script>
    alert( "Blog Posted" ) ;
	location.replace("blog_home.php");
    </script>
    
    <?php
    }else{	
    ?>
    <script>
    alert( "Something Went wrong" ) ;
    </script>
    <?php
    }
}

?>





<div style="margin:0px auto; width:100%">
  <h1 style=" color:#fff; font-size:30px; padding:10px 0px;" > Welcome <?php echo $_SESSION['username'] ?> </h1>

  <p style=" color:#fff; font-size:16px; padding:10px 0px;" > Write a Blog </p>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" style="padding: 30px 0px">
    

  
    <input type="text" id="lname" name="blogtitle" placeholder="Blog Title">
    <textarea type="text" id="lname" name="blogdescription" placeholder="Blog Description"></textarea>
  
    <input type="submit" value="Submit" name="addblog">
  </form>
</div>

</div>











          </div> 

         


       



















  </div>


