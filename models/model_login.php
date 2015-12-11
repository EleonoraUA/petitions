<?php

class Model_Login extends Model {
	function validate()
	{
		if(!empty($_POST['email'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$this->get_data($email, $password);
    		unset($_POST);
		}
	}

	public function get_data($email, $password)
	{	
		$q = "SELECT `password`, `first_name`, `last_name`, `passport`, `admin` FROM users WHERE email='$email'";
	    $arr = mysql_query($q);
	    $row = mysql_fetch_assoc($arr);
	    if (!$arr) die ("Error ". mysql_error());
	    $passw = $row['password'];
	    if (!strcmp($passw, $_POST['password'])) {
	    	session_start();
	        $_SESSION['email'] = $_POST['email'];
	        $_SESSION['first_name'] = $row['first_name'];
	        $_SESSION['last_name'] = $row['last_name'];
	        $_SESSION['passport'] = $row['passport'];
	        $_SESSION['admin'] = $row['admin'];
	        if ($row['admin']) {
	        	header("Location: /petitions/admin");
	        } else {
	        	header("Location: /petitions/main");
	        }
	    }
	    	else echo "ERROR!";
	}

}