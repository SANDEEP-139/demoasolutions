<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Account Management</h3>
    </div>
    <div class='alert alert-danger ad-none'>Something wrong.</div>
    <div class='alert alert-success ad-none'>Transaction Succesfully Update.</div>
    <!-- Breadcubs Area End Here -->

                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Expense Transaction</h3>
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
                        <form class="new-added-form" id="form1" method="POST"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium" id="eacnt">Office Account *</label>
                                    <select class="select2" name="office_account" id="seaccnt">
                                        <option value="0" >Select Account *</option>
                                        <?php
                                         $myData= $myModel->select_collage_account([$this->getSession('userid')]);
                                         foreach($myData as $myuser):
                                            echo '<option value="'.$myuser->account_number.'">'.$myuser->account_number.'</option>';
                                         endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Party type</label>
                                    <div  class="form-control">
                                    <div class="row pt-3">
                                      <div class="col-xl-3 col-lg-3 col-3 arlable">
                                        <input type="radio" id="Student" name="party" value="Student" checked>
                                        <label for="Student">Student</label>
                                      </div>
                                      <div class="col-xl-2 col-lg-2 col-2 arlable">
                                        <input type="radio" id="Staff" name="party" value="Staff">
                                        <label for="Staff">Staff</label>
                                      </div>
                                      <div class="col-xl-2 col-lg-2 col-2 arlable">
                                        <input type="radio" id="Other" name="party" value="Other">
                                        <label for="Other">Other</label>
                                      </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group ad-none" id="advance">
                                    <label class="text-dark-medium">Reasen</label>
                                    <select class="select2" name="reasen">
                                        <option value="Other">Other</option>
                                        <option value="Bus Fee">Bus Fee</option>
                                        <option value="Hostel Fee">Hostel Fee</option>
                                        <option value="Penality">Penality</option>
                                        <option value="For Event">For Event</option>
                                        <option value="For Donation">For Donation</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group" id="payfor">
                                    <label class="text-dark-medium">Payment For *</label>
                                    <select class="select2" name="pay_for">
                                        <option value="Education Fee">Education Fee</option>
                                        <option value="Bus Fee">Bus Fee</option>
                                        <option value="Hostel Fee">Hostel Fee</option>
                                        <option value="Penality">Penality</option>
                                        <option value="For Donation">For Donation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group" id="studlist">
                                    <label class="text-dark-medium" id="eacnta">Select Student *</label>
                                    <select class="select2" name="studntnme" id="selectstud">
                                        <option value="0">Select Student</option>
                                        <?php
                                         $myData= $myModel->select_students_fee($this->getSession('userid'),"Active");
                                         foreach($myData as $myuser):
                                            echo '<option value="'.$myuser->id.','.$myuser->fathers_name.','.$myuser->student_address.','.$myuser->sms_contact_no.','.$myuser->fees.','.$myuser->student_name.'">'.$myuser->student_name.' : '.$myuser->clsname.'</option>';
                                         endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group ad-none" id="stafflist">
                                    <label class="text-dark-medium" id="eacntb">Select Staff *</label>
                                    <select class="select2" name="tecrname" id="staffslct">
                                        <option value="0">Select Staff</option>
                                        <?php
                                         $myData= $myModel->select_employee($this->getSession('userid'),"Active");
                                         foreach($myData as $myuser):
                                            echo '<option value="'.$myuser->id.','.$myuser->address.','.$myuser->sms_contact.'">'.$myuser->employee_name.'</option>';
                                         endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group" id="fadname">
                                    <label class="text-dark-medium">Father's Name</label>
                                    <input type="hidden" name="payment_type" value="Debit">
                                    <input type="text" id="fathername" placeholder="Father's Name" class="form-control" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group ad-none" id="pname">
                                    <label class="text-dark-medium">Person Name</label>
                                    <input type="text" name="pertn_name" placeholder="Person Name" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Address</label>
                                    <input type="text" id="address" name="address" placeholder="Address" class="form-control" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Contact</label>
                                    <input type="text" id="contact" name="contact" placeholder="Contact" class="form-control" readonly>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium" id="eacntc">Total Amount *</label>
                                    <input type="text" id="selectamnt" name="amount" placeholder="₹ 0.00" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Date *</label>
                                    <input type="text" name="pay_date" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Payment Mode *</label>
                                    <select class="select2" id="payment_mode" name="class">
                                        <option value="Cash">Cash</option>
                                        <option value="Check">Check</option>
                                        <option value="Net Banking">Net Banking</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group ad-none" id="bankname">
                                    <label class="text-dark-medium">Bank Name</label>
                                    <input type="text" name="bank_name" placeholder="Bank Name" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group ad-none" id="acno">
                                    <label class="text-dark-medium">Account Number</label>
                                    <input type="text" name="account_number" placeholder="Account Number" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group ad-none" id="checkno">
                                    <label class="text-dark-medium">Check Number</label>
                                    <input type="text" name="check_number" placeholder="Check Number" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Remark</label>
                                    <input type="text" name="remark" placeholder="Remark" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Bill/Quotation Image</label>
                                    <input type="file" name="bill_imge" class="form-control-file">
                                </div>
                            </div>
                            
                                <div class="item-title arfee ad-none"><br>
                                    <h3>Fees Details</h3>
                                </div>
                            
                            <div class="arfee ad-none">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                                        <label class="text-dark-medium">Education Fee</label>
                                        <div class="form-control"> 
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <b>Total</b><br>
                                                    <label id="totalfee">₹ 0.00</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <b>Paid</b><br>
                                                    <label id="ptotalfee">₹ 0.00</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <b>Remaining</b><br>
                                                    <label id="rtotalfee">₹ 0.00</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-12 form-group" id="bbfee">
                                        <label class="text-dark-medium">Buss Fee</label>
                                        <div class="form-control"> 
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <b>Total</b><br>
                                                    <label id="busfee">₹ 0.00</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <b>Paid</b><br>
                                                    <label id="pbusfee">₹ 0.00</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <b>Remaining</b><br>
                                                    <label id="rbusfee">₹ 0.00</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-12 form-group" id="hhfee">
                                        <label class="text-dark-medium">Hostel Fee</label>
                                        <div class="form-control"> 
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <b>Total</b><br>
                                                    <label id="hostfee">₹ 0.00</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <b>Paid</b><br>
                                                    <label id="phostfee">₹ 0.00</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <b>Remaining</b><br>
                                                    <label id="rhostfee">₹ 0.00</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group mg-t-8">
                                    <button type="button" onclick="save_transaction()" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark mt-3">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <div class='alert alert-danger ad-none'>Something wrong.</div>
                                    <div class='alert alert-success ad-none'>Transaction Succesfully Update.</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
</div>

<?php include "components/footer.php"; ?>
<script>
    function save_transaction(){
        $account="";$student="";$stf="";$selantqw="";
        var $datadf=$("#seaccnt").val();
        var $selstf=$("#staffslct").val();
        var $selstudent=$("#selectstud").val();
        var $selant=$("#selectamnt").val();
        if($datadf=="0"){
            $account="1";$("#eacnt").css("color", "red");
        }else{$account=""; $("#eacnt").css("color", "black");}

        if($selant=="0" || $selant==""){
            $selantqw="1";$("#eacntc").css("color", "red");
        }else{$selantqw="";$("#eacntc").css("color", "black");}

        if($("#Student").is(":checked")){
            if($selstudent=="0"){
                $student="1";$("#eacnta").css("color", "red");
            }else{$student="";$("#eacnta").css("color", "black");}
        }

        if($("#Staff").is(":checked")){
            if($selstf=="0"){
                $selstf="1";$("#eacntb").css("color", "red");
            }else{$student="";$("#eacntb").css("color", "black");}
        }

        if($account=="" && $student=="" && $stf=="" && $selantqw==""){
            $.ajax({
                url: "<?php echo BASEURL.'/account/save_transaction' ?>", 
                type: "POST",
                beforeSend:function(){
                    $("#loadingProgressG").show();
                },
                data: $("#form1").serialize(),
                success: function(result){
                    $("#loadingProgressG").hide();
                    if(result=="Succesfull"){
                        $(".alert-danger").show();
                        $(".alert-success").hide();
                    }
                    else{
                        $(".alert-danger").hide();
                        $(".alert-success").show();
                    }
                }
            });
        }
    }

    $("#staffslct").change(function() {
        $data=$(this).val();
        if($data!="0"){
            var nameArr = $data.split(',');
            $('#address').prop("value", nameArr[1]);
            $('#contact').prop("value", nameArr[2]);
        }
        else{
            $('#address,#contact').prop("value", null);
        }
    });

    $("#selectstud").change(function() {
        $data=$(this).val();
        if($data!="0"){
            var nameArr = $data.split(',');
            $tofee=nameArr[4];
            $hosfee=nameArr[5];
            $busfee=nameArr[6];
            $ptofee=0;
            $phosfee=0;
            $pbusfee=0;
            $('#fathername').prop("value", nameArr[1]);
            $('#address').prop("value", nameArr[2]);
            $('#contact').prop("value", nameArr[3]);
            $('#totalfee').text("₹ "+$tofee);
            $('#ptotalfee').text("₹ "+$ptofee);
            $('#rtotalfee').text("₹ "+($tofee-$ptofee));

            $('#busfee').text("₹ "+$busfee);
            $('#pbusfee').text("₹ "+$pbusfee);
            $('#rbusfee').text("₹ "+($busfee-$pbusfee));

            $('#hostfee').text("₹ "+$hosfee);
            $('#postfee').text("₹ "+$phosfee);
            $('#rhostfee').text("₹ "+($hosfee-$phosfee));

            if($busfee==0){$("#bbfee").hide();}else{$("#bbfee").show();}
            if($hosfee==0){$("#hhfee").hide();}else{$("#hhfee").show();}
            $(".arfee").show();
        }
        else{
            $(".arfee").hide();
            $('#fathername,#address,#contact').prop("value", null);
        }
    });


    $("#payment_mode").change(function() {
        $data=$(this).val();
        if($data=="Cash"){
            $("#bankname,#acno,#checkno").hide();
        }
        else if($data=="Check"){
            $("#acno").hide();
            $("#bankname,#checkno").show();
        }
        else{
            $("#checkno").hide();
            $("#bankname,#acno").show();
        }
    });
    $("input[type=radio]").change(function(){
        if ($(this).is(':checked'))
        {
            $data=$(this).val();
            if($data=="Student"){
                $("#payfor,#studlist,#fadname").show();
                $("#advance,#stafflist,#pname").hide();
                $('#address,#contact').prop("readonly", true);
            }
            else if($data=="Staff"){
                $("#advance,#stafflist").show();
                $("#payfor,#studlist,#fadname,#pname").hide();
                $('#address,#contact').prop("readonly", true);
                $(".arfee").hide();
            }
            else{
                $("#pname").show();
                $("#advance,#stafflist,#payfor,#studlist,#fadname").hide();
                $('#address,#contact').prop("readonly", false);
                $(".arfee").hide();
            }
        }
    });
</script>