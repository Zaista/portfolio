$(document).ready(function() {
	setTimeout ( function () {
		//$("#photodiv").height($("#rightcol").height());
		
		if ($("#kinks div").height() < $("#features div").height())
			$("#kinks div").height($("#features div").height());
		else
			$("#features div").height($("#kinks div").height());
	}, 1);
	
	var photoHeight = $("#photo").height();
	var photodivHeight = $("#photodiv").height();
	var photoMargin = photodivHeight/2 - photoHeight/2
	$("#photo").css("margin-top", photoMargin);
});