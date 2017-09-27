<?php
	namespace app\index\controller;

	class Detail extends Islogin
	{
		public function index()
		{
	        $info = db("expert")->where("uid=11")->find();
	        $this->assign("info",$info);			

	        $topicinfo = db("topic")->where("uid=11")->select();
	        $this->assign("topicinfo",$topicinfo);			
	        
			return $this->fetch();
		}
		public function meetsubmit()
		{
			db('meet')->insert(input());
			return input();
		}

		
		
	}
?>