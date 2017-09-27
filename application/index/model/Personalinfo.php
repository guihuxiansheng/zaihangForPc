<?php
namespace app\index\model;



class Personalinfo extends \think\Model{
 
 	// 当前模型对应的表名
	protected $table = "user";



	// 保存信息
	public function saveInfo()
	{
		db('user')->insert([
				'class_name'=>input('class_name'),
				'class_price'=>input('class_price'),
				'class_content'=>input('class_content'),
				'create_time'=>time(),
				'cate_id'=>input('cate_id'),
			]);
	}

	public function getList($cate_id='')
	{
		 // echo $cate_id;
		 // 传的是职场发展 》 》 第三级
		 // 属于职场发展的所有三级分类全部找出来   
		 // in （所有分类）
		// 到底是那一级分类
		
		$where_sql = '';
		if ($cate_id) {
			$cate_info = $this->find("select cate_name,id,level from zh_category where id=$cate_id");

			if ($cate_info['level'] == 3) {

				$where_sql = "where c.cate_id = $cate_id";

			}else if ($cate_info['level'] == 2) {

				$where_sql = "where g.parent_id = $cate_id";

			}else if ($cate_info['level'] == 1) {
				// 一级菜单
				// 二级菜单ID 23,1313,13,13,13
			 	$second_menu_list = $this->query("select id from zh_category where parent_id=$cate_id");
			 	$second_menu_ids = [];
			     foreach ($second_menu_list as $key => $value) {
			     	 $second_menu_ids[] =$value['id'];
			     }
			     
				$where_sql = "where g.parent_id in(".implode(",", $second_menu_ids).")";
			}
		}

		// alias 给主表取表名
		// field 获取指定字段的成员
		// join 连接查询（第一个参数：表名 别名，第二个参数：两个连接表的关系）
		// paginate 分页，默认每页20条
		// where 条件，值：字符串、数组
		return db("class")
				->alias("c")
				->field("c.id,c.class_name,g.cate_name,c.class_price,c.create_time")
				->join("category g","c.cate_id = g.id")
				->where($where_sql)
				->order("c.id desc")
				->paginate();

		// return $this->query("select c.id,c.class_name,g.cate_name,c.create_time from zh_class c join zh_category g on c.cate_id = g.id $where_sql");

	}
}

?>