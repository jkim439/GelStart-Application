<?
// 헤더	연결
include	"../header.php";

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0066';</script>"; exit;
}

// 변수 검사
if(!isset($_SESSION[login]) || empty($_SESSION[login])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0038';</script>"; exit;
}

// 로그인 검사
$member = mysql_fetch_array(mysql_query("select * from member where login='$_SESSION[login]'",$dbconn));
if(!$_SESSION[login] || $_SESSION[login]!=$member[login]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0098';</script>"; exit;
}
//alter table apk_ej04 auto_increment=1
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
	<center><table border="0" cellspacing="0" cellpadding="0" style="width:650px; height:330px; cursor:defalut;">
		<tr>
			<td style="width:650px; height:100px; background-image:url('images/title_start_1.gif');">
			</td>
		</tr>
		<tr>
			<td style="width:650px; height:230px; vertical-align:text-middle;">
				<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;">
					<form name="form_version" action="start_1_process.php" method="post">
					<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;">
						<img src="images/text_model.gif" style="width:35px; height:25px; cursor:default;" border="0" align="absbottom">&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" id="input_model" name="input_model" value="shwm250s"><img src="images/text_model_shwm250s.gif" style="width:240px; height:25px; cursor:default;" border="0" align="absbottom">&nbsp;<a href="main.php"><img src="images/button_modify_1.gif" name="button_modify" id="button_modify" OnMouseOut="button_modify.src='images/button_modify_1.gif';" onmouseover="button_modify.src='images/button_modify_2.gif';" border="0" align="absbottom" alt="변경" style="width:60px; height:30px;"></a><br><br>
						<img src="images/text_version.gif" id="input_version" name="input_version" style="width:35px; height:25px; cursor:default;" border="0" align="absbottom">&nbsp;&nbsp;&nbsp;&nbsp;
						<select name="input_version" style="width:300px; height:25px; font-family:Arial; font-size:13pt; color:rgb(11,64,96); background-color:rgb(224,235,255);">
							<option value="ej04" selected>EJ04 (Latest Version)</option>
						</select><br><br><br><br>
						<input type="image" src="images/button_ok_1.gif" id="submit_ok" name="submit_ok" value="submit" OnMouseOut="this.src='images/button_ok_1.gif';" onmouseover="this.src='images/button_ok_2.gif';" border="0" align="absbottom" alt="확인" style="width:60px; height:30px; cursor:pointer;">&nbsp;&nbsp;<a href="main.php"><img src="images/button_cancel_1.gif" name="button_cancel" id="button_cancel" OnMouseOut="button_cancel.src='images/button_cancel_1.gif';" onmouseover="button_cancel.src='images/button_cancel_2.gif';" border="0" align="absbottom" alt="취소" style="width:60px; height:30px;"></a>


<!--
<input type="text" id="input_id" name="input_id" onblur="this.style.backgroundColor='#ffffff'; this.style.padding='2px'; this.style.border='1px solid #516481';" onfocus="this.style.backgroundColor='#e0ebff'; this.style.padding='1px'; this.style.border='2px solid #495973';" style="width:300px; height:25px; padding:2px; ime-mode:disabled; font-family:Arial; font-size:16pt; color:rgb(45,64,96); border-width:1pt; border-color:rgb(81,100,129); border-style:solid;" maxlength="20" onkeyup="login();"><br><br>
<input type="image" src="images/button_ok_1.gif" id="submit_ok" name="submit_ok" value="submit" OnMouseOut="this.src='images/button_ok_1.gif';" onmouseover="this.src='images/button_ok_2.gif';" border="0" align="absbottom" alt="로그인" style="width:60px; height:30px; display:none; cursor:pointer;"><img src="images/button_ok_3.gif" name="submit_disok" id="submit_disok" style="width:60px; height:30px; cursor:defalut;" border="0" align="absbottom" alt="아이디와 비밀번호를 입력하십시오."></center>

-->
						
					</span></font></p></form>
				</span></font></p>
			</td>
		</tr>
	</table></center>
</body>

</html>