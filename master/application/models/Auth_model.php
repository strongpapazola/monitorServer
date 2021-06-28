<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Controller {
    public function captcha_curl($url)
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        return json_decode($output, true);      
    }
}
