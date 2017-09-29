<?php
	namespace app\index\controller;
	// use \think\Controller;
	use think\Session;
	class Expertreal extends Islogin
	{
		protected $user; 
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
			$this->user = Session::get('user_name');
			// $this->user='niahog';例子
		}
		public function index()
		{	
			//如果没有登陆，则转到登陆界面
			if($this->user==null){
				return $this->fetch('/login/index');
			}

			//查询用户表，判断是否认证
			//如果已经认证，则转到成为行家资料页面
			$user_identification = db('user')
									->field('user_identification')
									->where("user_name='$this->user'")
									->find();
			if($user_identification['user_identification']){
				// return $this->fetch('/expertaddinfo/index');
				$this->redirect('expertaddinfo/index');
			}


			return $this->fetch();
		}

		public function saveInfo(){

			$user_true_name=input('user_true_name');
			$user_identityId = input('user_identityId');
			// /^[A-z]+$/|/^[\x{4e00}-\x{9fa5}]+$/u
	    	// check数据自动验证：返回boolean
	    	// preg_match_all("/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/", $mobile)
	    	if(!preg_match_all("/^[A-z]+$|^[\x{4e00}-\x{9fa5}]+$/u",$user_true_name)){
	           return json_encode(Array(
						'status'=>11,
						'message'=> '姓名有误'
					));
	    	}

	    	if(!preg_match_all("/\d{17}[\d|x]|\d{15}/",$user_identityId)){
	           return json_encode(Array(
						'status'=>12,
						'message'=> '身份证号有误'
					));
	    	}

	    	//验证身份证和姓名是否匹配


	    	//保存
	    	// $user->where('id', 1)->update(['name' => 'thinkphp']);
	    	 db('user')
	    			->where("user_name='$this->user'")
	    			->update(['user_true_name' => $user_true_name,'user_identityId' => $user_identityId,'user_identification' => 1]);
	    // 	return json_encode(Array(
					// 	'status'=>10,
					// 	'message'=> '提交成功'
					// ));
	    	return json_encode(Array(
						'status'=>10,
						'message'=> '认证成功'
					));
		}
		
	}
?>