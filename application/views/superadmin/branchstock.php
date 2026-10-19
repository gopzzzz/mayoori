<?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true); ?>

<div class="content-wrapper branch-stock-page">
  <section class="content-header">
    <h1>BRANCH STOCK <small>Preview</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">BRANCH STOCK</a></li>
    </ol>
  </section>

  <section class="content">
    <style>
      .branch-stock-page { color:#26364a; }
      .branch-stock-page .content-header h1 { color:#173b68; font-size:25px; font-weight:700; letter-spacing:.3px; }
      .branch-stock-page .content-header h1 small { color:#73839a; font-size:14px; }
      .branch-stock-page .box { border-top:3px solid #2878c8; border-radius:8px; box-shadow:0 4px 18px rgba(30,65,100,.09); overflow:hidden; }
      .branch-stock-page .box-header { padding:18px 20px; background:#f5f9fe; border-bottom:1px solid #e3ebf5; }
      .branch-stock-page .box-title { color:#173b68; font-size:17px; font-weight:700; }
      .branch-stock-page .box-body { padding:18px; }
      .branch-stock-page .table-responsive { border:1px solid #e0e8f1; border-radius:7px; margin:0; }
      .branch-stock-page table { width:100%; border-collapse:collapse; background:#fff; }
      .branch-stock-page #example2 thead th { padding:12px 10px; background:#eaf3fc; color:#1e4774; border:1px solid #d4e1ef; font-size:12px; white-space:nowrap; }
      .branch-stock-page #example2 tbody td { padding:10px; vertical-align:middle; border:1px solid #e2e9f1; font-size:13px; color:#34465b; }
      .branch-stock-page #example2 tbody tr:nth-child(even) { background:#f8fbff; }
      .branch-stock-page #example2 tbody tr:hover { background:#eef6ff; }
      .branch-stock-page .dataTables_wrapper .dataTables_filter input,
      .branch-stock-page .dataTables_wrapper .dataTables_length select { border:1px solid #ccd8e6; border-radius:5px; padding:5px 8px; }
      .branch-stock-page .dt-buttons .dt-button { background:#246fba; color:#fff; border:1px solid #246fba; border-radius:5px; padding:6px 12px; margin:0 5px 8px 0; }
      .branch-stock-page .dt-buttons .dt-button:hover { background:#195b9d; border-color:#195b9d; }
      .branch-stock-page .dataTables_wrapper .dataTables_paginate .paginate_button.current { background:#246fba !important; color:#fff !important; border:1px solid #246fba !important; border-radius:4px; }
      @media (max-width:767px) { .branch-stock-page .box-body { padding:10px; } .branch-stock-page .content-header h1 { font-size:21px; } }
    </style>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">BRANCH STOCK</h3>
            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="box-tools"></div>
          </div>
          <div class="box-body table-responsive">
            <div class="col-sm-4">
              <!-- Optional location filter retained from the original view:
              <select name="location" class="form-control" id="location_search">
                <option value="0">select location</option>
                <?php foreach($location as $loc){ ?>
                <option value="<?php echo $loc->godownid;?>"><?php echo $loc->name;?></option>
                <?php } ?>
              </select><br> -->
            </div>
            <table id="example2" class="table table-hover">
              <thead><tr>
                <th>SL NO</th><th>ITEM NAME</th><th>BARCODE</th><th>BRAND</th><th>TAX %</th><th>GROUP</th><th>PURCHASE RATE</th><th>SELLING RATE</th><th>MRP</th><th>ITEM CODE</th><th>STOCK</th>
              </tr></thead>
              <tbody id="tablestockdel">
                <?php $i=1; foreach($itemlist as $key){ ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $key->itm_name;?></td>
                  <td><?php echo $key->batchcode;?></td>
                  <td><?php echo $key->brand_name;?></td>
                  <td><?php echo $key->hsn_tax;?></td>
                  <td><?php echo $key->ig_name;?></td>
                  <!-- <td><?php if($key->t_pc=='0.00'){echo $key->e_pc;}else{echo $key->t_pc;}?></td> -->
                  <td>--</td>
                  <td><?php if($key->t_sr=='0.00'){echo $key->e_sr;}else{echo $key->t_sr;}?></td>
                  <td><?php if($key->t_mrp=='0.00'){echo $key->e_mrp;}else{echo $key->t_mrp;}?></td>
                  <td><?php echo $key->itm_code;?></td>
                  <td><?php echo $key->cur_stock_item_count;?></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
function deletechecked(){
  if(confirm("Do you really want to delete this apartment?")){ return true; }
  else { return false; }
}
</script>
<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin_styles/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>admin_styles/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>admin_styles/dist/js/demo.js"></script>
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
    buttons: ['excelHtml5', 'csvHtml5']
  });
});
$('#location_search').on('change',function(){
  var id=$(this).val();
  if(id){
    $('#tablestockdel').empty();
    $.ajax({
      type: "POST",
      url: '<?php echo site_url('Admin/searchlocationstock');?>',
      dataType: "json",
      data: { id: id },
      success: function (res) {
        console.log(res);
        var html_each="";
        var i=1;
        $.each(res,function(key,value){
          html_each+='<tr>';
          html_each+='<td>'+i+'</td>';
          html_each+='<td>'+value.itm_name+'</td>';
          html_each+='<td>'+value.item_barcodenum+'</td>';
          html_each+='<td>00</td>';
          html_each+='<td>'+value.hsn_tax+'</td>';
          html_each+='<td>'+value.ig_name+'</td>';
          html_each+='<td>'+value.itm_prate+'</td>';
          html_each+='<td>'+value.itm_srate+'</td>';
          html_each+='<td>'+value.itm_mrp+'</td>';
          html_each+='<td>'+value.itm_code+'</td>';
          html_each+='<td>'+value.inventory_stock_itemcount+'</td>';
          html_each+='</tr>';
          i++;
        });
        $('#tablestockdel').append(html_each);
      }
    });
  }
});
</script>
</body>
</html>
