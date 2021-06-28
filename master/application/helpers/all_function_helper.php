<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function rhome()
{
    $ci =& get_instance();
    if ( $ci->session->userdata('username') ) {
        redirect('home/');
    }
}   

function rauth()
{
    $ci =& get_instance();
    if ( !$ci->session->userdata('username') ) {
        redirect('auth/');
    }
}   

function get_where($table,$column,$identify)
{
    $ci =& get_instance();
    return $ci->db->get_where($table,[ $column => $identify ])->row_array();
}

function getall($table)
{
    $ci =& get_instance();
    return $ci->db->get($table)->result_array();    
}

function insert($table, $data)
{
    $ci =& get_instance();
    return $ci->db->insert($table, $data);
}

function role($column,$redirect='')
{
    $ci =& get_instance();
    if ( get_where('user', 'username', $ci->session->userdata('username'))[$column] == '1') {
        return True;
    } else {
        if ($redirect == True) {
            if (isset($_SERVER['HTTP_REFERER'])) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);                    
            } else {
                redirect(base_url('home'));
            }
        } else {
            return False;
        }
    }

}