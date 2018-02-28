/* Global variables*/

/* Function to get XMLHTTPObject. it returns the object otherwise null*/
function getXMLHttpObject(){
    if(window.XMLHttpRequest){
        return new XMLHttpRequest();
    }else if(window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
    }else {
         alert("Your browser does not support the required features to display some content. please upgrade to a newer version or install the latest browser");
         return null;
    }
}
function getCODInputs(){
    var job_code =encodeURIComponent( $("#id_job_code").val());
    var dept =encodeURIComponent( $("#id_dept").val());
    var full_name =encodeURIComponent( $("#id_full_name").val());   
    var phone =encodeURIComponent( $("#id_phone").val());
    var p_code =encodeURIComponent( $("#id_p_code").val());
    var p_address =encodeURIComponent( $("#id_p_address").val());
    var gender =encodeURIComponent( $("#id_gender").val());
    var faculty =encodeURIComponent( $("#id_faculty").val());
    var job_title =encodeURIComponent( $("#id_job_title").val());    
    var params = "&job_code="+job_code + "&dept="+dept + "&full_name="+full_name + "&phone="+phone
     +"&p_code="+p_code + "&p_address="+p_address + "&gender="+gender + "&faculty="+faculty + "&job_title="+job_title;
    return params;
}
function getStudentInputs(){
    var student_no =encodeURIComponent( $("#id_student_no").val());
    var responsibility =encodeURIComponent( $("#id_responsibility").val());
    var position =encodeURIComponent( $("#id_position").val());
    var full_name =encodeURIComponent( $("#id_full_name").val());
    var email =encodeURIComponent( $("#id_email").val());
    var phone =encodeURIComponent( $("#id_phone").val());
    var p_code =encodeURIComponent( $("#id_p_code").val());
    var p_address =encodeURIComponent( $("#id_p_address").val());
    var gender =encodeURIComponent( $("#id_gender").val());
    var faculty =encodeURIComponent( $("#id_faculty").val());
    var dept =encodeURIComponent( $("#id_dept").val()); 
    var course =encodeURIComponent( $("#id_course").val());   
     
    var params = "&student_no="+student_no + "&responsibility="+responsibility + "&position="+position + "&full_name="+full_name + "&phone="+phone
    +"&email="+email +"&p_code="+p_code + "&p_address="+p_address + "&gender="+gender + "&faculty="+faculty + "&dept="+dept+ "&course="+course;
    return params;
}
function getNoticeInputs(){   
    var notice_no =encodeURIComponent( $("#id_notice_no").val());   
    var subject =encodeURIComponent( $("#id_subject").val());
    var details =encodeURIComponent( $("#id_details").val());
    var posted_by =encodeURIComponent( $("#id_posted_by").val());
    var uploaded_file = encodeURIComponent ($("#id_uploaded_file").val().split(/(\\|\/)/g).pop());
    var params = "&notice_no="+notice_no + "&subject="+subject + "&details="+details + "&posted_by="+posted_by+ "&uploaded_file="+uploaded_file;
    return params;
}
function getDeptsInputs(){   
    var dept_no =encodeURIComponent( $("#dept_no").val());   
    var faculty =encodeURIComponent( $("#faculty").val());
    var dept_name =encodeURIComponent( $("#dept_name").val());   
    var params = "&dept_no="+dept_no + "&faculty="+faculty + "&dept_name="+dept_name;
    return params;
}
function getCourseInputs(){   
    var course_no =encodeURIComponent( $("#course_no").val());   
    var course_name =encodeURIComponent( $("#course_name").val());
    var dept_no =encodeURIComponent( $("#dept_no").val());   
    var params = "&course_no="+course_no + "&course_name="+course_name + "&dept_no="+dept_no;
    return params;
}
function setCODInputValues(results){
     $('#id_job_code').val(results.job_code);
     $("#id_dept").val(results.department);
     $("#id_full_name").val(results.name);
     $("#id_phone").val(results.phone);
     $("#id_p_code").val(results.p_code);
     $("#id_p_address").val(results.p_address);
     $("#id_gender").val(results.gender);
     $("#id_faculty").val(results.faculty);
     $("#id_job_title").val(results.job_title);  
    
}
function setStudentInputValues(results){
     $('#id_student_no').val(results.student_no);
     $("#id_course").val(results.course);
     $("#id_full_name").val(results.name);
     $("#id_email").val(results.email);
     $("#id_phone").val(results.phone);
     $("#id_p_code").val(results.p_code);
     $("#id_p_address").val(results.p_address);
     $("#id_gender").val(results.gender);
     $("#id_dept").val(results.department);
     $("#id_responsibility").val(results.responsibility); 
     $("#id_position").val(results.position);  
}
function setNoticeInputValues(results){
     $('#id_notice_no').val(results.notice_no);
     $("#id_subject").val(results.subject);
     $("#id_posted_by").val(results.posted_by);
     $("#id_details").val(results.details);
}
function setDepts(results){
     $('#dept_no').val(results.dept_no);
     $("#faculty").val(results.faculty);
     $("#dept_name").val(results.dept_name);
    
}
function setCourse(results){
     $('#course_no').val(results.course_no);
     $("#course_name").val(results.course_name);
     $("#dept_no").val(results.dept_no);
    
}
function showNoticeDetails(results){
    $("#id_more_info").html(""); 
     $("#id_more_info").html("<strong><p>"+results.subject+"</p></strong>"); 
     $("#id_more_info").append("<p>"+results.details+"</p>");
     $("#id_more_info").append("<strong>Posted by: "+results.posted_by+" On: "+results.time_posted+"</strong>");  
     $("#id_more_info").append("<p>Click file name to download: <strong><a href ='"+results.file_location+"' >"+results.doc_name+"</a></strong><p>");  
    // $("#id_more_info").append("<a class='btn btn-info' href =\"send_mail.php?ntc_id="+results.notice_no+"\"><strong>Send as Email</strong></a>");  
    var url = "./sendmail.php?ntc="+results.notice_no;
    $('#link').attr("href",url);
}


function add_record(opt){

    var xmlhttp = getXMLHttpObject() ;   	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)
            if(xmlhttp.responseText == 1){
                showNotification('top','center','ADDED <b>Successfully</b>, the new record has been saved','success');
                setTimeout(function(){
                    window.location.reload();
                },2000);
         }else{
               showNotification('top','center','ERROR <b>Encountered</b>, system failed to save the record','danger');
               showNotification('top','center','INFO <b></b>, you may have left out the required fields','info');
            }
           
        }
    };   
    
    //Get the data to send first 
    //Open the Ajax using POST method  
    var params = "flag="+opt;
    if(opt=="cod"){         
        params = params + getCODInputs();        
    }else if (opt=="std"){
          params =params + getStudentInputs();
    }else if (opt=="note"){
          params =params + getNoticeInputs();
    }else if (opt=="dept"){
          params =params + getDeptsInputs();
    }else if (opt=="course"){
		
          params =params + getCourseInputs();
		 
    }
	//alert(params);
    url = "../lib/ajax/aux_add_record.php";
    xmlhttp.open("POST",url,true);     
    //Include the parameters in the header
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server   
    xmlhttp.send(params);
    
}

function edit_record(opt){

    var xmlhttp = getXMLHttpObject() ;   	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)
            if(xmlhttp.responseText == 1){
                showNotification('top','center','Update <b>Successful</b>, the info has been updated','success');
                setTimeout(function(){
                    window.location.reload();
                },2000);
            }else{
               showNotification('top','center','ERROR <b>Encountered</b>, system failed to update the record','danger');
            }
           
        }
    }; 
      
    var params ="flag="+opt;
    if(opt=="cod"){        
        params = params + getCODInputs();
    }else if (opt=="std"){
          params = params + getStudentInputs();
    }else if (opt=="note"){
          params = params + getNoticeInputs();
    }else if (opt=="dept"){
          params = params + getDeptsInputs();
    }else if (opt=="course"){
          params =params + getCourseInputs();
    }
    
    url = "../lib/ajax/aux_edit_record.php"; 
    xmlhttp.open("POST",url,true);     
    //Include the parameters in the header
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server   
    xmlhttp.send(params);
}

function getRecord(element,flag){
      var code =  element.getAttribute('data-unique-code');          
      
     $.ajax({
        method:"POST",
        data:{unique_code:code,flag:flag},
        url: "../lib/ajax/aux_get_record.php",
        success: function (response){
            var results =  JSON.parse(response);
            if(flag=="cod"){
                setCODInputValues(results);
            }else if(flag=="std"){
                setStudentInputValues(results);
            }else if(flag=="note"){
                setNoticeInputValues(results);
                showNoticeDetails(results);
            }else if(flag=="dept"){
                setDepts(results);              
            }else if(flag=="course"){
                setCourse(results);              
            }
            
        },
        error: function (jqxhr,status,err){
            alert("Ajax execution failed with the following errors: [STATUS]-"+status +"AND [ERROR]-"+err);
        }
     });
}

//Clear the input fields in the editor modal forms

function clearModalFormFields(){ 
   $("#btn_reset").click();     
}

// delete the CODs record
function removeRecord(flag,code){   
    var response = confirm('Are you sure you want to delete this record?');
    if (response == true){
         $.ajax({
            method:"POST",
            data:{unique_code:code,flag:flag},
            url: "../lib/ajax/aux_remove_record.php",
            success: function (response){
                showNotification('top','center','DELETING <b>done</b>, the record has been deleted','danger');
           
               setTimeout(function(){
                        window.location.reload();
                    },1000);
            },
            error: function (jqxhr,status,err){
                alert("Ajax execution failed with the following errors: [STATUS]-"+status +"AND [ERROR]-"+err);
            }
         });
     }
}
 
// delete the CODs record
function deleteRecord(flag,from,to){   
    var response = confirm('Are you sure you want to delete ALL the records?');      
    if (response == true){
         $.ajax({
            method:"POST",
            data:{from:from,to:to,flag:flag},
            url: "../lib/ajax/aux_deletion.php",
            success: function (response){
                
                if(response == true){
                    showNotification('top','center','DELETING <b>done</b>, the record(s) have  been deleted','danger');                     
                   setTimeout(function(){
                            window.location.reload();
                        },1000);
                }else{
                     showNotification('top','center','DELETING <b> FAILED</b>, the system failed to delete the records','warning');                     
                  
                }
              
            },
            error: function (jqxhr,status,err){
                alert("Ajax execution failed with the following errors: [STATUS]-"+status +"AND [ERROR]-"+err);
            }
         });
     }
}
function populate_dropdown_element(unique_id,id_of_element,flag){
    var xmlhttp = getXMLHttpObject() ;
    	
    xmlhttp.onreadystatechange = function (){
    if(xmlhttp.readyState == 4){
            //alert(xmlhttp.responseText)             
            
                $(id_of_element).html("");
                $(id_of_element).append(xmlhttp.responseText);
          
           
        }
    };
    
    
  //Get the data to send first
    
    var field_code = encodeURIComponent($(unique_id).val());
   
    
    //Open the Ajax using POST method
    var url = "../lib/ajax/aux_populate_element.php";  
    xmlhttp.open("POST",url,true); 
    
    //Include the parameters in the header
    var params ="field_code="+field_code+"&flag="+flag;
    
    //alert(params);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Send to the server
    xmlhttp.send(params);
}
