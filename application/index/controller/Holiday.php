<?php
	namespace app\index\controller;

	class Holiday extends Islogin
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>