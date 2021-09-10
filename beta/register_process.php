<?
// 헤더	연결
include	"../header.php";

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=4966';</script>"; exit;
}

// 세션 검사
if(!$_SESSION[code]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=4923';</script>"; exit;
}

// 세션 검사
if(!$_SESSION[no]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=4923';</script>"; exit;
}

// 컴퓨터 등록
$member = mysql_fetch_array(mysql_query("select * from member where no='$_SESSION[no]'"));
if($member[code]) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=4923';</script>"; exit;
} else {
	mysql_query("update member set code='$_SESSION[code]' where no='$member[no]'", $dbconn);
	unset($_SESSION[no]);
	echo "<script>alert('등록이 완료되었습니다.');self.location.href='login.php';</script>"; 
	exit;
}
?>