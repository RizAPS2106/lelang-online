<?php  

class Profil_adm extends CI_Controller
{
	
	public function index()
	{
		$id_petugas = $this->session->userdata('id_admin');
		$where = array('id_petugas' => $id_petugas);
		
		$data['petugas'] = $this->m_profil->tampil_data($where,'petugas')->row();

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/data/profil_adm',$data);
		$this->load->view('templates_adm/footer');
	}

	public function update_profil()
	{
		$id_petugas = $this->input->post('id_petugas');		
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_new = $this->input->post('password_new');

		$where = array('id_petugas' => $id_petugas);
		
		$check1 = $this->m_profil->check_update1();

		if ($check1 == FALSE) {	
			$message = 'Username sudah digunakan';
		}else{
			if ($password_new == "" && $password == "") {
				$data = array('nama' => $nama,
						      'username' => $username);

				$this->m_profil->update_data($where,$data,'petugas');

				$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Ubah Profil Berhasil</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

			}else if($password_new == "" && $password != "") {
				$message = 'Harap isi kolom password baru jika ingin mengubah password, jika tidak kosongkan password lama dan password baru';
			}else{
				$check2 = $this->m_profil->check_update2();
				
				if ($check2 == FALSE) {
					$message = 'Password lama salah';

				}else{
					$data = array('nama' => $nama,
						      	  'username' => $username,
						      	  'password' => MD5($password_new));

					$this->m_profil->update_data($where,$data,'petugas');

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