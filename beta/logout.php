<?
// ���	����
include	"../header.php";

// ���� �˻�
if(!eregi($_SERVER[HTTP_HOST],$_SERVER[HTTP_REFERER])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0066';</script>"; exit;
}

// ���� �˻�
if(!isset($_SESSION[login]) || empty($_SESSION[login])) {
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0038';</script>"; exit;
}

// �α��� �˻�
$member = mysql_fetch_array(mysql_query("select * from member where login='$_SESSION[login]'",$dbconn));
if(!$_SESSION[login] || $_SESSION[login]!=$member[login]) {
	session_destroy();
	echo "<title>Error</title><script>alert('Unusual access has been detected.');self.location.href='error.php?code=0098';</script>"; exit;
}

unset($_SESSION[login]);
$_SESSION[code] = "$member[code]";

echo "<title>Logout</title><script>self.location.href='login.php';</script>"; exit;

?>