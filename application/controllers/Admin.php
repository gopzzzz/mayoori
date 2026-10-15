<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
public function __construct()    {  
parent::__construct();		
$this->load->model('Admin_model'); 
$this->load->library("pagination");
$this->load->helper('url');
}
public function index()
{
if($this->session->userdata('id')){
$this->load->view('admin/dashboard');
//$this->load->view('site/index');
}
else{

$this->load->view('common/login');
}
}

public function loginCheck(){
//$comm=$this->input->post('comm');
$act = $this->input->post('act');

$data=array('uname'=>$this->input->post('uname'),
'password'=>$this->input->post('password'));
//$result=$this->Admin_model->get_admin($data);
$data_check=$this->Admin_model->getlogin_details($data);

if(empty($data_check)){
$this->session->set_userdata('msg','Username or password error');		 
redirect('Admin/index');	
}
else if($data_check->u_type == 1){
$data_session=array('id'=>$data_check->id,'u_type'=>$data_check->u_type,'name'=>$data_check->uname,'b2c'=>$data_check->b2c,'b2b'=>$data_check->b2b,'dc'=>$data_check->dc,'sr'=>$data_check->sr,'pr'=>$data_check->pr);			

$this->session->set_userdata($data_session);				
$this->session->set_userdata('acti',1);	
$this->load->view('admin/dashboard');
}
else if($data_check->u_type == 2){
 $data_session=array('id'=>$data_check->id,'u_type'=>$data_check->u_type,'name'=>$data_check->uname,'b2c'=>$data_check->b2c,'b2b'=>$data_check->b2b,'dc'=>$data_check->dc,'sr'=>$data_check->sr,'pr'=>$data_check->pr);			

$this->session->set_userdata($data_session);		
$this->session->set_userdata('acti',2);
$imgid=$this->session->userdata('memb_id');
$data['mem']=$this->Admin_model->get_user_image($imgid);			
$this->load->view('admin/dashboard',$data);

}
else if($data_check->u_type == 4){
   $data_session=array('id'=>$data_check->id,'firmid'=>$data_check->godownid,'u_type'=>$data_check->u_type,'name'=>$data_check->uname,'b2c'=>$data_check->b2c,'b2b'=>$data_check->b2b,'dc'=>$data_check->dc,'sr'=>$data_check->sr,'pr'=>$data_check->pr);			

 $this->session->set_userdata($data_session);		
$this->session->set_userdata('acti',4);			
$this->load->view('admin/dashboard',$data);

}
else if($data_check->u_type == 5){
$data_session=array('id'=>$data_check->id,'firmid'=>$data_check->godownid,'u_type'=>$data_check->u_type,'name'=>$data_check->uname,'b2c'=>$data_check->b2c,'b2b'=>$data_check->b2b,'dc'=>$data_check->dc,'sr'=>$data_check->sr,'pr'=>$data_check->pr);			

$this->session->set_userdata($data_session);
$this->session->set_userdata('acti',5);
$this->load->view('admin/dashboard',$data);
}
else if($data_check->u_type == 6){
   $data_session=array('id'=>$data_check->id,'firmid'=>$data_check->godownid,'u_type'=>$data_check->u_type,'name'=>$data_check->uname,'b2c'=>$data_check->b2c,'b2b'=>$data_check->b2b,'dc'=>$data_check->dc,'sr'=>$data_check->sr,'pr'=>$data_check->pr);			
   
   $this->session->set_userdata($data_session);
   $this->session->set_userdata('acti',6);
   $this->load->view('admin/dashboard',$data);
   }
}
public function logout(){
$this->session->unset_userdata('id');
redirect('Admin');
}
public function sessionout(){
   if($this->session->userdata('id')==null){
      $this->session->unset_userdata('id');
      redirect('Admin');
   }else{
      return true;
   }
}
public function generatetoken(){
   $unique=uniqid();
   $datacheck=$this->Admin_model->get_checksalestoken($unique);
            if($datacheck==null){
               return $unique;
            }else{
               return $this->generatetoken();
            }
}
public function generatetokenpurchase(){
   $unique=uniqid();
   $datacheck=$this->Admin_model->get_checkpurchasetoken($unique);
            if($datacheck==null){
               return $unique;
            }else{
               return $this->generatetokenpurchase();
            }
}
public function generatetokenreturn(){
   $unique=uniqid();
   $datacheck=$this->Admin_model->get_checkreturntoken($unique);
            if($datacheck==null){
               return $unique;
            }else{
               return $this->generatetokenreturn();
            }
}
public function generatetokenorder(){
   $unique=uniqid();
   $datacheck=$this->Admin_model->get_checkordertoken($unique);
            if($datacheck==null){
               return $unique;
            }else{
               return $this->generatetokenorder();
            }
}
public function generatetokendc(){
   $unique=uniqid();
   $datacheck=$this->Admin_model->get_checkdctoken($unique);
            if($datacheck==null){
               return $unique;
            }else{
               return $this->generatetokendc();
            }
}
public function generatetokenb2b(){
   $unique=uniqid();
   $datacheck=$this->Admin_model->get_checksalesb2btoken($unique);
            if($datacheck==null){
               return $unique;
            }else{
               return $this->generatetokenb2b();
            }
}
public function purchasecalc(){
   if(isset($_POST['submit_search'])){
      $from=$this->input->post('fromdate');
      $to=$this->input->post('todate');
      $data['purchase']=$this->Admin_model->getpurchasefromto($from,$to);
     
   }else{
    
      $links="";
      $config = array();
      $config["base_url"] = base_url() . "Admin/purchasecalc";
      $config["total_rows"] = $this->Admin_model->record_count_purchase();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
   
     $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["purchase"] = $this->Admin_model->
      get_purchaselimitfetch($config["per_page"], $page);
     
   }
      $data["links"] = $this->pagination->create_links();
      $data['supplier']=$this->Admin_model->get_supplier();
      $data['employee']=$this->Admin_model->get_staff();
      $data['bilpur']=$this->Admin_model->get_automaticbillpur();
      $data['last_bill_number']=$this->Admin_model->get_lastbillnumberpur();
      $purchasetrans = $this->Admin_model->getalltable('tbl_purchase_trans');
      foreach($purchasetrans as $purchasesingle){
         $data['purchasetrans'][$purchasesingle->purchase_trans_purchase_master_id][] = $purchasesingle;
      }
      $items = $this->Admin_model->getalltable('tbl_item');
      foreach($items as $itemsingle){
      $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
      }
      $this->load->view('superadmin/purchaserate',$data);
   }

   public function purchaseadd(){
      
      $token=$this->input->post('token');
      $checktoken=$this->Admin_model->get_checkpurchasetoken($token);
      if($checktoken==null){


         $tablelogin = "login";
         $table ="tbl_purchase_master";
         $length = count($this->input->post('itemtotalamount'));
         
      
         $itemcode = $this->input->post('itemcode');
         $itemname = $this->input->post('itemname');
         $itembatch = $this->input->post('itembatch');
         $itemqnty = $this->input->post('quantity');
         $itemtaxable = $this->input->post('itemtaxable');
         $itemgstper = $this->input->post('itemgstper');
         $itemgstamount = $this->input->post('itemgstamount');
         $itemcessamount = $this->input->post('itemcessamount');
         $itemtotalamount = $this->input->post('itemtotalamount');
         $itemhsncode = $this->input->post('hsncode');
         $employee = $this->input->post('employee');
         //$uom = $this->input->post('uom');
         $transrate = $this->input->post('rate');
         $discount = $this->input->post('discount');
         $discount_type = $this->input->post('discount_type');
         $tax = $this->input->post('tax');
         $sellinrate = $this->input->post('sellingrate');
         $itemitemtbid = $this->input->post('itemitemtbid');
         $itemitemid = $this->input->post('itemid');
         $item_batch_id = $this->input->post('itembatchid');
         date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
         $now = date('Y-m-d H:i');
      
         $refnum=$this->input->post('refno');
         $bilpur=$this->Admin_model->get_automaticbillpur();
       
         $checkrefnum=$this->Admin_model->getreferencefeting($refnum);

        
         
         if($bilpur->mycount==0){
         $billnumber=1;
      
         }else{
            $last_bill_number=$this->Admin_model->get_lastbillnumberpur();
            //echo "<pre>";print_r($last_bill_number);exit;
            $billnumber=1+$last_bill_number->purchase_master_billno;
         }
         
         $billstatus=$this->input->post('esdemo');
         if($billstatus=='')
         {
            $billstatus=0;
         }
         else{
            $billstatus=$this->input->post('esdemo');
      
         }
         if($this->input->post('billdate')==null){
            $billingdate='0000-00-00';
         }else{
            $billingdate=$this->input->post('billdate');
         }
        
      
         $data = array(
         'purchase_master_ref_no'=> $this->input->post('refno'),
         'purchase_master_supplier' => $this->input->post('supplier'),
         'purchase_master_tax_type' => $this->input->post('taxtype'),
         'purchase_master_billno' =>$billnumber,
         'invoiceno'=>$this->input->post('invoiceno'),
         'purchase_master_billdate'=>$billingdate,
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
         'purchase_added_by' =>$this->session->userdata('id'),
         'purchase_paid_amount' =>$this->input->post('amount'),
         'purchase_status' =>$billstatus,
         'token'=>$token
         );
       
        
         if($checkrefnum==null){ 
           
       
         $lastid = $this->Admin_model->addrowtotable($table,$data);
         $data_supplier=array('paybal_supplier_id'=>$this->input->post('supplier'),
         'paybal_bill_number'=>$billnumber,
         'paybal_amount'=>$this->input->post('grandTotal'),
         'status'=>$this->input->post('defaultExampleRadios'));
         $this->db->insert('tbl_supplier_paybalance',$data_supplier);
         
         }else{
          
          $demobill=array('demo_master_ref_no'=>$checkrefnum->purchase_master_ref_no,
          'demo_master_supplier'=>$checkrefnum->purchase_master_supplier,
          'demo_master_tax_type'=>$checkrefnum->purchase_master_tax_type,
          'demo_master_billno'=>$checkrefnum->purchase_master_billno,
          'demo_master_billdate'=>$checkrefnum->purchase_master_billdate,
          'demo_master_extra_discount'=>$checkrefnum->purchase_master_extra_discount,
          'demo_master_tot_quantity'=>$checkrefnum->purchase_master_tot_quantity,
          'demo_master_roundoff'=>$checkrefnum->purchase_master_roundoff,
          'demo_master_goods_receipt_noteno'=>$checkrefnum->purchase_master_goods_receipt_noteno,
          'demo_master_taxable_value'=>$checkrefnum->purchase_master_taxable_value,
          'demo_master_grandtotal'=>$checkrefnum->purchase_master_grandtotal,
          'demo_master_notes'=>$checkrefnum->purchase_master_notes,
          'demo_master_payment_mode'=>$checkrefnum->purchase_master_payment_mode,
          'demo_master_othercharges'=>$checkrefnum->purchase_master_othercharges,
          'demo_master_tax'=>$checkrefnum->purchase_master_tax,
          'demo_master_discount'=>$checkrefnum->purchase_master_discount,
          'demo_added_by'=>$checkrefnum->purchase_added_by
         );
      
        
         if($this->db->insert('tbl_demo_bill_master',$demobill)){
      
             $demolastid=$this->db->insert_id();
             $purtrans=$this->Admin_model->get_purchasetransdetails($checkrefnum->purchase_master_id);
            foreach($purtrans as $purtrans){
      
               $demotrans=array('demo_trans_purchase_master_id'=>$purtrans->purchase_trans_purchase_master_id,
               'demo_trans_item_code'=>$purtrans->purchase_trans_item_code,
               'demo_trans_hsncode'=>$purtrans->purchase_trans_hsncode,
               'demo_trans_unit_id'=>$purtrans->purchase_trans_unit_id,
               'demo_trans_rate'=>$purtrans->purchase_trans_rate,
               'demo_trans_qty'=>$purtrans->purchase_trans_qty,
               'demo_trans_discount_type'=>$purtrans->purchase_trans_discount_type,
               'demo_trans_discount_value'=>$purtrans->purchase_trans_discount_value,
               'demo_trans_discount_id'=>$purtrans->purchase_trans_discount_id,
               'demo_trans_tax'=>$purtrans->purchase_trans_tax,
               'demo_trans_selling_rate'=>$purtrans->purchase_trans_selling_rate,
               'demo_trans_tot_amount'=>$purtrans->purchase_trans_tot_amount,
               'demo_item_id'=>$purtrans->purchase_item_id,
               'demo_item_batch_id'=>$purtrans->purchase_item_batch_id);
               $this->db->insert('tbl_demo_trans',$demotrans);
            }
         }
        
      
         $this->db->where('tbl_purchase_master.purchase_master_ref_no',$refnum);
         if($this->db->delete('tbl_purchase_master')){
         $lastid = $this->Admin_model->addrowtotable($table,$data);
         }
         
      
         }
       
        

         $data_payments=array('pay_type'=>1,
         'pay_type_id'=>$lastid,
         'created_at'=>$now);
         $this->db->insert('tbl_payments',$data_payments);
        
      
         for($i=0;$i<$length;$i++){
      
         
            if($checkrefnum!=null)
            {
               
             $purchtrans=$this->Admin_model->get_checkpurchasetrans($checkrefnum->purchase_master_id,$item_batch_id[$i]);
      
               if($purchtrans!='')
               {
                  
                  $opn_year=date('Y-m-d');
                  $ob_balance=$purchtrans->purchase_trans_tot_amount-$itemtotalamount[$i];
                  $op_stock=$purchtrans->purchase_trans_qty-$itemqnty[$i];
                  $item_id=$purchtrans->purchase_item_id;
                   $batch_id=$purchtrans->purchase_item_batch_id;
                   $supplier_id=$this->input->post('supplier');
                   $obrefernec_no=$checkrefnum->purchase_master_ref_no;
                   $data_opbalance=array('obl_year'=>$opn_year,
                                          'obl_amount	'=>$ob_balance,
                                          'op_stock'=>$op_stock,
                                          'item_id	'=>$item_id,
                                          'batch_id'=>$batch_id,
                                          'suplier_id'=>$supplier_id,
                                          'oprefnum'=>$obrefernec_no
      
                                                       
                      );
                  
                  $this->Admin_model->add_openingbalance($data_opbalance);
      
               }
            }
            
          
            $datatrans = array(
                           'purchase_trans_purchase_master_id' => $lastid,
                           'purchase_trans_item_code' => $itemcode[$i],
                           'purchase_trans_qty' => $itemqnty[$i],
                           'purchase_trans_hsncode' => $itemhsncode[$i],
                           //'purchase_trans_unit_id' => $uom[$i],
                           'purchase_trans_rate' => $transrate[$i],
                           'purchase_trans_discount_type' => $discount_type[$i],
                           'purchase_trans_discount_id' => $discount[$i],//discount value is saved
                           'purchase_trans_tax' => $tax[$i],
                           'purchase_trans_selling_rate' => $sellinrate[$i],
                           'purchase_trans_tot_amount' => $itemtotalamount[$i],
                           'purchase_item_id'=>$itemitemid[$i],
                           'purchase_item_batch_id'=>$item_batch_id[$i]
                     );

                    
      
            if($checkrefnum==null){
               $this->Admin_model->addrowtotable('tbl_purchase_trans',$datatrans);
             
                 
            $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'),$itemitemid[$i], $item_batch_id[$i]);
            
           
           
            $itemcount  =  $itemqnty[$i];
            
            $godown_or_firm_id = $this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
            // echo  $godown_or_firm_id ;exit;
      
            $datainventstock = array(
               'inventory_stock_master_id' => $lastid,
               'inventory_stock_item_id' => $itemitemid[$i],
               'inventory_stock_item_batch_id' => $item_batch_id[$i],
               'inventory_location_id' => $godown_or_firm_id,// tbl_godownfirm godownid
               );
      
            if(!empty($checkinventstock_for_item[$i])){//Item already exists...Update stock count
              
               $totalstock_count  = $checkinventstock_for_item[$i]->inventory_stock_itemcount + $itemcount; //old stock + current stock
      
               $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
               $this->db->where('inventory_stock_id',$checkinventstock_for_item[$i]->inventory_stock_id);
               $this->db->update('tbl_inventory_stock',$datainventstock);
      
            }else{//Insert Item with stock count
             
              // $datainventstock['inventory_stock_itemcount'] = $itemcount;
               $datainventstocknew = array(
                  'inventory_stock_master_id' => $lastid,
                  'inventory_stock_item_id' => $itemitemid[$i],
                  'inventory_stock_item_batch_id' => $item_batch_id[$i],
                  'inventory_location_id' => $godown_or_firm_id,
                  'inventory_stock_itemcount'=>$itemqnty[$i]// tbl_godownfirm godownid
                  );
                 
                // print_r($datainventstocknew);exit;
               $this->Admin_model->addrowtotable('tbl_inventory_stock',$datainventstocknew);
             
               
            }
            
            }else{
               $this->db->where('tbl_purchase_trans.purchase_trans_purchase_master_id',$checkrefnum->purchase_master_id);
               if($this->db->delete('tbl_purchase_trans')){
                  $this->Admin_model->addrowtotable('tbl_purchase_trans',$datatrans);
               }
              
            }
            
      
      
      
      }

   
   
        if($checkrefnum==null){
         $addstock=array('stock_master_type'=>1,
         'stock_master_type_id'=>$lastid,
         'stock_master_added_date'=>$now);
         $stockmasterid=$this->Admin_model->addstocktable('tbl_stock_master',$addstock);
      
         for($i=0;$i<$length;$i++){
         
            $checkitem[$i]=$this->Admin_model->get_checkitem($itemitemid[$i],$item_batch_id[$i]);
            
         
            if($checkitem[$i]==null){
               $dataCurrentstock=array('cur_stock_item_id'=>$itemitemid[$i],
               'current_stock_batch_id'=>$item_batch_id[$i],
               'cur_stock_item_count'=>$itemqnty[$i],
               'added_date'=>$now,
               'stock_master_id'=>$stockmasterid);
               $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemitemid[$i],
               'cur_stock_history_item_count'=>$itemqnty[$i],
               'cur_stock_history_batchid'=>$item_batch_id[$i],
               'cur_stock_history_added_date'=>$now,
               'cur_stock_history_stock_master_id'=>$stockmasterid,
              'purpose'=>'purchase add');
               $this->db->insert('tbl_current_stock',$dataCurrentstock);
               $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            }else{
               $count[$i]=$checkitem[$i]->cur_stock_item_count;
               $Totalcount[$i]=$count[$i]+$itemqnty[$i];
            
               $dataCurrentstock=array('cur_stock_item_id'=>$itemitemid[$i],
               'current_stock_batch_id'=>$item_batch_id[$i],
               'cur_stock_item_count'=>$Totalcount[$i],
               'added_date'=>$now,
               'stock_master_id'=>$stockmasterid);
               $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemitemid[$i],
               'cur_stock_history_batchid'=>$item_batch_id[$i],
               'cur_stock_history_item_count'=>$itemqnty[$i],
               'cur_stock_history_added_date'=>$now,
               'cur_stock_history_stock_master_id'=>$stockmasterid,
               'purpose'=>'purchase add');
               $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
               $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
               $this->db->update('tbl_current_stock',$dataCurrentstock);
            
            }
            
            
         }
      
      }
     
            
            
   
      }
   
    
      redirect('purchase');
   }

   public function getpurchase_details(){
      $id=$this->input->post('id');
      $data['supplier']=$this->Admin_model->get_supplier();
        
      
      $data['purchasedetails']         =  $this->Admin_model->getalltablewhererow('tbl_purchase_master',array('purchase_master_id'=>$id));
      $data['purchase_itemlist']       =  $this->Admin_model->get_purchaseitemfetch($id);
      //echo "<pre>";print_r($data['purchase_itemlist']);exit;
      $this->load->view('superadmin/purchaserate_edit',$data);
   }
   //============================================================
public function member_registration(){	
if(isset($_POST['submit'])){	
$config['upload_path'] = './uploads/members/'; 
$config['allowed_types'] = 'gif|jpg|png|jpeg';   
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;    
$this->load->library('upload', $config);  
if (!$this->upload->do_upload('userfile')) {   
$error = array('error' => $this->upload->display_errors());  
} else {		
$data=array('name'=>$this->input->post('name'),	
'district'=>$this->input->post('dist'),		
'sex'=>$this->input->post('sex'),		
'father_or_hus_name'=>$this->input->post('fa_name'),	
'nationality'=>$this->input->post('nat'),		
'dob'=>$this->input->post('dob'),			
'm_status'=>$this->input->post('mst'),		
'profession_coun'=>$this->input->post('coun'),	
'profession_trainer'=>$this->input->post('trai'),		
'profession_coach'=>$this->input->post('coach'),	
'per_add'=>$this->input->post('add'),		
'com_add'=>$this->input->post('addcom'),	
'phone_num'=>$this->input->post('phnum'),	
'email_id'=>$this->input->post('email'),	
'photo'=>$this->upload->data('file_name'),
'u_type'=>$this->session->userdata('u_type'));	
$this->db->insert('tbl_member_reg',$data);	
redirect('mem_reg');	
}     
}
if(isset($_POST['submit_edit'])){
$id=$this->input->post('mid');
$img=$this->input->post('img');
$config['upload_path'] = './uploads/members/';
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$config['max_size'] = 20000;
$config['max_width'] = 15000;
$config['max_height'] = 15000;
$this->load->library('upload', $config);
if (!$this->upload->do_upload('userfile')) {
$data=array('name'=>$this->input->post('name'),	
'district'=>$this->input->post('dist'),		
'sex'=>$this->input->post('sex'),		
'father_or_hus_name'=>$this->input->post('fa_name'),	
'nationality'=>$this->input->post('nat'),		
'dob'=>$this->input->post('dob'),			
'm_status'=>$this->input->post('mst'),		
'profession_coun'=>$this->input->post('coun'),	
'profession_trainer'=>$this->input->post('trai'),		
'profession_coach'=>$this->input->post('coach'),	
'per_add'=>$this->input->post('add'),		
'com_add'=>$this->input->post('addcom'),	
'phone_num'=>$this->input->post('phnum'),	
'email_id'=>$this->input->post('email'),
'u_type'=>$this->session->userdata('u_type')	
);	
$this->db->where('membership_id',$id);			
$this->db->update('prop_common_image',$data);
redirect('mem_reg');		
} else {
$data=array('name'=>$this->input->post('name'),	
'district'=>$this->input->post('dist'),		
'sex'=>$this->input->post('sex'),		
'father_or_hus_name'=>$this->input->post('fa_name'),	
'nationality'=>$this->input->post('nat'),		
'dob'=>$this->input->post('dob'),			
'm_status'=>$this->input->post('mst'),		
'profession_coun'=>$this->input->post('coun'),	
'profession_trainer'=>$this->input->post('trai'),		
'profession_coach'=>$this->input->post('coach'),	
'per_add'=>$this->input->post('add'),		
'com_add'=>$this->input->post('addcom'),	
'phone_num'=>$this->input->post('phnum'),	
'email_id'=>$this->input->post('email'),	
'photo'=>$this->upload->data('file_name'),
'u_type'=>$this->session->userdata('u_type'));	
$this->db->where('membership_id', $id);			
if($this->db->update('tbl_member_reg',$data)){
$path='./uploads/members/'.$img;
unlink($path);
redirect('mem_reg');				
}
}
}
$data['member']=$this->Admin_model->get_member_registration();	
$this->load->view('admin/mem_reg',$data);	
}	
public function customer_creation(){
if(isset($_POST['submit'])){
$config['upload_path']='./uploads/customer/';
$config['allowed_types']='gif|jpg|png|jpeg';
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;  
$this->load->library('upload',$config);
$this->upload->initialize($config);
$datalogin = array(
   'phoneno' => $this->input->post('phnum'),
   'uname' => $this->input->post('name'),
   'password' => $this->input->post('name'),
   'u_type' => 3,
   'customer_type' => 'b2b'
   );
   $this->db->insert('login',$datalogin);
   $loginid=$this->db->insert_id();
if(!$this->upload->do_upload('userfile')){
$address_purpose = $this->input->post('addpur');

$data=array('cus_code'=>$this->input->post('code'),
'cus_name'=>$this->input->post('name'),	
'cus_address'=>$this->input->post('cus_add'),		
'cus_phonenumber'=>$this->input->post('phnum'),		
'cus_email'=>$this->input->post('email'),	
'cus_gstnumber'=>$this->input->post('gst'),		
'cus_opening_balance'=>$this->input->post('opbal'),			
'cus_credit_debit'=>$this->input->post('crde'),
'cus_address_purpose'=>implode(",", $address_purpose),
'login_id'=>$loginid					
);	
$this->db->insert('tbl_customer',$data);
redirect('customer');
}
else{
$address_purpose = $this->input->post('addpur');
//$credit_debit = $this->input->post('crde');
$data=array('cus_code'=>$this->input->post('code'),
'cus_name'=>$this->input->post('name'),	
'cus_address'=>$this->input->post('cus_add'),		
'cus_phonenumber'=>$this->input->post('phnum'),		
'cus_email'=>$this->input->post('email'),	
'cus_gstnumber'=>$this->input->post('gst'),		
'cus_opening_balance'=>$this->input->post('opbal'),			
'cus_credit_debit'=>$this->input->post('crde'),
'cus_address_purpose'=>implode(",", $address_purpose),					
'cus_image'=>$this->upload->data('file_name'),
'login_id'=>$loginid		
);	
$this->db->insert('tbl_customer',$data);
redirect('customer');
}
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('cus_id');
$address_purpose = $this->input->post('addpur');
$config['upload_path']='./uploads/customer/';
$config['allowed_types']='gif|jpg|png|jpeg';
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;  
$this->load->library('upload',$config);
$this->upload->initialize($config);
if(!$this->upload->do_upload('userfile')){
   $sid=$this->input->post('cus_id');
   $address_purpose = $this->input->post('addpur');
   $data=array('cus_code'=>$this->input->post('code'),
   'cus_name'=>$this->input->post('name'),	
   'cus_address'=>$this->input->post('cus_add'),		
   'cus_phonenumber'=>$this->input->post('phnum'),		
   'cus_email'=>$this->input->post('email'),	
   'cus_gstnumber'=>$this->input->post('gst'),		
   'cus_opening_balance'=>$this->input->post('opbal'),			
   'cus_credit_debit'=>$this->input->post('crde'),
   // 'cus_credit_debit'=>implode(",", $credit_debit),	
   //'cus_address_purpose'=>$this->input->post('addpur'),
   'cus_address_purpose'=>implode(",", $address_purpose)
   );	
   $this->db->where('customer_id',$sid);
   $this->db->update('tbl_customer',$data);
   redirect('customer');
}
else{
$sid=$this->input->post('cus_id');
$address_purpose = $this->input->post('addpur');
$data=array('cus_code'=>$this->input->post('code'),
'cus_name'=>$this->input->post('name'),	
'cus_address'=>$this->input->post('cus_add'),		
'cus_phonenumber'=>$this->input->post('phnum'),		
'cus_email'=>$this->input->post('email'),	
'cus_gstnumber'=>$this->input->post('gst'),		
'cus_opening_balance'=>$this->input->post('opbal'),			
'cus_credit_debit'=>$this->input->post('crde'),
// 'cus_credit_debit'=>implode(",", $credit_debit),	
//'cus_address_purpose'=>$this->input->post('addpur'),
'cus_address_purpose'=>implode(",", $address_purpose),					
'cus_image'=>$this->upload->data('file_name')
);	
$this->db->where('customer_id',$sid);
$this->db->update('tbl_customer',$data);
redirect('customer');
}
}
$data['lastid']=$this->Admin_model->get_lastcustomer(); 
$data['cust']=$this->Admin_model->get_customer();
$this->load->view('superadmin/customer',$data);
}
public function delete_customer_creation($id){
$this->db->where('customer_id',$id);
$this->db->delete('tbl_customer');
redirect('customer');
}
public function supplier_creation(){
if(isset($_POST['submit'])){
$data=array('sup_code'=>$this->input->post('code'),
'sup_name'=>$this->input->post('name'),
'sup_address'=>$this->input->post('sup_add'),
'sup_phoneno'=>$this->input->post('phnum'),
'sup_mobileno'=>$this->input->post('mbnum'),
'sup_mobilenumber_2'=>$this->input->post('mbnum2'),
'sup_email'=>$this->input->post('email'),
'sup_gst'=>$this->input->post('gst'),
'sup_pan'=>$this->input->post('pan'),
'sup_bank'=>$this->input->post('bank'),
'sup_acno'=>$this->input->post('ac_number'),
'sup_ifsc'=>$this->input->post('ifsc'),
'sup_mainbill'=>$this->input->post('mnbill'),
'sup_opbalance'=>$this->input->post('opbal'),
'sup_paytype'=>$this->input->post('crde')
);
$this->db->insert('tbl_supplier',$data);
redirect('supplier');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('sup_id');
$data=array('sup_code'=>$this->input->post('code'),
'sup_name'=>$this->input->post('name'),
'sup_address'=>$this->input->post('sup_add'),
'sup_phoneno'=>$this->input->post('phnum'),
'sup_mobileno'=>$this->input->post('mbnum'),
'sup_email'=>$this->input->post('email'),
'sup_gst'=>$this->input->post('gst'),
'sup_pan'=>$this->input->post('pan'),
'sup_bank'=>$this->input->post('bank'),
'sup_acno'=>$this->input->post('ac_number'),
'sup_ifsc'=>$this->input->post('ifsc'),
'sup_mainbill'=>$this->input->post('mnbill'),
'sup_opbalance'=>$this->input->post('opbal'),
'sup_paytype'=>$this->input->post('crde'));
$this->db->where('sup_id',$sid);
$this->db->update('tbl_supplier',$data);
redirect('supplier');
}
$data['lastid']=$this->Admin_model->get_lastsuplier();
$data['supcount']=$this->Admin_model->get_suppliercount();
//print_r($data['supcount']);
//exit;
$data['suplr']=$this->Admin_model->get_supplier();
$this->load->view('superadmin/supplier',$data);
}
public function delete_supplier_creation($id){
$this->db->where('sup_id',$id);
$this->db->delete('tbl_supplier');
redirect('supplier');
}

public function staff_creation(){
if(isset($_POST['submit'])){

$config['upload_path']='./uploads/staff/';
$config['allowed_types']='gif|jpg|png|jpeg';
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;  
$this->load->library('upload',$config);
$this->upload->initialize($config);
if(!$this->upload->do_upload('userfile')){
$data=array('stf_code'=>$this->input->post('code'),
'stf_name'=>$this->input->post('name'),
'stf_address'=>$this->input->post('stf_add'),
'stf_gender'=>$this->input->post('gndr'),
'stf_place'=>$this->input->post('place'),
'stf_district'=>$this->input->post('district'),
'stf_mbnumber'=>$this->input->post('mbnum'),
'stf_phno'=>$this->input->post('phnum'),
'stf_email'=>$this->input->post('email'),
'stf_adhar'=>$this->input->post('adhr'),
'stf_jdate'=>$this->input->post('jdate'),
'stf_branch'=>$this->input->post('branch'),
'stf_dept'=>$this->input->post('dept'),
'stf_position'=>$this->input->post('postn'),
'stf_epf'=>$this->input->post('epf'),
'stf_uan'=>$this->input->post('uan'),
'stf_rdate'=>$this->input->post('rdate'),
'stf_salary'=>$this->input->post('salary'),
'stf_pmode'=>$this->input->post('mode'),
'stf_bname'=>$this->input->post('bank'),
'stf_brname'=>$this->input->post('branch_name'),
'stf_hname'=>$this->input->post('ac_name'),
'stf_acno'=>$this->input->post('ac_number'),
'stf_ifsc'=>$this->input->post('ifsc')
);	

$this->db->insert('tbl_staff',$data);
redirect('staff');
}
else{
$data=array('stf_code'=>$this->input->post('code'),
'stf_name'=>$this->input->post('name'),
'stf_address'=>$this->input->post('stf_add'),
'stf_gender'=>$this->input->post('gndr'),
'stf_place'=>$this->input->post('place'),
'stf_district'=>$this->input->post('district'),
'stf_mbnumber'=>$this->input->post('mbnum'),
'stf_phno'=>$this->input->post('phnum'),
'stf_email'=>$this->input->post('email'),
'stf_adhar'=>$this->input->post('adhr'),
'stf_jdate'=>$this->input->post('jdate'),
'stf_branch'=>$this->input->post('branch'),
'stf_dept'=>$this->input->post('dept'),
'stf_position'=>$this->input->post('postn'),
'stf_epf'=>$this->input->post('epf'),
'stf_uan'=>$this->input->post('uan'),
'stf_rdate'=>$this->input->post('rdate'),
'stf_salary'=>$this->input->post('salary'),
'stf_pmode'=>$this->input->post('mode'),
'stf_bname'=>$this->input->post('bank'),
'stf_brname'=>$this->input->post('branch_name'),
'stf_hname'=>$this->input->post('ac_name'),
'stf_acno'=>$this->input->post('ac_number'),
'stf_ifsc'=>$this->input->post('ifsc'),
'stf_image'=>$this -> upload -> data('file_name'));
$this->db->insert('tbl_staff',$data);

redirect('staff');
}
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('staff_id');
$config['upload_path']='./uploads/staff/';
$config['allowed_types']='gif|jpg|png|jpeg';
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;  
$this->load->library('upload',$config);
$this->upload->initialize($config);
if(!$this->upload->do_upload('userfile')){
   $sid=$this->input->post('staff_id');
   $data=array('stf_code'=>$this->input->post('code'),
   'stf_name'=>$this->input->post('name'),
   'stf_address'=>$this->input->post('stf_add'),
   'stf_gender'=>$this->input->post('gndr'),
   'stf_place'=>$this->input->post('place'),
   'stf_district'=>$this->input->post('district'),
   'stf_mbnumber'=>$this->input->post('mbnum'),
   'stf_phno'=>$this->input->post('phnum'),
   'stf_email'=>$this->input->post('email'),
   'stf_adhar'=>$this->input->post('adhr'),
   'stf_jdate'=>$this->input->post('jdate'),
   'stf_branch'=>$this->input->post('branch'),
   'stf_dept'=>$this->input->post('dept'),
   'stf_position'=>$this->input->post('postn'),
   'stf_epf'=>$this->input->post('epf'),
   'stf_uan'=>$this->input->post('uan'),
   'stf_rdate'=>$this->input->post('rdate'),
   'stf_salary'=>$this->input->post('salary'),
   'stf_pmode'=>$this->input->post('mode'),
   'stf_bname'=>$this->input->post('bank'),
   'stf_brname'=>$this->input->post('branch_name'),
   'stf_hname'=>$this->input->post('ac_name'),
   'stf_acno'=>$this->input->post('ac_number'),
   'stf_ifsc'=>$this->input->post('ifsc')
   );
   $this->db->where('stf_id',$sid);
   $this->db->update('tbl_staff',$data);
}
else{
$sid=$this->input->post('staff_id');
$data=array('stf_code'=>$this->input->post('code'),
'stf_name'=>$this->input->post('name'),
'stf_address'=>$this->input->post('stf_add'),
'stf_gender'=>$this->input->post('gndr'),
'stf_place'=>$this->input->post('place'),
'stf_district'=>$this->input->post('district'),
'stf_mbnumber'=>$this->input->post('mbnum'),
'stf_phno'=>$this->input->post('phnum'),
'stf_email'=>$this->input->post('email'),
'stf_adhar'=>$this->input->post('adhr'),
'stf_jdate'=>$this->input->post('jdate'),
'stf_branch'=>$this->input->post('branch'),
'stf_dept'=>$this->input->post('dept'),
'stf_position'=>$this->input->post('postn'),
'stf_epf'=>$this->input->post('epf'),
'stf_uan'=>$this->input->post('uan'),
'stf_rdate'=>$this->input->post('rdate'),
'stf_salary'=>$this->input->post('salary'),
'stf_pmode'=>$this->input->post('mode'),
'stf_bname'=>$this->input->post('bank'),
'stf_brname'=>$this->input->post('branch_name'),
'stf_hname'=>$this->input->post('ac_name'),
'stf_acno'=>$this->input->post('ac_number'),
'stf_ifsc'=>$this->input->post('ifsc'),
'stf_image'=>$this -> upload -> data('file_name'));
$this->db->where('stf_id',$sid);
$this->db->update('tbl_staff',$data);
redirect('staff');
}
}
$data['lastid']=$this->Admin_model->get_laststaffcode();
$data['stfcount']=$this->Admin_model->get_staffcount();
$data['staff']=$this->Admin_model->get_staff1();
$this->load->view('superadmin/staff',$data);
}
public function delete_staff_creation($id){
$this->db->where('stf_id',$id);
$this->db->delete('tbl_staff');
redirect('staff');
}
public function Ledger_creation(){
if(isset($_POST['submit'])){
$data = array('le_name'=>$this->input->post('name'),
'le_accgrp'=>$this->input->post('acc_group'),
'le_opbalance'=>$this->input->post('opbal'),
'le_fyear'=>$this->input->post('year'),
'le_notes'=>$this->input->post('notes'),
'le_paymenttype'=>$this->input->post('paytype')
);
$this->db->insert('tbl_ledger',$data);
redirect('ledger');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('lgd_id');
$data=array('le_name'=>$this->input->post('name'),
'le_accgrp'=>$this->input->post('acc_group'),
'le_opbalance'=>$this->input->post('opbal'),
'le_fyear'=>$this->input->post('year'),
'le_notes'=>$this->input->post('notes'));
$this->db->where('le_id',$sid);
$this->db->update('tbl_ledger',$data);
redirect('ledger');
}
$data['fyear']=$this->Admin_model->get_fyear();
$data['ledgr']=$this->Admin_model->get_ledger();
$this->load->view('superadmin/ledger',$data);
}
public function delete_ledger_creation($id){
$this->db->where('le_id',$id);
$this->db->delete('tbl_ledger');
redirect('ledger');
}
public function bank_account_creation(){
if(isset($_POST['submit'])){
$data = array('ba_holdname'=>$this->input->post('name'),
'ba_acnumber'=>$this->input->post('ac_no'),
'ba_bank_id'=>$this->input->post('bank_name'),
'ba_branch'=>$this->input->post('branch'),
'ba_ifsc'=>$this->input->post('ifsc'),
'ba_phnumber'=>$this->input->post('phnum'),
'ba_email'=>$this->input->post('email'),
'ba_actype'=>$this->input->post('type'),
'ba_opdate'=>$this->input->post('opdate'),
'ba_opbalance'=>$this->input->post('opbal')
);
$this->db->insert('tbl_bankaccount',$data);
redirect('bank_account');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('ba_id');
$data=array('ba_holdname'=>$this->input->post('name'),
'ba_acnumber'=>$this->input->post('ac_no'),
'ba_bank_id'=>$this->input->post('bank_name'),
'ba_branch'=>$this->input->post('branch'),
'ba_ifsc'=>$this->input->post('ifsc'),
'ba_phnumber'=>$this->input->post('phnum'),
'ba_email'=>$this->input->post('email'),
'ba_actype'=>$this->input->post('crde'),
'ba_opdate'=>$this->input->post('opdate'),
'ba_opbalance'=>$this->input->post('opbal'));
$this->db->where('ba_id',$sid);
$this->db->update('tbl_bankaccount',$data);
redirect('bank_account');
}
$data['baccount']=$this->Admin_model->get_baccount();
$data['bank']=$this->Admin_model->get_bank();
$this->load->view('superadmin/bank_account',$data);
}
public function delete_bank_account($id){
$this->db->where('ba_id',$id);
$this->db->delete('tbl_bankaccount');
redirect('bank_account');
}
public function branch_register(){
if(isset($_POST['submit'])){
$config['upload_path']='./uploads/branch/';
$config['allowed_types']='gif|jpg|png|jpeg';
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;  
$this->load->library('upload',$config);
$this->upload->initialize($config);
if(!$this->upload->do_upload('userfile')){
$data=array('brn_code'=>$this->input->post('code'),
'brn_name'=>$this->input->post('name'),
'brn_address'=>$this->input->post('brn_add'),
'brn_phnumber'=>$this->input->post('phnum'),
'brn_email'=>$this->input->post('email'),
'brn_gst'=>$this->input->post('gst'),
'brn_pan'=>$this->input->post('pan'),
'branch_openingbal'=>$this->input->post('opbal'),
'branch_paymenttype'=>$this->input->post('oppaytype'),
'brn_bname'=>$this->input->post('bank'),
'brn_acno'=>$this->input->post('ac_number'),
'brn_branch'=>$this->input->post('branch'),
'brn_ifsc'=>$this->input->post('ifsc')
);
$this->db->insert('tbl_branch',$data);
redirect('branch');
}
else{
$data=array('brn_code'=>$this->input->post('code'),
'brn_name'=>$this->input->post('name'),
'brn_address'=>$this->input->post('brn_add'),
'brn_phnumber'=>$this->input->post('phnum'),
'brn_email'=>$this->input->post('email'),
'brn_gst'=>$this->input->post('gst'),
'brn_pan'=>$this->input->post('pan'),
'branch_openingbal'=>$this->input->post('opbal'),
'branch_paymenttype'=>$this->input->post('oppaytype'),
'brn_bname'=>$this->input->post('bank'),
'brn_acno'=>$this->input->post('ac_number'),
'brn_branch'=>$this->input->post('branch'),
'brn_ifsc'=>$this->input->post('ifsc'),
'brn_image'=>$this -> upload -> data('file_name'));
$this->db->insert('tbl_branch',$data);
redirect('branch');
}
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('brn_id');
$config['upload_path']='./uploads/branch/';
$config['allowed_types']='gif|jpg|png|jpeg';
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;  
$this->load->library('upload',$config);
$this->upload->initialize($config);
if(!$this->upload->do_upload('userfile')){
   $sid=$this->input->post('brn_id');
   $data=array('brn_code'=>$this->input->post('code'),
   'brn_name'=>$this->input->post('name'),
   'brn_address'=>$this->input->post('brn_add'),
   'brn_phnumber'=>$this->input->post('phnum'),
   'brn_email'=>$this->input->post('email'),
   'brn_gst'=>$this->input->post('gst'),
   'brn_pan'=>$this->input->post('pan'),
   'brn_notes'=>$this->input->post('notes'),
   'brn_bname'=>$this->input->post('bank'),
   'brn_acno'=>$this->input->post('ac_number'),
   'brn_branch'=>$this->input->post('branch'),
   'brn_ifsc'=>$this->input->post('ifsc'),
  );
   $this->db->where('brn_id',$sid);
   $this->db->update('tbl_branch',$data);
   redirect('branch');
}
else{
$sid=$this->input->post('brn_id');
$data=array('brn_code'=>$this->input->post('code'),
'brn_name'=>$this->input->post('name'),
'brn_address'=>$this->input->post('brn_add'),
'brn_phnumber'=>$this->input->post('phnum'),
'brn_email'=>$this->input->post('email'),
'brn_gst'=>$this->input->post('gst'),
'brn_pan'=>$this->input->post('pan'),
'brn_notes'=>$this->input->post('notes'),
'brn_bname'=>$this->input->post('bank'),
'brn_acno'=>$this->input->post('ac_number'),
'brn_branch'=>$this->input->post('branch'),
'brn_ifsc'=>$this->input->post('ifsc'),
'brn_image'=>$this -> upload -> data('file_name'));
$this->db->where('brn_id',$sid);
$this->db->update('tbl_branch',$data);
redirect('branch');
}
}
$data['brnh']=$this->Admin_model->get_branch();
$this->load->view('superadmin/branch_register',$data);
}
public function delete_branch_register($id){
$this->db->where('brn_id',$id);
$this->db->delete('tbl_branch');
redirect('branch');
}
public function financial_year(){
if(isset($_POST['submit'])){
$data = array('fn_year'=>$this->input->post('fyear'));
$this->db->insert('tbl_financialyear',$data);
redirect('fyear');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('fy_id');
$data=array('fn_year'=>$this->input->post('fyear'));
$this->db->where('fy_id',$sid);
$this->db->update('tbl_financialyear',$data);
redirect('fyear');
}
$data['fyear']=$this->Admin_model->get_fyear();
$this->load->view('superadmin/financial_year',$data);
}
public function delete_financial_year($id){
$this->db->where('fy_id',$id);
$this->db->delete('tbl_financialyear');
redirect('fyear');
}
public function item_creation(){

   if(isset($_POST['submit'])){
      $itemcode=$this->input->post('code');
      $checkitemcode=$this->Admin_model->get_duplicateitemcode($itemcode);

      if($checkitemcode==null){
       
         $data = array('itm_code'=>$this->input->post('code'),
         'itm_name'=>$this->input->post('name'),
         'itm_unit'=>$this->input->post('units'),
       
         'itm_group'=>$this->input->post('group'),
         'itm_cat'=>$this->input->post('cat'),
         //'itm_hsn'=>$this->input->post('hsn'),
         'itm_brand_id'=>$this->input->post('brand_id'),
        

      );
         $this->db->insert('tbl_item',$data);
         redirect('item');
      }else{
        echo "Item code existed.please use another one";
         exit;
      }
     
   }
   
   if(isset($_POST['submit_edit'])){

      $sid=$this->input->post('itm_id');
      $data = array('itm_code'=>$this->input->post('code'),
      'itm_name'=>$this->input->post('name'),
      'itm_unit'=>$this->input->post('units'),
      // 'itm_sup'=>$this->input->post('splr'),
      'itm_group'=>$this->input->post('group'),
      'itm_cat'=>$this->input->post('cat'),
      'itm_brand_id'=>$this->input->post('brand_id_edit'),
    
      );
      $this->db->where('itm_id',$sid);
      $this->db->update('tbl_item',$data);
      redirect('item');
      
   }
   if(isset($_POST['itemsearch_submit'])){
      $item=$this->input->post('search');
      if($item==""){
         $links="";
         $config = array();
         $config["base_url"] = base_url() . "Admin/item_creation";
         $config["total_rows"] = $this->Admin_model->record_count_items();
         $config["per_page"] = 20;
         $config["uri_segment"] = 3;
      
        $this->pagination->initialize($config);
      
         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         $data["itm"] = $this->Admin_model->
         get_item($config["per_page"], $page);
         $data['itemaname']=$item;
      }else{
         $data['itemaname']=$item;
         $data["itm"]=$this->Admin_model->get_searchitemresult($item);
      }
     
   }else{
      $links="";
      $config = array();
      $config["base_url"] = base_url() . "Admin/item_creation";
      $config["total_rows"] = $this->Admin_model->record_count_items();
      $config["per_page"] = 20;
      $config["uri_segment"] = 3;
   
     $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
     
      //$data['itm']=$this->Admin_model->get_item();
   
      $data["itm"] = $this->Admin_model->
      get_item($config["per_page"], $page);
   
      
     
      $data['itemaname']="";
   }
   $data['hsn']=$this->Admin_model->get_hsn();
   $data["links"] = $this->pagination->create_links();
   $data['lastid']=$this->Admin_model->get_lastitemcode();
   $data['suplastid']=$this->Admin_model->get_lastsuplier();
   $data['itmgrp']=$this->Admin_model->get_itemgroup();
   $data['suplr']=$this->Admin_model->get_supplier();
   $data['accgp']=$this->Admin_model->get_accountgp();
   $data['catg']=$this->Admin_model->get_category();
   $data['unit']=$this->Admin_model->get_units();
   $data['batch']=$this->Admin_model->get_batchcodenum();
   $data['barcodelastnum']=$this->Admin_model->get_barcodenumlast();
   $this->load->view('superadmin/item',$data);
}
public function batch_creation(){

   



   if(isset($_POST['submit_batch'])){

      $this->sessionout();
     
      $pcost    = strip_tags($this->input->post('pcost'));
      $pcostarr = str_split(strip_tags($this->input->post('pcost'))); 
      $pcode    = '';
     
      for($i=0;$i<count($pcostarr);$i++){
         if($pcostarr[$i]=='1'){
            $pcode.='J';
         }
         if($pcostarr[$i]=='2'){
            $pcode.='U';
         }
         if($pcostarr[$i]=='3'){
            $pcode.='Z';
         }
         if($pcostarr[$i]=='0'){
            $pcode.='N';
         }
         if($pcostarr[$i]=='4'){
            $pcode.='Y';
         }
         if($pcostarr[$i]=='5'){
            $pcode.='G';
         }
         if($pcostarr[$i]=='6'){
            $pcode.='V';
         }
         if($pcostarr[$i]=='7'){
            $pcode.='C';
         }
         if($pcostarr[$i]=='8'){
            $pcode.='I';
         }
         if($pcostarr[$i]=='9'){
            $pcode.='P';
         }
         if($pcostarr[$i]=='.'){
            $pcode.='.';
         }
         
      }
    
     
      $tmop       = $this->input->post('mop');
      $tmoparr    = str_split(strip_tags($tmop)); 
      $mopcode    = '';

      for($j=0;$j<count($tmoparr);$j++){
            if($tmoparr[$j]=='1'){
               $mopcode.='S';
            }
            if($tmoparr[$j]=='2'){
               $mopcode.='K';
            }
            if($tmoparr[$j]=='3'){
               $mopcode.='L';
            }
            if($tmoparr[$j]=='0'){
               $mopcode.='R';
            }
            if($tmoparr[$j]=='4'){
               $mopcode.='F';
            }
            if($tmoparr[$j]=='5'){
               $mopcode.='O';
            }
            if($tmoparr[$j]=='6'){
               $mopcode.='T';
            }
            if($tmoparr[$j]=='7'){
               $mopcode.='W';
            }
            if($tmoparr[$j]=='8'){
               $mopcode.='E';
            }
            if($tmoparr[$j]=='9'){
               $mopcode.='A';
            }
            if($tmoparr[$j]=='.'){
               $mopcode.='.';
            }           
      }
      
     
      $batcodecheck=$this->input->post('batchcode');
  
         $itemcount=$this->Admin_model->get_barcodenumlast();
         if($itemcount==null){
               $batchcodenum=1;
         }else{
            $batchcodenum=1+$itemcount->batchcode;
         }
       
         $data = array(
            'item_id'=>$this->input->post('current_item_id'),
            'supplier'=>$this->input->post('splr'),
            'batchcode'=>$batchcodenum,
            'barcode'=>$this->input->post('barcode'),
            'hsn_code'=>$this->input->post('hsn'),
            't_pr'=>$this->input->post('prate'),
            't_wr'=>$this->input->post('wholesalerate'),
            't_mop'=>$this->input->post('mop'),
            't_pc'=>$this->input->post('pcost'),
            't_mrp'=>$this->input->post('mrp'),
            't_sr'=>$this->input->post('srate'),
            't_br'=>$this->input->post('brate'),

            'd_pr'=>$this->input->post('d_prate'),
            'd_pc'=>$this->input->post('d_pcost'),
            'd_wr'=>$this->input->post('d_wholesalerate'),
            'd_mrp'=>$this->input->post('d_mrp'),
            'd_sr'=>$this->input->post('d_srate'),
            'd_mop'=>$this->input->post('d_mop'),
            'd_br'=>$this->input->post('d_brate'),  

            'e_pr'=>$this->input->post('e_prate'),
            'e_pc'=>$this->input->post('e_pcost'),
            'e_wr'=>$this->input->post('e_wholesalerate'),
            'e_mrp'=>$this->input->post('e_mrp'),
            'e_sr'=>$this->input->post('e_srate'),
            'e_mop'=>$this->input->post('e_mop'),
            'e_br'=>$this->input->post('e_brate'),
            'incentive'=>$this->input->post('intv'),
            'amount'=>$this->input->post('amount_insen_1'),
            'opening_stock'=>$this->input->post('ostock'),
            't_purcost'=> $pcode,
            't_mopcode'=> $mopcode
         );
$this->db->insert('tbl_imbm',$data);
$lastid=$this->db->insert_id();

$r1_type=$this->input->post('inc_bothperamount1');
 $r2_type=$this->input->post('inc_bothperamount2');
 $r3_type=$this->input->post('inc_bothperamount3');
 $r4_type=$this->input->post('inc_bothperamount4');
if($r1_type==NULL)
{
$r1_type='';

}
if($r2_type==NULL)
{
$r2_type='';

}
if($r3_type==NULL)
{
$r3_type='';

}
if($r4_type==NULL)
{
$r4_type='';

}
$data=array(
        'batch_id'=>$lastid,
        'item_id'=>$this->input->post('current_item_id'),
        'incentive_type'=>$this->input->post('inc_peramount'),
         'in_peramount'=>$this->input->post('inc_ampercent'),
         'range1'=>$this->input->post('range1'),
         'r1_type'=>$r1_type,
         'r1_amount'=>$this->input->post('inc_botheampercent1'),
         'range2'=>$this->input->post('range2'),
         'r2_type'=>$r2_type,
         'r2_amount'=>$this->input->post('inc_botheampercent2'),
         'range3'=>$this->input->post('range3'),
         'r3_type'=> $r3_type,
         'r3_amount'=>$this->input->post('inc_botheampercent3'),
         'range4'=>$this->input->post('range4'),
         'r4_type'=>$r4_type,
         'r4_amount'=>$this->input->post('inc_botheampercent4'),

            );
        

  $incentive=$this->Admin_model->add_incentive($data);

   }
 
   if(isset($_POST['submit_editbatch'])){

      $pcost    = strip_tags($this->input->post('pcost'));
      $pcostarr = str_split(strip_tags($this->input->post('pcost'))); 
      $pcode    = '';
     
      for($i=0;$i<count($pcostarr);$i++){
         if($pcostarr[$i]=='1'){
            $pcode.='J';
         }
         if($pcostarr[$i]=='2'){
            $pcode.='U';
         }
         if($pcostarr[$i]=='3'){
            $pcode.='Z';
         }
         if($pcostarr[$i]=='0'){
            $pcode.='N';
         }
         if($pcostarr[$i]=='4'){
            $pcode.='Y';
         }
         if($pcostarr[$i]=='5'){
            $pcode.='G';
         }
         if($pcostarr[$i]=='6'){
            $pcode.='V';
         }
         if($pcostarr[$i]=='7'){
            $pcode.='C';
         }
         if($pcostarr[$i]=='8'){
            $pcode.='I';
         }
         if($pcostarr[$i]=='9'){
            $pcode.='P';
         }
         if($pcostarr[$i]=='.'){
            $pcode.='.';
         }
         
      }
      //echo "<pre>";print_r($pcost);print_r($pcostarr);print_r($pcode);exit;
     
      $tmop       = $this->input->post('mop');
      $tmoparr    = str_split(strip_tags($tmop)); 
      $mopcode    = '';

      for($j=0;$j<count($tmoparr);$j++){
            if($tmoparr[$j]=='1'){
               $mopcode.='S';
            }
            if($tmoparr[$j]=='2'){
               $mopcode.='K';
            }
            if($tmoparr[$j]=='3'){
               $mopcode.='L';
            }
            if($tmoparr[$j]=='0'){
               $mopcode.='R';
            }
            if($tmoparr[$j]=='4'){
               $mopcode.='F';
            }
            if($tmoparr[$j]=='5'){
               $mopcode.='O';
            }
            if($tmoparr[$j]=='6'){
               $mopcode.='T';
            }
            if($tmoparr[$j]=='7'){
               $mopcode.='W';
            }
            if($tmoparr[$j]=='8'){
               $mopcode.='E';
            }
            if($tmoparr[$j]=='9'){
               $mopcode.='A';
            }
            if($tmoparr[$j]=='.'){
               $mopcode.='.';
            }           
      }

      $data = array(
        
         'batchcode'=>$this->input->post('batchcode'),
         'barcode'=>$this->input->post('barcode'),
         'hsn_code'=>$this->input->post('hsn'),
         't_pr'=>$this->input->post('prate'),
         't_wr'=>$this->input->post('wholesalerate'),
         't_mop'=>$this->input->post('mop'),
         't_pc'=>$this->input->post('pcost'),
         't_mrp'=>$this->input->post('mrp'),
         't_sr'=>$this->input->post('srate'),
         't_br'=>$this->input->post('brate'),

         'd_pr'=>$this->input->post('d_prate'),
         'd_pc'=>$this->input->post('d_pcost'),
         'd_wr'=>$this->input->post('d_wholesalerate'),
         'd_mrp'=>$this->input->post('d_mrp'),
         'd_sr'=>$this->input->post('d_srate'),
         'd_mop'=>$this->input->post('d_mop'),
         'd_br'=>$this->input->post('d_brate'),  

         'e_pr'=>$this->input->post('e_prate'),
         'e_pc'=>$this->input->post('e_pcost'),
         'e_wr'=>$this->input->post('e_wholesalerate'),
         'e_mrp'=>$this->input->post('e_mrp'),
         'e_sr'=>$this->input->post('e_srate'),
         'e_mop'=>$this->input->post('e_mop'),
         'e_br'=>$this->input->post('e_brate'),
         'incentive'=>$this->input->post('intv'),
         'amount'=>$this->input->post('amount_insen_1'),
         'opening_stock'=>$this->input->post('ostock'),
         't_purcost'=> $pcode,
         't_mopcode'=> $mopcode
      );
      $this->db->where('batch_id', $this->input->post('current_batch_id'));
      $this->db->update('tbl_imbm',$data);
     
   }
   redirect('item');
}

public function viewbatch(){

   if($this->input->post('itemid')){

      $itemid  =  $this->input->post('itemid');
     // echo $itemid ;exit;
      $data['batch_list']  =  $this->Admin_model->get_batchlist($itemid);
      $data['incentive_id']=$this->Admin_model->get_incentive_id($itemid);
      //echo "<pre>";print_r($data['batch_list']);exit;

      $this->load->view('superadmin/batchview',$data); 
   }

}
public function barcodesave($code){
   $this->load->library('zend');
   // Load in folder Zend
   $this->zend->load('Zend/Barcode');
   $barcode =Zend_Barcode::factory('code128','image',array('text'=>$code),array())->draw();
   $barcode_image=$code.'.png';
   imagepng($barcode,'uploads/barcodes/'.$barcode_image);
   $data['barcode_image']=$barcode_image;
   $data['itemsdetails']=$this->Admin_model->get_itemfetingbybarcode($code);
   $this->load->view('superadmin/printbarcode',$data);
}
public function print_barcode($id){
      $string = $id;
      $this->barcodesave($string);
     
}
private function set_barcode($code)
	{
		// Load library
		$this->load->library('zend');
		// Load in folder Zend
		$this->zend->load('Zend/Barcode');
		// Generate barcode
      $barcode =Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
      $store_image = imagepng($barcode,"/uploads/{$code}.png");
      return $code.'.png';
   }
   
public function editbatch(){

   if($this->input->post('batchid')){

      $batchid  =  $this->input->post('batchid');
     
      $data['batch_details']  =  $this->Admin_model->get_batch($batchid);
     
      $data['hsn']=$this->Admin_model->get_hsn(); 
      $this->load->view('superadmin/batchedit',$data); 

   }

}

public function delete_item_creation($id){

   $this->db->where('itm_id',$id);
   $this->db->delete('tbl_item');

   $this->db->where('item_id',$id);
   $this->db->delete('tbl_imbm');

   redirect('item');
}
public function category_item(){
if(isset($_POST['submit'])){
$data = array('cat_name'=>$this->input->post('name'));
$this->db->insert('tbl_category',$data);
redirect('catg');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('cat_id');
$data = array('cat_name'=>$this->input->post('name'));
$this->db->where('cat_id',$sid);
$this->db->update('tbl_category',$data);
redirect('catg');
}
$data['catg']=$this->Admin_model->get_category();
$this->load->view('superadmin/category',$data);
}
public function delete_category($id){
$this->db->where('cat_id',$id);
$this->db->delete('tbl_category');
redirect('catg');
}
public function hsn_item(){
if(isset($_POST['submit'])){
$data = array('hsn_code'=>$this->input->post('code'),
'hsn_tax'=>$this->input->post('tax'),
'hsn_cgst'=>$this->input->post('cgst'),
'hsn_sgst'=>$this->input->post('sgst'),
'hsn_igst'=>$this->input->post('igst'));
$this->db->insert('tbl_hsn',$data);
redirect('hsn');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('hsn_id');
$data = array('hsn_code'=>$this->input->post('code'),
'hsn_tax'=>$this->input->post('tax'),
'hsn_cgst'=>$this->input->post('cgst'),
'hsn_sgst'=>$this->input->post('sgst'),
'hsn_igst'=>$this->input->post('igst'));
$this->db->where('hsn_id',$sid);
$this->db->update('tbl_hsn',$data);
redirect('hsn');
}

$data['hsn']=$this->Admin_model->get_hsn();
$this->load->view('superadmin/hsn',$data);
}
public function delete_hsn($id){
$this->db->where('hsn_id',$id);
$this->db->delete('tbl_hsn');
redirect('hsn');
}
public function faccount_creation(){
if(isset($_POST['submit'])){
$data = array('fag_name'=>$this->input->post('aname'),
'fag_group'=>$this->input->post('acgp')
);
$this->db->insert('tbl_financialaccgp',$data);
redirect('faccgp');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('fag_id');
$data = array('fag_name'=>$this->input->post('aname'),
'fag_group'=>$this->input->post('acgp')
);
$this->db->where('fag_id',$sid);
$this->db->update('tbl_financialaccgp',$data);
redirect('faccgp');
}
$data['accgp']=$this->Admin_model->get_accountgp();
$data['faccgp']=$this->Admin_model->get_faccountgp();
$this->load->view('superadmin/financial_accountgp',$data);
}
public function delete_faccount($id){
$this->db->where('fag_id',$id);
$this->db->delete('tbl_financialaccgp');
redirect('faccgp');
}
public function accgp_creation(){
if(isset($_POST['submit'])){
$data = array('ag_name'=>$this->input->post('accgp'));
$this->db->insert('tbl_accountgp',$data);
redirect('accgp');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('ag_id');
$data=array('ag_name'=>$this->input->post('accgp'));
$this->db->where('ag_id',$sid);
$this->db->update('tbl_accountgp',$data);
redirect('accgp');
}
$data['accgp']=$this->Admin_model->get_accountgp();
$this->load->view('superadmin/account_group',$data);
}
public function delete_account_group($id){
$this->db->where('ag_id',$id);
$this->db->delete('tbl_accountgp');
redirect('accgp');
}
public function opbalance_creation(){
if(isset($_POST['submit'])){
$data = array('obl_year'=>$this->input->post('year'),
'obl_amount'=>$this->input->post('amount')
);
$this->db->insert('tbl_opbalance',$data);
redirect('opbal');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('obl_id');
$data = array('obl_year'=>$this->input->post('year'),
'obl_amount'=>$this->input->post('amount')
);			
$this->db->where('obl_id',$sid);
$this->db->update('tbl_opbalance',$data);
redirect('opbal');
}
$data['fyear']=$this->Admin_model->get_fyear();
$data['opbal']=$this->Admin_model->get_opbalance();
$this->load->view('superadmin/opening_balance',$data);
}
public function delete_opbalance_creation($id){
$this->db->where('obl_id',$id);
$this->db->delete('tbl_opbalance');
redirect('opbal');
}
public function delete_saleswindow($id){
$this->db->where('sales_master_id',$id);
$this->db->delete('tbl_sales_master');
redirect('sales');
}
public function search_account_group(){
$acgp=$this->input->post('search');
$new=$this->Admin_model->get_accountgroupsearch($acgp);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect1">
      <input type="hidden" name="id_SCR" id="id_SCR" value="'.$new1['ag_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff" value="'.$new1['ag_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['ag_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}
public function search_item_group(){
$itgp=$this->input->post('search');
$new=$this->Admin_model->get_itemgroupsearch($itgp);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect1">
      <input type="hidden" name="id_SCR" id="id_SCR" value="'.$new1['ig_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff" value="'.$new1['ig_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['ig_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}
public function search_account_groupedit(){
$acgp=$this->input->post('search');
$id=$this->input->post('id');
$new=$this->Admin_model->get_accountgroupsearch($acgp);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect2" data-value="'.$new1['ag_id'].'" data-id="'.$id.'">
      <input type="hidden" name="id_SCR" id="id_SCR'.$new1['ag_id'].'" value="'.$new1['ag_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff'.$new1['ag_id'].'" value="'.$new1['ag_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['ag_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}
public function search_suplier(){
$sup=$this->input->post('search');
$new=$this->Admin_model->get_supplier_search($sup);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect_sup">
      <input type="hidden" name="id_SCR" id="id_SCR" value="'.$new1['sup_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff" value="'.$new1['sup_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['sup_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}
public function search_suplier_edit(){
$sup=$this->input->post('search');
$id = $this->input->post('id');
$new=$this->Admin_model->get_supplier_search($sup);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect_supedit" data-value="'.$new1['sup_id'].'" data-id="'.$id.'">
      <input type="hidden" name="id_SCR" id="id_SCR'.$new1['sup_id'].'" value="'.$new1['sup_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff'.$new1['sup_id'].'" value="'.$new1['sup_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['sup_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}
public function search_category(){
$cat=$this->input->post('search');
$new=$this->Admin_model->get_searchcategory($cat);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect_cat">
      <input type="hidden" name="id_SCR" id="id_SCR" value="'.$new1['itcat_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff" value="'.$new1['itcat_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['itcat_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}

public function search_category_edit(){
$cat=$this->input->post('search');
$id=$this->input->post('id');
$new=$this->Admin_model->get_searchcategory($cat);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect_catedit" data-value="'.$new1['itcat_id'].'" data-id="'.$id.'">
      <input type="hidden" name="id_SCR" id="id_SCR'.$new1['itcat_id'].'" value="'.$new1['itcat_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff'.$new1['itcat_id'].'" value="'.$new1['itcat_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['itcat_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}


public function search_brand(){

   $brand=$this->input->post('search');
   $brands=$this->Admin_model->get_searchbrand($brand);
   if($brands){
   $namelist='
               <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
                  ';
                  foreach($brands as $brand){
                  $namelist.='
                  <tr class="subSelect_brand">
                     <input type="hidden" class="id_brand" value="'.$brand['brand_id'].'" readonly="readonly">
                     <input type="hidden" class="name_brand" value="'.$brand['brand_name'].'" readonly="readonly">
                     <td class="titleName ">'.$brand['brand_name'].'</td>
                  </tr>
                  ';
                  }
                  $namelist.='
               </table>
               ';
   echo $namelist;
   }

}

public function search_item_groupedit(){
$itgp=$this->input->post('search');
$id=$this->input->post('id');
$new=$this->Admin_model->get_itemgroupsearch($itgp);
if($new){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($new as $new1){
   $namelist.='
   <tr class="subSelect_itgrpedit" data-value="'.$new1['ig_id'].'" data-id="'.$id.'">
      <input type="hidden" name="id_SCR" id="id_SCR'.$new1['ig_id'].'" value="'.$new1['ig_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff'.$new1['ig_id'].'" value="'.$new1['ig_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['ig_name'].'</td>
   </tr>
   ';
   }
   $namelist.='
</table>
';
echo $namelist;
}
}
public function unit(){
if(isset($_POST['submit'])){
$data=array('unit_value'=>$this->input->post('unit'));
$this->db->insert('tbl_unit',$data);
redirect('unit');
}
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('unit_id');
$data=array('unit_value'=>$this->input->post('unit'));
$this->db->where('unit_id',$sid);
$this->db->update('tbl_unit',$data);
redirect('unit');
}
$data['unit']=$this->Admin_model->get_units();
$this->load->view('superadmin/unit',$data);
}
public function hsncodesearch(){
  //$data=1;
$data=$this->Admin_model->get_searchhsncode($this->input->post('hsn'));
print_r(json_encode($data));
}
public function supliercraetiononitem(){
$data_insert=array(	'sup_name'=>$this->input->post('supliername'),
'sup_address'=>$this->input->post('suplieraddress'),
'sup_email'=>$this->input->post('suplieremail'),
'sup_phoneno'=>$this->input->post('supierphnum'),
'sup_mobileno'=>$this->input->post('supiermobnum'),
'sup_pan'=>$this->input->post('suplierpan'),
'sup_gst'=>$this->input->post('supliergst'),
'sup_bank'=>$this->input->post('suplierbank'),
'sup_acno'=>$this->input->post('suplieracnum'),
'sup_ifsc'=>$this->input->post('suplierifsc'),
'sup_paytype'=>$this->input->post('supliercrde'),
'sup_opbalance'=>$this->input->post('suplieropbal'),
'sup_code'=>$this->input->post('supliercode'),
'sup_mainbill'=>$this->input->post('supliermngill'));
$this->db->insert('tbl_supplier',$data_insert);
$id=$this->db->insert_id();
$data=$this->Admin_model->get_supliernewadd($id);
print_r(json_encode($data));
}
public function accountcreationitem(){
$data_insert1=array('ig_name'=>$this->input->post('acgrp'),
'ig_code'=>$this->input->post('acgrpcode'));
$this->db->insert('tbl_itemgroup',$data_insert1);
$sid=$this->db->insert_id();
$data=$this->Admin_model->get_accountcreatenew($sid);
print_r(json_encode($data));
}
public function createhnscode(){
   $datainsert = array('hsn_code'=>$this->input->post('hsncode'),
   'hsn_tax'=>$this->input->post('tax'),
   'hsn_cgst'=>$this->input->post('cgst'),
   'hsn_sgst'=>$this->input->post('sgst'),
   'hsn_igst'=>$this->input->post('igst'));
   $this->db->insert('tbl_hsn',$datainsert);
   $sid=$this->db->insert_id();
   $data=$this->Admin_model->get_lasthsncode($sid);
   print_r(json_encode($data));
}
public function categorynewitem(){
   $data_insert2=array('itcat_name'=>$this->input->post('category'),
   'itcat_grp'=>$this->input->post('itemgrpcat'),
   'itcat_code'=>$this->input->post('categorycode'));
   $this->db->insert('tbl_itemcategory',$data_insert2);
   $cid=$this->db->insert_id();
   $data=$this->Admin_model->get_categorynew($cid);
   print_r(json_encode($data));
}
public function brandnewitem(){

   $this->db->where('brand_name', strtoupper($this->input->post('brand')));
   $query = $this->db->get('tbl_brands');
   $exists = $query->row();
   if(empty($exists)){
      $data_insert = array(
                        'brand_name'=>strtoupper($this->input->post('brand')),
                        );
      $this->db->insert('tbl_brands',$data_insert);
      $bid=$this->db->insert_id();
      $this->db->where('brand_id', $bid);
      $query = $this->db->get('tbl_brands');
      $data = $query->row();
   }
   else
   $data = $exists;
   print_r(json_encode($data));

}
public function itemgroup_creation(){
if(isset($_POST['submit'])){
$data=array('ig_name'=>$this->input->post('gp_name'),
'ig_code'=>$this->input->post('grp_code'));
$this->db->insert('tbl_itemgroup',$data);
redirect('igroup');
}
if(isset($_POST['submit_edit'])){
$id=$this->input->post('itgp_id');
$data=array('ig_name'=>$this->input->post('itgp_name'),
'ig_code'=>$this->input->post('itgp_code'));
$this->db->where('ig_id',$id);
$this->db->update('tbl_itemgroup',$data);
redirect('igroup');
}
$data['itemgrp']=$this->Admin_model->get_itemgroup();
$this->load->view('superadmin/itemgroup',$data);
}
public function itemcategory_creation(){
if(isset($_POST['submit'])){
$data=array('itcat_grp'=>$this->input->post('itemgrp'),
'itcat_name'=>$this->input->post('itemcatename'),
'itcat_code'=>$this->input->post('itemcatecode'));
$this->db->insert('tbl_itemcategory',$data);
redirect('itcate');
}
if(isset($_POST['submit_edit'])){
$id=$this->input->post('itcat_id');
$data=array('itcat_grp'=>$this->input->post('itemgrp'),
'itcat_name'=>$this->input->post('itcatname'),
'itcat_code'=>$this->input->post('itcatcode'));
$this->db->where('itcat_id',$id);
$this->db->update('tbl_itemcategory',$data);
redirect('itcate');
}
$data['itcat']=$this->Admin_model->get_itemcategory();
$data['itgp']=$this->Admin_model->get_itemgroup();
$this->load->view('superadmin/itemcategory',$data);
}
public function delete_itemcategory_creation($id){
$this->db->where('itcat_id',$id);
$this->db->delete('tbl_itemcategory');
redirect('itcate');
}
  
public function saleswindow(){
  
  
    $data['sales'] = $this->Admin_model->getalltablerows('tbl_sales_master','sales_master_id','DESC');
  $data['employee1']=$this->Admin_model->get_staff1();
   //  $salestrans = $this->Admin_model->getalltable('tbl_sales_trans');
   // foreach($salestrans as $salesingle){
   // $data['salestrans'][$salesingle->sales_trans_master_id][] = $salesingle;
   // }

   $data['bilno12']=$this->Admin_model->get_automaticbill();
  

  
   $employee=$this->Admin_model->get_staff1();
   
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
     
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
   $data['last_sales']=$this->Admin_model->get_lastaddedsales();
 
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $data['token']= $this->generatetoken();
   //echo $data['token'];exit;
   $this->load->view('superadmin/saleswindow',$data);
}



public function customer_accounts(){
  // $data['customers'] = $this->Admin_model->getallcustomer_accounts($this->session->userdata('id'),'b2c');
   $data['pagename']  = 'customer_accounts';
   $data['customers']=$this->Admin_model->get_oustandingcustomers();
   $this->load->view('superadmin/customer_accounts',$data);
}

public function customer_b2baccounts(){
   //$data['customers'] = $this->Admin_model->getallb2bcustomer_accounts($this->session->userdata('id'),'b2b');
   
   $data['pagename']  = 'customer_b2baccounts';
   $data['customers']=$this->Admin_model->get_oustandingcustomersb2b();
   $this->load->view('superadmin/b2bcustomer_accounts',$data);
}

public function supplier_accounts(){
   //$data['suppliers'] = $this->Admin_model->getallsupplier_accounts();//echo "<pre>";print_r($data['customers']);exit;
   $data['suppliers']=$this->Admin_model->get_supplier();
  
   $this->load->view('superadmin/supplier_accounts',$data);
}
public function openinstockdel($id){
   $data['opbalance']=$this->Admin_model->get_supplieropeningbalance($id);
   //echo "<pre>";print_r($data['opbalance']);exit;
$this->load->view('superadmin/openingsuplierbalance',$data);
}
public function suplierbillsearch(){
   $supid =$this->input->post('supid');
   $data['bill_details']=$this->Admin_model->get_supplier_billdetais($supid);
  // echo "<pre>";print_r($data['bill_details']);exit;
   //var_dump($data['bill_details']);
   $this->load->view('superadmin/purchasebilldetails',$data);
}


public function inventory_reports($type){ 

   if($type == 'firm'){
      
         $type=1;
         $data['inventory']=$this->Admin_model->get_inventoryitemlistreport($this->session->userdata('id'));
         $data['type'] = $type;
         // /echo "<pre>";print_r($data['inventory']);exit;
         $this->load->view('superadmin/inventory_reportsfirm',$data);
   }else{
      $type=2;
      $data['inventory']=$this->Admin_model->get_inventoryitemlistreportgodown($this->session->userdata('id'));
      $data['type'] = $type;
      // /echo "<pre>";print_r($data['inventory']);exit;
      $this->load->view('superadmin/inventory_reportsgodown',$data);
   }
  
   // $type = ($type == 'firm') ? 1 : 2; 
   // $data['inventory'] = $this->Admin_model->getallinventorydata($this->session->userdata('id'),$this->session->userdata('u_type'),$type);
  
}
public function inventory_reports_firm(){
  // echo $this->session->userdata('id');exit;
   $data['inventory']=$this->Admin_model->get_inventoryitemlistreport($this->session->userdata('id'));
   $this->load->view('superadmin/inventory_reportsfirm',$data);
}
public function inventoryfirmitemlist($item_id,$location_id){
   $data['inventory']=$this->Admin_model->get_inventoryitemlistreportbatwise($item_id,$location_id);
   $this->load->view('superadmin/inventorylocationitemlist',$data);
}

public function current_stocks(){
   //$data['currentstocks'] = $this->Admin_model->getallcurrent_stocks();
   $data['itemlist']=$this->Admin_model->get_item1();
   $this->load->view('superadmin/current_stocks',$data);
}
public function stockcompair(){
   $data['itemlist']=$this->Admin_model->getstockcompair();
  // echo "<pre>";print_r($data['itemlist']);exit;
   $this->load->view('stock/stockcompair',$data);
}
public function stockhistory(){
   //$data['itemlist']=$this->Admin_model->getstockhistory();
   // echo "<pre>";print_r($data['itemlist']);exit;

   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/stockhistory";
   $config["total_rows"] = $this->Admin_model->getstockhistorycount();
   $config["per_page"] = 100;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["itemlist"] = $this->Admin_model->
   getstockhistory($config["per_page"], $page);
   $data["links"] = $this->pagination->create_links();
  // echo "<pre>";print_r($data["itemlist"]);exit;
  
    $this->load->view('stock/stockhistory',$data);
}
public function batchstocklist($itemlist){
   $data['batchlist']=$this->Admin_model->get_currentstockreport($itemlist);
   //echo "<pre>";print_r($data['batchlist']);exit;
   $this->load->view('superadmin/current_stocks_batch',$data);  
}
public function salesorder(){

   // $data['sales'] = $this->Admin_model->getalltablerows('tbl_sales_order_master','sales_order_master_id','DESC');
   //$data['sales'] = $this->Admin_model->get_salesorderlimitfetch();
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/salesorder";
   $config["total_rows"] = $this->Admin_model->record_count_salesorder();
   $config["per_page"] = 100;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["sales"] = $this->Admin_model->
   get_salesorderlimitfetch($config["per_page"], $page);
   $data["links"] = $this->pagination->create_links();

   $data['bilno12']=$this->Admin_model->get_automaticbill1();
   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
      
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
  
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
   $data['last_bill_number1']=$this->Admin_model->get_lastbillnumber1();
   $data['last_sales']=$this->Admin_model->get_lastaddedsales();
 
  
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();

  
  
   $this->load->view('superadmin/salesorder',$data);

}
public function saleorderaddnew(){
     //$data['sales'] = $this->Admin_model->get_salesorderlimitfetch();
     $links="";
     $config = array();
     $config["base_url"] = base_url() . "Admin/salesorder";
     $config["total_rows"] = $this->Admin_model->record_count_salesorder();
     $config["per_page"] = 100;
     $config["uri_segment"] = 3;
  
    $this->pagination->initialize($config);
  
     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     $data["sales"] = $this->Admin_model->
     get_salesorderlimitfetch($config["per_page"], $page);
     $data["links"] = $this->pagination->create_links();
  
     $data['bilno12']=$this->Admin_model->get_automaticbill1();
     $employee=$this->Admin_model->get_staff1();
     $data['namelist']='<option value="0"></option>';
     foreach($employee as $keyem){
        
        $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
     }
    
     $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
     
     $data['last_bill_number1']=$this->Admin_model->get_lastbillnumber1();
     //echo "<pre>";print_r($data['last_bill_number1']);exit;
     $data['last_sales']=$this->Admin_model->get_lastaddedsales();
   
    
     $data['bank']=$this->Admin_model->get_bank_details();
     $data['finance']=$this->Admin_model->get_finance();
     $data['token']= $this->generatetokenorder();
    
   $this->load->view('superadmin/saleorderaddnew',$data);
}
public function pendingsaleorder(){
   
   if(isset($_POST['submit'])){
    
      $from=$this->input->post('from');
      $to=$this->input->post('to');
      $data['pending']=$this->Admin_model->get_salesorderfromto($from,$to);
     
   }else{
      $from='';
      $to='';
      $data['pending']=$this->Admin_model->get_pendingsaleorder();
   }
   
   $data['from']=$from;
   $data['to']=$to;
   $this->load->view('superadmin/pendingsaleorder',$data);
}

public function saleconvert(){
   $data['sales']=$this->Admin_model->get_convertedsaleorder();
   
   $this->load->view('superadmin/convertedsale',$data);
}

public function salesorderadd()
{
    $this->sessionout();

    // -------------------------------------------------
    // Basic Input
    // -------------------------------------------------
    $token = $this->input->post('token', true);

    if (empty($token)) {
        redirect('salesorder');
        return;
    }

    // Prevent duplicate order submission
    $checktoken = $this->Admin_model->get_checkordertoken($token);

    if ($checktoken != null) {
        redirect('salesorder');
        return;
    }

    // -------------------------------------------------
    // Tables
    // -------------------------------------------------
    $table         = 'tbl_sales_order_master';
    $tablecustomer = 'tbl_customer';

    // -------------------------------------------------
    // Get Item Arrays
    // -------------------------------------------------
    $itemtotalamount  = $this->input->post('itemtotalamount');
    $itemcode         = $this->input->post('itemcode');
    $itemid           = $this->input->post('puritemid');
    $itemname         = $this->input->post('itemname');
    $itembatch        = $this->input->post('itembatch');
    $itemqnty         = $this->input->post('itemqnty');
    $itemtaxable      = $this->input->post('itemtaxable');
    $itemgstper       = $this->input->post('itemgstper');
    $itemgstamount    = $this->input->post('itemgstamount');
    $itemcessamount   = $this->input->post('itemcessamount');
    $itemhsncode      = $this->input->post('itemhsncode');
    $itemitemtbid     = $this->input->post('itemitemtbid');

    $employee         = $this->input->post('employee');
    $batchid          = $this->input->post('itembatchid');
    $unitprice        = $this->input->post('unitprice');
    $pcost            = $this->input->post('purcost');
    $mrp              = $this->input->post('mrp');
    $incentive_id     = $this->input->post('incentive_id');
    $incentive_amount = $this->input->post('incentive_amount');

    // -------------------------------------------------
    // Validate Items
    // -------------------------------------------------
    if (!is_array($itemtotalamount) || count($itemtotalamount) == 0) {

        $this->session->set_flashdata(
            'error',
            'Please add at least one item.'
        );

        redirect('salesorder');
        return;
    }

    $length = count($itemtotalamount);

    // -------------------------------------------------
    // Indian Time
    // -------------------------------------------------
    date_default_timezone_set('Asia/Kolkata');

    $now = date('Y-m-d H:i:s');

    // -------------------------------------------------
    // Start Database Transaction
    // -------------------------------------------------
    $this->db->trans_start();

    // -------------------------------------------------
    // Customer
    // -------------------------------------------------
    $phone = trim($this->input->post('phonenumber', true));

    $where = [
        'cus_phonenumber' => $phone
    ];

    $customer = $this->Admin_model->checkrowexist(
        $tablecustomer,
        $where
    );

    if (!empty($customer)) {

        $logincusid = $customer->customer_id;

    } else {

        $customerrow = $this->Admin_model->get_lastcustomer();

        $customerCode = 1;

        if (!empty($customerrow)) {
            $customerCode = ((int) $customerrow->cus_code) + 1;
        }

        $customerarray = [
            'cus_name'        => $this->input->post('customername', true),
            'cus_phonenumber' => $phone,
            'cus_code'        => $customerCode,
            'login_id'        => 0
        ];

        $this->db->insert(
            $tablecustomer,
            $customerarray
        );

        $logincusid = $this->db->insert_id();
    }

    // -------------------------------------------------
    // Generate Bill Number
    // -------------------------------------------------
    $bilno12 = $this->Admin_model->get_automaticbill1();

    if ($bilno12 == 0) {

        $billnumber = 1;

    } else {

        $last_bill_number = $this->Admin_model->get_lastbillnumber1();

        if (!empty($last_bill_number)) {

            $billnumber =
                ((int) $last_bill_number->sales_order_master_id) + 1;

        } else {

            $billnumber = 1;
        }
    }

    // -------------------------------------------------
    // Bill Date
    // -------------------------------------------------
    $billDate = $this->input->post('billdate', true);

    if (!empty($billDate)) {
        $billDate = date(
            'Y-m-d',
            strtotime($billDate)
        );
    } else {
        $billDate = date('Y-m-d');
    }

    // -------------------------------------------------
    // Sales Order Master
    // -------------------------------------------------
    $data = [

        'sales_order_master_bill_no' =>
            $billnumber,

        'sales_order_master_date' =>
            $billDate,

        'sales_order_master_customer_name' =>
            $this->input->post('customername', true),

        'sales_order_master_delivery_date' =>
            $this->input->post('deliverydate', true),

        'sales_order_master_phone_no' =>
            $phone,

        'sales_order_master_veh_no' =>
            $this->input->post('vehicleno', true),

        'sales_order_master_customer_address' =>
            $this->input->post('address', true),

        'sales_order_master_delivery_address' =>
            $this->input->post('deliveryaddress', true),

        'sales_order_master_eway_billno' =>
            $this->input->post('ewaybillno', true),

        'sales_order_master_login_id' =>
            $logincusid,

        'sales_order_master_tot_taxable_amount' =>
            $this->input->post('totalTaxableAmount', true),

        'sales_order_master_tot_gst_amount' =>
            $this->input->post('amountGst', true),

        'sales_order_master_delivery_charge' =>
            $this->input->post('deliverychare', true),

        'sales_order_master_total_cess' =>
            0,

        'sales_order_master_discount' =>
            $this->input->post('discount', true),

        'sales_order_master_round_off' =>
            $this->input->post('roundOfValuue', true),

        'sales_order_master_grand_total' =>
            $this->input->post('grandTotal', true),

        'sales_order_master_note' =>
            $this->input->post('note', true),

        'sales_order_master_outstanding' =>
            $this->input->post('outstanding', true),

        'sales_order_master_amount_paid' =>
            $this->input->post('paidamount', true),

        'sales_order_master_payment_mode' =>
            $this->input->post('paymod1', true),

        'sales_order_master_is_igst' =>
            $this->input->post('isigst', true),

        'sales_order_master_cardnum' =>
            $this->input->post('cardnumber', true),

        'sales_order_master_cheque_no' =>
            $this->input->post('saleschequenumber', true),

        'sales_order_master_banktransaction_id' =>
            $this->input->post('salestranscheque', true),

        'sales_order_master_bankamount' =>
            $this->input->post('bankamount', true),

        'sales_order_master_bank' =>
            $this->input->post('bank', true),

        'sales_order_master_financetype' =>
            $this->input->post('finance', true),

        'sales_order_master_trans_mode' =>
            $this->input->post('transmode', true),

        'sales_order_master_finance_id' =>
            $this->input->post('financeid', true),

        'sales_order_edited' =>
            $this->input->post('grandTotal', true),

        'location_id' =>
            $this->input->post('locationid', true),

        'token' =>
            $token
    ];

    // -------------------------------------------------
    // Insert Master
    // -------------------------------------------------
    $this->db->insert(
        $table,
        $data
    );

    $lastid = $this->db->insert_id();

    // -------------------------------------------------
    // Insert Order Items
    // -------------------------------------------------
    for ($i = 0; $i < $length; $i++) {

        $datatrans = [

            'sales_order_trans_master_id' =>
                $lastid,

            'sales_order_trans_itm_code' =>
                isset($itemcode[$i])
                    ? $itemcode[$i]
                    : '',

            'sales_order_trans_qty' =>
                isset($itemqnty[$i])
                    ? $itemqnty[$i]
                    : 0,

            'sales_order_trans_taxable_value' =>
                isset($itemtaxable[$i])
                    ? $itemtaxable[$i]
                    : 0,

            'sales_order_trans_hsn_code' =>
                isset($itemhsncode[$i])
                    ? $itemhsncode[$i]
                    : '',

            'sales_order_trans_gst_percentage' =>
                isset($itemgstper[$i])
                    ? $itemgstper[$i]
                    : 0,

            'sales_order_trans_gst_amount' =>
                isset($itemgstamount[$i])
                    ? $itemgstamount[$i]
                    : 0,

            'sales_order_trans_cess' =>
                0,

            'sales_order_trans_total' =>
                isset($itemtotalamount[$i])
                    ? $itemtotalamount[$i]
                    : 0,

            'sales_order_trans_item_id' =>
                isset($itemid[$i])
                    ? $itemid[$i]
                    : 0,

            'sales_order_employee' =>
                isset($employee[$i])
                    ? $employee[$i]
                    : 0,

            'sales_order_batch_id' =>
                isset($batchid[$i])
                    ? $batchid[$i]
                    : 0,

            'sales_order_unit_price' =>
                isset($unitprice[$i])
                    ? $unitprice[$i]
                    : 0,

            'sales_order_purchase_cost' =>
                isset($pcost[$i])
                    ? $pcost[$i]
                    : 0,

            'sales_order_mrp' =>
                isset($mrp[$i])
                    ? $mrp[$i]
                    : 0,

            'sales_order_incentive_id' =>
                isset($incentive_id[$i])
                    ? $incentive_id[$i]
                    : 0,

            'sales_order_incentive_amount' =>
                isset($incentive_amount[$i])
                    ? $incentive_amount[$i]
                    : 0
        ];

        $this->db->insert(
            'tbl_sales_order_trans',
            $datatrans
        );
    }

    // -------------------------------------------------
    // Complete Transaction
    // -------------------------------------------------
    $this->db->trans_complete();

    // Check transaction status
    if ($this->db->trans_status() === false) {

        $this->session->set_flashdata(
            'error',
            'Failed to save sales order.'
        );

        redirect('salesorder');
        return;
    }

    // -------------------------------------------------
    // Save & Print / Save & Return
    // -------------------------------------------------
    $saveType = $this->input->post('savetype', true);

    if ($saveType == 2) {

        redirect('salesorder');
        return;
    }

    if ($saveType == 1) {

        $report['datamaster'] =
            $this->Admin_model->getalltablewhererow(
                $table,
                [
                    'sales_order_master_id' => $lastid
                ]
            );

        $report['datatrans'] =
            $this->Admin_model->getalltablewhereresultordernew(
                $lastid
            );

        $report['employee'] =
            $this->Admin_model->get_salesemployeeorder(
                $lastid
            );

        $report['address'] =
            $this->Admin_model->get_mayoori_address();

        $this->load->view(
            'superadmin/salesorderreport',
            $report
        );

        return;
    }

    redirect('salesorder');
}

 
public function salesorderprint($master_id){

$report['datamaster'] = $this->Admin_model->getalltablewhererow("tbl_sales_order_master",array('sales_order_master_id'=>$master_id));
$report['datatrans'] = $this->Admin_model->getalltablewhereresultordernew($master_id);
//echo "<pre>";print_r($report['datatrans']);exit;
$report['employee']=$this->Admin_model->get_salesemployeeorder($master_id);
$report['address']=$this->Admin_model->get_mayoori_address();
$this->load->view('superadmin/salesorderreport',$report);

}

public function getsalesorder_details(){

   $master_id=$this->input->post('id');
   $idd=$this->input->post('idd');
   //$master_id=12;
   $data['sales'] = $this->Admin_model->getalltablewhererow('tbl_sales_order_master',array('sales_order_master_id'=>$master_id));
   $data['bilno12']=$this->Admin_model->get_automaticbill();

   $employee=$this->Admin_model->get_staff1();
   $data['namelist']="";
   foreach($employee as $keyem){
     
      $data['namelist'].='<option value="0"></option><option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $data['employee']=$employee;
   
   //exit;
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
   $data['salestrans'] = $this->Admin_model->get_salesorderitemfetch($master_id);

   
   $items = $this->Admin_model->getalltable('tbl_item');

   foreach($items as $itemsingle){
      $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }
   $data['bankpayment']=$this->Admin_model->get_bankpaymentreceiptlistnew($idd);
  // echo "<pre>";print_r($data['salestrans']);exit;
   $data['bank']=$this->Admin_model->get_bank(); 
   $data['finance']=$this->Admin_model->get_finance();
   $this->load->view('superadmin/salesorderview',$data);

}

public function salesorder_makepurchase(){ 
   if(isset($_POST['submit_convert'])){
  
   
   $data['employee1']=$this->Admin_model->get_staff1();
   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
     
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }

 
 

   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
  
   $master_id =$this->input->post('master_id');
   $lastrowid=$this->Admin_model->get_lastbillnumber3();
   
   $totalcount=$this->Admin_model->get_automaticbillb2b();

   if($totalcount->mycount==0){
      $billordernumber=1;
   }else{
      $billordernumber=$lastrowid->sales_master_bill_no + 1;
   }
   $datamaster = $this->Admin_model->getalltablewhererow("tbl_sales_order_master",array('sales_order_master_id'=>$master_id));
  //echo "<pre>";print_r($datamaster);exit;
   $datatransitem = $this->Admin_model->getalltablewhereresultorder(array('sales_order_trans_master_id'=>$master_id));


  

   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i');

   $data['master'] = array(
               'sales_master_bill_no'=>$billordernumber,
               'sales_order_no'=>$datamaster->sales_order_master_id,
               'sales_order_master_id'=>$datamaster->sales_order_master_id,
               'sales_master_date'=>date("Y-m-d") ,
               'sales_master_customer_name'=> $datamaster->sales_order_master_customer_name,
               'sales_master_delivery_date'=> $datamaster->sales_order_master_delivery_date,
               'sales_master_phone_no'=> $datamaster->sales_order_master_phone_no,
               'sales_master_veh_no'=> $datamaster->sales_order_master_veh_no,
               'sales_master_customer_address'=> $datamaster->sales_order_master_customer_address,
               'sales_master_delivery_address'=> $datamaster->sales_order_master_delivery_address,
               'sales_master_eway_billno'=> $datamaster->sales_order_master_eway_billno,
               'sales_master_login_id'=>$datamaster->sales_order_master_login_id,
               'sales_master_tot_taxable_amount'=>$datamaster->sales_order_master_tot_taxable_amount,
               'sales_master_tot_gst_amount'=> $datamaster->sales_order_master_tot_gst_amount,
               'sales_master_delivery_charge'=> $datamaster->sales_order_master_delivery_charge,
               'sales_master_total_cess'=> 0,
               'sales_master_discount'=> $datamaster->sales_order_master_discount,
               'sales_master_round_off'=> $datamaster->sales_order_master_round_off,
               'sales_master_grand_total'=> $datamaster->sales_order_master_grand_total,
               'sales_master_note'=> $datamaster->sales_order_master_note,
               'sales_master_outstanding'=> $datamaster->sales_order_master_outstanding,
               'sales_master_amount_paid'=> $datamaster->sales_order_master_amount_paid,
               'sales_master_payment_mode'=> $datamaster->sales_order_master_payment_mode,
               'sales_master_is_igst'=> $datamaster->sales_order_master_is_igst,
               'sales_master_cardnum'=> $datamaster->sales_order_master_cardnum,
               'sales_master_cheque_no'=> $datamaster->sales_order_master_cheque_no,
               'sales_master_banktransaction_id'=> $datamaster->sales_order_master_banktransaction_id,
               'sales_master_bankamount'=> $datamaster->sales_order_master_bankamount,
               'sales_master_bank'=> $datamaster->sales_order_master_bank,
               'sales_master_financetype'=> $datamaster->sales_order_master_financetype,
               'sales_master_trans_mode'=> $datamaster->sales_order_master_trans_mode,
               'sales_master_finance_id'=> $datamaster->sales_order_master_finance_id,
               'sales_created'=>$datamaster->sales_created
               );

   $itemtoconvert=$this->input->post('selectitem');
  // echo $itemtoconvert;exit;
   $trans_id=$this->input->post('trans_id');
   $totalcountitem=$this->Admin_model->get_order_count($datamaster->sales_order_master_id);
   $totalrow=$this->input->post('itemcode');
   $data['counttolarow']=$totalcountitem->MyCount;
   $data['selectedcount']=count($itemtoconvert);
   //echo "<pre>";print_r($data['selectedcount']);exit;
   $datatrans = array();
   for($i=0;$i<count($itemtoconvert);$i++){
    $inventory[$i]=$this->Admin_model->get_godwn_firm_id($this->session->userdata('id'));
  
    $datatrans[]=$this->Admin_model->get_salesorderfeting($itemtoconvert[$i],$inventory[$i]);
   
   // $datatrans[] = array_push($datatrans1);
   } 
   //echo "<pre>";print_r($datatrans1);exit;
   $data['datatrans1']=$datatrans;
   //echo "<pre>";print_r($data['datatrans1']);exit;
 
   $data['bilno12']=$this->Admin_model->get_automaticbill();
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
   $data['token']= $this->generatetoken();
   $this->load->view('superadmin/saleconvertion',$data);
}

if(isset($_POST['submit_cancel'])){
   $master_id =$this->input->post('master_id');
   $this->db->where('sales_order_master_id',$master_id);
   $data_update=array('sales_created'=>2);
   $this->db->update('tbl_sales_order_master',$data_update);
   redirect('salesorder');
}
}

public function b2bcalc(){

   $employee=$this->Admin_model->get_staff1();
   $data['employee']=$this->Admin_model->get_staff1();
   $data['namelist']='<option value=""></option>';

   

   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/b2bcalc";
   $config["total_rows"] = $this->Admin_model->record_count_salesb2b();
   $config["per_page"] = 10;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["b2b"] = $this->Admin_model->
   get_b2blimitfetch($config["per_page"], $page);
   $data["links"] = $this->pagination->create_links();

   foreach($employee as $keyem){
      
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $data['bilb2b']=$this->Admin_model->get_automaticbillb2b();
   //print_r($data['bilb2b']);exit;
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumberb2b();
   $billingtrans = $this->Admin_model->getalltable('tbl_billing_trans');
   foreach($billingtrans as $billingsingle){
   $data['billingtrans'][$billingsingle->billing_trans_billing_masterid][] = $billingsingle;
   }
   $items = $this->Admin_model->getalltable('tbl_item');
   foreach($items as $itemsingle){
   $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $data['statecode']=$this->Admin_model->get_statecode();
   $this->load->view('superadmin/b2b',$data);

}
public function b2baddon(){
   $employee=$this->Admin_model->get_staff1();
   $data['employee']=$this->Admin_model->get_staff1();
   $data['namelist']='<option value=""></option>';

   

   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/b2bcalc";
   $config["total_rows"] = $this->Admin_model->record_count_salesb2b();
   $config["per_page"] = 10;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["b2b"] = $this->Admin_model->
   get_b2blimitfetch($config["per_page"], $page);
   $data["links"] = $this->pagination->create_links();

   foreach($employee as $keyem){
      
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $data['bilb2b']=$this->Admin_model->get_automaticbillb2b();
   //print_r($data['bilb2b']);exit;
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumberb2b();
   $billingtrans = $this->Admin_model->getalltable('tbl_billing_trans');
   foreach($billingtrans as $billingsingle){
   $data['billingtrans'][$billingsingle->billing_trans_billing_masterid][] = $billingsingle;
   }
   $items = $this->Admin_model->getalltable('tbl_item');
   foreach($items as $itemsingle){
   $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $data['statecode']=$this->Admin_model->get_statecode();
   $data['token']= $this->generatetokenb2b();
   $this->load->view('superadmin/b2baddon',$data);

}

public function salesreturn(){

   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $data['keybill']=$this->Admin_model->get_countsalesreturn();
   $data['keybill1']=$this->Admin_model->get_lastbillnumberinsalesreturn();
   $data['token']= $this->generatetokenreturn();
   
   $this->load->view('superadmin/salesreturn',$data);
}
public function salesreturnadd(){
   $this->sessionout();
   $token=$this->input->post('token');
   $checktoken=$this->Admin_model->get_checkreturntoken($token);
   if($checktoken==null){
      $table ="tbl_salesreturn";
      $length = count($this->input->post('itemtotalamount'));
      $itemcode = $this->input->post('itemcode');
      $itemid = $this->input->post('puritemid');
      $itemname = $this->input->post('itemname');
      $itembatch = $this->input->post('itembatch');
      $itemqnty = $this->input->post('itemqnty');
      $itemtaxable = $this->input->post('itemtaxable');
      $itemgstper = $this->input->post('itemgstper');
      $itemgstamount = $this->input->post('itemgstamount');
      $itemcessamount = $this->input->post('itemcess');
      $itemtotalamount = $this->input->post('itemtotalamount');
      $itemhsncode = $this->input->post('itemhsncode');
      $itemitemtbid = $this->input->post('puritemid');
      $itembatchid = $this->input->post('itembatchid');
      $employee=$this->input->post('employee');
      $unitprice=$this->input->post('unitprice');
      $incentive_id=$this->input->post('incentive_id');
      $incentive_amount=$this->input->post('incentive_amount');
   
      date_default_timezone_set("Asia/Kolkata");
      $now = date('Y-m-d h:i:s');
      $keybill1=$this->Admin_model->get_lastbillnumberinsalesreturn();
     
      if($keybill1==NULL){
         $salereturnbillno=1;
      }else{
         $salereturnbillno=$keybill1->sales_retuurn_bill_no+1;
      }
     
      $data = array(
         'sales_retuurn_bill_no'=>$salereturnbillno,
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
         'salesreturn_ref_number'=>$this->input->post('refno'),
      'token'=>$token);
   
          
         $lastid = $this->Admin_model->addrowtotable($table,$data);
   
         $dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($this->input->post('customerloginid'));
   
         $balamount=$dataoutcheck->outcus_amount-$this->input->post('grandTotal') ;
   
         $dataoutupdate=array('outcusid_customer_id'=>$this->input->post('customerloginid'),
         'outcus_amount'=> $balamount);
         $this->db->where('outcusid_customer_id',$this->input->post('customerloginid'));
   
         if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
         $dataoutinserthistory=array('customer_id'=>$this->input->post('customerloginid'),
         'amount'=>$this->input->post('grandTotal'),
         'order_master'=>$lastid,
         'type'=>3);
         $this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);
   
         }
        
         for($i=0;$i<$length;$i++){
   
            $datatrans = array(
                           'salesreturntrans_master_id' => $lastid,
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
   
                            
                           $reftype=$this->input->post('saletype');
                           $refnum=$this->input->post('refno');
                         
                           $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                         
                           $currentstock[$i]=$checkitem[$i]->cur_stock_item_count+$itemqnty[$i];
                           $data_uparray[$i]=array('cur_stock_item_count'=>$currentstock[$i]);
                           $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                           $this->db->update('tbl_current_stock',$data_uparray[$i]);
   
                           $inststock[$i]=$this->Admin_model->get_check_inventstockitem1($this->session->userdata('id'),$itemid[$i],$itembatchid[$i]);
                        
                           $finalstock[$i]=$inststock[$i]->inventory_stock_itemcount+$itemqnty[$i];
                        
                           $data_uparray1[$i]=array('inventory_stock_itemcount'=>$finalstock[$i]);
                           $this->db->where('inventory_stock_id',$inststock[$i]->inventory_stock_id);
                           $this->db->update('tbl_inventory_stock',$data_uparray1[$i]);
   
                           $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                           'cur_stock_history_batchid'=> $itembatchid[$i],
                           'cur_stock_history_item_count'=>$itemqnty[$i],
                           'cur_stock_history_added_date'=>$now,
                           'cur_stock_history_stock_master_id'=>$lastid,
                           'purpose'=>'Sales return add');
                       
                       $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
                           
                        }
                        if($this->input->post('savetype') == 2){
                           redirect('sales_rtn');
                        }
                        else if($this->input->post('savetype') == 1){
                           $report['datamaster'] = $this->Admin_model->getalltablewhererow($table,array('sales_return_id'=>$lastid));
                           $report['datatrans'] = $this->Admin_model->getalltablewhereresultreturn(array('salesreturntrans_master_id'=>$lastid));
                         
                          $report['employee']=$this->Admin_model->get_salesemployeereturn($lastid);
                           $report['address']=$this->Admin_model->get_mayoori_address();
                           $this->load->view('superadmin/salesreturnreport',$report);
                        } 
   
   }
  
}

public function viewsalesreturn(){
  
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/viewsalesreturn";
   $config["total_rows"] = $this->Admin_model->record_count_salesreturn();
   $config["per_page"] = 10;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["salesreturn"] = $this->Admin_model->
   get_salesreturn($config["per_page"], $page);
   $data["links"] = $this->pagination->create_links();

   $this->load->view('superadmin/viewsalesreturn',$data);
}


 


   public function stocktransfer(){
   $data['bilstock']=$this->Admin_model->get_automaticbillstock();
   $employee=$this->Admin_model->get_staff1();
   $data['namelist']="";
   foreach($employee as $keyem){
   $data['namelist'].='
   <option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>
   ';
   }
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumberstock();
   $data['stocktransfer'] = $this->Admin_model->getalltable('tbl_stocktransfer_master');
   $stocktrans = $this->Admin_model->getalltable('tbl_stocktransfer_trans');
   foreach($stocktrans as $stocksingle){
   $data['stocktrans'][$stocksingle->stocktransfer_trans_master_id][] = $stocksingle;
   }
   $items = $this->Admin_model->getalltable('tbl_item');
   foreach($items as $itemsingle){
   $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }
   $this->load->view('superadmin/stocktrans',$data);
   }
   public function quatationbill(){
    $data['quotationtrans']=$this->Admin_model->get_quatationbilldetails();

   $this->load->view('superadmin/quatationbill',$data);
}
public function printquataionbill($id){
   $data['datamaster']=$this->Admin_model->get_quatationbillpreview($id);
   $data['datatrans']=$this->Admin_model->get_quatationbilltranspreview($id);
   $data['employee']=$this->Admin_model->get_salesemployee($id);
   $data['address']=$this->Admin_model->get_mayoori_address();
   $this->load->view('superadmin/quatationbillprint',$data);
}
public function receiptandpay(){
if(isset($_POST['submit'])){
$data=array('reference_num'=>$this->input->post('refno'),
'date'=>$this->input->post('todaydate'),
'payment_receipt_on'=>$this->input->post('payorrepton'),
'type'=>$this->input->post('type'),
'ledger_ac'=>$this->input->post('ledac'),
'payee_receiver'=>$this->input->post('payee'),
'transaction_mode'=>$this->input->post('transmode'),
'bank_name'=>$this->input->post('bank'),
'particulars'=>$this->input->post('particulars'),
'payment_number'=>$this->input->post('payment'),
'receipt_number'=>$this->input->post('receipt')
);
$this->db->insert('tbl_payment_receipt',$data);
redirect('respay');
}
$data['recipay']=$this->Admin_model->get_automaticbillpayrec();
$data['last_bill_number']=$this->Admin_model->get_lastbillnumberpayrec();	 
$data['reandpay']=$this->Admin_model->get_receiptandpayment();   
$this->load->view('superadmin/resceiptandpay',$data);
}
public function cashpayment(){

   
      $data['recipay']=$this->Admin_model->get_automaticbillpayrec();
      $data['last_bill_number']=$this->Admin_model->get_lastbillnumberpayrec();	 
      $data['reandpay']=$this->Admin_model->get_cashpayment();   
      $data['customer']=$this->Admin_model->get_customer();
      $data['supplier']=$this->Admin_model->get_supplier();
      $data['ledger']=$this->Admin_model->get_ledger();
      $data['employee']=$this->Admin_model->get_staff1();
   
      $this->load->view('superadmin/cashpayment',$data);
}
public function cashpaymentadd()
{
   if(isset($_POST['submit']) || isset($_POST['save'])){
      $data=array('referalnumber'=>$this->input->post('refno'),
      'date'=>$this->input->post('todaydate'),
      'receiptorpay_on'=>$this->input->post('payorrepton'),
      'payment_type'=>$this->input->post('type'),
      'ledger'=>$this->input->post('ledac'),
      'payment_type'=>3,
      'narration'=>$this->input->post('particulars'),
      'paymentnumber'=>$this->input->post('payment'),
      'amount'=>$this->input->post('amount')
      );

      $purchase_bill_id=$this->input->post('payorrepton');
      $supplierid=$this->input->post('ledac');
      $bill_no=$this->input->post('payment');
     

      
      $this->db->insert('tbl_bank_payments',$data);
      $lastid=$this->db->insert_id();

      if($purchase_bill_id==4){
         // $payable=$this->Admin_model->get_payable_amount($supplierid,$purchase_bill_id);
        
         // $balance=$payable->paybal_amount-$this->input->post('amount');
         // $id=$payable->paybal_id;
         // $data=array('paybal_amount'=>$balance);
         // $this->db->where('paybal_id',$id);
         // $this->db->update('tbl_supplier_paybalance',$data);

         $data_pay=array('paybal_supplier_id'=>$supplierid,
         'paybal_bill_number'=>$this->input->post('payment'),
         'paybal_amount'=>$this->input->post('amount'),
         'status'=>6,
         'payment_number'=>$lastid);
         $this->db->insert('tbl_supplier_paybalance',$data_pay);

      }
      
      if($this->input->post('savetype') == 2){
         redirect('cashpayment');
      }
      else if($this->input->post('savetype') == 1){
       
         
         $report['cashpayment_details']=$this->Admin_model->getcashpayment_single($lastid); 
         $this->load->view('superadmin/cashpaymentreport',$report);
      }
   
   }

}

public function edit_cashpayment(){

   if(isset($_POST['submit']) || isset($_POST['save'])){
         $data=array('referalnumber'=>$this->input->post('refno'),
         'date'=>$this->input->post('todaydate'),
         'receiptorpay_on'=>$this->input->post('payorrepton'),
         'payment_type'=>$this->input->post('type'),
         'payment_type'=>3,
         'narration'=>$this->input->post('particulars'),
         'paymentnumber'=>$this->input->post('payment'),
         'amount'=>$this->input->post('amount')
         );
         $this->db->where('bp_id',$this->input->post('bpid')); 
         $this->db->update('tbl_bank_payments',$data);

         $supay=array('paybal_amount'=>$this->input->post('amount'));
         $this->db->where('payment_number',$this->input->post('bpid'));
         $this->db->update('tbl_supplier_paybalance',$supay);
         
         if($this->input->post('savetype') == 2){
            redirect('cashpayment');
         }
         else if($this->input->post('savetype') == 1){
            redirect('cashpayment');
         }
         else {
            redirect('cashpayment');
         }
      
      }
}

public function getcashpayment(){

   $id = $this->input->post('id');
   $cashpay = $this->Admin_model->getcashpayment_single($id);
   print_r(json_encode($cashpay));

}

public function getledgerdropdrown(){
   $type=$this->input->post('pay_type');
     $search   = trim($this->input->post('search'));
   if($type==1){
      $drop=$this->Admin_model->get_ledgercreation();
   }else if($type==4){
      $drop=$this->Admin_model->getsupplierfetching();
   }else if($type==5){
      $drop=$this->Admin_model->get_staff();
   }
   else if($type==6){
      $drop=$this->Admin_model->get_financeaccount();
   }
   else if($type==8){
      $drop=$this->Admin_model->get_bank_details();
   }else if($type==10){
      $drop=$this->Admin_model->get_bank_details();
   }else if($type==11){
      $drop=$this->Admin_model->get_branches();
   }
   else{
      $drop=$this->Admin_model->getcustomersearchfetching($search);
   }
   print_r(json_encode($drop));
}
public function getstockreportfilter(){
   $type=$this->input->post('pay_type');
   if($type==3){
      $drop=$this->Admin_model->get_category_result();
   }else if($type==2){
      $drop=$this->Admin_model->getsupplierfetching();
   }else if($type==4){
      $drop=$this->Admin_model->get_group_fetching();
   }
  
   print_r(json_encode($drop));
}
public function getItemByCode(){
   $itemValue = $this->input->post('itemValue');
   $itemList = $this->Admin_model->get_item_where(array('itm_id'=>$itemValue));
   print_r(json_encode($itemList));
}

public function getBatchByItem(){
   $itemid = $this->input->post('itemValue');
   //$firmid=$this->session->userdata('firmid');
   $itemList = $this->Admin_model->get_batchoption($itemid);
   print_r(json_encode($itemList));
}
public function getBatchByItem1(){
   $itemid = $this->input->post('itemValue');
   //$firmid=$this->session->userdata('firmid');
   $itemList = $this->Admin_model->get_batchoption1($itemid);
   print_r(json_encode($itemList));
}
public function getItemBatchDetails(){
   $itemValue = $this->input->post('itemValue');
  
   $batchList = $this->Admin_model->get_batch(trim($itemValue));
   print_r(json_encode($batchList));
}
public function get_supplierdetails(){
   $id=$this->input->post('id');
   $supplier=$this->Admin_model->get_supplierdetails($id);
   print_r(json_encode($supplier));

   
}
public function getbatchcount(){
   $itemValue = $this->input->post('itemValue');
   $firm=$this->session->userdata('id');
   $godown=$this->Admin_model->get_godownloaction($firm);
   //$batchList = $this->Admin_model->getbactcount($itemValue,$godown->godownid);
   $batchList = $this->Admin_model->getcurrentstocklist($itemValue);
   print_r(json_encode($batchList));
}

public function getbatchcount1(){
   $itemValue = $this->input->post('itemValue');
  // $firm=$this->session->userdata('id');
   $godown=$this->input->post('location');
   $batchList = $this->Admin_model->getbactcount($itemValue,$godown);
   if($batchList==null){
      $batchList1=0;
   }else{
      $batchList1 =$batchList;
   }
   //$batchList = $this->Admin_model->getcurrentstocklist($itemValue);
   print_r(json_encode($batchList1));
}
public function getbatchcount2(){
   $itemValue = $this->input->post('itemValue');
   $firm=1;
   //$godown=$this->input->post('location');
   $batchList = $this->Admin_model->getbactcount($itemValue,$firm);
   if($batchList==null){
      $batchList1=0;
   }else{
      $batchList1 =$batchList;
   }
   //$batchList = $this->Admin_model->getcurrentstocklist($itemValue);
   print_r(json_encode($batchList1));
}

public function getItemBatchDetailseach(){
   $itemValue = $this->input->post('itemValue');
   $batchList = $this->Admin_model->get_batcheach($itemValue);
   echo json_encode($batchList);
}
public function getItemBatchDetailseachisinentory(){
   $itemValue = $this->input->post('itemValue');
   $godown =$this->input->post('godown');
   $batchList = $this->Admin_model->get_batcheachisinventory($itemValue,$godown);
   echo json_encode($batchList);
}
public function getItemBatchDetailphysicalstck(){
   $itemValue = $this->input->post('itemValue');
   $batchList = $this->Admin_model->get_batcheachisinventory($itemValue,$godown);
   echo json_encode($batchList);
}
public function getItemlist(){
   $itemValue = $this->input->post('itemValue');
   $batchList = $this->Admin_model->get_itemlist(trim($itemValue));
   print_r(json_encode($batchList));
}

public function searchItemList(){
$itemCode = $this->input->post('itemCode');

if(!empty($itemCode)){
$id = $this->input->post('rowOrder');
$itemList = $this->Admin_model->search_itemcode($itemCode);
if($itemList){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($itemList as $new1){
   $namelist.='
   <tr class="subSelect_itemedit" data-value="'.$new1['itm_id'].'" data-id="'.$id.'">
      <input type="hidden" name="id_SCR" id="id_post'.$new1['itm_id'].'" value="'.$new1['itm_pcost'].'" readonly="readonly">
      <input type="hidden" name="id_SCR" id="id_SCR'.$new1['itm_id'].'" value="'.$new1['itm_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff'.$new1['itm_id'].'" value="'.$new1['itm_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['itm_code'].'</td>
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
public function searchItemNameList(){
$itemCode = $this->input->post('itemName');
if(!empty($itemCode)){
$id = $this->input->post('rowOrder');
$itemList = $this->Admin_model->search_itemname($itemCode);
if($itemList){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($itemList as $new1){
   $namelist.='
   <tr class="subSelect_itemedit" data-value="'.$new1['itm_id'].'" data-id="'.$id.'">
      <input type="hidden" name="id_SCR" id="id_post'.$new1['itm_id'].'" value="'.$new1['itm_pcost'].'" readonly="readonly">
      <input type="hidden" name="id_SCR" id="id_SCR'.$new1['itm_id'].'" value="'.$new1['itm_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff'.$new1['itm_id'].'" value="'.$new1['itm_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['itm_name'].'</td>
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

public function searchItemNameListbarcode(){
   $itemCode = $this->input->post('itemName');
   if(!empty($itemCode)){
  
   $itemList = $this->Admin_model->search_itemname($itemCode);
   if($itemList){
   $namelist='
   <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
      ';
      foreach($itemList as $new1){
      $namelist.='
      <tr class="subSelect_itemedit" data-value="'.$new1['itm_id'].'">
         <input type="hidden" name="id_SCR" id="id_post'.$new1['itm_id'].'" value="'.$new1['itm_pcost'].'" readonly="readonly">
         <input type="hidden" name="id_SCR" id="id_SCR'.$new1['itm_id'].'" value="'.$new1['itm_code'].'" readonly="readonly">
         <input type="hidden" name="fff" id="fff'.$new1['itm_id'].'" value="'.$new1['itm_id'].'" readonly="readonly">
         <td class="titleName">'.$new1['itm_code'].'</td>
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

   public function searchItemNameListbarcode1(){
      $itemCode = $this->input->post('itemName');
      if(!empty($itemCode)){
     
      $itemList = $this->Admin_model->search_itemname($itemCode);
      if($itemList){
      $namelist='
      <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
         ';
         foreach($itemList as $new1){
         $namelist.='
         <tr class="subSelect_itemedit" data-value="'.$new1['itm_id'].'">
            <input type="hidden" name="id_SCR" id="id_post'.$new1['itm_id'].'" value="'.$new1['itm_pcost'].'" readonly="readonly">
            <input type="hidden" name="id_SCR" id="id_SCR'.$new1['itm_id'].'" value="'.$new1['itm_code'].'" readonly="readonly">
            <input type="hidden" name="fff" id="fff'.$new1['itm_id'].'" value="'.$new1['itm_id'].'" readonly="readonly">
            <td class="titleName">'.$new1['itm_name'].'</td>
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
   
public function searchbatchList(){
   $batchcode = $this->input->post('batchcode');
  
   if(!empty($batchcode)){
   $id = $this->input->post('rowOrder');
   $batclist = $this->Admin_model->search_batchid($batchcode);
   if($batclist){
   $namelist='
   <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
      ';
      foreach($batclist as $new1){
      $namelist.='
      <tr class="subSelect_batchid" data-value="'.$new1['batch_id'].'" data-id="'.$id.'">
        
         <input type="hidden" name="batchid" id="batchid'.$new1['batch_id'].'" value="'.$new1['batch_id'].'" readonly="readonly">
         <input type="hidden" name="batchcode" id="batchcode'.$new1['batch_id'].'" value="'.$new1['batchcode'].'" readonly="readonly">
         <td class="titleName">'.$new1['batchcode'].'('.$new1['cur_stock_item_count'].')</td>
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
public function searchItemBatchList(){
$itemCode = $this->input->post('itemBatch');
if(!empty($itemCode)){
$id = $this->input->post('rowOrder');
$itemList = $this->Admin_model->search_itembatch($itemCode);
if($itemList){
$namelist='
<table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
   ';
   foreach($itemList as $new1){
   $namelist.='
   <tr class="subSelect_itemedit" data-value="'.$new1['itm_id'].'" data-id="'.$id.'">
      <input type="hidden" name="id_SCR" id="id_post'.$new1['itm_id'].'" value="'.$new1['itm_pcost'].'" readonly="readonly">
      <input type="hidden" name="id_SCR" id="id_SCR'.$new1['itm_id'].'" value="'.$new1['itm_name'].'" readonly="readonly">
      <input type="hidden" name="fff" id="fff'.$new1['itm_id'].'" value="'.$new1['itm_id'].'" readonly="readonly">
      <td class="titleName">'.$new1['itm_name'].'</td>
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

public function getaccountgroup(){
   $name = $this->input->post('name');
   if(!empty($name)){

   $itemList = $this->Admin_model->searchaccountgroup($name);
   if($itemList){
   $namelist='
   <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
      ';
      foreach($itemList as $new1){
      $namelist.='
      <tr class="accountgroupclickfunction"  >
        
         <input type="hidden" name="id_SCR" id="id_SCR" value="'.$new1['ag_name'].'" readonly="readonly">
         <input type="hidden" name="fff" id="fff"  value="'.$new1['ag_id'].'" readonly="readonly">
         <td class="titleName">'.$new1['ag_name'].'</td>
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

public function getaccountgroup_edit(){
   $name = $this->input->post('name');
   $sid=$this->input->post('id');
   if(!empty($name)){

   $itemList = $this->Admin_model->searchaccountgroup($name);
   if($itemList){
   $namelist='
   <table class="table table-bordered table-hover" style="background-color: #a4dcc2;border-radius: 10px;">
      ';
      foreach($itemList as $new1){
      $namelist.='
      <tr class="accountgroupclickfunctionedit"  data-id="'.$new1['ag_id'].'" data-value="'.$sid.'">
        
         <input type="hidden" name="id_SCR" id="id_SCR'.$new1['ag_id'].'" value="'.$new1['ag_name'].'" data-id="'.$new1['ag_id'].'" readonly="readonly">
         <input type="hidden" name="fff" id="fff'.$new1['ag_id'].'"  value="'.$new1['ag_id'].'" data-id="'.$new1['ag_id'].'"  readonly="readonly">
         <td class="titleName" data-id="'.$new1['ag_id'].'">'.$new1['ag_name'].'</td>
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

public function searchitemcode(){
$itemcode=$this->input->post('search');
$new=$this->Admin_model->search_itemcode($itemcode);
//foreach($lastbatch as $lastbatchnum){
//	$examplelast[$lastbatchnum->ibatch1]=$lastbatchnum->ibatch2;
//}
$namelist="";
if($new){
$lastbatch=$this->Admin_model->get_lastbatchcodenum();
$batchnum=$lastbatch[0]->item_batchcode+1;
//print_r($batchnum);
//exit;
$namelist.='
<div class="col-sm-3"><label class="exampleInputEmail1">Batch Code:</label></div>
<div class="col-sm-9"><input type="text" class="form-control" name="batchcode" value="'.$batchnum.'" id="id_SCR" readonly ></div>
';
echo $namelist;
//print_r($new);
//exit;
}
}
public function deleteb2csaletrans(){
   $id=$this->input->post('transid');
   $this->db->where('sales_trans_id ',$id);
   $this->db->delete('tbl_sales_trans');
}

public function salesadd2(){
   $this->sessionout();
   $token=$this->input->post('token');
   $checktoken=$this->Admin_model->get_checksalestoken($token);
    if($checktoken==null){
      $tablelogin = "login";
      $table ="tbl_sales_master";
      $length = count($this->input->post('itemtotalamount'));
      $itemcode = $this->input->post('itemcode');
      $transidd=$this->input->post('trans_id');
      $itemid = $this->input->post('puritemid');
      $itemname = $this->input->post('itemname');
      $itembatch = $this->input->post('itembatch');
      $itemqnty = $this->input->post('itemqnty');
      $itemtaxable = $this->input->post('itemtaxable');
      $itemgstper = $this->input->post('itemgstper');
      $itemgstamount = $this->input->post('itemgstamount');
      $itemcessamount = $this->input->post('itemcessamount');
      $itemtotalamount = $this->input->post('itemtotalamount');
      $itemhsncode = $this->input->post('itemhsncode');
      $itemitemtbid = $this->input->post('itemitemtbid');
      $itembatchid = $this->input->post('itembatchid');
      $employee=$this->input->post('employee');
      $unitprice=$this->input->post('unitprice');
      $incentive_id=$this->input->post('incentive_id');
      $incentive_amount=$this->input->post('incentive_amount');
      $amountreceived=$this->input->post('received_amount');
      $saleorderid=$this->input->post('billid');

      // echo $amountreceived;exit;

      $mrp=$this->input->post('mrp');
   
      date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      $now = date('Y-m-d H:i');
   
     
         $logincusid1 = $this->input->post('customerloginid');

         $bilno12=$this->Admin_model->get_automaticbill();
        
         
   if($bilno12==0){
      $billnumber=1;
   }else{
      $last_bill_number=$this->Admin_model->get_lastbillnumber();
      $billnumber=$last_bill_number->sales_master_bill_no+1;
   }
      $data = array(
                  'sales_master_bill_no'=>$billnumber,
                  'sales_master_date'=>date("Y-m-d", strtotime($this->input->post('billdate')) ),
                  'sales_master_customer_name'=> $this->input->post('customername'),
                  'sales_master_delivery_date'=> $this->input->post('deliverydate'),
                  'sales_master_phone_no'=> $this->input->post('phonenumber'),
                  'sales_master_veh_no'=> $this->input->post('vehicleno'),
                  'sales_master_customer_address'=> $this->input->post('address'),
                  'sales_master_delivery_address'=> $this->input->post('deliveryaddress'),
                  'sales_master_eway_billno'=> $this->input->post('ewaybillno'),
                  'sales_master_login_id'=>$this->session->userdata('id'),
                  'sales_master_customer_login_id'=> $logincusid1,
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
                  'sales_added_date'=>$now,
                  'token'=>$token,
                  'sale_order_id'=>$saleorderid,
                  'received_amount'=>$amountreceived
                  );
                 
         $lastid = $this->Admin_model->addrowtotable($table,$data);
        
         $billid=$this->input->post('billid');
         $totalcount=$this->input->post('totalcount');
         $selectedcount=$this->input->post('selectedcount');
         if($totalcount>$selectedcount){
            $statusup=array('sales_created'=>3);
            $this->db->where('sales_order_master_id',$billid);
            $this->db->update('tbl_sales_order_master',$statusup);
         }else{
            $this->db->set('sales_created', 1);
            $this->db->where('sales_order_master_id', $billid);
            $this->db->update('tbl_sales_order_master');
         }
         
   
    
  
   
      $paymentdata=array('pay_type'=>2,
                        'pay_type_id'=>$lastid);
      $this->db->insert('tbl_payments',$paymentdata);
   
      $stockmaster=array('stock_master_type'=>2,
                        'stock_master_type_id'=>$lastid,
                        'stock_master_added_date'=>$now);
      $stockmasterid=$this->Admin_model->addrowtotable('tbl_stock_master',$stockmaster);
     
      for($i=0;$i<$length;$i++){

         
         $datatrans = array(
                        'sales_trans_master_id' => $lastid,
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
         $b2clastid[$i]=$this->db->insert_id();
         $this->db->where('sales_order_trans_id',$transidd[$i]);
         $this->db->delete('tbl_sales_order_trans');
       
         // $data_upsta=array('sales_order_status'=>1);
         // $this->db->update('tbl_sales_order_trans',$data_upsta); 
     
         $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
         $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
   


         // if($incentive_id[$i]!=null){
            $data_incentive=array('staff_id'=>$employee[$i],
            'added_date'=>date("Y-m-d", strtotime($this->input->post('billdate')) ),
            'sale_type'=>'1',
            'amount'=>$incentive_amount[$i],
            'sale_order_id'=>$b2clastid[$i],
            'batch_id'=>$itembatchid[$i],
            'unitprice'=>$itemtotalamount[$i],
            'billnumber'=>$billnumber);
            $this->db->insert('tbl_staff_incentive',$data_incentive);
         //}
        //
        // echo "<pre>";print_r($itembatchid[$i]);exit;  
       
        
   
   
         // if($checkinventstock_for_item[$i]==null){

         //    echo "Stock not available";exit;
   
           
   
         // }else{
   
            $count[$i]=$checkitem[$i]->cur_stock_item_count;
            $Totalcount[$i]=$count[$i]-$itemqnty[$i];
         
            $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                     'current_stock_batch_id'=>$itembatchid[$i],
                                    'cur_stock_item_count'=>$Totalcount[$i],
                                    'added_date'=>$now,
                                    'stock_master_id'=>$stockmasterid);
   
            $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                                       'cur_stock_history_batchid'=>$itembatchid[$i],
                                       'cur_stock_history_item_count'=>$itemqnty[$i],
                                       'cur_stock_history_added_date'=>$now,
                                       'cur_stock_history_stock_master_id'=>$stockmasterid,
                                    'purpose'=>'sales order to sale');
   
            $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
   
            $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
            $this->db->update('tbl_current_stock',$dataCurrentstock);

            if(is_numeric($itemqnty[$i])){
           
            $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                 
            $godownlist=$this->Admin_model->get_godownlistfetch();
          
            if($checkinventstock_for_item[$i]->inventory_stock_itemcount!=0){
            
               for($j=0;$j<$itemqnty[$i];$j++){

                  

                  $gettrans[$i]=$this->Admin_model->get_transsalestable($b2clastid[$i]);
                 
                  $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                 
                  
                  if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){

                     $totalstock_count  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
                     if($gettrans[$i]->sales_trans_branch==null){
                        $barchstock[$j]=1;
                     }else{
                        $barchstock[$j]=$gettrans[$i]->sales_trans_branch+1;
                     }

                     $data_branch[$j]=array('sales_trans_branch'=>$barchstock[$j]);
                     $this->db->where('sales_trans_id',$b2clastid[$i]);
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
                           $this->db->where('sales_trans_id',$b2clastid[$i]);
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

           
            
              

                  $gettrans[$i]=$this->Admin_model->get_transsalestable($b2clastid[$i]);
                  
                  //  if($gettrans[$i]->sales_trans_godown==null){
                  //       $barchstock2[$i]=1;
                  //    }else{
                  //       $barchstock2[$i]=$gettrans[$i]->sales_trans_godown+1;
                  //    }
                 
                  $data_branch2[$i]=array('sales_trans_godown'=>$itemqnty[$i]);
                  $this->db->where('sales_trans_id',$b2clastid[$i]);
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
   
     
   
      
   
   
      if($this->input->post('savetype') == 2){
         redirect('sales');
      }
      else if($this->input->post('savetype') == 1){
         $report['datamaster'] = $this->Admin_model->getalltablewhererow($table,array('sales_master_id'=>$lastid));
         $report['datatrans'] = $this->Admin_model->getalltablewhereresult(array('sales_trans_master_id'=>$lastid));
        // echo "<pre>";print_r($report['datatrans']);exit;
         $report['employee']=$this->Admin_model->get_salesemployee($lastid);
         $report['address']=$this->Admin_model->get_mayoori_address();
         $this->load->view('superadmin/salesreport',$report);
      }
  
   }
}
public function salesadd(){

   $this->sessionout();
   $token=$this->input->post('form_token');
   $checktoken=$this->Admin_model->get_checksalestoken($token);
if($checktoken==null){
   $u_type=$this->session->userdata('u_type');
   
  
   $ip = $_SERVER['REMOTE_ADDR'];  

   $tablelogin = "login";
   $table ="tbl_sales_master";
   $length = count($this->input->post('itemtotalamount'));
   $itemcode = $this->input->post('itemcode');
   $itemid = $this->input->post('puritemid');
   $itemname = $this->input->post('itemname');
   $itembatch = $this->input->post('itembatch');
   $itemqnty = $this->input->post('itemqnty');
   $itemtaxable = $this->input->post('itemtaxable');
   $itemgstper = $this->input->post('itemgstper');
   $itemgstamount = $this->input->post('itemgstamount');
   $itemcessamount = $this->input->post('itemcessamount');
   $itemtotalamount = $this->input->post('itemtotalamount');
   $itemhsncode = $this->input->post('itemhsncode');
   $itemitemtbid = $this->input->post('itemitemtbid');
   $itembatchid = $this->input->post('itembatchid');
   $employee=$this->input->post('employee');
   $unitprice=$this->input->post('unitprice');
   $incentive_id=$this->input->post('incentive_id');
   $incentive_amount=$this->input->post('incentive_amount');
   $mrp=$this->input->post('mrp');

   date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
   $tablelogin1="tbl_customer";
  
      $where = array('cus_phonenumber'=>$this->input->post('phonenumber'));
      $customer = $this->Admin_model->checkrowexist($tablelogin1,$where);
      if(!empty($customer)){
      $logincusid = $customer->customer_id;
      $logincusid1 = $customer->customer_id;
      }
      else{
     
         $customercode=$this->Admin_model->get_newcustomercode1();
         if($customercode==null){
       
               $lastcuscode=1;
         }else{
            $lastcuscode=$customercode->cus_code+1;
         }
         
         $datacus   =  array('cus_code'=>$lastcuscode,
                              'cus_name'=>$this->input->post('customername'),	
                              'cus_address'=>$this->input->post('address'),		
                              'cus_phonenumber'=>$this->input->post('phonenumber'),		
                              'login_id'=>00,				
                              );	
        
        
        
         $logincusid1 =  $this->Admin_model->addrowtotable($tablelogin1,$datacus);
       
      }
 
   $bilno12=$this->Admin_model->get_automaticbill();
   
   if($bilno12->mycount==0){
      $rowbillid=1;
   }else{
      $last_bill_number=$this->Admin_model->get_lastbillnumber();
      $rowbillid=1+$last_bill_number->sales_master_bill_no;
    
   }

   $data = array(
               'sales_master_bill_no'=>$rowbillid,
               'sales_master_date'=>date("Y-m-d", strtotime($this->input->post('billdate')) ),
               'sales_master_customer_name'=> $this->input->post('customername'),
               'sales_master_delivery_date'=> $this->input->post('deliverydate'),
               'sales_master_phone_no'=> $this->input->post('phonenumber'),
               'sales_master_veh_no'=> $this->input->post('vehicleno'),
               'sales_master_customer_address'=> $this->input->post('address'),
               'sales_master_delivery_address'=> $this->input->post('deliveryaddress'),
               'sales_master_eway_billno'=> $this->input->post('ewaybillno'),
               'sales_master_login_id'=>$this->session->userdata('id'),
               'sales_master_customer_login_id'=> $logincusid1,
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
               'sales_master_cheque_no'=>$this->input->post('chequenum'),
               'sales_master_banktransaction_id'=>$this->input->post('salestranscheque'),
               'sales_master_bankamount'=>$this->input->post('bankamount'),
               'sales_master_bank'=>$this->input->post('bank'),
               'sales_master_financetype'=>$this->input->post('finance'),
               'sales_master_trans_mode'=>$this->input->post('transmode'),
               'sales_master_finance_id'=>$this->input->post('financeid'),
               'sales_added_date'=>$now,
               'sales_added_system'=>$ip,
               'token'=>$token
               );
      $lastid = $this->Admin_model->addrowtotable($table,$data);
  
  

   $paymentdata=array('pay_type'=>2,
                     'pay_type_id'=>$lastid);
   $this->db->insert('tbl_payments',$paymentdata);

   $stockmaster=array('stock_master_type'=>2,
                     'stock_master_type_id'=>$lastid,
                     'stock_master_added_date'=>$now);
   $stockmasterid=$this->Admin_model->addrowtotable('tbl_stock_master',$stockmaster);

   for($i=0;$i<$length;$i++){

      

      $datatrans = array(
                     'sales_trans_master_id' => $lastid,
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
                  $b2ctransid[$i]=$this->db->insert_id();

                  if($incentive_id[$i]!=null){
                     $data_incentive=array('staff_id'=>$employee[$i],
                     'added_date'=>date("Y-m-d", strtotime($this->input->post('billdate')) ),
                     'sale_type'=>'1',
                     'amount'=>$incentive_amount[$i],
                     'sale_order_id'=>$b2ctransid[$i],
                     'batch_id'=>$itembatchid[$i],
                     'unitprice'=>$itemtotalamount[$i],
                     'billnumber'=>$rowbillid);
                     $this->db->insert('tbl_staff_incentive',$data_incentive);
                  }

                  
  



                  $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                 
            
                     $count[$i]=$checkitem[$i]->cur_stock_item_count;
                     $Totalcount[$i]=$count[$i]-$itemqnty[$i];
                  
                     $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                              'current_stock_batch_id'=>$itembatchid[$i],
                                             'cur_stock_item_count'=>$Totalcount[$i],
                                             'added_date'=>$now,
                                             'stock_master_id'=>$stockmasterid);
            
                 
            
                     $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                     $this->db->update('tbl_current_stock',$dataCurrentstock);
            
                     $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
                     'cur_stock_history_batchid'=>$itembatchid[$i],
                     'cur_stock_history_item_count'=>$itemqnty[$i],
                     'cur_stock_history_added_date'=>$now,
                     'cur_stock_history_stock_master_id'=>$stockmasterid,
                     'purpose'=>'B2c sale',
                     'ip'=>$ip);
            
                 
            
                  $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);


                  if(is_numeric($itemqnty[$i])){
                    
                     //v n echo "hellow";exit;

                     $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                 
                  $godownlist=$this->Admin_model->get_godownlistfetch();
                
                  if($checkinventstock_for_item[$i]->inventory_stock_itemcount!=0){
                  
                     for($j=0;$j<$itemqnty[$i];$j++){

                        

                        $gettrans[$i]=$this->Admin_model->get_transsalestable($b2ctransid[$i]);
                       
                        $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                       
                        
                        if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){

                           $totalstock_count  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
                           if($gettrans[$i]->sales_trans_branch==null){
                              $barchstock[$j]=1;
                           }else{
                              $barchstock[$j]=$gettrans[$i]->sales_trans_branch+1;
                           }

                           $data_branch[$j]=array('sales_trans_branch'=>$barchstock[$j]);
                           $this->db->where('sales_trans_id',$b2ctransid[$i]);
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
                                 $this->db->where('sales_trans_id',$b2ctransid[$i]);
                                 $this->db->update('tbl_sales_trans',$data_branch1[$j]);

                              $goddownid=$godownlist->login_id;
                              $checkinventstock_for_item1[$j] = $this->Admin_model->get_check_inventstockitem($goddownid,$itemid[$i],$itembatchid[$i]);
                            
                              $totalstock_count1[$j]  = $checkinventstock_for_item1[$j]->inventory_stock_itemcount - 1; 
                  
                              $datainventstock1[$j]=array('inventory_stock_itemcount'=>$totalstock_count1[$j]);
                              $this->db->where('inventory_stock_id',$checkinventstock_for_item1[$j]->inventory_stock_id);
                              $this->db->update('tbl_inventory_stock',$datainventstock1[$j]);
                          
                        }

                     }
                   
                    
                  }else{

                 
                  
                    

                        $gettrans[$i]=$this->Admin_model->get_transsalestable($b2ctransid[$i]);
                     
                       
                        $data_branch2[$i]=array('sales_trans_godown'=>$itemqnty[$i]);
                        $this->db->where('sales_trans_id',$b2ctransid[$i]);
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
                  
                     $totalstock_count3[$i]=$checkinventstock_for_item3[$i]->inventory_stock_itemcount-$itemqnty[$i];  
                     $datainventstock3[$i]=array('inventory_stock_itemcount'=>$totalstock_count3[$i]);
               
                     $this->db->where('inventory_stock_id',$checkinventstock_for_item3[$i]->inventory_stock_id);
                     $this->db->update('tbl_inventory_stock',$datainventstock3[$i]);
                
                   
                  }

                 

                  
                
 

   }

 
   
   if($this->input->post('savetype') == 2){
      redirect('sales');
   }
   else if($this->input->post('savetype') == 1){
      $report['datamaster'] = $this->Admin_model->getalltablewhererow($table,array('sales_master_id'=>$lastid));
      $report['datatrans'] = $this->Admin_model->getalltablewhereresult(array('sales_trans_master_id'=>$lastid));
   
      $report['employee']=$this->Admin_model->get_salesemployee($lastid);
    
      $report['address']=$this->Admin_model->get_mayoori_address();
      $this->load->view('superadmin/salesreport',$report);
   }
  
}

  


}
 
public function salesreturnprint($master_id){
   $table ="tbl_salesreturn";
   $report['datamaster'] = $this->Admin_model->getalltablewhererow($table,array('sales_return_id'=>$master_id));
   $report['datatrans'] = $this->Admin_model->getalltablewhereresultreturn(array('salesreturntrans_master_id'=>$master_id));
  // echo "<pre>";print_r($report['datatrans']);exit;
   $report['employee']=$this->Admin_model->get_salesemployeereturn($master_id);
  // echo "<pre>";print_r($report['employee']);exit;
   $report['address']=$this->Admin_model->get_mayoori_address();
    $this->load->view('superadmin/salesreturnreport',$report);
}
public function salesprint($master_id){

   $report['datamaster'] = $this->Admin_model->getalltablewhererow("tbl_sales_master",array('sales_master_id'=>$master_id));
   $report['datatrans'] = $this->Admin_model->getalltablewhereresult(array('sales_trans_master_id'=>$master_id));
   
   $report['employee']=$this->Admin_model->get_salesemployee($master_id);
   $report['address']=$this->Admin_model->get_mayoori_address();
   $this->load->view('superadmin/salesreport',$report);
}
public function b2bprint($master_id)
{
   
      $report['datamaster'] = $this->Admin_model->getalltablewhererow('tbl_billing_master',array('billing_master_id'=>$master_id));
      $report['datatrans'] = $this->Admin_model->getb2balltablewhereresult(array('billing_trans_billing_masterid'=>$master_id));
      $report['employee']=$this->Admin_model->get_b2bemployee($master_id);
      $report['address']=$this->Admin_model->get_mayoori_address();
      $this->load->view('superadmin/b2bsalesreport',$report);
   
}

public function salesinvoice_view($master_id){

   $report['datamaster'] = $this->Admin_model->getalltablewhererow("tbl_sales_master",array('sales_master_id'=>$master_id));
   $report['datatrans'] = $this->Admin_model->getalltablewhereresult(array('sales_trans_master_id'=>$master_id));
   $report['address']=$this->Admin_model->get_mayoori_address();
   $this->load->view('superadmin/sales_invoice_view',$report);
}

public function purchaseinvoice_view($master_id){

   $report['datamaster'] = $this->Admin_model->getalltablewhererow("tbl_sales_master",array('sales_master_id'=>$master_id));
   $report['datatrans'] = $this->Admin_model->getalltablewhereresult(array('sales_trans_master_id'=>$master_id));
   $report['address']=$this->Admin_model->get_mayoori_address();
   $this->load->view('superadmin/sales_invoice_view',$report);
}

public function getsalesb2c_details(){

   $master_id=$this->input->post('id');
   //$master_id=12;
   $data['sales'] = $this->Admin_model->getalltablewhererow('tbl_sales_master',array('sales_master_id'=>$master_id));
   $data['bilno12']=$this->Admin_model->get_automaticbill();

   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
      //Keep following code in single line to avoid javascript conflicts...- Niby
      //Strings that span multiple lines (Template literals) are enclosed with backticks (`).
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $data['employee']=$employee;
   
   //exit;
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
   $data['salestrans'] = $this->Admin_model->get_salesitemfetch($master_id);
//echo "<pre>";print_r($data['salestrans']);exit;
   
   $items = $this->Admin_model->getalltable('tbl_item');

   foreach($items as $itemsingle){
      $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }

   $data['bank']=$this->Admin_model->get_bank(); 
   $data['finance']=$this->Admin_model->get_finance();
   $this->load->view('superadmin/saleswindow_edit',$data);

}


public function b2badd(){
   $this->sessionout();
   $token=$this->input->post('token');
   $checktoken=$this->Admin_model->get_checksalesb2btoken($token);
   if($checktoken==null){
      $tablelogin = "login";
      $table ="tbl_billing_master";
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
      $itembatchid = $this->input->post('itembatchid');
      $unitprice=$this->input->post('unitprice');
      $incentiveid=$this->input->post('incentive_id');
      $incentiveamt=$this->input->post('incentive_amount');
      $mrp=$this->input->post('mrp');
   
      date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      $now = date('Y-m-d H:i');
      // if($this->input->post('outstanding') !=0)
      // {
         $tablelogin1="tbl_customer";
         $where = array('cus_phonenumber'=>$this->input->post('phonenumber'));
         $customer = $this->Admin_model->checkrowexist($tablelogin1,$where);
         if(!empty($customer)){
            $logincusid = $customer->customer_id;
            $logincusid1 = $this->input->post('customerloginid');
         }
         else{
            // $datalogin = array(
            // 'phoneno' => $this->input->post('phonenumber'),
            // 'uname' => $this->input->post('customername'),
            // 'password' => $this->input->post('customername'),
            // 'u_type' => 3,
            // 'customer_type' => 'b2b'
            // );
            // $logincusid = $this->Admin_model->addrowtotable($tablelogin,$datalogin);
            $data       =  array('cus_code'=>$this->Admin_model->get_newcustomercode(),
                                    'cus_name'=>$this->input->post('customername'),	
                                    'cus_address'=>$this->input->post('address'),		
                                    'cus_phonenumber'=>$this->input->post('phonenumber'),		
                                    'login_id'=>0,				
                                    );	
              
              
               $logincusid1 = $this->Admin_model->addrowtotable($tablelogin1,$data);
         }
      // }
      // else{
      //    $logincusid=0;
      //    $logincusid1=$this->input->post('customerloginid');
      // }
      $bilb2b=$this->Admin_model->get_automaticbillb2b();
      //print_r($data['bilb2b']);exit;
      $last_bill_number=$this->Admin_model->get_lastbillnumberb2b();
      if($bilb2b==0){
         $billnumber=1;
      }else{
         $billnumber=$last_bill_number->billing_master_billno+1;
      }
      $data = array(
                  'billing_master_customer_name'=> $this->input->post('customername'),
                  'billing_master_billno' => $billnumber,
                  'billing_master_phoneno'=> $this->input->post('phonenumber'),
                  'billing_master_vehicleno'=> $this->input->post('vehicleno'),
                  'billing_master_customer_address'=> $this->input->post('address'),
                  'billing_master_delivery_address'=> $this->input->post('deliveryaddress'),
                  'billing_master_eway_billno'=> $this->input->post('ewaybillno'),
                  'billing_master_customer_login_id'=>$logincusid1,
                  'billing_master_tot_taxable_amount'=> $this->input->post('totalTaxableAmount'),
                  'billing_master_tot_gst_amount'=> $this->input->post('amountGst'),
                  'billing_master_delivery_charge'=> $this->input->post('deliverychare'),
                  'billing_master_discount'=> $this->input->post('discount'),
                  'billing_master_roundoff'=> $this->input->post('roundOfValuue'),
                  'billing_master_grandtotal'=> $this->input->post('totalamount'),
                  'billing_master_outstanding'=> $this->input->post('outstanding'),
                  'billing_master_paid_amount'=> $this->input->post('paidamount'),
                  'billing_master_employee_loginid' => $this->session->userdata('id'),
                  'billing_master_billdate'=>$now,
                  'billing_master_state_code'=>$this->input->post('stcode'),
                  'billing_master_paymentmode'=>$this->input->post('paymod1'),
                  'billing_master_note'=>$this->input->post('note'),
                  'billing_master_is_igst'=>$this->input->post('isigst'),
                  'billing_master_transaction_id'=>$this->input->post('transcheque'),
                  'billing_master_chequenumber'=>$this->input->post('chequenum'),
                  'billing_master_cardnumber'=>$this->input->post('cardnumber'),
                  'billing_master_bankamount'=>$this->input->post('bankamount'),
                  'billing_master_bank'=>$this->input->post('bank'),
                  'billingdate'=>date('y-m-d'),
                  'billing_gst_number'=>$this->input->post('gstnumber'),
                  'billing_master_tcs'=>$this->input->post('tcscharge'),
                  'token'=>$token
                  );
   
      $lastid = $this->Admin_model->addrowtotable($table,$data);
   
      // if($this->input->post('outstanding')!=0){
   
      //    $dataoutcheck=$this->Admin_model->get_checkoutstandingcustomer($logincusid1);
      //    if($dataoutcheck!=null){
      //      // echo "hi";exit;
      //       $balamount=$this->input->post('outstanding') + $dataoutcheck->outcus_amount;
   
      //       $dataoutupdate=array('outcusid_customer_id'=>$logincusid1,
      //       'outcus_amount'=> $balamount);
      //       $this->db->where('outcusid_customer_id',$logincusid1);
   
      //       if($this->db->update('tbl_outstandingcustomer',$dataoutupdate)){
      //       $dataoutinserthistory=array('customer_id'=>$logincusid1,
      //       'amount'=>$this->input->post('outstanding'),
      //       'order_master'=>$lastid,
      //       'type'=>2);
      //       $this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);
      //    }    
      //    }else{
      //      // echo "hi hi";exit;
      //       $dataoutinsert=array('outcusid_customer_id'=>$logincusid1,
      //                            'outcus_amount'=>$this->input->post('outstanding'),
      //                            'type'=>2);
      //        if($this->db->insert('tbl_outstandingcustomer',$dataoutinsert)){
      //          $dataoutinserthistory=array('customer_id'=>$logincusid1,
      //          'amount'=>$this->input->post('outstanding'),
      //          'order_master'=>$lastid,
      //          'type'=>2);
      //          $this->db->insert('tbl_outstandingcushistory',$dataoutinserthistory);
      //        }                    
      //    }
      //   }        
   
      $payment=array('pay_type'=>5,
      'pay_type_id'=>$lastid,
      'created_at'=>$now);
      $this->db->insert('tbl_payments',$payment);
      $stockmaster=array('stock_master_type'=>5,
      'stock_master_type_id'=>$lastid,
      'stock_master_added_date'=>$now);
      $stockmasterid=$this->Admin_model->addrowtotable('tbl_stock_master',$stockmaster);
   
      for($i=0;$i<$length;$i++){
   
         $datatrans = array(
                        'billing_trans_billing_masterid' => $lastid,
                        'billing_trans_item_code' => $itemcode[$i],
                        'billing_trans_qty' => $itemqnty[$i],
                        'billing_trans_taxable_value' => $itemtaxable[$i],
                        'billing_trans_hsn_code' => $itemhsncode[$i],
                        'billing_trans_item_code' => $itemcode[$i],
                        'billing_trans_gst_percentage' => $itemgstper[$i],
                        'billing_trans_gst_amount' => $itemgstamount[$i],
                        'billing_trans_total' => $itemtotalamount[$i],
                        'billing_trans_employee_sale_login_id' => $employee[$i],
                        'billing_item_id'=>$itemid[$i],
                        'billing_item_batch_id'=>$itembatchid[$i],
                        'billing_employee_id'=>$employee[$i],
                        'billing_trans_unitprice'=>$unitprice[$i],
                        'billing_incentive_id'=>$incentiveid[$i],
                        'billing_incentive_amount'=>$incentiveamt[$i],
                        'billing_trans_mrp'=>$mrp[$i]
   
                        );
   
                      //  echo "<pre>";print_r($datatrans);exit;
         $this->Admin_model->addrowtotable('tbl_billing_trans',$datatrans);
         $b2btransid[$i]=$this->db->insert_id();
         // if($incentive_id[$i]!=null){
            $data_incentive=array('staff_id'=>$employee[$i],
            'added_date'=>date('y-m-d'),
            'sale_type'=>'2',
            'amount'=>$incentiveamt[$i],
            'sale_order_id'=>$b2btransid[$i],
            'batch_id'=>$itembatchid[$i],
            'unitprice'=> $itemtotalamount[$i],
            'billnumber'=> $billnumber);
            $this->db->insert('tbl_staff_incentive',$data_incentive);
         // }
   
         
         $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
   
         $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'),$itemid[$i],$itembatchid[$i]);
        
       
   
            $count[$i]=$checkitem[$i]->cur_stock_item_count;
            $Totalcount[$i]=$count[$i]-$itemqnty[$i];
   
            $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
            'cur_stock_item_count'=>$Totalcount[$i],
            'added_date'=>$now,
            'stock_master_id'=>$stockmasterid);
            $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
            'cur_stock_history_item_count'=>$itemqnty[$i],
            'cur_stock_history_added_date'=>$now,
            'cur_stock_history_stock_master_id'=>$stockmasterid,
            'purpose'=>'b2b add');
            $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
            $this->db->update('tbl_current_stock',$dataCurrentstock);
   
           
            // $totalstock_count  = $checkinventstock_for_item[$i]->inventory_stock_itemcount - $itemqnty[$i]; 
      
            // $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
            // $this->db->where('inventory_stock_id',$checkinventstock_for_item[$i]->inventory_stock_id);
            // $this->db->update('tbl_inventory_stock',$datainventstock);
   
            if(is_numeric($itemqnty[$i])){
           
           // $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                    
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
                     $this->db->where('billing_trans_id ',$b2btransid[$i]);
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
                  
                   if($gettrans[$i]->billing_godownqty==null){
                        $barchstock2[$j]=1;
                     }else{
                        $barchstock2[$j]=$gettrans[$i]->billing_godownqty+1;
                     }
                 
                  $data_branch2[$i]=array('billing_godownqty'=>$barchstock2[$i]);
                  $this->db->where('billing_trans_id ',$b2btransid[$i]);
                  $this->db->update('tbl_billing_trans',$data_branch2[$i]);
   
   
                  $goddownid=$godownlist->login_id;
                  $checkinventstock_for_item1[$i] = $this->Admin_model->get_check_inventstockitem($goddownid,$itemid[$i],$itembatchid[$i]);
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
          
            
         // }
      }
      if($this->input->post('savetype') == 2){
         redirect('b2b');
      }
      else if($this->input->post('savetype') == 1){
         $report['datamaster'] = $this->Admin_model->getalltablewhererow($table,array('billing_master_id'=>$lastid));
         $report['datatrans'] = $this->Admin_model->getb2balltablewhereresult(array('billing_trans_billing_masterid'=>$lastid));
         $report['employee']=$this->Admin_model->get_b2bemployee($lastid);
         $report['address']=$this->Admin_model->get_mayoori_address();
         $this->load->view('superadmin/b2bsalesreport',$report);
      }
   }
   
}
public function stocktransferadd(){
$tablelogin = "login";
$table ="tbl_stocktransfer_master";
$length = count($this->input->post('itemtotalamount'));
$itemcode = $this->input->post('itemcode');
$itemname = $this->input->post('itemname');
$itembatch = $this->input->post('itembatch');
$itemqnty = $this->input->post('itemqnty');
$itemtaxable = $this->input->post('itemtaxable');
$itemgstper = $this->input->post('itemgstper');
$itemgstamount = $this->input->post('itemgstamount');
$itemcessamount = $this->input->post('itemcessamount');
$itemtotalamount = $this->input->post('itemtotalamount');
$itemhsncode = $this->input->post('itemhsncode');
$employee = $this->input->post('employee');
if($this->input->post('outstanding') !=0)
{
$where = array('phoneno'=>$this->input->post('phonenumber'));
$customer = $this->Admin_model->checkrowexist($tablelogin,$where);
if(!empty($customer)){
$logincusid = $customer->id;
}
else{
$datalogin = array(
'phoneno' => $this->input->post('phonenumber'),
'uname' => $this->input->post('customername'),
'password' => $this->input->post('customername'),
'u_type' => 3,
'committe' => ' ',
'office_name'=> ' ',
'mem_id'=>0
);
$logincusid = $this->Admin_model->addrowtotable($tablelogin,$datalogin);
}
}
$data = array(
'stocktransfer_master_customername'=> $this->input->post('customername'),
'stocktransfer_master_gstno' => $this->input->post('gstno'),
'stocktransfer_master_billdate' => $this->input->post('billdate'),
'stocktransfer_master_delivery_chellanno' => $this->input->post('deliverychellan'),
'stocktransfer_master_phoneno'=> $this->input->post('phonenumber'),
'stocktransfer_master_vehicleno'=> $this->input->post('vehicleno'),
'stocktransfer_master_address'=> $this->input->post('address'),
'stocktransfer_master_ewaybillno'=> $this->input->post('ewaybillno'),
'stocktransfer_master_customer_loginid'=>$logincusid,
'stocktransfer_master_total_taxable_amount'=> $this->input->post('totalTaxableAmount'),
'stocktransfer_master_gstamount'=> $this->input->post('amountGst'),
'stocktransfer_master_deliverycharge'=> $this->input->post('deliverychare'),
'stocktransfer_master_discount'=> $this->input->post('discount'),
'stocktransfer_master_roundoff'=> $this->input->post('roundOfValuue'),
'stocktransfer_master_grandtotal'=> $this->input->post('grandTotal'),
'stocktransfer_master_outstanding'=> $this->input->post('outstanding'),
'stocktransfer_master_paidamount'=> $this->input->post('paidamount'),
'stocktransfer_master_billed_employee_loginid' => $this->session->userdata('id'),
'stocktransfer_master_cardnumber'=>$this->input->post('cardnumber'),
'stocktransfer_master_note2' =>$this->input->post('note1'),
'stocktransfer_master_isigst'=>$this->input->post('igst'),
'stocktransfer_master_paymentmode'=>$this->input->post('paymode1')
);
$lastid = $this->Admin_model->addrowtotable($table,$data);


for($i=0;$i<$length;$i++){
$datatrans = array(
'stocktransfer_trans_master_id' => $lastid,
'stocktransfer_trans_itemcode' => $itemcode[$i],
'stocktransfer_trans_qty' => $itemqnty[$i],
'stocktransfer_trans_batch' => $itembatch[$i],
'stocktransfer_trans_taxable_value' => $itemtaxable[$i],
'stocktransfer_trans_hsncode' => $itemhsncode[$i],
'stocktransfer_trans_gstamount' => $itemgstamount[$i],
'stocktransfer_trans_total' => $itemtotalamount[$i],
'stocktransfer_trans_slaeemployee_login_id' => $employee[$i]
);
$this->Admin_model->addrowtotable('tbl_stocktransfer_trans',$datatrans);
}
redirect('stotr');
}
public function quatationadd(){
$tablelogin = "login";
$table ="tbl_quotationbill_master";
$length = count($this->input->post('itemtotalamount'));
$itemcode = $this->input->post('itemcode');
$itemname = $this->input->post('itemname');
$itembatch = $this->input->post('itembatchid');
$itemqnty = $this->input->post('itemqnty');
$itemtaxable = $this->input->post('itemtaxable');
$itemgstper = $this->input->post('itemgstper');
$itemgstamount = $this->input->post('itemgstamount');
$itemcessamount = $this->input->post('itemcessamount');
$itemtotalamount = $this->input->post('itemtotalamount');
$itemhsncode = $this->input->post('itemhsncode');
$employee = $this->input->post('employee');
date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
   $now = date('Y-m-d H:i:s');
$data = array(
'quotationbill_master_name'=> $this->input->post('customername'),
'quotationbill_master_gstno' => $this->input->post('gstno'),
'quotationbill_master_billdate' => $now,
'quotationbill_master_quotation_no' => $this->input->post('quatationno'),
'quotationbill_master_phoneno'=> $this->input->post('phonenumber'),
'quotationbill_master_address'=> $this->input->post('address'),
'quotationbill_master_isigst'=> $this->input->post('isigst'),
'quotationbill_master_tot_taxable_amount'=> $this->input->post('totalTaxableAmount'),
'quotationbill_master_tot_gst_amount'=> $this->input->post('amountGst'),
'quotationbill_master_delivery_charge'=> $this->input->post('deliverychare'),
'quotationbill_master_discount'=> $this->input->post('discount'),
'quotationbill_master_round_off'=> $this->input->post('roundOfValuue'),
'quotationbill_master_grandtotal'=> $this->input->post('grandTotal'),
'quotationbill_master_added_employee_login_id' => $this->session->userdata('id'),
'quotationbill_master_note' =>$this->input->post('note1'),
'quotationbill_master_tot_cess' =>$this->input->post('cessAmount'),
);
$lastid = $this->Admin_model->addrowtotable($table,$data);
for($i=0;$i<$length;$i++){
$datatrans = array(
'quotationbill_trans_quotbill_master_id' => $lastid,
'quotationbill_trans_item_code' => $itemcode[$i],
'quotationbill_trans_qty' => $itemqnty[$i],
'quotationbill_trans_taxablevale' => $itemtaxable[$i],
'quotationbill_trans_hsn_code' => $itemhsncode[$i],
'quotationbill_trans_gstamount' => $itemgstamount[$i],
'quotationbill_trans_cess' => $itemcessamount[$i],
'quotationbill_trans_total' => $itemtotalamount[$i],
'quotationbill_trans_batch' => $itembatch[$i],
'quotationbill_trans_sale_employeee_login_id' => $employee[$i]
);
$this->Admin_model->addrowtotable('tbl_quotationbill_trans',$datatrans);
}
redirect('quatationbill');
}





public function search_receipt_mode(){

$data=$this->Admin_model->get_paymenttypesearchreceipt();

print_r(json_encode($data));
}
public function search_payment_mode(){
$data=$this->Admin_model->get_paymenttypesearchpayment();
print_r(json_encode($data));
}
public function salesreport(){
$this->load->view('superadmin/salesreport');
}

public function searchitemmodal(){

   $val = $this->input->post('itemValue');
   $stype=$this->input->post('type1');
   $row = $this->input->post('row');
   $godownid = $this->input->post('godownid');

   if($godownid!='' && $val==''){
      $godownid = $this->input->post('godownid');
      $html='';
      $data1=$this->Admin_model->get_item_with_stock_available($godownid);
      foreach($data1 as $single1){
         $html.='
         <tr data-id="'.$single1->itm_id.'" data-row="'.$row.'" data-batch="0">
            <td>'.$single1->itm_code.'</td>
            <td>'.$single1->itm_name.'</td>
         </tr>
         '; 
      }
   }
   else if($val!=''&& $stype==1){
      $where = 'itm_code LIKE "%'.$val.'%" ';
      $data=$this->Admin_model->searchitemall($where, $godownid);
      $html='';
      if(!empty($data)){
         foreach($data as $single){
         $html.='
         <tr data-id="'.$single['itm_id'].'" data-row="'.$row.'" data-batch="0">
            <td>'.$single['itm_code'].'</td>
            <td>'.$single['itm_name'].'</td>
         </tr>
         '; 
         }
      }
   }
   else if($val!=''&& $stype==2){

      $where = 'itm_name LIKE "%'.$val.'%" ';
      $data=$this->Admin_model->searchitemall($where, $godownid);
      $html='';
      if(!empty($data)){
         foreach($data as $single){
         $html.='
         <tr data-id="'.$single['itm_id'].'" data-row="'.$row.'" data-batch="0">
            <td>'.$single['itm_code'].'</td>
            <td>'.$single['itm_name'].'</td>
         </tr>
         '; 
         }
      }

   }
   else if($val!=''&& $stype==3){
      $where = 'tbl_imbm.batchcode LIKE "%'.$val.'%"';
      $data=$this->Admin_model->searchitemall($where, $godownid);
      $html='';
      if(!empty($data)){
         foreach($data as $single){
         $html.='
         <tr data-id="'.$single['itm_id'].'" data-row="'.$row.'" data-batch="'.$single['batch_id'].'">
            <td>'.$single['itm_code'].'</td>
            <td>'.$single['itm_name'].'</td>
            
         </tr>
         '; 
         }
      }
   }
   else if($val!=''){

      $where = 'itm_code LIKE "%'.$val.'%" OR itm_name LIKE "%'.$val.'%" OR tbl_imbm.batchcode LIKE "%'.$val.'%"';
      $data=$this->Admin_model->searchitemall($where, $godownid);
      $html='';
      if(!empty($data)){
         foreach($data as $single){
         $html.='
         <tr data-id="'.$single['itm_id'].'" data-row="'.$row.'" data-batch="0">
            <td>'.$single['itm_code'].'</td>
            <td>'.$single['itm_name'].'</td>
            
         </tr>
         '; 
         }
      }

   }
   else{
      $html='';
      $data1=$this->Admin_model->searchitemalllist($godownid);
      foreach($data1 as $single1){
         $html.='
         <tr data-id="'.$single1['itm_id'].'" data-row="'.$row.'" data-batch="0">
            <td>'.$single1['itm_code'].'</td>
            <td>'.$single1['itm_name'].'</td>
         </tr>
         '; 
      }
   }
   print_r($html);
}

public function searchcustomermodaladmin(){
   $val = $this->input->post('itemValue');
   if($val!=''){
      $where = 'cus_name LIKE "%'.$val.'%" OR cus_code LIKE "%'.$val.'%"';
      $data=$this->Admin_model->searchcustmodal($where);
      $html='';
      if(!empty($data)){
         foreach($data as $single){
            $outstanding = $this->Admin_model->get_customer_outstanding($single['login_id']);
            $html.='
            <tr class="customersearchlist" data-id="'.$single['cus_name'].'" data-phone_num="'.$single['cus_phonenumber'].'" data-address="'.$single['cus_address'].'" data-outstanding="'.$outstanding.'">
               <td>'.$single['cus_name'].'</td>
               <td>'.$single['cus_code'].'</td>
               <td>'.$single['cus_address'].'</td>
               <td>'.$single['cus_phonenumber'].'</td>
               <td>'.$single['cus_email'].'</td>
            </tr>
            '; 
         }
      }
   }
   else{
      $html='';
      $data1=$this->Admin_model->searchcustmodallist();
      foreach($data1 as $single1){
         $outstanding = $this->Admin_model->get_customer_outstanding($single1['login_id']);
         $html.='
         <tr class="customersearchlist" data-id="'.$single1['cus_name'].'" data-phone_num="'.$single1['cus_phonenumber'].'" data-address="'.$single1['cus_address'].'" data-outstanding="'.$outstanding.'">
            <td>'.$single1['cus_name'].'</td>
            <td>'.$single1['cus_code'].'</td>
            <td>'.$single1['cus_address'].'</td>
            <td>'.$single1['cus_phonenumber'].'</td>
            <td>'.$single1['cus_email'].'</td>
         </tr>
         '; 
      }
   }
   print_r($html);
}	

//==========Edited By Niby on 28-Sep-2020 Monday ========//
public function journals(){

      if(isset($_POST['submit'])){

         $data_master=array('journal_total_credit'=>$this->input->post('credittotal'),
         'journal_total_debit'=>$this->input->post('debittotal'),
         'date'=>date('y-m-d'),
         'narrations'=>$this->input->post('narrations'),
         'journalnum'=>$this->input->post('journalnum'));

         $this->db->insert('tbl_journal_master',$data_master);
         $lastid=$this->db->insert_id();

         $accounttype=2;//ledger only
         $account=$this->input->post('bankreceipt');
         $debit=$this->input->post('debit');
         $credit=$this->input->post('credit');
         $bank=$this->input->post('bank');

         for($i=0;$i<count($account);$i++){

            $data=array('creditbankaccount_id'=>$account[$i],
            'credit_amount'=>$credit[$i],
            'debit_amount'=>$debit[$i],
            'account_type'=>$accounttype,
            'journal_mster_id'=>$lastid,
            'bankaccount_id'=>$bank[$i]
            );
            
            $this->db->insert('tbl_journals',$data);

         }
         redirect('journals');

      }
      //	$data['banpayment']=$this->Admin_model->get_bankpayment();
      //	$data['bankreceipt']=$this->Admin_model->getbankreceipt();\
      $data['last_id']=$this->Admin_model->get_journalslastid();
      $data['bankaccount']=$this->Admin_model->get_bankaccount();
      $data['ledger']=$this->Admin_model->get_ledger();
      $this->load->view('superadmin/journals',$data);

}
public function journals_edit(){

   if(isset($_POST['submit'])){

      $journal_id=$this->input->post('journal_id');
      $data_master=array('journal_total_credit'=>$this->input->post('credittotal'),
      'journal_total_debit'=>$this->input->post('debittotal'),
      'date'=>date('y-m-d'),
      'narrations'=>$this->input->post('narrations'),
      'journalnum'=>$this->input->post('journalnum'));

      $this->db->where('journal_id',$journal_id);
      $this->db->update('tbl_journal_master',$data_master);

      $this->db->where('journal_mster_id ',$journal_id);
      $this->db->delete('tbl_journals');
      
      $accounttype=2;//ledger only
      $account=$this->input->post('bankreceipt');
      $debit=$this->input->post('debit');
      $credit=$this->input->post('credit');

      for($i=0;$i<count($account);$i++){

         $data=array('creditbankaccount_id'=>$account[$i],
         'credit_amount'=>$credit[$i],
         'debit_amount'=>$debit[$i],
         'account_type'=>$accounttype,
         'journal_mster_id'=>$journal_id
         );
         
         $this->db->insert('tbl_journals',$data);

      }
      redirect('journal_list');

   } 

}

public function get_journalfulllistedit(){
   $id=$this->input->post('id');
   $data['ledger']=$this->Admin_model->get_ledger();
   
   $data['journaldetails']=$this->Admin_model->get_journallistbyid($id)[0];
   $data['journallist']=$this->Admin_model->get_jounalfulllist($id);
   $this->load->view('superadmin/journals_edit',$data);
   //print_r(json_encode($journallist));	
}

public function journallist_delete($id){

   $this->db->where('journal_id',$id);
   $this->db->delete('tbl_journal_master');

   $this->db->where('journal_mster_id ',$id);
   $this->db->delete('tbl_journals');

   redirect('journal_list');
}
//==========Edited By Niby on 28-Sep-2020 Monday End========//

public function getbankaccountfetch(){
$type=$this->input->post('type');
$bankaccount=$this->Admin_model->get_bankaccountfetch();
print_r(json_encode($bankaccount));
}
public function getledgerfetch(){
$type=$this->input->post('type');
$bankaccount=$this->Admin_model->get_ledgerfetchquery();
print_r(json_encode($bankaccount));
}
public function bankreciptamount(){
$receipt=$this->input->post('bankreceipt');
$date=$this->input->post('date');
$reciptamount=$this->Admin_model->get_banreceiptamount($receipt,$date);
print_r(json_encode($reciptamount));
}
public function bankpaymentamount(){
$receipt=$this->input->post('bankpayment');
$date=$this->input->post('date');
$paymentamount=$this->Admin_model->get_bankpaymentamount($receipt,$date);
print_r(json_encode($paymentamount));
}
public function journal_list(){
$data['journallist']=$this->Admin_model->get_journallist();
$this->load->view('superadmin/journalslist',$data);
}
public function get_journalfulllist(){
$id=$this->input->post('id');
$journallist=$this->Admin_model->get_jounalfulllist($id);
$journaldetails=$this->Admin_model->get_journallistbyid($id)[0];
print_r(json_encode(['journallist'=>$journallist,'journaldetails'=>$journaldetails]));	
}
public function gst_purchase_datewise(){
   $data['pagename']  = 'gst_datewise_purchase_report';
   $from='';
   $to='';
   $supplier='';
   $tax='';
   $hsncode='';
   if(isset($_POST['filter']))
   {

      
      $from=$this->input->post('from');
      $to=$this->input->post('to');
      $supplier='';
      $tax=$this->input->post('tax');
      $hsncode=$this->input->post('hsncode');
   }
$data['gstdatewisepurchase']=$this->Admin_model->get_supplierwisesummerygst($from,$to,$supplier,$tax,$hsncode);
$data['hsncode']=$this->Admin_model->get_hsn();
$this->load->view('superadmin/gst_purchase_datewise',$data);
}
public function purchasereturndate(){
   $from='';
   $to='';
   if(isset($_POST['filter']))
   {

      
      $from=$this->input->post('from');
      $to=$this->input->post('to');
    
   }
   $data['purchasereturngst']=$this->Admin_model->get_purchasereturngst($from,$to);
$this->load->view('superadmin/purchasereturndate',$data);
}
public function cashbook(){





if(isset($_POST['cashbook_filter']))
{
   
   $from=$this->input->post('fdate');
   $to=$this->input->post('tdate');
   $today = $from;
   
   $yesterday=date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $from) ) ));
   
  

}else{
   $today=date('Y-m-d');
   $from="";
   $to="";
   
   $yesterday=date('Y-m-d',strtotime("-1 days"));
  
  
}
$type=1;
$data['opbalance']=$this->Admin_model->get_openingblancecash($yesterday,$type);
$closingbalance=$this->Admin_model->get_openingblancecash($today,$type);
if($closingbalance==null){
   
$data['status']=0;
}else{
  
   $data['status']=1;
}
$data['from']=$from;
$data['to']=$to;
$value = array(6, 4);
$data['yesterday']=$yesterday;



$data['cashbook']=$this->Admin_model->get_daybookreport($today,$from,$to);
$data['cashbookreceipt']=$this->Admin_model->get_daybookreportreceipt($today,$from,$to);
$data['salebookb2c']=$this->Admin_model->getsalebookb2c($today,$from,$to);
$data['salebookb2b']=$this->Admin_model->getsalebookb2b($today,$from,$to);
$data['purchase']=$this->Admin_model->getsalebookpurchase($today,$from,$to);
$data['salesorder']=$this->Admin_model->getsalesorder($today,$from,$to);
$data['salesreturn']=$this->Admin_model->get_sales_return($today,$from,$to);
$data['journal']=$this->Admin_model->get_cashfromJournal($today,$from,$to);


$data['cashbook1']=$this->Admin_model->get_daybookreportyesterday($yesterday);

$data['salebookb2c1']=$this->Admin_model->getsalebookb2cyes($yesterday);
$data['salebookb2b1']=$this->Admin_model->getsalebookb2byes($yesterday);
$data['purchase1']=$this->Admin_model->getsalebookpurchaseyes($yesterday);
$data['salesorder1']=$this->Admin_model->getsalesorderyes($yesterday);
$data['salesreturn1']=$this->Admin_model->get_sales_returnyes($yesterday);




$this->load->view('superadmin/cashbook',$data);
}

public function updateclosingbalance(){
   if(isset($_POST['submit'])){
      $date=date('Y-m-d');
      $type=$this->input->post('type');
      $checking=$this->Admin_model->get_checkingclosingblance($date,$type);
      if($checking==null){
         $data=array('type'=>$this->input->post('type'),
         'balance'=>$this->input->post('amount'),
         'date'=>$date);
         $this->db->insert('tbl_closing_blance',$data);
      }
      if($type==1){
         redirect('cashbook');
      }else{
         redirect('bankbook');
      }
     
   }
}

public function daybook(){
$date=date('Y-m-d');
$from=date('Y-m-d');
$to=date('Y-m-d');
$data['from']=date('Y-m-d');
$data['to']=date('Y-m-d');
if(isset($_POST['daybook_filter']))
{
   $date="";
   $from=$this->input->post('fdate');
   $to=$this->input->post('tdate');
  

}

$data['daybook']=$this->Admin_model->get_daybookreport($date,$from,$to);
$data['salebookb2c']=$this->Admin_model->getsalebookb2c($date,$from,$to);
$data['salebookb2b']=$this->Admin_model->getsalebookb2b($date,$from,$to);
$data['purchase']=$this->Admin_model->getsalebookpurchase($date,$from,$to);
$data['salesorder']=$this->Admin_model->getsalesorder($date,$from,$to);
$data['salesreturn']=$this->Admin_model->get_sales_return($date,$from,$to);
$data['deliverychellan']=$this->Admin_model->get_deliverychellanbook($date,$from,$to);

//echo "<pre>";print_r($data['deliverychellan']);exit;
$this->load->view('superadmin/daybook',$data);
}

public function ledgerreport(){
   $actype='';
   $acnum=0;
   $from=date("Y-m-d");
  // echo $from;exit;
   $to=date("Y-m-d");
   if(isset($_POST['ledgersubmit']))
   {
      $actype=$this->input->post('payorrepton');
      $acnum=$this->input->post('ledac');
     
     
      
      $from=$this->input->post('from');
      $to=$this->input->post('to');
      
      if($actype==0){
         $value=array();
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreport($value,$acnum,$from,$to);
      }else if($actype==1){
         $value=array(1);
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreport($value,$acnum,$from,$to);
         $data['ledgername']=$this->Admin_model->get_ledgername($acnum);
         $data['journalreport']=$this->Admin_model->get_journalreportinledger($acnum,$from,$to);
         //echo "<pre>";print_r($data['ledgername']);exit;
      }else if($actype==2){
         $loginid=$this->Admin_model->get_logincustomer_id($acnum);
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreportb2b($actype,$acnum,$from,$to);
         $data['ledgerreportb2b']=$this->Admin_model->getb2bledgereport($acnum,$loginid->login_id,$from,$to);
      }else if($actype==3){
         $loginid=$this->Admin_model->get_logincustomer_id($acnum);
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreportb2b($actype,$acnum,$from,$to);
         $data['ledgerreportb2c']=$this->Admin_model->getb2cledgereport($loginid->login_id,$from,$to);
         
      }else if($actype==4){
         $data['supplier']=$this->Admin_model->get_supplieresult($acnum);
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreportsuplier($actype,$acnum,$from,$to);
         $data['ledgerreportpurchase']=$this->Admin_model->getpurchaseledgereport($acnum,$from,$to);
         $data['ledgerreportpurchasereturn']=$this->Admin_model->getpurchasereturnledgereport($acnum,$from,$to);
         // echo "<pre>";print_r($data['ledgerreportpurchase']);exit;
      }else if($actype==5){
         $value=array(5);
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreport($value,$acnum,$from,$to);
         $data['staff']=$this->Admin_model->get_satfflist($acnum);
      }else if($actype==6){
         $value=array(6);
         $loginid=$this->Admin_model->get_logincustomer_id($acnum);
         $data['ledgerreportb2c']=$this->Admin_model->getfinancereportb2c($actype,$acnum,$from,$to);
         $data['finance']=$this->Admin_model->get_financelist($acnum);
        // $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreportfinance($value,$acnum,$from,$to);
        // echo "<pre>";print_r($data['ledgerreport']);exit;
     //  $data['ledgerreportb2b']=$this->Admin_model->getfinancereportb2b($actype,$acnum,$from,$to);  
      }else if($actype==7){
         $loginid=$this->Admin_model->get_logincustomer_id($acnum);
         $data['ledgerreportb2c']=$this->Admin_model->getfinancereportb2c($actype,$acnum,$from,$to);
     //  $data['ledgerreportb2b']=$this->Admin_model->getfinancereportb2b($actype,$acnum,$from,$to);  
      }else if($actype==8){
         $loginid=$this->Admin_model->get_logincustomer_id($acnum);
         $data['salesorder']=$this->Admin_model->get_salesorder_ledgereport($actype,$loginid->login_id,$from,$to);
        // echo "<pre>";print_r($data['salesorder']);exit;
      }else if($actype==9){
         $loginid=$this->Admin_model->get_logincustomer_id($acnum);
         $value=array(2,3,7);
      
         $data['ledgerreportb2b']=$this->Admin_model->getb2bledgereport($acnum,$from,$to);;
         //echo $acnum;exit;
         $data['ledgerreportb2c']=$this->Admin_model->getb2cledgereport($acnum,$from,$to);

         $data['ledgerreportsalereturn']=$this->Admin_model->getsalesreturnledgereport($acnum,$from,$to);
         //echo "<pre>";print_r($data['ledgerreportsalereturn']);exit;
        
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreport($value,$acnum,$from,$to);
         $saletotaldebit=$this->Admin_model->get_salestotalb2c($acnum,$from);
         $data['customer']=$this->Admin_model->get_customerfulldetails($acnum);
        // echo "<pre>";print_r($data['ledgerreport']);exit;
         $saletotaldebitb2b=$this->Admin_model->get_salestotalb2b($acnum,$from);
         $salesordertotal=$this->Admin_model->get_salesorder($acnum,$from);
         // $data['opbalance']=(($saletotaldebit->b2csum+$saletotaldebitb2b->b2bsum)-($saletotaldebit->b2csum1+$saletotaldebitb2b->b2bsum1))-$salesordertotal->ordersum;
      
         $data['salesorder']=$this->Admin_model->get_salesorder_ledgereport($actype,$acnum,$from,$to);
      }else if($actype==10){
         $value=array(1,2);
         $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreportbank($value,$from,$to);
        // $data['ledgerreportb2c']=$this->Admin_model->get_ledgeraccountreport($value,$acnum,$from,$to);
      }else if($actype==11){
         //$value=array(8);
         $data['deliverychellanreport']=$this->Admin_model->get_deliverychellanleger($acnum,$from,$to);
        // echo "<pre>";print_r($data['deliverychellanreport']);exit;
      }else{
          $value=array($actype);
          $data['ledgerreport']=$this->Admin_model->get_ledgeraccountreport($value,$acnum,$from,$to);
      }
     
   }
   
   $data['actype']=$actype;
   $data['acnum']=$acnum;
   $data['from']=$from;
   $data['to']=$to;
   $data['from1']=date("y-m-d");
  
   $this->load->view('superadmin/ledgereport',$data);
}

public function bankbook(){
   if(isset($_POST['cashbook_filter']))

   {
      
      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');

      
      $bankname=$this->input->post('bankname');

      $today = $from;

     
      
      $yesterday=date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $from) ) ));
     // echo $bankname;exit;
     
   
   }else{
      $today=date('Y-m-d');
      $from="";
      $to="";
      $bankname="";
      
      $yesterday=date('Y-m-d',strtotime("-1 days"));
     
     
   }
   $type=2;
   $data['opbalance']=$this->Admin_model->get_openingblancecash($yesterday,$type);
   $closingbalance=$this->Admin_model->get_openingblancecash($today,$type);
   if($closingbalance==null){
      
   $data['status']=0;
   }else{
     
      $data['status']=1;
   }
  
   $data['from']=$from;
   $data['to']=$to;
   $data['yesterday']=$yesterday;
   $data['cashbook']=$this->Admin_model->get_daybookreportbank($today,$from,$to,$bankname);
   $data['cashbookreceipt']=$this->Admin_model->get_daybookreportreceiptbank($today,$from,$to,$bankname);
   $data['bankledger']=$this->Admin_model->get_bankcashpayment($today,$from,$to);
   $data['salebookb2c']=$this->Admin_model->getsalebookb2cbank($today,$from,$to,$bankname);

   $data['journal']=$this->Admin_model->get_bankfromJournal($today,$from,$to,$bankname);

   $data['salebookb2b']=$this->Admin_model->getsalebookb2bbank($today,$from,$to,$bankname);
 
   $data['salesorder']=$this->Admin_model->getsalesorderbank($today,$from,$to,$bankname);

   $data['bankname']=$this->Admin_model->get_bankaccount();
  
 
$this->load->view('superadmin/bankbook',$data);
}



public function b2bsalessummery(){
  
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/b2csalessummery";
   if(isset($_POST['filter']))
   {
      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');
      $this->pagination->initialize($config);

      
      $data["b2bsalessummery"] = $this->Admin_model->
      b2bsalessummery($from,$to);
     // $data['b2bsalessummery']=$this->Admin_model->b2bsalessummery($from,$to);
      $data['grandsum']=$this->Admin_model->b2bsalessummerysum($from,$to);
     
   }else{
      $config["total_rows"] = $this->Admin_model->b2csalescountlist();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["b2bsalessummery"] = $this->Admin_model->
      b2bsalessummerylist($config["per_page"], $page);

      //$data['b2bsalessummery']=$this->Admin_model->b2bsalessummerylist();
      $data['grandsum']=$this->Admin_model->b2bsalessummerylistsum();
   }
   $data["links"] = $this->pagination->create_links();
   $this->load->view('superadmin/b2bsalessummery',$data);
}
public function b2ctaxper(){

$this->load->view('superadmin/b2ctaxper');
}
public function b2csalessummery(){
  
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/b2csalessummery";
  
   
   
   if(isset($_POST['filter']))
   {

      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');
      //

      $this->pagination->initialize($config);

      
      $data["b2csalessummery"] = $this->Admin_model->
      b2csalessummery($from,$to);

      $data['grandtotal']=$this->Admin_model->b2csalessummerysum($from,$to);

   }else{

      $config["total_rows"] = $this->Admin_model->b2csalescountlist();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["b2csalessummery"] = $this->Admin_model->
      b2csalessummerylist($config["per_page"], $page);

     
      $data['grandtotal']=$this->Admin_model->b2csalessummerylistsum();
   }
   $data["links"] = $this->pagination->create_links();
//echo "<pre>";print_r($data['grandtotal']);exit;
$this->load->view('superadmin/b2csalessummery',$data);
}
public function b2btaxsalereport(){
$this->load->view('superadmin/b2btaxsalereport');
}
public function b2cgstsales(){
   $data["exportid"]='';
  
   if(isset($_POST['filter_bill']))
   {
      $gst=$this->input->post('gst');
    
      $from=$this->input->post('from');

      $tax=$this->input->post('taxpercentage');
     // echo $from;exit;
      $to=$this->input->post('to');
      $data['gstbill']=$this->Admin_model->get_salesgstwise_details_btocchangefromto($gst,$from,$to,$tax);
      $data["exportid"]=1;
   }else{
   
      $from="";
      $to=""; 
  
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/b2cgstsales";
  
   $config["total_rows"] = $this->Admin_model->record_count_salestrans();
   $config["per_page"] = 50;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data['gstbill'] = $this->Admin_model->
   get_salesgstwise_details_btocchange($config["per_page"],$page);
 
   }
 
   
   $data['from']=$from;
   $data['to']=$to;

   $data["links"] = $this->pagination->create_links();

   $data['hsncode']=$this->Admin_model->get_hsn();
   
$this->load->view('superadmin/b2cgstsales',$data);
}
public function salesreturngst(){
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/salesreturngst";
   $gst='';
   $billnum='';
   $from=date('Y-m-d');
   $to=date('Y-m-d');
   if(isset($_POST['filter_bill']))
   {
      $gst=$this->input->post('gst');
      $billnum=$this->input->post('billnumber');
      $data['hsncode']=$this->Admin_model->get_hsn();
      $config["total_rows"] = $this->Admin_model->salesreturncount();
      $config["per_page"] = 50;
      $config["uri_segment"] = 3;
   
      $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["gstbill"] = $this->Admin_model->
      get_salesreturngstwise_details_btocchange($billnum,$gst,$config["per_page"], $page);
     // $data['gstbill']=$this->Admin_model->get_salesgstwise_details_btocchange($gst);
      $data["links"] = $this->pagination->create_links();
   //echo "<pre>";print_r($data['gstbill']);exit;
      
   }else if(isset($_POST['submit_search'])){
      $from=$this->input->post('from_date');
      $to=$this->input->post('to_date');
      $data["gstbill"] = $this->Admin_model->
      get_salesreturngstwise_details_btocchangefromto($from,$to);
   }else{
      $data['hsncode']=$this->Admin_model->get_hsn();
      $config["total_rows"] = $this->Admin_model->salesreturncount();
      $config["per_page"] = 50;
      $config["uri_segment"] = 3;
   
      $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["gstbill"] = $this->Admin_model->
      get_salesreturngstwise_details_btocchange($sales_retuurn_bill_no,$gst,$config["per_page"], $page);
     // $data['gstbill']=$this->Admin_model->get_salesgstwise_details_btocchange($gst);
      $data["links"] = $this->pagination->create_links();
      
   //echo "<pre>";print_r($data['gstbill']);exit;
   }
   $data['from']=$from;
   $data['to']=$to;
$this->load->view('superadmin/salesreturngstsales',$data);
}
public function b2cbillwise(){
   $bill_no='';
   if(isset($_POST['filter_bill']))
   {
      $bill_no=$this->input->post('bill_no');
   }
   $data['billno']=$this->Admin_model->get_billsb2c();
   $data['btocsalesbill_wiseDetails']=$this->Admin_model->get_salesbill_wise_details_btocchange($bill_no);

   $this->load->view('superadmin/b2cbillwise',$data);	
}

public function b2cdatewise(){
   $sale_date="";
   if(isset($_POST['datewise']))
   {
      $sale_date=$this->input->post('sale_date');

   }
$data['b2csalesdatewise']=$this->Admin_model->get_salesdatewise_details_btoc($sale_date);
$this->load->view('superadmin/b2cdatewise',$data);	
}
public function b2cdelchesalesummery(){
   if(isset($_POST['filter_bill'])){
      $from=$this->input->post('fromdate');
      $to=$this->input->post('todate');
   }else{
      $from='';
      $to='';
   }
$data['delreport']=$this->Admin_model->get_deliverychellansummery($from,$to);
$this->load->view('superadmin/b2cdelchesalesummery',$data);
}
public function b2cdelchesaledate(){
$this->load->view('superadmin/b2cdelchesaledate');
}
public function b2cdelchesalebill(){
   $data['billwisereport']=$this->Admin_model->get_billwisedeliverychellanreport();
    //echo "<pre>";print_r($data['billwisereport']);exit;
$this->load->view('superadmin/b2cdelchesalebill',$data);
}
public function b2cdelchelgstsales(){
   $data['billwisereport']=$this->Admin_model->get_billwisedeliverychellanreport();
$this->load->view('superadmin/b2cdelchelgstsales',$data);
}
public function b2bsalesdate(){
   $sale_date="";
   if(isset($_POST['datewise']))
   {
      $sale_date=$this->input->post('sale_date');

   }
$data['b2bsale']=$this->Admin_model->get_salesdatewise_details_btob($sale_date);
$this->load->view('superadmin/b2bsalesdate',$data);
}
public function b2bsalesbill(){
   $bill_no='';
   if(isset($_POST['filter_bill']))
   {
      $bill_no=$this->input->post('bill_no');
   }
   $data['billno']=$this->Admin_model->get_bills();
   $data['btocsalesbill_wiseDetails']=$this->Admin_model->get_salesbill_wise_details_btoc($bill_no);
$this->load->view('superadmin/b2bsalesbill',$data);
}
public function viesales_reports_list(){
   
   if(isset($_POST['submit_search'])){
      $from=$this->input->post('from_date');
      $to=$this->input->post('to_date');
      
      $data['sales'] = $this->Admin_model->getalltablerowsfromtofilter($from,$to);
     
   }else{
      $from='';
      $to='';
      $links="";
      $config = array();
      $config["base_url"] = base_url() . "Admin/viesales_reports_list";
      $config["total_rows"] = $this->Admin_model->record_count_sales();
      $config["per_page"] = 100;
      $config["uri_segment"] = 3;
   
     $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["sales"] = $this->Admin_model->
      get_saleslimitfetch($config["per_page"], $page);
     
   }
   $data['from']=$from;
   $data['to']=$to;
   $data["links"] = $this->pagination->create_links();
   // exit;
   //$data['sales'] = $this->Admin_model->getalltablerows('tbl_sales_master','sales_master_id','DESC');

   //$data['sales'] = $this->Admin_model->get_saleslimitfetch();
  
   
   $data['bilno12']=$this->Admin_model->get_automaticbill();
   $data['employee1']=$this->Admin_model->get_staff1();
   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
      //Keep following code in single line to avoid javascript conflicts...- Niby
      //Strings that span multiple lines (Template literals) are enclosed with backticks (`).
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   // print_r($data['namelist']) ;
   //exit;
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
   $data['last_sales']=$this->Admin_model->get_lastaddedsales();

   $items = $this->Admin_model->getalltable('tbl_item');
   foreach($items as $itemsingle){
   $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $this->load->view('superadmin/viesales_reports_list',$data);
}


PUBLIC FUNCTION b2bgstsale(){
   $gst='';
   $from='';
   $to='';
   $tax='';
   if(isset($_POST['filter_bill']))
   {
      $gst=$this->input->post('gst');
      $from=$this->input->post('fromdate');
      $to=$this->input->post('todate');
      $tax=$this->input->post('taxpercentage');
   }
   $data['hsncode']=$this->Admin_model->get_hsn();
   $data['gstbill']=$this->Admin_model->get_salesgstwise_details_btobchange($gst,$from,$to,$tax);
   
   //echo "<pre>";print_r($data['gstbill']);exit;
$this->load->view('superadmin/b2bgstsale',$data);
}
public function bank_payments(){
   if(isset($_POST['submit_ledger'])){
      $data = array('le_name'=>$this->input->post('name'),
      'le_accgrp'=>$this->input->post('acc_group'),
      'le_opbalance'=>$this->input->post('opbal'),
      'le_fyear'=>$this->input->post('year'),
      'le_notes'=>$this->input->post('notes'),
      'le_paymenttype'=>$this->input->post('paytype')
      );
      $this->db->insert('tbl_ledger',$data);
      redirect('bank_payments');
      }
$data['fyear']=$this->Admin_model->get_fyear();
$data['ledger']=$this->Admin_model->get_ledger();
$data['last_id']=$this->Admin_model->get_paymentlastid();
//print_r($data['last_id']);exit;
$data['bankaccount']=$this->Admin_model->get_bankaccount();
$this->load->view('superadmin/bank_payments',$data);
}
public function bank_paymentsadd()
{
   if(isset($_POST['submit']) || isset($_POST['save'])){
      //$now = date('Y-m-d');
      $data=array('bp_bankaccountid'=>$this->input->post('bank1'),
      'referalnumber'=>$this->input->post('refno1'),
      'date'=>$this->input->post('date1'),
      'receiptorpay_on'=>$this->input->post('payorrepton'),
      'ledger'=>$this->input->post('ledger1'),
      'amount'=>$this->input->post('amount1'),
      'narration'=>$this->input->post('narration'),
      'cheque_date'=>$this->input->post('chqudate1'),
      'cheque_num'=>$this->input->post('cheque1'),
      'payment_type'=>1,
      'receiptnumber'=>$this->input->post('vouchernum'));
      $this->db->insert('tbl_bank_payments',$data);
      $lastid=$this->db->insert_id();

      if($this->input->post('payorrepton')==4){
         $data_pay=array('paybal_supplier_id'=>$this->input->post('ledger1'),
         'paybal_bill_number'=>$this->input->post('vouchernum'),
         'paybal_amount'=>$this->input->post('amount1'),
         'status'=>6,
         'payment_number'=>$lastid);
         $this->db->insert('tbl_supplier_paybalance',$data_pay);
      }


         if($this->input->post('savetype') == 2){
            redirect('bank_payments'); 
         }
         else if($this->input->post('savetype') == 1){
            $data['bankpayment_details']=$this->Admin_model->get_cashrecipt_single($lastid);
            $data['address']=$this->Admin_model->get_mayoori_address();
            $this->load->view('superadmin/bankpaymentreport',$data);
         }
      }
      

}
public function bank_paymentslist(){
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('bpay_id');
$data=array('bp_bankaccountid'=>$this->input->post('bank1'),
'referalnumber'=>$this->input->post('refno1'),
'date'=>$this->input->post('date1'),
'ledger'=>$this->input->post('ledger1'),
'amount'=>$this->input->post('amount1'),
'narration'=>$this->input->post('narration1'),
'cheque_date'=>$this->input->post('chqudate1'),
'cheque_num'=>$this->input->post('cheque1'),
'payment_type'=>1,
'receiptnumber'=>$this->input->post('vouchernum'));

$this->db->where('bp_id',$sid);
$this->db->update('tbl_bank_payments',$data);

$supay=array('paybal_amount'=>$this->input->post('amount1'));
$this->db->where('payment_number',$sid);
$this->db->update('tbl_supplier_paybalance',$supay);
redirect('bank_paymentslist');
}
$data['fyear']=$this->Admin_model->get_fyear();
$data['ledger']=$this->Admin_model->get_ledger();
$data['last_id']=$this->Admin_model->get_paymentlastid();
//print_r($data['last_id']);exit;
$data['bankaccount']=$this->Admin_model->get_bankaccount();
$data['bankpay']=$this->Admin_model->get_bankpaymentlist();
$this->load->view('superadmin/bank_paymentslist',$data);
}
public function cashrecipt(){

      
      $data['recipay']=$this->Admin_model->get_automaticbillpayrec();
      $data['last_bill_number']=$this->Admin_model->get_lastbillnumberpayrec();	 
      $data['receiptcash']=$this->Admin_model->get_cashrecipt();   
      $this->load->view('superadmin/cashrecipt',$data);
}
public function cashreciptadd()
{
   if(isset($_POST['submit']) || isset($_POST['save'])){

     

      $data=array('referalnumber'=>$this->input->post('refno'),
      'date'=>$this->input->post('todaydate'),
      'receiptorpay_on'=>$this->input->post('payorrepton'),
      'payment_type'=>$this->input->post('type'),
      'ledger'=>$this->input->post('ledac'),
      'payment_type'=>4,
      'narration'=>$this->input->post('particulars'),
      'receiptnumber'=>$this->input->post('payment'),
      'amount'=>$this->input->post('amount')
      );
      $this->db->insert('tbl_bank_payments',$data); 
      $lastid=$this->db->insert_id();
      if($this->input->post('payorrepton')==2){
         $customerid=$this->input->post('ledac');
         // $userloginid=$this->Admin_model->getcheckcustomerloginid($customerid);
        
         // if($userloginid!=null){
         //    $balamount=($userloginid->outcus_amount)-($this->input->post('amount'));
         //    $this->db->where('outcusid_customer_id',$userloginid->outcusid_customer_id);
         //    $dataupdate=array('outcus_amount'=>$balamount);
         //    $this->db->update('tbl_outstandingcustomer',$dataupdate);
         // }
         $data_result=array('customer_id'=>$customerid,
         'amount'=>$this->input->post('amount'),
         'order_master'=>$lastid,
         'type'=>3);
         $this->db->insert('tbl_outstandingcushistory',$data_result);

         $billid=$this->input->post('payment');
         $b2bill=$this->Admin_model->get_b2bbillfrombillno($billid);
         $outstandingamount=$b2bill->billing_master_outstanding-$this->input->post('amount');
         $datamasterb2b=array('billing_master_outstanding'=>$outstandingamount);
         $this->db->where('billing_master_billno',$billid);
         $this->db->update('tbl_billing_master',$datamasterb2b);
      }else if($this->input->post('payorrepton')==3){
         //echo "hi";exit;
         $customerid=$this->input->post('ledac');
         // $userloginid=$this->Admin_model->getcheckcustomerloginid($customerid);
         // if($userloginid!=null){
            // $balamount=($userloginid->outcus_amount)-($this->input->post('amount'));
            // $this->db->where('outcusid_customer_id',$userloginid->outcusid_customer_id);
            // $dataupdate=array('outcus_amount'=>$balamount);
            // $this->db->update('tbl_outstandingcustomer',$dataupdate);
         // }
         $data_result=array('customer_id'=>$customerid,
         'amount'=>$this->input->post('amount'),
         'order_master'=>$lastid,
         'type'=>3);
         $this->db->insert('tbl_outstandingcushistory',$data_result);
         $billid=$this->input->post('payment');
         $b2cbill=$this->Admin_model->get_b2cbillfrombillno($billid);
         $outstandingamount=$b2cbill->sales_master_outstanding-$this->input->post('amount');
         $datamaster=array('sales_master_outstanding'=>$outstandingamount);
         $this->db->where('sales_master_bill_no',$billid);
         $this->db->update('tbl_sales_master',$datamaster);
      }else if($this->input->post('payorrepton')==7){
        
         $billid=$this->input->post('payment');
         $saleorderbill=$this->Admin_model->get_saleorderbillfrombillno($billid);
         $outstandingamount=$saleorderbill->sales_order_master_outstanding-$this->input->post('amount');
         $datamastersaleorder=array('sales_order_master_outstanding'=>$outstandingamount);
         $this->db->where('sales_order_master_bill_no',$billid);
         $this->db->update('tbl_sales_order_master',$datamastersaleorder);
      }
    
      //echo $this->db->last_query();exit;
      if($this->input->post('savetype') == 2){
         redirect('cashrecipt'); 
      }
      else if($this->input->post('savetype') == 1){
         $data['cashrecipt_details']=$this->Admin_model->get_cashrecipt_single($lastid);
         $data['address']=$this->Admin_model->get_mayoori_address();
         $this->load->view('superadmin/cashreciptreport',$data);
      }

   }

}
public function cashreceipt_print($id){
      $data['cashrecipt_details']=$this->Admin_model->get_cashrecipt_single($id);
         $data['address']=$this->Admin_model->get_mayoori_address();
         $this->load->view('superadmin/cashreciptreport',$data);
}
public function getbalanceamount()
{
    $id     = $this->input->post('id');
    $type   = $this->input->post('type');
    $ledger = $this->input->post('ledger');

    $result = $this->Admin_model->get_balance_amount($id, $type, $ledger);

    echo json_encode($result);
}

public function cashrecipt_edit(){

   if(isset($_POST['submit']) || isset($_POST['save'])){

      $oldamount=$this->input->post('amount1');
      $difference=$oldamount-$this->input->post('amount');
    

      $data=array('referalnumber'=>$this->input->post('refno'),
      'date'=>$this->input->post('todaydate'),
      'receiptorpay_on'=>$this->input->post('payorrepton'),
      'payment_type'=>$this->input->post('type'),
      'ledger'=>$this->input->post('ledac'),
      'payment_type'=>4,
      'narration'=>$this->input->post('particulars'),
      'receiptnumber'=>$this->input->post('payment'),
      'amount'=>$this->input->post('amount')
      );
      $this->db->where('bp_id',$this->input->post('bpid')); 
      $this->db->update('tbl_bank_payments',$data);

     

     
      
      if($this->input->post('payorrepton')==2){

         $billid=$this->input->post('payment');
         $b2bbill=$this->Admin_model->get_b2bbillfrombillno($billid);

         $outstandingamount=$b2bbill->billing_master_outstanding+$difference;
    
         $datamasterb2b=array('billing_master_outstanding'=>$outstandingamount);
         $this->db->where('billing_master_billno',$billid);
         $this->db->update('tbl_billing_master',$datamasterb2b);

         $data_update=array('amount'=>$this->input->post('amount'));
         $this->db->where('order_master',$this->input->post('bpid'));
         $this->db->update('tbl_outstandingcushistory',$data_update);

      }else if($this->input->post('payorrepton')==3){

        
         
         $billid=$this->input->post('payment');
         $b2cbill=$this->Admin_model->get_b2cbillfrombillno($billid);

         $outstandingamount=$b2cbill->sales_master_outstanding+$difference;
    
         $datamaster=array('sales_master_outstanding'=>$outstandingamount);
         $this->db->where('sales_master_bill_no',$billid);
         $this->db->update('tbl_sales_master',$datamaster);

         $data_update=array('amount'=>$this->input->post('amount'));
         $this->db->where('order_master',$this->input->post('bpid'));
         $this->db->update('tbl_outstandingcushistory',$data_update);


      }

      //echo $this->db->last_query();exit;
      if($this->input->post('savetype') == 2){
         redirect('cashrecipt'); 
      }
      else if($this->input->post('savetype') == 1){
         redirect('cashrecipt'); 
      }

   }
   $data['recipay']=$this->Admin_model->get_automaticbillpayrec();
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumberpayrec();	 
   $data['receiptcash']=$this->Admin_model->get_cashrecipt();   
   $this->load->view('superadmin/cashrecipt',$data);
}

public function delete_bank_paymentslist($id){
		$this->db->where('bp_id ',$id);
		$this->db->delete('tbl_bank_payments');
		redirect('bank_paymentslist');
   }
   
public function bank_receipts(){

   if(isset($_POST['submit'])){

      $data=array('bp_bankaccountid'=>$this->input->post('bank'),
      'referalnumber'=>$this->input->post('refno'),
      'date'=>$this->input->post('date'),
      'ledger'=>$this->input->post('ledger'),
      'receiptorpay_on'=>$this->input->post('payorrepton'),
      'amount'=>$this->input->post('amount'),
      'narration'=>$this->input->post('narration'),
      'cheque_date'=>$this->input->post('chqudate'),
      'cheque_num'=>$this->input->post('cheque'),
      'payment_type'=>2,
      'receiptnumber'=>$this->input->post('vouchernum'));
      $this->db->insert('tbl_bank_payments',$data);
      $lastid=$this->db->insert_id();
      if($this->input->post('payorrepton')==2){
         $customerid=$this->input->post('ledger');
         // $userloginid=$this->Admin_model->getcheckcustomerloginid($customerid);
         // if($userloginid!=null){
         //    $balamount=($userloginid->outcus_amount)-($this->input->post('amount'));
         //    $this->db->where('outcusid_customer_id',$userloginid->outcusid_customer_id);
         //    $dataupdate=array('outcus_amount'=>$balamount);
         //    $this->db->update('tbl_outstandingcustomer',$dataupdate);
         // }

         $data_result=array('customer_id'=>$customerid,
         'amount'=>$this->input->post('amount'),
         'order_master'=>$lastid,
         'type'=>3);
         $this->db->insert('tbl_outstandingcushistory',$data_result);

         $billid=$this->input->post('vouchernum');
         $b2bill=$this->Admin_model->get_b2bbillfrombillno($billid);
         //echo "<pre>";print_r($b2bill);exit;
         $outstandingamount=$b2bill->billing_master_outstanding-$this->input->post('amount');
         $datamasterb2b=array('billing_master_outstanding'=>$outstandingamount);
         $this->db->where('billing_master_billno',$billid);
         $this->db->update('tbl_billing_master',$datamasterb2b);

      }else if($this->input->post('payorrepton')==3){
         $customerid=$this->input->post('ledger');
         // $userloginid=$this->Admin_model->getcheckcustomerloginid($customerid);
         // if($userloginid!=null){
         //    $balamount=($userloginid->outcus_amount)-($this->input->post('amount'));
         //    $this->db->where('outcusid_customer_id',$userloginid->outcusid_customer_id);
         //    $dataupdate=array('outcus_amount'=>$balamount);
         //    $this->db->update('tbl_outstandingcustomer',$dataupdate);
         // }

         $data_result=array('customer_id'=>$customerid,
         'amount'=>$this->input->post('amount'),
         'order_master'=>$lastid,
         'type'=>3);
         $this->db->insert('tbl_outstandingcushistory',$data_result);

         $billid=$this->input->post('vouchernum');
         $b2cbill=$this->Admin_model->get_b2cbillfrombillno($billid);
         $outstandingamount=$b2cbill->sales_master_outstanding-$this->input->post('amount');
         $datamaster=array('sales_master_outstanding'=>$outstandingamount);
         $this->db->where('sales_master_bill_no',$billid);
         $this->db->update('tbl_sales_master',$datamaster);
      }
      
      redirect('bank_receipts');

   }
   if(isset($_POST['submit_ledger'])){

      $data = array('le_name'=>$this->input->post('name'),
      'le_accgrp'=>$this->input->post('acc_group'),
      'le_opbalance'=>$this->input->post('opbal'),
      'le_fyear'=>$this->input->post('year'),
      'le_notes'=>$this->input->post('notes'),
      'le_paymenttype'=>$this->input->post('paytype')
      );
      $this->db->insert('tbl_ledger',$data);
      redirect('bank_receipts');

   }

   $data['fyear']=$this->Admin_model->get_fyear();
   $data['ledger']=$this->Admin_model->get_ledger();
   $data['last_id']=$this->Admin_model->get_paymentlastidrecipt();
  
   //print_r($data['last_id']);exit;
   $data['bankaccount']=$this->Admin_model->get_bankaccount();
   $this->load->view('superadmin/bank_receipts',$data);

}

public function bank_receiptslist(){
	
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('brec_id');
$data=array(
'referalnumber'=>$this->input->post('refno1'),
'date'=>$this->input->post('date1'),
'ledger'=>$this->input->post('ledger1'),
'amount'=>$this->input->post('amount1'),
'narration'=>$this->input->post('narration1'),
'cheque_date'=>$this->input->post('chqudate1'),
'cheque_num'=>$this->input->post('cheque1'),
'payment_type'=>2,
'receiptnumber'=>$this->input->post('vouchernum'));
//$this->db->insert('tbl_godownfirm',$data);
//$this->db->where('godownid',$id);
//$this->db->update('tbl_godownfirm',$data);
//redirect('firmlist');

$this->db->where('bp_id',$sid);
$this->db->update('tbl_bank_payments',$data);

$bankreceipt=$this->Admin_model->get_bankreceiptfetch($sid);

//echo "<pre>";print_r($bankreceipt);exit;

      $oldamount=$this->input->post('amount2');
      $difference=$oldamount-$this->input->post('amount1');

if($bankreceipt->receiptorpay_on==2){

   $billid=$this->input->post('vouchernum');
   $b2bbill=$this->Admin_model->get_b2bbillfrombillno($billid);

   $outstandingamount=$b2bbill->billing_master_outstanding+$difference;

   $datamasterb2b=array('billing_master_outstanding'=>$outstandingamount);
   $this->db->where('billing_master_billno',$billid);
   $this->db->update('tbl_billing_master',$datamasterb2b);

   $data_update=array('amount'=>$this->input->post('amount1'));
   $this->db->where('order_master',$sid);
   $this->db->update('tbl_outstandingcushistory',$data_update);

   

}else if($bankreceipt->receiptorpay_on==3){

  
   
   $billid=$this->input->post('vouchernum');
   $b2cbill=$this->Admin_model->get_b2cbillfrombillno($billid);

   $outstandingamount=$b2cbill->sales_master_outstanding+$difference;

   $datamaster=array('sales_master_outstanding'=>$outstandingamount);
   $this->db->where('sales_master_bill_no',$billid);
   $this->db->update('tbl_sales_master',$datamaster);

   $data_update=array('amount'=>$this->input->post('amount1'));
   $this->db->where('order_master',$sid);
   $this->db->update('tbl_outstandingcushistory',$data_update);


}

redirect('bank_receiptslist');
}
$data['fyear']=$this->Admin_model->get_fyear();
$data['ledger']=$this->Admin_model->get_ledger();
$data['last_id']=$this->Admin_model->get_paymentlastid();
//print_r($data['last_id']);exit;
$data['bankaccount']=$this->Admin_model->get_bankaccount();
$data['bankpaylist']=$this->Admin_model->get_bankreceiptlist();
$data['customer']=$this->Admin_model->get_customer();
$data['supplier']=$this->Admin_model->get_supplier();
$this->load->view('superadmin/bank_receiptslist',$data);
}
public function delete_bank_receiptslist($id){
		$this->db->where('bp_id ',$id);
		$this->db->delete('tbl_bank_payments');
		redirect('bank_receiptslist');
   }

//==========Edited By Niby on 29,30-Sep-2020 Tuesday,Wednesday ========//
public function inventory_transfer(){
   $data['last_id']=$this->Admin_model->get_inventorylastid();
   $data['gfirmlist']=$this->Admin_model->get_godownfirmlist();
   $this->load->view('superadmin/inventory_transfer',$data);	
}
public function paymentreport(){

   if(isset($_POST['date_from']) && isset($_POST['date_to'])){

      $date_from = $_POST['date_from'];
      $date_to   = $_POST['date_to'];
   }
   else{
      $date_from = '';
      $date_to   = '';
   }

   $data['report']=$this->Admin_model->get_paymentfullreport($date_from, $date_to);
   $data['date_from']=$date_from;
   $data['date_to']=$date_to;
   $this->load->view('superadmin/paymentreport',$data);
}
public function receiptreport(){

   if(isset($_POST['date_from']) && isset($_POST['date_to'])){

      $date_from = $_POST['date_from'];
      $date_to   = $_POST['date_to'];
   }
   else{
      $date_from = '';
      $date_to   = '';
   }

   $data['report']=$this->Admin_model->get_receiptfullreport($date_from, $date_to);
   $data['date_from']=$date_from;
   $data['date_to']=$date_to;
   $this->load->view('superadmin/receiptreport',$data);
}
public function inventory_transferinsert(){

   if(isset($_POST['submit'])){
     

      $data_master=array('inventory_from'=>$this->input->post('from'),
      'inventory_to'=>$this->input->post('to'),
      'inventory_transfer_num'=>$this->input->post('transnum'),
      'inventory_date'=>$this->input->post('date'),
      'total_unitprice'=>$this->input->post('tunit'),
      'total_qtyamount'=>$this->input->post('tqamount')
      );

      if($this->db->insert('tbl_inventory_transfer_master',$data_master)){

         $lastinserid   =  $this->db->insert_id();
         $item          =  $this->input->post('itemid');
         $itembatchid   =  $this->input->post('batchid');
         $itemqty       =  $this->input->post('qty');
         $itemamount    =  $this->input->post('total');
         for($i=0;$i<count($item);$i++){

            $data_trns=array('inventory_trans_item_id'=>$item[$i],
            'inventory_trans_item_batch_id'=>$itembatchid[$i],
            'inventory_trans_qty'=>$itemqty[$i],
            'inventory_master_id'=>$lastinserid,
            'inventory_trans_totalamount'=>$itemamount[$i]);
            $this->db->insert('tbl_inventory_trans',$data_trns);

            //Update Inventory Stock

            $checkinventstock_for_item_from = $this->Admin_model->get_check_inventstocktransfer($this->input->post('from'),$item[$i],$itembatchid[$i]);
            $checkinventstock_for_item_to   = $this->Admin_model->get_check_inventstocktransfer($this->input->post('to'), $item[$i],$itembatchid[$i]);
            
            
            $itemcount  =  $itemqty[$i];
            
           // echo "<pre>";print_r($checkinventstock_for_item_from);exit;
           

            if($checkinventstock_for_item_from['inventory_stock_itemcount'] >= $itemcount){//Item exists... Stock transfer can be done

               //Transfer stock From

               $balancestock_count_from  = $checkinventstock_for_item_from['inventory_stock_itemcount'] - $itemcount; //old stock + current stock

               $datainventstockfrom = array(
                  'inventory_stock_master_id' => $lastinserid,
                  'inventory_stock_item_id' => $item[$i],
                  'inventory_location_id' => $this->input->post('from'),// tbl_godownfirm godownid
                  'inventory_stock_itemcount' => $balancestock_count_from,
                  );

               $this->db->where('inventory_stock_id',$checkinventstock_for_item_from['inventory_stock_id']);
               $this->db->where('inventory_stock_item_batch_id',$checkinventstock_for_item_from['inventory_stock_item_batch_id']);
               $this->db->update('tbl_inventory_stock',$datainventstockfrom);

               //Transfer stock To
               if(!empty($checkinventstock_for_item_to)){//Item exists... Stock transfer update

                  $total_stock_count_to   =  $checkinventstock_for_item_to['inventory_stock_itemcount'] + $itemcount;//old stock + current stock
                  $datainventstockfrom = array(
                     'inventory_stock_master_id' => $lastinserid,
                     'inventory_stock_item_id' => $item[$i],
                     'inventory_location_id' => $this->input->post('to'),// tbl_godownfirm godownid
                     'inventory_stock_itemcount' => $total_stock_count_to,
                     );
                     
                  $this->db->where('inventory_stock_id',$checkinventstock_for_item_to['inventory_stock_id']);
                  $this->db->where('inventory_stock_item_batch_id',$checkinventstock_for_item_to['inventory_stock_item_batch_id']);
                  $this->db->update('tbl_inventory_stock',$datainventstockfrom);

               }else{
                  $datainventstockto = array(
                     'inventory_stock_master_id' => $lastinserid,
                     'inventory_stock_item_id' => $item[$i],
                     'inventory_stock_item_batch_id' => $itembatchid[$i],
                     'inventory_location_id' => $this->input->post('to'),// tbl_godownfirm godownid
                     'inventory_stock_itemcount' => $itemcount,
                     );
                  $this->Admin_model->addrowtotable('tbl_inventory_stock',$datainventstockto);
               }
               

            }else{
              // echo "hhhhi";exit;
               
               //Error stock is not available for item
               
            }
            //Update Inventory Stock end
         }
         if($this->input->post('savetype')==1){
            $report['inventorymaster']=$this->Admin_model->get_inventorymasteroprt($lastinserid);
            $report['inventoryitem']=$this->Admin_model->get_inventorytransferitems($lastinserid);
            $report['address']=$this->Admin_model->get_mayoori_address();
            $this->load->view('superadmin/inventoryprint',$report);
         }
      }  
   }

}

public function print_inventory($id){
   $report['inventorymaster']=$this->Admin_model->get_inventorymasteroprt($id);
   $report['inventoryitem']=$this->Admin_model->get_inventorytransferitems($id);
   $report['address']=$this->Admin_model->get_mayoori_address();
   $this->load->view('superadmin/inventoryprint',$report);
}
public function inventorylist(){

   $data['last_id']=$this->Admin_model->get_inventorylastid();
   $data['gfirmlist']=$this->Admin_model->get_godownfirmlist();
   $data['inventory']=$this->Admin_model->get_inventorytransferlist();//echo "<pre>";print_r($data['inventory']);exit;

   $this->load->view('superadmin/inventorylist',$data);	
   
}
public function inventoryitemlist(){
   $id = $this->input->post('id');
   $data=$this->Admin_model->get_inventoryitemlist($id);
   print_r(json_encode($data));
}
public function get_inventorylistedit(){

   $id=$this->input->post('id');
   
   $data['last_id']=$this->Admin_model->get_inventorylastid();
   $data['gfirmlist']=$this->Admin_model->get_godownfirmlist();
   $data['inventory']=$this->Admin_model->get_inventorytransferdetails($id)[0];
   $data['inventory_items']=$this->Admin_model->get_inventoryitemlist($id);//echo "<pre>";print_r($data['inventory_items']);

   $this->load->view('superadmin/inventory_edit',$data);
   //print_r(json_encode($journallist));	
}

public function inventory_transferedit(){

   if(isset($_POST['submit'])){

      $inventory_id=$this->input->post('inventory_id');
      $data_master=array('inventory_from'=>$this->input->post('from'),
      'inventory_to'=>$this->input->post('to'),
      'inventory_transfer_num'=>$this->input->post('transnum'),
      'inventory_date'=>$this->input->post('date'),
      'total_unitprice'=>$this->input->post('tunit'),
      'total_qtyamount'=>$this->input->post('tqamount')
      );
      $this->db->where('inventory_id',$inventory_id);
      $this->db->update('tbl_inventory_transfer_master',$data_master);

      //$this->db->where('inventory_master_id',$inventory_id);
      //$this->db->delete('tbl_inventory_trans');

     
         $item          =$this->input->post('itemid');
         $itembatchid   =$this->input->post('itembatchid');
         $itemqty       =$this->input->post('qty');
         $itemamount    =$this->input->post('total');
         $itemqtyold    =$this->input->post('qtyold');
         $uneditable_items = [];

         

         for($i=0;$i<count($item);$i++){

            // $data_trns = array('inventory_trans_item_id'=>$item[$i],
            // 'inventory_trans_qty'=>$itemqty[$i],
            // 'inventory_master_id'=>$inventory_id,
            // 'inventory_trans_totalamount'=>$itemamount[$i]);
            // $this->db->insert('tbl_inventory_trans',$data_trns);

            //Update Inventory Stock

            $checkinventstock_for_item_from = $this->Admin_model->get_check_inventstocktransfer($this->input->post('from'), $item[$i], $itembatchid[$i]);
            $checkinventstock_for_item_to   = $this->Admin_model->get_check_inventstocktransfer($this->input->post('to'), $item[$i], $itembatchid[$i]);
            
            $itemcountnew  =  $itemqty[$i]; 
            $itemcountold  =  $itemqtyold[$i]; 
            
            
           //Reverse the previously transfered item
           //check for item stock availability
           //Update trans and stock
           
            //Update the stock of old items
            //check if this item is old or not
            if($itemqtyold[$i]!=0){//old item

               //return the previous transfer
               
               $this->db->set('inventory_stock_itemcount', '`inventory_stock_itemcount`+'.$itemcountold, FALSE);
               $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('from')]);
               $this->db->update('tbl_inventory_stock');

               $this->db->set('inventory_stock_itemcount', '`inventory_stock_itemcount`-'.$itemcountold, FALSE);
               $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('to')]);
               $this->db->update('tbl_inventory_stock');

               //check for stock availability with new qty
               $item_stock_from = $this->Admin_model->get_check_inventstocktransfer($this->input->post('from'), $item[$i], $itembatchid[$i]);
               $item_stock_to   = $this->Admin_model->get_check_inventstocktransfer($this->input->post('to'), $item[$i], $itembatchid[$i]);
               //echo $itemcountnew;echo $item_stock_from['inventory_stock_itemcount'];exit;  
               if($item_stock_from['inventory_stock_itemcount'] >= $itemcountnew){

                  //stock available item can be transfered

                   

                     //Transfer stock From
                     
                     $this->db->set('inventory_stock_itemcount', '`inventory_stock_itemcount`-'.$itemcountnew, FALSE);
                     $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('from')]); 
                     $this->db->update('tbl_inventory_stock');
                     //echo $this->db->last_query(); exit;


                     //Transfer stock To
                     if(!empty($item_stock_to)){//Item exists... Stock transfer update

                        $this->db->set('inventory_stock_itemcount', '`inventory_stock_itemcount`+'.$itemcountnew, FALSE);
                        $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('to')]); 
                        $this->db->update('tbl_inventory_stock');
                        //echo $this->db->last_query(); exit;

                     }else{//insert item

                        $datainventstockto = array(
                           'inventory_stock_master_id' => $inventory_id,
                           'inventory_stock_item_id' => $item[$i],
                           'inventory_stock_item_batch_id'=>$itembatchid[$i],
                           'inventory_location_id' => $this->input->post('to'),// tbl_godownfirm godownid
                           'inventory_stock_itemcount' => $itemcountnew,
                           );
                        $this->Admin_model->addrowtotable('tbl_inventory_stock',$datainventstockto);

                     }

                     // $data_trns = array('inventory_trans_qty'=>$itemqty[$i],
                     //                   'inventory_trans_totalamount'=>$itemamount[$i]);
                     // $this->db->where(['inventory_master_id'=>$inventory_id,'inventory_trans_item_id'=>$item[$i]]);
                     // $this->db->update('tbl_inventory_trans',$data_trns);
                     $this->db->where('inventory_master_id',$inventory_id);
                     $this->db->where('inventory_trans_item_batch_id',$itembatchid[$i]);
                     $this->db->where('inventory_trans_item_id',$item[$i]);
                     $this->db->delete('tbl_inventory_trans');

                     $data_trns=array('inventory_trans_item_id'=>$item[$i],
                     'inventory_trans_item_batch_id'=>$itembatchid[$i],
                     'inventory_trans_qty'=>$itemqty[$i],
                     'inventory_master_id'=>$inventory_id,
                     'inventory_trans_totalamount'=>$itemamount[$i]);
                     $this->db->insert('tbl_inventory_trans',$data_trns);

               }//check if this item end
               else{//Undo the reverse transfer it cannot be edited

                  $this->db->set('inventory_stock_itemcount', 'inventory_stock_itemcount-'.$itemqtyold[$i]);
                  $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('from')]);
                  $this->db->update('tbl_inventory_stock');

                  $this->db->set('inventory_stock_itemcount', 'inventory_stock_itemcount+'.$itemqtyold[$i]);
                  $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('to')]);
                  $this->db->update('tbl_inventory_stock');
 
                  //Save untransferred / uneditable
                  $uneditable_items[] = $item;
               }
            }
            else{  //else transfer as normal if new items added

                  $item_stock_from = $this->Admin_model->get_check_inventstocktransfer($this->input->post('from'), $item[$i], $itembatchid[$i]);
                  $item_stock_to   = $this->Admin_model->get_check_inventstocktransfer($this->input->post('to'), $item[$i], $itembatchid[$i]);

                  if($item_stock_from['inventory_stock_itemcount'] >= $itemcountnew){

                     //stock available item can be transfered

                        //Transfer stock From
                        
                        $this->db->set('inventory_stock_itemcount', '`inventory_stock_itemcount`-'.$itemcountnew, FALSE);
                        $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('from')]); 
                        $this->db->update('tbl_inventory_stock');
                        //echo $this->db->last_query(); exit;


                        //Transfer stock To
                        if(!empty($item_stock_to)){//Item exists... Stock transfer update

                           $this->db->set('inventory_stock_itemcount', '`inventory_stock_itemcount`+'.$itemcountnew, FALSE);
                           $this->db->where(['inventory_stock_master_id'=>$inventory_id,'inventory_stock_item_id'=>$item[$i],'inventory_stock_item_batch_id'=>$itembatchid[$i],'inventory_location_id'=>$this->input->post('to')]); 
                           $this->db->update('tbl_inventory_stock');
                           

                        }else{//insert item

                           $datainventstockto = array(
                              'inventory_stock_master_id' => $inventory_id,
                              'inventory_stock_item_id' => $item[$i],
                              'inventory_stock_item_batch_id'=>$itembatchid[$i],
                              'inventory_location_id' => $this->input->post('to'),// tbl_godownfirm godownid
                              'inventory_stock_itemcount' => $itemcountnew,
                              );
                           $this->Admin_model->addrowtotable('tbl_inventory_stock',$datainventstockto);

                        } 
                        // $data_trns = array('inventory_trans_qty'=>$itemqty[$i],
                        //                'inventory_trans_totalamount'=>$itemamount[$i]);
                        // $this->db->where(['inventory_master_id'=>$inventory_id,'inventory_trans_item_id'=>$item[$i]]);
                        // $this->db->update('tbl_inventory_trans',$data_trns);
                        $this->db->where('inventory_master_id',$inventory_id);
                        $this->db->where('inventory_trans_item_batch_id',$itembatchid[$i]);
                        $this->db->where('inventory_trans_item_id',$item[$i]);
                        $this->db->delete('tbl_inventory_trans');

                        $data_trns=array('inventory_trans_item_id'=>$item[$i],
                        'inventory_trans_item_batch_id'=>$itembatchid[$i],
                        'inventory_trans_qty'=>$itemqty[$i],
                        'inventory_master_id'=>$inventory_id,
                        'inventory_trans_totalamount'=>$itemamount[$i]);
                        $this->db->insert('tbl_inventory_trans',$data_trns);

                  }//check if this item end
                  else{//no stock available this item cannot be edited

                     //Save untransferred / uneditable
                     $uneditable_items[] = $item;

                  }

            }

            //Update Inventory Stock end

         }
         if($this->input->post('savetype')==1){
            $report['inventorymaster']=$this->Admin_model->get_inventorymasteroprt($inventory_id);
            $report['inventoryitem']=$this->Admin_model->get_inventorytransferitems($inventory_id);
            $report['address']=$this->Admin_model->get_mayoori_address();
            $this->load->view('superadmin/inventoryprint',$report);
         }
      
   }
}
public function inventory_delete($id){

   $this->db->where('inventory_id',$id);
   $this->db->delete('tbl_inventory_transfer_master');

   $this->db->where('inventory_master_id',$id);
   $this->db->delete('tbl_inventory_trans');

   redirect('inventorylist');
}

public function physicalstockfetchlist(){
   $id = $this->input->post('id');
   $data=$this->Admin_model->get_physicalstockitemfetch($id);
   print_r(json_encode($data));
}

public function physicalstock(){
   $data['last_id']=$this->Admin_model->get_physicalstcklastid();
   $data['firmgodown']=$this->Admin_model->get_godownfirmlist();
   $this->load->view('superadmin/physicalstock',$data);	
}

public function physicalstockinsert(){

   if(isset($_POST['submit'])){
      date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      $now = date('Y-m-d H:i');
      $data_master=array('psa_date'=>$this->input->post('date'),
      'referalnumber'=>$this->input->post('refno'),
      'total_qty'=>$this->input->post('granstotalqty'));
      if($this->db->insert('tbl_physicalstock_adjustment_master',$data_master)){
         $lastid=$this->db->insert_id();
         $itemid=$this->input->post('itemid');
         $batchid=$this->input->post('batchid');
         $itemlocation=$this->input->post('location');
         $itemqty=$this->input->post('qty');
         for($i=0;$i<count($itemid);$i++){
            $data_trans=array('psat_master_id'=>$lastid,
            'psat_item_id'=>$itemid[$i],
            'psat_item_batch_id'=>$batchid[$i],
            'psat_location'=>$itemlocation[$i],
            'psat_qty'=>$itemqty[$i]);
            $this->db->insert('tbl_physicalstock_adjusment_trans',$data_trans);


            $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$batchid[$i]);

            $godown_or_firm_id[$i]   = $this->Admin_model->get_godwn_firm_id($itemlocation[$i]);

            $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($itemlocation[$i], $itemid[$i], $batchid[$i]);
      

         
            $itemcount  =  $itemqty[$i];
            
          
      
            $datainventstock = array(
               'inventory_stock_master_id' => 0,
               'inventory_stock_item_id' => $itemid[$i],
               'inventory_stock_item_batch_id' => $batchid[$i],
               'inventory_location_id' => $godown_or_firm_id[$i],// tbl_godownfirm godownid
               );
      
            if(!empty($checkinventstock_for_item[$i])){
      
               $totalstock_count  = $checkinventstock_for_item[$i]->inventory_stock_itemcount + $itemcount; //old stock + current stock
      
               $datainventstock=array('inventory_stock_itemcount'=>$totalstock_count);
               $this->db->where('inventory_stock_id',$checkinventstock_for_item[$i]->inventory_stock_id);
               $this->db->update('tbl_inventory_stock',$datainventstock);
      
            }else{
               
               $datainventstock['inventory_stock_itemcount'] = $itemcount;
               $this->Admin_model->addrowtotable('tbl_inventory_stock',$datainventstock);
            }

           
      
            if($checkitem[$i]==null){
               $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
               'current_stock_batch_id'=>$batchid[$i],
               'cur_stock_item_count'=>$itemqty[$i],
               'added_date'=>$now,
               'stock_master_id'=>$lastid);
               $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
               'cur_stock_history_item_count'=>$itemqty[$i],
               'cur_stock_history_batchid'=>$batchid[$i],
               'cur_stock_history_added_date'=>$now,
               'cur_stock_history_stock_master_id'=>$lastid,
               'purpose'=>'Physical stock insert');
               $this->db->insert('tbl_current_stock',$dataCurrentstock);
               $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
            }else{
               $count[$i]=$checkitem[$i]->cur_stock_item_count;
               $Totalcount[$i]=$count[$i]+$itemqty[$i];
            
               $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
               'current_stock_batch_id'=>$batchid[$i],
               'cur_stock_item_count'=>$Totalcount[$i],
               'added_date'=>$now,
               'stock_master_id'=>$lastid);
               $dataCurrentstockhis=array('cur_stock_history_item_id'=>$itemid[$i],
               'cur_stock_history_batchid'=>$batchid[$i],
               'cur_stock_history_item_count'=>$itemqty[$i],
               'cur_stock_history_added_date'=>$now,
               'cur_stock_history_stock_master_id'=>$lastid,
            'purpose'=>'physical stock insert');
               $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis);
               $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
               $this->db->update('tbl_current_stock',$dataCurrentstock);
            
            }


         }
         if($this->input->post('savetype')==1){
            $report['physicalstockmaster']=$this->Admin_model->get_physicalstockmasteroprt($lastid);
            $report['physicalstocktrans']=$this->Admin_model->get_physicalstocktransferitems($lastid);
            $this->load->view('superadmin/physicalstockprint',$report);
         }
      }
   }

}

public function physicalstockprint($id){

   $report['physicalstockmaster']=$this->Admin_model->get_physicalstockmasteroprt($id);
   $report['physicalstocktrans']=$this->Admin_model->get_physicalstocktransferitems($id);
   $this->load->view('superadmin/physicalstockprint',$report);

}

public function physicalstockadlist(){

   $data['last_id']=$this->Admin_model->get_physicalstcklastid();
   $data['firmgodown']=$this->Admin_model->get_godownfirmlist();
   $data['psalist']=$this->Admin_model->get_physicalstockadjusmentlist();
   $this->load->view('superadmin/physicalstockadlist',$data);

}

public function get_physicalstockadlistedit(){

   $id=$this->input->post('id');

   $data['last_id']=$this->Admin_model->get_physicalstcklastid();
   $data['firmgodown']=$this->Admin_model->get_godownfirmlist();
   
   $data['physicalstockad']=$this->Admin_model->get_physicalstockaddetails($id)[0];
   $data['physicalstockadlist_items']=$this->Admin_model->get_physicalstockitemfetch($id);

  //echo "<pre>";print_r($data['physicalstockadlist_items']);exit;

   $this->load->view('superadmin/physicalstockad_edit',$data);
   //print_r(json_encode($journallist));	
}

public function physicalstockad_edit(){

   if(isset($_POST['submit'])){

      $physicalstockad_id=$this->input->post('physicalstockad_id');
      
      $data_master = array(
                        'psa_date'=>$this->input->post('date'),
                        'referalnumber'=>$this->input->post('refno'),
                        'total_qty'=>$this->input->post('granstotalqty')
                        );

      $this->db->where('psa_id',$physicalstockad_id);
      $this->db->update('tbl_physicalstock_adjustment_master',$data_master);

      $this->db->where('psat_master_id',$physicalstockad_id);
      $this->db->delete('tbl_physicalstock_adjusment_trans');

      $itemid=$this->input->post('itemid');
      $itemlocation=$this->input->post('location');
      $itemqty=$this->input->post('qty');
      
      for($i=0;$i<count($itemid);$i++){
         $data_trans=array('psat_master_id'=>$physicalstockad_id,
         'psat_item_id'=>$itemid[$i],
         'psat_location'=>$itemlocation[$i],
         'psat_qty'=>$itemqty[$i]);
         $this->db->insert('tbl_physicalstock_adjusment_trans',$data_trans);
      }

      if($this->input->post('savetype')==1){
         $report['physicalstockmaster']=$this->Admin_model->get_physicalstockmasteroprt($physicalstockad_id);
         $report['physicalstocktrans']=$this->Admin_model->get_physicalstocktransferitems($physicalstockad_id);
         $this->load->view('superadmin/physicalstockprint',$report);
      }
         
      
   }
}
public function physicalstockad_delete($id){

   $this->db->where('psa_id',$id);
   $this->db->delete('tbl_physicalstock_adjustment_master');

   $this->db->where('psat_master_id',$id);
   $this->db->delete('tbl_physicalstock_adjusment_trans');

   redirect('physicalstockadlist');
}
//==========Edited By Niby on 29,30-Sep-2020 Tuesday,Wednesday End========//

public function barcodeprint(){
$this->load->view('superadmin/barcodeprint');
}
public function regoffirm(){
if(isset($_POST['submit'])){
   $data_login=array('phoneno'=>$this->input->post('phnum'),
   'email'=>$this->input->post('email'),
   'uname'=>$this->input->post('registration'),
   'password'=>$this->input->post('password'),
   'u_type'=>4);
   $this->db->insert('login',$data_login);
   $lastid=$this->db->insert_id();
   
$data=array('name'=>$this->input->post('name'),
'phonenum'=>$this->input->post('phnum'),
'address'=>$this->input->post('address'),
'gst_num'=>$this->input->post('gst'),
'pan_num'=>$this->input->post('pan'),
'email'=>$this->input->post('email'),
'registration_num'=>$this->input->post('registration'),
'firmorgodown'=>1,
'login_id'=>$lastid);
$this->db->insert('tbl_godownfirm',$data);
redirect('regoffirm');
}
$data['last_id']=$this->Admin_model->get_firmlastid();
$this->load->view('superadmin/regoffirm',$data);
}
public function firmlist(){
//$id=$this->input->post('firm_id')
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('firm_id');
$data=array('name'=>$this->input->post('name1'),
'phonenum'=>$this->input->post('phnum1'),
'address'=>$this->input->post('address1'),
'gst_num'=>$this->input->post('gst1'),
'pan_num'=>$this->input->post('pan1'),
'email'=>$this->input->post('email1'),
'date'=>$this->input->post('date1'),
'registration_num'=>$this->input->post('registration1'),
'firmorgodown'=>1);
//$this->db->insert('tbl_godownfirm',$data);
//$this->db->where('godownid',$id);
//$this->db->update('tbl_godownfirm',$data);
//redirect('firmlist');
$this->db->where('godownid',$sid);
$this->db->update('tbl_godownfirm',$data);
redirect('firmlist');
}
$data['firmlist']=$this->Admin_model->get_firmlist();
$this->load->view('superadmin/firmlist',$data);
}
public function delete_firmlist($id){
$this->db->where('godownid ',$id);
$this->db->delete('tbl_godownfirm');
redirect('firmlist');
}
public function regofgoddown(){
if(isset($_POST['submit'])){
   $data_login=array('phoneno'=>$this->input->post('phnum'),
   'email'=>$this->input->post('email'),
   'uname'=>$this->input->post('registration'),
   'password'=>$this->input->post('password'),
   'u_type'=>5);
   $this->db->insert('login',$data_login);
   $lastid=$this->db->insert_id();
$data=array('name'=>$this->input->post('name'),
'phonenum'=>$this->input->post('phnum'),
'address'=>$this->input->post('address'),
'gst_num'=>$this->input->post('gst'),
'pan_num'=>$this->input->post('pan'),
'email'=>$this->input->post('email'),
'registration_num'=>$this->input->post('registration'),
'goddownum'=>$this->input->post('godownno'),
'firmorgodown'=>2,
'login_id'=> $lastid);
$this->db->insert('tbl_godownfirm',$data);
redirect('regofgoddown');
}
$data['last_id']=$this->Admin_model->get_godwonlastid();
$this->load->view('superadmin/regofgoddown',$data);
}
public function godownlist(){
if(isset($_POST['submit_edit'])){
$sid=$this->input->post('godn_id');
$data=array('name'=>$this->input->post('name1'),
'phonenum'=>$this->input->post('phnum1'),
'address'=>$this->input->post('address1'),
'gst_num'=>$this->input->post('gst1'),
'pan_num'=>$this->input->post('pan1'),
'email'=>$this->input->post('email1'),
'date'=>$this->input->post('date1'),
'registration_num'=>$this->input->post('registration1'),
'goddownum'=>$this->input->post('godownno1'),
'firmorgodown'=>2);
//$this->db->insert('tbl_godownfirm',$data);
//$this->db->where('godownid',$id);
//$this->db->update('tbl_godownfirm',$data);
//redirect('firmlist');
$this->db->where('godownid',$sid);
$this->db->update('tbl_godownfirm',$data);
redirect('godownlist');
}
$data['godownlist']=$this->Admin_model->get_godownlist();
$this->load->view('superadmin/godownlist',$data);
}
public function delete_godownlist($id){
$this->db->where('godownid ',$id);
$this->db->delete('tbl_godownfirm');
redirect('godownlist');
}
public function banreconcilation(){
$data['bank']=$this->Admin_model->get_bankaccount();
$data['bankrecon']=$this->Admin_model->get_bankreconcialisation();
//echo "<pre>";print_r($data['bankrecon']);exit;
$this->load->view('superadmin/banreconcilation',$data);
}
public function get_bankreconcialisationfetch(){
$bank=$this->input->post('bank');
$from=$this->input->post('from');
$to=$this->input->post('to');
$data=$this->Admin_model->get_bankreconcialisationfetch($bank,$from,$to);
print_r(json_encode($data));
}
public function branchstock(){
$data['itemlist']=$this->Admin_model->get_iteminstock();
$data['location']=$this->Admin_model->get_godownfirmlist();

$this->load->view('superadmin/branchstock',$data);	
}
public function searchlocationstock(){
   $id=$this->input->post('id');
   $data=$this->Admin_model->stockingodownorfirmlist($id);
   print_r(json_encode($data));
}
public function bankaccountnumberfetch(){
$baccount = $this->input->post('bankaccount');
$data=$this->Admin_model->get_bankbalance($baccount);
print_r(json_encode($data));
}
public function ledgerfetch(){
$ledger = $this->input->post('ledger');
$data=$this->Admin_model->get_ledgerfetch($ledger);
print_r(json_encode($data));
}
public function getbankreciptlist(){
   $id = $this->input->post('id');
   $data=$this->Admin_model->get_bankreciptlist($id);
   print_r(json_encode($data));
   }
public function getreferencenumberfetching(){
   $refnum = $this->input->post('refnum');
   $data=$this->Admin_model->getreferencefeting($refnum);
  if(!empty($data)){
     $data1=1;
  }else{
   $data1=0;
  }
  print_r(json_encode($data1));
}
public function addincentive(){
   if(isset($_POST['data'])){
   
      parse_str($_POST['data'], $myArray);

      $batch_id=$myArray['batch_id'];
      $checkbatch=$this->Admin_model->get_batchcheckincentive($batch_id);
      if($checkbatch==null){
         $item_id=$myArray['item_id'];
         $r1_type=isset($myArray['inc_bothperamount1']) ? $myArray['inc_bothperamount1']: '';
         $r2_type=isset($myArray['inc_bothperamount2']) ? $myArray['inc_bothperamount2']: '';
         $r3_type=isset($myArray['inc_bothperamount3']) ? $myArray['inc_bothperamount3']: '';
         $r4_type=isset($myArray['inc_bothperamount4']) ? $myArray['inc_bothperamount4']: '';
      
      $data=array('batch_id'=>$batch_id,
                  'item_id'=>$item_id,
                  'incentive_type'=>$myArray['inc_peramount'],
                  'in_peramount'=>$myArray['inc_ampercent'],
                  'range1'=>$myArray['range1'],
                  'r1_type'=>$r1_type,
                  'r1_amount'=>$myArray['inc_botheampercent1'],
                  'range2'=>$myArray['range2'],
                  'r2_type'=>$r2_type,
                  'r2_amount'=>$myArray['inc_botheampercent2'],
                  'range3'=>$myArray['range3'],
                  'r3_type'=>$r3_type,
                  'r3_amount'=>$myArray['inc_botheampercent3'],
                  'range4'=>$myArray['range4'],
                  'r4_type'=>$r4_type,
                  'r4_amount'=>$myArray['inc_botheampercent4'],
   
                     );
      
      $incentive=$this->Admin_model->add_incentive($data);
      }
      
      
   }
  
}
public function get_incentive_per_id()
{
   $batch_id=$this->input->post('batch_id');
   $item_id=$this->input->post('itemid');
   $incentive_id=$this->input->post('incentiveid');
    $data['incentive_batch']=$this->Admin_model->get_incentivedata_by_id($batch_id,$item_id,$incentive_id);
   echo  json_encode($data['incentive_batch']);
}
public function updateincentive()
{
   parse_str($_POST['data'], $myArray);
   $id=$myArray['id'];
   $batch_id=$myArray['batch_id'];
   $item_id=$myArray['item_id'];
   $r1_type=isset($myArray['inc_bothperamount1']) ? $myArray['inc_bothperamount1']: '';
   $r2_type=isset($myArray['inc_bothperamount2']) ? $myArray['inc_bothperamount2']: '';
   $r3_type=isset($myArray['inc_bothperamount3']) ? $myArray['inc_bothperamount3']: '';
   $r4_type=isset($myArray['inc_bothperamount4']) ? $myArray['inc_bothperamount4']: '';

  $data=array('batch_id'=>$batch_id,
            'item_id'=>$item_id,
            'incentive_type'=>$myArray['inc_peramount1'],
            'in_peramount'=>$myArray['inc_ampercent'],
            'range1'=>$myArray['range1'],
            'r1_type'=>$r1_type,
            'r1_amount'=>$myArray['inc_botheampercent1'],
            'range2'=>$myArray['range2'],
            'r2_type'=>$r2_type,
            'r2_amount'=>$myArray['inc_botheampercent2'],
            'range3'=>$myArray['range3'],
            'r3_type'=>$r3_type,
            'r3_amount'=>$myArray['inc_botheampercent3'],
            'range4'=>$myArray['range4'],
            'r4_type'=>$r4_type,
            'r4_amount'=>$myArray['inc_botheampercent4'],

               );
               $incentive=$this->Admin_model->update_incentive($id,$data);
}
public function b2cprofitlossreport()
{
  
  if(isset($_POST['filter'])){
     $from=$this->input->post('fdate');
     $to=$this->input->post('tdate');
     $cat=$this->input->post('category');
     $group=$this->input->post('category');
     $data["profit_lossDetails"] = $this->Admin_model->get_profit_loss_detailsfilter($from,$to,$cat,$group);
      $data['from']=$from;
      $data['to']=$to;
  echo "<pre>";print_r($data["profit_lossDetails"]);exit;
  }else{
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/b2cprofitlossreport";
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
  $data['group']=$this->Admin_model->get_itemgroup();
  $data['staff']=$this->Admin_model->get_staff1();
  $this->load->view('superadmin/b2cprofit_lossreport',$data);	
}
public function b2cprofitlossreportsearch(){
   $from=$this->input->post('fdate');
   $to=$this->input->post('tdate');
   $cat=$this->input->post('category');
   $group=$this->input->post('group');
 
   $staff=$this->input->post('salesman');
   $data["profit_lossDetails"] = $this->Admin_model->get_profit_loss_detailsfilter($from,$to,$cat,$group,$staff);
   //echo "<pre>";print_r($data["profit_lossDetails"]);exit;
   $this->load->view('superadmin/b2cprofit_lossreportsearch',$data);	
}
public function get_profitandlosstotal(){
   $ftom=$this->input->post('from');
   $to=$this->input->post('to');
   $tpucost=0;
   if($ftom==""){
      $tpucostnew=$this->Admin_model->get_profit_loss_purchasecost();
     
      foreach($tpucostnew as $tpucostnew){
         if($tpucostnew->t_pc==0.00){
            $tpucost+=$tpucostnew->sales_trans_qty*($tpucostnew->sales_trans_unit_price-$tpucostnew->e_pc);
      
         }else
         {
            $tpucost+=$tpucostnew->sales_trans_qty*($tpucostnew->sales_trans_unit_price-$tpucostnew->t_pc);
            
         }

      }
   }else{
      // $tpucost=$this->Admin_model->get_profit_loss_purchasecostfromto($ftom,$to);
   }
   
   print_r($tpucost); 
   
}
public function b2bprofitlossreport()
{
   if(isset($_POST['filter'])){
      $cat=$this->input->post('category');
      $group=$this->input->post('group');
      $staff=$this->input->post('salesman');
      $from=$this->input->post('from');
      $to=$this->input->post('to');
    
      $data['btobprofit_lossDetails']=$this->Admin_model->get_profit_loss_details_category($cat,$group,$staff,$from,$to);
   }else{
    
      $data['btobprofit_lossDetails']=$this->Admin_model->get_profit_loss_details_btob();
   }
   $data['pagename']  = 'b2b_profit_lossreport';
   $data['cat']=$cat;
   $data['from']=$from;
   $data['to']=$to;
   $data['category']=$this->Admin_model->get_itemcategory();
   $data['group']=$this->Admin_model->get_itemgroup();
   $data['staff']=$this->Admin_model->get_staff1();
   $this->load->view('superadmin/b2bprofit_lossreport',$data);
}
public function supplierwisesalesummery()
{
   $data['pagename']  = 'supplierwise_salesummery';
   $from='';
   $to='';
   $supplier='';
   if(isset($_POST['filter']))
   {

      
      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');
     
      
      if($this->input->post('supplier')=='All')
      {
         
         
         $supplier='';
      }
      else
      {
         $supplier=$this->input->post('supplier');
      }
      
     
   }
  
   $data['suppliers']=$this->Admin_model->get_supplier();
 
   $data['suplierwisesummery']=$this->Admin_model->get_supplierwisesummery($from,$to,$supplier);
   
   $this->load->view('superadmin/supplierwisesalesummery',$data);
}
public function itemwisepurchase(){
   if(isset($_POST['filter'])){
    $cat=$this->input->post('category');
    $groupwise=$this->input->post('group');
    $data['itemwisepurchase']=$this->Admin_model->get_itemwisepurchasereportcat($groupwise,$cat);
   }else{
      $cat='';
     
      $data['itemwisepurchase']=$this->Admin_model->get_itemwisepurchasereport();
   }
   $data['cat']=$cat;
   $data['groupwise']=$groupwise;
   $data['category']=$this->Admin_model->get_itemcategory();
   $data['group']=$this->Admin_model->get_itemgroup();
  // echo "<pre>";print_r($data['itemwisepurchase']);exit;
   $this->load->view('superadmin/itemwisepurchase',$data);
}
public function datewisepurchasereport()
{
   $data['pagename']  = 'datewise_purchase_report';
   $from='';
   $to='';
   $supplier='';
   if(isset($_POST['filter']))
   {

      
      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');
      $supplier='';
   }
   $data['datewisepurchase']=$this->Admin_model->get_supplierwisesummery($from,$to,$supplier);
   $this->load->view('superadmin/datewisepurchasereport',$data);
}
public function categorywisesalesreport()
{
   $data['pagename']  = 'catgeory_wise_sales_report';
   $links="";
   
   if(isset($_POST['filter']))
   {

      
      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');
      $itm_group=$this->input->post('itm_group');
      //echo $itm_group;exit;
      $itm_category=$this->input->post('itm_category');
      $itemname=$this->input->post('itemname');
     

      $data["categorywisesales"] = $this->Admin_model->get_categorywisesales($itemname,$from,$to,$itm_group,$itm_category);
      
   }else{
      $config = array();
      $config["base_url"] = base_url() . "Admin/categorywisesalesreport";
      $config["total_rows"] = $this->Admin_model->record_count_salestrans();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
   
     $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["categorywisesales"] = $this->Admin_model->
      get_categorywisesaleslist($config["per_page"], $page);
   }
  
  // echo "<pre>";print_r($data["categorywisesales"]);exit;
   $data["links"] = $this->pagination->create_links();
   $data['itemgroups']=$this->Admin_model->get_itemgroup();
   $data['category']=$this->Admin_model->get_itemcategory();
   $this->load->view('superadmin/categorywisesalesreport',$data);
}


public function categorywisesalesreportb2b()
{
   $data['pagename']  = 'catgeory_wise_sales_report_b2b';
   $links="";
   
   if(isset($_POST['filter']))
   {

      
      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');
      $itm_group=$this->input->post('itm_group');
      $itm_category=$this->input->post('itm_category');
      $itemname=$this->input->post('itemname');
     

      $data["categorywisesalesb2b"] = $this->Admin_model->get_categorywisesalesb2b($itemname,$from,$to,$itm_group,$itm_category);
      //echo "<pre>";print_r($categorywisesales);exit;
      
   }else{
      $config = array();
      $config["base_url"] = base_url() . "Admin/categorywisesalesreportb2b";
      $config["total_rows"] = $this->Admin_model->record_count_salestrans();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
   
     $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["categorywisesalesb2b"] = $this->Admin_model->
      get_categorywisesaleslistb2b($config["per_page"], $page);
   }
  
 
   $data["links"] = $this->pagination->create_links();
   $data['itemgroups']=$this->Admin_model->get_itemgroup();
   $data['category']=$this->Admin_model->get_itemcategory();
   $this->load->view('superadmin/categorywisesalesreportb2b',$data);
}


public function salesmanwisedetailedreport()
{
   $data['pagename']  = 'salesman_wise_detailed_report';
   $employee='';
   $from=date('Y-m-d');
   $to=date('Y-m-d');
   $cat='';
   
   if(isset($_POST['filter']))
   {

      
      $from=$this->input->post('fdate');
      $to=$this->input->post('tdate');
      $employee=$this->input->post('employees');
      $cat=$this->input->post('cat');
      
      
   }
     $data['employees']=$this->Admin_model->get_employees();
     $data['category']=$this->Admin_model->get_itemcategory();
     $data['from']=$from;
     $data['to']=$to;
     $data['empp']=$employee;
    // echo $data['employee'];exit;
     $data['cat']=$cat;
     $data['emplyeewisereport']=$this->Admin_model->get_employeewisereport($from,$to,$employee,$cat);
  
   $this->load->view('superadmin/salesmanwisedetailedreport',$data);
}
public function banklist()
{
   if(isset($_POST['submit']))
   {
      $data=array('bank_name'=>$this->input->post('bank'));
      $this->Admin_model->add_bank($data);
      redirect('banklist');
   }
   if(isset($_POST['submit_edit']))
   {
      $id=$this->input->post('bank_id');
      $data=array('bank_name'=>$this->input->post('bank'));
      $this->Admin_model->update_bank($data,$id);
      redirect('banklist');
   }
   $data['banklist']=$this->Admin_model->get_bank();
   //echo "<pre>";print_r($data['banklist']);exit;
   $this->load->view('superadmin/banklist',$data);









}
public function delete_bank($id)
{
   $this->db->where('bank_id',$id);
     $this->db->delete('tbl_bank');
     redirect('banklist');

}
public function statecode()
{
   if(isset($_POST['submit']))
   {
      $data=array('state_code'=>$this->input->post('state_code'),
                  'state_name'=>$this->input->post('state_name') );
      $this->Admin_model->add_state($data);
      redirect('statecode');
   }
   if(isset($_POST['submit_edit']))
   {
      $id=$this->input->post('state_id');
      $data=array('state_code'=>$this->input->post('state_code'),
                  'state_name'=>$this->input->post('state_name') );
      $this->Admin_model->update_state($data,$id);
      redirect('statecode');
   }
   $data['statecode']=$this->Admin_model->get_statecode();
   $this->load->view('superadmin/statecode',$data);
}
public function delete_state($id)
{
   $this->db->where('state_id',$id);
     $this->db->delete('tbl_state');
     redirect('statecode');

}
public function finance_creation()
{
   if(isset($_POST['submit'])){
         $data = array('finance'=>$this->input->post('name'),
         'fn_note'=>$this->input->post('notes'),
         'fn_account_group'=>$this->input->post('acc_group')
         );
         $this->db->insert('tbl_finance',$data);
         redirect('finance');
      }
      if(isset($_POST['submit_edit'])){
            $fid=$this->input->post('fn_id');
            $data = array('finance'=>$this->input->post('name'),
                           'fn_note'=>$this->input->post('notes'),
                           'fn_account_group'=>$this->input->post('acc_group')
                           );
            $this->db->where('id',$fid);
            $this->db->update('tbl_finance',$data);
            redirect('finance');
         }
    $data['finance']=$this->Admin_model->get_finances();
   $this->load->view('superadmin/finance',$data);
}
public function delete_finance($id)
{
   $this->db->where('id',$id);
     $this->db->delete('tbl_finance');
     redirect('finance');
}
public function getbath_incentives()
{
   $batchid=$this->input->post('batchid');
   $itemid=$this->input->post('itemid');
   $data=$this->Admin_model->get_incentivedata_check($batchid,$itemid);
   echo json_encode($data);

   
}
public function get_customerfetchdetails(){
   $id=$this->input->post('id');
   
   $data=$this->Admin_model->get_customerfulldetails($id);
   echo json_encode($data);
}
public function get_locationfetchdetails(){
   $id=$this->input->post('id');
   
   $data=$this->Admin_model->get_locationfulldetails($id);
   echo json_encode($data);
}
public function get_branchdetails(){
   $id=$this->input->post('id');

   $data=$this->Admin_model->get_branchlistaddress($id);
   echo json_encode($data);
}
public function oustandingpayable()
{
   $data['oustandingpayable']=$this->Admin_model->get_purchaselist();
  $this->load->view('superadmin/oustandingpayable',$data);
}
public function oustandingrecievable()
{
   //$data['oustandingrecievable']=$this->Admin_model->get_customeroutstanding();
   $data['oustandingrecievable']=$this->Admin_model->get_customer();
   $this->load->view('superadmin/oustandingrecievable',$data);
}
public function trailbalance()
{
   $cashflow=$this->Admin_model->get_accountgroup();
   $sumcashflow=array();
   foreach($cashflow as $cashflow){
       $accountgpid=$cashflow->ag_id;
      
      if(isset($_POST['submit'])){
         $from=$this->input->post('from');
         $to=$this->input->post('to');
         $yesterday=date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $from) ) ));
        
      }else{
         $from='';
         $to='';
         $yesterday=date('Y-m-d',strtotime("-1 days"));
      }
      $sum=$this->Admin_model->get_trailbalancedebit($accountgpid,$from,$to);
      $sum1=$this->Admin_model->get_trailbalancecredit($accountgpid,$from,$to);
      $journalsum=$this->Admin_model->get_journaltrialsumdebit($accountgpid,$from,$to);
      $journalsum1=$this->Admin_model->get_journaltrialsumcredit($accountgpid,$from,$to);
       $cashsum=$sum->mysum;
       $cashsum1=$sum1->mysum;
       $dataresult = array(

         'accountgroup' => $cashflow->ag_name,

         'amount' => $cashsum+$journalsum->Mysum,

         'amount1'=>$cashsum1+$cashsum1->Mysum,

         'flowtype'=>$sum->payment_type

        );
    
       array_push($sumcashflow,$dataresult);
   }
   $data['trailbalance']=$sumcashflow;
   $data['slesb2c']=$this->Admin_model->get_accountgroupb2csalestrial($from,$to);
   $data['slesb2b']=$this->Admin_model->get_accountgroupb2bsalestrial($from,$to);
   $data['saleorder']=$this->Admin_model->get_accountgroupsalesordertrial($from,$to);
   // $deliverychellan=$this->Admin_model->get_accountgroupdeliverychellan($from,$to);
   // $journal=$this->Admin_model->get_accountgroupjpournal($from,$to);
   $data['purchase']=$this->Admin_model->get_accountgrouppurchase($from,$to);
   $data['salaryledger']=$this->Admin_model->get_salaryledgersum($from,$to);
   $data['branchledger']=$this->Admin_model->get_branchledgersum($from,$to);
   $bankledgerpay=$this->Admin_model->get_bankpaymenttotalpay($from,$to);
   $bankledgerrec=$this->Admin_model->get_bankpaymenttotalrec($from,$to);
   $b2bledger=$this->Admin_model->get_bankledgerinb2b($from,$to);
   $b2cledger=$this->Admin_model->get_b2cledgerinb2c($from,$to);
   $salesorder=$this->Admin_model->get_salesorderintrial($from,$to);
   $bankledgeramount=$this->Admin_model->get_bankledgertrial($from,$to);
   $bankclosing=$this->Admin_model->get_bankclosingamount($yesterday);
   //echo $bankledgerrec->Mysum;exit;
  // echo "<pre>";print_r($data['slesb2b']);exit;
   $data['purchasereturn']=$this->Admin_model->get_purchasereturntrial($from,$to);
   $data['salesreturn']=$this->Admin_model->get_salesreturntrial($from,$to);

   $cashpayment=$this->Admin_model->get_daybookreportpayment($from,$to);
 
   $cashrecipt=$this->Admin_model->get_daybookreportreceipttrial($from,$to);
   
   $cashb2c=$this->Admin_model->getsalebookb2ctrial($from,$to);
   $cashb2b=$this->Admin_model->getsalebookb2btrial($from,$to);
   $cashsaleorder=$this->Admin_model->getsalesordertrial($from,$to);
   $cashsreturn=$this->Admin_model->get_sales_returntrial($from,$to);
   $cashclosing=$this->Admin_model->get_cashclosingamount($yesterday);
   $suplierid='';
  
 $supnotpaid=$this->Admin_model->getsupplierbalanceamounttrial();
 $suppaid=$this->Admin_model->get_supplierpaidamountNewtrial();
 $data['sundry']=($supnotpaid->MySum)-($suppaid->MySum);

 $data['sundrydebtors']=$this->Admin_model->get_sundrydeborstsum();

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
$journalcash=$this->Admin_model->get_journalincashamount($from,$to);
$journalbank=$this->Admin_model->get_journalinbankamount($from,$to);

   //echo $cashsreturn->Mysum;exit;
   $data['cashamount']=(($cashclosing->balance)+($journalcash->Mysum)+($cashrecipt->Mysum)+($cashb2c->Mysum)+($cashb2b->Mysum)+($cashsaleorder->Mysum))-(($cashpayment->Mysum)+$cashsreturn->Mysum);
  // echo $data['cashamount'];exit;
   $data['bankamount']=(($bankclosing->balance)+($journalbank->Mysum)+($bankledgerrec->Mysum)+($b2bledger->Mysum)+($b2cledger->Mysum)+($salesorder->Mysum)+($bankledgeramount->Mysum))-(($bankledgerpay->Mysum));
   $this->load->view('superadmin/trailbalance',$data);
}
public function delivery_chellan()
{
   //$data['delivery_chellan'] = $this->Admin_model->getalltabledelmaster();
   $employee=$this->Admin_model->get_staff1();
   $data['employee']=$this->Admin_model->get_staff1();
   $data['namelist']='<option value=""></option>';

   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/delivery_chellan";
   $config["total_rows"] = $this->Admin_model->record_count_delivery();
   $config["per_page"] = 10;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["delivery_chellan"] = $this->Admin_model->
   getalltabledelmaster($config["per_page"], $page);
   $data["links"] = $this->pagination->create_links();
   foreach($employee as $keyem){
      
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   $data['bilchel']=$this->Admin_model->get_automaticchellan();
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumberdeliverychellan();
   $billingtrans = $this->Admin_model->getalltable('tbl_deliverychellan_trans');
   foreach($billingtrans as $billingsingle){
   $data['billingtrans'][$billingsingle->deliverychellan_trans_billing_masterid][] = $billingsingle;
   }
   $items = $this->Admin_model->getalltable('tbl_item');
   foreach($items as $itemsingle){
   $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   $data['statecode']=$this->Admin_model->get_statecode();
   $data['branches']=$this->Admin_model->get_branches();
   $data['token']= $this->generatetokendc();
   $this->load->view('superadmin/delivery_chellan',$data);
}

public function deliverychellanadd()
{
   $this->sessionout();
   $token=$this->input->post('token');
   $checktoken=$this->Admin_model->get_checkdctoken($token);
   if($checktoken==null){
      date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      $now = date('Y-m-d H:i:s');
      $tablelogin = "login";
      $table ="tbl_deliverychellan_master";
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
      $itembatchid = $this->input->post('itembatchid');
      $unitprice=$this->input->post('unitprice');
   
   $isgst=$this->input->post('isigst');
      if($isgst=="")
      {
         $isgst=0;
      }
      else{
         $isgst=$this->input->post('isigst');
      }
      $bilchel=$this->Admin_model->get_automaticchellan();
      $last_bill_number=$this->Admin_model->get_lastbillnumberdeliverychellan();
      if($bilchel->mycount!=0){
        $debillnumber=$last_bill_number->deliverychellan_master_chellanno+1;
      }else{
         $debillnumber=1;
      }
      
      // date_default_timezone_set("Asia/Kolkata"); # add your city to set local time zone
      // $now = date('Y-m-d');
      $data = array(
         'deliverychellan_master_consignee_name'=> $this->input->post('consignee_name'),
         'deliverychellan_master_chellanno' =>$debillnumber,
         'deliverychellan_master_date'=>$now,
         'dc_master_customer_gstin'=> $this->input->post('customer_gstin'),
         'dc_master_transport_mode'=>$this->input->post('transport_mode'),
         'dc_master_transpor_purpose'=>$this->input->post('transport_purpose'),
         'deliverychellan_master_vehicleno'=> $this->input->post('vehicleno'),
         'deliverychellan_master_consignee_address'=> $this->input->post('consignee_address'),
         'deliverychellan_master_tot_taxable_amount'=> $this->input->post('totalTaxableAmount'),
         'deliverychellan_master_tot_gst_amount'=> 0,
         'deliverychellan_master_roundoff'=> $this->input->post('roundOfValuue'),
         'deliverychellan_master_grandtotal'=> $this->input->post('grandTotal'),
         'deliverychellan_master_employee_loginid' => $this->session->userdata('id'),
         'deliverychellan_master_state_code'=>$this->input->post('stcode'),
         'deliverychellan_master_note'=>$this->input->post('note'),
         'deliverychellan_master_is_igst'=>$isgst,
         'dc_master_despatch_date'=>date("Y-m-d", strtotime($this->input->post('despatch_date'))),
         'deliverychellan_gst_number'=>$this->input->post('gstnumber'),
         'token'=>$token
         );
         
         $lastid = $this->Admin_model->addrowtotable($table,$data);
         
         for($i=0;$i<$length;$i++){
   
            $datatrans = array(
                           'deliverychellan_trans_billing_masterid' => $lastid,
                           'deliverychellan_trans_item_code' => $itemcode[$i],
                           'deliverychellan_trans_qty' => $itemqnty[$i],
                           'deliverychellan_trans_taxable_value' => $itemtaxable[$i],
                           'deliverychellan_trans_hsn_code' => $itemhsncode[$i],
                           'deliverychellan_trans_item_code' => $itemcode[$i],
                           'deliverychellan_trans_gst_percentage' => $itemgstper[$i],
                           'deliverychellan_trans_gst_amount' => $itemgstamount[$i],
                           'deliverychellan_trans_total' => $itemtotalamount[$i],
                           'deliverychellan_item_id'=>$itemid[$i],
                           'deliverychellan_item_batch_id'=>$itembatchid[$i],
                           'deliverychellan_trans_branchprice'=>$unitprice[$i]
      
                           );
   
                           
                           $this->Admin_model->addrowtotable('tbl_deliverychellan_trans',$datatrans);
                           $deliverychellantransid[$i]=$this->db->insert_id();
                           $checkitem[$i]=$this->Admin_model->get_checkitem($itemid[$i],$itembatchid[$i]);
                   
               
                        $count[$i]=$checkitem[$i]->cur_stock_item_count;
                        $Totalcount[$i]=$count[$i]-$itemqnty[$i];
                     
                        $dataCurrentstock=array('cur_stock_item_id'=>$itemid[$i],
                                                 'current_stock_batch_id'=>$itembatchid[$i],
                                                'cur_stock_item_count'=>$Totalcount[$i],
                                                'added_date'=>$now,
                                                'stock_master_id'=>$deliverychellantransid[$i]);
               
                    
               
                        $this->db->where('cur_stock_id',$checkitem[$i]->cur_stock_id);
                        $this->db->update('tbl_current_stock',$dataCurrentstock);
               
                        $dataCurrentstockhis[$i]=array('cur_stock_history_item_id'=>$itemid[$i],
                        'cur_stock_history_batchid'=>$itembatchid[$i],
                        'cur_stock_history_item_count'=>$itemqnty[$i],
                        'cur_stock_history_added_date'=>$now,
                        'cur_stock_history_stock_master_id'=>$deliverychellantransid[$i],
                        'purpose'=>"deliverychellan add",
                        'ip'=>'192.168.0.0');
               
                       // echo "<pre>";print_r($dataCurrentstockhis[$i]);exit;
               
                     $this->db->insert('tbl_current_stock_history',$dataCurrentstockhis[$i]);
                     
                     
                           $checkinventstock_for_item[$i] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                         
                           $godownlist=$this->Admin_model->get_godownlistfetch();
                          
                           if(is_numeric($itemqnty[$i])){
                             
                         
                           if($checkinventstock_for_item[$i]->inventory_stock_itemcount!=0){
                           
                              for($j=0;$j<$itemqnty[$i];$j++){
         
                                 
         
                                 $gettrans[$i]=$this->Admin_model->get_deliverychellantransid($deliverychellantransid[$i]);
                                
                                 $checkinventstock_for_item2[$j] = $this->Admin_model->get_check_inventstockitem($this->session->userdata('id'), $itemid[$i],$itembatchid[$i]);
                                
                                // echo "<pre>";print_r( $checkinventstock_for_item2[$j]);exit;
                                 if($checkinventstock_for_item2[$j]->inventory_stock_itemcount!=0){
         
                                    $totalstock_count  = $checkinventstock_for_item2[$j]->inventory_stock_itemcount - 1; 
                                    if($gettrans[$i]->deliverchellan_branch==null){
                                       $barchstock[$j]=1;
                                    }else{
                                       $barchstock[$j]=$gettrans[$i]->deliverchellan_branch+1;
                                    }
         
                                    $data_branch[$j]=array('deliverchellan_branch'=>$barchstock[$j]);
                                    $this->db->where('deliverychellan_trans_id',$deliverychellantransid[$i]);
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
                                          $this->db->where('deliverychellan_trans_id',$deliverychellantransid[$i]);
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
         
                          
                           
                             
         
                                 $gettrans[$i]=$this->Admin_model->get_deliverychellantransid($deliverychellantransid[$i]);
                                 
                                 //  if($gettrans[$i]->sales_trans_godown==null){
                                 //       $barchstock2[$i]=1;
                                 //    }else{
                                 //       $barchstock2[$i]=$gettrans[$i]->sales_trans_godown+1;
                                 //    }
                                
                                 $data_branch2[$i]=array('deliverychellan_godown'=>$itemqnty[$i]);
                                 $this->db->where('deliverychellan_trans_id',$deliverychellantransid[$i]);
                                 $this->db->update('tbl_deliverychellan_trans',$data_branch2[$i]);
         
         
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
        
   
         if($this->input->post('savetype') == 2){
            redirect('delivery_chellan'); 
         }
         else if($this->input->post('savetype') == 1){
            $report['datamaster'] = $this->Admin_model->getalltablewhererowchellan($lastid);
            $report['datatrans'] = $this->Admin_model->getb2balltablewhereresultdel(array('deliverychellan_trans_billing_masterid'=>$lastid));
            $report['employee']=$this->Admin_model->get_b2bemployee($lastid);
            $report['address']=$this->Admin_model->get_mayoori_address();
            $this->load->view('superadmin/delivery_chellan_print',$report);
         }
      
   }
   
}
public function delivery_chellanprint($id){
   $report['datamaster'] = $this->Admin_model->getalltablewhererowchellan($id);
   $report['datatrans'] = $this->Admin_model->getb2balltablewhereresultdel(array('deliverychellan_trans_billing_masterid'=>$id));
   //echo "<pre>";print_r($report['datatrans']);exit;
   $report['employee']=$this->Admin_model->get_b2bemployee($id);
   $report['address']=$this->Admin_model->get_mayoori_address();
   $this->load->view('superadmin/delivery_chellan_print',$report);
}
public function get_salesmasterbecfetching(){
   $id=$this->input->post('id');
   $data['bilno12']=$this->Admin_model->get_automaticbill();
   $data['employee1']=$this->Admin_model->get_staff1();
   $employee=$this->Admin_model->get_staff1();
   $data['namelist']='<option value="0"></option>';
   foreach($employee as $keyem){
      //Keep following code in single line to avoid javascript conflicts...- Niby
      //Strings that span multiple lines (Template literals) are enclosed with backticks (`).
      $data['namelist'].='<option value="'.$keyem->stf_id.'">'.$keyem->stf_name.'</option>';
   }
   // print_r($data['namelist']) ;
   //exit;
   $data['last_bill_number']=$this->Admin_model->get_lastbillnumber();
   $data['last_sales']=$this->Admin_model->get_lastaddedsales();
   $salestrans = $this->Admin_model->getalltable('tbl_sales_trans');
   foreach($salestrans as $salesingle){
   $data['salestrans'][$salesingle->sales_trans_master_id][] = $salesingle;
   }
   $items = $this->Admin_model->getalltable('tbl_item');
   foreach($items as $itemsingle){
   $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;
   }
   $data['bank']=$this->Admin_model->get_bank_details();
   $data['finance']=$this->Admin_model->get_finance();
   
   $data['b2c']=$this->Admin_model->get_salesb2cfetching($id);
   $firm=$this->session->userdata('id');
   $godown=$this->Admin_model->get_godownloaction($firm);
   $loc=$godown->godownid;
   $data['b2ctrans']=$this->Admin_model->get_salesb2ctransfetching($id,$loc);
  //echo "<pre>";print_r($data['b2ctrans']);exit;
   $this->load->view('superadmin/salesb2b_edit',$data);
}
public function fullstockrepoprt(){
   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/fullstockrepoprt";
   $config["total_rows"] = $this->Admin_model->get_currentstockcount();
   $config["per_page"] = 10;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["stockreport"] = $this->Admin_model->
   get_fullstock_report($config["per_page"], $page);
   $data["stockreport1"] = $this->Admin_model->get_fullstock_report1();
   //echo "<pre>";print_r($data["stockreport"]);exit;
   $data["links"] = $this->pagination->create_links();
   //$data['stockreport']=$this->Admin_model->get_fullstock_report();
   $this->load->view('superadmin/fullstockreport',$data);
}
public function totalstocksumreport(){
   $stockreport=$this->Admin_model->get_fullstock_report1();
   $totalsum=0;
							
   foreach($stockreport as $key){

$batchid1=$key->batch_id;
$purchasecount=$this->Admin_model->get_totalpurchasecount($batchid1);
$physicalcount=$this->Admin_model->get_totalphysicalstockcount($batchid1);
$purchasereturncount=$this->Admin_model->get_totalpurchasereturncount($batchid1);
$sale=$this->Admin_model->get_totalsalecount($batchid1);
$salereturn=$this->Admin_model->get_totalsalereturncount($batchid1);
$closingstock=((($purchasecount->mysum+$physicalcount->mysum)-$purchasereturncount->mysum)-$sale->mysum)+$salereturn->mysum;
if($key->t_pc==0.00){
   $totalsum+=$closingstock*$key->e_pc;
  }else{
     $totalsum+=$closingstock*$key->t_pc;
     }
}
print_r($totalsum);

//print_r(totalsum)
}

public function totalstockclosingreport(){
   $stockreport=$this->Admin_model->get_fullstock_report1();
   $closingstock=0;
							
   foreach($stockreport as $key){

$batchid1=$key->batch_id;
$purchasecount=$this->Admin_model->get_totalpurchasecount($batchid1);
$physicalcount=$this->Admin_model->get_totalphysicalstockcount($batchid1);
$purchasereturncount=$this->Admin_model->get_totalpurchasereturncount($batchid1);
$sale=$this->Admin_model->get_totalsalecount($batchid1);
$salereturn=$this->Admin_model->get_totalsalereturncount($batchid1);
$closingstock+=((($purchasecount->mysum+$physicalcount->mysum)-$purchasereturncount->mysum)-$sale->mysum)+$salereturn->mysum;

}
print_r($closingstock);

}
public function pendingsaleordersum(){
   $from=$this->input->post('from');
   $to=$this->input->post('to');
   if($from=='' && $to==''){
      $pending=$this->Admin_model->get_pendingsaleorder();
   }else{
      $pending=$this->Admin_model->get_salesorderfromto($from,$to);
   }
 
   $totalsum=0;
   foreach($pending as $pending){
      $totalsum+=$pending->sales_order_trans_total;
   }
   print_r($totalsum);
}
public function convertedsalesum(){
   $converted=$this->Admin_model->get_convertedsaleorder();
   $totalsum=0;
   foreach($converted as $converted){
      $totalsum+=$converted->sales_order_trans_total;
   }
   print_r($totalsum);
}
public function readexcel($id){
   $xlfile=$this->Admin_model->get_all_item_by_id($id);
	$filePath  = './uploads/excel/'.$xlfile->file;
   //echo $filePath;exit;
	$file = fopen($filePath, "r"); 
	$resultArr = [];
	while(!feof($file))
  {
	$resultArr[] = fgetcsv($file);
  }
   fclose($file);
   $newArr = [];
   $count = 0;
   $idArr = [];
   foreach($resultArr as $arr){
     // echo "<pre>";print_r($arr);exit;  
	if($arr != null){
     // echo "<pre>";print_r($arr);
		if($count != 0){
      // echo $count;exit;
		   for($i = 0;$i<count($resultArr[0]);$i++){
           
				$newArr[$count][$resultArr[0][$i]]=$arr[$i];
           

		   }

      
         if($xlfile->table_name=='tbl_sales_master'){
           // echo $newArr[$count]['sales_master_id'];exit;
            $this->db->where('sales_master_id',$newArr[$count]['sales_master_id']);
            $data_array_update[$i]=array('sales_master_bill_no'=>$newArr[$count]['sales_master_bill_no'],
            'sales_master_date'=>$newArr[$count]['sales_master_date'],
            'sales_master_customer_name'=>$newArr[$count]['sales_master_customer_name'],
            'sales_master_delivery_date'=>$newArr[$count]['sales_master_delivery_date'],
            'sales_master_phone_no'=>$newArr[$count]['sales_master_phone_no'],
            'sales_master_veh_no'=>$newArr[$count]['sales_master_veh_no'],
            'sales_master_customer_address'=>$newArr[$count]['sales_master_customer_address'],
            'sales_master_delivery_address'=>$newArr[$count]['sales_master_delivery_address'],
            'sales_master_login_id'=>$newArr[$count]['sales_master_login_id'],
            'sales_master_customer_login_id'=>$newArr[$count]['sales_master_customer_login_id'],
            'sales_master_tot_taxable_amount'=>$newArr[$count]['sales_master_tot_taxable_amount'],
            'sales_master_tot_gst_amount'=>$newArr[$count]['sales_master_tot_gst_amount'],
            'sales_master_delivery_charge'=>$newArr[$count]['sales_master_delivery_charge'],
            'sales_master_total_cess'=>$newArr[$count]['sales_master_total_cess'],
            'sales_master_discount'=>$newArr[$count]['sales_master_discount'],
            'sales_master_round_off'=>$newArr[$count]['sales_master_round_off'],
            'sales_master_grand_total'=>$newArr[$count]['sales_master_grand_total'],
            'sales_master_note'=>$newArr[$count]['sales_master_note'],
            'sales_master_outstanding'=>$newArr[$count]['sales_master_outstanding'],
            'sales_master_amount_paid'=>$newArr[$count]['sales_master_amount_paid'],
            'sales_master_payment_mode'=>$newArr[$count]['sales_master_payment_mode'],
            'sales_master_is_igst'=>$newArr[$count]['sales_master_is_igst'],
            'sales_master_cardnum'=>$newArr[$count]['sales_master_cardnum'],
            'sales_master_cheque_no'=>$newArr[$count]['sales_master_cheque_no'],
            'sales_master_banktransaction_id'=>$newArr[$count]['sales_master_banktransaction_id'],
            'sales_master_bankamount'=>$newArr[$count]['sales_master_bankamount'],
            'sales_master_bank'=>$newArr[$count]['sales_master_bank'],
            'sales_master_financetype'=>$newArr[$count]['sales_master_financetype'],
            'sales_master_trans_mode'=>$newArr[$count]['sales_master_trans_mode'],
            'sales_master_finance_id'=>$newArr[$count]['sales_master_finance_id'],
            'sales_added_date'=>$newArr[$count]['sales_added_date'],
            'sales_master_edited_date'=>$newArr[$count]['sales_master_edited_date'],
            'sales_added_system'=>$newArr[$count]['sales_added_system'],
            'sales_edited_system'=>$newArr[$count]['sales_edited_system']);
           
            $this->db->update('tbl_sales_master',$data_array_update[$i]);
         }else if($xlfile->table_name=='tbl_sales_trans'){
            
            if($newArr[$count]['deleted_status']==0){
               
            
               $data_array_updatetrans[$i]=array(
               'sales_trans_itm_code'=>$newArr[$count]['sales_trans_itm_code'],
               'sales_trans_qty'=>$newArr[$count]['sales_trans_qty'],
               'sales_trans_taxable_value'=>$newArr[$count]['sales_trans_taxable_value'],
               'sales_trans_hsn_code'=>$newArr[$count]['sales_trans_hsn_code'],
               'sales_trans_gst_percentage'=>$newArr[$count]['sales_trans_gst_percentage'],
               'sales_trans_gst_amount'=>$newArr[$count]['sales_trans_gst_amount'],
               'sales_trans_cess'=>$newArr[$count]['sales_trans_cess'],
               'sales_trans_total'=>$newArr[$count]['sales_trans_total'],
               'sales_trans_item_id'=>$newArr[$count]['sales_trans_item_id'],
               'sales_trans_item_batch_id'=>$newArr[$count]['sales_trans_item_batch_id'],
               'sales_employee_name'=>$newArr[$count]['sales_employee_name'],
               'sales_trans_unit_price'=>$newArr[$count]['sales_trans_unit_price'],
               'sales_trans_incentive_id'=>$newArr[$count]['sales_trans_incentive_id'],
               'sales_trans_incentive_amount'=>$newArr[$count]['sales_trans_incentive_amount'],
               'sale_trans_mrp'=>$newArr[$count]['sale_trans_mrp'],
               'sales_trans_branch'=>$newArr[$count]['sales_trans_branch'],
               'sales_trans_godown'=>$newArr[$count]['sales_trans_godown']);
               $this->db->where('sales_trans_id',$newArr[$count]['sales_trans_id']);
               $this->db->update('tbl_sales_trans',$data_array_updatetrans[$i]);
             
            }else if($newArr[$count]['deleted_status']==2){
               $data_array_insert[$i]=array('sales_trans_master_id'=>$newArr[$count]['sales_trans_master_id'],
               'sales_trans_itm_code'=>$newArr[$count]['sales_trans_itm_code'],
               'sales_trans_qty'=>$newArr[$count]['sales_trans_qty'],
               'sales_trans_taxable_value'=>$newArr[$count]['sales_trans_taxable_value'],
               'sales_trans_hsn_code'=>$newArr[$count]['sales_trans_hsn_code'],
               'sales_trans_gst_percentage'=>$newArr[$count]['sales_trans_gst_percentage'],
               'sales_trans_gst_amount'=>$newArr[$count]['sales_trans_gst_amount'],
               'sales_trans_cess'=>$newArr[$count]['sales_trans_cess'],
               'sales_trans_total'=>$newArr[$count]['sales_trans_total'],
               'sales_trans_item_id'=>$newArr[$count]['sales_trans_item_id'],
               'sales_trans_item_batch_id'=>$newArr[$count]['sales_trans_item_batch_id'],
               'sales_employee_name'=>$newArr[$count]['sales_employee_name'],
               'sales_trans_unit_price'=>$newArr[$count]['sales_trans_unit_price'],
               'sales_trans_incentive_id'=>$newArr[$count]['sales_trans_incentive_id'],
               'sales_trans_incentive_amount'=>$newArr[$count]['sales_trans_incentive_amount'],
               'sale_trans_mrp'=>$newArr[$count]['sale_trans_mrp'],
               'deleted_status'=>$newArr[$count]['deleted_status'],
               'sales_trans_branch'=>$newArr[$count]['sales_trans_branch'],
               'sales_trans_godown'=>$newArr[$count]['sales_trans_godown']
               );
               $this->db->insert('tbl_sales_trans',$data_array_insert[$i]);
            }else if($newArr[$count]['deleted_status']==1){
               $this->db->where('sales_trans_id',$newArr[$count]['sales_trans_id']);
             
               $this->db->delete('tbl_sales_trans');
            }
         
            

         
         }
        
        
        
       
		}
     
	  $count++;
	}
 
   }
   
  redirect('all_item');
  
}


public function all_item(){
   $data['pagename']  = 'all_item';
   
	$data['msg']=3;
   if(isset($_POST['submit'])){
$config['upload_path']='./uploads/excel/';
$config['allowed_types']='xls|xlsx|xlsm|xlsb|csv';
$config['max_size'] = 20000;     
$config['max_width'] = 15000;     
$config['max_height'] = 15000;  
$this->load->library('upload',$config);
$this->upload->initialize($config);
if($this->upload->do_upload('userfile')){
	$data['msg']=0;
$data=array('file'=>$this -> upload -> data('file_name'),
'table_name'=>$this->input->post('tablename'));
$this->db->insert('tbl_all_item',$data);
//$this->session->set_flashdata( 'error_msg', 'Upload Succeessfully');
}
else
{
	$data['msg']=1;
$this->session->set_flashdata( 'error_msg', $this->upload->display_errors() );
}
   }
   $data['item']=$this->Admin_model->get_all_item();
   
      $this->load->view('superadmin/all_item',$data);

}

public function delete_item($id){

   $data=$this->Admin_model->get_all_item_by_id($id);
   $fl=$data->file;

   unlink('./uploads/excel/'.$fl);
  $this->db->where('id',$id);
$this->db->delete('tbl_all_item');

redirect('all_item');
}
public function downloadsale(){
   $this->load->view('superadmin/downloadcsv');
}
public function clearsale($id){
   $xlfile=$this->Admin_model->get_all_item_by_id($id);

   if($xlfile->table_name=='tbl_sales_master'){
      
      $this->db->truncate('tbl_sales_master');
      // $this->db->where('id',$id);
      // $this->db->delete('tbl_all_item');
   }else{ 
      $this->db->truncate('tbl_sales_trans');
      // $this->db->where('id',$id);
      // $this->db->delete('tbl_all_item');
   }
   redirect('all_item');

}
public function importsale($id){
   $xlfile=$this->Admin_model->get_all_item_by_id($id);
	$filePath  = './uploads/excel/'.$xlfile->file;
   
	$file = fopen($filePath, "r"); 
	$resultArr = [];
	while(!feof($file))
  {
	$resultArr[] = fgetcsv($file);
  }
   fclose($file);
   $newArr = [];
   $count = 0;
   foreach($resultArr as $arr){	    
	if($arr != null){
		if($count != 0){
		   for($i = 0;$i<count($resultArr[0]);$i++){
				$newArr[$count][$resultArr[0][$i]]=$arr[$i];
          
           

		   }
         if($xlfile->table_name=='tbl_sales_master'){
          
            $data_array_update=array('sales_master_bill_no'=>$newArr[$count]['sales_master_bill_no'],
            'sales_master_date'=>$newArr[$count]['sales_master_date'],
            'sales_master_customer_name'=>$newArr[$count]['sales_master_customer_name'],
            'sales_master_delivery_date'=>$newArr[$count]['sales_master_delivery_date'],
            'sales_master_phone_no'=>$newArr[$count]['sales_master_phone_no'],
            'sales_master_veh_no'=>$newArr[$count]['sales_master_veh_no'],
            'sales_master_customer_address'=>$newArr[$count]['sales_master_customer_address'],
            'sales_master_delivery_address'=>$newArr[$count]['sales_master_delivery_address'],
            'sales_master_login_id'=>$newArr[$count]['sales_master_login_id'],
            'sales_master_customer_login_id'=>$newArr[$count]['sales_master_customer_login_id'],
            'sales_master_tot_taxable_amount'=>$newArr[$count]['sales_master_tot_taxable_amount'],
            'sales_master_tot_gst_amount'=>$newArr[$count]['sales_master_tot_gst_amount'],
            'sales_master_delivery_charge'=>$newArr[$count]['sales_master_delivery_charge'],
            'sales_master_total_cess'=>$newArr[$count]['sales_master_total_cess'],
            'sales_master_discount'=>$newArr[$count]['sales_master_discount'],
            'sales_master_round_off'=>$newArr[$count]['sales_master_round_off'],
            'sales_master_grand_total'=>$newArr[$count]['sales_master_grand_total'],
            'sales_master_note'=>$newArr[$count]['sales_master_note'],
            'sales_master_outstanding'=>$newArr[$count]['sales_master_outstanding'],
            'sales_master_amount_paid'=>$newArr[$count]['sales_master_amount_paid'],
            'sales_master_payment_mode'=>$newArr[$count]['sales_master_payment_mode'],
            'sales_master_is_igst'=>$newArr[$count]['sales_master_is_igst'],
            'sales_master_cardnum'=>$newArr[$count]['sales_master_cardnum'],
            'sales_master_cheque_no'=>$newArr[$count]['sales_master_cheque_no'],
            'sales_master_banktransaction_id'=>$newArr[$count]['sales_master_banktransaction_id'],
            'sales_master_bankamount'=>$newArr[$count]['sales_master_bankamount'],
            'sales_master_bank'=>$newArr[$count]['sales_master_bank'],
            'sales_master_financetype'=>$newArr[$count]['sales_master_financetype'],
            'sales_master_trans_mode'=>$newArr[$count]['sales_master_trans_mode'],
            'sales_master_finance_id'=>$newArr[$count]['sales_master_finance_id'],
            'sales_added_date'=>$newArr[$count]['sales_added_date'],
            'sales_master_edited_date'=>$newArr[$count]['sales_master_edited_date'],
            'sales_added_system'=>$newArr[$count]['sales_added_system'],
            'sales_edited_system'=>$newArr[$count]['sales_edited_system']);
            $this->db->insert('tbl_sales_master',$data_array_update);
         }else if($xlfile->table_name=='tbl_sales_trans'){
            $this->db->where('sales_trans_id',$newArr[$count]['sales_trans_id']);
            $data_array_updatetrans=array('sales_trans_master_id'=>$newArr[$count]['sales_trans_master_id'],
            'sales_trans_itm_code'=>$newArr[$count]['sales_trans_itm_code'],
            'sales_trans_qty'=>$newArr[$count]['sales_trans_qty'],
            'sales_trans_taxable_value'=>$newArr[$count]['sales_trans_taxable_value'],
            'sales_trans_hsn_code'=>$newArr[$count]['sales_trans_hsn_code'],
            'sales_trans_gst_percentage'=>$newArr[$count]['sales_trans_gst_percentage'],
            'sales_trans_gst_amount'=>$newArr[$count]['sales_trans_gst_amount'],
            'sales_trans_cess'=>$newArr[$count]['sales_trans_cess'],
            'sales_trans_total'=>$newArr[$count]['sales_trans_total'],
            'sales_trans_item_id'=>$newArr[$count]['sales_trans_item_id'],
            'sales_trans_item_batch_id'=>$newArr[$count]['sales_trans_item_batch_id'],
            'sales_employee_name'=>$newArr[$count]['sales_employee_name'],
            'sales_trans_unit_price'=>$newArr[$count]['sales_trans_unit_price'],
            'sales_trans_incentive_id'=>$newArr[$count]['sales_trans_incentive_id'],
            'sales_trans_incentive_amount'=>$newArr[$count]['sales_trans_incentive_amount'],
            'sale_trans_mrp'=>$newArr[$count]['sale_trans_mrp']
            );
            $this->db->insert('tbl_sales_trans',$data_array_updatetrans);

         
         }
        
        
        
       
		}
     
	  $count++;
	}
 
   }
   
  redirect('all_item');
}
public function itemwisestock(){
   if(isset($_POST['submit'])){
      $id=$this->input->post('typeoffilter');
      $name=$this->input->post('selectfilter');
      if($id==1){
         $name1=$this->input->post('itemname');
         $data["stockreport"] = $this->Admin_model->get_groupwisestockreportitem($name1);
        
         $data['id']=$id;
         $data['name']='';
      $this->load->view('superadmin/itemwisestock',$data);
      }else if($id==2){
         
         $data["stockreport"] = $this->Admin_model->get_supplierwisestockreport($name);
         $data['supplier']=$this->Admin_model->get_supplier();
         $data['id']=$id;
         $data['name']=$name;
         $this->load->view('superadmin/itemwisestock',$data);
      }else if($id==3){
         $data["stockreport"] = $this->Admin_model->get_categorystockreport($name);
         $data['category']=$this->Admin_model->get_itemcategory();
         $data['id']=$id;
         $data['name']=$name;
         $this->load->view('superadmin/itemwisestock',$data);
      }else if($id==4){
         $data["stockreport"] = $this->Admin_model->get_groupwisestockreport($name);
         $data['group']=$this->Admin_model->get_itemgroup();
         $data['id']=$id;
         $data['name']=$name;
         $this->load->view('superadmin/itemwisestock',$data);
      } else{
         $from=$this->input->post('from');
         $to=$this->input->post('to');
         $purchase = $this->Admin_model->get_currentstockreportaging($from,$to);
         $purstock=array();
         foreach($purchase as $purchase){
            $batchid=$purchase->purchase_item_batch_id;
            $puchasecount=$this->Admin_model->get_purchasecount($from,$to,$batchid);
            $curstock=$puchasecount->MySum-$purchase->cur_stock_item_count;
            $dataresult = array(

               'itrans' => $purchase->purchase_trans_id,

               'itm_name' => $purchase->itm_name,
  
               'batchcode' => $purchase->batchcode,
  
               'cur_stock_item_count' => $curstock,
  
               't_pc'=> $purchase->t_pc,
  
               'e_pc'=>$purchase->e_pc );
  
             
  
             array_push($purstock,$dataresult);


          
  
          }
          $data["stockreport"] =$purstock;
          $data['id']=$id;
          $data['name']=$name;
          $this->load->view('superadmin/agingstock',$data);
        
         }

      
   
   }else{
      $links="";
      $config = array();
      $config["base_url"] = base_url() . "Admin/itemwisestock";
      $config["total_rows"] = $this->Admin_model->getbatchcode();
      $config["per_page"] = 50;
      $config["uri_segment"] = 3;
   
     $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["stockreport"] = $this->Admin_model->
      get_currentstockreportitemwise($config["per_page"], $page);
      
      
      $data["links"] = $this->pagination->create_links();
      $data['id']=$id;
      $data['name']=$name;
      $this->load->view('superadmin/itemwisestock',$data);
   }
 
  
  
 }
 public function aginingstock(){
    $from=$this->input->post('from');
    $to=$this->input->post('to');

   $links="";
   $config = array();
   $config["base_url"] = base_url() . "Admin/aginingstock";
   $config["total_rows"] = $this->Admin_model->getbatchcode();
   $config["per_page"] = 50;
   $config["uri_segment"] = 3;

  $this->pagination->initialize($config);

   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   $data["agingstock"] = $this->Admin_model->
   get_currentstockreportaging($config["per_page"],$page,$from,$to);
  
   $data["links"] = $this->pagination->create_links();
   $this->load->view('superadmin/agingstock',$data);
 }

 public function stockdownload(){
   $usersData = $this->Admin_model->getstockreportdownload();
  // echo "<pre>";print_r($usersData);exit;
   
     $attObj=array();
     foreach($usersData as $single){
     
       
       if($single['t_pc']==0.00){
        $price=$single['e_pc'];
       }else{
        $price=$single['t_pc'];
        }
       $data = array(
           'Itemname' => $single['itm_name'],
           'itemcode' =>$single['itm_code'],
           'Batchid' =>$single['batchcode'],
           'stock'=>$single['cur_stock_item_count'],
           'price'=>$price,
           'closing stock'=>$price*$single['cur_stock_item_count']
           );
   
          //echo "<pre>";print_r($data);
       
         array_push($attObj,$data);  
          
     }
   //exit;
    
       $filename = 'stockreport_'.date('Ymd').'.csv'; 
       header("Content-Description: File Transfer"); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/csv; ");
      // get data 
     
   
   
   
   
   
   
       // file creation 
       $file = fopen('php://output','w');
       $header = array("Item Name","Item Code","Batch Id","Stock","Price","Closing Stock Price"); 
       fputcsv($file, $header);
       foreach ($attObj as $key=>$line){ 
           fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
 }
 public function printbarcode(){
    if(isset($_POST['submit'])){
      // echo "hi";
      //  echo $pvalue=$this->input->post('printer');
      //  exit;
      if($this->input->post('printname')==1){
         $batchid=$this->input->post('batchcode');
         $data['number']=$this->input->post('numberofsticker');
         $data['barcode']=$this->Admin_model->get_barcodefetching($batchid);
         //echo "<pre>";print_r($data['barcode']);exit;
        $this->load->view('superadmin/barcodeprintnewdatamax',$data);
       }else if($this->input->post('printname')==2){
         $batchid=$this->input->post('batchcode');
         $data['number']=$this->input->post('numberofsticker');
         $data['barcode']=$this->Admin_model->get_barcodefetching($batchid);
         //echo "<pre>";print_r($data['barcode']);exit;
        $this->load->view('superadmin/barcodeprintnew',$data);
     }
    }
    
    }
   
public function exportdb(){
   $user      = "newuser";
   $pass      = "(XpFeEd6(y@8-PH_";
   $host      = "192.168.10.87:3307";
   $name             = "mayoori1";
   $backup_name        = false;
   $tables             = false;
       $mysqli = new mysqli($host,$user,$pass,$name); 
       $mysqli->select_db($name); 
       $mysqli->query("SET NAMES 'utf8'");

       $queryTables    = $mysqli->query('SHOW TABLES'); 
       while($row = $queryTables->fetch_row()) 
       { 
           $target_tables[] = $row[0]; 
       }   
       if($tables !== false) 
       { 
           $target_tables = array_intersect( $target_tables, $tables); 
       }
       foreach($target_tables as $table)
       {
           $result         =   $mysqli->query('SELECT * FROM '.$table);  
           $fields_amount  =   $result->field_count;  
          $rows_num = $result->num_rows;   
           $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
           $TableMLine     =   $res->fetch_row();
           $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

           for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
           {
               while($row = $result->fetch_row())  
               { //when started (and every after 100 command cycle):
                   if ($st_counter%100 == 0 || $st_counter == 0 )  
                   {
                           $content .= "\nINSERT INTO ".$table." VALUES";
                   }
                   $content .= "\n(";
                   for($j = 0; $j < $fields_amount; $j++)
{
    if ($row[$j] === null) {
        $content .= 'NULL';
    } else {
        $value = str_replace("\n", "\\n", addslashes((string)$row[$j]));
        $content .= '"' . $value . '"';
    }

    if ($j < ($fields_amount - 1)) {
        $content .= ',';
    }
}
                   $content .=")";
                   //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                   if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                   {   
                       $content .= ";";
                   } 
                   else 
                   {
                       $content .= ",";
                   } 
                   $st_counter=$st_counter+1;
               }
           } $content .="\n\n\n";
       }
       //$backup_name = $backup_name ? $backup_name : $name."_(".date('H-i-s')."".date('d-m-Y').")_rand".rand(1,11111111).".sql";
       $backup_name = $backup_name ? $backup_name : $name.".sql";
       header('Content-Type: application/octet-stream');   
       header("Content-Transfer-Encoding: Binary"); 
       header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
       echo $content; exit;
  
}
public function purchaseaddon(){
   
   if(isset($_POST['submit_search'])){
      $from=$this->input->post('fromdate');
      $to=$this->input->post('todate');
      $data['purchase']=$this->Admin_model->getpurchasefromto($from,$to);
     
   }else{
    
      $links="";
      $config = array();
      $config["base_url"] = base_url() . "Admin/purchasecalc";
      $config["total_rows"] = $this->Admin_model->record_count_purchase();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
   
     $this->pagination->initialize($config);
   
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["purchase"] = $this->Admin_model->
      get_purchaselimitfetch($config["per_page"], $page);
     
   }
      $data["links"] = $this->pagination->create_links();
      $data['supplier']=$this->Admin_model->get_supplier();
      $data['employee']=$this->Admin_model->get_staff();
      $data['bilpur']=$this->Admin_model->get_automaticbillpur();
      $data['last_bill_number']=$this->Admin_model->get_lastbillnumberpur();
      $purchasetrans = $this->Admin_model->getalltable('tbl_purchase_trans');
      foreach($purchasetrans as $purchasesingle){
         $data['purchasetrans'][$purchasesingle->purchase_trans_purchase_master_id][] = $purchasesingle;
      }
      $items = $this->Admin_model->getalltable('tbl_item');
      foreach($items as $itemsingle){
      $data['item'][$itemsingle->itm_code] = $itemsingle->itm_name;

      }
      $data['token']= $this->generatetokenpurchase();
        $this->load->view('superadmin/purchaseaddon',$data);
}
}