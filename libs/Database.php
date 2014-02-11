<?php
class Database extends PDO {

	public function __construct($type,$host,$name,$user,$pass){
		 	

		//parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTIONS);
	}


	/**
	* @param string $sql a sql query
	* @param array $array array param of array
	* @param constant $fetchMode a PDO fetch mode
	* return array
	**/

	public function select($sql,$array = array(),$fetchMode = PDO::FETCH_ASSOC){

		$sth = $this->prepare($sql);
		foreach($array as $key => $value){
			$sth->bindValue(":$key",$value);
		}
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	/**
	* @param string $table name of table
	* @param string $data array contain data
	*
	**/
	public function insert($table,$data){
		
		ksort($data);

		$fieldNames = implode("`, `", array_keys($data));
		$fieldValues = ":". implode(", :", array_keys($data));
		
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key",$value);
		}
		
		$sth->execute();
	}

	/**
	* @param string $table name of table
	* @param string $data array contain data
	* @param string $where array condition
	**/
	public function update($table,$data,$where){

		ksort($data);

		$fieldDetails = NULL;
		foreach($data as $key => $value){
			$fieldDetails.= "`$key`=:$key, ";
		}
		$fieldDetails = rtrim($fieldDetails,", ");

		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key",$value);
		}
		
		$sth->execute();
	}

	/**
	* @param string $table name of table
	* @param string $where array/string condition
	**/
	public function delete($table,$where,$limit = 1){
		return $this->exec("DELETE FROM users WHERE $where LIMIT $limit");
	}
}