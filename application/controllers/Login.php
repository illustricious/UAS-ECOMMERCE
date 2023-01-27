<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		
	}
 
	function index(){
		$this->load->view('v_login');
	}
 

	function aksi_login(){
		$username_user = $this->input->post('username_user');
		$password_user = $this->input->post('password_user');
		$this->form_validation->set_rules('username_user','Username','required');
		$this->form_validation->set_rules('password_user','Password','required');

		if ($this->form_validation->run() != FALSE) {
			$user = $this->m_login->getByName($username_user);
			if ($user == null || $user->password_user != md5($password_user)) {
				$this->session->set_flashdata('Alert', 'user tidak ditemukan');
				return redirect(base_url('login'));
			}

			$getGroup = $this->db->get_where('user_group', ['id_user_group' => $user->id_user_group])->row();
			$session = array('id_user' => $user->id_user, 'id_user_group' => $user->id_user_group, 'nama_user' => $user->nama_user, 'status' => "login{$getGroup->nama_user_group}");
			$this->session->set_userdata($session);
			return redirect(base_url($getGroup->redirect));
		}
		else {
			$this->session->set_flashdata('Alert', validation_errors());
			redirect(base_url('login'));
		}


	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('v_login'));
	}

}