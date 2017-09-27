<?php
	namespace app\index\controller;
	use \think\Controller;

	class Personalinfo extends Controller
	{
		public function index()
		{
	        $info = db("user")->where("id=13")->find();

	        $this->assign("info",$info);			
			return $this->fetch();
		}
	    // 处理编辑
	    public function update()
	    {
	        db("user")->update(input());
	        
	        $this->success("修改成功","index");

	    }		

	    // 保存图片
	    public function saveimg()
	    {
		    $file = request()->file('user_head_pic');
		    
		    if($file){
		        $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/data/user_head_pic');
		        if($info){
		            // 成功上传后 获取上传信息
		            // 输出 jpg
		            // echo $info->getExtension();
		            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
		            // echo $info->getSaveName();
		            // 输出 42a79759f284b767dfcb2a0197904287.jpg
		            // echo $info->getFilename(); 
		        }else{
		            // 上传失败获取错误信息
		            echo $file->getError();
		        }
		    }
		    $user_head_pic = 'data/user_head_pic/'.$info->getSaveName();
		    $id = input("id");
	        db("user")
	        	->where("id='$id'")
	        	->update(['user_head_pic' => $user_head_pic]);
	        
	        $this->success("图片保存成功","index");
	    }

	    public function test(){
	    	echo DS.DS;
	    }

	    
	}
?>