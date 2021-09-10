<?

// 헤더	연결
include	"../header.php";

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=1566';</script>"; exit;
}

// 변수 검사
if(!isset($_SESSION[code]) || empty($_SESSION[code]) || !isset($_SESSION[key]) || empty($_SESSION[key])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0038';</script>"; exit;
}

// 세션 검사
if(!$_SESSION[code] || !$_SESSION[key] || $_SESSION[key]!="jp85yvcr98hoghidxeuf87rm02cuu3vb") {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=1523';</script>"; exit;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html	lang="ko">

<head>
	<title>갤스타트</title>
	<meta	http-equiv="content-type"	content="text/html;	charset=utf-8">
	<meta	http-equiv="Cache-Control" content="no-cache">
	<meta	http-equiv="Pragma"	content="no-cache">
	<meta	http-equiv="imagetoolbar"	content="no">
	<script	type="text/javascript" src="include/script.js"></script>
	<link rel="stylesheet" type="text/css" href="include/style.css">
</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" ondragstart="return false;" onselectstart="return false;" style="cursor:default;">
	<table align="center" border="0" cellspacing="0" cellpadding="0" style="width:650px; cursor:defalut;">
		<tr>
			<td style="width:650px; height:100px; background-image:url('images/title_login.gif');"></td>
		</tr>
		<tr>
			<td style="width:650px;">
				<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;">
					<br><br><br><br><form name="form_login" action="login_process.php" method="post" onsubmit="return js_login();">
						<img src="images/text_id.gif" style="width:60px; height:25px; cursor:default;" border="0" align="absbottom">&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="input_id" name="input_id" onblur="this.style.backgroundColor='#ffffff'; this.style.padding='2px'; this.style.border='1px solid #516481';" onfocus="this.style.backgroundColor='#e0ebff'; this.style.padding='1px'; this.style.border='2px solid #495973';" style="width:300px; height:25px; padding:2px; ime-mode:disabled; text-transform:lowercase; font-family:Arial; font-size:16pt; color:rgb(45,64,96); border-width:1pt; border-color:rgb(81,100,129); border-style:solid;" maxlength="15" onkeyup="js_login();" onkeypress="js_input_specialchar();" onkeydown="js_input_paste();"><br><br>
						<img src="images/text_pw.gif" style="width:60px; height:25px; cursor:default;" border="0" align="absbottom">&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="input_pw" name="input_pw" onblur="this.style.backgroundColor='#ffffff'; this.style.padding='2px'; this.style.border='1px solid #516481';" onfocus="this.style.backgroundColor='#e0ebff'; this.style.padding='1px'; this.style.border='2px solid #495973';" style="width:300px; height:25px; padding:2px; ime-mode:disabled; font-family:Arial; font-size:16pt; color:rgb(45,64,96); border-width:1pt; border-color:rgb(81,100,129); border-style:solid;" maxlength="20" onkeyup="js_login();" onkeypress="js_input_specialchar();" onkeydown="js_input_paste();"><br><br><br>
						<input type="image" src="images/button_login_1.gif" value="submit" id="submit_login" name="submit_login" onmouseout="this.src='images/button_login_1.gif';" onmouseover="this.src='images/button_login_2.gif';" border="0" align="absbottom" alt="로그인" style="width:60px; height:30px; cursor:pointer;"><img src="images/button_login_3.gif" name="submit_dislogin" id="submit_dislogin" style="width:60px; height:30px; cursor:defalut;" border="0" align="absbottom" alt="아이디와 비밀번호를 입력하십시오."><br><br><br><br>
					</form>
				</span></font></p>
			</td>
		</tr>
	</table>
</body>

</html>