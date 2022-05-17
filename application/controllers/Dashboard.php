<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');
		$tahun = date("Y");
		$this->db->select_sum('lama');
		$this->db->from('pengajuan_cuti');
		$this->db->where('status','1');
		$this->db->where('SUBSTRING(created_at,7,4)',$tahun);
		$this->db->where("user_id", $this->session->userdata('id_user'));
		$cuti = $this->db->get()->row_array();
		if ($cuti['lama'] == "") {
			$total = "0";
		} else {
			$total = $cuti['lama'];
		}
		$data['total_cuti'] = "12";
		$data['cuti_belum_terpakai'] = "12" - $cuti['lama'];
		$data['cuti_terpakai'] = $total;
		$this->template->load('template', 'dashboard',$data);
	}
}
