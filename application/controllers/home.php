<?php
class home extends framework{
    public function __construct(){
        $this->helper("link");
    }
    public function index(){
        if(!$this->getSession('userid')){
            $this->view("solutions/dashboard");
        }
        else{
            $myModel=$this->model("userModel");
            $this->view2("dashboard",$myModel);
        }
    }
}
?>