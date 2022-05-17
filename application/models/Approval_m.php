<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('cuti');
        if ($id != null) {
            $this->db->where('id_cuti', $id);
        }
        $query = $this->db->get();
        return $query;
    }

	public function search($date1,$date2)
	{
		$this->db->select('nama_pegawai, divisi_d, pengajuan_cuti.*');
        $this->db->from('pengajuan_cuti');
        $this->db->join('users', 'pengajuan_cuti.user_id = users.id');
        $this->db->join('divisi', 'pengajuan_cuti.divisi_id = divisi.id_divisi');
		$this->db->where("pengajuan_cuti.created_at BETWEEN '$date1' AND '$date2'");
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
	}

    // public function add($post)
    // {
    //     $params = [
    //         'id_cuti' => $post['id'],
    //         'no_cuti' => $post['no_cuti'],
    //         'id_nama' => $post['nama'],
    //         'id_divisi' => $post['divisi'],
    //         'keperluan' => $post['keperluan'],
    //         'lama' => $post['lama'],
    //         'ket_lama' => $post['ket_lama'],
    //         'mulai' => $post['mulai'],
    //         'sampai' => $post['sampai'],
    //     ];
    //     $this->db->insert('cuti', $params);
    // }

    // public function edit($post)
    // {
    //     $params = [
    //         'id_cuti' => $post['id'],
    //         'no_cuti' => $post['no_cuti'],
    //         'id_nama' => $post['nama'],
    //         'id_divisi' => $post['divisi'],
    //         'keperluan' => $post['keperluan'],
    //         'lama' => $post['lama'],
    //         'ket_lama' => $post['ket_lama'],
    //         'mulai' => $post['mulai'],
    //         'sampai' => $post['sampai'],
    //     ];
    //     $this->db->where('id_cuti', $post['id']);
    //     $this->db->update('cuti', $params);
    // }

    public function del($id)
    {
        $this->db->where('id_cuti', $id);
        $this->db->delete('cuti');
    }
}
