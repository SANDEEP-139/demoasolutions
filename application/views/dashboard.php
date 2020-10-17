
<?php include "components/header.php"; ?>
    <?php
    $myData= $myModel->dashboard([$this->getSession('userid'),$this->getSession('userid'),$this->getSession('userid'),$this->getSession('userid')]);

    ?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area aeroheader">
                    <h3>Admin Dashboard</h3>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/student/registration_list">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="flaticon-classmates text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Students</div>
                                        <div class="item-number"><span class="counter" data-num="<?php echo $myData->tostud ?>"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/staff/employee_list">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-teachers text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Teachers</div>
                                        <div class="item-number"><span class="counter" data-num="<?php echo $myData->totchr ?>"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/services/sms">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Left SMS</div>
                                        <div class="item-number"><span class="counter" data-num="<?php echo $myData->leftsms ?>"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/account/ledger_info">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red">
                                        <i class="flaticon-protect text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Earnings</div>
                                        <div class="item-number"><span>₹</span><span class="counter" data-num="<?php echo $myData->toamnt ?>">1,93,000</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Dashboard summery End Here -->
                <!-- Dashboard Content Start Here -->
                <div class="row gutters-20">
                    <div class="col-12 col-xl-9 col-9-xxxl">
                        <div class="row gutters-20">
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/attendance">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-calendar text-red"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Attendance</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/enquiry">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-help-call text-magenta"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Enquiry</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/staff">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-group text-mauvelous"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Staff</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/student">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-group-of-users-silhouette text-light-sea-green"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Student</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/account">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-accounting text-martini"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Account</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/account/dues">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-calendar-2 text-orange"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Dues</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/account/fees">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-currency text-orange-red"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Fees</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/account/penalty">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-penalty text-dodger-blue"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Penalty</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/schedule">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-certificate text-mute-low"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-mauvelous">
                                                <div class="item-number"><span>Certificate</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/schedule/exam">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-puzzle-piece text-light-sea-green"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Examination</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/schedule/homework">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-teleworking text-blue"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Homework</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                            <a href="<?php echo BASEURL ?>/schedule/setpaper">
                                <div class="dashboard-summery-one mg-b-20">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="item-icon armginauto">
                                                <i class="flaticon-checklist text-magenta"></i>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="item-content text-center">
                                                <div class="item-number"><span>Set Paper</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-xl-3 col-3-xxxl">
                        <div class="card dashboard-card-three pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Students</h3>
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
                                <div class="doughnut-chart-wrap">
                                    <canvas id="student-doughnut-chart" width="100" height="300"></canvas>
                                </div>
                                <div class="student-report">
                                    <div class="student-count pseudo-bg-blue">
                                        <h4 class="item-title">Female Students</h4>
                                        <div class="item-number">45,000</div>
                                    </div>
                                    <div class="student-count pseudo-bg-yellow">
                                        <h4 class="item-title">Male Students</h4>
                                        <div class="item-number">1,05,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <h3 class="font-weight-bold">SERVICES</h3>
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/services">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-information-3 text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Complaints</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/services/gallery">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-red-carpet text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Gallery</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/services/sms">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="item-icon">
                                        <i class="flaticon-mail text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="item-content">
                                        <div class="item-number">SMS Service</div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/timetable">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-calendar-14 text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Time Table</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>

                <h3 class="font-weight-bold">MANAGMENT</h3>
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/managment">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-confetti text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Event</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/managment/holiday">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-hot-air-balloon text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Holiday</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/managment/leave">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-calendar-17 text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number">Leave</div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/managment/sports">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-running text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Sports</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>

                <h3 class="font-weight-bold">BACKUP</h3>
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/backup">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-flag text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Important</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/backup/downloads">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-download-1 text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Downloads</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/backup/recyclebin">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="item-icon">
                                        <i class="flaticon-recycling-bin text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="item-content">
                                        <div class="item-number">Recycle Bin</div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/backup/session">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-clock text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Session</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>

                
                <h3 class="font-weight-bold">OTHER</h3>
                <div class="row gutters-20">
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/other">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="item-icon">
                                        <i class="flaticon-work text-green"></i>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="item-content">
                                        <div class="item-number"><span>Govt. Require</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/other/reminder">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon">
                                        <i class="flaticon-calendar-3 text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-number"><span>Reminder</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL."/schoolinfo"; ?>">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="item-icon">
                                        <i class="flaticon-school text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="item-content">
                                        <div class="item-number">School Info</div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/other/typing">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="item-icon">
                                        <i class="flaticon-keyboard text-red"></i>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="item-content">
                                        <div class="item-number"><span>Typing Tool</span></div>
                                        <div class="item-title">Click Here</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>

                <h3 class="font-weight-bold">ADD ON</h3>
                <!-- Social Media Start Here -->
                <div class="row gutters-20">
                    <div class="col-lg-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/addon">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-fb hover-fb">
                                <div class="media media-none--lg">
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Live bus tracking</h6>
                                    </div>
                                </div>
                                <div class="social-like">Bus</div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/addon/hostel">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-twitter hover-twitter">
                                <div class="media media-none--lg">
                                        <div class="media-body space-sm">
                                            <h6 class="item-title">Hostel Managment</h6>
                                        </div>
                                </div>
                                <div class="social-like">Hostel</div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/addon/library">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-gplus hover-gplus">
                                <div class="media media-none--lg">
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Library Managment</h6>
                                    </div>
                                </div>
                                <div class="social-like">Library</div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                    <a href="<?php echo BASEURL ?>/addon/stock/management">
                        <div class="card dashboard-card-seven">
                            <div class="social-media bg-linkedin hover-linked">
                                <div class="media media-none--lg">
                                    <div class="media-body space-sm">
                                        <h6 class="item-title">Stocks Managment</h6>
                                    </div>
                                </div>
                                <div class="social-like">Stocks</div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <!-- Social Media End Here -->
                <!-- Footer Area Start Here -->
                <?php include "components/copyright.php"; ?>
                <!-- Footer Area End Here -->
            </div>


<?php include "components/footer.php"; ?>