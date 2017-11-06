<?php
namespace app\admin\model;



class Expertver extends \think\Model{
 
 	// 当前模型对应的表名
	protected $table = "user";



	// 保存信息
	public function saveInfo()
	{
		db('user')->insert([
				'user_name'=>input('user_name'),
				'user_pwd'=>input('user_pwd'),
				'user_phone'=>input('user_phone'),
				'create_time'=>date("Y-m-d h-m-s",time()),
				'user_address'=>input('user_address'),
				'user_true_name'=>'',
				'user_intro'=>input('user_intro'),
				'user_head_pic'=>'',//图片的存储还需要做处理
				'user_alipay'=>'',
				'user_alipay_name'=>'',
			]);
	}

	public function saveDeta($id){
		db('user')
			->where("id='$id'")
			->update([
				'user_name'=>input('user_name'),
				'user_phone'=>input('user_phone'),
				'create_time'=>input('create_time'),
				'user_address'=>input('user_address'),
				'user_true_name'=>input('user_true_name'),
				'user_intro'=>input('user_intro'),
				'user_head_pic'=>'',//图片的存储还需要做处理
				'user_alipay'=>input('user_alipay'),
				'user_alipay_name'=>input('user_alipay_name'),
			]);
	}
	//全部列表
	public function getList()
	{
		// ->alias("c")
		// 		->field("c.id,c.class_name,g.cate_name,c.class_price,c.create_time")
		// 		->join("category g","c.cate_id = g.id")
		// 		->where($where_sql)
		// 		->order("c.id desc")
		// 		->paginate();
		 return db("user")
		 		->alias("u")
		 		->field("u.id,u.user_name,u.user_phone,u.user_address,u.user_alipay,u.if_specialist,u.create_time,e.exp_examine")
		 		->join("expert e","e.uid=u.id")
		 		->where('e.exp_examine=0')
		 		->order("u.id desc")
				->paginate();//在视图使用render()分页函数时需要用这个
	}

	//搜索查询
	public function getTrueUs($user_name='')
	{
		return $user_info = $this->find("select * from zh_user where user_name=$user_name");
		 // return db("user")
			// 	->where("level=3")
			// 	->select();
	}
	public function getOne(){
		return $info = db("user")->where("id=".input('id'))->find();
	}

	public function verOne($uv,$ev){
		db("user")
			->where('id',input('uid'))
			->update([
				'if_specialist'=>$uv,
			]);

		db("expert")
		 	->where('uid',input('uid'))
		 	->update([
		 		'exp_examine'=>$ev,
		 	]);
	}

}

?>