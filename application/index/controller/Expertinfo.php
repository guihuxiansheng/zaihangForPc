<?php
	namespace app\index\controller;
	use \think\Controller;
	use think\Session;
	class Expertinfo extends Islogin
	{
		protected $user; 
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
			$this->user = Session::get('user_name');
		}
		public function index()
		{
			//判断是否登陆，登陆则通过，没有登陆则转到登陆页面
			if($this->user==null){
				return $this->redirect('index/login/index');
			}
			$id=$this->user['id'];
			
			$that = model('Expertinfo');
			//获取行家基本信息
			$user = $that->finduser($id);
			if($user['if_specialist']==0){
				$this->redirect('index/expertreal/index');//路由重定向
			}

			//获取预约单信息
			$expmeetinfo = $that->findwant($id);
	        $this->assign("expmeetinfo",$expmeetinfo);
	       

			//获取行家信息
	        $info = $that->findexpertinfo($id);
	        // var_dump($info);
	        $this->assign("expert",$info);

	        $imglist=$info['exp_proofpic'];

	        $imglist=json_decode($imglist);
	        $this->assign('imglist',$imglist);

	        //获取行家话题信息
	        $topics = $that->findtopic($info['id']);
	        $this->assign('topics',$topics);
	        // var_dump($info);
	        // var_dump($topics);
	        // exit;


	        //获取回复行家评论信息
	        
	        //再通过见面id找出详细的评论
	        $evaluate = $that->findevalu($info['id']);
	        $this->assign('evaluate',$evaluate);
	        // var_dump($evaluate);
	        // exit;
	        //添加话题
	        //获取话题类型
			$cateid = $that->findlastcate($info['exp_field_id']);
			$this->assign('category',$cateid);

			return $this->fetch();
		}

		//获取话题信息
		public function gettops(){
			
			//获取行家话题信息

	        $topics = model('Expertinfo')->findtopic(input('id'));
	        // $this->assign('topics',$topics);
	        // var_dump($topics);
	        // exit;
	        return $topics;

		}
	    // 处理编辑
	    public function update()
	    {
	        db("user")->update(input());
	        
	        $this->success("修改成功","index");

	    }		

	    // 保存图片
	    public function saveimg()
	    {
		    $file = request()->file('user_head_pic');
		    
		    if($file){
		        $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/data/user_head_pic');
		        if($info){
		            // 成功上传后 获取上传信息
		            // 输出 jpg
		            // echo $info->getExtension();
		            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
		            // echo $info->getSaveName();
		            // 输出 42a79759f284b767dfcb2a0197904287.jpg
		            // echo $info->getFilename(); 
		        }else{
		            // 上传失败获取错误信息
		            echo $file->getError();
		        }
		    }
		    $user_head_pic = 'data/user_head_pic/'.$info->getSaveName();
		    $id = input("id");
	        db("user")
	        	->where("id='$id'")
	        	->update(['user_head_pic' => $user_head_pic]);
	        
	        $this->success("图片保存成功","index");
	    }

	    public function test(){
	    	echo DS.DS;
	    }
	    //删除话题
	    public function deteltop(){
	    	try{
	    		model('Expertinfo')->delettop();
	            return json_encode(Array(
							'status'=>50,
							'message'=> '删除成功！'
						));
	    	}catch(\Exception $e){
				return json_encode(Array(
					'status'=>2,
					'message'=> '查询错误'
				));
			}
	    }
	    //添加话题
	    //保存但不发布
	    public function subsave(){
	    	var_dump(input());
	    	exit;
	    }
	    public function dotopic(){
	    	$cateid = input('cateid');//30
			$title = input('title');//25
			$holdtime = input('holdtime');//26
			$price = input('price');//27
			$bconcent = input('bconcent');//28
			$achieve = input('achieve');//29
			$elsecare = input('elsecare');//
			$spread = input('spread');//
			$publish = input('publish');//是否发布
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
	    	//获取行家id
	    	//
	    	$eid = db('expert')
	    		->field("id")
	    		->where('uid',$this->user['id'])
	    		->find();
	    	// var_dump($expertinfo);
	    	// exit;
	    	$that=model('Expertinfo');
	    	// //存储话题
			$that->savetopic($eid['id'],$title,$holdtime,$price,$bconcent,$achieve,$elsecare,$spread,$publish,$cateid);
			return json_encode(Array(
					'status'=>9,
					'message'=> '保存成功'
				));
	    }
	    function headpic(){
	    	$file = request()->file('file');
	    	if($file){
        		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'user');
        		if($info){
        			$path = DS . 'uploads' . DS . 'user' . DS . $info->getSaveName();
        			model('Expertinfo')->saveHeadImg($this->user['id'], $path);
        			return json([
        				'status' => 0,
        				'path' => $path
        			]);
        		}
        	}
	    }
	}
?>