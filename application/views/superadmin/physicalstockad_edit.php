<!-- //==========Edited By Niby on 30-Sep-2020 Wednesday ========//-->
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
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">PHYSICAL STOCK ADJUSTMENT</h3>
            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>" />


            <div class="box-tools">
               
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding row">
            <?php echo form_open_multipart('physicalstockad_edit');?>
            <div class="col-sm-12">
                <div class="col-sm-1 labeltext divtext">
                    <label>Date</label>
                </div>
                <div class="col-sm-3 divtext">
                    <input class="form-control" type="text" name="date" value="<?php echo date('Y-m-d', strtotime($physicalstockad->psa_date));?>" readonly
                        required>
                </div>
                <div class="col-sm-3 labeltext divtext">
                    <label>Referal Number</label>
                </div>
                <div class="col-sm-3 divtext">
                    <input class="form-control" name="refno" placeholder="Referal Number"
                        value="<?php echo $physicalstockad->referalnumber ;?>"
                        readonly>
                    <input type="hidden" id="physicalstockad_id" name="physicalstockad_id"
                            value="<?php echo $physicalstockad->psa_id;?>" />
                </div>
                <br>
                <table class="table table-bordered" id="crud_table">
                    <tr>
                        <th>sl.no</th>
                        <th>Item name</th>
                        <th>Item Code</th>
                        <th>Unit </th>
                        <th>Qty</th>
                        <th>Location</th>
                        <th></th>
                    </tr>
                    <tbody id="searchitemitem">
                    <?php 
                        $count=1;
                        foreach($physicalstockadlist_items as $item){?>

                            <tr id='row<?=$count?>' data-row='<?=$count?>'>
                                <td class="solno"><input type="text" class="form-control" value="<?=$count?>"></td>

                                <td class="itemname"> <input type="text" class="form-control itemsearchmodal" data-row="<?=$count?>"
                                        name="iname[]" id="itemname_<?=$count?>"  value="<?=$item['itm_name']?>">
                                    <input type="hidden" class="form-control " name="itemid[]" id="itemid_<?=$count?>" value="<?=$item['psat_item_id']?>">
                                </td>

                                <td class="itemcode"><input type="text" class="form-control" name="icode[]" id="itemcode_<?=$count?>" value="<?=$item['itm_code']?>">
                                </td>

                                <td class="unitcost"><input type="text" class="form-control" name="cost[]" id="itemunit_<?=$count?>" value="<?=$item['itm_prate']?>">
                                </td>

                                <td class="qty"><input type="number" class="form-control expenses" name="qty[]" id="qty_<?=$count?>" required value="<?=$item['psat_qty']?>">
                                </td>

                                <td class="location">
                                    <select name="location[]" class="form-control location_list" id="location_<?=$count?>" required>
                                        <option value="0">select</option>
                                        <?php foreach($firmgodown as $key){?> 
                                        <option value="<?php echo $key->godownid;?>" <?php if($key->godownid == $item['psat_location']) echo "selected";?>>
                                            <?php echo $key->name;?>
                                        </option><?php } ?>
                                    </select>
                                </td>
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
                        <td><input type="text" name="granstotalqty" class="form-control" id="grandtotalqty" value="<?=$physicalstockad->total_qty?>">
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
                
                <div class="col-sm-2">
                    <input type="hidden" name="savetype" id="savetype" />
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" id="saveprint">Save &
                        Print</button>
                </div>
                
                </div>
            </div>

        </div>
        </form>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<div class="modal fade" id="searchModel" role="dialog">
    <div class="modal-dialog" style="width:100%;">
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
                            <th>Batch</th>
                            <th>Stock</th>
                            <th>MRP</th>
                            <th>Srate</th>
                            <th>Tax %</th>
                        </tr>
                    </thead>
                    <tbody id="searchbox">
                        <?php $itemlist=$this->Admin_model->get_item();
							foreach($itemlist as $keyitem){?>
                        <tr>
                            <td><?php echo $keyitem->itm_code;?></td>
                            <td><?php echo $keyitem->itm_name;?></td>
                            <td><?php echo $keyitem->item_batchcode;?></td>
                            <td><?php echo $keyitem->itm_ostock;?></td>
                            <td><?php echo $keyitem->itm_mrp;?></td>
                            <td><?php echo $keyitem->itm_srate;?></td>
                            <td><?php echo $keyitem->hsn_tax;?></td>
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

<script>
//Add Item
var count = 1;
    $('#add').click(function() {

        var location = $('.location_list').html();
        count = parseInt($("#searchitemitem tr").last().attr("data-row")) + 1;

        var html_code = "<tr id='row" + count + "' data-row='"+count+"'>";
        html_code += "<td  class='solno'><input type='text' class='form-control' value=" + count + " ></td>";
        html_code +=
            "<td  class='itemname'><input type='text' class='form-control itemsearchmodal' name='iname[]' data-row='" +
            count + "'  id='itemname_" + count +
            "' ><input type='hidden' class='form-control'  name='itemid[]' id='itemid_" + count + "' ></td>";
        html_code +=
            "<td  class='itemcode'><input type='text' class='form-control' name='icode[]' id='itemcode_" +
            count + "'></td>";
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

//Remove Item

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

//Quantity Update
$('#searchitemitem').on('keyup', '.expenses', function() {


    var sum1 = 0;
    $(".expenses").each(function() {
        sum1 += (parseFloat(this.value)|| 0);
    });


    $('#grandtotalqty').val(sum1);

});

//Show item search modal

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
    var itemValue = $(this).parent().data('id');
    var id = $('#searchinput').attr('data-row');

    $.ajax({
        type: "POST",
        url: '<?php echo site_url('Admin/getItemByCode');?>',
        data: {
            itemValue: itemValue
        },
        success: function(res) {
            var obj = JSON.parse(res);
            $('#searchModel').modal('hide');
            $('#itemname_' + id).val(obj.itm_name);
            $('#itemcode_' + id).val(obj.itm_code);
            $('#itemunit_' + id).val(obj.itm_unit);
            $('#itemid_' + id).val(obj.itm_id);
            console.log(res);
        }
    });
});
$('#saveprint').on('click', function() {
        if ($('#savetype').val() == '' || $('#savetype').val() == 2) {
            event.preventDefault();
            $('#savetype').val(1);
            $('#saveprint').click();
        }
});

//7-Oct-2020
$('#closesearchModel').on('click', function () {
        $('#searchModel').modal('hide');
});
</script>
<!-- //==========Edited By Niby on 30-Sep-2020 Wednesday End========//-->