
var buttonLogin;
var buttonRegister;
var buttonNewMovie;
var buttonLogout;
var alertBox;
var alertBoxMessage;

$(document).ready(function() {
	
	buttonLogin = document.getElementById("loginButton");
	buttonRegister = document.getElementById("registerButton");
	buttonNewMovie = document.getElementById("newMovieButton");
	buttonLogout = document.getElementById("logoutButton");
	alertBox = document.getElementById("alerter");
	alertBoxMessage = document.getElementById("alerterMessage");
	
	var frmReg = $('#register_form');
		frmReg.submit(function (ev) {
			SubmitForm(frmReg);
			ev.preventDefault();
		});
		
	var frmSub = $('#login_form');
		frmSub.submit(function (ev) {
			SubmitForm(frmSub);
			ev.preventDefault();
		});
		
	CheckForUser();
});

function closeAlert(){
	alertBox.style.display="none";
}

function CheckForUser(){
	$.ajax({
				type: 'POST',
				url: 'bin/UserExists.php',
				success: function (data) {
					var converted_result= JSON.parse(data);
					if(converted_result)
					{
						YesUserActions();
					}
					else
					{
						NoUserActions();
					}
				}
			});
}

function NoUserActions(){
	buttonLogin.style.display = "block"; 
	buttonRegister.style.display = "block";  
	buttonNewMovie.style.display = "none"; 
	buttonLogout.style.display = "none"; 
}

function YesUserActions(){
	buttonLogin.style.display = "none"; 
	buttonRegister.style.display = "none";  
	buttonNewMovie.style.display = "block"; 
	buttonLogout.style.display = "block"; 
}

function SubmitForm(frm){
	
			$.ajax({
				type: frm.attr('method'),
				url: frm.attr('action'),
				data: frm.serialize(),
				success: function (data) {
					var converted_result= JSON.parse(data);
					$('.close').click();
					if(converted_result[0])
					{
						YesUserActions();	
					}
					else
					{ 
						alertBoxMessage.innerHTML = converted_result[1];
						alertBox.style.display = "block";
					}
				}
			});
}

function logout(){
	$.ajax({
				type: 'POST',
				url: 'bin/logout.php',
				success: function (data) {
					var converted_result= JSON.parse(data);
					if(converted_result)
					{
						NoUserActions();
					}
					else
					{
						window.location.reload(true); 
					}
				}
			});
}
