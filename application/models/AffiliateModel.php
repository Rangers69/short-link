<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AffiliateModel extends CI_Model {

    public function get_random_active() {
        $this->db->where('status', 'aktif');
        $this->db->order_by('id', 'RANDOM');
        $query = $this->db->get('master_affiliate', 1);
        return $query->row();
    }

    public function update_stats($id, $device, $referrer) {
        $this->db->set('total_clicks', 'total_clicks+1', FALSE);
        $this->db->set('last_used_at', 'NOW()', FALSE);
        $this->db->set('top_device', $device);
        $this->db->set('top_referrer', $referrer);
        $this->db->where('id', $id);
        $this->db->update('master_affiliate');
    }

    // Fungsi deteksi otomatis berdasarkan nama produk
    public function auto_detect_category($product_name) {
       $name = strtolower($product_name);
        
        // Mapping Keyword ke Kategori
       $map = [
            'Elektronik'     => [
                'hp', 'laptop', 'mouse', 'keyboard', 'headset', 'tws', 'charger', 'kabel', 'monitor', 'cpu', 
                'powerbank', 'speaker', 'mic', 'tablet', 'ipad', 'handphone', 'ssd', 'vga', 'ram', 'router', 
                'smartwatch', 'earphone', 'proyektor', 'adapter'
            ],
            'Fashion'        => [
                'baju', 'kaos', 'kemeja', 'celana', 'rok', 'sepatu', 'sandal', 'hoodie', 'jaket', 'tas', 
                'topi', 'kaos kaki', 'jeans', 't-shirt', 'gamis', 'hijab', 'ikat pinggang', 'dompet', 
                'ransel', 'totebag', 'vest', 'sweater', 'outer', 'blouse'
            ],
            'Kecantikan'     => [
                'serum', 'skincare', 'sunscreen', 'lipstik', 'bedak', 'masker', 'toner', 'moisturizer', 
                'foundation', 'eyeliner', 'parfum', 'facial wash', 'essence', 'blush on', 'eyebrow', 
                'shampoo', 'conditioner', 'body lotion', 'scrub', 'cleansing'
            ],
            'Rumah Tangga'   => [
                'botol', 'piring', 'gelas', 'sapu', 'pel', 'sprei', 'lampu', 'organizer', 'rak', 'gantungan', 
                'kursi', 'meja', 'spatula', 'kotak makan', 'termos', 'wajan', 'panci', 'pisau', 'talenan', 
                'tirai', 'karpet', 'bantal', 'jemuran', 'vacuum', 'blender', 'magic com'
            ],
            'Hobi & Koleksi' => [
                'mainan', 'action figure', 'kartu', 'lego', 'pancing', 'sepeda', 'kamera', 'drone', 
                'hotwheels', 'gundam', 'puzzle', 'alat musik', 'gitar', 'biola', 'tenda', 'camping', 
                'raket', 'jersey', 'papan tulis', 'skate'
            ],
            'Kesehatan'      => [
                'masker medis', 'vitamin', 'suplemen', 'obat', 'madu', 'timbangan', 'termometer', 
                'minyak kayu putih', 'handsanitizer', 'koyo', 'perban', 'kesehatan'
            ],
            'Otomotif'       => [
                'helm', 'oli', 'ban', 'lampu mobil', 'spion', 'sarung motor', 'lap microfiber', 
                'parfum mobil', 'kunci pas', 'busi', 'klakson', 'aksesoris motor'
            ],
            'Alat Tulis & Kantor' => [
                'buku', 'pulpen', 'pensil', 'penghapus', 'penggaris', 'stapler', 'kertas', 'spidol', 
                'map', 'binder', 'lakban', 'gunting', 'cutter'
            ]
        ];

        foreach ($map as $category => $keywords) {
            foreach ($keywords as $keyword) {
                // Jika kata kunci ditemukan dalam nama produk
                if (strpos($name, $keyword) !== false) {
                    return $category;
                }
            }
        }

        // Jika tidak ada keyword yang cocok
        return 'Lain-lain';
    }

    // Simpan data affiliate baru
    public function insert_affiliate($data) {
        return $this->db->insert('master_affiliate', $data);
    }
}