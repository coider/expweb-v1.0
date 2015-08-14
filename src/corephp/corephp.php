<?php   
    session_start();
    
    header("Content-Type:text/html;charset=utf-8");
    date_default_timezone_set("PRC");
    
    define("EXPWEB_PATH", rtrim(EXPWEB, '/').'/'); 
    define("APP_PATH", rtrim(APP,'/').'/'); 
    define("PROJECT_PATH", dirname(EXPWEB_PATH).'/');
    define("TMPPATH", str_replace(array(".", "/"), "_", ltrim($_SERVER["SCRIPT_NAME"], '/'))."/");
    
    $config = PROJECT_PATH."config.inc.php";
  
    if(file_exists($config)) include $config;

    $config = PROJECT_PATH.'functions.inc.php';
    if(file_exists($config)) include $config;
    
    $include_path=get_include_path();  
    $include_path.=PATH_SEPARATOR.EXPWEB_PATH."bases/"; 
    $controlerpath=APP_PATH."/controls/";  
    $include_path.=PATH_SEPARATOR.$controlerpath;     

    set_include_path($include_path);
 
    function __autoload($b_className){
        include ucfirst($b_className).".class.php";    
    }
    
    
    $_GET["m"]= (!empty($_GET['m']) ? $_GET['m']: 'index');    //默认是index模块
    $_GET["a"]= (!empty($_GET['a']) ? $_GET['a'] : 'index');   //默认是index动作

   
    $spath=dirname($_SERVER["SCRIPT_NAME"]);                                                              
    if($spath=="/" || $spath=="\\")
        $spath="";
        
    $GLOBALS["root"]=$spath.'/'; 
    $GLOBALS["app"]=$_SERVER["SCRIPT_NAME"];         
    $GLOBALS["url"]=$GLOBALS["app"].'?m='.$_GET["m"];
    $GLOBALS["public"]=$GLOBALS["root"].'public/'; 
    
    $srccontrolerfile=APP_PATH."controls/".ucfirst($_GET["m"])."Controller.class.php";

    if(file_exists($srccontrolerfile)){
        $className=ucfirst($_GET["m"])."Controller";
        $controler=new $className();
        $controler->run();
    }
    
   



