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

                            <form action="transact.php" method="post" enctype="multipart/form-data" >
                        

                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Publication  Title                
                            </div>
                            <div class="col-md-10">
                            <input type="text" name="title" size="70" value="" required>
                            
                            </div>
                        </div>
                        
                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Authors                
                            </div>
                            <div class="col-md-10">
                            <input type="text" name="author" size="70" value="" required>
                            
                            </div>
                        </div>
                        
                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Abstract                
                            </div>
                            <div class="col-md-10">					 
                            <textarea name="abstract" rows="10" cols="70" required>
                            
                            </textarea>
                            </div>
                        </div>

                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Date               
                            </div>
                            <div class="col-md-10">
                            <input type="date" name="date" size="70" value="" required>
                            
                            </div>
                        </div>

                        <div class="d-flex m-3">
                            <div class="col-md-2">
                            Upload Publication            
                            </div>
                            <div class="col-md-10">
                            <input name="image_filename" type="file" id="image_filename" required>  <br>
					      <em>PDF is the only Acceptable document format.</em>
                            
                            </div>
                        </div>
                        
                        <div class="form-row d-flex m-3">
                            <div class="col-md-2">
                            <input name="id" type="hidden" id="item_caption"  value="" required/>     
                            </div>
                            <div class="col-md-10">
                            <input type="submit" name="action" value="Add Publication">              
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