<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('ContactModel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['contacts'] = $this->ContactModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        $status = $this->input->post('status');

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
            'status' => $status
        );

        $this->ContactModel->insert($data);
        $this->session->set_flashdata('success', "Success create new user!");
        return redirect(base_url('contact'));
    }

    public function show($id)
    {
        $data['contact'] = $this->ContactModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['contact'] = $this->ContactModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone_number = $this->input->post('phone_number');
        $status = $this->input->post('status');

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
            'status' => $status
        );

        $this->ContactModel->update($data, $id);
        $this->session->set_flashdata('success', "Success update contact!");
        return redirect(base_url('contact'));
    }

    public function destroy($id)
    {
        $this->ContactModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('contact'));
    }

    public function destroy_all()
    {
        $id = $this->input->post('ID');

        foreach ($id as $key => $value) {
            $this->ContactModel->destroy($value); 
        }

        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('contact'));
    }        
}
