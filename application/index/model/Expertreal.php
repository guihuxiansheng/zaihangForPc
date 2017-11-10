<?php
	namespace app\index\model;
	class Expertreal extends \think\Model
	{
		public function findident($user){
			return db('user')
	    			->field("user_identification,if_specialist")
					->where("user_phone='$user'")
					->find();
		}
		public function findexpert($id){
			return db('expert')
					->field('id,exp_examine')
					->where("uid='$id'")
					->find();
		}
		function findTop($id){
			return db('topic')
					->field('id')
					->where("eid='$id'")
					->find();
		}

		public function saveuser($user,$user_true_name,$user_identityId){
			$username=$user;
			db('user')
	    			->where("user_phone='$username'")
	    			->update(['user_true_name' => $user_true_name,'user_identityId' => $user_identityId,'user_identification' => 1]);
		}
		
	}
?>