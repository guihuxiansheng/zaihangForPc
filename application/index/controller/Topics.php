<?php
	namespace app\index\controller;
	
	class Topics extends Islogin
	{
		public function index()
		{
			return $this->fetch();
		}
	}
?>