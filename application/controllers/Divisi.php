<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('divisi_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->divisi_m->get();
        $this->template->load('template', 'divisi/divisi_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('no_divisi', 'No. Divisi', 'required');
        $this->form_validation->set_rules('divisi_d', 'Divisi', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'divisi/divisi_form');
        } else {
            $divisi_post = [
                'no_divisi' => $this->input->post('no_divisi'),
                'divisi_d' => $this->input->post('divisi_d'),
            ];

            $cek_user = $this->db->get_where('divisi', ['no_divisi' => $this->input->post('no_divisi')])->row_array();
            if (is_null($cek_user)) {
                $this->db->insert('divisi', $divisi_post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>
                            alert('Data departemen berhasil ditambahkan');
                        </script>";
                }
                echo "<script>window.location='" . site_url('divisi') . "';</script>";
            } else {
                echo "<script>
                    alert('Data divisi sudah ada !');
                    </script>";
                echo "<script>window.location='" . site_url('divisi/add') . "';</script>";
            }
        }


        // $divisi = new stdClass();
        // $divisi->id_divisi = null;
        // $divisi->no_divisi = null;
        // $divisi->divisi_d = null;
        // $data = array(
        // 'page' => 'add',
        //'row' => $divisi,
        //'rules' => 'required', 'is_unique',
        //'errors' => array('required' => '%s masih kosong, silahkan diisi', 'is_unique' => '%s sudah ada, silahkan ganti')
        //);

        //$this->template->load('template', 'divisi/divisi_form', $data);
    }

    public function edit($id)
    {
        $data = array(
            'page' => 'add',
            'divisi_by_id' => $this->db->get_where('divisi', ['id' => $id])->row_array()
        );
        $this->form_validation->set_rules('no_divisi', 'No. Divisi', 'required');
        $this->form_validation->set_rules('divisi_d', 'Divisi', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');


        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'divisi/divisi_edit', $data);
        } else {
            $divisi_post = [
                'no_divisi' => $this->input->post('no_divisi'),
                'div' => $this->input->post('divisi_d'),
            ];

            $this->db->where('id', $id);
            $this->db->update('divisi', $divisi_post);
            echo "<script>
                    alert('Data departemen berhasil ubah');
                </script>";
            echo "<script>window.location='" . site_url('divisi') . "';</script>";
        }


        // $query = $this->divisi_m->get($id);
        //if ($query->num_rows() > 0) {
        //  $data = $query->row();
        // $data = array(
        //   'page' => 'edit',
        // 'row' => $data
        //);
        //$this->template->load('template', 'divisi/divisi_form', $data);
        //} else {
        //  echo "<script>alert('Data tidak ditemukan');";
        // echo "window.location='" . site_url('divisi') . "';</script>";
        //}
    }


    //public function process()
    //{
    //  $post = $this->input->post(null, TRUE);
    //if (isset($_POST['add'])) {
    //   $this->divisi_m->add($post);
    //} else if (isset($_POST['edit'])) {
    //  $this->divisi_m->edit($post);
    //}

    //if ($this->db->affected_rows() > 0) {
    //  echo "<script>alert('Data berhasil disimpan');</script>";
    //}
    //echo "<script>window.location='" . site_url('divisi') . "';</script>";
    //}

    public function del($id)
    {
        $this->divisi_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('divisi') . "';</script>";
    }
}
