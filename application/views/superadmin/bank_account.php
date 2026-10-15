
   <?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Bank Account Creation<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'bank_account';?>">Bank Account Creation</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:80%;">
						<!-- Modal content-->

						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('bank_account');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Bank Account Creation</h4>
							</div>
								<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Holder Details</h4>
							  <hr>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > A/C Holder Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name" onkeyup="fullnamefunction()" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="phnum" onkeyup="myFunction1()" id="phnum1">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="email" onkeyup="emailfuncion()"  id="em">
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
								<h4 class="text-success">Account Details</h4>
							  <hr>
							   <div class="col-sm-4">
								<label class="exampleInputEmail1" > Bank Name</label>
								</div>
								<div class="form-group col-sm-8">
								    <select name="bank_name" class="form-control">
									  <option value="">Select Bank</option>
									  <?php foreach($bank as $bankname): ?>
									   <option value="<?php echo $bankname->bank_id;  ?>"><?php echo $bankname->bank_name;  ?></option>
									  <?php endforeach; ?>
									</select>
								</div>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1" > Branch</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="branch"  onkeyup="branchfunction()" id="branch_id">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C No.</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ac_no" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">IFSC</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ifsc" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > A/C Type</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio"  name="type" value="1"/>Savings A/C
								<input type="radio"  name="type" value="2"/>Current A/C
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C Opening Date</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="date" class="form-control" name="opdate" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" id="em">
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
              <h3 class="box-title">Bank Account Creation</h3>
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
				  <th>A/C Holder Name</th>
				  <th>A/C No.</th>
				  <th>Branch</th>
				  <th>IFSC</th>
				  <th>Phone Number</th>
				  <th>Email</th>
				  <th>A/C Type</th>
				  <th>A/C Opening Date</th>
				  <th>Opening Balance</th>
                 
				  <th>Action</th>
				
                  
                </tr>
				  </thead>
				<?php
			$i=1;
			foreach($baccount as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->ba_holdname;?></td>
				   <td><?php echo $key->ba_acnumber;?></td>
					 <td><?php echo $key->ba_branch;?></td>
					  <td><?php echo $key->ba_ifsc;?></td>
					   <td><?php echo $key->ba_phnumber;?></td>
					   <td><?php echo $key->ba_email;?></td>
				  <td><?php echo $key->ba_actype;?></td>
				   <td><?php echo $key->ba_opdate;?></td>
					 <td><?php echo $key->ba_opbalance;?></td>                
                  <td><?php echo anchor('del_baccount/'.$key->ba_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->ba_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key->ba_id;?>" role="dialog">
				
					<div class="modal-dialog" style="width:80%;">
					 <?php
    $id=$key->ba_id;
    $edit_area=$this->Admin_model->baccount_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('bank_account');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Bank Account Registration</h4>
							</div>
							  <div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Holder Details</h4>
							  <hr>
							  <input type="hidden" class="form-control" name="ba_id" value="<?php echo $key2->ba_id;?>"/>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > A/C Holder Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control bankacname" name="name" value="<?php echo $key2->ba_holdname;?>" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control bankphnum" name="phnum" value="<?php echo $key2->ba_phnumber;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control bankemail" name="email" value="<?php echo $key2->ba_email;?>" id="em">
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
								<h4 class="text-success">Account Details</h4>
							  <hr>
							   <div class="col-sm-4">
								<label class="exampleInputEmail1" > Bank Name</label>
								</div>
								<div class="form-group col-sm-8">
								    <select name="bank_name" class="form-control">
									  
									  <?php foreach($bank as $bankname): ?>
									   <option value="<?php echo $bankname->bank_id; ?>" <?php if($key2->ba_bank_id==$bankname->bank_id){ echo 'Selected';} ?>><?php echo $bankname->bank_name;  ?></option>
									  <?php endforeach; ?>
									</select>
								</div>
							    
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > Branch</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control bankbranch" name="branch" value="<?php echo $key2->ba_branch;?>" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C No.</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ac_no" value="<?php echo $key2->ba_acnumber?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">IFSC</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ifsc" value="<?php echo $key2->ba_ifsc;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > A/C Type</label>
								</div>
								<div class="form-group col-sm-8">
                                <input type="radio"  name="crde" value="1" <?php if($key2->ba_actype==1) {?> checked=checked <?php } ?>  />Savings A/C
								<input type="radio"  name="crde" value="2" <?php if($key2->ba_actype==2) {?> checked=checked <?php } ?> />Current A/C
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C Opening Date</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="date" class="form-control" name="opdate" value="<?php echo $key2->ba_opdate;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" value="<?php echo $key2->ba_opbalance;?>" id="em">
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
function validateForm() {
  
  var fn = document.forms["myForm"]["name"].value;
  var letters  = /^[A-Z\s]+$/;
  var fn_count=fn.length;
  if(fn.match(letters) || fn_count==0){

  }
  else{
  	alert("Enter Name capital letters only");
  	return false;
  }
  var pnum=document.forms["myForm"]["phnum"].value;
  var pnum_count=pnum.length;
  if(pnum_count==10 || pnum_count==0 ){

  }
  else{
  	alert("You enter incorrect phone number check it");
  	return false;
  }
  var eml=document.forms["myForm"]["email"].value;
  var em1_count=eml.length;
  var letters2 =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(eml.match(letters2) || em1_count==0){

  }
  	else{
  	alert("You Enter incorrect email ");
  	return false;
  	}
  var branch=document.forms["myForm"]["branch_id"].value;
  var branch_count=branch.length;
  if(branch.match(letters) || branch_count==0){
  return true;
  }
  	else{
  	alert("Branch name capital letters only");
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

function myFunction1(){
	var y = document.getElementById("phnum").value;
   var count_phone=y.length;

   if(count_phone==10 || count_phone==0 ){
    
   	 document.getElementById("phnum").style.color = "black";
   	  document.getElementById("phnum").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("phnum").style.color = "red";
     document.getElementById("phnum").style.border = "2px solid red";
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
function myFunction1(){
	var ph_num1=document.getElementById("phnum1").value;
	var ph_num1count=ph_num1.length;
	
	if(ph_num1count==10 || ph_num1count==0){
     document.getElementById("phnum1").style.color = "black";
     document.getElementById("phnum1").style.border = "1px solid #d2d6de";
	
	}
	else {
		document.getElementById("phnum1").style.color = "red";
		document.getElementById("phnum1").style.border = "2px solid red";
	}
           
}
function emailfuncion(){
	var email=document.getElementById("em").value;
	var emailcount=email.length;
	var letters=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if(email.match(letters) || emailcount==0){
		document.getElementById("em").style.color = "black";
        document.getElementById("em").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("em").style.color = "red";
		document.getElementById("em").style.border = "2px solid red";
	}
}
function branchfunction(){
	var branch_name=document.getElementById("branch_id").value;
	var branch_namecount=branch_name.length;
	var letters = /^[A-Z\s]+$/;

	if(branch_name.match(letters) || branch_namecount==0){
		document.getElementById("branch_id").style.color = "black";
        document.getElementById("branch_id").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("branch_id").style.color = "red";
		document.getElementById("branch_id").style.border = "2px solid red";
	}
}
$('.bankacname').keyup(function(){
	var bacname=$(this).val();
	var bacnamecount=bacname.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(bacname.match(letters) || (bacnamecount==0)){
		$('.bankacname').css("border","1px solid #d2d6de");
		$('.bankacname').css("color","black");
	}
	else{
		$('.bankacname').css("border","2px solid red");
		$('.bankacname').css("color","red");
	}
	//alert(namecount);
});
$('.bankphnum').keyup(function(){
	//alert();
	var bphnum=$(this).val();
	var bphnumcount=bphnum.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(bphnumcount==10 || (bphnumcount==0)){
		$('.bankphnum').css("border","1px solid #d2d6de");
		$('.bankphnum').css("color","black");
	}
	else{
		$('.bankphnum').css("border","2px solid red");
		$('.bankphnum').css("color","red");
	}
	//alert(namecount);
});
$('.bankemail').keyup(function(){
	//alert();
	var bmail=$(this).val();
	var bmailcount=bmail.length;
	var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(bmail.match(letters) || (bmailcount==0)){
		$('.bankemail').css("border","1px solid #d2d6de");
		$('.bankemail').css("color","black");
	}
	else{
		$('.bankemail').css("border","2px solid red");
		$('.bankemail').css("color","red");
	}
	//alert(namecount);
});
$('.bankbranch').keyup(function(){
	var banbra=$(this).val();
	var banbracount=banbra.length;
	var letters = /^[A-Z\s]+$/;
	if(banbra.match(letters) || (banbracount==0)){
		$('.bankbranch').css("border","1px solid #d2d6de");
		$('.bankbranch').css("color","black");
	}
	else{
		$('.bankbranch').css("border","2px solid red");
		$('.bankbranch').css("color","red");
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

