<?php include "components/header.php"; ?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Student Action</h3>
    </div>
    <div class='alert alert-danger ad-none'>Something wrong.</div>
    <div class='alert alert-success ad-none'>Transaction Succesfully Update.</div>
        <!-- Admit Form Area Start Here -->
        <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Penalty Form</h3>
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
                        <form class="new-added-form" id="form1" action="<?php echo BASEURL; ?>/enquiry/save_new_enquiry" method="POST">
                        <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label id="selectstude">Search Student *</label>
                                    <select class="select2" name="studntnme" id="selectstud">
                                        <option value="0">Select Student</option>
                                        <?php
                                         $myData= $myModel->select_students_fee($this->getSession('userid'),"Active");
                                         foreach($myData as $myuser):
                                            echo '<option value="'.$myuser->id.','.$myuser->fathers_name.','.$myuser->student_name.','.$myuser->clsname.','.$myuser->student_address.','.$myuser->sms_contact_no.','.$myuser->userid.'">'.$myuser->student_name.' : '.$myuser->clsname.'</option>';
                                         endforeach;
                                        ?>
                                    </select>
                                </div>
                        </div>
                            <div class="row">
                               <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student Name *</label>
                                    <input type="text" id="stuname" name="student_name" placeholder="" class="form-control" readonly>
                                </div>
                               <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father's Name *</label>
                                    <input type="text" id="fname" name="father_name"  placeholder="" class="form-control" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <input type="text" id="classname" name="student_name" placeholder="" class="form-control" readonly>
                                </div>
                                
                                <div class="col-xl-3 col-lg-6 col-12 form-group d-none">
                                    <label>Student Section*</label>
                                    <input type="text" id="secname" name="fathers_name" placeholder="" class="form-control" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label id="samnte">Penalty Amount *</label>
                                    <input type="text" id="samnt" name="amnt" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Penalty Reason</label>
                                    <input type="text" id="sreasen" name="reasen" placeholder="" class="form-control">
                                </div>
                               <div class="col-12 form-group mg-t-8">
                                   <button onclick="save_penality()" type="button" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Submit</button>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <div class='alert alert-danger ad-none'>Something wrong.</div>
                                    <div class='alert alert-success ad-none'>Transaction Succesfully Update.</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
</div>
<?php include "components/footer.php"; ?>
<script>
 $("#selectstud").change(function() {
        $data=$(this).val();
        if($data!="0"){
            var nameArr = $data.split(',');
            $('#stuname').prop("value", nameArr[2]);
            $('#fname').prop("value", nameArr[1]);
            $('#classname').prop("value", nameArr[3]);

        }
    });

    function save_penality(){
        var $stud=$("#selectstud").val();
        var $samnt=$("#samnt").val();
        var $sreasen=$("#sreasen").val();
        var $stuname=$("#stuname").val();
        if($stud.trim()=="0"){$("#selectstude").css("color", "red");}else{$("#selectstude").css("color", "black");}
        if($samnt.trim()==""){$("#samnte").css("color", "red");}else{$("#samnte").css("color", "black");}
        
        if($stud.trim()!="0" && $samnt.trim()!=""){
            $.ajax({
                url: "<?php echo BASEURL.'/account/save_penality' ?>", 
                type: "POST",
                beforeSend:function(){
                    $("#loadingProgressG").show();
                },
                data: $("#form1").serialize(),
                success: function(result){
                    $("#loadingProgressG").hide();
                    if(result=="Succesfull"){
                        $(".alert-danger").hide();
                        $(".alert-success").show();
                    }
                    else{
                        alert(result);
                        $(".alert-danger").show();
                        $(".alert-success").hide();
                    }
                }
            });
            
        }
        
        
    }
</script>