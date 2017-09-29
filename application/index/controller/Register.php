<?php
	namespace app\index\controller;
	// use \think\Controller;
	// use \think\captcha\Captcha;
	use think\Session;
	class Register extends Islogin
	{
		protected $user; 
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
			$this->user = Session::get('user_name');
			$this->assign("reg",true);
			// $this->user='niahog';例子
		}
		public function index(){
			 if($this->user)
			 	{
			 		$info = db("user")
			 				->where("user_name='$this->user'")
			 				->find();
	        		$this->assign("info",$info);	
			 		return $this->fetch('personalinfo/index');
			 	}
			// $this->reg=true;
			// $this->assign("reg",$this->reg);
			return $this->fetch();
		}
	}
?>