<?php
/**
* -Fill out a form
*	- POST to PHP
*	- Sanitize
*	- Validate
*	- Return data
*	- Write to Database
**/
require 'Form/Val.php';
class Form {

	/* @var $_currentItem The item immediately */
	private $_currentItem = null;

	/* @var array $_postData stores posted data */
	private $_postData = array();

	/* @var object $_val The object of validate */
	private $_val = null;

	/* @var array $_error Holds current form error */
	private $_error = array();

	public function __construct(){
		$this->_val = new Val();
	}

	//this is to run $_POST
	public function post($field){
		$this->_postData[$field] = $_POST[$field]; //gan vao mang postData array("$field"=>$_POST[$field])
		$this->_currentItem = $field; //lay ten item selected
		return $this ; //return a form object
	}


	//This is to return posted data
	//return string or array
	public function fetch($fieldName = false){
		if($fieldName){ //khong truyen vao ten trg -> tra ve mang 
			if(isset($this->_postData[$fieldName])) //neu ton tai gia tri trong field
				return $this->_postData[$fieldName];
			else
				return false;
		}else{ //neu co' -> tra ve gia tri trong field
			return $this->_postData;
		}
		
	}

	//This is to run validate
	public function val($typeOfValidator,$arg = false){
		if($arg == null)
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]); 
		else
			//val->typeofValidator(post_value,arg)
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem],$arg); 
		
		
		if($error)
			$this->_error[$this->_currentItem] = $error;


		return $this;
	}

	public function submit(){
		if(empty($this->_error)){
			return true;
		}else{
			$str = null;
			foreach($this->_error as $key => $value){
				$str .= $key . ' => ' . $value . ' \n ' ;
			}
			throw new Exception($str);
		}
	}
}