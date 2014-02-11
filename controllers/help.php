<?php
class Help extends Controller{
	function __construct(){
		parent::__construct();
		//echo "We are in help<br>";
	}

	public function index(){
		$this->view->render('help/index');
	}

	public function other($arg = false){

		require 'models/help_model.php';
		$new = new Help_Model();
	}

}