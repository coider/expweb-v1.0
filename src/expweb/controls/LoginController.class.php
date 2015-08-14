<?php

class LoginController extends Controller{

	public function isLogin(){
		
		if (empty($_SESSION['isLogin']) ? true : $_SESSION['isLogin'] != true) {
			echo 'nologin';
		}else{
			echo 'isLogin';
		}
	}
	//用户登录
	public function check(){
		$data['usrname'] = _get('post.username',null,'/[a-zA-Z0-9]{4,12}/');
		$data['usrpass'] = _get('post.password');
		$users = new Model('users');
		//用户验证
		if($usr = $users->field('usrname,usrpass,user_hash')->where("usrname = '".$data['usrname']."'")->find()){
			if(_md5($data['usrpass'],'codier',-20) == $usr['usrpass']){
				//设置用户session
				$_SESSION['isLogin'] = true;
				$_SESSION['user_hash'] = $usr['user_hash'];
				$_SESSION['usrname'] = $usr['usrname'];
				$this->_ajaxReturn('登录成功','success','index.php?m=index&a=index');
			}else{
				$this->_ajaxReturn('用户名或者密码错误','prompt');
			}
		}else{
			$this->_ajaxReturn('用户名或者密码错误','prompt');
		}


	}

	public function register(){
		$data['usrname'] = _get('post.username',null,'/[a-zA-Z0-9]{4,12}/');
		$data['usrpass'] = _get('post.password');
		//codier@qq.com
		$data['email'] = _get('post.email',null,'/^[-\w]+@[-\w]+(\.[-\w]+){0,2}(\.\w{0,3})$/');

		$data['time'] = time();
		//加密用户数据
		$data['user_hash'] = _md5($data['usrpass'],$data['time'],-25);
		$data['usrpass'] = _md5($data['usrpass'],'codier',-20);

		$users = new Model('users');
		//检测用户名是否已经存在
		if($users->where("usrname = '".$data['usrname']."'")->count()){
			$this->_ajaxReturn('用户名已存在','prompt');	
		}else{
			if($users->insert($data)){
				$this->_ajaxReturn('注册成功','success','index.php?m=index&a=index');
			}else{
				
			}

		}
		
		
	}

	public function logout(){
		session_unset(); 
		session_destroy(); 
		$this->_ajaxReturn('退出成功','success','index.php?m=index&a=index');
	}

}