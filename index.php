<?php
$pageType ="resources";
require_once 'header.php';
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
          <h2>Welcome</h2>          
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container">

                <div class="row no-gutters m-3">

                

                    <div class="col-md-4 mb-3  mx-auto">  
                        <form action="transact.php" method="post">            
                            <div class="mb-3">
                                <label for="user" class="form-label">User Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="User Name">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control" id="inputPassword">     
                            </div>
                            <div class="mb-3 ">
                                <button type="submit" class="btn btn-primary mb-3"  name="action" value="login">Login</button> 
                            </div>
                        </form>
                    </div> 
                    
                    
                   
                    
                </div>

      </div>
    </section><!-- End About Us Section -->


  </main><!-- End #main -->

 <?php 
require_once 'adminfooter.php';
 ?>