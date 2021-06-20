<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller { 

    function __construct()
    {
        parent::__construct();
        $this->load->model(['InboxModel', 'SentItemModel', 'ContactModel', 'AutoReplyModel']);
        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['total_inbox'] = $this->InboxModel->countRows(); 
        $data['total_sentitem'] = $this->SentItemModel->countRows();     
        $data['total_contact'] = $this->ContactModel->countRows();     
        $data['total_autoreply'] = $this->AutoReplyModel->countRows();     

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
	}

    public function logout()
    {
        $this->session->sess_destroy();

        return redirect(base_url('login'));
    }
}