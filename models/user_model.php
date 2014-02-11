<?php
class User_Model extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function usersList(){
		return $this->db->select('SELECT id,login,role FROM users');
	}

	public function create($data){
		$data = array(
			'login' =>$data['login'],
			'password'=>$data['password'],
			'role'=>$data['role']
			);
		$this->db->insert('users',$data);

		/*
		$sth = $this->db->prepare('INSERT INTO users 
								(`login`,`password`,`role`) 
								VALUES (:login , :password , :role)
								');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(
			':login'=>$data['login'],
			':password'=>$data['password'],
			':role' => $data['role']
			));
		*/
	}

	public function delete($id){
		//$this->db->delete('users',"`id`={$id}");
		$r = $this->db->select('SELECT role FROM users WHERE id = :id',array('id'=>$id));
		
		print_r($r);

		if($r[0]["role"] == 'owner'){
			return false;
		}
		$this->db->delete('users',"`id` = $id");
		header('location: '. URL .'user');
		//die();
		
	}

	public function userSingleList($id){
		return $this->db->select('SELECT id , login, role FROM users WHERE id= :id',array('id'=>$id));
	}

	public function editSave($data){
		$detailData = array(
			'login' =>$data['login'],
			'password'=>$data['password'],
			'role'=>$data['role']
			);
		$this->db->update('users',$detailData,"`id` = {$data['id']}");

		/*
		$sth = $this->db->prepare('UPDATE users SET `login`=:login,`password`=:password,`role`=:role WHERE id=:id');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute(array(
			':id'=>$data['id'],
			':login'=>$data['login'],
			':password'=>$data['password'],
			':role' => $data['role']
			));*/
		//header('location: '. URL .'user');
	}
}