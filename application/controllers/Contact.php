<?php
class Contact extends CI_Controller{
 
    function group_contact(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('group_contact');
        $this->load->view('templates/footer');
    }
	
	function contact_list(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_list');
        $this->load->view('templates/footer');
    }

    function import_contact(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('import_contact');
        $this->load->view('templates/footer');
    }

    function import_contact1(){        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('import_contact1');
        $this->load->view('templates/footer');
    }
}