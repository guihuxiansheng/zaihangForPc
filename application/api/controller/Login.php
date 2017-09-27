<?php
	namespace app\api\controller;
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
				$info = db('user')->where("user_name='$username' and user_pwd='$password'")->find();
				var_dump($info);
				if($info){
					// $this->success("登录成功！");
					Session::set('user_name',$username);
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
				// $this->error('登录失败！');
				return json_encode(Array(
					'status'=>1,
					'message'=> '查询错误'
				));
			}
		}
		function logout(){
			Session::set('user_name',null);
			$this->success("登录成功！",'/index');
		}
		
	}
?>