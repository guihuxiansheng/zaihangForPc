<?php
namespace app\index\model;



class Register extends \think\Model{
 
 	// 当前模型对应的表名
	protected $table = "user";



	// 保存信息
	public function saveInfo($data='')
	{
		db('user')->insert([
				'user_name'=>$data['user_name'],
				'user_pwd'=>md5($data['user_pwd']),
				'user_phone'=>$data['user_phone'],
				'create_time'=>date("Y-m-d h-m-s",time())
			]);
	}
	//保存手机验证码
	public function saveCode($data='')
	{
		db('phonecode')->where([
				'phone'=>$data['phone']
		])->delete();
		db('phonecode')->insert([
				'phone'=>$data['phone'],
				'code'=>$data['code'],
				'create_time'=>date("Y-m-d h-m-s",time())
			]);
	}
	public function getInfo(){
		return db('user')
				->field("user_name,user_phone")
				->select();
	}

	public function getCode($pho=''){
		if($pho=='')
		{
			return 0;
		}
		return db('phonecode')
				->field("phone,code")
				->where("phone='$pho'")
				->find();
	}

	public function getOne($user){
		return db('user')
				->where("user_name='$user'")
				->find();
	}
}

?>