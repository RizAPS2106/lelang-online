<?php 

class Auth extends CI_Controller
{
	public function index()
	{
		$this->session->sess_destroy();

		$this->load->view('form_login');
	}

	public function login()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$auth1 = $this->m_auth->check_login_adm();
		$auth2 = $this->m_auth->check_login_ptg();
		$auth3 = $this->m_auth->check_login_msy();

		if ($auth1 == TRUE) {
			$this->session->set_userdata('id_admin',$auth1->id_petugas);
			$this->session->set_userdata('username',$auth1->username);

			echo 'admin/dashboard_adm';
		}else if ($auth2 == TRUE) {
			$this->session->set_userdata('id_petugas',$auth2->id_petugas);
			$this->session->set_userdata('username',$auth2->username);

			echo 'petugas/dashboard_ptg';
		}else if ($auth3 == TRUE) {
			$this->session->set_userdata('id_user',$auth3->id_user);
			$this->session->set_userdata('username',$auth3->username);

			echo 'dashboard';
		}else{
			echo 'Username atau password anda salah';
		}
	}

	public function logout()
	{
	    $this->session->sess_destroy();

	    redirect('auth');
	}

}

?>