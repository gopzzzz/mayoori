<?php $data['leftmenu']='bankaccountcreate'; $data['mainmenu'] = 'transaction'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper inventory-transfer-page">







    <!-- Content Header (Page header) -->



    <section class="content-header">



        <h1 align="center">INVENTORY TRANSFER<small>Preview</small></h1>







        <ol class="breadcrumb">



            <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



            <li><a href="<?php echo base_url('inventory_transfer');?>">INVENTORY TRANSFER</a></li>



        </ol>



    </section><br>



    <style>

    table,

    td,

    th {

        border: 1px solid #cac6c6;

    }



    #example2 {

        border-collapse: separate;



    }



    .box-body {

        margin: 22px;

    }



    .divtext {

        margin-top: 21px;

    }



    #crud_table {

        margin-top: 43px;

    }



    input[type=radio] {

        width: 17px;

        height: 17px;

    }



    .exampleInputEmail1 {

        font-size: 10px;

    }



    #searchbox tr {

        height: 25px;

        border: 1px solid;

        background: #d0d0ff;

    }



    #searchModel label,

    #searchModel th,

    #searchModel .form-control,

    #searchModel td {

        font-size: 12px;

        text-align: center;

    }



    button.close {

        font-size: 39px;

    }



    .custsearchmodal {

        margin-left: 157px;

        margin-top: -25px;

    }


    /* Modern blue-and-white Inventory Transfer styling */
    .inventory-transfer-page { color:#26364a; }
    .inventory-transfer-page .content-header h1 { color:#173b68; font-size:25px; font-weight:700; letter-spacing:.3px; }
    .inventory-transfer-page .content-header h1 small { color:#73839a; font-size:14px; }
    .inventory-transfer-page .box { border-top:3px solid #2878c8; border-radius:8px; box-shadow:0 4px 18px rgba(30,65,100,.09); overflow:hidden; }
    .inventory-transfer-page .box-header { padding:18px 20px; background:#f5f9fe; border-bottom:1px solid #e3ebf5; }
    .inventory-transfer-page .box-title { color:#173b68; font-size:17px; font-weight:700; }
    .inventory-transfer-page .box-body { margin:0; padding:20px; }
    .inventory-transfer-page .divtext { margin-top:12px; margin-bottom:8px; }
    .inventory-transfer-page label { color:#344b66; font-weight:600; }
    .inventory-transfer-page .form-control { min-height:36px; border:1px solid #ccd8e6; border-radius:5px; box-shadow:none; color:#27384c; }
    .inventory-transfer-page .form-control:focus { border-color:#3985d6; box-shadow:0 0 0 2px rgba(57,133,214,.12); }
    .inventory-transfer-page #crud_table { margin-top:24px; border-collapse:separate; border-spacing:0; border-radius:7px; overflow:hidden; }
    .inventory-transfer-page #crud_table th { padding:11px 9px; background:#eaf3fc; color:#1e4774; border:1px solid #d4e1ef; font-size:12px; white-space:nowrap; }
    .inventory-transfer-page #crud_table td { padding:8px; vertical-align:middle; border:1px solid #e2e9f1; background:#fff; }
    .inventory-transfer-page #crud_table tbody tr:nth-child(even) td { background:#f8fbff; }
    .inventory-transfer-page #crud_table tbody tr:hover td { background:#eef6ff; }
    .inventory-transfer-page .btn { border-radius:5px; font-weight:600; transition:background .15s ease; }
    .inventory-transfer-page .btn-primary { background:#246fba; border-color:#246fba; }
    .inventory-transfer-page .btn-primary:hover { background:#195b9d; border-color:#195b9d; }
    .inventory-transfer-page .btn-success { background:#16836b; border-color:#16836b; }
    .inventory-transfer-page .btn-warning { background:#e7a12a; border-color:#e7a12a; color:#fff; }
    .inventory-transfer-page #searchModel .modal-content { border:0; border-radius:9px; overflow:hidden; box-shadow:0 12px 35px rgba(20,45,75,.2); }
    .inventory-transfer-page #searchModel .modal-header { background:#f3f8fe; border-bottom:1px solid #e1eaf5; }
    .inventory-transfer-page #searchModel .modal-title { color:#173b68; font-weight:700; }
    .inventory-transfer-page #searchbox tr { height:auto; background:#fff; cursor:pointer; }
    .inventory-transfer-page #searchbox tr:nth-child(even) { background:#f6faff; }
    .inventory-transfer-page #searchbox tr:hover { background:#eaf3fc; }
    .inventory-transfer-page #searchModel table { border-collapse:collapse; }
    .inventory-transfer-page #searchModel th { padding:10px; background:#eaf3fc; color:#1e4774; }
    .inventory-transfer-page #searchModel td { padding:9px; border:1px solid #e2e9f1; }
    .inventory-transfer-page .content .row > [class*="col-"] { min-width:0; }
    @media (max-width:767px) {
      .inventory-transfer-page .box-body { padding:12px; }
      .inventory-transfer-page .content-header h1 { font-size:21px; }
      .inventory-transfer-page #crud_table { min-width:980px; }
      .inventory-transfer-page .modal-dialog { width:96% !important; margin:10px auto; }
    }
    </style>



    <!-- Main content -->



    <section class="content">



        <div class="row">

            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header">

                        <h3 class="box-title">INVENTORY TRANSFER</h3>

                        <input type="hidden" id="response_noti"

                            value="<?php echo $this->session->flashdata('response');?>" />





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

                        
                        <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('inventory_transferinsert');?>">

                        <div class="col-sm-12">

                            <div class="col-sm-3 labeltext divtext"><label>From</label>

                            </div>



                            <div class="col-sm-3 divtext">

                                <select name="from" id="from" class="form-control" required onChange="update_itemlist(this.value)">

                                    

                                    <?php $godownlist=[];

                                    foreach($gfirmlist as $key){ $godownlist[]=$key;?>

                                    <option value="<?php echo $key->godownid;?>"><?php echo $key->name;?></option>

                                    <?php } ?>

                                </select>

                            </div>

                            <div class="col-sm-3 labeltext divtext">

                                <label>Transfer Number</label>

                            </div>

                            <div class="col-sm-3 divtext">

                                <input class="form-control" name="transnum"

                                    value="<?php if($last_id==null){echo "1";}else{ foreach($last_id as $key3){ echo $key3->inventory_transfer_num + 1;}}?>"

                                    readonly>

                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="col-sm-3 labeltext divtext">

                                <label>To</label>

                            </div>





                            <div class="col-sm-3 divtext">

                                <select name="to" id="to" class="form-control" required>

                                    

                                    <?php foreach($gfirmlist as $key){?>

                                    <option value="<?php echo $key->godownid;?>"><?php echo $key->name;?></option>

                                    <?php } ?>

                                </select>

                            </div>

                            <div class="col-sm-3 labeltext divtext">

                                <label>Date</label>

                            </div>

                            <div class="col-sm-3 divtext">

                                <input class="form-control" name="date" value="<?php echo date('y-m-d')?>" readonly required>

                            </div>

                        </div>

                        <div class="col-sm-12">

                            <table class="table table-bordered" id="crud_table">

                                <tr data-row="1">

                                    <th>sl.no</th>

                                    <th>Item name</th>

                                    <th>Item Code</th>

                                    <th>Batch Code</th>

                                    <th>Stock</th>

                                    <th>Qty</th>

                                    <th>Unit Cost</th>

                                    <th>Total</th>

                                    <th></th>

                                </tr>

                                <tbody id="searchitemitem">

                                    <tr data-row="1">

                                        <td class="solno"><input class="form-control" value="1"></td>



                                        <td class="itemname"> <input type="text" class="form-control itemsearchmodal clear"

                                                data-row="1" name="itname[]" id="itemname_1">

                                                <input type="hidden" class="form-control clear " name="itemid[]" id="itemid_1">


                                           
                                            <div id="name_list_1"></div>

                                        </td>



                                        <td class="itemcode"><input type="text" class="form-control clear codeItem" data-row="1" name="icode[]"

                                                id="itemcode_1">

                                                <div id="code_list_1" style="position: absolute;z-index: 99;"></div>
                                            
                                            </td>


                                        <td class="batchcode">
                                            <select name="batchid[]" class="form-control itemBatch clear" id="batchid_1" data-row="1">
                                            
                                            </select>
                                        </td>

                                        <td> <input type="text" class="form-control clear"  id="qtyinventory_1" readonly></td>

                                        <td class="qty"><input type="text" class="form-control quantity clear" data-qty="1"

                                                name="qty[]" id="qty_1"> </td>



                                        <td class="unitcost"><input type="text" class="form-control clear" name="cost[]"

                                                id="unitcost_1"></td>

                                        <td class="total"><input type="text" class="form-control expenses"

                                                name="total[]" id="total_1"></td>

                                        <td></td>

                                    </tr>

                                </tbody>

                                <tr>

                                    <td>Total</td>

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <td><input id="totalunitcost" name="tunit" value="0" class="form-control clear" readonly>

                                    </td>

                                    <td><input id="totalqtyprice" name="tqamount" value="0" class="form-control clear"

                                            readonly></td>

                                    <td></td>



                                </tr>

                            </table>

                            <div align="right">

                                <button type="button" name="add" id="add" class="btn btn-sm btn-success">+</button>

                            </div>

                        </div>



                        <div class="col-sm-12">

                            <div class="col-sm-6"></div>

                            <div class="col-sm-1"><a href="<?php echo base_url('inventorylist');?>"><button

                                        type="button" class="btn btn-success btn-lg">View</button></a></div>

                            <div class="col-sm-2">

                                <input type="hidden" name="savetype" id="savetype" value="1"/>

                                <button type="submit" name="submit" class="btn btn-primary btn-lg " id="saveprint">Save

                                    & Print</button>

                            </div>

                            <div class="col-sm-1"><button type="button"

                                    class="btn btn-warning btn-lg reset">Clear</button></div>

                                    

                            <!--<div class="col-sm-1"><button type="button" class="btn btn-danger btn-lg">Delete</button></div>-->

                        </div>

                        </form>

                    </div>



                    <!-- /.box-body -->



                    <div class="modal fade" id="searchModel" role="dialog">

                        <div class="modal-dialog" style="width:100%;">

                            <!-- Modal content-->

                            <div class="modal-content">

                                <div class="modal-header">



                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

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

                                            <tr data-id="<?=$keyitem->itm_id?>" data-row="1"  data-batch="<?php echo $keyitem->itm_id;?>">

                                                <td><?php echo $keyitem->itm_code;?></td>

                                                <td><?php echo $keyitem->itm_name;?></td>

                                                <!-- <td><?php echo $keyitem->batchcode;?></td>

                                                <td><?php echo $keyitem->opening_stock;?></td>

                                                <td><?php echo $keyitem->t_mrp;?></td>

                                                <td><?php echo $keyitem->t_sr;?></td>

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

        </div>





    </section>





    <script>

    function deletechecked() {



        if (confirm("Do you really want to delete this apartment?")) {

            return true;

        } else {



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

    $(function() {

        $('#example2').DataTable({

            dom: 'Bfrtip',

            buttons: [

                'excelHtml5',

                'csvHtml5'

            ]

        })

    })



    var count = 1;

    $('#add').click(function() {





        count = count + 1;

        var html_code = "<tr id='row" + count + "' data-row='" + count + "'>";

        html_code += "<td  class='solno'><input  class='form-control clear' value=" + count + " ></td>";

        html_code +=

            "<td  class='itemname'><input type='text' class='form-control clear itemsearchmodal'  data-row='" +

            count + "' name='iname[]' id='itemname_" + count +

            "' ><input type='hidden' class='form-control clear'  name='itemid[]' id='itemid_" + count + "' > <div id='name_list_"+ count + "'></div> </td>";

        html_code +=

            "<td  class='itemcode'><input type='text' class='form-control codeItem clear' name='icode[]' id='itemcode_" +

            count + "' data-row='"+count+"'>  <div id='code_list_"+count+"' style='position: absolute;z-index: 99;'></div></td>";
        
        html_code +=

            "<td  class='batchcode'><select name='batchid[]' class='form-control clear itemBatch' id='batchid_"+count+"' data-row='" + count + "'></select> </td>";
            html_code +="<td><input type='text' class='form-control'   id='qtyinventory_" + count + "' readonly></td>";

            
        html_code += "<td  class='qty'><input type='text' class='form-control quantity clear'  data-qty='" + count +

            "' name='qty[]' id='qty_" + count + "'></td>";





        html_code +=

            "<td  class='unitcost'><input type='text' class='form-control clear' name='cost[]' id='unitcost_" +

            count + "' ></td>";

        html_code +=

            "<td  class='total'><input type='text' class='form-control clear expenses' name='total[]' id='total_" +

            count + "' ></td>";

        html_code +=

            "<td><button type='button' name='remove' class='btn btn-sm btn-danger remove' data-row='row" +

            count + "'>-</button></td>";

        html_code += "</tr>";

        $('#searchitemitem').append(html_code);



    });

    //==========Edited By Niby on 30-Sep-2020 Wednesday ========//



    $(document).on('click', '.remove', function() {



        var delete_row = $(this).data("row");

        var rowcount = $('#'+delete_row).data("row");

        

        var unitprice=$('#totalunitcost').val();

        var removecost=$('#unitcost_'+rowcount).val();

        var totalunit=parseFloat(unitprice) - (parseFloat(removecost)|| 0);

        $('#totalunitcost').val(Number((totalunit).toFixed(2)));



        var grandprice=$('#totalqtyprice').val();

        var removeprice=$('#total_'+rowcount).val();

        console.log(delete_row);console.log(grandprice);console.log(removeprice);

        var totalprice=parseFloat(grandprice) - (parseFloat(removeprice)|| 0);

        $('#totalqtyprice').val(Number((totalprice).toFixed(2)));



        count = count -1;

        

        $('#'+delete_row).remove();



    });



    // $('#searchitemitem').on('click', '.itemsearchmodal', function() {



    //     $('#searchModel').modal('show');

    //     $('#searchinput').attr('data-row', $(this).data('row'));



    // });


    $('#searchitemitem').on('keyup', '.itemsearchmodal', function () {
			var rowOrder = $(this).data('row');
          
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

  $('#searchitemitem').on('click','.subSelect_itemedit',function(){
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
							console.log(res);
							var i;
							var optiondata= '<option value="">Select</option>';
							for(i=0;i<batchlist.length;i++){
								
								optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'</option>';

							}
							
							$('#batchid_'+id).html(optiondata);
							$('#itemcode_'+id).val(batchlist[0].itm_code);
							$('#itemname_'+id).val(batchlist[0].itm_name);
							$('#itemid_'+id).val(batchlist[0].itm_id);
							$('#itembatchid_'+id).show();
							
						}
			})
		});

    $('#searchinput').on('keyup', function() {

        var type1 = $('#searchtype:checked').val();



        var godownid=$('#from').val();

        var val = $(this).val();

        var rowno = $('#searchinput').data('row');

        console.log('row--' + rowno);

        $.ajax({

            type: "POST",

            url: '<?php echo site_url('Admin/searchitemmodal');?>',

            data: {

                itemValue: val,

                row: rowno,

                type1: type1,

                godownid:godownid

            },

            success: function(res) {

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
					//console.log(res);
                    if(res==0){
                        $('#qtyinventory_'+id).val(0);
                    }else{
                        var obj=JSON.parse(res);
					$('#qtyinventory_'+id).val(obj.inventory_stock_itemcount);
                    }
					
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

                if(obj.t_pr=='0.00'){
                    $('#unitcost_' + id).val(obj.e_pr);
                }else{
                    $('#unitcost_' + id).val(obj.t_pr);
                }

                

                

                $('#qty_' + id).val(1);

                $('#batchcode_' + id).val(obj.batchcode);

                $('#batchid_' + id).val(obj.batch_id);


                //console.log(res);

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


 


    $('#searchitemitem').on('keyup', '.quantity', function() {



        $('#totalqtyprice').val(0);

        var id=$(this).data('qty');

        

        var qty=$('#qty_'+id).val();

        var unitcost =$('#unitcost_'+id).val();

        var sum = qty * unitcost;

        var inqty=$('#qtyinventory_'+id).val();
       

        if(parseInt(qty) > parseInt(inqty)){
            $('#qty_'+id).css({"border":"1px solid red"});
			}else if(parseInt(qty) !== null && parseInt(inqty) == ''){
				$('#qty_'+id).css({"border":"1px solid #d2d6de"});
			}else{
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

    //6-Oct-2020

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

//==========Edited By Niby on 30-Sep-2020 Wednesday End========//



    $(".reset").bind("click", function() {

        $("input[type=text], textarea").val("");

    });

    $('#saveprint').on('click', function() {

        if ($('#savetype').val() == '' || $('#savetype').val() == 2) {

            event.preventDefault();

            $('#savetype').val(1);

            $('#saveprint').click();

        }

    });

    $('#searchitemitem').on('keyup', '.codeItem', function () {
			var rowOrder = $(this).data('row');
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

             

              $('#from').on('change',function(){
               $('.clear').val("");
              });

              $('#to').on('change',function(){
               $('.clear').val("");
              });
    </script>

<script>


function validateForm() {
    var fromid=$('#from').val();
    var toid=$('#to').val();
  

    var rowCount = $("#searchitemitem > tr").length;
	var isStockNotAvailable = false;

  

        if(fromid==toid){
        alert("You are selected same location");
        isStockNotAvailable = true;
		event.preventDefault();
		return false; 
       }
    
		 
    $("#searchitemitem tr").map(function(){
		if(!isStockNotAvailable){
	 if($(this).attr('data-row')!=undefined){
	 var i = $(this).attr('data-row'); 


	 var stock=document.getElementById('qtyinventory_'+i+'').value;
	 var qty=document.getElementById('qty_'+i+'').value;


	 
	 if(parseInt(qty)>parseInt(stock)){
		alert("Stock is not available");
		$('#qty_'+i).css({"border":"2px solid red"});
		
		$("#saveprint").html("SAVE & PRINT");
		$("#saveprint").removeAttr("disabled");
		
		isStockNotAvailable = true;
		event.preventDefault();
		return false;
		
	 }else if(parseInt(qty) !== null && parseInt(qty) == ''){
		$('#qty_'+i).css({"border":"2px solid red"});
		
		$("#saveprint").html("SAVE & PRINT");
		$("#saveprint").removeAttr("disabled");
		
		isStockNotAvailable = true;
		event.preventDefault();
		return false;
	 }else{
	
	
		// $("#saveprint").html("Please Wait...");
		// $("#saveprint").attr('disabled', 'disabled');
		
	 }




					  }
		}
		else{
			return false;
		}
                 });

}
</script>



    </body>



    </html>