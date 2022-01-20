<?php  

class Lelang_barang extends CI_Controller
{
	
	public function index()
	{
		$data['barang'] = $this->m_barang->tampil_data()->result();

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/barang/lelang_barang',$data);
		$this->load->view('templates_adm/footer');
	}

	public function tambah_barang()
	{
		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/barang/tambah_barang');
		$this->load->view('templates_adm/footer');
	}

	public function input_barang()
	{	
		$id_barang = $this->m_barang->id_input();
		$nama_barang = $this->input->post('nama_barang');
		$lokasi = $this->input->post('lokasi');
		$harga_awal = $this->input->post('harga_awal');
		$harga_awal = str_replace(".", "", $harga_awal);
		$deskripsi_barang = $this->input->post('deskripsi_barang');
		$kategori = $this->input->post('kategori');
		$gambar = $_FILES['gambar'];

		if ($gambar = '') {
			// do nothing
		}else{
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload',$config);
			
			if (!$this->upload->do_upload('gambar')) {
				$message = 'Gambar gagal di upload';
				echo $message;
				die();
			}else{
				$gambar = $this->upload->data('file_name');
			}

			$data = array('id_barang' => $id_barang,
						  'nama_barang' => $nama_barang,
						  'lokasi' => $lokasi,
						  'tgl' => date('Y/m/d'),
						  'harga_awal' => $harga_awal,
						  'deskripsi_barang' => $deskripsi_barang,
						  'kategori' => $kategori,
						  'gambar' => $gambar);

			$this->m_barang->input_data($data, 'barang');

			$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil Disimpan</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

		if ($message == 'Gambar gagal di upload') {
            echo $message;
        }else{
            $this->session->set_flashdata('pesan',$message);
        }
	}

	public function detail_barang($id_barang)
	{
		$detail = $this->m_barang->detail_data($id_barang);
		$data['detail'] = $detail;
		
		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/barang/detail_barang',$data);
		$this->load->view('templates_adm/footer');
	}
	
	public function ubah_barang($id_barang)
	{
		$where = array('id_barang' => $id_barang);
		$data['barang'] = $this->m_barang->edit_data($where,'barang')->result();
		
		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/barang/ubah_barang',$data);
		$this->load->view('templates_adm/footer');
	}

	public function update_barang()
	{
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$lokasi = $this->input->post('lokasi');
		$harga_awal = $this->input->post('harga_awal');
		$harga_awal = str_replace(".", "", $harga_awal);
		$deskripsi_barang = $this->input->post('deskripsi_barang');
		$kategori = $this->input->post('kategori');
		$gambar = $_FILES['gambar'];
		$nama_gambar = $_FILES['gambar']['name'];

		if ($nama_gambar == '') {
			$data = array('nama_barang' => $nama_barang,
						  'lokasi' => $lokasi,
						  'harga_awal' => $harga_awal,
						  'deskripsi_barang' => $deskripsi_barang,
						  'kategori' => $kategori);
		}else{
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload',$config);

			if (!$this->upload->do_upload('gambar')) {
				echo 'Gambar gagal di upload';
				die();
			}else{
				$gambar = $this->upload->data('file_name');

				$data = array('nama_barang' => $nama_barang,
							  'lokasi' => $lokasi,
							  'harga_awal' => $harga_awal,
							  'deskripsi_barang' => $deskripsi_barang,
							  'kategori' => $kategori,
							  'gambar' => $gambar);
			}
		}

		$check = $this->m_barang->check_update();

		if ($check == FALSE) {
			$message = 'Barang sudah ada yang menawar';
		}else{
			$where = array('id_barang' => $id_barang );
		
			$this->m_barang->update_data($where,$data,'barang');
			
			$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil Diubah</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

		if ($message == 'Barang sudah ada yang menawar') {
            echo $message;
        }else{
            $this->session->set_flashdata('pesan',$message);
        } 
	}

	public function hapus_barang($id_barang)
	{
		$where = array('id_barang' => $id_barang );

		$check = $this->m_barang->check_delete($where);

		if ($check == FALSE) {
			$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data Gagal Dihapus</strong><br>Barang masih dalam pelelangan harap hapus dari data lelang terlebih dahulu<button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}else{
			$this->m_barang->delete_data($where,'barang');
			
			$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Berhasil dihapus</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}
		
		$this->session->set_flashdata('pesan',$message);

		redirect('admin/lelang_barang/index');
	}

	// public function cari_barang()
	// {
	// 	$keyword = $this->input->post('search_text');

	// 	$data['barang'] = $this->m_barang->search_data($keyword);

	// 	$this->load->view('templates_adm/header');
	// 	$this->load->view('templates_adm/navbar');
	// 	$this->load->view('admin/barang/lelang_barang',$data);
	// 	$this->load->view('templates_adm/footer');
	// }

}

?>