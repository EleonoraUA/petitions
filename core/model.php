<?php

class Model
{
	function __construct() {
		$link = mysql_connect("localhost", "root", "12345");
		$db =mysql_select_db("petition", $link);
		if (!$db) die ("Unable to choose HB " .mysql_error());
		if (!$link) die ("Unable to connect");
		mysql_query('SET NAMES utf8;');
	
	}
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	// метод выборки данных
	public function get_data()
	{
		// todo
	}
}