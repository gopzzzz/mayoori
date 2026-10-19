<?php $data['leftmenu']='bankaccountcreate'; echo $this->load->view('common/leftmenu',$data,true); ?>

<div class="content-wrapper bank-recon-page">
  <section class="content-header">
    <h1>BANK RECONCILIATION <small>Preview</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Admin/index');?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url().'banreconcilation';?>">BANK RECONCILIATION</a></li>
    </ol>
  </section>

  <section class="content">
    <style>
      .bank-recon-page { color:#26364a; }
      .bank-recon-page .content-header h1 { font-size:25px; font-weight:700; color:#173b68; letter-spacing:.3px; }
      .bank-recon-page .content-header h1 small { color:#73839a; font-size:14px; }
      .bank-recon-page .box { border-top:3px solid #2878c8; border-radius:8px; box-shadow:0 4px 18px rgba(30,65,100,.09); overflow:hidden; }
      .bank-recon-page .box-header { padding:18px 20px; background:#f5f9fe; border-bottom:1px solid #e3ebf5; }
      .bank-recon-page .box-title { color:#173b68; font-size:17px; font-weight:700; }
      .bank-recon-page .box-body { padding:20px; }
      .bank-recon-page .filter-panel { padding:18px 15px 8px; margin:0 0 20px; background:#f7faff; border:1px solid #e1eaf5; border-radius:8px; }
      .bank-recon-page .filter-panel label { display:block; margin:0 0 7px; color:#344b66; font-weight:600; }
      .bank-recon-page .form-control { min-height:38px; border:1px solid #ccd8e6; border-radius:5px; box-shadow:none; color:#27384c; }
      .bank-recon-page .form-control:focus { border-color:#3985d6; box-shadow:0 0 0 2px rgba(57,133,214,.12); }
      .bank-recon-page .btn { border-radius:5px; font-weight:600; transition:background .15s ease; }
      .bank-recon-page .btn-primary { background:#246fba; border-color:#246fba; }
      .bank-recon-page .btn-primary:hover { background:#195b9d; border-color:#195b9d; }
      .bank-recon-page .table-responsive { border:1px solid #e0e8f1; border-radius:7px; margin-bottom:18px; }
      .bank-recon-page table { width:100%; border-collapse:collapse; background:#fff; }
      .bank-recon-page #example21 th { padding:12px 10px; background:#eaf3fc; color:#1e4774; border:1px solid #d4e1ef; font-size:12px; white-space:nowrap; }
      .bank-recon-page #example21 td { padding:10px; vertical-align:middle; border:1px solid #e2e9f1; font-size:13px; }
      .bank-recon-page #example21 tbody tr:nth-child(even) { background:#f8fbff; }
      .bank-recon-page #example21 tbody tr:hover { background:#eef6ff; }
      .bank-recon-page #example21 td input[type="date"] { min-width:145px; }
      .bank-recon-page .save-row { display:flex; justify-content:flex-end; padding-top:4px; }
      .bank-recon-page .save-row .btn { min-width:130px; padding:10px 24px; }
      @media (max-width:767px) {
        .bank-recon-page .box-body { padding:12px; }
        .bank-recon-page .filter-panel [class*="col-"] { margin-bottom:12px; }
        .bank-recon-page .content-header h1 { font-size:21px; }
      }
    </style>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">BANK RECONCILIATION</h3>
            <input type="hidden" id="response_noti" value="<?php echo $this->session->flashdata('response');?>" />
          </div>
          <div class="box-body">
            <div class="row filter-panel">
              <div class="col-sm-3 col-md-2">
                <label for="bankname">Bank Name</label>
                <select name="bank" class="form-control" id="bankname">
                  <?php foreach($bank as $key){ ?>
                    <option value="<?php echo $key->ba_id;?>"><?php echo $key->ba_acnumber;?>, <?php echo $key->ba_holdname;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-3 col-md-2">
                <label for="from">From Date</label>
                <input class="form-control" type="date" name="date" id="from">
              </div>
              <div class="col-sm-3 col-md-2">
                <label for="to">To Date</label>
                <input class="form-control" type="date" name="date" id="to">
              </div>
              <div class="col-sm-3 col-md-2">
                <label>&nbsp;</label>
                <button type="button" class="btn btn-primary search"><i class="fa fa-search"></i> Search</button>
              </div>
            </div>

            <form name="myForm" id="myFormId" onsubmit="return validateForm()" method="post" action="<?php echo site_url('AdminController/updatebankdate');?>">
              <div class="table-responsive">
                <table id="example21" class="table table-hover">
                  <thead>
                    <tr>
                      <th>SL NO</th><th>DATE</th><th>PARTICULARS</th><th>VOUCHER TYPE</th><th>TRANSACTION TYPE</th><th>CHQ NO</th><th>CHQ DATE</th><th>BANK DATE</th><th>DEBIT</th><th>CREDIT</th>
                    </tr>
                  </thead>
                  <tbody id="banklist">
                    <?php $i=1; foreach($bankrecon as $key){ ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $key->date?></td>
                      <td><?php echo $key->ledger?></td>
                      <td><?php if($key->payment_type==1){echo "Payment";}else if($key->payment_type==2){echo "Receipt";}?></td>
                      <td><?php if($key->cheque_num==null){ echo "Online";}else{ echo "Cheque";}?></td>
                      <td><?php echo $key->cheque_num;?></td>
                      <td><?php echo $key->cheque_date?></td>
                      <td><input type="date" name="bank_date[]" class="form-control"><input type="hidden" name="bankdateid[]" value="<?php echo $key->bp_id;?>"></td>
                      <td><?php if($key->payment_type==1 || $key->payment_type==3 ){echo $key->amount;}?></td>
                      <td><?php if($key->payment_type==2 || $key->payment_type==4){echo $key->amount;}?></td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
              <div class="save-row"><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> SAVE</button></div>
            </form>
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

$('.search').on('click',function(){
  var bank=$('#bankname').val();
  var from=$('#from').val();
  var to=$('#to').val();
  if(bank && from && to){
    $.ajax({
      type:"POST",
      dataType:'json',
      url:'<?php echo site_url('Admin/get_bankreconcialisationfetch');?>',
      data:{bank:bank,from:from,to:to},
      success:function(res){
        console.log(res);
        var html_each="";
        var id=1;
        $('#banklist').empty();
        jQuery.each(res,function(index,item){
          html_each+='<tr>';
          html_each+='<td>'+id+'</td>';
          html_each+='<td>'+item.date+'</td>';
          html_each+='<td>'+item.ledger+'</td>';
          html_each+='<td>'+item.payment_type+'</td>';
          html_each+='<td>cheque/online</td>';
          html_each+='<td>chequenum</td>';
          html_each+='<td>'+item.cheque_date+'</td>';
          html_each+='<td><input type="date" class="form-control"></td>';
          html_each+='<td>'+item.amount+'</td>';
          html_each+='<td>'+item.amount+'</td>';
          html_each+='</tr>';
          id++;
        });
        $('#banklist').append(html_each);
        console.log(html_each);
      }
    });
  } else {
    alert("select required fiels");
  }
});
</script>
</body>
</html>
