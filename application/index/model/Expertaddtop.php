<?php
	namespace app\index\model;
	class Expertaddtop extends \think\Model
	{
		public function findlastcate($user){
			//获取最高级别的分类
			$cate_id = db('expert')
					->alias('c')
					->field('c.exp_field_id')
					->join('user u','c.uid=u.id')
					->where(["u.user_phone"=>$user])
					->find();
			$cate=$cate_id['exp_field_id'];

			// // var_dump($cate);
			// //获取2级分类
			// $field = db('category')
			// 		->field('id,cate_name')
			// 		->where("pr_id='$cate'")
			// 		->select();
			// // var_dump($field);

			// //获取三级分类
			// $cateid=[];
			// for($i=0; $i <count($field); $i++) { 
			// 	$j=$field[$i]['id'];
			// 	$cateid[] = db('category')
			// 				->field('id,cate_name')
			// 				->where("pr_id='$j'")
			// 				->select();
			// }
			function selectLevel($id,$that,$val){
				$array = $that->table('zh_category')
							->where([
								'pr_id'=>$id
							])->select();
				if(count($array) !==0){
					foreach ($array as $key => $value) {
						$value['cate_name'] = $val.'>'.$value['cate_name'];
						$array = array_merge($array,selectLevel($value['id'],$that,$value['cate_name']));
					}
				}
				return $array;
			}
			$cate_name = $this->table('zh_category')
							->where([
								'id'=>$cate
							])->field('cate_name')->find();
			$cated = selectLevel($cate,$this,$cate_name['cate_name']);
			$array_cate = Array();
			foreach ($cated as $key => $value) {
				$array_cate[$value['pr_id']] = 1;
			}
			$cateid = Array();
			foreach ($cated as $key => $value) {
				if(!isset($array_cate[$value['id']])){
					$cateid[]= $value;
				}
			}
			return $cateid;
		}
		public function findexpertid($id){
			return db('expert') 
					->field('id')
					->where("uid='$id'")
					->find();
		}
		public function savetopic($eid,$title,$holdtime,$price,$bconcent,$achieve,$elsecare,$spread,$publish,$cateid){
			db('topic')
	    			->insert([
						'eid'=>$eid,
						// 'cate_id'=>$realname,//分类id
						'topic_name'=>$title,//话题名称
						'topic_time'=>$holdtime,//时长
						'topic_price'=>$price,//话题价格
						'topic_outline'=>$bconcent,//话题大纲
						'topic_achievement'=>$achieve,//领域资历
						'topic_ps'=>$elsecare,//补充
						'topic_spread'=>$spread,
						'create_time'=>date("Y-m-d h-m-s",time()),//创建时间
						'topic_publish'=>$publish,
						'cate_id'=>$cateid
					]);
		}
	}
?>