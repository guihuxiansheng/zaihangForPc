<?php
	namespace app\index\validate;

	class Register extends \think\Validate
	{
		protected $rule = [
			'user_name'=> 'require|unique:user|length:6,12',
			'user_pwd'=> 'require|length:6,12',
			'user_phone'=> 'require|number|length:11|unique:user',
		];
		protected $message = [
			'user_name.require'=> '用户名不能为空',
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