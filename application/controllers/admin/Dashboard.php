<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
	}
	function index(){
		if ($this->session->userdata('masuk')!=TRUE) {
			$x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
		} else {
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$this->load->view('admin/v_dashboard',$x);
		}else{
			redirect('administrator');
		}
	
	}
  }
	
}