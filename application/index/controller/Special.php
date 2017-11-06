<?php
	namespace app\index\controller;

	class Special extends Islogin
	{
		public function read($id)
		{
			$special = model('special')->checkUrl($id);
			if($special !== false && $special !== null){
				$this->assign('special',$special);
				$coupon = model('special')->getCoupon($special['name']);
				$this->assign('coupon',$coupon);
				$special_list = model('special')->getList($special['place']);
				$this->assign('special_list',$special_list);
				return $this->fetch('index');
			}else{
				$this->error('专题不存在',url('/index'));
			}
			
		}
		function coupon(){
			$state = model('special')->saveCoupon($this->isLogin);
			if($state){
				return json_encode([
					'status'=>0,
					'message'=>'恭喜！领取成功！'
				]);
			}
			return json_encode([
				'status'=>1,
				'message'=>'领取失败！'
			]);
		}
	}
?>