
<?php

   include_once '../header.php';
 ?>
 <div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col    visibility: hidden;-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Supply Chain Management</h1>
               
            </div>
        </div>
    </div>
</div>
 <!-- Supply Chain Management Start -->
     <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h1 class="mb-4">Train Under Real Competition Pressure.</h1>
                    <p class="mb-4">Boost your speed and accuracy with timed practice tests designed to simulate actual event conditions. Each test includes realistic business questions and gives you a final score—no feedback, just raw results—just like the real thing.</p>
                    <h3 class="mt-2 mb-4">Features:</h3>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Multiple-choice questions by topic</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Countdown timer to track your pacing</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Instant final score after submission</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>No login or email required</p>
                        </div>
                    </div>
                   
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="<?php echo $filePath;?>img/course-2.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- flashcard iframe start-->
    <div class="container-xxl ">
        <div class="container flashcard-wrapper text-center">
            <h2 class="mb-3">📚 Flashcards</h2>
            <h3>Review Anytime. Learn Anywhere.</h3>
            <p>Practice key terms and concepts using interactive flashcards across business topics like marketing, finance, supply chain, and more.</p>
            
            <!-- Embedded Flashcard -->
            <iframe src="https://quizlet.com/687091743/match/embed?i=4yjnj4&x=1jj1" height="500" width="100%" style="border:0"></iframe>
            
            <div class="container text-center pt-5">
              <h3 class="mb-4">Challenge yourself and see how ready you really are.</h3>
              <a href="<?php echo $filePath;?>practice-test" class="btn btn-primary py-md-3 px-md-5 me-3 animated ">Take a Practice Test Now</a>
            </div>
        </div>
        
    </div>
     <!-- flashcard iframe end-->
  
   
 
<?php

   include_once '../footer.php';
 ?>