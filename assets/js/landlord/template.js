var Template = function() {
    



//====================================================================================================
this.__construct = function() {
    
}   

//====================================================================================================
this.house = function(hse) {
    var house_output = '<div>';
    house_output += '                   <div class="activity-row house_box">\
										<div class="col-xs-3 activity-img"><img src="../assets/images/house10.png" class="img-responsive" alt=""></div>\
										<div class="col-xs-7 activity-desc">\
											<h5><a href="#">'+hse.name+'</a></h5>\
											<p>'+hse.category+'</p>\
                                            <p><span class="glyphicon glyphicon-home"></span> '+hse.estate+' Estate</p>\
										</div>\
										<div class="col-xs-2 activity-desc1"><h6><butoon class="btn btn-sm btn-success">View</button></h6></div>\
										<div class="clearfix"> </div>\
									</div>';
    return house_output;
}

//====================================================================================================
this.view_estate = function(est) {
    var estate_output = '<div>';
    estate_output += '                   <div class="activity-row house_box">\
										<div class="col-xs-3 activity-img"><img src="../assets/images/modern13.png" class="img-responsive" alt=""></div>\
										<div class="col-xs-7 activity-desc">\
											<h5><a href="#">'+est.name+'</a></h5>\
											<p>'+est.category+'</p>\
                                            <p><span class="glyphicon glyphicon-home"></span> '+est.location+' Estate</p>\
										</div>\
										<div class="col-xs-2 activity-desc1"><h6><butoon class="btn btn-sm btn-warning">View</button></h6></div>\
										<div class="clearfix"> </div>\
									</div>';
    return estate_output;
}
//====================================================================================================
this.populate_estate = function(est) {
	var list ='<option>';
	list += est.name;
	list +='</option>';
	return list;
}
//====================================================================================================
//====================================================================================================
//====================================================================================================
//====================================================================================================
//====================================================================================================
this.__construct();
}