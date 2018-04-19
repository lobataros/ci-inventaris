<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function peminjaman()
	{
		$data = array(
					'pageTitle'   => $this->session->userdata('nama').' - Trans. Peminjaman',
					'pageHeader'  => 'Transaksi Peminjaman Barang',
					'pageContent' => 'user/peminjaman',
					'db'		  => array(
										'barang'    => $this->db->get_where('barang', array('status'=>1))->result(), 
										'barangJml' => $this->db->get('barang')->num_rows()
									)
				);

		$this->load->view('user/admin', $data);
	}

	public function pinjamkan()
	{
		$data['peminjaman'] = $this->db->get_where('barang',array('kode_barang'=>$this->input->post('kodeBarang')))->result();
		$this->load->view('user/peminjaman_form', $data);
	}

	public function pinjamkan_proses()
	{
		$kodeBar   = array('kode_barang' => $this->input->post('kode'));

		$this->db->select('jml_barang');
		$z = $this->db->get_where('barang', $kodeBar)->result();
		foreach ($z as $a) {
			$banyak = $a->jml_barang;
		}

		if ($this->input->post('jml_pinjam') > $banyak) {
			$this->session->set_flashdata('gagal', '<div class="alert alert-danger">
														<i class="fa fa-close"></i> &nbsp;<small>Jumlah barang yang ingin dipinjam terlalu banyak</small>
													</div>'
										);
			redirect(base_url('user/transaksi/peminjaman'));
		} else {
			// Update Stok di tabel stok
			$stok = array(
						'jml_barang_keluar' => $this->input->post('jml_pinjam')
					);
			$this->db->update('stok', $stok, $kodeBar);

			// Insert Pinjam Barang
			$this->db->select('RIGHT(pinjam_barang.kode_pinjam,3) AS kode', false)->order_by('kode_pinjam','desc')->limit(1);
			$q = $this->db->get('pinjam_barang');
			if ($q->num_rows()<>0) {
				$data = $q->row();
				$num  = intval($data->kode)+1;
			} else { $num=1; }

			$kodemax = str_pad($num,3,'0',STR_PAD_LEFT);
			$kode = 'PJ'.$kodemax;

			$barang = array(
						'kode_pinjam' => $kode,
						'tgl_pinjam'  => date('Y-m-d'),
						'kode_barang' => $this->input->post('kode'),
						'nama_barang' => $this->input->post('nama'),
						'jml_pinjam'  => $this->input->post('jml_pinjam'),
						'peminjam'    => $this->input->post('peminjam'),
						'tgl_kembali' => $this->input->post('kembali'),
						'keterangan'  => $this->input->post('keterangan'),
						'status'      => 0
					);
			$this->db->insert('pinjam_barang', $barang);

			// Update stok di tabel barang
			$this->db->select('jml_barang');
			$a = $this->db->get_where('barang', $kodeBar)->result();
			foreach ($a as $a) {
				$tambah = $a->jml_barang;
			}

			$stok = array(
						'jml_barang' => $tambah - $this->input->post('jml_pinjam')
					);
			$this->db->update('barang', $stok, $kodeBar);
			redirect(base_url('user/transaksi/peminjaman'));
		}
	}

	public function pinjam_info()
	{
		$data['pinjaman'] = $this->db->get_where('pinjam_barang',array('kode_pinjam' => $this->input->post('kodepinjam')))->result();
		$this->load->view('user/peminjaman_info', $data);
	}

	public function pengembalian()
	{
		$data = array(
					'pageTitle'   => $this->session->userdata('nama').' - Trans. Pengembalian',
					'pageHeader'  => 'Transaksi Pengembalian Barang',
					'pageContent' => 'user/pengembalian',
					'db'		  => array(
										'pinjam'    => $this->db->get('pinjam_barang')->result(), 
										'pinjamJml' => $this->db->get('pinjam_barang')->num_rows()
									)
				);

		$this->load->view('user/admin', $data);
	}

	public function kembalikan_proses()
	{
		$kodeBar   = array('kode_barang' => $this->input->post('kode'));

		// Update stok di tabel barang
		$this->db->select('jml_barang');
		$a = $this->db->get_where('barang', $kodeBar)->result();
		$tambah = 0;
		$tambahkan = 0;
		$tambahin = 0;
		foreach ($a as $a) {
			$tambah = $a->jml_barang;
		}

		$stokBar = array(
					'jml_barang' => $tambah + $this->input->post('kembali')
				);
		$this->db->update('barang', $stokBar, $kodeBar);

		// Update stok di tabel stok
		$this->db->select('jml_barang_masuk');
		$i = $this->db->get_where('stok', $kodeBar)->result();
		foreach ($i as $a) {
			$tambahkan = $a->jml_barang_masuk;
		}

		$stok = array(
					'jml_barang_masuk' => $tambahkan + $this->input->post('kembali')
				);
		$this->db->update('stok', $stok, $kodeBar);

		// Update Pinjam Barang
		$kodePin = array('kode_pinjam' => $this->input->post('kopin'));
		$this->db->select('jml_pinjam');
		$u = $this->db->get_where('pinjam_barang', $kodePin)->result();
		foreach ($u as $a) {
			$tambahin = $a->jml_pinjam;
		}

		$stok = array(
					'jml_pinjam' => $tambahin - $this->input->post('kembali'),
					'status' => 1
				);
		$this->db->update('pinjam_barang', $stok, $kodeBar);

		redirect(base_url('user/transaksi/pengembalian'));
	}

	public function kembalikan_form()
	{
		$data['kembali'] = $this->db->get_where('pinjam_barang',array('kode_pinjam'=>$this->input->post('kodepinjam')))->result();
		$this->load->view('user/pengembalian_form', $data);
	}

}
