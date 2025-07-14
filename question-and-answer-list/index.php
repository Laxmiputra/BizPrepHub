
<?php

    $servername = 'localhost';
    $dbuser = 'bizpr3nz_bizprephub';
    $dbpass = 'bizprephub';
    $database = 'bizpr3nz_bizprephub';
    $connect = mysqli_connect($servername, $dbuser, $dbpass, $database);

     include_once '../header.php';
?>

<style>
    .form-floating>.form-select{
        padding: 1rem .75rem;
    }
    #question-and-answer .form-floating{
        margin-bottom: 15px;
    }
     #question-and-answer label.error{
       top: 50px;
       left: -12px;
       color: #ff0000;
       font-size: 14px;
    }
      .body-section {
        background: #0a0909;
        padding: 20px;
      }
      .table-section{
       background: #e5e5e5;
        border-radius: 4px;
        padding: 40px;
      }
      .loader-section{
        background: #e5e5e5;
        padding: 20px;
      }
    
      .no-data{
        text-align: center;
        font-size: 24px;
        line-height: 45px;
        color: red;
      }
      .dataTables_wrapper .dataTables_filter input{
        width: 300px;
      }
      .data-saved{
        font-size: 24px;
        color: #06BBCC;
        visibility: hidden;;
      }
      table.dataTable tbody tr {
            background-color: #fff !important;
        }
      table.dataTable.display>tbody>tr.odd>.sorting_1, table.dataTable.order-column.stripe>tbody>tr.odd>.sorting_1,table.dataTable.stripe>tbody>tr.odd>*, table.dataTable.display>tbody>tr.odd>*{
              box-shadow: none !important;
      }
          table.dataTable.display>tbody>tr.even>.sorting_1, table.dataTable.order-column.stripe>tbody>tr.even>.sorting_1 {
        box-shadow: none !important;
    }
    table.dataTable>thead>tr>th, table.dataTable>thead>tr>td {
    padding: 10px;
    border-bottom: 0px solid rgba(0, 0, 0, 0.3) !important;
    }
    .dataTables_length{
      margin-bottom: 30px;
    }
    .dataTables_info,.dataTables_paginate{
            margin-top: 20px;
    }
    #quizList thead tr{
    background: #06BBCC;
    text-transform: uppercase;
    color: #fff;
    }
    div.correct-answer{
    color: #06BBCC;
    margin-top: 10px;
    }
    .question{
            margin-bottom: 10px;
        color: red;
    }
    table.dataTable.no-footer {
        border-bottom: 0 !important;
    }
    table.dataTable.hover>tbody>tr:hover>*, table.dataTable.display>tbody>tr:hover>* {
    box-shadow: none !important;
}
</style>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col    visibility: hidden;-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Questions and Answers List</h1>
               
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<!-- middle content starts-->
<div class="container py-4 table-section">
    <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
        <h1 class="display-4 mb-0 text-center animated slideInDown">Add Questions and Answer</h1>
        <p class="slideInDown data-saved"> Data saved successfully.</p>
        <form   method="POST"
      enctype="multipart/form-data"
      id="question-and-answer"
      novalidate="novalidate">
            <div class="row g-3">
                 <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" required class="form-control" name="questions" id="questions" placeholder="Questions">
                        <label for="name">Add Questions</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="option_1" id="option_1" placeholder="option 1">
                        <label for="name">option 1</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="option_2" id="option_2" placeholder="option 2">
                        <label for="email">option 2</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="option_3" id="option_3" placeholder="option 3">
                        <label for="subject">option 3</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="option_4" id="option_4" placeholder="option 4">
                        <label for="subject">option 4</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <select name="correct_option" name="correct_option" class="form-select">
                          <option value="">Select correct answer option</option>
                          <option value="1">option 1</option>
                          <option value="2">option 2</option>
                          <option value="3">option 3</option>
                          <option value="4">option 4</option>
                        </select>
                        
                    </div>
                </div>
              
                <div class="col-6">
                    <button class="btn btn-primary w-100 py-3 submit" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
<!-- Table start  -->
<div class="container py-5 mb-5">
    <h1 class="display-4 text-center mb-4 animated slideInDown">Questions and Answer List</h1>
    <div class="row table-section">
        <div class="col-12">
            <table id="quizList" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="increase-width">Question and Answer</th>
                        <th>Submitted Date</th>
                        <th>Action</th>
                    </tr>
                    
                    
                </thead>
                <tbody> 
                <?php 
                    $query =  "SELECT * FROM questionAndAnswer";
                    $result = mysqli_query($connect,$query);
                    while($row = mysqli_fetch_array($result,1)){
                ?>
                <tr>
                    
                    <td class="increase-width">
                        <div class="question"><i class="fa fa-arrow-right text-primary me-2"></i><storng>Question: </storng><?php echo $row['questions']?></div>
                        <div><storng>Option 1: </storng><?php echo $row['option_1']?></div>
                        <div><storng>Option 2: </storng><?php echo $row['option_2']?></div>
                       <div><storng>Option 3: </storng><?php echo $row['option_3']?></div>
                        <div><storng>Option 4: </storng><?php echo $row['option_4']?></div>
                        <div class='correct-answer'><storng>Correct Answer: </storng>
                            <?php 
                                 if($row['correct_option']==1){
                                     echo $row['option_1'];
                                 }else if($row['correct_option']==2){
                                     echo $row['option_2'];
                                 }else if($row['correct_option']==3){
                                     echo $row['option_3'];
                                 }else if($row['correct_option']==4){
                                     echo $row['option_4'];
                                 }
                            
                            ?>
                        </div>
                        
                    </td>
                    
                    <td>
                        <?php echo $row['date']?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-primary py-md-3 px-md-5 me-3 animated delete" id="<?php echo $row['id']?>"   class="delete" >Delete</a>
                    </td>
                    
                </tr>
                <?php 
                    }
                ?>
                </tbody>
            
            </table>
        </div>
    </div>
    
</div>

<!-- middle content End-->


<?php

     include_once '../footer.php';
?>
<link href="datatables.min.css" rel="stylesheet">
<script src="datatables.min.js"></script>

<script>
      $(document).ready(function ($) {
       $('#quizList').DataTable({
            "lengthMenu": [ [2, 10, 25, 50, -1], [2, 10, 25, 50, "All"] ], // Customize the options
            "pageLength": 2 // Set the default page length to 5
            // Additional DataTable options...
        });
       
        $(".delete").off("click");
         $( document ).on( "click", ".delete", function() {
             if (window.confirm('Are you sure you want to delet?')) {
                let fileName = $(this).attr('filename');
                let id = $(this).attr('id');
                var row = $(this).closest('tr');
                
                $.ajax({
                  type: "GET",
                  url: "insert-question-answer.php?id="+id,
                  dataType: "json",
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function (response) {
                    row.fadeOut(500, function() {
                        row.remove();
                    });
                  }
                });
                
             }
          
         });

        // validation plus jobs data displaying 
        $("#question-and-answer").validate({
          rules: {
            
            'questions': {
              required: true,
            },
            'option_1': {
              required: true,
            },
            'option_2': {
              required: true,
            },
            'option_3': {
              required: true,
            },
            'option_4': {
              required: true,
            },
            'correct_option':{
                  required: true, 
            }
          },
          messages: {
           
            'questions': {
              required: "This field is required",
            },
            'option_1': {
              required: "This field is required",
            },
            'option_2': {
              required: "This field is required",
            },
            'option_3': {
              required: "This field is required",
            },
            'option_4': {
              required: "This field is required",
            },
             'correct_option': {
              required: "This field is required",
            }
          },
          submitHandler: function (form) {
             $(".loader-section").show();
              if ($.fn.DataTable.isDataTable('#quizList')) {
               $('#quizList').DataTable().clear().destroy();
              }
            $.ajax({
              type: "POST",
              url: "insert-question-answer.php",
              data: new FormData(form),
              dataType: "json",
              contentType: false,
              cache: false,
              processData: false,
              beforeSend: function () {
                $('.submit').attr("disabled",true);
              },
              success: function (response) {
                
                $(".data-saved").css('visibility', 'visible');
                document.getElementById("question-and-answer").reset();
                setTimeout(() => {
                  $(".data-saved").css('visibility', 'hidden');
                  location.reload();
                }, 3000);
                
                
              },
            });
            
            
          },
        });
        
        
        
      });
    </script>