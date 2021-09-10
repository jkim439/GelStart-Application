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
	<center><table border="0" cellspacing="0" cellpadding="0" style="width:650px; cursor:defalut;">
		<tr>
			<td style="width:650px; height:100px; background-image:url('images/title_notice.gif'); cursor:default;">
			</td>
		</tr>
		<tr>
			<td style="width:650px; vertical-align:text-middle;"><p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><br><br><br>
<?

$result = mysql_query("SELECT * FROM bbs_notice ORDER BY date DESC", $dbconn);
			// 게시물 목록
			while($notice = mysql_fetch_array($result)) {
				$text = nl2br($notice[text]);

		?>
				<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid; cursor:pointer;" onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#e0ebff';" onclick="notice(<?=$notice[no]?>);">
					<tr>
						<td style="width:10px; height:25px;"></td>
						<td style="width:460px; height:25px;">
							<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong><?=$notice[title]?></strong></span></font></p>
						</td>
						<td style="width:70px; height:25px;">
							<p align="right"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$notice[date]?></span></font></p>
						</td>
						<td style="width:10px; height:25px;"></td>
					</tr>
					<tr id="notice<?=$notice[no]?>" style="display:none;">
						<td style="width:10px;" colspan="1"></td>
						<td style="width:530px;" colspan="2">
							<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><br><?=$text?><br><br></span></font></p>
						</td>
						<td style="width:10px;" colspan="1"></td>
					</tr>
				</table><br>
				<?}?><br><br>
				<center><a href="main.php"><img src="images/button_ok_1.gif" name="button_ok" id="button_ok" OnMouseOut="button_ok.src='images/button_ok_1.gif';" onmouseover="button_ok.src='images/button_ok_2.gif';" border="0" align="absbottom" alt="확인" style="width:60px; height:30px;"></center><br><br><br>
			</span></font></p></td>
		</tr>
	</table></center>
</body>
</html>