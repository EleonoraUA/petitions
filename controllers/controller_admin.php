<?php
require_once("controller_main.php");
require_once("models/model_main.php");
class Controller_Admin extends Controller_Main {
	function __construct()
	{
		$this->view = new View();
		$this->model = new Model_Admin();
		$this->view->generate("header.phtml");
		$this->view->generate("admin/menu.html");
	}

	function action_index()
	{
		$this->action_new();
	}

	function action_new()
	{
		$new = $this->model->getNewPetitions();
		include_once("views/admin/new.php");
	}

	function action_active()
	{
		$this->model = new Model_Main();
		$new = $this->model->getActivePetitions('active');
		$count = $this->model->countOfSignes();
		$days_left = $this->model->daysLeft();
		include_once 'views/active.php';
	}

	function action_notConfirmed()
	{
		$main = new Model_Main();
		$this->model->addAnswer();
		$days_left = 0;
		$new = $main->getActivePetitions('in_process');
		$count = $main->countOfSignes();
		$confirmed = true;
		include_once 'views/active.php';
	}

	function action_with_answer()
	{
		$main = new Model_Main();
		$new = $main->getActivePetitions('with_answer');
		$answer = $main->getAnswers();
		$count = $main->countOfSignes();
		include_once 'views/answer.php';
	}
}