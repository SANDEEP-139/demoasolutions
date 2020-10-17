<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Account Management</h3>
    </div>
    <!-- Breadcubs Area End Here -->
    
    <div class="card height-auto">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-xl-2 col-lg-6 col-12 arhdng">
                   <h3 class="arm0">Account List</h3>
                </div>
               
                
            </div>
            <div class="table-responsive">
                <table class="table display data-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Holder Name</th>
                            <th>Account Number</th>
                            <th>Opening Balance</th>
                            <th>Current Balance</th>
                            <th>Bank Name</th>
                            <th>IFSC</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="bankdata">
                    <?php
                 $this->view2("ajax/allsubjects",$myModel,['wid'=>"18"]);
                       //  $this->view2("ajax/allsubjects",$myModel,['wid'=>"27",'all'=>"ll"]);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php"; ?>
<script>
function deleted($id) {
    $.ajax({
        url: "<?php echo BASEURL.'/account/delete_bank' ?>", 
        type: "POST",
        data: {id:$id},
        beforeSend:function(){$("#loadingProgressG").show();},
        success: function(result){
            $("#bankdata").html(result);
            $("#loadingProgressG").hide();
        }
    });
}
</script>
<script>
function updatebtn($id) {
 
    var ids=$id;
  
window.location.replace('/asolutions/account/add_bank?id='+ids);
}
</script>
