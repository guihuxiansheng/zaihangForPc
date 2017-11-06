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
						->where("uid='$zid'")
						->find();
		}
		public function findcate($tid){
			return db('category')
						->where("id='$tid'")
						->find();
		}


		public function finduserver(){
			return db('user')
	    			->field("user_identification,if_specialist")
					->where('user_name',$this->user['user_name'])
					->find();
		}
	}
?>