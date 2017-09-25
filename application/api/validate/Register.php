<?php
	namespace app\api\validate;

	class Register extends \think\Validate
	{
		protected $rule = [
			'user_phone'=> 'require|number|length:11|unique:user',
			'code'=> 'require|number|length:4',
			// 'code'=> 'confirm:shujucode',
			'user_name'=> 'require|unique:user|length:4,16',
			'user_pwd'=> 'require|length:6,16',
			
		];
		protected $message = [
			'user_phone.require'=> '手机号码不能为空',
			'user_phone.number'=> '手机号码必须为数字',
			'user_phone.length'=> '手机号码必须为11位数字',
			'user_phone.unique'=> '该手机号码已注册',
			'code.require'=>'验证码不能为空',
			// 'code.confirm'=>'验证码错误',
			'user_name.require'=> '用户名不能为空',
			'user_name.unique'=> '用户名已存在',
			'user_name.length'=> '用户名在4-16个字符内',
			'user_pwd.require'=> '密码不能为空',
			'user_pwd.length'=> '密码在6-16个字符内',
			
		];
	}
?>