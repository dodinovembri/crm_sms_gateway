<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller { 

    function __construct()
    {
        parent::__construct();
        $this->load->model(['InboxModel', 'SentItemModel', 'ContactModel', 'AutoreplyModel', 'NotificationModel']);
        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['total_inbox'] = $this->InboxModel->countRows(); 
        $data['total_sentitem'] = $this->SentItemModel->countRows();     
        $data['total_contact'] = $this->ContactModel->countRows();     
        $data['total_autoreply'] = $this->AutoreplyModel->countRows();   
        
        $inboxs = $this->InboxModel->getByWhere()->result();
        foreach ($inboxs as $key => $value) {
            $data_notif = array(
                'inbox_id' => $value->ID,
                'sender' => $value->SenderNumber,
                'is_read' => 0,
                'created_at' => date("Y-m-d H-i-s")
            );
            $this->NotificationModel->insert($data_notif);
        }
        foreach ($inboxs as $key2 => $value2) {
            $data_inbox = array(
                'is_pushed_to_notification' => 1
            );
            $this->InboxModel->update($data_inbox, $value2->ID);
        }

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