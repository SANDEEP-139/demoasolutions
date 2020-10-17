<?php 
if($viewdata['section']=="No"){$class_secion=$viewdata['id'];}
else{$class_secion=$viewdata['section'];}
 ?>
<div class="card height-auto">
            <div class="artmhead arradius">
            <div class="float-left">
               Time Table for <?php echo $viewdata['clases'] ?>
            </div>
              <div class="float-right">
                <i onclick="closed()" class="fas fa-times-circle text-white"></i>
              </div>
            </div>
            <form id="form1" action="<?php echo BASEURL ?>/timetable/save_timetable" method="POST">
                <div class="artmbody">
                    <!-- <div class="artmchldhead arradius">
                        LKG
                    </div> -->
                    
                    <input type="hidden" name="classid" value="<?php echo $class_secion; ?>"/>
                    <table class="table display data-table armg10">
                        <thead>
                            <tr>
                                <th>Class Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $Data= $myModel->select_collage_period($this->getSession('userid'));
                                $course= $myModel->select_course_subject($this->getSession('userid'),$viewdata['id']);
                                $teacher= $myModel->select_course_teacher($this->getSession('userid'),$viewdata['id']);
                                $num=0;$upd=0;$select="";
                                foreach($Data as $timing):
                                    if($timing->priod_name=="Drink Break" || $timing->priod_name=="Lunch Break"){
                                        echo '<tr><td colspan="7" class="arbreack text-center">'. $timing->priod_name .'</td></tr>';
                                    }
                                    else{
                                        $num++;
                                        $pretimetable= $myModel->select_table_cource($this->getSession('userid'),$class_secion,$timing->id);
                                        if(!empty($pretimetable)){$upd=1;}else{$upd=0;}
                            ?>
                            <tr>
                                <td class="align-middle"><?php echo $timing->start_time; ?>
                                <input type="hidden" name="<?php echo 'timing'.$num ?>" value="<?php echo $timing->id; ?>"/>
                                <input type="hidden" name="<?php echo 'update'.$num ?>" value="<?php echo $upd; ?>"/>
                                </td>
                                <td>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'mon'.$num ?>" name="<?php echo 'mon'.$num ?>">
                                            <?php 
                                            foreach($course as $subject):
                                                if($upd==1){if($pretimetable->mo_lectureid==$subject->id){ $select='selected';}else{$select="";}}
                                                if($subject->category=="Practical"){$cat=" (P)";}else{$cat="";}
                                                echo '<option value="'.$subject->id.','.$subject->subject_name_eng.$cat.'" '.$select.' >'.$subject->subject_name_eng.$cat .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'tmon'.$num ?>" name="<?php echo 'tmon'.$num ?>">
                                            <?php 
                                            foreach($teacher as $teacheres):
                                                if($upd==1){if($pretimetable->mo_teacherid==$teacheres->id){ $select='selected';}else{$select="";}}
                                                echo '<option value="'.$teacheres->id.','.$teacheres->employee_name.'" '.$select.'>'.$teacheres->employee_name .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </td> 
                                <td>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'tus'.$num ?>" name="<?php echo 'tus'.$num ?>">
                                            <?php 
                                            foreach($course as $subject):
                                                if($upd==1){if($pretimetable->tu_lectureid==$subject->id){ $select='selected';}else{$select="";}}
                                                if($subject->category=="Practical"){$cat=" (P)";}else{$cat="";}
                                                echo '<option value="'.$subject->id.','.$subject->subject_name_eng.$cat.'" '.$select.'>'.$subject->subject_name_eng.$cat .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'ttus'.$num ?>" name="<?php echo 'ttus'.$num ?>">
                                            <?php 
                                            foreach($teacher as $teacheres):
                                                if($upd==1){if($pretimetable->tu_teacherid==$teacheres->id){ $select='selected';}else{$select="";}}
                                                echo '<option value="'.$teacheres->id.','.$teacheres->employee_name.'" '.$select.'>'.$teacheres->employee_name .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </td> 
                                <td>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'wed'.$num ?>" name="<?php echo 'wed'.$num ?>">
                                            <?php 
                                            foreach($course as $subject):
                                                if($upd==1){if($pretimetable->we_lectureid==$subject->id){ $select='selected';}else{$select="";}}
                                                if($subject->category=="Practical"){$cat=" (P)";}else{$cat="";}
                                                echo '<option value="'.$subject->id.','.$subject->subject_name_eng.$cat.'" '.$select.'>'.$subject->subject_name_eng.$cat .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'twed'.$num ?>" name="<?php echo 'twed'.$num ?>">
                                            <?php 
                                            foreach($teacher as $teacheres):
                                                if($upd==1){if($pretimetable->we_teacherid==$teacheres->id){ $select='selected';}else{$select="";}}
                                                echo '<option value="'.$teacheres->id.','.$teacheres->employee_name.'" '.$select.'>'.$teacheres->employee_name .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </td> 
                                <td>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'thu'.$num ?>" name="<?php echo 'thu'.$num ?>">
                                            <?php 
                                            foreach($course as $subject):
                                                if($upd==1){if($pretimetable->th_lectureid==$subject->id){ $select='selected';}else{$select="";}}
                                                if($subject->category=="Practical"){$cat=" (P)";}else{$cat="";}
                                                echo '<option value="'.$subject->id.','.$subject->subject_name_eng.$cat.'" '.$select.'>'.$subject->subject_name_eng.$cat .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'tthu'.$num ?>" name="<?php echo 'tthu'.$num ?>">
                                            <?php 
                                            foreach($teacher as $teacheres):
                                                if($upd==1){if($pretimetable->th_teacherid==$teacheres->id){ $select='selected';}else{$select="";}}
                                                echo '<option value="'.$teacheres->id.','.$teacheres->employee_name.'" '.$select.'>'.$teacheres->employee_name .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </td> 
                                <td>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'fri'.$num ?>" name="<?php echo 'fri'.$num ?>">
                                            <?php 
                                            foreach($course as $subject):
                                                if($upd==1){if($pretimetable->fr_lectureid==$subject->id){ $select='selected';}else{$select="";}}
                                                if($subject->category=="Practical"){$cat=" (P)";}else{$cat="";}
                                                echo '<option value="'.$subject->id.','.$subject->subject_name_eng.$cat.'" '.$select.'>'.$subject->subject_name_eng.$cat .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'tfri'.$num ?>" name="<?php echo 'tfri'.$num ?>">
                                            <?php 
                                            foreach($teacher as $teacheres):
                                                if($upd==1){if($pretimetable->fr_teacherid==$teacheres->id){ $select='selected';}else{$select="";}}
                                                echo '<option value="'.$teacheres->id.','.$teacheres->employee_name.'" '.$select.'>'.$teacheres->employee_name .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </td> 
                                <td>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'sut'.$num ?>" name="<?php echo 'sut'.$num ?>">
                                            <?php 
                                            foreach($course as $subject):
                                                if($upd==1){if($pretimetable->st_lectureid==$subject->id){ $select='selected';}else{$select="";}}
                                                if($subject->category=="Practical"){$cat=" (P)";}else{$cat="";}
                                                echo '<option value="'.$subject->id.','.$subject->subject_name_eng.$cat.'" '.$select.'>'.$subject->subject_name_eng.$cat .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="arwith">
                                        <select class="arselect" id="<?php echo 'tsut'.$num ?>" name="<?php echo 'tsut'.$num ?>">
                                            <?php 
                                            foreach($teacher as $teacheres):
                                                if($upd==1){if($pretimetable->st_teacherid==$teacheres->id){ $select='selected';}else{$select="";}}
                                                echo '<option value="'.$teacheres->id.','.$teacheres->employee_name.'" '.$select.'>'.$teacheres->employee_name .'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </td>                 
                            </tr>
                            <?php
                                }
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <div class="artblclstcr">
                        <div class="clstcr1">
                            Class Teacher
                        </div>
                        <div class="clstcr2">
                            <select class="arselect arselectdeco" id="classteacher" name="classteacher">
                                <option value="0">Select Class Teacher</option>
                                <?php 
                                foreach($teacher as $teacheres):
                                    if($viewdata['clstcrid']==$teacheres->id){ $select='selected';}else{ $select='';}
                                    echo '<option value="'.$viewdata['clstcrid'].','.$teacheres->id.','.$teacheres->employee_name.'" '.$select.'>'.$teacheres->employee_name .'</option>';
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="clstcr3">
                            <button type="button" onclick="save_timtable()" class="btn-fill-lmd radius-4 text-light bg-light-sea-green">Save </button>
                        </div>
                        <div class="clstcr4"></div>
                    </div>
                    <div class="arclear"></div>
                </div>
            </form>
    </div>

<script>
function closed(){
    $("#showdata").hide();
    if($(".clstcr4").html()=="Succesfully Save Time Table"){
        $.ajax({
            url: "<?php echo BASEURL.'/timetable/refress/' ?>", 
            beforeSend:function(){
                $("#loadingProgressG").show();
            },
            success: function(result){
                $("#timbody").html(result);
                $("#loadingProgressG").hide();
            }
        });
    }
}
<?php 
for($i=1;$i<=$num ;$i++){
?>
    $("<?php echo '#mon'.$i; ?>").change(function() {
        $("<?php echo '#tus'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#wed'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#thu'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#fri'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#sut'.$i; ?>").val($(this).val()).change();
    });
    $("<?php echo '#tmon'.$i; ?>").change(function() {
        $("<?php echo '#ttus'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#twed'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#tthu'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#tfri'.$i; ?>").val($(this).val()).change();
        $("<?php echo '#tsut'.$i; ?>").val($(this).val()).change();
    });
<?php
}
?>
function save_timtable(){
    var $datadf=$("#classteacher").val();
    if($datadf=="0"){
        $(".clstcr4").html("Please Select class Teacher");
    }
    else{
       var form= $("#form1");
       $.ajax({
            url: "<?php echo BASEURL.'/timetable/save_timetable/'.$num  ?>", 
            type: "POST",
            beforeSend:function(){
                $("#loadingProgressG").show();
            },
            data: $("#form1").serialize(),
            success: function(result){
                $(".clstcr4").html(result);
                $("#loadingProgressG").hide();
            }
        });
    }
}
</script>