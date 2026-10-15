	<div class="col-sm-12">
							<div class="col-sm-1">
								<label class="exampleInputEmail1"  >NAME</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_name;?>"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1" >QUOTATION NUMBER:</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_quotation_no;?>"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1"  >BILL DATE</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_billdate;?>"/>
							</div>
							<div class="col-sm-1">
								<label class="exampleInputEmail1" >PHONE NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_phoneno;?>"/>
							</div>
						    </div>
						    <div class="col-sm-12">
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">GST NUMBER</label>
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_gstno;?>"/>
							</div>
							
						    	<div class="col-sm-1">
								<label class="exampleInputEmail1">ADDRESS:</label>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control"><?php echo $key->quotationbill_master_address;?></textarea>
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
      <th scope="col">CESS</th>
      <th scope="col">TOTAL</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col"><button type="button" id="BtnNewRow" data-order="1" class="btn btn-info btn-sm">ADD</button></th>
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">DELETE</button></th>-->
      <!--<th scope="col"><button type="button" class="btn btn-info btn-sm">CLEAR</button></th>-->
    </tr>
  </thead>
  <tbody>
      <?php $i=1;foreach($quotationtrans as $singetrans){ ?>
    <tr>
      <th scope="row" class="slnom"><?php echo $i;?></th>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->itm_code;?>" style="width:70px;">
      <div></div>
      </td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->itm_name;?>" style="width:140px;">
      <div></div>
      </td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->batchcode;?>" style="width:60px;">
      <div></div>
      </td>
      </td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->quotationbill_trans_qty;?>" style="width:50px;"></td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->quotationbill_trans_taxablevale;?>"></td>
      <td><input type="text"  class="form-control" style="width:50px;" value="<?php echo $singetrans->hsn_tax;?>"></td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->quotationbill_trans_gstamount;?>">
      <input type="hidden" class="form-control" required></td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->quotationbill_trans_cess;?>" style="width:70px;"> </td>
      <td><input type="text" class="form-control" value="<?php echo $singetrans->quotationbill_trans_total;?>"></td>
      <td><select name="employee[]" class="form-control" style="width:140px;">
      <option value="0">Select </option>

     <?php 
   
$emp=$this->Admin_model->get_staff1();

foreach($emp as $emp){?>
                                <option value="<?php echo $emp->stf_id;?>" <?php if($emp->stf_id==$singetrans->quotationbill_trans_sale_employeee_login_id){echo 'selected';}?>><?php echo $emp->stf_name;?></option>
 <?php }?>
      </select>
    </td>
      <td>
      <i class="fa fa-eraser detailEraseRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer;margin-right: 7px"></i>
          <i class="fa fa-trash detailDeleteRow" data-row="1" aria-hidden="true" style="font-size:15px;margin-top: 10px;cursor:pointer"></i>
      </td>
    </tr>
   <?php $i++;} ?>
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
										<textarea class="form-control"><?php echo $key->quotationbill_master_note;?></textarea>
									</div>
						     		</div>
						     		<div class="col-sm-12" style="margin-top: 20px;">
			
							<div class="col-sm-2">
								<label class="exampleInputEmail1">IS IGST</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_isigst;?>" />
							</div>
						</div>

						
						
					</div>

                        <div class="col-sm-6">
                        	<div class="col-sm-12">
				
							<div class="col-sm-2">
								<label class="exampleInputEmail1">TOTAL TAXABLE AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_tot_taxable_amount;?>" />
							</div>
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GST AMOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_tot_gst_amount;?>" />
							</div>
						</div>
							
							

						   
						    <div class="col-sm-12">
								<div class="col-sm-2">
								<label class="exampleInputEmail1">DELIVERY CHARGE</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_delivery_charge;?>" />
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">CESS</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_tot_cess;?>"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="col-sm-2">
								<label class="exampleInputEmail1">DISCOUNT</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_discount;?>" />
							</div>
							<div class="col-sm-2">
								<label class="exampleInputEmail1">ROUND OFF</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_round_off;?>" />
							</div>
							
							</div>
							<div class="col-sm-12">
								<div class="col-sm-2">
								<label class="exampleInputEmail1">GRAND TOTAL</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?php echo $key->quotationbill_master_grandtotal;?>" />
							</div>
							</div>
							<!---->
						</div>
						</div>
						<div class="col-sm-12">
</div>