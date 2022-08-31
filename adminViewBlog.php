<?php
$pageType ="blog";
require_once 'adminheader.php';
require_once "conn.php";
require_once "function.php";
$sql  = "SELECT * from blog order by id desc";
$result = $conn->query($sql);
$i=0;
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Blog</h2>
               
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container">

            <div class="row no-gutters m-3">



                <div class="col-md-12 mb-3  mx-auto">
                    <div class="row">

                    <?php
                      $i=1;
                      if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {?>

                        <div class="col-md-4 mb-3 ">
                            <div class="card" style="width: 24rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> <strong><a href="blog-single.php?id=<?php echo $row["id"]?>"> <?php echo $row["title"]?></strong></a>
                                    </h5>
                                    <div class="border-bottom border-3 border-danger "></div>
                                    <h6 class="card-subtitle m-2 ">
                                        Date: <strong><?php echo $row["date"]?></strong>
                                    </h6>
                                    <div class="border-bottom border-3 "></div>
                                    <p class="card-text"> <img src="assets/blog/<?php echo $row["id"].$row["ext"]?>" class="img-fluid"></p>
                                    <a href="adminEditBlog.php?id=<?php echo $row["id"]?>" class="btn btn-primary">EDIT</a>
                                    <a href="adminDeleteBlog.php?id=<?php echo $row["id"]?>" class="btn  btn-primary">Delete</a>
                                    <a href="blog-single.php?id=<?php echo $row["id"]?>" class="btn  btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php 
                    if($i%3==0){
                      ?>
                      </div>
                      <div class="row">
                      <?php
                    }
                    $i++;

                    }
                    } else {
                        echo "No Blog posted";
                    }
                    ?>



                    </div>


                </div>




            </div>

        </div>
    </section><!-- End About Us Section -->


</main><!-- End #main -->

<?php 
require_once 'adminfooter.php';
 ?>