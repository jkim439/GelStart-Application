<?

// ���� ����
ob_start();
session_start();

// �����ͺ��̽� ����
$dbconn = mysql_connect('localhost',gelstart,pw) or die;
mysql_select_db(gelstart_godohosting_com,$dbconn);
mysql_query("set names utf8");

?>