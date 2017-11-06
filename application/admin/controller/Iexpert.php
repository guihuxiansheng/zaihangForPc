<?php
namespace app\admin\controller;

class Iexpert extends Islogin
{   
    //审核通过的
    public function index()
    {   
        $that=model("Iexpert");
    	// 查询列表
    	$expert_list = $that->getList(1);
        // print_r($expert_list);
    	$this->assign("expert_list",$expert_list);
    	
       return $this->fetch();
        // print_r($user_list);
    }

    //没有审核通过的
    public function nover(){
        $that=model("Iexpert");
        // 查询列表
        $expert_list = $that->getList(0);
        // print_r($expert_list);
        $this->assign("expert_list",$expert_list);
       return $this->fetch();
    }
    //审核不通过
    public function norealver(){
        $that=model("Iexpert");
        // 查询列表
        $expert_list = $that->getList(-1);
        // print_r($expert_list);
        $this->assign("expert_list",$expert_list);
       return $this->fetch();
    }

    // 进入添加页
    public function add()
    {   
        $uid=input('id');
        $this->assign('uid',$uid);

        $that=model('Iexpert');
        //通过info.php接入
        //获取城市id和城市名
        $place = $that->findplace();
        $this->assign('place',$place);


        $field = $that->findcategory();
        $this->assign('category',$field);
    	return $this->fetch();
    }
    // 进入编辑页
    public function edit()
    {
        // 进入编辑页面
        // 获取当前编辑的信息
        // $info = db("user")->where("id=".input('id'))->find();
       $expert = model("Iexpert")->getOne();
        // var_dump($expert);
        // exit();
        $this->assign("expert",$expert);

        $imglist=$expert['exp_proofpic'];

        $imglist=json_decode($imglist);
        $this->assign('imglist',$imglist);

        $cid=$expert['exp_city_id'];
        //获取常驻城市
        $cityInfo=db('place')
            ->select();
        $this->assign('city',$cityInfo);

        $hid=$expert['exp_field_id'];
        $categoryInfo=db('category')
                    ->where("level=1")
                    ->select();
        $this->assign('category',$categoryInfo);
        return $this->fetch();
    }

    //获取某条详细信息
    public function detailed(){

        $expert = model("Iexpert")->getOne();
        // var_dump($expert);
        // exit();
        $this->assign("expert",$expert);

        $imglist=$expert['exp_proofpic'];

        $imglist=json_decode($imglist);
        $this->assign('imglist',$imglist);

        $cid=$expert['exp_city_id'];
        //获取常驻城市
        $cityInfo=db('place')
            ->where("id='$cid'")
            ->find();
        $this->assign('city',$cityInfo);
        $hid=$expert['exp_field_id'];
        $categoryInfo=db('category')
                    ->where("id='$hid'")
                    ->find();
        $this->assign('category',$categoryInfo);
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

   public function doHang(){

            //获取数据
            $new_data=$_POST;
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

            //如果图片为空，则不执行
            $headPath='';
            $proimg='';
             if($img_file!=null){
                $imgPath=[];
                // exit();
                
                foreach ($img_file as $key => $value) {
                    if($key=='headPic'){
                        $headPath = $this->saveFiles($value,'uploads/images/');
                    }else{
                        $imgPath[] = $this->saveFiles($value,'uploads/images/');
                    }
                }

                $proimg = json_encode($imgPath);
             }


            // var_dump($headPath);

            // if(!$proimg){//图片验证
            //     return json_encode(Array(
            //             'status'=>22,
            //             'message'=> '图片上传有误'
            //         ));
            // }
            
            $that = model('Iexpert');
            // $uid = $that->finduser($new_data['hid']);
            // $id = $uid['id'];
            // //存储
            //查询专家表，如果该专家已经存在，则更新数据
            //如果没有存在，则添加新专家

            // array_key_exists(key,array)
            // 该函数是判断某个数组array中是否存在指定的 key，如果该 key 存在，则返回 true，否则返回 false。
            if(array_key_exists('hid',$new_data)){
                 if($proimg != ''&&$headPath != ''){
                        $that->updateexpert('all',$new_data['hid'],$new_data,$proimg,$headPath);   
                }else if($proimg == ''&&$headPath != ''){
                        $that->updateexpert('head',$new_data['hid'],$new_data,$headPath);
                }else if($proimg != ''&&$headPath == ''){
                        $that->updateexpert('pro',$new_data['hid'],$new_data,$proimg);
                }else if($proimg == ''&&$headPath == ''){
                        $that->updateexpert('none',$new_data['hid'],$new_data);
                }
            }else{
                //用户id
                $that->saveexpert($new_data['uid'],$new_data,$proimg,$headPath);
            }
           
           
 
            return json_encode(Array(
                        'status'=>10,
                        'message'=> '提交成功,请等待审核'
                        // 'src'=> '/expertaddtop/index'//跳转到行家中心
                    ));



        }
    // 删除 
     public function delete()
    {

        db("expert")->where("id=".input('id'))->delete();

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
