<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function index()
	{
		$data = array(
					'pageTitle'   => $this->session->userdata('nama').' - Master Supplier',
					'pageHeader'  => 'Data Supplier',
					'pageContent' => 'user/supplier',
					'supplier'   => $this->db->get_where('supplier', array('status'=>1))->result()
				);

		$this->load->view('user/admin', $data);
	}

	public function tambah()
	{
		$this->db->select('RIGHT(supplier.kode_supplier,3) AS kode', false)->order_by('kode_supplier','desc')->limit(1);
		$q = $this->db->get('supplier');
		if ($q->num_rows()<>0) {
			$data = $q->row();
			$num  = intval($data->kode)+1;
		} else { $num=1; }

		$kodemax = str_pad($num,3,'0',STR_PAD_LEFT);
		$kode = 'SP'.$kodemax;

		$supplier = array(
					'kode_supplier'   => $kode,
					'nama_supplier'   => $this->input->post('nama'),
					'alamat_supplier' => $this->input->post('alamat'),
					'telp_supplier'   => $this->input->post('telp'),
					'kota_supplier'   => $this->input->post('kota'),
					'status'		  => 1
				);
		$this->db->insert('supplier', $supplier);
		redirect(base_url('user/supplier'));
	}

	public function hapus($kode)
	{
		$kode1 = array('kode_supplier' => $kode);
		$this->db->update('supplier', array('status'=>0), $kode1);
		redirect(base_url('user/supplier'));
	}

	public function edit()
	{
		$data['supedit'] = $this->db->get_where('supplier',array('kode_supplier'=>$this->input->post('kodesup')))->result();
		$this->load->view('user/supplier_edit', $data);
	}

	public function update()
	{
		$kode = array('kode_supplier' => $this->input->post('kode'));
		$supplier = array(
					'nama_supplier'   => $this->input->post('nama'),
					'alamat_supplier' => $this->input->post('alamat'),
					'telp_supplier'   => $this->input->post('telp'),
					'kota_supplier'   => $this->input->post('kota'),
					'status'		  => 1
				);
		$this->db->update('supplier', $supplier, $kode);
		redirect(base_url('user/supplier'));
	}

}
