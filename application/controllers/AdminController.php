<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {
public function __construct()    {  
parent::__construct();		

$this->load->model('Admin_model'); 
$this->load->model('Newadminmodel'); 
$this->load->library("pagination");
}
public function generatetokenpreturn(){
   $unique=uniqid();
   $datacheck=$this->Admin_model->get_checkpreturntoken($unique);
            if($datacheck==null){
               return $unique;
            }else{
               return $this->generatetokenpreturn();
            }
}

public function purchase_return(){
    $data['supplier']=$this->Admin_model->get_supplier();
   // echo "<pre>";print_r($data['supplier']);exit;
    $data['employee']=$this->Admin_model->get_staff();
    $data['purchase']=[]; 
    $data['purchase_bills']=$this->Newadminmodel->get_bill_no();
    $data['purchase_billsno']=$this->Newadminmodel->get_purchasereturnbill_no();
    $data['billcount']=$this->Newadminmodel->get_purchasereturncount();
   // $data['purchasereturn']=$this->Newadminmodel->get_purchasereturnlistlimitfetch();
    $links="";
    $config = array();
    $config["base_url"] = base_url() . "AdminController/purchase_return";
    $config["total_rows"] = $this->Newadminmodel->record_count_purchasereturn();
    $config["per_page"] = 20;
    $config["uri_segment"] = 3;
 
   $this->pagination->initialize($config);
 
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["purchasereturn"] = $this->Newadminmodel->
    get_purchasereturnlistlimitfetch($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();
    $data['token']= $this->generatetokenpreturn();
    $this->load->view('superadmin/purchase_return',$data);
}
public function purchasereturn_edit($id){
 
$data['master']=$this->Admin_model->get_purchasereturn_master($id);
$data['transe']=$this->Admin_model->get_purchasereturn_trans($id);
//echo "<pre>";print_r($data['trans']);exit;
$data['supplier']=$this->Admin_model->get_supplier();
$this->load->view('superadmin/purchasereturn_edit',$data);
}
public function purchase_returnadd()
{
   $this->sessionout();
   $token=$this->input->post('token');
   $tokencheck=$this->Admin_model->get_checkpreturntoken($token);
   if($tokencheck==null){
      $tablelogin = "login";
      $table ="tbl_purchase_return_master";
      $length = count($this->input->post('itemtotalamount'));
      
      $itemcode = $this->input->post('itemcode');
      $itemid = $this->input->post('itemid');
      $itemname = $this->input->post('itemname');
      //$itembatch = $this->input->post('itembatch');
      $itemqnty = $this->input->post('itemqnty');
      $itemtaxable = $this->input->post('itemtaxable');
      $itemgstper = $this->input->post('itemgstper');
      $itemgstamount = $this->input->post('itemgstamount');
      $itemcessamount = $this->input->post('itemcessamount');
      $itemtotalamount = $this->input->post('itemtotalamount');
      $itemhsncode = $this->input->post('itemhsncode');
      $employee = $this->input->post('employee');
      $mrp=$this->input->post('mrp');
      $itembatchid = $this->input->post('itembatchid');
      $unitprice=$this->input->post('unitprice');
      $billcount=$this->Newadminmodel->get_purchasereturncount();
      $purchasereturn=$this->Newadminmodel->get_purchasereturnlist();
      $purchase_billsno=$this->Newadminmodel->get_purchasereturnbill_no();
   
       $data_where=array('paybal_supplier_id'=>$this->input->post('supplier'),
         'paybal_bill_number'=>$this->input->post('bill_no'),
         'status'=>7);
         $billnum=$this->input->post('bill_no');
         $supplierpay=$this->Admin_model->checksupplierpaubalance($data_where);
         $purchaseBill=$this->Admin_model->checkReturnpurchasebill1($billnum);
         if($supplierpay!=null){
           $billamount=$purchaseBill->purchase_master_grandtotal;
           $returnamount=$this->input->post('grandTotal');
           $totalAmount=$supplierpay->paybal_amount-$returnamount;
           $finalamount=$billamount+$totalAmount;
           $data_outstanding=array('paybal_amount'=>$finalamount);
          // echo "<pre>";print_r($data_outstanding);exit;
           $this->db->where($data_where);
           $this->db->update('tbl_supplier_paybalance',$data_outstanding);
         }
        
     
      if($billcount->mycount==0){
         $purchasebill=1;
      }else{
         $purchasebill=$purchase_billsno->purreturn_master_debitno + 1;
      }
      //echo $purchasebill;exit;
      date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      $now = date('Y-m-d H:i');
      $data = array(
          'purreturn_master_ref_no'=>$this->input->post('refno'),
          'purreturn_master_supplier'=>$this->input->post('supplier'),
          'purreturn_master_debitno'=>$purchasebill,
          'purreturn_master_date'=>$this->input->post('date'),
          'purreturn_master_tot_quantity'=>$this->input->post('totalqnty'),
          'purreturn_master_roundoff'=>$this->input->post('roundOfValuue'),
          'purreturn_master_phoneno'=> $this->input->post('phone_num'),
          'purreturn_master_ewbno'=> $this->input->post('ewb_num'),
          'purreturn_master_address'=>$this->input->post('address'),
         
          'purreturn_master_billno'=>$this->input->post('bill_no'),
          'purreturn_master_sub_crnno'=>$this->input->post('supcrn_num'),
          'purreturn_master_gstnum'=>$this->input->post('gst_num'),
          'purreturn_master_is_igst'=>$this->input->post('isigst'),
          'purreturn_master_notes'=>$this->input->post('notes'),
          'purreturn_master_vehicleno'=>$this->input->post('vehicle_num'),
          'purreturn_master_taxable_value'=>$this->input->post('totalTaxableAmount'),
          'purreturn_master_taxable_value'=>$this->input->post('totalTaxableAmount'),
          'purreturn_master_tot_quantity'=>$this->input->post('totalqnty'),
           'purreturn_master_grandtotal'=>$this->input->post('grandTotal'),
           'purchase_return_gstamount'=>$this->input->post('amountGst'),
           'purchase_return_time'=>date("h:i:s", strtotime($now) ),
           'token'=>$token
        
         );
         $lastid = $this->Admin_model->addrowtotable($table,$data);
        //suplierpaybalance
   
   
        
        
   
         
         for($i=0;$i<$length;$i++){
   
            $datatrans = array(
                           'purreturn_trans_purreturn_master_id' => $lastid,
                           'purreturn_trans_item_code' => $itemcode[$i],
                           'purreturn_trans_qty' => $itemqnty[$i],
                           'purreturn_trans_taxable_value' => $itemtaxable[$i], 
                           'purreturn_trans_gst_percentage' => $itemgstper[$i],
                           'purreturn_trans_gst_amount' => $itemgstamount[$i],
                           'purreturn_trans_total' => $itemtotalamount[$i],
                           'purreturn_item_id'=>$itemid[$i],
                           'purreturn_item_batch_id'=>$itembatchid[$i],
                           'purreturn_trans_batch'=>$itembatchid[$i],
                           'purreturn_trans_rate'=>$unitprice[$i],
                           'purchasereturn_trans_mrp'=>$mrp[$i]
                           
      
                           );
   
                           $this->db->insert('tbl_purchase_return_trans',$datatrans);
   
                           $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                         
                           $currentstock[$i]=$checkitem[$i]->cur_stock_item_count-$itemqnty[$i];
                           $data_uparray[$i]=array('cur_stock_item_count'=>$currentstock[$i]);
                           $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                           $this->db->update('tbl_current_stock',$data_uparray[$i]);
   
                           $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                           'cur_stock_history_batchid'=> $itembatchid[$i],
                           'cur_stock_history_item_count'=>$itemqnty[$i],
                           'cur_stock_history_added_date'=>$now,
                           'cur_stock_history_stock_master_id'=>$lastid,
                           'purpose'=>'Purchase return add');
                       
                           $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
   
                           $inststock[$i]=$this->Admin_model->get_check_inventstockitem1($this->session->userdata('id'),$itemid[$i],$itembatchid[$i]);
                          //echo "<pre>";print_r($inststock[$i]);exit;
                           $finalstock[$i]=$inststock[$i]->inventory_stock_itemcount-$itemqnty[$i];
                          // echo "<pre>";print_r($finalstock[$i]);exit;
                           $data_uparray1[$i]=array('inventory_stock_itemcount'=>$finalstock[$i]);
                           $this->db->where('inventory_stock_id',$inststock[$i]->inventory_stock_id);
                           $this->db->update('tbl_inventory_stock',$data_uparray1[$i]);
              
         }
         
        // $this->Admin_model->addrowtotable('tbl_purchase_return_trans',$datatrans);
         if($this->input->post('savetype') == 2){
            redirect('purchase_return');
         }
         else if($this->input->post('savetype') == 1){
            $report['datamaster'] = $this->Admin_model->getalltablewhererow($table,array('purreturn_master_id'=>$lastid));
            $report['datatrans'] = $this->Admin_model->getpurchasereturntrans(array('purreturn_trans_purreturn_master_id'=>$lastid));
            $report['employee']=$this->Admin_model->get_b2bemployee($lastid);
            $report['address']=$this->Admin_model->get_mayoori_address();
            $this->load->view('superadmin/purchasereturnprint',$report);
         }
      
   }
   
}
public function purchaseretuenprint($id){
   $table ="tbl_purchase_return_master";
   $report['datamaster'] = $this->Admin_model->getalltablewhererow($table,array('purreturn_master_id'=>$id));
   $report['address']=$this->Admin_model->get_mayoori_address();
   $report['datatrans'] = $this->Admin_model->getpurchasereturntrans(array('purreturn_trans_purreturn_master_id'=>$id));
  //echo "<pre>";print_r( $report['datamaster']);exit;
   $report['employee']=$this->Admin_model->get_b2bemployee($id);

   $this->load->view('superadmin/purchasereturnprint',$report);
}

public function seachcustomerlist(){
   $cusname = $this->input->post('cus');
   
   if(!empty($cusname)){
  // $id = $this->input->post('rowOrder');
   $itemList = $this->Admin_model->search_customername($cusname);
   if($itemList){
   $namelist='
   <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
      ';
      foreach($itemList as $new1){
      $namelist.='
      <tr class="subSelect_namesearch" data-value="'.$new1['customer_id'].'" >
        
         <input type="hidden" name="fff" id="fff'.$new1['customer_id'].'" value="'.$new1['customer_id'].'" readonly="readonly">
         <td class="titleName">'.$new1['cus_name'].'-'.$new1['cus_phonenumber'].'</td>
      </tr>
      ';
      }
      $namelist.='
   </table>
   ';
   echo $namelist;
   }
   }
   }
   public function seachlocationlist(){
      $location = $this->input->post('loc');
   
      if(!empty($location)){
     // $id = $this->input->post('rowOrder');
      $itemList = $this->Admin_model->search_location($location);
      if($itemList){
      $namelist='
      <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
         ';
         foreach($itemList as $new1){
         $namelist.='
         <tr class="subSelect_locsearch" data-value="'.$new1['id'].'" >
           
            <input type="hidden" name="fff" id="fff'.$new1['id'].'" value="'.$new1['id'].'" readonly="readonly">
            <td class="titleName">'.$new1['location'].'</td>
         </tr>
         ';
         }
         $namelist.='
      </table>
      ';
      echo $namelist;
      }
      }
   }

   public function seachphonenumberlist(){
      $cusname = $this->input->post('phnum');
      
      if(!empty($cusname)){
     // $id = $this->input->post('rowOrder');
      $itemList = $this->Admin_model->search_customername($cusname);
      if($itemList){
      $namelist='
      <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
         ';
         foreach($itemList as $new1){
         $namelist.='
         <tr class="subSelect_namesearch" data-value="'.$new1['customer_id'].'" >
           
            <input type="hidden" name="fff" id="fff'.$new1['customer_id'].'" value="'.$new1['customer_id'].'" readonly="readonly">
            <td class="titleName">'.$new1['cus_name'].'-'.$new1['cus_phonenumber'].'</td>
         </tr>
         ';
         }
         $namelist.='
      </table>
      ';
      echo $namelist;
      }
      }
      }
public function supplierwisedetailedreport()
{

  if(isset($_POST['filter'])){
   $from=$this->input->post('from');
   $to=$this->input->post('to');
   $sub=$this->input->post('supplier');
   
   $data["suplierwisedetailedb2c"] = $this->Newadminmodel->get_supplierwisedetailedb2csearch($from,$to,$sub);
  }else{
   $from='';
   $to='';
   $links="";
   $sub='';
   $config = array();
   $config["base_url"] = base_url() . "AdminController/supplierwisedetailedreport";
   $config["total_rows"] = $this->Admin_model->record_count_sales();
   $config["per_page"] = 10;
   $config["uri_segment"] = 3;

   $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["suplierwisedetailedb2c"] = $this->Newadminmodel->
   get_supplierwisedetailedb2c($config["per_page"], $page);
  
   //echo "<pre>";print_r($data["suplierwisedetailedb2c"]);exit;

   $data["links"] = $this->pagination->create_links();
 
  
  }
  $data['from']=$from;
  $data['to']=$to;
  $data['to']=$sub;
  $data['suppliers']=$this->Admin_model->get_supplier();
   //  $data['suplierwisedetailedb2c']=$this->Newadminmodel->get_supplierwisedetailedb2c();
  // $data['suplierwisedetailedb2b']=$this->Newadminmodel->get_supplierwisedetailedb2b($from,$to,$supplier);
   $this->load->view('superadmin/supplierwisedetailedreport',$data);
}
public function saleb2cedit($id){
   $data['b2c']=$this->Newadminmodel->get_b2csale_masternew($id);
   $data['b2ctrans']=$this->Newadminmodel->get_b2csale_transnew($id);
   $data['id']=$id;
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $employee=$this->Admin_model->get_staff1();
   //echo "<pre>";print_r($data['b2ctrans']);exit;
   
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
     
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $this->load->view('superadmin/saleb2ceditnew',$data);
}

public function viewsaleb2c($id){
   $data['b2c']=$this->Newadminmodel->get_b2csale_masternew($id);
   $data['b2ctrans']=$this->Newadminmodel->get_b2csale_transnew($id);
   //echo "<pre>";print_r($data['b2ctrans']);exit;
   $data['id']=$id;
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $employee=$this->Admin_model->get_staff1();
   
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
     
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $this->load->view('superadmin/saleb2cviewmodal',$data);
}

public function b2csaleeditnew(){
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $id=$this->input->post('id');
   $data_array=array('sales_master_date'=>$this->input->post('billdate'),
   'sales_master_eway_billno'=>$this->input->post('ewaybillnum'),
   'sales_master_delivery_date'=>$this->input->post('deliverydate'),
   'sales_master_customer_name'=>$this->input->post('customername'),
   'sales_master_customer_login_id'=>$this->input->post('customerid'),
   'sales_master_phone_no'=>$this->input->post('phon_num'),
   'sales_master_customer_address'=>$this->input->post('address'),
   'sales_master_delivery_address'=>$this->input->post('deliveryaddress'),
   'sales_master_trans_mode'=>$this->input->post('transmode'),
   'sales_master_finance_id'=>$this->input->post('financenew'),
   'sales_master_is_igst'=>$this->input->post('isigst'),
   'sales_master_note'=>$this->input->post('note'),
   'sales_master_veh_no'=>$this->input->post('vehiclenumber'),
   'sales_master_outstanding'=>$this->input->post('outstanding'),
   'sales_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_master_amount_paid'=>$this->input->post('paidamount'),
   'sales_master_delivery_charge'=>$this->input->post('deliverychare'),
   'sales_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'sales_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'sales_master_total_cess'=>$this->input->post('cessAmount'),
   'sales_master_round_off'=>$this->input->post('roundOfValuue'),
   'sales_master_grand_total'=>$this->input->post('grandTotal'),
   'sales_master_discount'=>$this->input->post('discount'),
   'sales_master_bankamount'=>$this->input->post('bankamount'),
   'sales_master_bank'=>$this->input->post('bankname'),
   'sales_master_edited_date'=>$now,
   'sales_edited_system'=>"192.168.0.7"
);
$this->db->where('sales_master_id',$id);
$this->db->update('tbl_sales_master',$data_array);


$dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($this->input->post('cusid'));

$balamount=$this->input->post('outstanding') + $dataoutcheck->outcus_amount - ($this->input->post('outstanding_previous'));

$dataoutupdate=array(
'outcus_amount'=> $balamount);
$this->db->where('outcusid_customer_id',$this->input->post('cusid'));

if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
$dataoutinserthistory=array('customer_id'=>$this->input->post('cusid'),
'amount'=>$this->input->post('outstanding'),
'order_master'=>$this->input->post('billdate'),
'type'=>1);
$this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);

}



}

public function salesreturnsavenew(){
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $id=$this->input->post('id');
   $data_array=array('sales_return_date'=>$this->input->post('billdate'),
   'sales_retuurn_bill_no'=>$this->input->post('ewaybillnum'),
  
   'salesreturn_customername'=>$this->input->post('customername'),
   'salesreturn_cus_loginid'=>$this->input->post('customerid'),
   'salesreturn_phonenumber'=>$this->input->post('phon_num'),
   'salesreturn_cusaddress'=>$this->input->post('address'),
   
  
   
   'sales_return_isigst'=>$this->input->post('isigst'),
   'sales_return_note'=>$this->input->post('note'),
  
   
   
   'sales_return_amountpaid'=>$this->input->post('ramount'),
  
   'sales_return_taxable_amnount'=>$this->input->post('totalTaxableAmount'),
   'sales_return_gst_amount'=>$this->input->post('amountGst'),
   'sales_return_totalcess'=>$this->input->post('cessAmount'),
   'salesreturn_roundoff'=>$this->input->post('roundOfValuue'),
   'sales_return_grandtotal'=>$this->input->post('grandTotal'),
   
   'sales_return_edited_date'=>$now,
   'sales_retuurn_edited_ip'=>"192.168.0.7"
);
$this->db->where('sales_return_id',$id);
$this->db->update('tbl_salesreturn',$data_array);




}
public function purchaseditnewsave(){
   
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $id=$this->input->post('id');
   $data_array=array('purreturn_master_date'=>$this->input->post('billdate'),
   'purreturn_master_ewbno'=>$this->input->post('ewaybillnum'),
   'purreturn_master_supplier'=>$this->input->post('supplierselect'),
  
   'purreturn_master_sub_crnno'=>$this->input->post('supcrn_num'),
   'purreturn_master_phoneno'=>$this->input->post('phon_num'),
   'purreturn_master_address'=>$this->input->post('address'),
   'purreturn_master_gstnum'=>$this->input->post('gst_number_new'),
  
   'purreturn_master_is_igst'=>$this->input->post('isigst'),
   'purreturn_master_notes'=>$this->input->post('note'),
  
   'purreturn_master_taxable_value'=>$this->input->post('totalTaxableAmount'),
   'purchase_return_gstamount'=>$this->input->post('amountGst'),
  
   'purreturn_master_roundoff'=>$this->input->post('roundOfValuue'),
   'purreturn_master_grandtotal'=>$this->input->post('grandTotal')
   
);
$this->db->where('purreturn_master_id',$id);
$this->db->update('tbl_purchase_return_master',$data_array);



}
public function deliverychellaneditnew(){
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $id=$this->input->post('id');
   $data_array=array(
   'deliverychellan_master_consignee_name'=>$this->input->post('customername'),
   'dc_master_customer_gstin'=>$this->input->post('gstin'),
   'deliverychellan_master_vehicleno'=>$this->input->post('vehiclenumber'),
   'dc_master_transport_mode'=>$this->input->post('transmode'),
   'dc_master_transpor_purpose'=>$this->input->post('transpur'),
   'deliverychellan_master_consignee_address'=>$this->input->post('conadd'),
   'deliverychellan_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'deliverychellan_master_roundoff'=>$this->input->post('roundOfValuue'),
   'deliverychellan_master_grandtotal'=>$this->input->post('grandTotal'),
  'deliverychellan_master_note'=>$this->input->post('note'),
   'deliverychellan_master_is_igst'=>$this->input->post('isigst'),
   'dc_master_despatch_date'=>$this->input->post('despatch_date'),
   'deliverychellan_gst_number'=>$this->input->post('gst_num')
);

$this->db->where('deliverychellan_master_id ',$id);
$this->db->update('tbl_deliverychellan_master',$data_array);
}

public function b2bsaleeditnew(){
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $id=$this->input->post('id');
   $data_array=array(
   'billing_master_eway_billno'=>$this->input->post('ewaybillnum'),
   'billing_master_customer_name'=>$this->input->post('customername'),
   'billing_master_customer_login_id'=>$this->input->post('customerid'),
   'billing_master_phoneno'=>$this->input->post('phon_num'),
   'billing_master_customer_address'=>$this->input->post('address'),
   'billing_master_delivery_address'=>$this->input->post('deliveryaddress'),
   'billing_master_is_igst'=>$this->input->post('isigst'),
   'billing_master_note'=>$this->input->post('note'),
   'billing_master_vehicleno'=>$this->input->post('vehiclenumber'),
   'billing_master_outstanding'=>$this->input->post('outstanding'),
   'billing_master_paymentmode'=>$this->input->post('paymod1'),
   'billing_master_paid_amount'=>$this->input->post('paidamount'),
   'billing_master_delivery_charge'=>$this->input->post('deliverychare'),
   'billing_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'billing_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'billing_master_roundoff'=>$this->input->post('roundOfValuue'),
   'billing_master_grandtotal'=>$this->input->post('grandTotal'),
   'billing_master_discount'=>$this->input->post('discount'),
   'billing_gst_number'=>$this->input->post('gstnum'),
   'billing_master_bankamount'=>$this->input->post('bankamount'),
   'billing_master_tcs'=>$this->input->post('tcs'),
   'billing_master_bank'=>$this->input->post('bankname')
);

//print_r($data_array);exit;

$this->db->where('billing_master_id',$id);
$this->db->update('tbl_billing_master',$data_array);

$dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($this->input->post('cusid'));

$balamount=$this->input->post('outstanding') + $dataoutcheck->outcus_amount - ($this->input->post('outstanding_previous'));

$dataoutupdate=array('outcusid_customer_id'=>$this->input->post('cusid'),
'outcus_amount'=> $balamount);
$this->db->where('outcusid_customer_id',$this->input->post('cusid'));

if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
$dataoutinserthistory=array('customer_id'=>$this->input->post('cusid'),
'amount'=>$this->input->post('outstanding'),
'order_master'=>$id,
'type'=>2);
$this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);

}
}
public function saleordereditnew(){
   $id=$this->input->post('id');
   $data_array=array('sales_order_master_date'=>$this->input->post('billdate'),
   'sales_order_master_eway_billno'=>$this->input->post('ewaybillnum'),
   'sales_order_master_delivery_date'=>$this->input->post('deliverydate'),
   'sales_order_master_customer_name'=>$this->input->post('customername'),
   'sales_order_master_login_id'=>$this->input->post('customerid'),
   'sales_order_master_phone_no'=>$this->input->post('phon_num'),
   'sales_order_master_customer_address'=>$this->input->post('address'),
   'sales_order_master_delivery_address'=>$this->input->post('deliveryaddress'),
   'sales_order_master_trans_mode'=>$this->input->post('transmode'),
   'sales_order_master_finance_id'=>$this->input->post('financenew'),
   'sales_order_master_is_igst'=>$this->input->post('isigst'),
   'sales_order_master_note'=>$this->input->post('note'),
   'sales_order_master_veh_no'=>$this->input->post('vehiclenumber'),
   'sales_order_master_outstanding'=>$this->input->post('outstanding'),
   'sales_order_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_order_master_amount_paid'=>$this->input->post('paidamount'),
   'sales_order_master_delivery_charge'=>$this->input->post('deliverychare'),
   'sales_order_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'sales_order_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'sales_order_master_total_cess'=>$this->input->post('cessAmount'),
   'sales_order_master_round_off'=>$this->input->post('roundOfValuue'),
   'sales_order_master_grand_total'=>$this->input->post('grandTotal'),
   'sales_order_master_discount'=>$this->input->post('discount'),
   'sales_order_master_bank'=>$this->input->post('bankname'),
   'sales_order_master_bankamount'=>$this->input->post('bankamount'),
   'sales_edited_date'=>date('Y-m-d'),
   'location_id'=>$this->input->post('locationid')
);
$this->db->where('sales_order_master_id',$id);
$this->db->update('tbl_sales_order_master',$data_array);

}
public function b2csaleeditdeleterow(){
   $tid=$this->input->post('tid');
   $item=$this->input->post('item');
   $batch=$this->input->post('batch');
   $qty=$this->input->post('itemqty');
   //echo $item;exit;
     

   
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
   $gettrans=$this->Admin_model->get_transsalestable($tid);
    //echo $gettrans->sales_trans_id;exit;
     if($gettrans->sales_trans_branch!=null){
      $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
   
      $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $gettrans->sales_trans_branch; 
  
      $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
      $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
      $this->db->update('tbl_inventory_stock',$datainventstock);
     }
      if($gettrans->sales_trans_godown!=null){
         
         $godownlist=$this->Admin_model->get_godownlistfetch();
         $goddownid=$godownlist->login_id;
         $checkinventstock_for_item1 = $this->Admin_model->get_check_inventstockitem($goddownid,$item,$batch);
   
         $totalstock_count  = $checkinventstock_for_item1->inventory_stock_itemcount+ $gettrans->sales_trans_godown; 
  
         $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
         $this->db->where('inventory_stock_id',$checkinventstock_for_item1->inventory_stock_id);
         $this->db->update('tbl_inventory_stock',$datainventstock);
     }
  
      date_default_timezone_set("Asia/Kolkata"); 
      $now = date('Y-m-d H:i');

      $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
      'cur_stock_history_batchid'=> $batch,
      'cur_stock_history_item_count'=>$qty,
      'cur_stock_history_added_date'=>$now,
      'cur_stock_history_stock_master_id'=>$tid,
      'purpose'=>'B2c sale Row Delete',
      'ip'=>1);
  
      $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
  
  
      $checkitem=$this->Admin_model->get_checkitem($item,$batch);
      $count=$checkitem->cur_stock_item_count;
      // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
       $Totalcount  = $count + $qty ; 
    
       $dataCurrentstock=array(
       'cur_stock_item_count'=>$Totalcount,
       );
      
       $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
       $this->db->update('tbl_current_stock',$dataCurrentstock);
  
      
       $this->db->where('sales_trans_id',$tid);
       $this->db->delete('tbl_sales_trans');

       $this->db->where('sale_type',1);
       $this->db->where('sale_order_id',$tid);
       $this->db->delete('tbl_staff_incentive');
     
}

public function salesreturneditdeleterow(){
   $tid=$this->input->post('tid');
   $this->db->where('salesreturntrans_id',$tid);
   $this->db->delete('tbl_salesreturn_trans');
   $item=$this->input->post('item');
   $batch=$this->input->post('batch');
   $qty=$this->input->post('itemqty');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      

   
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
   
  
  
  
     
     $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $qty; 
  
      $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
      $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
      $this->db->update('tbl_inventory_stock',$datainventstock);
      date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      $now = date('Y-m-d H:i');

      $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
      'cur_stock_history_batchid'=> $batch,
      'cur_stock_history_item_count'=>$qty,
      'cur_stock_history_added_date'=>$now,
      'cur_stock_history_stock_master_id'=>$tid,
   'purpose'=>'B2c sale Row Delete',
'ip'=>1);
  
  $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
  
  
      $checkitem=$this->Admin_model->get_checkitem($item,$batch);
      $count=$checkitem->cur_stock_item_count;
      // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
       $Totalcount  = $count - $qty ; 
    
       $dataCurrentstock=array(
       'cur_stock_item_count'=>$Totalcount,
       );
      
       $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
       $this->db->update('tbl_current_stock',$dataCurrentstock);
  

     
}

public function purchasereturneditdeleterow(){
   $tid=$this->input->post('tid');
   $this->db->where('purreturn_trans_id',$tid);
   $this->db->delete('tbl_purchase_return_trans');
   $item=$this->input->post('item');
   $batch=$this->input->post('batch');
   $qty=$this->input->post('itemqty');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      

   
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
   
  
  
  
     
     $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $qty; 
  
      $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
      $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
      $this->db->update('tbl_inventory_stock',$datainventstock);
      date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      $now = date('Y-m-d H:i');

      $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
      'cur_stock_history_batchid'=> $batch,
      'cur_stock_history_item_count'=>$qty,
      'cur_stock_history_added_date'=>$now,
      'cur_stock_history_stock_master_id'=>$tid,
   'purpose'=>'B2c sale Row Delete',
'ip'=>1);
  
  $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
  
  
      $checkitem=$this->Admin_model->get_checkitem($item,$batch);
      $count=$checkitem->cur_stock_item_count;
      // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
       $Totalcount  = $count + $qty ; 
    
       $dataCurrentstock=array(
       'cur_stock_item_count'=>$Totalcount,
       );
      
       $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
       $this->db->update('tbl_current_stock',$dataCurrentstock);
  

     
}


public function dceditdeleterow(){
   $tid=$this->input->post('tid');
   $this->db->where('deliverychellan_trans_id',$tid);
   $this->db->delete('tbl_deliverychellan_trans');
   $item=$this->input->post('item');
   $batch=$this->input->post('batch');
   $qty=$this->input->post('itemqty');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      

   
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
   
  
  
  
     
     $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $qty; 
  
      $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
      $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
      $this->db->update('tbl_inventory_stock',$datainventstock);
  
  
      $checkitem=$this->Admin_model->get_checkitem($item,$batch);
      $count=$checkitem->cur_stock_item_count;
      // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
       $Totalcount  = $count + $qty ; 
    
       $dataCurrentstock=array(
       'cur_stock_item_count'=>$Totalcount,
       );
      
       $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
       $this->db->update('tbl_current_stock',$dataCurrentstock);

       date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
       $now = date('Y-m-d H:i:s');

       $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
       'cur_stock_history_batchid'=> $batch,
       'cur_stock_history_item_count'=>$qty,
       'cur_stock_history_added_date'=>$now,
       'cur_stock_history_stock_master_id'=>$tid,
    'purpose'=>'Delivery chellan row delete');
   
   $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
  

     
}
public function b2bsaleeditdeleterow(){
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i');
   $tid=$this->input->post('tid');
 
   $item=$this->input->post('item');
   $batch=$this->input->post('batch');
   $qty=$this->input->post('itemqty');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      

   
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
   
  
  
  
     
   //   $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $qty; 
  
   //    $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
   //    $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
   //    $this->db->update('tbl_inventory_stock',$datainventstock);

      $gettrans=$this->Admin_model->get_transb2bcolum($tid);
      //echo $gettrans->sales_trans_id;exit;
       if($gettrans->billing_branchqty!=null){
        $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'),$item,$batch);
     
        $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $gettrans->billing_branchqty; 
    
        $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
        $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
        $this->db->update('tbl_inventory_stock',$datainventstock);
       }
        if($gettrans->billing_godownqty!=null){
           
           $godownlist=$this->Admin_model->get_godownlistfetch();
           $goddownid=$godownlist->login_id;
           $checkinventstock_for_item1 = $this->Admin_model->get_check_inventstockitem($goddownid,$item,$batch);
     
           $totalstock_count1  = $checkinventstock_for_item1->inventory_stock_itemcount+ $gettrans->billing_godownqty; 
    
           $datainventstock1=array('inventory_stock_itemcount'=>$totalstock_count1);
           $this->db->where('inventory_stock_id',$checkinventstock_for_item1->inventory_stock_id);
           $this->db->update('tbl_inventory_stock',$datainventstock1);
       }
  
  
      $checkitem=$this->Admin_model->get_checkitem($item,$batch);
      $count=$checkitem->cur_stock_item_count;
      // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
       $Totalcount  = $count + $qty ; 
    
       $dataCurrentstock=array(
       'cur_stock_item_count'=>$Totalcount,
       );
      
       $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
       $this->db->update('tbl_current_stock',$dataCurrentstock);

       $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
       'cur_stock_history_batchid'=> $batch,
       'cur_stock_history_item_count'=>$qty,
       'cur_stock_history_added_date'=>$now,
       'cur_stock_history_stock_master_id'=>$tid,
    'purpose'=>'B2b sale Row Delete');
   
   $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);

   $this->db->where('billing_trans_id',$tid);
   $this->db->delete('tbl_billing_trans');

   $this->db->where('sale_type',2);
   $this->db->where('sale_order_id',$tid);
   $this->db->delete('tbl_staff_incentive');
}
public function saleordereditdeleterow(){
   $tid=$this->input->post('tid');
   $this->db->where('sales_order_trans_id',$tid);
   $this->db->delete('tbl_sales_order_trans');
  
  

     
}

public function b2csaleeditdeleterowedit(){
   $sid=$this->input->post('sid');
   $data_master=array('sales_master_note'=>$this->input->post('note'),
   'sales_master_veh_no'=>$this->input->post('vehiclenumber'),
   'sales_master_outstanding'=>$this->input->post('outstanding'),
   'sales_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_master_amount_paid'=>$this->input->post('paidamount'),
   'sales_master_delivery_charge'=>$this->input->post('deliverychare'),
   'sales_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'sales_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'sales_master_total_cess'=>$this->input->post('cessAmount'),
   'sales_master_round_off'=>$this->input->post('roundOfValuue'),
   'sales_master_grand_total'=>$this->input->post('grandTotal'),
   'sales_master_discount'=>$this->input->post('discount'));
   $this->db->where('sales_master_id',$sid);
   $this->db->update('tbl_sales_master',$data_master);

}

public function salesreturndeleterowedit(){
   $sid=$this->input->post('sid');
   $data_master=array('sales_return_note'=>$this->input->post('note'),
   
  
   'sales_return_amountpaid'=>$this->input->post('paidamount'),
   
   'sales_return_taxable_amnount'=>$this->input->post('totalTaxableAmount'),
   'sales_return_gst_amount'=>$this->input->post('amountGst'),
   'sales_return_totalcess'=>$this->input->post('cessAmount'),
   'salesreturn_roundoff'=>$this->input->post('roundOfValuue'),
   'sales_return_grandtotal'=>$this->input->post('grandTotal'),
   );
   $this->db->where('sales_return_id',$sid);
   $this->db->update('tbl_salesreturn',$data_master);

   $reftype=$this->input->post('saletype');
   $refnum=$this->input->post('refno');
   $batch=$this->input->post('batch');
   $itemqty=$this->input->post('itemqty');
 
   if($reftype==1){
    
      $salestrans=$this->Admin_model->get_salesb2ctrans($refnum,$batch);
      $incentiveamount=$salestrans->sales_trans_incentive_amount/$salestrans->sales_trans_qty;
      $salestransid=$salestrans->sales_trans_id;
   }else{

      $salestransb2b[$i]=$this->Admin_model->get_salesb2btrans($refnum,$batch);
      $incentiveamount=$salestransb2b->billing_incentive_amount/$salestransb2b->billing_trans_qty;
      $salestransid=$salestrans->billing_trans_id;
   }


   if($incentiveamount!=0){
       $getincentive=$this->Admin_model->get_staffincentivetrans($reftype,$salestransid);
       $amount=$itemqty*$incentiveamount;
       $finalAmount=$getincentive->amount+$amount;
       $data_incentive=array('amount'=>$finalAmount);
     
       $this->db->where('id',$getincentive->id);
       $this->db->update('tbl_staff_incentive',$data_incentive);
      }

}
public function purchasereturndeleterowedit(){
   $sid=$this->input->post('sid');
   $data_master=array('purreturn_master_notes'=>$this->input->post('note'),
   'purreturn_master_vehicleno'=>$this->input->post('vehiclenumber'),
   'purreturn_master_taxable_value'=>$this->input->post('totalTaxableAmount'),
   'purchase_return_gstamount'=>$this->input->post('amountGst'),
   'purreturn_master_roundoff'=>$this->input->post('roundOfValuue'),
   'purreturn_master_grandtotal'=>$this->input->post('grandTotal')
   );
   $this->db->where('purreturn_master_id',$sid);
   $this->db->update('tbl_purchase_return_master',$data_master);

}
public function dceditdeleterowedit(){



   $sid=$this->input->post('sid');
   $data_master=array('deliverychellan_master_note'=>$this->input->post('note'),
   'deliverychellan_master_vehicleno'=>$this->input->post('vehiclenumber'),
   
  
   'deliverychellan_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   
   'deliverychellan_master_roundoff'=>$this->input->post('roundOfValuue'),
   'deliverychellan_master_grandtotal'=>$this->input->post('grandTotal')
   );
   $this->db->where('deliverychellan_master_id ',$sid);
   $this->db->update('tbl_deliverychellan_master',$data_master);
}
public function b2bsaleeditdeleterowedit(){
   $sid=$this->input->post('sid');
   $data_master=array('billing_master_note'=>$this->input->post('note'),
   'billing_master_vehicleno'=>$this->input->post('vehiclenumber'),
   'billing_master_outstanding'=>$this->input->post('outstanding'),
   'billing_master_paymentmode'=>$this->input->post('paymod1'),
   'billing_master_paid_amount'=>$this->input->post('paidamount'),
   'billing_master_delivery_charge'=>$this->input->post('deliverychare'),
   'billing_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'billing_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'billing_master_roundoff'=>$this->input->post('roundOfValuue'),
   'billing_master_grandtotal'=>$this->input->post('grandTotal'),
   'billing_master_discount'=>$this->input->post('discount'));
   $this->db->where('billing_master_id',$sid);
   $this->db->update('tbl_billing_master',$data_master);  
}
public function b2csaleordereditdeleterowedit(){
   $sid=$this->input->post('sid');
   $data_master=array('sales_order_master_note'=>$this->input->post('note'),
   'sales_order_master_veh_no'=>$this->input->post('vehiclenumber'),
   'sales_order_master_outstanding'=>$this->input->post('outstanding'),
   'sales_order_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_order_master_amount_paid'=>$this->input->post('paidamount'),
   'sales_order_master_delivery_charge'=>$this->input->post('deliverychare'),
   'sales_order_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'sales_order_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'sales_order_master_total_cess'=>$this->input->post('cessAmount'),
   'sales_order_master_round_off'=>$this->input->post('roundOfValuue'),
   'sales_order_master_grand_total'=>$this->input->post('grandTotal'),
   'sales_order_master_discount'=>$this->input->post('discount'),
   'sales_edited_date'=>date('Y-m-d'));
   $this->db->where('sales_order_master_id',$sid);
   $this->db->update('tbl_sales_order_master',$data_master);
}


public function b2csaletranseditnew(){
   $ip =$_SERVER['HTTP_HOST'];

   $item=$this->input->post('item');
   //echo $item;exit;
   $batch=$this->input->post('batch');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
   
   $currentStockcount=$this->Admin_model->get_batch($batch);
   $itemcount  =  $this->input->post('itemqty');
   $itemoldqty  =  $this->input->post('oqty');
   $diff=$itemoldqty- $itemcount;

   $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $diff; 

   $totalcurrentstockcount=$currentStockcount->cur_stock_item_count + $diff;

   $forDiff=abs($diff);
 
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));

   if($totalcurrentstockcount<0){
      $status=0;
   }else{
     


   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $tid=$this->input->post('tid');
   $data_trans=array('sales_trans_itm_code'=>$this->input->post('code'),
   'sales_trans_qty'=>$this->input->post('itemqty'),
   'sales_trans_taxable_value'=>$this->input->post('taxable'),
   'sales_trans_hsn_code'=>$this->input->post('hsncode'),
   'sales_trans_gst_percentage'=>$this->input->post('gstper'),
   'sales_trans_gst_amount'=>$this->input->post('gstamount'),
   'sales_trans_cess'=>$this->input->post('cess'),
   'sales_trans_total'=>$this->input->post('total'),
   'sales_trans_item_id'=>$this->input->post('item'),
   'sales_trans_item_batch_id'=>$this->input->post('batch'),
   'sales_employee_name'=>$this->input->post('employee'),
   'sales_trans_unit_price'=>$this->input->post('unitprice'),
   'sales_trans_incentive_id'=>$this->input->post('inceid'),
   'sales_trans_incentive_amount'=>$this->input->post('inamount'),
   'sale_trans_mrp'=>$this->input->post('mrp'),
  );

  $data_incentiveupdate=array('staff_id'=>$this->input->post('employee'),
  'amount'=>$this->input->post('inamount'),
  'batch_id'=>$this->input->post('batch'),
  'unitprice'=>$this->input->post('total'));
  $this->db->where('sale_order_id',$tid);
  $this->db->where('sale_type',1);
  $this->db->update('tbl_staff_incentive',$data_incentiveupdate);


  
   $this->db->where('sales_trans_id',$tid);
   $this->db->update('tbl_sales_trans',$data_trans);
   $sid=$this->input->post('sid');
   $data_master=array('sales_master_note'=>$this->input->post('note'),
   'sales_master_veh_no'=>$this->input->post('vehiclenumber'),
   'sales_master_outstanding'=>$this->input->post('outstanding'),
   'sales_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_master_amount_paid'=>$this->input->post('paidamount'),
   'sales_master_delivery_charge'=>$this->input->post('deliverychare'),
   'sales_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'sales_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'sales_master_total_cess'=>$this->input->post('cessAmount'),
   'sales_master_round_off'=>$this->input->post('roundOfValuue'),
   'sales_master_grand_total'=>$this->input->post('grandTotal'),
   'sales_master_discount'=>$this->input->post('discount'),
   'sales_master_edited_date'=>$now,
   'sales_edited_system'=>"192.168.0.7");
   $this->db->where('sales_master_id',$sid);
   $this->db->update('tbl_sales_master',$data_master);

   $dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($this->input->post('cusid'));

   $balamount=$this->input->post('outstanding') + $dataoutcheck->outcus_amount -($this->input->post('outstanding_previous'));

   $dataoutupdate=array('outcusid_customer_id'=>$this->input->post('cusid'),
   'outcus_amount'=> $balamount);
   $this->db->where('outcusid_customer_id',$this->input->post('cusid'));

   if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
   $dataoutinserthistory=array('customer_id'=>$this->input->post('cusid'),
   'amount'=>$this->input->post('outstanding'),
   'order_master'=>$sid,
   'type'=>1);
   $this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);

   }



   //  $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
   //  $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
   //  $this->db->update('tbl_inventory_stock',$datainventstock);

    
    


    $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
    'cur_stock_history_batchid'=> $batch,
    'cur_stock_history_item_count'=>$diff,
    'cur_stock_history_added_date'=>$now,
    'cur_stock_history_stock_master_id'=>$sid,
    'purpose'=>'B2c sale Row Edit',
   'ip'=>$ip);

$this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);


    $checkitem=$this->Admin_model->get_checkitem($item,$batch);
    $count=$checkitem->cur_stock_item_count;
    // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
     $Totalcount  = $count + $diff ; 
  
     $dataCurrentstock=array(
     'cur_stock_item_count'=>$Totalcount,
     );
    
     $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
     $this->db->update('tbl_current_stock',$dataCurrentstock);

     $godownlist=$this->Admin_model->get_godownlistfetch();
     //echo $diff;exiit;
    
     if($diff<0){
      
      for($j=0;$j<$forDiff;$j++){

         
         
         $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
        
         
         if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){
           $gettrans[$j]=$this->Admin_model->get_transsalestable($tid);
            $totalstock_count2  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
            if($gettrans[$j]->sales_trans_branch==null){
               $barchstock[$j]=1;
            }else{
               $barchstock[$j]=$gettrans[$j]->sales_trans_branch+1;
            }

            $data_branch[$j]=array('sales_trans_branch'=>$barchstock[$j]);
            $this->db->where('sales_trans_id',$tid);
            $this->db->update('tbl_sales_trans',$data_branch[$j]);

            $datainventstock2=array('inventory_stock_itemcount'=>$totalstock_count2);
            $this->db->where('inventory_stock_id',$checkinventstock_for_item2[$j]->inventory_stock_id);
            $this->db->update('tbl_inventory_stock',$datainventstock2);

         }else{
           $gettrans[$j]=$this->Admin_model->get_transsalestable($tid);
           
              
             
              
            if($gettrans[$j]->sales_trans_godown==null){
               $barchstock1[$j]=1;
            }else{
               $barchstock1[$j]=$gettrans[$j]->sales_trans_godown+1;
            }
            //echo $barchstock1[$j];exit;
            $data_branch1[$j]=array('sales_trans_godown'=>$barchstock1[$j]);
            $this->db->where('sales_trans_id',$tid);
            $this->db->update('tbl_sales_trans',$data_branch1[$j]);

               $goddownid[$j]=$godownlist->login_id;
               $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid[$j],$item,$batch);
               $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount - 1; 
              // echo $checkinventstock_for_item1[$j]->inventory_stock_id;exit;
               $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
               $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
               $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
           
         }
       
      }
     }else{
    
      for($j=0;$j<$forDiff;$j++){

         
           $gettrans[$j]=$this->Admin_model->get_transsalestable($tid);
           
            if($gettrans[$j]->sales_trans_branch==null){
               $barchstock1[$j]=$gettrans[$j]->sales_trans_godown-1;
                 $data_branch1[$j]=array('sales_trans_godown'=>$barchstock1[$j]);
                  $this->db->where('sales_trans_id',$tid);
                  $this->db->update('tbl_sales_trans',$data_branch1[$j]);
      
                     $goddownid=$godownlist->login_id;
                     $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid,$item,$batch);
                     $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount + 1; 
         
                     $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
                     $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
                     $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
            }else{ 
               $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
        
               $barchstock[$j]=$gettrans[$j]->sales_trans_branch-1;
               $data_branch[$j]=array('sales_trans_branch'=>$barchstock[$j]);
               $this->db->where('sales_trans_id',$tid);
               $this->db->update('tbl_sales_trans',$data_branch[$j]);
               $totalstock_count2  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount + 1;
               $datainventstock2=array('inventory_stock_itemcount'=>$totalstock_count2);
               $this->db->where('inventory_stock_id',$checkinventstock_for_item2[$j]->inventory_stock_id);
               $this->db->update('tbl_inventory_stock',$datainventstock2);
            }

           
       
      }
     }
      
   
    
    
     

      $status=1;
   }

   echo $status;
 



   
    


}
public function salesreturneditrow(){
  
   $ip =$_SERVER['HTTP_HOST'];

   $item=$this->input->post('item');
   $batch=$this->input->post('batch');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      
   $itemcount  =  $this->input->post('itemqty');
   $itemoldqty  =  $this->input->post('oqty');
   $diff=$itemoldqty- $itemcount;

   $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount- $diff; 

 
 
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));

  


   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $tid=$this->input->post('tid');
  
   $data_trans=array('salesreturntrans_itemcode'=>$this->input->post('code'),
   'salesreturntrans_qty'=>$this->input->post('itemqty'),
   'salesreturntrans_taxable_amount'=>$this->input->post('taxable'),
   'salesreturntrans_hsncode'=>$this->input->post('hsncode'),
   'salesreturntrans_gst_percentage'=>$this->input->post('gstper'),
   'salesreturntrans_gst_amount'=>$this->input->post('gstamount'),
   'salesreturntrans_trans_cess'=>$this->input->post('cess'),
   'salesreturntrans_trans_total'=>$this->input->post('total'),
   'salesreturntrans_trans_item_id'=>$this->input->post('item'),
   'salesreturntrans_item_batch_id'=>$this->input->post('batch'),
   'salesreturntrans_employee_name'=>$this->input->post('employee'),
   'sales_trans_unit_price'=>$this->input->post('unitprice'),
   'salesreturntrans_incentive_id'=>$this->input->post('inceid'),
   'salesreturntrans_incentive_amount'=>$this->input->post('inamount')
  );




  
   $this->db->where('salesreturntrans_id',$tid);
   $this->db->update('tbl_salesreturn_trans',$data_trans);
 
   $sid=$this->input->post('sid');
   $data_master=array('sales_return_note'=>$this->input->post('note'),
   'sales_return_amountpaid'=>$this->input->post('paidamount'),
   'sales_return_taxable_amnount'=>$this->input->post('totalTaxableAmount'),
   'sales_return_gst_amount'=>$this->input->post('amountGst'),
   'salesreturn_roundoff'=>$this->input->post('roundOfValuue'),
   'sales_return_grandtotal'=>$this->input->post('grandTotal'),
   'sales_return_edited_date'=>$now,
   'sales_retuurn_edited_ip'=>"192.168.0.7");
  
   $this->db->where('sales_return_id',$sid);
   $this->db->update('tbl_salesreturn',$data_master);


                        $reftype=$this->input->post('saletype');
                        $refnum=$this->input->post('refno');
                      
                  
 
    $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
    $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
    $this->db->update('tbl_inventory_stock',$datainventstock);



    $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
    'cur_stock_history_batchid'=> $batch,
    'cur_stock_history_item_count'=>$itemcount,
    'cur_stock_history_added_date'=>$now,
    'cur_stock_history_stock_master_id'=>$sid,
    'purpose'=>'B2c sale Row Edit',
    'ip'=>$ip);

    $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);


    $checkitem=$this->Admin_model->get_checkitem($item,$batch);
    $count=$checkitem->cur_stock_item_count;
    // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
     $Totalcount  = $count - $diff ; 
  
     $dataCurrentstock=array(
     'cur_stock_item_count'=>$Totalcount,
     );
    
     $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
     $this->db->update('tbl_current_stock',$dataCurrentstock);
      $status=1;
  

   echo $status;
 



   
}

public function b2bsaletranseditnew(){
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
 
   

   $item=$this->input->post('item');
   $batch=$this->input->post('batch');
   $itemcount  =  $this->input->post('itemqty');
   $itemoldqty  =  $this->input->post('oqty');
   $diff=$itemoldqty- $itemcount;
   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
   $currentStockcount=$this->Admin_model->get_batch($batch);
   $totalcurrentstockcount=$currentStockcount->cur_stock_item_count + $diff;
 

   $forDiff=abs($diff);
 
 
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
 



   
    $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $diff; 

    if($totalcurrentstockcount<0){
      $status=0;
    }else{

      $tid=$this->input->post('tid');
      $data_trans=array('billing_trans_item_code'=>$this->input->post('code'),
      'billing_trans_qty'=>$this->input->post('itemqty'),
      'billing_trans_taxable_value'=>$this->input->post('taxable'),
      'billing_trans_hsn_code'=>$this->input->post('hsncode'),
      'billing_trans_gst_percentage'=>$this->input->post('gstper'),
      'billing_trans_gst_amount'=>$this->input->post('gstamount'),
      
      'billing_trans_total'=>$this->input->post('total'),
      'billing_item_id'=>$this->input->post('item'),
      'billing_item_batch_id'=>$this->input->post('batch'),
      'billing_employee_id'=>$this->input->post('employee'),
      'billing_trans_unitprice'=>$this->input->post('unitprice'),
      'billing_incentive_id'=>$this->input->post('inceid'),
      'billing_incentive_amount'=>$this->input->post('inamount'),
      'billing_trans_mrp'=>$this->input->post('mrp'),
     );
   
      $this->db->where('billing_trans_id',$tid);
      $this->db->update('tbl_billing_trans',$data_trans);

      $data_incentiveupdate=array('staff_id'=>$this->input->post('employee'),
      'amount'=>$this->input->post('inamount'),
      'batch_id'=>$this->input->post('batch'),
      'unitprice'=>$this->input->post('total'));
      $this->db->where('sale_order_id',$tid);
      $this->db->where('sale_type',2);
      $this->db->update('tbl_staff_incentive',$data_incentiveupdate);

   
      $sid=$this->input->post('sid');
      $data_master=array('billing_master_note'=>$this->input->post('note'),
      'billing_master_vehicleno'=>$this->input->post('vehiclenumber'),
      'billing_master_outstanding'=>$this->input->post('outstanding'),
      'billing_master_paymentmode'=>$this->input->post('paymod1'),
      'billing_master_paid_amount'=>$this->input->post('paidamount'),
      'billing_master_delivery_charge'=>$this->input->post('deliverychare'),
      'billing_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
      'billing_master_tot_gst_amount'=>$this->input->post('amountGst'),
      
      'billing_master_roundoff'=>$this->input->post('roundOfValuue'),
      'billing_master_grandtotal'=>$this->input->post('grandTotal'),
      'billing_master_discount'=>$this->input->post('discount'),
      'billing_master_tcs'=>$this->input->post('tcs')
      );
      $this->db->where('billing_master_id',$sid);
      $this->db->update('tbl_billing_master',$data_master);

      $dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($this->input->post('cusid'));
      
      
   
      $balamount=$this->input->post('outstanding') + $dataoutcheck->outcus_amount -($this->input->post('outstanding_previous'));

      $dataoutupdate=array('outcusid_customer_id'=>$this->input->post('cusid'),
      'outcus_amount'=> $balamount);
      $this->db->where('outcusid_customer_id',$this->input->post('cusid'));

      if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
      $dataoutinserthistory=array('customer_id'=>$this->input->post('cusid'),
      'amount'=>$this->input->post('outstanding'),
      'order_master'=>$sid,
      'type'=>2);
      $this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);
      
      }

    
   
   
       $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
       'cur_stock_history_batchid'=> $batch,
       'cur_stock_history_item_count'=>$itemcount,
       'cur_stock_history_added_date'=>$now,
       'cur_stock_history_stock_master_id'=>$sid,
       'purpose'=>'B2B sale Row Edit');
   
      $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
   
   
       $checkitem=$this->Admin_model->get_checkitem($item,$batch);
       $count=$checkitem->cur_stock_item_count;
     
        $Totalcount  = $count + $diff ; 
     
        $dataCurrentstock=array(
        'cur_stock_item_count'=>$Totalcount,
        );
       
        $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
        $this->db->update('tbl_current_stock',$dataCurrentstock);


        
 $godownlist=$this->Admin_model->get_godownlistfetch();
    
    
     
      
   
    




 if($diff<0){
      
   for($j=0;$j<$forDiff;$j++){ 

      $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'),$item,$batch);
     
      
      if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){
        $gettrans[$j]=$this->Admin_model->get_transb2bcolum($tid);
         $totalstock_count2  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
         if($gettrans[$j]->billing_branchqty==null){
            $barchstock[$j]=1;
         }else{
            $barchstock[$j]=$gettrans[$j]->billing_branchqty+1;
         }
  
         $data_branch[$j]=array('billing_branchqty'=>$barchstock[$j]);
         $this->db->where('billing_trans_id',$tid);
         $this->db->update('tbl_billing_trans',$data_branch[$j]);
  
         $datainventstock2=array('inventory_stock_itemcount'=>$totalstock_count2);
         $this->db->where('inventory_stock_id',$checkinventstock_for_item2[$j]->inventory_stock_id);
         $this->db->update('tbl_inventory_stock',$datainventstock2);
  
      }else{
        $gettrans[$j]=$this->Admin_model->get_transb2bcolum($tid);
        
           
          
           
         if($gettrans[$j]->billing_godownqty==null){
            $barchstock1[$j]=1;
         }else{
            $barchstock1[$j]=$gettrans[$j]->billing_godownqty+1;
         }
        //echo $barchstock1[$j];exit;
         $data_branch1[$j]=array('billing_godownqty'=>$barchstock1[$j]);
         $this->db->where('billing_trans_id',$tid);
         $this->db->update('tbl_billing_trans',$data_branch1[$j]);
  
            $goddownid=$godownlist->login_id;
            $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid,$item,$batch);
            $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount - 1; 
  
            $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
            $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
            $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
        
      }
    
   }
  }else{
 
   for($j=0;$j<$forDiff;$j++){

      
        $gettrans[$j]=$this->Admin_model->get_transb2bcolum($tid);
        
         if($gettrans[$j]->billing_branchqty==null){
            $barchstock1[$j]=$gettrans[$j]->billing_godownqty-1;
              $data_branch1[$j]=array('billing_godownqty'=>$barchstock1[$j]);
               $this->db->where('billing_trans_id ',$tid);
               $this->db->update('tbl_billing_trans',$data_branch1[$j]);
   
                  $goddownid=$godownlist->login_id;
                  $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid,$item,$batch);
                  $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount + 1; 
      
                  $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
                  $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
                  $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
         }else{ 
            $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
     
            $barchstock[$j]=$gettrans[$j]->billing_branchqty-1;
            $data_branch[$j]=array('billing_branchqty'=>$barchstock[$j]);
            $this->db->where('billing_trans_id ',$tid);
            $this->db->update('tbl_billing_trans',$data_branch[$j]);
            $totalstock_count2  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount + 1;
            $datainventstock2=array('inventory_stock_itemcount'=>$totalstock_count2);
            $this->db->where('inventory_stock_id',$checkinventstock_for_item2[$j]->inventory_stock_id);
            $this->db->update('tbl_inventory_stock',$datainventstock2);
         }

        
    
   }
  }


        $status=1;
    }

echo $status;

}





public function saleordertranseditnew(){

 


   $tid=$this->input->post('tid');
   $data_trans=array('sales_order_trans_itm_code'=>$this->input->post('code'),
   'sales_order_trans_qty'=>$this->input->post('itemqty'),
   'sales_order_trans_taxable_value'=>$this->input->post('taxable'),
   'sales_order_trans_hsn_code'=>$this->input->post('hsncode'),
   'sales_order_trans_gst_percentage'=>$this->input->post('gstper'),
   'sales_order_trans_gst_amount'=>$this->input->post('gstamount'),
   'sales_order_trans_cess'=>$this->input->post('cess'),
   'sales_order_trans_total'=>$this->input->post('total'),
   'sales_order_trans_item_id'=>$this->input->post('item'),
   'sales_order_batch_id'=>$this->input->post('batch'),
   'sales_order_employee'=>$this->input->post('employee'),
   'sales_order_unit_price'=>$this->input->post('unitprice'),
   'sales_order_incentive_id'=>$this->input->post('inceid'),
   'sales_order_incentive_amount'=>$this->input->post('inamount'),
   'sales_order_mrp'=>$this->input->post('mrp'));

   //echo $tid;exit;
   $this->db->where('sales_order_trans_id ',$tid);
   $this->db->update('tbl_sales_order_trans',$data_trans);
   $sid=$this->input->post('sid');
   $data_master=array('sales_order_master_note'=>$this->input->post('note'),
   'sales_order_master_veh_no'=>$this->input->post('vehiclenumber'),
   'sales_order_master_outstanding'=>$this->input->post('outstanding'),
   'sales_order_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_order_master_amount_paid'=>$this->input->post('paidamount'),
   'sales_order_master_delivery_charge'=>$this->input->post('deliverychare'),
   'sales_order_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
   'sales_order_master_tot_gst_amount'=>$this->input->post('amountGst'),
   'sales_order_master_total_cess'=>$this->input->post('cessAmount'),
   'sales_order_master_round_off'=>$this->input->post('roundOfValuue'),
   'sales_order_master_grand_total'=>$this->input->post('grandTotal'),
   'sales_order_master_discount'=>$this->input->post('discount'),
   'sales_edited_date'=>date('Y-m-d'));
   $this->db->where('sales_order_master_id',$sid);
   $this->db->update('tbl_sales_order_master',$data_master);

   

}
public function salesb2beditnew(){
   $this->sessionout();
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i');
$id=$this->input->post('master_id12');

$data['id']=$id;
$table ="tbl_billing_master";
$length = count($this->input->post('itemtotalamount2'));
$itemcode = $this->input->post('itemcode2');
$itemid = $this->input->post('itemid2');
$itemname = $this->input->post('itemname2');
$itembatch = $this->input->post('itembatch2');
$itemqnty = $this->input->post('itemqnty2');
$itemtaxable = $this->input->post('itemtaxable2');
$itemgstper = $this->input->post('itemgstper2');
$itemgstamount = $this->input->post('itemgstamount2');
$itemcessamount = $this->input->post('itemcessamount2');
$itemtotalamount = $this->input->post('itemtotalamount2');
$itemhsncode = $this->input->post('itemhsncode2');
$itemitemtbid = $this->input->post('itemitemtbid2');
$itembatchid = $this->input->post('itembatchid2');
$employee=$this->input->post('employee2');
$unitprice=$this->input->post('unitprice2');
$incentive_id=$this->input->post('incentive_id2');
$incentive_amount=$this->input->post('incentive_amount2');
$mrp=$this->input->post('mrp2');


$data = array(
   'billing_master_billno'=>$this->input->post('billno'),
   
   'billing_master_customer_name'=> $this->input->post('customername'),
   'billing_master_phoneno'=> $this->input->post('phonenumber'),
   'billing_master_vehicleno'=> $this->input->post('vehicleno'),
   'billing_master_customer_address'=> $this->input->post('address'),
   'billing_master_delivery_address'=> $this->input->post('deliveryaddress'),
   'billing_master_eway_billno'=> $this->input->post('ewaybillno'),
   'billing_master_customer_login_id'=> $this->input->post('customerloginid'),
   'billing_master_tot_taxable_amount'=> $this->input->post('totalTaxableAmount'),
   'billing_master_tot_gst_amount'=> $this->input->post('amountGst'),
   'billing_master_delivery_charge'=> $this->input->post('deliverychare'),
   'billing_master_discount'=> $this->input->post('discount'),
   'billing_master_roundoff'=> $this->input->post('roundOfValuue'),
   'billing_master_grandtotal'=> $this->input->post('grandTotal'),
   'billing_master_note'=> $this->input->post('note'),
   'billing_master_outstanding'=> $this->input->post('outstanding'),
   'billing_master_paid_amount'=> $this->input->post('paidamount'),
   'billing_master_paymentmode'=>$this->input->post('paymod1'),
   'billing_master_is_igst'=>$this->input->post('isigst'),
   'billing_master_cardnumber'=>$this->input->post('cardnumber'),
   'billing_master_chequenumber'=>$this->input->post('saleschequenumber'),
   'billing_master_transaction_id'=>$this->input->post('salestranscheque'),
   'billing_master_transaction_id'=>$this->input->post('bankamount'),
   'billing_master_bankamount'=>$this->input->post('bank')
   );

  
  
   $this->db->where('billing_master_id',$id);
   $this->db->update('tbl_billing_master',$data);
  
   $dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($this->input->post('customerloginid'));

   $balamount=$this->input->post('outstanding') + $dataoutcheck->outcus_amount -($this->input->post('outstanding_previous1'));

   $dataoutupdate=array('outcusid_customer_id'=>$this->input->post('customerloginid'),
   'outcus_amount'=> $balamount);
   $this->db->where('outcusid_customer_id',$this->input->post('customerloginid'));

   if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
   $dataoutinserthistory=array('customer_id'=>$this->input->post('customerloginid'),
   'amount'=>$this->input->post('outstanding'),
   'order_master'=>$id,
   'type'=>2);
   $this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);
   }
 
   for($i=0;$i<$length;$i++){
   
      $datatrans = array(
                     'billing_trans_billing_masterid' => $id,
                     'billing_trans_item_code' => $itemcode[$i],
                     'billing_trans_qty' => $itemqnty[$i],
                     'billing_trans_taxable_value' => $itemtaxable[$i],
                     'billing_trans_hsn_code' => $itemhsncode[$i],
                     'billing_trans_gst_percentage' => $itemgstper[$i],
                     'billing_trans_gst_amount' => $itemgstamount[$i],
                     'billing_trans_total' => $itemtotalamount[$i],
                    
                     'billing_trans_employee_sale_login_id'=>0,
                     'billing_item_id'=>$itemid[$i],
                     'billing_item_batch_id'=>$itembatchid[$i],
                     'billing_trans_batch'=>$itembatchid[$i],
                     'billing_employee_id'=>$employee[$i],
                     'billing_trans_unitprice'=>$unitprice[$i],
                     'billing_incentive_id'=>$incentive_id[$i],
                     'billing_incentive_amount'=>$incentive_amount[$i],
                     'billing_trans_mrp'=>$mrp[$i]
                     );
                     //echo "<pre>";print_r($datatrans);exit;
                  $this->Admin_model->addrowtotable('tbl_billing_trans',$datatrans);
                 
                  $b2btransid[$i]=$this->db->insert_id();
     
                  $data_incentive=array('staff_id'=>$employee[$i],
                  'added_date'=>date('y-m-d'),
                  'sale_type'=>'2',
                  'amount'=>$incentive_amount[$i],
                  'sale_order_id'=>$b2btransid[$i],
                  'batch_id'=>$itembatchid[$i],
                  'unitprice'=> $itemtotalamount[$i],
                  'billnumber'=>$this->input->post('billno'));
                  $this->db->insert('tbl_staff_incentive',$data_incentive);
 

                  $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);

                  $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
            
    


                  // if($checkinventstock_for_item[$i]==null){
            
            
                  //    echo "stock not available";exit;
                   
            
                  // }else{
                    // echo "hi gopika";
            
                     $count[$i]=$checkitem[$i]->cur_stock_item_count;
                     $Totalcount[$i]=$count[$i]-$itemqnty[$i];
                  
                     $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                              'current_stock_batch_id'=>$itembatchid[$i],
                                             'cur_stock_item_count'=>$Totalcount[$i],
                                             'added_date'=>$now,
                                             'stock_master_id'=>$id);
            
                     $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                                                'cur_stock_history_batchid'=>$itembatchid[$i],
                                                'cur_stock_history_item_count'=>$itemqnty[$i],
                                                'cur_stock_history_added_date'=>$now,
                                                'cur_stock_history_stock_master_id'=>$id,
                                             'purpose'=>'B2b edit insert');
            
                     $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            
                     $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                     $this->db->update('tbl_current_stock',$dataCurrentstock);
            
                     
                     if(is_numeric($itemqnty[$i])){
                 
                     //$checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                 
                     $godownlist=$this->Admin_model->get_godownlistfetch();
                   
                     if($checkinventstock_for_item[$i]->inventory_stock_itemcount!=0){
                     
                        for($j=0;$j<$itemqnty[$i];$j++){
   
                           
   
                           $gettrans[$i]=$this->Admin_model->get_transb2bcolum($b2btransid[$i]);
                          
                           $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                          
                           
                           if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){
   
                              $totalstock_count  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
                              if($gettrans[$i]->billing_branchqty==null){
                                 $barchstock[$j]=1;
                              }else{
                                 $barchstock[$j]=$gettrans[$i]->billing_branchqty+1;
                              }
   
                              $data_branch[$j]=array('billing_branchqty'=>$barchstock[$j]);
                              $this->db->where('billing_trans_id',$b2btransid[$i]);
                              $this->db->update('tbl_billing_trans',$data_branch[$j]);
               
                              $datainventstock2=array('inventory_stock_itemcount'=>$totalstock_count);
                              $this->db->where('inventory_stock_id',$checkinventstock_for_item2[$j]->inventory_stock_id);
                              $this->db->update('tbl_inventory_stock',$datainventstock2);
   
                           }else{
                             
                             
   
                              if($gettrans[$i]->billing_godownqty==null){
                                 $barchstock1[$j]=1;
                              }else{
                                 $barchstock1[$j]=$gettrans[$i]->billing_godownqty+1;
                              }
                             
                                    $data_branch1[$j]=array('billing_godownqty'=>$barchstock1[$j]);
                                    $this->db->where('billing_trans_id',$b2btransid[$i]);
                                    $this->db->update('tbl_billing_trans',$data_branch1[$j]);
   
                                 $goddownid=$godownlist->login_id;
                                 $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid,$itemid[$i],$itembatchid[$i]);
                                 // echo "<pre>";print_r($checkinventstock_for_item1[$j]);exit;
                                 $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount - 1; 
                     
                                 $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
                                 $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
                                 $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
                             
                           }
   
                        }
                      
                       
                     }else{
   
                    
                     
                       
   
                           $gettrans[$i]=$this->Admin_model->get_transb2bcolum($b2btransid[$i]);

                           //echo "<pre>";print_r($gettrans[$i]);exit;
                           
                            if($gettrans[$i]->billing_godownqty==null){
                                 $barchstock2[$i]=1;
                              }else{
                                 $barchstock2[$i]=$gettrans[$i]->billing_godownqty+1;
                              }
                          
                           $data_branch2[$i]=array('billing_godownqty'=>$barchstock2[$i]);
                          // echo "<pre>";print_r($data_branch2[$i]);exit;
                           $this->db->where('billing_trans_id',$b2btransid[$i]);
                           $this->db->update('tbl_billing_trans',$data_branch2[$i]);
                          
   
                           $goddownid[$i]=$godownlist->login_id;
                          
                           $checkinventstock_for_item3[$i] = $this->Admin_model->get_check_inventstockitem($goddownid[$i],$itemid[$i],$itembatchid[$i]);
                           $totalstock_count2[$i]  = $checkinventstock_for_item3[$i]->inventory_stock_itemcount - $itemqnty[$i]; 
                           
                           $datainventstock[$i]=array('inventory_stock_itemcount'=>$totalstock_count2[$i]);
                          
                           $this->db->where('inventory_stock_id',$checkinventstock_for_item3[$i]->inventory_stock_id);
                           $this->db->update('tbl_inventory_stock',$datainventstock[$i]);
                      
   
                     }
                  }else{
                     $checkinventstock_for_item3[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'),$itemid[$i],$itembatchid[$i]);
                     // echo "<pre>";print_r($checkinventstock_for_item3[$j]);exit;
                      $totalstock_count3[$i]=$checkinventstock_for_item3[$i]->inventory_stock_itemcount-$itemqnty[$i];  
                      $datainventstock3[$i]=array('inventory_stock_itemcount'=>$totalstock_count3[$i]);
                     // echo "<pre>";print_r($datainventstock3[$i]);exit;
                      $this->db->where('inventory_stock_id',$checkinventstock_for_item3[$i]->inventory_stock_id);
                      $this->db->update('tbl_inventory_stock',$datainventstock3[$i]);
                  }
                  
                  // }
                  

   }

   redirect('b2bsaleedit/'.$id);
}
public function deliverychellannewrowedit(){
   $this->sessionout();
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
$now = date('Y-m-d H:i');
$id=$this->input->post('master_id12');


$data['id']=$id;
$table ="tbl_deliverychellan_master";
$length = count($this->input->post('itemtotalamount2'));
$itemcode = $this->input->post('itemcode2');
$itemid = $this->input->post('itemid2');
$itemname = $this->input->post('itemname2');
$itembatch = $this->input->post('itembatch2');
$itemqnty = $this->input->post('itemqnty2');
$itemtaxable = $this->input->post('itemtaxable2');
$itemgstper = $this->input->post('itemgstper2');


$itemtotalamount = $this->input->post('itemtotalamount2');
$itemhsncode = $this->input->post('itemhsncode2');
$itemitemtbid = $this->input->post('itemitemtbid2');
$itembatchid = $this->input->post('itembatchid2');

$unitprice=$this->input->post('unitprice2');



$data = array(
   'deliverychellan_master_consignee_name'=>$this->input->post('consignee_name'),
   'dc_master_customer_gstin'=>$this->input->post('customer_gstin'),
   'deliverychellan_master_vehicleno'=> $this->input->post('vehicleno'),
   'dc_master_transport_mode'=> $this->input->post('transport_mode'),
   'dc_master_transpor_purpose'=> $this->input->post('transport_purpose'),
   'deliverychellan_master_consignee_address'=> $this->input->post('consignee_address'),
   'deliverychellan_master_tot_taxable_amount'=> $this->input->post('totalTaxableAmount'),
   'deliverychellan_master_roundoff'=>$this->input->post('roundOfValuue'),
   'deliverychellan_master_grandtotal'=> $this->input->post('grandTotal'),
   'deliverychellan_master_note'=> $this->input->post('note'),
   'deliverychellan_master_is_igst'=> $this->input->post('isigst'),
   'dc_master_despatch_date'=> $this->input->post('despatch_date'),
   'deliverychellan_gst_number'=> $this->input->post('gstnumber')
   );
  
   $this->db->where('deliverychellan_master_id',$id);
   $this->db->update('tbl_deliverychellan_master',$data);

 
   for($i=0;$i<$length;$i++){
   
      $datatrans = array(
                     'deliverychellan_trans_billing_masterid' => $id,
                     'deliverychellan_trans_item_code' => $itemcode[$i],
                     'deliverychellan_trans_qty' => $itemqnty[$i],
                     'deliverychellan_trans_taxable_value' => $itemtaxable[$i],
                     'deliverychellan_trans_hsn_code' => $itemhsncode[$i],
                     'deliverychellan_trans_gst_percentage' => $itemgstper[$i],
                     'deliverychellan_trans_gst_amount' => $itemgstamount[$i],
                     'deliverychellan_trans_total' => $itemtotalamount[$i],
                     'deliverychellan_trans_batch' => $itembatchid[$i],
                     'deliverychellan_item_id' => $itemid[$i],
                     'deliverychellan_item_batch_id'=>$itembatchid[$i],
                     'deliverychellan_trans_branchprice'=>$unitprice[$i]
                     );
                  $this->Admin_model->addrowtotable('tbl_deliverychellan_trans',$datatrans);
                  $dctransid[$i]=$this->db->insert_id();

                  $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                  $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
            


               
            
                     $count[$i]=$checkitem[$i]->cur_stock_item_count;
                     $Totalcount[$i]=$count[$i]-$itemqnty[$i];
                  
                     $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                              'current_stock_batch_id'=>$itembatchid[$i],
                                             'cur_stock_item_count'=>$Totalcount[$i],
                                             'added_date'=>$now,
                                             'stock_master_id'=>$dctransid[$i]);
            
                     $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                                                'cur_stock_history_batchid'=>$itembatchid[$i],
                                                'cur_stock_history_item_count'=>$itemqnty[$i],
                                                'cur_stock_history_added_date'=>$now,
                                                'cur_stock_history_stock_master_id'=>$dctransid[$i],
                                             'purpose'=>'DC Edit  insert');
            
                     $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            
                     $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                     $this->db->update('tbl_current_stock',$dataCurrentstock);
            
                     if(is_numeric($itemqnty[$i])){

                
                

                  $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                 
                  
                  $godownlist=$this->Admin_model->get_godownlistfetch();
                
                  if($checkinventstock_for_item[$i]->inventory_stock_itemcount!=0){
                  
                     for($j=0;$j<$itemqnty[$i];$j++){

                        

                        $gettrans[$i]=$this->Admin_model->get_deliverychellantransid($dctransid[$i]);
                       // echo "<pre>";print_r($gettrans[$i]);exit;
                        $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                       
                        
                        if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){

                           $totalstock_count  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
                           if($gettrans[$i]->sales_trans_branch==null){
                              $barchstock[$j]=1;
                           }else{
                              $barchstock[$j]=$gettrans[$i]->deliverchellan_branch+1;
                           }

                           $data_branch[$j]=array('deliverchellan_branch'=>$barchstock[$j]);
                           $this->db->where('deliverychellan_trans_id',$dctransid[$i]);
                           $this->db->update('tbl_deliverychellan_trans',$data_branch[$j]);
            
                           $datainventstock2=array('inventory_stock_itemcount'=>$totalstock_count);
                           $this->db->where('inventory_stock_id',$checkinventstock_for_item2[$j]->inventory_stock_id);
                           $this->db->update('tbl_inventory_stock',$datainventstock2);

                        }else{
                          
                          

                           if($gettrans[$i]->deliverychellan_godown==null){
                              $barchstock1[$j]=1;
                           }else{
                              $barchstock1[$j]=$gettrans[$i]->deliverychellan_godown+1;
                           }
                          
                                 $data_branch1[$j]=array('deliverychellan_godown'=>$barchstock1[$j]);
                                 $this->db->where('deliverychellan_trans_id',$dctransid[$i]);
                                 $this->db->update('tbl_deliverychellan_trans',$data_branch1[$j]);

                              $goddownid=$godownlist->login_id;
                              $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid,$itemid[$i],$itembatchid[$i]);
                              // echo "<pre>";print_r($checkinventstock_for_item1[$j]);exit;
                              $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount - 1; 
                  
                              $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
                              $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
                              $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
                          
                        }

                     }
                   
                    
                  }else{

                 
                  
                    

                        $gettrans[$i]=$this->Admin_model->get_deliverychellantransid($dctransid[$i]);
                        
                        //  if($gettrans[$i]->sales_trans_godown==null){
                        //       $barchstock2[$i]=1;
                        //    }else{
                        //       $barchstock2[$i]=$gettrans[$i]->sales_trans_godown+1;
                        //    }
                       
                        $data_branch2[$i]=array('deliverychellan_godown'=>$itemqnty[$i]);
                        $this->db->where('deliverychellan_trans_id',$dctransid[$i]);
                        $this->db->update('tbl_sales_trans',$data_branch2[$i]);


                        $goddownid=$godownlist->login_id;
                        $checkinventstock_for_item1[$i] = $this->Admin_model->get_check_inventstockitem($goddownid, $itemid[$i],$itembatchid[$i]);
                        $totalstock_count2[$i]  = $checkinventstock_for_item1[$i]->inventory_stock_itemcount - $itemqnty[$i]; 
            
                        $datainventstock[$i]=array('inventory_stock_itemcount'=>$totalstock_count2[$i]);
                        $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$i]->inventory_stock_id);
                        $this->db->update('tbl_inventory_stock',$datainventstock[$i]);
                   

                  }
               }else{
                  $checkinventstock_for_item3[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'),$itemid[$i],$itembatchid[$i]);
                  // echo "<pre>";print_r($checkinventstock_for_item3[$j]);exit;
                   $totalstock_count3[$i]=$checkinventstock_for_item3[$i]->inventory_stock_itemcount-$itemqnty[$i];  
                   $datainventstock3[$i]=array('inventory_stock_itemcount'=>$totalstock_count3[$i]);
                  // echo "<pre>";print_r($datainventstock3[$i]);exit;
                   $this->db->where('inventory_stock_id',$checkinventstock_for_item3[$i]->inventory_stock_id);
                   $this->db->update('tbl_inventory_stock',$datainventstock3[$i]);
               }
                  

   }

   redirect('deliverychellan_edit/'.$id);
}

public function sessionout(){
   if($this->session->userdata('id')==null){
      $this->session->unset_userdata('id');
      redirect('Admin');
   }else{
      return true;
   }
}

public function salesb2ceditnew(){
$this->sessionout();
date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
$now = date('Y-m-d H:i');
$id=$this->input->post('master_id12');

$data['id']=$id;
$table ="tbl_sales_master";
$length = count($this->input->post('itemtotalamount2'));

$itemcode = $this->input->post('itemcode2');
$itemid = $this->input->post('puritemid2');
$itemname = $this->input->post('itemname2');
$itembatch = $this->input->post('itembatch2');
$itemqnty = $this->input->post('itemqnty2');
$itemtaxable = $this->input->post('itemtaxable2');
$itemgstper = $this->input->post('itemgstper2');
$itemgstamount = $this->input->post('itemgstamount2');
$itemcessamount = $this->input->post('itemcessamount2');
$itemtotalamount = $this->input->post('itemtotalamount2');
$itemhsncode = $this->input->post('itemhsncode2');
$itemitemtbid = $this->input->post('itemitemtbid2');
$itembatchid = $this->input->post('itembatchid2');
$employee=$this->input->post('employee2');
$unitprice=$this->input->post('unitprice2');
$incentive_id=$this->input->post('incentive_id2');
$incentive_amount=$this->input->post('incentive_amount2');
$mrp=$this->input->post('mrp2');




$data = array(
   'sales_master_bill_no'=>$this->input->post('billno'),
   'sales_master_date'=>date("Y-m-d", strtotime($this->input->post('billdate')) ),
   'sales_master_customer_name'=> $this->input->post('customername'),
   'sales_master_delivery_date'=> $this->input->post('deliverydate'),
   'sales_master_phone_no'=> $this->input->post('phonenumber'),
   'sales_master_veh_no'=> $this->input->post('vehicleno'),
   'sales_master_customer_address'=> $this->input->post('address'),
   'sales_master_delivery_address'=> $this->input->post('deliveryaddress'),
   'sales_master_eway_billno'=> $this->input->post('ewaybillno'),
   'sales_master_login_id'=>$this->session->userdata('id'),
   'sales_master_customer_login_id'=> $this->input->post('customerloginid'),
   'sales_master_tot_taxable_amount'=> $this->input->post('totalTaxableAmount'),
   'sales_master_tot_gst_amount'=> $this->input->post('amountGst'),
   'sales_master_delivery_charge'=> $this->input->post('deliverychare'),
   'sales_master_total_cess'=> 0,
   'sales_master_discount'=> $this->input->post('discount'),
   'sales_master_round_off'=> $this->input->post('roundOfValuue'),
   'sales_master_grand_total'=> $this->input->post('grandTotal'),
   'sales_master_note'=> $this->input->post('note'),
   'sales_master_outstanding'=> $this->input->post('outstanding'),
   'sales_master_amount_paid'=> $this->input->post('paidamount'),
   'sales_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_master_is_igst'=>$this->input->post('isigst'),
   'sales_master_cardnum'=>$this->input->post('cardnumber'),
   'sales_master_cheque_no'=>$this->input->post('saleschequenumber'),
   'sales_master_banktransaction_id'=>$this->input->post('salestranscheque'),
   'sales_master_bankamount'=>$this->input->post('bankamount'),
   'sales_master_bank'=>$this->input->post('bank'),
   'sales_master_financetype'=>$this->input->post('finance'),
   'sales_master_trans_mode'=>$this->input->post('transmode'),
   'sales_master_finance_id'=>$this->input->post('financeid'),
   'sales_master_edited_date'=>$now,
   'sales_edited_system'=>"192.168.0.7"
   
   );
  
   $this->db->where('sales_master_id',$id);
   $this->db->update('tbl_sales_master',$data);

   $dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($this->input->post('customerloginid'));
 
   $balamount=$this->input->post('outstanding') + $dataoutcheck->outcus_amount-($this->input->post('outstanding_previous1'));

   $dataoutupdate=array('outcusid_customer_id'=>$this->input->post('customerloginid'),
   'outcus_amount'=> $balamount);
   $this->db->where('outcusid_customer_id',$this->input->post('customerloginid'));

   if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
   $dataoutinserthistory=array('customer_id'=>$this->input->post('customerloginid'),
   'amount'=>$this->input->post('outstanding'),
   'order_master'=>$id,
   'type'=>1);
   $this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);
   }

   for($i=0;$i<$length;$i++){
   
      $datatrans = array(
                     'sales_trans_master_id' => $id,
                     'sales_trans_itm_code' => $itemcode[$i],
                     'sales_trans_qty' => $itemqnty[$i],
                     'sales_trans_taxable_value' => $itemtaxable[$i],
                     'sales_trans_hsn_code' => $itemhsncode[$i],
                     'sales_trans_itm_code' => $itemcode[$i],
                     'sales_trans_gst_percentage' => $itemgstper[$i],
                     'sales_trans_gst_amount' => $itemgstamount[$i],
                     'sales_trans_cess' => 0,
                     'sales_trans_total' => $itemtotalamount[$i],
                     'sales_trans_item_id'=>$itemid[$i],
                     'sales_trans_item_batch_id'=>$itembatchid[$i],
                     'sales_employee_name'=>$employee[$i],
                     'sales_trans_unit_price'=>$unitprice[$i],
                     'sales_trans_incentive_id'=>$incentive_id[$i],
                     'sales_trans_incentive_amount'=>$incentive_amount[$i],
                     'sale_trans_mrp'=>$mrp[$i]
                     );
                  $this->Admin_model->addrowtotable('tbl_sales_trans',$datatrans);

                  $b2btransid[$i]=$this->db->insert_id();
     
                  $data_incentive=array('staff_id'=>$employee[$i],
                  'added_date'=>date('y-m-d'),
                  'sale_type'=>'1',
                  'amount'=>$incentive_amount[$i],
                  'sale_order_id'=>$b2btransid[$i],
                  'batch_id'=>$itembatchid[$i],
                  'unitprice'=> $itemtotalamount[$i],
                  'billnumber'=> $this->input->post('billno'));
                  $this->db->insert('tbl_staff_incentive',$data_incentive);

                  $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                  $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
            


                  // if($checkinventstock_for_item[$i]==null){
            
            
                  //    echo "stock not available";exit;
                   
            
                  // }else{
                    // echo "hi gopika";
            
                     $count[$i]=$checkitem[$i]->cur_stock_item_count;
                     $Totalcount[$i]=$count[$i]-$itemqnty[$i];
                  
                     $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                              'current_stock_batch_id'=>$itembatchid[$i],
                                             'cur_stock_item_count'=>$Totalcount[$i],
                                             'added_date'=>$now,
                                             'stock_master_id'=>$id);
            
                     $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                                                'cur_stock_history_batchid'=>$itembatchid[$i],
                                                'cur_stock_history_item_count'=>$itemqnty[$i],
                                                'cur_stock_history_added_date'=>$now,
                                                'cur_stock_history_stock_master_id'=>$id,
                                             'purpose'=>'B2c Edit  insert');
            
                     $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            
                     $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                     $this->db->update('tbl_current_stock',$dataCurrentstock);
            
                     if(is_numeric($itemqnty[$i])){  
                
                  // $totalstock_count  = $checkinventstock_for_item[$i]->inventory_stock_itemcount - $itemqnty[$i]; 
            
                  // $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
                  // $this->db->where('inventory_stock_id',$checkinventstock_for_item[$i]->inventory_stock_id);
                  // $this->db->update('tbl_inventory_stock',$datainventstock);

                  $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                 
                   //echo "<pre>";print_r($checkinventstock_for_item[$i]);exit;
                  $godownlist=$this->Admin_model->get_godownlistfetch();
                
                  if($checkinventstock_for_item[$i]->inventory_stock_itemcount!=0){
                  
                     for($j=0;$j<$itemqnty[$i];$j++){

                        

                        $gettrans[$i]=$this->Admin_model->get_transsalestable($b2btransid[$i]);
                       // echo "<pre>";print_r($gettrans[$i]);exit;
                        $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                       
                        
                        if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){

                           $totalstock_count  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
                           if($gettrans[$i]->sales_trans_branch==null){
                              $barchstock[$j]=1;
                           }else{
                              $barchstock[$j]=$gettrans[$i]->sales_trans_branch+1;
                           }

                           $data_branch[$j]=array('sales_trans_branch'=>$barchstock[$j]);
                           $this->db->where('sales_trans_id',$b2btransid[$i]);
                           $this->db->update('tbl_sales_trans',$data_branch[$j]);
            
                           $datainventstock2=array('inventory_stock_itemcount'=>$totalstock_count);
                           $this->db->where('inventory_stock_id',$checkinventstock_for_item2[$j]->inventory_stock_id);
                           $this->db->update('tbl_inventory_stock',$datainventstock2);

                        }else{
                          
                          

                           if($gettrans[$i]->sales_trans_godown==null){
                              $barchstock1[$j]=1;
                           }else{
                              $barchstock1[$j]=$gettrans[$i]->sales_trans_godown+1;
                           }
                          
                                 $data_branch1[$j]=array('sales_trans_godown'=>$barchstock1[$j]);
                                 $this->db->where('sales_trans_id',$b2btransid[$i]);
                                 $this->db->update('tbl_sales_trans',$data_branch1[$j]);

                              $goddownid=$godownlist->login_id;
                              $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid,$itemid[$i],$itembatchid[$i]);
                              // echo "<pre>";print_r($checkinventstock_for_item1[$j]);exit;
                              $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount - 1; 
                  
                              $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
                              $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
                              $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
                          
                        }

                     }
                   
                    
                  }else{

                 
                  
                    

                        $gettrans[$i]=$this->Admin_model->get_transsalestable($b2btransid[$i]);
                        
                        //  if($gettrans[$i]->sales_trans_godown==null){
                        //       $barchstock2[$i]=1;
                        //    }else{
                        //       $barchstock2[$i]=$gettrans[$i]->sales_trans_godown+1;
                        //    }
                       
                        $data_branch2[$i]=array('sales_trans_godown'=>$itemqnty[$i]);
                        $this->db->where('sales_trans_id',$b2btransid[$i]);
                        $this->db->update('tbl_sales_trans',$data_branch2[$i]);


                        $goddownid=$godownlist->login_id;
                        $checkinventstock_for_item1[$i] = $this->Admin_model->get_check_inventstockitem($goddownid, $itemid[$i],$itembatchid[$i]);
                        $totalstock_count2[$i]  = $checkinventstock_for_item1[$i]->inventory_stock_itemcount - $itemqnty[$i]; 
            
                        $datainventstock[$i]=array('inventory_stock_itemcount'=>$totalstock_count2[$i]);
                        $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$i]->inventory_stock_id);
                        $this->db->update('tbl_inventory_stock',$datainventstock[$i]);
                   

                  }
                  
                  // }
                  

   }
else{
   $checkinventstock_for_item3[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'),$itemid[$i],$itembatchid[$i]);
   // echo "<pre>";print_r($checkinventstock_for_item3[$j]);exit;
    $totalstock_count3[$i]=$checkinventstock_for_item3[$i]->inventory_stock_itemcount-$itemqnty[$i];  
    $datainventstock3[$i]=array('inventory_stock_itemcount'=>$totalstock_count3[$i]);
   // echo "<pre>";print_r($datainventstock3[$i]);exit;
    $this->db->where('inventory_stock_id',$checkinventstock_for_item3[$i]->inventory_stock_id);
    $this->db->update('tbl_inventory_stock',$datainventstock3[$i]);
}
   }
   redirect('saleb2cedit/'.$id);

}

public function purchasereturnaddnew(){
   $this->sessionout();
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i');
$id=$this->input->post('master_id12');

$data['id']=$id;
$table ="tbl_purchase_return_master";

$length = count($this->input->post('itemtotalamount2'));
   
$itemcode = $this->input->post('itemcode2');
$itemid = $this->input->post('itemid2');
$itemname = $this->input->post('itemname2');
//$itembatch = $this->input->post('itembatch');
$itemqnty = $this->input->post('itemqnty2');
$itemtaxable = $this->input->post('itemtaxable2');
$itemgstper = $this->input->post('itemgstper2');
$itemgstamount = $this->input->post('itemgstamount2');
$itemcessamount = $this->input->post('itemcessamount2');
$itemtotalamount = $this->input->post('itemtotalamount2');
$itemhsncode = $this->input->post('itemhsncode2');

$mrp=$this->input->post('mrp2');
$itembatchid = $this->input->post('itembatchid2');
$unitprice=$this->input->post('unitprice2');

$data_where=array('paybal_supplier_id'=>$this->input->post('supplier'),
'paybal_bill_number'=>$this->input->post('listbillno'),
'status'=>7);
$supplierpay=$this->Admin_model->checksupplierpaubalance($data_where);
//echo "<pre>";print_r($supplierpay);exit;

$purchaseBill=$this->Admin_model->checkReturnpurchasebill($id);
if($supplierpay!=null){
   
   $returnamount=$this->input->post('grandTotal');
   $purchasereturnamount=$purchaseBill->purreturn_master_grandtotal;
  // echo $purchasereturnamount;exit;
   $difference=$purchasereturnamount-$returnamount;
  // echo $difference;exit;
   $totalAmount=$supplierpay->paybal_amount+$difference;
  $data_outstanding=array('paybal_amount'=>$totalAmount);
  //echo "<pre>";print_r($data_outstanding);exit;
  $this->db->where($data_where);
  $this->db->update('tbl_supplier_paybalance',$data_outstanding);
}


$data = array(
   'purreturn_master_ref_no'=>$this->input->post('refno'),
   'purreturn_master_supplier'=>$this->input->post('supplier'),
   'purreturn_master_date'=>$this->input->post('date'),
   'purreturn_master_tot_quantity'=>$this->input->post('totalqnty'),
   'purreturn_master_roundoff'=>$this->input->post('roundOfValuue'),
   'purreturn_master_phoneno'=> $this->input->post('phone_num'),
   'purreturn_master_ewbno'=> $this->input->post('ewb_num'),
   'purreturn_master_address'=>$this->input->post('address'),
  
   'purreturn_master_billno'=>$this->input->post('bill_no'),
   'purreturn_master_sub_crnno'=>$this->input->post('supcrn_num'),
   'purreturn_master_gstnum'=>$this->input->post('gst_num'),
   'purreturn_master_is_igst'=>$this->input->post('isigst'),
   'purreturn_master_notes'=>$this->input->post('notes'),
   'purreturn_master_vehicleno'=>$this->input->post('vehicle_num'),
   'purreturn_master_taxable_value'=>$this->input->post('totalTaxableAmount'),
   'purreturn_master_taxable_value'=>$this->input->post('totalTaxableAmount'),
   'purreturn_master_tot_quantity'=>$this->input->post('totalqnty'),
    'purreturn_master_grandtotal'=>$this->input->post('grandTotal'),
    'purchase_return_gstamount'=>$this->input->post('amountGst'),
    'purchase_return_time'=>date("h:i:s", strtotime($now))
 
  );
  //echo "<pre>";print_r($data);exit;
  
   $this->db->where('purreturn_master_id',$id);
   $this->db->update('tbl_purchase_return_master',$data);

   
   for($i=0;$i<$length;$i++){
   
      $datatrans = array(
         'purreturn_trans_purreturn_master_id' => $id,
         'purreturn_trans_item_code' => $itemcode[$i],
         'purreturn_trans_qty' => $itemqnty[$i],
         'purreturn_trans_taxable_value' => $itemtaxable[$i], 
         'purreturn_trans_gst_percentage' => $itemgstper[$i],
         'purreturn_trans_gst_amount' => $itemgstamount[$i],
         'purreturn_trans_total' => $itemtotalamount[$i],
         'purreturn_item_id'=>$itemid[$i],
         'purreturn_item_batch_id'=>$itembatchid[$i],
         'purreturn_trans_batch'=>$itembatchid[$i],
         'purreturn_trans_rate'=>$unitprice[$i],
         'purchasereturn_trans_mrp'=>$mrp[$i]
      );
                  $this->Admin_model->addrowtotable('tbl_purchase_return_trans',$datatrans);

                  $b2btransid=$this->db->insert_id();
     
           

                  $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                  $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
            

            
                     $count[$i]=$checkitem[$i]->cur_stock_item_count;
                     $Totalcount[$i]=$count[$i]-$itemqnty[$i];
                  
                     $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                              'current_stock_batch_id'=>$itembatchid[$i],
                                             'cur_stock_item_count'=>$Totalcount[$i],
                                             'added_date'=>$now,
                                             'stock_master_id'=>$id);
            
                     $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                                                'cur_stock_history_batchid'=>$itembatchid[$i],
                                                'cur_stock_history_item_count'=>$itemqnty[$i],
                                                'cur_stock_history_added_date'=>$now,
                                                'cur_stock_history_stock_master_id'=>$id,
                                             'purpose'=>'Purchase Return Row Add');
            
                     $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            
                     $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                     $this->db->update('tbl_current_stock',$dataCurrentstock);
            
                     
                
                  $totalstock_count  = $checkinventstock_for_item[$i]->inventory_stock_itemcount - $itemqnty[$i]; 
            
                  $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
                  $this->db->where('inventory_stock_id',$checkinventstock_for_item[$i]->inventory_stock_id);
                  $this->db->update('tbl_inventory_stock',$datainventstock);
                  
                  // }
                  

   }

   redirect('purchasereturn_edit/'.$id);

}

public function get_branchandgodownstock(){
   $itemid = $this->input->post('batchid');
 
if(!empty($itemid)){

$itemList = $this->Admin_model->get_inventorystocks($itemid);
//echo "<pre>";print_r($itemList);exit;
if(count($itemList)==1){
   



foreach($itemList as $new1){
   if($new1['inventory_location_id']!=1){
      $namelist.='
      <td>0</td><td>'.$new1['inventory_stock_itemcount'].'</td>';
   }else{
      $namelist.='
      <td>'.$new1['inventory_stock_itemcount'].'</td><td>0</td>';  
   }

}
echo $namelist;
}else{
   foreach($itemList as $new1){
      if($new1['inventory_location_id']!=1){
         $namelist.='
         <td>'.$new1['inventory_stock_itemcount'].'</td>';
      }else{
         $namelist.='
         <td>'.$new1['inventory_stock_itemcount'].'</td>';  
      }

   }
 
echo $namelist;
}
}
}

public function saleorderaddnewrow(){
   $this->sessionout();
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i');
$id=$this->input->post('master_id12');

$data['id']=$id;
$table ="tbl_sales_order_master";
$length = count($this->input->post('itemtotalamount2'));
$itemcode = $this->input->post('itemcode2');
$itemid = $this->input->post('puritemid2');
$itemname = $this->input->post('itemname2');
$itembatch = $this->input->post('itembatch2');
$itemqnty = $this->input->post('itemqnty2');
$itemtaxable = $this->input->post('itemtaxable2');
$itemgstper = $this->input->post('itemgstper2');
$itemgstamount = $this->input->post('itemgstamount2');
$itemcessamount = $this->input->post('itemcessamount2');
$itemtotalamount = $this->input->post('itemtotalamount2');
$itemhsncode = $this->input->post('itemhsncode2');
$itemitemtbid = $this->input->post('itemitemtbid2');
$itembatchid = $this->input->post('itembatchid2');
$employee=$this->input->post('employee2');
$unitprice=$this->input->post('unitprice2');
$incentive_id=$this->input->post('incentive_id2');
$incentive_amount=$this->input->post('incentive_amount2');
$mrp=$this->input->post('mrp2');


$data = array(
   'sales_order_master_bill_no'=>$this->input->post('billno'),
   'sales_order_master_date'=>date("Y-m-d", strtotime($this->input->post('billdate')) ),
   'sales_order_master_customer_name'=> $this->input->post('customername'),
   'sales_order_master_delivery_date'=> $this->input->post('deliverydate'),
   'sales_order_master_phone_no'=> $this->input->post('phonenumber'),
   'sales_order_master_veh_no'=> $this->input->post('vehicleno'),
   'sales_order_master_customer_address'=> $this->input->post('address'),
   'sales_order_master_delivery_address'=> $this->input->post('deliveryaddress'),
   'sales_order_master_eway_billno'=> $this->input->post('ewaybillno'),
   'sales_order_master_login_id'=> $this->input->post('customerloginid'),
   'sales_order_master_tot_taxable_amount'=> $this->input->post('totalTaxableAmount'),
   'sales_order_master_tot_gst_amount'=> $this->input->post('amountGst'),
   'sales_order_master_delivery_charge'=> $this->input->post('deliverychare'),
   'sales_order_master_total_cess'=> 0,
   'sales_order_master_discount'=> $this->input->post('discount'),
   'sales_order_master_round_off'=> $this->input->post('roundOfValuue'),
   'sales_order_master_grand_total'=> $this->input->post('grandTotal'),
   'sales_order_master_note'=> $this->input->post('note'),
   'sales_order_master_outstanding'=> $this->input->post('outstanding'),
   'sales_order_master_amount_paid'=> $this->input->post('paidamount'),
   'sales_order_master_payment_mode'=>$this->input->post('paymod1'),
   'sales_order_master_is_igst'=>$this->input->post('isigst'),
   'sales_order_master_cardnum'=>$this->input->post('cardnumber'),
   'sales_order_master_cheque_no'=>$this->input->post('saleschequenumber'),
   'sales_order_master_banktransaction_id'=>$this->input->post('salestranscheque'),
   'sales_order_master_bankamount'=>$this->input->post('bankamount'),
   'sales_order_master_bank'=>$this->input->post('bank'),
   'sales_order_master_financetype'=>$this->input->post('finance'),
   'sales_order_master_trans_mode'=>$this->input->post('transmode'),
   'sales_order_master_finance_id'=>$this->input->post('financeid'),
   'location_id'=>$this->input->post('locationid'),
   'sales_edited_date'=>date('Y-m-d')
   );
   
   $this->db->where('sales_order_master_id',$id);
   $this->db->update('tbl_sales_order_master',$data);
  // echo "<pre>";print_r($data);exit;
   for($i=0;$i<$length;$i++){
   
      $datatrans = array(
                     'sales_order_trans_master_id' => $id,
                     'sales_order_trans_itm_code' => $itemcode[$i],
                     'sales_order_trans_qty' => $itemqnty[$i],
                     'sales_order_trans_taxable_value' => $itemtaxable[$i],
                     'sales_order_trans_hsn_code' => $itemhsncode[$i],
                    'sales_order_trans_gst_percentage' => $itemgstper[$i],
                     'sales_order_trans_gst_amount' => $itemgstamount[$i],
                     'sales_order_trans_cess' => 0,
                     'sales_order_trans_total' => $itemtotalamount[$i],
                     'sales_order_trans_item_id'=>$itemid[$i],
                     'sales_order_batch_id'=>$itembatchid[$i],
                     'sales_order_employee'=>$employee[$i],
                     'sales_order_unit_price'=>$unitprice[$i],
                     'sales_order_incentive_id'=>$incentive_id[$i],
                     'sales_order_incentive_amount'=>$incentive_amount[$i],
                     'sales_order_mrp'=>$mrp[$i]
                     );
                  $this->Admin_model->addrowtotable('tbl_sales_order_trans',$datatrans);
 
                  
                
                  

   }

   redirect('editsaleorder/'.$id);
}
public function get_billsearch(){
   $num=$this->input->post('billnumber');
   $new=$this->Newadminmodel->get_billnumbersearchpurchase($num);
   if($new){
		 	
		//$namelist='<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">';
			$namelist="";	
         $i=1;		
      foreach($new as $new1){

		$namelist.='<tr  >
      <td>'.$i.'</td>
    
      <td>'.$new1['purchase_master_billdate'].'</td>
      <td>'.$new1['sup_name'].'</td>
      <td>'.$new1['purchase_master_taxable_value'].'</td>
      <td>'.$new1['purchase_master_tax'].'</td>
      <td>'.$new1['purchase_master_grandtotal'].'</td>	
      <td>'.$new1['invoiceno'].'</td>
      <td>
      <a href="'.$base_url.'purchaseeditnew/'.$new1['purchase_master_id'].'"><li class="fa fa-pencil" ></li></a>
						
      
      <a href="javascript:void(0)" class="viewpurchase" data-id="'.$new1['purchase_master_id'].'"><li class="fa fa-eye " ></li></a>
   
      </td>
      
				  </tr>';
              $i++;
			}
	
					echo $namelist;
		}
 }



 public function get_saleordersaerch(){
   $num=$this->input->post('variable');
   $new=$this->Newadminmodel->get_billnumbersearchsalesorder($num);
   if($new){
		 	
		//$namelist='<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">';
			$namelist="";	
         $i=1;		
      foreach($new as $new1){

		$namelist.='<tr >
      <td>'.$i.'</td>
      <td>'.$new1['sales_order_master_bill_no'].'</td>
    
      <td>'.$new1['sales_order_master_customer_name'].'</td>
      <td>'.$new1['sales_order_master_phone_no'].'</td>
      <td>'.date("d-m-Y",strtotime($new1['sales_order_master_delivery_date'])).'</td>
      <td>'.$new1['sales_order_master_tot_taxable_amount'].'</td>
      <td>'.$new1['sales_order_master_grand_total'].'</td>	
      <td></td>
      <td>'.$new1['sales_master_note'].'</td>
      <td>
      <a href="javascript:void(0)" class="viewsalesorder" data-id="'.$new1['sales_order_master_id'].'">

      <li class="fa fa-eye" ></li>

   </a>
   <a href="'.$base_url.'editsaleorder/'.$new1['sales_order_master_id'].'" data-id="<?php echo $key->sales_order_master_id;?>">

   <li class="fa fa-edit " ></li>

</a>

<a href="'.$base_url.'salesorderprint/'.$new1['sales_order_master_id'].'"

target="_blank">&nbsp;

<li class="fa fa-print"></li> 
</a> 
						
      
    
      </td>
      
				  </tr>';
              $i++;
			}
	
					echo $namelist;
		}
 }


 public function get_saleb2csaerch(){
    $base_url= base_url();
   $num=$this->input->post('variable');
   $new=$this->Newadminmodel->get_billnumbersearchb2csale($num);
   if($new){
		 	
		//$namelist='<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">';
			$namelist="";	
         $i=1;		
      foreach($new as $new1){

		$namelist.='<tr  >
      <td>'.$i.'</td>
      <td>'.$new1['sales_master_bill_no'].'</td>
      <td>'.date("d-m-Y",strtotime($new1['sales_master_date'])).'</td>
      <td>'.$new1['sales_master_customer_name'].'</td>
      
      <td>'.$new1['sales_master_grand_total'].'</td>';
      if($new1['sales_master_payment_mode']==6){
         $namelist.='<td>CASH</td>';
      }else if($new1['sales_master_payment_mode']==5){
         $namelist.='<td>BANK</td>';
      }
      $namelist.='<td>'.$new1['sales_master_amount_paid'].'</td>
      <td>'.$new1['sales_master_bankamount'].'</td>	
      <td>'.$new1['sales_master_outstanding'].'</td>
      <td>'.$new1['sales_master_note'].'</td>
    
      <td>
      <a href="'.$base_url.'viewsaleb2c/'.$new1['sales_master_id'].'" target="_blank"><i class="fa fa-eye" aria-hidden="true" data-toggle="modal"
      ></i>
						
      
      <a href="'.$base_url.'salesprint/'.$new1['sales_master_id'].'"

      target="_blank">&nbsp;

<li class="fa fa-print"></li> 
<a href="'.$base_url.'saleb2cedit/'.$new1['sales_master_id'].'" target="_blank"><li class="fa fa-pencil"></li></a>
   
      </td>
      
				  </tr>';
              $i++;
			}
	
					echo $namelist;
		}
 }
 public function get_b2bbillsearch(){
   $num=$this->input->post('variable');
   $new=$this->Newadminmodel->get_billnumbersearchb2bsale($num);
   if($new){
		 	
		//$namelist='<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">';
			$namelist="";	
         $i=1;		
      foreach($new as $new1){

		$namelist.='<tr  >
      <td>'.$i.'</td>
      <td>'.$new1['billing_master_billno'].'</td>
      <td>'.$new1['billingdate'].'</td>
      <td>'.$new1['billing_master_customer_name'].'</td>
      <td>'.$new1['billing_master_phoneno'].'</td>
      <td>'.$new1['billing_master_tot_taxable_amount'].'</td>
      <td>'.$new1['billing_master_grandtotal'].'</td>';
      if($new1['billing_master_paymentmode']==6){
         $namelist.='<td>CASH</td>';
      }else if($new1['billing_master_paymentmode']==5){
         $namelist.='<td>BANK</td>';
      }
      $namelist.='<td>'.$new1['billing_master_paid_amount'].'</td>
      <td>'.$new1['billing_master_outstanding'].'</td>	
      <td>'.$new1['billing_master_bankamount'].'</td>
      <td>'.$new1['billing_master_note'].'</td>
      <td>
      <i class="fa fa-eye" aria-hidden="true" data-toggle="modal" data-target="#viewModal'.$new1['billing_master_id'].'"></i>
						
      
      <a href="'.$base_url.'b2bprint/'.$new1['billing_master_id'].'"

      target="_blank">&nbsp;

<li class="fa fa-print"></li> 

</a> 
   
      </td>
      
				  </tr>';
              $i++;
			}
	
					echo $namelist;
		}
 }
 public function purchaseeditnew($id){
    $data['purchasedetails']=$this->Newadminmodel->get_purchasemasterlist($id);
    $data['purchase_itemlist']=$this->Newadminmodel->get_purchaseitemlistnew($id);
    $data['supplier']=$this->Admin_model->get_supplier();
    $data['id']=$id;
   // echo "<pre>";print_r($data['purchase_itemlist']);exit;
    $this->load->view('purchase/purchaseditnew',$data);
 }
 public function getrowtranseditdelete(){
   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i');
    $tid=$this->input->post('transid');
    $this->db->where('purchase_trans_id',$tid);
    if($this->db->delete('tbl_purchase_trans')){
       $item=$this->input->post('itemid');
       $batch=$this->input->post('batchid');
       $qty=$this->input->post('qantity');

       $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      
     
       
       $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
       //echo $godown_or_firm_id;exit;
      
      
      
         
         $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount- $qty; 
      
          $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
          $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
          $this->db->update('tbl_inventory_stock',$datainventstock);
      
      
          $checkitem=$this->Admin_model->get_checkitem($item,$batch);
          $count=$checkitem->cur_stock_item_count;
          // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
           $Totalcount  = $count - $qty ; 
        
           $dataCurrentstock=array(
           'cur_stock_item_count'=>$Totalcount,
           );
           $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
           $this->db->update('tbl_current_stock',$dataCurrentstock);

           $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
           'cur_stock_history_batchid'=> $batch,
           'cur_stock_history_item_count'=>$qty,
           'cur_stock_history_added_date'=>$now,
           'cur_stock_history_stock_master_id'=>$tid,
        'purpose'=>'Purchase edit row delete');
       
       $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);

    }

 }
 public function getrowtranseditdeleteupdate(){
    $mid=$this->input->post('mid');
    $data_edit=array('purchase_paid_amount'=>$this->input->post('amount'),
    'purchase_master_tot_quantity'=>$this->input->post('totalqnty_edit'),
     'purchase_master_extra_discount'=>$this->input->post('extradiscount_edit'),
     'purchase_master_othercharges'=>$this->input->post('othercharge_edit'),
     'purchase_master_taxable_value'=>$this->input->post('totalTaxableAmount_edit'),
     'purchase_master_tax'=>$this->input->post('totaltax_edit'),
     'purchase_master_discount'=>$this->input->post('discount_edit'),
     'purchase_master_roundoff'=>$this->input->post('roundoff_edit'),
     'purchase_master_grandtotal'=>$this->input->post('grandTotal_edit')
  );
  //print_r($mid);exit;
  $this->db->where('purchase_master_id',$mid);
  $this->db->update('tbl_purchase_master',$data_edit);

 }
 public function editpurchasemaster(){
    $id=$this->input->post('id');
    $data_edit=array('purchase_master_billdate'=>$this->input->post('billdate'),
    'purchase_master_supplier'=>$this->input->post('sup'),
    'purchase_master_tax_type'=>$this->input->post('taxtype'),
    'purchase_master_ref_no'=>$this->input->post('refnumber'),
    'purchase_master_payment_mode'=>$this->input->post('paymode'),
    'purchase_master_notes'=>$this->input->post('note'),
    'purchase_paid_amount'=>$this->input->post('amount'),
    'purchase_master_goods_receipt_noteno'=>$this->input->post('goodreceipt'),
    'purchase_master_tot_quantity'=>$this->input->post('totalqnty_edit'),
    'purchase_master_extra_discount'=>$this->input->post('extradiscount_edit'),
    'purchase_master_othercharges'=>$this->input->post('othercharge_edit'),
    'purchase_master_taxable_value'=>$this->input->post('totalTaxableAmount_edit'),
    'purchase_master_tax'=>$this->input->post('totaltax_edit'),
    'purchase_master_discount'=>$this->input->post('discount_edit'),
    'purchase_master_roundoff'=>$this->input->post('roundoff_edit'),
    'purchase_master_grandtotal'=>$this->input->post('grandTotal_edit')
 );
 $this->db->where('purchase_master_id',$id);
 $this->db->update('tbl_purchase_master',$data_edit);
 $result=$this->Newadminmodel->get_purchasemasterlist($id);
 print_r(json_encode($result));
 }
 public function getrowtransedit(){
    $id=$this->input->post('id');
    $tid=$this->input->post('tid');
    $item=$this->input->post('item');
    $batch=$this->input->post('batch');
    $transedit=array('purchase_trans_item_code'=>$this->input->post('code'),
    'purchase_trans_hsncode'=>$this->input->post('hsncode'),
    'purchase_trans_unit_id'=>0,
    'purchase_trans_rate'=>$this->input->post('rate'),
    'purchase_trans_qty'=>$this->input->post('qty'),
    'purchase_trans_discount_type'=>$this->input->post('dtype'),
    'purchase_trans_discount_value'=>$this->input->post('discount'),
    'purchase_trans_discount_id'=>0,
    'purchase_trans_tax'=>$this->input->post('tax'),
    'purchase_trans_selling_rate'=>$this->input->post('srate'),
    'purchase_trans_tot_amount'=>$this->input->post('total'),
    'purchase_item_id'=>$this->input->post('item'),
    'purchase_item_batch_id'=>$this->input->post('batch')
    );
   // print_r($tid);exit;
    $this->db->where('purchase_trans_id',$tid);
    $this->db->update('tbl_purchase_trans',$transedit);

    $mid=$this->input->post('mid');
    $data_edit=array('purchase_paid_amount'=>$this->input->post('amount'),
   'purchase_master_tot_quantity'=>$this->input->post('totalqnty_edit'),
    'purchase_master_extra_discount'=>$this->input->post('extradiscount_edit'),
    'purchase_master_othercharges'=>$this->input->post('othercharge_edit'),
    'purchase_master_taxable_value'=>$this->input->post('totalTaxableAmount_edit'),
    'purchase_master_tax'=>$this->input->post('totaltax_edit'),
    'purchase_master_discount'=>$this->input->post('discount_edit'),
    'purchase_master_roundoff'=>$this->input->post('roundoff_edit'),
    'purchase_master_grandtotal'=>$this->input->post('grandTotal_edit')
 );
 //print_r($mid);exit;
 $this->db->where('purchase_master_id',$mid);
 $this->db->update('tbl_purchase_master',$data_edit);


 $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      
 $itemcount  =  $this->input->post('qty');
 $itemoldqty  =  $this->input->post('oqty');
 $diff=$itemoldqty- $itemcount;
 
 $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
 //echo $godown_or_firm_id;exit;



   
   $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount- $diff; 

    $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
    $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
    $this->db->update('tbl_inventory_stock',$datainventstock);


    $checkitem=$this->Admin_model->get_checkitem($item,$batch);
    $count=$checkitem->cur_stock_item_count;
    // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
     $Totalcount  = $count - $diff ; 
  
     $dataCurrentstock=array(
     'cur_stock_item_count'=>$Totalcount,
     );
    
     $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
     $this->db->update('tbl_current_stock',$dataCurrentstock);

     date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
     $now = date('Y-m-d H:i');

     $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
     'cur_stock_history_batchid'=> $batch,
     'cur_stock_history_item_count'=>$itemcount,
     'cur_stock_history_added_date'=>$now,
     'cur_stock_history_stock_master_id'=>$tid,
  'purpose'=>'Purchase Row Edit');
 
 $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);

 
}
public function purchaseeditnew1(){
   $this->sessionout();
   if(isset($_POST['submit'])){
      $table ="tbl_purchase_master";
      $purchase_master_id = $this->input->post('purchase_master_id');
      $data = array(
         'purchase_master_ref_no'=> $this->input->post('refno'),
         'invoiceno'=> $this->input->post('invoiceno'),
         'purchase_master_supplier' => $this->input->post('supplier'),
         'purchase_master_tax_type' => $this->input->post('taxtype'),
         // 'purchase_master_billno' => $this->input->post('billno'),
         'purchase_master_billdate'=> $this->input->post('billdate'),
         'purchase_master_extra_discount'=> $this->input->post('extradiscount'),
         'purchase_master_tot_quantity'=> $this->input->post('totalqnty'),
         'purchase_master_roundoff'=> $this->input->post('roundoff'),
         'purchase_master_goods_receipt_noteno'=> $this->input->post('goodreceipt'),
         'purchase_master_taxable_value'=> $this->input->post('totalTaxableAmount'),
         'purchase_master_grandtotal'=> $this->input->post('grandTotal'),
         'purchase_master_notes'=> $this->input->post('note'),
         'purchase_master_payment_mode'=> $this->input->post('defaultExampleRadios'),
         'purchase_master_othercharges' => $this->input->post('othercharges'),
         'purchase_master_tax' =>$this->input->post('totaltax'),
         'purchase_master_discount' =>$this->input->post('totaldiscount'),
         'purchase_added_by' =>$this->session->userdata('id')
         );
      
         $this->db->where('purchase_master_id',$purchase_master_id);
         $this->db->update($table, $data);
   }else{
      $table ="tbl_purchase_master";
     //$id=$this->input->post('');
    $length = count($this->input->post('itemtotalamount1'));
   
     $purchase_master_id = $this->input->post('purchase_master_id');
     $itemcode = $this->input->post('itemcode1');
     $itemname = $this->input->post('itemname1');
     $itembatch = $this->input->post('itembatch1');
     $itemqnty = $this->input->post('quantity1');
     $itemoldstockqty = $this->input->post('oldstockqty1');
  
     
     $itemtotalamount = $this->input->post('itemtotalamount1');
     $itemhsncode = $this->input->post('hsncode1');
     
    
     $transrate = $this->input->post('rate1');
     $discount = $this->input->post('discount1');
     $discount_type = $this->input->post('discount_type1');
     $tax = $this->input->post('tax1');
     $sellinrate = $this->input->post('sellingrate1');
     $itemitemtbid = $this->input->post('itemitemtbid1');
     $itemitemid = $this->input->post('itemid1');
     $itembatchid = $this->input->post('itembatchid1');
     date_default_timezone_set("Asia/Kolkata"); 
     $now = date('Y-m-d H:i');

     $data = array(
      'purchase_master_ref_no'=> $this->input->post('refno'),
      'invoiceno'=> $this->input->post('invoiceno'),
      'purchase_master_supplier' => $this->input->post('supplier'),
      'purchase_master_tax_type' => $this->input->post('taxtype'),
      // 'purchase_master_billno' => $this->input->post('billno'),
      'purchase_master_billdate'=> $this->input->post('billdate'),
      'purchase_master_extra_discount'=> $this->input->post('extradiscount'),
      'purchase_master_tot_quantity'=> $this->input->post('totalqnty'),
      'purchase_master_roundoff'=> $this->input->post('roundoff'),
      'purchase_master_goods_receipt_noteno'=> $this->input->post('goodreceipt'),
      'purchase_master_taxable_value'=> $this->input->post('totalTaxableAmount'),
      'purchase_master_grandtotal'=> $this->input->post('grandTotal'),
      'purchase_master_notes'=> $this->input->post('note'),
      'purchase_master_payment_mode'=> $this->input->post('defaultExampleRadios'),
      'purchase_master_othercharges' => $this->input->post('othercharges'),
      'purchase_master_tax' =>$this->input->post('totaltax'),
      'purchase_master_discount' =>$this->input->post('totaldiscount'),
      'purchase_added_by' =>$this->session->userdata('id')
      );
   
      $this->db->where('purchase_master_id',$purchase_master_id);
      $this->db->update($table, $data);

     for($i=0;$i<$length;$i++){
      
      $datatrans = array(
      'purchase_trans_purchase_master_id' => $purchase_master_id,
      'purchase_trans_item_code' => $itemcode[$i],
      'purchase_trans_qty' => $itemqnty[$i],
      'purchase_trans_hsncode' => $itemhsncode[$i],
     
      'purchase_trans_rate' => $transrate[$i],
      'purchase_trans_discount_type' => $discount_type[$i],
      'purchase_trans_discount_id' => $discount[$i],//discount value is saved
      'purchase_trans_tax' => $tax[$i],
      'purchase_trans_selling_rate' => $sellinrate[$i],
      'purchase_trans_tot_amount' => $itemtotalamount[$i],
      'purchase_item_id'=>$itemitemid[$i],
      'purchase_item_batch_id'=>$itembatchid[$i]
      
      );
    
   
      $this->Admin_model->addrowtotable('tbl_purchase_trans',$datatrans);
      
      

      $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemitemid[$i],$itembatchid[$i]);
     // echo "<pre>";print_r($checkinventstock_for_item[$i]);exit;
      $itemcount[$i]  ==  $itemqnty[$i];
      $itemoldqty[$i]  ==  $itemoldstockqty[$i];
      
      $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
      //echo $godown_or_firm_id;exit;

      $datainventstock = array(
         'inventory_stock_master_id' => $purchase_master_id,
         'inventory_stock_item_id' => $itemitemid[$i],
         'inventory_stock_item_batch_id' => $itembatchid[$i],
         'inventory_location_id' => $godown_or_firm_id,
         );
      // echo "<pre>";print_r($checkinventstock_for_item[$i]);exit;
      if(!empty($checkinventstock_for_item[$i])){

        
        $totalstock_count[$i]  = $checkinventstock_for_item[$i]->inventory_stock_itemcount+$itemcount[$i]; 
//echo  $checkinventstock_for_item[$i]->inventory_stock_id;exit;
         $datainventstock[$i]=array('inventory_stock_itemcount'=>$totalstock_count[$i]);
        // echo "<pre>";print_r($datainventstock[$i]);exit;
         $this->db->where('inventory_stock_id',$checkinventstock_for_item[$i]->inventory_stock_id);
         $this->db->update('tbl_inventory_stock',$datainventstock[$i]);

      }else{//Insert Item with stock count
       // echo $itemcount[$i];exit; 
         $datainventstocknew['inventory_stock_itemcount'] =  $itemqnty[$i];
         $this->Admin_model->addrowtotable('tbl_inventory_stock',$datainventstocknew);
      }


      $addstock=array('stock_master_type'=>1,
      'stock_master_type_id'=>$purchase_master_id,
      'stock_master_added_date'=>$now);
      $stockmasterid=$this->Admin_model->addstocktable('tbl_stock_master',$addstock); 
      $checkitem[$i]=$this->Admin_model->get_checkitem($itemitemid[$i],$itembatchid[$i]);
      
   
      if($checkitem[$i]==null){
         $dataCurrentstock=array('cur_stock_item_id'=>$itemitemid[$i],
         'current_stock_batch_id'=>$itembatchid[$i],
         'cur_stock_item_count'=>$itemqnty[$i],
         'added_date'=>$now,
         'stock_master_id'=>$stockmasterid);
         $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemitemid[$i],
         'cur_stock_history_batchid'=>$itembatchid[$i],
         'cur_stock_history_item_count'=>$itemqnty[$i],
         'cur_stock_history_added_date'=>$now,
         'cur_stock_history_stock_master_id'=>$stockmasterid,
         'purpose'=>'purchase edit insert');
         $this->db->insert('tbl_current_stock',$dataCurrentstock);
         $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
      }else{
         $count[$i]=$checkitem[$i]->cur_stock_item_count;
        // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
         $Totalcount[$i]  = $count[$i] + $itemcount[$i]; 
      
         $dataCurrentstock=array('cur_stock_item_id'=>$itemitemid[$i],
         'current_stock_batch_id'=>$itembatchid[$i],
         'cur_stock_item_count'=>$Totalcount[$i],
         'added_date'=>$now,
         'stock_master_id'=>$stockmasterid);
         $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemitemid[$i],
         'cur_stock_history_batchid'=>$itembatchid[$i],
         'cur_stock_history_item_count'=>$itemqnty[$i],
         'cur_stock_history_added_date'=>$now,
         'cur_stock_history_stock_master_id'=>$stockmasterid,
      'purpose'=>'purchase edit insert');
         $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
         $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
         $this->db->update('tbl_current_stock',$dataCurrentstock);
      
      }
   }
   }
  
     
   redirect('purchaseeditnew/'.$purchase_master_id);
}
public function editsaleorder($id){
   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
      
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
 $data['master']=$this->Newadminmodel->get_sales_master_edit($id);

 $data['trans']=$this->Newadminmodel->get_salesorder_trans($id);
 //echo "<pre>";print_r($data['trans']);exit;
 $data['bank']=$this->Admin_model->get_bank_details();
 $data['finance']=$this->Admin_model->get_finance();
 $data['bankpayment']=$this->Admin_model->get_bankpaymentreceiptlistnew($id);
 $this->load->view('superadmin/salesorder_edit',$data);
}
public function getcustomerfetchingnew(){
   $data['cust']=$this->Admin_model->get_customer();
   $this->load->view('superadmin/customerlisting',$data);
}
public function b2bsaleedit($id){
   $data['data_master']=$this->Newadminmodel->get_b2bsaleslist($id);
   $data['data_trans']=$this->Newadminmodel->get_b2bsaleslisttrans($id);
  // echo "<pre>";print_r($data['data_trans']);exit;
   $employee=$this->Admin_model->get_staff1();
   $data['employee']=$this->Admin_model->get_staff1();
   $data['namelist']='<option value=""></option>';

   

   foreach($employee as $keyem){
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
 
  
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $data['statecode']=$this->Admin_model->get_statecode();
   $this->load->view('superadmin/b2bsaleedit',$data);
}

public function b2bsaleview($id){
   $data['data_master']=$this->Newadminmodel->get_b2bsaleslist($id);
   $data['data_trans']=$this->Newadminmodel->get_b2bsaleslisttrans($id);
   $employee=$this->Admin_model->get_staff1();
   $data['employee']=$this->Admin_model->get_staff1();
   $data['namelist']='<option value=""></option>';

   

   foreach($employee as $keyem){
      
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
 
  
  
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $data['statecode']=$this->Admin_model->get_statecode();
   $this->load->view('superadmin/b2bsaleview',$data);
}
public function deliverychellan_edit($id){
   
  $data['data_master']=$this->Newadminmodel->get_delivery_master($id);
  $data['data_trans']=$this->Newadminmodel->get_delivery_trans($id);
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $data['statecode']=$this->Admin_model->get_statecode();
   $data['branches']=$this->Admin_model->get_branches();
   $this->load->view('superadmin/deliverychellan_edit',$data);
}
public function deliverychellan_view($id){
   $data['data_master']=$this->Newadminmodel->get_delivery_master($id);
   $data['data_trans']=$this->Newadminmodel->get_delivery_trans($id);
    $data['bank']=$this->Admin_model->get_bank_details();
    $data['finance']=$this->Admin_model->get_finance();
    $data['statecode']=$this->Admin_model->get_statecode();
    $data['branches']=$this->Admin_model->get_branches();
    $this->load->view('superadmin/deliverychellan_view',$data);
}
public function deliverychellanrowedit(){

   $item=$this->input->post('item');
   $batch=$this->input->post('batch');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
      
   $itemcount  =  $this->input->post('itemqty');
   $itemoldqty  =  $this->input->post('oqty');
   $diff=$itemoldqty- $itemcount;
 
   $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
 



   
    $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $diff; 

    if($totalstock_count<0){
      $status=0;
    }else{
      date_default_timezone_set("Asia/Kolkata"); 
      $now = date('Y-m-d H:i:s');
      $tid=$this->input->post('tid');
      $data_trans=array('deliverychellan_trans_item_code'=>$this->input->post('code'),
      'deliverychellan_trans_qty'=>$this->input->post('itemqty'),
      'deliverychellan_trans_taxable_value'=>$this->input->post('taxable'),
      'deliverychellan_trans_hsn_code'=>$this->input->post('hsncode'),
      'deliverychellan_trans_gst_percentage'=>$this->input->post('gstper'),
      'deliverychellan_trans_gst_amount'=>$this->input->post('gstamount'),
      'deliverychellan_trans_total'=>$this->input->post('total'),
      'deliverychellan_item_id'=>$this->input->post('item'),
      'deliverychellan_item_batch_id'=>$this->input->post('batch'),
      'deliverychellan_trans_branchprice'=>$this->input->post('unitprice')
     );
   
    
   
     
      $this->db->where('deliverychellan_trans_id ',$tid);
      $this->db->update('tbl_deliverychellan_trans',$data_trans);
      $sid=$this->input->post('sid');
      $data_master=array('deliverychellan_master_note'=>$this->input->post('note'),
      'deliverychellan_master_vehicleno'=>$this->input->post('vehiclenumber'),
      'deliverychellan_master_tot_taxable_amount'=>$this->input->post('totalTaxableAmount'),
      'deliverychellan_master_tot_gst_amount'=>$this->input->post('amountGst'),
      'deliverychellan_master_roundoff'=>$this->input->post('roundOfValuue'),
      'deliverychellan_master_grandtotal'=>$this->input->post('grandTotal'),
     );
   
      $this->db->where('deliverychellan_master_id',$sid);
      $this->db->update('tbl_deliverychellan_master',$data_master);
   
   
   
      
   
       $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
       $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
       $this->db->update('tbl_inventory_stock',$datainventstock);
   
      
   
   
       $checkitem=$this->Admin_model->get_checkitem($item,$batch);
       $count=$checkitem->cur_stock_item_count;
       // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
        $Totalcount  = $count + $diff ; 
     
        $dataCurrentstock=array(
        'cur_stock_item_count'=>$Totalcount,
        );
       
        $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
        $this->db->update('tbl_current_stock',$dataCurrentstock);
   
        $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
        'cur_stock_history_batchid'=> $batch,
        'cur_stock_history_item_count'=>$itemcount,
        'cur_stock_history_added_date'=>$now,
        'cur_stock_history_stock_master_id'=>$sid,
        'purpose'=>'delivery chellan row edit');
    
       $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);

       $status=1;
    }
    echo $status;
  
}
public function quatationbill(){
   $data['bilqua']=$this->Admin_model->get_automaticbillquan();
  
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumberquat();
  // echo "<pre>";print_r($data['bilqua']);exit;
   $employee=$this->Admin_model->get_staff1();
   
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
     
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   //$data['bilqua']=$this->Admin_model->get_automaticbillquan();
   $this->load->view('purchase/quatationbill',$data);
}
public function profitandlossitemwise()
{
  
  if(isset($_POST['filter'])){
     $from=$this->input->post('fdate');
     $to=$this->input->post('tdate');
     $cat=$this->input->post('category');
     $data["profit_lossDetails"] = $this->Admin_model->
   get_profit_loss_detailsfilter($from, $to,$cat);
   $data['from']=$from;
   $data['to']=$to;
   //$data['cat']=$cat;
  }else{
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "AdminController/profitandlossitemwise";
   $config["total_rows"] =$this->Admin_model->get_profit_loss_detailscount();
  
   $config["per_page"] = 20;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["profit_lossDetails"] = $this->Admin_model->
   get_profit_loss_details($config["per_page"], $page);

   
   
   

   $data["links"] = $this->pagination->create_links();

  }

  $data['category']=$this->Admin_model->get_itemcategory();
   $this->load->view('superadmin/itemwiseprofitandlossreport',$data);	
}
public function cashflow(){
   
   $cashflow=$this->Admin_model->get_accountgroup();
   $sumcashflow=array();
   foreach($cashflow as $cashflow){
       $accountgpid=$cashflow->ag_id;
       $from='';
       $to='';
      if(isset($_POST['submit'])){
         $from=$this->input->post('from');
         $to=$this->input->post('to');
        
      }
      $sum=$this->Admin_model->get_cashflowinpayment($accountgpid,$from,$to);
     

       $cashsum=$sum->mysum;
       $dataresult = array(

         'accountgroup' => $cashflow->ag_name,

         'amount' => $cashsum,

         'flowtype'=>$sum->payment_type

        );
     //   echo "<pre>";print_r($dataresult);
       array_push($sumcashflow,$dataresult);
   }

   $data['slesb2c']=$this->Admin_model->get_accountgroupb2csales($from,$to);
   $data['slesb2b']=$this->Admin_model->get_accountgroupb2bsales($from,$to);
   $data['saleorder']=$this->Admin_model->get_accountgroupsalesorder($from,$to);
   // $deliverychellan=$this->Admin_model->get_accountgroupdeliverychellan($from,$to);
   // $journal=$this->Admin_model->get_accountgroupjpournal($from,$to);
   $data['purchase']=$this->Admin_model->get_accountgrouppurchase($from,$to);
   // $purchasereturn=$this->Admin_model->get_accountgrouppurchasereturn($from,$to);
  // exit;
   $data["cashflow"] =$sumcashflow;
   $data['from']=$from;
   $data['to']=$to;
   $this->load->view('reports/cashflow',$data);
}
public function profitandlossaccount(){
   if(isset($_POST['submit'])){
     $from=$this->input->post('from');
     $to=$this->input->post('to');
   }else{
    $from='';
    $to='';
   }
   $data['totalpurchase']=$this->Admin_model->get_accountgrouppurchase($from,$to);
   $data['totalpreturn']=$this->Admin_model->get_accountgrouppurchasereturn($from,$to);
   $data['directexpense']=$this->Admin_model->get_directexpensesum($from,$to);
   $data['slesb2c']=$this->Admin_model->get_accountgroupb2csalestrial($from,$to);
   $data['slesb2b']=$this->Admin_model->get_accountgroupb2bsalestrial($from,$to);
   $data['salesreturn']=$this->Admin_model->get_salesreturntrial($from,$to);
   $data['directincome']=$this->Admin_model->get_directincomesum($from,$to);
   
   $data['indirectexpense']=$this->Admin_model->get_indirectexpense($from,$to);
   $data['indirectincome']=$this->Admin_model->get_indirectincome($from,$to);
   $data['indirectjournal']=$this->Admin_model->get_journalindirectincome($from,$to);
   //echo "<pre>";print_r($data['directincome']);exit;
   $this->load->view('reports/profitandlossaccount',$data);
}
public function balancesheetasset(){
   if(isset($_POST['submit'])){
      $from=$this->input->post('from');
      $to=$this->input->post('to');
      $today=$this->input->post('from');
   }else{
         $from='';
         $to='';
         $today=date('Y-m-d');
   }
   $data['today']=$today;
   $data['fixedasset']=$this->Admin_model->get_fixedassets($from,$to);
   $data['sundrydebtors']=$this->Admin_model->get_sundrydeborstsum();
   $data['cashinhands']=$this->Admin_model->get_cashinhandtoday($today);
   $data['bankaccount']=$this->Admin_model->get_bankaccounttoday($today);
   $data['liability']=$this->Admin_model->get_liability($from,$to);
   $supnotpaid=$this->Admin_model->getsupplierbalanceamounttrial();
   $suppaid=$this->Admin_model->get_supplierpaidamountNewtrial();
   $data['sundry']=($supnotpaid->MySum)-($suppaid->MySum);

   $stock= $this->Admin_model->get_currentstockreportitemwisefull();
   //echo "<pre>";print_r($stock);exit;
   $sum=0;
   foreach($stock as $stock){
      if($stock->t_pc==0.00){
         $close=$stock->cur_stock_item_count*$stock->e_pc;
      }else{
         $close=$stock->cur_stock_item_count*$stock->t_pc;
      }
      $sum+= $close;
   
   }

  $data['sum']=$sum;
  
  // echo $sum;exit;
   //echo "<pre>";print_r($data['liability']);exit;
   $this->load->view('reports/balancesheetsasset',$data);
}
public function salesordersummery(){
   if(isset($_POST['filter'])){
    $from=$this->input->post('from');
    $to=$this->input->post('to');
    $data['salesordersummery1']=$this->Admin_model->get_salesordersummery1($from,$to);
   }else{
    $from='';
    $to='';
   }
   $data['salesordersummery']=$this->Admin_model->get_salesordersummery($from,$to);
 

   $sum=$this->Admin_model->get_salesordersummerysum($from,$to);
  
   $data['salesum']=$sum->mysum;
   $data['from']=$from;
   $data['to']=$to;
  
   //echo "<pre>";print_r($data['salesordersummery1']);exit;
   $this->load->view('reports/salesordersummery',$data);
}

public function get_totalsalesorderummrysum(){
   $sum=$this->Admin_model->get_salesordersummerysum();
   
   print_r($sum) ;
}
public function purchasereturneditnew(){
   $ip =$_SERVER['HTTP_HOST'];

   $item=$this->input->post('item');
   $batch=$this->input->post('batch');

   $checkinventstock_for_item = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $item,$batch);
    
   //echo "<pre>";print_r($checkinventstock_for_item);exit;
   $itemcount  =  $this->input->post('itemqty');
   
   $itemoldqty  =  $this->input->post('oqty');
   
   $diff=$itemoldqty - $itemcount;

   

   $totalstock_count  = $checkinventstock_for_item->inventory_stock_itemcount+ $diff; 

   
 
  // $godown_or_firm_id= $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));

   if($totalstock_count<0){
      $status=0;
   }else{
     


   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $tid=$this->input->post('tid');
   $data_trans=array('purreturn_trans_item_code'=>$this->input->post('code'),
   'purreturn_trans_qty'=>$this->input->post('itemqty'),
   'purreturn_trans_taxable_value'=>$this->input->post('taxable'),
  
   'purreturn_trans_gst_percentage'=>$this->input->post('gstper'),
   'purreturn_trans_gst_amount'=>$this->input->post('gstamount'),
  
   'purreturn_trans_total'=>$this->input->post('total'),
   'purreturn_item_id'=>$this->input->post('item'),
   'purreturn_item_batch_id'=>$this->input->post('batch'),
  
   'purreturn_trans_rate'=>$this->input->post('unitprice'),
  
   'purchasereturn_trans_mrp'=>$this->input->post('mrp')
  );

 

  
   $this->db->where('purreturn_trans_id',$tid);
   $this->db->update('tbl_purchase_return_trans',$data_trans);

   //supplier outstanding Edit

   $data_where=array('paybal_supplier_id'=>$this->input->post('supplier'),
   'paybal_bill_number'=>$this->input->post('listbill'),
   'status'=>7);
   $supplierpay=$this->Admin_model->checksupplierpaubalance($data_where);
   $sid=$this->input->post('sid');
   $purchaseBill=$this->Admin_model->checkReturnpurchasebill($sid);
   if($supplierpay!=null){
      
      $returnamount=$this->input->post('grandTotal');
      $purchasereturnamount=$purchaseBill->purreturn_master_grandtotal;
     // echo $purchasereturnamount;exit;
      $difference=$purchasereturnamount-$returnamount;
     // echo $difference;exit;
      $totalAmount=$supplierpay->paybal_amount+$difference;
     $data_outstanding=array('paybal_amount'=>$totalAmount);
     $this->db->where($data_where);
     $this->db->update('tbl_supplier_paybalance',$data_outstanding);
   }
  
   //-------->
   
   $data_master=array('purreturn_master_notes'=>$this->input->post('note'),
   'purreturn_master_vehicleno'=>$this->input->post('vehiclenumber'),
   'purreturn_master_supplier'=>$this->input->post('supplier'),
  
   'purreturn_master_phoneno'=>$this->input->post('phone_num'),
   
   'purreturn_master_taxable_value'=>$this->input->post('totalTaxableAmount'),
   'purchase_return_gstamount'=>$this->input->post('amountGst'),
   'purreturn_master_gstnum'=>$this->input->post('gst_number_new'),
   'purreturn_master_roundoff'=>$this->input->post('roundOfValuue'),
   'purreturn_master_grandtotal'=>$this->input->post('grandTotal'),
   'purreturn_master_ewbno'=>$this->input->post('ewb_num'),
   'purreturn_master_address'=>$this->input->post('supadd'),
   'purreturn_master_sub_crnno'=>$this->input->post('supcrn_num')
);
   $this->db->where('purreturn_master_id',$sid);
   $this->db->update('tbl_purchase_return_master',$data_master);

  


    $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
    $this->db->where('inventory_stock_id',$checkinventstock_for_item->inventory_stock_id);
    $this->db->update('tbl_inventory_stock',$datainventstock);



    $dataCurrentstockhis=array('cur_stock_history_item_id'=>$item,
    'cur_stock_history_batchid'=> $batch,
    'cur_stock_history_item_count'=>$itemcount,
    'cur_stock_history_added_date'=>$now,
    'cur_stock_history_stock_master_id'=>$sid,
    'purpose'=>'Purchase return Row Edit',
   'ip'=>$ip);

$this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);


    $checkitem=$this->Admin_model->get_checkitem($item,$batch);
    $count=$checkitem->cur_stock_item_count;
    // $Totalcount[$i]=$count[$i]+$itemqnty[$i];
     $Totalcount  = $count + $diff ; 
  
     $dataCurrentstock=array(
     'cur_stock_item_count'=>$Totalcount,
     );
    
     $this->db->where('cur_stock_id',$checkitem->cur_stock_id);
     $this->db->update('tbl_current_stock',$dataCurrentstock);
      $status=1;
   }

   echo $status;
 



}
public function salesreturnedit($id){
   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
      //Keep following code in single line to avoid javascript conflicts...- Niby
      //Strings that span multiple lines (Template literals) are enclosed with backticks (`).
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $data['master']=$this->Admin_model->get_salesreturnmaster($id);
   $data['transs']=$this->Admin_model->get_salesreturntrans($id);
 $this->load->view('reports/salesreturnedit',$data);
}
public function salesreturnaddnewInsert(){

   $this->sessionout();
   
 date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
 $now = date('Y-m-d H:i');
$id=$this->input->post('master_id12');

$data['id']=$id;
$table ="tbl_salesreturn";
$length = count($this->input->post('itemtotalamount2'));
$itemcode = $this->input->post('itemcode2');
$itemid = $this->input->post('puritemid2');
$itemname = $this->input->post('itemname2');
$itembatch = $this->input->post('itembatch2');
$itemqnty = $this->input->post('itemqnty2');
$itemtaxable = $this->input->post('itemtaxable2');
$itemgstper = $this->input->post('itemgstper2');
$itemgstamount = $this->input->post('itemgstamount2');
$itemcessamount = $this->input->post('itemcess2');
$itemtotalamount = $this->input->post('itemtotalamount2');
$itemhsncode = $this->input->post('itemhsncode2');
$itemitemtbid = $this->input->post('puritemid2');
$itembatchid = $this->input->post('itembatchid2');
$employee=$this->input->post('employee2');
$unitprice=$this->input->post('unitprice2');
$incentive_id=$this->input->post('incentive_id2');
$incentive_amount=$this->input->post('incentive_amount2');


$data = array(
 
   'sales_return_date'=>date("Y-m-d", strtotime($this->input->post('date')) ),
   'sales_return_time'=>date("h:i:s", strtotime($now) ),
   'salesreturn_customername'=> $this->input->post('customername'),
   'salesreturn_phonenumber'=> $this->input->post('phonenumber'),
   'salesreturn_cusaddress'=> $this->input->post('address'),
   'sales_return_loginid'=>$this->session->userdata('id'),
   'salesreturn_cus_loginid'=> $this->input->post('customerloginid'),
   'sales_return_taxable_amnount'=> $this->input->post('totalTaxableAmount'),
   'sales_return_gst_amount'=> $this->input->post('amountGst'),
   'sales_return_totalcess'=> 0,
   'salesreturn_roundoff'=> $this->input->post('roundOfValuue'),
   'sales_return_grandtotal'=> $this->input->post('grandTotal'),
   'sales_return_note'=> $this->input->post('reason'),
   'sales_return_amountpaid'=> $this->input->post('cash'),
   'sales_return_isigst'=>$this->input->post('isigst'),
   'salesreturn_ref_number'=>$this->input->post('refno'));
  
   $this->db->where('sales_return_id',$id);
   $this->db->update('tbl_salesreturn',$data);

   
  
   for($i=0;$i<$length;$i++){
   
      $datatrans = array(
         'salesreturntrans_master_id' => $id,
         'salesreturntrans_itemcode' => $itemcode[$i],
         'salesreturntrans_qty' => $itemqnty[$i],
         'salesreturntrans_taxable_amount' => $itemtaxable[$i],
         'salesreturntrans_hsncode' => $itemhsncode[$i],
         'salesreturntrans_gst_percentage' => $itemgstper[$i],
         'salesreturntrans_gst_amount' => $itemgstamount[$i],
         'salesreturntrans_trans_cess' => 0,
         'salesreturntrans_trans_total' => $itemtotalamount[$i],
         'salesreturntrans_trans_item_id'=>$itemid[$i],
         'sales_trans_unit_price'=>$unitprice[$i],
         'salesreturntrans_item_batch_id'=>$itembatchid[$i],
         'salesreturntrans_employee_name'=>$employee[$i],
        'salesreturntrans_incentive_id'=>$incentive_id[$i],
         'salesreturntrans_incentive_amount'=>$incentive_amount[$i],
         );

         $this->db->insert('tbl_salesreturn_trans',$datatrans);

                  $b2btransid=$this->db->insert_id();
     
                

                  $reftype=$this->input->post('saletype');
                  $refnum=$this->input->post('refno');
                
                  // if($reftype==1){
                   
                  //    $salestrans[$i]=$this->Admin_model->get_salesb2ctrans($refnum,$itembatchid[$i]);
                  //    $incentiveamount=$salestrans[$i]->sales_trans_incentive_amount/$salestrans[$i]->sales_trans_qty;
                  //    $salestransid=$salestrans[$i]->sales_trans_id;
                  // }else{

                  //    $salestransb2b[$i]=$this->Admin_model->get_salesb2btrans($refnum,$itembatchid[$i]);
                  //    $incentiveamount=$salestransb2b[$i]->billing_incentive_amount/$salestransb2b[$i]->billing_trans_qty;
                  //    $salestransid=$salestrans[$i]->billing_trans_id;
                  // }


                  // if($incentiveamount!=0){
                  //     $getincentive=$this->Admin_model->get_staffincentivetrans($reftype,$salestransid);
                  //     $amount=$itemqnty[$i]*$incentiveamount;
                  //     $finalAmount=$getincentive->amount-$amount;
                  //     $data_incentive=array('amount'=>$finalAmount);
                    
                  //     $this->db->where('id',$getincentive->id);
                  //     $this->db->update('tbl_staff_incentive',$data_incentive);
                  //    }


                  $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                  $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
            


                 
            
                     $count[$i]=$checkitem[$i]->cur_stock_item_count;
                     $Totalcount[$i]=$count[$i]-$itemqnty[$i];
                  
                     $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                              'current_stock_batch_id'=>$itembatchid[$i],
                                             'cur_stock_item_count'=>$Totalcount[$i],
                                             'added_date'=>$now,
                                             'stock_master_id'=>$id);
            
                     $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                                                'cur_stock_history_batchid'=>$itembatchid[$i],
                                                'cur_stock_history_item_count'=>$itemqnty[$i],
                                                'cur_stock_history_added_date'=>$now,
                                                'cur_stock_history_stock_master_id'=>$id,
                                             'purpose'=>'B2c Edit  insert');
            
                     $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            
                     $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                     $this->db->update('tbl_current_stock',$dataCurrentstock);
            
                     
                
                  $totalstock_count  = $checkinventstock_for_item[$i]->inventory_stock_itemcount - $itemqnty[$i]; 
            
                  $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
                  $this->db->where('inventory_stock_id',$checkinventstock_for_item[$i]->inventory_stock_id);
                  $this->db->update('tbl_inventory_stock',$datainventstock);
                  
                  // }
                  

   }

   redirect('salesreturnedit/'.$id);
}
public function updatebankdate(){
   $bankid=$this->input->post('bankdateid');
   $datebank=$this->input->post('bank_date');
   for($i=0;$i<=count($bankid);$i++){
     
      $data_array[$i]=array('bank_date'=>$datebank[$i]);
      $this->db->where('bp_id',$bankid[$i]);
      $this->db->update('tbl_bank_payments',$data_array[$i]);
     
   }
   return redirect('banreconcilation');
}
public function stockinout(){
   $from='';
   $to='';
   if(isset($_POST['submit'])){
    $from=$this->input->post('from');
    $to=$this->input->post('to');
   }
   $data['stockinout']=$this->Admin_model->get_inventorystockreport($from,$to);
   $this->load->view('reports/stockinout',$data);
}
public function godownstock(){
   $cat='';
   $item='';
   if(isset($_POST['filter'])){
      $cat=$this->input->post('category');
      $item=$this->input->post('itemname');
   }
   $data['category']=$this->Admin_model->get_itemcategory();
   $data['stock']=$this->Admin_model->get_godwonstock($cat,$item);
	$this->load->view('reports/godownstock',$data);
}
public function viewquatationbill(){
   $id=$this->input->post('id');
   $data['key']=$this->Admin_model->get_viewquatationmbill($id);
   $data['quotationtrans']=$this->Admin_model->get_viewquatationmbilltrans($id);
  //echo "<pre>";print_r($data['quotationtrans']);exit;
   $this->load->view('reports/viewquatation',$data);
}
public function furniturestockreport($id){
 // echo "hi";exit;
//    $links="";
//    $config = array();
   
//    $config["base_url"] = base_url() . "AdminController/furniturestockreport";
  
//    $config["total_rows"] = $this->Admin_model->record_count_furniture($cat,$sup,$id);
//    $config["per_page"] = 10;
//    $config["uri_segment"] = 3;

//   $this->pagination->initialize($config);

//    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
   
 
   if(isset($_POST['submit'])){
      $cat=$this->input->post('category');
      $sup=$this->input->post('supplier');
    
      $data['stocks']=$this->Admin_model->get_furniturestocks($cat,$sup,$id);
      
   }else{
      $cat='';
      $sup='';
      
      $data['stocks']=$this->Admin_model->get_furniturestocks($cat,$sup,$id);
   }
   $data['cat']=$cat;
   $data['sup']=$sup;
   $data['category']=$this->Admin_model->get_categoryfetch($id);
   $data['supplier']=$this->Admin_model->get_supplier();
   $data['groups']=$this->Admin_model->get_itemgroupFetch($id);
   $data["links"] = $this->pagination->create_links();
   $this->load->view('stock/furniturereport',$data); 
}
public function homeappliancesstockreport(){
  
   $id=2;
   if(isset($_POST['submit'])){
      $cat=$this->input->post('category');
      $sup=$this->input->post('supplier');
    
      $data['stocks']=$this->Admin_model->get_homeapplicesstocks($cat,$sup);
   }else{
      $cat='';
      $sup='';
  
      $data['stocks']=$this->Admin_model->get_homeapplicesstocks($cat,$sup);
   }
   $data['cat']=$cat;
   $data['sup']=$sup;
   $data['category']=$this->Admin_model->get_categoryfetch($id);
   $data['supplier']=$this->Admin_model->get_supplier();

   $this->load->view('stock/homeappliancesreport',$data); 
}
public function electromicstockreport(){

  
   $id=1;
   if(isset($_POST['submit'])){
      $cat=$this->input->post('category');
      $sup=$this->input->post('supplier');
      $data['stocks']=$this->Admin_model->get_electronicstocks($cat,$sup);
   
   }else{
      $cat='';
      $sup='';
      $data['stocks']=$this->Admin_model->get_electronicstocks($cat,$sup);
     
   }
   $data['cat']=$cat;
   $data['sup']=$sup;
   $data['category']=$this->Admin_model->get_categoryfetch($id);
   $data['supplier']=$this->Admin_model->get_supplier();

   $this->load->view('stock/electronicssreport',$data); 
}
public function incentiveedit($id){
   // $id=3;
   if(isset($_POST['submit'])){
      $cat=$this->input->post('category');
      $sup=$this->input->post('supplier');
      $data['incentive']=$this->Admin_model->get_incentiveedit($id,$cat,$sup);
   }else{
      $cat='';
      $sup='';
      $data['incentive']=$this->Admin_model->get_incentiveedit($id,$cat,$sup);
   }
   $data['cat']=$cat;
   $data['sup']=$sup;
   $data['category']=$this->Admin_model->get_categoryfetch($id);
   $data['supplier']=$this->Admin_model->get_supplier();
   $data['groups']=$this->Admin_model->get_itemgroupFetch($id);
  // echo "<pre>";print_r($data['incentive']);exit;

   $this->load->view('stock/incentiveedit',$data); 
}
public function incentiveedit1(){
   $id=2;
   if(isset($_POST['submit'])){
      $cat=$this->input->post('category');
      $sup=$this->input->post('supplier');
      $data['incentive']=$this->Admin_model->get_incentiveedit($id,$cat,$sup);
   }else{
      $cat='';
      $sup='';
      $data['incentive']=$this->Admin_model->get_incentiveedit($id,$cat,$sup);
   }
   $data['cat']=$cat;
   $data['sup']=$sup;
   $data['category']=$this->Admin_model->get_categoryfetch($id);
   $data['supplier']=$this->Admin_model->get_supplier();

   $this->load->view('stock/incentiveedit1',$data); 
}
public function incentiveedit2(){
   $id=1;
   if(isset($_POST['submit'])){
      $cat=$this->input->post('category');
      $sup=$this->input->post('supplier');
      $data['incentive']=$this->Admin_model->get_incentiveedit($id,$cat,$sup);
   }else{
      $cat='';
      $sup='';
      $data['incentive']=$this->Admin_model->get_incentiveedit($id,$cat,$sup);
   }
   $data['cat']=$cat;
   $data['sup']=$sup;
   $data['category']=$this->Admin_model->get_categoryfetch($id);
   $data['supplier']=$this->Admin_model->get_supplier();

   $this->load->view('stock/incentiveedit2',$data); 
}
public function editstockdirect(){
   $cstockid=$this->input->post('cstockid');
   $cstock=$this->input->post('cstock');
   $item=$this->input->post('itemid');
   $batchid=$this->input->post('id');
   $checkcurrentstock=$this->Admin_model->getcheckCurrentStock($item,$batchid);
   if($checkcurrentstock==null){
     
     $cstockarray=array('cur_stock_item_id'=>$item,
     'current_stock_batch_id'=>$batchid,
     'cur_stock_item_count'=>$cstock,
     'stock_master_id'=>0,
     'added_date'=>'0000-00-00 23:30:15',
     'updated_date'=>'0000-00-00 23:30:15'
   );
   $this->db->insert('tbl_current_stock',$cstockarray);
   }else{
      $this->db->where('cur_stock_id',$checkcurrentstock->cur_stock_id);
      $carray=array('cur_stock_item_count'=>$cstock);
      $this->db->update('tbl_current_stock',$carray);
   }
  
   $bstockid=$this->input->post('bstockid');
   $bstock=$this->input->post('bstock');

   $checkBrach=$this->Admin_model->checkbranchstockIs($item,$batchid);
  // echo "<pre>";print_r($checkBrach);exit;
   if($checkBrach==null){
      echo "hi";exit;
      $stockbarray=array('inventory_stock_master_id'=>0,
      'inventory_stock_item_id'=>$item,
      'inventory_stock_item_batch_id'=>$batchid,
      'inventory_stock_itemcount'=>$bstock,
      'inventory_location_id'=>1);
     
      $this->db->insert('tbl_inventory_stock',$stockbarray);
   }else{
      $this->db->where('inventory_stock_id',$checkBrach->inventory_stock_id);
      $barray=array('inventory_stock_itemcount'=>$bstock);
      $this->db->update('tbl_inventory_stock',$barray);
   }
 
  

   $gstockid=$this->input->post('gstockid');
   $check=$this->Admin_model->checkgodwonstockIs($item,$batchid);
   
   $gstock=$this->input->post('gstock');
  
   if($check==null){
    
       $stockarray=array('inventory_stock_master_id'=>0,
       'inventory_stock_item_id'=>$item,
       'inventory_stock_item_batch_id'=>$batchid,
       'inventory_stock_itemcount'=>$gstock,
       'inventory_location_id'=>2);
      
       $this->db->insert('tbl_inventory_stock',$stockarray);

      

   }else{
    
      $this->db->where('inventory_stock_id',$check->inventory_stock_id);
      $garray=array('inventory_stock_itemcount'=>$gstock);
      $this->db->update('tbl_inventory_stock',$garray);

     
   }
 

 

}
public function editincentive(){
   $id=$this->input->post('id');
   $incentivetype=$this->input->post('incentivetype');
   $amount=$this->input->post('amount');
   $range1=$this->input->post('range1');
   $r1type=$this->input->post('r1type');
   $r1amount=$this->input->post('r1amount');
   $range2=$this->input->post('range2');
   $r2type=$this->input->post('r2type');
   $r2amount=$this->input->post('r2amount');
   $range3=$this->input->post('range3');
   $r3type=$this->input->post('r3type');
   $r3amount=$this->input->post('r3amount');
   $range4=$this->input->post('range4');
   $r4type=$this->input->post('r4type');
   $r4amount=$this->input->post('r4amount');
   $updatearray=array('incentive_type'=>$incentivetype,
   'in_peramount'=>$amount,
   'range1'=>$range1,
   'r1_type'=>$r1type,
   'r1_amount'=>$r1amount,
   'range2'=>$range2,
   'r2_type'=>$r2type,
   'r2_amount'=>$r2amount,
   'range3'=>$range3,
   'r3_type'=>$r3type,
   'r3_amount'=>$r3amount,
   'range4'=>$range4,
   'r4_type'=>$r4type,
   'r4_amount'=>$r4amount);
   $this->db->where('id',$id);
   $this->db->update('tbl_sale_incentive',$updatearray);

}



}