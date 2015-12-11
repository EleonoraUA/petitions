<?php
require_once("core/view.php");

class Controller_Main {

	function __construct()
	{
		$this->view = new View();
		$this->model = new Model_Main();
		$this->view->generate("header.phtml");
		$this->view->generate("menu.html");
	}
	function action_index()
	{
		$this->action_active();
	}

	function action_active()
	{
		$state = true;
		$this->model->signPetition();
		$sP = $this->model->signedPetition();
		$new = $this->model->getActivePetitions('active');
		$count = $this->model->countOfSignes();
		$days_left = $this->model->daysLeft();
		include_once 'views/active.php';
	}

	function action_in_process()
	{
		$new = $this->model->getActivePetitions('in_process');
		$count = $this->model->countOfSignes();
		include_once("views/in_process.php");
	}

	function action_with_answer()
	{
		$main = new Model_Main();
		$new = $main->getActivePetitions('with_answer');
		$answer = $main->getAnswers();
		$count = $main->countOfSignes();
		include_once 'views/answer.php';
	}

	function action_statistics()
	{
		include_once("core/stat.php");
		include_once("views/statistics.php");
	}

	function action_add()
	{
		if (!empty($_POST)) {
			$this->model->addPetition();
			unset($_POST);
		} else {
			$this->view->generate("adding_form.phtml");

		}
	}

}