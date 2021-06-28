<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		rhome();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

		if ( $this->form_validation->run() == False ) {
			$data = [
				'title' => 'Login Page',
			];
			$this->load->view('home/i_header', $data);
			$this->load->view('auth/index');
			$this->load->view('home/i_footer');			
		} else {
			$data = [
				"ip" => $this->input->ip_address(),
				'captcha' => trim($this->input->post('g-recaptcha-response')),
				'username' => htmlspecialchars($this->input->post('username')),
		        'password' => htmlspecialchars($this->input->post('password')),
			];
			// $status = json_decode(shell_exec('curl -X POST "https://www.google.com/recaptcha/api/siteverify?secret=6Le5xKwZAAAAALNCZmcGh56txEmyuQXNh0VPpVOk&response='.$data['captcha']."&remoteip=".$data['ip'].'"'),True);
			$status['success'] = "true";
		    $user = get_where('user','username',$data['username']);

	        if ( $status['success'] == 'true' ) {
	     		if ( $user['username'] == $data['username'] ) {
	     			if ( password_verify($data['password'], $user['password']) == True ) {

	     		    	$data = [
	     		    		'username' => $user['username']
	     		    	];

	     		    	$this->session->set_userdata($data);
	     		    	redirect(base_url('home'));

	     			} else {
			            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong password.</div>');	        		     			
			            redirect(base_url('auth'));
	     			}
	     		} else {
		            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username not registered.</div>');	        		     			
		            redirect(base_url('auth'));
	     		}
	        } else {
	            $this->session->set_flashdata('captchaerror', '<small class="form-text text-danger">Recaptcha Incorrect. Please try again.</small>');
	            redirect(base_url('auth'));
	        }
		}
	}

	public function logout()
	{
		rauth();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">Logout successfully.</div>');
		redirect(base_url('auth'));
	}
}
