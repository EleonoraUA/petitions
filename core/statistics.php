
<?php 
$link = mysql_connect("localhost", "root", "12345");
$db =mysql_select_db("petition", $link);
if (!$db) 
	die ("Unable to choose HB " .mysql_error());
if (!$link) 
	die ("Unable to connect");

$result = array();
$all_query = "SELECT COUNT(*) AS 'all' FROM petition WHERE 1";
$answer_query = "SELECT COUNT(*) AS 'answer' FROM petition WHERE state = 'with_answer'";
$process_query = "SELECT COUNT(*) AS 'pr' FROM petition WHERE petition_state = 'in_process' AND state != 'with_answer'";
//if (!($all_q = mysql_query($all_query))) {
//	die(mysql_error());
//}
$all = mysql_fetch_assoc(mysql_query($all_query));
$answer = mysql_fetch_assoc(mysql_query($answer_query));
$process = mysql_fetch_row(mysql_query($process_query));
$result['all'] = (int)$all['all'];
$result['answer'] = (int)$answer['answer'];
$result['process'] = (int)$process[0];
echo json_encode($result);