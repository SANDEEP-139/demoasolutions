<?php

class appdata extends database{
    public function login($contact){
        if($this->query("select *,('Teacher') as lgtype from teachers where sms_contact=?",$contact)){
            return $this->fetch(PDO::FETCH_ASSOC);
        }else{
            if($this->query("select *,('Student') as lgtype from students where sms_contact_no=?",$contact)){
                return $this->fetch();
            }else{return false;}
        }
    }
    public function app_class_students($data){
        if($this->query("select id,student_name,IFNULL((select type from attendance where collage_id=? and class_id=? and teacher_id=? and subject_id=? and current_lecture=? and at_date=? and student_id=students.id),'0') as status from students where collage_id=? and status=? and class=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_class_attendence($data){
        if($this->query("select id from attendance where collage_id=? and class_id=? and teacher_id=? and subject_id=? and current_lecture=? and at_date=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function delete_class_attendence($data){
        if($this->query("delete from attendance where collage_id=? and class_id=? and teacher_id=? and subject_id=? and current_lecture=? and at_date=?",$data)){
            return true;
        }else{return false;}
    }
    public function save_attendence($data){
        if($this->query("INSERT INTO attendance(collage_id, class_id, section_id, teacher_id, subject_id,current_lecture , student_id, at_date, at_time, type) VALUES (?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }

}
?>