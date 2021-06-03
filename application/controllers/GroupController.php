<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('GroupModel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['groups'] = $this->GroupModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('group/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('group/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $group_code = $this->input->post('group_code');
        $group_name = $this->input->post('group_name');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        $data = array(
            'group_code' => $group_code,
            'group_name' => $group_name,
            'description' => $description,
            'status' => $status
        );

        $this->GroupModel->insert($data);
        $this->session->set_flashdata('success', "Success create new group!");
        return redirect(base_url('group'));
    }

    public function show($id)
    {
        $data['group'] = $this->GroupModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('group/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['group'] = $this->GroupModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('group/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $group_name = $this->input->post('group_name');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        $data = array(
            'group_name' => $group_name,
            'description' => $description,
            'status' => $status
        );

        $this->GroupModel->update($data, $id);
        $this->session->set_flashdata('success', "Success update group!");
        return redirect(base_url('group'));
    }

    public function destroy($id)
    {
        $this->GroupModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('group'));
    }
}
