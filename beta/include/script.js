function js_index() {
	alert("Unusual access has been detected.");
	self.location.href="error.php?code=2828";
}

function js_loading() {
self.location.href="agreement.php";
}

function js_agreement() {
if(document.getElementById("checkbox_agree").checked) {
		document.getElementById("button_agree").style.display = "";
		document.getElementById("button_disagree").style.display = "none";
} else {
		document.getElementById("button_disagree").style.display = "";
		document.getElementById("button_agree").style.display = "none";
	
}
}
function js_login() {
if(document.getElementById("input_id").value.length>0&&document.getElementById("input_pw").value.length>0){
		document.getElementById("submit_login").style.display = "";
		document.getElementById("submit_dislogin").style.display = "none";
} else {
		document.getElementById("submit_dislogin").style.display = "";
		document.getElementById("submit_login").style.display = "none";
	
}
}

function js_input_specialchar() {
	keycode = event.keyCode;
	if((keycode>32 && keycode<48) || (keycode>57 && keycode<65) || (keycode>90 && keycode<97)) {
		event.returnValue = false;
	}
}

function js_input_paste() {
  var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
 
  if (event.ctrlKey && (pressedKey == "c" || 
                        pressedKey == "v")) {
    event.returnValue = false;
  }





}


function login_new() {
	
if(document.getElementById("checkbox_new").checked) {
		document.getElementById("button_ok").style.display = "";
		document.getElementById("button_disok").style.display = "none";
	} else {
		document.getElementById("button_disok").style.display = "";
		document.getElementById("button_ok").style.display = "none";
	
}
}

function notice(no) {
var notice_no = "notice"+no;
if(document.getElementById(notice_no).style.display!="none") {
document.getElementById(notice_no).style.display = "none";
} else {
document.getElementById(notice_no).style.display = "";
}
}

function all21() {
	
if(document.getElementById("input_all").checked) {
	for(i=1;i<61;i++) {
		j = "input_"+i;
		document.getElementById(j).checked = true;
		document.getElementById(j).disabled = true;
	}
	} else {
	for(i=1;i<61;i++) {
		j = "input_"+i;
		document.getElementById(j).checked = false;
		document.getElementById(j).disabled = false;
	}
		
	}
}

function apk(no) {
var apk_no = "apk"+no;
if(document.getElementById(apk_no).style.display!="none") {
document.getElementById(apk_no).style.display = "none";
} else {
document.getElementById(apk_no).style.display = "";
}
}


function setcookie( name, value, expiredays ) 
{ 
var todayDate = new Date(); 
todayDate.setDate( todayDate.getDate() + expiredays ); 
document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
} 

function getcookie( name ) 
{ 
var nameOfCookie = name + "="; 
var x = 0; 
while ( x <= document.cookie.length ) 
{ 
var y = (x+nameOfCookie.length); 
if ( document.cookie.substring( x, y ) == nameOfCookie ) { 
if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 ) 
endOfCookie = document.cookie.length; 
return unescape( document.cookie.substring( y, endOfCookie ) ); 
} 
x = document.cookie.indexOf( " ", x ) + 1; 
if ( x == 0 ) 
break; 
} 
return ""; 
}
 