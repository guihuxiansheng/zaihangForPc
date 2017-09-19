<?php
	namespace app\index\controller;
	use \think\Controller;

	class Detail extends Controller
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>