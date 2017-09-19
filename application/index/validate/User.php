<?php
	namespace app\index\validate;

	class User extends \think\validate
	{
		protected $rule = [
			'user_name': 'require|unique:user',
			'user_pwd': 'require'
		];
		protected $msg = [
			'user_name.reqiure': '用户名不能为空',
			'user_name.unique': '用户名已存在',
			'user_pwd.require': '密码不能为空'
		];
	}
?>