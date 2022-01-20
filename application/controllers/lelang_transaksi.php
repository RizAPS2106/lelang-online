<?php  

class Lelang_transaksi extends CI_Controller
{
	
	public function detail_lelang($id_lelang)
	{
		$detail1 = $this->m_lelang_transaksi->detail_data1($id_lelang)->row();
		$data['detail1'] = $detail1;

		$where = array('lelang.id_lelang' => $id_lelang);
		$data['detail2'] = $this->m_lelang_transaksi->detail_data2($where)->result();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('lelang_transaksi',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_lelang_transaksi(){
		$id_history = $this->m_lelang_transaksi->id_input();
		$id_lelang = $this->input->post('id_lelang');
		$id_barang = $this->input->post('id_barang');
		$id_user = $this->session->userdata('id_user');
		$harga_akhir = $this->input->post('harga_akhir');
		$penawaran_harga_format = $this->input->post('penawaran_harga');
		$penawaran_harga = str_replace(".", "", $penawaran_harga_format);
		$penawaran_harga_s = $penawaran_harga + $harga_akhir;

		$data = array('id_history' => $id_history,
					  'id_lelang' => $id_lelang,
					  'id_barang' => $id_barang,
					  'id_user' => $id_user,
					  'penawaran_harga' => $penawaran_harga_s);

		$where_update = array('id_lelang' => $id_lelang, 'id_user' => $id_user);
		$data_update = array('penawaran_harga' => $penawaran_harga_s);

		$where_update_s = array('id_lelang' => $id_lelang);
		$data_update_s = array('id_user' => $id_user,'harga_akhir' => $penawaran_harga_s);

		if ($penawaran_harga == 0) {
			$message = 'Harap isi dengan nominal yang bukan nol';
		}else{
			$check1 = $this->m_lelang_transaksi->check_input1();

			if ($check1 == FALSE) {
				$message = 'Anda sudah menduduki posisi pertama pelelangan';
			}else{
				$check2 = $this->m_lelang_transaksi->check_input2();

				if ($check2 == FALSE) {
					$this->m_lelang_transaksi->update_data($where_update,$data_update,'history_lelang');
					$this->m_lelang_transaksi->update_input_data($where_update_s,$data_update_s,'lelang');
				}else{
					$this->m_lelang_transaksi->input_data($data,'history_lelang');
					$this->m_lelang_transaksi->update_input_data($where_update_s,$data_update_s,'lelang');
				}

				$message = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Penawaran Berhasil</strong><button type="button" class="h-100 close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}	
		}

		if ($message == 'Anda sudah menduduki posisi pertama pelelangan' || $message == 'Harap isi dengan nominal yang bukan nol') {
			echo $message;
		}else{
			$this->session->set_flashdata('pesan',$message);
		}
	}

}

?>