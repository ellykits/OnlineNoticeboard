<?php

class Student{
    protected $the_database; 
    
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    public function addStudent(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->insertRecord('student',$data);
       if($isInserted){
            echo "1";
        }else{
            echo "0";
       
        }
        
    }
    public function loginStudent($username,$email,$password){
        $this->the_database->connectToDatabase();      
        $sql = "SELECT student_no,username, password,email,responsibility,position,name FROM  student  WHERE email ='$email' AND password
         ='$password'  OR username ='$username' AND password ='$password'";        
      
      $results = array();
      $query = $this->the_database->returnQuery($sql);
            if($query){
                  if($query->num_rows > 0){                   
                        $results = $query->fetch_assoc();
                        $_SESSION['current_user'] = $results['name'];
                        $_SESSION['user_id'] = $results['student_no'];
                        $_SESSION['role'] = $results['position'];
                        
                        if(trim($results['responsibility']) == "Regular"){
                              echo "<script type='text/javascript'>setTimeout(function(){ window.location ='./student/dashboard.php'},2000)</script>";
                        
                        }else if (trim($results['responsibility']) == "Leader"){
                            echo "<script type='text/javascript'>setTimeout(function(){ window.location ='./poster/student_dashboard.php'},2000)</script>";
                        
                        }else{
                                 echo "<script type='text/javascript'>setTimeout(function(){ window.location ='./forbidden.php'},2000)</script>";
                        
                        }
                  }else{
                        echo "<script type='text/javascript'>showNotification('top','center','Login <b>Failed</b>, please check your username, email or password','danger')</script>";
                        
                  }
            }else{
                die($this->the_database->getError());
                 echo "<script type='text/javascript'>showNotification('top','center','System <b>Error</b>, system failed contact admin','warning')</script>";
                
            }
                        
    }
     public function getStudentsDetails(){
        $student_fields = array('student_no','name','responsibility','course','gender','phone');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM student","student",$student_fields,true,false,"std");
        return $details;
    }
     public function displayStudentReport(){
        $student_fields = array('student_no','name','responsibility','course','gender','phone');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM student","student",$student_fields,false,false,"std");
        return $details;
    }
    public function editStudent(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('student_no','student',$data);
        if($isInserted){
            echo "1";
        }else{
            echo "0";       
        }
        
    }
     public function updateStudent(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('student_no','student',$data);
        if($isInserted){
            echo "<script>showNotification('top','center','Update <b>Successful</b>, your info has been updated','success');setTimeout(function(){
                window.location = './regular_student.php'   
            },1000);</script>";
        }else{
            echo "<script>showNotification('top','center','Update <b>Failed</b>, system failed to update your info','alert')</script>";
       
        }
        
    }
     public function updateStudentLeader(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('student_no','student',$data);
        if($isInserted){
            echo "<script>showNotification('top','center','Update <b>Successful</b>, your info has been updated','success');setTimeout(function(){
                window.location = './student_profile.php'   
            },1000);</script>";
        }else{
            echo "<script>showNotification('top','center','Update <b>Failed</b>, system failed to update your info','alert')</script>";
       
        }
        
    }
    public function getStudentRecord($student_no){
         $this->the_database->connectToDatabase();        
         $sql = "SELECT * FROM student WHERE student_no = '$student_no'";
         return $this->the_database->run($sql);
    }
   //Delete a student
   public function removeStudent($student_no){
        $this->the_database->connectToDatabase();
        return $this->the_database->deleteRecord('student','student_no',$student_no);    
   }
    //Delete All Students
   public function removeAllStudents(){
        $this->the_database->connectToDatabase();
        return $this->the_database->returnQuery("DELETE FROM student");    
   }

}//End of class
