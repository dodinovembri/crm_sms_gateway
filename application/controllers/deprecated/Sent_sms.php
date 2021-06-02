<?php
class Sent_sms extends CI_Controller{
 
    function single_message(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('single_message');
        $this->load->view('templates/footer');
    }
	
	function broadcast_message(){
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('broadcast_message');
        $this->load->view('templates/footer');
    }
	
	function autoreply(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('autoreply');
        $this->load->view('templates/footer');
    }

    function addautoreply(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('add_new_autoreply');
        $this->load->view('templates/footer');
    }
}
 