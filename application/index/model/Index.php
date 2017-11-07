<?php
	namespace app\index\model;
	use \think\Session;
	/**
	* 
	*/
	class Index extends \think\Model
	{
		//获取城市
		function getCity(){
			$db_city = db('place')->order('id asc')->select();
			return $db_city;
		}
		//找城市
		function findCity(){
			$session_city = Session::get('city');
			$input_city = input('city');
			$city_check = false;
			if(isset($input_city)){
				try{
					$db_city = db('place')->where('place','=',$input_city)->find();
				}catch(\Exception $e){
				}
				if(isset($db_city)){
					$city_check = $db_city['place'];
				}else{
					$city_check = false;
				}
			}
			$city[0] = $city_check?$city_check:($session_city?$session_city:'beijing');
			Session::set('city',$city[0]);
			$db_city = db('place')->where('place','=',$city[0])->find();
			$city[1] = $db_city['id'];
			return $city;				
		}
		//找广告图
		
		
		
		//查询信息
		public function selectInfo(){
			
		}
		
			// 保存信息
		public function saveInfo()
		{
			db('user')->insert([
					'user_name'=>input('user_name'),
					'user_pwd'=>input('user_pwd'),
					'user_phone'=>input('user_phone'),
					'create_time'=>date("Y-m-d h-m-s",time()),
					'user_address'=>input('user_address'),
					'user_true_name'=>'',
					'user_intro'=>input('user_intro'),
					'user_head_pic'=>'',//图片的存储还需要做处理
					'user_alipay'=>'',
					'user_alipay_name'=>'',
				]);
		}
		//全部列表
		public function getList()
		{
			 return db("head_pic")
					->paginate();//在视图使用render()分页函数时需要用这个
		}
	
		//搜索查询
		public function getTrueUs($user_name='')
		{
			return $user_info = $this->find("select * from zh_user where user_name=$user_name");
			 // return db("user")
				// 	->where("level=3")
				// 	->select();
		}
		public function getOne(){
			return $info = db("user")->where("id=".input('id'))->find();
		}
		function getPlace($city){
			return $this->table('zh_place place,zh_special special')->where(['place.place'=>$city])->where('place.special_name=special.special')->field('place.id,place.place,special.special,special.special_img as pic')->find();
		}
	}
	
?>