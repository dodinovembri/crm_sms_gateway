<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InboxController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['InboxModel', 'NotificationModel']);

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['inbox'] = $this->InboxModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inbox/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        // 
    }

    public function store()
    {
        // 
    }

    public function show($id)
    {
        $update = $this->InboxModel->getById($id)->row();
        $data = array(
            'is_read' => 1
        );
        $user_id = $this->session->userdata('id');
        $inbox_id = $id;
        $this->NotificationModel->update($data, $user_id, $inbox_id);

        $data['inbox'] = $this->InboxModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inbox/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        // 
    }

    public function update($id)
    {
        // 
    }

    public function destroy($id)
    {
        $this->InboxModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('inbox'));
    }

    public function destroy_all()
    {
        $id = $this->input->post('ID');

        foreach ($id as $key => $value) {
            $this->InboxModel->destroy($value); 
        }

        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('inbox'));
    }    
}
