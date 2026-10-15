
  <?php echo $this->load->view('common/leftmenu','null',true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Account Category <small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Account Category</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('user_reg');?>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Membership Registration</h4>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Name Of Applicant</label>
								<input type="text" class="form-control" name="name" Placeholder="Enter Name of Applicant" required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">District</label>
								<select class="form-control" name="dist" required>
								<option value="0">Select</option>
								<option value="1">THIRUVANANTHAPURAM</option>
								<option value="2">KOLLAM</option>
								<option value="3">AALAPPUZHA</option>
								<option value="4">PATHANAMTHITTA</option>
								<option value="5">KOTTAYAM</option>
								<option value="6">IDUKKI</option>
								<option value="7">ERNAKULAM</option>
								<option value="8">THRISSUR</option>
								<option value="9">PALAKKAD</option>
								<option value="10">MALAPPURAM</option>
								<option value="11">KOZHIKODE</option>
								<option value="12">WAYANAD</option>
								<option value="13">KANNUR</option>
								<option value="14">KASARAGOD</option>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Sex</label>
								<br>
								<input type="radio" name="sex" value="1">Female
								<input type="radio" name="sex" value="2">Male
							</div>
							
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Father’s/Husband’s Name</label>
								<input type="text" class="form-control" name="fa_name" placeholder="Enter Father’s/Husband’s Name"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Nationality</label>
								<input type="text" class="form-control" name="nat" placeholder="Enter Nationality"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Date of Birth</label>
								<input type="date" class="form-control" name="dob" />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Marital Status</label>
								<br>
								<input type="radio" name="mst" value="1">Married
								<input type="radio" name="mst" value="2">Single
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Profession</label>
								<br>
								<input type="checkbox" name="coun" value="1">Counsellor
								<input type="checkbox" name="trai" value="1">Trainer
								<input type="checkbox" name="coach" value="1">Coach
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Permanent Address</label>
								<textarea class="form-control" name="add" placeholder="Enter Permanent Address "></textarea>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Address for Communication</label>
								<textarea class="form-control" name="addcom" placeholder="Enter Address for Communication "></textarea>
							</div>
							
								
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Enter Phone Number</label>
								<input type="text" name="phnum" placeholder="Enter Phone Number" class="form-control" required>
								</div>
								<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Enter Email Id</label>
								<input type="email" name="email" placeholder="Enter Email id" class="form-control">
								</div>
								<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Upload Photo</label>
								<input type="file" name="userfile" class="form-control" required>
								</div>
							
							<div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
					</div>
		</div>
		
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registered members</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


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
				  <th>Member Name</th>
				  <th>DOB</th>
				  <th>District</th>
				  <th>Father’s/Husband’s name</th>
				  <th>Communication address</th>
				  <th>Phone Number</th>
				  <th>Photo</th>
                 
				  <th>Action</th>
                  
                </tr>
				
				<?php
				$i=1;
				foreach($user as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->name;?></td>
				   <td><?php echo $key->dob;?></td>
				    <td><?php if(($key->district)==1){
												echo "THIRUVANANTHAPURAM";
											}
											else if(($key->district)==2){
												echo "KOLLAM";
											}
											else if(($key->district)==3){
												echo "AALAPPUZHA";
											}
											else if(($key->district)==4){
												echo "PATHANAMTHITTA";
											}
											else if(($key->district)==5){
												echo "KOTTAYAM";
											}
											else if(($key->district)==6){
												echo "IDUKKI";
											}
											else if(($key->district)==7){
												echo "ERNAKULAM";
											}
											else if(($key->district)==8){
												echo "THRISSUR";
											}
											else if(($key->district)==9){
												echo "PALAKKAD";
											}
											else if(($key->district)==10){
												echo "MALAPPURAM";
											}
											else if(($key->district)==11){
												echo "KOZHIKODE";
											}
											else if(($key->district)==12){
												echo "WAYANAD";
											}
											else if(($key->district)==13){
												echo "KANNUR";
											}
											else if(($key->district)==14){
												echo "KASARAGOD";
											}
											?></td>
					 <td><?php echo $key->father_or_hus_name;?></td>
					  <td><?php echo $key->com_add;?></td>
					   <td><?php echo $key->phone_num;?></td>
					    <td><img src="<?php echo base_url('uploads/members/').$key->photo;?>" width="100"></td>
                 
                  <td><!--<?php echo anchor('member_edit/'.$key->membership_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?> --> 
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->membership_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				
					
				<div class="modal fade" id="myModal2<?php echo $key->membership_id;?>" role="dialog">
				
					<div class="modal-dialog">
					 <?php
    $id=$key->membership_id;
    $edit_area=$this->Admin_model->get_edit_tbl_member_reg($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<?php echo form_open_multipart('user_reg');?>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Membership Registration</h4>
							</div>
							<input type="hidden" class="form-control" name="mid" value="<?php echo $key2->membership_id;?>"/>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Name Of Applicant</label>
								<input type="text" class="form-control" name="name" value="<?php echo $key2->name;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">District</label>
								<select class="form-control" name="dist" required>
								<option value="0">Select</option>
								<option value="1">THIRUVANANTHAPURAM</option>
								<option value="2">KOLLAM</option>
								<option value="3">AALAPPUZHA</option>
								<option value="4">PATHANAMTHITTA</option>
								<option value="5">KOTTAYAM</option>
								<option value="6">IDUKKI</option>
								<option value="7">ERNAKULAM</option>
								<option value="8">THRISSUR</option>
								<option value="9">PALAKKAD</option>
								<option value="10">MALAPPURAM</option>
								<option value="11">KOZHIKODE</option>
								<option value="12">WAYANAD</option>
								<option value="13">KANNUR</option>
								<option value="14">KASARAGOD</option>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Sex</label>
								<br>
								<input type="radio" name="sex" value="1">Female
								<input type="radio" name="sex" value="2">Male
							</div>
							
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Father’s/Husband’s Name</label>
								<input type="text" class="form-control" name="fa_name" value="<?php echo $key2->father_or_hus_name;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Nationality</label>
								<input type="text" class="form-control" name="nat" value="<?php echo $key2->nationality;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Date of Birth</label>
								<input type="date" class="form-control"  value="<?php echo $key2->dob;?>" name="dob"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Marital Status</label>
								<br>
								<input type="radio" name="mst" value="1">Married
								<input type="radio" name="mst" value="2">Single
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Profession</label>
								<br>
								<input type="checkbox" name="coun" value="1">Counsellor
								<input type="checkbox" name="trai" value="1">Trainer
								<input type="checkbox" name="coach" value="1">Coach
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Permanent Address</label>
								<textarea class="form-control" name="add"><?php echo $key2->per_add;?></textarea>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Address for Communication</label>
								<textarea class="form-control" name="addcom"><?php echo $key2->com_add;?></textarea>
							</div>
							
								
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Enter Phone Number</label>
								<input type="text" name="phnum"  value="<?php echo $key2->phone_num;?>" class="form-control" >
								</div>
								<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Enter Email Id</label>
								<input type="email" name="email"  value="<?php echo $key2->email_id;?>" class="form-control">
								</div>
								<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Upload Photo</label>
								<input type="hidden" name="img"  value="<?php echo $key2->photo;?>">
								<input type="file" name="userfile" class="form-control">
								</div>
							
							<div class="modal-footer">
								<button type="submit" name="submit_edit1" class="btn btn-primary">Submit</button>
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

