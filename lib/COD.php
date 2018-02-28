<?php
class COD{
    protected $the_database;
    protected $current_COD;
    
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    public function addCOD(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->insertRecord('cod',$data);
       if($isInserted){
            echo "1";
        }else{
            echo "0";
       
        }
        
    }
    public function loginCOD($username,$password){
        $this->the_database->connectToDatabase();      
        $sql = "SELECT job_code,username, password,name,department FROM  cod  WHERE username ='$username' AND password
         ='$password'  OR job_code ='$username' AND password ='$password'";        
      
      $results = array();
      $query = $this->the_database->returnQuery($sql);
            if($query){
                  if($query->num_rows > 0){                   
                        $results = $query->fetch_assoc();
                        $_SESSION['current_user'] = $results['name'];
                        $_SESSION['user_id'] = $results['job_code'];
                        $_SESSION['role'] = $results['department']." (COD)";   
                        $_SESSION['dept'] = $results['department'];
                                        
                        echo "<script type='text/javascript'>setTimeout(function(){ window.location ='../poster/cod_dashboard.php'},2000)</script>";
                        
                        
                  }else{
                       // echo "<script type='text/javascript'>showNotification('top','center','Login <b>Failed</b>, please check your username, email or password','alert')</script>";
                      
                       //echo "<script type='text/javascript'>showNotification('top','center','Login <b>Failed</b> Either the username or password is NOT correct','danger')</script>";
                       return "false"; 
                  }
            }else{
                 echo "<script type='text/javascript'>showNotification('top','center','System <b>Error</b>, system failed contact admin','danger')</script>";
                
            }
                        
    }
     public function getCODDetails(){
        $cod_fields = array('job_code','name','department','faculty','phone');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM cod","cod",$cod_fields,true,false,"cod");
        return $details;
    }
     public function displayCODReport(){
        $cod_fields = array('job_code','name','department','faculty','phone');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM cod","cod",$cod_fields,false,false,"cod");
        return $details;
    }
    public function editCOD(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('job_code','cod',$data);
        if($isInserted){
            echo "1";
        }else{
            echo "0";
       
        }
        
    }
     public function updateCOD(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('job_code','cod',$data);
        if($isInserted){
            echo "<script>showNotification('top','center','Update <b>Successful</b>, your info has been updated','success');
            setTimeout(function(){
                window.location = './cod_profile.php'   
            },1000);
            </script>";
        }else{
            echo "<script>showNotification('top','center','Update <b>Failed</b>, system failed to update your info','alert')</script>";
       
        }
        
    }
    public function getCODRecord($job_code){
         $this->the_database->connectToDatabase();
        // $job_code = $this->the_database->validateData($job_code);
         $sql = "SELECT * FROM cod WHERE job_code = '$job_code'";
         return $this->the_database->run($sql);
    }
   //Delete COD
   public function removeCOD($job_codes){
        $this->the_database->connectToDatabase();
        return $this->the_database->deleteRecord('cod','job_code',$job_codes);    
   }
   //Remove all CODs
    public function removeAllCODs(){
        $this->the_database->connectToDatabase();
        return $this->the_database->returnQuery("DELETE FROM cod");    
   }
    public function countRecords ($table,$user_id){
        $this->the_database->connectToDatabase();
        $total_count = $this->the_database->run("SELECT COUNT(*) as total_count FROM $table WHERE posted_by ='$user_id'");
        return $total_count;
    }

}//End of class
?>