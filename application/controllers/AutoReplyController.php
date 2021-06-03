<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoreplyController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('AutoreplyModel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['autoreplies'] = $this->AutoreplyModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('autoreply/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('autoreply/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $code = $this->input->post('code');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        $data = array(
            'code' => $code,
            'description' => $description,
            'status' => $status
        );

        $this->AutoreplyModel->insert($data);
        $this->session->set_flashdata('success', "Success create new autoreply!");
        return redirect(base_url('autoreply'));
    }

    public function show($id)
    {
        $data['autoreply'] = $this->AutoreplyModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('autoreply/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['autoreply'] = $this->AutoreplyModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('autoreply/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $code = $this->input->post('code');
        $description = $this->input->post('description');
        $status = $this->input->post('status');

        $data = array(
            'code' => $code,
            'description' => $description,
            'status' => $status
        );

        $this->AutoreplyModel->update($data, $id);
        $this->session->set_flashdata('success', "Success update autoreply!");
        return redirect(base_url('autoreply'));
    }

    public function destroy($id)
    {
        $this->AutoreplyModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('autoreply'));
    }
}
