<?php
class Error extends Controller{
	function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$this->view->msg = "This view does not exist";
		$this->view->render('error/index');
	}
}