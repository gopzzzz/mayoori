<?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">







    <!-- Content Header (Page header) -->



    <section class="content-header">



        <h1 align="center">PHYSICAL STOCK ADJUSTMENT<small>Preview</small></h1>







        <ol class="breadcrumb">



            <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>



            <li><a href="<?php echo base_url('physicalstock');?>">PHYSICAL STOCK ADJUSTMENT</a></li>



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

    </style>



    <!-- Main content -->



    <section class="content">



        <div class="row">

            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header">

                        <h3 class="box-title">PHYSICAL STOCK ADJUSTMENT</h3>

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

                        <?php echo form_open_multipart('physicalstockinsert');?>

                        <div class="col-sm-12">

                            <div class="col-sm-1 labeltext divtext">

                                <label>Date</label>

                            </div>

                            <div class="col-sm-3 divtext">

                                <input class="form-control" type="text" name="date" value="<?php echo date('Y-m-d');?>"

                                    readonly required>

                            </div>

                            <div class="col-sm-3 labeltext divtext">

                                <label>Referal Number</label>

                            </div>

                            <div class="col-sm-3 divtext">

                                <input class="form-control" name="refno" placeholder="Referal Number"

                                    value="<?php if($last_id==null){echo "1";}else{ foreach($last_id as $key3){ echo $key3->referalnumber + 1;}}?>"

                                    readonly>



                            </div>

                            <br>

                            <table class="table table-bordered" id="crud_table">

                                <tr>

                                    <th>sl.no</th>

                                    <th>Item name</th>

                                    <th>Item Code</th>

                                    <th>Batch Code</th>

                                    <th>Unit </th>

                                    <th>Qty</th>

                                    <th>Location</th>

                                    <th></th>

                                </tr>

                                <tbody id="searchitemitem">

                                    <tr>



                                        <td class="solno"><input type="text" class="form-control" value="1"></td>



                                        <td class="itemname"> <input type="text" class="form-control itemsearchmodal"

                                                data-row="1" name="iname[]" id="itemname_1">

                                            <input type="hidden" class="form-control " name="itemid[]" id="itemid_1">

                                        </td>



                                        <td class="itemcode"><input type="text" class="form-control codeItem" name="icode[]"

                                                id="itemcode_1" data-order="1">
                                                <div id="code_list_1" style="position: absolute;z-index: 99;"></div> </td>

                                        <td class="batchcode">
                                            <select name="batchid[]" class="form-control itemBatch" id="batchid_1" data-row="1" style="width:100px;">
                                            
                                            </select>
                                        </td>

                                        <td class="unitcost"><input type="text" class="form-control" name="cost[]"

                                                id="itemunit_1"></td>



                                        <td class="qty"><input type="number" class="form-control expenses" name="qty[]"

                                                required> </td>





                                        <td class="location"><select name="location[]"

                                                class="form-control location_list" required>

                                                

                                                <?php foreach($firmgodown as $key){?> <option

                                                    value="<?php echo $key->login_id;?>"><?php echo $key->name;?>

                                                </option><?php } ?>

                                            </select></td>

                                        <td></td>

                                    </tr>

                                </tbody>

                                <tr>

                                    <td>Total</td>

                                    <td></td>

                                    <td></td>

                                    <td></td>

                                    <td><input type="text" name="granstotalqty" class="form-control" id="grandtotalqty">

                                    </td>

                                    <td></td>







                                </tr>

                            </table>

                            <div align="right">

                                <button type="button" name="add" id="add" class="btn btn-sm btn-success">+</button>

                            </div>

                        </div>



                        <div class="col-sm-12">

                            <div class="col-sm-6"></div>

                            <div class="col-sm-1"><a href="<?php echo base_url('physicalstockadlist')?>"><button

                                        type="button" class="btn btn-success btn-lg">View</button></a></div>

                            <div class="col-sm-2">

                                <input type="hidden" name="savetype" id="savetype" />

                                <button type="submit" name="submit" class="btn btn-primary btn-lg" id="saveprint">Save &

                                    Print</button>

                            </div>

                            <div class="col-sm-1"><button type="button"

                                    class="btn btn-warning btn-lg reset">Clear</button></div>

                            <div class="col-sm-1"><button type="button" class="btn btn-danger btn-lg">Delete</button>

                            </div>

                        </div>



                    </div>

                    </form>

                    <!-- /.box-body -->

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



        var location = $('.location_list').html();

        count = count + 1;

        var html_code = "<tr id='row" + count + "'>";

        html_code += "<td  class='solno'><input type='text' class='form-control' value=" + count + " ></td>";

        html_code +=

            "<td  class='itemname'><input type='text' class='form-control itemsearchmodal' name='iname[]' data-row='" +

            count + "'  id='itemname_" + count +

            "' ><input type='hidden' class='form-control'  name='itemid[]' id='itemid_" + count + "' ></td>";

        html_code +=

            "<td  class='itemcode'><input type='text' class='form-control codeItem' name='icode[]' id='itemcode_" +

            count + "' data-order="+count+"><div id='code_list_"+count+"'></div></td>";

        html_code +=

            "<td  class='batchcode'><select name='batchid[]' class='form-control itemBatch' id='batchid_"+count+"' data-row='" + count + "' style='width:100px;'></select> </td>";



        html_code +=

            "<td  class='unitcost'><input type='text' class='form-control' name='cost[]' id='itemunit_" +

            count + "' ></td>";

        html_code +=

            "<td  class='qty'><input type='number' class='form-control expenses' name='qty[]' required ></td>";



        html_code += "<td  class='location'><select name='location[]' class='form-control' required>" +

            location + "</select></td>";

        html_code +=

            "<td><button type='button' name='remove' class='btn btn-sm btn-danger remove' data-row='row" +

            count + "'>-</button></td>";

        html_code += "</tr>";

        $('#searchitemitem').append(html_code);

    });

    $(document).on('click', '.remove', function() {



        var delete_row = $(this).data("row");

        count = count - 1;

        $('#' + delete_row).remove();



		var sum1 = 0;

        $(".expenses").each(function() {

            sum1 += (parseFloat(this.value)|| 0);

        });





        $('#grandtotalqty').val(sum1);



    });

    $('#searchitemitem').on('click', '.itemsearchmodal', function() {



        $('#searchModel').modal('show');

        $('#searchinput').attr('data-row', $(this).data('row'));

    });

    $('#searchinput').on('keyup', function() {

        var type1 = $('#searchtype:checked').val();



        var val = $(this).val();

        var rowno = $('#searchinput').data('row');

        console.log('row--' + rowno);

        $.ajax({

            type: "POST",

            url: '<?php echo site_url('Admin/searchitemmodal');?>',

            data: {

                itemValue: val,

                row: rowno,

                type1: type1

            },

            success: function(res) {

                $('#searchbox').html(res);

            }

        });

    });

    $('#searchbox').on('click', 'tr td', function() {

        // var itemValue = $(this).parent().data('id');

        // var id = $('#searchinput').attr('data-row');



        // $.ajax({

        //     type: "POST",

        //     url: '<?php echo site_url('Admin/getItemByCode');?>',

        //     data: {

        //         itemValue: itemValue

        //     },

        //     success: function(res) {

        //         var obj = JSON.parse(res);

        //         $('#searchModel button.close').click();

        //         $('#itemname_' + id).val(obj.itm_name);

        //         $('#itemcode_' + id).val(obj.itm_code);

        //         $('#itemunit_' + id).val(obj.itm_unit);

        //         $('#itemid_' + id).val(obj.itm_id);

        //         console.log(res);

        //     }

        // });

        var itemValue = $(this).parent().data('id'); 

        var id = $('#searchinput').attr('data-row');
        var godown=$('#from').val();


		$.ajax({
				type: "POST",
				dataType: "json",
				url: '<?php echo site_url('Admin/getBatchByItem');?>',
				
				data: { itemValue: itemValue },
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

    $('#searchitemitem').on('keyup', '.expenses', function() {





        var sum1 = 0;

        $(".expenses").each(function() {

            sum1 += (parseFloat(this.value)|| 0);

        });





        $('#grandtotalqty').val(sum1);



    });

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
							//console.log(batchlist);
							var i;
							var optiondata= '<option value="">Select</option>';
							for(i=0;i<batchlist.length;i++){
								
								optiondata += '<option value="'+batchlist[i].batch_id+'">'+batchlist[i].batchcode+'('+batchlist[i].cur_stock_item_count+')</option>';

							}
							
							$('#batchid_'+id).html(optiondata);
							$('#itemcode_'+id).val(batchlist[0].itm_code);
							$('#itemname_'+id).val(batchlist[0].itm_name);
                            $('#itemid_'+id).val(batchlist[0].itm_id);
							
						}
			})
		})
    </script>



    </body>



    </html>