<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index()
	{        
        $user_id = $this->session->userdata('id');
        $data['profile'] = $this->UserModel->getById($user_id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
	}

    public function update($id)
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $image = $this->input->post('image');
        $birth_place = $this->input->post('birth_place');
        $religion = $this->input->post('religion');
        $sex = $this->input->post('sex');
        $address = $this->input->post('address');
        $phone_number = $this->input->post('phone_number');
        $role_id = $this->input->post('role_id');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');
        $status = $this->input->post('status');

        if ($password != $password_confirm) {
            $this->session->set_flashdata('warning', "Password entered is doesn't match");
            return redirect(base_url('user'));
        }else{
            $password = md5($password);    

            // for image
            $image = uniqid();
            $config['upload_path']          = './uploads/user/';
            $config['allowed_types']        = 'gif|jpg|png';            
            $config['file_name']            = $image;

            $this->load->library('upload', $config); 

            if ($this->upload->do_upload('image'))
            {
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'image' => $this->upload->data('file_name'),
                    'birth_place' => $birth_place,
                    'religion' => $religion,
                    'sex' => $sex,
                    'address' => $address,
                    'phone_number' => $phone_number,
                    'password' => $password,
                    'role_id' => $role_id,
                    'status' => $status
                );
            }
            else
            {                          
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'birth_place' => $birth_place,
                    'religion' => $religion,
                    'sex' => $sex,
                    'address' => $address,
                    'phone_number' => $phone_number,
                    'password' => $password,
                    'role_id' => $role_id,
                    'status' => $status
                );
            }

            $id = $this->session->userdata('id');
            $this->UserModel->update($data, $id);
            $this->session->set_flashdata('success', "Success update user!");
            return redirect(base_url('profile'));
        }
    }

    public function change_password()
    {
        $this->load->view('templates/header');
		$this->load->view('profile/change_password');
        $this->load->view('templates/footer');
    }

    public function update_password()
    {
        $id = $this->session->userdata('id');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');
        
        if ($password != $password_confirm) {
            $this->session->set_flashdata('warning', "Password entered is doesn't match");
            return redirect(base_url('profile'));
        }else{
            $password = md5($password);    
            $data = array(
                'password' => $password
            );

        $this->UserModel->update($data, $id);
        $this->session->set_flashdata('success', "Success update password!");
        return redirect(base_url('profile'));
        }
    }
}
