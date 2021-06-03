<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller { 

    function __construct()
    {
        parent::__construct();
        $this->load->model(['']);
        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
	}

    public function logout()
    {
        $this->session->sess_destroy();

        return redirect(base_url('login'));
    }
}