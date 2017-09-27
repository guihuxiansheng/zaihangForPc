<?php
	namespace app\index\controller;

	class Personalinfo extends Islogin
	{
		public function index()
		{
			return $this->fetch();
		}
		
	}
?>