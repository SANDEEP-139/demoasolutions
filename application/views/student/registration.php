

<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Student Management</h3>
    </div>
    <?php print_r($this->flash("msg","alert alert-danger"));  ?>
    <?php print_r($this->flash("msgsuc","alert alert-success"));  ?>
    <!-- Breadcubs Area End Here -->

                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>New Student</h3>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div>
                        </div>
                        <form class="new-added-form"  action="<?php echo BASEURL; ?>/student/save_student" method="POST">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label <?php if(!empty($viewdata['class_error'])): echo 'class="text-red"' ;endif; ?>>Class *</label>
                                    <select class="select2" name="class" id="classlist">
                                        <option value="0">Select Class *</option>
                                        <?php 
                                        $clsaa_id="";
                                        $myData= $myModel->select_class($this->getSession('userid'));
                                        foreach($myData as $myuser):
                                            if($clsaa_id==""){$clsaa_id=$myuser->id;}
                                            if(!empty($viewdata['class'])):if($viewdata['class']==$myuser->id){$sl= "selected";}else{$sl="";};endif;
                                            echo '<option value="'.$myuser->id.'"  '.$sl.'>'.$myuser->name.'</option>';
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label  <?php if(!empty($viewdata['student_name_error'])): echo 'class="text-red"' ;endif; ?>>Student Name *</label>
                                    <input type="text" name="student_name" value="<?php if(!empty($viewdata['student_name'])): echo $viewdata['student_name'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label <?php if(!empty($viewdata['fathers_name_error'])): echo 'class="text-red"' ;endif; ?>>Father's Name *</label>
                                    <input type="text" name="fathers_name" value="<?php if(!empty($viewdata['fathers_name'])): echo $viewdata['fathers_name'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Mother's Name</label>
                                    <input type="text" name="mothers_name" value="<?php if(!empty($viewdata['mothers_name'])): echo $viewdata['mothers_name'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label <?php if(!empty($viewdata['father_contact1_error'])): echo 'class="text-red"' ;endif; ?>>Father Contact No1. *</label>
                                    <input type="text" name="father_contact1" value="<?php if(!empty($viewdata['father_contact1'])): echo $viewdata['father_contact1'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father Contact No2.</label>
                                    <input type="text" name="father_contact2" value="<?php if(!empty($viewdata['father_contact2'])): echo $viewdata['father_contact2'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label <?php if(!empty($viewdata['date_of_birth_error'])): echo 'class="text-red"' ;endif; ?>>Date Of Birth *</label>
                                    <input type="text" name="date_of_birth" value="<?php if(!empty($viewdata['date_of_birth'])): echo $viewdata['date_of_birth'] ;endif; ?>" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <?php 
                                    if(!empty($viewdata['gender'])){$gen = $viewdata['gender'];}else{$gen ="";}
                                    ?>
                                    <select class="select2" name="gender">
                                        <option value="0">Please Select Gender *</option>
                                        <option value="Male" <?php if($gen =="Mail"){ echo 'Selected';} ?>>Male</option>
                                        <option value="Female" <?php if($gen =="Female"){ echo 'Selected';} ?>>Female</option>
                                        <option value="Other" <?php if($gen =="Other"){ echo 'Selected';} ?>>Other</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Religion *</label>
                                    <select class="select2" name="religion">
                                        <option value="0">Please Select Religion *</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Sikh">Sikh</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Jain">Jain</option>
                                        <option value="Buddh">Buddh</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Category *</label>
                                    <select class="select2" name="category">
                                        <option value="0">Please Select Category *</option>
                                        <option value="General">General</option>
                                        <option value="OBC">OBC</option>
                                        <option value="SC">SC</option>
                                        <option value="ST">ST</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date Of Admition</label>
                                    <input type="text" name="date_of_admition" value="<?php if(!empty($viewdata['date_of_admition'])): echo $viewdata['date_of_admition'] ;endif; ?>" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Admition Type</label>
                                    <select class="select2" name="admition_type">
                                        <option value="1">Regular</option>
                                        <option value="2">Private</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Admission Scheme</label>
                                    <select class="select2" name="admition_scheme">
                                        <option value="Regular">Regular</option>
                                        <option value="Private">Private</option>
                                    </select>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Fee Category</label>
                                    <select class="select2" name="fee_category">
                                        <option value="1">NON-RET</option>
                                        <option value="2">Private</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Bus</label>
                                    <select class="select2" name="bus" id="bussfe">
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Hostel</label>
                                    <select class="select2" name="hostel" id="hostelfe">
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Library</label>
                                    <select class="select2" name="library">
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>SMS Contact No</label>
                                    <input type="text" name="sms_contact_no" value="<?php if(!empty($viewdata['sms_contact_no'])): echo $viewdata['sms_contact_no'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student Address</label>
                                    <input type="text" name="student_address" value="<?php if(!empty($viewdata['student_address'])): echo $viewdata['student_address'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Village/City</label>
                                    <input type="text" name="village_city" value="<?php if(!empty($viewdata['village_city'])): echo $viewdata['village_city'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Block</label>
                                    <input type="text" name="block" value="<?php if(!empty($viewdata['block'])): echo $viewdata['block'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>District</label>
                                    <input type="text" name="district" value="<?php if(!empty($viewdata['district'])): echo $viewdata['district'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>State</label>
                                    <input type="text" name="state" value="<?php if(!empty($viewdata['state'])): echo $viewdata['state'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Pincode</label>
                                    <input type="text" name="pincode" value="<?php if(!empty($viewdata['pincode'])): echo $viewdata['pincode'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Landmark</label>
                                    <input type="text" name="landmark" value="<?php if(!empty($viewdata['landmark'])): echo $viewdata['landmark'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-9 col-lg-9 col-12 form-group">
                                    
                                </div>

                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Student Photo</label>
                                    <input type="file" name="student_photo" class="form-control-file">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Father Photo</label>
                                    <input type="file" name="father_photo" class="form-control-file">
                                </div>
                                <div class="col-xl-4 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Mother Photo</label>
                                    <input type="file" name="mother_photo" class="form-control-file">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Remark 1</label>
                                    <input type="text" name="remark1" value="<?php if(!empty($viewdata['remark1'])): echo $viewdata['remark1'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Remark 2</label>
                                    <input type="text" name="remark2" value="<?php if(!empty($viewdata['remark2'])): echo $viewdata['remark2'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Remark 3</label>
                                    <input type="text" name="remark3" value="<?php if(!empty($viewdata['remark3'])): echo $viewdata['remark3'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Remark 4</label>
                                    <input type="text" name="remark4" value="<?php if(!empty($viewdata['remark4'])): echo $viewdata['remark4'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                </div>
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Fee Details:</h3>
                                    </div>
                                </div>
                                <div class="row" id="feedata">
                                  <?php $this->view2("ajax/allsubjects",$myModel,['wid'=>"21",'classid'=>$clsaa_id,'buss'=>"NO",'hostel'=>"NO"]); ?>
                                </div>
                            <div class="row">
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
    
    
    <!-- Footer Area Start Here -->
    <?php include "components/copyright.php"; ?>
    <!-- Footer Area End Here -->
</div>
<?php include "components/footer.php"; ?>

<script>
    $("#classlist,#bussfe,#hostelfe").change(function() {
        $.ajax({
            url: "<?php echo BASEURL.'/student/select_fee/'?>", 
            type: "POST",
            data: {classid:$("#classlist").val(),busf:$("#bussfe").val(),hostelf:$("#hostelfe").val()},
            success: function(result){
                $("#feedata").html(result);
            }
        });
    });
</script>

