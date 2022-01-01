<!DOCTYPE html>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Mocha Avenue</title>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="assets/css/style.css">


<div class="wrapper">

<?php include('header_home.php')?>
  
  <div class="main_content">  
    
  <?php include('navbutton.php')?>



  <?php 
    session_start();
    if(!isset($_SESSION['username'])){
      header("Location:blogs.php"); 
    }
    $bloggerName = $_SESSION['username'];
    include 'assets/server/dbcon.php';
    ?>

    <?php
      $sql = "SELECT *  FROM blogs where bloggerName = '$bloggerName' " ;
      $result = $con->query($sql);
    ?>
    <div class="fullcontainer">
  <div style="padding:40px 20px; text-align:right">
    <a href="blogpost.php" class="buttoncustom" >Add more Blog</a>
</div>


      <?php while($rows = $result->fetch_assoc())
	            	{ 
		        ?>
          <div  style= "width:90%; padding:50px 30px; margin:20px auto; background-color: rgba(0,0,0,0.5); border-radius:10px; overflow:hidden; backdrop-filter:blur(15px)">
            
                  <h1 class= "heading">
                  <?php echo $rows['blogtitle'];?>
                  </h1>
                    
                  <h2 style="margin:10px 0px; color: #ECAC5D">
                  <?php echo $rows['bloggerName'];?>
                  </h2>
                  <h2 style="margin:10px 0px; color: #ECAC5D">
                  <?php echo $rows['blogdate'];?>
                  </h2>
                  <p><pre><?php echo $rows['blogdata'];?></pre></p>









                  <div style="width:100%; text-align:right;">


                         <?php 
                         if(isset($_POST['removeblog'])) {
                        $currentid = $rows['blogid'];
                        $deletequery = "DELETE FROM blogs WHERE blogid='$currentid'";
                        $iquery = mysqli_query($con,$deletequery);

                        if($iquery) {
                            ?>
                            <script>
                            alert( "Blog Remoed" ) ;
                            location.replace("my_blogs.php");
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

				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
			
				<div class="group">
					<input type="submit" class="buttoncustom" name="removeblog" value="Remove Blog" style="color:#fff; border:0px">
				</div>

				</form>

                </div>






  
          </div> 

          <?php 
               } 
          ?> 


         </div>
         </div>



  </div>


