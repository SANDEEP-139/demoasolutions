<?php include "components/header.php"; ?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area aeroheader2">
        <h3>Account Management</h3>
    </div>
    <?php print_r($this->flash("msg","alert alert-danger"));  ?>
    <?php print_r($this->flash("msgsuc","alert alert-success"));  ?>
    <!-- Breadcubs Area End Here -->

                <!-- Admit Form Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Bank Account Registration</h3>
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
                        <form class="new-added-form" action="<?php echo BASEURL; ?>/account/save_bank" method="POST">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label  <?php if(!empty($viewdata['holder_name_error'])): echo 'class="text-red"' ;endif; ?>>Account Holder Name *</label>
                                    <input type="text" id="holder_name" name="holder_name" value="<?php if(!empty($viewdata['holder_name'])): echo $viewdata['holder_name'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label <?php if(!empty($viewdata['account_number_error'])): echo 'class="text-red"' ;endif; ?>>Account Number *</label>
                                    <input type="text" name="account_number" value="<?php if(!empty($viewdata['account_number'])): echo $viewdata['account_number'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label <?php if(!empty($viewdata['bank_name_error'])): echo 'class="text-red"' ;endif; ?>>Bank Name *</label>
                                    <input type="text" name="bank_name" value="<?php if(!empty($viewdata['bank_name'])): echo $viewdata['bank_name'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Account Opning Balance</label>
                                    <input type="text" name="opning_balance" value="<?php if(!empty($viewdata['opning_balance'])): echo $viewdata['opning_balance'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Bank Branch Name</label>
                                    <input type="text" name="branch_name" value="<?php if(!empty($viewdata['branch_name'])): echo $viewdata['branch_name'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Bank IFSC Code</label>
                                    <input type="text" name="ifsc_code" value="<?php if(!empty($viewdata['ifsc_code'])): echo $viewdata['ifsc_code'] ;endif; ?>" placeholder="" class="form-control">
                                </div>
                                
                               
                                <div class="col-12 form-group mg-t-8">
                                    <button id="save" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button id="update" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">update</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->
</div>

<?php include "components/footer.php"; ?>
<script>

</script>
<script>
$.ajax({
				url: "<?php echo base_url('account/add_bank'); ?>",
				method:"POST",
				data:{id:id},
				dataType:"json",
				success:function(response)
                alert(response);
				{
					$('#id').val(response.id);
					$('#holder_name').val(response.holder_name);
                  
					$('#editMessage').val(response.account_number);
					$('#editAge').val(response.opning_balance);
                    $('#editAge').val(response.current_balance);
                    $('#editAge').val(response.bank_name);
                    $('#editAge').val(response.ifsc_code);
					
				}
			})
		}


           $(document).ready(function(){

                $("#save").click(function(){
              $("#update").show();
           });
               $("#update").click(function(){
               $("#save").hide();
               });
              });


		$("#editForm").submit(function(event) {
			event.preventDefault();
			$.ajax({
	            url: "<?php echo base_url('account/update_bank'); ?>",
	            data: $("#editForm").serialize(),
	            type: "post",
	            async: false,
	            dataType: 'json',
	            success: function(response){
	              
	                $('#editModal').modal('hide');
	                $('#editForm')[0].reset();
	                if(response==1)
	                {
	                	alert('Successfully updated');
	                }
	                else{
	                	alert('Updation Failed !');
	                }
	               $('#example1').DataTable().ajax.reload();
	              },
	           error: function()
	           {
	            alert("error");
	           }
          });
		});

</script>