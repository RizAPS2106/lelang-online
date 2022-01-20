<?php  

class Riwayat extends CI_Controller
{
	
	public function index()
	{
		$config['base_url'] = site_url('riwayat/index');
		$config['total_rows'] = $this->m_riwayat->tampil_data()->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = floor($choice);

		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['riwayat'] = $this->m_riwayat->tampil_data($config['per_page'],$data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('riwayat',$data);
		$this->load->view('templates/footer');
	}

	public function detail_lelang($id_lelang)
	{
		$detail1 = $this->m_lelang_transaksi->detail_data1($id_lelang);
		$data['detail1'] = $detail1;

		$where = array('lelang.id_lelang' => $id_lelang);
		$data['detail2'] = $this->m_lelang_transaksi->detail_data2($where)->result();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('lelang_transaksi',$data);
		$this->load->view('templates/footer');
	}
}

?>