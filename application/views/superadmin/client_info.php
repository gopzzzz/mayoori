
  <?php echo $this->load->view('common/leftmenu','null',true);?>

  <!-- Content Wrapper. Contains page content -->
  

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Client Information<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Client Information</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog" >
					<div class="modal-dialog " style="width:80%;">
						<!-- Modal content-->
						<?php echo form_open_multipart('catg');?>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Item Category Creation</h4>
							</div>
						  
							<div>
							
                            <div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;">
							  <h4 class="text-success">Client Details</h4>
							  <hr>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Full Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Billing Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="cus_add"></textarea>
								</div>
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" >
								</div>
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email Id</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="email" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="phnum" >
								</div>
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Customer Photo</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="file" class="form-control" name="userfile" >
								</div>
								</div>
								
							</div>
							<div class="col-sm-6" >
							
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;">
								<h4 class="text-success">Account Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">Type</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio" name="crde" >Debit
								<input type="radio" name="crde" >Credit
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" >
								</div>
								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Tax Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="gst" >
								</div>
								</div>

								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Customer Code</h4>
							  <hr>
							   
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="code" >
								</div>
								
							</div>
						
							</div>
							

								
							<div class="modal-footer" >

								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
					</div>
		</div>
		
<!--<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Item Category Creation</h3>
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
            <!--<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
				  <th>Category</th>
				  <th>Action</th>
                  
                </tr>
				
				<?php
			$i=1;
			foreach($catg as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->cat_name;?></td>
				                    
                  <td><?php echo anchor('del_catg/'.$key->cat_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->cat_id;?>">Edit</button>
				 </td>
                </tr>-->
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key->cat_id;?>" role="dialog">
				
					<div class="modal-dialog">
					 <?php
    $id=$key->cat_id;
    $edit_area=$this->Admin_model->category_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<?php echo form_open_multipart('catg');?>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Category Creation</h4>
							</div>
							<input type="hidden" class="form-control" name="cat_id" value="<?php echo $key2->cat_id;?>"/>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Category Year</label>
								<input type="text" class="form-control" name="name" value="<?php echo $key2->cat_name;?>"/>
							</div>
							
							
							
							<div class="modal-footer">
								<button type="submit" name="submit_edit" class="btn btn-primary">Submit</button>
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


<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/dbjs/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
       dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5'
        ]
    })
  })
</script>

 

</body>

</html>

