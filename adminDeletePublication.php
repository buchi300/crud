<?php
$pageType ="pub";
require_once 'adminheader.php';
require_once "conn.php";
require_once "function.php";
$sql  = "SELECT * from publication order by id desc";
$result = $conn->query($sql);

?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Publications</h2>
          
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container">

                <div class="row no-gutters m-3">

                

                    <div class="col-md-12 mb-3  mx-auto">  

                    <?php
               
                              if (isset($_GET['id']) &&  is_numeric($_GET['id']))
   
                               {
   
                                   echo "<h4> Are you sure you want to delete a Publication</h4>";
   
                                   ?><h1><a href="transact.php?id=<?php echo $_GET["id"] ?>&action=deletePublication">Click yes to proceed</h1></a><?php
   
                                   
   
                               }
                    ?>
                        
                    </div> 
                    
                    
                   
                    
                </div>

      </div>
    </section><!-- End About Us Section -->


  </main><!-- End #main -->

 <?php 
require_once 'adminfooter.php';
 ?>