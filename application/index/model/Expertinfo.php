<?php
namespace app\index\model;



class Expertinfo extends \think\Model{
 	
 	public function findexpert($id){
 		return db("expert")
	        		->where("uid='$id'")
	        		->find();
 	}
 	
 	public function findtopic($id){
 		return db("topic")
 					->field('id,topic_name,topic_score,topic_price,topic_outline,topic_time,topic_meet_count,create_time')
	        		->where("eid='$id'")
	        		->select();
 	}

 	public function finduser($id){
 		return db("user")
	        		->where("id='$id'")
	        		->find();
 	}

 	public function findplace($id){
 		return db("place")
	        		->where("id='$id'")
	        		->find();
 	}


 	public function findexpertinfo($id){
 		return db("expert")
 				->alias('e')
 				->field("e.*,p.place_name,c.cate_name")
 				->join("place p","e.exp_city_id = p.id")
				->join("category c","e.exp_field_id = c.id")
				->where("uid='$id'")
				->find();
 	}

 	public function findwant($id){
 		return db("meet")
				->alias("m")
				->field("m.*,e.exp_realname,e.exp_job,t.topic_name,t.topic_price,u.user_head_pic,u.user_true_name,u.user_phone")
				->join("expert e","m.expert_id = e.id")
				->join("topic t","m.topic_id = t.id")
				->join("user u","m.student_id = u.id")
				->where("m.expert_id='$id'")
				->order("m.create_time desc")
				->select();
 	}
 	public function findevalu($id){
 		return db("meet")
 				->alias("m")
 				->field("m.expert_id,m.student_id,m.topic_id,m.meet_question,m.meet_score,t.topic_name,u.user_name,u.user_head_pic")
 				->join("topic t","t.id = m.topic_id")
				->join("user u","m.student_id = u.id")
 				->where("m.expert_id='$id'")
 				->order("m.create_time desc")
 				->select();
 	}

 	public function delettop(){
 		db("topic")
            ->where("id=".input('id'))
            ->delete();
 	}
 	//获取行业三级类型
 	public function findlastcate($id){
			//获取2级分类
			$field = db('category')
					->field('id,cate_name')
					->where("pr_id='$id'")
					->select();
			// var_dump($field);

			//获取三级分类
			$cateid=[];
			for($i=0; $i <count($field); $i++) { 
				$j=$field[$i]['id'];
				// var_dump($j);
				$cateid[] = db('category')
							->field('id,cate_name')
							->where("pr_id='$j'")
							->select();
			}
			return $cateid;
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