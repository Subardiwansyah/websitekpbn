<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pembiayaan extends Base_Model {

	function __construct()
	{
		parent::__construct();
	}

	var $column_order = array('tb.ID', 'tb.NAMA_PEMBIAYAAN', 'tb.COA', 'tc.DESCRIPTION', 'tc.KET_KEGIATAN', );
	var $column_search = array('tb.ID', 'tb.NAMA_PEMBIAYAAN', 'tb.COA', 'tc.DESCRIPTION', 'tc.KET_KEGIATAN', );

	function build_query_daftar()
	{
		$this->db->select('
			tb.*,
			tc.DESCRIPTION,
			tc.KET_KEGIATAN
		');
		$this->db->from('t_budgeting_bagian tb');
		$this->db->join('t_rkap tc', 'tb.ID_RKAP = tc.ID', 'LEFT');
		$this->db->where('tb.KD_BAG', $this->session->userdata('ID_BAGIAN'));
	}

	function insert_pengajuan()
	{
		$id = $this->input->post('id') ? $this->input->post('id') : NULL;

		$this->db->select('1');
		$this->db->from('t_budgeting_bagian');
		$this->db->where('ID', $id);
		$rs = $this->db->get()->row_array();

		if($rs)
		{
			$data_x = array(
				'NAMA_PEMBIAYAAN' => $this->input->post('pembiayaan'),
				'COA' => $this->input->post('coa'),
				'ANGGARAN_1TAHUN' => string_float($this->input->post('sisa_rkap')),
				'JUMLAH_PENGAJUAN' => string_float($this->input->post('pengajuan')),
				'SISA_PEMBIAYAAN' => string_float($this->input->post('sisa_akhir')),
				'UPDATED_DATE' => date('Y-m-d H:i:s'),
				'UPDATED_BY' => $this->session->userdata('ID_USER')
			);
			$this->db->where('ID', $id);
			$this->db->update('t_budgeting_bagian', $data_x);
			$this->check_trans_status('update t_budgeting_bagian failed');
		}
		else
		{
			$data_x = array(
				'KD_BAG' => $this->session->userdata('ID_BAGIAN'),
				'NAMA_PEMBIAYAAN' => $this->input->post('pembiayaan'),
				'COA' => $this->input->post('coa'),
				'ID_RKAP' => $this->input->post('kegiatan'),
				'ANGGARAN_1TAHUN' => string_float($this->input->post('sisa_rkap')),
				'JUMLAH_PENGAJUAN' => string_float($this->input->post('pengajuan')),
				'SISA_PEMBIAYAAN' => string_float($this->input->post('sisa_akhir')),
				'CREATED_DATE' => date('Y-m-d H:i:s'),
				'CREATED_BY' => $this->session->userdata('ID_USER')
			);
	
			$this->db->insert('t_budgeting_bagian', $data_x);
			$this->check_trans_status('insert t_budgeting_bagian failed');
		}
	}

	function save_detail()
	{
		$this->insert_pengajuan();
		$this->history_coa_pengajuan();
	}
	
	function history_coa_pengajuan()
	{
		$id = $this->input->post('kegiatan') ? $this->input->post('kegiatan') : NULL;
		$this->db->select('*');
		$this->db->from('t_history_coa');
		$this->db->where('ID_RKAP', $id);
		$rs = $this->db->get()->row_array();
		
		if(empty($rs))
		{
			$data_x = array(
				'COA' => $this->input->post('coa'),
				'ID_RKAP' => $this->input->post('kegiatan'),
				'SISA_RKAP' => string_float($this->input->post('sisa_akhir')),
				'PENGAJUAN' => string_float($this->input->post('pengajuan')),
				'CREATED_DATE' => date('Y-m-d H:i:s')
			);
			$this->db->insert('t_history_coa', $data_x);
			$this->check_trans_status('insert t_history_coa failed');
		} else 
		{
			$data_x = array(
				'SISA_RKAP' => string_float($this->input->post('sisa_akhir')),
				'PENGAJUAN' => string_float($this->input->post('pengajuan')),
			);
			$this->db->where('ID_RKAP', $id);
			$this->db->update('t_history_coa', $data_x);
			$this->check_trans_status('update t_history_coa failed');
		}
	}

	function save_data_pembiayaan()
	{
		$this->db->trans_begin();
		try {
			$this->save_detail();
		}
		catch(Exception $e){
		// TODO : log error to file
		}

		if ($this->db->trans_status() === FALSE)
		{
		$this->id = NULL;
		$this->nomor = NULL;
		$this->last_error_message = $this->db->error();
		$this->db->trans_rollback();
		return FALSE;
		}

		$this->db->trans_commit();

		return TRUE;
	}

	function build_query_form($id=NULL)
	{
		$this->db->select('tb.*, tc.KET_COA');
		$this->db->from('t_budgeting_bagian tb');
		$this->db->join('t_coa tc', 'tb.COA = tc.COA_ID', 'LEFT');
		$this->db->where('tb.id', $id);
	}

	function cek_exist()
	{
		return 1;
	}

	function check_dependency()
	{
		return TRUE;
	}

	function build_query_hapus($id=NULL)
	{
		$this->db->where('ID', $id);
		$this->db->delete('t_budgeting_bagian');
		$this->check_trans_status('delete t_budgeting_bagian failed');
	}

}
?>