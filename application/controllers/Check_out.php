<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_out extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_cart');	
		$this->load->model('m_order');	
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');			
		
    }
	
	public function validationData(){
		/*$jumlah = count($this->input->post('product_id'));
		$qty = $this->input->post('qty');
			for($i=0;$i<$jumlah;$i++) {
					$data['qty'] = $qty[$i];
					echo $data['qty'];
					$this->form_validation->set_rules('qty[]','Jumlah','greater_than['.$data['qty'].']|numeric');
			}
		
		return $this->form_validation->run();*/
		$this->form_validation->set_rules('qty[]','Jumlah','greater_than[0]|numeric');
		
		return $this->form_validation->run();
	}
	
	public function create_check_out() {
	
		if($this->session->userdata('user_id')) {
			
			if($this->validationData()==TRUE){
						$jumlah = count($this->input->post('product_id'));
						$user_id= $this->session->userdata('user_id');
						$product_id = $this->input->post('product_id');
						$store_id = $this->input->post('store_id');
						$date = date('Y-m-d H:i:s');
						$date2 = date('YmdHis');
						$price = $this->input->post('price');
						$qty = $this->input->post('qty');
						$status= '1';
						$qid = $this->input->post('qid');
						
						for($i=0;$i<$jumlah;$i++) {
							$data['user_id'] = $user_id;
							$data['product_id'] = $product_id[$i];
							$data['order_id'] = 'KD-'.$user_id.$store_id[$i].$date2;
							$data['store_id']= $store_id[$i];
							$data['date'] = $date;
							$data['qty'] = $qty[$i];
							$data['total'] = $price[$i]*$qty[$i];
							$data['status'] = $status;
							
							$this->m_order->insert($data);
							
							$data2['user_id']= $user_id;
							$data2['qid'] = $qid[$i];
						
							$this->m_cart->delete($data2['qid'],$data2['user_id']);
						}
						
						redirect('order/order_detail');
						echo "success";
			} else {
						$this->session->set_flashdata('message', validation_errors());
						redirect('cart');
			}
			
        } else {
			redirect('login');
		}
		
    }
	
	public function delete_cart() {
		
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
        if($qid!="") {
            $this->m_order->delete($qid);
		}
        //redirect to page
        redirect('cart');

    }
    
}
