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
    .filterbutton{
        margin-top:20px;
    }
	.fa {
    font-size: 19px;
        margin-left: 19px;
}

  
    /* .table-bordered>thead>tr>th{
        border: 1px solid #9d8d8d;
    }
    .table-bordered {
    border: 1px solid #9d8d8d;
}
.table-bordered>thead>tr>td{
color:#070707;
font-size:20px;
} */
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

<?php $data['leftmenu']='saleswindow';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



	<!-- Content Header (Page header) -->

	<section class="content-header">

		<h1 align="center">Sale<small>Preview</small></h1>



		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Sale</a></li>

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
						<h3 class="box-title">Sales Report</h3>

                       
						<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('viesales_reports_list');?>">
				
				 
				    <div class="col-sm-2" > 
                    <label>From:</label>
                    <input type="date" class="form-control" name="from_date" value="<?php echo date('Y-m-d'); ?>">
                  
                    
                    </div>
                    <div class="col-sm-2" > 
                    <label>To:</label>
                    <input type="date" class="form-control" name="to_date" value="<?php echo date('Y-m-d'); ?>">
                  
                    
                    </div>
                    <div class="col-sm-1" > 
                   
                    <button type="submit" name="submit_search" class="btn btn-success btn-sm filterbutton">Search</button>
                  
                    
                    </div>
					<div class="col-sm-4" > 
                    <label> &nbsp;</label>
                    <input type="text" class="form-control" id="search_sale" placeholder="search customer name and phone number">
                    
                    </div>
                  </form>

						<input type="hidden" id="response_noti"
							value="<?php echo $this->session->flashdata('response');?>" />


						<div class="box-tools">
                        <a href="<?php echo base_url('sales');?>"><button type="button" style="float: right;" class="btn btn-success btn-sm">Back to SALES WINDOW</button></a>

					
                 
                        
						</div>

                       
					</div>

                   
                  
	
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table  class="table table-hover table-bordered" style="margin-top:30px;">
							<thead>
								<tr>
								<th>#</th>
									<th>Bill No</th>
									<th>Bill Date</th>
									<th>Customer Name</th>
									<th>Grand Total</th>
									<th>Payment Mode</th>
									
									<th>By Cash</th>
									<th>By Bank</th>
									<th>Outstanding</th>
									<th>Notes</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody id="saleb2cbody">
							<?php
			$i=1;
			foreach($sales as $key){
					?>
							<tr>
							<td><?php echo $i;?></td>
								<td><?php echo $key->sales_master_bill_no;?></td>
								<td><?php echo date("d-m-Y",strtotime($key->sales_master_date));?></td>
								<td><?php echo $key->sales_master_customer_name;  ?> <?php if($key->sales_master_trans_mode==3){echo " (FINANCE)";}?></td>
								<td><?php echo $key->sales_master_grand_total;?></td> 
								<td><?php if($key->sales_master_payment_mode==6){echo "CASH";}else if($key->sales_master_payment_mode==5){echo "BANK";}else if($key->sales_master_payment_mode==4){echo "BOTH";}else if($key->sales_master_payment_mode==1){ echo "BANK TRANSFER";}else if($key->sales_master_payment_mode==2){echo "CHEQUE";echo "-".$key->sales_master_cheque_no;} ?></td>
						
								<td><?php if($key->sales_master_payment_mode==6  ){ echo $key->sales_master_amount_paid; }else if( $key->sales_master_payment_mode==4){  echo $key->sales_master_amount_paid;} ?></td>
								<td><?php if($key->sales_master_payment_mode==5 || $key->sales_master_payment_mode==2 ){ echo $key->sales_master_amount_paid;}else if( $key->sales_master_payment_mode==4){  echo $key->sales_master_bankamount;}else if($key->sales_master_payment_mode==1){echo $key->sales_master_amount_paid; }?></td>
								<td><?php if($key->sales_master_outstanding!=0){echo $key->sales_master_outstanding;}?></td>
								<td><?php echo $key->sales_master_note;?></td>
								<td>
								<!-- <?php echo anchor('del_sales/'.$key->sales_master_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?> -->
									<a href="<?php echo base_url('viewsaleb2c/'.$key->sales_master_id);?>" ><i class="fa fa-eye" aria-hidden="true" data-toggle="modal"
										></i>

									<?php if($key->sales_master_id == $last_sales){?>
                                        <a href="javascript:void(0)" class="editsales" data-id="<?php echo $key->sales_master_id;?>">

                                           

                                        </a>
                                     <?php }?>	
									 <a href="<?php echo base_url('salesprint/').$key->sales_master_id;?>"

                                                    >&nbsp;

                                            <li class="fa fa-print"></li> 

                                    </a> 
									<!-- <li class="fa fa-edit" data-id="<?php echo $key->sales_master_id;?>"></li> -->
									<a href="<?php echo base_url('saleb2cedit/').$key->sales_master_id;?>" ><li class="fa fa-pencil"></li></a>
								
								</td>
							</tr>
							<?php
				$i++;
				}
				?>
				</body>
						</table>

						<p><?php echo $links; ?></p>


<div class="modal fade" id="editb2cmodal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" style="width:100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">B2C sales Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

	  <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('Admin/b2csalesedit');?>">
				
	  <input type="hidden" name="master_id" id="master_id">
      <div class="editb2c_modalbody">
      



      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
	  </form>
    </div>
  </div>
</div>

					</div>
					
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
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
			grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
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
			$('#grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
			calc_outstanding();
			// var paidamount = $('#paidamount').val();
			// var bankamount = $('#bankamount').val();
			// if (bankamount == '') {
			// 	bankamount = 0;
			// }
			// if (paidamount == '') {
			// 	paidamount = 0;
			// }
			// var outstanding_previous = parseInt($('#outstanding_previous').val());
			// $('#outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));
		}

		function calc_outstanding(){

			var paymod = $('input[name=paymod1]:checked').val();
			var paidamount = $('#paidamount').val();
			var grandTotal = $('#grandTotal').val();
			var bankamount = $('#bankamount').val();
			if (bankamount == '' || paymod == 1 || paymod == 2 || paymod == 5 || paymod == 6 ) { 
				bankamount = 0;
			}
			if (paidamount == '') {
				paidamount = 0;
			}

			
			var outstanding_previous = parseInt($('#outstanding_previous').val()); 
			$('#outstanding').val(outstanding_previous + parseInt(grandTotal) - parseInt(paidamount) - parseInt(bankamount));

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
			var new_row = '<tr id="detailRow_' + current_row + '"> <th scope="row" class="slno">' + rowStart + '</th>';
			new_row += '<td><input required type="hidden"  class="form-control  puritem" id="puritem_' + current_row + '" name="puritemid[]" data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " id="mop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  " id="qtymop_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input required type="hidden"  class="form-control  codeItem" id="percost_' + current_row + '" data-order="' + current_row + '" style="float:left"><input required type="text" name="itemcode[]" class="form-control  codeItem" id="code_' + current_row + '" data-order="' + current_row + '" style="float:left"><i class="fa fa-search searchitemmodel" data-row="' + current_row + '" aria-hidden="true" style="font-size:12px;cursor:pointer;padding:5px" ></i><div id="code_list_' + current_row + '"></div></td>';
			new_row += '<td><input required type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_' + current_row + '" data-order="' + current_row + '" ><div id="name_list_' + current_row + '"></div></td>';
			new_row += '<td><select name="itembatchid[]" class="form-control itemBatch" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
			
			new_row += '<td><input required type="text" name="itemqnty[]" class="form-control qnty cleardata " id="itemqty_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text" name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ></td>';
			new_row += '<td><input required type="text" name="itemtaxable[]" readonly class="form-control taxableAmount cleardata" id="taxable_' + current_row + '" data-value="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" name="itemgstper[]" readonly class="form-control cleardata" id="gstper_' + current_row + '" data-order="' + current_row + '"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_' + current_row + '" data-value="" data-order="' + current_row + '" required><input type="hidden" name="itemitemtbid[]" class="form-control itemitemtbid" id="itemtbid_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
			new_row += '<td><input required type="text" name="itemgstamount[]" readonly class="form-control gstAmount cleardata" id="gstAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" name="itemcessamount[]" readonly class="form-control cessAmount cleardata" id="cessAmount_' + current_row + '" data-value="" data-valuesingle="" data-order="' + current_row + '"></td>';
			new_row += '<td><input required type="text" name="itemtotalamount[]" readonly class="form-control totalAmount cleardata" id="totalAmount_' + current_row + '" data-value="" data-order="' + current_row + '" readonly></td>';
			new_row += '<td><select name="employee[]" class="form-control Employee cleardata" id="employee_' + current_row + '" data-order="' + current_row + '"><?php echo $namelist;?></select></td>';
			new_row+='<input type="hidden" data-order="' + current_row + '" name="incentive_id[]" id="incentive_' + current_row + '" value=""/><input type="hidden" data-order="' + current_row + '" name="incentive_amount[]" id="incentiveamt_' + current_row + '" value=""/>'
			new_row += '<td>';
			new_row += '<i data-row="' + current_row + '" class="fa fa-eraser detailEraseRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>';
			new_row += '<i data-row="' + current_row + '" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
			new_row += '</td></tr>';

			$('#sales_cont').append(new_row);
			console.log(current_row);
			$('#BtnNewRow').data('order', $newrow); 

		})

		$('#sales_cont').on('click', '.detailDeleteRow', function () {
			var rowNumber = $(this).data('row');
			$('#detailRow_' + rowNumber).remove();
			var rowStart = 1;
			$('.slno').each(function () {
				$(this).html(rowStart); 
				rowStart = rowStart + 1;
			});
// 			$('#BtnNewRow').data('order', rowStart);
// 			$('.gstAmount').keyup();
// 			$('.cessAmount').keyup();
// 			$('.totalAmount').keyup();
			recalculate();
		})

		$('#sales_cont').on('click', '.detailEraseRow', function () {
			var rowNumber = $(this).data('row');
			$('#detailRow_' + rowNumber + ' select').prop('selectedIndex', 0);
			$('#detailRow_' + rowNumber + ' input').val('');
			recalculate();
			//   $('.gstAmount').keyup();
			//   $('.cessAmount').keyup();
			//   $('.totalAmount').keyup();
		})

		//Dynamic Row Adding Code

		$('#sales_cont').on('keyup', '.gstAmount', function () {
			var gstAmount = 0;
			$('.gstAmount').each(function () {
				if ($(this).val() != '') {
					gstAmount = parseInt(gstAmount) + parseInt($(this).val());
				}
			});

			$('#amountGst').val(gstAmount);
		})

		$('#sales_cont').on('keyup', '.cessAmount', function () {
			var cessAmount = 0;
			$('.cessAmount').each(function () {
				if ($(this).val() != '') {
					cessAmount = parseInt(cessAmount) + parseInt($(this).val());
				}
			});
			$('#cessAmount').val(cessAmount);
		})

		// $('#sales_cont').on('keyup', '.totalAmount', function () {
		// 	var totalAmount = 0;
		// 	$('.totalAmount').each(function () {
		// 		if ($(this).val() != '') {
		// 			totalAmount = parseInt(totalAmount) + parseInt($(this).val());
		// 		}
		// 	});
		// 	$('#totalAmount').val(totalAmount);
		// })

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
  })

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
  })

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
		})


		//$('#sales_cont').on('click', '.subSelect_itemedit', function () {
		$('#sales_cont').on('change','.itemBatch',function(){  
			var id = $(this).data('order');
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
						if(obj.t_sr==0.00 && obj.d_sr==0.00){
							var taxableAmount = (parseInt(obj.e_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}else if(obj.t_sr==0.00 && obj.e_sr==0.00){
							var taxableAmount = (parseInt(obj.d_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						
						}else{
							var taxableAmount = (parseInt(obj.t_sr) / (101 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}
						
					}
					else {
						if(obj.t_sr==0.00 && obj.d_sr==0.00){
							var taxableAmount = (parseInt(obj.e_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						}else if(obj.t_sr==0.00 && obj.e_sr==0.00){
							var taxableAmount = (parseInt(obj.d_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						
						}else{
							var taxableAmount = (parseInt(obj.t_sr) / (100 + (parseInt(obj.hsn_tax))) * 100).toFixed(2);
						
						}
						
					}
					var gstAmount = ((taxableAmount * parseInt(obj.hsn_tax)) / 100).toFixed(2);
					//if igst is checked no cess amount 
					if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) && ! $('#isigst').is(":checked")) {
						var cessAmount = (taxableAmount / 100).toFixed(2);
					}
					else {
						var cessAmount = 0;
					}
					if(obj.t_sr==0.00 && obj.d_sr==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_sr);
					$('#totalAmount_' + id).val(obj.e_sr);
					$('#totalAmount_' + id).attr('data-value', obj.e_sr);
					}else if(obj.t_sr==0.00 && obj.e_sr==0.00){
						$('#pcost_' + id).val(obj.d_pc);
					$('#percost_' + id).val(obj.d_pc);
					$('#mop_'+id).val(obj.d_mop);
					$('#unitprice_'+id).val(obj.d_sr);
					$('#totalAmount_' + id).val(obj.d_sr);
					$('#totalAmount_' + id).attr('data-value', obj.t_sr);
					}else{
						$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_sr);
					$('#totalAmount_' + id).val(obj.t_sr);
					$('#totalAmount_' + id).attr('data-value', obj.t_sr);
					}
					
					$('#itemtbid_'+id).val(obj.item_id);
					$('#puritem_'+id).val(obj.item_id);
					
					$('#code_' + id).val(obj.itm_code);
					
					$('#itemname_' + id).val(obj.itm_name);
					//$('#batch_' + id).val(obj.item_batchcode + '-' + obj.itm_ostock);
					$('#taxable_' + id).val(taxableAmount);
					$('#taxable_' + id).attr('data-value', taxableAmount);
					$('#gstAmount_' + id).val(gstAmount);
					$('#gstAmount_' + id).attr('data-value', gstAmount);
					$('#gstAmount_' + id).attr('data-valuesingle', gstAmount);
					$('#cessAmount_' + id).val(cessAmount);
					$('#cessAmount_' + id).attr('data-value', cessAmount);
					$('#cessAmount_' + id).attr('data-valuesingle', cessAmount);
					$('#itemqty_' + id).val(1);
					$('#gstper_' + id).val(obj.hsn_tax);
					
					$('#totalTaxableAmount').val(taxableAmount);
					$('.taxableAmount').each(function (index) {
						console.log($(this).val());
						totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
					});
					$('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
					$('.cessAmount').each(function (index) {
						console.log($(this).val());
						totalcessAmount = totalcessAmount + parseFloat($(this).val());
					});
					$('#cessAmount').val(totalcessAmount.toFixed(2));
					$('.gstAmount').each(function (index) {
						console.log($(this).val());
						totalgstAmount = totalgstAmount + parseFloat($(this).val());
					});
					$('#amountGst').val(totalgstAmount.toFixed(2));
					grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
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
					$('#grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
					calc_outstanding();
					// var paidamount = $('#paidamount').val();
					// var bankamount = $('#bankamount').val();
					// if (bankamount == '') {
					// 	bankamount = 0;
					// }
					// if (paidamount == '') {
					// 	paidamount = 0;
					// }
					// var outstanding_previous = parseInt($('#outstanding_previous').val()); 
					// $('#outstanding').val(parseInt(outstanding_previous + grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));
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
			//alert(inqty);

			//	alert(mop);
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;
			if(parseInt(inqty)>=parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid #d2d6de"});
			}else if(parseInt(inqty)<parseInt(qnty)){
				$('#itemqty_'+order).css({"border":"1px solid red"});
			
			}
			
				

				var item_hsn_tax = $('#gstper_'+order).val();
				var unitprice = $('#unitprice_'+order).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
					var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
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
				$('#totalAmount_' + order).val((itemsubtotal).toFixed(2));	


				$('#qtymop_'+order).val(qnty*mop);
				$('.taxableAmount').each(function (index) {
					totalTaxableAmount = totalTaxableAmount + parseFloat($(this).val());
				});
				$('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
				$('.cessAmount').each(function (index) {
					totalcessAmount = totalcessAmount + parseFloat($(this).val());
				});
				$('#cessAmount').val(totalcessAmount.toFixed(2));
				$('.gstAmount').each(function (index) {
					console.log($(this).val());
					totalgstAmount = totalgstAmount + parseFloat($(this).val());
				});
				$('#amountGst').val(totalgstAmount.toFixed(2));
				grandTotal = totalTaxableAmount + totalcessAmount + totalgstAmount;
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
				$('#grandTotal').val(Math.round(grandTotal + parseInt(deliverycharge) - parseInt(discount)));
				calc_outstanding();
				// var paidamount = $('#paidamount').val();
				// var bankamount = $('#bankamount').val();
				// if (bankamount == '') {
				// 	bankamount = 0;
				// }
				// if (paidamount == '') {
				// 	paidamount = 0;
				// }
				// var outstanding_previous = parseInt($('#outstanding_previous').val());
				// $('#outstanding').val(outstanding_previous + parseInt(grandTotal) + parseInt(deliverycharge) - parseInt(discount) - parseInt(paidamount) - parseInt(bankamount));
			
			

		});

		
		
		$ ('input[name=paymod1]'). click (function () {
			calc_outstanding();
		});

		$('#paidamount, #bankamount').on('keyup', function () {
			calc_outstanding();
		});

		

		$('.emicheck').on('click', function () {

			$('.salecardnumber').hide();
			$('.cardnumber').hide();
			$('.salescheque').hide();
			$('.saleschequenumber').hide();
			$('.transcheq').hide();
			$('.salestranscheque').hide();
			$('.bankamount1').show();
			$('.bank1').show();
			$('.bankamount').show();
			$('.bank').show();
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
		
		$('#cust_search').on('click','.custsearchmodal', function () {
				
			$('#custsearch_modal').modal('show');
		
		});
		
		$('#searchinput').on('keyup',function(){
			var type1=$('#searchtype:checked').val();
			
		    var val=$(this).val();
		    var rowno=$('#searchinput').data('row');console.log('row--'+rowno);
		    	$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/searchitemmodal');?>',
				data: { itemValue: val,row:rowno ,type1:type1},
				success: function (res) {
				    $('#searchbox').html(res);
				}
		    });
		});
		$('#customersearchinput').on('keyup',function(){
		    var val=$(this).val();
		   
		    	$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/searchcustomermodaladmin');?>',
				data: { itemValue: val,},
				success: function (res) {
				    $('#searchcust').html(res);
				}
		    });
		});
		$('#searchbox').on('click','tr td',function(){

		    var itemValue 	= $(this).parent().data('id');
			var itemBatchid = $(this).parent().data('batch');
			//var itemBatchid = itemBatchid.trim();
		    var id = $('#searchinput').attr('data-row');
			//alert(id);
			// var totalTaxableAmount = 0;
			// var totalcessAmount = 0;
			// var totalgstAmount = 0;
			// var grandTotal = 0;
			// var deliverycharge = 0;
			// var discount = 0;
			$.ajax({
				type: "POST",
				dataType: "json",
				url: '<?php echo site_url('Admin/getItemBatchDetailseach');?>',
				
				data: { itemValue: itemValue },
				success: function (res) {
					console.log(res);
				
					
				
					 $('#itembatchid_'+id).empty();
					
					$('#itembatchid_'+id).append('<option value="0">select</option>');
						$.each(res,function(index,data){
            		 $('#itembatchid_'+id).append('<option value="'+data['batch_id']+'">'+data['batchcode']+'</option>');
          			});

				},
			});

			$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/getItemlist');?>',
				
				data: { itemValue: itemValue },
				success: function (res) {
					$('#searchModel button.close').click();
				    $('#searchinput').attr('data-row','');
				    //$('#searchbox').html('');
					console.log(res); 
					
					 var obj = JSON.parse(res);
					
					$('#code_' + id).val(obj.itm_code);
					$('#itemname_' + id).val(obj.itm_name );
					
				},
		});	
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
		$("html").on('click','.customersearchlist',function(){
				$('#custsearch_modal button.close').click();
			 	$('#customername').val($(this).data('id'));
			  	$('#phon_num').val($(this).data('phone_num'));
				  $('#customerid').val($(this).data('cusid'));
				$('#address').val($(this).data('address'));
				$('#outstanding_previous').val($(this).data('outstanding'));
				$('#outstanding').val($(this).data('outstanding'));
		});
		$(".reset").bind("click", function() {
		$(".cleardata").val("");
		});
		$('#transmode').on('change',function(){
			var id=$(this).val();
			if(id==3){
				$('#financelabel').show();
				$('#financeinput').show();
			}else{
				$('#financelabel').hide();
				$('#financeinput').hide();
			}
		});
	

	//Edit
	$('.editsales').on('click', function() {

		var id = $(this).data('id');
		$('.salesedit_content').empty();

		if (id) {

			$.ajax({

				type: "POST",
				url: '<?php echo site_url('Admin/getsalesb2c_details');?>',
				data: {
					id: id
				},

				success: function(res) {
					//console.log(res);
					$('.salesedit_content').append(res);
				},

			});

		}

		$('#editModal').modal({
			backdrop: 'static',
			keyboard: false
		});

	});

	
	$('#sales_cont').on('keyup', '.unitprice', function () {
		//Compare with item_mop <

		var id = $(this).data('order');
		var unitprice = $(this).val();
				
		
		var qnty = $('#itemqty_'+id).val();
		var mop = $('#qtymop_'+id).val() / (qnty || 1);
		var minmop=$('#pcost_'+id).val();

				//alert(id);
		if(parseInt(unitprice)<parseInt(minmop)){

			//alert("Total amount is greater than Item MOP : '"+mop+"'");
			$(this).css("border","2px solid red");
			$(this).css("color","red");
			
			$(this).attr('title', "Total amount is less than Item Purchase Cost : '"+mop+"'")
										.tooltip('fixTitle')
										.tooltip('show');  

			

							
		}
		else{ 

			$(this).css("border","1px solid #ccc");
			$(this).css("color","#555");
			$(this).tooltip('hide');
			$(this).attr('data-original-title', '');


			var item_hsn_tax = $('#gstper_'+id).val();
			var taxableAmount = 0; 
			if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
				var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
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
			$('#cessAmount_' + id).val((cesssubtotal).toFixed(2));
			$('#totalAmount_' + id).val((itemsubtotal).toFixed(2));	
			
			recalculate();
			
		}

	});

	
	$('#sameasaddress').on('click', function() { 

		$('#deliveryaddress').val($('#address').val());
	});

	$("#isigst").change(function() {
 
			
			$('.cessAmount').each(function (index) {

				$(this).val('0.00');
				var order = $(this).data('order');
				var qnty = $('#itemqty_'+order).val();

				var item_hsn_tax = $('#gstper_'+order).val();
				var unitprice = $('#unitprice_'+order).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
					var taxableAmount = (parseInt(unitprice) / (101 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
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
				$('#totalAmount_' + order).val((itemsubtotal).toFixed(2));	


			});

			
			recalculate();
		
	});
	$('#customername').on('keyup',function(){
	  $('#customerid').val(0);
  });
  $('#sales_cont').on('change','.Employee',function(){ 
	var order = $(this).data('order');
	var batchid=$("#itembatchid_"+order).val();
	var itemid=$('#puritem_'+order).val();

	var itemqty=$('#itemqty_'+order).val();
	var unit_price=$('#unitprice_'+order).val();
	  $.ajax({

				type: "POST",
				url: '<?php echo site_url('Admin/getbath_incentives');?>',
				data: {
					batchid:batchid,
					itemid:itemid


				},

				success: function(res) {
					
					var obj = JSON.parse(res);
					if(obj.incentive_type==1)
					{
						$('#incentive_'+order).val(obj.id);
						$('#incentiveamt_'+order).val(obj.in_peramount);
						console.log(obj.in_peramount);
					}
					else if(obj.incentive_type==2)
					{
						$('#incentive_'+order).val(obj.id);
						var incentive_amount=(unit_price*obj.in_peramount/100)*itemqty;
						$('#incentiveamt_'+order).val(incentive_amount);
						console.log(obj.in_peramount);
					}
					else 
					{
						
						if(parseInt(unit_price)==parseInt(obj.range1))
						{
							if(obj.r1_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r1_amount);
							}
							else{
								var incentive_amountr1=(unit_price*obj.r1_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr1);
							}

						}
						else if(parseInt(obj.range1)<parseInt(unit_price) && parseInt(obj.range2)>=parseInt(unit_price))
						{
							
							if(obj.r2_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r2_amount);
							}
							else{
								var incentive_amountr2=(unit_price*obj.r2_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr2);
							}

						}
						else if(parseInt(obj.range2)<parseInt(unit_price) && parseInt(obj.range3)>=parseInt(unit_price))
						{
							if(obj.r3_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r3_amount);
							}
							else{
								var incentive_amountr3=(unit_price*obj.r3_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr3);
							}

						}
						else if(parseInt(obj.range3)<parseInt(unit_price)){
							//alert(unit_price);alert(obj.range3);
							
							if(obj.r4_type=1)
							{
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(obj.r4_amount);
							}
							else{
								var incentive_amountr4=(unit_price*obj.r4_amount/100)*itemqty;
								$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(incentive_amountr4);
							}

						}else{
							$('#incentive_'+order).val(obj.id);
								$('#incentiveamt_'+order).val(0);
						}

					}
					//$('.salesedit_content').append(res);
				},

			});
	
});
$('.fa-edit').on('click',function(){
	var id=$(this).data('id');
	if (id) {

$.ajax({

	type: "POST",
	url: '<?php echo site_url('Admin/get_salesmasterbecfetching');?>',
	data: {
		id: id
	},

	success: function(res) {
	//	console.log(res);
	$('.editb2c_modalbody').html(res);
	$('#master_id').val(id);
	
	},

});

}
$('#editb2cmodal_edit').modal('show');
});


$('#search_sale').on('keyup',function(){
var variable=$(this).val();
if(variable!=""){
$.ajax({
			type: "POST",
			url: '<?php echo site_url('AdminController/get_saleb2csaerch');?>',
			data: {
				variable: variable
			},
			success: function(res) {
				if(res){
									//vineeth---
									$('#saleb2cbody').show();
									$('#saleb2cbody').html(res);
								}else{
									$('#saleb2cbody').html("");
								}
				
			},
		});
}else{
	location.reload();
}

});
	</script>




	</body>

	</html>