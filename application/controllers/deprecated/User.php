<?php
class User extends CI_Controller{
 
    function user(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user');
        $this->load->view('templates/footer');
    }
}