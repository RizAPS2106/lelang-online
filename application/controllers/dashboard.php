<?php 

class Dashboard extends CI_Controller
{
	
	public function index()
	{	
		if ($this->input->get('cari')) {
			$keyword = $this->input->get('keyword');

			$this->session->set_userdata('pencarian',$keyword);
		}

		if ($this->input->get('lokasi') || $this->input->get('kategori') || $this->input->get('urutkan')){
			$lokasi = $this->input->get('lokasi');
			$kategori = $this->input->get('kategori');
			$urutkan = $this->input->get('urutkan');

			$this->session->set_userdata('lokasi',$lokasi);
			$this->session->set_userdata('kategori',$kategori);
			$this->session->set_userdata('urutkan',$urutkan);
		}

		$keyword = $this->session->userdata('pencarian');

		$config['base_url'] = site_url('dashboard/index');
		$config['total_rows'] = $this->m_dashboard->tampil_data_lelang_msy($keyword)->num_rows();
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = floor($choice);

		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['lelang'] = $this->m_dashboard->tampil_data_lelang_msy($keyword,$config['per_page'],$data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
	}

	public function bersihkan_filter_lelang()
	{
		$this->session->unset_userdata('lokasi');
		$this->session->unset_userdata('kategori');
		$this->session->unset_userdata('urutkan');
		$this->session->unset_userdata('pencarian');

		redirect('dashboard');
	}
}

?>