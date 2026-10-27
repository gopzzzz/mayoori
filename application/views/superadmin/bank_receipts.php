

   <?php $data['leftmenu']='bankaccountcreate';$data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <style>
    /* Main Container */
.bank-receipt-form {
    background: #ffffff;
    border: 1px solid #e4e8ed;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
    margin: 20px auto;
}


/* Header */
.bank-receipt-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 25px;
    background: #f7f9fb;
    border-bottom: 1px solid #e5e9ee;
}

.bank-receipt-header h3 {
    margin: 0 0 5px;
    font-size: 21px;
    font-weight: 700;
    color: #263238;
}

.bank-receipt-header p {
    margin: 0;
    color: #8a949e;
    font-size: 13px;
}

.receipt-ref {
    text-align: right;
}

.receipt-ref span {
    display: block;
    font-size: 11px;
    color: #8a949e;
    text-transform: uppercase;
    margin-bottom: 3px;
}

.receipt-ref strong {
    font-size: 17px;
    color: #337ab7;
}


/* Section */
.receipt-section {
    padding: 20px 15px 5px;
    overflow: hidden;
}

.section-title {
    margin: 0 15px 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #edf0f3;
    color: #374151;
    font-size: 14px;
    font-weight: 700;
}

.section-title i {
    margin-right: 7px;
    color: #337ab7;
}


/* Rows */
.receipt-row {
    margin-bottom: 5px;
}


/* Labels */
.labeltext {
    display: flex;
    align-items: center;
    min-height: 40px;
}

.labeltext label {
    margin: 0;
    color: #4b5563;
    font-size: 12px;
    font-weight: 600;
}


/* Inputs */
.divtext .form-control {
    height: 40px;
    border: 1px solid #dce1e6;
    border-radius: 6px;
    box-shadow: none;
    background: #fff;
    color: #374151;
    font-size: 13px;
    transition: all 0.2s ease;
}

.divtext .form-control:focus {
    border-color: #337ab7;
    box-shadow: 0 0 0 3px rgba(51, 122, 183, 0.08);
}


/* Readonly */
.divtext .form-control[readonly] {
    background: #f5f7f9;
    color: #66717d;
}


/* Textarea */
.divtext textarea.form-control {
    height: 85px;
    min-height: 85px;
    resize: vertical;
    padding-top: 10px;
}


/* Amount */
.amount-wrapper {
    position: relative;
}

.amount-symbol {
    position: absolute;
    left: 12px;
    top: 11px;
    z-index: 2;
    font-size: 14px;
    font-weight: 700;
    color: #555;
}

.amount-wrapper input {
    padding-left: 30px;
}


/* Action Area */
.receipt-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 25px;
    margin-top: 15px;
    background: #f8fafc;
    border-top: 1px solid #e6e9ed;
}

.action-left {
    display: flex;
    align-items: center;
}

.action-right {
    display: flex;
    align-items: center;
    gap: 8px;
}

.action-right .divtext {
    padding: 0;
}


/* Buttons */
.receipt-actions .btn {
    height: 40px;
    padding: 8px 16px;
    border-radius: 6px;
    border: none;
    font-size: 12px;
    font-weight: 600;
    box-shadow: none;
    transition: all 0.2s ease;
}

.receipt-actions .btn:hover {
    transform: translateY(-1px);
}

.receipt-actions .btn i {
    margin-right: 5px;
}


/* Mobile */
@media (max-width: 767px) {

    .bank-receipt-form {
        margin: 10px;
        border-radius: 8px;
    }

    .bank-receipt-header {
        padding: 16px;
    }

    .bank-receipt-header h3 {
        font-size: 18px;
    }

    .receipt-ref {
        display: none;
    }

    .receipt-section {
        padding: 15px 5px;
    }

    .receipt-row {
        margin-bottom: 10px;
    }

    .labeltext {
        min-height: auto;
        padding-bottom: 5px;
    }

    .divtext {
        margin-bottom: 8px;
    }

    .receipt-actions {
        display: block;
        padding: 15px;
    }

    .action-left {
        margin-bottom: 10px;
    }

    .action-right {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
    }

    .action-right .divtext {
        flex: 1;
    }

    .receipt-actions .btn {
        width: 100%;
        padding: 8px 10px;
    }
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




<!-- Blue-and-white theme matching the previous Mayoori transaction pages -->
<style>
.content-wrapper{background:#f4f7fb;}
.content-header h1{color:#1f4e79;font-weight:700;letter-spacing:.2px;}
.content-header h1 small{color:#5c7894;}
.content .box{border-top:3px solid #3c8dbc;border-radius:6px;box-shadow:0 2px 12px rgba(30,70,110,.08);background:#fff;}
.content .box-header{padding:15px 18px;border-bottom:1px solid #e5edf5;}
.content .box-title,.content .modal-title{color:#1f4e79;font-weight:700;}
.content .box-body{padding:15px;}
.content .table-responsive{overflow-x:auto;}
.content table.table{width:100%;background:#fff;border-collapse:collapse;margin-bottom:12px;}
.content table.table>thead>tr>th{background:#eaf3fb;color:#214f78;font-weight:700;white-space:nowrap;border:1px solid #c9d9e8!important;padding:10px 8px;vertical-align:middle;}
.content table.table>tbody>tr>td,.content table.table>tbody>tr>th{border:1px solid #d5e0ea!important;padding:8px;vertical-align:middle;}
.content table.table>tbody>tr:nth-child(even){background:#f7faff;}
.content table.table>tbody>tr:hover{background:#edf6ff;}
.bank-receipt-form{border:1px solid #dce7f1;border-top:4px solid #3c8dbc;border-radius:8px;box-shadow:0 4px 18px rgba(30,70,110,.08);background:#fff;}
.bank-receipt-header{background:#eaf3fb;border-bottom:1px solid #d5e3f0;}
.bank-receipt-header h3,.section-title{color:#1f4e79;}
.section-title{border-bottom-color:#e0eaf3;}
.section-title i{color:#287db5;}
.divtext .form-control,.content .form-control{border:1px solid #cbd7e3;border-radius:5px;box-shadow:none;}
.divtext .form-control:focus,.content .form-control:focus{border-color:#3c8dbc;box-shadow:0 0 0 2px rgba(60,141,188,.12);}
.divtext .form-control[readonly]{background:#f2f6fa;}
.labeltext label,.content label{color:#334e68;font-weight:600;}
.receipt-actions{background:#f4f8fc;border-top:1px solid #dce7f1;}
.receipt-actions .btn{border-radius:5px;font-weight:600;transition:background .2s ease;}
.content .btn-primary,.receipt-actions .btn-primary{background:#287db5;border-color:#287db5;}
.content .btn-primary:hover,.receipt-actions .btn-primary:hover{background:#1f6798;border-color:#1f6798;}
.content .btn-info,.receipt-actions .btn-info{background:#287db5;border-color:#287db5;}
.content .modal-content{border:0;border-radius:8px;box-shadow:0 8px 28px rgba(20,50,80,.18);overflow:hidden;}
.content .modal-header{background:#eaf3fb;border-bottom:1px solid #d4e2ef;padding:15px 20px;}
.content .modal-footer{border-top:1px solid #e5edf5;background:#f8fafc;}
.content .text-success{color:#287db5;}
.dataTables_wrapper .dt-buttons{margin-bottom:12px;}
.dataTables_wrapper .dt-buttons .dt-button{background:#287db5!important;color:#fff!important;border:1px solid #287db5!important;border-radius:5px!important;padding:7px 14px!important;margin-right:6px!important;font-weight:600!important;box-shadow:none!important;}
.dataTables_wrapper .dt-buttons .dt-button:hover{background:#1f6798!important;border-color:#1f6798!important;}
.dataTables_wrapper .dataTables_filter input,.dataTables_wrapper .dataTables_length select{border:1px solid #cbd7e3;border-radius:5px;padding:5px 8px;outline:none;}
.dataTables_wrapper .dataTables_filter input:focus{border-color:#3c8dbc;}
.select2-container--default .select2-selection--single{border-color:#cbd7e3!important;border-radius:5px!important;}
.select2-container--default.select2-container--focus .select2-selection--single,.select2-container--default.select2-container--open .select2-selection--single{border-color:#3c8dbc!important;}
@media(max-width:767px){.content{padding:10px;}.bank-receipt-form{margin:10px 0;}.bank-receipt-header{padding:16px;}.receipt-actions{display:block;padding:15px;}.action-right{flex-wrap:wrap;gap:7px;}.content .modal-dialog{width:auto!important;margin:10px;}.content table.table{min-width:850px;}}
</style>

  <div class="content-wrapper">


 
  



    <!-- Content Header (Page header) -->



    <section class="content-header">



      <h1 align="center">BANK RECEIPTS<small>Preview</small></h1>



      



      <ol class="breadcrumb">



        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



        <li><a href="<?php echo base_url().'bank_receipts';?>">BANK RECEIPTS</a></li>



      </ol>



    </section><br>



  <style>

 

  table, td, th {

  border: 1px solid #cac6c6;

}



#example2 {

  border-collapse: separate;

}

.box-body{

    margin: 22px;

}

.divtext{

    margin-top: 21px;

}

  </style>



    <!-- Main content -->



    <section class="content">

      

		<div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">BANK RECEIPTS</h3>

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

            <div class="box-body table-responsive no-padding row">


            <form name="myForm" id="myFormId" onsubmit="return validateForm1()" method="post" action="<?php echo site_url('bank_receipts');?>">

    <div class="bank-receipt-form">

        <!-- Header -->
        <div class="bank-receipt-header">
            <div>
                <h3>Bank Receipt</h3>
                <p>Enter the receipt and transaction details</p>
            </div>
            <div class="receipt-ref">
                <span>Reference</span>
                <strong>BRPT<?php
                    if($last_id==null){
                        echo "1";
                    }else{
                        foreach($last_id as $key3){
                            echo $key3->referalnumber + 1;
                        }
                    }
                ?></strong>
            </div>
        </div>


        <!-- Receipt Information -->
        <div class="receipt-section">

            <div class="section-title">
                <i class="fa fa-file-text-o"></i>
                Receipt Information
            </div>

            <div class="col-sm-12 receipt-row">

                <div class="col-sm-3 labeltext divtext">
                    <label>Date</label>
                </div>

                <div class="col-sm-3 divtext">
                    <input name="date" type="hidden" value="<?php echo date('Y-m-d');?>" readonly>
                    <input class="form-control" name="dateview" type="text" value="<?php echo date('d-m-Y');?>" readonly>
                </div>


                <div class="col-sm-3 labeltext divtext">
                    <label>Referal Number</label>
                </div>

                <div class="col-sm-3 divtext">

                    <input type="hidden" name="refno"
                        placeholder="Referal Number"
                        value="<?php
                            if($last_id==null){
                                echo "1";
                            }else{
                                foreach($last_id as $key3){
                                    echo $key3->referalnumber + 1;
                                }
                            }
                        ?>"
                        readonly>

                    <input class="form-control"
                        name="refnoview"
                        placeholder="Referal Number"
                        value="BRPT<?php
                            if($last_id==null){
                                echo "1";
                            }else{
                                foreach($last_id as $key3){
                                    echo $key3->referalnumber + 1;
                                }
                            }
                        ?>"
                        readonly>

                </div>

            </div>


            <div class="col-sm-12 receipt-row">

                <div class="col-sm-3 labeltext divtext">
                    <label>Bank Account</label>
                </div>

                <div class="col-sm-3 divtext">

                    <select name="bank" class="form-control" id="bankaccount">
                        <option value="0">select bank account</option>

                        <?php foreach($bankaccount as $key1){?>
                            <option value="<?php echo $key1->ba_id;?>">
                                <?php echo $key1->bank_name.'-'.substr($key1->ba_acnumber,-4);?>
                            </option>
                        <?php } ?>

                    </select>

                </div>


                <div class="col-sm-3 labeltext divtext">
                    <label>Bank Balance</label>
                </div>

                <div class="col-sm-3 divtext">
                    <input class="form-control" name="bankbal" id="bankbalance" readonly>
                </div>

            </div>


            <div class="col-sm-12 receipt-row">

                <div class="col-sm-3 labeltext divtext">
                    <label class="exampleInputEmail1">RECEIPT ON</label>
                </div>

                <div class="col-sm-3 divtext">

                    <select class="form-control" name="payorrepton" id="pron">
                        <option value="0">Select</option>
                        <option value="1">Normal</option>
                        <option value="2">Against B2B sale</option>
                        <option value="3">Against B2C sale</option>
                        <option value="4">Against Purchase Bill</option>
                        <option value="7">Sales Order</option>
                    </select>

                </div>


                <div class="col-sm-3 labeltext divtext">
                    <label>Ledger</label>
                </div>

                <div class="col-sm-3 divtext">

                       <select class="form-control cleardata"
        name="ledac"
        id="ledger">
    <option value="0">Select</option>
</select>

                </div>

            </div>


            <div class="col-sm-12 receipt-row">

                <div class="col-sm-3 labeltext divtext">
                    <label>Ledger Balance</label>
                </div>

                <!-- <div class="col-sm-3 divtext">
                    <input class="form-control" name="ledger_bal" id="ledgerbalance" readonly>
                </div> -->


                <div class="col-sm-3 labeltext divtext">
                    <label>Cheque Number</label>
                </div>

                <div class="col-sm-3 divtext">
                    <input class="form-control" name="cheque" placeholder="Cheque Number">
                </div>

            </div>


            <div class="col-sm-12 receipt-row">

                <div class="col-sm-3 labeltext divtext">
                    <label>Amount</label>
                </div>

                <div class="col-sm-3 divtext amount-wrapper">
                    <span class="amount-symbol">₹</span>
                    <input class="form-control" name="amount" placeholder="Amount">
                </div>


                <div class="col-sm-3 labeltext divtext">
                    <label>Bill/Voucher Number</label>
                </div>

                <div class="col-sm-3 divtext">
                    <input class="form-control" name="vouchernum" placeholder="Voucher Number" required>
                </div>

            </div>

        </div>


        <!-- Additional Details -->
        <div class="receipt-section">

            <div class="section-title">
                <i class="fa fa-pencil-square-o"></i>
                Additional Details
            </div>

            <div class="col-sm-12 receipt-row">

                <div class="col-sm-3 labeltext divtext">
                    <label>Narration</label>
                </div>

                <div class="col-sm-3 divtext">
                    <textarea class="form-control" name="narration" placeholder="Narration"></textarea>
                </div>


                <div class="col-sm-3 labeltext divtext">
                    <label>Cheque Date</label>
                </div>

                <div class="col-sm-3 divtext">
                    <input class="form-control" name="chqudate" type="date" placeholder="Date">
                </div>

            </div>

        </div>


        <!-- Actions -->
        <div class="receipt-actions">

            <div class="action-left">
                <div class="col-sm-3 divtext">
                    <button type="button"
                        class="btn btn-primary btn-lg"
                        data-toggle="modal"
                        data-target="#myModal">
                        <i class="fa fa-plus"></i> Create Ledger
                    </button>
                </div>
            </div>

            <div class="action-right">

                <div class="divtext">
                    <button type="button" class="btn btn-info btn-lg">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>

                <div class="divtext">
                    <a href="<?php echo base_url('bank_receiptslist');?>">
                        <input type="button"
                            class="btn btn-info btn-lg"
                            value="View">
                    </a>
                </div>

                <div class="divtext">
                    <button type="submit"
                        class="btn btn-info btn-lg"
                        name="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>

            </div>

        </div>

    </div>

</form>
            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>

		</div>

		

    <div class="modal fade" id="myModal" role="dialog">

					<div class="modal-dialog" style="width:80%;">

						<!-- Modal content-->

						<form name="myForm" onsubmit="return validateForm()" <?php echo form_open_multipart('bank_receipts');?>>

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

								<button type="submit" name="submit_ledger" class="btn btn-primary">Submit</button>

								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>

						</div>

						</form>

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

</script>

<script>

  $('#bankaccount').on('change',function(){

 var bankaccount=$(this).val();

 if(bankaccount!=""){

					$.ajax({

						type:"POST",

						url:'<?php echo site_url('Admin/bankaccountnumberfetch');?>',

						data: { bankaccount : bankaccount},

							success:function(res){console.log(res);

               

							//alert(res);

              if (res) {

                      var obj = JSON.parse(res)

					  $('#bankbalance').val(obj.ba_opbalance);

					 

                    } 

							},

					});	



   

				}

			

  });


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


 $('#pron').on('change', function() {

    let pay_type = $(this).val();

	

    $('#ledger').val(null).trigger('change');

    $('#ledger').select2('destroy');

    initLedgerDropdown('#ledger');
});


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

  function validateForm1() {
	form.myButton.disabled = true;
	form.myButton.value = "Please wait...";
	return true;
}
	
  </script>

</body>



</html>



