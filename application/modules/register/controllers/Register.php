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
        // $vals = array(
        //     'img_path'	 => './captcha/',
        //     'img_url'	 => base_url().'captcha/',
        //     'img_width'	 => '350',
        //     'img_height' => 70,
        //     'border' => 0, 
        //     'expiration' => 7200,
        //     'font_size' => 20,
        //     'font_path' => base_url().'/assets/fonts/verdana.ttf'
        // );

        //  // create captcha image
        //  $cap = create_captcha($vals);

        // // store image html code in a variable
        // $dataContent['image'] = $cap['image'];

        // // store the captcha word in a session
        // $this->session->set_userdata('mycaptcha', $cap['word']);

        
        $this->load->view('templates/header', $dataGlobal);
        $this->load->view('register', $dataContent);
        $this->load->view('templates/footer');
    }

    public function validation() {
        $this->session->set_userdata('captcha_answer',$this->input->post('code'));
        $this->form_validation->set_rules('fullname', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[t_user.User_email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
       // $this->form_validation->set_rules('captcha', 'Captcha', 'required|integer|callback_check_captcha');
        
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
            redirect('login');
        }
        else {
            $this->index();
        }
    }

    
    // public function check_captcha($string) {
    //     if($string != $this->session->userdata('captcha_answer')):
    //         $this->form_validation->set_message('check_captcha', 'captcha incorrect');
    //         return false;
    //     else:
    //         return true; 
    //     endif;
    // }


}