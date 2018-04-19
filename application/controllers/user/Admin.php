<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		($this->session->userdata('status')!=TRUE) ? redirect(base_url()) : '';
	}

	public function index()
	{
		$data = array(
					'pageTitle'   => $this->session->userdata('nama').' - Dashboard',
					'pageHeader'  => 'LOGIN USER',
					'pageContent' => 'user/dashboard'
				);

		$this->load->view('user/admin', $data);
	}

	public function barang()
	{
		$data = array(
					'pageTitle'   => $this->session->userdata('nama').' - Master Barang',
					'pageHeader'  => 'Data Barang Per Tanggal : ' . date('d M Y'),
					'pageContent' => 'user/barang',
					'db'		  => array(
										'barang'    => $this->db->get_where('barang', array('status'=>1))->result(), 
										'barangJml' => $this->db->get('barang')->num_rows()
									)
				);

		$this->load->view('user/admin', $data);
	}

}
