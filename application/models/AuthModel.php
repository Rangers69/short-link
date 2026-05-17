<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('admins')->row();
    }

    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function cek_admin($username, $password) {
        // Admin masih pakai MD5 sesuai setup awal kita
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get('admins')->row();
    }

    public function cek_user($username) {
        // Ambil data user berdasarkan username saja (password dicek di controller)
        $this->db->where('username', $username);
        $this->db->where('status', 'aktif');
        return $this->db->get('users')->row();
    }
}