<?php
	class ProjectController extends CommonController{

		//显示添加项目页面
		function listpr(){
			$this->display('listpr.html');
		}
		//添加项目
		function addpr(){
			$data['target'] = _get('post.target',null,'/^(http|https):\/\/(www\.)?.+(com|net|org)(\/)?$/i');
			$data['target'] = rtrim($data['target'],'/').'/';
			$data['project_name'] =  htmlspecialchars(_get('post.projectname'),ENT_QUOTES);
			$data['project_desc'] = htmlspecialchars(_get('post.projectdesc'),ENT_QUOTES);
			$data['setting'] = serialize(_get('post.setting',null,'/^[a-z0-9-]+$/i'));

			$data['time'] = time();
			$data['project_hash'] = _md5($data['target'],$_SESSION['usrname'],-30);
			$data['user_hash'] = $_SESSION['user_hash'];
			$data['status'] = 0;

			$projects = new Model('project');
			//对project_hash 进行重复验证
			if(!$projects->where("project_hash = '".$data['project_hash']."'")->count()){
				if($projects->insert($data)){
					$this->_ajaxReturn('项目添加成功','success','index.php?m=index&a=index');
				}else{
					$this->_ajaxReturn('项目添加失败','error','index.php?m=index&a=index');
				}
			}else{
				$this->_ajaxReturn('项目已存在','prompt','index.php?m=index&a=index');
			}
		}
		//显示shell页面
		function listurl(){
			$token = _get('get.token',null,'/^[a-z0-9]{30}$/');
			if($token){
				//权限判断
				$buffusers = new Model('project');
				$userhash = $buffusers->field('user_hash')->where("project_hash = '".$token."'")->find();
				if($userhash['user_hash'] != $_SESSION['user_hash']){
					exit();
				}

				$buffurl = new Model('url');
				$allShell = $buffurl->field('url_hash,url,time')->where("project_hash = '".$token."'")->select();
				foreach ($allShell as $key => &$value) {
					$value['time'] = date('Y-m-d',$value['time']);
				}
				$this->assign('allShell',$allShell);
				$this->display('listurl.html');
			}
			
		}

		function delurl(){
			$urlhash = _get('get.token',null,'/^[a-z0-9]{30}$/');
			if($urlhash){
				//获取项目token
				$obj = new Model('url');
				$tokenarr = $obj->field('project_hash')->where("url_hash = '".$urlhash."'")->find();
				$token = $tokenarr['project_hash'];
				//项目token查用户hash权限判断
				$buffusers = new Model('project');
				$userhash = $buffusers->field('user_hash')->where("project_hash = '".$token."'")->find();
				if($userhash['user_hash'] != $_SESSION['user_hash']){
					exit();
				}
				if($obj->where("url_hash = '".$urlhash."'")->del()){
					$this->_ajaxReturn('删除成功','success','index.php?m=project&a=listurl&token='.$token);
				}		
				
			}
		}

	}