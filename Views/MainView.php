<?php

namespace Views;

class MainView {

    private $header;
    private $filename;
    private $footer;

    private $param = []; 

    public function __construct($filename, $header = 'header.php',$footer = 'footer.php')
    {
        $this->header = $header;
        $this->filename = $filename;
        $this->footer = $footer;
    }

    public function setParam($par){
        $this->param = $par;
    }

    public function render(){
        include('pages/'.$this->header);
        include('pages/'.$this->filename);
        include('pages/'.$this->footer);
    }


}


?>