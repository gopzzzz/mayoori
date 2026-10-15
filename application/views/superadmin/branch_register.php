
  <?php $data['leftmenu']='branchreg'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Branch Register<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'branch';?>">Branch Register</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:80%;">
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('branch');?>>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Branch Register</h4>
							</div>
							<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Branch Details</h4>
							  <hr>
							  <div class="col-sm-4">
								<label class="exampleInputEmail1">Branch Code</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="code" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > Branch Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name" onkeyup="fullnamefunction()" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1"> Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="brn_add" onkeyup="addressfunction()"  id="add"></textarea>
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="phnum" onkeyup="myFunction1()" id="phnum">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="email" onkeyup="emailfuncion()"  id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Logo</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="file" class="form-control" name="userfile" >
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								
								</div>
							    <div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Tax Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" onkeyup="panfunction()" id="pan" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="gst" onkeyup="gstfunction()" id="gst" >
								</div>
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
								<input type="text" class="form-control" name="bank" onkeyup="fullnamefunction1()"  id="fullname1">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > Branch</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="branch" onkeyup="fullnamefunction2()"  id="fullname2">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C No.</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ac_number" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">IFSC</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ifsc" >
								</div>

								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Branch Code</h4>
							  <hr>
							   
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
								<input type="radio"  name="oppaytype" value="1"  >Debit
								<input type="radio"  name="oppaytype" value="2"  >Credit
								</div>
							</div>
								
						
							</div>					

						
							
								
							<div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-primary" onclick="myFunction()" id="submit">Submit</button>
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
              <h3 class="box-title">Branch Registration</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
               <!-- <div class="input-group input-group-sm" style="width: 150px;">
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
				  <th>Branch Code</th>
				  <th>Name</th>
				  <th>Address</th>
				  <th>Phone Number</th>
				  <th>Email</th>
				  <th>GST No.</th>
				  <th>PAN No.</th>				  
				  <th>Notes</th>
				  <th>Bank Name</th>
				  <th>A/C No.</th>
				  <th>IFSC</th>
				  <th>Branch</th>
				  <th>Image</th>
				  <th>Action</th>
                 
                </tr>
				 </thead>
				<?php
				$i=1;
				foreach($brnh as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->brn_code;?></td>
				   <td><?php echo $key->brn_name;?></td>
					 <td><?php echo $key->brn_address;?></td>
					  <td><?php echo $key->brn_phnumber;?></td>
					   <td><?php echo $key->brn_email;?></td>
					   <td><?php echo $key->brn_gst;?></td>
					 <td><?php echo $key->brn_pan;?></td>
					  <td><?php echo $key->brn_notes;?></td>
					   <td><?php echo $key->brn_bname;?></td>
					   <td><?php echo $key->brn_acno;?></td>
					 <td><?php echo $key->brn_ifsc;?></td>
					  <td><?php echo $key->brn_branch;?></td>
					    <td><?php if($key->brn_image==NULL){}else{?><a href="<?php echo base_url('uploads/branch/').$key->brn_image;?>"><img src="<?php echo base_url('uploads/branch/').$key->brn_image;?>" width="40"></a><?php } ?></td>
                 
                  <td><?php echo anchor('del_branch/'.$key->brn_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->brn_id;?>">Edit</button>
				 </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				
					<div class="modal fade" id="myModal2<?php echo $key->brn_id;?>" role="dialog">
				
					<div class="modal-dialog" style="width:80%;">
					 <?php
    $id=$key->brn_id;
    $edit_area=$this->Admin_model->branch_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('branch');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Branch Registration</h4>
							</div>
														<div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
							  <h4 class="text-success">Branch Details</h4>
							  <hr>
							    <input type="hidden" class="form-control" name="brn_id" value="<?php echo $key2->brn_id;?>"/>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > Branch Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name" value="<?php echo $key2->brn_name;?>" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1"> Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="brn_add"  id="add"><?php echo $key2->brn_address;?></textarea>
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="phnum" value="<?php echo $key2->brn_phnumber;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="email" value="<?php echo $key2->brn_email;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Logo</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="file" class="form-control" name="userfile" >
								<div><img src="<?php echo base_url('uploads/branch/').$key2->brn_image;?>" width="150"></div>
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								
								</div>
							    <div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Tax Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" value="<?php echo $key2->brn_pan;?>" id="pan" >
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="gst" value="<?php echo $key2->brn_gst;?>" id="gst" >
								</div>
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
								<input type="text" class="form-control" name="bank" value="<?php echo $key2->brn_bname;?>" id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" > Branch</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="branch" value="<?php echo $key2->brn_branch;?>"  id="fullname">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C No.</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ac_number" value="<?php echo $key2->brn_acno;?>" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">IFSC</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ifsc" value="<?php echo $key2->brn_ifsc;?>" id="em">
								</div>

								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Branch Code</h4>
							  <hr>
							   <div class="col-sm-4">
								<label class="exampleInputEmail1">Branch Code</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="code" value="<?php echo $key2->brn_code;?>">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Notes</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="notes"  id="add"><?php echo $key2->brn_notes;?></textarea>
								</div>
								
							</div>
								
						
							</div>					

							
							<div class="modal-footer">
								<button type="submit" name="submit_edit" class="btn btn-primary" >Submit</button>
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
 var fn_count=fn.length;
 var letters  = /^[A-Z\s]+$/;
 if(fn.match(letters) || fn_count==0){

 }
 else{
 	alert("Name in capital letters only");
 	return false;
 }
 var add=document.forms["myForm"]["brn_add"].value;
 var add_count=add.length;
 var letters1 = /^[A-Z\s(,)]+$/;
 if(add.match(letters1) || add_count==0){

 }
 else{
 	alert("Address in capital letters only");
 	return false;
 }
 var pnum=document.forms["myForm"]["phnum"].value;
 var phcount=pnum.length;
   if(phcount ==10 || phcount==0){

 }
 else{
 	alert("Phone number is invalid ");
 	return false;
 }
  var eml=document.forms["myForm"]["email"].value;
  var em_count=eml.length;
  var letters2 =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(eml.match(letters2) || em_count==0){

 }
 else{
 	alert("Email is invalid");
 	return false;
 }
  var pannum=document.forms["myForm"]["pan"].value;
  var pancount=pannum.length;
    if(pancount ==10 || pancount==0){

 }
 else{
 	alert("Pan number is invalid ");
 	return false;
 }
 var gstnew = document.forms["myForm"]["gst"].value;
 var gst_count=gstnew.length;
     if(gst_count ==15 || gst_count==0){

 }
 else{
 	alert("GST number is invalid ");
 	return false;
 }
 var fn2 = document.forms["myForm"]["bank"].value;
 
 var bank_count=fn2.length;
 if(fn2.match(letters) || bank_count==0){

 }
 else{
 	alert("Bank name in capital letters only");
 	return false;
 }
 var fn1 = document.forms["myForm"]["branch"].value;
 var branch_count=fn1.length;
  if(fn1.match(letters) || branch_count==0){
  return true;
 }
 else{
 	alert("Bank branch in capital letters only");
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
function myFunction2(){
	var y = document.getElementById("mbnum").value;
   var count_mobile=y.length;

   if(count_mobile==10 || count_mobile==0 ){
    
   	 document.getElementById("mbnum").style.color = "black";
   	  document.getElementById("mbnum").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("mbnum").style.color = "red";
     document.getElementById("mbnum").style.border = "2px solid red";
   }
}
function myFunction3(){
	var y = document.getElementById("adhr").value;
   var count_adhar=y.length;

   if(count_adhar==12 || count_adhar==0 ){
    
   	 document.getElementById("adhr").style.color = "black";
   	  document.getElementById("adhr").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("adhr").style.color = "red";
     document.getElementById("adhr").style.border = "2px solid red";
   }
}
function panfunction(){
	var p = document.getElementById("pan").value;
   var pancount=p.length;

   if(pancount==10 || pancount==0 ){
    
   	 document.getElementById("pan").style.color = "black";
   	  document.getElementById("pan").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("pan").style.color = "red";
     document.getElementById("pan").style.border = "2px solid red";
   }
}
function gstfunction(){
	var g = document.getElementById("gst").value;
   var gstcount=g.length;

   if(gstcount==15 || gstcount==0 ){
    
   	 document.getElementById("gst").style.color = "black";
   	  document.getElementById("gst").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("gst").style.color = "red";
     document.getElementById("gst").style.border = "2px solid red";
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
function fullnamefunction1(){
	var name=document.getElementById("fullname1").value;
	var namecount=name.length;
	var letters = /^[A-Z\s]+$/;

	if(name.match(letters) || namecount==0){
     document.getElementById("fullname1").style.color = "black";
     document.getElementById("fullname1").style.border = "1px solid #d2d6de";
	}
	else {
		 document.getElementById("fullname1").style.color = "red";
		 document.getElementById("fullname1").style.border = "2px solid red";

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
function addressfunction(){
	var address=document.getElementById("add").value;
	var addcount=address.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(address.match(letters) || addcount==0){
     document.getElementById("add").style.color = "black";
     document.getElementById("add").style.border = "1px solid #d2d6de";
	
	}
	else {
		document.getElementById("add").style.color = "red";
		document.getElementById("add").style.border = "2px solid red";
	}
           
}
function addressfunction1(){
	var address=document.getElementById("add1").value;
	var addcount=address.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(address.match(letters) || addcount==0){
     document.getElementById("add1").style.color = "black";
     document.getElementById("add1").style.border = "1px solid #d2d6de";
	
	}
	else {
		document.getElementById("add1").style.color = "red";
		document.getElementById("add1").style.border = "2px solid red";
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

