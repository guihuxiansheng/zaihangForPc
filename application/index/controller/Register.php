<?php
	namespace app\index\controller;
	// use \think\Controller;
	// use \think\captcha\Captcha;

	class Register extends Islogin
	{
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
		}
		public function index(){
			return $this->fetch();
		}
	}
?>