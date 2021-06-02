<?php
class Logout extends CI_Controller{
 
    function logout(){        
        $this->load->view('login');
    }
}