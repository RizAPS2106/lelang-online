<?php  

class Data extends CI_Controller
{
	//Petugas
	public function data_petugas()
	{
		$data['id_petugas'] = $this->session->userdata('id_admin');
		$data['petugas'] = $this->m_data->tampil_data_petugas();
		$data['level'] =  $this->m_data->tampil_data_petugas_level();

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/data/data_petugas',$data);
		$this->load->view('templates_adm/footer');
	}

	public function tambah_petugas()
	{
		$id_petugas = $this->m_data->id_input_ptg();
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
		$level = $this->input->post('level');

		$data = array('id_petugas' => $id_petugas,
					  'nama' => $nama,
					  'username' => $username,
					  'password' => MD5($password),
					  'id_level' => $level);

		$check = $this->m_data->check_input_petugas();

		if ($check == FALSE) {
			$message = 'Username sudah digunakan';
		}else{
			if ($password == $password_confirm) {
				$this->m_data->input_petugas($data,'petugas');

				$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil Disimpan</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}else{
				$message = 'Konfirmasi password salah';
			}
		}

		if ($message == 'Username sudah digunakan' || $message == 'Konfirmasi password salah') {
            echo $message;
        }else{
            $this->session->set_flashdata('pesan',$message);
        }  
	}
	
	public function tampil_data_ubah_petugas()
	{
		$id_petugas = $this->input->get('id');

        $data = $this->m_data->tampil_data_edit_petugas($id_petugas);
        
        echo json_encode($data);
	}

	public function ubah_petugas()
	{	
		$id_petugas = $this->input->post('id_petugas');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password_new = $this->input->post('password_new');
		$level = $this->input->post('level');

		$where = array('id_petugas' => $id_petugas);
		
		$check1 = $this->m_data->check_edit_petugas1();

		if ($check1 == FALSE) {	
			$message = 'Username sudah digunakan';
		}else{
			if ($password_new == "" && $password == "") {
				$data = array('nama' => $nama,
						      'username' => $username,
						  	  'id_level' => $level);

				$this->m_data->edit_petugas($where,$data,'petugas');
				
				$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Ubah Profil Berhasil</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}else if($password_new == "" && $password != "") {
				$message = 'Harap isi kolom password baru jika ingin mengubah password, jika tidak kosongkan password lama dan password baru';
			}else{
				$check2 = $this->m_data->check_edit_petugas2();
				
				if ($check2 == FALSE) {
					$message = 'Password lama salah';
				}else{
					$data = array('nama' => $nama,
						      	  'username' => $username,
						      	  'password' => MD5($password_new),
						      	  'id_level' => $level);

					$this->m_data->edit_petugas($where,$data,'petugas');

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

	public function hapus_petugas($id_petugas)
	{
		$where = array('id_petugas' => $id_petugas);

		$check = $this->m_data->check_delete_petugas($where);

		if ($check == FALSE) {
			$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Gagal Dihapus</strong> <br> Petugas ini masih memiliki data lelang harap di hapus dahulu data lelang nya<button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}else{
			$this->m_data->delete_petugas($where,'petugas');

			$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil Dihapus</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

		$this->session->set_flashdata('pesan',$message);

		redirect('admin/data/data_petugas');	
	}

	// public function cari_petugas()
	// {
	// 	$keyword = $this->input->post('cari_petugas');

	// 	$data['id_petugas'] = $this->session->userdata('id_admin');
	// 	$data['petugas'] = $this->m_data->search_petugas($keyword);
	// 	$data['level'] =  $this->m_data->tampil_data_petugas_level()->result();

	// 	$this->load->view('templates_adm/header');
	// 	$this->load->view('templates_adm/navbar');
	// 	$this->load->view('admin/data/data_petugas',$data);
	// 	$this->load->view('templates_adm/footer');
	// }

	//Masyarakat
	public function data_masyarakat()
	{
		$data['masyarakat'] = $this->m_data->tampil_data_masyarakat();

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/data/data_masyarakat',$data);
		$this->load->view('templates_adm/footer');
	}

	public function tambah_masyarakat()
	{
		$id_user = $this->m_data->id_input_msy();
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

		$check = $this->m_data->check_input_masyarakat();

		if ($check == FALSE) {
			$message = 'Username sudah digunakan';
		}else{
			if ($password == $password_confirm) {
				$this->m_data->input_masyarakat($data,'masyarakat');

				$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil Disimpan</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}else{
				$message = 'Konfirmasi password salah';
			}
		}

		if ($message == 'Username sudah digunakan' || $message == 'Konfirmasi password salah') {
            echo $message;
        }else{
            $this->session->set_flashdata('pesan',$message);
        }
	}
	
	public function tampil_data_ubah_masyarakat()
	{
		$id_masyarakat = $this->input->get('id');

        $data = $this->m_data->tampil_data_edit_masyarakat($id_masyarakat);
        
        echo json_encode($data);
	}

	public function ubah_masyarakat()
	{	
		$id_masyarakat = $this->input->post('id_masyarakat');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$telepon = $this->input->post('telepon');
		$password = $this->input->post('password');
		$password_new = $this->input->post('password_new');

		$where = array('id_user' => $id_masyarakat);
		
		$check1 = $this->m_data->check_edit_masyarakat1();

		if ($check1 == FALSE) {	
			$message = 'Username sudah digunakan';
		}else{
			if ($password_new == "" && $password == "") {
				$data = array('nama' => $nama,
						      'username' => $username,
						  	  'telepon' => $telepon);

				$this->m_data->edit_masyarakat($where,$data,'masyarakat');
				
				$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Ubah Profil Berhasil</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}else if($password_new == "" && $password != "") {
				$message = 'Harap isi kolom password baru jika ingin mengubah password, jika tidak kosongkan password lama dan password baru';
			}else{
				$check2 = $this->m_data->check_edit_masyarakat2();
				
				if ($check2 == FALSE) {
					$message = 'Password lama salah';
				}else{
					$data = array('nama' => $nama,
						      	  'username' => $username,
						      	  'password' => MD5($password_new),
						      	  'telepon' => $telepon);

					$this->m_data->edit_masyarakat($where,$data,'masyarakat');

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

	public function hapus_masyarakat($id_masyarakat)
	{
		$where = array('id_user' => $id_masyarakat);

		$check = $this->m_data->check_delete_masyarakat($where);

		if ($check == FALSE) {
			$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Gagal Dihapus</strong> <br> User ini masih memiliki data lelang harap di hapus dahulu data lelang nya<button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}else{
			$this->m_data->delete_masyarakat($where,'masyarakat');

			$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil Dihapus</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}
		$this->session->set_flashdata('pesan',$message);

		redirect('admin/data/data_masyarakat');
	}

	// public function cari_masyarakat()
	// {
	// 	$keyword = $this->input->post('cari_masyarakat');

	// 	$data['masyarakat'] = $this->m_data->search_masyarakat($keyword);

	// 	$this->load->view('templates_adm/header');
	// 	$this->load->view('templates_adm/navbar');
	// 	$this->load->view('admin/data/data_masyarakat',$data);
	// 	$this->load->view('templates_adm/footer');
	// }
}

?>