<?php
	namespace app\index\controller;

	class Appzai extends Islogin
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>