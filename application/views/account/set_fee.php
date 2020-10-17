<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Fees Management</h3>
    </div>
    <!-- Breadcubs Area End Here -->
    
    <div class="card height-auto">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-xl-6 col-lg-6 col-12 arhdng">
                   <h3 class="arm0">Student Wise Fees</h3>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Class</th>
                            <th>Annuale Day Fee</th>
                            <th>Sports Fee</th>
                            <th>Exam Fee</th>
                            <th>Event Fee</th>
                            <th>Bus Fee</th>
                            <th>Total Fee</th>
                            <th></th>
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
<?php include "components/footer.php"; ?>