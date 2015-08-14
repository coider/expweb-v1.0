<?php

	class ApiController extends Controller {
		private $key = '297c6fb50b4fb44f37d0613a54047d';
		//获取任务
		//index.php?m=api&a=gettask
		public function getTask(){
			$objtask = new Model('project');
			$alltask = $objtask->field('project_hash,target,setting')->where("status = 0")->find();
			//处理exp数组
			if($alltask){
				$arr = array_merge($alltask,unserialize($alltask['setting']));
				unset($arr['setting']);
				//格式化与加密数据
				//echo str_replace("\\/","/",json_encode($arr));
				echo data_encode(str_replace("\\/","/",json_encode($arr)),$this->key);
			}else{
				echo 'notask';
			}
		}

		//写入检测结果
		public function putShell(){
			//echo json_encode(data_decode('k6ybx6nZ',$this->key));
			$strbuff = $_GET['myshell'];
			if($strbuff){
				//解密json格式数据转换为数组
				$myurl = json_decode(data_decode($strbuff,$this->key),true);
				$myurl['time'] = time();
				$myurl['url_hash'] = _md5($myurl['url'],$myurl['time'],-30);
				//数据入库
				$objurl = new Model('url');
				if($objurl->insert($myurl)){
					echo md5('expweb');
				}
			}
		}
		//项目状态
		public function proStatus(){
			$project_hash = _get('get.token',null,'/^[a-z0-9]{30}$/');
			if($project_hash){
				$obj = new Model('project');
				if($obj->where("project_hash = '".$project_hash."'")->update(array('status'=>'1'))){
					echo 'ok';
				}
			}
		}

	}