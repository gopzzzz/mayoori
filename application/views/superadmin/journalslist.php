<?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1 align="center">JOURNAL LIST<small>Preview</small></h1>



        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">JOURNAL LIST</a></li>

        </ol>

    </section><br>



    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">JOURNAL LIST</h3>
                        <input type="hidden" id="response_noti"
                            value="<?php echo $this->session->flashdata('response');?>" />


                        <div class="box-tools">
                            <a href="<?php echo base_url('journals');?>"> <button type="submit"
                                    class="btn btn-default">Back</button></a>
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
                                    <th>DATE</th>
                                    <th>JOURNAL NO</th>
                                    <th>NARRATION</th>
                                    <th>CREDIT AMOUNT</th>
                                    <th>DEBIT AMOUNT</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach($journallist as $key){?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo  date("d-m-y", strtotime($key->date));?></td>
                                    <td>J<?php echo $key->journalnum;?></td>
                                    <td><?php echo $key->narrations;?></td>
                                    <td><?php echo $key->journal_total_credit;?></td>
                                    <td><?php echo $key->journal_total_debit;?></td>
                                    <td>
                                        <!--<?php echo anchor('del_baccount/1','<i class="fa fa-trash" aria-hidden="true" onclick="return deletechecked();"></i>');?>  
				  <li class="fa fa-edit">-->
                                        <li class="fa fa-eye viewjournallist" data-id="<?php echo $key->journal_id;?>">&nbsp;
                                        <li class="fa fa-pencil editjournallist" data-id="<?php echo $key->journal_id;?>">&nbsp;
                                        <li class="" data-id="<?php echo $key->journal_id;?>" style="list-style: none;display: inline-block;">
                                        <a  class="fa fa-trash deletejournallist text-danger" href="<?php echo site_url('Admin/journallist_delete/'.$key->journal_id.'');?>" onclick="return deletechecked();"></a>
                                        </li>
                                        </li>
                                    </td>
                                </tr>

                                <?php $i++; } ?>

                        </table>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Journal full list</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>Account Type</th>
                                                <th>Account Number</th>
                                                <th>Credit amount</th>
                                                <th>Debit Amount</th>
                                            </thead>
                                            <tbody id="journaldel">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal fade" id="editModal" role="dialog">
                            <div class="modal-dialog modal-lg" style="width:100%;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">

                                      <div id="journaledit"></div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>

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
    function deletechecked() {

        if (confirm("Do you really want to delete this journal?")) {

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
    </script>
    <script>
    $('.viewjournallist').on('click', function() {
        var id = $(this).data('id');
        $('#journaldel').empty();
        if (id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?php echo site_url('Admin/get_journalfulllist');?>',
                data: {
                    id: id
                },
                success: function(res) {
                    console.log(res);
                    var html_each = "";
                    jQuery.each(res.journallist, function(index, item) {
                        if (item.account_type == 1) {
                            html_each += '<tr>';
                            html_each += '<td>Bank Account</td>';
                            html_each += '<td>' + item.ba_acnumber + '</td>';
                            html_each += '<td>' + item.credit_amount + '</td>';
                            html_each += '<td>' + item.debit_amount + '</td>';
                            html_each += '</tr>';
                        } else if (item.account_type == 2) {
                            html_each += '<tr>';
                            html_each += '<td>Ledger</td>';
                            html_each += '<td>' + item.le_name + '</td>';
                            html_each += '<td>' + item.credit_amount + '</td>';
                            html_each += '<td>' + item.debit_amount + '</td>';
                            html_each += '</tr>';
                        }
                    });
                    html_each += '<tr>';
                            html_each += '<td><strong>Total</strong></td>';
                            html_each += '<td></td>';
                            html_each += '<td><strong>' + res.journaldetails.journal_total_credit + '</strong></td>';
                            html_each += '<td><strong>' + res.journaldetails.journal_total_debit + '</strong></td>';
                            html_each += '</tr>';
                    $('#journaldel').append(html_each);
                    console.log(html_each);
                },
            });
        }
        $('#myModal').modal('show');
    });

    $('.editjournallist').on('click', function() {
        var id = $(this).data('id');
        $('#journaledit').empty();
        if (id) {
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('Admin/get_journalfulllistedit');?>',
                data: {
                    id: id
                },
                success: function(res) {
                    // /console.log(res);
                    
                    $('#journaledit').append(res);
                    //console.log(html_each);
                },
            });
        }
        $('#editModal').modal('show');
    });
    </script>
    </body>

    </html>