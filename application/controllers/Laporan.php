<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['approval_m', 'data_m', 'tunggu_m']);
	}

	public function approval()
	{

		if (isset($_POST['search'])) {
			$bulan = $this->input->post("bulan");
			$tahun = $this->input->post("tahun");
			$data['data_cuti'] = $this->tunggu_m->search($bulan,$tahun);
			$this->template->load('template', 'approval/approval_lap', $data);
		} else {
			$data['data_cuti'] = $this->tunggu_m->get();
			$this->template->load('template', 'approval/approval_lap', $data);
		}

	}

}
