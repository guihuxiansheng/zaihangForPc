<?php
	namespace app\admin\controller;

	/**
	* 
	*/
	class Special extends Islogin
	{
		function index(){
			$model = model('special');
			$this->assign('special_list',$model->getList());
			return $this->fetch();
		}
		function add(){
			return $this->fetch();
		}
		function change(){
			return $this->fetch();
		}
		// 保存新增数据
		function save(){
			$state = model('special')->saveFile();
			if(!$state){
				$this->redirect('/admin/special/add');
			}else{
				$this->success('操作成功','index');
			}
		}
		// 删除
		function delete(){
			$state = model('special')->delete();
			if($state){
				$this->success('操作成功','index');
			}else{
				$this->error('操作失败','index');
			}
		}
	}
?>