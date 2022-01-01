<!DOCTYPE html>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Mocha Avenue</title>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="assets/css/style.css">


<div class="wrapper">

<?php include('header.php')?>
  
  <div class="main_content">  
    
  <?php include('navbutton.php')?>



  <?php 
    session_start();
    include 'assets/server/dbcon.php';
    if(isset($_SESSION['username'])){
      header("Location:recipe_home.php"); 
    }
    ?>

    <?php
      $sql = "SELECT *  FROM recepies";
      $result = $con->query($sql);
    ?>


 


<div class="fullcontainer">

        <?php while($rows = $result->fetch_assoc())
	            	{ 
		        ?>
          <div style= "width:90%; padding:20px; margin:20px auto; background-color: rgba(0,0,0,0.5); border-radius:10px; overflow:hidden; backdrop-filter:blur(15px)">
              <div class="photo" >
                  <img src="<?php echo $rows['image'];?>"  style = "width: 100% ; border-radius:10px ">
              </div>

              <div class="card">
                  <h1 class= "heading">
                  <p><?php echo $rows['recipeName'];?></P>
                  </h1>
                  
                 <h2 style="margin:10px 0px; font-weight:400; color: #ECAC5D"> Ingredients </h2>
                  <p><pre><?php echo $rows['ingredients'];?></pre></P>     
                  <h2 style="margin:10px 0px; color: #ECAC5D">
                    Recepie 
                  </h2>
                  <pre><?php echo $rows['recipe'];?></pre> 
              </div>
          </div> 

          <?php 
               } 
          ?> 


         </div>


         </div>
















  </div>


