<?php
	namespace app\index\controller;

	class Detail extends Islogin
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>