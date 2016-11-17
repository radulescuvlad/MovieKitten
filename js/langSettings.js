//var langButton;
var myLang;

$(document).ready(function() {
	//langButton = $('#langButton');
		$.ajax ({
			type: 'POST',
			url: 'bin/getLanguage.php',
			success: function (data) {
				var converted_result= JSON.parse(data);
				myLang = converted_result;
				//langButton[0].innerText=converted_result;
			}
		});

});

function mySwitch() {
	if (myLang == "English") {
		myLang = "Romanian";
		$.ajax ({
			type: 'POST',
			url: 'bin/toRo.php',
			success: function(data) {
				var converted_result= JSON.parse(data);
				myLang = converted_result;
				//langButton[0].innerText=converted_result;
			}
		});
	}
	else {
		myLang = "English";
		$.ajax ({
			type: 'POST',
			url: 'bin/toEn.php',
			success: function(data) {
				var converted_result= JSON.parse(data);
				myLang = converted_result;
				//langButton[0].innerText=converted_result;
			}
		});
	}
	location.reload(true);
	/*
	$.ajax ({
		type: 'POST',
		url: 'bin/language.php',
		data: {sendData: myLang},
		dataType: 'json',
		success: function() {
			location.reload();
		}
	});
	*/
}

