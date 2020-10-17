<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Fees Management</h3>
    </div>
    <?php print_r($this->flash("msg","alert alert-danger"));  ?>
    <?php print_r($this->flash("msgsuc","alert alert-success"));  ?>
    <!-- Breadcubs Area End Here -->

                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Dues Over Date</h3>
                            </div>
                        </div>
                        <form class="new-added-form"  action="<?php echo BASEURL; ?>/student/save_student" method="POST">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Jauary Month Dues Date</label>
                                    <input type="text" name="Jauary" placeholder="dd/MM/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                </div>

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
</div>
<?php include "components/footer.php"; ?>