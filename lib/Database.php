<?php
class Database{
    private $host = "localhost";
    private $db_name = "onbs";
    private $db_password = "*123*admin#";
    private $db_user ="admin";   
    private $query_error ="**LOGGED ERRORS**: <br>";
    private $db_connect;
    
    public function __construct(){
        $this->host = "localhost";
        $this->db_name = "onbs";
        $this->db_password = "*123*admin#";
        $this->db_user ="admin";   
        $this->query_error ="**LOGGED ERRORS**: <br>";
     
    }
    public function connectToDatabase(){
        
        $this->db_connect =  new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);;
        if(!$this->db_connect){
            $this->query_error .= $this->db_connect->error;
            return null;
        }
        return new mysqli($this->host,$this->db_user,$this->db_password,$this->db_name);
    }
    
    //Insert data into table 
   public function insertRecord($table,array $data){       
        $fields = implode (',',array_keys($data));
        $pure_array_values = array_values($data);        
        $new_array =  array();
        $item ="";
        for($index = 0; $index<count($pure_array_values); $index++){
            $item = $this->validateData($pure_array_values[$index]);            
            $new_array[$index] = $item;
        }      
        $values = "'" .implode("','",$new_array)."'";       
        $sql = "INSERT INTO {$table} ({$fields})VALUES ({$values})";       
        $execution = $this->db_connect->query($sql);
        //echo "SQL STATEMENT SENT: ".$sql."<br />";
        if ($execution){
           return true;
        }else{
            $this->query_error .= $this->db_connect->error;            
            echo $this->db_connect->error; 
            return false;
        }
    }
    
    //Select data from table and return the collection of fields
    public function run($sql){        
        $query = $this->db_connect->query($sql);
        if(!$query){
            $this->query_error .= $this->db_connect->error;
            return $this->query_error;
        }
        return $query->fetch_assoc();
         
    }
    
    //Select data from table and return the collection of fields
    public function returnQuery($sql){        
        $query = $this->db_connect->query($sql);
        if(!$query){
            $this->query_error .= $this->db_connect->error;
            //echo $this->query_error;
            return $this->query_error;
        }
        return $query;
         
    }
    //Function to delete record form database
    public function deleteRecord($table, $primary_key,$id){       
         $sql="DELETE FROM {$table} WHERE {$primary_key} = '$id'";
         $query = $this->db_connect->query($sql);    
         echo $sql;    
   	     if(!$query){
           	   $this->query_error .= $this->db_connect->error;
               return $this->query_error;
         }
         return true;
      
    }
    
   
    //Update any record from the table using primary key .
    public function updateRecord($primary_key,$table,array $array_of_fields){
        $first_field = array_shift($array_of_fields);
        $fields = array();
        
        foreach($array_of_fields as $field => $val) {
           $fields[] = "$field = '$val'";
        }

        $sql = "UPDATE {$table} SET " . join(', ', $fields) . " WHERE {$primary_key}  = '$first_field'";
                    
        $execution = $this->db_connect->query($sql);
        if ($execution){
            die($sql);
          
           return true;
        }else{
             echo "Take a look at this sql please: ".$sql;
             echo $this->db_connect->getError();
            return false;
        }
   }
   
   
    public function getError(){
        return $this->query_error;
    }
    
    //Function that is used against sql injections
    private function validateData($element){
    	$str = trim($element);
    	$str = htmlspecialchars($element);
    	$str = addslashes($element); 
    	return $str;
    }
    //Function that selects records from table in the mysql database and displyas it in the browser 
    //The table fields are displayed according to order they are arranged in the array
    // to use the edit and delete buttons specify isEditable to be true
    // make sure the first column/field be the primary key or specify it by its array index in the code 
    public function tabulateResults($sql, $table_name, array $array_of_fields,$isEditable,$isReadable,$class_option){
        $query = $this->db_connect->query($sql);        
        $results ="<table class='table table-hover table-condensed table-bordered' id ='{$table_name}_table'><thead>";
        if(!$query){
            $this->query_error .= $this->db_connect->error;
            return $this->query_error;
        }
        for($counter = 0; $counter<count($array_of_fields);$counter++){
            $formatted_column_name = ucwords($array_of_fields[$counter]);
            $results .= "<th class='info'>{$formatted_column_name}</th>";          
                     
        }
         if($isReadable === true){
            $results .= "<th class='info'>More</th>"; 
        }
        if($isEditable === true){
            $results .= "<th class='info'>Actions</th>"; 
        }
        
        $results .= "</thead><tbody>";
       
        while($row = $query->fetch_assoc()){
            $results .= "<tr>";
            $unique_key = $row[$array_of_fields[0]];
            for($counter = 0; $counter < count($array_of_fields);$counter++){
                $results .= "<td>{$row[$array_of_fields[$counter]]}</td>";
            }
             if($isReadable ===true){                
                   $results .= "<td><button data-unique-code='{$unique_key}' type='button' onclick=\"getRecord(this,'$class_option')\"  data-toggle='modal' data-target='#readerModal' class ='btn-info'><i  class='fa fa-elipse'></i>More</button> </td>"; 
             }
            if($isEditable === true){               
                $results .= "<td>";               
                $results .= "<button data-unique-code='{$unique_key}' type='button' onclick=\"setupEditorModal('edit');getRecord(this,'$class_option');\"  data-toggle='modal' data-target='#editorModal' class ='btn-success'><i  class='fa fa-edit'></i></button> | "; 
                $results .= "<button onclick=\"removeRecord('$class_option','$unique_key')\" type='button' data-unique-code='{$unique_key}' class='btn-warning'><i  class='fa fa-trash'></i></button>"; 
                $results .= "</td>";
            }
             $results .= "</tr>";
        }
        $results .="</tbody></table>";
        return $results;
    }
   
}

?>