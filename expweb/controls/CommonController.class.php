<?php

class CommonController extends Controller{

	//构造方法，进行用户验证，其他操作全部继承该类
	function __construct(){
		parent::__construct();
		if(empty($_SESSION['isLogin']) ? true : $_SESSION['isLogin'] != true){
			header("location:index.php?m=index&a=index");
			exit();
		}
	}

	
}