<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}

 
	//query select
	function GetUser($data) {
        $query = $this->db->get_where('user', $data);
        return $query;
    }
    function GetGuru($data) {
        $query = $this->db->get_where('guru', $data);
        return $query;
    }
	public function getpasal($where=" "){
		$data =$this->db->query('select * from pasal ' .$where);
		return $data;
	}
	public function getsiswa($where=" "){
		$data =$this->db->query('select * from user ' .$where);
		return $data;
	}
	public function getpoin($where =""){
		$data =$this->db->query('select * from poin ' .$where);
		return $data;
	}

	function totpelanggaran($where=""){
		$data = $this->db->query('select count(*) as totpelanggaran from poin  where konfirmasi = "benar" and jenis = "pelanggaran" '.$where);
		return $data;
	}
	function totpengharga($where=""){
		$data = $this->db->query('select count(*) as totpengharga from poin where konfirmasi = "benar" and jenis="penghargaan" ' .$where);
		return $data;
	}
	function getperingatan($where=""){
		$data = $this->db->query('SELECT * FROM peringatan WHERE status= "0" ' .$where);
		return $data;
	}
	function getrevisi($where=""){
		$data = $this->db->query('select * from poin where konfirmasi= "salah" ' .$where);
		return $data;
	}
	function getpesanum($where=""){
		$data = $this->db->query('select * from pesan ' .$where);
		return $data;
	}
	function getpesankh($where=""){
		$data = $this->db->query('select * from pesan where nis = 255255255255' .$where);
		return $data;
	}
	function updatepoin($data){
		$this->db->where('kd_sis',$data['kd_sis']);
		$this->db->update('poin',$data);
	}
	function updatepas($data){
		$this->db->where('nis',$data['nis']);
		$this->db->update('user',$data);
	}

	function updatepasg($data){
		$this->db->where('nik',$data['nik']);
		$this->db->update('guru',$data);
	}
	//batas crud data
	public function Simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Update($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}
    //total jumlah data
	function tot_notif($where=""){
		return $this->db->query('select count(*) as tot_notif from poin  where konfirmasi = "salah" and ' .$where);
	}
	function tot_peringatan($where=""){
		return $this->db->query('select count(*) as tot_peringatan from peringatan  where status = "0" and ' .$where);
	}
	//jumlah value dalam data
	function totpoin($where=""){
		$data = $this->db->query('SELECT SUM(poin) AS total_poin FROM poin' .$where);
		return $data;
		//echo $data;
	}
	function tot_pesankh($where=""){
		return $this->db->query('select count(*) as tot_pesan from pesan ' .$where);
	}
	function tot_pesanum($where=""){
		return $this->db->query('select count(*) as tot_pesan from pesan where nis = 255255255255 ' .$where);
	}

	function tot_pelanggar(){
		return $this->db->query("select count(*) as tot_pelanggar from poin  where konfirmasi = 'belum' ");
	}
	function tot_siswa(){
		return $this->db->query("select count(*) as tot_siswa from user");
	}
	function tot_poin(){
		return $this->db->query("select count(*) as tot_poin from poin where konfirmasi = 'benar'");
	}
	function tot_rangking(){
		return $this->db->query("select count(*) as tot_rangking from user where tpoin > 0 order by tpoin desc");
	}
	//batas crud data
}

/* End of file model.php */
/* Location: ./application/models/model.php */
