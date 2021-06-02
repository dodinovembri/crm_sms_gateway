<?php
class Trash extends CI_Controller{
 
    function trash(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('trash');
        $this->load->view('templates/footer');
    }
	
}