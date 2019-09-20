<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('id')) {
            redirect('dashboard');
        }
        $this->load->library('form_validation');
        $this->load->model('register_model');
    }

    public function index () {
        
        $dataGlobal['title_page'] = 'Register';

        // $dataContent = array(
        //     'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
        //     'script_captcha' => $this->recaptcha->getScriptTag(),
        // );
        
        $this->load->view('templates/header', $dataGlobal);
        $this->load->view('register');
        $this->load->view('templates/footer');
    }

    public function validation() {
        $this->form_validation->set_rules('fullname', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[t_user.User_email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // $recaptcha = $this->input->post('g-recaptcha-response');
        // $response = $this->recaptcha->verifyResponse($recaptcha);
        // if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
        //     $this->index();
        // } else {
        //     // lakukan proses validasi login disini
        //     // pada contoh ini saya anggap login berhasil dan saya hanya menampilkan pesan berhasil
        //     // tapi ini jangan di contoh ya menulis echo di controller hahahaha
            
        // }
        
        if ($this->form_validation->run()) {
            $password = $this->input->post('password');

            $key = $this->config->item('encryption_key');
            $salt1 = hash('sha512', $key . $password);
            $salt2 = hash('sha512', $password . $key);
            $hashed_password = hash('sha512', $salt1 . $password . $salt2);

            $data = array(
                'User_name'  => $this->input->post('fullname'),
                'User_email'  => $this->input->post('email'),
                'User_password' => $hashed_password,
                'User_nohp' => $this->input->post('nohp'),
               );
            //input data
            $this->register_model->insert($data);
        }
        else {
            $this->index();
        }
    }
}