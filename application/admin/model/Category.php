<?php
	namespace app\admin\model;

	/**
	* 
	*/
	class Category extends \think\Model
	{
		
		// 保存信息
		public function saveInfo($level)
		{
			db('category')->insert([
					'cate_name'=>input('cate_name'),
					'pr_id'=>input('pr_id'),
					'create_time'=>date("Y-m-d h-m-s",time()),
					'level'=>$level,
				]);
		}
		//全部列表
		public function getList()
		{
			 return db("category")
					->paginate();//在视图使用render()分页函数时需要用这个
		}

		//搜索查询
		public function getTrueUs($cate_name='')
		{
			return $user_info = $this->find("select * from zh_category where cate_name=$cate_name");
			 // return db("category")
				// 	->where("level=3")
				// 	->select();
		}
		public function getOne($name='id',$val = ''){
			if(empty($val)){
				$val = input('id');
			}
			return $info = db("category")->where("$name='$val'")->find();
		}
	}
?>