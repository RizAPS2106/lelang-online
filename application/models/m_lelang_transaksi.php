<?php  

class M_lelang_transaksi extends CI_Model
{
	
	public function detail_data1($id_lelang)
	{
		$this->db->join('barang','barang.id_barang=lelang.id_barang','LEFT');
		$this->db->join('petugas','petugas.id_petugas=lelang.id_petugas','LEFT');
		$this->db->where('lelang.id_lelang',$id_lelang);
		return  $this->db->get('lelang');
	}

	public function detail_data2($where)
	{
		$this->db->join('history_lelang','history_lelang.id_lelang=lelang.id_lelang','LEFT');
		$this->db->join('masyarakat','masyarakat.id_user=history_lelang.id_user','LEFT');
		$this->db->where($where);
		$this->db->order_by('history_lelang.penawaran_harga', 'DESC');
		return $this->db->get('lelang');
	}

	public function check_input1()
	{
		$id_user = $this->session->userdata('id_user');
		$id_lelang = set_value('id_lelang');	

		$result = $this->db->select('*')
						   ->from('history_lelang')
						   ->where('id_lelang',$id_lelang)
						   ->order_by('penawaran_harga','DESC')
						   ->limit(1)
						   ->get();

		if ($result->num_rows() == 0) {
			return TRUE;
		}else{
			foreach($result->result() as $rst){
				if ($rst->id_user == $id_user) {
					return FALSE;
				}else{
					return TRUE;
				}
			}
		}		 
	}

	public function check_input2()
	{
		$id_user = $this->session->userdata('id_user');
		$id_lelang = set_value('id_lelang');	

		$result = $this->db->select('*')
						   ->from('history_lelang')
						   ->where('id_lelang',$id_lelang)
						   ->where('id_user',$id_user)
						   ->get();

		if ($result->num_rows() == 0) {
			return TRUE;
		}else{
			return FALSE;
		}		 
	}

	public function id_input()
	{
		$result = $this->db->select_max('id_history')
						   ->get('history_lelang');

		if ($result->num_rows() == 0) {
			$id_history = '1';
		}else{
			foreach ($result->result() as $rst) {
				$id_history_then = $rst->id_history;
				$id_history = $id_history_then + 1;	
			}
		}

		return $id_history;				   
	}

	public function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_input_data($where,$data,$table)
	{
		$this->db->where($where); 
		$this->db->update($table,$data);
	}

	public function update_data($where,$data,$table)
	{	
		$this->db->where($where); 
		$this->db->update($table,$data);
	}

}

?>