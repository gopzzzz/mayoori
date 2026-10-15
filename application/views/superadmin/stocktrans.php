<style>
	input[type=radio] {
    width: 17px;
    height: 17px;
}
</style>
  
  <?php $data['leftmenu']='stocktrans'; echo $this->load->view('common/leftmenu',$data,true);?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Stock Transfer<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Stock Transfer</a></li>

      </ol>

    </section><br>

  

    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>  
		<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog" style="width:100%;">
						<!-- Modal content-->
						<?php echo form_open_multipart('Admin/stocktransferadd');?>
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Stock Transfer</h4>
							</div>
                             
							<div class="col-sm-12" style="margin-top:10px;">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">DELIVERY CHELAN NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="deliverychellan" class="form-control" value="<?php foreach($bilstock as $keybill){ if($keybill->mycount==0){echo "1";}else{foreach($last_bill_number as $keybill1){ echo $keybill1->stocktransfer_master_delivery_chellanno+1; }} }?>"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="billdate" class="form-control" value="<?php echo date('d-m-y');?>"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">EWAY BILL NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="ewaybillno" class="form-control"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="vehicleno" class="form-control"/>
							</div>
							
							
						    </div>
						    <div class="col-sm-12">
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BRANCH NAME:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="customername" class="form-control" required/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea name="address" class="form-control"></textarea>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">PHONE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="phonenumber" class="form-control"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">GST NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="gstno" class="form-control"/>
							</div>
						    	
							
							
							
						    </div>
						    
							 
						    <div class="col-sm-12" style="margin-top: 20px;">
						    	
							<table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">CODE</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">BATCH</th>
      <th scope="col">QUTY</th>
      <th scope="col">TAXABLE VALUE</th>
      <th scope="col">GST %</th>
      <th scope="col">GST AMOUNT</th>
      <th scope="col">TOTAL</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col"><button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button></th>
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
    </tr>
  </thead>
  <tbody id="sales_cont">
    <tr id="detailRow_1">
      <th scope="row" class="slno">1</th>
      <td><input type="text" name="itemcode[]" class="form-control codeItem" id="code_1" data-order="1" style="width:70px;">
      <div id="code_list_1"></div>
      </td>
      <td><input type="text" name="itemname[]" class="form-control nameItem" id="itemname_1" data-order="1" style="width:140px;" required>
      <div id="name_list_1"></div>
      </td>
      <td><input type="text" name="itembatch[]" class="form-control batchItem" id="batch_1" data-order="1" style="width:150px;">
      <div id="batch_list_1"></div>
      </td>
      </td>
      <td><input type="text" name="itemqnty[]" class="form-control qnty" style="width:50px;"  id="itemqty_1" data-order="1"></td>
      <td><input type="text" name="itemtaxable[]" class="form-control taxableAmount" id="taxable_1" data-value="" data-order="1" style="width:60px;"></td>
      <td><input type="text"  name="itemgstper[]" class="form-control " style="width:50px;" id="gstper_1" data-order="1">
      <input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_1" data-value="" data-order="1" ></td>
      <td><input type="text" name="itemgstamount[]" class="form-control gstAmount" id="gstAmount_1" data-value="" data-order="1"></td>
      <td><input type="text" name="itemtotalamount[]" class="form-control totalAmount" id="totalAmount_1" data-value="" data-order="1"></td>
      <td><select name="employee[]" class="form-control" style="width:140px;">
      	<?php echo $namelist;?>
      </select></td>
      <td>
      <i class="fa fa-eraser detailEraseRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>
          <i class="fa fa-trash detailDeleteRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
      </td>
    </tr>
   
  </tbody>
</table>
						    </div>
						     <div class="col-sm-12" >
						     	<div class="col-sm-6">
						     		<div class="col-sm-12">
						     			<div class="col-sm-2">
										<label class="exampleInputEmail1">NOTE</label>
									</div>
									<div class="col-sm-10">
										<textarea class="form-control" name="note1"></textarea>
									</div>
						     		</div>
						     		<div class="col-sm-12" style="margin-top: 20px;">
						    	
							<div class="col-sm-2">
								<label class="exampleInputEmail1">OUT STANDING</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="outstanding" id="outstanding" class="form-control"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">IS IGST</label>
							</div>
							<div class="col-sm-4">
							<input type="checkbox" name="igst" value="1"> 
								
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">PAYMENT MODE</label>
							</div>
							<div class="col-sm-10">
							
  								  <input type="radio" class="custom-control-input bankcheck" id="defaultChecked" name="paymode1" value="5" >
  								 <label class="custom-control-label" for="defaultChecked">BANK</label>
  								  <input type="radio" class="custom-control-input cashcheck" id="defaultChecked" name="paymode1" value="6">
  								 <label class="custom-control-label" for="defaultChecked">CASH</label>
								 <input type="radio" class="custom-control-input creditcheck" id="defaultChecked" name="paymode1" value="7">
  								 <label class="custom-control-label" for="defaultChecked">CREDIT</label>

							</div>
						</div>
						  <div class="col-sm-12">
						   	<div class="col-sm-2">
								<label class="exampleInputEmail1 cardnumber" style="display: none;">CARD NUMBER</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="cardnumber" class="form-control cardnumber_id" style="display: none;" />
							</div>
						    	<div class="col-sm-2">
								<label class="exampleInputEmail1" >AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="paidamount" id="paidamount" class="form-control"/>
							</div>
						
						</div>
						
						
					</div>

                        <div class="col-sm-6">
                        	<div class="col-sm-12">
				            <div class="col-sm-2">
								<label class="exampleInputEmail1">DELIVERY CHARGE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="deliverychare" id="deliverychare" class="form-control"/>
							</div>
								<div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="totalTaxableAmount" readonly  id="totalTaxableAmount" class="form-control"/>
							</div>
								
						</div>
							
							

						   
						    <div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="discount" id="discount" class="form-control"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">GST AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="amountGst" readonly id="amountGst" class="form-control"/>
							</div>
							
						</div>
						<div class="col-sm-12">
							 <div class="col-sm-6"></div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="roundOfValuue" id="roundOfValuue" class="form-control"/>
							</div>
							
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
							   <div class="col-sm-6"></div>
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" name="grandTotal" id="grandTotal" class="form-control"/>
							</div>
							</div>
							<!---->
						</div>
						</div>

							
						   	<div class="col-sm-12">
							<div class="col-sm-6">
								<!--<div class="col-sm-2">
								<button type="button" class="btn btn-info btn-sm">HOLD BILL</button>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-warning btn-sm">RETURN</button>
							</div>-->
							</div>
							<div class="col-sm-6">
									<div class="col-sm-2">
								<button type="submit" class="btn btn-primary btn-sm">SAVE & PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" class="btn btn-success btn-sm" >SAVE</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-sm">VIEW</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-warning btn-sm">CLAR</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-danger btn-sm">DELETE</button>
							</div>
							</div>
								<!---->
							
						
							</div>

							<div class="modal-footer">
								
							</div>
						</div>
						</form>
					</div>
		</div>
		
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Billing Report</h3>
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
				  <th>Chellan No</th>
				  <th>Customer Name</th>
				  <th>Phone Number</th>
				  <th>Tax</th>
				  <th>Grand Total</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($stocktransfer as $key){
					?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->stocktransfer_master_delivery_chellanno;?></td>
				  <td><?php echo $key->stocktransfer_master_customername;?></td>
				  <td><?php echo $key->stocktransfer_master_phoneno;?></td>
                  <td><?php echo $key->stocktransfer_master_total_taxable_amount;?></td>
                  <td><?php echo $key->stocktransfer_master_grandtotal;?></td>				  
                  <td><i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>
				  <i class="fa fa-eye" aria-hidden="true" data-toggle="modal" data-target="#viewModal<?php echo $key->stocktransfer_master_id;?>"></i>
				 </td>
                </tr>
                <?php
				$i++;
				}
				?>
              </table>
            </div>
        <?php
			foreach($stocktransfer as $key){
		?>
            <!----------------view section ------------------------------>
		<div class="modal fade" id="viewModal<?php echo $key->stocktransfer_master_id;?>" role="dialog">
					<div class="modal-dialog" style="width:100%;">
						<!-- Modal content-->
							<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Stock Transfer</h4>
							</div>
                             
							<div class="col-sm-12">
							
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_billdate;?>" required/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">CUSTOMER NAME:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_customername;?>" required/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">DELIVERY CHELAN NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" value="<?php echo $key->stocktransfer_master_delivery_chellanno;?>" class="form-control"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">GST NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" value="<?php echo $key->stocktransfer_master_gstno;?>" class="form-control"/>
							</div>
						    </div>
						    <div class="col-sm-12">
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">PHONE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" value="<?php echo $key->stocktransfer_master_phoneno;?>" class="form-control"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" value="<?php echo $key->stocktransfer_master_vehicleno;?>" class="form-control"/>
							</div>
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control"><?php echo $key->stocktransfer_master_address;?></textarea>
							</div>
						    
							
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1"> NOTE</label>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control"><?php echo $key->stocktransfer_master_note2;?></textarea>
							</div>
							
							
						    </div>
						    
							 <div class="col-sm-12">
						    	
							<div class="col-sm-1">
								<label class="exampleInputEmail1">EWAY BILL NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" value="<?php echo $key->stocktransfer_master_ewaybillno;?>" class="form-control"/>
							</div>
						
						    </div>
						    <div class="col-sm-12" style="margin-top: 20px;">
						    	
							<table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">CODE</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">BATCH</th>
      <th scope="col">QUTY</th>
      <th scope="col">TAXABLE VALUE</th>
      <th scope="col">GST %</th>
      <th scope="col">GST AMOUNT</th>
      <th scope="col">TOTAL</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col"></th>
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
    </tr>
  </thead>
  <tbody>
      <?php foreach($stocktrans[$key->stocktransfer_master_id] as $singetrans){ ?>
    <tr>
      <th scope="row" class="slno">1</th>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->stocktransfer_trans_itemcode;?>" style="width:70px;">
      </td>
      <td><input type="text" class="form-control" value="<?php echo $item[$singetrans->stocktransfer_trans_itemcode];?>" style="width:140px;">
      </td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->stocktransfer_trans_batch;?>" style="width:60px;">
      </td>
      </td>
      <td><input type="text" class="form-control" style="width:50px;"></td>
      <td><input type="text" class="form-control" ></td>
      <td><input type="text"  class="form-control" value="<?php echo $singetrans->stocktransfer_trans_taxable_value;?>" style="width:50px;">
      <input type="hidden" class="form-control" required></td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->stocktransfer_trans_gstamount;?>"></td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->stocktransfer_trans_total;?>"></td>
      <td><select name="employee[]" class="form-control" style="width:140px;">
      	<option value="">Selcet</option>
      	<option value="">George Joy Mathew</option>
      </select></td>
    </tr>
   <?php } ?>
  </tbody>
</table>
						    </div>
						     <div class="col-sm-12" >
						     	<div class="col-sm-6">
						     		<div class="col-sm-12">
						     			<div class="col-sm-2">
										<label class="exampleInputEmail1">NOTE</label>
									</div>
									<div class="col-sm-10">
										<textarea class="form-control"><?php echo $key->stocktransfer_master_note2;?></textarea>
									</div>
						     		</div>
						     		<div class="col-sm-12" style="margin-top: 20px;">
						    	
							<div class="col-sm-2">
								<label class="exampleInputEmail1">OUT STANDING</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_outstanding;?>" />
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">IS IGST</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_isigst;?>"/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">PAYMENT MODE</label>
							</div>
							<div class="col-sm-10">
								<input type="radio"  class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">CHEQUE</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">EMI</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">BOTH</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios">
  								 <label class="custom-control-label" for="defaultChecked">CASH</label>

							</div>
						</div>
						  <div class="col-sm-12">
						   
						    	<div class="col-sm-2">
								<label class="exampleInputEmail1" >AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_outstanding;?>"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">CARD NUMBER</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" />
							</div>
						</div>
						
						
					</div>

                        <div class="col-sm-6">
                        	<div class="col-sm-12">
				
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_total_taxable_amount;?>" />
							</div>
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GST AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_gstamount;?>" />
							</div>
						</div>
							
							

						   
						    <div class="col-sm-12">
								<div class="col-sm-2">
								<label class="exampleInputEmail1">DELIVERY CHARGE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_deliverycharge;?>" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_discount;?>" />
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_roundoff;?>" />
							</div>
							
							</div>
							<div class="col-sm-12">
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->stocktransfer_master_grandtotal;?>" />
							</div>
							</div>
							<!---->
						</div>
						</div>

							
						   	<div class="col-sm-12">
							<div class="col-sm-6">
								<!--<div class="col-sm-2">
								<button type="button" class="btn btn-info btn-sm">HOLD BILL</button>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-warning btn-sm">RETURN</button>
							</div>-->
							</div>
							<div class="col-sm-6">
							</div>
								<!---->
							
						
							</div>

							<div class="modal-footer">
								<!--<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
							</div>
						</div>
						</form>
					</div>
		</div>
        </div>
        <?php
			}
		?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
		<!------------------------view section------------------------------------------>
		<div class="modal fade" id="stockviewModal" role="dialog">
					<div class="modal-dialog" style="width:100%;">
						<!-- Modal content-->
							<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Stock Transfer</h4>
							</div>
                             
							<div class="col-sm-12">
							
							<div class="col-sm-1">
								<label class="exampleInputEmail1">BILL DATE:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" required/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">CUSTOMER NAME:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" required/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">DELIVERY CHELAN NO:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">GST NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control"/>
							</div>
						    </div>
						    <div class="col-sm-12">
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">PHONE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1">VEHICLE NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control"/>
							</div>
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control"></textarea>
							</div>
						    
							
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1"> NOTE</label>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control"></textarea>
							</div>
							
							
						    </div>
						    
							 <div class="col-sm-12">
						    	
							<div class="col-sm-1">
								<label class="exampleInputEmail1">EWAY BILL NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control"/>
							</div>
						
						    </div>
						    <div class="col-sm-12" style="margin-top: 20px;">
						    	
							<table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">CODE</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">BATCH</th>
      <th scope="col">QUTY</th>
      <th scope="col">TAXABLE VALUE</th>
      <th scope="col">GST %</th>
      <th scope="col">GST AMOUNT</th>
      <th scope="col">TOTAL</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col"><button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button></th>
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
    </tr>
  </thead>
  <tbody">
    <tr">
      <th scope="row" class="slno">1</th>
      <td><input type="text" class="form-control" style="width:70px;">
      </td>
      <td><input type="text" class="form-control" style="width:140px;">
      <div"></div>
      </td>
      <td><input type="text" class="form-control" style="width:60px;">
      <div"></div>
      </td>
      </td>
      <td><input type="text" class="form-control" style="width:50px;"></td>
      <td><input type="text" class="form-control"></td>
      <td><input type="text"  class="form-control" style="width:50px;">
      <input type="hidden" class="form-control" required></td>
      <td><input type="text" class="form-control"></td>
      <td><input type="text" class="form-control"></td>
      <td><select name="employee[]" class="form-control" style="width:140px;">
      	<option value="">Selcet</option>
      	<option value="">George Joy Mathew</option>
      </select></td>
      <td>
      <i class="fa fa-eraser detailEraseRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>
          <i class="fa fa-trash detailDeleteRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
      </td>
    </tr>
   
  </tbody>
</table>
						    </div>
						     <div class="col-sm-12" >
						     	<div class="col-sm-6">
						     		<div class="col-sm-12">
						     			<div class="col-sm-2">
										<label class="exampleInputEmail1">NOTE</label>
									</div>
									<div class="col-sm-10">
										<textarea class="form-control"></textarea>
									</div>
						     		</div>
						     		<div class="col-sm-12" style="margin-top: 20px;">
						    	
							<div class="col-sm-2">
								<label class="exampleInputEmail1">OUT STANDING</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">IS IGST</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">PAYMENT MODE</label>
							</div>
							<div class="col-sm-10">
								<input type="radio"  class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">BANK TRANSFER</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">CHEQUE</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">EMI</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" >
  								 <label class="custom-control-label" for="defaultChecked">BOTH</label>
  								  <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios">
  								 <label class="custom-control-label" for="defaultChecked">CASH</label>

							</div>
						</div>
						  <div class="col-sm-12">
						   
						    	<div class="col-sm-2">
								<label class="exampleInputEmail1" >AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">CARD NUMBER</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
						</div>
						
						
					</div>

                        <div class="col-sm-6">
                        	<div class="col-sm-12">
				
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GST AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
						</div>
							
							

						   
						    <div class="col-sm-12">
								<div class="col-sm-2">
								<label class="exampleInputEmail1">DELIVERY CHARGE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
							
							</div>
							<div class="col-sm-12">
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control"/>
							</div>
							</div>
							<!---->
						</div>
						</div>

							
						   	<div class="col-sm-12">
							<div class="col-sm-6">
								<!--<div class="col-sm-2">
								<button type="button" class="btn btn-info btn-sm">HOLD BILL</button>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-warning btn-sm">RETURN</button>
							</div>-->
							</div>
							<div class="col-sm-6">
									<div class="col-sm-2">
								<button type="button" class="btn btn-primary btn-sm">SAVE & PRINT</button>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-success btn-sm" >SAVE</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-sm">VIEW</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-warning btn-sm">CLAR</button>
							</div>
							<div class="col-sm-1" style="margin-left:10px;">
								<button type="button" class="btn btn-danger btn-sm">DELETE</button>
							</div>
							</div>
								<!---->
							
						
							</div>

							<div class="modal-footer">
								<!--<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
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

 function recalculate(){
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var grandTotal = 0;
    var deliverycharge = 0;
    var discount = 0;
    
    $('.taxableAmount').each(function( index ) {
        if($(this).val() !=''){
            totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
        }
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         if($(this).val() !=''){
            totalgstAmount=totalgstAmount+parseFloat($(this).val());
         }
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalgstAmount;
     $('#roundOfValuue').val((grandTotal%1).toFixed(2));
     if($('#deliverychare').val()!=''){
         deliverycharge = $('#deliverychare').val();
     }
     else{
         deliverycharge = 0;
     }
     if($('#discount').val()!=''){
         discount = $('#discount').val();
     }
     else{
         discount = 0;
     }
     $('#grandTotal').val(Math.round(grandTotal+parseInt(deliverycharge)-parseInt(discount)));
     var paidamount = $('#paidamount').val();
     if(paidamount == ''){
        paidamount = 0;
     }
     $('#outstanding').val(parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
  }
  
  
  //Dynamic Row Adding Code
  
  $('#BtnNewRow').on('click',function(){
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart=rowStart+1;
      });
      $('#BtnNewRow').data('order',rowStart-1);
      var current_row = rowStart-1;
      var new_row = '<tr id="detailRow_'+current_row+'"> <th scope="row" class="slno">'+current_row+'</th>';
      new_row+= '<td><input type="text" name="itemcode[]" class="form-control codeItem" id="code_'+current_row+'" data-order="'+current_row+'" style="width:70px;"><div id="code_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemname[]" class="form-control nameItem" id="itemname_'+current_row+'" data-order="'+current_row+'" style="width:140px;"><div id="name_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itembatch[]" class="form-control batchItem" id="batch_'+current_row+'" data-order="'+current_row+'" style="width:150px;"><div id="batch_list_'+current_row+'"></div></td>';
      new_row+= '<td><input type="text" name="itemqnty[]" class="form-control qnty" id="itemqty_'+current_row+'" data-order="'+current_row+'" style="width:50px;"></td>';
      new_row+= '<td><input type="text" name="itemtaxable[]" class="form-control taxableAmount" id="taxable_'+current_row+'" data-value="" data-order="'+current_row+'" style="width:60px;"></td>';
      new_row+= '<td><input type="text" name="itemgstper[]" class="form-control" id="gstper_'+current_row+'" style="width:50px;" data-order="'+current_row+'"><input type="hidden" name="itemhsncode[]" class="form-control itemhsncode" id="hsncode_'+current_row+'" data-value="" data-order="'+current_row+'" ></td>';
      new_row+= '<td><input type="text" name="itemgstamount[]" class="form-control gstAmount" id="gstAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><input type="text" name="itemtotalamount[]" class="form-control totalAmount" id="totalAmount_'+current_row+'" data-value="" data-order="'+current_row+'"></td>';
      new_row+= '<td><select name="employee[]" class="form-control" style="width:140px;"><?php echo $namelist;?></select></td>';
      new_row+= '<td>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-eraser detailEraseRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>';
      new_row+= '<i data-row="'+current_row+'" class="fa fa-trash detailDeleteRow" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>';
      new_row+= '</td></tr>';
      
      $('#sales_cont').append(new_row);
      console.log(current_row);
      $('#BtnNewRow').data('order',parseInt(current_row));
      
  })
  
  $('#sales_cont').on('click','.detailDeleteRow',function(){
      var rowNumber = $(this).data('row');
      $('#detailRow_'+rowNumber).remove();
      var rowStart = 1;
      $('.slno').each(function(){
          $(this).html(rowStart);
          rowStart++;
      });
      $('#BtnNewRow').data('order',rowStart-1);
      $('.gstAmount').keyup();
       $('.totalAmount').keyup();
       recalculate();
  })
  
  $('#sales_cont').on('click','.detailEraseRow',function(){
      var rowNumber = $(this).data('row');
       $('#detailRow_'+rowNumber+' select').prop('selectedIndex',0);
       $('#detailRow_'+rowNumber+' input').val('');
       recalculate();
  })
  
   //Dynamic Row Adding Code
  
  $('#sales_cont').on('keyup','.gstAmount',function(){
      var gstAmount = 0;
      $('.gstAmount').each(function(){
          if($(this).val() != ''){
            gstAmount = parseInt(gstAmount) + parseInt($(this).val());
          }
      });
      
      $('#amountGst').val(gstAmount);
  })
  
  
  $('#sales_cont').on('keyup','.totalAmount',function(){
      var totalAmount = 0;
      $('.totalAmount').each(function(){
          if($(this).val() != ''){
            totalAmount = parseInt(totalAmount) + parseInt($(this).val());
          }
      });
      $('#totalAmount').val(totalAmount);
  })
  
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
  })
  
   $('#sales_cont').on('keyup','.nameItem',function(){
      var rowOrder = $(this).data('order');
      var itemName = $(this).val();
      if(itemName != '' && itemName != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemNameList');?>',
			data: { itemName : itemName, rowOrder:rowOrder},
				success:function(res){console.log(res);
					if(res){
						$('#name_list_'+rowOrder).show();
						$('#name_list_'+rowOrder).html(res);
					}else{
						$('#name_list_'+rowOrder).html("");
					}
				},
		});	
      }
  })
  
  $('#sales_cont').on('keyup','.batchItem',function(){
      var rowOrder = $(this).data('order');
      var itemBatch = $(this).val();
      if(itemBatch != '' && itemBatch != 0)
      {
      	$.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/searchItemBatchList');?>',
			data: { itemBatch : itemBatch, rowOrder:rowOrder},
				success:function(res){console.log(res);
					if(res){
						$('#batch_list_'+rowOrder).show();
						$('#batch_list_'+rowOrder).html(res);
					}else{
						$('#batch_list_'+rowOrder).html("");
					}
				},
		});	
      }
  })

 $('#sales_cont').on('click','.subSelect_itemedit',function(){
     var id = $(this).data('id');
     var itemValue = $(this).data('value');
     var totalTaxableAmount = 0;
     var totalgstAmount = 0;
     var grandTotal = 0;
     var deliverycharge = 0;
     var discount = 0;
     $.ajax({
      	    type:"POST",
			url:'<?php echo site_url('Admin/getItemByCode');?>',
			data: { itemValue : itemValue},
				success:function(res){console.log(res);
				$('#code_list_'+id).hide();
				$('#name_list_'+id).hide();
				$('#batch_list_'+id).hide();
				var obj = JSON.parse(res);
				$('#hsncode_'+id).val(obj.hsn_code);
				if(obj.hsn_tax == 12 || obj.hsn_tax == 18 || obj.hsn_tax == 28){
				    var taxableAmount = (parseInt(obj.itm_brate)/(100+(parseInt(obj.hsn_tax)))*100).toFixed(2);
				}
				var gstAmount = ((taxableAmount*parseInt(obj.hsn_tax))/100).toFixed(2);
				$('#code_'+id).val(obj.itm_code);
			    $('#itemname_'+id).val(obj.itm_name);
			    $('#batch_'+id).val(obj.item_batchcode);
			    $('#taxable_'+id).val(taxableAmount);
			    $('#taxable_'+id).attr('data-value',taxableAmount);
			    $('#gstAmount_'+id).val(gstAmount);
			    $('#gstAmount_'+id).attr('data-value',gstAmount);
			    $('#itemqty_'+id).val(1);
			    $('#gstper_'+id).val(obj.hsn_tax);
			    $('#totalAmount_'+id).val(obj.itm_brate);
			    $('#totalAmount_'+id).attr('data-value',obj.itm_brate);
			    $('#totalTaxableAmount').val(taxableAmount);
			    $('.taxableAmount').each(function( index ) {console.log($(this).val());
                     totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
                 });
                 $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
                 $('.gstAmount').each(function( index ) {console.log($(this).val());
                     totalgstAmount=totalgstAmount+parseFloat($(this).val());
                 });
                 $('#amountGst').val(totalgstAmount.toFixed(2));
                 grandTotal = totalTaxableAmount+totalgstAmount;
                 $('#roundOfValuue').val((grandTotal%1).toFixed(2));
                 if($('#deliverychare').val()!=''){
                     deliverycharge = $('#deliverychare').val();
                 }
                 else{
                     deliverycharge = 0;
                 }
                 if($('#discount').val()!=''){
                     discount = $('#discount').val();
                 }
                 else{
                     discount = 0;
                 }
                 $('#grandTotal').val(Math.round(grandTotal+parseInt(deliverycharge)-parseInt(discount)));
                 var paidamount = $('#paidamount').val();
                    if(paidamount == ''){
                        paidamount = 0;
                    }
                    $('#outstanding').val(parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
				},
		});
 }) 
 
$('#deliverychare').on('keyup',function(){
    recalculate();
});

$('#discount').on('keyup',function(){
    recalculate();
});
 
$('#sales_cont').on('keyup','.qnty',function(){
    var qnty = $(this).val();
    var order = $(this).data('order');
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var deliverycharge = 0;
    var discount = 0;
    if(qnty != '' && qnty!=0){
     $('#taxable_'+order).val((qnty*$('#taxable_'+order).data('value')).toFixed(2));
     $('#gstAmount_'+order).val((qnty*$('#gstAmount_'+order).data('value')).toFixed(2));
     $('#totalAmount_'+order).val((qnty*$('#totalAmount_'+order).data('value')).toFixed(2));
     $('.taxableAmount').each(function( index ) {
         totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {console.log($(this).val());
         totalgstAmount=totalgstAmount+parseFloat($(this).val());
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalgstAmount;
     $('#roundOfValuue').val((grandTotal%1).toFixed(2));
     if($('#deliverychare').val()!=''){
         deliverycharge = $('#deliverychare').val();
     }
     else{
         deliverycharge = 0;
     }
     if($('#discount').val()!=''){
         discount = $('#discount').val();
     }
     else{
         discount = 0;
     }
     $('#grandTotal').val(Math.round(grandTotal+parseInt(deliverycharge)-parseInt(discount)));
     var paidamount = $('#paidamount').val();
    if(paidamount == ''){
        paidamount = 0;
    }
    $('#outstanding').val(parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
    }
    
});

$('#sales_cont').on('keyup','.totalAmount',function(){
    if($(this).val()!=''){console.log($(this).val());
        var srate = parseInt($(this).val());
    }
    else{
       var srate =0;
    }
    var id = $(this).data('order');
    var tax = parseInt($('#gstper_'+id).val());
    $('#totalAmount_'+id).attr('data-value',$('#totalAmount_'+id).val());
    var totalTaxableAmount = 0;
    var totalgstAmount = 0;
    var grandTotal = 0;
    var deliverycharge = 0;
    var discount = 0;
    if(tax == 12 || tax == 18 || tax == 28){
	    var taxableAmount = (srate/(100+tax)*100).toFixed(2);
	}
	var gstAmount = ((taxableAmount*tax)/100).toFixed(2);
	
    $('#taxable_'+id).val(taxableAmount);
    $('#taxable_'+id).attr('data-value',taxableAmount);
    $('#gstAmount_'+id).val(gstAmount);
    $('#gstAmount_'+id).attr('data-value',gstAmount);
    $('#itemqty_'+id).val(1);
    $('#gstper_'+id).val(tax);
    $('#totalAmount_'+id).val(srate);
    $('#totalAmount_'+id).attr('data-value',srate);
    $('#totalTaxableAmount').val(taxableAmount);
    $('.taxableAmount').each(function( index ) {
         totalTaxableAmount=totalTaxableAmount+parseFloat($(this).val());
     });
     $('#totalTaxableAmount').val(totalTaxableAmount.toFixed(2));
     $('.gstAmount').each(function( index ) {
         totalgstAmount=totalgstAmount+parseFloat($(this).val());
     });
     $('#amountGst').val(totalgstAmount.toFixed(2));
     grandTotal = totalTaxableAmount+totalgstAmount;
     $('#roundOfValuue').val((grandTotal%1).toFixed(2));
     if($('#deliverychare').val()!=''){
         deliverycharge = $('#deliverychare').val();
     }
     else{
         deliverycharge = 0;
     }
     if($('#discount').val()!=''){
         discount = $('#discount').val();
     }
     else{
         discount = 0;
     }
     $('#grandTotal').val(Math.round(grandTotal+parseInt(deliverycharge)-parseInt(discount)));
     var paidamount = $('#paidamount').val();
    if(paidamount == ''){
        paidamount = 0;
    }
    $('#outstanding').val(parseInt(grandTotal)+parseInt(deliverycharge)-parseInt(discount)-parseInt(paidamount));
});

$('#paidamount').on('keyup',function(){
    var paidamount = $('#paidamount').val();
    var grandTotal = $('#grandTotal').val();
    if(paidamount == ''){
        paidamount = 0;
    }
    $('#outstanding').val(parseInt(grandTotal)-parseInt(paidamount));
});
$('.bankcheck').on('click',function(){
 $('.cardnumber').show();
  $('.cardnumber_id').show();
});
$('.cashcheck').on('click',function(){
 $('.cardnumber').hide();
  $('.cardnumber_id').hide();
});
$('.creditcheck').on('click',function(){
 $('.cardnumber').hide();
  $('.cardnumber_id').hide();
});
  
</script>

</body>

</html>

