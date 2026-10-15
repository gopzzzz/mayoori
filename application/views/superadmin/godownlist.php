
   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">GODOWN LIST<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">GODOWN LIST</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      
		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">GODOWN LIST</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
             <a href="<?php echo base_url('regofgoddown');?>"> <button type="submit" class="btn btn-default">Back</button></a>
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
                  <th>REG.NO</th>
				  <th>NAME</th>
				  <th>PHONE NUM</th>
				  <th>EMAIL</th>
				  <th>ADDRESS</th>
				  <th>PAN NUM</th>
                  <th>GST</th>
                  <th>GODOWN NUM</th>
				  <th>Action</th>
				
                  
                </tr>
				</thead>
				<tbody>

        <?php 
        $i=1;
        foreach($godownlist as $key){?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->registration_num;?></td>
				  <td><?php echo $key->name;?></td>
				   <td><?php echo $key->phonenum;?></td>
					 <td><?php echo $key->email;?></td>
					  <td><?php echo $key->address;?></td>
                      <td><?php echo $key->pan_num;?></td>
                      <td><?php echo $key->gst_num;?></td>
                      <td><?php echo $key->goddownum;?></td>         
                  <td><?php echo anchor('del_godownlist/'.$key->godownid  ,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>
				  <li class="fa fa-pencil" data-toggle="modal" data-target="#myModal2<?php echo $key->godownid;?>"></li></li>
				 </td>
                </tr>
				
				
				<!------------------------------------------------------------------------------------------------------->
				
				<div class="modal fade" id="myModal2<?php echo $key->godownid;?>" role="dialog">
				
					<div class="modal-dialog" style="width:80%;">
					 <?php
    $id=$key->godownid;
    $edit_area=$this->Admin_model->godownlist_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm" <?php echo form_open_multipart('godownlist');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Godown</h4>
							</div>
							<div class="row col-sm-12">
                                	     
                                		 <div class="row col-sm-6">
                                		 	<br>
											<input type="hidden" class="form-control" name="godn_id" value="<?php echo $key2->godownid;?>"/>
                                		    <div class="col-sm-3">
								         	<label class="exampleInputEmail1" >Name</label>
								         	</div>
								         	<div class="form-group col-sm-9">
								         	<input type="text" class="form-control" name="name1" value="<?php echo $key2->name;?>" id="fullname">
								    		</div>
											
											<div class="col-sm-3">
								            <label class="exampleInputEmail1" >Address</label>
								         	</div>
								         	<div class="form-group col-sm-9">
								         	<textarea class="form-control" name="address1"  id="fullname"><?php echo $key2->address;?></textarea>
								    		</div>

								    		
								    		<div class="col-sm-3">
								         	<label class="exampleInputEmail1" >Phone Number</label>
								         	</div>
								         	<div class="form-group col-sm-9">
								         	<input type="text" class="form-control" name="phnum1" value="<?php echo $key2->phonenum;?>" >
								    		</div>
											<div class="col-sm-3">
                                            <label class="exampleInputEmail1" >Email</label>
                                            </div>
                                            <div class="form-group col-sm-9">
                                            <input class="form-control" name="email1" value="<?php echo $key2->email;?>">
                                            </div>
										</div>

								   


                                	    <div class="row col-sm-6" >
                                	        <br>
                                		 	
								    		<div class="col-sm-3">
                                            <label class="exampleInputEmail1" >GST Number</label>
                                            </div>
                                            <div class="form-group col-sm-9">
                                            <input class="form-control" name="gst1" value="<?php echo $key2->gst_num;?>">
                                            </div>
								     		<div class="col-sm-3">
                                            <label class="exampleInputEmail1" >PAN Number</label>
                                            </div>
                                            <div class="form-group col-sm-9">
                                            <input class="form-control" name="pan1" value="<?php echo $key2->pan_num;?>">
                                            </div>
								    		<div class="col-sm-3">
                                            <label class="exampleInputEmail1" >Date</label>
                                            </div>
                                            <div class="form-group col-sm-9">
                                            <input class="form-control" name="date1" type="text" value="<?php echo date('Y-m-d');?>" readonly>
                                            </div>
											<div class="col-sm-3">
                                            <label class="exampleInputEmail1" >Registration No</label>
                                            </div>
                                            <div class="form-group col-sm-9">
                                            <input class="form-control" name="refno" value="<?php echo $key2->registration_num;?>">
                                            </div>
										    <div class="col-sm-3 labeltext divtext">
                                            <label>Godown No</label>
                                            </div>
                                            <div class="col-sm-3 divtext">
                                            <input class="form-control" name="godownno1" value="<?php echo $key2->goddownum;?>">
                                            </div>


                                	</div>


							
							
							
							<!--<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Opening Balance</label>
								<input type="text" class="form-control" name="opbal" Placeholder="Enter Opening Balance" required />
							</div>-->
							
								</div>
							
							
							

							
							<div class="modal-footer">
								<button type="submit" name="submit_edit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
						</form>
					</div>
					
		</div>
				
        <?php $i++; } ?>
				
				
	
               
                
              
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

