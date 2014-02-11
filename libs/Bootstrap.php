<?php
/**
* 
*/
class Bootstrap 
{
	
	function __construct(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url,'/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);

		if(empty($url[0])){//neu khong co controll , dung controller index.php
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}
		
		$file = 'controllers/'.$url[0].'.php'; // http:link/<url[0]>/url[1]/url[2]..
		

		if(file_exists($file)){ //if file/controller is existing
			require $file;
		}else{
			$this->error();
			return false; //tra ve false trong truong hop k tim thay controller , khong thuc thi $controller ben duoi
		}
		

		$controller = new $url[0]; //instance $url = name controller
		$controller->loadModel($url[0]); // load model from url(controller)

		//calling methods
		if(isset($url[2])){ //neu controller co arg url[2]
			if(method_exists($controller, $url[1])){ //neu ton tai function url[1]
				$controller -> {$url[1]}($url[2]); //goi phuong thuc tai controller url[0]
			}else{
				$this->error();
			}
		}else{
			if(isset($url[1])){ //if co function url[1] k co arg 
				if(method_exists($controller, $url[1])){
					$controller -> {$url[1]}(); // $controller->function()
				}else{
					$this->error();
				}
			}else{ //neu khong co function nao thi chay func index()
				$controller -> index();
			}
		}

	}

	function error(){
		require 'controllers/error.php';
		$error = new Error();
		$error->index();
		return false;
	}

}