<?php  

class M_data extends CI_Model
{
	
	//Petugas
	public function tampil_data_petugas()
	{
		$this->db->join('level','level.id_level=petugas.id_level');
		return $this->db->get('petugas')->result();		   
	}

	public function tampil_data_petugas_level()
	{
		return $this->db->get('level')->result();
	}

	public function check_input_petugas()
	{
		$username = set_value('username');

		$result1 = $this->db->where('username',$username)
						   ->limit(1)
						   ->get('masyarakat');

		$result2 = $this->db->where('username',$username)
						   ->limit(1)
						   ->get('petugas');

		if ($result1->num_rows() > 0 || $result2->num_rows() > 0) {
			return FALSE;
		}else{
			return TRUE;
		}				   
	}

	public function id_input_ptg()
	{
		$result = $this->db->select_max('id_petugas')
						   ->get('petugas');

		if ($result->num_rows() == 0) {
			$id_petugas = 1;
		}else{
			foreach ($result->result() as $rst) {
				$id_petugas_then = $rst->id_petugas;
				$id_petugas = $id_petugas_then + 1;	
			} 
		}				   

		return $id_petugas;
	}

	public function input_petugas($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function check_edit_petugas1()
	{
		$id_petugas = set_value('id_petugas');
		$username = set_value('username');

		$result1 = $this->db->where('username',$username)
						    ->limit(1)
						    ->get('masyarakat');	

		$result2 = $this->db->where_not_in('id_petugas',$id_petugas)
						    ->where('username',$username)
						    ->limit(1)
						    ->get('petugas');					   

		if ($result1->num_rows() > 0 || $result2->num_rows() > 0) {
			return FALSE;
		}else{
			return TRUE;
		}				   
	}

	public function check_edit_petugas2()
	{
		$id_petugas = set_value('id_petugas');
		$password = set_value('password');

		$result = $this->db->where('id_petugas',$id_petugas)
						   ->where('password',MD5($password))
						   ->limit(1)
						   ->get('petugas');

		if ($result->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function tampil_data_edit_petugas($id_petugas)
	{
		$result = $this->db->where('id_petugas',$id_petugas)
						   ->get('petugas');
        
        if($result->num_rows() > 0){

            foreach ($result->result() as $rst) {
                return array('id_petugas' => $rst->id_petugas,
                    		 'nama' => $rst->nama,
                    		 'username' => $rst->username,
                    		 'level' => $rst->id_level);
            }
        }
	}

	public function edit_petugas($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function check_delete_petugas($where)
	{
		$result = $this->db->where($where)
						   ->limit(1)
						   ->get('lelang');
		
		if ($result->num_rows() > 0) {
			return FALSE;
		}else{
			return TRUE;
		}				   
	}

	public function delete_petugas($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// public function search_petugas($keyword=null,$limit,$start)
	// {
	// 	$this->db->select('*');
	// 	$this->db->join('level','level.id_level=petugas.id_level');
	// 	$this->db->like('id_petugas',$keyword);
	// 	$this->db->or_like('nama',$keyword);
	// 	$this->db->or_like('username',$keyword);
	// 	$this->db->or_like('password',$keyword);
	// 	$this->db->or_like('petugas.id_level',$keyword);
	// 	$this->db->or_like('level',$keyword);
	// 	return $this->db->get('petugas',$limit,$start)->result();
	// }

	//Masyarakat
	public function tampil_data_masyarakat()
	{
		return $this->db->get('masyarakat')->result();
	}

	public function check_input_masyarakat()
	{
		$username = set_value('username');

		$result1 = $this->db->where('username',$username)
						    ->limit(1)
						    ->get('masyarakat');

		$result2 = $this->db->where('username',$username)
						    ->limit(1)
						    ->get('petugas');						   
						   
		if ($result1->num_rows() > 0 || $result2->num_rows() > 0) {
			return FALSE;
		}else{
			return TRUE;
		}				   
	}

	public function id_input_msy()
	{
		$result = $this->db->select_max('id_user')
						   ->get('masyarakat');

		if ($result->num_rows() == 0) {
			$id_user = 1;
		}else{
			foreach ($result->result() as $rst) {
				$id_user_then = $rst->id_user;
				$id_user = $id_user_then + 1;	
			} 
		}				   

		return $id_user;
	}

	public function input_masyarakat($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function check_edit_masyarakat1()
	{
		$id_masyarakat = set_value('id_masyarakat');
		$username = set_value('username');

		$result1 = $this->db->where_not_in('id_user',$id_masyarakat)
						    ->where('username',$username)
						    ->limit(1)
						    ->get('masyarakat');

		$result2 = $this->db->where('username',$username)
						    ->limit(1)
						    ->get('petugas');				   

		if ($result1->num_rows() > 0 || $result2->num_rows() > 0) {
			return FALSE;
		}else{
			return TRUE;
		}				   
	}

	public function check_edit_masyarakat2()
	{
		$id_masyarakat = set_value('id_masyarakat');
		$password = set_value('password');

		$result = $this->db->where('id_user',$id_masyarakat)
						   ->where('password',MD5($password))
						   ->limit(1)
						   ->get('masyarakat');

		if ($result->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function tampil_data_edit_masyarakat($id_masyarakat)
	{
		$result = $this->db->where('id_user',$id_masyarakat)
						   ->get('masyarakat');
        
        if($result->num_rows() > 0){

            foreach ($result->result() as $rst) {
                return array('id_masyarakat' => $rst->id_user,
                    		 'nama' => $rst->nama,
                    		 'username' => $rst->username,
                    		 'telepon' => $rst->telepon);
            }
        }
	}

	public function edit_masyarakat($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function check_delete_masyarakat($where)
	{
		$result = $this->db->where($where)
						   ->limit(1)
						   ->get('lelang');
		
		if ($result->num_rows() > 0) {
			return FALSE;
		}else{
			return TRUE;
		}				   
	}

	public function delete_masyarakat($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function search_masyarakat($keyword)
	{
		$this->db->select('*');
		$this->db->from('masyarakat');
		$this->db->like('id_user',$keyword);
		$this->db->or_like('nama',$keyword);
		$this->db->or_like('username',$keyword);
		$this->db->or_like('password',$keyword);
		$this->db->or_like('telepon',$keyword);
		return $this->db->get()->result();
	}

}

?>