<?php

//接口数据加密函数
function data_encode($data,$key){
    $datalength = strlen($data);
    $keylength = strlen($key);
    $ret = "";
    for($i=0; $i<$datalength;$i++){
        $ret .= chr((ord($data[$i])+ord($key[$i % $keylength]))%256);
    }

    return base64_encode($ret);
}


function data_decode($data,$key){
    $data = base64_decode($data);
    $datalength = strlen($data);
    $keylength = strlen($key);
    $ret = "";

    for($i=0; $i<$datalength;$i++){
        $ret .= chr((ord($data[$i])-ord($key[$i % $keylength]))%256);
    }
    return $ret;
}


//通用加密函数
/**
 * @$str 加密字符串
 * @$salt 加密字符串
 * @$num 加密后返回多少位
**/
function _md5($str,$salt='codier',$num=-32){
   return substr(md5(substr(md5($salt),0,16).substr(md5($str),-25)),$num);
}



function _get($name,$default='',$filter=null,$datas=null,$arg=ENT_QUOTES) {

	static $_PUT	=	null;
    if(strpos($name,'.')) { // 指定参数来源
        list($method,$name) =   explode('.',$name,2);
    }

    switch(strtolower($method)) {
        case 'get'     :   
        	$input =& $_GET;
        	break;
        case 'post'    :   
        	$input =& $_POST;
        	break;
        case 'session' :   
        	$input =& $_SESSION;   
        	break;
        default:
            return null;
    }
    //echo $method.'<br/>'; echo $name.'<br/>';
    //var_dump($input);
 if(''==$name) { // 获取全部变量
        $data       =   $input;
        $filters    =   isset($filter)?$filter:DEFAULT_FILTER;
        if($filters) {
            if(is_string($filters)){
                $filters    =   explode(',',$filters);
            }
            foreach($filters as $filter){
                $data   =   array_map_recursive($filter,$data); // 参数过滤
            }
        }
    }elseif(isset($input[$name])) { // 取值操作
        $data       =   $input[$name];

        $filters    =   isset($filter)?$filter:DEFAULT_FILTER;
        
        if($filters) {
            if(is_string($filters)){
                //判断是否是正则过滤
                if(0 === strpos($filters,'/')){
                    if(!array_filter_value($filters,$data)){
                        //匹配失败
                        return   isset($default) ? $default : null;
                    }
                    /*
                    if(1 !== preg_match($filters,(string)$data)){//正则匹配
                        // 支持正则验证
                        return   isset($default) ? $default : null;
                    }
                    */
                }else{
                    $filters    =   explode(',',$filters);                    
                }

            }elseif(is_int($filters)){ //指定php过率函数的过率方式
                $filters    =   array($filters);
            }
            
            if(is_array($filters)){
                foreach($filters as $filter){
                    if(function_exists($filter)) {
                        $data   =   is_array($data) ? array_map_recursive($filter,$data,$arg) : $filter($data,$arg); // 参数过滤
                    }else{
                        $data   =   filter_var($data,is_int($filter) ? $filter : filter_id($filter));
                        if(false === $data) {
                            return   isset($default) ? $default : null;
                        }
                    }
                }
            }
        }
	}
   
    return $data;
}

//正则过滤数组元素
function array_filter_value($filters,$data){
    $ret = true;

    if(is_array($data)){
        foreach ($data as $key => $value) {
            if(!preg_match($filters,$value)) $ret = false;
        }

    }elseif(is_string($data)){
        if(preg_match($filters,$data)) $ret = true;
    }

    return $ret;;
}

function array_map_recursive($filter, $data,$arg) {
    $result = array();
    foreach ($data as $key => $val) {
        $result[$key] = is_array($val)
         ? array_map_recursive($filter, $val)
         : call_user_func($filter, $val,$arg);
    }
    return $result;
 }
