<?php
namespace app\index\controller;

class Index extends Islogin
{
    public function index()
    {
    	//头部大图部分
    	$data_list = db("head_pic")->where("set_index=1")->find();
    	$this->assign("data_list",$data_list);
		//轮播部分
		$lunbo_list = db("home_lunbo")->where("status=1")->find();
    	$this->assign("lunbo_list",$lunbo_list);
		//城市按钮部分循环出来
		$model = model('Index');
		$this->assign('cityList',$model->getCity());
		//城市按钮部分利用session显示城市
		$city = $model->findCity();
		$this->assign('city',$city[0]);
		//把所有的地名相关话题传过去
		$place_topic=$model->getPlace($city[0]);
		$this->assign('place_topic',$place_topic);
		//把走后门的热门推送数据传过去

		// $find_money_uid=db('expert')->where(["exp_city_id"=>$place_topic['id']])->where('money_status=1')->field('id')->select();
		// $this->assign('find_money_uid',$find_money_uid);

		$find_money_expert=db('expert')->where(["exp_city_id"=>$place_topic['id']])->where('money_status=1')->order('id asc')->limit(10)->select();		
		$this->assign('find_money_expert',$find_money_expert);
        return $this->fetch();
    }
}
