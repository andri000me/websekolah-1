<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_kategori');
		$this->load->library('upload');
	}


	function index(){
		if ($this->session->userdata('masuk')!=TRUE) {
			$x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
		} else {
		$x['data']=$this->m_kategori->get_all_kategori();
		$this->load->view('admin/v_kategori',$x);
	}
	}

	function simpan_kategori(){
		if ($this->session->userdata('masuk')!=TRUE) {
			$x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
		} else {
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->m_kategori->simpan_kategori($kategori);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/kategori');
	}
	}

	function update_kategori(){
		if ($this->session->userdata('masuk')!=TRUE) {
			$x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
		} else {
		$kode=strip_tags($this->input->post('kode'));
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->m_kategori->update_kategori($kode,$kategori);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/kategori');
	}
	}
	function hapus_kategori(){
		if ($this->session->userdata('masuk')!=TRUE) {
			$x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
		} else {
		$kode=strip_tags($this->input->post('kode'));
		$this->m_kategori->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/kategori');
	}
	}

}
