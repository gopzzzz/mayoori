
 <?php $data['leftmenu']='ledgercreation'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Ledger Creation<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'ledger';?>">Ledger Creation</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:80%;">
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('ledger');?>>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Ledger Creation</h4>
							</div>
							<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Ledger Details</h4>
							  <hr>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name"  onkeyup="fullnamefunction()" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Payment Type</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio" name="paytype" value="1">Debit
								<input type="radio" name="paytype" value="2">Credit
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Notes</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="notes" onkeyup="addressfunction()"  id="note"></textarea>
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								
								</div>
								
							</div>
							<div class="col-sm-6" >
							
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Account Group</h4>
							  <hr>
							    
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Account Group Details</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="hidden" class="form-control" name="acc_group" id="ac_group_id">
								<input type="text" class="form-control" id="ac_group" placeholder="Enter Accout Group"  >
								<div id="ac_grouplist"></div>
								</div>
								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Financial Year Details</h4>
							  <hr>
							    <!--<div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" onkeyup="panfunction()" id="pan" >
								</div>-->
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Financial Year</label>
								</div>
								<div class="form-group col-sm-8">
								<select class="form-control" name="year">
								<option>Select Financial Year</option>
								<?php foreach($fyear as $key1){ ?>
								<option value="<?php echo $key1->fy_id;?>"><?php echo $key1->fn_year;?></option>
								<?php } ?>
								</select>
								</div>
								</div>

								
						
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
              <h3 class="box-title">Ledger Creation</h3>
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
				  <th>Name</th>
				  <th>Account Group</th>
				  <th>Opening Balance</th>
				  <th>Financial Year</th>
				  <th>Notes</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($ledgr as $key2){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key2->le_name;?></td>
				  <td><?php echo $key2->ag_name;?></td>
				   <td><?php echo $key2->le_opbalance;?></td>
					 <td><?php echo $key2->fn_year;?></td>
					  <td><?php echo $key2->le_notes;?></td>
				                    
                  <td><?php echo anchor('del_ledger/'.$key2->le_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key2->le_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key2->le_id;?>" role="dialog">
				
					<div class="modal-dialog" style="width:80%;">
					 <?php
    $id=$key2->le_id;
    $edit_area=$this->Admin_model->ledger_edit($id);
    foreach($edit_area as $key3){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('ledger');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Ledger Creation</h4>
							</div>
							<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Ledger Details</h4>
							  <hr>
							  <input type="hidden" class="form-control" name="lgd_id" value="<?php echo $key3->le_id;?>"/>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control ledgername" name="name" value="<?php echo $key3->le_name;?>"  id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" value="<?php echo $key3->le_opbalance;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Notes</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="notes"  id="add"><?php echo $key3->le_notes;?></textarea>
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								
								</div>
								
							</div>
							<div class="col-sm-6" >
							
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Account Group Details</h4>
							  <hr>
							    
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Account Group </label>
								</div>
								<div class="form-group col-sm-8">
								<input type="hidden" class="form-control" name="acc_group" id="acgp_id_edit<?php echo $key3->le_id;?>" data-value="<?php echo $key3->le_id;?>">
							    <input type="text" class="form-control accountgp"  id="acgp_edit<?php echo $key3->le_id;?>" data-value="<?php echo $key3->le_id;?>" value="<?php echo $key3->ag_name;?>"/>
							    <div id="ac_grouplist<?php echo $key3->le_id;?>"></div>
								</div>
								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Financial Year Details</h4>
							  <hr>
							    <!--<div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" onkeyup="panfunction()" id="pan" >
								</div>-->
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Financial Year</label>
								</div>
								<div class="form-group col-sm-8">
								<select class="form-control" name="year">
								<?php foreach($fyear as $key6){?>
								<option value="<?php echo $key6->fy_id;?>"<?php if($key3->le_fyear==$key6->fy_id){echo 'selected';}?>><?php echo $key6->fn_year;?></option>
								<?php } ?>
								</select>
								</div>
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
 
  var fn = document.forms["myForm"]["name"].value;
  var letters  = /^[A-Z\s]+$/;
  var fn_count=fn.length;
  if(fn.match(letters) || fn_count==0 ){

  }
  	else{
        alert("Capital letters only");
        return false;
  	}
    var add=document.forms["myForm"]["notes"].value;
    var letters1 = /^[A-Z\s(,)]+$/;
    var note_count=add.length;
    if(add.match(letters) || note_count==0 ){

   }
  	else{
        alert("Capital letters only");
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






function fullnamefunction(){
	var name=document.getElementById("fullname").value;
	var namecount=name.length;
	var letters = /^[A-Z\s]+$/;

	if(name.match(letters) || namecount==0){
     document.getElementById("fullname").style.color = "black";
     document.getElementById("fullname").style.border = "1px solid #d2d6de";
	}
	else {
		 document.getElementById("fullname").style.color = "red";
		 document.getElementById("fullname").style.border = "2px solid red";

	}

}
function addressfunction(){
	var address=document.getElementById("note").value;
	var addcount=address.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(address.match(letters) || addcount==0){
     document.getElementById("note").style.color = "black";
     document.getElementById("note").style.border = "1px solid #d2d6de";
	
	}
	else {
		document.getElementById("note").style.color = "red";
		document.getElementById("note").style.border = "2px solid red";
	}
           
}
$('.ledgername').keyup(function(){
	var ledname=$(this).val();
	var lednamecount=ledname.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(ledname.match(letters) || (lednamecount==0)){
		$('.ledgername').css("border","1px solid #d2d6de");
		$('.ledgername').css("color","black");
	}
	else{
		$('.ledgername').css("border","2px solid red");
		$('.ledgername').css("color","red");
	}
	//alert(namecount);
});
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

