<?php 

	namespace app\index\controller;
	use \think\Controller;
	use think\Session;
	/**
	*审核页面控制器 
	*/
	class Experver extends Islogin
	{
		protected $user; 
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
			$this->user = Session::get('user_name');
		}
		public function index(){
			

			if($this->user==null){
				return $this->redirect('index/login/index');
			}
			$info=$this->user;
			// $id=28;
			//获取专家信息
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

			//如果已经注册行家，但没有审核通过
			//等待审核
			//审核不通过
			$expertInfo=$that->findexpert($info['id']);
			if($expertInfo['exp_examine']==-1){
				$this->redirect('index/experver/realverno');//路由重定向
			}
			else if($expertInfo['exp_examine']==1)
			{
				$this->redirect('index/expertinfo/index');//路由重定向
			}




			//通过个人id找出
			//获取专家信息以及第一个话题的信息
			//显示出列表
			// $user = db('user')
			
			
			$this->assign('expert',$expertInfo);


			//图片处理
			$imglist=$expertInfo['exp_proofpic'];

			$imglist=json_decode($imglist);
			$this->assign('imglist',$imglist);

			// $cid=$expertInfo['exp_city_id'];
			//获取常驻城市
			$cityInfo=$that->findcity($expertInfo['exp_city_id']);
			$this->assign('cityInfo',$cityInfo);

			//获取行业
			// $hid=$expertInfo['exp_field_id'];
			$categoryInfo=$that->findcategory($expertInfo['exp_field_id']);
			$this->assign('category',$categoryInfo);
			//获取专家话题
			// $zid=$expertInfo['id'];
			$topicInfo=$that->findtopic($expertInfo['id']);
			// var_dump($cateid);
			$this->assign('topic',$topicInfo);
			//获取话题类型
			// $tid=$topicInfo['cate_id'];
			$cateInfo=$that->findcate($topicInfo['cate_id']);
			$this->assign('cate',$cateInfo);
			return $this->fetch();
		}

		public function realverno(){
			$info=$this->user;
			// $id=28;
			//获取专家信息
			$that=model("Experver");

			if($this->user==null){
				return $this->fetch('/login/index');
			}

			//如果该用户没有认证，则自动转到认证界面
			$identification = $that->finduserver($this->user['user_phone']);
			if($identification['user_identification']==0){
				// return $this->fetch('/expertreal/index');
				$this->redirect('expertreal/index');//路由重定向
			}
			//如果已经注册成为行家，则转到行家中心
			if($identification['if_specialist']==1){
				$this->redirect('expertinfo/index');//路由重定向
			}

			//如果已经注册行家，但没有审核通过
			//等待审核
			//审核不通过
			$expertInfo=$that->findexpert($info['id']);
			if($expertInfo['exp_examine']==0){
				$this->redirect('experver/index');//路由重定向
			}
			else if($expertInfo['exp_examine']==1)
			{
				$this->redirect('expertinfo/index');//路由重定向
			}

			return $this->fetch();
		}
	}



 ?>