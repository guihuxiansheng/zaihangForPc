<?php
	namespace app\index\model;
	/**
	* 
	*/
	class Topics extends \think\Model
	{
		
		function getCate()
		{
			function getCate($id,$cate_array=[]){
				$cate = db('category')->where("id=$id")->find();
				if($cate['level']>1){
					$cate_array = getCate($cate['pr_id'],$cate_array);
				}
				$cate_array[] = $cate;
				return $cate_array;
			}
			$cate_id = input('cate_id');
			return getCate($cate_id);
		}
		function getCateNext()
		{
			function getCateNext($id,$cate=[]){
				// 获取可能存在的下一级
				$cate_list = db('category')->where("pr_id=$id")->select();
				// 如果不为空
				if(!empty($cate_list)){
					foreach ($cate_list as $key => $value) {
						$val = getCateNext($value['id']);
						if(!empty($val)){
							$value['list'] = $val;
							$cate[] = $value;
						}else{
							$cate[] = $value;
						}	
					}
				}
				return $cate;
			}
			$cate_id = input('cate_id');
			return getCateNext($cate_id);
		}
		function getTopic($index = 1)
		{
			function getTopic($id,$cate_array=[]){
				$cate_list = db('category')->where("pr_id=$id")->select();
				if(empty($cate_list)){
					// $topic = db('topic')->where("cate_id=$id")->select();
					// if(!empty($topic)){
					// 	$cate_array = array_merge($cate_array,$topic);
					// }
					$cate_array[] = $id;
				}else{
					foreach ($cate_list as $key => $value) {
						$cate_array = getTopic($value['id'],$cate_array);
					}
				}
				return $cate_array;
			}
			$cate_id = input('cate_id');
			$all_id = getTopic($cate_id);
			$list[0] = db('topic')->where("cate_id","in",$all_id)->count();
			// 防止查询超出范围
			if($list[0]<$index*10+10){
				$index = ceil($list[0]/10);
			}
			$list[1] = $index;
			$list[2] = db('topic')->where("cate_id","in",$all_id)->limit($index*10-10,$index*10)->select();
			return $list;
		}
	}
?>