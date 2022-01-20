<?php  

class M_dashboard extends CI_Model
{
	
	// Petugas 
	public function tampil_data($table)
	{
		return $this->db->get($table)->result();
	}

	public function tampil_data_lelang()
	{
		$this->db->select('*,masyarakat.nama as nama_msy,petugas.nama as nama_ptg');
		$this->db->from('lelang');
		$this->db->join('barang', 'barang.id_barang = lelang.id_barang', 'left');
		$this->db->join('masyarakat', 'masyarakat.id_user = lelang.id_user', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = lelang.id_petugas', 'left');
		return $this->db->get()->result();	     		
	}

	public function tampil_data_from_to_brg($from,$to)
	{
		$this->db->where('tgl between "'.$from.'" and "'.$to.'"');
		return $this->db->get('barang')->result();
	}

	public function tampil_data_from_to_llg($from,$to)
	{
		$this->db->select('*,masyarakat.nama as nama_msy,petugas.nama as nama_ptg');
		$this->db->from('lelang');
		$this->db->join('barang', 'barang.id_barang = lelang.id_barang', 'left');
		$this->db->join('masyarakat', 'masyarakat.id_user = lelang.id_user', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = lelang.id_petugas', 'left');
		$this->db->where('lelang.tgl_lelang between "'.$from.'" and "'.$to.'"');
		return $this->db->get()->result();
	}

	public function jumlah_data($table)
	{
		$result = $this->db->get($table);

		if ($result->num_rows() == 0) {
			$jml_data = 0;
		}else{
			$jml_data = $result->num_rows();
		}

		return $jml_data;
	}

	public function jumlah_lelang_perbulan()
	{	
		$id_user = array('');
		$kumpulan_jumlah = ['0','0','0','0','0','0','0','0','0','0','0','0'];
		$bulan = 1;

		for($i = 0;$i<12;$i++) {
			$result = $this->db->join('masyarakat','masyarakat.id_user = lelang.id_user','left')
			     		   	   ->join('petugas','petugas.id_petugas = lelang.id_petugas','left')
			     		   	   ->join('barang','barang.id_barang = lelang.id_barang','left')
			     		   	   ->join('history_lelang','history_lelang.id_lelang=lelang.id_lelang','left')
			     		   	   ->where('MID(lelang.tgl_lelang,6,2)',$bulan)
			     		   	   ->where_not_in('masyarakat.id_user','NULL')
			     		   	   ->get('lelang');
			$kumpulan_jumlah[$i] = $result->num_rows();
			$bulan = $bulan+1;    		   
		}

		return $kumpulan_jumlah;
	}

	public function top_pelelangan()
	{	
		$this->db->select('*,masyarakat.nama as nama_msy,petugas.nama as nama_ptg');
		$this->db->from('lelang');
		$this->db->join('barang', 'barang.id_barang = lelang.id_barang', 'left');
		$this->db->join('masyarakat', 'masyarakat.id_user = lelang.id_user', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = lelang.id_petugas', 'left');
		$this->db->order_by('lelang.tgl_lelang', 'DESC');
		$this->db->limit(5);
		return $this->db->get()->result();   		
	}

	// Masyarakat
	public function tampil_data_lelang_msy($keyword = NULL,$limit = NULL,$start = NULL)
	{
		$this->db->join('barang','barang.id_barang=lelang.id_barang');
		$this->db->like('barang.nama_barang',$keyword);
		
		if ($this->session->userdata('lokasi') OR $this->session->userdata('kategori') OR $this->session->userdata('urutkan')) {
 			$lokasi = $this->session->userdata('lokasi');
 			$kategori = $this->session->userdata('kategori');
 			$urutkan = $this->session->userdata('urutkan');
 			
 			if ($lokasi) {
 				$this->db->like('barang.lokasi', $lokasi);
 			}

 			if ($kategori) {
 				$this->db->where('barang.kategori', $kategori);
 			}

 			if ($urutkan == 'DESC' OR $urutkan == 'ASC') {
 				$this->db->order_by('lelang.tgl_lelang', $urutkan);
 			}else if ($urutkan == 'Termahal' OR $urutkan == 'Termurah') {
 				if ($urutkan == 'Termahal') {
 					$this->db->order_by('lelang.harga_akhir', 'DESC');
 				}else if ($urutkan == 'Termurah') {
 					$this->db->order_by('lelang.harga_akhir', 'ASC');
 				}
 			}
 		}
 		
		$this->db->where('lelang.status','dibuka');
		return $this->db->get('lelang',$limit,$start);
	}
	
}

?>