<?php
	namespace app\index\controller;
	
	class Topics extends Islogin
	{
		public function index()
		{
			$model = model('Topics');
			$city = $model->findCity();
			$cate = $model->getCate();
			$cate_list = $model->getCateNext();
			$topic = $model->getTopic($city[1]);
			$this->assign('city',$city[0]);
			$this->assign('cate',$cate);
			$this->assign('cate_list',$cate_list);
			$this->assign('topic',$topic);
			$this->assign('city_list',$model->getCity());
			return $this->fetch();
		}

	}
?>