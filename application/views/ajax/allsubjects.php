
<?php
if($viewdata["wid"]=="1"){
    $i=0;
    $data= $myModel->select_collage_wise_subject($this->getSession('userid'),$viewdata["category"],$viewdata["classid"]);
    foreach($data as $user):
        $i++;
    ?>
    <tr>
        <td class="align-middle"><?php echo $i;?></td>
        <td class="align-middle"><?php echo $user->subject_name_eng; ?></td>
        <td class="align-middle"><?php echo $user->subject_name_hnd; ?></td>
        <td class="align-middle text-center">
        <i onclick="adddubject('<?php echo $user->id; ?>','<?php echo $user->subject_name_eng; ?>','<?php echo $user->subject_name_hnd; ?>')" class="fas fa-plus-circle text-green"></i>
        </td>
    </tr>
    <?php
    endforeach;
}
if($viewdata["wid"]=="2"){
    $i=0;
    $data= $myModel->select_course_subject($this->getSession('userid'),$viewdata["category"]);
    foreach($data as $user):
        $i++;
    ?>
    <tr>
        <td class="align-middle"><?php echo $i;?></td>
        <td class="align-middle"><?php echo $user->subject_name_eng;if($user->category=="Practical"){echo " (P)";}else if($user->category=="Other"){echo " (O)";} ?></td>
        <td class="align-middle"><?php echo $user->subject_name_hnd; ?></td>
        <td class="align-middle text-center">
        <i onclick="deletesubject(<?php echo $user->id; ?>)" class="fas fa-times-circle text-orange-red"></i>
        </td>
    </tr>
    <?php
    endforeach;
}
if($viewdata["wid"]=="3"){
    $cnt=0;
    $mySection= $myModel->select_section([$this->getSession('userid'),$viewdata["classid"]]);
    if(!empty($mySection)){
    foreach($mySection as $section):
        $cnt++;
        echo '<div class="arsection">'.$section->name.'</div>';
    endforeach;
    }
    else{echo "No any section";}
    ?>
    
    <input type="hidden" id="<?php echo 'datacnt'.$viewdata["pos"]?>" value="<?php echo ++$cnt ?>"/>
    <?php
}
if($viewdata["wid"]=="4"){
    $i=0;
    $data= $myModel->select_collage_subject($this->getSession('userid'),$viewdata["category"]);
    foreach($data as $user):
        $i++;
    ?>
    <tr>
        <td class="align-middle"><?php echo $i;?></td>
        <td class="align-middle"><?php echo $user->subject_name_eng; ?></td>
        <td class="align-middle"><?php echo $user->subject_name_hnd; ?></td>
        <td class="align-middle text-center">
        <i onclick="update('<?php echo $user->category ?>','<?php echo $user->id ?>','<?php echo $user->subject_name_eng ?>','<?php echo $user->subject_name_hnd ?>')" class="fas fa-edit text-light-sea-green"></i>
        <i onclick="if(confirm('Are you sure for delete?')){ deleted('<?php echo $user->category ?>','<?php echo $user->id ?>') }" class="fas fa-times-circle text-orange-red"></i>
        </td>
    </tr>
    <?php
    endforeach;
}
if($viewdata["wid"]=="5"){
    $q=0;
    $myData= $myModel->select_collage_period($this->getSession('userid'));
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr <?php if($myuser->priod_name=="LUNCH"){echo 'class="arsuccess"';} ?>>
        <td <?php if($myuser->priod_name=="LUNCH"){echo 'class="arsuccess"';} ?>><?php echo $q; ?></td>
        <td><?php echo $myuser->priod_name; ?></td>
        <td><?php echo $myuser->start_time; ?></td>
        <td><?php echo $myuser->end_time; ?></td>
        <td>
            <i onclick="updatebtn('<?php echo $myuser->id ?>','<?php echo $myuser->priod_name ?>','<?php echo $myuser->start_time ?>','<?php echo $myuser->end_time ?>')" class="fas fa-edit text-light-sea-green"></i>
            <i onclick="if(confirm('Are you sure, Want to delete?')){ deleted('<?php echo $myuser->id ?>') }" class="fas fa-times-circle text-orange-red"></i>
        </td>
    </tr>
    <?php
    endforeach;
}
if($viewdata["wid"]=="6"){
    ?>
    <div class="col-6-xxxl col-xl-12">
            <div class="card account-settings-box height-auto">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-20">
                        <div class="item-title">
                            <h3 id="classheadind">School Subjects</h3>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table display data-table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Subject Name</th>
                                    <th class="text-center">Add</th>
                                </tr>
                            </thead>
                            <tbody id="subcat">
                            <?php
                            $i=0;
                            $data= $myModel->select_teacher_not_subject($this->getSession('userid'),$viewdata["subid"]);
                            foreach($data as $user):
                            $i++;
                            ?>
                            <tr>
                                <td class="align-middle"><?php echo $i;?></td>
                                <td class="align-middle"><?php echo $user->subject_name_eng;if($user->category=="Practical"){echo " (P)";}else if($user->category=="Other"){echo " (O)";} ?></td>
                                <td class="align-middle text-center">
                                    <?php 
                                    $tchrid=$viewdata["tchrid"];
                                    $tchrnm=$viewdata["tchrname"];
                                    if(empty($viewdata["subid"])){$newsubject=$user->id;}
                                    else{$newsubject=$viewdata["subid"].','.$user->id;}
                                    ?>
                                <i onclick="adddubject('<?php echo $tchrid ?>','<?php echo $newsubject; ?>','<?php echo $tchrnm ?>')" class="fas fa-plus-circle text-green"></i>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6-xxxl col-xl-6">
            <div class="card account-settings-box">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-20">
                        <div class="item-title">
                            <h3 id="classheadind"><?php echo $viewdata["tchrname"] ?> Subjects</h3>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table display data-table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Subject Name</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="cldata">
                            <?php
                               $i=0;
                               $subid = $viewdata["subid"];
                               if(!empty($subid)){
                                    $data= $myModel->select_teacher_subjects($this->getSession('userid'),$viewdata["subid"]);
                                    foreach($data as $user):
                                        $i++;
                                    ?>
                                    <tr>
                                        <td class="align-middle"><?php echo $i;?></td>
                                        <td class="align-middle"><?php echo $user->subject_name_eng;if($user->category=="Practical"){echo " (P)";}else if($user->category=="Other"){echo " (O)";} ?></td>
                                        <td class="align-middle text-center">
                                            <?php
                                                $tchrid=$viewdata["tchrid"];
                                                $tchrnm=$viewdata["tchrname"];
                                                if (strpos($viewdata["subid"], ',')!==false){$newsubject= str_replace(','.$user->id, '', $viewdata["subid"]);}
                                                else{$newsubject= str_replace($user->id, '', $viewdata["subid"]);}
                                            ?>
                                        <i onclick="adddubject('<?php echo $tchrid ?>','<?php echo $newsubject; ?>','<?php echo $tchrnm ?>')" class="fas fa-times-circle text-orange-red"></i>
                                        </td>
                                    </tr>
                                    <?php
                                    endforeach;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <?php
}
if($viewdata["wid"]=="7"){
    $q=0;
    $myData= $myModel->select_employee($this->getSession('userid'),"Active");
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->employee_name; ?></td>
        <td>
            <?php 
            if(!empty($myuser->teaching_subject_preferred)){
                $data= $myModel->select_teacher_subjects($this->getSession('userid'),$myuser->teaching_subject_preferred);
                foreach($data as $user):
                    $subj=$user->subject_name_eng;
                    if($user->category=="Practical"){$subj= $subj." (P)";}else if($user->category=="Other"){$subj= $subj." (O)";}
                    echo '<div class="arsection">'.$subj.'</div>';
                endforeach;
            }
            ?>
        </td>
        <td class="arupdate text-center">
            <i onclick="showdata('<?php echo $myuser->id ?>','<?php echo $myuser->teaching_subject_preferred ?>','<?php echo $myuser->employee_name ?>')" class="fas fa-cogs text-dark-pastel-green"></i>
        </td>
    </tr>
    <?php
    endforeach;
}
if($viewdata["wid"]=="8"){
    $q=0;
    $myData= $myModel->select_employee($this->getSession('userid'),"Active");
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->employee_name; ?></td>
        <td>
            <?php 
            if(!empty($myuser->teaching_class_preferred)){
                $data= $myModel->select_teacher_class($this->getSession('userid'),$myuser->teaching_class_preferred);
                foreach($data as $user):
                    echo '<div class="arsection">'.$user->name.'</div>';
                endforeach;
            }
            ?>
        </td>
        <td class="arupdate text-center">
            <i onclick="showdata('<?php echo $myuser->id ?>','<?php echo $myuser->teaching_class_preferred ?>','<?php echo $myuser->employee_name ?>')" class="fas fa-cogs text-dark-pastel-green"></i>
        </td>
    </tr>
    <?php
    endforeach;
}
if($viewdata["wid"]=="9"){
    ?>
    <div class="col-6-xxxl col-xl-12">
            <div class="card account-settings-box height-auto">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-20">
                        <div class="item-title">
                            <h3 id="classheadind">School Classes</h3>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table display data-table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Subject Name</th>
                                    <th class="text-center">Add</th>
                                </tr>
                            </thead>
                            <tbody id="subcat">
                            <?php
                            $i=0;
                            $data= $myModel->select_teacher_not_class($this->getSession('userid'),$viewdata["subid"]);
                            if(!empty($data)){
                            foreach($data as $user):
                            $i++;
                            ?>
                            <tr>
                                <td class="align-middle"><?php echo $i;?></td>
                                <td class="align-middle"><?php echo $user->name; ?></td>
                                <td class="align-middle text-center">
                                    <?php 
                                    $tchrid=$viewdata["tchrid"];
                                    $tchrnm=$viewdata["tchrname"];
                                    if(empty($viewdata["subid"])){$newsubject=$user->id;}
                                    else{$newsubject=$viewdata["subid"].','.$user->id;}
                                    ?>
                                <i onclick="adddubject('<?php echo $tchrid ?>','<?php echo $newsubject; ?>','<?php echo $tchrnm ?>')" class="fas fa-plus-circle text-green"></i>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6-xxxl col-xl-6">
            <div class="card account-settings-box">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-20">
                        <div class="item-title">
                            <h3 id="classheadind"><?php echo $viewdata["tchrname"] ?> Subjects</h3>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table display data-table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Subject Name</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="cldata">
                            <?php
                               $i=0;
                               $subid = $viewdata["subid"];
                               if(!empty($subid)){
                                    $data= $myModel->select_teacher_assind_class($this->getSession('userid'),$viewdata["subid"]);
                                    foreach($data as $user):
                                        $i++;
                                    ?>
                                    <tr>
                                        <td class="align-middle"><?php echo $i;?></td>
                                        <td class="align-middle"><?php echo $user->name; ?></td>
                                        <td class="align-middle text-center">
                                            <?php
                                                $tchrid=$viewdata["tchrid"];
                                                $tchrnm=$viewdata["tchrname"];
                                                if (strpos($viewdata["subid"], ',')!==false){$newsubject= str_replace(','.$user->id, '', $viewdata["subid"]);}
                                                else{$newsubject= str_replace($user->id, '', $viewdata["subid"]);}
                                            ?>
                                        <i onclick="adddubject('<?php echo $tchrid ?>','<?php echo $newsubject; ?>','<?php echo $tchrnm ?>')" class="fas fa-times-circle text-orange-red"></i>
                                        </td>
                                    </tr>
                                    <?php
                                    endforeach;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <?php
}
if($viewdata["wid"]=="10"){
    $tchr=$viewdata["tcrid"];
    $Data= $myModel->select_collage_period($this->getSession('userid'));
    foreach($Data as $timing):
        if($timing->priod_name=="Drink Break" || $timing->priod_name=="Lunch Break"){
            echo '<tr><td colspan="7" class="arbreack text-center">'. $timing->priod_name .'</td></tr>';
        }
        else{
    ?>
    <tr>
        <td class="align-middle"><?php echo $timing->start_time; ?></td>
        <td>
        <?php
        $cource= $myModel->select_teacher_tbl_subject("mo","mo_teacherid",$tchr,$timing->id);
        if(!empty($cource)){
            ?>
                <div class="arwith font-weight-bold text-light-sea-green"><?php echo $cource->clasname ?></div>
                <div class="arwith"><?php echo $cource->mo_lecture ?></div>
            <?php
        }else{echo '<div class="arwith arlht50">---</div>';}
        ?>
        </td>
        <td>
        <?php
        $cource= $myModel->select_teacher_tbl_subject("tu","tu_teacherid",$tchr,$timing->id);
        if(!empty($cource)){
            ?>
                <div class="arwith font-weight-bold text-light-sea-green"><?php echo $cource->clasname ?></div>
                <div class="arwith"><?php echo $cource->tu_lecture ?></div>
            <?php
        }else{echo '<div class="arwith arlht50">---</div>';}
        ?>
        </td>
        <td>
        <?php
        $cource= $myModel->select_teacher_tbl_subject("we","we_teacherid",$tchr,$timing->id);
        if(!empty($cource)){
            ?>
                <div class="arwith font-weight-bold text-light-sea-green"><?php echo $cource->clasname ?></div>
                <div class="arwith"><?php echo $cource->we_lecture ?></div>
            <?php
        }else{echo '<div class="arwith arlht50">---</div>';}
        ?>
        </td>
        <td>
        <?php
        $cource= $myModel->select_teacher_tbl_subject("th","th_teacherid",$tchr,$timing->id);
        if(!empty($cource)){
            ?>
                <div class="arwith font-weight-bold text-light-sea-green"><?php echo $cource->clasname ?></div>
                <div class="arwith"><?php echo $cource->th_lecture ?></div>
            <?php
        }else{echo '<div class="arwith arlht50">---</div>';}
        ?>
        </td>
        <td>
        <?php
        $cource= $myModel->select_teacher_tbl_subject("fr","fr_teacherid",$tchr,$timing->id);
        if(!empty($cource)){
            ?>
                <div class="arwith font-weight-bold text-light-sea-green"><?php echo $cource->clasname ?></div>
                <div class="arwith"><?php echo $cource->fr_lecture ?></div>
            <?php
        }else{echo '<div class="arwith arlht50">---</div>';}
        ?>
        </td> 
        <td>
        <?php
        $cource= $myModel->select_teacher_tbl_subject("st","st_teacherid",$tchr,$timing->id);
        if(!empty($cource)){
            ?>
                <div class="arwith font-weight-bold text-light-sea-green"><?php echo $cource->clasname ?></div>
                <div class="arwith"><?php echo $cource->st_lecture ?></div>
            <?php
        }else{echo '<div class="arwith arlht50">---</div>';}
        ?>
        </td>      
    </tr>
    <?php
            }
    endforeach;
}
if($viewdata["wid"]=="11"){
    $dy=$viewdata["tcrid"];?>
    <thead>
        <tr>
            <th>Class Time</th>
            <?php
            $crd=0;
            $Dataclass= $myModel->select_collage_period($this->getSession('userid'));
            foreach($Dataclass as $classtime):
                $crd++;
                echo '<th class="text-center artablehead">'.$classtime->priod_name.'<br>'.$classtime->start_time.'</th>';
            endforeach;
            ?>
        </tr>
    </thead>
    <tbody id="cldata">
        <?php
            $Data= $myModel->select_class($this->getSession('userid'));
            foreach($Data as $timing):
        ?>
            <tr>
                <td class="align-middle"><?php echo $timing->name; ?></td>
                <?php 
                $course=$timing->id;
                foreach($Dataclass as $classtime):
                    ?>
                    <td class="text-center">
                    <?php 
                    if($classtime->priod_name!="Drink Break" && $classtime->priod_name!="Lunch Break"){
                        $cource= $myModel->select_day_wise_subject($dy,$classtime->id,$course);
                        if(!empty($cource)){
                            ?>
                            <div class="arwith font-weight-bold text-light-sea-green"><?php $pr=$dy.'_lecture';echo $cource->$pr ?></div>
                            <div class="arwith"><?php $par=$dy.'_teacher'; echo $cource->$par ?></div>
                            <?php
                        }
                        else{
                            echo '<div class="arwith arlht50">---</div>';
                        }

                    ?>
                    </td> 
                    <?php
                    }
                endforeach;
                ?>
            </tr>
            <?php
            endforeach;
        ?>
    </tbody>
    <?php
}
if($viewdata["wid"]=="12"){
    $q=0;
    if(empty($viewdata["all"])){
        $myData= $myModel->select_class_students($this->getSession('userid'),$viewdata["status"],$viewdata["clasid"]);
    }
    else{
        $myData= $myModel->select_students($this->getSession('userid'),$viewdata["status"]);
    }
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->student_name; ?></td>
        <td><?php echo $myuser->fathers_name; ?></td>
        <td><?php echo $myuser->clsname; ?></td>
        <td><?php echo $myuser->father_contact1; ?></td>
        <td><?php echo $myuser->date_of_admition; ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="flaticon-more-button-of-three-dots"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Print</a>
                </div>
            </div>
        </td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="13"){
    $q=0;
    $myDa= $myModel->select_class($this->getSession('userid'));
    if(empty($viewdata["all"])){
        $myData= $myModel->select_class_students($this->getSession('userid'),$viewdata["status"],$viewdata["clasid"]);
    }
    else{
        $myData= $myModel->select_students($this->getSession('userid'),$viewdata["status"]);
    }
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td class="form-group"><?php echo '<input type="text" name="studentname[]" value="'.$myuser->student_name.'" placeholder="" class="form-control"'; ?></td>
        <td class="form-group"><?php echo '<input type="text" name="fathername[]" value="'.$myuser->fathers_name.'" placeholder="" class="form-control"'; ?></td>
        <td class="form-group">
        <select class="select2" name="class[]">
            <option value="0">Select Class</option>
            <?php 
            foreach($myDa as $myus):
                if($myuser->class==$myus->id){$sl= "selected";}else{$sl="";};
                echo '<option value="'.$myus->id.'"  '.$sl.'>'.$myus->name.'</option>';
            endforeach;
            ?>
        </select>
        </td>
        <td class="form-group">
        <select class="select2" name="class[]">
            <option value="0">Select Class</option>
            <?php 
            foreach($myDa as $myus):
                if($myuser->class==$myus->id){$sl= "selected";}else{$sl="";};
                echo '<option value="'.$myus->id.'"  '.$sl.'>'.$myus->name.'</option>';
            endforeach;
            ?>
        </select>
        </td>
        <td class="form-group">
        <select class="select2" name="class[]">
            <option value="0">Select Class</option>
            <?php 
            foreach($myDa as $myus):
                if($myuser->class==$myus->id){$sl= "selected";}else{$sl="";};
                echo '<option value="'.$myus->id.'"  '.$sl.'>'.$myus->name.'</option>';
            endforeach;
            ?>
        </select>    
        </td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="14"){
    $q=0;
    $myData= $myModel->select_enquiry([$this->getSession('userid'),$viewdata["status"]]);
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->student_name; ?></td>
        <td><?php echo $myuser->fathers_name; ?></td>
        <td><?php echo $myuser->father_contact1; ?></td>
        <td><?php echo $myuser->nextfollow; ?></td>
        <td><?php echo $myuser->date; ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="flaticon-more-button-of-three-dots"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Print</a>
                </div>
            </div>
        </td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="15"){
    $q=0;
    $myData= $myModel->select_enquiry([$this->getSession('userid'),$viewdata["status"]]);
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->student_name; ?></td>
        <td><?php echo $myuser->fathers_name; ?></td>
        <td><?php echo $myuser->father_contact1; ?></td>
        <td><?php echo $myuser->nextfollow; ?></td>
        <td><?php echo $myuser->date; ?></td>
        <td><i class="fas fa-cogs text-red"> Send SMS</i></td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="16"){
    $q=0;
    $myData= $myModel->select_class_students($this->getSession('userid'),$viewdata["status"],$viewdata["clasid"]);
    if(!empty($myData)){
        if($viewdata["month"]!=cu_month){
            $d = cal_days_in_month(CAL_GREGORIAN,$viewdata["month"],$viewdata["year"]);
            $sunday = $this->totalsunday($viewdata["month"],$viewdata["year"]);
            $date = $viewdata["year"].'-'.$viewdata["month"].'-0';
        }
        else{
            $d = date('d');
            $sunday = $this->totalsunday_to_date(cu_month,cu_year,cu_date);
            $date = cu_year.'-'.cu_month.'-0';
        }

    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->student_name; ?></td>
        <td><?php echo cu_month_name; ?></td>
        <?php
          $mystu= $myModel->count_students_attendance([$myuser->id,$date,$myuser->id,$date]);
          if(empty($mystu)){$count=0;$leav=0;}else{$count=$mystu->num;$leav=$mystu->lev;}
        ?>
        <td class="text-center"><?php echo  $count ?></td>
        <td class="text-center"><?php echo ($d-($count+$leav+$sunday)); ?></td>
        <td class="text-center"><?php echo $leav ?>
        </td>
        <td class="text-center"><a href="<?php echo BASEURL ?>/attendance/view_student_attend/<?php echo $viewdata["clasid"].'/'.$myuser->id ?>"><i class="fas fa-eye text-red"></i></a></td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="17"){
    $q=0;
    $myData= $myModel->select_complaints([$this->getSession('userid'),$viewdata["type"]]);
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->student_name; ?></td>
        <td><?php echo $myuser->class; ?></td>
        <td><?php echo $myuser->contact; ?></td>
        <td><?php echo $myuser->date; ?></td>
        <td><?php echo $myuser->complaints; ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="flaticon-more-button-of-three-dots"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Print</a>
                </div>
            </div>
        </td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="18"){
    $q=0;
    $myData= $myModel->select_collage_account([$this->getSession('userid')]);
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->holder_name; ?></td>
        <td><?php echo $myuser->account_number; ?></td>
        <td><?php echo "₹ ".$myuser->opning_balance; ?></td>
        <td><?php echo "₹ ".$myuser->current_balance; ?></td>
        <td><?php echo $myuser->bank_name; ?></td>
        <td><?php echo $myuser->ifsc_code; ?></td>
        <td>
            <i onclick="if(confirm('Are you sure, Want to update?')){ updatebtn('<?php echo $myuser->id ?>')}" class="fas fa-edit text-light-sea-green"></i>
            <i onclick="if(confirm('Are you sure, Want to delete?')){ deleted('<?php echo $myuser->id ?>') }" class="fas fa-times-circle text-orange-red"></i>
        </td>
        
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="19"){
    $q=0;
    $myData= $myModel->select_transaction([$this->getSession('userid')]);
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->pay_date; ?></td>
        <td><?php echo $myuser->pertion_name; ?></td>
        <td><?php echo $myuser->pertion_type; ?></td>
        <td><?php echo $myuser->amount; ?></td>
        <td><?php echo $myuser->bill_imge; ?></td>
        <td><?php echo $myuser->bank_name; ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="flaticon-more-button-of-three-dots"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Print</a>
                </div>
            </div>
        </td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="20"){
    $i=0;
    $data= $myModel->select_transaction_type([$this->getSession('userid'),$viewdata["type"]]);
    foreach($data as $user):
        $i++;
    ?>
    <tr>
        <td class="align-middle"><?php echo $i;?></td>
        <td class="align-middle"><?php echo $user->pay_date; ?></td>
        <td class="align-middle"><?php echo $user->pertion_name; ?></td>
        <td class="align-middle"><?php echo $user->amount; ?></td>
        <td class="align-middle"><?php echo $user->remark; ?></td>
    </tr>
    <?php
    endforeach;
}
if($viewdata["wid"]=="21"){
    $CollageFee= $myModel->collage_fee([$this->getSession('userid'),$viewdata["classid"]]);
    if(empty($CollageFee)){$anual=0;$exam=0;$sports=0;$event=0;$monthly=0;$buss=0;$hostel=0;}
    else{
        $anual=$CollageFee->annual_fee;
        $exam=$CollageFee->exam_fee;
        $sports=$CollageFee->sports_fee;
        $event=$CollageFee->event_fee;
        $monthly=$CollageFee->monthly_fee;
        if($viewdata["buss"]=="NO"){$buss="0.00";}else{$buss=$CollageFee->buss_fee;}
        if($viewdata["hostel"]=="NO"){$hostel="0.00";}else{$hostel=$CollageFee->hostel_fee;}
    }
    $total_fee=$anual+$exam+$sports+$event+$monthly+$buss+$hostel;
    ?>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Annual Fee</label>
        <input type="text" name="annual_fee" readonly value="<?php echo '₹ '.$anual ?>" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Exam Fee</label>
        <input type="text" name="exam_fee" readonly value="<?php echo '₹ '.$exam ?>" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Sports Fee</label>
        <input type="text" name="sports_fee" readonly value="<?php echo '₹ '.$sports ?>" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Event Fee</label>
        <input type="text" name="event_fee" readonly value="<?php echo '₹ '.$event ?>" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Monthly Fee</label>
        <input type="text" name="monthly_fee" readonly value="<?php echo '₹ '.$monthly ?>" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Buss Fee</label>
        <input type="text" name="buss_fee" readonly value="<?php echo '₹ '.$buss ?>" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Hostel Fee</label>
        <input type="text" name="hostel_fee" readonly value="<?php echo '₹ '.$hostel ?>" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label>Fee Discount</label>
        <input type="text" name="fee_discount" value="" placeholder="₹ 0.00" class="form-control">
    </div>
    <div class="col-xl-3 col-lg-6 col-12 form-group">
        <label><b>Total Fee</b> : ₹ <?php echo $total_fee; ?></label>
    </div>
    <?php
}
if($viewdata["wid"]=="22"){
    $q=0;
    
    $myData= $myModel->select_class_students_fee($this->getSession('userid'),$viewdata["status"],$viewdata["clasid"]);

    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->student_name; ?></td>
        <td><?php echo $myuser->fathers_name; ?></td>
        <?php 
            $exfee=explode(",",$myuser->fees);
            $totafee=$exfee[0]+$exfee[1]+$exfee[2];
        ?>
        <td><lable class="text-green font-weight-bold">₹ <?php echo $exfee[0]?></lable> / <lable class="font-weight-bold">₹ 0.00</lable></td>
        <td>
            <?php if($exfee[2]==0){echo "Not Alloted";}else{?>
            <lable class="text-blue font-weight-bold">₹ <?php echo $exfee[2]?></lable> / <lable class="font-weight-bold">₹ 0.00</lable><?php } ?></td>
        <td>
            <?php if($exfee[1]==0){echo "Not Alloted";}else{?>
            <lable class="text-magenta font-weight-bold">₹ <?php echo $exfee[1]?></lable> / <lable class="font-weight-bold">₹ 0.00</lable><?php } ?></td>
        <td><lable class="text-red font-weight-bold">₹ <?php echo $totafee;?></lable> / <lable class="font-weight-bold">₹ 0.00</lable></td>
        <td></td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="23"){
    $q=0;
    $myData= $myModel->select_transaction_type([$this->getSession('userid'),$viewdata["type"]]);
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->pay_date; ?></td>
        <td><?php echo $myuser->pertion_name; ?></td>
        <td><?php echo $myuser->pertion_type; ?></td>
        <td><?php echo $myuser->amount; ?></td>
        <td><?php echo $myuser->bill_imge; ?></td>
        <td><?php echo $myuser->bank_name; ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="flaticon-more-button-of-three-dots"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Print</a>
                </div>
            </div>
        </td>
    </tr>
    <?php
        endforeach;
    }
}
if($viewdata["wid"]=="24"){
    ?>
    <option value="0">Select Subjects</option>
    <?php
        $myData= $myModel->select_course_subject($this->getSession('userid'),$viewdata["classid"]);
        foreach($myData as $myuser):
            echo '<option value="'.$myuser->id.','.$myuser->subject_name_eng.'">'.$myuser->subject_name_eng.'</option>';
        endforeach;
}
if($viewdata["wid"]=="25"){
    $q=0;
    if($viewdata["select"]=="All"){
        $myData= $myModel->select_all_class_work([$viewdata["type"]]);
    }
    else{
        $myData= $myModel->select_class_work([$viewdata["classid"],$viewdata["subjectid"],$viewdata["type"]]);
    }
    if(!empty($myData)){
        foreach($myData as $myuser):
            $q++;
        ?>
        <tr>
            <td><?php echo $q; ?></td>
            <td><?php echo $myuser->class_name; ?></td>
            <td><?php echo $myuser->subject_name; ?></td>
            <td><?php echo $myuser->date; ?></td>
            <td><?php echo $myuser->remark; ?></td>
            <td><?php echo $myuser->updated_by; ?></td>
            <td class="text-center"><a href="<?php echo BASEURL ?>/attendance/view_student_attend"><i class="fas fa-eye text-red"></i></a></td>
        </tr>
        <?php
        endforeach;
    }
}
if($viewdata["wid"]=="26"){
    $q=0;
    if($viewdata["all"]=="all"){}
    $myData= $myModel->select_class_students($this->getSession('userid'),$viewdata["status"],$viewdata["clasid"]);
    if(!empty($myData)){
        if($viewdata["month"]!=cu_month){
            $d = cal_days_in_month(CAL_GREGORIAN,$viewdata["month"],$viewdata["year"]);
            $sunday = $this->totalsunday($viewdata["month"],$viewdata["year"]);
            $date = $viewdata["year"].'-'.$viewdata["month"].'-0';
        }
        else{
            $d = date('d');
            $sunday = $this->totalsunday_to_date(cu_month,cu_year,cu_date);
            $date = cu_year.'-'.cu_month.'-'.$d;
        }

    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->student_name; ?></td>
        <td><?php echo $myuser->fathers_name; ?></td>
        <td><?php echo $myuser->sms_contact_no; ?></td>
        <?php
            $mystu= $myModel->today_students_attendance([$myuser->id,$date]);
            if(empty($mystu)){$stus="A";}else{$stus=$mystu->num;}
        ?>
        <td class="text-center"><div class="arbdy arwdth <?php if($stus=="A"){echo "arbdy bg-red";}else if($stus=="P"){echo "bg-dark-pastel-green";}else{echo "arbdy bg-yellow2";} ?>"><?php echo $stus; ?><div></td>
        <td class="text-center"><a href="<?php echo BASEURL ?>/attendance/view_student_attend/<?php echo $viewdata["clasid"].'/'.$myuser->id ?>"><i class="fas fa-eye text-red"></i></a></td>
    </tr>
    <?php
        endforeach;
    }
}


if($viewdata["wid"]=="28"){
    $q=0;
    if(empty($viewdata["all"])){
        $myData= $myModel->select_report_type([$this->getSession('userid'),$viewdata["type"]]);
    }
    if($viewdata["all"]=="date"){
        $myData= $myModel->select_datewise_report([$this->getSession('userid'),$viewdata["pay_date"]]);
    }
    else{
        $myData= $myModel->select_dailyreport([$this->getSession('userid')]);
    }

    //$myData= $myModel->select_transaction([$this->getSession('userid')]);
    
    if(!empty($myData)){
    foreach($myData as $myuser):
        $q++;
    ?>
    <tr>
        <td><?php echo $q; ?></td>
        <td><?php echo $myuser->pay_date; ?></td>
        <td><?php echo $myuser->pertion_name; ?></td>
        <td><?php echo $myuser->pertion_type; ?></td>
        <td><?php echo $myuser->amount; ?></td>
        <td><?php echo $myuser->bill_imge; ?></td>
        <td><?php echo $myuser->bank_name; ?></td>
        <td>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="flaticon-more-button-of-three-dots"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-times text-orange-red"></i>Delete</a>
                    <a class="dropdown-item" href="#"><i
                            class="fas fa-redo-alt text-orange-peel"></i>Print</a>
                </div>
            </div>
        </td>
    </tr>
    <?php
        endforeach;
    }
}

?>
