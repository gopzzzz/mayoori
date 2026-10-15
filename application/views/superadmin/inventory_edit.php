<!-- //==========Edited By Niby on 29-Sep-2020 Monday ========//-->
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
    #crud_table{
        margin-top:43px;
    }

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

</style>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">INVENTORY TRANSFER</h3>
            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>" />


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
            <?php echo form_open_multipart('inventory_transferedit');?>
            <div class="col-sm-12">
                <div class="col-sm-3 labeltext divtext"><label>From</label>
                </div>
                <input type="hidden" id="inventory_id" name="inventory_id"
                            value="<?php echo $inventory->inventory_id;?>" />
                <div class="col-sm-3 divtext">
                    <select name="from" id="from" class="form-control" required onChange="update_itemlist(this.value)" readonly>
                        <option value="0">select</option>
                        <?php 
                        $godownlist=[];
                        foreach($gfirmlist as $key){ $godownlist[]=$key;?>
                        <option value="<?php echo $key->godownid;?>" <?php if($inventory->inventory_from == $key->godownid) echo "selected" ;?>><?php echo $key->name;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3 labeltext divtext">
                    <label>Transfer Number</label>
                </div>
                <div class="col-sm-3 divtext">
                    <input class="form-control" name="transnum"
                        value="<?php echo $inventory->inventory_transfer_num ;?>"
                        readonly>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-3 labeltext divtext">
                    <label>To</label>
                </div>


                <div class="col-sm-3 divtext">
                    <select name="to" class="form-control" required readonly>
                        <option value="0">select</option>
                        <?php foreach($gfirmlist as $key){?>
                        <option value="<?php echo $key->godownid;?>"  <?php if($inventory->inventory_to == $key->godownid) echo "selected" ;?>><?php echo $key->name;?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="to_old" value="<?=$inventory->inventory_to?>">
                </div>
                <div class="col-sm-3 labeltext divtext">
                    <label>Date</label>
                </div>
                <div class="col-sm-3 divtext">
                    <input class="form-control" type="date" name="date" placeholder="Date" value="<?php echo $inventory->inventory_date ;?>" required>
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table table-bordered" id="crud_table">
                    <tr data-row="1">
                        <th>sl.no</th>
                        <th>Item name</th>
                        <th>Item Code</th>
                        <th>Batch</th>
                        <th>Stock</th>
                        <th>Qty</th>
                        <th>Unit Cost</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    <tbody id="searchitemitem">
                        <?php 
                        $count=1;
                        foreach($inventory_items as $item){?>
                            <tr id='row<?=$count?>' data-row='<?=$count?>'>
                                <td class="solno"><input class="form-control" value="<?=$count?>"></td>

                                <td class="itemname"> <input type="text" class="form-control itemsearchmodal" data-row="<?=$count?>"
                                        name="itname[]" id="itemname_<?=$count?>" value="<?=$item['itm_name']?>">
                                    <input type="hidden" class="form-control " name="itemid[]" id="itemid_<?=$count?>" value="<?=$item['inventory_trans_item_id']?>">
                                   
                                </td>

                                <td class="itemcode"><input type="text" class="form-control" name="icode[]" id="itemcode_<?=$count?>" value="<?=$item['itm_code']?>">
                                </td>
                                <td class="batch">
                                <?php
                                $batchList = $this->Admin_model->get_batchoption($item['inventory_trans_item_id']); 
                                ?>
                                    <select name="itembatchid[]" class="form-control itemBatch" id="itembatchid_<?=$count?>" placeholder="Batch" data-row="<?=$count?>" >
                                        <option value="">Select Batch</option>
                                        <?php
                                        $selected="";
                                        foreach($batchList as $batch){
                                            $selected = $batch->batch_id == $item['inventory_trans_item_batch_id'] ? "selected":'';
                                            echo "<option value='".$batch->batch_id."' ".$selected.">".$batch->batchcode."</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td> <input type="text" class="form-control"  id="qtyinventory_1" value="<?=$item['inventory_stock_itemcount']?>"></td>
                                <td class="qty"><input type="text" class="form-control quantity" data-qty="<?=$count?>" name="qty[]"
                                        id="qty_<?=$count?>" value="<?=$item['inventory_trans_qty']?>">
                                        <input type="hidden" class="quantityold" data-qty="<?=$count?>" name="qtyold[]" id="qtyold_<?=$count?>" value="<?=$item['inventory_trans_qty']?>">
                                </td>

                                <td class="unitcost"><input type="text" class="form-control" name="cost[]" id="unitcost_<?=$count?>" value="<?=$item['t_pr']?>">
                                </td>
                                <td class="total"><input type="text" class="form-control expenses" name="total[]"
                                        id="total_<?=$count?>" value="<?=$item['inventory_trans_totalamount']?>"></td>
                                <?php 
                                    if($count!=1) 
                                        echo "<td><button type='button' name='remove' class='btn btn-sm btn-danger remove' data-row='row" . $count . "'>-</button></td>";
                                    else echo "<td></td>";
                                ?>
                            </tr>
                        <?php 
                            $count++;
                        }?>
                    </tbody>
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input id="totalunitcost" name="tunit" value="<?php echo $inventory->total_unitprice ;?>" class="form-control" readonly></td>
                        <td><input id="totalqtyprice" name="tqamount" value="<?php echo $inventory->total_qtyamount ;?>" class="form-control" readonly></td>
                        <td></td>

                    </tr>
                </table>
                <div align="right">
                    <button type="button" name="add" id="add" class="btn btn-sm btn-success">+</button>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-6"></div>
                
                <div class="col-sm-2">
                    <input type="hidden" name="savetype" id="savetype" />
                    <button type="submit" name="submit" class="btn btn-primary btn-lg " id="saveprint">Save &
                        Print</button>
                </div>
                
            </div>
            </form>
        </div>

        <!-- /.box-body -->

        <div class="modal fade" id="searchModel" role="dialog">
            <div class="modal-dialog" style="width:80%">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" id="closesearchModel">&times;</button>
                        <div class="col-sm-12 text-center">
                            <input type="radio" id="searchtype" value="1" name="searchtype">Item Code
                            <input type="radio" id="searchtype" value="2" name="searchtype">Item Name
                            <input type="radio" id="searchtype" value="3" name="searchtype">Batch

                        </div>
                        <h4 class="modal-title">Search</h4>
                    </div>

                    <div class="col-sm-12 text-center" style="padding-bottom:15px">
                        <label></label>
                        <input type="text" id="searchinput" data-row="" style="max-width: 200px;">
                    </div>
                    <div class="co-sm-12">
                        <table style="width:98%;margin: 10px;">
                            <thead>
                                <tr>
                                    <th>ItemCode</th>
                                    <th>Name</th>
                                    <!-- <th>Batch</th>
                                    <th>Stock</th>
                                    <th>MRP</th>
                                    <th>Srate</th>
                                    <th>Tax %</th> -->
                                </tr>
                            </thead>
                            <tbody id="searchbox">
                                <?php $itemlist=$this->Admin_model->get_item_with_stock_available($godownlist[0]->godownid);
							    foreach($itemlist as $keyitem){?>
                                <tr data-id="<?=$keyitem->itm_id?>" data-row="1">
                                    <td><?php echo $keyitem->itm_code;?></td>
                                    <td><?php echo $keyitem->itm_name;?></td>
                                    <!-- <td><?php echo $keyitem->item_batchcode;?></td>
                                    <td><?php echo $keyitem->itm_ostock;?></td>
                                    <td><?php echo $keyitem->itm_mrp;?></td>
                                    <td><?php echo $keyitem->itm_srate;?></td>
                                    <td><?php echo $keyitem->hsn_tax;?></td> -->
                                </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</div>

<script>
    //Add Item
    var count = 1;
	$('#add').click(function(){

        count = parseInt($("#searchitemitem tr").last().attr("data-row")) + 1;

		var html_code = "<tr id='row"+count+"' data-row='"+count+"'>";
		html_code += "<td  class='solno'><input  class='form-control' value="+count+" ></td>";
		html_code += "<td  class='itemname'><input type='text' class='form-control itemsearchmodal'  data-row='"+count+"' name='iname[]' id='itemname_"+count+"' ><input type='hidden' class='form-control'  name='itemid[]' id='itemid_"+count+"' > </td>";
		html_code += "<td  class='itemcode'><input type='text' class='form-control' name='icode[]' id='itemcode_"+count+"'></td>";
		html_code += "<td  class='batchcode'><select name='itembatchid[]' class='form-control itemBatch' id='batchid_"+count+"' data-row='" + count + "'></select> </td>";
		html_code +=" <td><input type='text' class='form-control'  id='qtyinventory_"+count+"'></td>";	
		html_code += "<td  class='qty'><input type='text' class='form-control quantity'  data-qty='"+count+"' name='qty[]' id='qty_"+count+"'><input type='hidden' class='quantityold' data-qty='0' name='qtyold[]' id='qtyold_"+count+"' value='0'></td>";
						
						
		html_code += "<td  class='unitcost'><input type='text' class='form-control' name='cost[]' id='unitcost_"+count+"' ></td>";
        html_code += "<td  class='total'><input type='text' class='form-control expenses' name='total[]' id='total_"+count+"' ></td>";
		html_code += "<td><button type='button' name='remove' class='btn btn-sm btn-danger remove' data-row='row"+count+"'>-</button></td>"; 
		html_code += "</tr>";
		$('#searchitemitem').append(html_code);		

	});

    //Remove Item
    $(document).on('click','.remove',function(){
	
        var delete_row = $(this).data("row");
        var rowcount = $('#'+delete_row).data("row");
        
        var unitprice=$('#totalunitcost').val();
        var removecost=$('#unitcost_'+rowcount).val();
        var totalunit=parseFloat(unitprice) - (parseFloat(removecost)|| 0);
        $('#totalunitcost').val(Number((totalunit).toFixed(2)));

        var grandprice=$('#totalqtyprice').val();
        var removeprice=$('#total_'+rowcount).val();
        //console.log(delete_row);console.log(grandprice);console.log(removeprice);
        var totalprice=parseFloat(grandprice) - (parseFloat(removeprice)|| 0);
        $('#totalqtyprice').val(Number((totalprice).toFixed(2)));

        count = count -1;
        
        $('#'+delete_row).remove();
  
    });

    //Quantity Update
    $('#searchitemitem').on('keyup','.quantity', function () {
        
        $('#totalqtyprice').val(0);
        var id=$(this).data('qty');
        var qty=$('#qty_'+id).val();
        var unitcost =$('#unitcost_'+id).val();
        var sum = qty * unitcost;
        var inqty=$('#qtyinventory_'+id).val();
    

    if(parseInt(inqty) < parseInt(qty)){
        $('#qty_'+id).css({"border":"1px solid red"});
        }else if(parseInt(inqty)>parseInt(qty)){
            $('#qty_'+id).css({"border":"1px solid #d2d6de"});
        }
        $('#total_'+id).val(Number((sum).toFixed(2)));

        var sum1 = 0;       
        $(".expenses").each(function() {          
        sum1 += (parseFloat(this.value)|| 0); 
        });
        console.log(Number((sum1).toFixed(2)));
        $('#totalqtyprice').val(Number((sum1).toFixed(2)));
    
  });

  //Show item search modal
  $('#searchitemitem').on('click','.itemsearchmodal', function () {
    
    $('#searchModel').modal('show');
    $('#searchinput').attr('data-row',$(this).data('row'));

  });

  $('#searchinput').on('keyup',function(){
			var type1=$('#searchtype:checked').val();
			var godownid=$('#from').val();

		    var val=$(this).val();
		    var rowno=$('#searchinput').data('row');console.log('row--'+rowno);
		    	$.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/searchitemmodal');?>',
				data: { itemValue: val,row:rowno ,type1:type1, godownid:godownid},
				success: function (res) {
				    $('#searchbox').html(res);
				}
		    });
	});
    
    $('#searchbox').on('click', 'tr td', function() {



        var itemValue = $(this).parent().data('id');

        var id = $('#searchinput').attr('data-row');
        var itemBatchid = $(this).parent().data('batch');
        var godown=$('#from').val();


        $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo site_url('Admin/getItemBatchDetailseachisinentory');?>',
                
                data: { itemValue: itemValue,godown:godown },
                success: function (res) {
                    console.log(res);
                    $('#itemname_' + id).val(res[0].itm_name);
                    $('#itemcode_' + id).val(res[0].itm_code);
                    $('#itemid_' + id).val(res[0].item_id);
                    $('#batchid_'+id).empty();
                
                    $('#batchid_'+id).append('<option value="0">select</option>');
                    $.each(res,function(index,data){
                    $('#batchid_'+id).append('<option value="'+data['batch_id']+'">'+data['batchcode']+'</option>');
                    });
                    $('#searchModel button.close').click();
                },
            });



        });

        $('#searchitemitem').on('change','.itemBatch',function(){  

            var id = $(this).data('row');
            var itemValue = $(this).val();
            var location=$('#from').val();
            $.ajax({
				type: "POST",
				url: '<?php echo site_url('Admin/getbatchcount1');?>',
				data: { itemValue: itemValue,location:location },
				success: function (res) {
					console.log(res);

					var obj=JSON.parse(res);
					$('#qtyinventory_'+id).val(obj.inventory_stock_itemcount);
				},
			});


            $.ajax({

                type: "POST",

                url: '<?php echo site_url('Admin/getItemBatchDetails');?>',

                data: {

                    itemValue: itemValue

                },

                success: function(res) {

                    var obj = JSON.parse(res);

                    

                    $('#unitcost_' + id).val(obj.t_pr);

                    $('#batchcode_' + id).val(obj.batchcode);

                    $('#batchid_' + id).val(obj.batch_id);


                    console.log(res);

                    var unitprice = $('#totalunitcost').val();

                    var grandtotal = $('#totalqtyprice').val();

                    var unitprice1 = obj.t_pr;

                    var totalunit = parseFloat(unitprice) + parseFloat(unitprice1);

                    var gtotal = parseFloat(grandtotal) + parseFloat(unitprice1);

                    //$('#totalunitcost').val(Number((totalunit).toFixed(2)));



                    var totalunit=0    

                        $(".unitcost input[type=text]").each(function() {

                            console.log($(this).val());

                            totalunit += (parseFloat($(this).val())|| 0); 

                        });  



                        var gtotal=0    

                        $(".total input[type=text]").each(function() {

                            console.log($(this).val());

                            gtotal += (parseFloat($(this).val())|| 0); 

                        });  

                        $('#totalunitcost').val(totalunit);

                        $('#totalqtyprice').val(gtotal);

                        $('#qty_'+id).keyup();

                }

            });

        });

    // $('#searchbox').on('click','tr td',function(){
     
    //     var itemValue = $(this).parent().data('id');
	// 	var id = $('#searchinput').attr('data-row');
    
    //     $.ajax({
	// 			type: "POST",
	// 			url: '<?php echo site_url('Admin/getItemByCode');?>',
	// 			data: { itemValue: itemValue },
	// 			success: function (res) {
    //                 var obj = JSON.parse(res);
    //                 $('#searchModel').modal('hide');
    //                 $('#itemname_'+ id).val(obj.itm_name);
	// 				$('#itemcode_'+ id).val(obj.itm_code);
	// 				$('#unitcost_'+ id).val(obj.itm_prate);
				
    //                 $('#itemid_'+id).val(obj.itm_id);
    //                 $('#qty_'+id).val('');
    //                 $('#total_'+id).val(0);
    //                 //console.log(res);
                   

                   
    //                 var totalunit=0    
    //                 $(".unitcost input[type=text]").each(function() {
    //                     console.log($(this).val());
    //                     totalunit += parseFloat($(this).val()); 
    //                 });  

    //                 var gtotal=0    
    //                 $(".total input[type=text]").each(function() {
    //                     console.log($(this).val());
    //                     gtotal += parseFloat($(this).val()); 
    //                 });  
    //                 $('#totalunitcost').val(totalunit);
    //                 $('#totalqtyprice').val(gtotal);
         
    //             }
    //         });
    // });
    $('#saveprint').on('click', function () {
			if ($('#savetype').val() == '' || $('#savetype').val() == 2) {
				event.preventDefault();
				$('#savetype').val(1);
				$('#saveprint').click();
			}
		});

    //7-Oct-2020
    function update_itemlist(godownid){
        console.log(godownid);

        
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('Admin/searchitemmodal');?>',
            data: {
                
                godownid: godownid
            },
            success: function(res) {
                $('#searchbox').html(res);
            }
        });

    }
    
    $('#closesearchModel').on('click', function () {
        $('#searchModel').modal('hide');
	});
</script>
<!-- //==========Edited By Niby on 29-Sep-2020 Monday End========//-->