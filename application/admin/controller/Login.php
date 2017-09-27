<?php
	namespace app\admin\controller;
	use \think\Session;
	/**
	* 
	*/
	class Login extends \think\Controller
	{
		function __construct(){
			parent::__construct();
			if(Session::get('manage_user')){
				header("location:".url('/admin/user'));
				exit();
			}
		}
		
		public function index()
	    {
	    	
	       return $this->fetch();
	    }
	    public function login()
	    {
	    	$user_name = input('username');
	    	$user_pwd = md5(input('password'));
	    	try{
	    		$info = db('user')->where("user_pwd='$user_pwd' and user_phone='$user_name' and admin=1")->find();
	    		if($info){
					Session::set('manage_user',$info['user_name']);
					return json_encode(Array(
						'status'=>0,
						'message'=> '登录成功！'
					));
				}else{
					return json_encode(Array(
						'status'=> 1,
						'message'=> '登陆失败'
					));
				}
	    	}catch(\Exception $e){
	    		return json_encode(Array(
					'status'=>1,
					'message'=> '查询错误'
				));
	    	}
	    }
	}
?>