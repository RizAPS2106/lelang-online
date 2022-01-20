<?php  

class Profil extends CI_Controller
{
	
	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		
		$where = array('id_user' => $id_user);

		$data['user'] = $this->m_profil->tampil_data($where,'masyarakat')->row();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('profil',$data);
		$this->load->view('templates/footer');
	}

	public function update_profil()
	{
		$id_user = $this->session->userdata('id_user');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_new = $this->input->post('password_new');

		$where = array('id_user' => $id_user);

		$check1 = $this->m_profil->check_update1_msy();

		if ($check1 == FALSE) 
		{	
			$message = 'Username sudah digunakan';
		}else{
			if ($password_new == "" && $password == "") {
				$data = array('nama' => $nama,
					  		  'telepon' => $telepon,
					  		  'username' => $username);

				$this->m_profil->update_data($where,$data,'masyarakat');

				$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Ubah Profil Berhasil</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}else if($password_new == "" && $password != "") {
				$message = 'Harap isi kolom password baru jika ingin mengubah password, jika tidak kosongkan password lama dan password baru';
			}else{
				$check2 = $this->m_profil->check_update2_msy();
				
				if ($check2 == FALSE) {
					$message = 'Password lama salah';
				}else{
					$data = array('nama' => $nama,
								  'telepon' => $telepon,
						      	  'username' => $username,
						      	  'password' => MD5($password_new));

					$this->m_profil->update_data($where,$data,'masyarakat');
					$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Ubah Profil Berhasil</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				}
			}
		}
		
		if ($message == 'Username sudah digunakan' || $message == 'Harap isi kolom password baru jika ingin mengubah password, jika tidak kosongkan password lama dan password baru' || $message == 'Password lama salah') {
            echo $message;
        }else{
            $this->session->set_flashdata('pesan',$message);
        }  
	}

}

?>