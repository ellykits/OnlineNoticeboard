<?php 

require_once "../../lib/Database.php";
require_once "../../lib/COD.php";
require_once "../../lib/Student.php";
require_once "../../lib/Notice.php";

$cod = new COD(new Database);
$std = new Student(new Database);
$ntc = new Notice(new Database);

if(isset($_POST['flag'])){
      if($_POST['flag'] == "cod"){
            echo $cod->removeAllCODs(); 
            return;
      }else if($_POST['flag'] == "std"){            
            echo $std->removeAllStudents();
            return;
        
      }else if($_POST['flag'] == "note"){
            $from = $_POST['from'];
        
            $to =$_POST['to'];
            if(isset($from)&& isset($to)){
               // $from = strtotime($from);
               // $to = strtotime($to);
                 echo $ntc->removeNoticeByDate($from,$to);
                 return;
            }/*else{
                echo $ntc->removeAllNotices();
                return;
            }*/
      }
    
    
}else{
    echo "<script>showNotification('top','center','ERROR <b>Encountered</b>, system failed to perform the operation','alert')</script>";
    return; 
}


?>