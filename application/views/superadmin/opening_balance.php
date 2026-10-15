
  <?php $data['leftmenu']='openingbal'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Opening Balance<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'opbal';?>">Opening Balance Registration</a></li>

      </ol>

    </section><br>

  

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:70%;">
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('opbal');?>>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Opening Balance Registration</h4>
							</div>
							
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > 
								<label for="exampleInputEmail1">Financial Year </label>
								</div>
								<div class="form-group col-sm-8">
								<select class="form-control" name="year">
								<option>Select Group</option>
								<?php foreach($fyear as $key1){ ?>
								<option value="<?php echo $key1->fy_id;?>"><?php echo $key1->fn_year;?></option>
								<?php } ?>
								</select>
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Amount</label>
								</div>
								<div class="form-group col-sm-8">
							    <input type="text" class="form-control" name="amount" Placeholder="Enter Amount"  />
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
              <h3 class="box-title">Opening Balance Creation</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
              <!--  <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table  id="example2" class="table table-hover">
			  <thead>
                <tr>
                  <th>#</th>
				  <th>Financial Year</th>
				  <th>Amount</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($opbal as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->fn_year;?></td>
				  <td><?php echo $key->obl_amount;?></td>
				                    
                  <td><?php echo anchor('del_opbal/'.$key->obl_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->obl_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key->obl_id;?>" role="dialog">
				
					<div class="modal-dialog" style="width:70%;">
					 <?php
    $id=$key->obl_id;
    $edit_area=$this->Admin_model->opbalance_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('opbal');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Opening Balance Creation</h4>
							</div>
							
							<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Opening Balance Details</h4>
							  <hr>
							  	<input type="hidden" class="form-control" name="obl_id" value="<?php echo $key2->obl_id;?>"/>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > 
								<label for="exampleInputEmail1">Financial Year </label>
								</div>
								<div class="form-group col-sm-8">
								<select class="form-control" name="year">
								<?php foreach($fyear as $key6){?>
								<option value="<?php echo $key6->fy_id;?>"<?php if($key2->obl_year==$key6->fy_id){echo 'selected';}?>><?php echo $key6->fn_year;?></option>
								<?php } ?>
								</select>
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Amount</label>
								</div>
								<div class="form-group col-sm-8">
							    <input type="text" class="form-control" name="amount" value="<?php echo $key2->obl_amount;?>"/>
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								
								</div>
								
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

