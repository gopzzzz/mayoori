<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
.modal-content {
    border: 0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 35px rgba(0,0,0,0.15);
}

.modal-body .form-group {
    margin-bottom: 18px;
}

.modal-body .exampleInputEmail1 {
    display: block;
    margin-bottom: 7px;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    text-transform: uppercase;
}

.modal-body .form-control {
    height: 40px;
    border: 1px solid #d9dee5;
    border-radius: 6px;
    box-shadow: none;
    transition: 0.2s ease;
}

.modal-body textarea.form-control {
    height: auto;
    resize: vertical;
}

.modal-body .form-control:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79,70,229,0.08);
}

.modal-body .btn {
    border-radius: 5px;
    font-weight: 600;
    padding: 7px 14px;
}
/* Select2 Form Control */
.select2-container {
    width: 100% !important;
}

.select2-container .select2-selection--single {
    height: 40px !important;
    border: 1px solid #d9dee5 !important;
    border-radius: 6px !important;
    background: #fff !important;
}

.select2-container--default
.select2-selection--single
.select2-selection__rendered {
    line-height: 40px !important;
    padding-left: 12px !important;
    padding-right: 35px !important;
    font-size: 13px;
    color: #495057;
}

.select2-container--default
.select2-selection--single
.select2-selection__arrow {
    height: 40px !important;
    right: 8px !important;
}

.select2-container--default.select2-container--focus
.select2-selection--single,
.select2-container--default.select2-container--open
.select2-selection--single {
    border-color: #337ab7 !important;
    box-shadow: 0 0 0 2px rgba(51, 122, 183, 0.08) !important;
}

/* Dropdown */
.select2-dropdown {
    border: 1px solid #d9dee5 !important;
    border-radius: 6px !important;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
}

.select2-search--dropdown {
    padding: 8px;
}

.select2-search--dropdown .select2-search__field {
    height: 36px;
    border: 1px solid #d9dee5;
    border-radius: 5px;
    padding: 6px 10px;
    outline: none;
}

.select2-search--dropdown .select2-search__field:focus {
    border-color: #337ab7;
}

/* Options */
.select2-results__option {
    padding: 9px 12px;
    font-size: 13px;
}

.select2-container--default
.select2-results__option--highlighted[aria-selected] {
    background: #337ab7;
    color: #fff;
}

.select2-container--default
.select2-results__option[aria-selected="true"] {
    background: #f1f5f9;
    color: #333;
}

/* Placeholder */
.select2-container--default
.select2-selection--single
.select2-selection__placeholder {
    color: #999;
}
</style>
  
  <?php $data['leftmenu'] = 'receiptandpayment';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?> 

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Cash Receipt <small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'respay';?>"> Cash Receipt </a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:60%;">
						<!-- Modal content-->
						
						<form name="myForm"
      id="myFormId"
      onsubmit="return validateForm()"
      method="post"
      action="<?php echo site_url('cashreciptadd');?>">

    <div class="modal-content cash-receipt-modal">

        <!-- Header -->
        <div class="modal-header cash-receipt-header">

            <div>
                <h4 class="modal-title">
                    <i class="fa fa-money"></i>
                    Cash Receipt
                </h4>

                <small>Receipt Entry</small>
            </div>

            <button type="button"
                    class="close"
                    data-dismiss="modal">
                &times;
            </button>

        </div>


        <!-- Body -->
        <div class="modal-body">

            <div class="row">

                <!-- REF NO -->
                <div class="col-sm-4">
                    <div class="receipt-field">

                        <label class="exampleInputEmail1">
                            REF NO
                        </label>

                        <input type="text"
                               class="form-control"
                               name="refnoview"
                               value="CRPT<?php
                               foreach($recipay as $keybill){
                                   if($keybill->mycount==0){
                                       echo "1";
                                   } else {
                                       foreach($last_bill_number as $keybill1){
                                           echo $keybill1->referalnumber+1;
                                       }
                                   }
                               }
                               ?>">

                        <input type="hidden"
                               name="refno"
                               value="<?php
                               foreach($recipay as $keybill){
                                   if($keybill->mycount==0){
                                       echo "1";
                                   } else {
                                       foreach($last_bill_number as $keybill1){
                                           echo $keybill1->referalnumber+1;
                                       }
                                   }
                               }
                               ?>">

                    </div>
                </div>


                <!-- DATE -->
                <div class="col-sm-4">
                    <div class="receipt-field">

                        <label class="exampleInputEmail1">
                            DATE
                        </label>

                        <input type="date"
                               class="form-control"
                               name="todaydate"
                               value="<?php echo date('Y-m-d');?>"
                               required>

                    </div>
                </div>


                <!-- RECEIPT ON -->
                <div class="col-sm-4">
                    <div class="receipt-field">

                        <label class="exampleInputEmail1">
                            RECEIPT ON
                        </label>

                        <select class="form-control cleardata"
                                name="payorrepton"
                                id="pron">

                            <option value="0">Select</option>
                            <option value="1">Normal</option>
                            <option value="2">Against B2B sale</option>
                            <option value="3">Against B2C sale</option>
                            <option value="4">Against Purchase Bill</option>
                            <option value="7">Sales Order</option>

                        </select>

                    </div>
                </div>


                <!-- BILL / VOUCHER -->
                <div class="col-sm-4">
                    <div class="receipt-field">

                        <label class="exampleInputEmail1">
                            BILL NO / VOUCHER NO
                        </label>

                        <input type="text"
                               class="form-control cleardata"
                               name="payment"
                               id="payment"
                               placeholder="Enter bill / voucher number"
                               required>

                    </div>
                </div>


                <!-- LEDGER -->
                <div class="col-sm-4">
                    <div class="receipt-field">

                        <label class="exampleInputEmail1">
                            LEDGER AC
                        </label>

                       <select class="form-control cleardata"
        name="ledac"
        id="ledger">
    <option value="0">Select</option>
</select>

                    </div>
                </div>


                <!-- AMOUNT -->
                <div class="col-sm-4">
                    <div class="receipt-field">

                        <label class="exampleInputEmail1">
                            AMOUNT
                        </label>

                        <div class="amount-input">

                            <!-- <span class="currency-symbol">₹</span> -->

                            <input type="text"
                                   class="form-control cleardata"
                                   name="amount" id="outstanding" 
                                   placeholder="0.00"
                                   required>

                        </div>

                    </div>
                </div>


                <!-- PARTICULARS -->
                <div class="col-sm-12">
                    <div class="receipt-field">

                        <label class="exampleInputEmail1">
                            PARTICULARS
                        </label>

                        <textarea class="form-control cleardata"
                                  name="particulars"
                                  rows="3"
                                  placeholder="Enter receipt particulars..."></textarea>

                    </div>
                </div>

            </div>


            <!-- Hidden Save Type -->
            <input type="hidden"
                   name="savetype"
                   id="savetype">


            <!-- Buttons -->
            <div class="receipt-actions">

                <button type="submit"
                        name="submit"
                        id="saveprint"
                        class="btn btn-primary btn-sm">

                    <i class="fa fa-print"></i>
                    SAVE & PRINT

                </button>


                <button type="submit"
                        name="save"
                        id="saveonly"
                        class="btn btn-secondary btn-sm">

                    <i class="fa fa-save"></i>
                    SAVE

                </button>


                <button type="button"
                        class="btn btn-success btn-sm">

                    <i class="fa fa-eye"></i>
                    VIEW

                </button>


                <button type="button"
                        class="btn btn-danger btn-sm reset">

                    <i class="fa fa-refresh"></i>
                    CLEAR

                </button>


                <button type="button"
                        class="btn btn-warning btn-sm">

                    <i class="fa fa-trash"></i>
                    DELETE

                </button>
                
              

            </div>

        </div>


        <!-- Footer -->
        <div class="modal-footer"></div>

    </div>

</form>
					</div>
		</div>

    <div class="modal fade" id="editModal" role="dialog">
					<div class="modal-dialog" style="width:60%;">
						<!-- Modal content-->
						<?php echo form_open_multipart('cashrecipt_edit'); ?>

<div class="modal-content">

    <!-- Header -->
    <div class="modal-header" style="background:#f8f9fa; border-bottom:1px solid #e5e7eb;">
        <h4 class="modal-title" style="font-weight:600; margin:0;">
            <i class="fa fa-money"></i> Cash Receipt
        </h4>

        <button type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close">
            &times;
        </button>
    </div>


    <!-- Body -->
    <div class="modal-body" style="padding:25px;">

        <!-- Receipt Information -->
        <div class="row">

            <!-- REF NO -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="exampleInputEmail1">
                        REF NO:
                    </label>

                    <input type="text"
                           class="form-control"
                           name="refnoview"
                           id="refnoview"
                           value="CRPT<?php
                                foreach($recipay as $keybill){
                                    if($keybill->mycount==0){
                                        echo "1";
                                    } else {
                                        foreach($last_bill_number as $keybill1){
                                            echo $keybill1->referalnumber+1;
                                        }
                                    }
                                }
                           ?>"
                           readonly>

                    <input type="hidden"
                           name="refno"
                           id="refno"
                           value="<?php
                                foreach($recipay as $keybill){
                                    if($keybill->mycount==0){
                                        echo "1";
                                    } else {
                                        foreach($last_bill_number as $keybill1){
                                            echo $keybill1->referalnumber+1;
                                        }
                                    }
                                }
                           ?>">
                </div>
            </div>


            <!-- DATE -->
            <div class="col-sm-4">
                <div class="form-group">

                    <label class="exampleInputEmail1">
                        DATE
                    </label>

                    <input type="date"
                           class="form-control"
                           name="todaydate"
                           id="todaydate"
                           value="<?php echo date('Y-m-d');?>"
                           required>

                </div>
            </div>


            <!-- RECEIPT ON -->
            <div class="col-sm-4">
                <div class="form-group">

                    <label class="exampleInputEmail1">
                        RECEIPT ON
                    </label>

                    <select class="form-control cleardata"
                            name="payorrepton"
                            id="pron">

                        <option value="0">Select</option>
                        <option value="1">Normal</option>
                        <option value="2">Against B2B sale</option>
                        <option value="3">Against B2C sale</option>
                        <option value="4">Against Purchase Bill</option>
                        <option value="7">Sales Order</option>

                    </select>

                </div>
            </div>

        </div>


        <!-- Transaction Details -->
        <div class="row">

            <!-- BILL NO -->
            <div class="col-sm-4">
                <div class="form-group">

                    <label class="exampleInputEmail1">
                        BILL NO / VOUCHER NO
                    </label>

                    <input type="text"
                           class="form-control cleardata"
                           name="payment"
                           id="payment"
                           placeholder="Bill / Voucher Number"
                           readonly>

                </div>
            </div>


            <!-- LEDGER -->
            <div class="col-sm-4">
                <div class="form-group">

                    <label class="exampleInputEmail1">
                        LEDGER AC
                    </label>

                    <input type="text"
                           name="ledgertemp"
                           id="ledgernew"
                           class="form-control"
                           placeholder="Ledger Account"
                           readonly>

                    <input type="hidden"
                           name="ledac"
                           id="ledgertemp">

                    <input type="hidden"
                           name="bpid"
                           id="bpid">

                </div>
            </div>


            <!-- AMOUNT -->
            <div class="col-sm-4">
                <div class="form-group">

                    <label class="exampleInputEmail1">
                        AMOUNT
                    </label>

                    <div style="position:relative;">

                        <span style="
                            position:absolute;
                            left:12px;
                            top:8px;
                            font-weight:600;
                            color:#555;
                            z-index:2;
                        ">₹</span>

                        <input type="text"
                               class="form-control cleardata"
                               name="amount"
                               id="amount"
                               style="padding-left:30px;"
                               placeholder="0.00"
                               required>

                    </div>

                    <input type="hidden"
                           class="form-control cleardata"
                           name="amount1"
                           id="amount1"
                           required>

                </div>
            </div>

        </div>


        <!-- Particulars -->
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">

                    <label class="exampleInputEmail1">
                        PARTICULARS
                    </label>

                    <textarea class="form-control cleardata"
                              name="particulars"
                              id="particulars"
                              rows="3"
                              placeholder="Enter receipt particulars..."></textarea>

                </div>
            </div>

        </div>


        <!-- Hidden Save Type -->
        <input type="hidden"
               name="savetype"
               id="savetype">


        <!-- Action Buttons -->
        <div class="row" style="margin-top:25px;">

            <div class="col-sm-12">

                <div style="
                    display:flex;
                    flex-wrap:wrap;
                    gap:10px;
                    align-items:center;
                ">

                    <button type="submit"
                            name="submit"
                            id="saveprint"
                            class="btn btn-primary btn-sm">
                        <i class="fa fa-print"></i>
                        SAVE & PRINT
                    </button>


                    <button type="submit"
                            name="save"
                            id="saveonly"
                            class="btn btn-secondary btn-sm">
                        <i class="fa fa-save"></i>
                        SAVE
                    </button>


                    <button type="button"
                            class="btn btn-success btn-sm">
                        <i class="fa fa-eye"></i>
                        VIEW
                    </button>


                    <button type="button"
                            class="btn btn-danger btn-sm reset">
                        <i class="fa fa-refresh"></i>
                        CLEAR
                    </button>


                    <button type="button"
                            class="btn btn-warning btn-sm">
                        <i class="fa fa-trash"></i>
                        DELETE
                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- Footer -->
    <div class="modal-footer"
         style="
            background:#f8f9fa;
            border-top:1px solid #e5e7eb;
         ">
    </div>

</div>

</form>
					</div>
		</div>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cash Receipt</h3>
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
                  <th>Ref.no</th>
                  <th>Date</th>
                  <th>Ledger</th>
				  <th>Receipt For</th>
                  <th>Particulars</th>
                  <th>Amount</th>
                  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($receiptcash as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td>CRPT<?php echo $key->referalnumber;?></td>
                  <td><?php echo date('d-m-Y',strtotime($key->date));?></td>
                  <td><?php if($key->receiptorpay_on==1){ echo $key->le_name; }else if($key->receiptorpay_on==4){echo $key->sup_name; }else if($key->receiptorpay_on==5){echo $key->stf_name;}else{ echo $key->cus_name; } ?></td>
				  <td><?php if($key->receiptorpay_on==1){echo "Normal";}else if($key->receiptorpay_on==2){echo "B2B";}else if($key->receiptorpay_on==3){echo "B2C";}else if($key->receiptorpay_on==4){echo "Purchase";}else if($key->receiptorpay_on==5){echo "Salary";}else if($key->receiptorpay_on==7){echo "Sale Order";} ?> - <?php echo $key->receiptnumber; ?></td>

                  <td><?php echo $key->narration;?></td>
                  <td><?php echo $key->amount;?></td>				  
                  <td><?php echo anchor('del_hsn/'.$key->bp_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
                    <!-- <li class="fa fa-eye" data-toggle="modal" data-target="#myModal2<?php echo $key->bp_id;?>"></li> -->
                    <i class="fa fa-pencil" aria-hidden="true" onclick="editthis(this.id);" id="<?php echo $key->bp_id;?>">

                    </i>
                   <a href="<?php echo base_url('cashreceipt_print/'.$key->bp_id);?>"> <i class="fa fa-print"></i></a>
                  </td>
                </tr>
				
				<!--------------------------------------------------------->
		
                
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

 
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
  
    $('#payment_type').on('change',function(){
	   
      var pay_type = this.value;  
	//alert(pay_type);
	 if(pay_type==1){  
    $.ajax({
        type: "POST",
        url: "http://espylabs.com/mayoori_sw/admin/search_receipt_mode",
      
        data:{pay_type:pay_type},
        success: function(result){
			var obj=JSON.parse(result);
			
			$('#voucher_num').val(obj.receipt);
			$('#payment').hide();
			$('#voucher_num').show();
			
        console.log(obj.receipt);
    }});
}
 if(pay_type==2){  
    $.ajax({
        type: "POST",
        url: "http://espylabs.com/mayoori_sw/admin/search_payment_mode",
      
        data:{pay_type:pay_type},
        success: function(result){
			var obj=JSON.parse(result);
			
			$('#voucher_num').hide();
			$('#payment').show();
			$('#payment').val(obj.payment);
        console.log(obj.payment);
    }});
}
  }); 
	
 $('#pron').on('change', function() {

    let pay_type = $(this).val();

	

    $('#ledger').val(null).trigger('change');

    $('#ledger').select2('destroy');

    initLedgerDropdown('#ledger');
});

$('#payment').on('change', function () {

    var id = $(this).val();
    var type = $('#pron').val();
    var ledger = $('#ledger').val();

    if (!type) {
        alert("You need to select Receipt On");
        return;
    }

    if (!ledger) {
        alert("You need to select Ledger Account");
        return;
    }

    if (!id) {
        return;
    }

    $.ajax({

        type: "POST",

        url: '<?php echo site_url("Admin/getbalanceamount"); ?>',

        data: {
            id: id,
            type: type,
            ledger: ledger
        },

        success: function (result) {

            var obj = JSON.parse(result);

            if (obj.status == false) {

                alert(obj.message);

                // $('#payment').val('');

                return;
            }

            console.log("Outstanding Amount: " + obj.amount);

            // Optional:
            $('#outstanding').val(obj.amount);
        }

    });

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
    $(".reset").bind("click", function() {
		  $(".cleardata").val("");
		});

    function editthis(id){

      $.ajax({

          type: "POST",
          url:'<?php echo site_url('Admin/getcashpayment');?>',

          data:{id:id},
          success: function(result){
            var obj=JSON.parse(result);
            
            $('#editModal #refno').val(obj.referalnumber);
            $('#editModal #refnoview').val('CPAY'+obj.referalnumber);
            $('#editModal #todaydate').val(obj.date);
            $('#editModal #ledgertemp').val(obj.ledger);//
            $('#editModal #pron').val(obj.receiptorpay_on);//
            $("#editModal #pron").change();
			if(obj.receiptorpay_on==1){
					$('#editModal #ledgernew').val(obj.le_name);
				}else if(obj.receiptorpay_on==2 || obj.receiptorpay_on==3 || obj.receiptorpay_on==7){
					$('#editModal #ledgernew').val(obj.cus_name);
				}else if(obj.receiptorpay_on==4){
					$('#editModal #ledgernew').val(obj.sup_name);
				}else if(obj.receiptorpay_on==5){
					$('#editModal #ledgernew').val(obj.stf_name);
				}
            $('#editModal #payment').val(obj.receiptnumber);
            $('#editModal #amount').val(obj.amount);
			$('#editModal #amount1').val(obj.amount);
            $('#editModal #particulars').val(obj.narration);
            $('#editModal #bpid').val(obj.bp_id);
            $('#editModal').modal('show');
          //console.log(obj);
          }

      });

    }

	function validateForm() {
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
}

function initLedgerDropdown(selector) {

    $(selector).select2({
        width: '100%',
        placeholder: 'Search Ledger',
        allowClear: true,

        ajax: {
            url: '<?php echo site_url("Admin/getledgerdropdrown"); ?>',
            type: 'POST',
            dataType: 'json',
            delay: 300,

            data: function(params) {

                return {
                    pay_type: $('#pron').val(),
                    search: params.term || ''
                };
            },

            processResults: function(res) {

                return {
                    results: $.map(res, function(value) {

                        let id;
                        let text;

                        if ($('#pron').val() == 1) {

                            id = value.le_id;
                            text = value.le_name;

                        } else if ($('#pron').val() == 4) {

                            id = value.sup_id;
                            text = value.sup_name;

                        } else {

                            id = value.customer_id;
                            text = value.cus_name +
                                   ' (' +
                                   value.cus_phonenumber +
                                   ')';
                        }

                        return {
                            id: id,
                            text: text
                        };
                    })
                };
            },

            cache: true
        },

        minimumInputLength: 2
    });
}


initLedgerDropdown('#ledger');

</script>

</body>

</html>

