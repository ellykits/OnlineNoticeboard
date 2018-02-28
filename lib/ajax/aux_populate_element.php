<?php 
require_once "../../lib/Database.php";
require_once "../../lib/Department.php";
require_once "../../lib/Course.php";

if(isset($_POST['field_code'])&& isset($_POST['flag'])){
    
    $primary_key = $_POST['field_code'];    
    $new_dept = new Department(new Database);
    $course = new Course(new Database);
    
    $returned_list = "--displaying--";
     
    if($_POST['flag'] ==='pop_depts'){  
        $returned_list = $new_dept->populateDepartments($primary_key);
        echo  $returned_list;
    }else if($_POST['flag'] ==='pop_courses'){
         $returned_list = $course->populateCourses($primary_key);
        echo  $returned_list;
    }
    
}else{
    echo "something went wrong!";
}
?>