<?php  

class M_riwayat extends CI_Model
{
	
	public function tampil_data($limit = NULL,$start = NULL)
	{
		$id_user = $this->session->userdata('id_user');
		
		$this->db->select('*,masyarakat.nama as nama_user,petugas.nama as nama_petugas,lelang.id_user as id_pemenang');
		$this->db->join('barang','barang.id_barang=lelang.id_barang','LEFT');
		$this->db->join('masyarakat','masyarakat.id_user=lelang.id_user','LEFT');
		$this->db->join('petugas','petugas.id_petugas=lelang.id_petugas','LEFT');
		$this->db->join('history_lelang','history_lelang.id_lelang=lelang.id_lelang','LEFT');
		$this->db->where('history_lelang.id_user',$id_user);
		return $this->db->get('lelang',$limit,$start);
	}
}

?>