<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SingleMessageController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['ContactModel', 'OutboxModel']);

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        // 
	}

    public function create()
    {
        $data['contacts'] = $this->ContactModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('single_message/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $receiver_name = $this->input->post('receiver_name');
        $destination_number = $this->input->post('destination_number');
        $text = $this->input->post('text');
        $creator_id = $this->session->userdata('id');

        $data = array(
            'ReceiverName' => $receiver_name,
            'DestinationNumber' => $destination_number,
            'TextDecoded' => $text,
            'CreatorID' => $creator_id
        );

        $this->OutboxModel->insert($data);
        $this->session->set_flashdata('success', "Success create new message!");
        return redirect(base_url('single_message/create'));
    }

    public function show($id)
    {
        // 
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
        //    
    }
}
