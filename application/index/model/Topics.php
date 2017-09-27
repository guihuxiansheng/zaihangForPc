<?php
	namespace app\index\model;
	use \think\Session;
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
		function getTopic($city)
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
			$page = (int)input('page');
			$price_floor = input('price_floor');
			$price_cap = input('price_cap');
			$sort = input('sort');
			$price_str = Array();
			if(isset($price_cap) && isset($price_floor)){
				if(preg_match("/^\d+$/", $price_cap) && preg_match("/^\d+$/", $price_floor)){
					$price_str = ['between',$price_floor.','.$price_cap];
				}
			}else if(isset($price_cap)){
				if(preg_match("/^\d+$/", $price_cap)){
					$price_str = ['<',$price_cap];
				}
			}else if(isset($price_floor)){
				if(preg_match("/^\d+$/", $price_floor)){
					$price_str = ['>',$price_floor];
				}
			}
			if(!empty($price_str)){
				$map['topic.topic_price'] = $price_str;
			}
			$all_id = getTopic($cate_id);
			$list[0] = $this->table('zh_topic topic, zh_expert expert')->where('topic.cate_id', 'in', $all_id)->where('topic.uid = expert.uid')->where('expert.exp_city','=',$city)->count();
			// 防止查询超出范围
			if($list[0]>10 && $list[0]<$page*10-10){
				$page = floor($list[0]/10);
			}
			if(empty($page)){
				$page = 1;
			}
			$list[1] = $page;
			$list[2] = $this->table('zh_topic topic, zh_expert expert')->where('topic.cate_id', 'in', $all_id)->where('topic.uid = expert.uid')->where('expert.exp_city','=',$city)->limit($page*10-10,$page*10)->field('topic.id as id,topic.topic_name as title,topic.topic_price as price,expert.id as uid,expert.exp_realname as realname,expert.exp_job as job')->select();
			$list[0] = count($list[2]);
			return $list;
		}
		function findCity(){
			$session_city = Session::get('city');
			$input_city = input('city');
			$city_check = false;
			if(isset($input_city)){
				try{
					$db_city = db('place')->where('place','=',$input_city)->find();
				}catch(\Exception $e){
				}
				if(isset($db_city)){
					$city_check = $db_city['place_name'];
				}else{
					$city_check = false;
				}
			}
			$city = $city_check?$city_check:($session_city?$session_city:'北京');
			Session::set('city',$city);
			return $city;
				
		}
		function getCity(){
			$db_city = db('place')->order('id asc')->select();
			return $db_city;
		}
	}
?>