<?php include "components/header.php"; ?>


<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <div class="col-12-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <form class="new-added-form" id="form1">
                        <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <div  class="form-control">
                                    <label class="float-left mt-3" for="Student"><input type="radio" id="Student" name="usertype" value="Student" checked> Student</label>
                                    <label class="float-left mt-3 ml-3" for="Staff"><input type="radio" id="Staff" name="usertype" value="Staff"> Staff</label>
                                    <label class="float-left mt-3 ml-3" for="Other"><input type="radio" id="Other" name="usertype" value="Other"> Other</label>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <input type="text" name="fromdate" placeholder="From: dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                                <i class="far fa-calendar-alt artop"></i>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <input type="text" name="todate" placeholder="To: dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                                <i class="far fa-calendar-alt artop"></i>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group  d-none">
                                <select class="select2" name="month">
                                    <option value="0">All Month</option>
                                    <?php 
                                    $month=["July","August","September","October","November","December","January","February","March","April","May","June"];
                                        foreach($month as $myuser):
                                            echo '<option value="'.$myuser.'">'.$myuser.'</option>';
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <select class="select2" name="account">
                                    <option value="0">All Account</option>
                                    <?php 
                                    $clsaa_id="";
                                    $myData= $myModel->select_collage_account([$this->getSession('userid')]);
                                    if(!empty($myData)){
                                        foreach($myData as $myuser):
                                            echo '<option value="'.$myuser->id.'">'.$myuser->account_number.'</option>';
                                        endforeach;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group" id="classes">
                                <select class="select2" name="class" id="classtype">
                                    <option value="0">All Class</option>
                                    <?php 
                                    $myData= $myModel->select_class($this->getSession('userid'));
                                    foreach($myData as $myuser):
                                        echo '<option value="'.$myuser->id.'">'.$myuser->name.'</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group" id="students">
                                <select class="select2" name="students" id="stulist">
                                    <option value="0">All Students</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group d-none" id="staffdada">
                                <select class="select2" name="staff">
                                    <option value="0">All Staff</option>
                                    <?php 
                                    $data= $myModel->select_teacher($this->getSession('userid'));
                                    foreach($data as $user):
                                    ?>
                                    <option value="<?php echo $user->id.','.$user->employee_name; ?>"><?php echo $user->employee_name; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <button type="button" onclick="search()" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12-xxxl col-12">  
            <div class="card height-auto">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-xl-6 col-lg-6 col-12 arhdng">
                        <h3 class="arm0">Income Expense Ledger</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table display data-table">
                            <thead>
                                <tr>
                                <th>Sr. No.</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th class="text-center">Bill File</th>
                                </tr>
                            </thead>
                            <tbody id="studentdata">
                            <?php
                                $this->view2("ajax/allsubjects",$myModel,['wid'=>"19"]);
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php include "components/footer.php"; ?>

<script>
$("input[type=radio]").change(function(){
    if ($(this).is(':checked'))
    {
        $data=$(this).val();
        if($data=="Student"){
            $("#classes,#students").show();
            $("#staffdada").hide();
            
        }
        else if($data=="Staff"){
            $("#classes,#students").hide();
            $("#staffdada").show();
        }
        else{
            $("#classes,#students").hide();
            $("#staffdada").hide();
        }
    }
});
$("#classtype").change(function() {
    $.ajax({
        url: "<?php echo BASEURL.'/account/selectstudents/'?>", 
        type: "POST",
        beforeSend:function(){
            $("#loadingProgressG").show();
        },
        data: {clasid:$(this).val()},
        success: function(result){
            $("#stulist").html(result);
            $("#loadingProgressG").hide();
        }
    });
});
function search(){
    $.ajax({
        url: "<?php echo BASEURL.'/account/serchtransaction/'?>", 
        type: "POST",
        beforeSend:function(){
            $("#loadingProgressG").show();
        },
        data: $("#form1").serialize(),
        success: function(result){
            //$("#stulist").html(result);
            $("#loadingProgressG").hide();
            alert(result);
        }
    });
}
</script>