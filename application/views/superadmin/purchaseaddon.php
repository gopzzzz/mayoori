<style>
	input[type=radio] {
		width: 17px;
		height: 17px;
	}

	.exampleInputEmail1 {
		font-size: 10px;
	}
	
	#searchbox tr{
	    height: 25px;
    border: 1px solid;
    background: #d0d0ff;
	}
	
	#searchModel label, #searchModel th, #searchModel .form-control, #searchModel td {
    font-size: 12px;
    text-align: center;
	}
	button.close{
		font-size: 39px;
	}
	.custsearchmodal{
		margin-left: 157px;
		margin-top: -25px;
	}
	/* Tooltip */
	#sales_cont .tooltip > .tooltip-inner {
	background-color: #f25252;
	color: #FFFFFF;
	border: 1px solid red;
	}

	/* Tooltip on top */
	#sales_cont .tooltip.top > .tooltip-arrow {
	border-top: 5px solid red;
	}
	input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<style>
p a {
    color: #3c8dbc;
    padding: 11px;
    border: 1px solid #3c8dbc;
    background-color: #3c8dbc;
    color: white;
}
b, strong {
    font-weight: 700;
    margin: 10px;
}
</style>

<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
.exampleInputEmail1{
	font-size: 10px;
}
.titleName{
	min-width: 180px;
}
#name_list_1 .table-hover>tbody>tr:hover {
    background-color: #3c8dbc;
    color: white;
    border-bottom: 1px;
}
#estimate{
	border:1px solid #d32f2f;
	width:100px;
	background-color:#d32f2f;
}
#demobill{
	border:1px solid #ffeb3b;
	width:100px;
	background-color:#ffeb3b;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<?php
/*** begin the session ***/
session_start();
 
/*** create the form token ***/
$form_token = uniqid();
 
/*** add the form token to the session ***/
$_SESSION['form_token'] = $form_token;
?>

<?php $data['leftmenu']='saleswindow';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Purchase<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Purchase</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		
		

		<div class="modal fade" id="editModal" role="dialog">
			<div class="modal-dialog" style="width:100%;">
				<!-- Modal content-->
				<div class="modal-content salesedit_content">

				</div>


				<div class="modal-footer">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						
						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />


						<div class="box-tools">
						
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
					
					<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('Admin/purchaseadd');?>">
					<input type="hidden" name="token" readonly class="form-control " value="<?php echo $token;?>" />
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Purchase</h4>
							</div>
                             
							<div class="col-sm-12" style="margin-top:10px;">
						
								<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="date" name="billdate" class="form-control cleardata1" value=""/>
							</div>
						
							
							<div class="col-sm-1">
								<label class="exampleInputEmail1">SUPLIER:</label>
							</div>
							<div class="col-sm-2">
								<select name="supplier" id="supplierselect" class="form-control cleardata1">
									<option >--Select Supplier--</option>
								    <?php foreach($supplier as $sinle){ ?>
									<option value="<?php echo $sinle->sup_id;?>"><?php echo $sinle->sup_name;?></option>
									<?php } ?>
									
								</select>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">TAX TYPE</label>
							</div>
							<div class="col-sm-2">
								<select name="taxtype" class="form-control">
									<option value="1">SGST & CGST</option>
									<option value="2">IGST</option>
								</select>
							</div>

							
							
						    </div>
						    <div class="col-sm-12"  style="margin-top: 20px;">
						    		<div class="col-sm-1">
								<label class="exampleInputEmail1">REF NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="refno"  class="form-control refnum cleardata1"  required/>
							</div>

							
						    		<div class="col-sm-1">
								<label class="exampleInputEmail1">Invoice No</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="invoiceno"  class="form-control cleardata1"  />
							</div>

							<div class="col-sm-4" style="display:none;" id="demo">
								
								<span id="estimate"><input  type="radio" name="esdemo" value="1" id="est_value" class="refnumbill cleardata1"></span>
								<span id="demobill"><input type="radio" name="esdemo" value="2" class="refnumbill" id="demo_value" class="cleardata1"></span>
								<button type="button" class="btn btn-sm btn-success" id="reset"><i class="fa fa-refresh"></i></button>
							</div>
							
							
						    </div>
						    
							
						    <div class="col-sm-12" style="margin-top: 20px;">
						    	
							<table class="table">
								<thead>
									<tr>
									<th scope="col">SL No</th>
									<th scope="col">CODE</th>
									<th scope="col">ITEM NAME</th>
									<th scope="col">BATCH CODE</th>
									<th scope="col">HSN CODE</th>
									<!-- <th scope="col">UOM</th> -->
									<th scope="col">RATE</th>
									<th scope="col">QTY</th>
									<th scope="col">DISCOUNT TYPE</th>
									<th scope="col">DISCOUNT</th>
									
									<th scope="col">TAX</th>
									<th scope="col">SELLING RATE</th>
									<th scope="col">AMOUNT</th>
									<th scope="col">ACTION</th>
									</tr>
								</thead>
								<tbody id="sales_cont">
									<tr id="detailRow_1"  data-row="1">
										<th scope="row" class="slno">1</th>

									<td>
									<input type="hidden" name="itemid[]" value="0" class="form-control itemid cleardata1 cleardata" id="itemtbid_1" data-order="1" style="width:70px;" >
									<input type="hidden" name="discount_type[]" value="0" class="discount_type cleardata1 cleardata" id="discount_type_1" data-order="1" value="percent">
									<input type="hidden" name="hsn_tax[]" value="0" class="hsn_tax cleardata cleardata1" id="hsn_tax_1" data-order="1" value="">
									<input type="text" name="itemcode[]" class="form-control codeItem cleardata cleardata1" id="code_1" data-order="1" style="width:70px;" >
									<div id="code_list_1" style="position: absolute;z-index: 99;"></div>
									</td>
									<td><input type="text" name="itemname[]" class="form-control nameItem cleardata cleardata1" id="itemname_1" data-order="1" style="width:140px;" required >
									<div id="name_list_1" style="position: absolute;z-index: 99;"></div>
									</td>
									<td>
										<select name="itembatchid[]" class="form-control itemBatch cleardata cleardata1" id="itembatchid_1" placeholder="Batch" data-order="1" >
											<option value="0">Select Batch</option>
										</select>
									</td>
									<td><input type="text" name="hsncode[]" class="form-control hsncode cleardata cleardata1" id="hsncode_1" data-order="1" style="width:60px;" >
									<input type="hidden"  name="itemitemtbid[]" class="form-control itemitemtbid cleardata cleardata1" id="itemtbid_1" data-value="" data-order="1" >
									</td>
									<!-- <td><input type="text" name="uom[]" class="form-control uom" style="width:50px;"  id="uom_1" data-order="1" ></td> -->
									<td><input type="text" value="0" name="rate[]" class="form-control rate cleardata cleardata1" id="rate_1" data-value="" data-order="1" ></td>
									<td><input step=".01"  type="text" min="0"   name="quantity[]" class="form-control quantity cleardata cleardata1" style="width:50px;" id="quantity_1" data-order="1" ></td>
									<td>
										<div class="radio" style="margin-top: 0;">
										<label><input type="radio" class="cleardata discounttype cleardata1" data-order="1"  name="optradio_1" id="checkradiobutton" value="percent" checked  onclick="calcamount();" >%</label>
										<label><input type="radio" class="cleardata discounttype cleardata1" data-order="1"  name="optradio_1" id="checkradiobutton" value="cash" onclick="calcamount();">₹</label>
										</div>
										
										</td>
										<td>
										<input type="text" name="discount[]" value="0" class="form-control discount cleardata cleardata1" id="discount_1" data-value="" data-order="1" ></td>
									<td><input type="text" readonly name="tax[]" value="0" class="form-control tax cleardata cleardata1" id="tax_1" data-value="" data-order="1" required></td>
									<td><input type="text" readonly name="sellingrate[]" value="0" class="form-control sellingrate cleardata cleardata1" id="sellingrate_1" data-value="" data-order="1" required></td>
									<td><input type="text" readonly name="itemtotalamount[]" value="0" class="form-control totalAmount cleardata cleardata1" id="totalAmount_1" data-value="" data-order="1" required></td>
									<td>
									
										<i class="fa fa-trash detailDeleteRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
									</td>
									</tr>
								
								</tbody>
							</table>
							<button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button>
						    </div>
						     <div class="col-sm-12" style="margin-top: 20px;">
							 <div class="col-sm-6">
							 <div class="col-sm-12">
							 <div class="col-sm-2">
								<label class="exampleInputEmail1">NOTES</label>
							</div>
							<div class="col-sm-4">
								<textarea name="note" class="form-control cleardata1"></textarea>
							 </div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">GOOD RECEIPT NOTE NO</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="goodreceipt" class="form-control cleardata1"/>
							</div>
							  </div>
							  <div class="col-sm-12">
							  	<div class="col-sm-2">
								<label class="exampleInputEmail1">PAYMENT MODE</label>
							</div>
						    	<div class="col-sm-10">
								
								 <input type="radio" class="custom-control-input cashcheck" id="defaultChecked" name="defaultExampleRadios" value="6">
  								 <label class="custom-control-label" for="defaultChecked">CASH</label>

  								  <input type="radio" class="custom-control-input cashcheck" id="defaultChecked" name="defaultExampleRadios" value="7" checked>
  								 <label class="custom-control-label" for="defaultChecked">CREDIT</label>

							</div>
							  </div>
							  <div class="col-sm-12">
							  	<div class="col-sm-2">
							  	<label class="exampleInputEmail1">AMOUNT</label></div>
							  	<div class="col-sm-4"><input type="text" name="amount" class="form-control cleardata1"></div>
							  </div>
							 </div>
							 
							  <div class="col-sm-6">
							  <div class="col-sm-12">
							  <div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL QUANTITY</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalqnty" id="totalqnty" readonly class="form-control cleardata cleardata1"/>
							</div>
							   	<div class="col-sm-2">
								<label class="exampleInputEmail1">TAXABLE VALUE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalTaxableAmount" readonly  id="totalTaxableAmount" class="form-control cleardata cleardata1"/>
							</div>
							
							  </div>
							  <div class="col-sm-12">
							  
							
							  </div>
							<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">EXTRA DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="extradiscount"  id="extradiscount" value="0" class="form-control "/>
							</div>
							
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TAX</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totaltax" readonly id="totaltax" class="form-control cleardata cleardata1"/>
							</div>
							</div>
							<div class="col-sm-12">
								 <div class="col-sm-2">
								<label class="exampleInputEmail1">OTHER CHARGES</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="othercharges" id="othercharge" value="0" class="form-control"/>
							</div>
							
							<div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totaldiscount"  readonly  id="discount" value="0" class="form-control cleardata cleardata1"/>
							</div>
							</div>
							<div class="col-sm-12">
							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="roundoff" readonly id="roundoff" class="form-control cleardata cleardata1"/>
							</div>
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
						
							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" readonly name="grandTotal" id="grandTotal" class="form-control cleardata cleardata1"/>
							</div>
							</div>
							  </div>
						    	
							
						    </div>
						    
						   
							<div class="col-sm-6" style="margin-top: 20px;">
								
						
								<a href="<?php echo base_url('item')?>"><button type="button" class="btn btn-primary btn-sm">ITEM CREATION</button></a>
						
						
								<button type="submit"  name="submit" class="btn btn-success btn-sm">SAVE & PRINT</button>
							
						
								<button type="submit" name="submitsave" class="btn btn-info btn-sm">SAVE</button>
							
						
								<button type="button" class="btn btn-secondary btn-sm">VIEW</button>
							
							
								<button type="button" class="btn btn-warning btn-sm clear_all">CLEAR</button>
						
								<button type="button" class="btn btn-danger btn-sm">DELETE</button>
						
							</div>
							

							<div class="modal-footer">
								<!--<button type="submit"  class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
							</div>
						</div>
						</form>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>


	</section>
    <script>

		function deletechecked() {

			if (confirm("Do you really want to delete this sales?")) {

				return true;

			}

			else {

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
        
  $(function () {
    $('#example2').DataTable({
       dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5'
        ]
    })
  })
  
  function calcamount(){

     var totalTaxableAmount = 0;
     var totalcessAmount = 0;
     var totalgstAmount = 0;
     var grandTotal = 0;
     var quantity = 0;
     var discount = 0;
     var roundoff = 0;
     var tax = 0;
     var extradiscount = 0;
	 var othercharge = 0;
     if($('#discount').val()!=''){
		
         discount = $('#discount').val();
     }
     if($('#extradiscount').val()!=''){
         extradiscount = $('#extradiscount').val();
     }
	 if($('#othercharge').val()!=''){
		othercharge = $('#othercharge').val();
     }
   
	 var qty = 0;
	 $('.rate').each(function( index ) {
        if($(this).val() !=''){
			var order = $(this).data('order');
			qty = $('#quantity_'+order).val();
            totalTaxableAmount = totalTaxableAmount+parseFloat($(this).val()*parseInt(qty));
        }
     });
	 
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));

	 
	 var discount_applied = 0;
	 var discount = 0;
	 var qnty = 0;
	 var subtotal = 0;
	 $('.discount').each(function( index ) {

        if($(this).val() !=''){
			
			var order 	= 	$(this).data('order');
			qnty 		= 	$('#quantity_'+order).val();
			discount 	=	$(this).val();

			var radioValue = $("input[name='optradio_"+order+"']:checked").val();
			
			$('#discount_type_'+order).val(radioValue);
			if(radioValue == 'percent'){//console.log('percent>>');

				
				var subtotal1 			= parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
				subtotal =parseFloat($('#rate_'+order).val())*parseInt(qnty);
				
				discount_applied 	= parseFloat(discount_applied) + (parseFloat(subtotal) * parseFloat(discount)|| 0 ) /100;
			
			}
			else if(radioValue == 'cash'){
				
				discount_applied = parseFloat(discount_applied) + (parseFloat(discount)|| 0);//console.log(discount_applied);
			
			}
        }
     });
	 $('#discount').val(Math.round((discount_applied)));


     $('.quantity').each(function( index ) {
         if($(this).val() !=''){
            quantity=quantity+parseInt($(this).val());
         }
     });
     $('#totalqnty').val(quantity);
     $('.tax').each(function( index ) {
         if($(this).val() !=''){
            tax=parseFloat(tax)+parseFloat($(this).val());
         }
     });
     $('#totaltax').val(tax.toFixed(2));
     $('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            grandTotal=parseFloat(grandTotal)+parseFloat($(this).val());
         }
     });

     $('#grandTotal').val(Math.round(parseFloat(grandTotal)-parseFloat(discount_applied)-parseFloat(extradiscount)+parseFloat(othercharge)));
     $('#roundoff').val((grandTotal%1).toFixed(2));

	
  }
  
  


   $('#BtnNewRow').on('click',function(){
	 calcamount();
      var rowStart = 1;
	  //alert(rowStart);
      $('.slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});
			$newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order', $newrow);
     // var current_row = $newrow;
	 var current_row = $newrow;

      var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
	  new_row+= '<td><input type="hidden" name="itemid[]" value="0" class="form-control itemid cleardata cleardata1" id="itemtbid_'+current_row+'" data-order="'+current_row+'" style="width:70px;" > <input required  type="text" name="itemcode[]" class="form-control codeItem cleardata cleardata1"  id="code_'+current_row+'" data-order="'+current_row+'" style="width:70px;"><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input required type="text" name="itemname[]" class="form-control nameItem cleardata cleardata1" id="itemname_'+current_row+'" data-order="'+current_row+'" style="width:140px;"><div id="name_list_'+current_row+'"></div></td>';
	  new_row+= '<td><select name="itembatchid[]" class="form-control itemBatch cleardata cleardata1" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
      new_row+= '<td><input required type="text" value="0" name="hsncode[]" class="form-control cleardata cleardata1" name="hsncode" id="hsncode_'+current_row+'" data-order="'+current_row+'" style="width:60px;"><input type="hidden" name="itemitemtbid[]" class="form-control cleardata itemitemtbid cleardata1" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ><div id="batch_list_'+current_row+'"></div></td>';
      //new_row+= '<td><input required type="text" name="uom[]" class="form-control uom" id="uom_'+current_row+'" data-order="'+current_row+'" style="width:50px;"></td>';
      new_row+= '<td><input required type="text" value="0" name="rate[]" class="form-control rate cleardata cleardata1" id="rate_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input required step=".01"  type="text" min="0"  name="quantity[]" class="form-control quantity cleardata cleardata1" id="quantity_'+current_row+'" style="width:50px;" data-order="'+current_row+'" required></td>';
     
	  new_row+=  '<td ><input type="hidden" value="0" name="discount_type[]" class="discount_type cleardata cleardata1" id="discount_type_'+current_row+'" data-order="'+current_row+'" value="percent"><div class="radio" style="margin-top: 0;"><label><input type="radio"  data-order="'+current_row+'" name="optradio_'+current_row+'" class="cleardata discounttype cleardata1" value="percent" checked  onclick="calcamount();">%</label> <label><input type="radio" class="cleardata cleardata1 discounttype" data-order="'+current_row+'" name="optradio_'+current_row+'" value="cash"  onclick="calcamount();">₹</label></div></td>';
	  
	  
      new_row+= '<td><input  type="text" value="0" name="discount[]" class="form-control discount cleardata cleardata1" id="discount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="hidden" value="0" name="hsn_tax[]" class="hsn_tax cleardata cleardata1" id="hsn_tax_'+current_row+'" data-order="'+current_row+'" value=""><input required readonly type="text" name="tax[]" class="form-control tax cleardata cleardata1" id="tax_'+current_row+'" data-value=""  data-order="'+current_row+'"></td>';
      new_row+= '<td><input required type="text" readonly value="0" name="sellingrate[]" class="form-control sellingrate cleardata cleardata1" id="sellingrate_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input required type="text" readonly value="0" name="itemtotalamount[]" class="form-control totalAmount cleardata cleardata1" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td>';
    
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';

      $('#sales_cont').append(new_row);
     
      $('#BtnNewRow').data('order',current_row);
	 
  });
  
  $('#sales_cont').on('click','.detailDeleteRow',function(){
	calcamount();
      var rowNumber = $(this).data('row');
      $('#detailRow_'+rowNumber).remove();
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart++;
      });
    
       
  });
  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input[type=hidden]').val('');
	   $('#detailRow_'+rowNumber+' input[type=text]').val('');
       calcamount();
  });
  
  $('#sales_cont').on('keyup','.codeItem',function(){
	 
      var rowOrder = $(this).data('order');
      var itemCode = $(this).val();
	 
      if(itemCode != '' && itemCode != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemList');?>',
			data: { itemCode : itemCode, rowOrder:rowOrder},
				success:function(res){console.log(res);
					if(res){
						$('#code_list_'+rowOrder).show();
						$('#code_list_'+rowOrder).html(res);
					}else{
						$('#code_list_'+rowOrder).html("");
					}
				},
		});	
      }
	  else{
			$('#code_list_' + rowOrder).html("");
	  }
  });
  
   $('#sales_cont').on('keyup','.nameItem',function(){
      var rowOrder = $(this).data('order');
      var itemName = $(this).val();
      if(itemName != '' && itemName != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemNameList');?>',
			data: { itemName : itemName, rowOrder:rowOrder},
				success:function(res){//console.log(res);
					if(res){
						$('#name_list_'+rowOrder).show();
						$('#name_list_'+rowOrder).html(res);
					}else{
						$('#name_list_'+rowOrder).html("");
					}
				},
		});	
      }
	  else{
			$('#name_list_' + rowOrder).html("");
	  }
  })
  
  $('#sales_cont').on('click','.subSelect_itemedit',function(){
     var id = $(this).data('id');
     var itemValue = $(this).data('value');
	 $('#code_list_'+id).hide();
	 $('#name_list_'+id).hide();
	 $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getBatchByItem');?>',
			data: { itemValue : itemValue},
				success:function(res){
					var batchlist = JSON.parse(res);
					console.log(batchlist);
					var i;
					var optiondata= '<option value="">Select</option>';
					for(i=0;i<batchlist.length;i++){
						
						optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].cur_stock_item_count+')</option>';

					}
					
					$('#itembatchid_'+id).html(optiondata);
					$('#code_'+id).val(batchlist[0].itm_code);
			        $('#itemname_'+id).val(batchlist[0].itm_name);
					
				}
     })
  })

  //$('#sales_cont').on('click','.subSelect_itemedit',function(){
  $('#sales_cont').on('change','.itemBatch',function(){  
	 
	  if ($("#demo_value").prop("checked")) {
		var demo=$('#demo_value').val();
		}else if($("#est_value").prop("checked")){
			var demo=$('#est_value').val();
		}
	
     var id = $(this).data('order');
     var itemValue = $(this).val();

	 if(demo==1){
		$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){//console.log(res);
				    $('#code_list_'+id).hide();
				    $('#name_list_'+id).hide();
				    var obj = JSON.parse(res);
					
				    $('#itemtbid_'+id).val(obj.item_id);
				    // $('#code_'+id).val(obj.itm_code);
			        // $('#itemname_'+id).val(obj.itm_name);
			        $('#hsncode_'+id).val(obj.hsn_code);
					$('#hsn_tax_'+id).val(obj.hsn_tax);
			        //$('#uom_'+id).val(obj.item_uom);
			        $('#quantity_'+id).val(1);

			        $('#rate_'+id).val(obj.e_pr);
			        $('#rate_'+id).attr('data-value',obj.e_pr);
			        $('#sellingrate_'+id).val(obj.e_sr);
			        $('#sellingrate_'+id).attr('data-value',obj.e_sr);
			        var tax = ((parseFloat(obj.e_pr)*parseFloat(obj.hsn_tax))/100).toFixed(2);
					//alert(tax);
				    $('#tax_'+id).val(tax);
				    $('#tax_'+id).attr('data-value',tax);
				    $('#tax_'+id).attr('data-tax',obj.hsn_tax);
				    var total = parseFloat(tax)+parseFloat(obj.e_pr);
				    $('#totalAmount_'+id).val(Math.round(total.toFixed(2)));
				    $('#totalAmount_'+id).attr('data-value',Math.round(total.toFixed(2)));
				    calcamount();
				}
     })
	 }else if(demo==2){
		$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){//console.log(res);
				    $('#code_list_'+id).hide();
				    $('#name_list_'+id).hide();
				    var obj = JSON.parse(res);
				    $('#itemtbid_'+id).val(obj.item_id);
				    // $('#code_'+id).val(obj.itm_code);
			        // $('#itemname_'+id).val(obj.itm_name);
					
			        $('#hsncode_'+id).val(obj.hsn_code);
					$('#hsn_tax_'+id).val(obj.hsn_tax);
			        //$('#uom_'+id).val(obj.item_uom);
			        $('#quantity_'+id).val(1);

			        $('#rate_'+id).val(obj.d_pr);
			        $('#rate_'+id).attr('data-value',obj.d_pr);
			        $('#sellingrate_'+id).val(obj.d_sr);
			        $('#sellingrate_'+id).attr('data-value',obj.d_sr);
			        var tax = ((parseFloat(obj.d_pr)*parseFloat(obj.hsn_tax))/100).toFixed(2);
					//alert(tax);
				    $('#tax_'+id).val(tax);
				    $('#tax_'+id).attr('data-value',tax);
				    $('#tax_'+id).attr('data-tax',obj.hsn_tax);
				    var total = parseFloat(tax)+parseFloat(obj.d_pr);
				    $('#totalAmount_'+id).val(Math.round(total.toFixed(2)));
				    $('#totalAmount_'+id).attr('data-value',Math.round(total.toFixed(2)));
				    calcamount();
				}
     })
	 }else{
		$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){//console.log(res);
				    $('#code_list_'+id).hide();
				    $('#name_list_'+id).hide();
				    var obj = JSON.parse(res);
				    $('#itemtbid_'+id).val(obj.item_id);
				    // $('#code_'+id).val(obj.itm_code);
			        // $('#itemname_'+id).val(obj.itm_name);
			        $('#hsncode_'+id).val(obj.hsn_code);
				
					$('#hsn_tax_'+id).val(obj.hsn_tax);
			        //$('#uom_'+id).val(obj.item_uom);
			        $('#quantity_'+id).val(1);

			        $('#rate_'+id).val(obj.t_pr);
			        $('#rate_'+id).attr('data-value',obj.t_pr);
			        $('#sellingrate_'+id).val(obj.t_sr);
			        $('#sellingrate_'+id).attr('data-value',obj.t_sr);
			        var tax =((parseFloat(obj.t_pr)*parseFloat(obj.hsn_tax))/100).toFixed(2);
					//alert(tax);
				    $('#tax_'+id).val(tax);
				    $('#tax_'+id).attr('data-value',tax);
				    $('#tax_'+id).attr('data-tax',obj.hsn_tax);
				    var total = parseFloat(tax)+parseFloat(obj.t_pr);
				    $('#totalAmount_'+id).val(Math.round(total.toFixed(2)));
				    $('#totalAmount_'+id).attr('data-value',Math.round(total.toFixed(2)));
				    calcamount();
				}
     })
	 }
 
  })

  $('.refnumbill').on('click',function(){
	  
	$(".cleardata").val("");
	if ($("#demo_value").prop('checked')) {
		var demo=$('#demo_value').val();
		}
		else if($('#est_value').prop('checked')){
		var demo=$('#est_value').val();
		}
		var id = $(this).data('order');
    	 var itemValue = $(this).val();

  });


  $('.clear_all').on('click',function(){
	$('.cleardata1').val("");
	$('#extradiscount').val(0);
	$('#othercharge').val(0);
  });
  
  $('#sales_cont').on('keyup','.quantity',function(){
    var qnty = $(this).val();
	
    var order = $(this).data('order');
    //var tax = $('#tax_'+order).data('value')-(($('#tax_'+order).data('value'))*$('#discount_'+order).val()*0.01);
    if(qnty != '' && qnty!=0){
       
		var qnty = $(this).val();
    }else{
		var qnty = 0;
	}

	//$('#quantity_'+order).val(qnty);
        //--$('#rate_'+order).val((($('#rate_'+order).data('value')*qnty)).toFixed(2));
        $('#sellingrate_'+order).val(($('#sellingrate_'+order).data('value')*qnty).toFixed(2));
	
		var tax = (( $('#rate_'+order).val() * $('#hsn_tax_'+order).val() )/100);
		//alert(tax);
		var taxable_tax_value=parseFloat(tax)*parseFloat(qnty);
		//alert(taxable_tax_value);
		$('#tax_'+order).val(taxable_tax_value);
        var totalamount = (parseFloat($('#rate_'+order).val())*parseFloat(qnty))+parseFloat($('#tax_'+order).val());
		//alert(totalamount);
        $('#totalAmount_'+order).val(Math.round(totalamount));
        $('#discount_'+order).keyup();
		
	var toltaxable=$('#totalTaxableAmount').val();
	var toldisc=$('#discount').val();
	var toltax=parseFloat(toltaxable)+parseFloat($('#totaltax').val());
	var tolgrand=parseFloat(toltax)-parseFloat(toldisc);
	var grandTotal=0;
	var extra_disc=$('#extradiscount').val();
	var oth_charges=$('#othercharge').val();
	$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            grandTotal=parseFloat(grandTotal)+parseFloat($(this).val());
         }
     });
  //  alert(grandTotal);
	$('#grandTotal').val(Math.round(parseInt(grandTotal)-parseInt(extra_disc)+parseInt(oth_charges)));
	calcamount();
  });
  
  $('#sales_cont').on('change','.discounttype',function(){ 

	var order = $(this).data('order');
	
    var qnty = $('#quantity_'+order).val();
   	var radioValue = $("input[name='optradio_"+order+"']:checked").val();

   
    var tax = $('#tax_'+order).data('value');
    var taxper = $('#tax_'+order).data('tax');
    var taxdiscount = 0;
    var totaldiscount = 0;
	var subtotal = 0;
    var discount = $('#discount_'+order).val();//console.log(tax+'-->');console.log(radioValue);
	var billtype=$('.refnumbill:checked').val();
			
			
	
	
	
	if(discount!=''){
	
		if(radioValue == 'percent'){
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			totaldiscount = ((parseFloat(subtotal)*parseFloat(discount)|| 0)/100);
			subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
			var subtotalvalue=parseFloat($('#rate_'+order).val()*qnty)-totaldiscount;


			var qtyprice=parseFloat($('#rate_'+order).val())*parseInt(qnty);
			//alert(qtyprice);
			var discountvalue=(parseFloat(qtyprice)*parseFloat(discount)/100);
			var discounde_value=parseFloat(qtyprice) - parseFloat(discountvalue);
			var taxvalue = (( discounde_value * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseFloat(discounde_value)+parseFloat(taxvalue);
			
			$('#totalAmount_'+order).val(discounttaxvalue.toFixed(2));
			$('#tax_'+order).val(taxvalue);
			$('#tax_'+order).attr('data-value', taxvalue);
		   
		}
		else if(radioValue == 'cash'){
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			subtotal_discount_applied = parseFloat(qtyprice) - parseFloat(discount);
			var taxvalue = Math.round((( subtotal_discount_applied * $('#hsn_tax_'+order).val() )/100).toFixed(2));
			var discounttaxvalue=parseFloat(subtotal_discount_applied)+parseFloat(taxvalue);
			
			$('#tax_'+order).val(taxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
			$('#tax_'+order).attr('data-value', taxvalue);
		}

		calcamount();
	}else{
		
		if(radioValue == 'percent'){
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			totaldiscount = ((parseFloat(subtotal)*parseFloat(0)|| 0)/100).toFixed(2);
			subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			var discountvalue=((parseFloat(qtyprice)*parseFloat(0)|| 0)/100).toFixed(2);
			var discounde_value=parseFloat(qtyprice) - parseFloat(discountvalue);
			var taxvalue = (( discounde_value * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseInt(discounde_value)+parseInt(taxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}
		else if(radioValue == 'cash'){//console.log('entered');
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			subtotal_discount_applied = parseFloat(qtyprice) - parseFloat(0);
			var taxvalue = (( subtotal_discount_applied * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseFloat(subtotal_discount_applied)+parseFloat(taxvalue);
			
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}


		calcamount();
	}

	var toltaxable=$('#totalTaxableAmount').val();
	var toldisc=$('#discount').val();
	var toltax=parseFloat(toltaxable)+parseFloat($('#totaltax').val());
	var tolgrand=parseFloat(toltax)-parseFloat(toldisc);
	
	$('#grandTotal').val(tolgrand);


  });
  $('#sales_cont').on('keyup','.discount',function(){ 
	//alert();
    var order = $(this).data('order');
	
    var qnty = $('#quantity_'+order).val();
    var radioValue = $("input[name='optradio_"+order+"']:checked").val();
    //alert(radioValue);
   
    var tax = $('#tax_'+order).data('value');
    var taxper = $('#tax_'+order).data('tax');
    var taxdiscount = 0;
    var totaldiscount = 0;
	var subtotal = 0;
    var discount = $('#discount_'+order).val();//console.log(tax+'-->');console.log(radioValue);
	var billtype=$('.refnumbill:checked').val();
			
			
	
	
	
	if(discount!=''){
		
		if(billtype==2||billtype==1)
			{
				
				subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
				totaldiscount = ((parseFloat(subtotal)*parseFloat(discount)|| 0)/100).toFixed(2);
				subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
				var subtotalvalue=parseFloat($('#rate_'+order).val()*qnty)-totaldiscount;
				var qtyprice=parseFloat($('#rate_'+order).val())*parseInt(qnty);
				var discountvalue=((parseFloat(qtyprice)*parseFloat(discount))/100).toFixed(2);
				
			
				var discounde_value=parseFloat(qtyprice) - parseFloat(discountvalue);
				
				var taxvalue = discounde_value * ($('#hsn_tax_'+order).val() /100).toFixed(2);
			
				var discounttaxvalue=parseFloat(discounde_value)+parseFloat(taxvalue);
				//alert(discounttaxvalue);
				$('#totalAmount_'+order).val(Math.round(discounttaxvalue));
				$('#tax_'+order).val(taxvalue);
				$('#tax_'+order).attr('data-value', taxvalue);

			}
			
		if(radioValue == 'percent'){
			
			
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			totaldiscount = ((parseFloat(subtotal)*parseFloat(discount)|| 0)/100).toFixed(2);
			subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
			var subtotalvalue=parseFloat($('#rate_'+order).val()*qnty)-totaldiscount;
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			var discountvalue=((parseFloat(qtyprice)*parseFloat(discount)|| 0)/100).toFixed(2);
			
			
			var discounde_value=parseFloat(qtyprice) - parseFloat(discountvalue);
			var taxvalue = (( discounde_value * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseInt(discounde_value)+parseInt(taxvalue);
			
			$('#totalAmount_'+order).val(discounttaxvalue.toFixed(2));
			$('#tax_'+order).val(taxvalue);
			$('#tax_'+order).attr('data-value', taxvalue);
		   
		}
		else if(radioValue == 'cash'){//console.log('entered');
		
			subtotal = parseFloat($('#rate_'+order).val())*parseInt(qnty)+parseFloat($('#tax_'+order).val()); 
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			subtotal_discount_applied = parseFloat(qtyprice) - parseFloat(discount);
			var taxvalue = Math.round((( subtotal_discount_applied * $('#hsn_tax_'+order).val() )/100).toFixed(2));
			var discounttaxvalue=parseFloat(subtotal_discount_applied)+parseFloat(taxvalue);
			$('#tax_'+order).val(taxvalue);
			$('#tax_'+order).attr('data-value', taxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}

		calcamount();
	}else{
		
		if(radioValue == 'percent'){
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			totaldiscount = ((parseFloat(subtotal)*parseFloat(0)|| 0)/100).toFixed(2);
			subtotal_discount_applied = parseFloat(subtotal) - parseFloat(totaldiscount);
			var subtotalvalue=parseFloat($('#rate_'+order).val()*qnty)-totaldiscount;
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			var discountvalue=((parseFloat(qtyprice)*parseFloat(0)|| 0)/100).toFixed(2);
			
			
			var discounde_value=parseFloat(qtyprice) - parseFloat(discountvalue);
			var taxvalue = (( discounde_value * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseInt(discounde_value)+parseInt(taxvalue);
			
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
			$('#tax_'+order).val(taxvalue);
			$('#tax_'+order).attr('data-value', taxvalue);
		}
		else if(radioValue == 'cash'){
			subtotal = (parseFloat($('#rate_'+order).val())*parseInt(qnty))+parseFloat($('#tax_'+order).val()); 
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			subtotal_discount_applied = parseFloat(qtyprice) - parseFloat(0);
			var taxvalue = (( subtotal_discount_applied * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseFloat(subtotal_discount_applied)+parseFloat(taxvalue);
			$('#tax_'+order).val(taxvalue);
			$('#tax_'+order).attr('data-value', taxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}


		calcamount();
	}

	var toltaxable=$('#totalTaxableAmount').val();
	var toldisc=$('#discount').val();
	var toltax=parseFloat(toltaxable)+parseFloat($('#totaltax').val());
	var tolgrand=parseFloat(toltax)-parseFloat(toldisc);
	var grandTotal=0;

	$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            grandTotal=parseFloat(grandTotal)+parseFloat($(this).val());
         }
     });

	$('#grandTotal').val(grandTotal);
  });
  
  $('#extradiscount').on('keyup',function(){
      calcamount();
  });
  $('#othercharge').on('keyup',function(){
      calcamount();
  });

  $(document).ready(function() {
    $('#supplierselect').select2();
});

//==========Edited By Niby========//

$('#purchasebody').on('click','.editpurchase', function() {

	var id = $(this).data('id');
	$('#purchaseedit_content').empty();

	if (id) {

		$.ajax({

			type: "POST",
			url: '<?php echo site_url('Admin/getpurchase_details');?>',
			data: {
				id: id
			},

			success: function(res) {
				//console.log(res);
				$('#purchaseedit_content').append(res);
			},

		});

	}

	$('#editModal').modal({
		backdrop: 'static',
		keyboard: false
	});
 
});

$('#purchasebody').on('click','.viewpurchase', function() {

	var id = $(this).data('id');
	$('#purchaseedit_content').empty();

	if (id) {

		$.ajax({
			type: "POST",
			url: '<?php echo site_url('Admin/getpurchase_details');?>',
			data: {
				id: id
			},
			success: function(res) {
				//console.log(res);
				$('#purchaseedit_content').append(res);
				$('.action-btns').hide();
				
			},
		});
	}

	$('#editModal').modal({
		backdrop: 'static',
		keyboard: false
	});

});

$('#billnumbersearch').on('keyup',function(){
var billnumber=$(this).val();
if(billnumber!=""){
$.ajax({
			type: "POST",
			url: '<?php echo site_url('AdminController/get_billsearch');?>',
			data: {
				billnumber: billnumber
			},
			success: function(res) {
				if(res){
									//vineeth---
									$('#purchasebody').show();
									$('#purchasebody').html(res);
								}else{
									$('#purchasebody').html("");
								}
				
			},
		});
}else{
	location.reload();
}

});
$(".refnum").dblclick(function(){
 $('#demo').show();
});
$(".refnum").click(function(){
	$('#demo').hide();
});
$('.refnum').on('change',function(){
	
var refnum=$(this).val();

$.ajax({
			type: "POST",
			url: '<?php echo site_url('Admin/getreferencenumberfetching');?>',
			data: {
				refnum: refnum
			},
			success: function(res) {
				console.log(res)
				if(res==1){  
					$('.refnum').css({"border":"2px solid #ff0099"});
					
         
        }else{
			$('.refnum').css({"border":"1px solid #d2d6de"});
		}
			},
});
});
$(document).ready(function(){
		$('form').attr('autocomplete', 'off');
});

//==========Edited By Niby  End========//
</script>

<script type="text/javascript" language="javascript" >

$('#reset').click(function() {

$('input[name="esdemo"]').prop('checked', false);

});
function validateForm() {

	if (confirm("Do you really want to submit this purchase?")) {

		form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;

}

else {

return false;

}

	
}
</script>

	</body>

	</html>