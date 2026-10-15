<?php
class Crud_model extends CI_Model 
{
public function get_profitandlossexport(){
    $this->db->select('*');
		$this->db->from('tbl_sales_master');
		$this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
    $this->db->join('tbl_imbm','tbl_imbm.batch_id =tbl_sales_trans.sales_trans_item_batch_id','left');
		$this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
      
        $q = $this->db->get();
        $response = $q->result_array();
	 	return $response;
}
public function get_b2csalesreportexport(){
  $this->db->select('tbl_sales_master.sales_master_date,tbl_sales_master.sales_master_bill_no,tbl_sales_master.sales_master_customer_name,tbl_sales_master.sales_master_tot_taxable_amount,tbl_sales_master.sales_master_tot_gst_amount,
  tbl_sales_master.sales_master_total_cess,tbl_sales_master.sales_master_delivery_charge,
  tbl_sales_master.sales_master_discount,tbl_sales_master.sales_master_grand_total');
  $this->db->from('tbl_sales_master');
 
      $q = $this->db->get();
      $response = $q->result_array();
   return $response;
}
public function get_fullstock_reportcrud(){
  $this->db->select('*')
	->from('tbl_imbm');
		
    $this->db->join('tbl_item','tbl_item.itm_id=tbl_imbm.item_id','left');
    // $this->db->order_by("tbl_imbm.batch_id", "desc");
		// $this->db->limit(7000);
		$q=$this->db->get();
    $response = $q->result_array();
    return $response;
}


public function get_totalpurchasecountcrud($batchid){
  $this->db->select("SUM(purchase_trans_qty) as mysum")
  
  ->from('tbl_purchase_master')
  ->join('tbl_purchase_trans','tbl_purchase_trans.purchase_trans_purchase_master_id=tbl_purchase_master.purchase_master_id','left');
  $this->db->where('purchase_item_batch_id',$batchid);
  $data=$this->db->get();
  return $data->row();
}
public function get_totalpurchasereturncountcrud($batchid){
  $this->db->select("SUM(purreturn_trans_qty) as mysum")
  
  ->from('tbl_purchase_return_master')
  ->join('tbl_purchase_return_trans','tbl_purchase_return_trans.purreturn_trans_purreturn_master_id=tbl_purchase_return_master.purreturn_master_id ','left');
  $this->db->where('purreturn_trans_batch',$batchid);
  $data=$this->db->get();
  return $data->row();
}
public function get_totalsalecount($batchid){
  $this->db->select("SUM(sales_trans_qty) as mysum")
  
  ->from('tbl_sales_master')

  ->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
  
  $this->db->where('sales_trans_item_batch_id',$batchid);

  $data=$this->db->get();
  return $data->row();
}
public function get_totalsalereturncount($batchid){
  $this->db->select("SUM(salesreturntrans_qty) as mysum")
  
  ->from('tbl_salesreturn')
  ->join('tbl_salesreturn_trans','tbl_salesreturn_trans.salesreturntrans_master_id=tbl_salesreturn.sales_return_id','left');
  $this->db->where('salesreturntrans_item_batch_id',$batchid);
  $data=$this->db->get();
  return $data->row();
}
public function get_totalphysicalstockcountcrud($batchid){
  $this->db->select("SUM(psat_qty) as mysum")
  
  ->from('tbl_physicalstock_adjustment_master')
  ->join('tbl_physicalstock_adjusment_trans','tbl_physicalstock_adjusment_trans.psat_master_id=tbl_physicalstock_adjustment_master.psa_id','left');
  $this->db->where('psat_item_batch_id',$batchid);
  $data=$this->db->get();
  return $data->row();
}
public function get_b2bsalesreportexport(){
  $this->db->select('tbl_billing_master.billing_master_billdate,tbl_billing_master.billing_master_billno,tbl_billing_master.billing_master_customer_name,tbl_billing_master.billing_master_tot_taxable_amount,tbl_billing_master.billing_master_tot_gst_amount,
  ,tbl_billing_master.billing_master_delivery_charge,
  tbl_billing_master.billing_master_discount,tbl_billing_master.billing_master_grandtotal');
  $this->db->from('tbl_billing_master');
 
      $q = $this->db->get();
      $response = $q->result_array();
   return $response;
}
public function get_sales_masterdownload(){
  $this->db->select('*');
  $this->db->from('tbl_sales_master');

  // $this->db->where('tbl_sales_master.sales_master_date >=', $from);
	// 	$this->db->where('tbl_sales_master.sales_master_dateget_sales_masterdownload <=', $to);
      $q = $this->db->get();
      $response = $q->result_array();
   return $response;
}
public function get_sales_transdownload($from,$to){ 
  $this->db->select('tbl_sales_trans.*');
  $this->db->from('tbl_sales_trans');
  // $this->db->join('tbl_sales_trans','tbl_sales_trans.sales_trans_master_id=tbl_sales_master.sales_master_id','left');
  // $this->db->where('tbl_sales_master.sales_master_date >=', $from);
	// $this->db->where('tbl_sales_master.sales_master_date <=',$to);
  $q = $this->db->get();
  $response = $q->result_array();
  return $response; 
}
	
}