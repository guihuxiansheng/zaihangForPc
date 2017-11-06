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
			$this->assign('city',!empty(Session::get('city'))?Session::get('city'):'beijing');
			$this->assign('cate_top',db('category')->where('pr_id=0')->order('id ASC')->select());
			$this->reg = false;
			$this->assign('reg',$this->reg);
		}
	}
?>