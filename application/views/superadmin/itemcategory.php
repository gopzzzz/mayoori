
 <?php $data['leftmenu']='itemcategorycreation'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Item Category<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'itcate';?>">Item Category</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('itcate');?>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Item Category</h4>
							</div>
							
                            <div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Item Group</label>
								<select name="itemgrp" class="form-control">
									  <option value="0">Select</option>
									   <?php foreach($itgp as $key3){ ?>
										 <option value="<?php echo $key3->ig_id;?>"><?php echo $key3->ig_name;?></option>
									<?php } ?>
								</select>
							</div>
							 <div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Item Category Name</label>
								<input type="text" class="form-control" name="itemcatename" Placeholder="Enter Value" required />
							</div>
							 <div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Item Category Code</label>
								<input type="text" class="form-control" name="itemcatecode" Placeholder="Enter Value" required />
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
              <h3 class="box-title">Item Category Details</h3>
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
				  <th>Item Group </th>
				  <th>Item Category Name</th>
				  <th>Item Category Code</th>
                  <th>Action</th>
                </tr>
				</thead>
				<?php
			$i=1;
			foreach($itcat as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->ig_name;?></td>
				  <td><?php echo $key->itcat_name;?></td>
				   <td><?php echo $key->itcat_code;?></td>
				                    
                  <td><?php echo anchor('del_itcate/'.$key->itcat_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->itcat_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
			
					
				<div class="modal fade" id="myModal2<?php echo $key->itcat_id;?>" role="dialog">
				
					<div class="modal-dialog">
					 <?php
    $id=$key->itcat_id;
    $edit_itcat=$this->Admin_model->itemcategory_edit($id);
    foreach($edit_itcat as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<?php echo form_open_multipart('itcate');?>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Item Group Edit</h4>
							</div>
							<input type="hidden" class="form-control" name="itcat_id" value="<?php echo $key2->itcat_id;?>"/>
							 <div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Item Group</label>
								<select name="itemgrp" class="form-control">
									  <option value="0">Select</option>
									   <?php foreach($itgp as $key4){ ?>
										 <option value="<?php echo $key4->ig_id;?>"<?php if($key2->itcat_grp==$key4->ig_id){echo 'selected';}?>><?php echo $key4->ig_name;?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Item Group Name</label>
								<input type="text" class="form-control" name="itcatname" value="<?php echo $key2->itcat_name;?>"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Item Group Code</label>
								<input type="text" class="form-control" name="itcatcode" value="<?php echo $key2->itcat_code;?>"/>
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

