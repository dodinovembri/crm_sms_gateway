<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhoneController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('PhoneModel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $data['phones'] = $this->PhoneModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('phone/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('phone/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $id = $this->input->post('id');
        $imei = $this->input->post('imei');
        $imsi = $this->input->post('imsi');
        $client = $this->input->post('client');

        $data = array(
            'id' => $id,
            'imei' => $imei,
            'imsi' => $imsi,
            'client' => $client
        );

        $this->PhoneModel->insert($data);
        $this->session->set_flashdata('success', "Success create new phone!");
        return redirect(base_url('phone'));
    }

    public function show($id)
    {
        $data['phone'] = $this->PhoneModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('phone/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['phone'] = $this->PhoneModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('phone/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $id = $this->input->post('id');
        $imei = $this->input->post('imei');
        $imsi = $this->input->post('imsi');
        $client = $this->input->post('client');

        $data = array(
            'id' => $id,
            'imei' => $imei,
            'imsi' => $imsi,
            'client' => $client
        );

        $this->PhoneModel->update($data, $id);
        $this->session->set_flashdata('success', "Success update phone!");
        return redirect(base_url('phone'));
    }

    public function destroy($id)
    {
        $this->PhoneModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url('phone'));
    }
}
