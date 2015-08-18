<?php
//数据库操作类

//数据库类Model的定义
class Model{
    protected $tabname; //表名
    protected $link; //数据库的连接
    protected $pk = "id"; //当前表的主键名
    protected $fields=array(); //当前表的字段信息
    protected $where=array(); //封装where条件属性
    protected $order=null; //排序条件
    protected $limit=null; //分页条件
    protected $field=null; //封装查询字段
    
    //构造方法，负责连接数据库
    public function __construct($tabname){
        $this->tabname = TABPREFIX.$tabname;
        $this->link = @mysql_connect(HOST,USER,PASS)or die("数据库连接失败");
        mysql_select_db(DBNAME);
        mysql_set_charset("utf8");
        
        $this->getFields(); //调用自定义方法加载表字段信息。
    }
    

    private function getFields(){

        $sql = "desc {$this->tabname}";
        $result = mysql_query($sql,$this->link);

        while($row = mysql_fetch_assoc($result)){

            $this->fields[]=$row['Field'];

            if($row['Key']=="PRI"){
                $this->pk = $row['Field'];
            }
        }
        mysql_free_result($result);
    }
    

    public function select(){

        if(empty($this->field)){
            $sql = "select * from ".$this->tabname;
        }else{
            $sql = "select {$this->field} from ".$this->tabname;
        }

        if(count($this->where)>0){
            $sql.=" where ".implode(" and ",$this->where);
        }

        if(!empty($this->order)){
            $sql.=" order by ".$this->order;
        }

        if(!empty($this->limit)){
            $sql.=" ".$this->limit;
        }

        
        $result = mysql_query($sql,$this->link);
        $list = array();
        while($row = mysql_fetch_assoc($result)){
            $list[]=$row;
        }
        if(is_resource($result)){
            mysql_free_result($result);
        }

        $this->where=array(); 
        $this->order=null; 
        $this->limit=null; 
        $this->field=null; 
        
        return $list; 
    }
    

    public function count(){

        $sql = "select count(*) from {$this->tabname}";

        if(count($this->where)>0){
            $sql.=" where ".implode(" and ",$this->where);
        }
        
        $result = mysql_query($sql,$this->link); 

        return mysql_result($result,0,0); 
    }
    

    public function find(){


        if(empty($this->field)){
            $sql = "select * from ".$this->tabname;
        }else{
            $sql = "select {$this->field} from ".$this->tabname;
        }

        if(count($this->where)>0){
            $sql.=" where ".implode(" and ",$this->where);
        }
      
        $result = mysql_query($sql,$this->link);

        if($result && mysql_num_rows($result)>0){
            return mysql_fetch_assoc($result); 

        return null; 
        }
    }
    

    public function del($id){

        $sql = "delete from {$this->tabname}";


        if(count($this->where)>0){
            $sql.=" where ".implode(" and ",$this->where);
        }

        mysql_query($sql,$this->link);
        return mysql_affected_rows($this->link);
    }


    public function insert($data=array()){
        if(empty($data)){
            $data = $_POST;
        }

        $fieldlist = array(); 
        $valuelist = array(); 
        foreach($data as $k=>$v){

           if(in_array($k,$this->fields)){
             $fieldlist[] = $k;
             $valuelist[] = $v;
           }
        }

        $sql = "insert into {$this->tabname}(".implode(",",$fieldlist).") values('".implode("','",$valuelist)."')";

        mysql_query($sql,$this->link);

        return mysql_insert_id($this->link);
    }
    

    public function update($data=array()){
        if(empty($data)){
            $data = $_POST;
        }

        $valuelist = array();
        foreach($data as $k=>$v){

           if(in_array($k,$this->fields) && $k!=$this->pk){
                $valuelist[]="{$k}='{$v}'"; 
           }
        }

        $sql = "update {$this->tabname} set ".implode(",",$valuelist);

        if(count($this->where)>0){
            $sql.=" where ".implode(" and ",$this->where);
        }

        mysql_query($sql,$this->link);

        return mysql_affected_rows($this->link);
    }
    

    public function where($where){
        $this->where[]=$where;
        return $this;
    }
    
    public function order($order){
        $this->order=$order;
        return $this;
    }

    public function limit($m,$n=0){
        if($n==0){
            $this->limit="limit {$m}";
        }else{
            $this->limit="limit {$m},{$n}";
        }
        return $this;
    }
    

    public function field($field){
        $this->field = $field;
        return $this;
    }
    
    public function __destruct(){

        if(is_resource($this->link)){
            mysql_close($this->link);
        }
    }
}


