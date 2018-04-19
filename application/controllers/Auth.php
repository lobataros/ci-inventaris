<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// SECURITY
		($this->session->userdata('status')==TRUE) ? redirect(base_url('user/admin')) : '';
		$data = array(
					'pageTitle' => 'Login - Aplikasi Inventaris & Sarana Prasarana SMK',
					'pageHeader'  => 'LOGIN USER',
				);

		$this->load->view('index', $data);
	}

	public function login()
	{
		$form = array(
					'username' => $this->input->post('uname'), 
					'password' => md5($this->input->post('passw'))
				);
		$q = $this->db->get_where('user', $form);

		if ($q->num_rows()>0) {
			foreach ($q->result() as $u) {
				$id    = $u->id_user;
				$nama  = $u->nama;
				$uname = $u->username;
				$pass  = $u->password;
				$lvl   = $u->level;
			}

			$sess = array(
						'id'     => $id,
						'nama'   => $nama,
						'uname'  => $uname,
						'pass'   => $pass,
						'lvl'    => $lvl,
						'status' => TRUE
					);
			
			$this->session->set_userdata($sess);
			redirect('user/admin');
		} else {
			redirect(base_url());
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
