<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class guru extends CI_Controller {

	function index(){

		header('Expires: Mon, 1 Jul 1998 01:00:00 GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', FALSE);
		header('Pragma: no-cache');
		header( "Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT" );

		if ($this->session->userdata('userguru') and $this->session->userdata('ket')=='guru') {
			redirect(base_url()."guru/dashboard");

		}
		else{

			$db='_login';
			$sub_data['info']=$this->session->userdata('info');
			if ($this->input->post('login')) {
				$this->form_validation->set_rules('nik','NIK Pengguna','trim|required|max_length[20]|xss_clean');
				$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|xss_clean');
				$this->form_validation->set_error_delimiters('<div class="warning-valid">','</div>');
				if($this->form_validation->run()==TRUE){
					$this->$db->proses_login();
				}
			}

			$this->load->view('guru/login', $sub_data);

			$this->session->unset_userdata('info');
		}
	}

	public function proseslog() {
		$data = array(
			'nik' => $this->input->post('nik', TRUE),
			'password' => md5($this->input->post('password', TRUE)),
			);
			if(!preg_match("/^[0-9]*$/", $data['nik'])){
				$data['nik'] = "080299";
			}
		$hasil = $this->model->GetGuru($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['kd_guru'] = $sess->kd_guru;
				$sess_data['nik'] = $sess->nik;
				$sess_data['nama'] = $sess->nama;
				$sess_data['email'] = $sess->email;
				$sess_data['mapel1'] = $sess->mapel1;
				$sess_data['mapel2'] = $sess->mapel2;
				$sess_data['mapel3'] = $sess->mapel3;
				$sess_data['status'] = $sess->status;
				$sess_data['ket'] = 'guru';
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('status')=='1') {
				$this->session->set_userdata('userguru', $sess_data);
				redirect(base_url()."guru/dashboard");
			}
			else{
				$this->session->set_userdata('userguru', $sess_data);
				redirect(base_url()."guru/gantips");
			}
		}
		else {
			$info='<div style="color:#fff">PERIKSA KEMBALI NIK DAN PASSWORD ANDA!</div>';
			$this->session->set_userdata('info',$info);
			redirect(base_url().'guru');
		}
	}
//===========================================================
public function gantips(){
$data = array(
	'nik' => $this->session->userdata('nik'),
	'nama' =>$this->session->userdata('nama'),
	'info'=>$this->session->userdata('info'),
		);
$this->load->view('guru/gantips',$data);

}
function kirim(){
	$data =array(
		'nik' => $this->session->userdata('nik'),
		'password' =>md5($this->input->post('password2')),
		'email' =>$this->input->post('email'),
		'status' => '1',
		'nama' =>$this->session->userdata('nama'),
		);
	$res = $this->model->updatepasg($data);
	if($res>=0){
		$info='<div style="color:#fff">password BERHASIL diganti</div>';
		$this->session->set_userdata('info',$info);
		$this->session->sess_destroy();
		header('location:'.base_url().'guru');
	}else{
		$info='<div style="color:#fff">password GAGAL diganti</div>';
		$this->session->set_userdata('info',$info);
		header('location:'.base_url().'guru/gantips');
	}
}
//===========================================================
public function dashboard(){
if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url().'guru');
	}
	$nik = $this->session->userdata('nik');
	$tsiswa = $this->model->tot_siswa()->result_array();
	$tpelanggaran = $this->model->tot_pelanggar()->result_array();
	$tpoin = $this->model->tot_poin()->result_array();
	$trangking =$this->model->tot_rangking()->result_array();
	$data_guru = $this->model->getguru("nik = '$nik'")->result_array();
	$data = array(
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
		'tot_siswa'=> $tsiswa[0]['tot_siswa'],
		'tot_pelanggar'=> $this->model->tot_pelanggar()->result_array(),
		'tot_poin'=> $tpoin[0]['tot_poin'],
		'tot_rangking' =>$trangking[0]['tot_rangking']
	);

	$this->load->view('guru/blank',$data);
}
//===========================================================
public function pasal()
{
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url().'guru');
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
		'data_pasal' => $this->model->getpasal("order by no asc")->result_array(),
	);
	$this->load->view('guru/datapasal', $data);
}
//===========================================================
public function rangking(){
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url().'guru');
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
		'data_rangking' => $this->model->Getsiswa(" where tpoin > 0 order by tpoin desc")->result_array(),
	);
	$this->load->view('guru/rangking',$data);
}
//===========================================================
public function datasiswa(){
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url().'guru');
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
		'data_siswa' => $this->model->Getsiswa("order by kd_sis asc")->result_array(),
	);
	$this->load->view('guru/datasiswa',$data);
}
//===========================================================
public function lappoin(){
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url().'guru');
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
		'data_poin' => $this->model->getpoin(" where konfirmasi = 'benar' order by tanggal asc")->result_array(),
	);
	$this->load->view('guru/lappoin',$data);
}
//===========================================================
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
			'pelapor' => $this->session->userdata('nama'),
			'pesan' => '',
			'bukti' => $img
			);

		$result = $this->model->Simpan('poin', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'guru/lapor');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'guru/lapor');
		}
	}
}
//==========================================================
public function absensi(){
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url().'guru');
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'data_pasal' => $this->model->getpasal("order by no asc")->result_array(),
		'data_siswa' => $this->model->Getsiswa("order by kd_sis asc")->result_array(),
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
		'mapel1' => $this->session->userdata('mapel1'),
		'mapel2' => $this->session->userdata('mapel2'),
		'mapel3' => $this->session->userdata('mapel3'),
	);
	$this->load->view('guru/absensi',$data);
}
function saveabsensi(){
		$si = $this->input->post('nis');
        $ket	= $this->input->post('keterangan');
        $pelajaran	= $this->input->post('pelajaran');
		$data_siswa = $this->model->Getsiswa(" where kd_sis = '$si' ")->result_array();
		$data = array(
			'kd_absensi'=> '',
			'tanggal' => date('Y-m-d'),
			'nis' => $data_siswa[0]['nis'],
			'nama' => $data_siswa[0]['nama'],
			'kelas' => $data_siswa[0]['kelas'],
			'keterangan' => $ket,
			'guru' => $this->session->userdata('nama'),
			'pelajaran' => $pelajaran,
			);

		$result = $this->model->Simpan('absensi', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'guru/absensi');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'guru/absensi');
		}
}
//==========================================================
public function lapor()
{
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url().'guru');
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'data_pasal' => $this->model->getpasal("order by no asc")->result_array(),
		'data_siswa' => $this->model->Getsiswa("order by kd_sis asc")->result_array(),
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
	);
	$this->load->view('guru/lapor', $data);
}
//==========================================================
public function tentang(){
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url());
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
	);
	$this->load->view('guru/tentang',$data);
}

public function tertib(){
	if ($this->session->userdata('ket')!=='guru') {
		redirect(base_url());
	}
	$nik = $this->session->userdata('nik');
	$data = array(
		'nama' => $this->session->userdata('nama'),
		'nik' => $this->session->userdata('nik'),
	);
	$this->load->view('guru/tertib',$data);
}
//===========================================================

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'guru');
	}

}
