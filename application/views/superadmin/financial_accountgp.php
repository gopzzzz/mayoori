
  <?php $data['leftmenu']='financial';  echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Financial Account Group Creation<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'faccgp';?>">Financial Account Group Creation</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:50%;">
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('faccgp');?>>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Financial Account Group Creation</h4>
							</div>
								
							  
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > 
								<label for="exampleInputEmail1">Account Name </label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="aname" onkeyup="fullnamefunction2()" id="fullname2" placeholder="Enter Account Name" data-toggle="tooltip" title="Use Capital Letters Only">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Account Group</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="hidden" class="form-control" id="ac_group_id" name="acgp">
								<input type="text" class="form-control" id="ac_group" placeholder="Search Account  Group">
								<div id="ac_grouplist"></div>
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								
							
								
							
                            
							

								
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
              <h3 class="box-title">Financial Account Group Creation</h3>
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
              <table id="example2" class="table table-hover">
			  <thead>
                <tr>
				
                  <th>#</th>
				  <th>Account Name</th>
				  <th>Account Group</th>
				  <th>Action</th>
                 
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($faccgp as $key2){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key2->fag_name;?></td>
				  <td><?php echo $key2->ag_name;?></td>
				                    
                  <td><?php echo anchor('del_faccgp/'.$key2->fag_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key2->fag_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key2->fag_id;?>" role="dialog">
				
					<div class="modal-dialog" style="width:50%;">
					 <?php
    $id=$key2->fag_id;
    $edit_area=$this->Admin_model->faccountgp_edit($id);
    foreach($edit_area as $key3){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('faccgp');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Financial Account Group Creation</h4>
							</div>
							
							
							  
							  <input type="hidden" class="form-control" name="fag_id" value="<?php echo $key3->fag_id;?>"/>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > 
								<label for="exampleInputEmail1">Account Name </label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="aname" value="<?php echo $key3->fag_name;?>" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Account Group</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="hidden" class="form-control" id="acgp_id_edit<?php echo $key3->fag_id;?>" data-value="<?php echo $key3->fag_id;?>" name="acgp">
								<input type="text" class="form-control accountgp" id="acgp_edit<?php echo $key3->fag_id;?>" data-value="<?php echo $key3->fag_id;?>" value="<?php echo $key3->ag_name;?>">
								<div id="ac_grouplist<?php echo $key3->fag_id;?>"></div>
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								
								
							

							
							
							
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
<script>
$('#ac_group').keyup(function(){	
			//alert("success");
			// exit;
			var customer=$('#ac_group').val();
			
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_account_group');?>',
						data: { search : customer},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#ac_grouplist').show();
									$('#ac_grouplist').html(res);
								}else{
									$('#ac_grouplist').html("");
								}
							},
					});	
				}
				else{
					$('#ac_grouplist').html("");
				}	
				
				
	});
		$("html").on('click','.subSelect1',function(){
		var acgpname = $(this).closest('tr').find('#id_SCR').val();
		
		var acgpid = $(this).closest('tr').find('#fff').val();
		
		
		
		
		$('#ac_group').val(acgpname);
		$('#ac_group_id').val(acgpid);
		
		
		$('#ac_grouplist').hide();	
		
	});
	
	//edit
	
	$('.accountgp').keyup(function(){	
			//alert("success");
			// exit;
			var id=$(this).data('value');
			var customer=$(this).val();
			
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_account_groupedit');?>',
						data: { search : customer,id:id},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#ac_grouplist'+id).show();
									$('#ac_grouplist'+id).html(res);
								}else{
									$('#ac_grouplist'+id).html("");
								}
							},
					});	
				}
				else{
					$('#ac_grouplist'+id).html("");
				}	
				
				
	});
		$("html").on('click','.subSelect2',function(){
		var sid=$(this).data('value');
		var id=$(this).data('id');
		var acgpname = $(this).closest('tr').find('#id_SCR'+sid).val();
		
		var acgpid = $(this).closest('tr').find('#fff'+sid).val();
		
		
		
		
		$('#acgp_edit'+id).val(acgpname);
		$('#acgp_id_edit'+id).val(acgpid);
		
		
		$('#ac_grouplist'+id).hide();	
		
	});
	
	
</script>
<script>
function validateForm() {
var acname=document.getElementById("fullname2").value;
var acnamecount=acname.length;
var letters = /^[A-Z\s(,)]+$/;
if(acname.match(letters) || acnamecount==0 ){

}
else{
	alert("Account Name in capital letters only");
	return false;
}
}
function validateFormedit() {
  var x = document.forms["myForm_edit"]["gst"].value;
 
  var count_gst=x.length;
  
  if (count_gst !== 15) {
    alert("GST number is invalid");
    return false;
  }
 
}



function fullnamefunction2(){
	var address=document.getElementById("fullname2").value;
	var addcount=address.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(address.match(letters) || addcount==0){
     document.getElementById("fullname2").style.color = "black";
     document.getElementById("fullname2").style.border = "1px solid #d2d6de";
	
	}
	else {
		document.getElementById("fullname2").style.color = "red";
		document.getElementById("fullname2").style.border = "2px solid red";
	}
           
}

</script>

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

