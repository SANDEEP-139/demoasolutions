

<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Student Action</h3>
    </div>
    <!-- Breadcubs Area End Here -->
    
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3 class="arm0">Penalty List</h3>
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
                            <th>Bill File</th>
                            <th>Updated By</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $this->view2("ajax/allsubjects",$myModel,['wid'=>"23",'type'=>"Initiate"]);
                        //$this->view2("ajax/allsubjects",$myModel,['wid'=>"19"]);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php"; ?>

