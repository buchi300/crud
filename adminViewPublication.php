<?php
$pageType ="pub";
require_once 'adminheader.php';
require_once "conn.php";
require_once "function.php";
$sql  = "SELECT * from publication order by id desc";
$result = $conn->query($sql);
$i=0;
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

                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nos</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Abstract</th>
                            <th scope="col">Date</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if ($result->num_rows > 0) {
					                	while($row = $result->fetch_assoc()) 
                            {?>
                        <tr>
                            <th scope="row"><?php echo ++$i?></th>
                            <td><?php echo $row["title"]?></td>
                            <td><?php echo $row["author"]?></td>
                            <td><?php echo $row["abstract"]?></td>
                            <td><?php echo $row["date"]?></td>
                            <td><a type="button" class="btn btn-primary"  href="adminEditPublication?id=<?php echo $row["id"]?>">Edit</a></td>
                            <td><a type="button" class="btn btn-danger" href="adminDeletePublication?id=<?php echo $row["id"]?>">Delete</a></td>
                            <td><a type="button" class="btn btn-danger" href="singlePub?id=<?php echo $row["id"]?>">View</a></td>
                         </tr>
                         <?php 
                            }
                        } else {
                          echo "No Publication";
                               }
                          
                            ?>
                     </tbody>
	                 </table>
                        
                    </div> 
                    
                    
                   
                    
                </div>

      </div>
    </section><!-- End About Us Section -->


  </main><!-- End #main -->

 <?php 
require_once 'adminfooter.php';
 ?>