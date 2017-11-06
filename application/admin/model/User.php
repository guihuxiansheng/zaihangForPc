<?php
namespace app\admin\model;



class User extends \think\Model{
 
 	// 当前模型对应的表名
	protected $table = "user";



	// 保存信息
	public function saveInfo()
	{
		db('user')->insert([
				'user_name'=>input('user_name'),
				'user_pwd'=>md5(input('user_pwd')),
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
	// 'id' => string '11' (length=2)
          // 'user_name' => string '大叔各位' (length=12)
          // 'user_true_name' => string '神马废物' (length=12)
          // 'user_address' => string '广州' (length=6)
          // 'create_time' => string '2017-09-20 00:00:00' (length=19)
          // 'user_identityId' => string '' (length=0)
          // 'user_alipay' => string '15646135125' (length=11)
          // 'user_alipay_name' => string '饿挖饿' (length=9)
          // 'user_phone' => string '13071685641' (length=11)
	//更新数据
	public function updateinfo(){
		// var_dump(input());
		// $id=;
		db('user')
			->where('id',input('id'))
			->update([
				'user_name'=>input('user_name'),
				'user_phone'=>input('user_phone'),
				'create_time'=>input('create_time'),
				'user_address'=>input('user_address'),
				'user_true_name'=>input('user_true_name'),
				'user_intro'=>input('user_intro'),
				// 'user_head_pic'=>'',//图片的存储还需要做处理
				'user_alipay'=>input('user_alipay'),
				'user_alipay_name'=>input('user_alipay_name'),
			]);
	}
	//全部列表
	public function getList()
	{
		 return db("user")
		 		->order("id asc")
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
}

?>