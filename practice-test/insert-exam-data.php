<?php 
    $servername = 'localhost';
    $dbuser = 'bizpr3nz_bizprephub';
    $dbpass = 'bizprephub';
    $database = 'bizpr3nz_bizprephub';
    $connect = mysqli_connect($servername, $dbuser, $dbpass, $database);

    $questionAndAnswer_id = $_GET['optionsId'];
    $examTime_id = $_GET['examId'];
    $selected_option = $_GET['optionValue'];


    if($questionAndAnswer_id!=''){
        // 1. Check if the row already exists
        $checkSql = "SELECT exam_id  FROM examResult WHERE questionAndAnswer_id = '$questionAndAnswer_id' AND examTime_id = '$examTime_id'";
        $checkResult = mysqli_query($connect, $checkSql);
        
      if (mysqli_num_rows($checkResult) > 0) {
            // 2. If exists, update the selected_option
            $updateSql = "UPDATE examResult 
                          SET selected_option = '$selected_option' 
                          WHERE questionAndAnswer_id = '$questionAndAnswer_id' 
                          AND examTime_id = '$examTime_id'";
            mysqli_query($connect, $updateSql);
        } else {
            // 3. Else, insert new row
            $insertSql = "INSERT INTO examResult (questionAndAnswer_id, examTime_id, selected_option)
                          VALUES ('$questionAndAnswer_id', '$examTime_id', '$selected_option')";
            mysqli_query($connect, $insertSql);
        }
        
    }  
    
    if($_GET['examIds']!=''){
        
        
        $examTime_id = $_GET['examIds'];
        $sql = "SELECT COUNT(*) AS total FROM examResult WHERE examTime_id = '$examTime_id'";
        $result = mysqli_query($connect, $sql);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $count = $row['total'];
           // echo $count;
        } else {
            echo "Error: " . mysqli_error($connect);
        }
        
        $sql = "SELECT selected_option, questionAndAnswer_id FROM examResult WHERE examTime_id = '$examTime_id'";
        $result = mysqli_query($connect, $sql);
        
        $correctOptionCount = 0;
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $optionId = $row['questionAndAnswer_id'];
        
            $innerSql = "SELECT correct_option FROM questionAndAnswer WHERE id = '$optionId'";
            $innerResult = mysqli_query($connect, $innerSql);
        
            while ($correctAns = mysqli_fetch_array($innerResult, MYSQLI_ASSOC)) {
                if ($row['selected_option'] == $correctAns['correct_option']) {
                    ++$correctOptionCount;
                }
            }
        }
        
        echo $count ."#". $correctOptionCount;

        
        //echo $correctOptionCount;
        
    }
    

?>