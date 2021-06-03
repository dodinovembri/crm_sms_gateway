<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutboxController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('OutboxModel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['outbox'] = $this->OutboxModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('outbox/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('outbox/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $destination_number = $this->input->post('destination_number');
        $text = $this->input->post('text');
        $creator_id = $this->input->post('email');

        $data = array(
            'destination_number' => $destination_number,
            'text' => $text,
            'creator_id' => $creator_id
        );

        $this->OutboxModel->insert($data);
        $this->session->set_flashdata('success', "Success create new outbox!");
        return redirect(base_url('outbox'));
    }

    public function show($id)
    {
        $data['outbox'] = $this->OutboxModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('outbox/show', $data);
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
        $this->OutboxModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('outbox'));
    }
}
