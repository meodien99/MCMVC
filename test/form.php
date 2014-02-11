<?php

require '../libs/Form.php';

try{
	if(isset($_REQUEST['run'])){
	$form = new Form();

	$form 	->post('name')->val('minlength',2)

			->post('age')->val('digit')
			->post('gender');

	$data = $form -> fetch();

	$form -> submit();
	}
}catch(Exception $e){
	echo $e->getMessage();
}
?>

<form action="?run" method="post">
		Name <input type="text" name="name">
		Age <input type="text" name="age">
		Gender <select name="gender" id="">
			<option value="m">Male</option>
			<option value="f">Female</option>
		</select>
		<input type="submit">
	</form>	