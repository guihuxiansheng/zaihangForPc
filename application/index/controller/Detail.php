<?php
	namespace app\index\controller;
	use \think\Controller;

	class Detail extends Islogin
	{
		public function index()
		{
			$id = 11;
			//根据用户id找行家id
			$expert_id = db("user")
				->alias("u")
				->field("e.id")
				->join("expert e","e.uid = u.id")
				->where("u.id='$id'")
				->find()['id'];

			//行家信息
	        $info = db("expert")
	     	    ->alias("e")
				->field("e.*,p.place_name")
	        	->join("place p","e.exp_city_id = p.id")
		        ->where("uid='$id'")
		        ->find();
	        $this->assign("info",$info);

	        //评论信息
	        $commentinfo = db("meet")
				->alias("m")
				->field("m.meet_score,m.meet_comment,m.meet_commenttime,t.topic_name,u.user_head_pic,u.user_true_name")
				->join("expert e","m.expert_id = e.id")
				->join("topic t","m.topic_id = t.id")
				->join("user u","m.student_id = u.id")
				->where("m.expert_id='$expert_id'")
				->where("m.meet_comment","not null")
				->order("m.meet_commenttime desc")
				->select();
			foreach ($commentinfo as $key => $value) {
				$commentinfo[$key]['meet_commenttime'] = strtotime($commentinfo[$key]['meet_commenttime']);
				$commentinfo[$key]['meet_commenttime'] = date('Y-m-d', $commentinfo[$key]['meet_commenttime']);
			}
	        $this->assign("commentinfo",$commentinfo);

	        //所有话题信息
	        $topicinfo = db("topic")->where("uid='$id'")->select();
	        $this->assign("topicinfo",$topicinfo);


	        //临时用户头像
	        $user_headpic_temp = db("user")
				->alias("user_head_pic")
				->field("user_head_pic")
				->where("id='$id'")
				->find()['user_head_pic'];
	        $this->assign("user_headpic_temp",$user_headpic_temp);
	        
			return $this->fetch();
		}
		public function meetsubmit()
		{
			$add_data = input();
			$add_data['create_time'] = date("Y-m-d h-m-s",time());
			$add_data['order_number'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
			db('meet')->insert($add_data);
			return input();
		}

		
		
	}
?>