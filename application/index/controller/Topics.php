<?php
	namespace app\index\controller;
	
	class Topics extends Islogin
	{
		public function index()
		{
			$cate_city = input('cate_city');

			$cate = model('Topics')->getCate();
			$cate_list = model('Topics')->getCateNext();
			$topic = model('Topics')->getTopic();
			$this->assign('cate',$cate);
			$this->assign('cate_list',$cate_list);
			$this->assign('topic',$topic);
			return $this->fetch();
		}

	}
?>