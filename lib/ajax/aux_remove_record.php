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

if(isset($_POST['unique_code']) && isset($_POST['flag'])){
      if($_POST['flag'] == "cod"){
            $job_code = $_POST['unique_code'];
            echo $cod->removeCOD($job_code);
      }else if($_POST['flag'] == "std"){
            $std_no = $_POST['unique_code'];
            echo $std->removeStudent($std_no);        
      }else if($_POST['flag'] == "note"){
            $ntc_no = $_POST['unique_code'];
            echo $ntc->removeNotice($ntc_no);
      }else if($_POST['flag'] == "dept"){
            $dept_no = $_POST['unique_code'];
            echo $dept->removeDepartment($dept_no);
      }else if($_POST['flag'] == "course"){
            $course_no = $_POST['unique_code'];
            echo $course->removeCourse($course_no);
      }
    
    
    
}else{
    echo "<script>showNotification('top','center','ERROR <b>Encountered</b>, system failed to update COD info','alert')</script>";
       
}


?>