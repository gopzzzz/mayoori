
  <?php $data['leftmenu']='item'; echo $this->load->view('common/leftmenu',$data,true);?>

<style>
p a {
    color: #3c8dbc;
    padding: 11px;
    border: 1px solid #3c8dbc;
    background-color: #3c8dbc;
    color: white;
}
</style>
<?php
/*** begin the session ***///
session_start();
 
/*** create the form token ***////
$form_token = uniqid();
 
/*** add the form token to the session ***/
$_SESSION['form_token'] = $form_token;
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

  

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1 align="center">Item Creation<small>Preview</small></h1>

      

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="<?php echo base_url().'item';?>">Item Creation</a></li>

      </ol>

    </section><br>

  
<!------------------test------------------------->




          
        






<!--------------------test------------------->
    <!-- Main content -->

    <section class="content">
      <button type="button" class="btn btn-info btn-lg btn_addon" data-toggle="modal" data-target="#myModal">ADD</button>  
		<!----------------------Item Creation Modal-----------------------style="width:80%;"-->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog" >
			<?php echo form_open_multipart('item', array('onsubmit' => 'return validateForm()','name' => 'myForm'));?>
				<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Item Creation</h4>
							</div>
													
									<div class="row col-sm-12">
										<div class="col-sm-12">
														<div class="row col-sm-12" style="border:1px solid #e1e3ea; ">
															<br>
															<div class="col-sm-3">
																<label class="exampleInputEmail1" >Item Code</label>
															</div>
															<div class="form-group col-sm-9">
																<input type="text" class="form-control" name="code" id="item_code" required>
															</div>
																						

															<div class="col-sm-3">
																<label class="exampleInputEmail1" >Item Name</label>
															</div>
															<div class="form-group col-sm-9">
																<input type="text" class="form-control" name="name" onkeyup="fullnamefunction()" id="itemname" required>
															</div>
																				
														</div>
                                        
								   


														<div class="row col-sm-12" style="border:1px solid #e1e3ea; margin-top: 20px;">
															<br>
															<div class="col-sm-3">
																<label class="exampleInputEmail1" >Unit</label>
															</div>
															<div class="form-group col-sm-9">
																<select name="units" class="form-control" required>
																	<option value="0">Select</option>
																	<?php foreach($unit as $key5){?>
																			
																	<option value="<?php echo $key5->unit_id;?>"><?php echo $key5->unit_value;?></option>
																	<?php } ?>
																</select>
															</div>
																					
																						
																						
															<div class="col-sm-3">
																<label class="exampleInputEmail1" >Group</label>
															</div>
															<div class="form-group col-sm-8">
																<input type="hidden" class="form-control" id="ac_group_id" name="group" required>
																<input type="text" class="form-control" id="ac_group" placeholder="Search Item  Group" required>
																<div id="ac_grouplist"></div>
															</div>
															<div class="col-sm-1"><i class="fa fa-plus-square-o" style="font-size:24px;margin-top:5px;padding-right:10px;" data-toggle="modal" data-target="#account_modal"></i></div>
															
															<div class="col-sm-3">
																<label class="exampleInputEmail1" >Category</label>
															</div>
															<div class="form-group col-sm-8">
																<input type="hidden" class="form-control" id="cat_id" name="cat" required>
																<input type="text" class="form-control" id="category" placeholder="Search Item  Category" required>
																<div id="category_list"></div>
															</div>
															<div class="col-sm-1"><i class="fa fa-plus-square-o" style="font-size:24px;margin-top:5px;padding-right:10px;" data-toggle="modal" data-target="#category_modal"></i></div>
																						
															<div class="col-sm-3">
																<label class="exampleInputEmail1" >Brand</label>
															</div>
															<div class="form-group col-sm-8">
																<input type="hidden" class="form-control" id="brand_id" name="brand_id" required>
																<input type="text" class="form-control" id="brand_name" placeholder="Search Brand" required>
																<div id="brand_list"></div>
															</div>
															<div class="col-sm-1"><i class="fa fa-plus-square-o" style="font-size:24px;margin-top:5px;padding-right:10px;" data-toggle="modal" data-target="#brand_modal"></i></div>
														</div>									
										
										</div>

									</div>
												
				
							
					
							
								<div class="modal-footer">
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
								</div>	
			</form>
	
		</div>
	
				<!----------------------Account Grroup Modal------------------------->
				<div class="modal fade" id="account_modal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('accgp');?>
						<div class="modal-content">
						
							<div class="modal-header bg-info">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Item Group Creation</h4>
							</div>
							<div class="bg-info">
							<input type="hidden" class="form-control" name="ag_id"  />
                            <div class="form-group col-sm-6">
								<label for="exampleInputEmail1"> Item Group</label>
								<input type="text" class="form-control" id="ac_grpnew" name="accgp" Placeholder="Enter Item Group Name" onkeyup="itemgroupfunction()" data-toggle="tooltip" title="Use Capital Letters Only" required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1"> Item Group Code</label>
								<input type="text" class="form-control" id="ac_grpcode"  Placeholder="Enter Item Group Code" required />
							</div>
						</div>
							

								
							<div class="modal-footer bg-info">
								<button type="button"  class="btn btn-primary" id="accountgroupnewadd">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss-modal="modal3">Close</button>
							</div>
						</div>
						</form>
					</div>
				</div>

		
				<!--------------------Category Modal----------------------------->
				<div class="modal fade" id="category_modal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('catg');?>
						<div class="modal-content">
						
							<div class="modal-header bg-info">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Item Category Creation</h4>
							</div>
						<div class="bg-info">
							<input type="hidden" class="form-control" name="cg_id"  />
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Item Group</label>
								<select name="itmgrp" class="form-control" id="itemgrpcat">
									<?php foreach($itmgrp as $key8){?>
										<option value="<?php echo $key8->ig_id;?>"><?php echo $key8->ig_name;?></option>
									<?php } ?>
								</select>
							</div>
                            <div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Category Name</label>
								<input type="text" class="form-control" id="catenew" name="name" Placeholder="Enter Item Category " onkeyup="itemcategoryfunction()" data-toggle="tooltip" title="Use Capital Letters Only" required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Category Code</label>
								<input type="text" class="form-control" id="catenewcode" name="name" Placeholder="Enter Item Category " required />
							</div>
						</div>
							

								
							<div class="modal-footer bg-info">
								<button type="button" id="categoryaddnew" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss-modal="modal4">Close</button>
							</div>
						</div>
						</form>
					</div>
				</div>
		
			


				<!--------------------Brand Modal----------------------------->
				<div class="modal fade" id="brand_modal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('brand');?>
						<div class="modal-content">
						
							<div class="modal-header bg-info">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Item Brand Creation</h4>
							</div>
						<div class="bg-info">
							<input type="hidden" class="form-control" name="brnd_id"  />
							
                            <div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Brand Name</label>
								<input type="text" class="form-control" id="brand" name="brand" Placeholder="Enter Brand Name" onkeyup="itembrandfunction()" data-toggle="tooltip" title="Use Capital Letters Only" required />
							</div>
							
						</div> 
							

								
							<div class="modal-footer bg-info">
								<button type="button" id="brandaddnew" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss-modal="modal4">Close</button>
							</div>
						</div>
						</form>
					</div>
				</div>
	</div>
		

		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Item Creation</h3>
			  <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>"/>	


              <div class="box-tools">
             
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example21" class="table table-hover" style=" overflow-x: scroll;">
			  <br>
			  <?php echo form_open_multipart('item');?>
			  <center><input type="text" class="form-control" name="search" style="width:50%;" value="<?php echo $itemaname;?>" placeholder="search Item code or item name............"><br><button type="submit" name="itemsearch_submit" class="btn btn-sm btn-success">Search</button></center>
			  <br>
			 </form>
			  <thead>
                <tr>
                  <th>#</th>
				  <th>Item Code</th>
				  <th>Item Name</th>
				  <th>Units</th>
				 
				  <th>Group</th>
				  <th>Category</th>
				
				  <th>Batch</th>
				  <th>Action</th>
                  
                </tr>
				 </thead>
				<?php
			$i=1;
			foreach($itm as $key){
				
					?>
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $key->itm_code;?></td>
				  <td>
				  <a href="javascript:void(0)" onClick="addBatch(this.id)" id="<?php echo $key->itm_id;?>" >
				  <?php echo $key->itm_name;?></a>
				  </td>
				  <td><?php echo $key->unit_value;?></td>
			
				  <td><?php echo $key->ig_name;?></td>
				  <td><?php echo $key->itcat_name;?></td>
				
				  <td>
				  <button type="button" class="btn btn-sm btn-primary" data-id="<?php echo $key->itm_id;?>" onClick="viewBatch(this.getAttribute('data-id'))" title="View Item Batch"><i class="fa fa-eye" aria-hidden="true" ></i></button>
				  <button type="button" class="btn btn-sm btn-success" onClick="addBatch(this.id,this.getAttribute('data-inc'))" id="<?php echo $key->itm_id;?>" data-inc="<?php echo $key->itm_incentive; ?>" data-batch="<?php echo $key->item_batchcode;?>" title="Add Item Batch"><i class="fa fa-plus" aria-hidden="true" ></i> </button> 
				  </td>               
				  <td><?php echo anchor('del_item/'.$key->itm_id,'<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
						&nbsp;&nbsp;<li class="fa fa-pencil" data-toggle="modal" data-target="#myModal2<?php echo $key->itm_id;?>"></li>
				
				  </td>
                </tr>
				
				
				
				<!--------------------------------------------------------->
				<div class="modal fade" id="myModal2<?php echo $key->itm_id;?>" role="dialog">
				
					<div class="modal-dialog">
					 <?php
						$id=$key->itm_id;
						$edit_area=$this->Admin_model->item_edit($id);
						foreach($edit_area as $key2){
							
						
						}
						
						?>
						<!-- Modal content-->
						<form name="myForm" <?php echo form_open_multipart('item');?>>
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Item Creation</h4>
							</div>
							<div class="row col-sm-12">
                                	<div class="col-sm-12">
                                		 <div class="row col-sm-12" style="border:1px solid #e1e3ea; ">
                                		 	<br>
											<input type="hidden" class="form-control" name="itm_id" value="<?php echo $key2->itm_id;?>"/>
                                		    <div class="col-sm-3">
								            <label class="exampleInputEmail1" >Item Code</label>
								         	</div>
								         	<div class="form-group col-sm-9">
								         	<input type="text" class="form-control" readonly name="code" value="<?php echo $key2->itm_code;?>" id="fullname">
								    		</div>

								    		<div class="col-sm-3">
								         	<label class="exampleInputEmail1" >Item Name</label>
								         	</div>
								         	<div class="form-group col-sm-9">
								         	<input type="text" class="form-control" name="name" value="<?php echo $key2->itm_name;?>" id="fullname">
								    		</div>
								    		
										</div>

								   


                                	    <div class="row col-sm-12" style="border:1px solid #e1e3ea; margin-top: 20px;">
                                	        <br>
                                		 	<div class="col-sm-3">
								       		<label class="exampleInputEmail1" >Unit</label>
								        	</div>
								        	<div class="form-group col-sm-9">
								        	<select name="units" class="form-control">
											<?php foreach($unit as $key5){?>
											<option value="<?php echo $key5->unit_id;?>" <?php if($key2->itm_unit==$key5->unit_id){echo 'selected';}?>><?php echo $key5->unit_value;?></option>
											<?php } ?>
											</select>
								    		</div>
								    		
								     		<div class="col-sm-3">
								         	<label class="exampleInputEmail1" >Group</label>
								         	</div>
								         	<div class="form-group col-sm-9">
                                            <input type="hidden" class="form-control" id="acgp_id_edit_<?php echo $key2->itm_id;?>" name="group" data-value="<?php echo $key2->itm_id;?>" value="<?php echo $key2->itm_group;?>">
								            <input type="text" class="form-control itemgroup_edit" id="acgp_edit_<?php echo $key2->itm_id;?>" value="<?php echo $key2->ig_name;?>" data-value="<?php echo $key2->itm_id;?>">
								            <div id="acgpedit_list_<?php echo $key2->itm_id;?>"></div>
								    		</div>
								    		<div class="col-sm-3">
								         	<label class="exampleInputEmail1" >Category</label>
								         	</div>
								         	<div class="form-group col-sm-9">
                                            <input type="hidden" class="form-control" id="cat_id_edit<?php echo $key2->itm_id;?>" data-value="<?php echo $key2->itm_id;?>" name="cat" value="<?php echo $key2->itm_cat;?>">
								            <input type="text" class="form-control category_editname" id="category_edit<?php echo $key2->itm_id;?>" value="<?php echo $key2->itcat_name;?>" data-value="<?php echo $key2->itm_id;?>">
								            <div id="category_list_edit<?php echo $key2->itm_id;?>"></div>
								    		</div>

											<div class="col-sm-3">
												<label class="exampleInputEmail1" >Brand</label>
											</div>
											<div class="form-group col-sm-8"> 
												<input type="hidden" class="form-control brand_id_edit" id="brand_id_edit<?php echo $key2->itm_id;?>" name="brand_id_edit" value="<?php echo $key2->itm_cat;?>">
												<input type="text" class="form-control itembrand_edit" id="brand_name<?php echo $key2->itm_id;?>" placeholder="Search Brand" value="<?php echo $key2->brand_name;?>"  data-value="<?php echo $key2->itm_id;?>" required>
												<div id="brand_list_edit<?php echo $key2->itm_id;?>" class="brand_list_edit"></div>
											</div>
										</div>


                                	</div>
							
								</div>
							
							
							

							
							<div class="modal-footer">
								<button type="submit" name="submit_edit" class="btn btn-primary">Submit</button>
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
			<p><?php echo $links; ?></p>

			 <!--------------------------------------batch creation modal -------------------------------->
			<div class="modal fade" id="createBatchModal" role="dialog">
					<div class="modal-dialog" style="width:90%;">
								<!-- Modal content-->
					
						<form name="myForm"  onsubmit="return validateFormval()" method="post" action="<?php echo site_url('batch_creation');?>" >
				
						<input type="hidden" name="form_token" value="<?php echo $form_token;?>">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Batch Creation</h4>
								</div>
													
									<div class="row col-sm-12">
									
										<input type="hidden" name="current_item_id" id="current_item_id">
										<div class="row col-sm-6 " style="border:2px solid #34a73d; margin-top: 20px;    margin-left: 10px;">
										<br>
										<div class="col-sm-3">
																<label class="exampleInputEmail1" >Barcode Num:</label>
															</div>
															<div class="form-group col-sm-9">
																<input type="text" class="form-control"  name="barcode" value="<?php if($barcodelastnum==null){ echo "1000";}else{echo $barcodelastnum->barcode +1;}  ?>" placeholder="Enter barcode number"  required readonly>
															</div>
															<div class="col-sm-3">
																<label class="exampleInputEmail1" >Batch Code:</label>
															</div>
															<div class="form-group col-sm-9">
																<input type="text" class="form-control" id="openingstock" name="batchcode" id="batchcode" value="<?php if($barcodelastnum==null){ echo "1";}else{echo $barcodelastnum->batchcode +1;}  ?>" placeholder="Enter batchcode"  required  readonly>
															</div>
															<div class="col-sm-3">
															<label class="exampleInputEmail1" >Supplier</label>
															</div>
															<div class="form-group col-sm-8" >
															<input type="hidden" class="form-control" id="suplier_id" name="splr">
															<input type="text" class="form-control " id="suplier" placeholder="Search Supplier Name" required>
															<div id="suplier_list"></div>
															</div>
															<div class="col-sm-1"><i class="fa fa-plus-square-o" style="font-size:24px;margin-top:5px;padding-right:10px;" data-toggle="modal" data-target="#suplier_modal"></i></div>
															
														
															
										<div class="col-sm-12">
															
															<label class="exampleInputEmail1" >HSN Code</label>
																	</div>
																	<div class="form-group col-sm-8">
																	<select class="form-control" name="hsn" id="hsncode" required>
																	<option value="0">Select HSN Code</option>
																	<?php foreach($hsn as $key1){ ?>
																	<option value="<?php echo $key1->hsn_id;?>"><?php echo $key1->hsn_code;?>( <?php echo $key1->hsn_tax; ?> %)</option>
																	<?php } ?>
																	</select>
																	<input type="hidden" id="tax" class="form-control">
																	</div>
																	<div class="col-sm-4 "><i class="fa fa-plus-square-o" style="font-size:24px;margin-top:5px;padding-right:10px;" data-toggle="modal" data-target="#createhsncode"></i></div>
																	<div class="col-sm-12">
                                                                       <!-- <a href="javascript:void(0)"id="incentive" data-id="" data-incentiveid="" data-itemid="" onClick="addIncentive(this.getAttribute('data-id'),this.getAttribute('data-itemid'),this.getAttribute('data-incentiveid'))"><li class="fa fa-plus" ></li></a> -->
                                                                                <!-- Incentive -->
																	   <input type="hidden" class="form-control" name="batch_id" value=""/>
																		<input type="hidden" class="form-control" name="item_id" value=""/>
																		
																		<div class="form-group col-sm-12">
																			<label for="exampleInputEmail1">Incentive type</label>
																			<input type="radio"  id="inc_peramount" name="inc_peramount" value="1" checked>Amount
																			<input type="radio"  id="inc_peramount" name="inc_peramount" value="2">perecntage
																			<input type="radio"  id="inc_peramount" name="inc_peramount" value="3">Both
																		</div>
																	
																		 <div class="form-group col-sm-12 " id="addampercent">
																		<label>Amount/Percentage</label>
																		<input type="text" class="form-control"  name="inc_ampercent" value="">
																		</div>
																		<div id="addbothfields">
																			<div class="form-group col-sm-3">
																				<label>Range1</label>
																				<input type="text" name="range1" class="form-control" value="">
																				<input type="radio"  id="inc_both1" name="inc_bothperamount1" value="1">Amount
																				<input type="radio"  id="inc_both1" name="inc_bothperamount1" value="2">%
																				<label>Amount/%<label>
																				<input type="text" class="form-control" id="inc_botheampercent1" name="inc_botheampercent1" value="">
																		    </div>
																			<div class="form-group col-sm-3">
																					<label>Range2</label>
																					<input type="text" name="range2" class="form-control" value="">
																					<input type="radio"  id="inc_both2" name="inc_bothperamount2" value="1">Amount
																					<input type="radio"  id="inc_both2" name="inc_bothperamount2" value="2">%
																					<label>Amount/%<label>
																					<input type="text" class="form-control" id="inc_botheampercent2" name="inc_botheampercent2" value="">
																			</div>
																			<div class="form-group col-sm-3">
																					<label>Range3</label>
																					<input type="text" name="range3" class="form-control" value="">
																					<input type="radio"  id="inc_both3" name="inc_bothperamount3" value="1">Amount
																					<input type="radio"  id="inc_both3" name="inc_bothperamount3" value="2">%
																					<label>Amount/%<label>
																					<input type="text" class="form-control" id="inc_botheampercent3" name="inc_botheampercent3" value="">
																			</div>
																			<div class="form-group col-sm-3 ">
																					<label>Range4</label>
																					<input type="text" name="range4" class="form-control" value="">
																					<input type="radio"  id="inc_both4" name="inc_bothperamount4" value="1">Amount
																					<input type="radio"  id="inc_both4" name="inc_bothperamount4" value="2">%
																					<label>Amount/%<label>
																					<input type="text" class="form-control" id="inc_botheampercent4" name="inc_botheampercent4" value="">
																			</div>
																		</div>
                                                                    </div>
																
										
										</div>
										<div class="row col-sm-6 type_t" style="border:2px solid #34a73d; margin-top: 20px;margin-left: 17px;">
                                					<br>
																
																	<div class="form-group col-sm-9">
																	<label class="exampleInputEmail1" >Purchase Rate</label>
																	<input type="text" class="form-control prate" name="prate" Placeholder="Enter Rate" id="purrate"  disabled/>
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1">Purchase Cost</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="pcost" Placeholder="Enter Cost" id="purcost"  readonly/>
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >Wholesale Rate</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="wholesalerate" Placeholder="Enter Wholesale Rate" id="wholesale"  readonly/>
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >MRP</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="mrp" Placeholder="Enter MRP"   />
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >Selling Rate</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="srate" Placeholder="Enter Rate"  />
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >MOP</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="mop" Placeholder="Enter MOP"  />
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >Branch Rate</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="brate" Placeholder="Enter Rate" id="brn_rate"   />
																	</div>
																	<!-- <button type="button" class="btn" style=" float: right;">T</button> -->
												</div>

												<div class="row col-sm-6 type_d" style="border:2px solid #e1e409; margin-top: 20px;margin-left: 10px;display:none;">
																	<br>
                                                                    <div class="col-sm-4">
																	<label class="exampleInputEmail1" >Purchase Rate</label>
                                                                    </div>
                                                                    <div class="form-group col-sm-9">
																	<input type="text" class="form-control prate" name="d_prate" Placeholder="Enter Rate" id="d_purrate"  disabled/>
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1">Purchase Cost</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="d_pcost" Placeholder="Enter Cost" id="d_purcost"  readonly/>
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >Wholesale Rate</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="d_wholesalerate" Placeholder="Enter Wholesale Rate" id="d_wholesale"  readonly/>
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >MRP</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="d_mrp" Placeholder="Enter MRP"   />
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >Selling Rate</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="d_srate" Placeholder="Enter Rate"  />
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >MOP</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="d_mop" Placeholder="Enter MOP"  />
																	</div>
																	<div class="col-sm-4">
																	<label class="exampleInputEmail1" >Branch Rate</label>
																	</div>
																	<div class="form-group col-sm-9">
																	<input type="text" class="form-control" name="d_brate" Placeholder="Enter Rate" id="d_brn_rate"   />
																	</div>
																	<!-- <button type="button" class="btn" style=" float: right;">D</button> -->
												</div>

											<div class="row col-sm-6 type_e" style="border:2px solid #e47809; margin-top: 20px;   display:none; margin-left: 17px;">
															<br>
															<div class="form-group col-sm-9">
															<label class="exampleInputEmail1" >Purchase Rate</label>
															<input type="text" class="form-control prate" name="e_prate" Placeholder="Enter Rate" id="e_purrate"  disabled/>
															</div>
															<div class="col-sm-4">
															<label class="exampleInputEmail1">Purchase Cost</label>
															</div>
															<div class="form-group col-sm-9">
															<input type="text" class="form-control" name="e_pcost" Placeholder="Enter Cost" id="e_purcost"  readonly/>
															</div>
															<div class="col-sm-4">
															<label class="exampleInputEmail1" >Wholesale Rate</label>
															</div>
															<div class="form-group col-sm-9">
															<input type="text" class="form-control" name="e_wholesalerate" Placeholder="Enter Wholesale Rate" id="e_wholesale"  readonly/>
															</div>
															<div class="col-sm-4">
															<label class="exampleInputEmail1" >MRP</label>
															</div>
															<div class="form-group col-sm-9">
															<input type="text" class="form-control" name="e_mrp" Placeholder="Enter MRP"   />
															</div>
															<div class="col-sm-4">
															<label class="exampleInputEmail1" >Selling Rate</label>
															</div>
															<div class="form-group col-sm-9">
															<input type="text" class="form-control" name="e_srate" Placeholder="Enter Rate"  />
															</div>
															<div class="col-sm-4">
															<label class="exampleInputEmail1" >MOP</label>
															</div>
															<div class="form-group col-sm-9">
															<input type="text" class="form-control" name="e_mop" Placeholder="Enter MOP"  />
															</div>
															<div class="col-sm-4">
															<label class="exampleInputEmail1" >Branch Rate</label>
															</div>
															<div class="form-group col-sm-9">
															<input type="text" class="form-control" name="e_brate" Placeholder="Enter Rate" id="e_brn_rate"   />
															</div>
															<!-- <button type="button" class="btn" style=" float: right;">E</button> -->
												</div>
										
									</div>
							
						
								
								
									<div class="modal-footer">
										<button type="submit" name="submit_batch" id="saveonly" class="btn btn-primary">Submit</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
					</div>
				</form>
			    </div>
			
				<!-------------------------Create HSN code Modal------------------------------------>

				<div class="modal fade" id="createhsncode" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('hsn');?>
						<div class="modal-content">
						
							<div class="modal-header bg-info">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Create HSN code</h4>
							</div>
							<div class="bg-info">
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">HSN Code</label>
								<input type="text" class="form-control" name="code" id="hsncodeinsert" Placeholder="Enter Code " required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">Tax%</label>
								<input type="text" class="form-control" name="tax" id="taxinsert" Placeholder="Enter Percentage " value="" required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">CGST</label>
								<input type="text" class="form-control" name="cgst" id="cgstinsert"  Placeholder="Enter CGST " value="" required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">SGST</label>
								<input type="text" class="form-control" name="sgst" id="sgstinsert" Placeholder="Enter SGST " value="" required />
							</div>
							<div class="form-group col-sm-6">
								<label for="exampleInputEmail1">IGST</label>
								<input type="text" class="form-control" name="igst" id="igstinsert" Placeholder="Enter IGST " value="" required />
							</div>
						</div>
							

								
							<div class="modal-footer bg-info">
								<button type="button"  class="btn btn-primary" id="hsncodeitem">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss-modal="modal7">Close</button>
							</div>
						</div>
						</form>
					</div>
				</div>

				<!---------------Supplier Add Modal-------------------->
				<div class="modal fade" id="suplier_modal" role="dialog">
					<div class="modal-dialog " style="width:80%;">
						<!-- Modal content-->
						<form name="myForm">
						<div class="modal-content ">
							<div class="modal-header bg-info">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Supplier Creation</h4>
							</div>
							<div class="col-sm-6 bg-info" >
							  <div  class="row col-sm-12" style="border:1px solid #e1e3ea;">
							  <h4 class="text-success">Supplier Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">Supplier Code</label>
								</div>
								<div class="form-group col-sm-8">
									<?php foreach($suplastid as $supkey){
										if($supkey->sup_code==NULL){?>
											<input type="text" class="form-control" name="code" id="sup_code" value="1" readonly>
										<?php } else{?>
											<input type="text" class="form-control" name="code" id="sup_code" value="<?php echo ($supkey->sup_code)+1;?>"readonly>
										<?php }}?>
								
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1" >Full Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="name"  id="sup_name" onkeyup="supliername()" id="sup_name">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1"> Address</label>
								</div>
								<div class="form-group col-sm-8">
								<textarea class="form-control" name="sup_add"  id="sup_add" onkeyup="suplieraddress()" id="sup_add"></textarea>
								</div>
								
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Email Id</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="email"  id="sup_em" onkeyup="suplieremailfun()">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Phone Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="phnum" id="sup_phnum" onkeyup="phonenumberfun()" id="sup_phnum"> 
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Mobile Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="mbnum" id="sup_mbnum" onkeyup="supliermobilenumfun()"> 
								</div>
								
								
								</div>
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Tax Details</h4>
							  <hr>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">PAN number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="pan"  id="sup_pan" onkeyup="suplierpannumfun()">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">GST</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="gst"  id="sup_gst" onkeyup="supliergstnumber()" >
								</div>
								</div>
								
							</div>

							<div class="col-sm-6 bg-info" >
							
								
								<div class="row col-sm-12" style="border:1px solid #e1e3ea;">
								<h4 class="text-success">Account Details</h4>
							  <hr>
							  <div class="col-sm-4">
								<label class="exampleInputEmail1">Bank Name</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="bank" id="sup_bank"  onkeyup="suplierbankfunc()">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">A/C Number</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ac_number" id="sup_ac_number">
								</div>
								<div class="col-sm-4">
								<label class="exampleInputEmail1">IFSC Code</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="ifsc" id="sup_ifsc">
								</div>
							    <div class="col-sm-4">
								<label class="exampleInputEmail1">Payment Type</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio" name="crde" id="sup_crde" value="1">Debit
								<input type="radio" name="crde"  id="sup_crde"value="2" >Credit
								</div>
								<!-- <div class="col-sm-4">
								<label class="exampleInputEmail1">Opening Balance</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="text" class="form-control" name="opbal" id="sup_opbal">
								</div> -->
								</div>
								
								

								<div class="row col-sm-12" style="border:1px solid #e1e3ea;margin-top:20px;">
								<h4 class="text-success">Supplier Code</h4>
							  <hr>
							 
								<div class="col-sm-4">
								<label class="exampleInputEmail1">Maintain Balance Bill By Bill</label>
								</div>
								<div class="form-group col-sm-8">
								<input type="radio" id="sup_mngill" name="mnbill" value="1">Yes
								<input type="radio" id="sup_mngill" name="mnbill" value="2" >No
								</div>
								
							</div>
						
							</div>

							
						
							
								
							<div class="modal-footer bg-info">
								<button type="button"  class="btn btn-primary" id="suplier_button" >Submit</button>
								<button type="button" class="btn btn-default" data-dismiss-modal="modal2">Close</button>
							</div>
						</div>
						</form>
					</div>
		</div>
		
		</div>
		<!--------------------------------------batch view modal -------------------------------->
		<div class="modal fade" id="viewBatchModal" role="dialog">
			<div class="modal-dialog" style="width:80%;">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Batch</h4>
					</div>
					<div id="viewBatch"></div>
					<div class="modal-footer">
						<!-- <button id="show_tde" class="btn pull-left">S</button>												 -->
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
							
			</div>			  
        </div>
		<!-- /-batch view modal end -->

		<!--------------------------------------batch edit modal -------------------------------->
		<div class="modal fade" id="editBatchModal" role="dialog">
			<div class="modal-dialog" style="width:80%;">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Batch</h4>
					</div>
					<?php echo form_open_multipart('batch_creation', array('onsubmit' => 'return validateForm()','name' => 'BatchForm'));?>

						<div id="editBatch"></div>
					
						<div class="modal-footer">
							<button type="submit" name="submit_editbatch" class="btn btn-primary">Submit</button>												
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>

				</div>
							
			</div>			  
        </div>
		<!-- /-batch view modal end -->

		<!-- start edit incentive model -->
		<!-------------------incnetive Modal----------------------------->
		<div class="modal fade" id="editincentive_modal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('updateincentive',array('id' => 'updateincentive'));?>
						<div class="modal-content">
						
							<div class="modal-header bg-info">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Incentive Edit</h4>
							</div>
							<div class="bg-info">
							    <input type="hidden" name="id" value="">
								<input type="hidden" class="form-control" name="batch_id" value=""/>
								<input type="hidden" class="form-control" name="item_id" value=""/>
								
								<div class="form-group col-sm-12">
									<label for="exampleInputEmail1">Incentive type</label>
									<input type="radio"  id="inc_peramount1" class="peramountincentive" name="inc_peramount1" value="1">Amount
									<input type="radio"  id="inc_peramount2" class="peramountincentive" name="inc_peramount1" value="2">perecntage
									<input type="radio"  id="inc_peramount3" class="peramountincentive" name="inc_peramount1" value="3">Both
								</div>
							 
								<div class="form-group col-sm-6" id="ampercent">
								 <label for="exampleInputEmail1">Amount/Percentage</label>
								 <input type="text" class="form-control"  name="inc_ampercent" value="">
								</div>
								<div id="bothfields">
									<div class="form-group col-sm-3">
										<label>Range1</label>
										<input type="text" name="range1" class="form-control" value="">
										<input type="radio"  id="inc_both11" name="inc_bothperamount1" value="1">Amount
										<input type="radio"  id="inc_both12" name="inc_bothperamount1" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent1" name="inc_botheampercent1" value="">
								   </div>
								   <div class="form-group col-sm-3">
										<label>Range2</label>
										<input type="text" name="range2" class="form-control" value="">
										<input type="radio"  id="inc_both21" name="inc_bothperamount2" value="1">Amount
										<input type="radio"  id="inc_both22" name="inc_bothperamount2" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent2" name="inc_botheampercent2" value="">
								   </div>
								   <div class="form-group col-sm-3">
										<label>Range3</label>
										<input type="text" name="range3" class="form-control" value="">
										<input type="radio"  id="inc_both31" name="inc_bothperamount3" value="1">Amount
										<input type="radio"  id="inc_both32" name="inc_bothperamount3" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent3" name="inc_botheampercent3" value="">
								   </div>
								   <div class="form-group col-sm-3">
										<label>Range4</label>
										<input type="text" name="range4" class="form-control" value="">
										<input type="radio"  id="inc_both41" name="inc_bothperamount4" value="1">Amount
										<input type="radio"  id="inc_both42" name="inc_bothperamount4" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent4" name="inc_botheampercent4" value="">
								   </div>
							   </div>
								

								
							</div> 
							

								
							<div class="modal-footer bg-info">
								<button type="button" id="incentiveeditnew" class="btn btn-primary">Update</button>
								<button type="button" class="btn btn-default" class="close" data-dismiss="modal" >Close</button>
							</div>
						</div>
						</form>
					</div>
		</div>
		<!--end edit incentive model -->
		<!-------------------incnetive Modal----------------------------->
		<div class="modal fade" id="incentive_modal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<?php echo form_open_multipart('incentive',array('id' => 'incentive'));?>
						<div class="modal-content">
						
							<div class="modal-header bg-info">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Incentive Creation</h4>
							</div>
							<div class="bg-info">
								<input type="hidden" class="form-control" name="batch_id" value=""/>
								<input type="hidden" class="form-control" name="item_id" value=""/>
								
								<div class="form-group col-sm-12">
									<label for="exampleInputEmail1">Incentive type</label>
									<input type="radio"  id="inc_peramountadd1" name="inc_peramount" value="1">Amount
									<input type="radio"  id="inc_peramountadd2" name="inc_peramount" value="2">perecntage
									<input type="radio"  id="inc_peramountadd3" name="inc_peramount" value="3">Both
								</div>
							 
								<div class="form-group col-sm-6" id="addampercentadd">
								 <label for="exampleInputEmail1">Amount/Percentage</label>
								 <input type="text" class="form-control"  name="inc_ampercent" value="" id="inc_ampercent1">
								</div>
								<div id="addbothfieldsadd">
									<div class="form-group col-sm-3">
										<label>Range1</label>
										<input type="text" name="range1" class="form-control" value="">
										<input type="radio"  id="inc_both1" name="inc_bothperamount1" value="1">Amount
										<input type="radio"  id="inc_both1" name="inc_bothperamount1" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent1" name="inc_botheampercent1" value="">
								   </div>
								   <div class="form-group col-sm-3">
										<label>Range2</label>
										<input type="text" name="range2" class="form-control" value="">
										<input type="radio"  id="inc_both2" name="inc_bothperamount2" value="1">Amount
										<input type="radio"  id="inc_both2" name="inc_bothperamount2" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent2" name="inc_botheampercent2" value="">
								   </div>
								   <div class="form-group col-sm-3">
										<label>Range3</label>
										<input type="text" name="range3" class="form-control" value="">
										<input type="radio"  id="inc_both3" name="inc_bothperamount3" value="1">Amount
										<input type="radio"  id="inc_both3" name="inc_bothperamount3" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent3" name="inc_botheampercent3" value="">
								   </div>
								   <div class="form-group col-sm-3">
										<label>Range4</label>
										<input type="text" name="range4" class="form-control" value="">
										<input type="radio"  id="inc_both4" name="inc_bothperamount4" value="1">Amount
										<input type="radio"  id="inc_both4" name="inc_bothperamount4" value="2">%
										<label>Amount/%<label>
										<input type="text" class="form-control" id="inc_botheampercent4" name="inc_botheampercent4" value="">
								   </div>
							   </div>
								

								
							</div> 
							

								
							<div class="modal-footer bg-info">
								<button type="button" id="incentiveaddnew" class="btn btn-primary">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss-modal="modal4">Close</button>
							</div>
						</div>
						</form>
					</div>
		</div>
		<!--end add incentive model -->

            <!-- /.box-body -->
         </div>
          <!-- /.box -->
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

  function deletechecked(){

  if(confirm("Do you really want to delete this item & its batch?")){



return true;



  } 

  else{

    

    return false;

  }

    

  }

  

  </script>

<!-- jQuery 3 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
 $('#ac_group').keyup(function(){	
			//alert("success");
			// exit;
			var customer=$('#ac_group').val();
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_item_group');?>',
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
		var itgpname = $(this).closest('tr').find('#id_SCR').val();
		
		var itgpid = $(this).closest('tr').find('#fff').val();
		
		
		
		
		$('#ac_group').val(itgpname);
		$('#ac_group_id').val(itgpid);
		
		
		$('#ac_grouplist').hide();	
		
	});
	
		$('#acgp_edit').keyup(function(){	
			//alert("success");
			// exit;
			var customer=$('#acgp_edit').val();
			
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_account_groupedit');?>',
						data: { search : customer},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#acgpedit_list').show();
									$('#acgpedit_list').html(res);
								}else{
									$('#acgpedit_list').html("");
								}
							},
					});	
				}
				else{
					$('#acgpedit_list').html("");
				}	
				
				
	});
		$("html").on('click','.subSelect2',function(){
		var acgpname = $(this).closest('tr').find('#id_SCR').val();
		
		var acgpid = $(this).closest('tr').find('#fff').val();
		
		
		
		
		$('#acgp_edit').val(acgpname);
		$('#acgp_id_edit').val(acgpid);
		
		
		$('#acgpedit_list').hide();	
		
	});
	
	//suplier search
	$('#suplier').keyup(function(){	
			//alert("success");
			// exit;
			var customer=$('#suplier').val();
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_suplier');?>',
						data: { search : customer},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#suplier_list').show();
									$('#suplier_list').html(res);
								}else{
									$('#suplier_list').html("");
								}
							},
					});	
				}
				else{
					$('#suplier_list').html("");
				}	
				
				
	});
		$("html").on('click','.subSelect_sup',function(){
		var supname = $(this).closest('tr').find('#id_SCR').val();
		
		var sup_id = $(this).closest('tr').find('#fff').val();
		
		
		
		
		$('#suplier').val(supname);
		$('#suplier_id').val(sup_id);
		
		
		$('#suplier_list').hide();	
		
	});
	//suplier edit searching
		$('.suplier_edit').keyup(function(){	
			//alert("success");
			// exit;
			//vineeth ----
			
			var id=$(this).data('value');
			var customer=$(this).val();
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_suplier_edit');?>',
						data: { search : customer,id:id},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									//vineeth---
									$('#suplier_list_edit'+id).show();
									$('#suplier_list_edit'+id).html(res);
								}else{
									$('#suplier_list_edit'+id).html("");
								}
							},
					});	
				}
				else{
					$('#suplier_list_edit'+id).html("");
				}	
				
				
	});
		$("html").on('click','.subSelect_supedit',function(){
		var sid=$(this).data('value');console.log(sid);
		var id=$(this).data('id');
		var supname = $(this).closest('tr').find('#id_SCR'+sid).val();
		
		var sup_id = $(this).closest('tr').find('#fff'+sid).val();
		
		
		
		
		$('#supname_id'+id).val(supname);
		$('#suplier_id_edit'+id).val(sup_id);
		
		
		$('#suplier_list_edit'+id).hide();	
		
	});
	// category Searching
			$('#category').keyup(function(){	
			//alert("success");
			// exit;
			var customer=$('#category').val();
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_category');?>',
						data: { search : customer},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#category_list').show();
									$('#category_list').html(res);
								}else{
									$('#category_list').html("");
								}
							},
					});	
				}
				else{
					$(category_list).html("");
				}	
				
				
	});
		$("html").on('click','.subSelect_cat',function(){
		var catname = $(this).closest('tr').find('#id_SCR').val();
		
		var cat_id = $(this).closest('tr').find('#fff').val();
		
		
		
		
		$('#category').val(catname);
		$('#cat_id').val(cat_id);
		
		
		$('#category_list').hide();	
		
	});
	//category edit searching
		$('.category_editname').keyup(function(){	
			//alert("success");
			// exit;
			var id=$(this).data('value');
			var customer=$(this).val();
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_category_edit');?>',
						data: { search : customer,id:id},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#category_list_edit'+id).show();
									$('#category_list_edit'+id).html(res);
								}else{
									$('#category_list_edit'+id).html("");
								}
							},
					});	
				}
				else{
					$('#category_list_edit'+id).html("");
				}	
				
				
	});
		$("html").on('click','.subSelect_catedit',function(){
		var sid=$(this).data('value');
		var id=$(this).data('id');
		var catname = $(this).closest('tr').find('#id_SCR'+sid).val();
		
		var cat_id = $(this).closest('tr').find('#fff'+sid).val();
		
		
		
		
		$('#category_edit'+id).val(catname);
		$('#cat_id_edit'+id).val(cat_id);
		
		
		$('#category_list_edit'+id).hide();	
		
	});
	
	
	
	$('.itemgroup_edit').keyup(function(){	
			
			var id=$(this).data('value');
			
			var customer=$(this).val();
				if(customer!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_item_groupedit');?>',
						data: { search : customer,id:id},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#acgpedit_list_'+id).show();
									$('#acgpedit_list_'+id).html(res);
								}else{
									$('#acgpedit_list_'+id).html("");
								}
							},
					});	
				}
				else{
					$('#acgpedit_list_'+id).html("");
				}	
				
				
	});
	$('.itembrand_edit').keyup(function(){	
			
			var id=$(this).data('value');
			
			var brand=$(this).val();
				if(brand!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_brand');?>',
						data: { search : brand,id:id},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('#brand_list_edit'+id).show();
									$('#brand_list_edit'+id).html(res);
								}else{
									$('#brand_list_edit'+id).html("");
								}
							},
					});	
				}
				else{
					$('#acgpedit_list_'+id).html("");
				}	
				
				
	});
$("html").on('click','.subSelect_itgrpedit',function(){
		var sid=$(this).data('value');
		var id=$(this).data('id');
		var itgrp_name = $(this).closest('tr').find('#id_SCR'+sid).val();
		
		var grp_id = $(this).closest('tr').find('#fff'+sid).val();
		
		
		
		
		$('#acgp_edit_'+id).val(itgrp_name);
		$('#acgp_id_edit_'+id).val(grp_id);
		
		
		$('#acgpedit_list_'+id).hide();	
		
	});
	
	
	//HSN code 

$('#hsncode').on('change',function(){
	//alert();
	var id=$(this).val();
	
	if(id==0){
		$('.prate').attr("disabled", true); 
	}else{
		$('.prate').attr("disabled", false); 
	}
	
	//alert("Hello! I am an alert box!!");
      var hsn = this.value; 
//alert(hsn);	  
    $.ajax({
        type: "POST",
        url: "<?php echo site_url(); ?>/Admin/hsncodesearch",
        data:{hsn:hsn},
        success: function(result){
			console.log(result);
			var obj=JSON.parse(result)
			$('#tax').val(obj.hsn_tax);
			
			
       
    }});
  });
$(document).ready(function(){
  $('#purrate').keyup(function(){
  	var prate=$(this).val();
  	var taxrate=$('#tax').val();
  	var onper=parseFloat(1/100);
  //alert(prate);alert(taxrate);alert(onper);
  	//var cal =parseFloat(prate * ((taxrate)/100));
  	//alert(cal);
	  var answer = parseFloat(prate)+parseFloat(prate * ((taxrate)/100));//Purchase cost
	  
	  var wholesale = parseFloat(answer) + parseFloat(answer)*(10/100);

	  var purtax=parseFloat(prate)*1/100;

	  var brate=parseFloat(purtax)+parseFloat(prate);
  	///alert(cal);
	  var branchrate = parseFloat(answer)+parseFloat(answer * onper); 
	  
  	$('#wholesale').val(wholesale.toFixed(2));
  	$('#purcost').val(answer.toFixed(2));
  	$('#brn_rate').val(brate.toFixed(2));
  });
  $('#d_purrate').keyup(function(){
  	var prate=$(this).val();
  	var taxrate=$('#tax').val();
  	var onper=parseFloat(1/100);
  	
	  var answer = parseFloat(prate)+parseFloat(prate * ((taxrate)/100));//Purchase cost
	  
	  var wholesale = parseFloat(answer) + parseFloat(answer)*(10/100);

	  var purtax=parseFloat(prate)*1/100;

var brate=parseFloat(purtax)+parseFloat(prate);
  	///alert(cal);
	  var branchrate = parseFloat(answer)+parseFloat(answer * onper); 
	  
  	$('#d_wholesale').val(wholesale.toFixed(2));
  	$('#d_purcost').val(answer.toFixed(2));
  	$('#d_brn_rate').val(brate.toFixed(2));
  });
  
  $('#e_purrate').keyup(function(){ 
  	var prate=$(this).val();
  	var taxrate=$('#tax').val();
  	var onper=parseFloat(1/100);
	var answer = parseFloat(prate)+parseFloat(prate * ((taxrate)/100));//Purchase cost
	  
	var wholesale = parseFloat(answer) + parseFloat(answer)*(10/100);
	var branchrate = parseFloat(answer)+parseFloat(answer * onper); 

	var purtax=parseFloat(prate)*1/100;

var brate=parseFloat(purtax)+parseFloat(prate);
	  
  	$('#e_wholesale').val(wholesale.toFixed(2));
  	$('#e_purcost').val(answer.toFixed(2));
  	$('#e_brn_rate').val(brate.toFixed(2));
  });
  
});

 $('#suplier_button').on('click',function(){
	 
	var supliername=$('#sup_name').val();
	var suplieraddress=$('#sup_add').val();
	var suplieremail=$('#sup_em').val();
	var supierphnum=$('#sup_phnum').val();
	var supiermobnum=$('#sup_mbnum').val();
	var suplierpan=$('#sup_pan').val();
	var supliergst=$('#sup_gst').val();
	var suplierbank=$('#sup_bank').val();
	var suplieracnum=$('#sup_ac_number').val();
	var suplierifsc=$('#sup_ifsc').val();
	var supliercrde=$('#sup_crde').val();
	var suplieropbal=$('#sup_opbal').val();
	var supliercode=$('#sup_code').val();
	var supliermngill=$('#sup_mngill').val();
	//alert(supliername);
//alert(suplieraddress);	
//alert(suplieremail);
//alert(supierphnum);	 
//alert(supiermobnum);
//alert(suplierpan);
//alert(supliergst);	
//alert(suplierbank);
//alert(suplieracnum); 
//alert(suplierifsc);  
//alert(supliercrde);
//alert(suplieropbal);
//alert(supliercode);
//alert(supliermngill);

    $.ajax({
        type: "POST",
        url: "Admin/supliercraetiononitem",
        data:{supliername:supliername,suplieraddress:suplieraddress,suplieremail:suplieremail,supierphnum:supierphnum,supiermobnum:supiermobnum,suplierpan:suplierpan,supliergst:supliergst,suplierbank:suplierbank,suplieracnum:suplieracnum,suplierifsc:suplierifsc,supliercrde:supliercrde,suplieropbal:suplieropbal,supliercode:supliercode,supliermngill:supliermngill},
        success: function(result){
			console.log(result);
			var obj=JSON.parse(result)
			$('#suplier_id').val(obj.sup_id);
			$('#suplier').val(obj.sup_name);
       
    }
});
$('#suplier_modal').modal('hide');
  });
 $("button[data-dismiss-modal=modal2]").click(function(){
    $('#suplier_modal').modal('hide');
});
 $('#accountgroupnewadd').on('click',function(){
	var acgrp = $('#ac_grpnew').val();
	var acgrpcode = $('#ac_grpcode').val();
	//alert(acgrp);
$.ajax({
        type: "POST",
        url: "Admin/accountcreationitem",
        data:{acgrp:acgrp,acgrpcode:acgrpcode},
        success: function(result){
			var obj=JSON.parse(result)
			$('#ac_group_id').val(obj.ig_id);
			$('#ac_group').val(obj.ig_name);
			$('#account_modal').modal('hide');
    }
});

});
$('#hsncodeitem').on('click',function(){
	var hsncode = $('#hsncodeinsert').val();
	var tax = $('#taxinsert').val();
	var sgst = $('#sgstinsert').val();
	var cgst = $('#cgstinsert').val();
	var igst = $('#igstinsert').val();
	//alert(acgrp);
$.ajax({
        type: "POST",
        url: "Admin/createhnscode",
        data:{hsncode:hsncode,tax:tax,sgst:sgst,cgst:cgst,igst:igst},
        success: function(result){
			console.log(result);
			var obj=JSON.parse(result)
			$('#hsncode').append('<option value="'+obj.hsn_id+'">'+obj.hsn_code+'('+obj.hsn_tax+'%)</option>');
			$('#hsncode').val(obj.hsn_id);
		
			$(".prate").prop("disabled", false); 
    
    }
});
$('#createhsncode').modal('hide');

});

 $("button[data-dismiss-modal=modal3]").click(function(){
    $('#account_modal').modal('hide');
});
  $('#categoryaddnew').on('click',function(){
	var category = $('#catenew').val();
	var categorycode = $('#catenewcode').val();
	var itemgrpcat = $('#itemgrpcat').val();
	//alert(category);
$.ajax({
        type: "POST",
        url: "Admin/categorynewitem",
        data:{category:category,categorycode:categorycode,itemgrpcat:itemgrpcat},
        success: function(result){
			var obj=JSON.parse(result)
			$('#cat_id').val(obj.itcat_id);
			$('#category').val(obj.itcat_name);
			$('#category_modal').modal('hide');
    }
});

});
   $("button[data-dismiss-modal=modal4]").click(function(){
    $('#category_modal').modal('hide');
});
$("button[data-dismiss-modal=modal7]").click(function(){
    $('#createhsncode').modal('hide');
});
    $("button").click(function(){
    	
    	$('#amt_val').show();   
  		$('#amt_per').hide();
 
    });
    $(document).ready(function() { 
  $('input[type="radio"]').click(function() { 
  
  if($(this).attr('id') == 'amount_val') {
  		//alert("amount");
  		$('#amt_val').show();   
  		$('#amt_per').hide();
  }
   if($(this).attr('id') == 'amount_per') {
  		//alert("amount_per");
  		$('#amt_val').hide();   
  		$('#amt_per').show();
  }
 
  if($(this).attr('id') == 'both') {
  		//alert("amount_per");
  		$('#amt_val').show();   
  		$('#amt_per').show();
  }
});
});

//     function fullnamefunction(){
// 	var item = document.getElementById("itemname").value;
// 	var item_count=item.length;
//     var letters =  /^[A-Z\s]+$/;
    
//    if(item.match(letters) || item_count==0){
    
//    	  document.getElementById("itemname").style.color = "black";
//    	  document.getElementById("itemname").style.border = "1px solid #d2d6de";
//    }
//    else{
//    	document.getElementById("itemname").style.color = "red";
//      document.getElementById("itemname").style.border = "2px solid red";
//    }
// }
 function supliername(){
	var sname = document.getElementById("sup_name").value;
	var sname_count=sname.length;
    var letters = /^[A-Z\s]+$/;
    
   if(sname.match(letters) || sname_count==0){
    
   	  document.getElementById("sup_name").style.color = "black";
   	  document.getElementById("sup_name").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("sup_name").style.color = "red";
     document.getElementById("sup_name").style.border = "2px solid red";
   }
}
 function suplieraddress(){
	var sadd = document.getElementById("sup_add").value;
	var sadd_count=sadd.length;
    var letters = /^[A-Z\s]+$/;
    
   if(sadd.match(letters) || sadd_count==0){
    
   	  document.getElementById("sup_add").style.color = "black";
   	  document.getElementById("sup_add").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("sup_add").style.color = "red";
     document.getElementById("sup_add").style.border = "2px solid red";
   }
}
function suplieremailfun(){
	var supemail=document.getElementById("sup_em").value;
	
	var supemail_count=supemail.length;
	var letters=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if(supemail.match(letters) || supemail_count==0){
		document.getElementById("sup_em").style.color = "black";
        document.getElementById("sup_em").style.border = "1px solid #d2d6de";
	}
	else{
		document.getElementById("sup_em").style.color = "red";
		document.getElementById("sup_em").style.border = "2px solid red";
	}
}
function phonenumberfun(){
	var phone = document.getElementById("sup_phnum").value;
   var phone_count=phone.length;

   if(phone_count==10 || phone_count==0 ){
    
   	 document.getElementById("sup_phnum").style.color = "black";
   	  document.getElementById("sup_phnum").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("sup_phnum").style.color = "red";
     document.getElementById("sup_phnum").style.border = "2px solid red";
   }
}
function supliermobilenumfun(){
	var mobile = document.getElementById("sup_mbnum").value;
   var mobile_count=mobile.length;

   if(mobile_count==10 || mobile_count==0 ){
    
   	 document.getElementById("sup_mbnum").style.color = "black";
   	  document.getElementById("sup_mbnum").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("sup_mbnum").style.color = "red";
     document.getElementById("sup_mbnum").style.border = "2px solid red";
   }
}
function suplierpannumfun(){
	var pan = document.getElementById("sup_pan").value;
   var pan_count=pan.length;

   if(pan_count==10 || pan_count==0 ){
    
   	 document.getElementById("sup_pan").style.color = "black";
   	  document.getElementById("sup_pan").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("sup_pan").style.color = "red";
     document.getElementById("sup_pan").style.border = "2px solid red";
   }
}
function supliergstnumber(){
	var gst = document.getElementById("sup_gst").value;
   var gst_count=gst.length;

   if(gst_count==15 || gst_count==0 ){
    
   	 document.getElementById("sup_gst").style.color = "black";
   	  document.getElementById("sup_gst").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("sup_gst").style.color = "red";
     document.getElementById("sup_gst").style.border = "2px solid red";
   }
}
 function suplierbankfunc(){
	var bank = document.getElementById("sup_bank").value;
	var bank_count=bank.length;
    var letters = /^[A-Z\s]+$/;
    
   if(bank.match(letters) || bank_count==0){
    
   	  document.getElementById("sup_bank").style.color = "black";
   	  document.getElementById("sup_bank").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("sup_bank").style.color = "red";
     document.getElementById("sup_bank").style.border = "2px solid red";
   }
}
 function itemgroupfunction(){
	var igrp = document.getElementById("ac_grpnew").value;
	//alert();
	var igrp_count=igrp.length;
    var letters = /^[A-Z\s]+$/;
    
   if(igrp.match(letters) || igrp_count==0){
    
   	  document.getElementById("ac_grpnew").style.color = "black";
   	  document.getElementById("ac_grpnew").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("ac_grpnew").style.color = "red";
     document.getElementById("ac_grpnew").style.border = "2px solid red";
   }
}
 function itemcategoryfunction(){
	var icat = document.getElementById("catenew").value;
	//alert();
	var icat_count=icat.length;
    var letters = /^[A-Z\s]+$/;
    
   if(icat.match(letters) || icat_count==0){
    
   	  document.getElementById("catenew").style.color = "black";
   	  document.getElementById("catenew").style.border = "1px solid #d2d6de";
   }
   else{
   	document.getElementById("catenew").style.color = "red";
     document.getElementById("catenew").style.border = "2px solid red";
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
  $('.btn_addon').click(function(){
	 
    $('#taxbill').hide(); 
     $('#demobill').hide(); 
      $('#estimatebill').hide();  
  });
  $( "#openingstock" ).dblclick(function() {
	  $('.type_e').show();
	  $('.type_d').show();
	   var tde=$('#itm_tdata').val();
	  if(tde==1){
		$('#taxbill').show(); 
		$('#taxbill').css({"background-color": "green", "border": "green"});
       $('#demobill').show(); 
	    $('#demobill').css({"background-color": "#00c0ef", "border": "#00c0ef"});
      $('#estimatebill').show(); 
       $('#estimatebill').css({"background-color": "#00c0ef", "border": "#00c0ef"});	  
	  }
	 else if(tde==2){
		 $('#taxbill').show(); 
		 $('#taxbill').css({"background-color": "#00c0ef", "border": "#00c0ef"});
		 $('#demobill').show(); 
		 $('#demobill').css({"background-color": "green", "border": "green"});
	   
		 $('#estimatebill').show(); 
		 $('#estimatebill').css({"background-color": "#00c0ef", "border": "#00c0ef"});
	 }
	 else if(tde==3){
		 $('#taxbill').show(); 
		 $('#taxbill').css({"background-color": "#00c0ef", "border": "#00c0ef"});
       $('#demobill').show();
		$('#demobill').css({"background-color": "#00c0ef", "border": "#00c0ef"});
       $('#estimatebill').show(); 
	   $('#estimatebill').css({"background-color": "green", "border": "green"});
	 }
  	$('#taxbill').show(); 
     $('#demobill').show(); 
      $('#estimatebill').show(); 
  });
   $("#openingstock").click(function(){
    $('#taxbill').hide(); 
     $('#demobill').hide(); 
      $('#estimatebill').hide();  
	  $('.type_e').hide();
	  $('.type_d').hide();
  });
   $('#item_code').keyup(function(){
   	var itcode=$(this).val();
   	if(itcode!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/searchitemcode');?>',
						data: { search : itcode},
							success:function(res){console.log(res);
							//alert(res);
								if(res){
									$('.itemcode_list').show();
									$('.itemcode_list').html(res);
								}else{
									$('.itemcode_list').html("");
								}
							},
					});	
				}
				else{
					$('.itemcode_list').html("");
				}	
 //alert(itcode);
   });
     $('#taxbill').click(function(){
		 
    $('#itm_tdata').val("1"); 
	$('#taxbill').hide(); 
     $('#demobill').hide(); 
      $('#estimatebill').hide(); 
     
  });
    $('#demobill').click(function(){
		 
    $('#itm_tdata').val("2"); 
     $('#taxbill').hide(); 
     $('#demobill').hide(); 
      $('#estimatebill').hide(); 
  });
    $('#estimatebill').click(function(){
		 
    $('#itm_tdata').val("3"); 
     $('#taxbill').hide(); 
     $('#demobill').hide(); 
      $('#estimatebill').hide(); 
  });
 
  $('#brandaddnew').on('click',function(){
		var brand = $('#brand').val();
		//alert(category);
		$.ajax({
				type: "POST",
				url: "Admin/brandnewitem",
				data:{brand:brand},
				success: function(result){
					var obj=JSON.parse(result)
					$('#brand_id').val(obj.brand_id);
					$('#brand_name').val(obj.brand_name);
					$('#brand_modal').modal('hide');
			}
		});
   });

   function itembrandfunction(){
		var brand = document.getElementById("brand").value;
		//alert();
		var icat_count=brand.length;
		var letters = /^[A-Z\s]+$/;
		
		if(brand.match(letters) || icat_count==0){
			
			document.getElementById("brand").style.color = "black";
			document.getElementById("brand").style.border = "1px solid #d2d6de";
		}
		else{
			document.getElementById("brand").style.color = "red";
			document.getElementById("brand").style.border = "2px solid red";
		}
   }
   // category Searching
   $('#brand_name').keyup(function(){	
			//alert("success");
			// exit;
			var brand_name=$('#brand_name').val();
				if(brand_name!=""){
					$.ajax({
						type:"POST",
						url:'<?php echo site_url('Admin/search_brand');?>',
						data: { search : brand_name},
							success:function(res){//console.log(res);
							//alert(res);
								if(res){
									$('#brand_list').show();
									$('#brand_list').html(res);
								}else{
									$('#brand_list').html("");
								}
							},
					});	
				}
				else{
					$('#brand_list').html("");
				}	
				
				
	});
	$("html").on('click','.subSelect_brand',function(){
		var brand_name = $(this).closest('tr').find('.name_brand').val();
		
		var brand_id = $(this).closest('tr').find('.id_brand').val();
		
		
		
		
		$('#brand_name').val(brand_name);
		$('#brand_id').val(brand_id);
		
		
		$('#brand_list').hide();	
		
	});
	$("html").on('click','.brand_list_edit .subSelect_brand',function(){
		var brand_name = $(this).closest('tr').find('.name_brand').val();
		
		var brand_id = $(this).closest('tr').find('.id_brand').val();
		
		
		
		
		$('.itembrand_edit').val(brand_name);
		$('.brand_id_edit').val(brand_id);
		
		
		$('.brand_list_edit').hide();	
		
	});

	function addBatch(id){
		$('#current_item_id').val(id);
		$('#incentive').attr('data-itemid',id);

		
		$('#createBatchModal').modal('show');
	}
	function viewBatch(id){
		$.ajax({
					type:"POST",
					url:'<?php echo site_url('Admin/viewbatch');?>',
					data: { itemid : id},
					success:function(res){
						console.log(res);
						$('#viewBatch').html(res);
								
					},
		});	
		$('#viewBatchModal').modal('show');

	}
	//hsn tax calculation
	$('#taxinsert').keyup(function(){
		var tax=$(this).val();
		var cgst=tax/2;
		var sgst=tax/2;
		var igst=tax;
		$('#cgstinsert').val(cgst);
		$('#sgstinsert').val(sgst);
		$('#igstinsert').val(igst);

	});
	
</script>
<script>
$('#addbothfields').hide();
$('input[name="inc_peramount"]').click(function(){
var incentive_type=$(this).val();
if(incentive_type==1 || incentive_type==2)
{
	$('#addampercent').show();
	$('#addbothfields').hide();
}
else{
	$('#addampercent').hide();
	$('#addbothfields').show();
}

});

$('input[name="inc_peramount1"]').click(function(){
	
var incentive_type=$(this).val();
if(incentive_type==1 || incentive_type==2)
{
	$('#ampercent').show();
	$('#bothfields').hide();
}
else{
	$('#ampercent').hide();
	$('#bothfields').show();
}

});

$(document).ready(function(){
		$('form').attr('autocomplete', 'off');
});

function validateFormval() {
	if (confirm("Do you really want to create this Batch?")) {

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

