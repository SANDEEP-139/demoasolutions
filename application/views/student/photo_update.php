

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
                   <h3 class="arm0">Student Profile</h3>
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
                <div class="col-xl-6 col-lg-6 col-12"></div>
                <div class="col-xl-2 col-lg-6 col-12 text-right">
                    <button type="button" onclick="update()" class="btn-fill-lmd radius-4 text-light bg-light-sea-green">UPDATE</button>
                </div>
            </div>
            <div class="table-responsive ">
                <form id="form1">
                <table class="table display data-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Student Name</th>
                            <th>Father Name</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Stream</th>
                        </tr>
                    </thead>
                    <tbody id="studentdata">
                    <?php
                         $this->view2("ajax/allsubjects",$myModel,['wid'=>"13",'status'=>"Active",'all'=>"Select"]);
                    ?>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php include "components/footer.php"; ?>
<script>
$("#classtype").change(function() {
    $.ajax({
        url: "<?php echo BASEURL.'/student/studentprofile/'?>", 
        type: "POST",
        data: {clasid:$(this).val(),status:"Active"},
        success: function(result){
            $("#studentdata").html(result);
        }
    });
});
</script>
