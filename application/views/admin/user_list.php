
  <?php echo $this->load->view('common/leftmenu','null',true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Registration List<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Registration List</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
     
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registration List</h3>
			  

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
				  <th>Register Date</th>
				  
				  <th>Member Name</th>
				  <th>DOB</th>
				  <th>District</th>
				  <th>Father’s/Husband’s name</th>
				  <th>Communication address</th>
				  <th>Phone Number</th>
				  <th>Photo</th>
				  <th>View</th>
                 
				 
                  
                </tr>
				
				<?php
				$i=1;
				foreach($user as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->reg_date;?></td>
				  
				  <td><?php echo $key->name;?></td>
				   <td><?php echo $key->dob;?></td>
				    <td><?php echo $key->committe;?></td>
					 <td><?php echo $key->father_or_hus_name;?></td>
					  <td><?php echo $key->com_add;?></td>
					   <td><?php echo $key->phone_num;?></td>
					    <td><img src="<?php echo base_url('uploads/members/').$key->photo;?>" width="100"></td>
                 <td><li class="fa fa-eye" data-toggle="modal" data-target="#myModal3<?php echo $key->membership_id;?>"></li></td>

                </tr>
				
				
				
				<!--------------------------------------------------------->
				
					
				<div class="modal fade" id="myModal3<?php echo $key->membership_id;?>" role="dialog">
				
					<div class="modal-dialog">
					  <?php
    $id=$key->membership_id;
    $sta=$this->Admin_model->get_edit_tbl_member_reg($id);
    foreach($sta as $key3){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<?php echo form_open_multipart('pen');?>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Quest View</h4>
							</div>
							<div class="form-group col-sm-6">
							<label>Name</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->name;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>District/Committe</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->committe;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Name</label>
							<input type="text" name="dist" class="form-control" value="<?php if($key3->sex==1){echo "Female";}else{echo "Male";};?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Father’s/Husband’s</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->father_or_hus_name;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Nationality</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->nationality;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Date Of Birth</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->dob;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Married Status</label>
							<input type="text" name="dist" class="form-control" value="<?php if($key3->m_status==1){echo "Married";}else{echo "Single";}?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Profession</label>
							<input type="text" name="dist" class="form-control" value="<?php if($key3->profession_coun==1){
								echo "Counsellor";
								
								}
								
								if($key3->profession_trainer==1){
									echo "Trainer";
									
									}
									
									if($key3->profession_coach==1){
										echo "Coach";
										
										}
										?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Permanent Address</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->per_add;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Communication Address</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->com_add;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Phone Number</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->phone_num;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>Email</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->email_id;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							<label>REgister Date</label>
							<input type="text" name="dist" class="form-control" value="<?php echo $key3->reg_date;?>" readonly>
							</div>
							<div class="form-group col-sm-6">
							
							<img src="<?php echo base_url('uploads/members/').$key3->photo;?>" width="150">
							</div>
							
							<div class="modal-footer">
								
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
					</div>
					
		</div>
				
	  
	  
	
               
                
                <?php
				$i++;
				}
				?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     
    </section>
	</div>
	<?php echo $this->load->view('common/footer','null',true);?>


<script>

  function deletechecked(){

  if(confirm("Do you really want to delete this apartment?")){



return true;



  } 

  else{

    

    return false;

  }

    

  }

  

 

  

  </script>

<!-- jQuery 3 -->

<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->

<script src="<?php echo base_url();?>admin_styles/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url();?>admin_styles/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url();?>admin_styles/dist/js/demo.js"></script>

 

</body>

</html>

