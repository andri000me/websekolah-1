<?php
class Error extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->helper('url');
    }
    function index(){
        $x['setting'] = $this->db->get('tbl_setting')->result();
        $this->load->view('depan/404',$x);
    }
}
