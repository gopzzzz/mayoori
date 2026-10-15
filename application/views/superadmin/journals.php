<?php $data['leftmenu']='itgroup'; echo $this->load->view('common/leftmenu',$data,true);?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 align="center">JOURNAL<small>Preview</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('journals')?>">JOURNAL</a></li>
        </ol>
    </section>
    <style>
    .table_journal tr td {
        border: 1px solid #d6d0d0;
        height: 40px;
        width: 10px;
        font-size: 19px;
    }

    .box-body {
        border: 2px solid #d6d0d0;
    }

    .table_journal tr th {
        border: 1px solid #d6d0d0;
        height: 50px;
        font-size: 27px;
        text-align: center;
    }

    .narration {

        margin-top: 19px;

    }

    .footer {
        margin-top: 20px;
    }

    .btn-primary {
        float: right;
    }
    </style>
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php echo form_open_multipart('journals');?>
                    <div class="box-header">

                        <h3 class="box-title">JOURNAL</h3>
                        <input type="hidden" id="response_noti"
                            value="<?php echo $this->session->flashdata('response');?>" />

                        <div class="box-tools">
                            <table>
                                <tr>
                                    <td>Journal no</td>
                                    <td><input type="text" class="form-control" name="journalnum"
                                            value="<?php if($last_id==null){echo "1";}else{ foreach($last_id as $key3){ echo $key3->journalnum + 1;}}?>"
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><input type="text" class="form-control" name="journaldate"
                                            value="<?php echo date('Y-m-d');?>"  id="datepic" /></td>
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
                                <th></th>
                            </tr>
                            <tbody id="journaltable">
                                <tr>

                                    
                                    <td>
                                    <select name="bankreceipt[]" class="form-control bankrecipt" id="bankreceipt_1"
                                       data-count="1" required>

                                       <?php foreach($ledger as $value_ledger){?>
                                          <option value="<?php echo $value_ledger->le_id;?>"><?php echo $value_ledger->le_name;?></option>
                                       <?php }?>

                                        </select></td>
                                    <td><input type="text" name="debit[]" class="form-control debitcount" id="debit_1"
                                             data-count="1" required></td>
                                    <td><input type="text" name="credit[]" class="form-control creditcount"
                                            id="credit_1" data-count="1" required></td>
                                    <td><select name="bank[]" class="form-control" id="bank_1" style="display:none;"><option value="0">Select</option><?php foreach($bankaccount as $bankaccount){?><option value="<?php echo $bankaccount->ba_id;?>"><?php echo $bankaccount->ba_ifsc;?></option><?php } ?></select></td>
                                    <td></td>
                                </tr>
                            </tbody>

                            <tr>
                                <td>Total</td>
                                <td><input type="text" class="form-control" name="debittotal" id="debvittotal" readonly>
                                </td>
                                <td><input type="text" class="form-control" name="credittotal" id="credittotal"
                                        readonly></td>
                                        <td></td>
                                <td><button type="button" name="add" id="add" class="btn btn-sm btn-success">+</button>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="col-sm-12">
                        <div class="col-sm-4 narration">
                            <textarea class="form-control" name="narrations" placeholder="Narration"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 footer">
                        <a href="<?php echo base_url('journal_list');?>"><button type="button"
                                class="btn vtn-sm btn-success">View</button></a>
                        <button type="button" class="btn vtn-sm btn-warning reset">Clear</button>
                        <button type="submit" name="submit" class="btn vtn-sm btn-primary">Submit</button>
                    </div>

                </div>
                </form>
                <!-- ==========Edited By Niby on 28-Sep-2020 Monday End======== -->
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
    $('#bankreceipt').on('change', function() {
        var bankreceipt = $(this).val();
        var date = $('#datepic').val();

        if (!date) {
            alert('please select date');
        }
        if (bankreceipt != "") {
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('Admin/bankreciptamount');?>',
                data: {
                    bankreceipt: bankreceipt,
                    date: date
                },
                success: function(res) {
                    console.log(res);

                    //alert(res);
                    if (res) {
                        var obj = JSON.parse(res)
                        if (obj.MySum == null) {
                            $('#debitamount').val("--");

                        } else {
                            $('#debitamount').val(obj.MySum);
                            var debit = $('#debitamount').val();
                            $('#debvittotal').val(debit);
                        }
                    }
                },
            });


        }

    });
    $('#bankpayment').on('change', function() {
        var bankpayment = $(this).val();
        var date = $('#datepic').val();
        if (!date) {
            alert('please select date');
        }
        if (bankpayment != "") {
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('Admin/bankpaymentamount');?>',
                data: {
                    bankpayment: bankpayment,
                    date: date
                },
                success: function(res) {
                    console.log(res);

                    //alert(res);
                    if (res) {
                        var obj = JSON.parse(res)
                        if (obj.Mypayment == null) {
                            $('#paymentamount').val("--");
                        } else {
                            $('#paymentamount').val(obj.Mypayment);
                            var credit = $('#paymentamount').val();
                            $('#credittotal').val(credit);
                        }
                    }
                },
            });


        }

    });
    $('#datepic').on('change', function() {
        var date = $(this).val();
        var bankpayment = $('#bankpayment').val();
        var bankreceipt = $('#bankreceipt').val();
        if (bankpayment != "") {
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('Admin/bankpaymentamount');?>',
                data: {
                    bankpayment: bankpayment,
                    date: date
                },
                success: function(res) {
                    console.log(res);

                    //alert(res);
                    if (res) {
                        var obj = JSON.parse(res)
                        if (obj.Mypayment == null) {
                            $('#paymentamount').val("--");
                        } else {
                            $('#paymentamount').val(obj.Mypayment);
                            var credit = $('#paymentamount').val();
                            $('#credittotal').val(credit);
                        }
                    }
                },
            });


        }

        if (bankreceipt != "") {
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('Admin/bankreciptamount');?>',
                data: {
                    bankreceipt: bankreceipt,
                    date: date
                },
                success: function(res) {
                    console.log(res);

                    //alert(res);
                    if (res) {
                        var obj = JSON.parse(res)
                        if (obj.MySum == null) {
                            $('#debitamount').val("--");

                        } else {
                            $('#debitamount').val(obj.MySum);
                            var debit = $('#debitamount').val();
                            $('#debvittotal').val(debit);
                        }
                    }
                },
            });


        }

    });

    var count = 1;

    //==========Edited By Niby on 28-Sep-2020 Monday========//
    $('#add').click(function() {

      var ledger =document.getElementById('bankreceipt_1').innerHTML;
      var bank =document.getElementById('bank_1').innerHTML;
        count = count+ 1;
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
            "<td  class='itemname'><select name='bank[]' class='form-control bank' id='bank_" +
            count + "' data-count="+count+" required style='display:none;'>"+bank+"</select> </td>";

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

   //==========Edited By Niby on 28-Sep-2020 Monday End========//

    $('#journaltable').on('change', '.bankrecipt', function() {

        var type = $(this).val();
        var row = $(this).data('count');
      
        if (type == 1) {
            // $('#bankreceipt_' + row).empty();
            // $.ajax({
            //     type: "POST",
            //     dataType: 'json',
            //     url: '<?php echo site_url('Admin/getbankaccountfetch');?>',
            //     data: {
            //         type: type
            //     },
            //     success: function(res) {
            //         console.log(res);
            //         var html_each = "";
            //         jQuery.each(res, function(index, item) {
            //             html_each += '<option value=' + item.ba_id + '>' + item
            //                 .ba_acnumber + '</option>';

            //         });
            //         $('#bankreceipt_' + row).append(html_each);
            //         console.log(html_each);
            //     },
            // });
            $('#bank_'+row).show();
        } else if (type == 2) {
            $('#bankreceipt_' + row).empty();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?php echo site_url('Admin/getledgerfetch');?>',
                data: {
                    type: type
                },
                success: function(res) {
                    console.log(res);
                    var html_each = "";
                    jQuery.each(res, function(index, item) {
                        html_each += '<option value=' + item.le_id + '>' + item.le_name +
                            '</option>';
                    });
                    $('#bankreceipt_' + row).append(html_each);
                    console.log(html_each);
                },
            });
            $('#bank_'+row).hide();
        }else{
            $('#bank_'+row).hide();
        }
    });

   //==========Edited By Niby on 28-Sep-2020 Monday ========//
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
   //==========Edited By Niby on 28-Sep-2020 Monday End========//

    $(".reset").bind("click", function() {
        $("input[type=text], textarea,select").val("");
    });
    </script>
    </body>

    </html>