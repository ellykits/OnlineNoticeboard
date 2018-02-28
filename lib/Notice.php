<?php

class Notice{
    protected $the_database; 
    
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    public function addNotice(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->insertRecord('notice',$data);
       if($isInserted){
           return "1";
        }else{
            //echo $this->the_database->getError();
            return "0";      
        }
        
    }
     public function getNotices($posted_by){
        $notice_fields = array('notice_no','posted_by','time_posted','subject');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM notice where posted_by ='$posted_by'","notice",$notice_fields,true,true,"note");
        return $details;
    }
    public function getAllNotices(){
        $notice_fields = array('notice_no','posted_by','time_posted','subject','sent_to','mailed');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM notice ORDER BY notice_no DESC","notice",$notice_fields,true,true,"note");
        return $details;
    }
    public function displayNoticeReport(){
        $notice_fields = array('notice_no','posted_by','time_posted','subject',);
        $this->the_database->connectToDatabase();            
        $details = $this->the_database->tabulateResults("SELECT * FROM notice  ORDER BY notice_no DESC","notice",$notice_fields,false,false,"note");
        return $details;
    }
     public function displayNoticeReportByUser($user_id){
        $notice_fields = array('notice_no','time_posted','subject','doc_name');
        $this->the_database->connectToDatabase();            
        $details = $this->the_database->tabulateResults("SELECT * FROM notice WHERE posted_by ='$user_id'","notice",$notice_fields,false,false,"note");
        return $details;
    }
     public function studentViewNotices(){
        $notice_fields = array('notice_no','posted_by','time_posted','subject');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM notice  ORDER BY notice_no DESC","notice",$notice_fields,false,true,"note");
        return $details;
    }
    public function showNoticeByTarget($target){
        $notice_fields = array('notice_no','posted_by','time_posted','subject');
        $this->the_database->connectToDatabase();  
             
        $details = $this->the_database->tabulateResults("SELECT * FROM notice WHERE sent_to = '$target' ORDER BY notice_no DESC","notice",$notice_fields,false,true,"note");
        return $details;
    }
    public function editNotice(array $data){
        $this->the_database->connectToDatabase();
        $isInserted = $this->the_database->updateRecord('notice_no','notice',$data);
        if($isInserted){
            echo "1";
        }else{
            echo "0";       
        }
        
    }
    public function getNoticeRecord($notice_no){
         $this->the_database->connectToDatabase();        
         $sql = "SELECT * FROM notice WHERE notice_no = '$notice_no'";
         return $this->the_database->run($sql);
    }
   //Delete NOTICE ny number
   public function removeNotice($notice_no){
        $this->the_database->connectToDatabase();
        return $this->the_database->deleteRecord('notice','notice_no',$notice_no);    
   }
   public function removeNoticeByDate($from,$to){
        $this->the_database->connectToDatabase();
        $sql = "DELETE FROM notice WHERE time_posted >=TIMESTAMP('$from') AND time_posted <= TIMESTAMP('$to')";
        //echo $sql;
        return $this->the_database->returnQuery($sql);    
   }
   public function removeAllNotices(){
        $this->the_database->connectToDatabase();
        return $this->the_database->returnQuery('Delete FROM notice');  
   }
   
   //Function to display notices in the index page 
   public function selectAllNotices($sql){
        $this->the_database->connectToDatabase();
        return $this->the_database->returnQuery($sql);
   }
   public function displayNotices($limit){       
        $sql = "SELECT * FROM notice ORDER BY notice_no DESC LIMIT $limit";
        $query = $this->selectAllNotices($sql);
       // var_dump($query);
        $count = 1;       
        $output =  "";   
       
        while($row = $query->fetch_assoc()){
            $file_name = $row['doc_name'];
            $file_path = "";    
            if($file_name === ''){
                $show_file = "No Attachment";
                 $file_path = "#";  
            }else{
                $show_file = $file_name;
                $file_path = "noticeboard/".$row['file_location'];    
            }
            
            $part = substr($row['details'],0,200);
            strlen($row['details']) > 200 ? $cont = "<a href='#login' >Login to read more...</a>":$cont = "";            
             
           $output .= "
                    <div class='col-sm-4' style='margin-bottom:20px;'>
                        <div class=\"card\" style='padding:15px;'> 
                            <img class='card-image' src='assets/img/note4.png' width='30%' height='30%'/>                          
                            <div class=\"card-block\">
                              <strong><p class=\"card-title\">$row[subject]</p></strong>                              
                              <p class=\"card-text\">$part $cont</p>
                              <a href='$file_path'>$show_file</a>
                            </div>
                            <div class=\"card-footer\">
                              <small class=\"text-muted\">Posted by $row[posted_by] on $row[time_posted]</small>
                            </div>
                        </div>
                    </div>";
            /*$output .= "		                    	                   
		                <div class='col-md-4 '>
								<div class='card card-inverse' style=\"background-color: #111; color:#fff; padding:7px; border-color: #333;\">
									<div class='info-title'><i class='material-icons'>message</i></div>
									<h4 class='info-title' style='color:#fff;'>$row[subject]</h4>                                    
									<p'>$part $cont</p>      
                                    <a href ='$file_path' style='color:#0a1;' >$show_file</a> 
                                    <em><p> Posted by $row[posted_by] on $row[time_posted]</p> </em>                                                                 
								</div>                                
		                    </div>	
                      ";*/
                      
            $count++;
        }
       // $output .= "</div>";
        echo $output;
   }
    public function showNotices($limit){       
        $sql = "SELECT * FROM notice ORDER BY notice_no DESC LIMIT $limit";
        $query = $this->selectAllNotices($sql);
       // var_dump($query);
        $count = 1;       
        $output =  "";   
        
        while($row = $query->fetch_assoc()){
            $file_name = $row['doc_name'];
            $file_path = "";    
            if($file_name === ''){
                $show_file = "No Attachment";
                 $file_path = "#";  
            }else{
                $show_file = $file_name;
                $file_path = "../notices/".$row['file_location'];    
            }               
            $part = substr($row['details'],0,200);
            strlen($row['details']) > 200 ? $cont = "<a href='./read_notice.php?ntc_no=$row[notice_no]'class='' title=\"$row[details]\">see more...</a>":$cont = "";            
             $output .= "
                    <div class='col-sm-4' style='margin-bottom:20px;'>
                        <div class=\"card\" style='padding:15px;'>                           
                            <div class=\"card-block\">
                              <strong><p class=\"card-title\">$row[subject]</p></strong>                              
                              <p class=\"card-text\">$part $cont</p>
                              <a href='$file_path'>$show_file</a>
                            </div>
                            <div class=\"card-footer\">
                              <small class=\"text-muted\">Posted by $row[posted_by] on $row[time_posted]</small>
                            </div>
                        </div>
                       
                    </div>";
            /*$output .= "		                    	                   
		                <div class='col-md-4'>
								<div class='card card-inverse' style=\"background-color: #111; color:#fff; padding:7px; border-color: #333;\">
									<div class='info-title'><i class='material-icons'>message</i></div>
									<h4 class='info-title' style='color:#fff;'>$row[subject]</h4>                                    
									<p'>$part $cont</p>      
                                    <a href ='$file_path' style='color:#0a1;' >$show_file</a> 
                                    <em><p> Posted by $row[posted_by] on $row[time_posted]</p> </em>                                                                 
								</div>                                
		                    </div>	
                      ";*/
                      
            $count++;
        }
        
        echo $output;
   }
   public function loadTargets(){
        $this->the_database->connectToDatabase();
        return $this->the_database->returnQuery("SELECT DISTINCT sent_to FROM notice");
   }

}//End of class
