<?php
class Mail_box extends CI_Controller{
 
    function inbox(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('inbox');
        $this->load->view('templates/footer');
    }
	
	function outbox(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('outbox');
        $this->load->view('templates/footer');
        
    }
	
	function draft(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('draft');
        $this->load->view('templates/footer');
    }

    function read_mail(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('read_mail');
        $this->load->view('templates/footer');
    }
}