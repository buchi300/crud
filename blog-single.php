<?php $pageType = "resources";
 require_once 'adminheader.php';
 require_once 'conn.php';
 require_once 'function.php';
 
	
 if (isset($_REQUEST['id']) &&  is_numeric($_REQUEST['id']))
 { 
     
 }
 else
 {
     $_REQUEST['id']= 1;
 }
 
 
 $sql = "SELECT id, title, content, ext, date FROM blog where id =".$_REQUEST['id'];
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
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

    <!-- ======= Blog Section ======= -->
	<style type="text/css">

.outer {
    width:100%;
    margin:0 auto;
    outline:2px;
}
.content {
    white-space:pre-wrap;
    padding:1em;
}

    </style>

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">        
			

            <article class="entry">

              <div class="entry-img">
                <img src="assets/blog/<?php echo $row["id"].$row["ext"] ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                 <a href="blog-single.php?id=<?php echo $row["id"]?>"><?php echo $row["title"]?>   </a>
              </h2>

              <div class="entry-meta">
              <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2020-01-01"><?php echo $row["date"]?>   </time></a></li>
                 
                </ul>
              </div>

              <div class="entry-content content">
                <p>
                  <?php echo $row["content"]?>   
               </p>
              
              </div>




            </article><!-- End blog entry -->  

         
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">           

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
              <?php
            $sql = "SELECT id, title, ext, date FROM blog order by id desc limit 6";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
    
   			while($row = $result->fetch_assoc()) {
		  ?>         

                <div class="post-item clearfix">
                  <img src="assets/blog/<?php echo $row["id"].$row["ext"] ?>" alt="">
                  <h4><a href="blog-single?id=<?php echo $row["id"]?>"><?php echo $row["title"]?></a></h4>
                  <time datetime="2020-01-01"><?php echo $row["date"]?></time>
                </div>

                <?php
             
            }
       } else {
           echo "No article posted";
       }
       $conn->close();
       ?>

              </div><!-- End sidebar recent posts-->

              
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <?php require_once 'adminfooter.php'; ?>