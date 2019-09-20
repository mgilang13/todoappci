<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('login');
        }
        $this->load->model('dashboard_model');
    }

    public function index() {
        $dataGlobal['title_page'] = 'Dashboard';
        $dataContent['fetch_data'] = $this->dashboard_model->get_todos();

        $this->load->view('templates/header', $dataGlobal);
        $this->load->view('dashboard', $dataContent);
        $this->load->view('templates/footer');
    }

    public function insert() {
        $data['Todo_activity'] = $this->input->post("Todo_activity");
        $this->dashboard_model->insert($data);
        redirect("dashboard");
    }

    public function show_update_form() {
        $this->load->view('update_dashboard');
    }

    public function edit($todo_id = null) {
        if(!isset($todo_id)) redirect('dashboard');
        $data["todos"] = $this->dashboard_model->getById($todo_id);
        if(!$data["todos"]) show_404();
        $dataGlobal = "Halaman Update";
        $this->load->view('templates/header', $dataGlobal);
        $this->load->view('update_dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function updateProcess() {
        
        $this->dashboard_model->update();
        $this->session->set_flashdata('success', "Berhasil di-update");
        redirect('dashboard');
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $this->dashboard_model->delete($id);
        redirect('dashboard');
    }

    public function logout() {
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value) {
            $this->session->unset_userdata($row);
        }

        redirect('login');
    }

    public function doneclick($todo_id = null) {
        $this->dashboard_model->doneclick();
    }

    public function show_done() {
        $dataGlobal = "Tugas Selesai";
        $dataContent['fetch_data'] = $this->dashboard_model->get_done_todos();

        $this->load->view("templates/header", $dataGlobal);
        $this->load->view("done", $dataContent);
        $this->load->view("templates/footer");
    }

    public function show_archive() {
        $dataGlobal = "Tugas Terarsipkan";
        $dataContent['fetch_data'] = $this->dashboard_model->get_archive_todos();

        $this->load->view("templates/header", $dataGlobal);
        $this->load->view("archive", $dataContent);
        $this->load->view("templates/footer");
    }


}