<?php
	namespace app\index\model;
	class Experver extends \think\Model
	{
		public function findexpert($id){
			return db('expert')
						->where("uid='$id'")
						->find();
		}
		public function findcity($cid){
			return db('place')
				->where("id='$cid'")
				->find();
		}
		public function findcategory($hid){
			return db('category')
						->where("id='$hid'")
						->find();
		}
		public function findtopic($zid){
			return db('topic')
						->where("eid='$zid'")
						->find();
		}
		public function findcate($tid){
			return db('category')
						->where("id='$tid'")
						->find();
		}


		public function finduserver($user){
			return db('user')
	    			->field("id,user_identification,if_specialist")
					->where('user_phone',$user)
					->find();
		}
	}
?>