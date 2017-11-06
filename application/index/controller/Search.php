<?php 
	namespace app\index\controller;

	/**
	* 
	*/
	class Search extends Login
	{
		
		function index(){
			$model = model('Topics');
			$city = $model->findCity();
			$topic = model('Search')->getTopic($city[1]);
			$this->assign('city',$city[0]);
			$this->assign('topic',$topic);
			$this->assign('city_list',$model->getCity());
			return $this->fetch('/topics/index');
		}
	}
 ?>