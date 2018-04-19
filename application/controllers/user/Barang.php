<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function tambah()
	{
		$this->db->select('RIGHT(barang.kode_barang,3) AS kode', false)->order_by('kode_barang','desc')->limit(1);
		$q = $this->db->get('barang');
		if ($q->num_rows()<>0) {
			$data = $q->row();
			$num  = intval($data->kode)+1;
		} else { $num=1; }

		$kodemax = str_pad($num,3,'0',STR_PAD_LEFT);
		$kode = 'BR'.$kodemax;

		// Insert Ke tabel barang
		$barang = array(
					'kode_barang'   => $kode,
					'nama_barang'   => $this->input->post('nama'),
					'spesifikasi'   => $this->input->post('spek'),
					'lokasi_barang' => $this->input->post('lokasi'),
					'kategori'      => $this->input->post('kategori'),
					'jml_barang'    => 0,
					'kondisi'       => $this->input->post('kondisi'),
					'jenis_barang'  => $this->input->post('jenis'),
					'sumber_dana'   => $this->input->post('sd'),
					'status'        => 1
				);
		$this->db->insert('barang', $barang);
		
		// Insert Ke tabel stok
		$stok = array(
					'kode_barang'   => $kode,
					'nama_barang'   => $this->input->post('nama'),
					'jml_barang_masuk' => 0,
					'jml_barang_keluar'=> 0,
					'keterangan' => ''
				);
		$this->db->insert('stok', $stok);
		redirect(base_url('user/admin/barang'));
	}

	public function info()
	{
		$data['barangInfo'] = $this->db->get_where('barang',array('kode_barang'=>$this->input->post('kode')))->result();
		$this->load->view('user/barang_info', $data);
	}

	public function edit()
	{
		$data['barangEdit'] = $this->db->get_where('barang',array('kode_barang'=>$this->input->post('kodeEdit')))->result();
		$this->load->view('user/barang_edit', $data);
	}

	public function update()
	{
		$kode = array('kode_barang' => $this->input->post('kode'));
		$form = array(
					'nama_barang'   => $this->input->post('nama'),
					'spesifikasi'   => $this->input->post('spek'),
					'lokasi_barang' => $this->input->post('lokasi'),
					'kategori'      => $this->input->post('kategori'),
					'kondisi'       => $this->input->post('kondisi'),
					'jenis_barang'  => $this->input->post('jenis'),
					'sumber_dana'   => $this->input->post('sd')
		 		);
		$this->db->update('barang', $form, $kode);
		redirect(base_url('user/admin/barang'));
	}

	public function hapus($kode)
	{
		$kode1 = array('kode_barang' => $kode);
		$this->db->update('barang', array('status'=>0), $kode1);
		redirect(base_url('user/admin/barang'));
	}

	public function stok_form()
	{
		$data = array(
					'db' => array(
								'barangStok' => $this->db->get_where('barang',array('kode_barang'=>$this->input->post('kodeBar')))->result(),
								'supplier'    => $this->db->get_where('supplier', array('status'=>1))->result()
							)
				);
		$this->load->view('user/barang_tambah_stok', $data);
	}

	public function tambah_stok()
	{
		// Update Stok di tabel Barang
		$kodeBar   = array('kode_barang' => $this->input->post('kode'));
		$barang = array('jml_barang' => $this->input->post('stokakhir'));
		$this->db->update('barang', $barang, $kodeBar);

		// Tambah record di tabel masuk_barang
		$this->db->select('RIGHT(masuk_barang.id_msk_barang,3) AS kode', false)->order_by('id_msk_barang','desc')->limit(1);
		$q = $this->db->get('masuk_barang');
		if ($q->num_rows()<>0) {
			$data = $q->row();
			$num  = intval($data->kode)+1;
		} else { $num=1; }

		$kodemax = str_pad($num,3,'0',STR_PAD_LEFT);
		$kode = 'TM'.$kodemax;

		$masuk_barang = array(
							'id_msk_barang' => $kode, 
							'kode_barang'   => $this->input->post('kode'), 
							'nama_barang'   => $this->input->post('nama'), 
							'tgl_masuk'     => date('Y-m-d'), 
							'jml_masuk'     => $this->input->post('stoktambah'), 
							'kode_supplier' => $this->input->post('supplier'), 
						);
		$this->db->insert('masuk_barang', $masuk_barang);

		// Update record di tabel stok		
		$a = $this->db->get_where('stok', $kodeBar)->result();
		foreach ($a as $a) {
			$tambah = $a->jml_barang_masuk;
		}

		$stok = array(
					'kode_barang'   => $this->input->post('kode'),
					'nama_barang'   => $this->input->post('nama'),
					'jml_barang_masuk' => $this->input->post('stoktambah') + $tambah,
					'keterangan' => $this->input->post('keterangan')
				);
		$this->db->update('stok', $stok, $kodeBar);
		redirect(base_url('user/admin/barang'));
	}

	public function report_masuk()
	{
		$data['barang'] = $this->db->get('masuk_barang')->result();
		$html = $this->load->view('user/report_barang_masuk', $data, TRUE);
		$this->pdf->create($html,'BarangMasuk_'.date('Ymd'));
	}

}
