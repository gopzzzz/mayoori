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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<!-- Modern blue-and-white theme matching the Sales Billing Window -->
<style>
.content-wrapper { background: #f4f7fb; }
.content-header h1 { color: #1f4e79; font-weight: 700; letter-spacing: .2px; }
.content-header h1 small { color: #5c7894; }
.content > .row > .col-xs-12 > .box, .content .box { border-top: 3px solid #3c8dbc; border-radius: 6px; box-shadow: 0 2px 12px rgba(30,70,110,.08); background: #fff; }
.content .box-header { padding: 15px 18px; border-bottom: 1px solid #e5edf5; }
.content .box-title, .content .modal-title { color: #1f4e79; font-weight: 700; }
.content .box-body { padding: 15px; }
.content .table-responsive { overflow-x: auto; }
.content table.table { background: #fff; border-collapse: collapse; min-width: 1050px; margin-bottom: 12px; }
.content table.table > thead > tr > th { background: #eaf3fb; color: #214f78; font-weight: 700; white-space: nowrap; border: 1px solid #c9d9e8 !important; padding: 10px 8px; vertical-align: middle; }
.content table.table > tbody > tr > td, .content table.table > tbody > tr > th { border: 1px solid #d5e0ea !important; padding: 8px; vertical-align: middle; }
.content table.table > tbody > tr:nth-child(even) { background: #f7faff; }
.content table.table > tbody > tr:hover { background: #edf6ff; }
.content .form-control { border: 1px solid #cbd7e3; border-radius: 4px; box-shadow: none; min-height: 34px; }
.content .form-control:focus { border-color: #3c8dbc; box-shadow: 0 0 0 2px rgba(60,141,188,.12); }
.content label { color: #344b60; font-weight: 600; }
.content .btn-info, .content .btn-primary { background: #287db5; border-color: #287db5; }
.content .btn-info:hover, .content .btn-primary:hover { background: #1f6798; border-color: #1f6798; }
.content .btn-success { background: #27865b; border-color: #27865b; }
.content .modal-content { border: 0; border-radius: 7px; box-shadow: 0 8px 28px rgba(20,50,80,.18); }
.content .modal-header { background: #eaf3fb; border-bottom: 1px solid #d4e2ef; border-radius: 7px 7px 0 0; padding: 15px 20px; }
.content .modal-footer { border-top: 1px solid #e5edf5; }
.content .fa-trash { color: #c0392b; }
#sales_cont input.form-control, #sales_cont select.form-control { min-width: 85px; }
#sales_cont .nameItem { min-width: 150px; }
#sales_cont .codeItem { min-width: 100px; }
@media (max-width: 767px) { .content { padding: 10px; } .content .col-sm-12 { margin-bottom: 8px; } .content .modal-dialog { width: auto !important; margin: 10px; } .content table.table { min-width: 1050px; } }
</style>


<?php $data['leftmenu']='salesreturn'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Sales Return<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="<?php echo base_url().'sales_rtn';?>">Sales Return</a></li>

		</ol>

	</section><br>



	<!-- Main content -->

	<section class="content">
		
	
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<!-- <h3 class="box-title">Sales Return Report</h3> -->
						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />


						<div class="box-tools">
					
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
							
				<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('Admin/salesreturnadd');?>" >
				<input type="hidden" name="token" readonly class="form-control cleardata" value="<?php echo $token;?>" />
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sales Return Window</h4>
					</div>

					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">RETURN NO:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" readonly name="rtnno" class="form-control" value="<?php  if($keybill->mycount==0){echo $this->session->userdata('sr');echo "1";}else{ echo $this->session->userdata('sr');;echo $keybill1->sales_retuurn_bill_no+1; } ?>">
			
								 
						</div>
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-2">
							
								 
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">DATE:</label>
						</div>
						<div class="col-sm-2">
							<input type="date" name="date" class="form-control cleardata" value="<?php echo  date("Y-m-d"); ?>" readonly/>
						</div>

						<div class="col-sm-1">
							<label class="exampleInputEmail1">SALE TYPE:</label>
						</div>
						<div class="col-sm-2">
						<select name="saletype" class="form-control">
							<option value="1">B2C</option>
							<option value="2">B2B</option>
                        </select>
						</div>

					</div>


					<div class="col-sm-12" style="margin-top: 10px;">
						<div class="col-sm-1">
							<label class="exampleInputEmail1">CUSTOMER NAME:</label>
						</div>
						<div class="col-sm-2" id="cust_search">
							<input type="text" name="customername" id="customername" class="form-control searchcus cleardata" style="width:150px;" required />
							<input type="hidden" name="customerloginid" id="customerid">
							
							<div id="customer_list"></div>
							
						</div>
						
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-2">
							
								 
						</div>
						
						

					</div>
					<div class="col-sm-12" style="margin-top: 10px;">
					    <div class="col-sm-1">
							<label class="exampleInputEmail1">ADDRESS:</label>
						</div>
						<div class="col-sm-2">
							<textarea name="address" class="form-control cleardata" id="address"></textarea>
						</div>
						<div class="col-sm-1">
							
						</div>
						<div class="col-sm-2">
							
								 
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1">REF NO:</label>
						</div>
						<div class="col-sm-1">
							<input type="text" name="refno" class="form-control cleardata">
							 
						</div>

						<div class="col-sm-1">
								<button type="button" class="btn btn-info btn-sm">LOAD BILL</button>
							</div>

					</div>
					<div class="col-sm-12" style="margin-top: 10px;">
					    <div class="col-sm-1">
							<label class="exampleInputEmail1">PHONE NUMBER:</label>
						</div>
						<div class="col-sm-2">
							<input type="text" name="phonenumber" maxlength="10" class="form-control cleardata" id="phon_num" required />
						</div>
						<div class="col-sm-2">
									<label><input type="checkbox" name="inclusive" id="inclusive" value="1" class="cleardata"/>INCLUSIVE</label>
						</div>
						<div class="col-sm-1">
							
								 
						</div>
						<div class="col-sm-1">
							<label class="exampleInputEmail1"> REASON:</label>
						</div>
						<div class="col-sm-2">
							<textarea name="reason" class="form-control cleardata" ></textarea>
						</div>

						

					</div>

					<div class="col-sm-12">


					</div>
					<div class="col-sm-12" style="margin-top: 20px;">
						    	
							<table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">CODE</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">BATCH</th>
      <th scope="col">QTY</th>
	  <th scope="col">UNIT PRICE</th>
      <th scope="col">TAXABLE VALUE</th>
      <th scope="col">GST %</th>
      <th scope="col">GST AMOUNT</th>
	  <!-- <th scope="col">CESS</th> -->
      <th scope="col">TOTAL</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col"></th>
   
    </tr>
  </thead>
  <tbody id="sales_cont">
    <tr id="detailRow_1" data-row="1">
      <th scope="row" class="slno">1</th>
      <td>
	  <input type="hidden" name="purcost[]" class="form-control cleardata" id="pcost_1"
											data-order="1" style="float:left" value="0">
	  <input type="hidden" name="puritemid[]" class="form-control cleardata" id="puritem_1"
											data-order="1" style="float:left" value="0">
	  <input type="text" name="itemcode[]"  class="form-control codeItem" id="code_1" data-order="1"  >
      <div id="code_list_1" style="position: absolute;z-index: 99;"></div>
      </td>
      <td><input type="text" name="itemname[]" class="form-control cleardata nameItem" id="itemname_1" data-order="1"  required>
      <div id="name_list_1" style="position: absolute;z-index: 99;"></div>
      </td>
	  <td style="width:130px;"><select name="itembatchid[]" class="form-control cleardata itemBatch" id="itembatchid_1" placeholder="Batch" data-order="1" required>
			<option value="0">Select Batch</option>  
			</select>
									</td>
	  <div id="batch_list_1" style="position: absolute;z-index: 99;"></div>
      </td>
      </td>
      <td><input step=".01"  type="text" min="0"  name="itemqnty[]"  class="form-control cleardata qnty"   id="itemqty_1" data-order="1" ></td>
	  <td><input type="text" name="unitprice[]" class="form-control unitprice cleardata"
											id="unitprice_1" data-order="1" data-toggle="tooltip" trigger="manual" ></td>
      <td><input type="text" readonly name="itemtaxable[]" value="0" class="form-control cleardata taxableAmount" id="taxable_1" data-value="" data-order="1" ></td>
      <td><input type="text" readonly name="itemgstper[]" value="0" class="form-control cleardata "  id="gstper_1" data-order="1" >
      <input type="hidden" name="itemhsncode[]" value="0" class="form-control cleardata itemhsncode" id="hsncode_1" data-value="" data-order="1" ></td>
      <td><input type="text" readonly name="itemgstamount[]" value="0" class="form-control cleardata gstAmount" id="gstAmount_1" data-value="" data-order="1" ></td>
	  <!-- <td><input type="text" name="itemcess[]" value="0" class="form-control cleardata cessAmount" id="cessAmount_1" data-value="" data-order="1" ></td> -->
      <td><input type="text" readonly name="itemtotalamount[]" value="0" class="form-control cleardata totalAmount" id="totalAmount_1" data-value="" data-order="1" ></td>
      <td><select name="employee[]" class="form-control Employee cleardata"  id="employee_1" data-order="1" >
											<?php echo $namelist; ?>
										</select>
										<input type="hidden" value="0" data-order="1" name="incentive_id[]" id="incentive_1" value="" />
										<input type="hidden" value="0" data-order="1" name="incentive_amount[]" id="incentiveamt_1" value="" />
										
										</td>
      <td>
    
          <i class="fa fa-trash detailDeleteRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
      </td>
    </tr>
   
  </tbody>
 
</table>

						    </div>
							<button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button>
					<div class="col-sm-12">


					</div>
					<div class="col-sm-12">


					</div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="col-sm-12">
								<div class="col-sm-4">
									<input type="checkbox" name="isigst" value="1" class="cleardata"/>  IS IGST
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">CASH:</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="cash" class="form-control cleardata" required />
								</div>
							</div>
							


						</div>

						<div class="col-sm-6">
						    <div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" readonly name="totalTaxableAmount" id="totalTaxableAmount"
										class="form-control cleardata"  />
								</div>
							</div>
							
                            <div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">GST AMOUNT</label>
								</div>
								<div class="col-sm-4">
									<input type="text" name="amountGst" readonly id="amountGst" class="form-control cleardata"  />
								</div>
							</div>
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
							
							</div>
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6"></div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">ROUND OFF</label>
								</div>
								<div class="col-sm-4">
									<input type="text" readonly name="roundOfValuue" id="roundOfValuue" class="form-control cleardata"
										 />
								</div>

							</div>
							<div class="col-sm-12" style="margin-top: 10px;">
								<div class="col-sm-6">
								</div>
								<div class="col-sm-2">
									<label class="exampleInputEmail1">GRAND TOTAL</label>
								</div>
								<div class="col-sm-4">
									<input type="text" readonly name="grandTotal" id="grandTotal" class="form-control cleardata"
										 />
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-sm-12" style="margin-top: 20px;">
					
						<div class="col-sm-4">
						</div>
						<div class="col-sm-6">
							<input type="hidden" name="savetype" id="savetype" />
							<div class="col-sm-3">
								<button type="submit" id="saveprint" class="btn btn-primary btn-sm">SAVE &
									PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" id="saveonly" class="btn btn-success btn-sm">SAVE</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<a href="<?php echo base_url('viewsalesreturn');?>"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#mymodallisting">VIEW</button></a>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-warning btn-sm reset">CLAR</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">DELETE</button>
							</div>
						</div>
					


					</div>


					<div class="modal-footer">
					
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

			if (confirm("Do you really want to delete this apartment?")) {



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
		});

		function recalculate() {
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var grandTotal = 0;
			var deliverycharge = 0;
			var discount = 0;

			$('.taxableAmount').each(function (index) {
				if ($(this).val() != '') {
					totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
				}
			});
			$('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
			$('.cessAmount').each(function (index) {
				if ($(this).val() != '') {
					totalcessAmount = totalcessAmount + parseFloat($(this).val());
				}
			});
			$('#cessAmount').val(totalcessAmount.toFixed(2));
			$('.gstAmount').each(function (index) {
				if ($(this).val() != '') {
					totalgstAmount = totalgstAmount + parseFloat($(this).val());
				}
			});
			$('#amountGst').val(totalgstAmount.toFixed(2));
			//grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount ;
			$('.totalAmount').each(function (index) {
				if ($(this).val() != '') {
					grandTotal = grandTotal + parseFloat($(this).val());
				}
			});
			//alert(grandTotal);
			$('#roundOfValuue').val((grandTotal % 1).toFixed(2));
			if ($('#deliverychare').val() != '') {
				deliverycharge = $('#deliverychare').val();
			}
			else {
				deliverycharge = 0;
			}
			if ($('#discount').val() != '') {
				discount = $('#discount').val();
			}
			else {
				discount = 0;
			}
			$('#grandTotal').val(Math.round(grandTotal));
			var paidamount = $('#paidamount').val();
			if (paidamount == '') {
				paidamount = 0;
			}
			
		}


		//Dynamic Row Adding Code

		$('#BtnNewRow').on('click', function () {
			var rowStart = 1;
			$('.slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});console.log(rowStart);
			$newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order', $newrow);
			var current_row = $newrow;
			var new_row = '<tr id="detailRow_' + current_row + '" data-row="' + current_row + '"> <th scope="row" class="slno">' + rowStart + '</th>';
			new_row += '<td><input type="hidden" value="0" name="purcost[]" class="form-control cleardata" id="pcost_'+current_row+'" data-order="'+current_row+'" style="float:left" ><input required type="hidden"   value="0" class="form-control  cleardata puritem" id="puritem_' + current_row + '" name="puritemid[]" data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  codeItem" id="percost_' + current_row + '" data-order="' + current_row + '" style="float:left"><input required type="text" name="itemcode[]" class="form-control  codeItem" id="code_' + current_row + '" data-order="' + current_row + '" style="float:left"><div id="code_list_' + current_row + '"></div></td>';
			new_row += '<td><input required type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_' + current_row + '" data-order="' + current_row + '" ><div id="name_list_' + current_row + '"></div></td>';
			new_row += '<td style="width:130px;"><select name="itembatchid[]" class="form-control cleardata itemBatch" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
			
			new_row += '<td><input required step=".01"  type="text" min="0"  name="itemqnty[]" class="form-control qnty cleardata" id="itemqty_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row +='<td><input required type="text"   name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required readonly type="text" name="itemtaxable[]" class="form-control taxableAmount cleardata" id="taxable_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required readonly type="text" name="itemgstper[]" class="form-control cleardata" id="gstper_' + current_row + '"  data-order="' + current_row + '"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_' + current_row + '" data-value="" data-order="' + current_row + '" required><input type="hidden" name="itemitemtbid[]" class="form-control itemitemtbid" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
			new_row += '<td><input required readonly type="text" name="itemgstamount[]" class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			// new_row += '<td><input required type="text" name="itemcess[]" class="form-control cessAmount cleardata" id="cessAmount_' + current_row + '" data-value=""  data-order="' + current_row + '"></td>';
			new_row += '<td><input required readonly type="text" name="itemtotalamount[]" class="form-control totalAmount cleardata" id="totalAmount_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><select name="employee[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '"><?php echo $namelist;?></select></td>';
			new_row+='<input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_id[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '"  value="0" name="incentive_amount[]" id="incentiveamt_' + current_row + '" value=""/>'
			
			new_row += '<td>';
		
			new_row += '<i data-row="' + current_row + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
			new_row += '</td></tr>';

			$('#sales_cont').append(new_row);
			console.log(current_row);
			$('#BtnNewRow').data('order', $newrow);

		});

		$('#sales_cont').on('click', '.detailDeleteRow', function () {
			var rowNumber = $(this).data('row');
			$('#detailRow_' + rowNumber).remove();
			var rowStart = 1;
			$('.slno').each(function () {
				$(this).html(rowStart); 
				rowStart = rowStart + 1;
			});

			recalculate();
		});

		$('#sales_cont').on('click', '.detailEraseRow', function () {
			var rowNumber = $(this).data('row');
			$('#detailRow_' + rowNumber + ' select').prop('selectedIndex', 0);
			$('#detailRow_' + rowNumber + ' input').val('');
			recalculate();
		
		});

	

	

	

		$('#sales_cont').on('keyup', '.codeItem', function () {
			var rowOrder = $(this).data('order');
			var itemCode = $(this).val();
			if (itemCode != '' && itemCode != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/searchItemList');?>',
					data: { itemCode: itemCode, rowOrder: rowOrder },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#code_list_' + rowOrder).show();
							$('#code_list_' + rowOrder).html(res);
						} else {
							$('#code_list_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#code_list_' + rowOrder).html("");
			}
  });

		$('#sales_cont').on('keyup', '.nameItem', function () {
			var rowOrder = $(this).data('order');
			var itemName = $(this).val();
			if (itemName != '' && itemName != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/searchItemNameList');?>',
					data: { itemName: itemName, rowOrder: rowOrder },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#name_list_' + rowOrder).show();
							$('#name_list_' + rowOrder).html(res);
						} else {
							$('#name_list_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#name_list_' + rowOrder).html("");
			}
  });

		$('#sales_cont').on('keyup', '.batchItem', function () {
			var rowOrder = $(this).data('order');
			var itemBatch = $(this).val();
			if (itemBatch != '' && itemBatch != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('Admin/searchItemBatchList');?>',
					data: { itemBatch: itemBatch, rowOrder: rowOrder },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#batch_list_' + rowOrder).show();
							$('#batch_list_' + rowOrder).html(res);
						} else {
							$('#batch_list_' + rowOrder).html("");
						}
					},
				});	
      		}
			else{
				$('#batch_list_' + rowOrder).html("");
			}
  });

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
							//console.log(batchlist);
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
		});

		$('#sales_cont').on('change','.itemBatch',function(){  
			var id = $(this).data('order');
			$('#unitprice_'+id).css("border","1px solid #ccc");
			$('#unitprice_'+id).css("color","#555");
			$('#unitprice_'+id).tooltip('hide');
			$('#unitprice_'+id).attr('data-original-title', '');
			//var itemValue = $(this).data('value');
			var itemValue = $(this).val();
			$godown=$('#godown').val();
			
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var grandTotal = 0;
			var deliverycharge = 0;
			var discount = 0;

			$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/getbatchcount');?>',
				data: { itemValue: itemValue },
				success: function (res) {
					console.log(res);

					var obj=JSON.parse(res);
					$('#qtyinventory_'+id).val(obj.inventory_stock_itemcount);
				},
			});

			$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/getItemBatchDetails');?>',
				data: { itemValue: itemValue },
				success: function (res) {
					console.log(res); console.log(res);
					$('#code_list_' + id).hide();
					$('#name_list_' + id).hide();
					$('#batch_list_' + id).hide();
					var obj = JSON.parse(res);
					$('#hsncode_' + id).val(obj.hsn_code);
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) && ! $('#isigst').is(":checked")) {
						if($('#inclusive').is(":checked")){
							if(obj.t_sr==0.00){
							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						
						
						
						else{
							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						}else{
							if(obj.t_sr==0.00){
							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						
						
						
						else{
							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						}
					
					}
					else {
						if(obj.t_sr==0.00 ){
							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						
						
						
						else{
							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						
						}
						
					}
					var gstAmount = ((taxableAmount * parseInt(obj.hsn_tax)) / 100).toFixed(2);
					
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) && ! $('#isigst').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
					}
					else {
						var cessAmount = 0;
					}
					
					
					if(obj.t_sr==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_sr);
					if($('#inclusive').is(":checked")){
						var totalgstvalue=parseFloat(obj.e_sr);
					}else{
						
						var totalgstvalue=parseFloat(obj.e_sr);
					}
					$('#totalAmount_' + id).val(totalgstvalue);
					$('#totalAmount_' + id).attr('data-value', totalgstvalue);

					if(parseFloat(obj.e_sr)<parseFloat(obj.e_pc)){
						$('#unitprice_'+id).css({"border":"1px solid red"});
						$('#saveprint').hide();
						$('#saveonly').hide();
						$('#BtnNewRow').hide();
					}else{
						$('#unitprice_'+id).css({"border":"1px solid #d2d6de"});
						$('#saveprint').show();
						$('#saveonly').show();
						$('#BtnNewRow').show();
					}
					}
					
				
					
					else{
					$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_sr);
					if($('#inclusive').is(":checked")){
						var totalgstvalue=parseFloat(obj.t_sr);
					}else{
						var totalgstvalue=parseFloat(obj.t_sr);
						
					}
					$('#totalAmount_' + id).val(totalgstvalue);
					$('#totalAmount_' + id).attr('data-value', totalgstvalue);

					if(parseFloat(obj.t_sr)<parseFloat(obj.t_pc)){
						$('#unitprice_'+id).css({"border":"1px solid red"});
						$('#saveprint').hide();
						$('#saveonly').hide();
						$('#BtnNewRow').hide();
					}else{
						$('#unitprice_'+id).css({"border":"1px solid #d2d6de"});
						$('#saveprint').show();
						$('#saveonly').show();
						$('#BtnNewRow').show();
					}
					}
					
					$('#itemtbid_'+id).val(obj.item_id);
					$('#puritem_'+id).val(obj.item_id);
					
					$('#code_' + id).val(obj.itm_code);
					
					$('#itemname_' + id).val(obj.itm_name);
				
					$('#taxable_' + id).val(taxableAmount);
					$('#taxable_' + id).attr('data-value', taxableAmount);
					$('#gstAmount_' + id).val(gstAmount);
					$('#gstAmount_' + id).attr('data-value', gstAmount);
					$('#gstAmount_' + id).attr('data-valuesingle', gstAmount);
					
					$('#itemqty_' + id).val(1);
					$('#gstper_' + id).val(obj.hsn_tax);

					recalculate();
				
				
					
					
				},
		});

	
 })
		$('#deliverychare').on('keyup', function () {
			recalculate();
		});

		$('#discount').on('keyup', function () {
			recalculate();
		});

		$('#sales_cont').on('keyup', '.qnty', function () {
			var qnty = $(this).val();
			var order = $(this).data('order');
			var mop=$('#mop_'+order).val();
			var inqty=$('#qtyinventory_'+order).val();
		
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;
			var grandTotal=0;
		
				

				var item_hsn_tax = $('#gstper_'+order).val();
				var unitprice = $('#unitprice_'+order).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
					if($('#inclusive').is(":checked")){
						var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
					}else{
						var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
					}
				
					
				}
				else {
					var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}
				var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
							var cessAmount = (taxableAmount / 100).toFixed(2);
				}
				else {
							var cessAmount = 0;
				}

				
				var gstsubtotal = qnty * gstAmount;
				var cesssubtotal = qnty * cessAmount;
				var itemsubtotal = qnty * unitprice ;
				var taxablesubtotal = qnty * taxableAmount;

				$('#taxable_' + order).val((taxablesubtotal).toFixed(2));	
				$('#gstAmount_' + order).val((gstsubtotal).toFixed(2));
				$('#cessAmount_' + order).val((cesssubtotal).toFixed(2));
				if($('#inclusive').is(":checked")){
					var totalgstvalue=parseFloat(itemsubtotal);
				}else{
					var totalgstvalue=parseFloat(itemsubtotal);
					
				}
				
				$('#totalAmount_' + order).val((totalgstvalue).toFixed(2));	


				$('#qtymop_'+order).val(qnty*mop);

				recalculate();
				
			

		});



		$('#paidamount').on('keyup', function () {
			var paidamount = $('#paidamount').val();
			var grandTotal = $('#grandTotal').val();
			if (paidamount == '') {
				paidamount = 0;
			}
			$('#outstanding').val(parseInt(grandTotal) - parseInt(paidamount));
		});

		$('.emicheck').on('click', function () {

			$('.salecardnumber').show();
			$('.cardnumber').show();
			$('.salescheque').hide();
			$('.saleschequenumber').hide();
			$('.transcheq').hide();
			$('.salestranscheque').hide();
			$('.bankamount1').hide();
			$('.bank1').hide();
			$('.bankamount').hide();
			$('.bank').hide();
			$('.financelabel').show();
			$('.finance').show();
		});
		$('.bankcheck').on('click', function () {

			$('.salecardnumber').hide();
			$('.cardnumber').hide();
			$('.salescheque').hide();
			$('.saleschequenumber').hide();
			$('.transcheq').hide();
			$('.salestranscheque').hide();
			$('.bankamount1').hide();
			$('.bank1').show();
			$('.bankamount').hide();
			$('.bank').show();
			$('.financelabel').hide();
			$('.finance').hide();
		});
		$('.chquecheck').on('click', function () {

			$('.salescheque').show();
			$('.saleschequenumber').show();
			$('.salecardnumber').hide();
			$('.cardnumber').hide();
			$('.transcheq').hide();
			$('.salestranscheque').hide();
			$('.bankamount1').hide();
			$('.bank1').hide();
			$('.bankamount').hide();
			$('.bank').hide();
			$('.financelabel').hide();
			$('.finance').hide();
		});
		$('.banktrancheck').on('click', function () {

			$('.transcheq').show();
			$('.salestranscheque').show();
			$('.salecardnumber').hide();
			$('.cardnumber').hide();
			$('.salescheque').hide();
			$('.saleschequenumber').hide();
			$('.bankamount1').hide();
			$('.bank1').hide();
			$('.bankamount').hide();
			$('.bank').hide();
			$('.financelabel').hide();
			$('.finance').hide();
		});
		$('.bothcheck').on('click', function () {

			$('.transcheq').hide();
			$('.salestranscheque').hide();
			$('.salecardnumber').hide();
			$('.cardnumber').hide();
			$('.salescheque').hide();
			$('.saleschequenumber').hide();
			$('.bankamount1').show();
			$('.bank1').show();
			$('.bankamount').show();
			$('.bank').show();
			$('.financelabel').hide();
			$('.finance').hide();
		});
		$('.cashcheck').on('click', function () {

			$('.transcheq').hide();
			$('.salestranscheque').hide();
			$('.salecardnumber').hide();
			$('.cardnumber').hide();
			$('.salescheque').hide();
			$('.saleschequenumber').hide();
			$('.bankamount1').hide();
			$('.bank1').hide();
			$('.bankamount').hide();
			$('.bank').hide();
			$('.financelabel').hide();
			$('.finance').hide();
		});

		$('#saveprint').on('click', function () {
			if ($('#savetype').val() == '' || $('#savetype').val() == 2) {
				event.preventDefault();
				$('#savetype').val(1);
				$('#saveprint').click();
			}
		});
		$('#saveonly').on('click', function () {
			if ($('#savetype').val() == '' || $('#savetype').val() == 1) {
				event.preventDefault();
				$('#savetype').val(2);
				$('#saveonly').click();
			}
		});
		$('#sales_cont').on('click','.searchitemmodel', function () {
			$('#searchModel').modal('show');
			$('#searchinput').attr('data-row',$(this).data('row'));
		});
		
			
	


		$('.searchcus').on('keyup',function(){
	var cus = $(this).val();
		
			if (cus != '' && cus != 0) {
				$.ajax({
					type: "POST",
					url: '<?php echo site_url('AdminController/seachcustomerlist');?>',
					data: { cus: cus },
					success: function (res) {
						console.log(res);
						if (res) {
							$('#customer_list').show();
							$('#customer_list').html(res);
						} else {
							$('#customer_list').html("");
						}
					},
				});	
      		}
			else{
				$('#customer_list').html("");
			}
});

$('#customer_list').on('click','.subSelect_namesearch',function(){
	//alert();
	var id=$(this).data('value');
	$.ajax({

type: "POST",
url: '<?php echo site_url('Admin/get_customerfetchdetails');?>',
data: {
	id:id


},

success: function(res) {
	
	var obj = JSON.parse(res);
	$('#customer_list').hide();
	$('#customerid').val(id);
	$('#customername').val(obj.cus_name);
	$('#phon_num').val(obj.cus_phonenumber);
	$('#address').val(obj.cus);
}
});	//alert(id);

});
		
		

		$('#phon_num').on('keyup',function(){
			var phnum=$('#phon_num').val();
			var phcount =phnum.length;
			if(phcount==10 || phcount==0){
				$('#phon_num').css("border","1px solid #d2d6de");
		$('#phon_num').css("color","black");	
			
			}
			else{
			 $('#phon_num').css("border","2px solid red");
		     $('#phon_num').css("color","red");
			}
			//alert(phcount);
		});
	
		$(".reset").bind("click", function() {
  $(".cleardata").val("");
});
$('#sales_cont').on('keyup', '.unitprice', function () {
	$(this).val($(this).val().replace(/ +?/g, ''));
		
		var id = $(this).data('order');
		var unitpricedemo = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();

				
		if(parseFloat(unitpricedemo)<parseFloat(minmop)){

var unitprice = unitpricedemo;


$('#unitprice_'+id).css("border","2px solid red");
$('#unitprice_'+id).css("color","red");

$('#unitprice_'+id).attr('title', "Total amount is less than Item Purchase Cost : '"+minmop+"'")
							.tooltip('fixTitle')
							.tooltip('show');  

$('#saveprint').hide();
$('#saveonly').hide();
$('#BtnNewRow').hide();
	
}else if($(this).val() !== null && $(this).val() == ''){
$('#saveprint').hide();
$('#saveonly').hide();
$('#BtnNewRow').hide();
var unitprice = 0;

}else{ 

var unitprice = unitpricedemo;

$('#saveprint').show();
$('#saveonly').show();
$('#BtnNewRow').show();

$('#unitprice_'+id).css("border","1px solid #ccc");
$('#unitprice_'+id).css("color","#555");
$('#unitprice_'+id).tooltip('hide');
$('#unitprice_'+id).attr('data-original-title', '');

}


			var item_hsn_tax = $('#gstper_'+id).val();
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				if($('#inclusive').is(":checked")){
					var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}else{
					var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}
			}
			else {
				var taxableAmount = (parseInt(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
			}
			var gstAmount = ((taxableAmount * parseInt(item_hsn_tax)) / 100).toFixed(2);
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
			}
			else {
						var cessAmount = 0;
			}
		

			var gstsubtotal = qnty * gstAmount;
			var cesssubtotal = qnty * cessAmount;
			var itemsubtotal = qnty * unitprice ;
			var taxablesubtotal = qnty * taxableAmount;

			$('#taxable_' + id).val((taxablesubtotal).toFixed(2));	
			$('#gstAmount_' + id).val((gstsubtotal).toFixed(2));
			
			if($('#inclusive').is(":checked")){
				var totalgstvalue=parseFloat(itemsubtotal);
			}else{
			
				var totalgstvalue=parseFloat(itemsubtotal);
			}
			$('#totalAmount_' + id).val((totalgstvalue).toFixed(2));	
			
			recalculate();
			
		

	});
$('form').attr('autocomplete', 'off');
	</script>

	<script>
  function validateForm() {

	if (confirm("Do you really want to Save this sales return?")) {



		var rowCount = $("#sales_cont > tr").length;

var isStockNotAvailable = false;

 
 $("#sales_cont tr").map(function(){
	if(!isStockNotAvailable){
 if($(this).attr('data-row')!=undefined){
 var i = $(this).attr('data-row'); 

 var unitprice=document.getElementById('unitprice_'+i+'').value;
 var minmop=document.getElementById('pcost_'+i+'').value;


 if(parseFloat(unitprice)<parseFloat(minmop)){
	 alert("Please enter unit price is grater than purchase cost");
	 $('#unitprice_'+i).css({"border":"2px solid red"});
	 $("#saveonly").html("SAVE");
	
	$("#saveonly").removeAttr("disabled")
	$("#saveprint").html("SAVE & PRINT");
	$("#saveprint").removeAttr("disabled");
	isStockNotAvailable = true;
	event.preventDefault();
	return false;
	
 }else{
	
	$("#saveonly").html("Please Wait...");
	$("#saveonly").attr('disabled', 'disabled');
	$("#saveprint").html("Please Wait...");
	$("#saveprint").attr('disabled', 'disabled');
	
 }




				  }
	}
	else{
		return false;
	}
			 });

return true;

}

else {

return false;

}

}


</script>


	</body>

	</html>