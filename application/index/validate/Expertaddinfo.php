<?php
	namespace app\index\validate;

	class Expertaddinfo extends \think\Validate
	{
		protected $rule = [
			'exp_realname'=>'require|length:2',
			'exp_place'=>'require|length:2',
			'exp_company'=>'require|length:2',
			'exp_job'=>'require|length:2',		
			'exp_edu_experience'=>'require|length:20,500',
			'exp_job_experience'=>'require|length:20,800',
			'exp_narration'=>'require|length:20,1000',
		];
		protected $message = [
			'exp_realname.require'=> '用户名不能为空',
			'user_name.unique'=> '用户名已存在',
			'user_name.length'=> '用户名在6-12个字符内',
			'user_pwd.require'=> '密码不能为空',
			'user_pwd.length'=> '密码在6-12个字符内',
			'user_phone.require'=> '手机号码不能为空',
			'user_phone.number'=> '手机号码必须为数字',
			'user_phone.length'=> '手机号码必须为11位数字',
			'user_phone.unique'=> '该手机号码已注册',
		];
	}
?>