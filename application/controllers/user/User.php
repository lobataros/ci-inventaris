<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data = array(
					'pageTitle'   => $this->session->userdata('nama').' - Master User',
					'pageHeader'  => 'Data User',
					'pageContent' => 'user/user',
					'user'   => $this->db->get('user')->result()
				);

		$this->load->view('user/admin', $data);
	}

	public function tambah()
	{
		$this->db->select('RIGHT(user.id_user,2) AS kode', false)->order_by('id_user','desc')->limit(1);
		$q = $this->db->get('user');
		if ($q->num_rows()<>0) {
			$data = $q->row();
			$num  = intval($data->kode)+1;
		} else { $num=1; }

		$kodemax = str_pad($num,2,'0',STR_PAD_LEFT);
		$kode = 'U'.$kodemax;

		$cek = $this->db->get_where('user',array('username'=>$this->input->post('uname')));
		if ($cek->num_rows()>0) {
			$this->session->set_flashdata('fail', '<div class="alert alert-danger">
													<i class="fa fa-close"></i><small>&nbsp; Username sudah ada!</small>
												</div>');
			redirect(base_url('user/user'));
		} else {
			$user = array(
						'id_user'  => $kode,
						'nama'     => $this->input->post('nama'),
						'username' => $this->input->post('uname'),
						'password' => md5($this->input->post('pass')),
						'level'    => $this->input->post('akses')
					);
			$this->db->insert('user', $user);
			redirect(base_url('user/user'));
		}

	}

	public function hapus($id)
	{
		$kode1 = array('id_user' => $id);
		$this->db->delete('user', $kode1);
		redirect(base_url('user/user'));
	}

	public function edit()
	{
		$data['uedit'] = $this->db->get_where('user',array('id_user'=>$this->input->post('id')))->result();
		$this->load->view('user/user_edit', $data);
	}

	public function update()
	{
		$kode = array('id_user' => $this->input->post('id'));
		$user = array(
						'nama'     => $this->input->post('nama'),
						'password' => md5($this->input->post('pass')),
						'level'    => $this->input->post('akses')
					);
		$this->db->update('user', $user, $kode);
		redirect(base_url('user/user'));
	}

	public function cari()
	{
		$q = $this->input->get('cari');
		$data = array(
					'pageTitle'   => $this->session->userdata('nama').' - Master User',
					'pageHeader'  => 'Data User',
					'pageContent' => 'user/user_cari',
					'user'        => $this->db->query("SELECT * FROM `user` WHERE id_user LIKE '%$q%' OR nama LIKE '%$q%' OR username LIKE '%$q%'")->result()
				);
		
		$this->load->view('user/admin', $data);
	}

}
