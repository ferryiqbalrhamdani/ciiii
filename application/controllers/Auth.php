<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
        $this->load->model('Auth_model');
    }

    public function index() {

        // set rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'password harus diisi!',
            'min_length' => 'Password minimal 3 karakter!',
            'matches' => 'Passord tidak sama!'
        ]);

        if($this->form_validation->run() == false) {
            $this->load->view('templates/auth_heder');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasi success
            $this->_login();
        }
        
    }

    private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // usernya ada
        if($user) {
            // cek password
            if(password_verify($password, $user['password'])) {
                $data = [ 
                    'email' => $user['email'] 
                ];

                $this->session->set_userdata($data);

                redirect('user');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Username belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function register() {
        $data['title'] = 'Tambah data user';

        // set rules
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Harus berupa email',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'password harus diisi!',
            'min_length' => 'Password minimal 3 karakter',
            'matches' => 'Passord tidak sama!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/auth_heder');
            $this->load->view('auth/register', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->tambahData();

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data user sudah terdaftar.</div>');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Anda berhasil logout.</div>');
        redirect('auth');
    }
}