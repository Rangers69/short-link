<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
    if ($this->session->userdata('user_id')) {
			// Jika sudah login, arahkan ke dashboard
			redirect('dashboard');
		} else {
			// Jika belum login, tampilkan landing page
			$this->load->view('welcome_page');
		}
	}
}
