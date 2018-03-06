<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wali extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
	function index(){

		header('Expires: Mon, 1 Jul 1998 01:00:00 GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');
		header( "Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT" );

		if ($this->session->userdata('usersiswa') and $this->session->userdata('ket')=='wali') {
			$data = array(
				'nama' => $this->session->userdata('namasis'),
				'nis' => $this->session->userdata('nis'),
				'ket' => $this->session->userdata('ket'),
			);

			$this->load->view('wali/dashboardw', $data);

		}
		else{

			$db='m_login';
			$sub_data['info']=$this->session->userdata('info');
			if ($this->input->post('login')) {
				$this->form_validation->set_rules('nis','NIS Pengguna','trim|required|max_length[20]|xss_clean');
				$this->form_validation->set_error_delimiters('<div class="warning-valid">','</div>');
				if($this->form_validation->run()==TRUE){
					$this->$db->log();
				}
			}

			$this->load->view('wali/loginwali', $sub_data);

			$this->session->unset_userdata('info');
		}
	}
	/*public function index()
	{
		$this->load->view('wali/loginwali');
	}*/
public function log(){
	$data = array(
		'nis' => $this->input->post('nis', TRUE),
		);
		if(!preg_match("/^[0-9]*$/", $data['nis'])){
			$data['nis'] = "080299";
		}
	$hasil = $this->model->GetUser($data);
	if ($hasil->num_rows() == 1) {
		foreach ($hasil->result() as $sess) {
			 $sess_data['logged_in'] = 'Sudah Loggin';
			$sess_data['kd_sis'] = $sess->kd_sis;
			$sess_data['nis'] = $sess->nis;
			$sess_data['namasis'] = $sess->nama;
			$sess_data['email'] = $sess->email;
			$sess_data['status'] = $sess->status;
			$sess_data['kelas'] = $sess->kelas;
			$sess_data['ket'] = 'wali';
			$this->session->set_userdata($sess_data);
		}
		if ($this->session->userdata('status')=='1') {
			$this->session->set_userdata('usersiswa', $sess_data);
			$data = array(
				'nama' => $this->session->userdata('namasis'),
				'nis' => $this->session->userdata('nis'),
				'ket' => $this->session->userdata('ket'),
			);

			redirect(base_url().'wali/profil');

		}
		else{
			$this->session->set_userdata('usersiswa', $sess_data);
			redirect(base_url().'wali');
		}
	}
	else {
		$info='<div style="color:#fff">PERIKSA KEMBALI NIS ANDA!</div>';
		$this->session->set_userdata('info',$info);
		redirect(base_url().'wali');
	}
}
	public function profil(){
			$nis = $this->session->userdata('nis');
				$data_siswa = $this->model->getsiswa(" where nis = '$nis'")->result_array();
				$totpelanggaran = $this->model->totpelanggaran(" and nis = '$nis' ")->result_array();
				$totpengharga = $this->model->totpengharga(" and nis = '$nis'")->result_array();

				$data = array(
					'nama' => $this->session->userdata('namasis'),
					'nis' => $this->session->userdata('nis'),
					'kelas' =>$this->session->userdata('kelas'),
					'data_poin' => $this->model->getpoin(" where nis = '$nis' and konfirmasi = 'benar' order by tanggal desc")->result_array(),
					'tpoin' => $data_siswa[0]['tpoin'],
					'tpelanggaran' => $totpelanggaran[0]['totpelanggaran'],
					'tpengharga' => $totpengharga[0]['totpengharga'],

				);
		$this->load->view('wali/profilw',$data);
	}

public function pasal()
{
	$nis = $this->session->userdata('nis');
	$data = array(
		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),
		'data_pasal' => $this->model->getpasal("order by no asc")->result_array(),
	);

	$this->load->view('wali/pasal', $data);
}

public function tentang(){

	$data = array(

		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),

	);
	$this->load->view('wali/tentangw',$data);
}
public function tertib(){

	$data = array(

		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),

	);
	$this->load->view('wali/tertib',$data);
}

function logout(){
	$this->session->sess_destroy();
	redirect(base_url());
}
}

// Email: unggulzb@gmail.com
