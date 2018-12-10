<?php 
	//公司简介
	namespace app\admin\controller;
	use think\Db;
	use think\Request;
	 
	class About extends Base
	{
		 //所有列表	
		 public function index()
		 {
		 	//总数、列表
		 	$count 	= count($info 	= DB::table("about")->paginate(2));
 			$title	= '公司简介';
		 	return $this->fetch('About/index',['info'=>$info,'title'=>$title,'count'=>$count]);
		 }
		 //添加文章 	
		 public function add()
		 {
		 	 
		 	return $this->fetch("About/add");
		 }
	}
?>