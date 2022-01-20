<?php  

class Register extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('form_register');
	}

	public function register_data()
	{
		$username = $this->input->post('username');

		$auth = $this->m_register->check_register();
		
		if ($auth == FALSE) {	
			echo 'Username sudah digunakan';	
		}else{	
			$id_user = $this->m_register->id_register();
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password_confirm = $this->input->post('password_confirm');
			$telepon = $this->input->post('telepon');

			$data = array('id_user' => $id_user,
						  'nama' => $nama,
						  'username' => $username,
						  'password' => MD5($password),
						  'telepon' => $telepon);

			if ($password == $password_confirm) {
				$this->m_register->register_data($data,'masyarakat');
				
				echo 'Registrasi akun berhasil';
			}else{	
				echo 'Konfirmasi password salah';
			}
		} 
	}
}

?>