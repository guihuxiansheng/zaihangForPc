<?php
	namespace app\index\controller;
	use \think\captcha\Captcha;

	class Register extends Islogin
	{
		public function index(){
			return $this->fetch();
		}
		//注册
		// public function doReg(){



		// 	model("Register")->saveInfo();
		// 	$this->success("注册成功","login/index");
		// }



		public function doReg()
    	{
	        // 第一步：验证 马是否一样
	        $captcha = new Captcha();
	        // check:校验验证码是否一样，返回boolean。成功后则会删除之前验证码
	        if (!$captcha->check(input("captcha_code"))) {
	            // error错误提示函数
	            $this->error("验证码输入不正确");
	        }

	    	// input助手函数 :获取变量 支持过滤和默认值
	    	// 在thinkphp\library\think\Request.php
	    	$add_data['user_name'] = input("user_name");
	    	$add_data['user_pwd'] = input("user_pwd");
	        $add_data['user_phone'] = input("user_phone");
	    	 


	    	// validate实例化验证器
	    	$user_validate = validate("Register");
	    	// check数据自动验证：返回boolean


	    	if(!$user_validate->check($add_data)){
	            $this->error($user_validate->getError(),"Register/index");
	    	}

	    	// 用户名不能重复
	    	// 密码和重复密码必须一样
	    	// unset($add_data['user_repwd']);
	     	//    $add_data['user_pwd'] = md5($add_data['user_pwd']);
	    	
	    	// print_r($add_data);
	    	$that=model("Register");
	    	// $user_list=$that->getInfo();
	    	// print_r($user_list);

	    	//判断是否有重名的用户名或者手机号码

	    	// foreach ($user_list as $key => $value) {
	    	// 	if($value['user_name']==$add_data['user_name']||$value['user_phone']==$add_data['user_phone']){
	    	// 		 $this->error("用户名或者手机号码已存在，请重新输入","Register/index");
	    	// 	}
	    	// }


	    	// db实例化一个没有模型的表
	        
	        // 自动完成特点：
	        // 1、需用save方法
	      


	        //保存数据
	    	$that->saveInfo();

	        // 成功提示函数
	        // 第一个参数：提示信息
	        // 第二个参数：跳转后的下一个地址
	        $this->success("注册成功！","login/index");
    	}

	    // 生成验证码
	    public function setCapche()
	    {
	        // 必须先use
	        $captcha = new Captcha();
	        // 没有混淆线
	        $captcha->useCurve = false;
	        // 验证码数量
	        $captcha->length = 3;
	        // 生成
	        return $captcha->entry();
	    }
		}
?>