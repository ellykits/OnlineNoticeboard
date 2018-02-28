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

date_default_timezone_set("Africa/Nairobi");

if (isset($_POST['flag']) && $_POST['flag'] == 'cod'){
    if(isset($_POST['job_code']) && isset($_POST['dept']) && isset ($_POST['faculty'])){
      
       $job_code = $_POST['job_code'];
       $dept = $_POST['dept'];
       $name = $_POST['full_name'];
       $job_title = $_POST['job_title'];    
       $faculty = $_POST['faculty'];   
       $gender = $_POST['gender'];
       $p_address =$_POST['p_address'];
       $p_code =$_POST['p_code'];
       $username = $_POST['job_code'];
       $password = $_POST['job_code'];
       $phone = $_POST['phone'];
    
       $cod_details = array(
        'job_code' => $job_code,
        'username' => $username,
        'password'=>$password,
        'name'=>$name,
        'job_title' => $job_title,
        'department' => $dept,
        'faculty' =>$faculty,
        'gender' => $gender,
        'p_address' => $p_address, 
        'p_code' => $p_code,
        'phone' => $phone
        );
        
        //Add the new COD through the addCOD function in the COD Class
       echo $is_cod_added = $cod->addCOD($cod_details); 
        
    }else{
        echo "0";
    }
}else if (isset($_POST['flag']) && $_POST['flag'] == 'std' ){
     $std_details = array(
        'student_no' => $_POST['student_no'],
        'name'=>$_POST['full_name'],
        'username' => $_POST['student_no'],
        'password'=>$_POST['student_no'],        
        'responsibility' => $_POST['responsibility'],   
        'position' => $_POST['position'],       
        'department' =>$_POST['dept'],
        'course' => $_POST['course'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],  
        'phone' => $_POST['phone'],
        'p_address' => $_POST['p_address'],
        'p_code' => $_POST['p_code']
        );
     echo $std->addStudent($std_details); 
    
}else if (isset($_POST['flag']) && $_POST['flag'] == 'note'){
    $posted_time =  date("h:m:s",time());
    $date=date("Y-m-d");    

    $ntc_details = array(
        'notice_no' => $_POST['notice_no'],
        'posted_by'=>$_POST['posted_by'],
        'date_posted' => date("Y-m-d",strtotime($date)),
        'time_posted'=>$posted_time,        
        'subject' => $_POST['subject'],       
        'details' =>$_POST['details'],
        'file_location' => $_POST['uploaded_file']
    );
    $ntc->addNotice($ntc_details);
    
}else if (isset($_POST['flag']) && $_POST['flag'] == 'dept'){
    $dept_details = array(
        'dept_no' => $_POST['dept_no'],
        'faculty'=>$_POST['faculty'],        
        'dept_name'=> $_POST['dept_name']        
    );
    echo $dept->addDepartment($dept_details);
}else if (isset($_POST['flag']) && $_POST['flag'] == 'course'){
    $course_details = array(
        'course_no' => $_POST['course_no'],
        'dept_no'=>$_POST['dept_no'],        
        'course_name'=> $_POST['course_name']        
    );
    echo $course->addCourse($course_details);
}


?>