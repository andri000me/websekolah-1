<?php
class Kompetensi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_files');
		$this->load->helper('download');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['setting'] = $this->db->get('tbl_setting')->result();
		$x['data']=$this->m_files->get_all_files();
		$this->load->view('depan/v_kompetensi',$x);
	}

	function get_file(){
		$x['setting'] = $this->db->get('tbl_setting')->result();
		$id=$this->uri->segment(3);
		$get_db=$this->m_files->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

}
