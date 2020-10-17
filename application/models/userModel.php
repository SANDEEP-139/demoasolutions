<?php
//durvijaykumar03   Jaihindkumar1@
class userModel extends database{
    public function login($userid,$password){
        if($this->query("select * from collages where email=? and password=?",[$userid,$password])){
            return $this->fetch();
        }else{return false;}
    }
    public function dashboard($data){
        if($this->query("select count(id) as tostud,(select count(id) from teachers where collage_id=? and status='Active') as totchr,(select sum(amount) from transaction where collage_id=? and payment_type='Credit') as toamnt,(select sms from collage_sms where collage_id=?)leftsms from students where collage_id=? and status='Active'",$data)){
            return $this->fetch();
        }else{return false;}
    }
    public function atendence($data){
        if($this->query("select count(id) as tostud from students where collage_id=? and status='Active'",$data)){
            return $this->fetch();
        }else{return false;}
    }
    public function select_class($collegid){
        if($this->query("select * from collage_class where collage_id=? and cl_id is null",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_section($data){
        if($this->query("select * from collage_class where collage_id=? and cl_id=? order by id asc",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_active_class($collegid){
        if($this->query("select * from collage_class where status='Active' and collage_id=? and cl_id is null",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_exam_type($collegid,$classid){
        if($this->query("select * from exam_type where collage_id=? and class_id=?",[$collegid,$classid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_stream($collegid){
        if($this->query("select * from stream where collage_id=?",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_collage_all_subject($collegid){
        if($this->query("select * from collage_subjects where collage_id=? order by category asc",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_collage_subject($collegid,$type){
        if($this->query("select * from collage_subjects where collage_id=? and category=?",[$collegid,$type])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_collage_wise_subject($collegid,$type,$classid){
        if($this->query("select * from collage_subjects as t1 where collage_id=? and category=? and (select count(id) from class_wise_subjects where collage_id=? and class_id=? and subject_id=t1.id)=0",[$collegid,$type,$collegid,$classid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_collage_fee_type($collegid){
        if($this->query("select * from collage_fee_type where collage_id=?",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_college_fee_discount_type($collegid){
        if($this->query("select * from college_fee_discount_type where collage_id=?",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_collage_fee_category($collegid){
        if($this->query("select * from collage_fee_category where collage_id=?",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_collage_period($collegid){
        if($this->query("select * from collage_period where collage_id=?",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function save_employee_data($data){
        if($this->query("INSERT INTO teachers(collage_id,employee_name, gender, date_of_birth, father_name, email, sms_contact, contact_no, address, city, pin, state, country, employee_qualification, blood_group, emp_id_prefix, employee_photo, experience_letter, qualification_proof, id_proof, other_document1, other_document2, date_of_joining, rfid_no, categories, teaching_class_preferred, teaching_subject_preferred, designation, pan_card, aadhar_no, bank_name, bank_account_no, bank_ifsc, salary, other_wages, pf_no, pf_amount_monthly, tds_amount_monthly, esci_amount_monthly, professional_tax_amount_monthly, hra_amount_monthly, da_amount_monthly, allowances_monthly, remark, casual_eave, earn_leave, sick_leave, other_leave,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function check_employee($sms_contact,$contact_no){
        if($this->query("select * from teachers where sms_contact=? or contact_no=?",[$sms_contact,$contact_no])){
            return true;
        }else{return false;}
    }
    public function select_employee($collage_id,$status){
        if($this->query("select * from teachers where collage_id=? and status=? ORDER BY id DESC",[$collage_id,$status])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_tim_class($collegid){
        if($this->query("select id,name,classteacherid,(select count(id) from collage_class where cl_id=t1.id)as sec from collage_class as t1 where status='Active' and collage_id=? and cl_id is null",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_class_section($classid){
        if($this->query("select * from collage_class where cl_id=? order by id asc",[$classid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_table_cource($collegid,$course,$timing){
        if($this->query("select * from timetable where collage_id=? and course=? and timing=?",[$collegid,$course,$timing])){
            return $this->fetch();
        }else{return false;}
    }
    public function select_course_subject($collegid,$type){
        if($this->query("select * from class_wise_subjects where collage_id=? and class_id=?",[$collegid,$type])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_course_teacher($collegid,$type){
        if($this->query("select id,employee_name from teachers where collage_id=? and teaching_class_preferred like '%".$type."%'",[$collegid])){
            return $this->fetchall();
        }else{return false;}
    }
    public function save_timetable($data){
        if($this->query("INSERT INTO timetable(mo_teacherid, mo_lectureid, mo_teacher, mo_lecture, tu_teacherid, tu_lectureid, tu_teacher, tu_lecture, we_teacherid, we_lectureid, we_teacher, we_lecture, th_teacherid, th_lectureid, th_teacher, th_lecture, fr_teacherid, fr_lectureid, fr_teacher, fr_lecture, st_teacherid, st_lectureid, st_teacher, st_lecture,collage_id,course, timing) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function update_timetable($data){
        if($this->query("update timetable set mo_teacherid=?, mo_lectureid=?, mo_teacher=?, mo_lecture=?, tu_teacherid=?, tu_lectureid=?, tu_teacher=?, tu_lecture=?, we_teacherid=?, we_lectureid=?, we_teacher=?, we_lecture=?, th_teacherid=?, th_lectureid=?, th_teacher=?, th_lecture=?, fr_teacherid=?, fr_lectureid=?, fr_teacher=?, fr_lecture=?, st_teacherid=?, st_lectureid=?, st_teacher=?, st_lecture=? where collage_id=? and course=? and timing=?",$data)){
            return true;
        }else{return false;}
    }
    public function update_classteacher($data){
        if($this->query("update collage_class set classteacherid=?, classteachername=? where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function asign_subjects($data){
        if($this->query("INSERT INTO class_wise_subjects (collage_id,class_id,subject_id,subject_name_eng,subject_name_hnd,category) VALUES (?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function delete_subjects($data){
        if($this->query("delete from class_wise_subjects where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function update_section($data){
        if($this->query("update collage_class set section=?, status=? where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function add_section($data){
        if($this->query("INSERT INTO collage_class (collage_id,name,status,cl_id) VALUES (?,?,'Active',?)",$data)){
            return true;
        }else{return false;}
    }
    public function delete_section($data){
        if($this->query("delete from collage_class where collage_id=? and cl_id=? order by id desc limit 1",$data)){
            return true;
        }else{return false;}
    }
    public function add_subjects($data){
        if($this->query("INSERT INTO collage_subjects (collage_id,subject_name_eng,subject_name_hnd,category) VALUES (?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function update_subjects($data){
        if($this->query("update collage_subjects set subject_name_eng=?,subject_name_hnd=? where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function delete_collage_subjects($data){
        if($this->query("delete from collage_subjects where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function add_class_period($data){
        if($this->query("INSERT INTO collage_period (collage_id,priod_name,start_time,end_time,sequence) VALUES (?,?,?,?,'1')",$data)){
            return true;
        }else{return false;}
    }
    public function update_class_period($data){
        if($this->query("update collage_period set priod_name=?,start_time=?,end_time=? where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function delete_class_period($data){
        if($this->query("delete from collage_period where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function select_teacher_not_subject($data,$in){
        if(!empty($in)){$in="and id NOT IN (".$in.")";}
        if($this->query("select * from collage_subjects where collage_id=? ".$in,[$data])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_teacher_subjects($data,$in){
        if($this->query("select * from collage_subjects where collage_id=? and id IN (".$in.")",[$data])){
            return $this->fetchall();
        }else{return false;}
    }
    public function update_tchr_data($data){
        if($this->query("update teachers set teaching_subject_preferred=? where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function select_teacher_class($data,$in){
        if($this->query("select * from collage_class where collage_id=? and id IN (".$in.") and cl_id is null",[$data])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_teacher_not_class($data,$in){
        if(!empty($in)){$in="and id NOT IN (".$in.")";}
        if($this->query("select * from collage_class where collage_id=? and cl_id is null".$in,[$data])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_teacher_assind_class($data,$in){
        if($this->query("select * from collage_class where collage_id=? and id IN (".$in.") and cl_id is null",[$data])){
            return $this->fetchall();
        }else{return false;}
    }
    public function update_tchr_class_data($data){
        if($this->query("update teachers set teaching_class_preferred=? where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function select_teacher($data){
        if($this->query("select * from teachers where collage_id=?",[$data])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_teacher_tbl_subject($slfld,$flfld,$tcrid,$timing){
        if($this->query("select ".$slfld."_lectureid,".$slfld."_lecture,course,(select name from collage_class where id=timetable.course)as clasname from timetable where ".$flfld."=? and timing=?",[$tcrid,$timing])){
            return $this->fetch();
        }else{return false;}
    }
    
    public function select_day_wise_subject($slfld,$timing,$course){
        if($this->query("select ".$slfld."_teacher,".$slfld."_lecture from timetable where timing=? and course=?",[$timing,$course])){
            return $this->fetch();
        }else{return false;}
    }
    public function check_student($class,$student_name,$father_contact1){
        if($this->query("select * from students where class=? and student_name=? and fathers_name=?",[$class,$student_name,$father_contact1])){
            return true;
        }else{return false;}
    }
    public function save_student_data($data){
        if($this->query("INSERT INTO students(collage_id,userid,password, class, student_name, fathers_name, mothers_name, father_contact1, father_contact2, date_of_birth, gender, date_of_admition, admition_type, admition_scheme, fee_category, bus, hostel, library, sms_contact_no, student_address, village_city, block, district, state, pincode, landmark, student_photo, father_photo, mother_photo, remark1, remark2, remark3, remark4, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function select_students($collage,$status){
        if($this->query("select *,(select name from collage_class where id=students.class) as clsname from students where collage_id=? and status=? order by id desc",[$collage,$status])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_students_fee($collage,$status){
        if($this->query("select id,userid,fathers_name,student_address,sms_contact_no,student_name,(select name from collage_class where id=students.class) as clsname,(select concat((annual_fee+exam_fee+sports_fee+event_fee+other_fee+July+August+September+October+November+December+January+February+March+April+May+June),',',hostel_fee,',',buss_fee) from student_fee where student_id=students.userid) as fees from students where collage_id=? and status=? order by id desc",[$collage,$status])){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_class_students_fee($collage,$status,$class){
        if($this->query("select id,fathers_name,student_address,sms_contact_no,student_name,(select name from collage_class where id=students.class) as clsname,(select concat((annual_fee+exam_fee+sports_fee+event_fee+other_fee+July+August+September+October+November+December+January+February+March+April+May+June),',',hostel_fee,',',buss_fee) from student_fee where student_id=students.userid) as fees from students where collage_id=? and status=? and class=? order by id desc",[$collage,$status,$class])){
            return $this->fetchall();
        }else{return false;}
    }
    
    public function select_class_students($collage,$status,$class){
        if($this->query("select *,(select name from collage_class where id=students.class) as clsname from students where collage_id=? and status=? and class=? order by id desc",[$collage,$status,$class])){
            return $this->fetchall();
        }else{return false;}
    }
    public function check_enquiry($collage_id,$student_name,$fathers_name){
        if($this->query("select * from enquiry where collage_id=? and student_name=? and fathers_name=?",[$collage_id,$student_name,$fathers_name])){
            return true;
        }else{return false;}
    }
    public function save_enquiry_data($data){
        if($this->query("INSERT INTO enquiry(collage_id, enquirytype, date, student_name, fathers_name, father_contact1, father_contact2, nextfollow, remark1, remark2, status) VALUES (?,?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function select_enquiry($data){
        if($this->query("select * from enquiry where collage_id=? and status=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function count_students_attendance($data){
        if($this->query("select count(id) as num,(select count(id) from attendance where student_id=? and type='L' and STR_TO_DATE(CONCAT(YEAR(at_date),'-',MONTH(at_date)),'%Y-%m')=?) as lev from attendance where student_id=? and type='P' and  STR_TO_DATE(CONCAT(YEAR(at_date),'-',MONTH(at_date)),'%Y-%m')=?",$data)){
            return $this->fetch();
        }else{return false;}
    }
    public function today_attendance_status($data){
        if($this->query("select type from attendance where student_id=? and subject_id=? and at_date=?",$data)){
            return $this->fetch();
        }else{return false;}
    }
    public function today_students_attendance($data){
        if($this->query("select top(1) type as num from attendance where student_id=?  and  STR_TO_DATE(CONCAT(YEAR(at_date),'-',MONTH(at_date),'-',DAY(at_date)),'%Y-%m-%d')=?",$data)){
            return $this->fetch();
        }else{return false;}
    }    
    public function select_complaints($data){
        if($this->query("select * from complaints where collage_id=? and type=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_collage_account($data){
        if($this->query("select * from collage_account where collage_id=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_datewise_transaction($data){
        if($this->query("select * from transaction where collage_id=? and pay_date=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_transaction($data){
        if($this->query("select * from transaction where collage_id=? and payment_type!='Initiate'",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_transaction_type($data){
        if($this->query("select * from transaction where collage_id=? and payment_type=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_datewise_report($data){
        if($this->query("select * from transaction where collage_id=? and pay_date=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_dailyreport($data){
        if($this->query("select * from transaction where collage_id=? and payment_type!='Initiate'",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_report_type($data){
        if($this->query("select * from transaction where collage_id=? and payment_type=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function collage_fee($data){
        if($this->query("select * from collage_fee where collage_id=? and classid=?",$data)){
            return $this->fetch();
        }else{return false;}
    }
    public function save_student_fee($data){
        if($this->query("INSERT INTO student_fee(student_id,annual_fee,exam_fee, sports_fee, event_fee, buss_fee, hostel_fee, other_fee, July, August, September, October, November, December, January, February, March, April, May, June) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function save_collage_account($data){
        if($this->query("INSERT INTO collage_account(collage_id,holder_name,account_number,bank_name, opning_balance, current_balance, branch_name, ifsc_code) VALUES (?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function delete_collage_bank($data){
        if($this->query("delete from collage_account where id=?",$data)){
            return true;
        }else{return false;}
    }
    public function update_collage_bank($data){
        if($this->query("update  collage_account SET $holder_name='holder_name', where id=?",$data))
        {
            return true;
        }else{return false;}
    }
    public function save_transaction($data){
        if($this->query("INSERT INTO transaction(collage_id, pertion_id, pertion_type, pertion_name, office_account, payment_for, address, contact, amount, pay_date, payment_mode, bank_name, account_number, check_number, remark, bill_imge,payment_type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function update_balence($table,$field,$value,$studid){
        if($this->query("update ".$table." set ".$field."=".$field."+".$value." where student_id=?",[$studid])){
            return true;
        }else{return false;}
    }
    public function save_class_work($data){
        if($this->query("INSERT INTO home_work(collage_id, class_id, subject_id, class_name, subject_name, date, remark, images, description, type, updated_by) VALUES (?,?,?,?,?,?,?,?,?,?,?)",$data)){
            return true;
        }else{return false;}
    }
    public function select_all_class_work($data){
        if($this->query("select * from home_work where type=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
    public function select_class_work($data){
        if($this->query("select * from home_work where class_id=? and subject_id=? and type=?",$data)){
            return $this->fetchall();
        }else{return false;}
    }
}

?>