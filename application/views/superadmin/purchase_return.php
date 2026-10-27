
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
/* Keep ordinary content links from inheriting the generic blue box style. */
.content p a:not(.dc-action-btn) {
    color: inherit;
    padding: initial;
    border: 0;
    background: transparent;
}
</style>

  <?php $data['leftmenu']='purchase'; echo $this->load->view('common/leftmenu',$data,true);?>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Content Wrapper. Contains page content -->


<!-- Modern blue-and-white theme matching the Sales Billing Window -->
<style>
.content-wrapper { background: #f4f7fb; }
.content-header h1 { color: #1f4e79; font-weight: 700; letter-spacing: .2px; }
.content-header h1 small { color: #5c7894; }
.content .breadcrumb { background: transparent; }
.content .box { border-top: 3px solid #3c8dbc; border-radius: 6px; box-shadow: 0 2px 12px rgba(30,70,110,.08); background: #fff; }
.content .box-header { padding: 15px 18px; border-bottom: 1px solid #e5edf5; }
.content .box-title, .content .modal-title { color: #1f4e79; font-weight: 700; }
.content .box-body { padding: 15px; }
/* DataTables Excel and CSV export buttons */
.content .dt-buttons { display: inline-flex; gap: 8px; align-items: center; margin: 0 0 10px; }
.content .dt-buttons .dt-button,
.content .dt-buttons button.dt-button,
.content .dt-buttons a.dt-button {
  background: #287db5 !important;
  background-image: none !important;
  color: #fff !important;
  border: 1px solid #287db5 !important;
  border-radius: 5px !important;
  box-shadow: none !important;
  padding: 8px 16px !important;
  margin: 0 !important;
  font-family: inherit;
  font-size: 13px;
  font-weight: 600;
  line-height: 1.4;
  transition: background-color .15s ease, border-color .15s ease;
}
.content .dt-buttons .dt-button:hover,
.content .dt-buttons button.dt-button:hover,
.content .dt-buttons a.dt-button:hover,
.content .dt-buttons .dt-button:focus {
  background: #1f6798 !important;
  background-image: none !important;
  color: #fff !important;
  border-color: #1f6798 !important;
  box-shadow: 0 2px 5px rgba(31,103,152,.2) !important;
}
.content .dataTables_wrapper .dataTables_filter input {
  border: 1px solid #cbd7e3;
  border-radius: 5px;
  padding: 6px 9px;
  margin-left: 7px;
  outline: none;
}
.content .dataTables_wrapper .dataTables_filter input:focus { border-color: #3c8dbc; box-shadow: 0 0 0 2px rgba(60,141,188,.12); }
.content .table-responsive { overflow-x: auto; }
.content table.table { width: 100%; background: #fff; border-collapse: collapse; margin-bottom: 12px; }
.content table.table > thead > tr > th { background: #eaf3fb; color: #214f78; font-weight: 700; white-space: nowrap; border: 1px solid #c9d9e8 !important; padding: 10px 8px; vertical-align: middle; }
.content table.table > tbody > tr > td, .content table.table > tbody > tr > th { border: 1px solid #d5e0ea !important; padding: 8px; vertical-align: middle; }
.content table.table > tbody > tr:nth-child(even) { background: #f7faff; }
.content table.table > tbody > tr:hover { background: #edf6ff; }
.content .form-control { border: 1px solid #cbd7e3; border-radius: 4px; box-shadow: none; min-height: 34px; }
.content .form-control:focus { border-color: #3c8dbc; box-shadow: 0 0 0 2px rgba(60,141,188,.12); }
.content label { color: #334e68; font-weight: 600; }
.content .btn-info, .content .btn-primary { background: #287db5; border-color: #287db5; }
.content .btn-info:hover, .content .btn-primary:hover { background: #1f6798; border-color: #1f6798; }
.content .modal-content { border: 0; border-radius: 7px; box-shadow: 0 8px 28px rgba(20,50,80,.18); }
.content .modal-header { background: #eaf3fb; border-bottom: 1px solid #d4e2ef; border-radius: 7px 7px 0 0; padding: 15px 20px; }
.content .modal-footer { border-top: 1px solid #e5edf5; }
.content .select2-container .select2-selection--single { height: 34px; border-color: #cbd7e3; }
.content .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 32px; }
.content .select2-container--default .select2-selection--single .select2-selection__arrow { height: 32px; }
.content #sales_cont .tooltip > .tooltip-inner { background-color: #f25252; color: #fff; border: 1px solid red; }
.content #sales_cont .tooltip.top > .tooltip-arrow { border-top-color: red; }
@media (max-width: 767px) { .content { padding: 10px; } .content .modal-dialog { width: auto !important; margin: 10px; } .content .col-sm-12 { margin-bottom: 8px; } .content table.table { min-width: 1000px; } }
</style>

<!-- Delivery Challan-style action links: no filled blue button background -->
<style id="debit-note-action-style">
.content .dc-action-actions {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}
.content a.dc-action-btn,
.content a.dc-action-btn:visited {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 5px 8px !important;
    margin: 2px 3px 2px 0 !important;
    color: #42627f !important;
    background: transparent !important;
    background-image: none !important;
    border: 1px solid transparent !important;
    border-radius: 4px !important;
    box-shadow: none !important;
    text-decoration: none !important;
    font-size: 13px;
    line-height: 1.4;
    font-weight: 500;
    transition: background-color .15s ease, border-color .15s ease, color .15s ease;
}
.content a.dc-action-btn i,
.content a.dc-action-btn .fa {
    margin: 0 2px;
}
.content a.dc-action-btn:hover,
.content a.dc-action-btn:focus {
    color: #1769aa !important;
    background: #edf5fc !important;
    border-color: #d7e6f4 !important;
    text-decoration: none !important;
    outline: none;
}
</style>

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header"> 

      <h1 align="center">DEBIT NOTE<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'purchase_return';?>">PURCHASE RETURN</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
	  <!-- Add modal start -->
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:100%;">
						<!-- Modal content-->
					
					<form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/purchase_returnadd');?>">
					<input type="hidden" name="token" readonly class="form-control cleardata" value="<?php echo $token;?>" />
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Purchase Return </h4>
							</div>
                             
							<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">DEBIT NOTE NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="debitnote_no" class="form-control cleardata" value="<?php if($billcount->mycount==0){echo "1";}else{ echo $purchase_billsno->purreturn_master_debitno+1;}?>" readonly/>
							</div>
								<div class="col-sm-1">
								<label class="exampleInputEmail1">DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="date" name="date" class="form-control cleardata" value="<?php echo date('Y-m-d');?>"/>
							</div>
						
							
							<div class="col-sm-1">
								<label class="exampleInputEmail1">SUPPLIER:</label>
							</div>
							<div class="col-sm-2">
								<select name="supplier" id="supplierselect" class="form-control cleardata">
									<option>--Select Supplier--</option>
								    <?php foreach($supplier as $sinle){ ?>
									<option value="<?php echo $sinle->sup_id;?>"><?php echo $sinle->sup_name;?></option>
									<?php } ?>
									
								</select>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">ADDRESS</label>
							</div>
							<div class="col-sm-2">
                                <textarea name="address" class="form-control cleardata" id="supadd"></textarea>
							</div>

							
							
						    </div>
						    <div class="col-sm-12"  style="margin-top: 20px;">

                            <div class="col-sm-1">
                                <label class="exampleInputEmail1">PHONE NUMBER:</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" name="phone_num" maxlength="10"  class="form-control cleardata" />
                            </div>
					         <div class="col-sm-1">
								<label class="exampleInputEmail1">REF NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="refno"  class="form-control cleardata refnum"  />
							</div>

							<div class="col-sm-4" style="display:none;" id="demo">
								
								<span id="estimate"><input  type="radio" name="esdemo" value="1" id="est_value" class="refnumbill"></span>
								<span id="demobill"><input type="radio" name="esdemo" value="2" class="refnumbill" id="demo_value"></span>
								<button type="button" class="btn btn-sm btn-success" id="reset"><i class="fa fa-refresh"></i></button>
							</div>
                            <div class="col-sm-1">
                                <label class="exampleInputEmail1">EWB NUMBER:</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="ewb_num"  class="form-control cleardata" />
                            </div>
                            <div class="col-sm-1">
                                <label class="exampleInputEmail1">VEHICLE NUMBER:</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="vehicle_num"  class="form-control cleardata" />
                            </div>
                            
							
							
						    </div>
                            <div class="col-sm-12" style="margin-top: 20px;">

                               <div class="col-sm-1">
                                    <label class="exampleInputEmail1">LIST BILLNUMBER:</label>
                                </div>
                                <div class="col-sm-2">
                                    <select name="bill_no" id="bill_no" class="form-control cleardata">
                                        <?php foreach($purchase_bills as $sinle){ ?>
                                        <option value="<?php echo $sinle->purchase_master_billno;?>"><?php echo $sinle->purchase_master_billno;?></option>
                                        <?php } ?>
                                        
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <label class="exampleInputEmail1">SUP-CRN NUMBER:</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="supcrn_num"  class="form-control cleardata" />
                                </div>
                                <div class="col-sm-1">
								   <label class="exampleInputEmail1">IS IGST</label>
								</div>
								<div class="col-sm-2">
								    <input type="checkbox" name="isigst" value="1" >
									
								</div>
                                <div class="col-sm-1">
                                    <label class="exampleInputEmail1">GST NUMBER:</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="gst_num" id="gst_number_new"  class="form-control cleardata" />
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
									<!-- <th scope="col">HSN CODE</th> -->
									<!-- <th scope="col">UOM</th> -->
									<!-- <th scope="col">RATE</th> -->
									<th scope="col">QTY</th>
									<th scope="col">UNIT PRICE</th>
									<!-- <th scope="col">DISCOUNT TYPE</th>
									<th scope="col">DISCOUNT</th>
									 -->
									
									<th scope="col">TAXABLE AMOUNT</th>
                                    <th scope="col">GST %</th>
								    <th scope="col">GST AMOUNT</th>
									<th scope="col">AMOUNT</th>
									<th scope="col"></th>
									</tr>
								</thead>
								<tbody id="sales_cont">
									<tr id="detailRow_1"  data-row="1">
										<th scope="row" class="slno">1</th>

									<td>
									<input type="hidden"  class="form-control cleardata" id="qtyinventory_1"
											data-order="1" style="float:left" value="0" >
									<input type="hidden" name="itemid[]" class="form-control itemid cleardata" id="itemtbid_1" data-order="1" style="width:70px;" >
									<input type="hidden" name="discount_type[]" class="discount_type cleardata" id="discount_type_1" data-order="1" value="percent">
									<input type="hidden" name="hsn_tax[]" class="hsn_tax cleardata" id="hsn_tax_1" data-order="1" value="">
									<input type="text" name="itemcode[]" class="form-control codeItem cleardata" id="code_1" data-order="1" style="width:70px;" >
									<div id="code_list_1" style="position: absolute;z-index: 99;"></div>
									</td>
									<td><input type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_1" data-order="1" style="width:140px;" required >
									<div id="name_list_1" style="position: absolute;z-index: 99;"></div>
									</td>
									<td>
										<select name="itembatchid[]" class="form-control itemBatch cleardata" id="itembatchid_1" placeholder="Batch" data-order="1" >
											<option value="">Select Batch</option>
										</select>
									</td>
									<!-- <td><input type="text" name="hsncode[]" class="form-control hsncode cleardata" id="hsncode_1" data-order="1" style="width:60px;" >
									<input type="hidden" name="itemitemtbid[]" class="form-control itemitemtbid cleardata" id="itemtbid_1" data-value="" data-order="1" >
									</td> -->
									<!-- <td><input type="text" name="uom[]" class="form-control uom" style="width:50px;"  id="uom_1" data-order="1" ></td> -->
									<!-- <td><input type="text" name="rate[]" class="form-control rate cleardata" id="rate_1" data-value="" data-order="1" ></td> -->
									<td><input step=".01"  type="text" min="0"  name="itemqnty[]" class="form-control qnty cleardata"   id="itemqty_1" data-order="1" ></td>
								    <td><input type="text" required name="unitprice[]" class="form-control unitprice cleardata"
											id="unitprice_1" data-order="1" data-toggle="tooltip" trigger="manual"></td>
											<input type="hidden" name="mrp[]" class="form-control mrp cleardata"
											id="mrp_1" data-order="1" data-toggle="tooltip" trigger="manual" value="0">
									<!-- <td>
										<div class="radio" style="margin-top: 0;">
										<label><input type="radio" class="cleardata" name="optradio_1" id="checkradiobutton" value="percent" checked  onclick="calcamount();" >%</label>
										<label><input type="radio" class="cleardata" name="optradio_1" id="checkradiobutton" value="cash" onclick="calcamount();">₹</label>
										</div>
										
										</td>
										<td>
										<input type="text" name="discount[]" class="form-control discount cleardata" id="discount_1" data-value="" data-order="1" ></td> -->
                                    <td><input type="text" name="itemtaxable[]" readonly class="form-control cleardata taxableAmount" id="taxable_1" data-value="" data-order="1" ></td>

									<td><input type="text"  name="itemgstper[]" readonly class="form-control cleardata"  id="gstper_1" data-order="1" >
									<input type="hidden" name="sellingrate[]" value="0" class="form-control sellingrate cleardata cleardata1" id="sellingrate_1" data-value="" data-order="1" required>
										  <input type="hidden" name="itemhsncode[]" class="form-control itemhsncode cleardata" id="hsncode_1" data-value="" data-order="1" ></td>
								    <td><input type="text" name="itemgstamount[]" readonly class="form-control gstAmount cleardata" id="gstAmount_1" data-value="" data-order="1" ></td>
                                    <td><input type="text" name="itemtotalamount[]" class="form-control totalAmount cleardata" id="totalAmount_1" data-value="" data-order="1" required></td>
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
								<textarea name="notes" class="form-control cleardata"></textarea>
							 </div>
							<!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">GOOD RECEIPT NOTE NO</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="goodreceipt" class="form-control"/>
							</div> -->
							  </div>
							  <div class="col-sm-12">
							  	<!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">PAYMENT MODE</label>
							</div>
						    	<div class="col-sm-10">
								
								 <input type="radio" class="custom-control-input cashcheck" id="defaultChecked" name="defaultExampleRadios" value="6">
  								 <label class="custom-control-label" for="defaultChecked">CASH</label>

  								  <input type="radio" class="custom-control-input cashcheck" id="defaultChecked" name="defaultExampleRadios" value="7" checked>
  								 <label class="custom-control-label" for="defaultChecked">CREDIT</label>

							</div> -->
							  </div>
							  <div class="col-sm-12">
							  	<!-- <div class="col-sm-2">
							  	<label class="exampleInputEmail1">AMOUNT</label></div>
							  	<div class="col-sm-4"><input type="text" name="amount" class="form-control"></div> -->
							  </div>
							 </div>
							 
							  <div class="col-sm-6">
							  <div class="col-sm-12">
							  <!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL QUANTITY</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalqnty" id="totalqnty" class="form-control cleardata"/>
							</div> -->
							   	<!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">TAXABLE VALUE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalTaxableAmount" id="totalTaxableAmount" class="form-control cleardata"/>
							</div> -->
							
							  </div>
							  <div class="col-sm-12">
							  
							
							  </div>
							<div class="col-sm-12">
							<!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">EXTRA DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="extradiscount" id="extradiscount"  class="form-control cleardata"/>
							</div> -->
							
							<!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">TAX</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totaltax" id="totaltax" class="form-control cleardata"/>
							</div> -->
							</div>
							<div class="col-sm-12">
								 <!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">OTHER CHARGES</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="othercharges" id="othercharge" class="form-control cleardata"/>
							</div> -->
							
							<!-- <div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totaldiscount" id="discount" class="form-control cleardata"/>
							</div> -->
							</div>
							<div class="col-sm-12">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-2">
								<label class="exampleInputEmail1">TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
							  <input type="text" name="totalTaxableAmount"  readonly  id="totalTaxableAmount" class="form-control cleardata"/>
							</div>
							<div class="col-sm-6"></div>
                            <div class="col-sm-2">
								<label class="exampleInputEmail1">GST AMOUNT</label>
							</div>
							<div class="col-sm-4">
							   <input type="text" name="amountGst"  readonly  id="amountGst" class="form-control cleardata "/>
							</div>
                            <div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
							   <input type="text" readonly name="roundOfValuue"  id="roundOfValuue" class="form-control cleardata"/>
							</div>
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
						
							<div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" readonly  name="grandTotal" id="grandTotal" class="form-control cleardata"/>
							</div>
							</div>
							  </div>
						    	
							
						    </div>
						    
						   
							<div class="col-sm-6" style="margin-top: 20px;">
								
							<div class="col-sm-3">
								<a href="<?php echo base_url('item')?>"><button type="button" class="btn btn-primary btn-sm">ITEM CREATION</button></a>
							</div>
							<input type="hidden" name="savetype" id="savetype" />
							<div class="col-sm-3">
								<button type="submit"   id="saveprint" name="submit" class="btn btn-success btn-sm">SAVE & PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" id="saveonly" name="submitsave" class="btn btn-info btn-sm">SAVE</button>
							</div>
							<!-- <div class="col-sm-1">
								<button type="button" class="btn btn-secondary btn-sm">VIEW</button>
							</div> -->
							<div class="col-sm-1">
								<button type="button" class="btn btn-warning btn-sm reset">CLAR</button>
							</div>
							<!-- <div class="col-sm-1">
								<button type="button" class="btn btn-danger btn-sm">DELETE</button>
							</div> -->
							</div>
							

							<div class="modal-footer">
								<!--<button type="submit"  class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
							</div>
						</div>
						</form>
					</div>
		</div>
		 <!-- Add modal end -->

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Billing Report</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	
			 
                  

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                 
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-hover">
				<thead>
					<tr>
					<th>#</th>
					<th>Bill No</th>
					<th>Bill Date</th>
					<th>Supplier Name</th>
					<th>Taxable Value</th>
					
					<th>Grand Total</th>
					<th>Ref No</th>
					
					
					
					<th>Action</th>
					</thead>
										</tr>
					<tbody>
					
					<?php
			$i=1;
			foreach($purchasereturn as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->purreturn_master_debitno;?></td>
				 
				  <td><?php echo $key->purreturn_master_date;?></td>
                  <td><?php echo $key->sup_name;?></td>
                  <td><?php echo $key->purreturn_master_taxable_value;?></td>	
				 
				  <td><?php echo $key->purreturn_master_grandtotal; ?></td>
				  <td><?php echo $key->purreturn_master_ref_no; ?></td>			  
                  <td>
				  <a href="<?php echo base_url('purchasereturn_edit/').$key->purreturn_master_id;?>" class="dc-action-btn" title="Edit"><i class="fa fa-pencil"></i> Edit</a>

                  <a href="<?php echo base_url('purchaseretuenprint/').$key->purreturn_master_id;?>" class="dc-action-btn" title="Print"><i class="fa fa-print"></i> Print</a> 
				 </td>
                </tr>
                <?php
				$i++;
				}
				?>
					</tbody>
					
              </table>
			
            </div>
        

		<!-- Edit Modal -->
		<div class="modal fade" id="editModal" role="dialog">

			<div class="modal-dialog modal-lg" style="width:100%;">

				<!-- Modal content-->

				<div class="modal-content">

					<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Purchase</h4>
					</div>

					<div class="">
						<div id="purchaseedit_content"></div>
					</div>

					<div class="modal-footer">

						<button type="button" class="btn btn-default"

							data-dismiss="modal">Close</button>

					</div>

				</div>

			</div>

		</div>
	 <!-- Edit Modal End -->

    </section>

<script>

  function deletechecked(){

	if(confirm("Do you really want to delete this purchase?")){
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

 
   <script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/dbjs/jquery.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
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
            totalTaxableAmount = totalTaxableAmount+parseFloat($(this).val()*qty);
        }
     });
	 
   

   var totaltaxamount=0;
					$('.taxableAmount').each(function( index ) {
         if($(this).val() !=''){
            totaltaxamount=parseFloat(totaltaxamount)+parseFloat($(this).val());
         }
     });
					$('#totalTaxableAmount').val(Math.round(totaltaxamount));

	 //Update total discount value
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

				//calculate discount %wise of subtotal (totalAmount) -Niby
				var subtotal1 			= parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
				subtotal =parseFloat($('#rate_'+order).val()*qnty);
				//console.log('subtotal>>');console.log(subtotal);console.log(typeof subtotal); console.log(typeof parseFloat(discount));
				discount_applied 	= parseFloat(discount_applied) + (parseFloat(subtotal) * parseFloat(discount)|| 0 ) /100;
				//console.log('discount_applied>>');console.log(discount_applied);
			}
			else if(radioValue == 'cash'){//console.log('cash>>');
				
				discount_applied = parseFloat(discount_applied) + (parseFloat(discount)|| 0);//console.log(discount_applied);
				//console.log('discount_applied>>');console.log(discount_applied);
			}
        }
     });
	 $('#discount').val(parseFloat(discount_applied).toFixed(2));


     $('.quantity').each(function( index ) {
         if($(this).val() !=''){
            quantity=quantity+parseFloat($(this).val());
         }
     });
     $('#totalqnty').val(quantity);
     $('.tax').each(function( index ) {
         if($(this).val() !=''){
            tax=tax+parseFloat($(this).val());
         }
     });
     $('#totaltax').val(tax.toFixed(2));
     $('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            grandTotal=grandTotal+parseFloat($(this).val());console.log($(this).val());
         }
     });

	 var totalgstamounttotal=0;
					$('.gstAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgstamounttotal=parseFloat(totalgstamounttotal)+parseFloat($(this).val());
         }
     });

	 $('#amountGst').val(Math.round(totalgstamounttotal));

	var totalgrand=0;
					$('.totalAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgrand=parseFloat(totalgrand)+parseFloat($(this).val());
         }
     });
					$('#grandTotal').val(Math.round(totalgrand));
     $('#roundOfValuue').val((grandTotal%1).toFixed(2));


  }//calcamount end
  
  


   $('#BtnNewRow').on('click',function(){
      var rowStart = 1;
      $('.slno').each(function () {
				$(this).html(rowStart);
				rowStart = rowStart + 1;
			});
			$newrow=$('#BtnNewRow').data('order')+1;
			$('#BtnNewRow').data('order', $newrow);
      var current_row = $newrow;
	  //var current_row = parseInt($("#sales_contedit tr").last().attr("data-row")) + 1;

      var new_row = '<tr id="detailRow_'+current_row+'" data-row="'+current_row+'"> <th scope="row" class="slno">'+rowStart+'</th>';
	  new_row+= '<td><input required type="hidden"   value="0" class="form-control  " id="qtyinventory_' + current_row + '"  data-order="' + current_row + '" style="float:left"><input type="hidden" name="itemid[]" class="form-control itemid cleardata" id="itemtbid_'+current_row+'" data-order="'+current_row+'" style="width:70px;" > <input required type="text" name="itemcode[]" class="form-control codeItem cleardata"  id="code_'+current_row+'" data-order="'+current_row+'" style="width:70px;"><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input required type="text" name="itemname[]" class="form-control nameItem cleardata" id="itemname_'+current_row+'" data-order="'+current_row+'" style="width:140px;"><div id="name_list_'+current_row+'"></div></td>';
	  new_row+= '<td><select name="itembatchid[]" class="form-control itemBatch cleardata" id="itembatchid_'+current_row+'" data-order="'+current_row+'" placeholder="Batch"><option value="">Select Batch</option></select></td>';
     
	  new_row+= '<td><input step=".01"  type="text" min="0"  name="itemqnty[]" class="form-control qnty cleardata" id="itemqty_'+current_row+'" data-order="'+current_row+'" ></td>';
      new_row += '<td><input required type="text" name="unitprice[]" class="form-control unitprice cleardata " data-toggle="tooltip" trigger="manual" id="unitprice_' + current_row + '" data-order="' + current_row + '" ><input required type="hidden"  value="0" name="mrp[]" class="form-control mrp cleardata " data-toggle="tooltip" trigger="manual" id="mrp_' + rowStart + '" data-order="' + rowStart + '" ></td>';
     
	
      new_row+= '<td><input type="text" name="itemtaxable[]" readonly class="form-control cleardata taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" name="itemgstper[]" readonly class="form-control cleardata" id="gstper_'+current_row+'"  data-order="'+current_row+'"><input required type="hidden" value="0" name="sellingrate[]" class="form-control sellingrate cleardata cleardata1" id="sellingrate_'+rowStart+'" data-value="" data-order="'+rowStart+'"><input type="hidden" name="itemhsncode[]" class="form-control cleardata itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" name="itemgstamount[]" readonly class="form-control cleardata gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input required type="text" name="itemtotalamount[]" class="form-control cleardata totalAmount cleardata" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td>';
    
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';

      $('#sales_cont').append(new_row);
     
      $('#BtnNewRow').data('order',current_row);
      
  });
  
  $('#sales_cont').on('click','.detailDeleteRow',function(){
      var rowNumber = $(this).data('row');
      $('#detailRow_'+rowNumber).remove();
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart++;
      });
   
	
       calcamount();
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
  });
  
  $('#sales_cont').on('click','.subSelect_itemedit',function(){
     var id = $(this).data('id');
     var itemValue = $(this).data('value');
	 $('#code_list_'+id).hide();
	 $('#name_list_'+id).hide();
	 $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getBatchByItem1');?>',
			data: { itemValue : itemValue},
				success:function(res){
					var batchlist = JSON.parse(res);
					console.log(batchlist);
					var i;
					var optiondata= '<option value="">Select</option>';
					for(i=0;i<batchlist.length;i++){
						
						optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].inventory_stock_itemcount+')</option>';

					}
					
					$('#itembatchid_'+id).html(optiondata);
					$('#code_'+id).val(batchlist[0].itm_code);
			        $('#itemname_'+id).val(batchlist[0].itm_name);
					$('#itemtbid_'+id).val(batchlist[0].itm_id);
				}
     })
  });

  
  $('#sales_cont').on('change','.itemBatch',function(){  
	 
	var id = $(this).data('order');
	//alert(id);
	 var itemValue = $(this).val();
     var totalTaxableAmount = 0;
     var totalgstAmount = 0;
     var grandTotal = 0;
     var deliverycharge = 0;
     var discount = 0;

	 
	 $.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/getbatchcount2');?>',
				data: { itemValue: itemValue },
				success: function (res) {
					console.log(res);
					//alert(obj.inventory_stock_itemcount);
					var obj=JSON.parse(res);
					$('#qtyinventory_'+id).val(obj.inventory_stock_itemcount);
				},
			});

     $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemBatchDetails');?>',
			data: { itemValue : itemValue},
				success:function(res){console.log(res);
				$('#code_list_'+id).hide();
				$('#name_list_'+id).hide();
				$('#batch_list_'+id).hide();
				var obj = JSON.parse(res);
				$('#hsncode_'+id).val(obj.hsn_code);

				if(parseInt(obj.cur_stock_item_count)<parseInt(1)){
						$('#itemqty_'+id).css({"border":"1px solid red"});
					}else{
						$('#itemqty_'+id).css({"border":"1px solid #d2d6de"});
					}
				// if(obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28){
				//     var taxableAmount = (parseInt(obj.t_sr)/(100+(parseInt(obj.hsn_tax)))*100).toFixed(2);
				// }
				

				if ((obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28) ) {//&& ! $('#isigst').is(":checked")
					if(obj.t_pc==0.00){
							var taxableAmount = (parseFloat(obj.e_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
							
						}else{
							var taxableAmount = (parseFloat(obj.t_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
						}
						
				}
				else {
					if(obj.t_pc==0.00 ){
							var taxableAmount = (parseFloat(obj.e_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
						}else{
							var taxableAmount = (parseFloat(obj.t_pc) / (100 + (parseFloat(obj.hsn_tax))) * 100).toFixed(2);
						
						}
				}
				//alert(taxableAmount);
				var gstAmount = ((taxableAmount*parseFloat(obj.hsn_tax))/100).toFixed(2);

              
				if(obj.t_pc==0.00){
						$('#pcost_' + id).val(obj.e_pc);
					$('#percost_' + id).val(obj.e_pc);
					$('#mop_'+id).val(obj.e_mop);
					$('#unitprice_'+id).val(obj.e_pc);
					$('#totalAmount_' + id).val(obj.e_pc);
					$('#totalAmount_' + id).attr('data-value', obj.e_pc);
					$('#sellingrate_'+id).val(obj.e_pc);
					$('#mrp_'+id).val(obj.e_mrp);
					}
					
					else{
						$('#pcost_' + id).val(obj.t_pc);
					$('#percost_' + id).val(obj.t_pc);
					$('#mop_'+id).val(obj.t_mop);
					$('#unitprice_'+id).val(obj.t_pc);
					$('#totalAmount_' + id).val(obj.t_pc);
					$('#totalAmount_' + id).attr('data-value', obj.t_pc);
					$('#sellingrate_'+id).val(obj.t_pc);
					$('#mrp_'+id).val(obj.t_mrp);
					}


				$('#code_'+id).val(obj.itm_code);
				$('#itemid_'+id).val(obj.item_id);
			    $('#itemname_'+id).val(obj.itm_name);
			    $('#batch_'+id).val(obj.batchcode);
				
			    $('#taxable_'+id).val(taxableAmount);
			    $('#taxable_'+id).attr('data-value',taxableAmount);
			    $('#gstAmount_'+id).val(gstAmount);
				$('#gstper_' + id).val(obj.hsn_tax);
				
			    $('#gstAmount_'+id).attr('data-value',gstAmount);
			    $('#itemqty_'+id).val(1);
				calcamount();
				//  calc_outstanding();
               
				},
		});
 
  });

  $('.refnumbill').on('click',function(){
	  
	$(".cleardata").val("");
	if ($("#demo_value").prop("checked")) {
		var demo=$('#demo_value').val();
		}else if(("#est_value").prop("checked")){
		var demo=$('#est_value').val();
		}
		var id = $(this).data('order');
    	 var itemValue = $(this).val();

  });
  $('#sales_cont').on('keyup','.unitprice',function(){

			var order = $(this).data('order');
			var qnty = $('#itemqty_'+order).val();
			var mop=$('#mop_'+order).val();
			var inqty=$('#qtyinventory_'+order).val();
			//alert(inqty);

			//	alert(mop);
			var totalTaxableAmount = 0;
			var totalcessAmount = 0;
			var totalgstAmount = 0;
			var deliverycharge = 0;
			var discount = 0;
		
			
				

				var item_hsn_tax = $('#gstper_'+order).val();
				var unitprice = $(this).val();
				var taxableAmount = 0;
				if ((item_hsn_tax == 12 || item_hsn_tax == 18 || item_hsn_tax == 28) && ! $('#isigst').is(":checked")) {
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
				}
				else {
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseInt(item_hsn_tax))) * 100).toFixed(2);
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
				calcamount();
				
				// calc_outstanding();
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
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
				}
				else {
					var taxableAmount = (parseFloat(unitprice) / (100 + (parseFloat(item_hsn_tax))) * 100).toFixed(2);
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

				calcamount();
				
				// calc_outstanding();
			
			

		});

  
  $('#sales_cont').on('keyup','.discount',function(){ 
	
    var order = $(this).data('order');
	//alert(order);
    var qnty = $('#quantity_'+order).val();
   var radioValue = $("input[name='optradio_"+order+"']:checked").val();

   
    var tax = $('#tax_'+order).data('value');
    var taxper = $('#tax_'+order).data('tax');
    var taxdiscount = 0;
    var totaldiscount = 0;
	var subtotal = 0;
    var discount = $('#discount_'+order).val();//console.log(tax+'-->');console.log(radioValue);
	
	if(discount!=''){
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
		else if(radioValue == 'cash'){
		
			subtotal = parseFloat($('#rate_'+order).val()*qnty)+parseFloat($('#tax_'+order).val()); 
			var qtyprice=parseFloat($('#rate_'+order).val()*qnty);
			subtotal_discount_applied = parseFloat(qtyprice) - parseFloat(discount);
			var taxvalue = (( subtotal_discount_applied * $('#hsn_tax_'+order).val() )/100).toFixed(2);
			var discounttaxvalue=parseFloat(subtotal_discount_applied)+parseFloat(taxvalue);
			alert(discounttaxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
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
			var discounttaxvalue=parseInt(subtotal_discount_applied)+parseInt(taxvalue);
			$('#totalAmount_'+order).val(Math.round(discounttaxvalue.toFixed(2)));
		}


		calcamount();
	}

	var toltaxable=$('#totalTaxableAmount').val();
	var toldisc=$('#discount').val();
	var toltax=parseFloat(toltaxable)+parseFloat($('#totaltax').val());
	var tolgrand=parseFloat(toltax)-parseFloat(toldisc);

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


$('#supplierselect').on('change',function(){
	var id=$(this).val();
	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/get_supplierdetails');?>',
			data: { id : id},
			success: function(res) {
				console.log(res);
				var obj = JSON.parse(res);
				//alert(res);
				$('#supadd').val(obj.sup_address);
				$('#gst_number_new').val(obj.sup_gst);
			}
	})
})

//==========Edited By Niby========//

$('.editpurchase').on('click', function() {

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

$('.viewpurchase').on('click', function() {

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


$(".reset").bind("click", function() {
		$(".cleardata").val("");
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
					$('.refnum').css({"border":"1px solid #ff0099"});
					
         
        }else{
			$('.refnum').css({"border":"1px solid #d2d6de"});
		}
			},
});
});



//==========Edited By Niby  End========//
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
</script>

<script type="text/javascript" language="javascript" >

$('#reset').click(function() {

$('input[name="esdemo"]').prop('checked', false);

});

</script>

<script>


function validateForm() {

	if (confirm("Do you really want to submit this purchase Return ?")) {

		var rowCount = $("#sales_cont > tr").length;
var isStockNotAvailable = false;


 $("#sales_cont tr").map(function(){
	if(!isStockNotAvailable){
				  if($(this).attr('data-row')!=undefined){
					var i = $(this).attr('data-row'); 

 var stock=document.getElementById('qtyinventory_'+i+'').value;
 var qty=document.getElementById('itemqty_'+i+'').value;

 //alert(stock);alert(qty);
 if(parseInt(qty)>parseInt(stock)){
	//alert("Stock is not available");
	$("#saveonly").html("SAVE");
	
	$("#saveonly").removeAttr("disabled")
	$("#saveprint").html("SAVE & PRINT");
	$("#saveprint").removeAttr("disabled");
	isStockNotAvailable = true;
	event.preventDefault();
	return false;
	
 }else{
	//alert("stock");
	// alert("available");
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

