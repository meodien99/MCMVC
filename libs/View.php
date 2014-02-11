<?php
class View {
	function __construct(){
		//echo "This is a view <br>";
	}

	public function render($name,$condInclude = false){
		$file = 'views/'. $name.'.php';
		if($condInclude == true){
			require $file;
		}else{
			require 'views/header.php';
			require $file;
			require 'views/footer.php';
		}
		
	}
}