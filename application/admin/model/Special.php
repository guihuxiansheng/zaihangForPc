<?php
	namespace app\admin\model;

	/**
	* 
	*/
	class Special extends \think\Model
	{
		function getList(){
			return db('special')->paginate();
		}
		function saveFile(){
			$special = request()->param();
			if(empty($special['special']) or empty($special['special_name'])){
				return false;
			}
			$file = request()->file('special_img');
			$info = $file->validate(['size'=>5555678,'ext'=>'jpg,png,gif'])->move('uploads');
			if($info){
				$filePath = 'uploads'.DS.$info->getSaveName();
				$this->table('zh_special')->insert([
					'special'=>$special['special'],
					'special_name'=>$special['special_name'],
					'special_img'=>$filePath,
					'create_time'=>date('y-m-d H-m-s',time())
				]);
				return true;
			}else{
				return false;
			}
		}
		function delete(){
			if(input('id')){
				try{
					db('special')->where('id='.input('id'))->delete();
				}catch(\Exception $e){
					return false;
				}
				return true;
			}
			return false;
		}
	}
?>