<?php
	namespace app\index\controller;
	use \think\Controller;

	class Holiday extends Controller
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>