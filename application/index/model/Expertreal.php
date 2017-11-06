<?php
	namespace app\index\model;
	class Expertreal extends \think\Model
	{
		public function findident($user){
			return db('user')
	    			->field("user_identification,if_specialist")
					->where("user_name='$user'")
					->find();
		}
		public function findexpert($id){
			return db('expert')
					->field('exp_examine')
					->where("uid='$id'")
					->find();
		}

		public function saveuser($user_true_name,$user_identityId){
			$username=$this->user['user_name'];
			db('user')
	    			->where("user_name='$username'")
	    			->update(['user_true_name' => $user_true_name,'user_identityId' => $user_identityId,'user_identification' => 1]);
		}
		
	}
?>