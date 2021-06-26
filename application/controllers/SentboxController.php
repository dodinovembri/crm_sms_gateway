<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SentboxController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('SentItemModel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['sentbox'] = $this->SentItemModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sentbox/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sentbox/create');
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

        $this->SentItemModel->insert($data);
        $this->session->set_flashdata('success', "Success create new message!");
        return redirect(base_url('user'));
    }

    public function show($id)
    {
        $data['sentbox'] = $this->SentItemModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sentbox/show', $data);
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
        $delete = $this->SentItemModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('sentbox'));
    }
}
