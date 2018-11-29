<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_kontak');
	}

	function index(){
		if ($this->session->userdata('masuk')!=TRUE) {
			$x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
		} else {
		$this->m_kontak->update_status_kontak();
		$x['data']=$this->m_kontak->get_all_inbox();
		$this->load->view('admin/v_inbox',$x);
	}
	}

	function hapus_inbox(){
		if ($this->session->userdata('masuk')!=TRUE) {
			$x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
		} else {
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/inbox');
	}
	}
}