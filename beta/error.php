<?

// 헤더	연결
include	"../header.php";

// 변수 변환
$code = mysql_real_escape_string($_GET[code]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html	lang="ko">

<head>
	<title>갤스타트</title>
	<meta	http-equiv="content-type"	content="text/html;	charset=utf-8">
	<meta	http-equiv="Cache-Control" content="no-cache">
	<meta	http-equiv="Pragma"	content="no-cache">
	<meta	http-equiv="imagetoolbar"	content="no">
</head>
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" ondragstart="return false;" onselectstart="return false;">
		<center>
		<table border="0" cellspacing="0" cellpadding="0" style="width:650px; height:330px;">
			<tr>
				<td colspan="1" style="width:650px; height:330px; vertical-align:text-middle;">
					<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;">
						<center><img src="images/icon_error.gif"><br><br><strong><font color="red">시스템 오류</font></strong><br><br><br><br>오류가 발생하였습니다. 문제가 계속 발생하면 아래 Error Code를 보내주세요.<br><br><?=$code?></center>
					</span></font></p>
				</td>
			</tr>
		</table>
		</center>
</body>
</html>