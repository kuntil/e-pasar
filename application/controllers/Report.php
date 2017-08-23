<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_order');	
		$this->load->model('m_delivery');	
		$this->load->model('m_accept_transfer');	
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');	
		$this->load->model('m_transfer');
		$this->load->model('m_report');
		
    }
	
	public function get_store(){
    	$data['get_store']= $this->m_home->get_store();
		$data['get_store2']= count($data['get_store']);
    	return $data['get_store2'];
    }
	
	public function get_address_store(){
    	$data['get_address']= $this->m_home->get_address_store($this->user_store()['store_id']);
		$data['get_address2']= count($data['get_address']);
    	return $data['get_address2'];
    }
	
	public function get_address_buyer(){
    	$data['get_address_buyer']= $this->m_home->get_address_buyer();
		$data['get_address_buyer2']= count($data['get_address_buyer']);
    	return $data['get_address_buyer2'];
    }
	
	public function get_person(){
    	$get_person= $this->m_home->get_person();
		$count = count($get_person);
		
		if($count){
			foreach($get_person as $get_person){
				$data['image']=$get_person->image;
			}
		}else{
			$data = array(
					'image'=>null
			);
		}
			
		return $data;
    }
	
	//Get StoreID and StoreName
	public function user_store(){
		$storeID=$this->m_home->user_store($this->session->userdata('user_id'));
		$count = count($storeID);
		
		if($count){
			foreach($storeID as $store){
				$data['store_id']=$store->store_id;
				$data['name']=$store->name;
			}
		}else{
			$data = array(
					'store_id'=>null,
					'name'=>null
			);
		}
		
		return $data;
	}
	
	//User Profile
	public function user_profile(){
		$person=$this->m_home->user_profile($this->session->userdata('user_id'));
		$count = count($person);
		
		if($count){
			foreach($person as $store){
				$data['person_id']=$store->person_id;
				$data['name']=$store->name;
			}
		}else{
			$data = array(
					'person_id'=>null,
					'name'=>null
			);
		}
		
		return $data;
	}
	
//PENJUAL	
	public function index(){
		
		$data['get_store']= $this->get_store();
		$data['get_address']= $this->get_address_store();
		$data['user_store_name']= $this->user_store()['name'];
		$data['store_id']= $this->user_store()['store_id'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$this->load->view('header');
		$this->load->view('penjual/navbar', $data);
		$this->load->view('penjual/report/report', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}

	public function find(){
		
			if($this->input->post('submit')){
				$month = $this->input->post('month');
				$year = $this->input->post('year');
				
				$option = array(
					'user_month'=>$month,
					'user_data'=>$year
				);
				$this->session->set_userdata($option);
			}else{
			   $year = $this->uri->segment ( 4 );
			   $month = $this->uri->segment ( 5 );
			}
			
			$data['get_store']= $this->get_store();
			$data['get_address']= $this->get_address_store();
			$data['user_store_name']= $this->user_store()['name'];
			$data['store_id']= $this->user_store()['store_id'];
			$data['user_profile_name']= $this->user_profile()['name'];
			$data['get_image']= $this->get_person()["image"];
			/* Get all users */
		
			$config = array ();
			$config ["base_url"] = base_url () . "report/find/".$year."/".$month;
			$config ["total_rows"] = $this->m_report->search_count($month,$year,$data['store_id']);
			$config ["per_page"] = 25;
			$config ["uri_segment"] = 6;
			$choice = $config ["total_rows"] / $config ["per_page"];
			$config ["num_links"] = 5;
				
			// config css for pagination
			$config ['full_tag_open'] = '<ul class="pagination">';
			$config ['full_tag_close'] = '</ul>';
			$config ['first_link'] = 'First';
			$config ['last_link'] = 'Last';
			$config ['first_tag_open'] = '<li>';
			$config ['first_tag_close'] = '</li>';
			$config ['prev_link'] = 'Previous';
			$config ['prev_tag_open'] = '<li class="prev">';
			$config ['prev_tag_close'] = '</li>';
			$config ['next_link'] = 'Next';
			$config ['next_tag_open'] = '<li>';
			$config ['next_tag_close'] = '</li>';
			$config ['last_tag_open'] = '<li>';
			$config ['last_tag_close'] = '</li>';
			$config ['cur_tag_open'] = '<li class="active"><a href="#">';
			$config ['cur_tag_close'] = '</a></li>';
			$config ['num_tag_open'] = '<li>';
			$config ['num_tag_close'] = '</li>';
				
			if ($this->uri->segment ( 6 ) == "") {
				$data ['number'] = 0;
			} else {
				$data ['number'] = $this->uri->segment ( 6 );
			}
				
			$this->pagination->initialize ( $config );
			$page = ($this->uri->segment ( 6 )) ? $this->uri->segment ( 6 ) : 0;
				
			$data ['month'] = $this->input->post('month');
			$data ['year'] = $this->input->post('year');
			$data ['order'] = $this->m_report->search($month,$year,$data['store_id'],$config ["per_page"], $page);
			$data ['links'] = $this->pagination->create_links ();
			$this->load->view('header');
			$this->load->view('penjual/navbar', $data);
			$this->load->view('penjual/report/result', $data);
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');

	}
    
	public function add(){
			
			$month = $this->input->get('month');
			$year = $this->input->get('year');
			$data['store_id']= $this->user_store()['store_id'];
			
			switch($month){
				case 1 : $nama_bulan = "JANUARI";break;
				case 2 : $nama_bulan = "FEBRUARI";break;
				case 3 : $nama_bulan = "MARET";break;
				case 4 : $nama_bulan = "APRIL";break;
				case 5 : $nama_bulan = "MEI";break;
				case 6 : $nama_bulan = "JUNI";break;
				case 7 : $nama_bulan = "JULI";break;
				case 8 : $nama_bulan = "AGUSTUS";break;
				case 9 : $nama_bulan = "SEPTEMBER";break;
				case 10 : $nama_bulan = "OKTOBER";break;
				case 11 : $nama_bulan = "NOVEMBER";break;
				case 12 : $nama_bulan = "DESEMBER";break;
			}
			$this->load->library('excel');
			
			//load PHPExcel library
			$this->excel->setActiveSheetIndex(0);
                  //name the worksheet
                  $this->excel->getActiveSheet()->setTitle('Laporan Rekapitulasi Pegawai');

  				//STYLING
  				$styleArray = array(
  					'borders' => array('vertical' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
					
					//STYLING
  				$styleArray2 = array(
  					'borders' => array('allborders' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
					
				//STYLING
  				$styleArray3 = array(
  					'borders' => array('bottom' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
					
				$styleArray4 = array(
  					'borders' => array('right' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
				
				$styleArray5 = array(
  					'borders' => array('left' =>
  						array('style' => PHPExcel_Style_Border::BORDER_THIN,'color' =>
  							array('argb' => '0000'),
  							),
  						),
  					);
				
					
			$no = 7;		
					
			//SET DIMENSI TABEL
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(13);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(28);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(19);
			
				
			//set KOP
			$this->excel->getActiveSheet()->mergeCells('A1:I1');
			$this->excel->getActiveSheet()->setCellValue('A1', 'LAPORAN PENJUALAN BULAN '.$nama_bulan.' TAHUN '.$year.'');
			$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			
			//SET NO
			$this->excel->getActiveSheet()->setCellValue('A5', 'NO');
			$this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('A5')->getFont()->setName('Calibri');
			
			//SET KODE TRANSAKSI
			$this->excel->getActiveSheet()->setCellValue('B5', 'KODE TRANSAKSI');
			$this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('B5')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('B5')->getFont()->setName('Calibri');
			
			
			//SET NAMA PEMBELI
			$this->excel->getActiveSheet()->setCellValue('C5', 'TANGGAL');
			$this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('C5')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('C5')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('C5')->getFont()->setName('Calibri');
			
			//SET NAMA PEMBELI
			$this->excel->getActiveSheet()->setCellValue('D5', 'NAMA PEMBELI');
			$this->excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('D5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('D5')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('D5')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('D5')->getFont()->setName('Calibri');
			
			//SET NAMA PEMBELI
			
			$this->excel->getActiveSheet()->mergeCells('E5:H5');
			$this->excel->getActiveSheet()->setCellValue('E5', 'PRODUK');
			$this->excel->getActiveSheet()->getStyle('E5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E5')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('E5')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('E5')->getFont()->setName('Calibri');
			
			//SET NAMA PEMBELI
			$this->excel->getActiveSheet()->setCellValue('E6', 'NAMA PRODUK');
			$this->excel->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('E6')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('E6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('E6')->getFont()->setName('Calibri');
			
			//SET NAMA PEMBELI
			$this->excel->getActiveSheet()->setCellValue('F6', 'HARGA');
			$this->excel->getActiveSheet()->getStyle('F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('F6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('F6')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('F6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('F6')->getFont()->setName('Calibri');
			
			//SET NAMA PEMBELI
			$this->excel->getActiveSheet()->setCellValue('G6', 'QTY');
			$this->excel->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('G6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('G6')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('G6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('G6')->getFont()->setName('Calibri');
			
			//SET NAMA PEMBELI
			$this->excel->getActiveSheet()->setCellValue('H6', 'JUMLAH');
			$this->excel->getActiveSheet()->getStyle('H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('H6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('H6')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('H6')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('H6')->getFont()->setName('Calibri');
			
			
			//SET TOTAL
			$this->excel->getActiveSheet()->setCellValue('I5', 'TOTAL TRANSAKSI');
			$this->excel->getActiveSheet()->getStyle('I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('I5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('I5')->getFont()->setSize(11);
			$this->excel->getActiveSheet()->getStyle('I5')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('I5')->getFont()->setName('Calibri');
			
			$no =8;
			$no2 = 8; 
			$hit =1;
			
			$data = $this->m_report->print_report($month,$year,$data['store_id']);
			
			foreach ($data as $datax) {
				$this->excel->getActiveSheet()->setCellValue('A'.$no2, $hit );
				$this->excel->getActiveSheet()->setCellValue('B'.$no2, $datax->order_id );
				$this->excel->getActiveSheet()->setCellValue('D'.$no2, $datax->buyer_name );
				
						$detail_order= $this->m_report->report($datax->order_id,$datax->user_id); 
						
						foreach ($detail_order as $detail_order2){
							$this->excel->getActiveSheet()->setCellValue('C'.$no2, date("d-m-Y",strtotime($detail_order2->date)) );
						}
						
						$n = 0;
						$detail_order2= $this->m_order->transaction_success_buyer($datax->order_id,$datax->user_id); 
						foreach($detail_order2 as $detail_order2){
							$n = $n + $detail_order2->total;
						}
						
						$this->excel->getActiveSheet()->setCellValue('I'.$no2, $n );
						
						foreach ($detail_order as $detail_order){
							$this->excel->getActiveSheet()->setCellValue('E'.$no2, $detail_order->name );
							$this->excel->getActiveSheet()->setCellValue('F'.$no2, $detail_order->price );
							$this->excel->getActiveSheet()->setCellValue('G'.$no2, $detail_order->qty_order );
							$this->excel->getActiveSheet()->setCellValue('H'.$no2, $detail_order->total );
							$no2++;
						}
						
				$no++;
				$hit++;
				
			}
			
			  
					
					
			ob_end_clean();
                  $filename='Laporan Bulan.xls'; //save our workbook as this file name
                  header('Content-Type: application/vnd.ms-excel'); //mime type
                  header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                  header('Cache-Control: max-age=0'); //no cache

                  //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                  //if you want to save it as .XLSX Excel 2007 format
                  $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

			$objWriter->save('php://output');
          
           //redirect('report/report_all','refresh');	
			
		
		
	}
}
