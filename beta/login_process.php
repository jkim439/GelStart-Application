<?
// 헤더	연결
include	"../header.php";

// 변수 검사
if(!isset($_POST[input_id]) || !isset($_POST[input_pw]) || empty($_POST[input_id]) || empty($_POST[input_pw])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=9038';</script>"; exit;
}

// 변수 변환
$id = mysql_real_escape_string($_POST[input_id]);
$pw = mysql_real_escape_string($_POST[input_pw]);
$ip = mysql_real_escape_string($_SERVER[REMOTE_ADDR]);
$id = trim($id);
$id = strip_tags($id);
$id = htmlentities($id,ENT_QUOTES,'UTF-8');
$pw = trim($pw);
$pw = strip_tags($pw);
$pw = htmlentities($pw,ENT_QUOTES,'UTF-8');

// 접속 검사
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=9066';</script>"; exit;
}

// 전송 검사
if(getenv("REQUEST_METHOD")!="POST") {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=9002';</script>"; exit;
}

// 세션 검사
if(!$_SESSION[code]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=9023';</script>"; exit;
}

// 빈칸 검사
if(!$id) {
	echo "<title>Error</title><script>alert('아이디를 입력하여 주십시오.');self.location.href='login.php';</script>"; exit;
}
if(!$pw) {
	echo "<title>Error</title><script>alert('비밀번호를 입력하여 주십시오.');self.location.href='login.php';</script>"; exit;
}

// 아이디 검색
$member = mysql_fetch_array(mysql_query("select * from member where id='$id'"));

// 아이디 검사
if(!$member[id]) {
	echo "<title>Error</title><script>alert('아이디 또는 비밀번호가 올바르지 않습니다.');self.location.href='login.php';</script>"; exit;
} else {
	if($member[pw]==$pw) {
		if(!$member[code]) {
			$_SESSION[no] = "$member[no]";
			echo "<title>Error</title><script>alert('최초로 접속하셨습니다.');self.location.href='register.php';</script>"; exit;
		} else {
			if($member[code]!=$_SESSION[code]) {
				echo "<title>Error</title><script>alert('해당 계정에서 등록한 컴퓨터가 아닙니다.');self.location.href='login.php';</script>"; exit;
			} else {
				// 날짜 정보 구하기
				$time = time();
				// 로그인 인증
				$login = md5(md5($member[no]).md5($ip).md5($member[code]).md5($_SERVER[HTTP_USER_AGENT]).md5($time));
				$_SESSION[login] = "$login";
				mysql_query("update member set ip='$ip' where no='$member[no]'", $dbconn);
				mysql_query("update member set login='$login' where no='$member[no]'", $dbconn);
				unset($_SESSION[code]);
				echo "<script>self.location.href='notice.php';</script>"; exit;
			}
		}
	} else {
		//mysql_query("update member set ip='$_SERVER[REMOTE_ADDR]' where no='$member[no]'", $dbconn);
		echo "<title>Error</title><script>alert('아이디 또는 비밀번호가 올바르지 않습니다.');self.location.href='login.php';</script>"; exit;
	}
}			
?>