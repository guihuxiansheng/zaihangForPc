<?php
	namespace app\admin\controller;
	use think\Session;
	/**
	* 
	*/
	class Islogin extends \think\Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$login = Session::get('manage_user')?Session::get('manage_user'):'';
			if(empty($login)){
				header("location:".url('/admin/login'));
				exit();
			}
		}
	}
?>