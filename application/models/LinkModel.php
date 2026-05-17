<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinkModel extends CI_Model {

    // Ambil semua link milik user tertentu dengan filter
    public function get_user_links($user_id, $search = null, $status = null) {
        $this->db->where('user_id', $user_id);
        if ($search) {
            $this->db->group_start();
            $this->db->like('short_code', $search);
            $this->db->or_like('custom_title', $search);
            $this->db->group_end();
        }
        if ($status && $status != 'Semua') {
            $this->db->where('status', $status);
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('links')->result_array();
    }

    // Hitung ringkasan untuk Dashboard
    public function get_dashboard_summary($user_id) {
        $data['total_link'] = $this->db->where('user_id', $user_id)->count_all_results('links');
        $data['total_aktif'] = $this->db->where(['user_id' => $user_id, 'status' => 'aktif'])->count_all_results('links');
        
        // Menghitung total klik dari semua link milik user
        $this->db->select('COUNT(clicks.id) as total_klik');
        $this->db->from('clicks');
        $this->db->join('links', 'links.id = clicks.link_id');
        $this->db->where('links.user_id', $user_id);
        $data['total_klik'] = $this->db->get()->row()->total_klik;

        return $data;
    }

    public function insert_link($data) {
        return $this->db->insert('links', $data);
    }

    public function update_status($link_id, $status) {
        $this->db->where('id', $link_id);
        return $this->db->update('links', ['status' => $status]);
    }
    public function get_link_by_code($code) {
        return $this->db->get_where('links', ['short_code' => $code])->row_array();
    }

    public function increment_clicks($id) {
        $this->db->set('clicks', 'clicks+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('links');
    }
}