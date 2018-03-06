<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_login();
	}

	private function cek_login()
	{

		if ($this->session->userdata('usersiswa')) {
			redirect(base_url().'dashboard');
		}
		else{
			redirect(base_url());
		}

	}

}
