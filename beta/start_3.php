<?

session_cache_limiter("private_no_expire");
// 헤더	연결
include	"../header.php";

// 변수 검사
if(!isset($_POST[input_code]) || empty($_POST[input_code])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0338';</script>"; exit;
}

// 변수 변환
$code = mysql_real_escape_string($_POST[input_code]);
$code = trim($code);
$code = strip_tags($code);
$code = htmlentities($code,ENT_QUOTES,'UTF-8');
$input_all = mysql_real_escape_string($_POST[input_all]);
$input_all = trim($input_all);
$input_all = strip_tags($input_all);
$input_all = htmlentities($input_all,ENT_QUOTES,'UTF-8');

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0366';</script>"; exit;
}

// 전송 검사
if(getenv("REQUEST_METHOD")!="POST") {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0302';</script>"; exit;
}

// 로그인 검사
$member = mysql_fetch_array(mysql_query("select * from member where login='$_SESSION[login]'",$dbconn));
if(!$_SESSION[login] || $_SESSION[login]!=$member[login]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0398';</script>"; exit;
}

if($code=="shwm250sej04") {
	$db = "apk_".$code;
	
} else {
		echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0366';</script>"; exit;
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
			<td style="width:650px; height:100px; background-image:url('images/title_start_3.gif');">
			</td>
		</tr>
		<tr>
			<td style="width:650px; height:230px; vertical-align:text-middle; cursor:default;">
				<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><br><br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;아래는 삭제가 가능한 어플들이 모두 표시되어 있습니다.</a><br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;전 단계에서 본인이 삭제를 원치 않는 어플들은 빠져 있습니다. 오직 본인만의 맞춤형 목록입니다.<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;<strong>프리미엄</strong> 계정에서는 이 목록을 저장할 수 있습니다. 저장하려면 [저장] 버튼을 클릭하시기 바랍니다.<br><br><br>
					<center><form name="form_list" action="save_1.php" method="post">
						<input type="hidden" name="input_code" value="<?=$code?>">
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="4" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>시스템 어플</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>파일 이름</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>odex</strong></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>설명</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>삭제 여부</strong></span></font></p>
								</td>
							</tr>
							<?
if(!$input_all) {
for($i=1;$i<=61;$i++)
{
$j = "input_".$i;
$k = substr($j, 6);
if($_POST[$j]) $list = $list." or code='$k'";
}
$result = mysql_query("SELECT * FROM $db where guide<3 and category='1' and (code='0' $list) ORDER BY no", $dbconn);
			// 게시물 목록
			while($apk = mysql_fetch_array($result)) {
				if($apk[guide] =="1") {
					$color="green";
					$text="가능";
				} else {
					$color="red";
					$text="주의";
				}
				if($apk[odex] =="1") {
					$color1="red";
					$text1="Y";
				} else {
					$color1="black";
					$text1="";
				}

		?>
							<tr style="cursor:pointer;" onclick="apk(<?=$apk[no]?>);" onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#e0ebff';">
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong><?=$apk[name]?>.apk</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color1?>"><span style="font-size:9pt;"><?=$text1?></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$apk[name_kor]?></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color?>"><span style="font-size:9pt;"><?=$text?></span></font></p>
								</td>
							</tr>
							<tr id="apk<?=$apk[no]?>" style="cursor:pointer;" onclick="apk(<?=$apk[no]?>);" style="display:none;" onmouseout="this.style.backgroundColor='#ffffff';" onmouseover="this.style.backgroundColor='#e0ebff';">
								<td colspan="4" style="width:550px;>
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><br><?=$apk[text]?><br><br></span></font></p>
								</td>
							</tr><?
						}}else{
for($i=1;$i<=61;$i++)
{
$j = "input_".$i;
$k = substr($j, 6);
$list = $list." or code='$k'";
}
$result = mysql_query("SELECT * FROM $db where guide<3 and category='1' and (code='0' $list) ORDER BY no", $dbconn);
			// 게시물 목록
			while($apk = mysql_fetch_array($result)) {
				if($apk[guide] =="1") {
					$color="green";
					$text="가능";
				} else {
					$color="red";
					$text="주의";
				}
				if($apk[odex] =="1") {
					$color1="red";
					$text1="Y";
				} else {
					$color1="black";
					$text1="";
				}

		?>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong><?=$apk[name]?>.apk</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color1?>"><span style="font-size:9pt;"><?=$text1?></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$apk[name_kor]?></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color?>"><span style="font-size:9pt;"><?=$text?></span></font></p>
								</td>
							</tr><?
						}}
							?>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="4" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>통신사 어플</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>파일 이름</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>odex</strong></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>설명</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>삭제 여부</strong></span></font></p>
								</td>
							</tr>
							<?
for($i=1;$i<=61;$i++)
{
$j = "input_".$i;
$k = substr($j, 6);
if($_POST[$j]) $list = $list." or code='$k'";
}
$result = mysql_query("SELECT * FROM $db where guide<3 and category='2' and (code='0' $list) ORDER BY no", $dbconn);
			// 게시물 목록
			while($apk = mysql_fetch_array($result)) {
				if($apk[guide] =="1") {
					$color="green";
					$text="가능";
				} else {
					$color="red";
					$text="주의";
				}
				if($apk[odex] =="1") {
					$color1="red";
					$text1="Y";
				} else {
					$color1="black";
					$text1="";
				}

		?>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong><?=$apk[name]?>.apk</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color1?>"><span style="font-size:9pt;"><?=$text1?></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$apk[name_kor]?></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color?>"><span style="font-size:9pt;"><?=$text?></span></font></p>
								</td>
							</tr><?
							}
							?>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="4" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>편의 어플</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>파일 이름</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>odex</strong></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>설명</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>삭제 여부</strong></span></font></p>
								</td>
							</tr>
							<?
for($i=1;$i<=61;$i++)
{
$j = "input_".$i;
$k = substr($j, 6);
if($_POST[$j]) $list = $list." or code='$k'";
}
$result = mysql_query("SELECT * FROM $db where guide<3 and category='3' and (code='0' $list) ORDER BY no", $dbconn);
			// 게시물 목록
			while($apk = mysql_fetch_array($result)) {
				if($apk[guide] =="1") {
					$color="green";
					$text="가능";
				} else {
					$color="red";
					$text="주의";
				}
				if($apk[odex] =="1") {
					$color1="red";
					$text1="Y";
				} else {
					$color1="black";
					$text1="";
				}

		?>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong><?=$apk[name]?>.apk</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color1?>"><span style="font-size:9pt;"><?=$text1?></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$apk[name_kor]?></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color?>"><span style="font-size:9pt;"><?=$text?></span></font></p>
								</td>
							</tr><?
							}
							?>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="4" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>위젯 어플</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>파일 이름</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>odex</strong></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>설명</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>삭제 여부</strong></span></font></p>
								</td>
							</tr>
							<?
for($i=1;$i<=61;$i++)
{
$j = "input_".$i;
$k = substr($j, 6);
if($_POST[$j]) $list = $list." or code='$k'";
}
$result = mysql_query("SELECT * FROM $db where guide<3 and category='4' and (code='0' $list) ORDER BY no", $dbconn);
			// 게시물 목록
			while($apk = mysql_fetch_array($result)) {
				if($apk[guide] =="1") {
					$color="green";
					$text="가능";
				} else {
					$color="red";
					$text="주의";
				}
				if($apk[odex] =="1") {
					$color1="red";
					$text1="Y";
				} else {
					$color1="black";
					$text1="";
				}

		?>
							<tr>
								<td style="width:220px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong><?=$apk[name]?>.apk</strong></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color1?>"><span style="font-size:9pt;"><?=$text1?></span></font></p>
								</td>
								<td style="width:210px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$apk[name_kor]?></span></font></p>
								</td>
								<td style="width:70px; height:25px;">
									<p align="left"><font face="Gulim" color="<?=$color?>"><span style="font-size:9pt;"><?=$text?></span></font></p>
								</td>
							</tr><?
							}
							?>
						</table><br><br>
						
						
						<br>
						<input type="image" src="images/button_ok_1.gif" id="submit_ok" name="submit_ok" value="submit" OnMouseOut="this.src='images/button_ok_1.gif';" onmouseover="this.src='images/button_ok_2.gif';" border="0" align="absbottom" alt="확인" style="width:60px; height:30px; cursor:pointer;">&nbsp;&nbsp;<a href="javascript:window.history.go(-1);"><img src="images/button_cancel_1.gif" name="button_cancel" id="button_cancel" OnMouseOut="button_cancel.src='images/button_cancel_1.gif';" onmouseover="button_cancel.src='images/button_cancel_2.gif';" border="0" align="absbottom" alt="취소" style="width:60px; height:30px;"></a><br><br><br><br>
					</span></font></p></form></center>
				</span></font></p>
			</td>
		</tr>
	</table></center>
</body>

</html>