

<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Student Managment</h3>
    </div>
    <!-- Breadcubs Area End Here -->
    
    <div class="card height-auto">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-xl-2 col-lg-6 col-12 arhdng">
                   <h3 class="arm0">Student List</h3>
                </div>
                <div class="col-xl-2 col-lg-6 col-12">
                    <select class="select2" name="class" id="classtype">
                        <option value="0">Select Class</option>
                        <?php 
                        $myData= $myModel->select_class($this->getSession('userid'));
                       
                        foreach($myData as $myuser):
                            if(!empty($viewdata['class'])):if($viewdata['class']==$myuser->id){$sl= "selected";}else{$sl="";};endif;
                            echo '<option value="'.$myuser->id.'"  '.$sl.'>'.$myuser->name.'</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
                <!-- <div class="col-xl-2 col-lg-6 col-12">
                    <select class="select2" name="class">
                        <option value="0">Select Section</option>
                    </select>
                </div> -->
            </div>
            <div class="table-responsive">
                <table class="table display data-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Student Name</th>
                            <th>Father's Name</th>
                            <th>Class</th>
                            <th>Father Contact</th>
                            <th>Reg Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="studentdata">
                    <?php
                         $this->view2("ajax/allsubjects",$myModel,['wid'=>"12",'status'=>"Active",'all'=>"Select"]);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<?php include "components/footer.php"; ?>

<script>
$("#classtype").change(function() {
    $.ajax({
        url: "<?php echo BASEURL.'/student/studentlist/'?>", 
        type: "POST",
        beforeSend:function(){
            $("#loadingProgressG").show();
        },
        data: {clasid:$(this).val(),status:"Active"},
        success: function(result){
            $("#studentdata").html(result);
            $("#loadingProgressG").hide();
        }
    });
});
</script>