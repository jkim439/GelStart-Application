<?

// 서비스 시작
ob_start();
session_start();

// 데이터베이스 연결
$dbconn = mysql_connect('localhost',gelstart,pw) or die;
mysql_select_db(gelstart_godohosting_com,$dbconn);
mysql_query("set names utf8");

?>