<?php 
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
require_once "../lib/Database.php";
require_once "../lib/phpmailer/PHPMailerAutoload.php";
    
class Mailer{
    protected $the_database;
    
    public function __construct(Database $db){
        $this->the_database = $db;
    }
    public function sendEmail ($notice_no,$department,$subject,$text_msg,$html_msg,$attachment){        
        $sql  = "";
        if($department =="All"){
            $sql = "SELECT name,email FROM student";
        }else{
            $sql = "SELECT name,email FROM student WHERE department ='$department'";
        }
        $this->the_database->connectToDatabase();
        $results = $this->the_database->returnQuery($sql);
       
        $mail = new PHPMailer;
        
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'localhost';  // Specify main and backup SMTP servers
        //$mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'admin@onbs.com';                 // SMTP username
        $mail->Password = 'admin12345';                           // SMTP password
        //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;
        $mail->setFrom('admin@onbs.com', 'Online Noticeboard System');
        while($row = $results->fetch_assoc()){
             $mail->addAddress($row['email'],$row['name']);               // Add recipient email and name(optional) from database
        }       
        $mail->addReplyTo('admin@onbs.com', 'Information');
        
        
        $mail->addAttachment($attachment);         // Add attachments
            // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'NEW NOTICE FROM ONBS: '.$subject;
        $mail->Body    = $html_msg;
        $mail->AltBody = $text_msg;
        
        if(!$mail->send()) {
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            // echo "<script type='text/javascript'>showNotification('top','center','System <b>Error</b>, system failed to send the email contact admin','danger')</script>";
            return false;
               
        } else {
            /*echo 'Message has been sent';
              $notice_details = array(
                    "notice_no" => $notice_no,
                    "mailed" =>"YES"
               );*/
              // $this->the_database->returnQuery("UPDATE notice SET mailed='YES' WHERE notice_no ='$notice_no'");
               // echo "<script type='text/javascript'>showNotification('top','center','<b>Email sent to  Students Successfuly</b>, The email has been sent to all the targeted students ','success')</script>";
            return true; 
        }
    }//End of send mail
}// End of Class Mailer
?>