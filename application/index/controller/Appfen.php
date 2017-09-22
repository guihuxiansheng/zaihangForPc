<?php
	namespace app\index\controller;

	class Appfen extends Islogin
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>