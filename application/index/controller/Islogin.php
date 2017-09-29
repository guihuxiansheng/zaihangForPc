<?php
	/**
	* 
	*/
	namespace app\index\controller;
	use \think\Controller;
	use think\Session;

	class Islogin extends Controller
	{	protected $reg;
		protected $isLogin;
		function __construct()
		{
			parent::__construct();
			$this->isLogin = Session::get('user_name')?Session::get('user_name'):'';
			$this->assign('login',$this->isLogin);
			$this->reg = false;
			$this->assign('reg',$this->reg);
		}
	}
?>