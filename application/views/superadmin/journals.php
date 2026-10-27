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
    

    /* Mayoori blue-and-white redesign: Journal Preview */
    .content-wrapper { background: #f4f7fb; }
    .content-header h1 { color: #174a8b; font-weight: 700; letter-spacing: .4px; }
    .content-header h1 small { color: #6b7b91; }
    .content-header .breadcrumb { background: transparent; }
    .content .box { border-top: 3px solid #1769aa; border-radius: 9px; box-shadow: 0 4px 18px rgba(24, 62, 105, .09); overflow: hidden; }
    .content .box-header { background: #fff; padding: 18px 22px; border-bottom: 1px solid #e5edf6; min-height: 86px; }
    .content .box-title { color: #174a8b; font-size: 20px; font-weight: 700; }
    .content .box-tools { float: right; }
    .content .box-tools table { border-collapse: separate; border-spacing: 0 7px; }
    .content .box-tools td { padding: 0 7px; color: #334e6f; font-size: 13px; font-weight: 600; }
    .content .box-tools .form-control { min-width: 150px; height: 36px; border: 1px solid #cbd9e8; border-radius: 5px; box-shadow: none; background: #f9fbfe; }
    .content .box-body { margin: 0; padding: 20px; border: 0; background: #fff; }
    .table_journal { width: 100%; border-collapse: separate; border-spacing: 0; margin-bottom: 0; }
    .table_journal tr th { background: #1769aa; color: #fff; border: 1px solid #1769aa; height: 44px; padding: 10px 12px; font-size: 14px; text-align: left; font-weight: 700; }
    .table_journal tr td { border: 1px solid #e0e8f1; height: auto; width: auto; padding: 9px 10px; font-size: 14px; color: #253b53; vertical-align: middle; }
    .table_journal tbody tr:nth-child(even) { background: #f7faff; }
    .table_journal tbody tr:hover { background: #eef6ff; }
    .table_journal .form-control { height: 38px; border: 1px solid #cbd8e6; border-radius: 5px; box-shadow: none; font-size: 14px; color: #263b53; }
    .table_journal .form-control:focus, .content .box-tools .form-control:focus, .narration .form-control:focus { border-color: #2584d8; box-shadow: 0 0 0 2px rgba(37,132,216,.12); }
    #debvittotal, #credittotal { background: #eaf3ff; color: #174a8b; font-weight: 700; }
    .narration { margin-top: 20px; margin-bottom: 10px; }
    .narration .form-control { min-height: 88px; resize: vertical; border: 1px solid #cbd8e6; border-radius: 6px; box-shadow: none; padding: 12px; }
    .footer { margin-top: 20px; padding: 16px 20px; border-top: 1px solid #e5edf6; background: #fbfdff; display: flex; gap: 10px; justify-content: flex-end; }
    .footer .btn { float: none; border: 0; border-radius: 5px; padding: 9px 20px; font-weight: 600; box-shadow: none; }
    .footer .btn-success { background: #198754; }
    .footer .btn-warning { background: #f0ad36; color: #fff; }
    .footer .btn-primary { background: #1769aa; }
    #add { background: #198754; border: 0; border-radius: 5px; min-width: 38px; font-size: 18px; font-weight: 700; }
    .table_journal .remove { background: #dc3545; border: 0; border-radius: 5px; min-width: 32px; font-weight: 700; }
    @media (max-width: 767px) {
      .content .box-header { padding: 14px; }
      .content .box-tools { float: none; margin-top: 12px; }
      .content .box-tools table, .content .box-tools tbody, .content .box-tools tr { width: 100%; display: block; }
      .content .box-tools tr { margin-bottom: 8px; }
      .content .box-tools td { display: inline-block; width: 48%; padding: 3px; }
      .content .box-tools .form-control { min-width: 0; width: 100%; }
      .content .box-body { padding: 10px; }
      .table_journal { min-width: 650px; }
      .narration { width: 100%; }
      .footer { flex-wrap: wrap; justify-content: flex-start; }
    }


    /* All Journal buttons: blue, separate individual boxes */
    .content-wrapper .btn,
    .content-wrapper .btn-primary,
    .content-wrapper .btn-success,
    .content-wrapper .btn-warning,
    .content-wrapper .btn-danger,
    .content-wrapper #add,
    .content-wrapper .table_journal .remove {
        background: #2463a6 !important;
        border: 1px solid #2463a6 !important;
        color: #fff !important;
        border-radius: 5px !important;
        box-shadow: none !important;
    }

    .content-wrapper .btn:hover,
    .content-wrapper .btn:focus,
    .content-wrapper #add:hover,
    .content-wrapper .table_journal .remove:hover {
        background: #174a86 !important;
        border-color: #174a86 !important;
        color: #fff !important;
    }

    /* Keep footer buttons apart as individual buttons */
    .content-wrapper .footer {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
    }

    .content-wrapper .footer > a {
        display: inline-block;
        margin: 0 !important;
        padding: 0;
    }

    .content-wrapper .footer .btn {
        display: inline-block;
        float: none !important;
        margin: 0 !important;
        padding: 9px 20px;
        white-space: nowrap;
    }

    .content-wrapper #add,
    .content-wrapper .table_journal .remove {
        min-width: 34px;
        padding: 5px 10px;
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