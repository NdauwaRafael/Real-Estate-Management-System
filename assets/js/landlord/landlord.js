var Landlord = function() {
    



//====================================================================================================
this.__construct = function() {
    Template = new Template();
    
    Events = new Events();
Result = new Result();
load_house();
load_estate();
}   

//====================================================================================================
var load_house = function(){
  $.get('../landlord_api/view_house', function(house_output){
      var output ='';
       for (var i = 0; i < house_output.length; i++) {
           var element = house_output[i];
           output +=Template.house(element);
       }
       $("#houses_display").html(output);
  }, 'json')
}
//====================================================================================================
var load_tenant = function(){
    
}
//====================================================================================================
var load_bills = function(){
    
}
//====================================================================================================

var load_estate = function(){
    $.get('../landlord_api/view_estate', function(estat){
         var option='';
         var esto = '';
       for (var i = 0; i < estat.length; i++) {
           var element = estat[i];
           option +=Template.populate_estate(element);
           esto += Template.view_estate(element);
       }  
       $("#estate_list").append(option); 
       $("#estate_display").html(esto);      
    },'json')
}
//====================================================================================================
this.__construct();
}
