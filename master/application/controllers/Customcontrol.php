<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customcontrol extends CI_Controller {

    public function index()
    {
        rauth();
        role('custom_control',True);

        $data = [
            'title' => 'Custom Control',
            'active' => 4,
            'customcontrol' => getall('customcontrol')
        ];
        $this->load->view('home/i_header', $data);
        $this->load->view('home/i_sidebar', $data);
        $this->load->view('home/i_navbar');
        $this->load->view('customcontrol/index',$data);
        $this->load->view('home/i_footer');             
    }

    public function detail($id)
    {
        rauth();
        role('custom_control',True);

        if ($this->input->post('command')) {
            $data = [
                'command' => htmlspecialchars($this->input->post('command'))
            ];
            $this->db->where('id', $id);
            $this->db->update('customcontrol', $data);
            redirect('customcontrol/detail/'.$id);
        } else {
            $data = [
                'title' => 'Custom Control',
                'active' => 4,
                'customcontrol' => get_where('customcontrol', 'id', $id)
            ];
            $this->load->view('home/i_header', $data);
            $this->load->view('home/i_sidebar', $data);
            $this->load->view('home/i_navbar');
            $this->load->view('customcontrol/detail',$data);
            $this->load->view('home/i_footer');                                 
        }
    }

    // Untuk get dari node
    public function get($name)
    {
        $data = get_where('customcontrol', 'unik', $name);
        echo '{"command":'.$data['command'].'}';
    }
}