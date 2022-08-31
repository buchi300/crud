<?php 
session_start();
if (isset($_SESSION['name']))

												{

													?>

													

												<?php

												}

												else{

													?><h1 class="text-white">

													<?php

													die('you are not logged in');

													?> </h1>

													<?php

												}?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CRUD Application Example</title>
  <meta content="" name="CRUD">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a
            href="mailto:info@onyebuchi.website">info@onyebuchi.website</a></i>
       <a href="tel:+2348038084563">
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+2348038084563
        </span></i>
       </a>
      

      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <!-- <h1 class="text-light"><a href="index.html">Flattern</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index"><img src="assets/img/logo.jpg" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>                  
          <li class="dropdown"><a  <?php if (isset($pageType) && $pageType =="pub" ) echo "class= \"active\"";?> href="#"><span>Publication</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adminAddPublication">Add New Publication</a></li>             
              <li><a href="adminViewPublication">View All Publications </a></li>
            </ul>
          </li> 

          <li class="dropdown"><a  <?php if (isset($pageType) && $pageType =="blog" ) echo "class= \"active\"";?> href="#"><span>Blog</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adminAddBlog">Add New Blog</a></li>             
              <li><a href="adminViewBlog">View All Blogs </a></li>
            </ul>
          </li> 
          
          <li class="dropdown"><a <?php if (isset($pageType) && $pageType =="pic" ) echo "class= \"active\"";?> href="#"><span>Picture</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adminAddPicture">Add New Picture</a></li>   
              <li><a href="adminViewPicture">View All Pictures</a></li>   
            </ul>            
          </li> 
          
          <li class="dropdown"><a <?php if (isset($pageType) && $pageType =="video" ) echo "class= \"active\"";?> href="#"><span>Video</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adminAddVideo">Add New Video</a></li> 
              <li><a href="adminViewVideo">View All Videos</a></li>     
            </ul>            
          </li> 
          <li><a  href="transact.php?action=Logout">Log Out</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->