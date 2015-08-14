<?php

class MyTpl {
        
        function __construct($template_dir='/views/', $compile_dir='/runtimes/views/') {
            $this->template_dir = APP_PATH.rtrim($template_dir,'/').'/';
            $this->compile_dir = PROJECT_PATH.rtrim($compile_dir,'/').'/';
            $this->tpl_vars=array();                     
        }
            
        function assign($tpl_var, $value = null) {   
            if ($tpl_var != '')                   
                $this->tpl_vars[$tpl_var] = $value; 
        }
                        
        function display($fileName) { 
            $tplFile=$this->template_dir.ucfirst($_GET['m'])."_".$fileName;     
            if(!file_exists($tplFile)) {                 
                return false;                      
            }
                    
            $comFileName=$this->compile_dir."com_".basename($tplFile).'.php';  
              
            if(!file_exists($comFileName) || filemtime($comFileName) < filemtime($tplFile)) {
                $repContent=$this->tpl_replace(file_get_contents($tplFile));  
                $handle=fopen($comFileName, 'w+');
                fwrite($handle, $repContent);                                                  
                fclose($handle);                  
            }
            include($comFileName);             
        }
            
        private function tpl_replace($content){
            $pattern=array(       
                '/<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>/i', 
                '/<\{\s*if\s*(.+?)\s*\}>(.+?)<\{\s*\/if\s*\}>/ies',            
                '/<\{\s*else\s*if\s*(.+?)\s*\}>/ies',                       
                '/<\{\s*else\s*\}>/is',                                  
'/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is',                
'/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*=>\s*\$(\S+)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is',  
                '/<\{\s*include\s+[\"\']?(.+?)[\"\']?\s*\}>/ie',               
                '/<\{\s*\__([a-zA-Z]+)__\s*\}>/',
                '/<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\[[\'"]([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)[\'"]\]\s*\}>/i', 
            );
            $replacement=array(   
                '<?php echo $this->tpl_vars["${1}"]; ?>',                 
                '$this->stripvtags(\'<?php if(${1}) { ?>\',\'${2}<?php } ?>\')', 
                '$this->stripvtags(\'<?php } elseif(${1}) { ?>\',"")',        
                '<?php } else { ?>',                                  
                '<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"]) { ?>${3}<?php } ?>',  
'<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"] => $this->tpl_vars["${3}"]) { ?>${4}<?php } ?>',   
                'file_get_contents($this->template_dir."${1}")',  
                '<?php echo $GLOBALS["${1}"]?>',
                '<?php echo $this->tpl_vars["${1}"]["${2}"]; ?>',
            );
            $repContent=preg_replace($pattern, $replacement, $content); 
            if(preg_match('/<\{([^(\}>)]{1,})\}>/', $repContent)) {       
                $repContent=$this->tpl_replace($repContent);         
            } 
            return $repContent;                                   
        }

        private function stripvtags($expr, $statement='') {
            $var_pattern='/\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*/is';
            $expr = preg_replace($var_pattern, '$this->tpl_vars["${1}"]', $expr);  
            $expr = str_replace("\\\"", "\"", $expr);           
            $statement = str_replace("\\\"", "\"", $statement);    
            return $expr.$statement;                        
        }
    }
?>
