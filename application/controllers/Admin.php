<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('LinkModel');
        $this->load->model('AffiliateModel');
    }

    public function index() {
        $this->load->model('AffiliateModel');
        $data['affiliate_data'] = $this->db->get('master_affiliate')->result_array();
        
        // Load view dashboard yang kita buat tadi
        $this->load->view('admin/index', $data);
    }

    public function add_affiliate_action() {
        $this->load->model('AffiliateModel');

        $product_name = $this->input->post('product_name');
        $affiliate_url = $this->input->post('affiliate_url');

        // SISTEM OTOMATIS BEKERJA DI SINI
        $category = $this->AffiliateModel->auto_detect_category($product_name);

        $data = [
            'product_name'  => $product_name,
            'affiliate_url' => $affiliate_url,
            'category'      => $category, // Hasil deteksi otomatis
            'status'        => 'aktif',
            'created_at'    => date('Y-m-d H:i:s')
        ];

        if ($this->AffiliateModel->insert_affiliate($data)) {
            $this->session->set_flashdata('success', "Produk berhasil ditambah ke kategori: $category");
        } else {
            $this->session->set_flashdata('error', "Gagal menambah produk.");
        }

        redirect('admin');
    }

    public function toggle_status($id) {
        // Ambil data produk berdasarkan ID
        $product = $this->db->get_where('master_affiliate', ['id' => $id])->row();

        if ($product) {
            // Logika Toggle: jika aktif jadi nonaktif, dan sebaliknya
            $new_status = ($product->status == 'aktif') ? 'nonaktif' : 'aktif';
            
            $this->db->where('id', $id);
            $this->db->update('master_affiliate', ['status' => $new_status]);

            $this->session->set_flashdata('success', "Status produk '{$product->product_name}' berhasil diubah menjadi $new_status.");
        } else {
            $this->session->set_flashdata('error', "Gagal mengubah status, produk tidak ditemukan.");
        }

        // Kembali ke halaman admin
        redirect('admin');
    }
}