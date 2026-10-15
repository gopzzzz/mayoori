<?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true);?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">



    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1 align="center">PHYSICAL STOCK ADJUSMENT LIST<small>Preview</small></h1>



        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">PHYSICAL STOCK ADJUSMENT LIST</a></li>

        </ol>

    </section><br>



    <!-- Main content -->

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">PHYSICAL STOCK ADJUSMENT LIST</h3>
                        <input type="hidden" id="response_noti"
                            value="<?php echo $this->session->flashdata('response');?>" />


                        <div class="box-tools">
                            <a href="<?php echo base_url('physicalstock');?>"> <button type="submit"
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
                                    <th>Referal Number</th>
                                    <th>Date</th>
                                    <th>Total Qty</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach($psalist as $key){?>
                                <tr>
                                    <td><?php echo $i;?></td>

                                    <td><?php echo $key->referalnumber;?></td>
                                    <td><?php echo $key->psa_date;?></td>
                                    <td><?php echo $key->total_qty;?></td>
                                    <td><button type="button" class="btn btn-info btn-sm itemview"
                                            data-id="<?php echo $key->psa_id;?>">Items</button></td>

                                    <td>
                                        &nbsp;
                                        <a href="javascript:void(0)" class="editphysicalstock" data-id="<?php echo $key->psa_id;?>">
                                            <li class="fa fa-edit " ></li>
                                        </a>
                                        <a href="<?php echo base_url('physicalstockprint/').$key->psa_id;?>"
                                            >
                                            <li class="fa fa-print"></li>
                                        </a>
                                    </td>
                                </tr>

                                <?php $i++; } ?>






                        </table>
                        <div class="modal fade" id="myModalview" role="dialog">
                            <div class="modal-dialog " style="width:80%;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">ITEM LIST</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table id="example2" class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>ITEM NAME</th>
                                                    <th>ITEM CODE</th>
                                                    <th>QTY</th>
                                                    <th>UNIT </th>
                                                    <th>LOCATION</th>


                                                </tr>
                                            </thead>
                                            <tbody id="itemtr">

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

                                      <div id="physicalstockedit"></div>
                                        
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

        if (confirm("Do you really want to delete this physical stock adjustment?")) {

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
    });
    $('.itemview').on('click', function() {
        $('#myModalview').modal('show');
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo site_url('Admin/physicalstockfetchlist');?>',
                data: {
                    id: id
                },
                success: function(res) {
                    $("#itemtr").empty();
                    console.log(res);
                    var html_code = "";
                    $i = 1;
                    $.each(res, function(key, value) {
                        html_code += '<tr><td>' + $i + '</td><td>' + value.itm_name +
                            '</td><td>' + value.itm_code + '</td><td>' + value.psat_qty +
                            '</td><td>' + value.itm_prate + '</td><td>' + value.name +
                            '</td></tr>';
                        $i++;
                    });
                    $("#itemtr").append(html_code);
                }
            });
        }
    });
 //==========Edited By Niby on 30-Sep-2020 Wednesday========//
    $('.editphysicalstock').on('click', function() {
        var id = $(this).data('id');
        $('#physicalstockedit').empty();
        if (id) {
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('Admin/get_physicalstockadlistedit');?>',
                data: {
                    id: id
                },
                success: function(res) {
                    // /console.log(res);
                    
                    $('#physicalstockedit').append(res);
                    //console.log(html_each);
                },
            });
        }
        $('#editModal').modal({
            backdrop: 'static',
            keyboard: false
        });

    });
    //==========Edited By Niby on 30-Sep-2020 Wednesday End========//
    </script>

    </body>

    </html>