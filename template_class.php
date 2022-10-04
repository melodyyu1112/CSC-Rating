<?php
 
class template{
    private $fileCnt;
    private $tags = [];
 
    public function __construct($fileName){
        if(file_exists($fileName)){
            $this->fileCnt = file_get_contents($fileName);
        }
        else {
            die('Server error: template not found.');
        }
    }
 
    public function set($tag, $value){
        $this->tags[$tag] = $value;
    }       
 
    public function render(){
        foreach ($this->tags as $tag => $value){
            $this->fileCnt = str_replace('{:'.$tag.'}', $value, $this->fileCnt);
        }
 
        return $this->fileCnt;
    }
}
 
?>