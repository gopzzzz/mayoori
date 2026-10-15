<!-- //==========Edited By Niby on 28-Sep-2020 Monday ========//-->
   
            <div class="col-xs-12">
                <div class="box">
                    <?php echo form_open_multipart('journals_edit');?>
                    <div class="box-header">

                        <h3 class="box-title">JOURNAL</h3>
                        <input type="hidden" id="response_noti"
                            value="<?php echo $this->session->flashdata('response');?>" />
                            <input type="hidden" id="journal_id" name="journal_id"
                            value="<?php echo $journaldetails->journal_id;?>" />
                        <div class="box-tools">
                            <table>
                                <tr>
                                    <td>Journal no</td>
                                    <td><input type="text" class="form-control" name="journalnum"
                                            value="<?php echo $journaldetails->journalnum;?>"
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><input type="text" class="form-control" name="journaldate"
                                            value="<?php echo date('Y-m-d',strtotime($journaldetails->date));?>" readonly id="datepic" /></td>
                                </tr>
                            </table>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                    <!-- ==========Edited By Niby on 28-Sep-2020 Monday======== -->
                        <table class="table table-hover table_journal">
                            <tr>
                                <th>Account</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th></th>
                            </tr>
                            <tbody id="journaltable">
                                <?php 
                                $count=1;
                                foreach($journallist as $journal){?>
                                        <tr id='row<?=$count?>' data-row='<?=$count?>'>
                                            <td>
                                            <select name="bankreceipt[]" class="form-control bankrecipt" id="bankreceipt_<?=$count?>"
                                            data-count="<?=$count?>" required>

                                            <?php foreach($ledger as $value_ledger){?>
                                                <option value="<?php echo $value_ledger->le_id;?>" <?php if($value_ledger->le_id == $journal->creditbankaccount_id) echo "selected";?>><?php echo $value_ledger->le_name;?></option>
                                            <?php }?>

                                                </select></td>
                                            <td><input type="text" name="debit[]" class="form-control debitcount" id="debit_<?=$count?>"
                                                    data-count="<?=$count?>" value="<?=$journal->debit_amount?>" <?php if($journal->debit_amount == 0) echo "readonly";?> required></td>
                                            <td><input type="text" name="credit[]" class="form-control creditcount"
                                                    id="credit_<?=$count?>" data-count="<?=$count?>" value="<?=$journal->credit_amount?>" <?php if($journal->credit_amount == 0) echo "readonly";?> required></td>
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
                                <td><input type="text" class="form-control" name="debittotal" id="debvittotal" value="<?=$journaldetails->journal_total_debit?>"  readonly>
                                </td>
                                <td><input type="text" class="form-control" name="credittotal" id="credittotal" value="<?=$journaldetails->journal_total_credit?>" 
                                        readonly></td>
                                <td><button type="button" name="add" id="add" class="btn btn-sm btn-success">+</button>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="col-sm-12">
                        <div class="col-sm-4 narration">
                            <textarea class="form-control" name="narrations" placeholder="Narration"><?php echo $journaldetails->narrations;?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 footer">
                        
                        <button type="submit" name="submit" class="btn vtn-sm btn-primary">Submit</button>
                    </div>

                </div>
                </form>
                <!-- ==========Edited By Niby on 28-Sep-2020 Monday End======== -->
                <!-- /.box -->
            </div>

<script>
var count = 1;

//==========Edited By Niby on 28-Sep-2020 Monday========//
$('#add').click(function() {

  var ledger =document.getElementById('bankreceipt_1').innerHTML;
    //count = $('#journaltable .debitcount').length + 1;
    count = parseInt($("#journaltable tr").last().attr("data-row")) + 1;

    //updated section by niby  
    var html_code = "<tr id='row" + count + "' data-row='" + count + "'>";
   
    html_code +=
        "<td  class='itemname'><select name='bankreceipt[]' class='form-control bankrecipt' id='bankreceipt_" +
        count + "' data-count="+count+" required>"+ledger+"</select> </td>";
    html_code +=
        "<td  class='itemcode'><input type='text' name='debit[]' class='form-control debitcount' id='debit_" +
        count + "'id='debit_" + count + "' data-count="+count+" required ></td>";

    html_code +=
        "<td  class='qty'><input type='text'  name='credit[]' class='form-control creditcount' id='credit_" +
        count + "' data-count="+count+" required></td>";

    html_code +=
        "<td><button type='button' name='remove' class='btn btn-sm btn-danger remove' data-row='row" +
        count + "'>-</button></td>";
    html_code += "</tr>";

  //updated section by niby end

    $('#journaltable').append(html_code);
});


$('#journaltable').on('keyup', '.debitcount', function() {

//updated section by niby  
var count = $('#journaltable .debitcount').length;
var current = $(this).data('count');
var sum = 0;
var sum1 = 0;
if($(this).val()>0){
   $("#credit_"+current).val(0);
   $("#credit_"+current).attr("readonly", true);
}
else{
   $("#credit_"+current).val('');
   $("#credit_"+current).attr("readonly", false);
}

for ($i = 0; $i <= count; $i++) {
   //var debitamount = $('#debit_' + $i).val();
   var debitamount = $('.debitcount:eq(' + $i + ')').val();console.log(debitamount);

   var sum = parseInt(sum) + (parseInt(debitamount)|| 0);

   //var creditamount = $('#credit_' + $i).val();
   var creditamount = $('.creditcount:eq(' + $i + ')').val();

   var sum1 = parseInt(sum1) + (parseInt(creditamount)|| 0);
}



$('#debvittotal').val(sum);
$('#credittotal').val(sum1);
//updated section by niby end

});

$('#journaltable').on('keyup', '.creditcount', function() {

//updated section by niby
var count = $('#journaltable .creditcount').length;
var current = $(this).data('count');
var sum1 = 0;
var sum = 0;

if($(this).val()>0){
   $("#debit_"+current).val(0);
   $("#debit_"+current).attr("readonly", true);
}
else{
   $("#debit_"+current).val('');
   $("#debit_"+current).attr("readonly", false);
}

for ($i = 0; $i <= count; $i++) {
   //var creditamount = $('#credit_' + $i).val();
   var creditamount = $('.creditcount:eq(' + $i + ')').val();
   

   var sum1 = parseInt(sum1) + (parseInt(creditamount) || 0); console.log(sum1);

   //var debitamount = $('#debit_' + $i).val();
   var debitamount = $('.debitcount:eq(' + $i + ')').val();

   var sum = parseInt(sum) + (parseInt(debitamount) || 0);
}



$('#credittotal').val(sum1);
$('#debvittotal').val(sum);
//updated section by niby end

});

$(document).on('click', '.remove', function() {

var delete_row = $(this).data("row");
count = count - 1;

$('#' + delete_row).remove();

//added section by niby
var count = $('#journaltable .creditcount').length;
var sum = 0;
var sum1 = 0;

for ($i = 0; $i <= count; $i++) {
    //var debitamount = $('#debit_' + $i).val(); 
    var debitamount = $('.debitcount:eq(' + $i + ')').val();
    var sum = parseInt(sum) + (parseInt(debitamount)|| 0);

    //var creditamount = $('#credit_' + $i).val();
    var creditamount = $('.creditcount:eq(' + $i + ')').val();

    var sum1 = parseInt(sum1) + (parseInt(creditamount)|| 0);
}        

$('#debvittotal').val(sum);
$('#credittotal').val(sum1);
//added section by niby ende

});
</script>
<!-- //==========Edited By Niby on 28-Sep-2020 Monday End========//-->