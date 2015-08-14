<?php
    class IndexController extends Controller{
        
        function index(){
            $listall = $this->listall();
            $this->assign('listall',$listall);
            $this->display('index.html');
        }

        function listall(){

            $projects = new Model('project');
            @$res = $projects->field('project_name,project_desc,project_hash,time,status')->where("user_hash = '".$_SESSION['user_hash']."'")->select();
            //封装数组处理            
            $url = new Model('url');
            foreach ($res as $key => &$value) {
                $value['shellnum'] = $url->where("project_hash = '".$value['project_hash']."'")->count();
                $value['time'] = date('Y-m-d',$value['time']);
            }
          
            return $res;
        }
    }
