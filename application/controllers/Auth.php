<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function login() {
        if($this->session->userdata('logged_in')) redirect('admin');
        $this->load->view('auth/login');
    }

    public function login_process() {
        $this->load->model('AuthModel');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $cek = $this->AuthModel->login($user, $pass);

        if ($cek) {
            $sess_data = [
                'id_admin' => $cek->id,
                'username' => $cek->username,
                'nama'     => $cek->nama_lengkap,
                'logged_in'=> TRUE
            ];
            $this->session->set_userdata($sess_data);
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}