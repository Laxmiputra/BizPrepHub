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
    <!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-3">
        <div class="row g-5">
            
            <div class="col-lg-5 col-md-6">
                <h4 class="text-white mb-3">Privacy-First Student Resource</h4>
                <p>This website is an independent student-led resource and is not affiliated with any official student competition organization. We do not collect personal data.
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>bizprephub@gmail.com</p>
                
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="d-flex pt-5">
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 text-center  mb-3 mb-md-0">
                   <p>&copy; 2025 All Rights Reserved By <a href="<?php echo $filePath;?>">Bizprephub</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $filePath;?>lib/wow/wow.min.js"></script>
    <script src="<?php echo $filePath;?>lib/easing/easing.min.js"></script>
    <script src="<?php echo $filePath;?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo $filePath;?>lib/owlcarousel/owl.carousel.min.js"></script>
    
 <script
      data-minify="1"
      src="<?php echo $filePath;?>lib/jquery.validate.js"
    ></script>
    <!-- Template Javascript -->
    <script src="<?php echo $filePath;?>js/main.js"></script>
</body>

</html>