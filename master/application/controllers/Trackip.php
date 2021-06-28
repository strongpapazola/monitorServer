<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trackip extends CI_Controller {

    private function rsecurity()
    {
        if ( !$this->session->userdata('username') ) {
            redirect('auth/');
        }
    }   

    private function ambilipinfo($ip)
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "ipinfo.io/".$ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        return $output;
    }

    public function index($ip='')
    {
        $this->rsecurity();

        if ( $ip ) {
                $data = [
                    'title' => 'Track IP',
                    'active' => 3,
                    'hasilip' => json_decode($this->ambilipinfo($ip),True)
                ];
                $this->load->view('home/i_header', $data);
                $this->load->view('home/i_sidebar');
                $this->load->view('home/i_navbar');
                $this->load->view('trackip/index',$data);
                $this->load->view('home/i_footer');            
        } else {
            $this->form_validation->set_rules('ipaddr','IP Address','required');
            

            if ( $this->form_validation->run() == False ) {
                $data = [
                    'title' => 'Track IP',
                    'active' => 3,
                    'hasilip' => ''
                ];
                $this->load->view('home/i_header', $data);
                $this->load->view('home/i_sidebar');
                $this->load->view('home/i_navbar');
                $this->load->view('trackip/index',$data);
                $this->load->view('home/i_footer');            
            } else {
                $data = [
                    'title' => 'Track IP',
                    'active' => 3,
                    'hasilip' => json_decode($this->ambilipinfo(htmlspecialchars($this->input->post('ipaddr'))),True)
                ];
                $this->load->view('home/i_header', $data);
                $this->load->view('home/i_sidebar');
                $this->load->view('home/i_navbar');
                $this->load->view('trackip/index',$data);
                $this->load->view('home/i_footer');            
            }
        }
    }
}



