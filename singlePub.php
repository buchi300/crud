<?php
$pageType ="resources";
require_once 'adminheader.php';
require_once "conn.php";
if (isset($_REQUEST['id']) &&  is_numeric($_REQUEST['id']))
	{ 
	}
else
	{
		$_REQUEST['id']=1;
	}

$sql  = "SELECT * from publication where id=".$_REQUEST['id'];
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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

                <div class="row no-gutters">

                

                    <div class="col-12">            
                        <h2 class="cl2"> <?php echo $row["title"]?></h2>
                        <Strong class ="cl">Date posted : </strong><?php echo date('jS F, Y', strtotime(substr($row["date"],0,10)))?>
                        <br><br>

                        <iframe src="assets/publication/<?php echo $_REQUEST['id']?>.pdf" width="100%" height="1000px">
                        </iframe>
                             
                    </div>   
                  
                    
                </div>

      </div>
    </section><!-- End About Us Section -->


  </main><!-- End #main -->

 <?php 
require_once 'adminfooter.php';
 ?>