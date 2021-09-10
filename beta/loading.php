<?

// 헤더	연결
include	"../header.php";

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0966';</script>"; exit;
}

// 전송 검사
if(getenv("REQUEST_METHOD")!="POST") {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0902';</script>"; exit;
}

// 변수 검사
if(!isset($_POST[input_code]) || empty($_POST[input_code]) || !isset($_POST[input_version])  || empty($_POST[input_version]) || !isset($_POST[input_key])  || empty($_POST[input_key])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0938';</script>"; exit;
}

// 변수 변환
$code = mysql_real_escape_string($_POST[input_code]);
$code = trim($code);
$code = strip_tags($code);
$code = htmlentities($code,ENT_QUOTES,'UTF-8');
$version = mysql_real_escape_string($_POST[input_version]);
$version = trim($version);
$version = strip_tags($version);
$version = htmlentities($version,ENT_QUOTES,'UTF-8');
$key = mysql_real_escape_string($_POST[input_key]);
$key = trim($key);
$key = strip_tags($key);
$key = htmlentities($key,ENT_QUOTES,'UTF-8');

// 코드 검사
$code_length = strlen($code);
if($code_length!="16") {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0933';</script>"; exit;
}

// 버전 검사
if($version!="GS_ALPHATEST_0.01_111124") {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0942';</script>"; exit;
}

// 키 검사
if($key!="jp85yvcr98hoghidxeuf87rm02cuu3vb") {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0942';</script>"; exit;
}

// 코드 세션 생성
$_SESSION[code] = "$code";
$_SESSION[key] = "$key";

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
</head>

<body ondragstart="return false;" onselectstart="return false;" onload="setTimeout('js_loading()',1000);" style="cursor:wait;">
	<table align="center" border="0" cellspacing="0" cellpadding="0" style="width:650px; height:330px; cursor:wait;">
		<tr>
			<td style="width:650px; height:330px; background-image:url('images/loading.jpg');"></td>
		</tr>
	</table>
</body>

</html>