<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatModel extends CI_Model {

    // Statistik Klik Per Hari (7 Hari Terakhir)
    public function get_click_chart($user_id) {
        $this->db->select('DATE(clicks.clicked_at) as tgl, COUNT(clicks.id) as jumlah');
        $this->db->from('clicks');
        $this->db->join('links', 'links.id = clicks.link_id');
        $this->db->where('links.user_id', $user_id);
        $this->db->where('clicks.clicked_at >=', date('Y-m-d', strtotime('-7 days')));
        $this->db->group_by('DATE(clicks.clicked_at)');
        return $this->db->get()->result_array();
    }

    // Statistik Berdasarkan Negara
    public function get_clicks_by_country($user_id) {
        $this->db->select('country_code, COUNT(clicks.id) as total');
        $this->db->from('clicks');
        $this->db->join('links', 'links.id = clicks.link_id');
        $this->db->where('links.user_id', $user_id);
        $this->db->group_by('country_code');
        $this->db->order_by('total', 'DESC');
        return $this->db->get()->result_array();
    }

    // Jam Ramai (Pola 24 Jam)
    public function get_peak_hours($user_id) {
        $this->db->select('HOUR(clicks.clicked_at) as jam, COUNT(clicks.id) as total');
        $this->db->from('clicks');
        $this->db->join('links', 'links.id = clicks.link_id');
        $this->db->where('links.user_id', $user_id);
        $this->db->group_by('HOUR(clicks.clicked_at)');
        $this->db->order_by('jam', 'ASC');
        return $this->db->get()->result_array();
    }
}