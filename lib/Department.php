<?php
class Department{
    protected $the_database;
   
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    public function addDepartment(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->insertRecord('depts',$data);
       if($isInserted){
            echo "1";
        }else{
            echo "0";
       
        }
        
    }
 
     public function getDepartments(){
        $dept_fields = array('dept_no','faculty','dept_name');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM depts","depts",$dept_fields,true,false,"dept");
        return $details;
    }
    
    public function editDepartment(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('dept_no','depts',$data);
        if($isInserted){
            echo "1";
        }else{
            echo "0";
       
        }
        
    }
    
    public function getOneDeptRecord($dept_no){
         $this->the_database->connectToDatabase();       
         $sql = "SELECT * FROM depts WHERE dept_no = '$dept_no'";
         return $this->the_database->run($sql);
    }
   //Delete Dept
   public function removeDepartment($dept_no){
        $this->the_database->connectToDatabase();
        return $this->the_database->deleteRecord('depts','dept_no',$dept_no);    
   }
  
    public function countRecords ($table){
        $this->the_database->connectToDatabase();
        $total_count = $this->the_database->run("SELECT COUNT(*) as total_count FROM $table");
        return $total_count;
    }
    public function loadDepartments(){
          $this->the_database->connectToDatabase();      
         $sql = "SELECT DISTINCT * FROM depts";
         return $this->the_database->returnQuery($sql);
    }
    public function loadFaculties(){
          $this->the_database->connectToDatabase();      
         $sql = "SELECT DISTINCT faculty FROM depts";
         return $this->the_database->returnQuery($sql);
    }
    public function populateDepartments($faculty){
        $conn = $this->the_database->connectToDatabase();
        $sql = "SELECT * FROM depts WHERE faculty = '$faculty' ORDER BY dept_name ASC, faculty";        
        $query  = $conn->prepare($sql);      
        $execute = $query->execute();
        
      if($execute){
            $query->bind_result($dept_no,$faculty,$dept_name);
            $query->store_result();
            if($query->num_rows > 0){                
                while( $query->fetch()){
                    //Polpulate the branches list to add in the select component and display in to the browser                                       
                   echo "<option value ='{$dept_name}'>{$dept_name}</option>";
                    
                }                            
            }else{
                echo "<option value=''>--No Departments--</option>";
            }                
    
      }else{
            return $this->conn->error;
      }
        
   }
    

}//End of class
?>