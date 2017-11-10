<?php
	namespace app\index\controller;
	// use \think\Controller;
	use think\Session;
	class Expertaddtop extends Islogin
	{	protected $user; 
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
			$this->user = Session::get('user_name');
			// $this->user='niahog';
		}
		public function index()
		{	


			//查询行家表，只要存在即可到达这里，不管有没有验证通过
			if($this->user==null){
				return $this->redirect('index/login/index');
			}

			$that=model("Experver");
			//如果该用户没有认证，则自动转到认证界面
			$identification = $that->finduserver($this->user['user_phone']);
			if($identification['user_identification']==0){
				// return $this->fetch('/expertreal/index');
				$this->redirect('index/expertreal/index');//路由重定向
			}
			//如果已经注册成为行家，则转到行家中心
			if($identification['if_specialist']==1){
				$this->redirect('index/expertinfo/index');//路由重定向
			}
			
			//如果没有注册成为行家，则转到注册成为行家页面
			$uid = $identification['id'];
			
			$exper = model('expertaddtop')->table('zh_user user, zh_expert expert')->where(['user.id'=> $uid])->where('user.id = expert.uid')->find();

			if(!$exper){
				$this->redirect('index/expertaddinfo/index');//路由重定向
			}
			// var_dump($exper);
			

			$that=model('Expertaddtop');
			$cateid = $that->findlastcate($this->user['user_phone']);

			// var_dump($cateid);
			$this->assign('category',$cateid);
			return $this->fetch();
		}
		
		public function dotopic(){
			//获取数据
			$cateid = input('cateid');//30
			$title = input('title');//25
			$holdtime = input('holdtime');//26
			$price = input('price');//27
			$bconcent = input('bconcent');//28
			$achieve = input('achieve');//29
			$elsecare = input('elsecare');//
			$spread = input('spread');//
			$publish = input('publish');//是否发布
			// echo $title;
			// echo $spread;
			//验证数据
			if(!$title){
				return json_encode(Array(
						'status'=>25,
						'message'=> '话题名不正确'
					));
			}else if(!$holdtime){
				return json_encode(Array(
						'status'=>26,
						'message'=> '时长有误'
					));
			}else if(!preg_match_all("/(^[1-9]\d*(\.\d{1,2})?$)|(^0(\.\d{1,2})?$)/",$price)){//^([1-9][0-9]*)+(.[0-9]{1,2})?$ 
				return json_encode(Array(
						'status'=>27,
						'message'=> '价格有误'
					));
			}else if(!$bconcent){
				return json_encode(Array(
						'status'=>28,
						'message'=> '话题大纲有误'
					));
			}else if(!$achieve){
				return json_encode(Array(
						'status'=>29,
						'message'=> '成就有误'
					));
			}else if(!$cateid){
				return json_encode(Array(
						'status'=>30,
						'message'=> '行业有误'
					));
			}
			//	获取行家id
			$that = model('Expertaddtop');
			$info = Session::get('user_name');
			//	获取行家id
			$eid = $that->findexpertid($info['id']);
			// var_dump($uid);
			// exit();

			// //存储话题
			$that->savetopic($eid['id'],$title,$holdtime,$price,$bconcent,$achieve,$elsecare,$spread,$publish,$cateid);
			
	    	
    		return json_encode(Array(
					'status'=>9,
					'message'=> '保存成功'
				));
			
		}
	}
?>