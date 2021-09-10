<?
// 헤더	연결
include	"../header.php";

// 변수 검사
if(!isset($_POST[input_model]) || !isset($_POST[input_version]) || empty($_POST[input_model]) || empty($_POST[input_version])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0238';</script>"; exit;
}

// 변수 변환
$model = mysql_real_escape_string($_POST[input_model]);
$model = trim($model);
$model = strip_tags($model);
$model = htmlentities($model,ENT_QUOTES,'UTF-8');
$version = mysql_real_escape_string($_POST[input_version]);
$version = trim($version);
$version = strip_tags($version);
$version = htmlentities($version,ENT_QUOTES,'UTF-8');

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0266';</script>"; exit;
}

// 전송 검사
if(getenv("REQUEST_METHOD")!="POST") {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0202';</script>"; exit;
}

// 로그인 검사
$member = mysql_fetch_array(mysql_query("select * from member where login='$_SESSION[login]'",$dbconn));
if(!$_SESSION[login] || $_SESSION[login]!=$member[login]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0298';</script>"; exit;
}
if($model=="shwm250s") {
	if($version=="ej04") {
		echo "<title>Process</title><script>self.location.href='start_2.php?code=shwm250sej04';</script>"; exit;
	} else {
		echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0266';</script>"; exit;
	}
} else {
		echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0266';</script>"; exit;
}
?>