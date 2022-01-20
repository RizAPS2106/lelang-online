<?php  

class M_barang extends CI_Model
{
	
	public function tampil_data()
	{	
		return $this->db->get('barang');
	}

	public function id_input()
	{
		$result = $this->db->select_max('id_barang')
				 		   ->get('barang');
		
		if ($result->num_rows() == 0) {
			$id_barang = '1';
		}else{
			foreach ($result->result() as $rst) {
				$id_barang_then = $rst->id_barang;
				$id_barang = $id_barang_then + 1; 
			}
		}

		return $id_barang; 		   
	}

	public function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function detail_data($id_barang = NULL)
	{
		return  $this->db->get_where('barang',array('id_barang' => $id_barang))->row();
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function check_update()
	{
		$id_barang = set_value('id_barang');

		$result = $this->db->get_where('history_lelang',array('id_barang' => $id_barang));

		if ($result->num_rows() == 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function check_delete($where)
	{
		$result = $this->db->limit(1)
						   ->get_where('lelang',$where);
  		
  		if ($result->num_rows() > 0) {
	   		return FALSE;
	    }else{
	    	return TRUE;
	    }				   
	}

	public function delete_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function search_data($keyword)
	{
		$this->db->select('*');
	 	$this->db->from('barang');
		$this->db->like('id_barang', $keyword);
 		$this->db->or_like('nama_barang', $keyword);
 		$this->db->or_like('lokasi', $keyword);
 		$this->db->or_like('tgl', $keyword);
 		$this->db->or_like('lokasi', $keyword);
 		$this->db->or_like('harga_awal', $keyword);
 		$this->db->or_like('kategori', $keyword);
 		return $this->db->get()->result();
	}

}

?>