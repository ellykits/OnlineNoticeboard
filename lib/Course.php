<?php
class Course{
    protected $the_database;
   
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    public function addCourse(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->insertRecord('courses',$data);
       if($isInserted){
            echo "1";
        }else{
            echo "0";
       
        }
        
    }
 
     public function getCourses(){
        $course_fields = array('course_no','dept_no','course_name');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM courses","courses",$course_fields,true,false,"course");
        return $details;
    }
    
    public function editCourse(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('course_no','courses',$data);
        if($isInserted){
            echo "1";
        }else{
            echo "0";
       
        }
        
    }
    
    public function getOneCourseRecord($course_no){
         $this->the_database->connectToDatabase();      
         $sql = "SELECT * FROM courses WHERE course_no = '$course_no'";
         return $this->the_database->run($sql);
    }
   //Delete COD
   public function removeCourse($course_no){
        $this->the_database->connectToDatabase();
        return $this->the_database->deleteRecord('courses','course_no',$course_no);    
   }
  
    public function countRecords ($table){
        $this->the_database->connectToDatabase();
        $total_count = $this->the_database->run("SELECT COUNT(*) as total_count FROM $table");
        return $total_count;
    }
     public function populateCourses($dept){
        
        $conn = $this->the_database->connectToDatabase();
        $this->the_database->connectToDatabase();
        $returned_value = $this->the_database->run("SELECT dept_no FROM depts  WHERE dept_name = '$dept'");
        $dept_code = $returned_value['dept_no'];
      
        $sql = "SELECT course_name FROM courses WHERE dept_no = '$dept_code' ORDER BY course_name";        
        $query  = $conn->prepare($sql);      
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($course_name);
            $query->store_result();
            if($query->num_rows > 0){                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "<option value ='{$course_name}'>{$course_name}</option>";
                    
                }                            
            }else{
                echo "<option value=''>--No Courses--</option>";
            }                
    
      }else{
            return $this->conn->error;
      }
        
   }

}//End of class
?>