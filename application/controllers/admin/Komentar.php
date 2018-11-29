<?php
class Komentar extends CI_Controller{
    function __construct(){
    	parent::__construct();
    	$this->load->model('m_kategori');
    }

    function index(){
        if ($this->session->userdata('masuk')!=TRUE) {
            $x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
        } else {
        $x['data']=$this->db->query("SELECT tbl_komentar.*,tulisan_judul,tulisan_slug FROM tbl_komentar JOIN tbl_tulisan ON komentar_tulisan_id=tulisan_id ORDER BY komentar_id DESC");
        $this->load->view('admin/v_komentar',$x);
    }
    }

    function publish(){
        if ($this->session->userdata('masuk')!=TRUE) {
            $x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
        } else {
        $kode = htmlspecialchars($this->uri->segment(4),ENT_QUOTES);
        $this->db->query("UPDATE tbl_komentar SET komentar_status='1' WHERE komentar_id='$kode'");
        echo $this->session->set_flashdata('msg','success');
        redirect('admin/komentar');
    }
    }

    function reply(){
        if ($this->session->userdata('masuk')!=TRUE) {
            $x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
        } else {
        $komentar_id = htmlspecialchars($this->input->post('komenid'),ENT_QUOTES);
        $nama = $this->session->userdata('nama');
        $tulisan_id = htmlspecialchars($this->input->post('postid'),ENT_QUOTES);
        $komentar = nl2br(htmlspecialchars($this->input->post('komentar',TRUE),ENT_QUOTES));
        $data = array(
            'komentar_nama' 			=> $nama,
            'komentar_email' 			=> '',
            'komentar_isi' 				=> $komentar,
            'komentar_status' 		=> 1,
            'komentar_tulisan_id' => $tulisan_id,
            'komentar_parent'     => $komentar_id
        );

        $this->db->insert('tbl_komentar', $data);
        echo $this->session->set_flashdata('msg','info');
        redirect('admin/komentar');
    }
    }

    function hapus(){
        if ($this->session->userdata('masuk')!=TRUE) {
            $x['setting'] = $this->db->get('tbl_setting')->result();
            $this->load->view('depan/404',$x);
        } else {
  		$kode=$this->input->post('kode');
  		$this->db->delete('tbl_komentar', array('komentar_id' => $kode));
  		echo $this->session->set_flashdata('msg','success-hapus');
  		redirect('admin/komentar');
  	}
  }
}
