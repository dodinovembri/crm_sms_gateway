<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller { 

    function __construct()
    {
        parent::__construct();
        $this->load->model(['UserModel']);
        if ($this->session->userdata('logged_in') == 1) {
            return redirect(base_url('home'));
        }
    }

	public function index()
	{
        $this->load->view('auth/login');
	}

    public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $check_auth = $this->UserModel->check_auth($email, $password)->row();
        if (!empty($check_auth)) {
            $role_name = check_role($check_auth->role_id);
            $auth = array(
                    'id'        => $check_auth->id,
                    'name'      => $check_auth->name,
                    'email'     => $check_auth->email,
                    'role_id'   => $check_auth->role_id,
                    'role_name' => $role_name,
                    'logged_in' => 1,
            );
            
            $this->session->set_userdata($auth);
            return redirect(base_url('home'));
        }else{
            $this->session->set_flashdata('warning', "Email or Password is wrong!");
            return redirect(base_url('login'));
        }
    }  
}