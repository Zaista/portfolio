$(document).ready(function() {
	setTimeout ( function () {
		var kinks = $("#kinks div").height();
		var features = $("#features div").height();
		if (kinks < features)
			$("#kinks div").height(features);
		else if (kinks > features)
			$("#features div").height(kinks);
		
		var photoHeight = $("#photo").height();
		var photodivHeight = $("#photodiv").height();
		var photoMargin = photodivHeight/2 - photoHeight/2
		$("#photo").css("margin-top", photoMargin);
	}, 10);
	//test webhook
});