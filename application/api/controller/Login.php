<?php
	namespace app\api\controller;

	use think\Session;
	/**
	* 
	*/
	class Login extends \think\Controller
	{
		
		function index()
		{
			$username = input('username');
			// $password = input('password');
			$password = md5(input('password'));
			try{
				$info = db('user')->where("user_pwd='$password' and user_phone='$username'")->find();
				if($info){
					Session::set('user_name',$info['user_name']);
					return json_encode(Array(
						'status'=>0,
						'message'=> '登录成功！'
					));
				}else{
					return json_encode(Array(
						'status'=> 1,
						'message'=> '该用户不存在！'
					));
				}
			}catch(\Exception $e){
				return json_encode(Array(
					'status'=>1,
					'message'=> '查询错误'
				));
			}
		}
		function logout(){
			Session::set('user_name',null);
			$this->success("退出成功！",'../index');
		}
		
	}
?>