<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat semua model yang dibutuhkan
        $this->load->model(['LinkModel', 'AffiliateModel', 'UserModel', 'StatModel']);
        
        // Proteksi Halaman: Pastikan user sudah login
        // Asumsi session 'user_id' diatur saat login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    // 1. HALAMAN UTAMA (Dashboard)
    public function index() {
        // Pastikan session ID diambil dengan benar
        $user_id = $this->session->userdata('user_id');
        
        $this->load->model('LinkModel');

        // Ambil data (Model sekarang menjamin output array)
        $all_links = $this->LinkModel->get_links_by_user($user_id);

        // Siapkan data untuk dikirim ke view
        $data['my_links']     = $all_links;
        $data['total_links']  = count($all_links);
        $data['total_clicks'] = 0;

        foreach ($all_links as $l) {
            $data['total_clicks'] += (int)$l['clicks'];
        }

        $data['title'] = "Dashboard - Bitlytic";
       
        // Load view
        $this->load->view('public/dashboard/index', $data);
    }

    // 2. HALAMAN DAFTAR LINK (Link Saya)
    public function links() {
        $user_id = $this->session->userdata('user_id');
        
        // Mengambil input filter dari pencarian di gambar
        $search = $this->input->get('cari');
        $status = $this->input->get('status');

        $data['title'] = "Link Saya";
        $data['links'] = $this->Link_model->get_user_links($user_id, $search, $status);

        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/links', $data);
        $this->load->view('layout/footer');
    }

    // 3. PROSES BUAT LINK BARU
    public function create_link() {
        // Validasi Form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('original_url', 'URL Asli', 'required|valid_url');
        $this->form_validation->set_rules('short_code', 'Short Code', 'required|is_unique[links.short_code]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('dashboard/links');
        } else {
            $data = [
                'user_id'      => $this->session->userdata('user_id'),
                'original_url' => $this->input->post('original_url'),
                'short_code'   => $this->input->post('short_code'),
                'custom_title' => $this->input->post('custom_title'),
                'status'       => 'aktif'
            ];

            $this->Link_model->insert_link($data);
            $this->session->set_flashdata('success', 'Link berhasil dibuat!');
            redirect('dashboard/links');
        }
    }

    // 4. TOGGLE STATUS (Aktif/Nonaktif)
    public function toggle_status($id) {
        $current_status = $this->input->post('status');
        $new_status = ($current_status == 'aktif') ? 'nonaktif' : 'aktif';
        
        $this->Link_model->update_status($id, $new_status);
        echo json_encode(['status' => 'success', 'new_status' => $new_status]);
    }

    // 5. HALAMAN STATISTIK
    public function statistics() {
        $user_id = $this->session->userdata('user_id');
        
        $data['title'] = "Statistik Link";
        $data['chart_data'] = $this->Stat_model->get_click_chart($user_id);
        $data['country_data'] = $this->Stat_model->get_clicks_by_country($user_id);
        $data['peak_hours'] = $this->Stat_model->get_peak_hours($user_id);

        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/statistics', $data);
        $this->load->view('layout/footer');
    }

    // 6. HALAMAN AKUN
    public function profile() {
        $user_id = $this->session->userdata('user_id');
        
        $data['title'] = "Pengaturan Akun";
        $data['user'] = $this->User_model->get_user_by_id($user_id);

        if ($this->input->post()) {
            $update_data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email')
            ];
            
            // Cek jika password ingin diubah
            if ($this->input->post('password')) {
                $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->User_model->update_user($user_id, $update_data);
            $this->session->set_flashdata('success', 'Profil diperbarui!');
            redirect('dashboard/profile');
        }

        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/profile', $data);
        $this->load->view('layout/footer');
    }
}