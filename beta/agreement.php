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

<body ondragstart="return false;" onselectstart="return false;" style="cursor:default;">
	<table align="center" border="0" cellspacing="0" cellpadding="0" style="width:650px; cursor:defalut;">
		<tr>
			<td style="width:650px; height:100px; background-image:url('images/title_agreement.gif');"></td>
		</tr>
		<tr>
			<td style="width:650px;">
				<p align="left" style="margin-left:20px;"><font face="Gulim" color="black"><span style="font-size:9pt;">
					<br><br><br><br>본 프로그램을 이용함으로써 이용 약관에 동의하는 것으로 간주합니다.<br><br><br>
					1. 초보자는 이용하지 마십시오.<br><br>
					2. 작업 전 복구 방법을 반드시 숙지하시기 바랍니다.<br><br>
					3. 제공하는 정보는 100% 완벽한 정보임을 보증하지 않습니다.<br><br>
					4. 시스템에서 기본으로 제공하는 어플 삭제시 예기치 않은 문제가 발생할 수 있습니다.<br><br>
					5. 삭제 여부에 대해 오직 참고용으로만 활용해야 합니다. 삭제를 할지 말지는 본인에게 달려있습니다.<br><br>
					6. 이 프로그램을 이용함으로써 생기는 모든 문제는 본인에게 있으며 제작자는 이에 대해 어떠한 책임도 없습니다.<br><br><br><br>
					다음은 클로즈 베타 테스트 약관입니다.<br><br><br>
					1. 본 프로그램의 전체 또는 일부를 유출해서 안됩니다.<br><br>
					2. 프로그램이나 실행 화면에 대해 스크린 샷을 촬영해서는 안됩니다.<br><br>
					3. 클로즈 베타 테스트 계정을 타인에게 넘기거나 공유 또는 유출하면 안됩니다.<br><br>
					4. 유출 방지를 위하여 계정 접속에 해당하는 컴퓨터 정보 수집에 동의합니다.<br><br>
					5. 클로즈 베타 테스트 약관을 위반하는 경우 사전 경고 없이 접속을 영구히 차단하는 것에 동의합니다.<br><br><br>
					<label for="checkbox_agree"><input type="checkbox" name="checkbox_agree" id="checkbox_agree" value="1" onclick="js_agreement();"> <strong>위 약관에 모두 동의합니다.</strong></label><br><br><br>
				</span></font></p>
				<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;">
					<a href="login.php" target="_self"><img src="images/button_agree_1.gif" name="button_agree" id="button_agree" onmouseout="button_agree.src='images/button_agree_1.gif';" onmouseover="button_agree.src='images/button_agree_2.gif';" border="0" align="absbottom" alt="동의" style="width:60px; height:30px; display:none;"></a><img src="images/button_agree_3.gif" name="button_disagree" id="button_disagree" style="width:60px; height:30px" border="0" align="absbottom" alt="동의 여부를 체크하여 주십시오."></center><br><br><br><br>
				</span></font></p>
			</td>
		</tr>
	</table>
</body>
</html>