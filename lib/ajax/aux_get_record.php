<?php 
require_once "../../lib/Database.php";
require_once "../../lib/COD.php";
require_once "../../lib/Student.php";
require_once "../../lib/Notice.php";
require_once "../../lib/Department.php";
require_once "../../lib/Course.php";

$cod = new COD(new Database);
$std = new Student(new Database);
$ntc = new Notice(new Database);
$dept = new Department(new Database);
$course = new Course(new Database);

if(isset($_POST['unique_code']) && isset($_POST['flag']) && $_POST['flag']=="cod"){
    $results =  $cod->getCODRecord($_POST['unique_code']);
    echo json_encode($results);
}else if(isset($_POST['unique_code']) && isset($_POST['flag']) && $_POST['flag']=="std"){
     $results =  $std->getStudentRecord($_POST['unique_code']);
    echo json_encode($results);
}else if(isset($_POST['unique_code']) && isset($_POST['flag']) && $_POST['flag']=="note"){
     $results =  $ntc->getNoticeRecord($_POST['unique_code']);
    echo json_encode($results);
}else if(isset($_POST['unique_code']) && isset($_POST['flag']) && $_POST['flag']=="dept"){
     $results =  $dept->getOneDeptRecord($_POST['unique_code']);
    echo json_encode($results);
}else if(isset($_POST['unique_code']) && isset($_POST['flag']) && $_POST['flag']=="course"){
     $results =  $course->getOneCourseRecord($_POST['unique_code']);
    echo json_encode($results);
}else{
    echo "<script>showNotification('top','center','ERROR <b>Encountered</b>, system failed to update COD info','alert')</script>";
       
}
?>