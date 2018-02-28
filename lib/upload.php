<?php
$attachment ="No Upload";
$file_uploaded_path ="";
$shouldSubmitData = true;
if (isset($_FILES['uploaded_file']['name'])){  
	$attachment = $_FILES['uploaded_file']['name'];
	$size = $_FILES['uploaded_file']['size'];
	$type = $_FILES['uploaded_file']['type'];
	$temp_name= $_FILES['uploaded_file']['tmp_name'];
	$directory = "../notices";
	$file_uploaded_path="";	
	$message ="";
	$location = "";
	global $shouldSubmitData;
    /**
	   *Check if The directory already exists for the users in the notices folder. If true proceed to append the uploaded
	   *file otherwise check if file already exists in the folder. If it does not 
        add the file to the notices directory
	*/
    $id = $_SESSION['current_user']."-".$_SESSION['role'];
	if(!file_exists($directory.'/'.$id)){
        $flag= true;
        mkdir($directory.'/'.$id);				
        //echo "A Directory called [{$id}] has been created inside [{$directory}]";							
													
	}
	$fileExtension = substr($attachment,strpos($attachment,'.')+ 1);	

	$nameDirectory = $id; 	//Name of the directory for the user
	global $location;
	$location = $directory.'/'.$id.'/'; //Path to the users directory
			
	//Limit the file extension to be uploaded any file extension that is not recognized is not allowed
	$whitelist = array("txt","jpg","png","gif","jpeg","mp4","mp3","ogg","wav", "3gpp","3gp",
     "mpeg","docx","doc","pdf","ppt","xls","xlsx","pptx","pub","pubx","zip","rar");
					
	$flag = true;			
	foreach ($whitelist as $ext){
	   $flag=true;
	   //echo "$ext => $fileExtension<br>";
	   //Compare file extension against the ones allowed in the white list 
	   //if extension is found break proceed to upload file otherwise display warning to user 
	   if((strcasecmp($fileExtension,$ext)==0 && $type !="application/octet-stream")){				                
            //Code to upload file to the directory of the user that already exists.
	       if(!file_exists($directory.'/'.$id.'/'.$attachment)){
    	       move_uploaded_file($temp_name,$location.$attachment);
    	       //echo "File {$attachment} has been uploaded to directory called [{$id} ]inside [{$directory}]directory!";
    	       $message =  "<script>showNotification('top','center','File Upload  <b>Successful</b>, the file has been successfully uploaded','info');</script>";
                                    
	       }else{
                //echo "The file is already existing in directory";
                //End execution of script here do not proceed to upload to the database;                                   
				$message = "<script>showNotification('top','center','File Upload <b>Failed</b>, the file  ALREADY EXISTS','warning');</script>";
                				                                 
	       }						
	       break;		
	 } else{
		$flag=false;
		continue;
     }
					
   }//End of foreach
				
	/*
	Check if the value of flag if false meaning the file has not been attached beacuse
	of its extension
				*/
    if(!empty($_FILES['uploaded_file']['name'])){
		
         if($flag == false){
			 $shouldSubmitData = false;
	   //echo "Your file could not be attachmented because the type of file you try to attachment
	   //is not allowed. Please attachment only supported images, audio or video!";
        $attachment = "";
		
	    $message = "<script>showNotification('top','center','ERROR <b>Encountered</b>, system failed to upload the file','danger');
               showNotification('top','center','The  <b></b>, extension of the file is NOT ALLOWED or file size is too large!','warning');</script>";
            
				               
                    
	   }           
    }
    
 $file_uploaded_path =$location.$attachment;

}
?>