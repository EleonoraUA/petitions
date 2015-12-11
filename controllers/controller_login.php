<?php
require_once("controller_main.php");
class Controller_login extends Controller_Main {

	function __construct()
	{
		$this->view = new View();
		$this->model = new Model_Login();
		$this->view->generate("header.phtml");
		$this->view->generate("menu.html");
	}

	function action_index()
	{
		if (!empty($_POST)) {
			$this->model->validate();
		} else {
			$this->view->generate("login_form.html");
		}
	}

	function action_out()
	{
		session_destroy();
		header("Location: /petitions/main");
	}

}