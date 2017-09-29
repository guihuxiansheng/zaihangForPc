<?php
	namespace app\api\controller;
	/**
	* 
	*/
	use think\Session;
	class Login extends \think\Controller
	{
		
		/*有待改进*/
		function login(){
			$username = input('username');
			// $password = input('password');
			$password = md5(input('password'));
			try{
				$info = db('user')->where("user_name='$username' and user_pwd='$password'")->find();

				// var_dump($info);
				if($info){
					// $this->success("登录成功！");
					Session::set('user_name',$username);

					$this->assign('login',$username);
					return $this->fetch('index/index');
					// return json_encode(Array(
					// 	'status'=>0,
					// 	'message'=> '登录成功！'
					// 	// 'src'=> '/index/index'//跳转到行家中心
					// ));
				}else{
					return json_encode(Array(
						'status'=> 1,
						'message'=> '用户名或密码错误！'
					));
				}
			}catch(\Exception $e){
				// $this->error('登录失败！');
				return json_encode(Array(
					'status'=>2,
					'message'=> '查询错误'
				));
			}
		}


		function logout(){
			Session::set('user_name',null);
			return $this->fetch('index/index');
		}
		
	}
?>