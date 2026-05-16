<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function check_login($email, $password) {
        // Disarankan menggunakan password_hash & password_verify
        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}