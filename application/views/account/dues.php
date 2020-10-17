<?php include "components/header.php"; ?>
<div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area aeroheader2">
                    <h3>Dues Management</h3>
                </div>
                <!-- Breadcubs Area End Here -->
            
                <div class="row gutters-20">
                <?php
                    $myData= $myModel->select_class($this->getSession('userid'));
                    $i=0;
                    foreach($myData as $user):
                        $i++;
                        ?>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/account/class_wise_dues/<?php echo $user->id; ?>">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="item-icon">
                                                <i class="flaticon-education <?php if($i==1){echo 'text-green';}else if($i==2){echo 'text-blue';}else if($i==3){echo 'text-orange';}else if($i==4){echo 'text-red';$i=0;} ?>"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="item-content">
                                                <div class="item-number"><span><?php echo $user->name; ?></span></div>
                                                <div class="item-title">Enter</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        <?php
                    endforeach;
                ?>
                </div>
            </div>


<?php include "components/footer.php"; ?>