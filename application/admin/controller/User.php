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

        $user_info=input();
        // var_dump($user_info);
        $that = model('User'); 
        $that->updateinfo();

        return json_encode(Array(
                        'status'=>10,
                        'message'=> '保存成功'
                    ));
    }
    // 删除 
     public function delete()
    {

        db("user")->where("id=".input('id'))->delete();

        $this->success("删除成功","index");

    }
    //图片处理
    function saveFiles($file_data='',$path){
            // if(!empty($file_data)){
            //  return '';
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
