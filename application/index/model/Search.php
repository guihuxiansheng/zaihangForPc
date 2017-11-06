<?php 
	namespace app\index\model;
	/**
	* 
	*/
	class Search extends \think\Model
	{
		protected $sort_array = Array(
			'comprehensive' => '',
			'meets_count-desc' => '',
			'rating-desc' => '',
			'published-desc' => 'create_time desc',
			'reward-asc' => 'price asc',
			'reward-desc' => 'price desc'
		);
		function getTopic($city){
			$map = Array();
			$btm = $this->getBtm();
			if($btm[0] != '' && $btm[1] != ''){
				$map['topic.topic_price'] = ['between',$btm[0].','.$btm[1]];
			}else if($btm[0] != ''){
				$map['topic.topic_price'] = ['>',$btm[0]];
			}else if($btm[1] != ''){
				$map['topic.topic_price'] = ['<',$btm[1]];
			}
			$map['expert.exp_city_id'] = $city;
			$sort = input('sort');
			$page = (int)input('page');
			$word = input('word');
			$map['expert.exp_realname|expert.exp_job_experience|topic.topic_name'] = ['like','%'.$word.'%'];
			$sort = $this->getSort();
			$list[0] = $this->table('zh_topic topic, zh_expert expert')->where('topic.uid = expert.uid')->where($map)->count();
			// 防止查询超出范围
			if($list[0]>10 && $list[0]<$page*10-10){
				$page = floor($list[0]/10);
			}
			if(empty($page)){
				$page = 1;
			}
			$list[1] = $page;
			$list[2] = $this->table('zh_topic topic, zh_expert expert')->where('topic.uid = expert.uid')->where($map)->limit($page*10-10,$page*10)->field('topic.id as id,topic.topic_name as title,topic.topic_price as price,topic.create_time as create_time,expert.id as uid,expert.exp_realname as realname,expert.exp_job as job')->order($sort)->select();
			$list[3] = $btm[0];
			$list[4] = $btm[1];
			if(empty($sort)){
				$list[5] = '';
			}else{
				$list[5] = input('sort');
			}
			$list[6] = $word;
			
			return $list;
		}
		function getSort(){
			$sort = input('sort');
			if(isset($sort) && isset($this->sort_array[$sort])){
				return $this->sort_array[$sort];
			}
			return Array();

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
	}
 ?>