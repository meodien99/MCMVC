<?php
class Hash {

	/**
	*
	* @param string $algo The algorithm (md5,whirlpool,etc)
	* @param string $data The data to encode
	* 
	* return string
	**/
	public static function create($algo,$data){

		$context = hash_init($algo,HASH_HMAC,HASH_KEY);

		hash_update($context, $data);

		return hash_final($context);
	}
}
