<?php  

class Lelang_lelang extends CI_Controller
{
	
	public function index()
	{
		$id_petugas = $this->session->userdata('id_admin');

		$data['lelang'] = $this->m_lelang->tampil_data($id_petugas);

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/lelang/lelang_lelang',$data);
		$this->load->view('templates_adm/footer');
	}

	public function tambah_lelang()
	{
		$data['barang'] = $this->m_lelang->list_barang('barang');

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/lelang/tambah_lelang',$data);
		$this->load->view('templates_adm/footer');
	}

	public function detail_tambah_lelang(){
	 	
		function rupiah($angka){
		    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		    return $hasil_rupiah;
		}

	 	$output = '';
	 	$query = '';

	 	if($this->input->post('query')) {
	 		$query = $this->input->post('query');
	 	}
	 	
	 	$data = $this->m_lelang->detail_input($query);
			
	 	if($data->num_rows() > 0) {	
	 		foreach($data->result() as $row) {
	 			// Detail Barang
				$output .= 	'<div class="form-group row">
								<div class="col-6">
									<div class="card bg-white">
									  <div class="card-header">
									  	Detail Barang
									  </div>
									  
									  <div class="card-body">
										<div class="table-responsive table-sm border-bottom">
											<table class="table">
												<tr>
													<td>Nama Barang</td>
													<td> : </td>
													<td>'. $row->nama_barang .'</td>
												</tr>
												<tr>
													<td>Lokasi Barang</td>
													<td> : </td>
													<td>'. $row->lokasi .'</td>
												</tr>
												<tr>
													<td>Tanggal Masuk Barang</td>
													<td> : </td>
													<td>'. $row->tgl .'</td>
												</tr>
												<tr>
													<td>Harga Awal</td>
													<td> : </td>
													<td>'. rupiah($row->harga_awal) .'</td>
												</tr>
												<tr>
													<td>Kategori</td>
													<td> : </td>
													<td>'. $row->kategori .'</td>
												</tr>
					 						</table>
										</div>
									  </div>
									</div>
								</div>

								<div class="col-6">
									<div class="card bg-white">
									  <div class="card-header">
									  	Foto Barang
									  </div>
									  
									  <div class="card-body">
										<center>
											<img src="../../../uploads/'.$row->gambar.'" width="350" height="190">
									  	</center>
									  </div>
									</div>
								</div>	
						</div>';			
	 		}
	 	}else{
	 		//Jika tidak tersedia
	 		$output .= '<table class="table border-bottom">
	 						<tr>
	 				   			<td colspan="5" class="text-muted">Barang Tidak Tersedia</td>
	 			  			</tr>
	 			  		</table>';
	 	}

	 	echo $output;
	}

	public function input_lelang()
	{
		$id_lelang = $this->m_lelang->id_input();
		$id_barang = $this->input->post('id_barang');
		$tgl_lelang = date('Y/m/d');
		$id_petugas = $this->session->userdata('id_petugas');
		$status = $this->input->post('status');

		if ($id_barang == '') {
			$message = 'Harap pilih barang dahulu';
		}else{
			$data_barang = $this->m_lelang->data_barang_input();
		
			$harga_akhir = $data_barang->harga_awal;

			$data = array('id_lelang' => $id_lelang,
						  'id_barang' => $id_barang,
						  'tgl_lelang' => $tgl_lelang,
						  'harga_akhir' => $harga_akhir,
						  'id_petugas' => $id_petugas,
						  'status' => $status);

			$this->m_lelang->input_data($data, 'lelang');

			$message = '<div class="alert alert-success alert-dismissible" role="alert"><strong>Buka Lelang Berhasil</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

		if ($message == 'Harap pilih barang dahulu') {
            echo $message;
        }else{
            $this->session->set_flashdata('pesan',$message);
        }
	}

	public function detail_lelang($id_lelang)
	{	
		$detail1 = $this->m_lelang->detail_data1($id_lelang);
		$detail2 = $this->m_lelang->detail_data2($id_lelang);

		$data['detail1'] = $detail1;
		$data['detail2'] = $detail2;

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/lelang/detail_lelang',$data);
		$this->load->view('templates_adm/footer');
	}

	public function ubah_lelang($id_lelang)
	{
		$where = array('lelang.id_lelang' => $id_lelang);

		$data['lelang'] = $this->m_lelang->edit_data($where,'lelang');

		$this->load->view('templates_adm/header');
		$this->load->view('templates_adm/navbar');
		$this->load->view('admin/lelang/ubah_lelang',$data);
		$this->load->view('templates_adm/footer');
	}

	public function update_lelang()
	{
		$id_lelang = $this->input->post('id_lelang');
		$tgl_lelang = $this->input->post('tgl_lelang');
		$tgl_tutup = '';
		$status = $this->input->post('status');

		if ($status == 'dibuka') {
			$tgl_tutup == '';
		}else if ($status == 'ditutup') {
			$tgl_tutup = date('Y/m/d');
		}

		$where = array('id_lelang' => $id_lelang);
		$data = array('tgl_tutup' => $tgl_tutup,'status' => $status);

		$this->m_lelang->update_data($where,$data,'lelang');

		$message = '<div class="alert alert-success alert-dismissible" role="alert"><strong>Data Berhasil Diubah</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		
		$this->session->set_flashdata('pesan',$message);
	}

	public function hapus_lelang($id_lelang)
	{
		$where = array('id_lelang' => $id_lelang);

		$check1 = $this->m_lelang->check_delete1($where);

		if ($check1 == FALSE) {
			$message = '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Data Gagal Dihapus</strong><br>Barang yang di lelang masih dalam status dibuka harap tutup dahulu lelang nya<button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';		
		}else{
			$check2 = $this->m_lelang->check_delete2($where);

			if ($check2 == FALSE) {
				$message = '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Data Gagal Dihapus</strong><br>Sudah ada penawaran dalam pelelangan ini<button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}else{
				$this->m_lelang->delete_data($where,'lelang');

				$message = '<div class="alert alert-success alert-dismissible" role="alert"><strong>Data Berhasil Dihapus</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}
		}

		$this->session->set_flashdata('pesan',$message);
		
		redirect('admin/lelang_lelang/index');
	}

	// public function cari_lelang()
	// {
	// 	$keyword = $this->input->post('search_text');

	// 	$data['lelang'] = $this->m_lelang->search_data($keyword);

	// 	$this->load->view('templates_adm/header');
	// 	$this->load->view('templates_adm/navbar');
	// 	$this->load->view('admin/lelang/lelang_lelang',$data);
	// 	$this->load->view('templates_adm/footer');
	// }
}

?>