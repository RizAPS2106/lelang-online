<?php  

class Dashboard_ptg extends CI_Controller
{
	
	public function index()
	{
		$data['jumlah_masyarakat'] = $this->m_dashboard->jumlah_data('masyarakat');
		$data['jumlah_petugas'] = $this->m_dashboard->jumlah_data('petugas');
		$data['jumlah_barang'] = $this->m_dashboard->jumlah_data('barang');
		$data['jumlah_lelang'] = $this->m_dashboard->jumlah_data('lelang');
		$data['jumlah_lelang_perbulan'] = $this->m_dashboard->jumlah_lelang_perbulan();
		$data['top_pelelangan'] = $this->m_dashboard->top_pelelangan();

		$this->load->view('templates_ptg/header');
		$this->load->view('templates_ptg/navbar');
		$this->load->view('petugas/dashboard_ptg',$data);
		$this->load->view('templates_ptg/footer');
	}

	public function report_msy()
	{
		$this->load->library('dompdf_gen');

		$data['masyarakat'] = $this->m_dashboard->tampil_data('masyarakat');

		$this->load->view('petugas/laporan/laporan_masyarakat',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('Laporan_Masyarakat.pdf',array('Attachment' => 0));
	}

	public function report_ptg()
	{
		$this->load->library('dompdf_gen');

		$data['petugas'] = $this->m_dashboard->tampil_data('petugas');

		$this->load->view('petugas/laporan/laporan_petugas',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('Laporan_Petugas.pdf',array('Attachment' => 0));
	}

	public function report_brg()
	{
		if ($this->input->post('from') AND $this->input->post('to')) {
			$data['from'] = date('Y-m-d', strtotime($this->input->post('from')));
			$data['to'] = date('Y-m-d', strtotime($this->input->post('to')));

			$data['barang'] = $this->m_dashboard->tampil_data_from_to_brg($data['from'],$data['to']);
		}else{
			$data['barang'] = $this->m_dashboard->tampil_data('barang');
		}

		$this->load->library('dompdf_gen');

		$this->load->view('petugas/laporan/laporan_barang',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('Laporan_Barang.pdf',array('Attachment' => 0));
	}

	public function report_llg()
	{
		if ($this->input->post('from') AND $this->input->post('to')) {
			$data['from'] = date('Y-m-d', strtotime($this->input->post('from')));
			$data['to'] = date('Y-m-d', strtotime($this->input->post('to')));

			$data['lelang'] = $this->m_dashboard->tampil_data_from_to_llg($data['from'],$data['to']);
		}else{
			$data['lelang'] = $this->m_dashboard->tampil_data_lelang();
		}

		$this->load->library('dompdf_gen');

		$this->load->view('petugas/laporan/laporan_lelang',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('Laporan_Lelang.pdf',array('Attachment' => 0));
	}
	
}
