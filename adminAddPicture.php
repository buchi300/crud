<?php
$pageType ="pic";
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
          <h2>Picture</h2>
       
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container">

                <div class="row no-gutters m-3">

                

                    <div class="col-md-12 mb-3  mx-auto">  

                        <form action="transact.php" method="post" enctype="multipart/form-data" >
                        

                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Picture Category               
                            </div>
                            <div class="col-md-10">
                                <select name="title">
                                  <option value="medical">Medical</option>
                                  <option value="community">Community</option>
                                  <option value="projects">Projects</option>
                                </select>
                            
                            </div>
                        </div>                       
                                               
                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Discription  (maximum of 120 Characters)           
                            </div>
                            <div class="col-md-10">					 
                            <textarea name="discription" rows="5" cols="70" required>
                            
                            </textarea>
                            </div>
                        </div>

                        <div class="d-flex m-3">
                            <div class="col-md-2">
                            Upload Picture            
                            </div>
                            <div class="col-md-10">
                            <input name="image_filename" type="file" id="image_filename" required>  <br>
					      <em>GIF, JPG/JPEG and PNG are the only Acceptable document format.</em>
                            
                            </div>
                        </div>
                        
                        <div class="form-row d-flex m-3">
                            <div class="col-md-2">
                            <input name="id" type="hidden" id="item_caption"  value="" required/>     
                            </div>
                            <div class="col-md-10">
                            <input type="submit" name="action" value="Add Picture">              
                            </div>
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