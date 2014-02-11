<?php
class Login_Model extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function run(){

		$sth = $this->db->prepare("SELECT * from users WHERE login = :login and password = :password ");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => Hash::create('md5',$_POST['password'])
			));


		//$data = $sth->fetchAll();

		$data = $sth->fetch();
	
		$count = $sth->rowCount();
		
		if($count >0){
			//login 
			//vao dashboard
			Session::init();
			Session::set('role',$data['role']);
			Session::set('loggedIn',true);
			header('location: ../dashboard');
		}else{
			//show an error
			header('location: ../login');
		}
	}
}