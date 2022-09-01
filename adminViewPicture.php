<?php
$pageType ="media";
require_once 'adminheader.php';
require_once 'conn.php';

$sql = "SELECT *  FROM picture order by id desc";
	$result = $conn->query($sql);
	$title ='';
	$filter='';
	 $header ='';
?>

<!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portolio</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portolio</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-med">Medical</li>
              <li data-filter=".filter-com">Community</li>
			  <li data-filter=".filter-pro">Projects</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

        <?php
			  if ($result->num_rows > 0) {
			     while($row = $result->fetch_assoc()) {
					 
					 if ($row['title']=='medical'){
						 $title ='Medical';
						 $filter='filter-med';
						 $header ='Medical Outreach';
					 } 
					 elseif ($row['title']=='community')
					 {
						 $title ='Community';
						 $filter='filter-com';
						 $header ='Community Outreach';
					 }
					 else{
						 $title ='Projects';
						 $filter='filter-pro';
						 $header ='Projects';
					 }
					 
				?>

          <div class="col-lg-4 col-md-6 portfolio-item <?php echo $filter?>">
            <img src="assets/picture/<?php echo $row["id"].$row["ext"] ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?php echo $header ?></h4>
              <a href="assets/picture/<?php echo $row["id"].$row["ext"] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?php echo $title?>"><i class="bx bx-plus"></i></a>
              <p><?php echo $row['discription'] ?></p> 
              <a href="adminEditPicture.php?id=<?php echo $row["id"]?>" class="link-info ">Edit </a>|
              <a href="adminDeletePicture.php?id=<?php echo $row["id"]?>" class="link-danger">Delete</a>
            </div>
            
          </div>

          <?php
	
				 }
			} else {
				echo "No picture posted";
			}
			$conn->close();
					?>          

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

 <?php
 require_once 'adminfooter.php'
 ?>