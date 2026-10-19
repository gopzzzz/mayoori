<?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true); ?>
<div class="content-wrapper delivery-note-page">
  <section class="content-header">
    <h1>DELIVERY NOTE <small>Preview</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('b2csalessummery')?>">DELIVERY NOTE</a></li>
    </ol>
  </section>
  <section class="content">
    <style>
      .delivery-note-page { color:#26364a; }
      .delivery-note-page .content-header h1 { color:#173b68; font-size:25px; font-weight:700; letter-spacing:.3px; }
      .delivery-note-page .content-header h1 small { color:#73839a; font-size:14px; }
      .delivery-note-page .box { border-top:3px solid #2878c8; border-radius:8px; overflow:hidden; box-shadow:0 4px 18px rgba(30,65,100,.09); }
      .delivery-note-page .box-header { padding:18px 20px; background:#f5f9fe; border-bottom:1px solid #e3ebf5; }
      .delivery-note-page .box-title { color:#173b68; font-size:17px; font-weight:700; }
      .delivery-note-page .box-body { padding:18px 20px; }
      .delivery-note-page .filter-panel { padding:16px 10px 4px; margin:12px 0 20px; background:#f7faff; border:1px solid #e1eaf5; border-radius:8px; }
      .delivery-note-page .filter-panel label { display:block; margin-bottom:7px; color:#344b66; font-weight:600; }
      .delivery-note-page .form-control { min-height:38px; border:1px solid #ccd8e6; border-radius:5px; box-shadow:none; color:#27384c; }
      .delivery-note-page .form-control:focus { border-color:#3985d6; box-shadow:0 0 0 2px rgba(57,133,214,.12); }
      .delivery-note-page .btn { border-radius:5px; font-weight:600; }
      .delivery-note-page .btn-success { background:#2677bd; border-color:#2677bd; }
      .delivery-note-page .btn-success:hover { background:#195b9d; border-color:#195b9d; }
      .delivery-note-page .table-responsive { border:1px solid #e0e8f1; border-radius:7px; margin-bottom:14px; }
      .delivery-note-page table { width:100%; background:#fff; border-collapse:collapse; }
      .delivery-note-page table th { padding:12px 10px; background:#eaf3fc; color:#1e4774; border:1px solid #d4e1ef; font-size:12px; white-space:nowrap; }
      .delivery-note-page table td { padding:10px; vertical-align:middle; border:1px solid #e2e9f1; font-size:13px; }
      .delivery-note-page table tbody tr:nth-child(even) { background:#f8fbff; }
      .delivery-note-page table tbody tr:hover { background:#eef6ff; }
      .delivery-note-page .pagination { margin:12px 0; }
      .delivery-note-page .pagination a, .delivery-note-page .pagination strong { display:inline-block; padding:7px 11px; margin:2px; border:1px solid #d4e1ef; border-radius:4px; color:#246fba; background:#fff; }
      .delivery-note-page .pagination strong { color:#fff; background:#246fba; border-color:#246fba; }
      @media(max-width:767px) { .delivery-note-page .box-body { padding:12px; } .delivery-note-page .filter-panel [class*="col-"] { margin-bottom:12px; } .delivery-note-page .content-header h1 { font-size:21px; } }
    </style>
    <div class="row"><div class="col-xs-12"><div class="box">
      <div class="box-header">
        <h3 class="box-title">DELIVERY NOTE</h3><br>
        <a href="<?php echo base_url('deliverynote');?>" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> REFRESH</a>
        <?php echo form_open_multipart('deliverynote', array('onsubmit' => 'return validateForm()','name' => 'myForm')); ?>
        <div class="row filter-panel">
          <div class="col-sm-3"><label>Supplier</label><select name="supplier" class="form-control"><option value="0">SELECT SUPPLIER</option><?php $i=0; foreach($supplier as $sup){ ?><option value="<?php echo $sup->sup_id;?>"><?php echo $sup->sup_name;?></option><?php $i++; } ?></select></div>
          <div class="col-sm-3"><label>Department</label><select name="department" class="form-control"><option value="0">SELECT DEPARTMENT</option><?php $i=0; foreach($itemgroup as $itemgroup){ ?><option value="<?php echo $itemgroup->ig_id;?>"><?php echo $itemgroup->ig_name;?></option><?php $i++; } ?></select></div>
          <div class="col-sm-3"><label>Category</label><select name="category" class="form-control"><option value="0">SELECT CATEGORY</option><?php $i=0; foreach($itemcategory as $itemcat){ ?><option value="<?php echo $itemcat->itcat_id;?>"><?php echo $itemcat->itcat_name;?></option><?php $i++; } ?></select></div>
          <div class="col-sm-3"><label>Route</label><select name="route" class="form-control"><option value="0">SELECT ROUTE</option><?php $i=0; foreach($routes as $route){ ?><option value="<?php echo $route->id;?>"><?php echo $route->routename;?></option><?php $i++; } ?></select></div>
          <div class="col-sm-3"><label>Bill Date</label><input type="date" name="billdate" class="form-control" value="" /></div>
          <div class="col-sm-3"><label>Delivery Date From</label><input type="date" name="fdate" class="form-control" value="" /></div>
          <div class="col-sm-3"><label>Delivery Date To</label><input type="date" name="tdate" class="form-control" value="" /></div>
          <div class="col-sm-3"><label>&nbsp;</label><button type="submit" name="submit_search" class="btn btn-success"><i class="fa fa-filter"></i> Submit</button></div>
        </div>
        </form>
      </div>
      <div class="box-body">
        <div class="table-responsive"><table class="table table-hover">
          <thead><tr><th>SL NO</th><th>BILL DATE</th><th>BILL NO</th><th>DELIVERY DATE</th><th>LOCATION</th><th>ROUTE</th><th>BATCH ID</th><th>ITEM NAME</th><th>QTY</th><th>SUPPLIER</th><th>TOTAL</th></tr></thead>
          <tbody><?php $i=1; foreach($deliverylist as $key){ ?><tr>
            <td><?php echo $i;?></td><td><?php echo date("d-m-Y",strtotime($key->sales_order_master_date));?></td><td><?php echo $key->sales_order_master_bill_no;?></td><td><?php echo date("d-m-Y",strtotime($key->sales_order_master_delivery_date));?></td><td><?php echo $key->location;?></td><td><?php echo $key->routename;?></td><td><?php echo $key->batchcode;?></td><td><?php echo $key->itm_name;?></td><td><?php echo $key->sales_order_trans_qty;?></td><td><?php echo $key->sup_name;?></td><td><?php echo $key->sales_order_trans_total;?></td>
          </tr><?php $i++; } ?></tbody>
        </table></div>
        <div class="pagination-wrap"><?php echo $links; ?></div>
      </div>
    </div></div></div>
  </section>
</div>
<script>
function deletechecked(){
  if(confirm("Do you really want to delete this apartment?")){ return true; }
  return false;
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
  $('#example2').DataTable({ dom: 'Bfrtip', buttons: ['excelHtml5', 'csvHtml5'] });
});
</script>
</body>
</html>
