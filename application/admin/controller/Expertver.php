<?php
namespace app\admin\controller;

class Expertver extends Islogin
{
    public function index()
    {
    	// 查询列表
    	$user_list = model("Expertver")->getList();
        // print_r($user_list);
    	$this->assign("user_list",$user_list);
    	// 分页
    	// 查询分类
        // exit();
       return $this->fetch();
        // print_r($user_list);
    }

    public function user(){
        //获取个人资料
        $info = model("User")->getOne();
        $this->assign("info",$info);
       return $this->fetch();
    }
    public function expert(){
        //获取个人资料
        $id=input('id');
        // $id=28;
        //获取专家信息
        $expertInfo=db('expert')
                    ->where("uid='$id'")
                    ->find();
        $this->assign('expert',$expertInfo);
        // $this->assign("info",$info);
        //图片处理
        $imglist=$expertInfo['exp_proofpic'];

        $imglist=json_decode($imglist);
        $this->assign('imglist',$imglist);

        $cid=$expertInfo['exp_city_id'];
        //获取常驻城市
        $cityInfo=db('place')
            ->where("id='$cid'")
            ->find();
        $this->assign('city',$cityInfo);
        $hid=$expertInfo['exp_field_id'];
            $categoryInfo=db('category')
                        ->where("id='$hid'")
                        ->find();
            $this->assign('category',$categoryInfo);
       return $this->fetch();
    }

    public function firsttop(){
        $id=input('id');
        // $id=28;
        //获取专家信息
        $this->assign('id',$id);
        $expertInfo=db('expert')
                    ->where("uid='$id'")
                    ->find();
        $this->assign('expert',$expertInfo);
     //获取专家话题
        $zid=$expertInfo['id'];
        $topicInfo=db('topic')
                    ->where("eid='$zid'")
                    ->find();
        // var_dump($cateid);
        $this->assign('topic',$topicInfo);
        //获取话题类型
        $tid=$topicInfo['cate_id'];
        $cateInfo=db('category')
                    ->where("id='$tid'")
                    ->find();
        $this->assign('cate',$cateInfo);
        return $this->fetch();
    }
    public function expertver(){
        //通过个人id找出
            //获取专家信息以及第一个话题的信息
            //显示出列表
            // $user = db('user')
            $id=input('id');
            // $id=28;
            //获取专家信息
            $expertInfo=db('expert')
                        ->where("uid='$id'")
                        ->find();
            $this->assign('expert',$expertInfo);


            //图片处理
            $imglist=$expertInfo['exp_proofpic'];

            $imglist=json_decode($imglist);
            $this->assign('imglist',$imglist);

            $cid=$expertInfo['exp_city_id'];
            //获取常驻城市
            $cityInfo=db('place')
                ->where("id='$cid'")
                ->find();
            $this->assign('city',$cityInfo);

            //获取行业
            $hid=$expertInfo['exp_field_id'];
            $categoryInfo=db('category')
                        ->where("id='$hid'")
                        ->find();
            $this->assign('category',$categoryInfo);
            //获取专家话题
            $zid=$expertInfo['id'];
            $topicInfo=db('topic')
                        ->where("eid='$zid'")
                        ->find();
            // var_dump($cateid);
            $this->assign('topic',$topicInfo);
            //获取话题类型
            $tid=$topicInfo['cate_id'];
            $cateInfo=db('category')
                        ->where("id='$tid'")
                        ->find();
            $this->assign('cate',$cateInfo);
            return $this->fetch();
    }
    //获取某条详细信息
    public function detailed(){

        $info = model("User")->getOne();
        $this->assign("info",$info);
        return $this->fetch();
    }

    // 处理编辑,编辑后提交
    public function update()
    {
        try{
            model("User")->saveDeta(input('id'));

            // $this->success("修改成功","index");
            return json_encode(Array(
                            'status'=>10,
                            'message'=> '修改成功'
                        ));
        }catch(Exception $e) 
        { 
           return json_encode(Array(
                        'status'=>100,
                        'message'=> '异常'
                    ));
       }
    }

    public function veruser(){
        $that = model('expertver');
        if(input('type')==1)
        {
            return json_encode(Array(
                                'status'=>10,
                                'message'=> '审核通过'
                            ));
        }else{
            $that->verOne(0,-1);
            return json_encode(Array(
                                'status'=>11,
                                'message'=> '审核不通过'
                            ));
        }
    }


    //审核通过
    public function verexpert(){ 
        // var_dump(input());
        // exit();
        $that = model('expertver');
        $that->verOne(1,1);
        return json_encode(Array(
                            'status'=>10,
                            'message'=> '审核通过'
                        ));
    }
    //审核没有通过
    public function noverexpert(){ 
        // var_dump(input());
        // exit();
        $that = model('expertver');
        $that->verOne(0,-1);
        return json_encode(Array(
                            'status'=>11,
                            'message'=> '审核不通过'
                        ));
    }

    // 删除 
     public function delete()
    {

        db("expert")
            ->where("uid=".input('id'))
            ->delete();
        $this->success("删除成功","index");

    }
}
