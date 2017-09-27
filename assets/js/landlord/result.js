var Result = function() {
    



//====================================================================================================
this.__construct = function() {
    
}   

//====================================================================================================
this.success = function(){
$("#add_house_status").html("House have been Added Successfully").css("color","green");
}
//====================================================================================================
this.error = function(responce){
              var output = '<ul>'
              for (var key in responce.error){
                  var value = responce.error[key];
                output+= '<li>'+ value+'</li>';
              }   
             output += '</ul>'            
               $("#add_house_status").html(output).css("color","red");     
}


//====================================================================================================

//====================================================================================================
this.estate_success = function(){
$("#add_estate_status").html("Estate have been Added Successfully").css("color","green");
}
//====================================================================================================
this.estate_error = function(responce){
              var output = '<ul>'
              for (var key in responce.error){
                  var value = responce.error[key];
                output+= '<li>'+ value+'</li>';
              }   
             output += '</ul>'            
               $("#add_estate_status").html(output).css("color","red");     
}


//====================================================================================================
this.__construct();
}
