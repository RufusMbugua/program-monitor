<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('global_model');
        $this->load->model('users_model');
        $this->load->module('county_profile');
    }

    public function index() {
        $data['contentView'] = "users/index";
        $data['menu'] = false;
        $this->template($data);
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $config = array(array('field' => 'username', 'label' => 'Username', 'rules' => 'required|valid_email'), array('field' => 'password', 'label' => 'Password', 'rules' => 'required|alpha_dash|min_length[8]'));
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $data['contentView'] = "users/index";
            $data['hide_menu'] = 1;
            $this->template($data);
        } else {
            $found = $this->check_if_exists($username,$password);
            if($found>0){
                $this->get_user_info($username,$password);
                redirect('county_profile');
            }
            else{
                $this->index();
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/login');
    }
    public function check_if_exists($username,$password){
        $this->db->like(array('user_email' => $username, 'user_password' => $password));
        $this->db->from('users');
        $count = $this->db->count_all_results();
        return $count;
    }
    public function add_user() {
    }
    public function edit_user() {
    }

    public function check_session(){
        $username=$this->session->userdata('user_name');
        if($username==false){
            redirect('users/login');
        }
    }
    public function get_user_info($username,$password) {
        $results = $this->db->get_where('users',array('user_email' => $username, 'user_password' => $password));

        $results = $results->result_array();
        $this->session->set_userdata($results[0]);

    }
    public function template($data) {
        $data['show_menu'] = 0;
        $data['show_sidemenu'] = 0;
        $this->load->module('template');
        $this->template->index($data);
    }
}
