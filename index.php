<!DOCTYPE html>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Mocha Avenue</title>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="assets/css/style.css">


<div class="wrapper">
  
<?php 
        session_start();
        if(isset($_SESSION['username'])){
            header("Location:index_home.php");
    }
?>

<?php include('header.php')?>
  
  <div class="main_content">  
    
  <?php include('navbutton.php')?>

  <?php include('slider.php')?>


  </div>


