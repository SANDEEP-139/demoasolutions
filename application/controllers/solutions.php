<?php
class solutions extends framework{
    
    public function index(){
        // if(!$this->getSession('userid')){
        //    $this->redirect("account");
        // }
        $this->helper("link");
        $this->view("solutions/dashboard");
    }
}
?>