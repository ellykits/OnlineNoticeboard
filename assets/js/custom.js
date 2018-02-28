//type = ['','info','success','warning','danger'];

  

showNotification = function(from, align,msg,msg_type){
    	//color = Math.floor((Math.random() * 4) + 1);

    	$.notify({
        	icon: "notifications",
        	message: msg

        },{
            type: msg_type,            
            timer: 3000,
            placement: {
                from: from,
                align: align
            }
        });
}
