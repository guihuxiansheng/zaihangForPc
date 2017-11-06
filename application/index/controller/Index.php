<?php
namespace app\index\controller;

class Index extends Islogin
{
    public function index()
    {
    	$this->assign('cityList',db('place')->order('id ASC')->select());
        return $this->fetch();
    }
}
