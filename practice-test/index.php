
<?php

   include_once '../header.php';

    $servername = 'localhost';
    $dbuser = 'bizpr3nz_bizprephub';
    $dbpass = 'bizprephub';
    $database = 'bizpr3nz_bizprephub';
    $connect = mysqli_connect($servername, $dbuser, $dbpass, $database);

     //retrive questions data
    $query =  "SELECT * FROM questionAndAnswer";
    $result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_array($result,1)){
        $response['quizList'][] = $row;
    }
    
    //get exam start time
    $dateTime = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO examTime (time) VALUES ('".$dateTime."')";
    
    $getLastInsertedId = mysqli_query($connect,$sql);
    if ($getLastInsertedId) {
        $last_id = mysqli_insert_id($connect);
    }
    
    
     
?>

<style>
   .time-total-question{
    background: #06BBCC;
    text-transform: uppercase;
    color: #fff;
    padding: 10px;
   }
   .align-right{
       text-align: right;
   }
   .question{
    margin-bottom: 10px;
    color: red;
   }
   .answer-option{
    list-style: none;
    margin-left: -7px;
    padding-left: 0;
   }
   .alig-right{
       text-align:right;
   }
   .prev-next,.submit{
    color: #FFFFFF;
    border: 1px solid #FFFFFF;
    font-size: 22px;
    background: #06BBCC;
    width: 150px;
    cursor: pointer;
    padding: 10px;
    text-transform: uppercase;
    text-align: center;
   }
   .next {
    display: flex;
    justify-content: end;
   }
   .submit-answer{
    display: flex;
    justify-content: center;
   }
   .option-section{
       margin-bottom: 20px;
        background: #e5e5e5;
        padding: 30px;
   }
   .f-24{
        font-size: 24px;
   }
   .hide{
       display:none;
   }
   .show{
       display:block;
   }
   .w-100{
       width:100%;
   }
   .result-wrapper{
       display:none;
   }
   .final-result{
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
   }
   .result-in-circle{
    display: flex;
    justify-content: center;
   }
   .circle{
        background: #06BBCC;
        padding: 20px;
        border-radius: 50%;
        color: #fff;
        width: 100px;
        height: 100px;
        font-size: 24px;
        text-align: center;
        position: relative;
   }
    .circle .correct-option:before {
        position: absolute;
        height: 2px;
        width: 40px;
        left: 30%;
        top: 52%;
        background: #fff;
        display: block;
        content: "";
    }
</style>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col    visibility: hidden;-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Practice Tests</h1>
               
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<!-- middle content starts-->
<div class="exam-wrapper">
    <div class="container py-4 table-section">
        <!-- Timer and Total question count start -->
        <div class="row time-total-question  mb-4">
            <div class="col-lg-6 col-md-12 wow fadeInUp f-24" data-wow-delay="0.5s">
              <i class="fa fa-clock text-white me-2"></i> <span id="timer"></span>
            </div>
            <div class="col-lg-6 col-md-12 wow fadeInUp align-right f-24" data-wow-delay="0.5s"> 
              <span class="attended-question">1</span>/<span class="total-question"><?php echo count($response['quizList']) ?></span>
            </div>
        </div>
        <!-- Timer and Total question count End -->
        
        <!-- question and Option start -->
         <div class="row mb-4">
             
             <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
              <ul class="answer-option">
                  <?php 
                        $conut = 0;
                        $query =  "SELECT * FROM questionAndAnswer";
                        $result = mysqli_query($connect,$query);
                        
                        $allQuestions = [];
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $allQuestions[] = $row;
                        }
                        shuffle($allQuestions); // PHP shuffle
                        
                      foreach ($allQuestions as $row) {
                            
                            $conut = ++$conut;
                    ?>
                  
                 <li class="option-section <?php if($conut > 1){echo 'hide'; }else{echo 'show'; }echo ' '.$conut;?>">
                      
                   <div class="question" data-wow-delay="0.5s">
                       <?php echo "(".$conut.")  ".$row['questions']; ?>
                   </div>
                    <input type="radio" class="options" userAttr="<?php echo $row['id']."#".$last_id; ?>" name="<?php echo $row['id']; ?>" value="1">
                    <label ><?php echo $row['option_1']; ?></label><br>
                    
                    <input type="radio" class="options" userAttr="<?php echo $row['id']."#".$last_id; ?>" name="<?php echo $row['id']; ?>" value="2">
                    <label ><?php echo $row['option_2']; ?></label><br>
                    
                    <input type="radio" class="options" userAttr="<?php echo $row['id']."#".$last_id; ?>" name="<?php echo $row['id']; ?>" value="3">
                    <label ><?php echo $row['option_3']; ?></label><br>
                    
                    <input type="radio" class="options" userAttr="<?php echo $row['id']."#".$last_id; ?>" name="<?php echo $row['id']; ?>" value="4">
                    <label ><?php echo $row['option_4']; ?></label><br>
                        
                      
                  </li>
                  <?php 
                        }
                    ?>
              </ul>
            </div>
            
         </div>
        <!-- question and Option end -->
        
        <!-- Prev and next , submit button start   --> 
         <div class="row mb-5">
            <div class="col-lg-4 col-md-12 wow fadeInUp " data-wow-delay="0.5s">
               <div class="owl-prev   prev-next privious hide prev-button"><i class="bi bi-chevron-left"></i> Prev</div> 
            </div>
             <div class="col-lg-4 col-md-12  submit-answer" data-wow-delay="0.5s">
                 <div class="submit text-center  hide">submit</div>
                 <input type="hidden" value="<?php echo $last_id ?>" class="exam-id" />
                
            </div> 
             <div class="col-lg-4 col-md-12 wow fadeInUp alig-right next" data-wow-delay="0.5s">
               <div class="owl-next  prev-next next next-button text-center">
                   <div class="w-100">
                        <i class="bi bi-chevron-right "></i>Next
                   </div>
                   
               </div> 
            </div> 
        </div>
        <!-- Prev and next , submit button end   -->
        
    </div>
</div>


<div class="result-wrapper">
     <div class="container py-1 result-in-circle">
         <div class="circle">
             <div>
                 <span class="correct-option"></span>
             </div>
             <div>
                 <span> <?php echo count($response['quizList']) ?></span>
             </div>
         </div>
     </div>
    <div class="container py-4 table-section">
        <!-- Timer and Total question count start -->
        <div class="row time-total-question  mb-4">
            <div class="col-lg-12 col-md-12 f-24" data-wow-delay="0.5s">
                <div class="text-center">Exam Result</div>
                <div class="final-result">
                    <div>
                        <p>Total questions: <span class="total-questions">
                            <?php echo count($response['quizList']) ?>
                        </span> </p>
                    </div>
                     <div>
                        <p >total questions answered   : <span class="totalAttended"> </span>
                        </p>
                    </div>
                     <div>
                        <p >Correct Answer: <span class="correct-option"></span> </p>
                    </div>
                    <div>
                        <p>Result : <span class="result-in-percent"></span> % 
                        </p>
                    </div>
                </div>
                
            </div>
          
        </div>
    </div>
    
</div>
<!-- middle content End-->


<?php

     include_once '../footer.php';
?>


<script>
    $(document).ready(function ($) {
        
                gtag('event', 'landed_on_practice_page', {
                  event_category: 'navigation',
                  event_label: 'landed_on_practice_page',
                  value: 1
                });
        
        /* prev and next butt functionality start */
         $(document).on("click", ".prev-next", function () {
            var curEle = $(this);
            var firstLi = $('.answer-option li').first();
            var lastLi = $('.answer-option li').last();
        
            $.each($('.answer-option li'), function (index, element) {
                if ($(element).hasClass('show')) {
                    $(element).removeClass('show').addClass('hide');
                    var pageCount  = parseInt($(".attended-question").text());
                    if (curEle.hasClass('privious')) {
                        var prevLi = $(element).prev();
                        prevLi.addClass('show');
        
                        // Show the next button again (in case it was hidden)
                        $('.next-button').show();
                        $(".attended-question").text(parseInt(pageCount-1))
                        $(".submit").addClass("hide");
                        // If we're now on the first element, maybe hide "previous"?
                        if (prevLi.is(firstLi)) {
                            $('.prev-button').hide();
                        } else {
                            $('.prev-button').show();
                        }
        
                    } else {
                        var nextLi = $(element).next();
                        nextLi.addClass('show');
                        $(".attended-question").text(pageCount+1)
        
                        // Hide next button if we're now at the last one
                        if (nextLi.is(lastLi)) {
                            $('.next-button').hide();
                             $(".submit").removeClass("hide");
                        } else {
                            $('.next-button').show();
                             $(".submit").addClass("hide");
                        }
        
                        // Show previous button again (in case it was hidden)
                        $('.prev-button').show();
                    }
        
                    return false; // break loop
                }
            });
        });
        /* prev and next butt functionality end */
        
        
        /* attending answer functionality start */
        var count = 0;
        $( document ).on( "click", ".options", function() {
            if(count == 0){
               count++;
                gtag('event', 'test_started', {
                  event_category: 'engagement',
                  event_label: 'test_started',
                  value: 1
                });
            }
            var optionId = $(this).attr("userAttr").split('#')
            
            var optionsId = optionId[0];
            var examId = optionId[1];
            var optionValue = $(this).val();
            
            $.ajax({
                  type: "GET",
                  url: "insert-exam-data.php?optionsId="+optionsId+"&examId="+examId+"&optionValue="+optionValue,
                  dataType: "json",
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function (response) {
                   
                  }
                });
            
            
        })
        /* attending answer functionality end */
        
        
        /* Timer start */
        let totalSeconds = 59 * 60 + 59;
        let countdown = setInterval(function () {
          let minutes = Math.floor(totalSeconds / 60);
          let seconds = totalSeconds % 60;
    
          // Format MM:SS
          let formattedTime = 
            String(minutes).padStart(2, '0') + ':' + 
            String(seconds).padStart(2, '0');
    
          $('#timer').text(formattedTime);
    
          totalSeconds--;
    
          if (totalSeconds < 0) {
            clearInterval(countdown);
            $(".submit").trigger("click");
            // Optional: Do something when time is up
          }
        }, 1000);
        /* Timer End */
          
         /* exam submit starts */
         $( document ).on( "click", ".submit", function() {
            var examId = $(".exam-id").val()
             gtag('event', 'submitted_exam', {
                  event_category: 'engagement',
                  event_label: 'submitted_exam',
                  value: 1
                });
            
             $.ajax({
                  type: "GET",
                  url: "insert-exam-data.php?examIds="+examId,
                  dataType: "text",
                  success: function (response) {
                   var totalAttendedAndCorrectAns = response.split("#") ;
                   $(".totalAttended").text(totalAttendedAndCorrectAns[0]);
                   $(".correct-option").text(totalAttendedAndCorrectAns[1])
                   $(".result-wrapper").show();
                   $(".exam-wrapper").hide();
                   var percentage = (parseInt(totalAttendedAndCorrectAns[1]) / parseInt($(".total-questions").text())  ) * 100;
                   $(".result-in-percent").text(percentage.toFixed(2));
                   
                  }
            });
            
         })
           
        /* exam submit End */ 
    });
</script>