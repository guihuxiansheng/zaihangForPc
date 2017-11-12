<?php
	namespace app\index\model;

	class Special extends \think\Model
	{
		public function getList($city)
		{
			// 传进所选专题的城市，根据城市找出所有选了这个城市的专题的专家，根据专家id找出话题标题等信息
			$list = $this->table('zh_holiday holiday, zh_expert expert,zh_topic topic')->where(['holiday.place' => $city])->where('holiday.uid = expert.id and topic.id = holiday.topic_id')->field('topic.topic_name as name,expert.exp_realname as realname,expert.exp_job as job')->select();
			return $list;
		}
		function getCoupon($special,$id){
			try{
				$coupon = db('coupon')->where([
					'special'=>$special,
					'uid'=>$id
				])->find();
				return $coupon;
			}catch(\Exception $e){
				return false;
			}
		}
		function saveCoupon($login){
			$special = input('special');
			if($login && isset($special) && $special != ''){
				$sp = db('special')->where(["special"=>$special])->find();
				// 专题不正确
				if(!$sp){
					return false;
				}
				$coupon = db('coupon')->where(['uid'=>$login['id'],'special'=>$sp['special']])->find();
				// 已领取
				if($coupon){
					return false;
				}
				db('coupon')->insert([
					'uid'=>$login['id'],
					'special'=>$sp['special'],
					'expire_time'=>date('y-m-d H-i-s',time()+21*24*60*60),
					'create_time'=>date('y-m-d H-i-s',time())
				]);
				return true;
			}else{
				return false;
			}
		}
		function checkUrl($id){
			$year = date('Y').'_';
			if(strpos($id, $year) === false){
				return false;
			}
			$str = explode($year,$id);
			if(count($str) !=2 || $str[1] == ''){
				return false;
			}
			try{
				$db_array = $this->table('zh_place place, zh_special special')->where([
					'place.place' => $str[1],
					'special.special' => $str[0]
				])->where('special.special = place.special_name')->field('special.special as name,place.place,special.special_img as img_path')->find();
				return $db_array;
			}catch(\Exception $e){
				return false;
			}
		}
		
	}
?>