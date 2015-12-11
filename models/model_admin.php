<?php

class Model_Admin extends Model {

	public function getNewPetitions()
	{	
		$this->controlPetitions();
		$new = array();
		$query = "SELECT petition.`id`, `first_name`, `last_name`, `date`, `text`, `topic`, `benefit` FROM `petition` JOIN users ON petition.author_id = users.id WHERE petition_state='queue'";
		$mysql = mysql_query($query);
		$i = 0;
		while ($arr = mysql_fetch_assoc($mysql)) {
			$new[$i] = $arr;
			$i++;
		}
		return $new;
	}

	private function controlPetitions()
	{
		if (!empty($_GET['publ'])) {
			$q = "UPDATE petition SET petition_state='active' WHERE id='". $_GET['publ']. "'";
			if (!mysql_query($q)) {
				die(mysql_error());
			} else {
				echo "Published!";
				header("Location: /petitions/admin/new/");
			}
		}

		if (!empty($_GET['del'])) {
			$q = "DELETE FROM petition WHERE id='". $_GET['del']. "'";
			if (!mysql_query($q)) {
				die(mysql_error());
			} else {
				echo "Deleted!";
				header("Location: /petitions/admin/new/");
			}
		}
	}

	public function addAnswer()
	{
		error_reporting(E_ALL);
		if (!empty($_GET['ans'])) {
			$today = date("Y-m-d");
			$id = $_GET['ans'];
			$text = $_POST['text'];

			$ans = "INSERT INTO `answer`(`petition_id`, `text`, `date`) VALUES('$id', '$text', '$today')";
			if (!mysql_query($ans)) {
				die(mysql_error());
			} else {
				$name_query = "SELECT `first_name`, `last_name` FROM users JOIN petition ON author_id = users.id WHERE petition.id = '$id'";
				if (!($q = mysql_query($name_query))) {
					die(mysql_error());
				} else {
					$update = "UPDATE petition SET state='with_answer' WHERE id='".$id."'";
					//if (!($u = mysql_query($update))) {
					//	die(mysql_error());
					//}
					$notWorking = mysql_query($update);
					if (!$notWorking) {
						die(mysql_error());
					}
					while ($fullName = mysql_fetch_assoc($q)) {
						$firstName = $fullName['first_name'];
						$lastName = $fullName['last_name'];
					
					}
					echo "Ви відповіли ".$firstName." ".$lastName;
				}
			}
		}
				
		if (!empty($_GET['answer'])) {
			include_once('views/admin/answer_form.php');
		}
	}
}