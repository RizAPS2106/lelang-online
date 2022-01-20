<?php  

class M_register extends CI_Model
{
	
	public function check_register()
	{
		$username = set_value('username');

		$result1 = $this->db->where('username',$username)
						   ->get('masyarakat');

		$result2 = $this->db->where('username',$username)
						   ->get('petugas');

		if ($result1->num_rows() > 0 || $result2->num_rows() > 0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function id_register()
	{
		$result = $this->db->select_max('id_user')
				 		   ->get('masyarakat');
		
		if ($result->num_rows() == 0) {
			$id_user = '1';
		}else{
			foreach ($result->result() as $rst) {
				$id_user_then = $rst->id_user;
				$id_user = $id_user_then + 1; 
			}
		}

		return $id_user; 
	}

	public function register_data($data,$table)
	{
		$this->db->insert($table,$data);
	}
}

?>