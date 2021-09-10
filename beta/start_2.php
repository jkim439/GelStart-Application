<?
session_cache_limiter("private_no_expire");
// 헤더	연결
include	"../header.php";

// 변수 검사
if(!isset($_GET[code]) || empty($_GET[code])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0238';</script>"; exit;
}

// 변수 변환
$code = mysql_real_escape_string($_GET[code]);
$code = trim($code);
$code = strip_tags($code);
$code = htmlentities($code,ENT_QUOTES,'UTF-8');

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0266';</script>"; exit;
}

// 로그인 검사
$member = mysql_fetch_array(mysql_query("select * from member where login='$_SESSION[login]'",$dbconn));
if(!$_SESSION[login] || $_SESSION[login]!=$member[login]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0298';</script>"; exit;
}
if($code=="shwm250sej04") {
		$code = "shwm250sej04";
		$model = "SHW-M250S";
		$version = "EJ04";
		$telecom = "SKTelecom";
		$db = "list_".$code;
	} else {
		echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0266';</script>"; exit;
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

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" ondragstart="return false;" onselectstart="return false;" style="cursor:default;" onload="all21();">
	<center><table border="0" cellspacing="0" cellpadding="0" style="width:650px; height:330px; cursor:defalut;">
		<tr>
			<td style="width:650px; height:100px; background-image:url('images/title_start_2.gif');">
			</td>
		</tr>
		<tr>
			<td style="width:650px; height:230px; cursor:default;">
				<p align="left" style="margin-left:20px"><font face="Gulim" color="black"><span style="font-size:9pt;"><br><br><br>
					<?=$model?>(<?=$telecom?>) <?=$version?> 전용 맞춤형 목록입니다.<br><br>
					<strong>삭제를 원하는 어플을 모두 체크해 주세요.</strong>
				</span></font></p>
				<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;">
					<br><br><br><center><form name="form_list" action="start_3.php" method="post">
						<input type="hidden" name="input_code" value="<?=$code?>">
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(255,95,95); border-style:solid;">
							<tr>
								<td style="width:550px; height:25px; background-color:rgb(255,0,0);">
									<p align="center"><font face="Gulim" color="white"><span style="font-size:9pt;"><strong>스피드 목록</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td style="width:550px;">
									<p align="left" style="margin-left:20px"><font face="Gulim" color="black"><span style="font-size:9pt;">
										<br>최대한 많은 어플을 모두 삭제하여 폰을 가장 빠르고 배터리가 오래가길 원하시면,<br><br>스피드 목록을 이용해 보세요. 오직 <strong>프리미엄</strong> 계정만 이용할 수 있습니다.
										<br><br><?if($member[level]>1) {?><label for="input_all"><input type="checkbox" name="input_all" id="input_all" value="1" onclick="all21();"> <strong>스피드 목록 이용</strong></label><?}else{?><input type="checkbox" name="input_all" id="input_all" value="1" disabled> <font color="#c4c4c4"><strong>스피드 목록 이용</strong></font><?}?><br><br>
									</span></font></p>
								</td>
							</tr>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="3" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>시스템 어플</strong></span></font></p>
								</td>
							</tr>
							<?
// 전체 글 수
$total = mysql_query("SELECT COUNT(*) FROM $db",$dbconn);
$total = mysql_result($total, 0, "COUNT(*)");
$result = mysql_query("SELECT * FROM $db where category='1' ORDER BY no DESC", $dbconn);
			// 게시물 목록
			while($list = mysql_fetch_array($result)) {

		?>
							<tr>
								<td style="width:10px; height:25px;"></td>
								<td style="width:160px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><label for="input_<?=$list[no]?>"><input type="checkbox" name="input_<?=$list[no]?>" id="input_<?=$list[no]?>" value="1"> <strong><?=$list[name]?></strong></label></span></font></p>
								</td>
								<td style="width:360px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$list[text]?></span></font></p>
								</td>
							</tr><?}?>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="3" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>통신사 어플</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="width:550px;">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><br>SKTelecom에서 제공하는 통신사 어플입니다.<br><br>쓸 데 없는 어플은 삭제해 주세요.<br><br></span></font></p>
								</td>
							</tr>
							<?
// 전체 글 수
$total = mysql_query("SELECT COUNT(*) FROM $db",$dbconn);
$total = mysql_result($total, 0, "COUNT(*)");
$result = mysql_query("SELECT * FROM $db where category='2' ORDER BY no DESC", $dbconn);
			// 게시물 목록
			while($list = mysql_fetch_array($result)) {

		?>
							<tr>
								<td style="width:10px; height:25px;"></td>
								<td style="width:160px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><label for="input_<?=$list[no]?>"><input type="checkbox" name="input_<?=$list[no]?>" id="input_<?=$list[no]?>" value="1"> <strong><?=$list[name]?></strong></label></span></font></p>
								</td>
								<td style="width:360px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$list[text]?></span></font></p>
								</td>
							</tr><?}?>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="3" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>편의 어플</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="width:550px;">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><br>편의를 위해 부가적으로 설치되는 어플입니다.<br><br>사용하지 않는 어플은 삭제해 주시기 바랍니다.<br><br></span></font></p>
								</td>
							</tr>
							<?
// 전체 글 수
$total = mysql_query("SELECT COUNT(*) FROM $db",$dbconn);
$total = mysql_result($total, 0, "COUNT(*)");
$result = mysql_query("SELECT * FROM $db where category='3' ORDER BY no DESC", $dbconn);
			// 게시물 목록
			while($list = mysql_fetch_array($result)) {

		?>
							<tr>
								<td style="width:10px; height:25px;"></td>
								<td style="width:160px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><label for="input_<?=$list[no]?>"><input type="checkbox" name="input_<?=$list[no]?>" id="input_<?=$list[no]?>" value="1"> <strong><?=$list[name]?></strong></label></span></font></p>
								</td>
								<td style="width:360px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$list[text]?></span></font></p>
								</td>
							</tr><?}?>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(81,100,129); border-style:solid;">
							<tr>
								<td colspan="3" style="width:550px; height:25px; background-color:rgb(224,235,255);">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><strong>위젯 어플</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="width:550px;">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><br>위젯에 해당하는 어플입니다.<br><br>위젯은 시스템 메모리를 많이 차지하므로 최대한 많이 삭제하시길 바랍니다.<br><br></span></font></p>
								</td>
							</tr>
							<?
// 전체 글 수
$total = mysql_query("SELECT COUNT(*) FROM $db",$dbconn);
$total = mysql_result($total, 0, "COUNT(*)");
$result = mysql_query("SELECT * FROM $db where category='4' ORDER BY no DESC", $dbconn);
			// 게시물 목록
			while($list = mysql_fetch_array($result)) {

		?>
							<tr>
								<td style="width:10px; height:25px;"></td>
								<td style="width:160px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><label for="input_<?=$list[no]?>"><input type="checkbox" name="input_<?=$list[no]?>" id="input_<?=$list[no]?>" value="1"> <strong><?=$list[name]?></strong></label></span></font></p>
								</td>
								<td style="width:360px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$list[text]?></span></font></p>
								</td>
							</tr><?}?>
						</table><br><br>
						<table border="0" cellspacing="0" cellpadding="0" style="width:550px; border-width:2pt; border-color:rgb(90,90,90); border-style:solid;">
							<tr>
								<td colspan="3" style="width:550px; height:25px; background-color:rgb(0,0,0);">
									<p align="center"><font face="Gulim" color="white"><span style="font-size:9pt;"><strong>프리미엄</strong></span></font></p>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="width:550px;">
									<p align="center"><font face="Gulim" color="black"><span style="font-size:9pt;"><br>프리미엄 목록에서는 좀 더 세부적인 삭제를 하실 수 있습니다.<br><br>이 목록은 오직 <strong>프리미엄</strong> 계정만 이용하실 수 있습니다.<br><br></span></font></p>
								</td>
							</tr>
							<?
							if($member[level]=="1") {
// 전체 글 수
$total = mysql_query("SELECT COUNT(*) FROM $db",$dbconn);
$total = mysql_result($total, 0, "COUNT(*)");
$result = mysql_query("SELECT * FROM $db where category='5' ORDER BY no DESC", $dbconn);
			// 게시물 목록
			while($list = mysql_fetch_array($result)) {?>
							<tr>
								<td style="width:10px; height:25px;"></td>
								<td style="width:160px; height:25px;">
									<p align="left"><font face="Gulim" color="#c4c4c4"><span style="font-size:9pt;"><input type="checkbox" disabled> <strong><?=$list[name]?></strong></span></font></p>
								</td>
								<td style="width:360px; height:25px;">
									<p align="left"><font face="Gulim" color="#c4c4c4"><span style="font-size:9pt;"><?=$list[text]?></span></font></p>
								</td>
							</tr><?}}?>
							<?
							if($member[level]>1) {
// 전체 글 수
$total = mysql_query("SELECT COUNT(*) FROM $db",$dbconn);
$total = mysql_result($total, 0, "COUNT(*)");
$result = mysql_query("SELECT * FROM $db where category='5' ORDER BY no DESC", $dbconn);
			// 게시물 목록
			while($list = mysql_fetch_array($result)) {

		?>
							<tr>
								<td style="width:10px; height:25px;"></td>
								<td style="width:160px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><label for="input_<?=$list[no]?>"><input type="checkbox" name="input_<?=$list[no]?>" id="input_<?=$list[no]?>" value="1"> <strong><?=$list[name]?></strong></label></span></font></p>
								</td>
								<td style="width:360px; height:25px;">
									<p align="left"><font face="Gulim" color="black"><span style="font-size:9pt;"><?=$list[text]?></span></font></p>
								</td>
							</tr><?}}?>
						</table><br><br><br>
						<input type="image" src="images/button_ok_1.gif" id="submit_ok" name="submit_ok" value="submit" OnMouseOut="this.src='images/button_ok_1.gif';" onmouseover="this.src='images/button_ok_2.gif';" border="0" align="absbottom" alt="확인" style="width:60px; height:30px; cursor:pointer;">&nbsp;&nbsp;<a href="main.php"><img src="images/button_cancel_1.gif" name="button_cancel" id="button_cancel" OnMouseOut="button_cancel.src='images/button_cancel_1.gif';" onmouseover="button_cancel.src='images/button_cancel_2.gif';" border="0" align="absbottom" alt="취소" style="width:60px; height:30px;"></a><br><br><br><br>
					</span></font></p></form>
				</span></font></p>
			</td>
		</tr>
	</table></center>
</body>

</html>