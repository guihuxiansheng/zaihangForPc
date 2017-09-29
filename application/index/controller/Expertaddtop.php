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

			//如果没有登陆，则跳转到登陆页面
			if($this->user==null){
				return $this->fetch('/login/index');
			}

			//如果该用户没有认证，则自动转到认证界面
			$identification = db('user')
	    			->field("id,user_identification")
					->where("user_name='$this->user'")
					->find();

			if($identification['user_identification']==0){
				// return $this->fetch('/expertreal/index');
				$this->redirect('expertreal/index');//路由重定向
			}
			// var_dump($identification);
			
			//如果没有注册成为行家，则转到注册成为行家页面
			$uid = $identification['id'];
			



			$exper = model('expertaddtop')->table('zh_user user, zh_expert expert')->where(['user.id'=> $uid])->where('user.id = expert.uid')->find();
// exit();



			if(!$exper){
				$this->redirect('expertaddinfo/index');//路由重定向
			}
			// var_dump($exper);
			
			//获取最高级别的分类
			$cate_id = db('expert')
					->alias('c')
					->field('c.exp_field_id')
					->join('user u','c.uid=u.id')
					->where("u.user_name='$this->user'")
					->find();
			$cate=$cate_id['exp_field_id'];

			// var_dump($cate);
			//获取2级分类
			$field = db('category')
					->field('id,cate_name')
					->where("pr_id='$cate'")
					->select();
			// var_dump($field);
			



			//获取三级分类
			$cateid=[];
			for($i=0; $i <count($field); $i++) { 
				$j=$field[$i]['id'];
				// var_dump($j);
				$cateid[] = db('category')
							->field('id,cate_name')
							->where("pr_id='$j'")
							->select();
			}

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
			$uid = db('expert')
					->alias('c')
					->field('c.id')
					->join('user u','c.uid=u.id')
					->where("u.user_name='$this->user'")
					->find();
			// var_dump($uid);
			// exit();

			// //存储话题
			db('topic')
	    			->insert([
						'uid'=>$uid['id'],
						// 'cate_id'=>$realname,//分类id
						'topic_name'=>$title,//话题名称
						'topic_time'=>$holdtime,//时长
						'topic_price'=>$price,//话题价格
						'topic_outline'=>$bconcent,//话题大纲
						'topic_achievement'=>$achieve,//领域资历
						'topic_ps'=>$elsecare,//补充
						'topic_spread'=>$spread,
						'create_time'=>date("Y-m-d h-m-s",time()),//创建时间
						'topic_publish'=>$publish,
						'cate_id'=>$cateid
					]);


			// $this->redirect('personalinfo/index');//路由重定向
	    	if($publish==0)
	    	{
	    		return json_encode(Array(
						'status'=>9,
						'message'=> '保存成功',
						'src'=> '/personalinfo/index'//跳转到行家中心
					));
	    	}else{
	    		return json_encode(Array(
						'status'=>10,
						'message'=> '发布成功',
						'src'=> '/index/index'//跳转到行家中心
					));
	    	}
			
		}
	}
?>