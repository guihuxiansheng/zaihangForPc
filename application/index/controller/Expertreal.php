<?php
	namespace app\index\controller;
	// use \think\Controller;

	class Expertreal extends Islogin
	{
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
		}
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>