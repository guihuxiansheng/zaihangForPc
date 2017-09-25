<?php
	namespace app\admin\controller;
	/**
	* 
	*/
	class Category extends Islogin
	{
		
		function index()
		{
			$user_list = model("Category")->getList();
    		$this->assign("user_list",$user_list);
			return $this->fetch();
		}
		function add()
		{
			$cate_list = model('Category')->getList();
			$sort = [];
			$sort_list_2 = [];
			$sort_list_1 = [];
			$sort_list = [];
			$level = 0;
			// 分类数组，按level排序
			foreach ($cate_list as $key => $value) {
				if($level<$value['level']){
					$level = $value['level'];
				}
				$sort[$value['level']-1][$value['id']] = $value;
			}
			// 获取分类等级长度
			$len = count($sort)-1;
			// 给装新排好数组的数组赋值
			$sort_list_2 = $sort[$len];
			// 继续排序
			for ($i=$len; $i >0 ; $i--) {
				$sort_list_1 = $sort[$i-1];
				foreach ($sort_list_2 as $value) {
					$sort_list_1[$value['pr_id']]['list'][]=$value;
				}
				$sort_list_2 = $sort_list_1;
			}
			function revirce($array_data,$list_data)
			{
				if(isset($array_data['list'])){
					$list_data_one = $array_data['list'];
					unset($array_data['list']);
					$list_data[] = $array_data;
					foreach ($list_data_one as $key => $value) {
						$list_data = revirce($value,$list_data);
					}
					
				}else{
					$list_data[] = $array_data;
				}
				return $list_data;
			}
			foreach ($sort_list_2 as $key => $value) {
				$sort_list = revirce($value,$sort_list);
			}

			$this->assign("cate_list",$sort_list);
			return $this->fetch();
		}
		function save(){
			$pr_id = input('pr_id');
			$model = model("Category");

			if($pr_id != 0){
				$level_data = $model->getOne('id',$pr_id);
				$level = $level_data['level']+1;
			}else{
				$level = 1;
			}
			$model->saveInfo($level);

			$user_list = $model->getList();
    		$this->assign("user_list",$user_list);
			return $this->fetch('index');
		}
		// 删除 
	     public function delete()
	    {

	        db("category")->where("id=".input('id'))->delete();

	        $this->success("删除成功","index");

	    }
	}
?>