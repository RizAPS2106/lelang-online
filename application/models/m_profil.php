<?php  

class M_profil extends CI_Model
{
	
	public function tampil_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// Petugas
	public function check_update1()
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

	public function check_update2()
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

	// Masyarakat
	public function check_update1_msy()
	{
		$id_user = set_value('id_user');
		$username = set_value('username');

		$result1 = $this->db->where_not_in('id_user',$id_user)
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

	public function check_update2_msy()
	{
		$id_user = set_value('id_user');
		$password = set_value('password');

		$result = $this->db->where('id_user',$id_user)
						   ->where('password',MD5($password))
						   ->limit(1)
						   ->get('masyarakat');

		if ($result->num_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

?>