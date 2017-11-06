<?php
	namespace app\index\controller;
	// use \think\Controller;
	use think\Session;
	class Expertaddinfo extends Islogin
	{
		protected $user; 
		function __construct(){
			parent::__construct();
			$this->assign('login',$this->isLogin);
			$this->user = Session::get('user_name');
			// $this->user='niahog';
		}
		public function index()
		{
			//如果给用户没有过登陆，则自动转到登陆界面
			if($this->user==null){
				return $this->redirect('index/login/index');
			}

			$that = model('Expertaddinfo');
			//如果该用户没有认证，则自动转到认证界面
			$identification = $that->finduser($this->user['user_name']);
			if($identification['user_identification']==0){
				// return $this->fetch('/expertreal/index');
				$this->redirect('expertreal/index');//路由重定向
			}
			//如果已经注册成为行家，则转到行家中心
			if($identification['if_specialist']==1){
				$this->redirect('expertinfo/index');//路由重定向
			}


			//获取城市id和城市名
			
			//通过info.php接入
			//获取城市id和城市名
			$place = $that->findplace();
			$this->assign('place',$place);


			$field = $that->findcategory();
			$this->assign('category',$field);
			//获取一级分类列表，地址列表
			//在页面显示
			
			return $this->fetch();
		}

		public function doHang(){

			//获取数据
			$new_data=$_POST;
			// var_dump($new_data);
			//验证数据

			if($new_data['is_agreed']==0){
				return;
			}

			if(!preg_match_all("/^[A-z]+$|^[\x{4e00}-\x{9fa5}]+$/u",$new_data['realname'])){
				return json_encode(Array(
						'status'=>13,
						'message'=> '真实姓名格式不正确'
					));
			}else if(!$new_data['city']){
				return json_encode(Array(
						'status'=>14,
						'message'=> '城市有误'
					));
			}else if(!preg_match_all("/^[A-z]+$|^[\x{4e00}-\x{9fa5}]+$/u",$new_data['meet_location'])){
				return json_encode(Array(
						'status'=>15,
						'message'=> '区域有误'
					));
			}else if(!$new_data['category_id']){
				return json_encode(Array(
						'status'=>16,
						'message'=> '行业有误'
					));
			}else if(!$new_data['seniority']){
				return json_encode(Array(
						'status'=>17,
						'message'=> '年限有误'
					));
			}else if(!preg_match_all("/^[A-z]+$|^[\x{4e00}-\x{9fa5}]+$/u",$new_data['occupation'])){
				return json_encode(Array(
						'status'=>18,
						'message'=> '机构有误'
					));
			}else if(!preg_match_all("/^[A-z]+$|^[\x{4e00}-\x{9fa5}]+$/u",$new_data['title'])){
				return json_encode(Array(
						'status'=>19,
						'message'=> '职位有误'
					));
			}else if(!$new_data['education']){
				return json_encode(Array(
						'status'=>20,
						'message'=> '教育有误'
					));
			}else if(!$new_data['work_exper']){
				return json_encode(Array(
						'status'=>21,
						'message'=> '工作经历有误'
					));
			
			}else if(!$new_data['self_intro']){
				return json_encode(Array(
						'status'=>23,
						'message'=> '自我介绍有误'
					));
			}


			$img_file=$_FILES;//获取文件或者图片
			// $img_file = input('imgList');
			//图片处理
			// var_dump($img_file);
			$imgPath=[];
			// exit();
			$headPath='';
			foreach ($img_file as $key => $value) {
				if($key=='headPic'){
					$headPath = $this->saveFiles($value,'uploads/images/');
				}else{
					$imgPath[] = $this->saveFiles($value,'uploads/images/');
				}
			}

			$proimg= json_encode($imgPath);

			// var_dump($headPath);

			if(!$proimg){//图片验证
				return json_encode(Array(
						'status'=>22,
						'message'=> '图片上传有误'
					));
			}
			
			$that = model('Expertaddinfo');
			$uid = $that->finduser($this->user['user_name']);
			// $id = $uid['id'];
			// //存储
			//查询专家表，如果该专家已经存在，则更新数据
			//如果没有存在，则添加新专家
			$info=findexpert($uid['id']);

			if($info){
				$that->updateexpert($id,$new_data,$proimg,$headPath);
			}else{
				$that->saveexpert($id,$new_data,$proimg,$headPath);
			}


	    	
			return json_encode(Array(
						'status'=>10,
						'message'=> '提交成功,请等待审核'
						// 'src'=> '/expertaddtop/index'//跳转到行家中心
					));
		}
		
		function saveFiles($file_data='',$path){
			// if(!empty($file_data)){
			// 	return '';
			// }
			// 获取文件临时路径
			$var_file_path = $file_data['tmp_name'];
			// 获取文件类型
			$file_type = explode('/', $file_data['type']);
			// 生成新的文件信息
			$save_file_path = $path.time().rand(100000,1000000).'.'.$file_type[1];
			// 保存图片
			copy($var_file_path,$save_file_path);

			return $save_file_path;
		}
	}
?>