<?php
namespace app\index\model;



class Register extends \think\Model{
 
 	// 当前模型对应的表名
	protected $table = "user";



	// 保存信息
	public function saveInfo()
	{
		db('user')->insert([
				'user_name'=>input('user_name'),
				'user_pwd'=>md5(input('user_pwd')),
				'user_phone'=>input('user_phone'),
				'create_time'=>date("Y-m-d h-m-s",time())
				// 'user_address'=>'',
				// 'user_true_name'=>'',
				// 'user_intro'=>'',
				// 'user_head_pic'=>'',//图片的存储还需要做处理
				// 'user_alipay'=>'',
				// 'user_alipay_name'=>'',
			]);
	}
	public function getInfo(){
		return db('user')
				->field("user_name,user_phone")
				->select();
	}
}

?>