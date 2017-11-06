<?php
namespace app\admin\model;



class Iexpert extends \think\Model{
 
 	// 当前模型对应的表名
 	//获取城市名
	public function findplace(){
		return db('place')
				->field('id,place_name')
				->select();
	}
	//获取行业名
	public function findcategory(){
		return db('category')
				->field('id,cate_name')
				->where("level=1")
				->select();
	}


	// 保存信息
	public function updateexpert($type,$id,$new_data,$proimg='',$headPath=''){
			if($type=='none'){
				db('expert')
					->where("id='$id'")
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
						'exp_narration'=>$new_data['self_intro'],//
						'show_edu'=>$new_data['showedu']//是否公开教育经历
					]);
			}else if($type=='all'){
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
			}else if($type=='head'){
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
						'exp_narration'=>$new_data['self_intro'],//
						'head_pic'=>$headPath,//头像
						'show_edu'=>$new_data['showedu']//是否公开教育经历
					]);
			}else if($type=='pro'){
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
						'show_edu'=>$new_data['showedu']//是否公开教育经历
					]);
			}
			
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
	//全部列表
	public function getList($id)
	{		 
		// [id] => 1
  //                           [uid] => 11
		// [exp_realname] => 马赞雄
  //                           [exp_city_id] => 2
  //                           [exp_place] => 大学城
  //                           [exp_field_id] => 2
  //                           [exp_workyear] => 3-5年
  //                           [exp_company] => 源酷
  //                           [exp_job] => 工程师
		 return db("Expert")
		 		->field('id,uid,exp_realname,exp_city_id,exp_place,exp_field_id,exp_workyear,exp_company,exp_job,create_time')
		 		->where("exp_examine='$id'")
		 		->order("id asc")
				->paginate();//在视图使用render()分页函数时需要用这个
	}
	public function getcity(){
		return db("place")
				->seclet();//在视图使用render()分页函数时需要用这个
	}
	//搜索查询
	public function getTrueUs($user_name='')
	{
		return $this->find("select * from zh_user where user_name=$user_name");
		 // return db("user")
			// 	->where("level=3")
			// 	->select();
	}
	public function getOne(){
		if(input('id')){
			return db("Expert")
				->where("id=".input('id'))
				->find();
			}else if(input('uid')){
				return db("Expert")
					->where("uid=".input('uid'))
					->find();
			}
		
	}
	public function findexpert($id){
		return db("Expert")
				->field('id')
				->where("id='$id'")
				->find();
	}
}

?>