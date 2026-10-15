
 <?php $data['leftmenu']='hnscodecreation'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">HSN Code<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'hsn';?>">HSN Code</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('hsn');?>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">HSN Code Creation</h4>
							</div>
							<input type="hidden" class="form-control" name="cg_id"  />
                            <div class="form-group col-sm-6">
								<label for="exampleInputEmail1">HSN Code</label>
								<input type="text" class="form-control" name="code" Placeholder="Enter Code " required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Tax%</label>
								<input type="text" class="form-control" name="tax" Placeholder="Enter Percentage " required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">CGST</label>
								<input type="text" class="form-control" name="cgst" Placeholder="Enter CGST " required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">SGST</label>
								<input type="text" class="form-control" name="sgst" Placeholder="Enter SGST " required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">IGST</label>
								<input type="text" class="form-control" name="igst" Placeholder="Enter IGST " required />
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
              <h3 class="box-title">HSN Code Creation</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
                <!--<div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
			  <thead>
                <tr>
                  <th>#</th>
				  <th>HSN Code</th>
				  <th>Tax%</th>
				  <th>CGST</th>
				  <th>SGST</th>
				  <th>IGST</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($hsn as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->hsn_code;?></td>
				  <td><?php echo $key->hsn_tax;?></td>
                  <td><?php echo $key->hsn_cgst;?></td>
                  <td><?php echo $key->hsn_sgst;?></td>
                  <td><?php echo $key->hsn_igst;?></td>				  
                  <td><?php echo anchor('del_hsn/'.$key->hsn_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->hsn_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key->hsn_id;?>" role="dialog">
				
					<div class="modal-dialog">
					
					 <?php
    $id=$key->hsn_id;
    $edit_area=$this->Admin_model->hsn_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<?php echo form_open_multipart('hsn');?>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">HSN Code Creation</h4>
							</div>
							<input type="hidden" class="form-control" name="hsn_id" value="<?php echo $key2->hsn_id;?>"/>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">HSN Code</label>
								<input type="text" class="form-control" name="code" value="<?php echo $key2->hsn_code;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Tax%</label>
								<input type="text" class="form-control" name="tax" value="<?php echo $key2->hsn_tax;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">CGST</label>
								<input type="text" class="form-control" name="cgst" value="<?php echo $key2->hsn_cgst;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">SGST</label>
								<input type="text" class="form-control" name="sgst" value="<?php echo $key2->hsn_sgst;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">IGST</label>
								<input type="text" class="form-control" name="igst" value="<?php echo $key2->hsn_igst;?>"/>
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

