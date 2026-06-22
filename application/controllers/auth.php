<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('session');
    }

    // ================= LOGIN PAGE =================
    public function index()
    {
        $this->load->view('auth/login');
    }

    // ================= PROSES LOGIN =================
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->auth_model->cek_login($username, $password);

        if ($user) {

            // SET SESSION
            $data = [
                'id'       => $user->id,
                'username' => $user->username,
                'role'     => strtolower($user->role), 
                'login'    => TRUE
            ];

            $this->session->set_userdata($data);

            // update last login
            $this->auth_model->update_last_login($user->id);

            // REDIRECT BERDASARKAN ROLE
            switch ($data['role']) {

                case 'admin':
                    redirect('admin');
                    break;

                case 'sales':
                    redirect('sales');
                    break;

                case 'manager':
                    redirect('manager');
                    break;

                default:
                    // kalau role gak dikenal
                    $this->session->set_flashdata('error', 'Role tidak dikenali');
                    redirect('auth');
                    break;
            }

        } else {
            // login gagal
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('auth');
        }
    }

    // ================= LOGOUT =================
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}