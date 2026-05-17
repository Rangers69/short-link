<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function login() {
        if($this->session->userdata('logged_in')) redirect('admin');
        $this->load->view('auth/login');
    }

    public function login_process() {
        $this->load->model('AuthModel');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // 1. Cek apakah dia ADMIN
        $admin = $this->AuthModel->cek_admin($username, $password);
        if ($admin) {
            $sess_data = [
                'id_user'   => $admin->id,
                'username'  => $admin->username,
                'nama'      => $admin->nama_lengkap,
                'role'      => 'admin', // Penanda Role
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($sess_data);
            redirect('admin'); // Redirect ke Dashboard Admin
            return;
        }

        // 2. Jika bukan admin, cek apakah dia USER UMUM
        $user = $this->AuthModel->cek_user($username);
        if ($user && password_verify($password, $user->password)) {
            $sess_data = [
                'id_user'   => $user->id,
                'username'  => $user->username,
                'nama'      => $user->nama_lengkap,
                'role'      => 'user', // Penanda Role
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($sess_data);
            redirect('dashboard'); // Redirect ke Dashboard User Umum
            return;
        }

        // 3. Jika keduanya gagal
        $this->session->set_flashdata('error', 'Username atau Password salah!');
        redirect('auth/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function register() {
        $this->load->view('auth/register');
    }

    public function register_process() {
        $this->load->model('AuthModel');
        
        // Validasi sederhana (bisa ditambah Form Validation CI)
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username'     => $this->input->post('username'),
            'email'        => $this->input->post('email'),
            'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'status'       => 'aktif'
        ];

        if ($this->AuthModel->register_user($data)) {
            $this->session->set_flashdata('success', 'Pendaftaran berhasil! Silakan login ke akun Anda.');
            redirect('auth/login'); // Arahkan ke login user
        } else {
            $this->session->set_flashdata('error', 'Gagal mendaftar. Username atau Email mungkin sudah digunakan.');
            redirect('register');
        }
    }
}