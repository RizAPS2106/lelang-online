<?php  

class Data extends CI_Controller
{
	//Masyarakat
	public function data_masyarakat()
	{
		$data['masyarakat'] = $this->m_data->tampil_data_masyarakat();

		$this->load->view('templates_ptg/header');
		$this->load->view('templates_ptg/navbar');
		$this->load->view('petugas/data/data_masyarakat',$data);
		$this->load->view('templates_ptg/footer');
	}

	// public function cari_masyarakat()
	// {
	// 	$keyword = $this->input->post('cari_masyarakat');

	// 	$data['masyarakat'] = $this->m_data->search_masyarakat($keyword);

	// 	$this->load->view('templates_adm/header');
	// 	$this->load->view('templates_adm/navbar');
	// 	$this->load->view('petugas/data/data_masyarakat',$data);
	// 	$this->load->view('templates_adm/footer');
	// }
}

?>