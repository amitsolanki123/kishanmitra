<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CC_Controller { 
    public function __construct() {
      parent::__construct();
        // Check Login Status
      $this->user_login_authentication();
      $this->load->model('admin_models/dashboard_model', 'dash_mdl');
      $this->load->model('stock_model', 'stk_mdl');	  
      
    }

    public function index() {
      $data = array();
      $data['title'] = 'Stock';
      $this->load->view('header');
		  $page = $_REQUEST['currentpage']; 
		  $search = $_REQUEST['search'];
		  
	  $data['stock_count']=	 $this->stk_mdl->stock_count($search);  
	  $data['stock_info'] = $this->stk_mdl->stock_info($page,$search);
	  $this->load->view('stock/manage_stock_v',$data);
	  $this->load->view('footer');
    }		
  
  
  public function addstock(){
	  $data = array();
      $data['title'] = 'Add Stock';
      $this->load->view('header');
	  $this->load->view('stock/addstock_v');
	  $this->load->view('footer');
    }
	
  public function create_stock(){
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
                'field' => 'merchant_name',
                'label' => 'Merchant name',
                'rules' => 'trim|required|max_length[250]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->addstock();
		 } else {
			$data['merchant_name'] = $this->input->post('merchant_name', TRUE); 
			$data['merchant_mobile_no'] = $this->input->post('merchant_mobile_no', TRUE); 
			$data['merchant_address'] = $this->input->post('merchant_address', TRUE); 
			$data['stock_date'] = $this->input->post('stock_date', TRUE);
			$data['product_name'] = $this->input->post('product_name', TRUE);
			$data['batch_no'] = $this->input->post('batch_no', TRUE);
			$data['mgf_company'] = $this->input->post('mgf_company', TRUE);
			$data['mgf_date'] = $this->input->post('mgf_date', TRUE);
			$data['exp_date'] = $this->input->post('exp_date', TRUE);
			$data['hsn_sac'] = $this->input->post('hsn_sac', TRUE);
			$data['cases'] = $this->input->post('cases', TRUE);
			$data['pack_size'] = $this->input->post('pack_size', TRUE);
			$data['qty'] = $this->input->post('qty', TRUE);
			$data['price_pcs'] = $this->input->post('price_pcs', TRUE);
			$data['amount'] = $this->input->post('amount', TRUE);
			$data['created_date']=date('Y-m-d h:i:s');
  		    $data['deletion_status']=0;
			
		    $insert_id = $this->stk_mdl->store_stock($data); 
			if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
				redirect('stock', 'refresh');
			 } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('stock', 'refresh');
            }
          }// Else Ends Here.....
      }	 

        public function edit_stock() {
			$edit_stock=$this->uri->segment('3');
			$data = array();
			$data['stock_info'] = $this->stk_mdl->get_stock_by_id($edit_stock);
			if (!empty($data['stock_info'])) {
				 $data['title'] = 'Edit Stock';
			     $this->load->view('header');
	             $this->load->view('stock/edit_stock_v',$data);
	             $this->load->view('footer');
			} else {
				$sdata['exception'] = 'Content not found !';
				$this->session->set_userdata($sdata);
				redirect('stock', 'refresh');
			}
    }

        public function update_stock() {	
		  $stock_id = $this->input->post('edit_id', TRUE); 
		  $stock_info = $this->stk_mdl->get_stock_by_id($stock_id);
        if (!empty($stock_info)) {
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
					'field' => 'merchant_name',
					'label' => 'Merchant name',
					'rules' => 'trim|required|max_length[250]'
                )
			);
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->edit_stock($stock_id);
            } else {
			$data['merchant_name'] = $this->input->post('merchant_name', TRUE); 
			$data['merchant_mobile_no'] = $this->input->post('merchant_mobile_no', TRUE); 
			$data['merchant_address'] = $this->input->post('merchant_address', TRUE); 
			$data['stock_date'] = $this->input->post('stock_date', TRUE);
			$data['product_name'] = $this->input->post('product_name', TRUE);
			$data['batch_no'] = $this->input->post('batch_no', TRUE);
			$data['mgf_company'] = $this->input->post('mgf_company', TRUE);
			$data['mgf_date'] = $this->input->post('mgf_date', TRUE);
			$data['exp_date'] = $this->input->post('exp_date', TRUE);
			$data['hsn_sac'] = $this->input->post('hsn_sac', TRUE);
			$data['cases'] = $this->input->post('cases', TRUE);
			$data['pack_size'] = $this->input->post('pack_size', TRUE);
		    $data['qty'] = $this->input->post('qty', TRUE);
			$data['price_pcs'] = $this->input->post('price_pcs', TRUE);
			$data['amount'] = $this->input->post('amount', TRUE);
			
            $result = $this->stk_mdl->update_stock($stock_id, $data);
				
			    if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
				   redirect('stock', 'refresh');
				 } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('stock', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('stock', 'refresh');
        }
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
	
	public function merchantaccount() {
      $data = array();
      $data['title'] = 'Merchantaccount';
      $this->load->view('header');
		  $page = $_REQUEST['currentpage']; 
		  $search = $_REQUEST['search'];
	  $data['merchant_account_info'] = $this->stk_mdl->merchant_account_info($page,$search);
	  $this->load->view('stock/merchant_account_v',$data);
	  $this->load->view('footer');
    }

    public function merchant_account_add() {
      $data = array();
      $data['title'] = 'Merchantaccountadd';
      $this->load->view('header');
		  $page = $_REQUEST['currentpage']; 
		  $search = $_REQUEST['search'];
	  $data['stock_info'] = $this->stk_mdl->stock_info($page,$search);
	  $this->load->view('stock/merchant_account_add',$data);
	  $this->load->view('footer');
    }

 public function create_merchant_acc(){
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
                'field' => 'company_name',
                'label' => 'Company name',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->merchant_account_add();
		 } else {
			$data['company_name'] = $this->input->post('company_name', TRUE); 
			$data['company_mobile'] = $this->input->post('company_mobile', TRUE); 
			$data['company_address'] = $this->input->post('company_address', TRUE); 
			$data['gstin'] = $this->input->post('gstin', TRUE);
			$data['stock_date'] = $this->input->post('stock_date', TRUE);
			$data['bill_bo'] = $this->input->post('bill_bo', TRUE);
			$data['product_name'] = $this->input->post('product_name', TRUE);
			$data['batch_no'] = $this->input->post('batch_no', TRUE);
			$data['mgf_company'] = $this->input->post('mgf_company', TRUE);
			$data['mgf_date'] = $this->input->post('mgf_date', TRUE);
			$data['exp_date'] = $this->input->post('exp_date', TRUE);
			$data['hsn_sac'] = $this->input->post('hsn_sac', TRUE);
			$data['cases'] = $this->input->post('cases', TRUE);
			$data['qty'] = $this->input->post('qty', TRUE);
			$data['price_pcs'] = $this->input->post('price_pcs', TRUE);
			$data['total_amount'] = $this->input->post('total_amount', TRUE);
			$data['created_date']=date('Y-m-d h:i:s');
  		    $data['deletion_status']=0;
			
		    $insert_id = $this->stk_mdl->store_merchant_acc($data);

            $payment['bill_id']=$insert_id;
			$payment['deposit']=0.00;
			$payment['grand_total']=$this->input->post('total_amount', TRUE);
			$payment['deposit_date']=date('Y-m-d h:i:s');			
			
			$payment_id = $this->stk_mdl->store_payment($payment);
			if (!empty($insert_id)) {
                $sdata['success'] = 'Add successfully . ';
                $this->session->set_userdata($sdata);
				redirect('stock/merchantaccount', 'refresh');
			 } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('stock/merchantaccount', 'refresh');
            }
          }// Else Ends Here.....
      }	 

         public function edit_merchant_acc() {
			$edit_merchant_acc=$this->uri->segment('3');
			$data = array();
			$data['merchant_acc_info'] = $this->stk_mdl->get_merchant_acc_by_id($edit_merchant_acc);
			if (!empty($data['merchant_acc_info'])) {
				 $data['title'] = 'Edit Merchant Account';
			     $this->load->view('header');
	             $this->load->view('stock/edit_merchant_acc_v',$data);
	             $this->load->view('footer');
			} else {
				$sdata['exception'] = 'Content not found !';
				$this->session->set_userdata($sdata);
				redirect('stock/merchantaccount', 'refresh');
			}
    }

       public function update_merchant_acc() {	
		  $merchant_acc_id = $this->input->post('edit_id', TRUE); 
		  $merchant_acc_info = $this->stk_mdl->get_merchant_acc_by_id($merchant_acc_id);
        if (!empty($merchant_acc_info)) {
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
					'field' => 'company_name',
					'label' => 'Company name',
					'rules' => 'trim|required'
                )
			);
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $this->edit_stock($stock_id);
            } else {
			$data['company_name'] = $this->input->post('company_name', TRUE); 
			$data['company_mobile'] = $this->input->post('company_mobile', TRUE); 
			$data['company_address'] = $this->input->post('company_address', TRUE); 
			$data['gstin'] = $this->input->post('gstin', TRUE);
			$data['stock_date'] = $this->input->post('stock_date', TRUE);
			$data['bill_bo'] = $this->input->post('bill_bo', TRUE);
			$data['product_name'] = $this->input->post('product_name', TRUE);
			$data['batch_no'] = $this->input->post('batch_no', TRUE);
			$data['mgf_company'] = $this->input->post('mgf_company', TRUE);
			$data['mgf_date'] = $this->input->post('mgf_date', TRUE);
			$data['exp_date'] = $this->input->post('exp_date', TRUE);
			$data['hsn_sac'] = $this->input->post('hsn_sac', TRUE);
			$data['cases'] = $this->input->post('cases', TRUE);
			$data['qty'] = $this->input->post('qty', TRUE);
			$data['price_pcs'] = $this->input->post('price_pcs', TRUE);
			$data['total_amount'] = $this->input->post('total_amount', TRUE);
			
            $result = $this->stk_mdl->update_merchant_acc($merchant_acc_id, $data);
				
			    if (!empty($result)) {
                    $sdata['success'] = 'Update successfully .';
                    $this->session->set_userdata($sdata);
				   redirect('stock/merchantaccount', 'refresh');
				 } else {
                    $sdata['exception'] = 'Operation failed !';
                    $this->session->set_userdata($sdata);
                    redirect('stock/merchantaccount', 'refresh');
                }
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('stock/merchantaccount', 'refresh');
        }
	 }

      
      public function remove_merchant_acc() {
        
		$stock_id=$this->uri->segment('3');		
		 $merchant_info = $this->stk_mdl->get_merchant_acc_by_id($stock_id);
        if (!empty($merchant_info)) {
            $result = $this->stk_mdl->remove_merchant_stock_by_id($stock_id);
            if (!empty($result)) {
                $sdata['success'] = 'Remove successfully .';
                $this->session->set_userdata($sdata);
                redirect('stock/merchantaccount?currentpage='.$_REQUEST['currentpage'].'', 'refresh');
            } else {
                $sdata['exception'] = 'Operation failed !';
                $this->session->set_userdata($sdata);
                redirect('stock/merchantaccount?currentpage='.$_REQUEST['currentpage'].'', 'refresh');
            }
        } else {
            $sdata['exception'] = 'Content not found !';
            $this->session->set_userdata($sdata);
            redirect('stock/merchantaccount?currentpage='.$_REQUEST['currentpage'].'', 'refresh');
        }
    }

     public function getamerchantaccpaymentlist($bill_id){
		   $result = $this->stk_mdl->getpaymentlist($bill_id);
		   return $result; 
	 }	
	 
	  public function savedeposit(){
		    $payment['bill_id']=$this->input->post('bill_id', TRUE);
			$payment['grand_total']=$this->input->post('grand_total', TRUE);
			$payment['deposit']=$this->input->post('deposit', TRUE);
            $payment['deposit_date']=date('Y-m-d h:i:s');
			$result = $this->stk_mdl->store_payment($payment);
			redirect('stock/merchantaccount', 'refresh');
	 }
  }
  