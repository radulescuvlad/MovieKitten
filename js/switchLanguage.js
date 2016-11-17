function switchLanguage() {
	$.ajax ({
		type: 'POST',
		url: 'bin/getLanguage.php',
		success: function(data) {
			var converted_result = JSON.parse(data);
			if (converted_result == "English") {
				$.ajax ({
					url: 'bin/toRo.php',
					success: function() {
						window.location.reload(true);
					}
				});
			}
			else {
				$.ajax ({
					url: 'bin/toEn.php',
					success: function() {
						window.location.reload(true);
					}
				});
			}
		}
	});
}