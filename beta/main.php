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

// 고유번호 암호화
$code = md5(md5($member[no]).$member[id]).md5($member[code]);
$code = substr($code, 0, 27);
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
	<script language="vbscript">
		Function info
			Msgbox "갤스타트 (GelStart)"&vbNewLine&""&vbNewLine&"버전 :  0.1.0.0 (클로즈 베타 테스트)"&vbNewLine&"제작 :  갤트 (맛클 회원)"&vbNewLine&""&vbNewLine&"<?=$member[name]?>님은 이용 권한이 부여됨."&vbNewLine&"컴퓨터 고유번호 :  <?=$code?>..."&vbNewLine&""&vbNewLine&"Copyright ⓒ 갤트. All Rights Reserved.",64,"갤스타트"
		End Function
	</script>
</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" ondragstart="return false;" onselectstart="return false;">
	<center><table border="0" cellspacing="0" cellpadding="0" style="width:650px; height:330px;">
		<tr>
			<td rowspan="5" style="width:325px; height:330px;"><a href="start_1.php"><img src="images/meun_start_1.gif" name="meun_start" id="meun_start" OnMouseOut="meun_start.src='images/meun_start_1.gif';" onmouseover="meun_start.src='images/meun_start_2.gif';" border="0" align="absbottom" alt="시작하기" style="width:325px; height:330px;"></a></td>
			<td style="width:325px; height:66px;"><a href="#"><img src="images/meun_premium_1.gif" name="meun_premium" id="meun_premium" OnMouseOut="meun_premium.src='images/meun_premium_1.gif';" onmouseover="meun_premium.src='images/meun_premium_2.gif';" border="0" align="absbottom" alt="프리미엄" style="width:325px; height:66px;"></a></td>
		</tr>
		<tr>
			<td style="width:325px; height:66px;"><img src="images/meun_setting_1.gif" name="meun_setting" id="meun_setting" OnMouseOut="meun_setting.src='images/meun_setting_1.gif';" onmouseover="meun_setting.src='images/meun_setting_2.gif';" border="0" align="absbottom" alt="환경설정" style="width:325px; height:66px; cursor:pointer;" onclick="vbscript:info"></td>
		</tr>
		<tr>
			<td style="width:325px; height:66px;"><a href="#"><img src="images/meun_info_1.gif" name="meun_info" id="meun_info" OnMouseOut="meun_info.src='images/meun_info_1.gif';" onmouseover="meun_info.src='images/meun_info_2.gif';" border="0" align="absbottom" alt="제품정보" style="width:325px; height:66px;"></a></td>
		</tr>
		<tr>
			<td style="width:325px; height:66px;"><a href="#"><img src="images/meun_community_1.gif" name="meun_community" id="meun_community" OnMouseOut="meun_community.src='images/meun_community_1.gif';" onmouseover="meun_community.src='images/meun_community_2.gif';" border="0" align="absbottom" alt="커뮤니티" style="width:325px; height:66px;"></a></td>
		</tr>
		<tr>
			<td style="width:325px; height:66px;"><a href="logout.php"><img src="images/meun_logout_1.gif" name="meun_logout" id="meun_logout" OnMouseOut="meun_logout.src='images/meun_logout_1.gif';" onmouseover="meun_logout.src='images/meun_logout_2.gif';" border="0" align="absbottom" alt="로그아웃" style="width:325px; height:66px;"></a></td>
		</tr>
	</table></center>
</body>
</html>