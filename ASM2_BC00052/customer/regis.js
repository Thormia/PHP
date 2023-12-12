function checkUserRegistration(){
	var fullname = document.getElementById('fullname').value;
	var bank = document.getElementById('bank').value;
	var password = document.getElementById('password').value;
	var address = document.getElementById('address').value;
	var user = document.getElementById('user').value;
	var phone = document.getElementById('phone').value;

	if(fullname ==""){
		alert('Please fullfill!');
		document.getElementById('fullname').focus();
		return false;
	}
	else if(bank ==""){
		alert('Please fullfill!');
		document.getElementById('bank').focus();
		return false;
	}
	else if(user ==""){
		alert('Please fullfill!');
		document.getElementById('user').focus();
		return false;
	}
	else if(password ==""){
		alert('Please fullfill!');
		document.getElementById('password').focus();
		return false;
	}
	else if(password.length < 8){
		alert('Password must more than 8!');
		document.getElementById('password').focus();
		return false;
	}
	else if(phone ==""){
		alert('Please fullfill!');
		document.getElementById('phone').focus();
		return false;
	}
	else if(address ==""){
		alert('Address is empty!');
		document.getElementById('address').focus();
		return false;
	}
	else{
		return true;
	}
}