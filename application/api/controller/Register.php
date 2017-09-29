<?php
	namespace app\api\controller;
	use \think\captcha\Captcha;
	use think\Session;
	/**
	* 
	*/
	class Register extends \think\Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function getCode(){
			$mobile=input('mobile');
			$capche=input('capche');
			// echo $mobile;
			// echo $capche;
			//preg_match("/^1[34578]{1}\d{9}$/",$phonenumber)
			//状态status 0表示手机，1表示验证码，2表示手机验证码，3表示呢称，4表示密码
			if(!preg_match_all("/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/", $mobile)){
					return json_encode(Array(
						'status'=>0,
						'message'=> '手机号码输入不正确'
					));
				}

			// try{
				$captcha=Session::get('capche');
				Session::set('capche',null);
				if(!$captcha->check(input("capche"))) {
		            // error错误提示函数
		            // $this->error("验证码输入不正确");
		            return json_encode(Array(
							'status'=>1,
							'message'=> '验证码输入不正确'
						));
		        }

		        $that=model("Register");

	    		$user_list=$that->getInfo();
	    		foreach ($user_list as $key => $value) {
		    		if($value['user_phone']==$mobile){
		    			 return json_encode(Array(
							'status'=>0,
							'message'=> '该手机号码已注册，请直接登陆！'
						));
		    		}
		    	}


		      	//获取手机验证码，存入数据库
				$code=rand(1000,9999);
				$add_data['phone']=$mobile;
				$add_data['code']=$code;
				$that->saveCode($add_data);
				// echo $code;
				return json_encode(Array(
							'status'=>10,
							'message'=> '验证码已发送，请注意查收，1分钟之内有效！'
						));
			// }
			// catch(\Exception $e){
			// 	return json_encode(Array(
			// 		'status'=>-1,
			// 		'message'=> '服务器出错，请重试！'
			// 	));
			// }
			
		}

		public function doReg()
    	{
	       
	       	$that=model("Register");
	    	$add_data['user_name'] = input("nickname");
	    	$add_data['user_pwd'] = input("password");
	        $add_data['user_phone'] = input("mobile");
	        // echo $add_data['user_phone'];
	        $GeCode = $that->getCode($add_data['user_phone']);
	        // print_r($GeCode);
	        // var_dump($GeCode);
	        $add_data_model=$add_data;
	        if(!$GeCode){
	        	return json_encode(Array(
						'status'=>2,
						'message'=> '验证码不存在'
					));
	        }
	        // $add_data_model['shujucode'] = $GeCode['code'];
	        $add_data_model['code'] = input("code");

	        // print_r($add_data_model);
	        // exit();
	        if($GeCode['code']!=$add_data_model['code'])
	        {
	        	return json_encode(Array(
						'status'=>2,
						'message'=> '验证码错误'
					));
	        }

	        //验证
	    	 //状态status 0表示手机，1表示验证码，2表示手机验证码，3表示呢称，4表示密码
			if(!preg_match_all("/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/", $add_data_model['user_phone'])){
					return json_encode(Array(
						'status'=>0,
						'message'=> '手机号码输入不正确'
					));
			}
	    	// validate实例化验证器
	    	$user_validate = validate("Register");
	    	// check数据自动验证：返回boolean
	    	if(!$user_validate->check($add_data_model)){
	            // $this->error($user_validate->getError(),"Register/index");
	            //状态码的判断没有完成
	            $point=substr($user_validate->getError(),0,6);
	            if(strcmp($point,"用户")==0){
	            	$status = 3;
	            }else if(strcmp($point,"密码")==0){
	            	$status = 4;
	            }else if(strcmp($point,"手机")==0||strcmp($point,"该手")==0){
	            	$status = 0;
	            }else if(strcmp($point,"验证")==0){
	            	$status =  2;
	            	// echo "string";
	            }else{
	            	$status = 10;
	            }
	            // echo $user_validate->getError();
	            // echo $point;
	            // echo $status;
	            // echo strcmp($point,"验证");
	            return json_encode(Array(
						'status'=> $status,
						'message'=> $user_validate->getError()
					));
	            Session::set('user_name',$add_data['user_name']);
	    	}
	    	

	    	$user_list=$that->getInfo();
	    	// print_r($user_list);

	    	//判断是否有重名的用户名或者手机号码

	    	foreach ($user_list as $key => $value) {
	    		if($value['user_name']==$add_data['user_name']||$value['user_phone']==$add_data['user_phone']){
	    			 return json_encode(Array(
						'status'=>3,
						'message'=> '该昵称已存在！'
					));
	    		}
	    	}



	        //保存数据
	    	$that->saveInfo($add_data);

	        return json_encode(Array(
					'status'=>10,
					'message'=> '注册成功！'
				));
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
	        // print_r($captcha);
	        Session::set('capche',$captcha);
	        // var_dump($captcha->entry());
	        return $captcha->entry();
	    }
	}
?>