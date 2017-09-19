<?php
	namespace app\index\controller;
	use \think\Controller;
	
	class Topics extends Controller
	{
		public function index()
		{
			return $this->fetch();
		}
	}
?>