<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CC_Controller { 
    public function __construct() {
      parent::__construct();
        // Check Login Status
      $this->user_login_authentication();
      $this->load->model('admin_models/dashboard_model', 'dash_mdl');
      $this->load->model('stock_model', 'stk_mdl');
      $this->load->model('billing_model', 'bill_mdl');	  
    }

    public function index() {
      $data = array();
      $data['title'] = 'Billing';
      $this->load->view('header');
		  $page = $_REQUEST['currentpage']; 
		  $search = $_REQUEST['search'];
		  
	  $data['bill_count'] = $this->bill_mdl->bill_count($search);
	  $data['stock_info'] = $this->stk_mdl->stock_info();
	  $data['billing_info'] = $this->bill_mdl->billing_info($page,$search);
	  $this->load->view('billing/billmanage_v',$data);
	  $this->load->view('footer');
    }		
  
  
  public function addbilling(){
	  $data = array();
      $data['title'] = 'Add Stock';
      $this->load->view('header');
	  $data['stock_info'] = $this->stk_mdl->stock_info();
	  $this->load->view('billing/add_billing_v', $data);
	  $this->load->model('stock_model', 'stk_mdl');	  
	  $this->load->view('footer');
    }
	
  public function get_ajax_stock(){
          $id = $this->input->post('id',true);	
          $data['stock_info'] = $this->stk_mdl->get_stock_by_id($id);	
          echo json_encode($data);		  
    }	  
	
  public function create_bill(){
           /*
         array(
                'field' => 'seo_title',
                'label' => 'seo title',
                'rules' => 'trim|required|max_length[250]'
            ), 
			
			array(
                'field' => 'seo_url',
                'label' => 'seo url',
                'rules' => 'trim|required|max_length[250]'
            ),
         */
		
        $config = array(
            array(
                'field' => 'customer_name',
                'label' => 'customer Name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->addbilling();
		 } else {
			$fourRandomDigit = mt_rand(1000,9999);
			$bill_no="KI".$fourRandomDigit;  
			$data['bill_no'] = $bill_no;
			
			$data['customer_name'] = $this->input->post('customer_name', TRUE); 
			$data['mobile_no'] = $this->input->post('mobile_no', TRUE); 
			$data['address'] = $this->input->post('address', TRUE); 
			$data['bill_date'] = $this->input->post('bill_date', TRUE);
			
			$data['sub_total'] = $this->input->post('table_total', TRUE);
			$data['cgst_mp_per'] = $this->input->post('MPGST', TRUE);
			$data['cgst_mp_price'] = $this->input->post('MPGSTvalue', TRUE);
			
			$data['sgst_mp_per'] = $this->input->post('MPSGST', TRUE);
			$data['sgst_mp_price'] = $this->input->post('MPSGSTvalue', TRUE);
			
			$data['grand_total'] = $this->input->post('grand_total', TRUE);
			$data['created_date']=date('Y-m-d h:i:s');
  		    $data['deletion_status']=0;
			
			$insert_id = $this->bill_mdl->store_bill($data); 
			
			$payment['bill_id']=$insert_id;
			$payment['deposit']=$this->input->post('customer_deposit', TRUE);
			$payment['grand_total']=$this->input->post('grand_total', TRUE);
			$payment['deposit_date']=date('Y-m-d h:i:s');
			
			$payment_id = $this->bill_mdl->store_payment($payment);
			
			$data['stock_id'] = $this->input->post('stock_id', TRUE);
			$total_qty = $this->input->post('total_qty', TRUE);
			$amount = $this->input->post('amount', TRUE);
			
			$bill_id=$insert_id;
			$i=0;
			foreach($data['stock_id'] as $sid){
				   $billdata['bill_id']=$bill_id;
				   $billdata['stock_id']=$sid;
				   $billdata['total_qty']=$total_qty[$i];
				   $billdata['amount']=$amount[$i];
				   $insert_id = $this->bill_mdl->store_tras_bill($billdata);
				   
				   // Get The  stock qty
				   $stock_qty=$this->stock_qty($sid);
				   $stock_qty['qty'];
				   // Get The stock qty

                   // update the stock quantity
                   $update['qty']=$stock_qty['qty']-$total_qty[$i];
                   $update_data = $this->bill_mdl->update_stock_qty($sid, $update);				   
				   $i++;
			}
			if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
				redirect('billing', 'refresh');
			 } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('billing', 'refresh');
            }
          }// Else Ends Here.....
      }

       public function stock_qty($sid){
		   $result = $this->db->get_where('tbl_stock', array('id' => $sid, 'deletion_status' => 0));
		   //echo $this->db->last_query();
           return $result->row_array();
      }		   

        public function edit_bill($edit_id) {
			$data = array();
			$data['stock_info'] = $this->stk_mdl->stock_info();
			$data['bill_info'] = $this->bill_mdl->get_bill_by_id($edit_id);
			$data['bill_trans_info'] = $this->bill_mdl->get_bill_trans_by_id($edit_id);
			if (!empty($data['bill_info'])) {
				 $data['title'] = 'Edit Bill';
			     $this->load->view('header');
	             $this->load->view('billing/edit_billing_v',$data);
	             $this->load->view('footer');
			} else {
				$sdata['exception'] = 'Content not found !';
				$this->session->set_userdata($sdata);
				redirect('billing', 'refresh');
			}
    }

        public function update_bill($edit_id) {	
		 $bill_info = $this->bill_mdl->get_bill_by_id($edit_id);
        if (!empty($bill_info)) {
            /*
            array(
					'field' => 'seo_title',
					'label' => 'seo title',
					'rules' => 'trim|required|max_length[250]'
				), 
				array(
					'field' => 'seo_url',
					'label' => 'seo url',
					'rules' => 'trim|required|max_length[250]'
				),
            */    
            
		    $config = array(
				array(
					'field' => 'customer_name',
					'label' => 'customer Name',
					'rules' => 'trim|required'
				)
			);
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->edit_bill($edit_id);
            } else {
			$data['customer_name'] = $this->input->post('customer_name', TRUE); 
			$data['mobile_no'] = $this->input->post('mobile_no', TRUE); 
			$data['address'] = $this->input->post('address', TRUE); 
			$data['bill_date'] = $this->input->post('bill_date', TRUE);
			
			$data['sub_total'] = $this->input->post('table_total', TRUE);
			$data['cgst_mp_per'] = $this->input->post('MPGST', TRUE);
			$data['cgst_mp_price'] = $this->input->post('MPGSTvalue', TRUE);
			
			$data['sgst_mp_per'] = $this->input->post('MPSGST', TRUE);
			$data['sgst_mp_price'] = $this->input->post('MPSGSTvalue', TRUE);
			
			$data['grand_total'] = $this->input->post('grand_total', TRUE);
			$data['update_date']=date('Y-m-d h:i:s');
			
            $result = $this->bill_mdl->update_bill($edit_id,$data);
			$data['stock_id'] = $this->input->post('stock_id', TRUE);
			$total_qty = $this->input->post('total_qty', TRUE);
			$amount = $this->input->post('amount', TRUE);
			    if (!empty($result)) {
					  $result = $this->bill_mdl->del_trans_by_id($edit_id);
						$i=0;
						foreach($data['stock_id'] as $sid){
								$billdata['bill_id']=$edit_id;
								$billdata['stock_id']=$sid;
								$billdata['total_qty']=$total_qty[$i];
								$billdata['amount']=$amount[$i];
								$insert_id = $this->bill_mdl->store_tras_bill($billdata); 
								$i++;
						}
			
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
				   redirect('billing', 'refresh');
				 } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('billing', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('billing', 'refresh');
        }
	 }
	 
	 public function getpaymentlist($bill_id){
		   $result = $this->bill_mdl->getpaymentlist($bill_id);
		   return $result; 
	 }
	 
	 public function get_stock_info($id){
		   $result = $this->bill_mdl->get_stock_info($id);
		   return $result; 
	 }
	 
	 public function savedeposit(){
		    $payment['bill_id']=$this->input->post('bill_id', TRUE);
			$payment['grand_total']=$this->input->post('grand_total', TRUE);
			$payment['deposit']=$this->input->post('deposit', TRUE);
            $payment['deposit_date']=date('Y-m-d h:i:s');
			$result = $this->bill_mdl->store_payment($payment);
			redirect('billing', 'refresh');
	 }
	 
	  public function remove_stock() {
        
		 $stock_id=$this->uri->segment('3');		
		 $stock_info = $this->stk_mdl->get_stock_by_id($stock_id);
        if (!empty($stock_info)) {
            $result = $this->stk_mdl->remove_stock_by_id($stock_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('stock?currentpage='.$_REQUEST['currentpage'].'', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('stock?currentpage='.$_REQUEST['currentpage'].'', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('stock?currentpage='.$_REQUEST['currentpage'].'', 'refresh');
        }
    }
	
	public function printbill($id){
	 $data = array();
			$data['stock_info'] = $this->stk_mdl->stock_info();
			$data['bill_info'] = $this->bill_mdl->get_bill_by_id($id);
			$data['bill_trans_info'] = $this->bill_mdl->get_bill_trans_by_id($id);
			$data['deposit_amount'] = $this->bill_mdl->get_deposit_amount($id);
			if (!empty($data['bill_info'])) {
				 $data['title'] = 'Print Bill';
			     $this->load->view('header');
	             $this->load->view('billing/print',$data);
	             $this->load->view('footer');
			} else {
				$sdata['exception'] = 'Content not found !';
				$this->session->set_userdata($sdata);
				redirect('billing', 'refresh');
			}
	}
	
	
	 // Export data in CSV format 
  public function exportCSV(){ 
   // file name 
   $filename = 'bill_'.date('Y-m-d h:i:s').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");
  
   // get data 
   $billing_info = $this->bill_mdl->get_exportcsv_bill();

   // file creation 
   $file = fopen('php://output', 'w');
 
   $header = array("bill No","Customer Name","Mobile No","Bill Date","Sub Total","CGST MP Price","SGST MP Price","Grand Total"); 
   fputcsv($file, $header);
   foreach ($billing_info as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   exit; 
  }
}
  