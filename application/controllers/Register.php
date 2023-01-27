<?php 
 
class Register extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		
	}
 
	function index(){
		$this->load->view('v_register');
	}
 

	function aksi_register(){
		$name_user = $this->input->post('name_user');
		$username_user = $this->input->post('username_user');
		$password_user = $this->input->post('password_user');
		$email_user = $this->input->post('email_user');
		$telepon_user = $this->input->post('telepon_user');

		$this->form_validation->set_rules('name_user','Full Name','required');
		$this->form_validation->set_rules('username_user','Username','required');
		$this->form_validation->set_rules('password_user','Password','required');
		$this->form_validation->set_rules('email_user','Email','required');
		$this->form_validation->set_rules('telepon_user','No Telepon','required');

		if ($this->form_validation->run() != FALSE) {
            if ($this->m_login->getByName($username_user) != null) {
				$this->session->set_flashdata('Alert', 'Username sudah digunakan');
				return redirect(base_url('register'));
            }

            $this->db->insert('user', [
                'nama_user' => $name_user,
                'email_user' => $email_user,
                'tlp_user' => $telepon_user,
                'username_user' => $username_user,
                'password_user' => md5($password_user),
                'id_user_group' => 3
            ]);
            $userId = $this->db->insert_id();

            $user = $this->m_login->get($userId);
			$getGroup = $this->db->get_where('user_group', ['id_user_group' => $user->id_user_group])->row();
			$session = array('id_user' => $user->id_user, 'id_user_group' => $user->id_user_group, 'nama_user' => $user->nama_user, 'status' => "login{$getGroup->nama_user_group}");
			$this->session->set_userdata($session);
			return redirect(base_url($getGroup->redirect));
		}
		else {
            $this->session->set_flashdata('Alert', validation_errors());
            redirect(base_url('register'));
		}


	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('v_login'));
	}

}