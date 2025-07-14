<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bizprephub</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    
    
    <?php
    
        $url = $_SERVER["REQUEST_URI"];
    	$explodeUrl	=	explode("/",$url);
       	foreach($explodeUrl as $x => $val) {
    	    if(count($explodeUrl)>1){
    	      if($x+1 == 3 && $x+1 == count($explodeUrl)){
        	        $filePath	=	'../';
        	    }else if($x+1 == 4 && $x+1 == count($explodeUrl)){
        	        $filePath	=	'../../';
        	    }
    	    }else{
    	        $filePath	=	'';
        	}
    	   
        }
    ?>
    <!-- Favicon -->
    <link href="<?php echo $filePath;?>img/bizprephub.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo $filePath;?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo $filePath;?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo $filePath;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo $filePath;?>css/style.css" rel="stylesheet">
    
    <!-- Google analytic start-->
  <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MQZEMC7BG5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-MQZEMC7BG5');
    </script>
    <!-- Google analytic End-->
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <div class="container">
    <a href="<?php echo $filePath;?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><img class="mg-fluid w-25" src="<?php echo $filePath;?>img/bizprephub.png" alt="" ></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?php echo $filePath;?>" class="nav-item nav-link <?php if($explodeUrl[1]=='') echo "active"; ?>">Home</a>
            <a href="<?php echo $filePath;?>about" class="nav-item nav-link <?php if($explodeUrl[1]=='about') echo "active"; ?>">About</a>
    
            <div class="nav-item dropdown">
                <!-- REMOVE data-bs-toggle so link works -->
                <a href="#" class="nav-link dropdown-toggle <?php if($explodeUrl[1]=='supply-chain-management') echo "active"; ?>" id="flashcardDropdown" role="button">
                  Flashcards
                </a>
                <ul class="dropdown-menu fade-down m-0" aria-labelledby="flashcardDropdown">
                  <li><a class="dropdown-item" href="<?php echo $filePath;?>supply-chain-management">Supply Chain Management</a></li>
                </ul>
              </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php if($explodeUrl[1]=='practice-test') echo "active"; ?>" " data-bs-toggle="dropdown">Practice Tests
                </a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="<?php echo $filePath;?>practice-test" class="dropdown-item">Supply Chain Management</a>
                    
                </div>
            </div>
            
        </div>
        <!-- <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a> -->
    </div>
</div>
</nav>
    <!-- Navbar End -->