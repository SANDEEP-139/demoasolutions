

<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Account Management</h3>
    </div>
    <!-- Breadcubs Area End Here -->

    
    <div class="row">
    <div class="col-6-xxxl col-xl-6">
        <div class="card account-settings-box height-auto">
            <div class="card-body">
                <div class="heading-layout1 mg-b-20">
                    <div class="item-title">
                        <h3>Income Details</h3>
                    </div>
                    <!-- <div class="dropdown">
                       <button type="button" onclick="addbtn('Main Subjects','Normal')" class="btn-fill-md radius-30 text-light bg-dark-pastel-green">Add<i class="fas fa-plus mg-l-15"></i></button>
                    </div> -->
                </div>
                
            <div class="table-responsive">
                <table class="table display data-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Detals</th>
                        </tr>
                    </thead>
                    <tbody id="da1">
                    <?php
                                $this->view2("ajax/allsubjects",$myModel,['wid'=>"20",'type'=>"Credit"]);
                    ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
        <div class="col-6-xxxl col-xl-6">
        <div class="col-12-xxxl col-xl-12">
            <div class="card account-settings-box">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-20">
                        <div class="item-title">
                            <h3>Expence Details</h3>
                        </div>
                        <!-- <div class="dropdown">
                            <button type="button" onclick="addbtn('Practical Subjects','Practical')" class="btn-fill-md radius-30 text-light bg-dark-pastel-green">Add<i class="fas fa-plus mg-l-15"></i></button>
                        </div> -->
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table display data-table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Detals</th>
                                </tr>
                            </thead>
                            <tbody id="da2">
                            <?php
                                $this->view2("ajax/allsubjects",$myModel,['wid'=>"20",'type'=>"Debit"]);
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close"><i class="fas fa-times-circle"></i></span>
    <form id="form1" class="form-group">
        <h3 id="heading">Main Subjects</h3>
        <input type="hidden" name="categ" id="categ" value=""/>
        <input type="hidden" name="subid" id="subid" value=""/>
        <hr>
        <input type="text" id="engname" name="engname" placeholder="Subject Name Eng" class="form-control">
        <hr>
        <input type="text" id="hndname" name="hndname" placeholder="Subject Name Hindi" class="form-control">
        <hr>
    </form>
    <button type="submit" id="submit" onclick="submit()" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Save</button>
  </div>
</div>
    

</div>

<?php include "components/footer.php"; ?>
<script>
function addbtn($tital,$catg) {
    $("#heading").html($tital);
    $("#categ").val($catg);
    modal.style.display = "block";
}
function submit(){
    if($("#submit").html()=="Update"){
        $.ajax({
            url: "<?php echo BASEURL.'/schoolinfo/update_subjects/' ?>", 
            type: "POST",
            beforeSend:function(){$("#loadingProgressG").show();},
            data: $("#form1").serialize(),
            success: function(result){
                modal.style.display = "none";
                $("#engname").val("");
                $("#hndname").val("");
                if($("#categ").val()=="Normal"){ $("#da1").html(result);}
                if($("#categ").val()=="Practical"){ $("#da2").html(result);}
                if($("#categ").val()=="Other"){ $("#da3").html(result);}
                $("#loadingProgressG").hide();
            }
        });
    }
    else{
        $.ajax({
            url: "<?php echo BASEURL.'/schoolinfo/add_subjects/' ?>", 
            type: "POST",
            beforeSend:function(){$("#loadingProgressG").show();},
            data: $("#form1").serialize(),
            success: function(result){
                modal.style.display = "none";
                $("#engname").val("");
                $("#hndname").val("");
                if($("#categ").val()=="Normal"){ $("#da1").html(result);}
                if($("#categ").val()=="Practical"){ $("#da2").html(result);}
                if($("#categ").val()=="Other"){ $("#da3").html(result);}
                $("#loadingProgressG").hide();
            }
        });
    }
}
function update($catg,$id,$ensub,$hnsub) {
    if($catg=="Normal"){$("#heading").html("Main Subjects");}
    if($catg=="Practical"){$("#heading").html("Practical Subjects");}
    if($catg=="Other"){$("#heading").html("Other Subjects");}
    $("#categ").val($catg);
    $("#engname").val($ensub);
    $("#hndname").val($hnsub);
    $("#subid").val($id);
    $("#submit").html("Update");
    modal.style.display = "block";
}
function deleted($catg,$id) {
    $.ajax({
        url: "<?php echo BASEURL.'/schoolinfo/delete_subjects/' ?>", 
        type: "POST",
        beforeSend:function(){$("#loadingProgressG").show();},
        data: {subid:$id,categ:$catg},
        success: function(result){
            if($catg=="Normal"){ $("#da1").html(result);}
            if($catg=="Practical"){ $("#da2").html(result);}
            if($catg=="Other"){ $("#da3").html(result);}
            $("#loadingProgressG").hide();
        }
    });
}


var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

