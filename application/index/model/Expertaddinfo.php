<?php
	namespace app\index\model;
	class Expertaddinfo extends \think\Model
	{
		public function findplace(){
			return db('place')
					->field('id,place_name')
					->select();
		}
		public function findcategory(){
			return db('category')
					->field('id,cate_name')
					->where("level=1")
					->select();
		}
		public function finduser($user){
			return db('user')
					->field('id')
					->where("user_name='$user'")
					->find();
		}
		public function findexpert($id){
			return db('expert')
				->field('uid')
				->where("uid='$id'")
				->find();
		}
		public function updateexpert($id,$new_data,$proimg,$headPath){
			db('expert')
					->where("uid='$id'")
	    			->update([
						'exp_realname'=>$new_data['realname'],
						'exp_city_id'=>$new_data['city'],
						'exp_place'=>$new_data['meet_location'],
						'exp_field_id'=>$new_data['category_id'],
						'exp_workyear'=>$new_data['seniority'],
						'exp_company'=>$new_data['occupation'],//
						'exp_job'=>$new_data['title'],
						'exp_edu_experience'=>$new_data['education'],
						'exp_job_experience'=>$new_data['work_exper'],
						'exp_project_experience'=>$new_data['pro_exper'],
						'exp_sociallink'=>$new_data['soc_cont'],
						'exp_proofpic'=>$proimg,//证明图片
						'exp_narration'=>$new_data['self_intro'],//
						'head_pic'=>$headPath,//头像
						'show_edu'=>$new_data['showedu']//是否公开教育经历
					]);
		}
		public function saveexpert($id,$new_data,$proimg,$headPath){
			db('expert')
	    			->insert([
						'uid'=>$id,
						'exp_realname'=>$new_data['realname'],
						'exp_city_id'=>$new_data['city'],
						'exp_place'=>$new_data['meet_location'],
						'exp_field_id'=>$new_data['category_id'],
						'exp_workyear'=>$new_data['seniority'],
						'exp_company'=>$new_data['occupation'],//
						'exp_job'=>$new_data['title'],
						'exp_edu_experience'=>$new_data['education'],
						'exp_job_experience'=>$new_data['work_exper'],
						'exp_project_experience'=>$new_data['pro_exper'],
						'exp_sociallink'=>$new_data['soc_cont'],
						'exp_proofpic'=>$proimg,//证明图片
						'exp_narration'=>$new_data['self_intro'],//
						'head_pic'=>$headPath,//头像
						'create_time'=>time(),
						'show_edu'=>$new_data['showedu']//是否公开教育经历
					]);
		}
	}
?>