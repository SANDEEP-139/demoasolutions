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
                                <h3>Reset Month</h3>
                            </div>
                        </div>
                        <form class="new-added-form"  action="<?php echo BASEURL; ?>/student/save_student" method="POST">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="January" value="January"> Jauary
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="February" value="February"> February
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="March" value="March"> March
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="April" value="April"> April
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="May" value="May"> May
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="June" value="June"> June
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="July" value="July"> July
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="August" value="August"> August
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="September" value="September"> September
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="October" value="October"> October
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="November" value="November"> November
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <input type="checkbox" name="December" value="December"> December
                                </div>

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
</div>
<?php include "components/footer.php"; ?>