<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Controller {
public function __construct()    {  
parent::__construct();		
$this->load->model('Admin_model'); 
$this->load->model('Newadminmodel'); 
$this->load->library("pagination");
$this->load->helper('url');
}

public function index(){
    $data = array();
    if ($this->input->is_ajax_request()) {
        
      //  echo "hi";exit;
        /** this will handle datatable js ajax call * */
        /** get all datatable parameters * */
        $search = $this->input->get('search');/** search value for datatable  * */
        $offset = $this->input->get('start');/** offset value * */
        $limit = $this->input->get('length');/** limits for datatable (show entries) * */
        $order = $this->input->get('order');/** order by (column sorted ) * */
        $column = array('parameter', 'method', 'type');/**  set your data base column name here for sorting* */
        $orderColumn = isset($order[0]['column']) ? $column[$order[0]['column']] : 'parameter';
        $orderDirection = isset($order[0]['dir']) ? $order[0]['dir'] : 'asc';
        $ordrBy = $orderColumn . " " . $orderDirection;
 
        if (isset($search['value']) && !empty($search['value'])) {
           
            $sql = "SELECT * FROM tbl_bank WHERE bank_name '%like%'" . $search['value'] . " order by " . $ordrBy . " limit $offset,$limit";
            $sql = "SELECT count(*) FROM tbl_bank WHERE bank_name '%like%'" . $search['value'] . " order by " . $ordrBy;
            $result = $this->db->query($sql);
            $result2 = $this->db->query($sql2);
            $count = $result2->num_rows();
        } else {
            /**
             * If no seach value avaible in datatable
             */
            $sql = "SELECT * FROM tbl_bank  order by " . $ordrBy . " limit $offset,$limit";
            $sql2 = "SELECT * FROM tbl_bank  order by " . $ordrBy;
            $result = $this->db->query($sql);
            $result2 = $this->db->query($sql2);
            $count = $result2->num_rows();
        }
        /** create data to display in dataTable as you want **/    
 
        $data = array();
        if (!empty($result->result())) {
            foreach ($result->result() as $k => $v) {
                $data[] = array(
                    /** you can add what ever anchor link or dynamic data here **/
                     'parameter' =>  "<a href=".set_url('parameter/parameter_view/'.$v['bank_name'])."><strong>".$v['bank_name']."</strong></a>",
                      'method' =>  "<a href=".set_url('parameter/parameter_view/'.$v['bank_name'])."><strong>".$v['bank_name']."</strong></a>",
                      'parameter_type' =>  "<a href=".set_url('parameter/parameter_view/'.$v['bank_name'])."><strong>".$v['bank_name']."</strong></a>",
                      'actions' =>  "<a href=".set_url('parameter/parameter_view/'.$v['bank_name'])."><strong>".$v['bank_name']."</strong></a>" 
 
                );
            }
        }
        /**
         * draw,recordTotal,recordsFiltered is required for pagination and info.
         */
        $results = array(
            "draw" => $this->input->get('draw'),
            "recordsTotal" => count($data),
            "recordsFiltered" => $count,
            "data" => $data 
        );
 
        echo json_encode('$results');
    } else {
      //echo "hi";exit;
        $this->load->view('superadmin/banklist', $data);
    }
 
 
}
public function createroute(){
    if(isset($_POST['submit']))
    {
       $datarray=array('routename'=>$this->input->post('route'));
        $this->db->insert('tbl_routes',$datarray);
       redirect('createroute');
    }
 
    $data['routes']=$this->Newadminmodel->get_routelist();
    $this->load->view('delivery/createroute',$data);
}
public function map(){
    if(isset($_POST['submit']))
    {
       $datarray=array('route_id'=>$this->input->post('route'),
       'location'=>$this->input->post('location'));
        $this->db->insert('tbl_maps',$datarray);
       redirect('map');
    }
    if(isset($_POST['submit_edit']))
    {
        $id=$this->input->post('locid');
       $datarray=array('route_id'=>$this->input->post('route'),
       'location'=>$this->input->post('location'));
       $this->db->where('id',$id);
        $this->db->update('tbl_maps',$datarray);
       redirect('map');
    }
    $data['routes']=$this->Newadminmodel->get_routelist();
    $data['maps']=$this->Newadminmodel->get_maplist();
    $this->load->view('delivery/maplist',$data);
}
public function deliverynote(){
  //  $data['deliverylist']=$this->Newadminmodel->get_deliverymap();
    $data['supplier']=$this->Admin_model->get_supplier();
    $data['routes']=$this->Newadminmodel->get_routelist();
    $data['itemgroup']=$this->Admin_model->get_itemgroup();
    $data['itemcategory']=$this->Admin_model->get_itemcategory();
    if(isset($_POST['submit_search'])){
       
            $sup=$this->input->post('supplier');
      
            $depart=$this->input->post('department');
       
       
            $cate=$this->input->post('category');
      
            $rote=$this->input->post('route');
      
            $mdate=$this->input->post('billdate');
       
            $from=$this->input->post('fdate');
            $to=$this->input->post('tdate');
       
         $data['deliverylist']=$this->Newadminmodel->get_deliverymap($sup,$depart,$cate,$rote,$mdate,$from,$to);
      
    }
    //echo "<pre>";print_r($data['routes']);exit;
    $this->load->view('delivery/deliverymap',$data);
}

}