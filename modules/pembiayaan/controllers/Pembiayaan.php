<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembiayaan extends Base_Controller {

	function __construct()
	{
		parent::__construct($securePage=true);

		$this->modul_name = 'pembiayaan';
		$this->daftar_display = 'List Pembiayaan';
		$this->form_display = 'Form Pembiayaan';
		$this->modul_display = 'Pembiayaan';
		$this->view_list = 'barang_list_view';
		$this->view_form = 'barang_form_view';
		$this->view_view = 'barang_view_view';
		$this->view_download = 'barang_download_view';
		$this->load->model('Master_pembiayaan', 'data_model');
	}
	
	function summernote(){
		$this->load->view('summernote');
	}

	function index()
	{
		$data['breadcrumb_daftar'] = $this->daftar_display;
		$data['breadcrumb_form'] = $this->form_display;
		$data['modul'] = $this->modul_name;
		$data['modul_display'] = $this->modul_display;
		$data['main_content'] = $this->view_list;

		$this->load->view('partial/template_view', $data);
	}

	function get_daftar()
	{
		$id_level = $this->session->userdata('ID_LEVEL');

		$list = $this->data_model->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $field)
		{
			$no++;
			$row = array();
			$button = $field->STATUS == 0 ? '<center><button onClick="lihat(\''.$field->ID.'\')" type="button" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" title="Lihat"><i class="fal fa-eye"></i></button> <button onClick="ubah(\''.$field->ID.'\')" type="button" class="btn btn-success btn-sm btn-icon waves-effect waves-themed" title="Ubah"><i class="fal fa-edit"></i></button> <button onClick="hapus(\''.$field->ID.'\')" type="button" class="btn btn-danger btn-sm btn-icon waves-effect waves-themed" title="Hapus"><i class="fal fa-trash-alt"></i></button></center>' : "";

			$row[] = $button;
			$row[] = "<div align='left'>".$field->NAMA_PEMBIAYAAN."</div>";
			$row[] = $field->COA;
			$row[] = $field->DESCRIPTION;
			$row[] = $field->KET_KEGIATAN;
			$row[] = 'Rp.'.number_format($field->ANGGARAN_1TAHUN);		
			$row[] = 'Rp.'.number_format($field->JUMLAH_PENGAJUAN);		
			$row[] = 'Rp.'.number_format($field->SISA_PEMBIAYAAN);		
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->data_model->count_all(),
			"recordsFiltered" => $this->data_model->count_filtered(),
			"data" => $data,
		);

		echo json_encode($output);
	}

	function form($id=0)
	{
		$data['breadcrumb_daftar'] = $this->daftar_display;
		$data['breadcrumb_form'] = $this->form_display;
		$data['modul'] = $this->modul_name;
		$data['modul_display'] = $this->modul_display;
		$data['main_content'] = $this->view_form;

		$id = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		if ($id !== 0)
		{
			$data['data'] = $this->data_model->get_data_by_id($id);
		}

		$this->load->view('partial/template_view', $data);
	}

	function lihat($id=0)
	{
		$data['breadcrumb_daftar'] = $this->daftar_display;
		$data['breadcrumb_form'] = $this->form_display;
		$data['modul'] = $this->modul_name;
		$data['modul_display'] = $this->modul_display;
		$data['main_content'] = $this->view_view;

		$id = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		if ($id !== 0)
		{
			$data['data'] = $this->data_model->get_data_by_id($id);
		}

		$this->load->view('partial/template_view', $data);
	}

	function proses()
	{
		$response = (object) NULL;
		$success = $this->data_model->save_data_pembiayaan();
		if($success)
		{
			$response->isSuccess = TRUE;
			$response->message = 'Data berhasil disimpan';
			$response->error = NULL;
			$response->sql = $this->db->queries;
		}
		else
		{
			$response->isSuccess = FALSE;
			$response->message = 'Data gagal disimpan';
			$response->error = $this->data_model->last_error_message;
			$response->sql = $this->db->queries;
		}

		echo json_encode($response);
	}

	function hapus(){
		$response = (object) NULL;
		$id = $this->input->post('id') ? $this->input->post('id') : NULL;
		$hapus = $this->data_model->delete_data($id);
		if ($hapus)
		{
			$response->isSuccess = TRUE;
			$response->message = 'Data berhasil dihapus';
		}
		else
		{
			$response->isSuccess = FALSE;
			$response->message = 'Data gagal dihapus';
			$response->error = $this->data_model->last_error_message;
		}
		echo json_encode($response);
	}

}
?>