<?
// 헤더	연결
include	"../header.php";

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=4366';</script>"; exit;
}

// 세션 검사
if(!$_SESSION[code]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=4323';</script>"; exit;
}

// 세션 검사
if(!$_SESSION[no]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=4323';</script>"; exit;
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
	<center><table border="0" cellspacing="0" cellpadding="0" style="width:650px; height:330px; cursor:defalut;">
		<tr>
			<td style="width:650px; height:100px; background-image:url('images/title_register.gif');">
			</td>
		</tr>
		<tr>
			<td style="width:650px; height:230px; vertical-align:text-middle;">
				<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;">
					&nbsp;&nbsp;&nbsp;&nbsp;클로즈 베타 테스트에서는 유출을 방지하기 위해 한 계정당 한 대의 컴퓨터로만 접속할 수 있습니다.<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;최초로 등록한 컴퓨터에서만 로그인이 가능하므로 신중하게 선택하시기 바랍니다.<br><br><br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;<label for="checkbox_new"><input type="checkbox" name="checkbox_new" id="checkbox_new" value="1" onclick="login_new();"> <strong>이 컴퓨터로 등록합니다.</strong></label><br><br><br><br>
					<center><a href="#"><img src="images/button_ok_1.gif" name="button_ok" id="button_ok" OnMouseOut="button_ok.src='images/button_ok_1.gif';" onmouseover="button_ok.src='images/button_ok_2.gif';" border="0" align="absbottom" alt="확인" style="width:60px; height:30px; display:none;" onclick="if(confirm('정말 이 컴퓨터로 등록하시겠습니까?')){self.location.href='register_process.php';}"></a><img src="images/button_ok_3.gif" name="button_disok" id="button_disok" style="width:60px; height:30px" border="0" align="absbottom" alt="확인 여부를 체크하여 주십시오.">&nbsp;&nbsp;<a href="login.php"><img src="images/button_cancel_1.gif" name="button_cancel" id="button_cancel" OnMouseOut="button_cancel.src='images/button_cancel_1.gif';" onmouseover="button_cancel.src='images/button_cancel_2.gif';" border="0" align="absbottom" alt="취소" style="width:60px; height:30px;"></a></center>
				</span></font></p>
			</td>
		</tr>
	</table></center>
</body>

</html>