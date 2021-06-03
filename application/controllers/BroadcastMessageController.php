<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BroadcastMessageController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['OutboxModel', 'GroupModel', 'ContactGroupModel']);

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
        $data['groups'] = $this->GroupModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('broadcast_message/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $group_id = $this->input->post('group_id');
        $text = $this->input->post('text');
        $creator_id = $this->session->userdata('id');

        $all_contact_in_group = $this->ContactGroupModel->getByWhereWithJoin($group_id)->result();

        foreach ($all_contact_in_group as $key => $value) {
            $data = array(
                'DestinationNumber' => $value->phone_number,
                'TextDecoded' => $text,
                'CreatorID' => $creator_id
            );
    
            $this->OutboxModel->insert($data);
        }
        $this->session->set_flashdata('success', "Success create new message!");
        return redirect(base_url('broadcast_message/create'));
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
