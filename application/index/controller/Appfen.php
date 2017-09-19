<?php
	namespace app\index\controller;
	use \think\Controller;

	class Appfen extends Controller
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>