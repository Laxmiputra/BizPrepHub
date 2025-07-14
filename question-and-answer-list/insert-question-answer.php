<?php 
$servername = 'localhost';
$dbuser = 'bizpr3nz_bizprephub';
$dbpass = 'bizprephub';
$database = 'bizpr3nz_bizprephub';
$connect = mysqli_connect($servername, $dbuser, $dbpass, $database);

//Check connection
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

$questions = $_POST['questions'];
$option_1 = $_POST['option_1'];
$option_2 = $_POST['option_2'];
$option_3 = $_POST['option_3'];
$option_4 = $_POST['option_4'];
$correct_option = $_POST['correct_option'];

if($questions!='' && $option_1!=''&& $option_2!=''){

//insert questions data
    $sql = "INSERT INTO questionAndAnswer (questions, option_1,option_2,option_3,option_4,correct_option,date) VALUES ('".$questions."', '".$option_1 ."', '".$option_2."', '".$option_3."', '".$option_4."', '".$correct_option."','".date('d M Y')."')";
    
    $result = mysqli_query($connect,$sql);

}

//delete questions data
if($_GET['id']){
    $query =  " DELETE FROM  questionAndAnswer WHERE id = '".$_GET['id']."'";  
    mysqli_query($connect,$query);  
}

//retrive questions data
$query =  "SELECT * FROM questionAndAnswer";
$result = mysqli_query($connect,$query);
while($row = mysqli_fetch_array($result,1)){
    $response['quizList'][] = $row;
}
echo json_encode($response);


?>
