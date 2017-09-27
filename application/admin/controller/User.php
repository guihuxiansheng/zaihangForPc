<?php
namespace app\admin\controller;

class User extends Islogin
{
    public function index()
    {
    	// 查询列表
    	$user_list = model("User")->getList();
    	$this->assign("user_list",$user_list);
    	// 分页
    	// 查询分类
       return $this->fetch();
        // print_r($user_list);
    }

    // 进入添加页
    public function add()
    {
    	return $this->fetch();
    }
    // 处理添加
    public function save()
    {
        model("User")->saveInfo();
        $this->success("添加成功","index");
    }
    // 进入编辑页
    public function edit()
    {
        // 进入编辑页面
        // 获取当前编辑的信息
        // $info = db("user")->where("id=".input('id'))->find();
        $info = model("User")->getOne();
        $this->assign("info",$info);
       return $this->fetch();
    }

    //获取某条详细信息
    public function detailed(){

        $info = model("User")->getOne();
        $this->assign("info",$info);
       return $this->fetch();
    }

    // 处理编辑
    public function update()
    {

        db("user")->update(input());

        $this->success("修改成功","index");

    }
    // 删除 
     public function delete()
    {

        db("user")->where("id=".input('id'))->delete();

        $this->success("删除成功","index");

    }
}
