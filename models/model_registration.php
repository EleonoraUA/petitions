<?php

class Model_Registration extends Model {
	
	function validate()
	{
		if(!empty($_POST['f_name'])) {
			$f_name = $_POST['f_name'];
			$l_name = $_POST['l_name'];
			$email = $_POST['email'];
			$passport = $_POST['passport'];
			$password = $_POST['password'];
			$query = "INSERT INTO `users` 
					  VALUES (NULL,'$f_name', '$l_name', '$email', '$password', '$passport', NULL)";
			if (!mysql_query($query)) {
				echo mysql_error();
			} else {
				echo "<h1>"."Дякуємо за регістрацію! Ви будете перенаправлені на головну сторінку."."</h1>";
				header( "refresh:3;url=/petitions/main/all");
			}
    		unset($_POST);
		}
	}
	
}