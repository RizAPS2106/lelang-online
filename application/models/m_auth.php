<?php  

class M_auth extends CI_Model
{
	
	public function check_login_adm()
	{
		$username = set_value('username');
		$password = set_value('password');

        $result = $this->db->where('username',$username)
						   ->where('password',MD5($password))
						   ->where('id_level',1)
						   ->limit(1)
						   ->get('petugas');
		
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return FALSE;
		}		   	
	}

	public function check_login_ptg()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db->where('username',$username)
						   ->where('password',MD5($password))
						   ->where('id_level',2)
						   ->limit(1)
						   ->get('petugas');

		if ($result->num_rows()>0) {
			return $result->row(); 
		}else{
			return FALSE;
		}						   
	}

	public function check_login_msy()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db->where('username',$username)
						   ->where('password',MD5($password))
						   ->limit(1)
						   ->get('masyarakat');

		if ($result->num_rows()>0) {
			return $result->row(); 
		}else{
			return FALSE;
		}						   
	}

}

?>