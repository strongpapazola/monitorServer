<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		rauth();
		$data = [
			'title' => 'Dashboard',
			'active' => 0,
			"user" => get_where('user','username',$this->session->userdata('username'))
		];
		$this->load->view('home/i_header', $data);
		$this->load->view('home/i_sidebar', $data);
		$this->load->view('home/i_navbar');
		$this->load->view('home/welcome',$data);
		$this->load->view('home/i_footer');						
	}

	public function publik()
	{
		rauth();
		role('public',True);

		$data = [
			'title' => 'Dashboard',
			'active' => 1,
			'public' => getall('public')
		];
		$this->load->view('home/i_header', $data);
		$this->load->view('home/i_sidebar', $data);
		$this->load->view('home/i_navbar');
		$this->load->view('home/index',$data);
		$this->load->view('home/i_footer');				
	}

	public function tambahserver()
	{
		rauth();
		role('public',True);

		$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[25]|is_unique[name_reg.name]');
		$this->form_validation->set_rules('target', 'Target', 'required|max_length[1]');

		if ( $this->form_validation->run() == False ) {

			$data = [
				'title' => 'Tambah Server',
				'active' => 1,
			];
			$this->load->view('home/i_header', $data);
			$this->load->view('home/i_sidebar', $data);
			$this->load->view('home/i_navbar');
			$this->load->view('home/tambahserver');
			$this->load->view('home/i_footer');

		} else {

			$data = [
				'name' => htmlspecialchars($this->input->post('name')),
				'target' => htmlspecialchars($this->input->post('target'))
			];
			insert('name_reg', $data);
			$this->session->set_flashdata('data', '<div class="alert alert-success" role="alert">Server Ditambahkan</div><br>');
			redirect('home');

		}
	}

	public function local()
	{
		rauth();
		role('local',True);

		$data = [
			'title' => 'Dashboard',
			'active' => 2
		];
		$this->load->view('home/i_header', $data);
		$this->load->view('home/i_sidebar',$data);
		$this->load->view('home/i_navbar');
		$this->load->view('home/local');
		$this->load->view('home/i_footer');
	}

	public function info($id, $service)
	{
		rauth();
		role('public',True);

		$public = get_where('public', 'id', $id);
		$public_command = get_where('public_command', 'name', $public['name']);

		$data = [
			'title' => 'Dashboard',
			'active' => 1,
			'server' => $public,
			'public_command' => $public_command,
			'service' => $service
		];
		$this->load->view('home/i_header', $data);
		$this->load->view('home/i_sidebar',$data);
		$this->load->view('home/i_navbar');
		$this->load->view('home/info',$data);
		$this->load->view('home/i_footer');		
	}

	public function register()
	{
		rauth();
		role('user_manage',True);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('role_id', 'Role', 'required|numeric|max_length[1]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'min_length' => 'Password too short',
			'matches' => 'Passwoord not same'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'matches[password2]');

		if ( $this->form_validation->run() == False ) {
			$data = [
				'title' => 'Register Page',
			];
			$this->load->view('home/i_header', $data);
			$this->load->view('auth/register');
			$this->load->view('home/i_footer');				
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
				'role_id' => htmlspecialchars($this->input->post('role_id'))
			];
			insert('user',$data);
			$this->session->set_flashdata('data','<div class="alert alert-success" role="alert">User Ditambahkan</div><br>');
			redirect(base_url('home'));
		}			
	}

	public function service_list()
	{
		rauth();
		role('public',True);

		$this->form_validation->set_rules('name','Name','required');

		if ( $this->form_validation->run() == False ) {
			echo form_error('name');
			echo form_error('nameservice');
			echo form_error('nameservicec');
			die();
		} else {		
			$res = $this->db->get_where('public',['name'=>htmlspecialchars($this->input->post('name'))])->row_array();

			$service_string = [];
			$it = count( explode(',,,', $res['service_list']) );
			$i = 1;
			while ($i <= $it) {
				if ( htmlspecialchars($this->input->post('nameservicec'.$i)) == '1' ) {
					$action = '1';
				} else {
					$action = '2';
				}
				if ( explode('...', explode(',,,', $res['service_list'])[$i-1])[2] == 'active' ) {
					$stat_ser = '1';
				} else {
					$stat_ser = '2';
				}
				if ( $action == $stat_ser ) {
					$execute = '1';
				} else {
					$execute = '2';
				}
				$a = implode("...", [htmlspecialchars($this->input->post("nameservice".$i)),$action,$execute]);
				array_push($service_string, $a);
				$i++;
			}
			$data = [
				'name' => $res['name'],
				"service_list" => implode(',,,', $service_string),
			];
			if ( $this->db->get_where('public_command', ['name' => $res['name']])->row_array() ) {
				$this->db->where('name',$res['name']);
				$this->db->update('public_command',$data);
			} else {
				$this->db->insert('public_command',$data);
			}
			redirect(base_url('home/info/'.htmlspecialchars($this->input->post('id')).'/service'));
		}
	}

	public function user()
	{
		rauth();
		role('user_manage',True);

		$data = [
			'title' => 'User Manage',
			'active' => 5,
			'user' => getall('user')
		];
		$this->load->view('home/i_header', $data);
		$this->load->view('home/i_sidebar');
		$this->load->view('home/i_navbar');	
		$this->load->view('home/user',$data);
		$this->load->view('home/i_footer');
	}

	public function user_detail($id)
	{
		rauth();
		role('user_manage',True);

		if ($this->form_validation->run() == False) {
			$data = [
				'title' => 'User Manage',
				'active' => 5,
				'user' => get_where('user','id',$id)
			];
			$this->load->view('home/i_header', $data);
			$this->load->view('home/i_sidebar');
			$this->load->view('home/i_navbar');	
			$this->load->view('home/user_detail',$data);
			$this->load->view('home/i_footer');			
		} else {
			echo "string";
		}
	}
}
 			