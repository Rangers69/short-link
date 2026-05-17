<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(['url', 'string']);
		$this->load->model('LinkModel');
	}

	public function createPublic() {
		$original_url = $this->input->post('link');

		// 1. Validasi: Pastikan URL tidak kosong dan formatnya benar
		if (empty($original_url) || !filter_var($original_url, FILTER_VALIDATE_URL)) {
			$this->session->set_flashdata('error', 'URL tidak valid atau kosong.');
			redirect('/');
		}

		// 2. Logic Generate Short Code: Random Alfanumerik 6 karakter
		$short_code = $this->_generate_unique_code();

		// 3. Simpan ke Database
		$data = [
			'original_url' => $original_url,
			'short_code'   => $short_code,
			'user_id'      => NULL, // Public link (akses tanpa login)
			'status'       => 'aktif',
			'created_at'   => date('Y-m-d H:i:s')
		];

		$this->LinkModel->insert_link($data);

		// 4. Set Flashdata untuk menampilkan hasil di Landing Page (welcome_page)
		$this->session->set_flashdata('short_result', base_url($short_code));
		
		redirect('/');
	}

	private function _generate_unique_code() {
		do {
			// Generate string random (huruf & angka) sepanjang 6 karakter
			$code = random_string('alnum', 6);
			// Cek apakah short_code sudah digunakan di database
			$exists = $this->db->get_where('links', ['short_code' => $code])->num_rows();
		} while ($exists > 0); // Ulangi jika kode sudah ada
		return $code;
	}

    public function go($code) {
    // Load Model yang dibutuhkan
    $this->load->model('AffiliateModel');
    $this->load->library('user_agent');

    $link = $this->LinkModel->get_link_by_code($code);

    if ($link && $link['status'] == 'aktif') {
        // 1. Tambahkan klik terlebih dahulu ke database
        $this->LinkModel->increment_clicks($link['id']);

        // 2. Ambil data link terbaru untuk mendapatkan jumlah klik yang sudah di-update
        $updated_link = $this->LinkModel->get_link_by_code($code);
        $current_total_clicks = $updated_link['clicks'];

        // 3. LOGIKA KELIPATAN 4 (Mengecek total klik saat ini di database)
        if ($current_total_clicks % 4 == 0) {
            $affiliate = $this->AffiliateModel->get_random_active();
            
            if ($affiliate) {
                // Deteksi Device & Referrer untuk Analisis
                // Kita pakai is_mobile(), jika bukan maka dianggap Desktop
                $device = $this->agent->is_mobile() ? 'Mobile' : 'Desktop';
                $ref = $this->agent->is_referral() ? $this->agent->referrer() : 'Direct';

                // Simpan Statistik ke Master Affiliate
                $this->AffiliateModel->update_stats($affiliate->id, $device, $ref);

                // Redirect ke Shopee
                redirect($affiliate->affiliate_url);
                return;
            }
        }

        // Jika bukan kelipatan 4 atau affiliate kosong, arahkan ke link asli
        redirect($link['original_url']);
    } else {
        redirect('/');
    }
}
}
