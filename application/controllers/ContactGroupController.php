<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactGroupController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['ContactGroupModel', 'ContactModel']);
        $this->load->library('Excel');

        if ($this->session->userdata('logged_in') != 1) {
            return redirect(base_url('login'));
        }
    }

	public function index($id)
	{
        $alternative = array(
            'group_id' => $id
        );

        $this->session->set_userdata($alternative);

        $data['contact_groups'] = $this->ContactGroupModel->getWithJoin($id)->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $data['contacts'] = $this->ContactModel->get()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $contact = $this->input->post('contact');
        $group_id = $this->session->userdata('group_id');
        foreach ($contact as $key => $value) {
            $data = array(
                'contact_id' => $value,
                'group_id' => $group_id,
                'status' => 1
            );    
            $this->ContactGroupModel->insert($data);
        }
        $this->session->set_flashdata('success', "Success create new contact group!");
        return redirect(base_url("contact_group/$group_id"));
    }

    public function show($id)
    {
        $data['contact_group'] = $this->ContactGroupModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/show', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['contact_group'] = $this->ContactGroupModel->getById($id)->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('contact_group/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $group_id = $this->input->post('group_id');
        $status = $this->input->post('status');

        $data = array(
            'group_id' => $group_id,
            'status' => $status
        );

        $this->ContactGroupModel->update($data, $id);
        $this->session->set_flashdata('success', "Success update contact group!");
        return redirect(base_url('contact_group'));
    }

    public function destroy($id)
    {
        $group_id = $this->session->userdata('group_id');
        $this->ContactGroupModel->destroy($id);        
        $this->session->set_flashdata('success', "Success deleted data!");
        return redirect(base_url("contact_groups/$group_id"));
    }

    public function upload()
    {
        // $fileName = $_FILES['file']['name'];
        $group_id = $this->session->userdata('group_id');
        $fileNametemp = uniqid();
        // $config['file_name']            = $fileNametemp;
        // $fileName = $config['file_name'];
          
        $config['upload_path'] = './assets/contacts'; //path upload 
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        $config['file_name'] = $fileNametemp;  // nama file
 
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('file') ){
            echo $this->upload->display_errors();exit();
        }
              
        $fileName = $this->upload->data('file_name');
        // $inputFileName = base_url("/assets/contacts/$fileName");
        $inputFileName = './assets/contacts/'.$fileName;

        // try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            // } catch(Exception $e) {
            //     die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            // }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 4; $row <= $highestRow; $row++){  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);   
 
                 // Sesuaikan key array dengan nama kolom di database                                                         
                 $data = array(
                    "participants_number"=> $rowData[0][0],
                    "name"=> $rowData[0][1],
                    "phone_number"=> $rowData[0][2],
                    "major"=> $rowData[0][3],
                    "status" => 1,
                );
 
                $this->ContactModel->insert($data);
                $last_id = $this->db->insert_id();

                $data_group = array(
                    "contact_id" => $last_id,
                    "group_id" => $group_id,
                    "status" => 1,
                );

                $this->ContactGroupModel->insert($data_group);

            }
            $this->session->set_flashdata('success', "Success insert contact to this group!");
            $group_id = $this->session->userdata('group_id');
            return redirect(base_url("contact_groups/$group_id"));
    }

    public function destroy_all($id)
    {
        // $id = $this->input->post('ID');
        $delete = $this->ContactGroupModel->getByWhere($id)->result();
    
        foreach ($delete as $key => $value) {
            $this->ContactGroupModel->destroy($value->id); 
        }

        $this->session->set_flashdata('success', "Success deleted data!");
        $group_id = $this->session->userdata('group_id');
        return redirect(base_url("contact_groups/$group_id"));
    }       
}
