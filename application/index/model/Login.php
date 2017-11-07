<?php
namespace app\index\model;



class Login extends \think\Model{
 
	public function findsame(){
		$username = input('username');
			// $password = input('password');
		$password = md5(input('password'));
		
		return db('user')->where([
					"user_phone"=>$username,
					'user_pwd'=>$password
				])->find();

	}


}

?>