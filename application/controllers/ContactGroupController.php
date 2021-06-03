<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactGroupController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['ContactGroupModel', 'ContactModel']);

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index($id)
	{
        $alternative = array(
            'group_id' => $id
        );

        $this->session->set_userdata($alternative);

        $data['contact_groups'] = $this->ContactGroupModel->getByWhere($id)->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $data['contacts'] = $this->ContactModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $contact = $this->input->post('contact');
        $group_id = $this->session->userdata('group_id');
        foreach ($contact as $key => $value) {
            $data = array(
                'contact_id' => $value,
                'group_id' => $group_id,
                'status' => 1
            );    
            $this->ContactGroupModel->insert($data);
        }
        $this->session->set_flashdata('success', "Success create new contact group!");
        return redirect(base_url('contact_group/create'));
    }

    public function show($id)
    {
        $data['contact_group'] = $this->ContactGroupModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['contact_group'] = $this->ContactGroupModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $group_id = $this->input->post('group_id');
        $status = $this->input->post('status');

        $data = array(
            'group_id' => $group_id,
            'status' => $status
        );

        $this->ContactGroupModel->update($data, $id);
        $this->session->set_flashdata('success', "Success update contact group!");
        return redirect(base_url('contact_group'));
    }

    public function destroy($id)
    {
        $this->ContactGroupModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('contact_group'));
    }
}
