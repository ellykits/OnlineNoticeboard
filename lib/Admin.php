<?php
class Admin{
    protected $the_database;
    
    public function __construct(Database $db){
        $this->the_database = $db;
    }
   public function loginAdmin($username,$password){
        $this->the_database->connectToDatabase();      
        $sql = "SELECT username, password,email,name FROM  admin  WHERE username ='$username' AND password
         ='$password'  OR email ='$username' AND password ='$password'";        
      
      $results = array();
      $query = $this->the_database->returnQuery($sql);
            if($query){
                  if($query->num_rows > 0){                   
                        $results = $query->fetch_assoc();
                        $_SESSION['current_user'] = $results['name'];
                        $_SESSION['user_id'] = $results['username'];
                        $_SESSION['role'] = "ADMINISTRATION";   
                                        
                        echo "<script type='text/javascript'>setTimeout(function(){ window.location ='./dashboard.php'},2000)</script>";
                        
                        
                  }else{
                      
                      // echo "<script type='text/javascript'>showNotification('top','center','Admin Login <b>Failed</b> Either the username or password is NOT correct','danger')</script>";
                       return "false"; 
                  }
            }else{
                 echo "<script type='text/javascript'>showNotification('top','center','System <b>Error</b>, system failed contact admin','danger')</script>";
                
            }
                        
    }
    public function addAdministrator(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->insertRecord('admin',$data);
        if($isInserted){
            //die("Success");
            echo "<script>showNotification('top','center')</script>";
        }
        
    }
     public function editAdministrator(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('username','admin',$data);
        if($isInserted){
            echo "<script>showNotification('top','center','Update <b>Successful</b>, your info has been updated','success');setTimeout(function(){
                window.location = './admin_profile.php'   
            },1000);</script>";
        }else{
            echo "<script>showNotification('top','center','Update <b>Failed</b>, system failed to update your info','alert')</script>";
       
        }
        
    }
     public function deleteAdministrator(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->insertRecord('admin',$data);
        if($isInserted){
            die("Success");
        }
        
    }
    public function getAdminDetails($admin){        
        $this->the_database->connectToDatabase();   
        //$admin = $this->the_database->validateData($admin);     
        $details = $this->the_database->run("SELECT * FROM admin WHERE username = '{$admin}'");
        return $details;
    }
    
    public function countRecords ($table){
        $this->the_database->connectToDatabase();
        $total_count = $this->the_database->run("SELECT COUNT(*) as total_count FROM $table");
        return $total_count;
    }
  
   public function getEmailRecipients($dept){
        $sql  = "";
        if($dept =="All"){
            $sql = "SELECT name,email,department,course FROM student";
        }else{
            $sql = "SELECT name,email, department,course FROM student WHERE department ='$dept'";
        }
        $this->the_database->connectToDatabase();
        $results = $this->the_database->returnQuery($sql);
        return $results;
   }
    
}

?>