<?php  

class M_lelang extends CI_Model
{
	
	public function tampil_data($id_petugas)
	{
		$this->db->join('barang','barang.id_barang=lelang.id_barang');
		$this->db->where('lelang.id_petugas',$id_petugas);
		return $this->db->get('lelang')->result();
	}

	public function list_barang()
	{
		$this->db->select('*,barang.id_barang as id_brg');
		$this->db->join('lelang','lelang.id_barang=barang.id_barang','LEFT');
		$this->db->where('lelang.id_lelang',NULL);
		return $this->db->get('barang')->result();
	}

	public function id_input()
	{
		$result = $this->db->select_max('id_lelang')
				 		   ->get('lelang');
		
		if ($result->num_rows() == 0) {
			$id_lelang = '1';
		}else{
			foreach ($result->result() as $rst) {
				$id_lelang_then = $rst->id_lelang;
				$id_lelang = $id_lelang_then + 1; 
			}
		}

		return $id_lelang;
	}

	public function detail_input($query)
	{
		$this->db->select('*,barang.id_barang as id_brg');
		$this->db->join('lelang','lelang.id_barang=barang.id_barang','LEFT');
		$this->db->where('lelang.id_lelang',NULL);
	 	$this->db->from("barang");
	 	if($query != '')
	 	{
	 		$this->db->where('barang.id_barang', $query);
	 	}
	 	$this->db->order_by('barang.id_barang', 'ASC');
	 	$this->db->limit(1);
	 	return $this->db->get();
	}

	public function data_barang_input()
	{
		$id_barang = set_value('id_barang');

		$this->db->where('id_barang',$id_barang);
		return $this->db->get('barang')->row();
	}

	public function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}
	
	public function detail_data1($id_lelang)
	{
		$this->db->join('barang','barang.id_barang=lelang.id_barang','LEFT');
		$this->db->join('petugas','petugas.id_petugas=lelang.id_petugas','LEFT');
		$this->db->where('lelang.id_lelang', $id_lelang);
		return $this->db->get('lelang')->row();
	}

	public function detail_data2($id_lelang)
	{
		$this->db->join('history_lelang','history_lelang.id_lelang=lelang.id_lelang','LEFT');
		$this->db->join('masyarakat','masyarakat.id_user=history_lelang.id_user','LEFT');
		$this->db->where('lelang.id_lelang', $id_lelang);
		$this->db->order_by('history_lelang.penawaran_harga', 'DESC');
		return $this->db->get('lelang')->result();
	}

	public function edit_data($where,$table)
	{
		$this->db->join('barang','barang.id_barang=lelang.id_barang');
		$this->db->where($where);
		return  $this->db->get($table)->row();
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function check_delete1($where)
	{
		$result = $this->db->get_where('lelang',$where)->result();
		
		foreach ($result as $row) {
			if ($row->status == 'dibuka') {
				return FALSE;
			}else{
				return TRUE;
			} 	
		}				   
	}

	public function check_delete2($where)
	{
		$result = $this->db->get_where('history_lelang',$where);

		if ($result->num_rows() == 0) {
			return TRUE;
		}else{
			return FALSE;
		}				   
	}

	public function delete_data($where,$table)
	{	
		$this->db->where($where);
		$this->db->delete($table);
	}

	// public function search_data($keyword)
	// {
	// 	$this->db->select('*');
	//  	$this->db->from('lelang');
	//  	$this->db->join('barang','barang.id_barang=lelang.id_barang');
	// 	$this->db->like('lelang.id_lelang', $keyword);
	// 	$this->db->or_like('barang.id_barang', $keyword);
 // 		$this->db->or_like('barang.nama_barang', $keyword);
 // 		$this->db->or_like('barang.lokasi', $keyword);
 // 		$this->db->or_like('barang.harga_awal', $keyword);
 // 		$this->db->or_like('barang.kategori', $keyword);
 // 		$this->db->or_like('lelang.tgl_lelang', $keyword);
 // 		$this->db->or_like('lelang.tgl_tutup', $keyword);
 // 		$this->db->or_like('lelang.harga_akhir', $keyword);
 // 		$this->db->or_like('lelang.id_user', $keyword);
 // 		$this->db->or_like('lelang.id_petugas', $keyword);
 // 		$this->db->or_like('lelang.status', $keyword);
 // 		return $this->db->get()->result();
	// }

}

?>