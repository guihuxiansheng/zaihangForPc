<?php
	namespace app\index\model;
	use \think\Session;
	/**
	* 
	*/
	class Topics extends \think\Model
	{
		protected $sort_array = Array(
			'comprehensive' => '',
			'meets_count-desc' => '',
			'rating-desc' => '',
			'published-desc' => 'create_time desc',
			'reward-asc' => 'price asc',
			'reward-desc' => 'price desc'
		);
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
			$sort = input('sort');
			$map = Array();
			$all_id = getTopic($cate_id);
			// 添加价格区间
			$btm = $this->getBtm();
			if($btm[0] != '' && $btm[1] != ''){
				$map['topic.topic_price'] = ['between',$btm[0].','.$btm[1]];
			}else if($btm[0] != ''){
				$map['topic.topic_price'] = ['>',$btm[0]];
			}else if($btm[1] != ''){
				$map['topic.topic_price'] = ['<',$btm[1]];
			}
			$sort = $this->getSort();
			$map['topic.cate_id'] = ['in',$all_id];
			$map['expert.exp_city_id'] = $city;
			// 统计列表长度
			$list[0] = $this->table('zh_topic topic, zh_expert expert')->where('topic.uid = expert.uid')->where($map)->count();
			// 防止查询超出范围
			if($list[0]>10 && $list[0]<$page*10-10){
				$page = floor($list[0]/10);
			}
			if(empty($page)){
				$page = 1;
			}
			// 绑定数据返回
			$list[1] = $page;
			$list[2] = $this->table('zh_topic topic, zh_expert expert')->where('topic.uid = expert.uid')->where($map)->limit($page*10-10,$page*10)->field('topic.id as id,topic.topic_name as title,topic.topic_price as price,topic.create_time as create_time,expert.id as uid,expert.exp_realname as realname,expert.exp_job as job')->order($sort)->select();
			$list[3] = $btm[0];
			$list[4] = $btm[1];
			if(empty($sort)){
				$list[5] = '';
			}else{
				$list[5] = input('sort');
			}
			
			return $list;
		}
		function getBtm(){
			$price_floor = input('price_floor');
			$price_cap = input('price_cap');
			$price_array = Array('','');
			if(isset($price_cap) && isset($price_floor)){
				if(preg_match("/^\d+$/", $price_cap) && preg_match("/^\d+$/", $price_floor)){
					$price_array[0] = $price_floor;
					$price_array[1] = $price_cap;
				}else if(preg_match("/^\d+$/", $price_cap)){
					$price_array[1] = $price_cap;
				}else if(preg_match("/^\d+$/", $price_floor)){
					$price_array[0] = $price_floor;
				}
			}else if(isset($price_cap)){
				if(preg_match("/^\d+$/", $price_cap)){
					$price_array[1] = $price_cap;
				}
			}else if(isset($price_floor)){
				if(preg_match("/^\d+$/", $price_floor)){
					$price_array[0] = $price_floor;
				}
			}
			return $price_array;
		}
		function getSort(){
			$sort = input('sort');
			if(isset($sort) && isset($this->sort_array[$sort])){
				return $this->sort_array[$sort];
			}
			return Array();

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
					$city_check = $db_city['place'];
				}else{
					$city_check = false;
				}
			}
			$city[0] = $city_check?$city_check:($session_city?$session_city:'beijing');
			Session::set('city',$city[0]);
			$db_city = db('place')->where('place','=',$city[0])->find();
			$city[1] = $db_city['id'];
			return $city;
				
		}
		function getCity(){
			$db_city = db('place')->order('id asc')->select();
			return $db_city;
		}
	}
?>