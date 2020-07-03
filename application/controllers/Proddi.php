<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proddi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_proddi');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('proddi/proddi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_proddi->json();
    }

    public function read($id) 
    {
        $row = $this->M_proddi->get_by_id($id);
        if ($row) {
            $data = array(
		'no' => $row->no,
		'nama_prodi' => $row->nama_prodi,
	    );
            $this->load->view('proddi/proddi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proddi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('proddi/create_action'),
	    'no' => set_value('no'),
	    'nama_prodi' => set_value('nama_prodi'),
	);
        $this->load->view('proddi/proddi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
	    );

            $this->M_proddi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proddi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_proddi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proddi/update_action'),
		'no' => set_value('no', $row->no),
		'nama_prodi' => set_value('nama_prodi', $row->nama_prodi),
	    );
            $this->load->view('proddi/proddi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proddi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no', TRUE));
        } else {
            $data = array(
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
	    );

            $this->M_proddi->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proddi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_proddi->get_by_id($id);

        if ($row) {
            $this->M_proddi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proddi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proddi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_prodi', 'nama prodi', 'trim|required');

	$this->form_validation->set_rules('no', 'no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "proddi.xls";
        $judul = "proddi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Prodi");

	foreach ($this->M_proddi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_prodi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=proddi.doc");

        $data = array(
            'proddi_data' => $this->M_proddi->get_all(),
            'start' => 0
        );
        
        $this->load->view('proddi/proddi_doc',$data);
    }

}

/* End of file Proddi.php */
/* Location: ./application/controllers/Proddi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-22 11:24:28 */
/* http://harviacode.com */