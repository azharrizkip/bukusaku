<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class siswa extends CI_Controller {

	function index(){

		header('Expires: Mon, 1 Jul 1998 01:00:00 GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');
		header( "Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT" );

		if ($this->session->userdata('usersiswa') and $this->session->userdata('ket')=='siswa') {
			redirect(base_url()."siswa/dashboard");

		}
		else{

			$db='m_login';
			$sub_data['info']=$this->session->userdata('info');
			if ($this->input->post('login')) {
				$this->form_validation->set_rules('nis','NIS Pengguna','trim|required|max_length[20]|xss_clean');
				$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|xss_clean');
				$this->form_validation->set_error_delimiters('<div class="warning-valid">','</div>');
				if($this->form_validation->run()==TRUE){
					$this->$db->proses_login();
				}
			}

			$this->load->view('index', $sub_data);

			$this->session->unset_userdata('info');
		}
	}

	public function proseslog() {
		$data = array(
			'nis' => $this->input->post('nis', TRUE),
			'password' => md5($this->input->post('password', TRUE)),
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
				$sess_data['ket'] = 'siswa';
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('status')=='1') {
				$this->session->set_userdata('usersiswa', $sess_data);
				redirect(base_url()."siswa/dashboard");
			}
			else{
				$this->session->set_userdata('usersiswa', $sess_data);
				redirect(base_url()."siswa/gantips");
			}
		}
		else {
			$info='<div style="color:#fff">PERIKSA KEMBALI NIK DAN PASSWORD ANDA!</div>';
			$this->session->set_userdata('info',$info);
			redirect(base_url());
		}
	}
//===========================================================
public function gantips(){
$data = array(
	'nis' => $this->session->userdata('nis'),
	'nama' =>$this->session->userdata('namasis'),
	'info'=>$this->session->userdata('info'),
		);
$this->load->view('siswa/gantips',$data);

}
function kirim(){
	$data =array(
		'nis' => $this->session->userdata('nis'),
		'password' =>md5($this->input->post('password2')),
		'email' =>$this->input->post('email'),
		'status' => '1',
		'nama' =>$this->session->userdata('namasis'),
		);
	$res = $this->model->updatepas($data);
	if($res>=0){
		$info='<div style="color:#fff">password BERHASIL diganti</div>';
		$this->session->set_userdata('info',$info);
		$this->session->sess_destroy();
		header('location:'.base_url());
	}else{
		$info='<div style="color:#fff">password GAGAL diganti</div>';
		$this->session->set_userdata('info',$info);
		header('location:'.base_url().'siswa/gantips');
	}
}
//===========================================================
public function dashboard(){
if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	//
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif =  $peringatan[0]['tot_peringatan']+1;
	//PESAN
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];

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
				'tot_notif' => $notif,
				'tot_pesan' => $tpesan,
			);
	$this->load->view('siswa/profil',$data);
}
//===========================================================
public function profil(){
	if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	//
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif =  $peringatan[0]['tot_peringatan']+1;
	//PESAN
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];

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
				'tot_notif' => $notif,
				'tot_pesan' => $tpesan,
			);
	$this->load->view('siswa/profil',$data);
}
//===========================================================
function pesan(){
	if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	//
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif =  $peringatan[0]['tot_peringatan']+1;
	//PESAN
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];

	$pesankh = $this->model->getpesanum(" where nis = '$nis' ")->result_array();
	$pesanum = $this->model->getpesankh("")->result_array();
	$data = array(

		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),
		'pesankh' => $pesankh,
		'pesanum' => $pesanum,
		'tot_pesan' => $tpesan,
		'tot_notif' => $notif,
	);
	$this->load->view('siswa/pesan', $data);
}
//===========================================================
public function lapor(){
if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	//
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif =  $peringatan[0]['tot_peringatan']+1;
	//PESAN
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];

	$data = array(
		'data_pasal' => $this->model->getpasal("order by no asc")->result_array(),
		'data_siswa' => $this->model->Getsiswa("order by kd_sis asc")->result_array(),
		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),
		'tot_notif' =>$notif,
		'tot_pesan' => $tpesan,
	);
	$this->load->view('siswa/lapor',$data);
}

//===========================================================
public function tentang(){
	if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	//
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif =  $peringatan[0]['tot_peringatan']+1;
	//PESAN
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];

	$data = array(

		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),
		'tot_notif' =>$notif,
		'tot_pesan' => $tpesan,
	);
	$this->load->view('siswa/tentang',$data);
}

//===========================================================
public function tertib(){
	if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif =  $peringatan[0]['tot_peringatan']+1;
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];

	$data = array(
		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),
		'tot_notif' =>$notif,
		'tot_pesan' => $tpesan,
	);
	$this->load->view('siswa/tertib',$data);
}
//===========================================================
public function do_upload($fileloc)
	{
		$config['upload_path']          = './assets/'.$fileloc;
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = '10000';
		$config['max_width']            = '5000';
		$config['max_height']           = '5000';
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
			print_r($error); die;
		}
		return $this->upload->data('file_name');
	}

function savedata(){
		$config['upload_path']          = './assets/bukti';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = '10000';
		$config['max_width']            = '5000';
		$config['max_height']           = '5000';
		$si = $this->input->post('nis');
		$po	= $this->input->post('pasal');
		$data_siswa = $this->model->Getsiswa(" where kd_sis = '$si' ")->result_array();
		$data_pasal = $this->model->getpasal(" where kode = '$po' ")->result_array();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
			print_r($error); die;
		}
		else{
			$file_data = $this->upload->data();
			$img = $file_data['file_name'];
		$data = array(
			'kd_sis'=> '',
			'nis' => $data_siswa[0]['nis'],
			'nama' => $data_siswa[0]['nama'],
			'kelas' => $data_siswa[0]['kelas'],
			'kode' => $data_pasal[0]['kode'],
			'jenis' => $data_pasal[0]['jenis'],
			'pelanggaran' => $data_pasal[0]['keterangan'],
			'poin' => $data_pasal[0]['poin'],
			'barang' => $this->input->post('barang'),
			'konfirmasi' => 'belum',
			'status_barang' => 'belum',
			'tanggal' => date('Y-m-d'),
			'pelapor' => $this->session->userdata('namasis'),
			'pesan' => '',
			'bukti' => $img
			);

		$result = $this->model->Simpan('poin', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'siswa/lapor');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'siswa/lapor');
		}
	}
	}
//===========================================================
public function notif()
{
	if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	//
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif = $peringatan[0]['tot_peringatan']+1;
	//PESAN
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];


	$nis = $this->session->userdata('nis');
	//unt pemberitahuan
	$notif1 = $this->model->getpoin(" where nis = '$nis' and konfirmasi = 'benar' order by tanggal desc")->result_array();
	$notif2 = $this->model->getsiswa(" where nis = '$nis'")->result_array();
	//unt peringatan
	$notif3 = $this->model->getperingatan(" and nis ='$nis' order by tanggal desc")->result_array();
	//unt Revisi
	$data = array(
		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),
		'pemberitahuan2' => $notif2[0]['tpoin'],
		'peringatan' => $notif3,

		'tot_notif' => $notif,
		'tot_pesan' => $tpesan,
	);
	$this->load->view('siswa/notif', $data);
}
//===========================================================
public function pasal()
{
	if ($this->session->userdata('ket')!=='siswa') {
		redirect(base_url());
	}
	$nis = $this->session->userdata('nis');
	//
	$peringatan = $this->model->tot_peringatan("nis = '$nis'")->result_array();
	$notif =  $peringatan[0]['tot_peringatan']+1;
	//PESAN
	$tpesankh = $this->model->tot_pesankh(" where nis = $nis ")->result_array();
	$tpesanum = $this->model->tot_pesanum("")->result_array();
	$tpesan = $tpesankh[0]['tot_pesan']+$tpesanum[0]['tot_pesan'];

	$data = array(
		'nama' => $this->session->userdata('namasis'),
		'nis' => $this->session->userdata('nis'),
		'data_pasal' => $this->model->getpasal("order by no asc")->result_array(),
		'tot_notif' => $notif,
		'tot_pesan' => $tpesan,
	);

	$this->load->view('siswa/datapasal', $data);
}
//==========================================================

//===========================================================

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
