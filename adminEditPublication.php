<?php
$pageType ="pub";
require_once 'adminheader.php';
require_once "conn.php";
require_once "function.php";

      $title ='';
			$author ='';
      $abstract ='';
      $date='';
			$id='';
			if (isset($_GET['id']) &&  is_numeric($_GET['id']))
			{				
			 
			$sql = "SELECT * FROM publication where id =". $_GET['id'];
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$title =$row['title'];
      $author=$row['author'];
      $abstract=$row['abstract'];
			$date =$row['date'];
			$id=$_GET['id'];
			}

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
                            <input type="text" name="title" size="70" value="<?php echo $title ?>" required>
                            
                            </div>
                        </div>
                        
                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Authors                
                            </div>
                            <div class="col-md-10">
                            <input type="text" name="author" size="70" value="<?php echo $author ?>" required>
                            
                            </div>
                        </div>
                        
                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Abstract                
                            </div>
                            <div class="col-md-10">					 
                            <textarea name="abstract" rows="10" cols="70" required>
                            <?php echo $abstract?>
                            
                            </textarea>
                            </div>
                        </div>

                        <div class="d-flex m-3">
                            <div class="col-md-2">
                                Date               
                            </div>
                            <div class="col-md-10">
                            <input type="date" name="date" size="70" value="<?php echo $date?>" required>
                            
                            </div>
                        </div>
                        
                        <div class="form-row d-flex m-3">
                            <div class="col-md-2">
                            <input name="id" type="hidden" id="item_caption"  value="<?php echo $id?>" required/>     
                            </div>
                            <div class="col-md-10">
                            <input type="submit" name="action" value="Update Publication">              
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