<?php

class Val{

	public function __construct(){}

	public function __call($name,$arguments){
		throw new Exception ("$name does not exist inside of " . __CLASS__);
	}

	public function minlength($data,$arg){
		if (strlen($data) < $arg){
			return "Your string does not shorter than $arg ";
		}
	}

	public function maxlength($data,$arg){
		if (strlen($data) > $arg){
			return "Your string does not longer than $arg";
		}
	}

	public function digit($data){
		if(!ctype_digit($data)){
			return "Your string must be digit";
		}
	}
}