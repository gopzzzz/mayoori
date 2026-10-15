 <?php $data['leftmenu']='customercreation'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Customer Creation<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'customer';?>">Customer Creation</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">

      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:80%;">
						<!-- Modal content-->
						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('customer');?>>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Customer Creation</h4>
							</div>
							
                            <div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;">
							  <h4 class="text-success">Client Details</h4>
							  <hr>
							   <div class="col-sm-4">
								<label class="exampleInputEmail1" >Customer Code</label>
								</div>
								<div class="form-group col-sm-8">
                               
                                 	
                                 		<input type="text" class="form-control" name="code" value="<?php if($lastid!=null){ echo $lastid->cus_code+1;}else{echo "1";}?>" readonly>
                                 
							
							    
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" >Full Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name" onkeyup="fullnamefunction()" id="fullname" data-toggle="tooltip" title="Use Capital Letters Only">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Billing Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="cus_add" onkeyup="addressfunction()" id="add" data-toggle="tooltip" title="Use Capital Letters Only"></textarea>
								</div>
								
								
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email Id</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="email" onkeyup="emailfuncion()" id="em">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="phnum" id="phnum" onkeyup="myFunction1()"> 
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Address Purpose</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="checkbox"  name="addpur[]" value="1" /> Sales<br>
								<input type="checkbox"  name="addpur[]" value="2" /> Purchase<br>
								<input type="checkbox"  name="addpur[]" value="3"  /> Receipt/Payment
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
								<input type="radio" name="crde" value="1">Debit
								<input type="radio" name="crde" value="2" >Credit
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
							    <!--<div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" onkeyup="panfunction()" id="pan" >
								</div>-->
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="gst" onkeyup="gstfunction()" id="gst" >
								</div>
								</div>

								
						
							</div>
								
							<div class="modal-footer">
								<button type="submit" name="submit" onclick="myFunction()" class="btn btn-primary">Submit</button>
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
              <h3 class="box-title">Customer Registration</h3>
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
				  <th>Customer Code</th>
				  <th>Customer Name</th>
				  <th>Address</th>
				  <th>Phone Number</th>
				  <th>Email</th>
				  <th>GST No</th>
				  <th>Opening Balance</th>
                  <th>Payment Mode</th>
				  <th>Address Purpose</th>
				  <th>Photo</th>
                 
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
				$i=1;
				foreach($cust as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td>CUS-<?php echo $key->cus_code;?></td>
				  <td><?php echo $key->cus_name;?></td>
				   <td><?php echo $key->cus_address;?></td>
				    <td><?php echo $key->cus_phonenumber;?></td>
					 <td><?php echo $key->cus_email;?></td>
					  <td><?php echo $key->cus_gstnumber;?></td>
					   <td><?php echo $key->cus_opening_balance;?></td>
					   <td><?php echo $key->cus_credit_debit;?></td>
					  <td><?php echo $key->cus_address_purpose;?></td>
					    <td><?php if($key->cus_image==NULL){} else{?><a href="<?php echo base_url('uploads/customer/').$key->cus_image;?>"><img src="<?php echo base_url('uploads/customer/').$key->cus_image;?>" width="40"></a><?php } ?></td>
                 
                  <td><?php echo anchor('del_cust/'.$key->customer_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $key->customer_id;?>">Edit</button>
				 </td>
                </tr>
				
				<!--------------------------------------------------------->
				
					<div class="modal fade" id="myModal2<?php echo $key->customer_id;?>" role="dialog">
				
					<div class="modal-dialog" style="width:80%;">
					 <?php
    $id=$key->customer_id;
    $edit_area=$this->Admin_model->customer_edit($id);
    foreach($edit_area as $key2){
        
       
    }
    
    ?>
						<!-- Modal content-->
						<form name="myForm_edit" onsubmit="return validateFormedit()"  <?php echo form_open_multipart('customer');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Customer Creation</h4>
							</div>
							 <div class="col-sm-6" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;">
							  <h4 class="text-success">Customer Details</h4>
							  <hr>
							  	
							  	<input type="hidden" class="form-control" name="cus_id" value="<?php echo $key2->customer_id;?>"/>
							  	<div class="col-sm-4">
								<label class="exampleInputEmail1" >Customer Code</label>
								</div>
							  	<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="code" value="<?php echo $key2->cus_code;?>" readonly>
								</div>
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1" >Full Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control cusnameedit" name="name" value="<?php echo $key2->cus_name;?>" id="fullnameedit<?php echo $key2->customer_id;?>" data-value="<?php echo $key2->customer_id;?>">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Billing Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control billadress" name="cus_add"  id="addedit"><?php echo $key2->cus_address;?></textarea>
								</div>
								
								<!--<div class="col-sm-4">
								<label class="exampleInputEmail1">Pincode</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pincode" onkeyup="myFunction()" id="pin">
								</div>-->
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email Id</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control emaiedit" name="email" value="<?php echo $key2->cus_email;?>"  id="em_edit">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control phedit" name="phnum" id="phnumedit" value="<?php echo $key2->cus_phonenumber;?>"> 
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Address Purpose</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="checkbox"  name="addpur[]" value="1" <?php if($key2->cus_address_purpose == '1'){echo 'checked';}?>/> Sales
								<input type="checkbox"  name="addpur[]" value="2" <?php if($key2->cus_address_purpose == '2'){echo 'checked';}?>/> Purchase
								<input type="checkbox"  name="addpur[]" value="3"  <?php if($key2->cus_address_purpose == '3'){echo 'checked';}?>/> Receipt/Payment
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Customer Photo</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="file" class="form-control" name="userfile" >
								<div><img src="<?php echo base_url('uploads/customer/').$key2->cus_image;?>" width="150"></div>
								</div>
								</div>
								
							</div>
							<div class="col-sm-6" >
							
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;">
								<h4 class="text-success">Account Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">Payment Type</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio"  name="crde" value="1" <?php if($key2->cus_credit_debit==1){ ?> checked=checked <?php } ?>  /> Credit
								<input type="radio"  name="crde" value="2" <?php if($key2->cus_credit_debit==2) {?> checked=checked <?php } ?> /> Debit
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" value="<?php echo $key2->cus_opening_balance;?>">
								</div>
								</div>
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Tax Details</h4>
							  <hr>
							    <!--<div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan" onkeyup="panfunction()" id="pan" >
								</div>-->
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control gstnumedit" name="gst" value="<?php echo $key2->cus_gstnumber;?>"  id="gstedit">
								</div>
								</div>

							</div>
							
							
							<div class="modal-footer">
								<button type="submit" name="submit_edit" class="btn btn-primary" onclick="myFunction()">Submit</button>
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
 	//alert();
  var fn = document.forms["myForm"]["name"].value;
  var fn_count=fn.length;
  var letters  = /^[A-Z\s]+$/;
  
   if(fn.match(letters) || fn_count==0){
  	
  }
  else{
  	alert("Use capital letters and space");
  	return false;
  }
  var add=document.forms["myForm"]["cus_add"].value;
  var add_count=add.length;
  var letters1 = /^[A-Z\s(,)]+$/;
   if(add.match(letters1) || add_count==0){
  
  }
  else{
  	alert("Use capital letters,space and commas");
  	return false;
  }
  var eml=document.forms["myForm"]["email"].value;
  var em_count=eml.length;
  var letters2 =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(eml.match(letters2) || em_count==0){
  
  }
  else{
  		alert("Email is incorrect plesae input email format");
  	return false;
  }
  var pnum=document.forms["myForm"]["phnum"].value;
  var phcount=pnum.length;

  if(phcount == 10 || phcount==0){
  	
  }
  else{
  	alert("Phone Number is incorrect please check");
  	return false;
  }
  var x = document.forms["myForm"]["gst"].value;
  var count_gst=x.length;
 

  if (count_gst == 15 || count_gst==0) {
    return true;
  }
  else{
  	 alert("GST is incorrect please check");
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
$('.cusnameedit').keyup(function(){
	var name=$(this).val();
	var namecount=name.length;
	var letters = /^[A-Z\s]+$/;
	if(name.match(letters) || (namecount==0)){
		$('.cusnameedit').css("border","1px solid #d2d6de");
		$('.cusnameedit').css("color","black");
	}
	else{
		$('.cusnameedit').css("border","2px solid red");
		$('.cusnameedit').css("color","red");
	}
	//alert(namecount);
});
$('.billadress').keyup(function(){
	//alert();
	var addedit=$(this).val();
	var addeditcount=addedit.length;
	var letters = /^[A-Z\s(,)]+$/;
	if(addedit.match(letters) || (addeditcount==0)){
		$('.billadress').css("border","1px solid #d2d6de");
		$('.billadress').css("color","black");
	}
	else{
		$('.billadress').css("border","2px solid red");
		$('.billadress').css("color","red");
	}
	//alert(namecount);
});
$('.emaiedit').keyup(function(){
	//alert();
	var emailcus=$(this).val();
	var emailcuscount=emailcus.length;
	var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(emailcus.match(letters) || (emailcuscount==0)){
		$('.emaiedit').css("border","1px solid #d2d6de");
		$('.emaiedit').css("color","black");
	}
	else{
		$('.emaiedit').css("border","2px solid red");
		$('.emaiedit').css("color","red");
	}
	//alert(namecount);
});
$('.phedit').keyup(function(){
	//alert();
	var phnumcus=$(this).val();
	var phnumcuscount=phnumcus.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(phnumcuscount==10 || (phnumcuscount==0)){
		$('.phedit').css("border","1px solid #d2d6de");
		$('.phedit').css("color","black");
	}
	else{
		$('.phedit').css("border","2px solid red");
		$('.phedit').css("color","red");
	}
	//alert(namecount);
});
$('.gstnumedit').keyup(function(){
	//alert();
	var gstcusedit=$(this).val();
	var gstcuseditcount=gstcusedit.length;
	//var letters =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(gstcuseditcount==15 || (gstcuseditcount==0)){
		$('.gstnumedit').css("border","1px solid #d2d6de");
		$('.gstnumedit').css("color","black");
	}
	else{
		$('.gstnumedit').css("border","2px solid red");
		$('.gstnumedit').css("color","red");
	}
	//alert(namecount);
});
function validateFormedit(){
 var fn = $('.cusnameedit').val();
 alert(fn);
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

