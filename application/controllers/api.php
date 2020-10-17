<?php
class api extends framework{

    public function index(){
        if (!empty($_POST)){
            $myModel=$this->model("appdata");
            $myData= $myModel->login([$this->input('contact')]);
            if($myData){
                echo json_encode($myData);
            }
            else{
                echo '{"lgtype":"Fail"}';
            }
        }
        else{echo 'Invailed Data';}
    }
    public function timetable(){
        if (!empty($_POST)){
            $myModel=$this->model("userModel");
            $tchr=$_POST["tchr"];
            $collage=$_POST["collage"];
            $Data= $myModel->select_collage_period($collage);
            $employee_data = array();
            foreach($Data as $timing):
                $monday=$tusday=$wedday=$thsday=$friday=$satday="Break";
                if($timing->priod_name!="Drink Break" && $timing->priod_name!="Lunch Break"){
                    $cource= $myModel->select_teacher_tbl_subject("mo","mo_teacherid",$tchr,$timing->id);
                    if(!empty($cource->clasname)){$monday= $cource->clasname.",".$cource->course.",".$cource->mo_lecture.",".$cource->mo_lectureid;}else{$monday="---";}
                    
                    $cource= $myModel->select_teacher_tbl_subject("tu","tu_teacherid",$tchr,$timing->id);
                    if(!empty($cource->clasname)){$tusday= $cource->clasname.",".$cource->course.",".$cource->tu_lecture.",".$cource->tu_lectureid;}else{$tusday="---";}

                    $cource= $myModel->select_teacher_tbl_subject("we","we_teacherid",$tchr,$timing->id);
                    if(!empty($cource->clasname)){$wedday= $cource->clasname.",".$cource->course.",".$cource->we_lecture.",".$cource->we_lectureid;}else{$wedday="---";}

                    $cource= $myModel->select_teacher_tbl_subject("th","th_teacherid",$tchr,$timing->id);
                    if(!empty($cource->clasname)){$thsday= $cource->clasname.",".$cource->course.",".$cource->th_lecture.",".$cource->th_lectureid;}else{$thsday="---";}

                    $cource= $myModel->select_teacher_tbl_subject("fr","fr_teacherid",$tchr,$timing->id);
                    if(!empty($cource->clasname)){$friday= $cource->clasname.",".$cource->course.",".$cource->fr_lecture.",".$cource->fr_lectureid;}else{$friday="---";}

                    $cource= $myModel->select_teacher_tbl_subject("st","st_teacherid",$tchr,$timing->id);
                    if(!empty($cource->clasname)){$satday= $cource->clasname.",".$cource->course.",".$cource->st_lecture.",".$cource->st_lectureid;}else{$satday="---";}
                }else{$monday=$timing->priod_name;}

                $employee_data[] = array(  
                    'class_time'      =>     $timing->id.','.$timing->start_time.','.$timing->end_time, 
                    'monday'          =>     $monday,  
                    'tuesday'         =>     $tusday,  
                    'wednesday'       =>     $wedday,  
                    'thursday'        =>     $thsday,  
                    'friday'          =>     $friday,  
                    'saturday'        =>     $satday 
            );  
            endforeach;
            echo json_encode($employee_data);
        }
        else{echo 'Invalid Data';}
    }
    public function students(){
        if (!empty($_POST)){
            $myModel=$this->model("appdata");
            $myData= $myModel->app_class_students([$this->input('collage'),$this->input('classid'),$this->input('teacher_id'),$this->input('subject_id'),$this->input('current_lecture'),date('yy-m-d'),$this->input('collage'),"Active",$this->input('classid')]);
            if($myData){
                echo json_encode($myData);
            }
            else{
                echo '[]';
            }
        }
        else{echo 'Invailed Data';}
    }
    public function saveattendence(){
        if (!empty($_POST)){
            $myModel=$this->model("appdata");
            $collage_id=$this->input('collage');
            $class_id=$this->input('class_id');
            $section_id=$this->input('section_id');
            $teacher_id=$this->input('teacher_id');
            $arrydata=$this->input('data');
            $subject_id=$this->input('subject_id');
            $current_lecture=$this->input('current_lecture');
            $myaten= $myModel->select_class_attendence([$collage_id,$class_id,$teacher_id,$subject_id,$current_lecture,date('yy-m-d')]);
            if($myaten){
                $myModel->delete_class_attendence([$collage_id,$class_id,$teacher_id,$subject_id,$current_lecture,date('yy-m-d')]);
            }
            
            $getdata = json_decode( $arrydata, true );
            foreach($getdata as $key => $item) {
                $data=[$collage_id, $class_id, $section_id, $teacher_id, $subject_id,$current_lecture, $item['student_id'], date('yy-m-d'), date('h:i:s A'),  $item['type']];
                $myData=$myModel->save_attendence($data);
            }
            if($myData){echo 'Successfully Submitted';}
            else{echo 'Fail';}
        }
        else{echo 'Invailed Data';}
    }
}
?>