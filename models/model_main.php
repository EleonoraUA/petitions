<?php

class Model_Main extends Model {
	
	public function addPetition()
	{
		if (!empty($_POST['text'])) {
			session_start();
			$text = addslashes($_POST['text']);
			$topic = addslashes($_POST['topic']);
			$benefit = addslashes($_POST['benefit']);
			$pass = $_SESSION['passport'];
			$id_query = "SELECT `id` FROM users WHERE passport = '".$pass."'";
			$id_q = mysql_query($id_query);
			if (!$id_q) die(mysql_error());
			$id_fetch = mysql_fetch_array($id_q);
			if (!$id_fetch) {
				echo mysql_error();
			}
			$id = $id_fetch[0];
			$date = date('Y-m-d');
			$query = "INSERT INTO `petition` VALUES (NULL,'$id', '$topic', '$text', '$date', '$benefit', 'queue', '')";
			if (!mysql_query($query)) {
				echo mysql_error();
			} else {
				echo "<h1>"."Дякуємо за підтримку! Ви будете перенаправлені на головну сторінку."."</h1>";
				header( "refresh:3;url=/petitions/main/all");
			}
			
		}
	}

	public function getActivePetitions($state)
	{
		$new = array();
		if ($state != 'with_answer')
			$query = "SELECT petition.`id`, `first_name`, `last_name`, `date`, `text`, `topic`, `benefit` FROM `petition` JOIN users ON petition.author_id = users.id WHERE state != 'with_answer' AND petition_state='".$state."'";
		else 
			$query = "SELECT petition.`id`, `first_name`, `last_name`, `date`, `text`, `topic`, `benefit` FROM `petition` JOIN users ON petition.author_id = users.id WHERE state='".$state."'";

		$mysql = mysql_query($query);
		$i = 0;
		while ($arr = mysql_fetch_assoc($mysql)) {
			$new[$i] = $arr;
			$i++;
		}
		return $new;
	}

	public function getAnswers()
	{
		$answers = array();
		$answer_query = "SELECT `petition_id`, `text` FROM answer";
		$mysql = mysql_query($answer_query);
		while ($arr = mysql_fetch_assoc($mysql)) {
			$answers[$arr['petition_id']] = $arr['text'];
		}
		return $answers;
		

	}

	function signPetition()
	{
		if (!empty($_GET['sign'])) {
			$id = $this->getUserId();
			$petition_id = $_GET['sign'];
			$query = "INSERT INTO signatures VALUES ('$petition_id', '$id')";
			if (!($q = mysql_query($query))) {
				die(mysql_error());
			} else {
				header("Location: /petitions/main/active/");
			}
		}
	}

	function getUserId()
	{
		$query_id = "SELECT `id` FROM users WHERE passport = '".$_SESSION['passport']."'";
		$mysql = mysql_query($query_id);
		$id_arr = mysql_fetch_row($mysql);
		return $id = $id_arr[0];
	}

	function signedPetition()
	{
		$id = $this->getUserId();
		$q = "SELECT petition_id FROM signatures WHERE user_id = '$id'";
		if (!($query = mysql_query($q))) {
			die(mysql_error());
		} else {
			while ($arr = mysql_fetch_array($query)) {
				$new[$i] = $arr['petition_id'];
				$i++;
			}
		}
		return $new;
	}

	function countOfSignes()
	{
		$countForPresident = 6;
		$result = array();
		$q = "SELECT petition_id FROM signatures GROUP BY petition_id";
		$query = mysql_query($q);
		while ($arr = mysql_fetch_assoc($query)) {
			$qC = "SELECT COUNT(*) AS count FROM signatures WHERE petition_id='". $arr['petition_id'] ."'";
			$qQ = mysql_query($qC);
			$cT = mysql_fetch_array($qQ);
			if ($cT['count'] >= $countForPresident) {
				$q = "UPDATE `petition` SET petition_state='in_process' WHERE id = '". $arr['petition_id']. "'";
				mysql_query($q);
			}
				$result[$arr['petition_id']] = $cT['count'];
			
		}
		return $result;
	}

	function daysLeft()
	{	
		$days = array();
		$daysForSign = 20;
		$today = date('Y-m-d');
		$q = "SELECT `id`, `date` FROM petition";
		$query = mysql_query($q);
		while ($arr = mysql_fetch_assoc($query)) {
			$iResult=floor((strtotime($today)-strtotime($arr['date']))/(3600*24));
			$iResult = $daysForSign - $iResult;
			if (!$iResult) {
				$q = "UPDATE `petition` SET petition_state='expired' WHERE id = '". $arr['id']. "'";
				$query = mysql_query($q);
			} else {
				$days[$arr['id']] = $iResult;
			}
		}
		return $days;

	}
	
}