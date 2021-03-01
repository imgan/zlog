<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dcmidi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_dcmidi');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data = array(
				'page_content'      => '../pageadmin/dcmidi/view',
				'ribbon'            => '<li class="active">Daftar DC Midi</li>',
				'page_name'         => 'Daftar DC Midi',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_dcmidi->viewOrdering('dc_midi', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$data = array(
				'nama'  => $this->input->post('e_nama'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'titik_kordinat'  => $this->input->post('e_titik_kordinat'),
				'alamat'  => $this->input->post('e_alamat'),
				'pic_dcmidi'  => $this->input->post('e_pic_dcmidi'),
				'telp'  => $this->input->post('e_telp'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy'	=> $this->session->userdata('name')
			);
			$action = $this->model_dcmidi->update($data_id, $data, 'dc_midi');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_dcmidi->viewWhere('dc_midi', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

    public function delete()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

            $data_id = array(
                'id'  => $this->input->post('id')
            );
            $action = $this->model_dcmidi->delete($data_id, 'dc_midi');
            echo json_encode($action);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }


    public function simpan()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

            $data = array(
                'nama'  => $this->input->post('nama'),
				'keterangan'  => $this->input->post('keterangan'),
				'titik_kordinat'  => $this->input->post('titik_kordinat'),
				'alamat'  => $this->input->post('alamat'),
				'pic_dcmidi'  => $this->input->post('pic_dcmidi'),
				'telp'  => $this->input->post('telp'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
            );
			$cek = $this->model_dcmidi->checkDuplicate($data,'dc_midi');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_dcmidi->insert($data, 'dc_midi');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
