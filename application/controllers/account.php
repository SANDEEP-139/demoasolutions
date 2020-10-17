<?php
class account extends framework{
    public function __construct(){
        if(!$this->getSession('userid')){
            $this->redirect("");
        }
        $this->helper("link");
    }
    public function index(){
        $this->view("account/dashboard");
    }
    public function dues(){
        $myModel=$this->model("userModel");
        $this->view2("account/dues",$myModel);
    }
    public function class_wise_dues($class_id){
        $myModel=$this->model("userModel");
        $this->view2("account/class_wise_dues",$myModel,[$class_id]);
    }
    public function fees(){
        $this->view("account/fees",[$class_id]);
    }
    public function penalty(){
        $this->view("account/penalty");
    }
    public function add_bank(){
        $this->view("account/add_bank");
    }
    public function account_list(){
        $myModel=$this->model("userModel");
        $this->view2("account/account_list",$myModel);
    }
    public function add_income(){
        $myModel=$this->model("userModel");
        $this->view2("account/add_income",$myModel);
    }
    public function add_expense(){
        $myModel=$this->model("userModel");
        $this->view2("account/add_expense",$myModel);
    }
    public function income_expense_list(){
        $myModel=$this->model("userModel");
        $this->view2("account/income_expense_list",$myModel);
    }
    public function ledger_info(){
        $myModel=$this->model("userModel");
        $this->view2("account/ledger_info",$myModel);
    }
    public function ledger_report_daily(){
        $myModel=$this->model("userModel");
        $this->view2("account/ledger_report_daily",$myModel);
    }
    public function ledger_report_monthly(){
        $myModel=$this->model("userModel");
        $this->view2("account/ledger_report_monthly",$myModel);
    }
    public function income_expense_report(){
        $myModel=$this->model("userModel");
        $this->view2("account/income_expense_report",$myModel);
    }
    public function advance_salary(){
        $myModel=$this->model("userModel");
        $this->view2("account/advance_salary",$myModel);
    }
    public function reset_month(){
        $myModel=$this->model("userModel");
        $this->view2("account/reset_month",$myModel);
    }
    public function dues_details(){
        $myModel=$this->model("userModel");
        $this->view2("account/dues_details",$myModel);
    }
    public function fees_structure(){
        $myModel=$this->model("userModel");
        $this->view2("account/fees_structure",$myModel);
    }
    public function set_fee(){
        $myModel=$this->model("userModel");
        $this->view2("account/set_fee",$myModel);
    }
    public function classwise_fee(){
        $myModel=$this->model("userModel");
        $this->view2("account/classwise_fee",$myModel);
    }
    public function transport_fee(){
        $myModel=$this->model("userModel");
        $this->view2("account/transport_fee",$myModel);
    }
    public function previous_dues(){
        $myModel=$this->model("userModel");
        $this->view2("account/previous_dues",$myModel);
    }
    public function pay_fee(){
        $myModel=$this->model("userModel");
        $this->view2("account/pay_fee",$myModel);
    }
    public function fee_details(){
        $myModel=$this->model("userModel");
        $this->view2("account/fee_details",$myModel);
    }
    public function fee_details_rfid(){
        $myModel=$this->model("userModel");
        $this->view2("account/fee_details_rfid",$myModel);
    }
    public function dues_list_sms(){
        $myModel=$this->model("userModel");
        $this->view2("account/dues_list_sms",$myModel);
    }
    public function demand_bill(){
        $myModel=$this->model("userModel");
        $this->view2("account/demand_bill",$myModel);
    }
    public function balance_details(){
        $myModel=$this->model("userModel");
        $this->view2("account/balance_details",$myModel);
    }
    public function balance_details_from_to(){
        $myModel=$this->model("userModel");
        $this->view2("account/balance_details_from_to",$myModel);
    }
    public function only_balance_report(){
        $myModel=$this->model("userModel");
        $this->view2("account/only_balance_report",$myModel);
    }
    public function penalty_form(){
        $myModel=$this->model("userModel");
        $this->view2("account/penalty_form",$myModel);
    }
    public function penalty_list(){
        $myModel=$this->model("userModel");
        $this->view2("account/penalty_list",$myModel);
    }
    public function save_bank(){
        if(!isset($_POST["opning_balance"])){$this->redirect("account/add_bank");}
        if($this->input('opning_balance')==""){$balce="0.00";}else{$balce=$this->input('opning_balance');}
        $userData=[
            'holder_name'                 =>$this->input('holder_name'),
            'account_number'              =>$this->input('account_number'),
            'bank_name'                   =>$this->input('bank_name'),
            'opning_balance'              =>$balce,
            'branch_name'                 =>$this->input('branch_name'),
            'ifsc_code'                   =>$this->input('ifsc_code'),
            'holder_name_error'           =>'',
            'account_number_error'        =>'',
            'bank_name_error'             =>''
        ];
        if(empty($userData['holder_name'])){
            $userData['holder_name_error']="Student Name is required";
        }
        if(empty($userData['account_number'])){
            $userData['account_number_error']="Student Name is required";
        }
        if(empty($userData['bank_name'])){
            $userData['bank_name_error']="Student Name is required";
        }
        $myModel=$this->model("userModel");
        if(empty($userData['holder_name_error']) && empty($userData['account_number_error']) && empty($userData['bank_name_error'])){
            $data=[$this->getSession('userid'),$userData['holder_name'],$userData['account_number'],$userData['bank_name'],$userData['opning_balance'],$userData['opning_balance'],$userData['branch_name'],$userData['ifsc_code']];
            $myData= $myModel->save_collage_account($data);
            if($myData){
                $this->setFlash("msgsuc","You have succesfully registerd!");
                $this->redirect("account/add_bank");
            }
            else{
                $this->setFlash("msg","Somthing worng!".$myData);
                $this->redirect("account/add_bank");
            }
        }
        else{
            $this->setFlash("msg","Please fill all requerd field!");
            $this->view2("account/add_bank",$myModel,$userData);
        }
    }
    public function delete_bank(){
        $myModel=$this->model("userModel");
        $myData=$myModel->delete_collage_bank([$this->input('id')]);
        if($myData){
            $this->view2("ajax/allsubjects",$myModel,['wid'=>"18"]);
        }
        else{echo "Error";}
    }
    public function update_bank(){
        $myModel=$this->model("userModel");
        $myData=$myModel->update_collage_bank([$this->input('id')]);
        if($myData){
            $this->view2("ajax/allsubjects",$myModel,['wid'=>"18"]);
        }
        else{echo "Error";}
    }
   
    public function save_penality(){
        $myModel=$this->model("userModel");
        $prtn_id=explode(',', $this->input('studntnme'))[0];
        $prtn_name=explode(',', $this->input('studntnme'))[2];
        $address=explode(',', $this->input('studntnme'))[4];
        $contact=explode(',', $this->input('studntnme'))[5];
        $usrid=explode(',', $this->input('studntnme'))[6];
        $amnt=$this->input('amnt');

        $data=[$this->getSession('userid'),$prtn_id,"Student",$prtn_name,"","Penality",$address,$contact,$amnt,"12/07/2020","Penality","","","",$this->input('reasen'),"","Initiate"];
        $myData=$myModel->save_transaction($data);
        $myModel->update_balence("student_fee","other_fee",$amnt,$usrid);
        if($myData){
            echo "Succesfull";
        }
        else{
            echo "Failed ".$usrid;
        }
    }
    
   

    public function save_report_type(){
        $myModel=$this->model("userModel");
        echo $this->view2("ajax/allsubjects",$myModel,['wid'=>"28",'all'=>"pay_date"]);
    }


}
?>