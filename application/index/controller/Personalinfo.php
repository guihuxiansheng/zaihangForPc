<?php
	namespace app\index\controller;
	use \think\Controller;
	use think\Session;
	class Personalinfo extends Islogin
	{
		protected $user; 
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
			$this->user = Session::get('user_name');
		}
		public function index()
		{
			$id = $this->user['id'];
			//找到登录用户对应的行家id
			$expert_id = db("user")
				->alias("u")
				->field("e.id")
				->join("expert e","e.uid = u.id")
				->where("u.id='$id'")
				->find()['id'];
			//我（学员）约的话题
			$meetinfo = db("meet")
				->alias("m")
				->field("m.*,e.exp_realname,e.exp_job,e.head_pic,t.topic_name,t.topic_price,u.user_head_pic")
				->join("expert e","m.expert_id = e.id")
				->join("topic t","m.topic_id = t.id")
				->join("user u","e.uid = u.id")
				->where("m.student_id='$id' AND u.id!='$id'")
				->order("m.create_time desc")
				->select();
	        $this->assign("meetinfo",$meetinfo);

	        //约我（行家）的人
/*			$expmeetinfo = db("meet")
				->alias("m")
				->field("m.*,e.exp_realname,e.exp_job,t.topic_name,t.topic_price,u.user_head_pic,u.user_true_name,u.user_phone")
				->join("expert e","m.expert_id = e.id")
				->join("topic t","m.topic_id = t.id")
				->join("user u","m.student_id = u.id")
				->where("m.expert_id='$expert_id'")
				->order("m.create_time desc")
				->select();
	        $this->assign("expmeetinfo",$expmeetinfo);*/

	        $info = db("user")->where("id='$id'")->find();
	        $this->assign("info",$info);	


			return $this->fetch();
		}
	    // 处理编辑
	    public function update()
	    {
	        db("user")->update(input());
	        
	        $this->success("修改成功","index");

	    }		

	    // 保存图片
	    public function saveimg()
	    {
		    $id = input('user_id');
		    $file = request()->file('user_head_pic');
		    if($file){
		    	// var_dump($file);
		    	$username = db('user')->where("id='$id'")->find()['user_name'];
		        // var_dump($username);
		        $rename = md5($username.'user_head_pic');
		        // var_dump($rename = $username.$file->getInfo()['name']);
		        $info = $file->move(ROOT_PATH . 'public/data/user_head_pic',$rename);
		        if($info){
		            // 成功上传后 获取上传信息
		            // 输出 jpg
		            // echo $info->getExtension();
		            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
		            // echo $info->getSaveName();
		            // 输出 42a79759f284b767dfcb2a0197904287.jpg
		            // echo $info->getFilename(); 
		        }else{
		            // 上传失败获取错误信息
		            echo $file->getError();
		        }
		    }
		    $user_head_pic = 'data/user_head_pic/'.$info->getSaveName();
	        db("user")
	        	->where("id='$id'")
	        	->update(['user_head_pic' => $user_head_pic]);
			$this->redirect('index');
	    }

	    public function expertReject(){
	    	$id = input('id');
	    	db("meet")
	        	->where("id='$id'")
	        	->update(['expert_confirm' => -1]);
	        $this->redirect('index');
	    }

  	    public function expertConfirm(){
	    	$id = input('id');
	    	$add_data = input();
	    	$add_data['expert_confirm_time'] = date();
	    	$add_data['expert_confirm'] = 1;
	    	db("meet")
	        	->where("id='$id'")
	        	->update($add_data);
        	$this->redirect('index');
	    }  

	    public function studentConfirm(){
	    	$id = input('id');
	    	$add_data['student_pay'] = 1;
	    	db("meet")
	        	->where("id='$id'")
	        	->update($add_data);
        	$this->redirect('index');
	    }

	    public function studentPay(){
	    	$id = input('id');
	    	$add_data['student_pay'] = 2;
	    	db("meet")
	        	->where("id='$id'")
	        	->update($add_data);
        	$this->redirect('index');
	    }

	    public function studentComment(){
	    	//话题id
	    	$id = input('id');
	    	//根据预约id找到行家id
			$expert_id = db("meet")
				->alias("m")
				->field("e.id")
				->join("expert e","e.id = m.expert_id")
				->where("m.id='$id'")
				->find()['id'];
			//根据预约id找到话题id
			$topic_id = db("meet")
				->where("id='$id'")
				->find()['topic_id'];


	        //对应话题的人数统计
	    	$topic_meet_count = db("meet")
	        	->where("topic_id='$topic_id'")
	        	->count();
	        db("topic")
	        	->where("id='$topic_id'")
	        	->update(['topic_meet_count' => $topic_meet_count]);	        


	    	//对应话题分数统计
	    	$topic_scoreall = db("meet")
	    		->field("meet_score")
	        	->where("topic_id='$topic_id'")
	        	->where("meet_score","not null")
	        	->select();
	        $topic_score = 0;
	        if(!empty($topic_scoreall)){
				foreach ($topic_scoreall as $key => $value) {
					$topic_score = $topic_score + $topic_scoreall[$key]['meet_score'];
				}
				$topic_score = $topic_score/count($topic_scoreall)*2;
	        }else{
	        	$topic_score = input('meet_score')*2;
	        }
	        db("topic")
	        	->where("id='$topic_id'")
	        	->update(['topic_score' => $topic_score]);


	        //行家见过的人数统计
			$exp_meetcount = db("meet")
				->where("expert_id='$expert_id'")
	        	->where("meet_score","not null")
				->count();
			db("expert")
				->where("id='$expert_id'")
				->update(['exp_meetcount' => $exp_meetcount]);

	        //想见行家的心愿单数

	    	//评价内容上传
	    	$add_data = input();
	    	$add_data['meet_commenttime'] = date("Y-m-d h-m-s",time());
	    	db("meet")
	        	->where("id='$id'")
	        	->update($add_data);
        	$this->redirect('index');
	    }

	    public function test(){
	    	echo DS.DS;
	    }

	    
	}
?>