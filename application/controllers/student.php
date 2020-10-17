<?php
class student extends framework{
    public function __construct(){
        if(!$this->getSession('userid')){
            $this->redirect("credential");
        }
        $this->helper("link");
    }
    public function index(){
        $this->view("student/dashboard");
    }
    public function registration(){
        $myModel=$this->model("userModel");
        $this->view2("student/registration",$myModel);
    }
    public function registration_list(){
        $myModel=$this->model("userModel");
       // print_r($myModel); die;
        $this->view2("student/registration_list",$myModel);
    }
    public function mainegment(){
        $this->view("student/one_click");
    }
    public function profile_update(){
        $myModel=$this->model("userModel");
        $this->view2("student/profile_update",$myModel);
    }
    public function mapping_data_update(){
        $myModel=$this->model("userModel");
        $this->view2("student/mapping_data_update",$myModel);
    }
    public function photo_update(){
        $myModel=$this->model("userModel");
        $this->view2("student/photo_update",$myModel);
    }
    public function contact_update(){
        $myModel=$this->model("userModel");
        $this->view2("student/contact_update",$myModel);
    }
    public function web_sms(){
        $this->view("student/web_sms");
    }
    public function assign_rfid_card(){
        $this->view("student/assign_rfid_card");
    }
    public function roll_no_generate(){
        $this->view("student/roll_no_generate");
    }
    public function student_id_generate(){
        $myModel=$this->model("userModel");
        $this->view2("student/student_id_generate",$myModel);
    }
    public function guardian_id_generate(){
        $myModel=$this->model("userModel");
        $this->view2("student/guardian_id_generate",$myModel);
    }
    public function father_id_generate(){
        $this->view("student/father_id_generate");
    }
    public function mother_id_generate(){
        $this->view("student/mother_id_generate");
    }
    public function medical_fitness(){
        $this->view("student/medical_fitness");
    }
    public function physical_fitness(){
        $this->view("student/physical_fitness");
    }
    public function profile_update_random(){
        $this->view("student/profile_update_random");
    }
    public function caste_wise_strength(){
        $this->view("student/caste_wise_strength");
    }
    public function religion_wise_strength(){
        $this->view("student/religion_wise_strength");
    }
    public function section_wise_strength(){
        $this->view("student/section_wise_strength");
    }
    public function save_student(){
        if(!isset($_POST["student_name"])){$this->redirect("student/registration");}
        if($this->input('fee_discount')==""){$disc="0";}else{$disc=trim($this->input('fee_discount'),"₹ ");}
        $userData=[
            'class'                       =>$this->input('class'),
            'student_name'                =>$this->input('student_name'),
            'fathers_name'                =>$this->input('fathers_name'),
            'mothers_name'                =>$this->input('mothers_name'),
            'father_contact1'             =>$this->input('father_contact1'),
            'father_contact2'             =>$this->input('father_contact2'),
            'date_of_birth'               =>$this->input('date_of_birth'),
            'gender'                      =>$this->input('gender'),
            'date_of_admition'            =>$this->input('date_of_admition'),
            'admition_type'               =>$this->input('admition_type'),
            'admition_scheme'             =>$this->input('admition_scheme'),
            'fee_category'                =>$this->input('fee_category'),
            'bus'                         =>$this->input('bus'),
            'hostel'                      =>$this->input('hostel'),
            'library'                     =>$this->input('library'),
            'sms_contact_no'              =>$this->input('sms_contact_no'),
            'student_address'             =>$this->input('student_address'),
            'village_city'                =>$this->input('village_city'),
            'block'                       =>$this->input('block'),
            'district'                    =>$this->input('district'),
            'state'                       =>$this->input('state'),
            'pincode'                     =>$this->input('pincode'),
            'landmark'                    =>$this->input('landmark'),
            'student_photo'               =>$this->input('student_photo'),
            'father_photo'                =>$this->input('father_photo'),
            'mother_photo'                =>$this->input('mother_photo'),
            'remark1'                     =>$this->input('remark1'),
            'remark2'                     =>$this->input('remark2'),
            'remark3'                     =>$this->input('remark3'),
            'remark4'                     =>$this->input('remark4'),
            'annual_fee'                  =>trim($this->input('annual_fee'),"₹ "),
            'exam_fee'                    =>trim($this->input('exam_fee'),"₹ "),
            'sports_fee'                  =>trim($this->input('sports_fee'),"₹ "),
            'event_fee'                   =>trim($this->input('event_fee'),"₹ "),
            'monthly_fee'                 =>trim($this->input('monthly_fee'),"₹ "),
            'buss_fee'                    =>trim($this->input('buss_fee'),"₹ "),
            'hostel_fee'                  =>trim($this->input('hostel_fee'),"₹ "),
            'fee_discount'                =>$disc,
            'fee_discount_error'                =>'',
            'class_error'                       =>'',
            'student_name_error'                =>'',
            'fathers_name_error'                =>'',
            'father_contact1_error'             =>'',
            'date_of_birth_error'               =>''
        ];
        if($userData['class']=="0"){
            $userData['class_error']="Class is required";
        }
        if(empty($userData['student_name'])){
            $userData['student_name_error']="Student Name is required";
        }
        if(empty($userData['fathers_name'])){
            $userData['fathers_name_error']="Fathers's is required";
        }
        if(empty($userData['father_contact1'])){
            $userData['father_contact1_error']="Contact no. is required";
        }
        if(empty($userData['date_of_birth'])){
            $userData['date_of_birth_error']="Date of Birth is required";
        }
        $myModel=$this->model("userModel");
        if(empty($userData['class_error']) && empty($userData['student_name_error']) && empty($userData['fathers_name_error']) && empty($userData['father_contact1_error']) && empty($userData['date_of_birth_error'])){
            
            if(!$myModel->check_employee($userData['class'],$userData['student_name'],$userData['fathers_name'])){
                $this->setFlash("msg","Sorry this staff is allready exist!");
                $this->view2("student/registration",$myModel,$userData);
            }
            else{
                $userid= '1'.rand(1000000, 9999999);
                $password=password_hash("AM".rand(100000, 999999),PASSWORD_DEFAULT);
                $data=[$this->getSession('userid'),$userid,$password,$userData['class'],$userData['student_name'],$userData['fathers_name'],$userData['mothers_name'],$userData['father_contact1'],$userData['father_contact2'],$userData['date_of_birth'],$userData['gender'],$userData['date_of_admition'],$userData['admition_type'],$userData['admition_scheme'],$userData['fee_category'],$userData['bus'],$userData['hostel'],$userData['library'],$userData['sms_contact_no'],$userData['student_address'],$userData['village_city'],$userData['block'],$userData['district'],$userData['state'],$userData['pincode'],$userData['landmark'],$userData['student_photo'],$userData['father_photo'],$userData['mother_photo'],$userData['remark1'],$userData['remark2'],$userData['remark3'],$userData['remark4'],"Active"];
                $myData= $myModel->save_student_data($data);
                $myDataFee= $myModel->save_student_fee([$userid,$userData['annual_fee'],$userData['exam_fee'],$userData['sports_fee'],$userData['event_fee'],$userData['buss_fee'],$userData['hostel_fee'],$userData['fee_discount'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee'],$userData['monthly_fee']]);
                
                if($myData && $myDataFee){
                    $this->setFlash("msgsuc","You have succesfully registerd!");
                    $this->redirect("student/registration");
                }
                else{
                    $this->setFlash("msg","Somthing worng!".$myData);
                    $this->redirect("student/registration");
                }
            }
        }
        else{
            $this->setFlash("msg","Please fill all requerd field!");
            $this->view2("student/registration",$myModel,$userData);
        }
    }
    function studentlist(){
        $myModel=$this->model("userModel");
        //echo "hii"; die();
        $this->view2("ajax/allsubjects",$myModel,['wid'=>"12",'clasid'=>$this->input('clasid'),'status'=>$this->input('status')]);
    }
    function studentprofile(){
        $myModel=$this->model("userModel");
        $this->view2("ajax/allsubjects",$myModel,['wid'=>"13",'clasid'=>$this->input('clasid'),'status'=>$this->input('status')]);
    }
    function select_fee(){
        $myModel=$this->model("userModel");
        $this->view2("ajax/allsubjects",$myModel,['wid'=>"21",'classid'=>$this->input('classid'),'buss'=>$this->input('busf'),'hostel'=>$this->input('hostelf')]);
    }
}
?>