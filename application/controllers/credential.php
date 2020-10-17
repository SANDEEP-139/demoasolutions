<?php
class credential extends framework{
    public function __construct(){
        if($this->getSession('userid')){
            $this->redirect("");
        }
        $this->helper("link");
    }
    public function index(){
        $this->view("credential/login");
    }
    
    public function signup(){
        $this->view("credential/signup");
    }
    
    public function forgot(){
        $this->view("credential/forgot");
    }

    public function logout(){
        $this->destroy();
        $this->redirect("credential");
    }

    public function loginForm(){
        $userData=[
            'uid'         =>$this->input('uid'),
            'password'    =>$this->input('password'),
            'erroruid'         =>'',
            'errorpassword'    =>''
        ];

        if(empty($userData['uid'])){
            $userData['erroruid']="User name is required";
        }
        if(empty($userData['password'])){
            $userData['errorpassword']="Password is required";
        }
        if(empty($userData['erroruid']) && empty($userData['errorpassword'])){
            $myModel=$this->model("userModel");
            $myData= $myModel->login($userData['uid'],$userData['password']);
            if($myData){
                $this->setSession("userid",$myData->id);
                $this->redirect("");
            }
            else{
                $this->setFlash("msg","Invailed userid or password!");
                $this->redirect("account");
            }
        }
        else{
            $this->view("credential/login",$userData);
        }

        
    }
}
?>