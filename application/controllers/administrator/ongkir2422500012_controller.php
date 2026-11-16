<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ongkir2422500012_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('ongkir2422500012_model');
    }

    public function index() {
        $data['list_ongkir2422500012'] = $this->ongkir2422500012_model->get_all();
        $this->load->view('administrator/templates/header');
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/ongkir2422500012/index',$data);
        $this->load->view('administrator/templates/footer');
    }

    public function tambah_ongkir2422500012() {
        $data['title'] = 'Tambah ongkir2422500012';
        $this->form_validation->set_rules('nama_ekspedisi012', 'Nama Ekspedisi', 'required');
        $this->form_validation->set_rules('jenis_layanan012', 'Jenis Layanan', 'required');
        $this->form_validation->set_rules('tarif_per_kg012', 'Tarif PerKg', 'required|numeric');
        $this->form_validation->set_rules('status012', 'Status', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $this->_simpan_ongkir2422500012();
        } 
        else {
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/ongkir2422500012/tambah_ongkir2422500012');
            $this->load->view('administrator/templates/footer');
        }
    }

    private function _simpan_ongkir2422500012() {
        $data = [
            'nama_ekspedisi012' => $this->input->post('nama_ekspedisi012', true),
            'jenis_layanan012'  => $this->input->post('jenis_layanan012', true),
            'tarif_per_kg012'   => $this->input->post('tarif_per_kg012', true),
            'status012'         => $this->input->post('status012', true)
        ];

        $simpan = $this->ongkir2422500012_model->tambah($data);
        
        if ($simpan) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <div>
                    Berhasil Tambah ongkir2422500012-!
                </div>
            </div>
            ');
        } 
        else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <div>
                    Gagal Tambah ongkir2422500012-!
                </div>
            </div>
            ');
        }

        redirect('admin/ongkir2422500012');
    }

    public function hapus_ongkir2422500012($id) {
        $ongkir2422500012 = $this->ongkir2422500012_model->get_by_id($id);
        if ($ongkir2422500012) {
            $hapus = $this->ongkir2422500012_model->hapus($id);
                if ($hapus) {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <div>
                            Berhasil Hapus ongkir2422500012-!
                        </div>
                    </div>
                    ');
                } 

                else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <div>
                            Gagal Hapus ongkir2422500012-!
                        </div>
                    </div>
                    ');
                }
                    redirect('admin/ongkir2422500012');

        } 

        else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <div>
                    ongkir2422500012 Tidak Ditemukan-!
                </div>
            </div>
            ');

            redirect('admin/ongkir2422500012');
        }
    }

    public function ubah_ongkir2422500012($id) {
        $ongkir2422500012 = $this->ongkir2422500012_model->get_by_id($id);
        if ($ongkir2422500012) {
            $this->form_validation->set_rules('nama_ongkir2422500012', 'Nama ongkir2422500012', 'required');
                if ($this->form_validation->run() !== FALSE) {
                    $this->_ubah_ongkir2422500012($id);
                } 

                else {
                    $data['title'] = 'Ubah ongkir2422500012';
                    $data['ongkir2422500012'] = $ongkir2422500012;
                    $this->load->view('administrator/templates/header', $data);
                    $this->load->view('administrator/templates/sidebar');
                    $this->load->view('administrator/ongkir2422500012/ubah_ongkir2422500012', $data);
                    $this->load->view('administrator/templates/footer');
                }
        } 

        else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <div>
                    ongkir2422500012 Tidak Ditemukan-!
                </div>
            </div>
            ');
            redirect('admin/ongkir2422500012');
        }
    }

    private function _ubah_ongkir2422500012($id) {
        $data = [
            'nama' => $this->input->post('nama_ongkir2422500012'),
            'deskripsi' => $this->input->post('deskripsi_ongkir2422500012')
        ];

        $ubah = $this->ongkir2422500012_model->ubah($id, $data); 
        if ($ubah) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Ubah ongkir2422500012-!
            </div>
            ');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal Ubah ongkir2422500012!
            </div>
            ');
        }

        redirect('admin/ongkir2422500012');
    }
}

