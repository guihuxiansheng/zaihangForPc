<?php
	namespace app\index\controller;

	class Special extends Islogin
	{
		public function read($id)
		{
			$special = model('special')->checkUrl($id);	
			if($special !== false){
				$this->assign('special',$special);
				$coupon = model('special')->getCoupon($special['name']);
				$this->assign('coupon',$coupon);
				$special_list = model('special')->getList($special['place']);
				$this->assign('special_list',$special_list);
				return $this->fetch('index');
			}else{
				$this->error('专题不存在');
			}
			
		}
		function coupon(){
			$state = $this->saveCoupon($this->isLogin);
			if($state){
				return json_encode([
					'status'=>0
				]);
			}
			return json_encode([
				'status'=>1
			]);
		}
	}
?>