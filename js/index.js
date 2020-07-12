$(document).ready(function () {
	setTimeout(function () {
		var kinks = $("#kinks div").height();
		var features = $("#features div").height();
		if (kinks < features)
			$("#kinks div").height(features);
		else if (kinks > features)
			$("#features div").height(kinks);
	}, 10);

	var flag = true;
	setInterval(function() {
		$("#typer").fadeTo("fast", flag);
		flag = !flag;
	}, 500);
});